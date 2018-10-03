
function  GameClass () {


    this.webPage = new WebPage();
    this.gameControlFile = this.webPage.defaults.files.gameControlFile;

    this.gameActions = {addNewUserToGame: "add_new_user_to_game", updateNumberOfPlayers: 'update_number_of_players'};
    this.userID = this.webPage.userDetails.user_id;


    var parent = this;

    this.response = "";
    this.gameNumberOfPlayersStartCount = $('#game-number-of-players-start-count');

    this.addUserToGame = function (amount) {


        parent.webPage.playActionLink.attr('href' , "#");

        this.pageClass = $('.page');
        this.gamePage = $('#game-page');

        this.playAmountModal = $('#play-amount-modal');


        var data = {"action": parent.gameActions.addNewUserToGame, "userID": parent.userID, "amount": amount};

        data = JSON.stringify(data);


        this.playAmountModal.modal('hide');

        $.post(parent.gameControlFile, {data: data}, function (resp) {

            var resp = JSON.parse(resp);
            parent.gameNumberOfPlayersStartCount.text(resp.players);

            console.log(resp);


            parent.pageClass.css("display", "none");
            parent.gamePage.css("display", "block");


            data = {
                "action": parent.gameActions.updateNumberOfPlayers,
                "userID": parent.webPage.userDetails.user_id,
                "amount": playAmount,
                "file": parent.webPage.defaults.files.gameControlFile
            };


            data = JSON.stringify(data);
            var getNumberOfJoinedPlayers = new Worker('/static/js/get_number_of_joined_players.js');

            getNumberOfJoinedPlayers.postMessage(data);

            getNumberOfJoinedPlayers.onmessage = function (ev) {

                resp = JSON.parse(ev.data);

                console.log(resp);
                if(resp.start !== "1") {

                    parent.gameNumberOfPlayersStartCount.text(resp.players);


                }


            }



        });


    };


    this.startGame = function (amount) {


    }

}




