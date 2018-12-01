//success ochu
// *141*1500#
var i =0;
var point = 0;
var index = 0;
var newAction;

function GameRoom(webPage , defaults , playAmount , gameDetails , gameClass) {
    parent = this;

    var timeout , timeout2;
    var resp;
    var sendWordWorker;

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

    this.bonus = 0;

    this.totalUserPoints = 0;
    this.favicon = parent.defaults.imgFolder+'favicon.png';


    this.numberOfRequestsSent = 0;

    this.totalBotPoint = 0;
    this.userHasTypedFirstWord = false;



    this.getDefaultRankingMessage = function getDefaultRankingMessage() {
        var rankingMessage = `<div class="message message-personal"><figure class="avatar"><img src="${parent.favicon}" /></figure><span id="game-ranking-text">Scoreboard</span>`
     rankingMessage +=  (parent.totalUserPoints > parent.totalBotPoint) ? `     
     <span class="word-sender-name">1. ${parent.webPage.userDetails.username} - <span id="points-earned" class="points-earned-by-word">${parent.totalUserPoints} points</span> </span>
<span class="word-sender-name">2. ${parent.defaults.defaultUsername} - <span id="points-earned" class="points-earned-by-word">${parent.totalBotPoint} points</span> </span>
     ` : `
  <span class="word-sender-name">1. ${parent.defaults.defaultUsername} - <span id="points-earned" class="points-earned-by-word">${parent.totalBotPoint} points</span> </span>
    <span class="word-sender-name">2. ${parent.webPage.userDetails.username} - <span id="points-earned" class="points-earned-by-word">${parent.totalUserPoints} points</span> </span>
     `;

     rankingMessage += "</div>";

     return rankingMessage;

    };
    this.messages = $('.messages-content');
    this.messageInput = $('#game-text.message-input');
    this.gameHintContainer = $('#game-hint-container');
    this.gameHints = $('#game-hints');
    var msg1 = "";
    var msg2 = "";


    this.gameWords = JSON.parse(this.gameDetails.words);

    this.currentlyUsedWordsArray = this.gameWords;
    this.currentlyUsedWords = this.currentlyUsedWordsArray.slice(0 ,3);

    this.gameWordsH2.text(this.currentlyUsedWords.toString());

    this.gameWordsToLetterArray = this.currentlyUsedWords.join("").split("");




    this.averageWordLength = Math.round(this.gameWords.length / this.gameWordsToLetterArray.length  );

    this.updateScrollbar = function () {
        parent.messages.mCustomScrollbar("update").mCustomScrollbar('scrollTo', 'bottom', {
            scrollInertia: 15,
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


    this.isFreeMode = (playAmount == 0);


    this.currentBotWordsPosition= 0;

    this.botProfilePicture = this.gameDetails.botProfilePicture;
    this.botName = this.gameDetails.botName;
    this.currentValidWordsForBot = [];
    this.wordsTypedByUser = [];
    this.wordsTypedByBot = [];
    this.words = [];



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
            "file": parent.defaults.files.gameControlFile ,
            "botPoint" : parent.totalBotPoint , 
            "totalUserPoints" : parent.totalUserPoints,
            "userBonus" : parent.bonus
        };


        data = JSON.stringify(data);

        endGameWorker.postMessage(data);

        endGameWorker.onmessage = function (ev) {

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
    };
    parent.getGameCurrentRankings = function getGameCurrentRankings ()  {

        if(parent.gameEnded) return;
        var requestSent = false;


        if(!parent.isFreeMode){
            var getGameRankingWorker = new Worker(parent.defaults.workersFolder + 'get_game_ranking.js');

        data = {
            "amount" : playAmount ,
            "userID" : parent.webPage.userDetails.user_id,
            "action" : parent.gameClass.gameActions.getCurrentRanking ,
            "file" :  parent.defaults.files.gameControlFile ,
            "botPoint" : parent.totalBotPoint
        };

        data = JSON.stringify(data);
        getGameRankingWorker.postMessage(data);

        getGameRankingWorker.onmessage = function (ev) {
            if (parent.gameEnded) return getGameRankingWorker.terminate();
            resp = JSON.parse(ev.data);

            parent.updateScrollbar();


            $(resp.message).appendTo($('.mCSB_container')).addClass('new');
            parent.setDate();
            parent.updateScrollbar();
            getGameRankingWorker.terminate();

        }

        }

        else {

            $(parent.getDefaultRankingMessage()).appendTo($('.mCSB_container')).addClass('new');



        }

        parent.setDate();
        parent.updateScrollbar();


        timeout = setTimeout('parent.getGameCurrentRankings()', 6000);








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
        if(parent.gameEnded){
            getWordsWebWorker.terminate();
            return;}
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


    if(!this.isFreeMode)parent.getAllWordsTyped();






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
            action = (parent.isFreeMode)?parent.getCurrentValidEnglishWordsForBot():null;

            parent.gameWordsToLetterArray = resp.gameWordsToLetterArray;
            parent.averageWordLength = Math.round(parent.gameWords.length / parent.gameWordsToLetterArray.length );



        };

    };


    this.changeWords();







    this.getNumberOfElementAppearance = function (letter , arr) {
        var counter = 0;
        for(i = 0; i < arr.length; ++i){
            if(arr[i] == letter){
                counter ++;
            }
        }

        return counter;

    };
    this.letterInWord = function (letter, word) {
        var count = 0;
        for (i = 0; i < word.length; i++) {
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

    this.messageInput.on('blur' , function () {
        /* body... */

        $(this).focus();
    });

    this.sendWords = function sendWords () {



            if(!(parent.isFreeMode)) {
                if(!parent.words.length){
                    timeout2 = setTimeout('parent.sendWords()' , 100);
                    return;
                }


            data = {
                "userID": parent.webPage.userDetails.user_id,
                "amount": playAmount,
                "word": parent.words[0].word,
                "point": parent.words[0].point,
                "file": parent.defaults.files.gameControlFile,
                "action": this.gameClass.gameActions.sendWord,
                "username": parent.webPage.userDetails.username
            };



            data = JSON.stringify(data);
            sendWordWorker = new Worker(parent.defaults.workersFolder + 'send_word.js');


            sendWordWorker.postMessage(data);

            sendWordWorker.onmessage = function (ev) {
                var reply = JSON.parse(ev.data);

                parent.messageInput.val("");
                $('<div class="message message-personal">' + msg1 + ' <span class="word-sender-name">' + parent.webPage.userDetails.username + ' - <span id="points-earned" class="points-earned-by-word">' + reply.point + ' point</span> </span></div>').appendTo($('.mCSB_container')).addClass('new');
                parent.setDate();
                parent.updateScrollbar();
                if (reply.bonus != "") parent.potentialWinning.text(reply.bonus);
                if (reply.end) return parent.endGame();

                parent.words.shift();

                timeout2 = setTimeout('parent.sendWords()' , 100);



            };


        }
        else {
            return;
            }


    };
    this.insertMessage =  function() {

        msg1 = $.trim(parent.messageInput.val()).replace(/\s+/g, '').toLowerCase();

       newAction = parent.wordsTypedByUser.indexOf(msg1) < 0 ? parent.wordsTypedByUser.push(msg1) : "x";



        index = parent.currentValidWordsForBot.indexOf(msg1);
        if (index > -1) {
            parent.currentValidWordsForBot.splice(index, 1);
        }
        var isValidWord = $Spelling.BinSpellCheck(msg1);
        if(msg1 == '' || !parent.defaults.regularExpressions.gameWordsRegEx.test(msg1) || $.inArray(msg1, parent.currentlyUsedWords) >= 0 || !isValidWord){ parent.showWordWarning(); return false;}

        for(i = 0; i < msg1.length; i++){

            if($.inArray(msg1[i] , parent.gameWordsToLetterArray) < 0){
                parent.showWordWarning(parent.gameClass.gameWords.letterNotFoundInWords(msg1[i]));
                return ;
            }
        }


        for (var i = 0; i < msg1.length; i++){

            if(parent.letterInWord(msg1[i] , msg1) > parent.getNumberOfElementAppearance(msg1[i] , parent.gameWordsToLetterArray)){

                parent.showWordWarning(parent.gameClass.gameWords.tooManyInstances(msg1[i]));
                return;

            }

        }

            point = (parent.wordsTypedByBot.indexOf(msg1) >= 0 || newAction == "x") ? 0 : Math.round((msg1.length / parent.averageWordLength) * 10);

            parent.totalUserPoints += point;
            this.words.push({word : msg1 , point : point});
            parent.messageInput.val(null);



        if(parent.isFreeMode) {

            parent.messageInput.val("");
            $('<div class="message message-personal">' + msg1 + ' <span class="word-sender-name">' + parent.webPage.userDetails.username + ' - <span id="points-earned" class="points-earned-by-word">' + point + ' point</span> </span></div>').appendTo($('.mCSB_container')).addClass('new');
            parent.setDate();
            parent.messageInput.val(null);
            parent.updateScrollbar();
            parent.calculateBonus(parent.totalUserPoints);

        }
        else if(!parent.isFreeMode){


            if(!parent.userHasTypedFirstWord) {
                parent.userHasTypedFirstWord = true;
                parent.sendWords();

            }



        }
        
        
        
        
                
        
        
        





        return;
    };

    this.calculateBonus = function (point) {

        parent.bonus = Math.round(point/20);

        parent.potentialWinning.text(parent.bonus);

    };
    this.insertBotMessage = function insertBotMessage() {

        msg2 = parent.currentValidWordsForBot[parent.currentBotWordsPosition].toLowerCase();
        if (!msg2) return;
        parent.wordsTypedByBot.push(msg2);
        parent.currentBotWordsPosition++;



        point = (!$Spelling.BinSpellCheck(msg2) || parent.wordsTypedByUser.indexOf(msg2) >= 0) ? 0 : Math.round((msg2.length / parent.averageWordLength) * 10);


        parent.totalBotPoint += point;


        $('<div class="message loading new"><figure class="avatar"><img src="' + parent.favicon + '" /></figure><span></span></div>').appendTo($('.mCSB_container'));
        parent.updateScrollbar();


        setTimeout(function () {
            $('.message.loading').remove();
            $('<div class="message new"><figure class="avatar"><img src="' + parent.botProfilePicture + '" /></figure>' + msg2 + '<span class="word-sender-name">' + parent.botName + ' - <span id="points-earned" class="points-earned-by-word">' + point + ' points</span> </span></div>').appendTo($('.mCSB_container')).addClass('new');

            parent.setDate();
            parent.updateScrollbar();
            i++;

        }, 400);


    };


    this.sendWordFromBot = function (data) {
        var sendWordTimerWorker = new Worker(parent.defaults.workersFolder+'send_bot_word.js');
        sendWordTimerWorker.postMessage(JSON.stringify({"start" : true , "seconds" : 3}));
        sendWordTimerWorker.onmessage = function (ev) {
            if(parent.gameEnded)return sendWordTimerWorker.terminate();
            parent.insertBotMessage();
        };
    };

    this.getCurrentValidEnglishWordsForBot = function getCurrentValidEnglishWordsForBot(callback) {
        var getValidEnglishWordsWorker = new Worker(parent.defaults.workersFolder +'get_valid_words.js');
        data = {"words" : parent.currentlyUsedWords , "currentlyUsedWords" : parent.currentlyUsedWords};
        data = JSON.stringify(data);
        getValidEnglishWordsWorker.postMessage(data);
        getValidEnglishWordsWorker.onmessage = function (ev) {
            data = JSON.parse(ev.data);

            parent.currentValidWordsForBot = data.words;
            parent.currentBotWordsPosition = 0;
            if(callback)callback();

            getValidEnglishWordsWorker.terminate();

        };


    };

    action = (this.isFreeMode)?this.getCurrentValidEnglishWordsForBot(parent.sendWordFromBot):null;

   // action = (this.isFreeMode)?this.sendWordFromBot(): null;


    this.startCounter = function () {
        var getCounter = new Worker(parent.defaults.workersFolder + 'game_countdown.js');
        getCounter.postMessage(JSON.stringify({"start" : true}));
        getCounter.onmessage = function (ev) {
            resp = JSON.parse(ev.data);
            parent.gameCountdown.text(resp.time);
            if (resp.end){parent.gameEnded = true; getCounter.terminate(); parent.endGame()}
        }
    };


    this.startCounter();


    $('.message-submit').on('click' , function () {
        parent.insertMessage();
    });

    $(window).on('keydown', function (e) {
        if (e.which == 13) {
            parent.insertMessage();
            return false;
        }
    });


}
