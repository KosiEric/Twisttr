
function GameRoom(webPage , defaults , playAmount , gameDetails , gameClass) {
    parent = this;


    this.gameCountdown = $('#game-countdown');
    this.webPage = webPage;
    this.defaults = defaults;

    this.gameClass = gameClass;

    this.gameDetails = gameDetails;


    this.potentialWinning = $('#potential-winning');
    this.potentialWinningAmount = (Number(parent.gameDetails.players) - 1) * playAmount;

    this.potentialWinning.text(this.potentialWinningAmount);

    this.gameWordsH2 = $('#game-words');
    this.startTime = Number(this.gameDetails.start_time);
    this.endTime = 1000 * 60 * /*Minutes */ 3;
    this.endTime += this.startTime;






    this.numberOfRequestsSent = 0;



    this.messages = $('.messages-content');
    this.messageInput = $('.message-input');
    this.gameHintContainer = $('#game-hint-container');
    this.gameHints = $('#game-hints');
    var msg = "";



    this.gameWords = JSON.parse(this.gameDetails.words);

    this.currentlyUsedWordsArray = this.gameWords;
    this.currentlyUsedWords = this.currentlyUsedWordsArray.slice(0 ,3);

    this.gameWordsH2.text(this.currentlyUsedWords.toString());

    this.gameWordsToLetterArray = this.currentlyUsedWords.join("").split("");




    this.averageWordLength = Math.round(this.gameWordsToLetterArray.length / this.gameWords.length);

    console.log(parent.averageWordLength);
    this.gameAvatar = {'m' : parent.webPage.defaults.imgFolder + 'avatar.png' , 'f' : parent.webPage.defaults.imgFolder + 'avatar2.png'};
    this.lastTimeUpdated = new Date().getTime();



    var     d, h, m,
        i = 0;
    this.messages.mCustomScrollbar();

      parent.endGame = function() {

      };


       parent.getAllWordsTyped = function () {


           data = {"userID" : parent.webPage.userDetails.user_id ,
               "amount" : playAmount ,

               "file" : parent.defaults.files.gameControlFile ,
               "action" : this.gameClass.gameActions.getAllWords ,
               "username" : parent.webPage.userDetails.username,
               "start" : parent.numberOfRequestsSent
           };

           data = JSON.stringify(data);
           var getWordsWebWorker = new Worker(parent.defaults.workersFolder + 'get_words.js');
           getWordsWebWorker.postMessage(data);

           getWordsWebWorker.onmessage = function (ev) {

             var wordDetails = JSON.parse(ev.data);
if(wordDetails.data != "") {
    $('<div class="message loading new"><figure class="avatar"><img src="/static/img/favicon.png" /></figure><span></span></div>').appendTo($('.mCSB_container'));
    parent.updateScrollbar();



    setTimeout(function () {
        $('.message.loading').remove();
        $(wordDetails.data).appendTo($('.mCSB_container')).addClass('new');
        parent.setDate();
        parent.updateScrollbar();
        i++;
    }, 1000);

    if(wordDetails.end){

        getWordsWebWorker.terminate();
        parent.endGame();
    }

}


           };




       };


      parent.getAllWordsTyped();






    self.changeWords = function () {

        var changeGameWordsWorker = new Worker(parent.defaults.workersFolder + 'change_game_words.js');

        data = {"currentlyUsedWordsArray" : parent.currentlyUsedWordsArray , "currentlyUsedWords" : parent.currentlyUsedWords};
        data = JSON.stringify(data);

        changeGameWordsWorker.postMessage(data);


        changeGameWordsWorker.onmessage = function (ev) {

            console.log(ev.data);

            resp = JSON.parse(ev.data);


            parent.currentlyUsedWords = resp.currentlyUsedWords;
            parent.gameWordsH2.text(parent.currentlyUsedWords.toString());

            parent.gameWordsToLetterArray = resp.gameWordsToLetterArray;
            parent.averageWordLength = Math.round(resp.gameWordsToLetterArray.length / parent.gameWords.length);




        };

    };


    self.changeWords();






    this.updateScrollbar = function () {
            parent.messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
                scrollInertia: 10,
                timeout: 0
            });
        };

        this.setDate = function setDate() {
            d = new Date();
            if (m != d.getMinutes()) {
                m = d.getMinutes();
                $('<div class="timestamp">' + d.getHours() + ':' + m + '</div>').appendTo($('.message:last'));
            }
        };

    this.getNumberOfElementAppearance = function (letter , arr) {
        var counter = 0;
        for(var i = 0; i < arr.length; ++i){
            if(arr[i] == letter){
                counter ++;
            }
        }

        return counter;

    };
    this.letterInWord = function (letter, word) {
        var count = 0;
        for (var i = 0; i < word.length; i++) {
            if (word.charAt(i) === letter) {
                count++;
            }
        }
        return count;
    };

         this.hideWordWarning = function () {
             parent.gameHintContainer.css('display' , 'none');
         };

         this.showWordWarning = function (warningText) {
                   if(warningText == null) {warningText = parent.gameClass.gameWords.tryAnotherWord;}
                   parent.gameHints.html(warningText);
                   parent.gameHintContainer.css('display' , 'block');
                   setTimeout('parent.hideWordWarning()' , 3000);
         };


         this.insertMessage =  function() {
            msg = $.trim(parent.messageInput.val()).toLowerCase();

             var isValidWord = $Spelling.BinSpellCheck(msg);
            if(msg == '' || !parent.defaults.regularExpressions.gameWordsRegEx.test(msg) || !isValidWord){ parent.showWordWarning(); return false;}

            for(var i = 0; i < msg.length; i++){

                if($.inArray(msg[i] , parent.gameWordsToLetterArray) < 0){
                    parent.showWordWarning(parent.gameClass.gameWords.letterNotFoundInWords(msg[i]));
                    return ;
                }
            }


            for (var i = 0; i < msg.length; i++){

                if(parent.letterInWord(msg[i] , msg) > parent.getNumberOfElementAppearance(msg[i] , parent.gameWordsToLetterArray)){

                    parent.showWordWarning(parent.gameClass.gameWords.tooManyInstances(msg[i]));
                    return;

                }

            }
              var sendWordWorker = new Worker(parent.defaults.workersFolder + 'send_word.js');

           var point = Math.round((msg.length / parent.averageWordLength) * 10);


            data = {"userID" : parent.webPage.userDetails.user_id ,
                    "amount" : playAmount ,
                     "word" : msg ,
                     "point" : point ,
                      "file" : parent.defaults.files.gameControlFile ,
                      "action" : this.gameClass.gameActions.sendWord ,
                       "username" : parent.webPage.userDetails.username
            };



            data = JSON.stringify(data);

             sendWordWorker.postMessage(data);

            sendWordWorker.onmessage = function (ev) {

                 var reply  = JSON.parse(ev.data);

                 parent.messageInput.val("");
                $('<div class="message message-personal">' + msg + ' <span class="word-sender-name">' + parent.webPage.userDetails.username + ' - <span id="points-earned" class="points-earned-by-word">'+ reply.point + ' point</span> </span></div>').appendTo($('.mCSB_container')).addClass('new');
                parent.setDate();
                parent.messageInput.val(null);
                parent.updateScrollbar();

                if(reply.end) return parent.endGame();


            } ;












                        return;
        };

    this.startCounter = function () {

        var getCounter = new Worker(parent.defaults.workersFolder + 'game_countdown.js');

        getCounter.postMessage(JSON.stringify({"start" : true}));

        getCounter.onmessage = function (ev) {
            resp = JSON.parse(ev.data);
            parent.gameCountdown.text(resp.time);
            if (resp.end){getCounter.terminate(); parent.endGame()};
        }

    };


    this.startCounter();


    $('.message-submit').click(function () {
            parent.insertMessage();
        });

        $(window).on('keydown', function (e) {
            if (e.which == 13) {
                parent.insertMessage();
                return false;
            }
        });


}

