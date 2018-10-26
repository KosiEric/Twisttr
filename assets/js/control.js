$(document).ready(function () {
    webPageObject = new WebPage();
    parent = this;
    var playAmount =0;
    var gamePlayAmount = $('#game-play-amount');
    function payWithPaystack(email , amount , name , originalAmount , fieldset){
        fieldset.prop("disabled"  , false);
        var handler = PaystackPop.setup({
            key: webPageObject.defaults.constants.paystackKey,
            email: email,
            amount: amount,
            ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            metadata: {
                custom_fields: [
                    {
                        display_name: name,
                        variable_name: "email_address",
                        value: email
                    }
                ]
            },
            callback: function(response){

                data = {"userID" : webPageObject.userDetails.user_id , "amount" : originalAmount , "referenceCode" : response.reference};
                data = JSON.stringify(data);

                $.post(webPageObject.defaults.files.fundAccountFile , {data: data}).done(function (data) {

                    if(data[webPageObject.defaults.jsonSuccessText] == "1"){

                        window.location.reload();
                    }

                    else {

                        window.location.reload();
                    }



                });

            },
            onClose: function(){
                window.console.log('window closed');
            }
        });
        handler.openIframe();
    }


if(webPageObject.isLoggedInUser){


    fundAccountAmountOptions = $('#fund-account-amount-options');
    fundAccountActionButton = $('#fund-account-action-button');
    playAmountModal  = $('#play-amount-modal');
    playAmountActionButtun = $('#play-amount-action-button');
    playAmountOptions = $('#play-amount-options');
    fundAccountForm = $('#fund-account-form');
    fundAccoutFieldset = $('#fund-account-fieldset');
    playAmountErrorMessage = $('#play-amount-error-message');
    playAmountActionButtun.on('click' , function (e) {

       webPageObject.defaults.preventFormSubmission(e);

       webPageObject.playAmountModal.modal('hide');





       $.post(webPageObject.defaults.files.getUserAccountBalanceFile , {'userID' : webPageObject.userDetails.user_id}).done(function (data) {

           accountBalance = parseInt(data);

          var  playAmount = Number($('#'+playAmountOptions.attr('id') + " option:selected").attr("value"));

           if(accountBalance < playAmount)
               return playAmountErrorMessage.text(webPageObject.defaults.words.playAmountIsLessThanAccountBalanceText);

           if(!$('<link>').appendTo('head').attr({'rel' : 'stylesheet' , 'type' : 'text/css' , 'href' : webPageObject.defaults.cssFolder+'game.css'})) return;
           webPageObject.homePage.hide();
           webPageObject.gamePage.css('display' , 'block');
           webPageObject.mainGameContainer.css('display' , 'block');
           webPageObject.updateNumOfPlayersWorker.terminate();

           $.getScript(webPageObject.defaults.jsFolder+'GameControl.js' , function () {

               var gameClass = new GameClass();
               playAmount = Number($('#'+playAmountOptions.attr('id') + " option:selected").attr("value"));
               gameClass.addUserToGame(playAmount);
               gamePlayAmount.text(playAmount);
           });




       });

    });


    fundAccountForm.on('submit' , function (e) {
        webPageObject.defaults.preventFormSubmission(e);
        fundAccoutFieldset.prop("disabled" , true);
        originalAmountInNaira = Number($('#'+fundAccountAmountOptions.attr('id') + " option:selected").attr("value"));
        fundAmount = originalAmountInNaira * 100;
        fundAmount = fundAmount + ((1.5/100) * fundAmount);

        $.getScript(webPageObject.defaults.files.paystackScript , function () {

            payWithPaystack(webPageObject.userDetails.email , fundAmount , webPageObject.userDetails.fullname , originalAmountInNaira , fundAccoutFieldset);
        });


    });


}







});