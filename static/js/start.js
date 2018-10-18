//success ochu
// *141*1500#
function GameRoom(webPage , defaults , playAmount , gameDetails , gameClass) {
    parent = this;


    this.gameCountdown = $('#game-countdown');
    this.webPage = webPage;
    this.defaults = defaults;

    this.gameClass = gameClass;

    this.gameDetails = gameDetails;

    this.gameEnded = false;

    this.potentialWinning = $('#potential-winning');
    this.potentialWinningAmount = (Number(parent.gameDetails.players) - 1) * playAmount;

    this.potentialWinning.text(this.potentialWinningAmount);

    this.gameWordsH2 = $('#game-words');
    this.startTime = Number(this.gameDetails.start_time);
    this.endTime = 1000 * 60 * /*Minutes */ 3;
    this.endTime += this.startTime;

   this.favicon = parent.defaults.imgFolder+'favicon.png';




    this.numberOfRequestsSent = 0;



    this.messages = $('.messages-content');
    this.messageInput = $('#game-text.message-input');
    this.gameHintContainer = $('#game-hint-container');
    this.gameHints = $('#game-hints');
    var msg = "";



    this.gameWords = JSON.parse(this.gameDetails.words);

    this.currentlyUsedWordsArray = this.gameWords;
    this.currentlyUsedWords = this.currentlyUsedWordsArray.slice(0 ,3);

    this.gameWordsH2.text(this.currentlyUsedWords.toString());

    this.gameWordsToLetterArray = this.currentlyUsedWords.join("").split("");





    this.averageWordLength = Math.round(this.gameWords.length / this.gameWordsToLetterArray.length  );





    var     d, h, m,
        i = 0;
    this.messages.mCustomScrollbar();

      this.endGame = function() {


          parent.messageInput.focusout();
          parent.messageInput.val("");
          parent.messageInput.prop("disabled", true);
          var endGameWorker = new Worker(parent.defaults.workersFolder + 'end_game.js');
          data = {
              "userID": parent.webPage.userDetails.user_id,
              "amount": playAmount,
              "action": parent.gameClass.gameActions.endGame,
              "file": parent.defaults.files.gameControlFile

          };


          data = JSON.stringify(data);

          endGameWorker.postMessage(data);

          endGameWorker.onmessage = function (ev) {

              console.log(ev.data);
              resp = JSON.parse(ev.data);
              //    console.log(ev.data);

              //$('<div class="message loading new"><figure class="avatar"><img src="' + parent.favicon + '" /></figure><span></span></div>').appendTo($('.mCSB_container'));
              //parent.updateScrollbar();


//                  $('.message.loading').remove();
  //                parent.updateScrollbar();
                  $(resp.message).appendTo($('.mCSB_container')).addClass('new');
                  parent.setDate();
                  parent.updateScrollbar();
                 setTimeout('window.location.reload()' , 11000);

          };
      }
      parent.getGameCurrentRankings = function () {

          var getGameRankingWorker = new Worker(parent.defaults.workersFolder + 'get_game_ranking.js');

          data = {"amount" : playAmount ,
                  "userID" : parent.webPage.userDetails.user_id,
              "action" : parent.gameClass.gameActions.getCurrentRanking ,
              "file" :  parent.defaults.files.gameControlFile

          };

          data = JSON.stringify(data);
          getGameRankingWorker.postMessage(data);

          getGameRankingWorker.onmessage = function (ev) {
              if(parent.gameEnded)return getGameRankingWorker.terminate();
              resp = JSON.parse(ev.data);

              parent.updateScrollbar();


                  $(resp.message).appendTo($('.mCSB_container')).addClass('new');
                  parent.setDate();
                  parent.updateScrollbar();



          }


      };


     parent.getGameCurrentRankings();

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
               if(parent.gameEnded) return getWordsWebWorker.terminate();
             var wordDetails = JSON.parse(ev.data);
if(wordDetails.data != "") {
    $('<div class="message loading new"><figure class="avatar"><img src="'+parent.favicon+'" /></figure><span></span></div>').appendTo($('.mCSB_container'));
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






    this.changeWords = function () {

        var changeGameWordsWorker = new Worker(parent.defaults.workersFolder + 'change_game_words.js');

        data = {"currentlyUsedWordsArray" : parent.currentlyUsedWordsArray , "currentlyUsedWords" : parent.currentlyUsedWords};
        data = JSON.stringify(data);

        changeGameWordsWorker.postMessage(data);


        changeGameWordsWorker.onmessage = function (ev) {
if(parent.gameEnded) return changeGameWordsWorker.terminate();


            resp = JSON.parse(ev.data);



            parent.currentlyUsedWords = resp.currentlyUsedWords;
            parent.gameWordsH2.text(parent.currentlyUsedWords.toString());

            parent.gameWordsToLetterArray = resp.gameWordsToLetterArray;
            parent.averageWordLength = Math.round(parent.gameWords.length / parent.gameWordsToLetterArray.length );



        };

    };


    this.changeWords();






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

         this.showWordWarning = function (warningText , secconds = 3) {
                   if(warningText == null) {warningText = parent.gameClass.gameWords.tryAnotherWord;}
                   parent.gameHints.html(warningText);
                   parent.gameHintContainer.css('display' , 'block');
                   setTimeout('parent.hideWordWarning()' , secconds * 1000);
         };


         this.insertMessage =  function() {
            msg = $.trim(parent.messageInput.val()).toLowerCase();

             var isValidWord = $Spelling.BinSpellCheck(msg);
            if(msg == '' || !parent.defaults.regularExpressions.gameWordsRegEx.test(msg) || $.inArray(msg, parent.currentlyUsedWords) >= 0 || !isValidWord){ parent.showWordWarning(); return false;}

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

           point = point;


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

            if (resp.end){parent.gameEnded = true; getCounter.terminate(); parent.endGame()};
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

