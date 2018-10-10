
function GameRoom(webPage = new WebPage() , defaults = new Defaults() , gameClass = new GameClass() , playAmount = 1000) {
    this.webPage = webPage;
    this.defaults = defaults;
    this.gameClass = gameClass;
    parent = this;
    this.messages = $('.messages-content');
    this.messageInput = $('.message-input');
    this.gameHintContainer = $('#game-hint-container');
    this.gameHints = $('#game-hints');
    var msg = "";
    this.allGameWords =[];

    this.gameWords = ["mandate" , "standard" , "status"];
    this.gameWordsToLetterArray = this.gameWords.join("").split("");


    this.allGameWords = [];

    this.averageWordLength = Math.round(this.gameWordsToLetterArray.length / this.gameWords.length);

    this.gameAvatar = {'m' : parent.webPage.defaults.imgFolder + 'avatar.png' , 'f' : parent.webPage.defaults.imgFolder + 'avatar2.png'};
    this.lastTimeUpdated = new Date().getTime();
    var     d, h, m,
        i = 0;
    this.messages.mCustomScrollbar();
    setTimeout(function () {
        parent.fakeMessage();
    }, 100);

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
            msg = $.trim(parent.messageInput.val());

             var isValidWord = $Spelling.BinSpellCheck(msg);
            if(msg == '' || !parent.defaults.regularExpressions.gameWordsRegEx.test(msg) || !isValidWord){ parent.showWordWarning(); return false;}

            for(var i = 0; i < msg.length; i++){

                if($.inArray(msg[i] , parent.gameWordsToLetterArray) < 0){
                    parent.showWordWarning(parent.gameClass.gameWords.letterNotFoundInWords(msg[i]));
                    break;
                }
            }


            for (var i = 0; i < msg.length; i++){

                if(parent.letterInWord(msg[i] , msg) > parent.getNumberOfElementAppearance(msg[i] , parent.gameWordsToLetterArray)){

                    parent.showWordWarning(parent.gameClass.gameWords.tooManyInstances(msg[i]));

                }

            }
             //   var sendWordWorker = new Worker(parent.defaults.workersFolder + 'send_word.js');

           var point = Math.round((msg.length / parent.averageWordLength) * 10);


            data = {"user_id" : parent.webPage.userDetails.user_id ,
                    "amount" : playAmount ,
                     "word" : msg ,
                     "time" : new Date().getTime() ,
                     "point" : point ,
                      "file" : parent.defaults.files.gameControlFile ,
                      "action" : parent.gameClass.gameActions.sendWord
            };




            data = JSON.stringify(data);
             console.log(data);
             return;
             sendWordWorker.postMessage();

            sendWordWorker.onmessage = function (ev) {

                 console.log(ev.data);

            };











            return ;

            $('<div class="message message-personal">' + msg + '</div>').appendTo($('.mCSB_container')).addClass('new');
            parent.setDate();
            parent.messageInput.val(null);
            parent.updateScrollbar();
            setTimeout(function () {
                parent.fakeMessage();
            }, 1000 + (Math.random() * 20) * 100);
        };

        $('.message-submit').click(function () {
            parent.insertMessage();
        });

        $(window).on('keydown', function (e) {
            if (e.which == 13) {
                parent.insertMessage();
                return false;
            }
        });

        var Fake = [
            'Hi there, I\'m Fabio and you?',
            'Nice to meet you',
            'How are you?',
            'Not too bad, thanks',
            'What do you do?',
            'That\'s awesome',
            'Codepen is a nice place to stay',
            'I think you\'re a nice person',
            'Why do you think that?',
            'Can you explain?',
            'Anyway I\'ve gotta go now',
            'It was a pleasure chat with you',
            'Time to make a new codepen',
            'Bye',
            ':)'
        ];

        this.fakeMessage = function () {
            if (parent.messageInput.val() != '') {
                return false;
            }
            $('<div class="message loading new"><figure class="avatar"><img src="/static/img/favicon.png" /></figure><span></span></div>').appendTo($('.mCSB_container'));
            parent.updateScrollbar();

            setTimeout(function () {
                $('.message.loading').remove();
                $('<div class="message new"><figure class="avatar"><img src="/static/img/favicon.png" /></figure>' + Fake[i] + '<span class="word-sender-name">Kosi - <span id="points-earned" class="points-earned-by-word">50 points</span> </span></div>').appendTo($('.mCSB_container')).addClass('new');
                parent.setDate();
                parent.updateScrollbar();
                i++;
            }, 1000 + (Math.random() * 20) * 100);

        }




}

$(document).ready(function (a) {

    var gameRoom = new GameRoom();
});