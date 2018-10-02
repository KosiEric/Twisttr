function  WebPage() {
    parent = this;
    this.pageInformation = $('#page-information');
    this.isLoggedInUser = (this.pageInformation.attr('data-logged-in-user') == 1);
    this.defaults = new Defaults();

    this.headerSearchFormLi = $('#header-search-form-li');



    this.showLoginWarning = function () {
        this.loginWarning.modal('show');
    };


    //this.showLoginWarning();


    //Now let's take a look at the site header

    this.activeHeaderClass = 'active-header-li';


    this.headerNavigationLinks = $('.border-down-shown');

   //Login







    this.headerNavigationLinks.on('click' , function () {


        if ($(this).attr('id') != parent.headerSearchFormLi.attr('id')) {
            parent.headerNavigationLinks.removeClass(parent.activeHeaderClass);

            $(this).addClass(parent.activeHeaderClass);
    }

        if(!parent.isLoggedInUser) {

            if($(this).text().toLowerCase() != "home") {

                parent.showLoginWarning();
            }

        }


    });

    if(this.isLoggedInUser) {





        this.userDetails = parent.pageInformation.attr('data-user-details');

        this.userDetails = JSON.parse(this.userDetails);


        withdrawForm = $('#withdraw-form');

        withdrawFormFieldset = $('#withdraw-amount-fieldset');


        withdrawAmount = $('#withdraw-amount');

        withdrawSeverMessages = $('.withdraw-server-messages');
        withdrawSuccessMessage = $('#withdraw-success-message');
        withdrawErrorMessage = $('#withdraw-error-message');
        withdrawAmountErrorMessage = $('#withdraw-amount-error-message');

        withdrawForm.on('submit' , function (e) {

            parent.defaults.preventFormSubmission(e);

            if(parent.defaults.isEmptyField(withdrawAmount.val()) ||  isNaN(withdrawAmount.val())){
                withdrawAmountErrorMessage.text(parent.defaults.words.enterValidWithdrawalAmountText);
                return;

            }


            withdrawAmountValue = Math.ceil((parseInt(withdrawAmount.val()) / 100)) * 100;

            withdrawAmount.val(withdrawAmountValue);



            if(withdrawAmountValue < parent.defaults.constants.minWithdrawalAmount) {

                withdrawAmountErrorMessage.html(parent.defaults.words.withdrawAmountIsLessThanMinimumText);
                return;
            }
            else if(withdrawAmountValue > parent.userDetails.account_balance) {
                withdrawAmountErrorMessage.text(parent.defaults.words.withdrawAmountExceedAccountBalanceText);
            }

            else {
                //withdrawFormFieldset.prop("disabled" , true);
                withdrawSeverMessages.css("display" , "none");



                withdrawAmountErrorMessage.text("");


                data = {"userID" : parent.userDetails.user_id , "amount" : withdrawAmountValue , "referenceCode" : Math.floor((Math.random() * 1000000000) + 1)};
                data = JSON.stringify(data);


                $.post(parent.defaults.files.withdrawAmountFile , {data: data}).done(function (data) {

                    console.log(data);
                    data = JSON.parse(data);
                    if(data[parent.defaults.jsonSuccessText] == "1"){

                        withdrawSuccessMessage.css("display" , "block");
                        withdrawSuccessMessage.text(data[parent.defaults.jsonErrorText]);

                        setTimeout(function () {

                            window.location.reload();
                        } , 4000);

                        return;
                    }

                    withdrawFormFieldset.prop("disabled" , false);
                    withdrawErrorMessage.css("display" , "block");
                    withdrawErrorMessage.text(data[parent.defaults.jsonErrorText]);





                });




            }



        });


        //More details form


        moreDetailsForm = $('#more-details-form');
        moreDetailsFormFieldSet = $('#more-details-form-fieldset');
        instagramUsername = $('#instagram-username');
        statusMessage = $('#status-message');
        twitterUsername = $('#twitter-username');
        instagramUsernameErrorSpan = $('#instagram-username-error-span');
        twitterUsernameErrorSpan = $('#twitter-username-error-span');
        statusMessageErrorSpan  = $('#status-message-error-span');
        moreDetailsSuccessMessage = $('#more-details-success-message');
        moreDetailsErrorMessage = $('#more-details-error-message');
        moreDetailsServerMessage = $('.more-details-server-messages');
        moreDetailsWaitText = $('#more-details-wait-text');




        moreDetailsForm.on('submit' , function (event) {

            parent.defaults.preventFormSubmission(event);

            moreDetailsfieldsValues = [twitterUsername.val() , instagramUsername.val() , statusMessage.val()];

            isAllEmptyField = true;

            for (i = 0; i < moreDetailsfieldsValues.length;  ++i){
                if(!parent.defaults.isEmptyField(moreDetailsfieldsValues[i])){
                    isAllEmptyField = false;
                    break;
                }
            }


            if(!isAllEmptyField)
                isInstagramUsername = (parent.defaults.isEmptyField(instagramUsername.val()))? true :  parent.defaults.fieldValidator(instagramUsername , parent.defaults.words.instragramUsernameText , instagramUsername.val() , parent.defaults.constants.minInstagramUsernameLength , parent.defaults.constants.maxInstagramUsernameLength , parent.defaults.regularExpressions.instagramUsernameRegEx , instagramUsernameErrorSpan , true , parent.defaults.defaultInputParentClass);
                isTwitterUsername = (parent.defaults.isEmptyField(twitterUsername.val()))? true :  parent.defaults.fieldValidator(twitterUsername , parent.defaults.words.twitterUsernameText , twitterUsername.val() , parent.defaults.constants.mintwitterUsernameLength , parent.defaults.constants.maxTwitterUsernameLength , parent.defaults.regularExpressions.twitterUsernameRegEx , twitterUsernameErrorSpan , true , parent.defaults.defaultInputParentClass);
                isStatusMessage = (parent.defaults.isEmptyField(statusMessage.val()))? true :  parent.defaults.fieldValidator(statusMessage , parent.defaults.words.statusMessageText , statusMessage.val() , parent.defaults.constants.minStatusMessageLengthh , parent.defaults.constants.maxStatusMessageLength , parent.defaults.regularExpressions.statusMessageRegEx , statusMessageErrorSpan , true , parent.defaults.defaultInputParentClass);


                isValidInputDetails = isInstagramUsername && isTwitterUsername && isStatusMessage;


                if(isValidInputDetails)
                   moreDetailsFormFieldSet.prop("disabled" , true);
                    moreDetailsWaitText.css("display" , "block");
                    data = {"userID" : parent.userDetails["user_id"], "instagramUsername" : instagramUsername.val() , "twitterUsername" : twitterUsername.val() , "statusMessage" : statusMessage.val()};
                    data = JSON.stringify(data);

            $.post(parent.defaults.files.moreAccountDetailsFile, {data: data}).done(function (data, status) {


                data  = JSON.parse(data);

                //No error will be triggered , the reason why i didn't check for any possible error(s) whatsoever

                moreDetailsWaitText.hide();
                moreDetailsSuccessMessage.css("display" , "block");
                moreDetailsSuccessMessage.text(data[parent.defaults.jsonErrorText]);



            });







        });






        //Account Settings Form
        accountSettingsForm = $('#account-settings-form');
        accountSettingsFieldset = $('#account-settings-fieldset');
        errorMessagesClass = '.error-mgs';
        errorMessages = $(this.errorMessagesClass);

        fullname = $('#fullname');
        email = $('#email');
        username = $('#username');
        phone = $('#phone');
        password = $('#password');
        password2 = $('#password2');


        formGroupClass = '.col-md-4.inputGroupContainer';
        fullnameErrorSpan = $('#reg-form-name-error-span');

        emailErrorSpan = $('#reg-form-email-error-span');
        usernameErrorSpan = $('#reg-form-username-error-span');
        passwordErrorSpan = $('#reg-form-password-error-span');
        password2ErrorSpan = $('#reg-form-password2-error-span');
        phoneErrorSpan = $('#reg-form-phone-error-span');

        signupWaitText = $('#signup-wait-text');


        // Error messages
        signupErrorMessage = $('#signup_error_message');
        signupSuccessMessage = $('#signup_success_message');






        accountSettingsForm.on('submit' , function (e) {

            parent.defaults.preventFormSubmission(e);



            isFullname = parent.defaults.fieldValidator(fullname , parent.defaults.words.nameText , fullname.val() , parent.defaults.constants.fullnameMinLength
                , parent.defaults.constants.fullnameMaxLength , parent.defaults.regularExpressions.fullnameRegEx , fullnameErrorSpan , true);

            isEmail = parent.defaults.fieldValidator(email , parent.defaults.words.emailText , email.val() , parent.defaults.constants.minEmailLength , parent.defaults.constants.maxEmailLength , parent.defaults.regularExpressions.emailRegEx , emailErrorSpan , true , parent.defaults.defaultInputParentClass);

            isUsername = parent.defaults.fieldValidator(username , parent.defaults.words.usernameText , username.val() , parent.defaults.constants.minUsernameLength , parent.defaults.constants.maxUsernameLength , parent.defaults.regularExpressions.usernameRegEx , usernameErrorSpan , true , parent.defaults.defaultInputParentClass);
            isPassword = parent.defaults.fieldValidator(password , parent.defaults.words.passwordText , password.val() , parent.defaults.constants.minPasswordLength , parent.defaults.constants.maxPasswordLength , parent.defaults.regularExpressions.passwordRegEx , passwordErrorSpan , true , parent.defaults.defaultInputParentClass);


            var isPassword2 = function () {
                returnValue = false;
                if(isPassword && (password.val() == password2.val())){
                   password2ErrorSpan.text("");

                    returnValue = true;
                }
                else if (isPassword && parent.defaults.isEmptyField(password2.val())) {
                    returnValue = false;
                    password2ErrorSpan.text(parent.defaults.words.enterPasswordAgainText);
                }

                else if(isPassword && password.val() != password2.val()){
                    returnValue = false;
                    password2ErrorSpan.text(parent.defaults.words.passwordsDonotMatchText);

                }

                if(returnValue) {

                    password2.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasErrorInputClass);
                    password2.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasSuccessInputClass);

                    password2.removeClass(parent.defaults.defaultHasErrorInputClass);
                    password2.addClass(parent.defaults.defaultHasSuccessInputClass);

                }
                else {

                    password2.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                    password2.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);


                    password2.removeClass(parent.defaults.defaultHasSuccessInputClass);
                    password2.addClass(parent.defaults.defaultHasErrorInputClass);

                }

                return returnValue;
            };


            isPhone = parent.defaults.fieldValidator(phone , parent.defaults.words.contactText , phone.val() , parent.defaults.constants.minPhoneLength , parent.defaults.constants.maxPhoneLength , parent.defaults.regularExpressions.phoneRegEx , phoneErrorSpan , true , parent.defaults.defaultInputParentClass);


            isPassword = isPassword2();
            isValidDetails = isFullname && isEmail && isUsername && isPhone && isPassword;

            if(isValidDetails) {
                signupWaitText.css('display' , 'initial');

                signupErrorMessage.css('display' , 'none');
                signupErrorMessage.text('');

                data = {
                    "fullname": fullname.val(),
                    "email": email.val(),
                    "username": username.val(),
                    "phone": phone.val(),
                    "password": password2.val(),
                    "userID": parent.userDetails["user_id"]
                };
                data = JSON.stringify(data);

                $.post(parent.defaults.files.editAccountDetailsFile, {data: data}).done(function (data, status) {
                    signupWaitText.css('display' , 'none');


                    data = JSON.parse(data);

                    if(data[parent.defaults.jsonSuccessText] == "0") {
                        accountSettingsFieldset.prop('disabled' , false);

                        signupErrorMessage.css("display" , 'block');
                        signupErrorMessage.text(data.error);

                    }

                    else {

                        signupErrorMessage.css("display" , 'block');
                        signupErrorMessage.text(data.error);
                        setTimeout(function () {

                            window.location.href = "/";

                        } , 5000);


                    }


                });



            }





        });


        //Logout Link


        this.logoutActionLink = $('#logout-action-link');

        this.logoutActionLink.on('click' , function () {



            data = {"logout" :"1"};
            data = JSON.stringify(data);

            $.post(parent.defaults.files.logoutFile , {data : data}).done(function (data , status) {
                console.log(data);
                data = JSON.parse(data);

                if(data[parent.defaults.jsonSuccessText] == "1"){

                    window.location.href = "/";
                }


            });



        });




        isVerifiedEmail = (this.pageInformation.attr('data-verified-email') == "1");


        userProfileAgeSpan = $('#user-profile-age-span');
        age = moment().diff(this.userDetails.birthday , 'years' , false);
        userProfileAgeSpan.text(age);



        //Check for verified email

        if(!isVerifiedEmail){


            verificationEmail = this.userDetails.email;
            verificationFullname = this.userDetails.fullname;
            emailVerificationCode = this.userDetails.email_verification_code;


            emailNotVerifiedEmailContainer = $('#email-not-verified-warning-container');
            emailNotVerifiedWarningText = $('#email-not-verified-warning-text');

            resendVerificationLink = $('#resend-verification-link');

            data = {'email' : verificationEmail , 'fullname' : verificationFullname , 'emailVerificationCode' : emailVerificationCode};
            data = JSON.stringify(data);

            resendVerificationLink.on('click' , function (e) {



                emailNotVerifiedWarningText.text(emailNotVerifiedWarningText.attr("data-wait-text"));

                $.post(parent.defaults.files.resendVerificationLinkFile , {data : data}).done(function (data , status) {

                    

                    data = JSON.parse(data);

                        emailNotVerifiedWarningText.text(data.error);
                        emailNotVerifiedEmailContainer.fadeOut(7000);





                });
            });








        }







            //Bank Details Form

            bankDetailsForm = $('#bank-details-form');
            bankDetailsFieldset = $('#bank-details-fieldset');
            bankName = $('#bank-name');
            bankAccountName = $('#bank-account-name');
            bankAccountNumber = $('#bank-account-number');

            bankDetailsSuccessMessage = $('#bank-details-success-message');
            bankDetailsErrorMessage = $('#bank-details-error-message');

            bankNameErrorSpan = $('#bank-name-error-span');
            bankAccountNameErrorSpan = $('#bank-account-name-error-span');
            bankAccountNumberErrorSpan = $('#bank-account-number-error-span');

            bankDetailsWaitText = $('#bank-details-wait-text');

            bankDetailsServerMessages = $('.bank-details-server-messages');




            bankDetailsForm.on('submit' , function (e) {
                parent.defaults.preventFormSubmission(e);

                isBankName = function () {


                    bankNameValue  = $('#' + bankName.attr('id') + ' option:selected').attr('value');
                    returnValue = false;

                    if(bankNameValue == "") {
                        bankName.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                        bankName.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);


                        bankName.removeClass(parent.defaults.defaultHasSuccessInputClass);
                        bankName.addClass(parent.defaults.defaultHasErrorInputClass);
                        bankNameErrorSpan.text(parent.defaults.words.emptyBankNameText);

                    }

                    else {
                        bankName.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasErrorInputClass);
                        bankName.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasSuccessInputClass);

                        bankName.removeClass(parent.defaults.defaultHasErrorInputClass);
                        bankName.addClass(parent.defaults.defaultHasSuccessInputClass);

                        bankNameErrorSpan.text("");

                        returnValue = true;


                    }

                    return returnValue;

                };
                isBankName = isBankName();
                isBankAccountName = parent.defaults.fieldValidator(bankAccountName , parent.defaults.words.bankAccountNameText , bankAccountName.val() , parent.defaults.constants.fullnameMinLength
                    , parent.defaults.constants.fullnameMaxLength , parent.defaults.regularExpressions.fullnameRegEx , bankAccountNameErrorSpan , true);


                isBankAccountNumber = parent.defaults.fieldValidator(bankAccountNumber , parent.defaults.words.bankAccountNumberText , bankAccountNumber.val() , parent.defaults.constants.minBanAccountNumberLength , parent.defaults.constants.maxBankAccountNumberLength , parent.defaults.regularExpressions.bankAccountNumberRegEx , bankAccountNumberErrorSpan , true , parent.defaults.defaultInputParentClass);


                isValidBankDetails = isBankAccountName && isBankAccountNumber && isBankAccountNumber;


                if(isValidBankDetails) {

                  bankDetailsFieldset.prop("disabled" , true);
                    bankDetailsServerMessages.css("display" , "none");
                    bankDetailsWaitText.css("display" , "block");


                    bankNameValue  = $('#' + bankName.attr('id') + ' option:selected').attr('value');
                    data = {"currentAccountName" : parent.userDetails.account_name, "userID" : parent.userDetails.user_id ,  "bankName" : bankNameValue ,  "bankAccountName" : bankAccountName.val(), "bankAccountNumber" : bankAccountNumber.val() };
                    data = JSON.stringify(data);

                    $.post(parent.defaults.files.changeBankDetailsFile , {data : data}).done(function (data , status) {
                        bankDetailsWaitText.css('display' , 'none');

                        
                        data = JSON.parse(data);
                        if(data[parent.defaults.jsonSuccessText] == "1") {


                            bankDetailsSuccessMessage.css("display" , "block");
                            bankDetailsSuccessMessage.text(data[parent.defaults.jsonErrorText]);

                            bankDetailsSuccessMessage.fadeOut(7000);

                            return;
                        }


                        bankDetailsErrorMessage.css("display", "none");
                        bankDetailsErrorMessage.text(data[parent.defaults.jsonErrorText]);
                        bankDetailsFieldset.prop("diabled" , false);
                        return;

                        });


                }












    });
    }




    else {




            this.loginWarning = $('#login-warning');


        now = new Date();

        day = ("0" + now.getDate()).slice(-2);
        month = ("0" + (now.getMonth() + 1)).slice(-2);

        today = (day)+"-"+(month)+"-"+ now.getFullYear();













                      this.formWaitTexts = $('.form-wait-texts');
                      this.loginWaitText = $('#login-wait-text');
                      this.signupWaitText = $('#signup-wait-text');

                      this.formAlertMessages = $('.alert');



                      this.signupForm = $('#signup-form');
                      this.signupFieldSet = $('#signup-fieldset');
                      this.fullname = $('#fullname');
                      this.birthday = $('#birthday');
                      this.gender = $('#gender');
                      this.email = $('#email');
                      this.username = $('#username');
                      this.password = $('#password');
                      this.password2 = $('#password2');
                      this.phone = $('#phone');
                      this.signupFormButton = $('#signup-form-button');
                      this.showSignupFormSpan = $('#show-signup-form-span');
                      this.birthday.val(today);


                      this.errorMessagesClass = '.error-mgs';
                      this.errorMessages = $(this.errorMessagesClass);
                      this.formGroupClass = '.col-md-4.inputGroupContainer';
                      this.fullnameErrorSpan = $('#reg-form-name-error-span');
                      this.birthdayErrorSpan = $('#reg-form-birthday-error-span');
                      this.genderErrorSpan = $('#reg-form-gender-error-span');
                      this.emailErrorSpan = $('#reg-form-email-error-span');
                      this.usernameErrorSpan = $('#reg-form-username-error-span');
                      this.passwordErrorSpan = $('#reg-form-password-error-span');
                      this.password2ErrorSpan = $('#reg-form-password2-error-span');
                      this.phoneErrorSpan = $('#reg-form-phone-error-span');


                      // Error messages
                      this.signupErrorMessage = $('#signup_error_message');
                      this.signupSuccessMessage = $('#signup_success_message');


// Forgot Password


        this.forgotPasswordForm = $('#forgot-password-form');
        this.forgotPasswordFormFieldSet = $('#forgot-password-fieldset');
        this.forgotPasswordUsername = $('#forgot-password-username');
        this.forgotPasswordErrorMessage = $('#forgot-password-error-message');
        this.forgotPasswordSuccessMessage = $('#forgot-password-success-message');
        this.forgotPasswordFormUsernameErrorSpan = $('#forgot-password-form-username-error-span');
        this.forgotPasswordWaitText = $('#forgot-password-wait-text');





        this.forgotPasswordForm.on('submit' , function (e) {

            parent.defaults.preventFormSubmission(e);
            loginType = "username";








            isUsername =  parent.defaults.fieldValidator(parent.forgotPasswordUsername , parent.defaults.words.usernameText , parent.forgotPasswordUsername.val() , parent.defaults.constants.minUsernameLength , parent.defaults.constants.maxUsernameLength , parent.defaults.regularExpressions.usernameRegEx , parent.forgotPasswordFormUsernameErrorSpan , true , parent.defaults.defaultInputParentClass);



            if(!isUsername) {
                loginType = "email";
                isUsername = parent.defaults.fieldValidator(parent.forgotPasswordUsername , parent.defaults.words.emailText , parent.forgotPasswordUsername.val() , parent.defaults.constants.minEmailLength , parent.defaults.constants.maxEmailLength , parent.defaults.regularExpressions.emailRegEx , parent.forgotPasswordFormUsernameErrorSpan , true , parent.defaults.defaultInputParentClass);

            }


            if(isUsername){
                parent.forgotPasswordWaitText.css('display' , 'block');

              parent.forgotPasswordFormFieldSet.prop("disabled" , true);

                data = {"username" : parent.forgotPasswordUsername.val() , "loginType" : loginType};
                data = JSON.stringify(data);


                parent.formAlertMessages.css('display' , 'none');

                $.post(parent.defaults.files.forgotPasswordFile , {data : data}).done(function (data , status) {
                    parent.forgotPasswordWaitText.css('display' , 'none');

                    data = JSON.parse(data);

                    if(data[parent.defaults.jsonSuccessText] == "1") {

                        parent.forgotPasswordSuccessMessage.css('display' , 'block');
                        parent.forgotPasswordSuccessMessage.html(data[parent.defaults.jsonErrorText]);

                        setTimeout(function () {

                            window.location.href =  "/";

                        }, 3000);

                        return;
                    }


                        parent.forgotPasswordFormFieldSet.prop("disabled" , false);
                        parent.forgotPasswordErrorMessage.css("display" , "block");
                        parent.forgotPasswordErrorMessage.text(data[parent.defaults.jsonErrorText]);

                        return;







                });


            }


        });














                     //Login


                      this.loginForm = $('#login-form');
                      this.loginFormFieldSet = $('#login-form-fieldset');


                      this.loginUsername = $('#login-username');
                      this.loginFormUsernameErrorSpan = $('#login-form-username-error-span');










                      this.loginPassword = $('#login-password');
                      this.loginFormPasswordErrorSpan = $('#login-form-password-error-span');

                      this.loginErrorMessage = $('#login-error-message');
                      this.loginSuccessMessage = $('#login-success-message');
                      this.rememberMe = $('#remember-me');







                      this.loginForm.on('submit' , function (e) {

                          parent.defaults.preventFormSubmission(e);

                          loginType = "username";





                          isUsername =  parent.defaults.fieldValidator(parent.loginUsername , parent.defaults.words.usernameText , parent.loginUsername.val() , parent.defaults.constants.minUsernameLength , parent.defaults.constants.maxUsernameLength , parent.defaults.regularExpressions.usernameRegEx , parent.loginFormUsernameErrorSpan , true , parent.defaults.defaultInputParentClass);
                          isPassword = parent.defaults.fieldValidator(parent.loginPassword , parent.defaults.words.passwordText , parent.loginPassword.val() , parent.defaults.constants.minPasswordLength , parent.defaults.constants.maxPasswordLength , parent.defaults.regularExpressions.passwordRegEx , parent.loginFormPasswordErrorSpan , true , parent.defaults.defaultInputParentClass);

                          if(!isUsername) {
                              loginType = "email";
                              isUsername = parent.defaults.fieldValidator(parent.loginUsername , parent.defaults.words.emailText , parent.loginUsername.val() , parent.defaults.constants.minEmailLength , parent.defaults.constants.maxEmailLength , parent.defaults.regularExpressions.emailRegEx , parent.loginFormUsernameErrorSpan , true , parent.defaults.defaultInputParentClass);

                          }

                          if(isUsername && isPassword) {

                              parent.formAlertMessages.css('display' , 'none');
                              parent.loginFormFieldSet.prop('disabled' , true);
                              parent.loginWaitText.css('display' , 'block');

                              rememberMe = (parent.rememberMe.prop('checked'))?"1" :"0";
                              data = {'username' : parent.loginUsername.val() , 'rememberMe' : rememberMe , 'password' : parent.loginPassword.val(), 'loginType' : loginType};
                              data = JSON.stringify(data);


                              $.post(parent.defaults.files.loginFile , {data : data}).done(function (data , status) {
                                  parent.loginWaitText.css('display' , 'none');

                                  data = JSON.parse(data);
                                  if(data[parent.defaults.jsonSuccessText] == "1") {

                                      parent.loginSuccessMessage.css('display' , 'block');
                                      parent.loginSuccessMessage.text(data[parent.defaults.jsonErrorText]);

                                        setTimeout(function () {

                                            window.location.href =  "/";

                                        }, 5000);
                                        return;

                                  }


                                      parent.loginFormFieldSet.prop("disabled" , false);
                                      parent.loginErrorMessage.css("display" , "block");
                                      parent.loginErrorMessage.text(data[parent.defaults.jsonErrorText]);







                              });
                              }


                      });





                      //Toggle the Login and Signup Forms
                       this.newUserForms  = $('.new-user-forms');
                       this.toggleLoginForms = $('.toggle-login-forms');


                       this.toggleLoginForms.on('click' , function () {

                           formToShow = $(this).attr('data-show');
                           parent.newUserForms.css('display' , 'none');

                           $(formToShow).css('display' , 'block')

                       });









        // Signup handler for Non-logged users
        this.signupForm.on('submit' , function (e) {


                          parent.defaults.preventFormSubmission(e);




                      isFullname = parent.defaults.fieldValidator(parent.fullname , parent.defaults.words.nameText , parent.fullname.val() , parent.defaults.constants.fullnameMinLength
                          , parent.defaults.constants.fullnameMaxLength , parent.defaults.regularExpressions.fullnameRegEx , parent.fullnameErrorSpan , true);


                      var isBirthday =  function () {
                          returnValue = false;
                          if(parent.defaults.isEmptyField(parent.birthday.val())) {
                              parent.birthdayErrorSpan.text(parent.defaults.words.emptyBirthDayText);

                          }


                          else if(moment/* from moment.js*/(parent.birthday.val(), 'YYYY-MM-DD',true).isValid()){


                              //Get the person's age with moment.js

                              age = moment().diff(parent.birthday.val() , 'years' , false);

                              if(age >= parent.defaults.minimumAgeForRegistration) {
                                  parent.birthday.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasErrorInputClass);
                                  parent.birthday.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasSuccessInputClass);


                                  parent.birthday.removeClass(parent.defaults.defaultHasErrorInputClass);
                                  parent.birthday.addClass(parent.defaults.defaultHasSuccessInputClass);
                                  parent.birthdayErrorSpan.text("");


                                  returnValue = true;

                              }


                              else {
                                  parent.birthday.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                                  parent.birthday.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);
                                  parent.birthday.removeClass(parent.defaults.defaultHasSuccessInputClass);
                                  parent.birthday.addClass(parent.defaults.defaultHasErrorInputClass);
                                  parent.birthdayErrorSpan.text(parent.defaults.words.birthdayIsLessThan18YearsText);


                              }



                          }

                          else {

                              parent.birthday.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                              parent.birthday.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);
                              parent.birthday.removeClass(parent.defaults.defaultHasSuccessInputClass);
                              parent.birthday.addClass(parent.defaults.defaultHasErrorInputClass);
                              parent.birthdayErrorSpan.text(parent.defaults.words.invalidBirthdayText);
                              returnValue = false;

                          }

                          return returnValue;
                      };

                      var isGender = function () {


                          gender = $('#' + this.parent.gender.attr('id') + ' option:selected').attr('value');
                          returnValue = false;

                          if(gender == "") {
                              parent.gender.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                              parent.gender.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);


                              parent.gender.removeClass(parent.defaults.defaultHasSuccessInputClass);
                              parent.gender.addClass(parent.defaults.defaultHasErrorInputClass);
                              parent.genderErrorSpan.text(parent.defaults.words.emptyGenderText);

                          }

                          else {
                              parent.gender.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasErrorInputClass);
                              parent.gender.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasSuccessInputClass);

                              parent.gender.removeClass(parent.defaults.defaultHasErrorInputClass);
                              parent.gender.addClass(parent.defaults.defaultHasSuccessInputClass);

                              parent.genderErrorSpan.text("");

                              returnValue = true;


                          }

                          return returnValue;

                          };

                      isEmail = parent.defaults.fieldValidator(parent.email , parent.defaults.words.emailText , parent.email.val() , parent.defaults.constants.minEmailLength , parent.defaults.constants.maxEmailLength , parent.defaults.regularExpressions.emailRegEx , parent.emailErrorSpan , true , parent.defaults.defaultInputParentClass);

                      isUsername = parent.defaults.fieldValidator(parent.username , parent.defaults.words.usernameText , parent.username.val() , parent.defaults.constants.minUsernameLength , parent.defaults.constants.maxUsernameLength , parent.defaults.regularExpressions.usernameRegEx , parent.usernameErrorSpan , true , parent.defaults.defaultInputParentClass);
                      isPassword = parent.defaults.fieldValidator(parent.password , parent.defaults.words.passwordText , parent.password.val() , parent.defaults.constants.minPasswordLength , parent.defaults.constants.maxPasswordLength , parent.defaults.regularExpressions.passwordRegEx , parent.passwordErrorSpan , true , parent.defaults.defaultInputParentClass);


                      var isPassword2 = function () {
                          returnValue = false;
                          if(isPassword && (parent.password.val() == parent.password2.val())){
                              parent.password2ErrorSpan.text("");

                              returnValue = true;
                          }
                          else if (isPassword && parent.defaults.isEmptyField(parent.password2.val())) {
                              returnValue = false;
                              parent.password2ErrorSpan.text(parent.defaults.words.enterPasswordAgainText);
                          }

                          else if(isPassword && parent.password.val() != parent.password2.val()){
                              returnValue = false;
                              parent.password2ErrorSpan.text(parent.defaults.words.passwordsDonotMatchText);

                          }

                          if(returnValue) {

                              parent.password2.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasErrorInputClass);
                              parent.password2.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasSuccessInputClass);

                              parent.password2.removeClass(parent.defaults.defaultHasErrorInputClass);
                              parent.password2.addClass(parent.defaults.defaultHasSuccessInputClass);

                          }
                          else {

                              parent.password2.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                              parent.password2.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);


                              parent.password2.removeClass(parent.defaults.defaultHasSuccessInputClass);
                              parent.password2.addClass(parent.defaults.defaultHasErrorInputClass);

                          }

                          return returnValue;
                          };


                      isPhone = parent.defaults.fieldValidator(parent.phone , parent.defaults.words.contactText , parent.phone.val() , parent.defaults.constants.minPhoneLength , parent.defaults.constants.maxPhoneLength , parent.defaults.regularExpressions.phoneRegEx , parent.phoneErrorSpan , true , parent.defaults.defaultInputParentClass);

                      isBirthday = isBirthday();
                      isGender = isGender();
                      isPassword2 = isPassword2();

                      isValidDetails = isFullname && isBirthday && isGender && isEmail && isUsername &&  isPassword2 &&  isPhone;


                      if(isValidDetails){
                          parent.signupWaitText.css('display' , 'initial');

                          parent.signupErrorMessage.css('display' , 'none');
                          parent.signupErrorMessage.text('');
                          parent.signupFieldSet.prop('disabled' , true);
                          gender = $('#' + parent.gender.attr('id')+ " option:selected").attr('value');
                          data = {'fullname' : $.trim(parent.fullname.val()) , 'birthday' : parent.birthday.val() ,  'email' : $.trim(parent.email.val()) ,
                              'gender' : gender , 'username' : parent.username.val() , 'password' : parent.password.val() , 'phone' :
                                  parent.phone.val()};

                          data = JSON.stringify(data);


                          $.post(parent.defaults.files.registrationFile , {data : data}).done(function (data , status) {
                              parent.signupWaitText.css('display' , 'none');


                              data = JSON.parse(data);

                              if(data[parent.defaults.jsonSuccessText] == "0") {
                                  parent.signupFieldSet.prop('disabled' , false);

                                  parent.signupErrorMessage.css("display" , 'block');
                                  parent.signupErrorMessage.text(data.error);

                              }

                              else {

                                  parent.signupErrorMessage.css("display" , 'block');
                                  parent.signupErrorMessage.text(data.error);
                                  setTimeout(function () {

                                      window.location.href = "/";

                                  } , 5000);


                              }
                          return false;

                          });


                              }

                      else {

                      }



                      });


    }



    emailAboutToBeVerified = (parent.pageInformation.attr('data-email-about-to-be-verified') == 1);
    accountAboutToBeRecovered = (parent.pageInformation.attr('data-account-about-to-be-recovered') == 1);
    bankDetailsAboutToBeChanged = (parent.pageInformation.attr('data-bank-details-about-to-be-changed') == 1);

    if(bankDetailsAboutToBeChanged){

        bankDetailsChangedContainer = $('#bank-details-changed-container');

        bankDetailsChangedContainer.fadeOut(5000 , function () {

            window.location.href = "/";
        });
    }

    if(emailAboutToBeVerified){

        emailVerifiedWarningContainer = $('#email-verified-warning-container');


        emailVerifiedWarningContainer.fadeOut(6000 , function () {

            window.location.href = "/";

        });

    }



    //Account Recovery


    else if(accountAboutToBeRecovered){
        passwordResetModal = $('#password-reset-modal');
        passwordResetModal.modal('show');



        passwordResetForm = $('#password-reset-form');


        passwordResetFormFieldset = $('#password-reset-form-fieldset');

        passwordReset = $('#password-reset');
        password2Reset = $('#password2-reset');


        resetPasswordErrorSpan = $('#reset-password-error-span');

        resetPassword2ErrorSpan = $('#reset-password2-error-span');

        resetPasswordSuccessMessage = $('#reset-password-success-message');
        resetPasswordErrorMessage = $('#reset-password-error-message');



        resetPasswordWaitText = $('#reset-password-wait-text');

        passwordResetAlert = $('.password-reset-alert');
        passwordResetForm.on('submit' , function (e) {


            parent.defaults.preventFormSubmission(e);

            passwordResetFormFieldset.prop("disabled" , false);
            passwordResetAlert.css("display" , "none");




            isPassword = parent.defaults.fieldValidator(passwordReset , parent.defaults.words.passwordText , passwordReset.val() , parent.defaults.constants.minPasswordLength , parent.defaults.constants.maxPasswordLength , parent.defaults.regularExpressions.passwordRegEx , resetPasswordErrorSpan , true , parent.defaults.defaultInputParentClass);



            var isPassword2 = function () {
                returnValue = false;
                if(isPassword && (passwordReset.val() == password2Reset.val())){
                    resetPassword2ErrorSpan.text("");

                    returnValue = true;
                }
                else if (isPassword && parent.defaults.isEmptyField(password2Reset.val())) {
                    returnValue = false;
                    resetPassword2ErrorSpan.text(parent.defaults.words.enterPasswordAgainText);
                }

                else if(isPassword && passwordReset.val() != password2Reset.val()){
                    returnValue = false;
                    parent.resetPassword2ErrorSpan.text(parent.defaults.words.passwordsDonotMatchText);

                }

                if(returnValue) {

                    password2Reset.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasErrorInputClass);
                    password2Reset.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasSuccessInputClass);

                    password2Reset.removeClass(parent.defaults.defaultHasErrorInputClass);
                    password2Reset.addClass(parent.defaults.defaultHasSuccessInputClass);

                }
                else {

                    password2Reset.parent('.' + parent.defaults.defaultInputParentClass).removeClass(parent.defaults.defaultHasSuccessInputClass);
                    password2Reset.parent('.' + parent.defaults.defaultInputParentClass).addClass(parent.defaults.defaultHasErrorInputClass);


                    password2Reset.removeClass(parent.defaults.defaultHasSuccessInputClass);
                    password2Reset.addClass(parent.defaults.defaultHasErrorInputClass);

                }

                return returnValue;
            };


            isPassword2 = isPassword2();


            if(isPassword2) {
                resetPasswordWaitText.css("display" , "block");
                passwordResetFormFieldset.prop("disabled" , true);

                data = {"username" : passwordReset.attr("data-username") , "password" : passwordReset.val()};
                data = JSON.stringify(data);


                $.post(parent.defaults.files.passwordResetFile , {data : data}).done(function (data , status) {

                    
                    data = JSON.parse(data);
                    if(data[parent.defaults.jsonSuccessText] == "1"){


                        resetPasswordWaitText.css("display" , "none");
                        resetPasswordSuccessMessage.css("display" , "block");
                        resetPasswordSuccessMessage.text(data[parent.defaults.jsonErrorText]);

                        setTimeout(function () {

                            window.location.href = "/";
                        } , 5000);

                        return
                    }


                    resetPasswordWaitText.css("display" , "none");
                    resetPasswordErrorMessage.css("display" , "block");
                    resetPasswordErrorMessage.text(data[parent.defaults.jsonErrorText]);
                    return;



                });
            }
        });



    }




}



