importScripts('/assets/js/words.js');


if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(obj, start) {
        for (var i = (start || 0), j = this.length; i < j; i++) {
            if (this[i] === obj) { return i; }
        }
        return -1;
    }
}

Object.defineProperty(Array.prototype, 'chunk_inefficient', {
    value: function(chunkSize) {
        var array=this;
        return [].concat.apply([],
            array.map(function(elem,i) {
                return i%chunkSize ? [] : [array.slice(i,i+chunkSize)];
            })
        );
    }
});

self.validWords = [];
self.wordsSent = [];
self.currentlyUsedWords = [];
self.other = [];

self.shuffle =  function shuffle(array) {
    var counter = array.length;

    // While there are elements in the array
    while (counter > 0) {
        // Pick a random index
        var index = Math.floor(Math.random() * counter);

        // Decrease counter by 1
        counter--;

        // And swap the last element with it
        var temp = array[counter];
        array[counter] = array[index];
        array[index] = temp;
    }

    return array;
};





self.combine = function combine(str , other){
    var other = !other ? false : other;
    var result = [];
    var pushWord;
    var i;
    var word;
    var action = null;
    var strLength = str.length;
    for(i = 1; i < Math.pow(2, strLength) - 1; i++){
        word = [...str].filter((_ , pos) => (i >> pos) & 1).join("");


        action = (englishWords.indexOf(word) >= 0 && self.currentlyUsedWords.indexOf(word) < 0 && self.validWords.indexOf(word) < 0 && result.indexOf(word) < 0 )?result.push(word)  : null;

    }
    self.validWords = self.validWords.concat(result);
    self.other = other ? self.other.concat(result):self.other;
};


self.onmessage = function (ev) {

    self.data = JSON.parse(ev.data);
    self.wordsSent = self.data.words;
    self.currentlyUsedWords = self.data.currentlyUsedWords;
    var wordsToShuffledLettersArray = shuffle(self.wordsSent.join("").split(""));
    var wordsDivided = wordsToShuffledLettersArray.chunk_inefficient(Math.round(wordsToShuffledLettersArray.length / 3));


    for(var word in self.wordsSent){
        self.combine(self.wordsSent[word]);
    }

    for(const wordsLetters of wordsDivided){

        self.combine(wordsLetters.join("") , true);
    }


    self.validWords.sort(function(a, b){
        // ASC  -> a.length - b.length
        // DESC -> b.length - a.length
        return b.length - a.length;
    });



    self.data = {words : self.validWords , other : self.other};
    self.data = JSON.stringify(self.data);
    self.postMessage(self.data);



};



