

self.currentlyUsedWordsArray = [];
self.currentlyUsedWords = [];
self.gameWordsToLetterArray = [];

self.resp = "";





self.onmessage = function (ev) {
                  self.data = JSON.parse(ev.data);
                  self.currentlyUsedWordsArray = self.data.currentlyUsedWordsArray;
                  self.currentlyUsedWords = self.data.currentlyUsedWords;
                  self.gameWordsToLetterArray = self.currentlyUsedWords.join("").split("");


    setInterval(function () {

        self.currentlyUsedWordsArray.splice(0, 3);
        self.currentlyUsedWords = self.currentlyUsedWordsArray.slice(0, 3);


        self.gameWordsToLetterArray = self.currentlyUsedWords.join("").split("");

        self.resp = {"currentlyUsedWords" : self.currentlyUsedWords , "gameWordsToLetterArray" : self.gameWordsToLetterArray};
        postMessage(
            JSON.stringify(self.resp)
        );



    }, 27000);


};