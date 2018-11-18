importScripts('/assets/js/words.js');

/*
if (!Array.prototype.indexOf) {
    Array.prototype.indexOf = function(obj, start) {
        for (var i = (start || 0), j = this.length; i < j; i++) {
            if (this[i] === obj) { return i; }
        }
        return -1;
    }
}
*/


self.validWords = [];
self.wordsSent = [];
self.currentlyUsedWords = [];

self.combine = function combine(str){
    var result = [];
    var pushWord;
    var i;
    var word;
    var strLength = str.length;
    for(i = 1; i < Math.pow(2, strLength) - 1; i++){
        word = [...str].filter((_ , pos) => (i >> pos) & 1).join("");

        self.action = (englishWords.indexOf(word) >= 0 && self.currentlyUsedWords.indexOf(word) < 0 && self.validWords.indexOf(word) < 0 && result.indexOf(word) < 0 )?result.push(word) : null;
    }
    self.validWords = self.validWords.concat(result);

};


self.onmessage = function (ev) {

    self.data = JSON.parse(ev.data);
    self.wordsSent = self.data.words;
    self.currentlyUsedWords = self.data.currentlyUsedWords;


    for(var word in self.wordsSent){
        self.combine(self.wordsSent[word]);
    }
    self.validWords.sort(function(a, b){
        // ASC  -> a.length - b.length
        // DESC -> b.length - a.length
        return b.length - a.length;
    });



    self.data = {"words" : self.validWords};
    self.data = JSON.stringify(self.data);
    self.postMessage(self.data);



};



