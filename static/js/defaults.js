function useStrict() {
    "use strict";
}

/*
$.ajaxSetup({
    cache: false
});

*/






useStrict();

/*The function below i.e String.format works like this:
var sentence = String.format("My name is {0} i am a {1} from {2} and i am {} years old" , "Kosi Eric" , "Programmer" , "Nigeria" , 19);
console.log(sentence)


//prints

My name is Kosi Eric i am a programmer from Nigeria and i am 19 years old;

*/



if (!String.format) {
    String.format = function(format) {
        var args = Array.prototype.slice.call(arguments, 1);
        return format.replace(/{(\d+)}/g, function(match, number) {
            return typeof args[number] != 'undefined'
                ? args[number]
                : match
                ;
        });
    };
}





//The class Below i.e Defaults contains all the necessary default functions and variables need to run the index.php



function  Defaults() {

    $.ajaxSetup({
        cache: true
    });






    var parent = this;



    this.errorMessage = "";

    this.isEmptyField = function (value = "none") {
        value = new String(value);


        if(value.length == 0)
            return true;
        return false;

    };

    this.loadFile = function (data  , url , elem , callback  ) {

        data = (data == null) ? {data : "data"} : data;
        $.post(url , {data : data}).done(function (t) {
           if(elem) elem.html(t);

           callback(t);

        });

    };


this.preventFormSubmission = function (e) {

    e.preventDefault();
    e.stopImmediatePropagation();
    e.stopPropagation();



};

    this.minimumAgeForRegistration = 18;



   //All the files necessary for processing requests
    this.processorsFolder = '/processors/';
    this.staticFolder = '/static/';
    this.incsFolder = this.staticFolder + 'incs/';
    this.chatFiles = '/chatfiles/';
    this.cssFolder = this.staticFolder + 'css/';
    this.imgFolder = this.staticFolder + 'img/';
    this.jsFolder = this.staticFolder + 'js/';
    this.workersFolder = this.jsFolder + 'workers/';


        //Json success and error

    this.jsonErrorText = "error";
    this.jsonSuccessText = "success";

   this.files = {
       registrationFile : parent.processorsFolder+'signup.php' ,
       loginFile : parent.processorsFolder+'login.php',
       forgotPasswordFile : parent.processorsFolder+'forgot-password.php',
       resendVerificationLinkFile : parent.processorsFolder+'resend-verification-link.php',
       passwordResetFile : parent.processorsFolder+'reset-password.php',
       changeBankDetailsFile : parent.processorsFolder + 'change-bank-details.php' ,
       logoutFile :parent.processorsFolder+'logout.php' ,
       editAccountDetailsFile : parent.processorsFolder + 'edit-account-details.php',
       moreAccountDetailsFile : parent.processorsFolder + "more-account-details.php" ,
       fundAccountFile : parent.processorsFolder + 'fund-account.php' ,
       withdrawAmountFile : parent.processorsFolder + 'withdraw-amount.php' ,
       getUserAccountBalanceFile : parent.processorsFolder + 'get-user-account-balance.php',
       gameControlFile : parent.processorsFolder + 'game-control.php' ,
       chatFile : 'chat.php',
       browserWarningFile : parent.incsFolder + 'browser-warning.php' ,
       notificationsFile : parent.processorsFolder + 'notifications.php',
       javascriptFolder : '/static/js/',
       chatfunctions : parent.chatFiles + 'chatfunctions.js',
       paystackScript : "https://js.paystack.co/v1/inline.js" ,
       spellcheckScript : "/JavaScriptSpellCheck/include.js"
   };



    //Necessary constants

    this.constants = {fullnameMinLength : 2,
        minWithdrawalAmount : 500,
        fullnameMaxLength : 60,
        minUsernameLength : 5,
        maxUsernameLength : 12,
        minPasswordLength : 5,
        maxPasswordLength : 18,
        minPhoneLength : 11,
        maxPhoneLength : 11,
        minEmailLength : 1,
        maxEmailLength : 10000000,
        bankAccountNumberLength : 10,
        minBanAccountNumberLength : 10,
        maxBankAccountNumberLength : 10,
        minTwitterUsernameLenght : 2,
        maxTwitteUsernameLength : 100,
        minInstagramUsernameLength : 2,
        maxInstagramUsernameLength : 100,
        minStatusMessageLength : 5 ,
        maxStatusMessageLength : 140
        
    };

    //Some(if not all) Strings (words) necessary for validation.

    this.words = {playAmountIsLessThanAccountBalanceText: "insufficient funds , try another plan , or fund your account" , withdrawAmountExceedAccountBalanceText : "Transaction failed : insufficient funds" , withdrawAmountIsLessThanMinimumText : "withdraw amount is less than minimum of &#8358;" + parent.constants.minWithdrawalAmount , passwordsDonotMatchText : "passwords do not match" , enterPasswordAgainText : "enter password again" ,
        usernameText : "username" , emptyBankNameText : "enter your bank name" , bankAccountNumberText : "account number" ,  nameText : "name" ,bankAccountNameText : "bank account name" , genderText : "gender" , birthdayText : "birthday" ,
        emailText : "email" , statusMessageText : "status message" , passwordText : "password" , instragramUsernameText : "Instagram username" , twitterUsernameText : "Twitter username" , passwordAgainText : "password again" , "contactText" : "contact" ,
        emptyBirthDayText : "enter your date of birth" , usernameCannotBeDigitsOnlyText : "username can't be numbers only" , withdrawalAmount : "withdrawal amount" ,   enterValidWithdrawalAmountText : "enter a valid withdrawal amount" , invalidBirthdayText : "enter a valid birthday" , emptyGenderText : "select your gender" , birthdayIsLessThan18YearsText : "users must be 18 years or above to participate"};


    //Necessary Regular expressions
    
    this.regularExpressions = {
        fullnameRegEx : /^[a-zA-Z ]{2,60}$/,
        emailRegEx : /^([a-zA-Z0-9_\-\._]+)@([a-zA-Z0-9_\-\._]+)\.([a-zA-Z0-9_\-\.]{2,5})$/,
        usernameRegEx : /^[a-zA-Z0-9]{5,12}$/,
        passwordRegEx : /^[a-zA-Z0-9]{5,18}$/,
        phoneRegEx  :  /^(\d{11,11})$/,
        bankNameRegEx : /^[a-zA-Z ]{2,60}$/,
        gameWordsRegEx : /^[a-zA-Z ]{2,60}$/,

        bankAccountNumberRegEx : /^(\d{10,10})$/ ,
        twitterUsernameRegEx : /^[a-zA-Z0-9._-]{2,100}$/ ,
        instagramUsernameRegEx : /^[a-zA-Z0-9._-]{2,100}$/ ,
        statusMessageRegEx : (/^[a-zA-Z0-9.,_;:\-'" ]{5,140}$/)
    };
    
    
    
    



   this.defaultInputParentClass = 'input-group';
   this.defaultHasErrorInputClass = 'has-error';
   this.defaultHasSuccessInputClass = 'has-success';




    this.fieldValidator = function (field , fieldName , value , minLength , maxLength , regEx , errorSpan , changeBorder = false , parentClass = this.defaultInputParentClass) {

        returnValue = false;
        if(regEx.test(value)) {

            parent.errorMessage = "";
            returnValue = true;


        }

        else if(this.isEmptyField(value)) {
            parent.errorMessage = "please enter your " + fieldName;

        }

        else if(value.length < minLength) {
            parent.errorMessage = String.format("{0} is less than {1} characters", fieldName , minLength);
             }

        else if(value.length > maxLength) {
            parent.errorMessage = String.format("{0}  exceeds {1} characters", fieldName , maxLength);
            }

        else {
            parent.errorMessage = "Please enter a valid " + fieldName;
            }

        errorSpan.text(parent.errorMessage);

        // The statement below checks if the changeBorder argument was changed to true, and if yes it adds the necessary css classes
        // showing the  user valid and invalid fields



        if(changeBorder && returnValue) {
            field.parent('.' +parentClass).removeClass(this.defaultHasErrorInputClass);
            field.parent('.' + parentClass).addClass(this.defaultHasSuccessInputClass);
            field.removeClass(this.defaultHasErrorInputClass);
            field.addClass(this.defaultHasSuccessInputClass);

        }

        else if (changeBorder && !returnValue){
            field.removeClass(this.defaultHasSuccessInputClass);
            field.addClass(this.defaultHasErrorInputClass);
            field.parent('.' + parentClass).removeClass(this.defaultHasSuccessInputClass);
            field.parent('.' + parentClass).addClass(this.defaultHasErrorInputClass);
        }


        return returnValue;
        
        
        





    }


}