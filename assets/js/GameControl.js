
function  GameClass () {

    parent = this;

    this.webPage = new WebPage();
    this.gameControlFile = this.webPage.defaults.files.gameControlFile;
    this.exitGameButton = $('#exit-game-button');
    this.gameActions = {
        exitUserFromGame : "exit_user_from_game"  , addNewUserToGame: "add_new_user_to_game" ,
        updateNumberOfPlayers: 'update_number_of_players' , getAllWords : 'get_all_words'   ,
        getCurrentRanking : 'get_current_ranking' , sendWord : 'send_word' , endGame : 'end_game' ,  getWinner : "get_winner"};
    this.userID = this.webPage.userDetails.user_id;
    this.gameWords = [];
    this.gameDetails = "";
    this.gameStartTime = "";

    this.gameUsersPluralText = $('#game-start-users-text.game-users-plural');


    this.gameWords = {letterNotFoundInWords : function (letter) {
            return String.format("The letter <strong>{0}</strong> not found in any of those words , try another word" , letter);
        },  tryAnotherWord : 'try using another word' , youWon :'Congratulations! , you are the winner' ,   someoneElseWon : function (username) {

            return String.format("{0} won, try improving on your speed next time" , username);
        } , tooManyInstances : function (letter) {
            return String.format("you have too many letter<strong>{0}</strong> on this word , try another word" , letter);
        }};

    this.exitGameButton.on('click' , function () {

        data = {"userID" : parent.userID , "amount" : parent.playAmount , "action" : parent.gameActions.exitUserFromGame};
        data = JSON.stringify(data);
        $.post(parent.gameControlFile , {data:data}).done(function (resp) {
            var resp = JSON.parse(resp);
            if(resp.success == "1"){
                window.location.reload();
            }


        });
    });




    this.response = "";
    this.gameNumberOfPlayersStartCount = $('#game-number-of-players-start-count');

    this.addUserToGame = function (amount) {


        parent.webPage.playActionLink.attr('href' , "#");

        this.pageClass = $('.page');
        this.gamePage = $('#game-page');

        this.playAmountModal = $('#play-amount-modal');


        parent.playAmount = amount;
        data = {"action": parent.gameActions.addNewUserToGame, "userID": parent.userID, "amount": amount};

        data = JSON.stringify(data);

        this.playAmountModal.modal('hide');

        $.post(parent.gameControlFile, {data: data}, function (resp) {


            resp = JSON.parse(resp);
            parent.gameNumberOfPlayersStartCount.text(resp.players);

            var gameMembersText = (resp.players > 1) ? "users" : "user";
            parent.gameUsersPluralText.text(gameMembersText);

            parent.pageClass.css("display", "none");
            parent.gamePage.css("display", "block");


            var data1 = {
                "action": parent.gameActions.updateNumberOfPlayers,
                "userID": parent.webPage.userDetails.user_id,
                "amount": parent.playAmount,
                "file": parent.webPage.defaults.files.gameControlFile
            };





            data1 = JSON.stringify(data1);

            var getNumberOfJoinedPlayers = new Worker(parent.webPage.defaults.workersFolder + 'get_number_of_joined_players.js');

            getNumberOfJoinedPlayers.postMessage(data1);

            getNumberOfJoinedPlayers.onmessage = function (ev) {


                resp = JSON.parse(ev.data);


                var gameMembersText = (resp.players > 1) ? "users" : "user";
                parent.gameUsersPluralText.text(gameMembersText);

                if(resp.start !== "1") {

                    parent.gameNumberOfPlayersStartCount.text(resp.players);


                }

                else {


                    getNumberOfJoinedPlayers.terminate();

                  //  $.getScript(webPageObject.defaults.jsFolder + 'jquery.mCustomScrollbar.concat.min.js' , function () {
                      //  $.getScript(webPageObject.defaults.jsFolder + 'start.js' , function () {
                            webPageObject.gamePage.hide();
                        //    if(!$('<link>').appendTo('head').attr({'rel' : 'stylesheet' , 'type' : 'text/css' , 'href' : webPageObject.defaults.cssFolder+'jquery.mCustomScrollbar.min.css'})) return;

                    webPageObject.startCSS.removeAttr('media');
                          //  if(!$('<link>').appendTo('head').attr({'rel' : 'stylesheet' , 'type' : 'text/css' , 'href' : webPageObject.defaults.cssFolder+'start2.css'})) return;

                            gameRoom = new GameRoom(parent.webPage , parent.webPage.defaults , parent.playAmount , resp , parent);
                    //    });

                    // });

                }


            }



        });


    };



}






