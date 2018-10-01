<!--Forgot password -->




<!--Signup form -->

<form   class="well left form-horizontal new-user-forms"  action="#" method="post"  id="account-settings-form" autocomplete="on">
    <fieldset id="account-settings-fieldset">
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <h3 class="text-left">Update your account Details</h3>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="fullname">Full Name</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="fullname" name="fullname" value="<?php echo  $HomePage->loggedInUserDetails["fullname"];?>" placeholder="John Doe" class="form-control"  type="text">
                </div>
                <span id="reg-form-name-error-span" class="error-mgs"></span>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">E-Mail</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input name="email" id="email"  placeholder="username@domain.com" value="<?php echo $HomePage->loggedInUserDetails["email"]; ?>" class="form-control"  type="text">
                </div>
                <span id="reg-form-email-error-span" class="error-mgs"></span>
            </div>
        </div>



        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="username">Username</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input value="<?php echo $HomePage->loggedInUserDetails["username"]; ?>"  name="username" id="username"  placeholder="style3" class="form-control"  type="text">
                </div>
                <span id="reg-form-username-error-span" class="error-mgs"></span>
            </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
            <label  class="col-md-4 control-label" for="phone">Contact No.</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                    <input value="<?php echo $HomePage->loggedInUserDetails["phone"]; ?>" name="phone" placeholder="(234)"  class="form-control" type="text" id="phone">
                </div>
                <span id="reg-form-phone-error-span" class="error-mgs"></span>
            </div>
        </div>


        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="password" >Password</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input name="password" placeholder="*******" id="password"  class="form-control"  type="password">
                </div>
                <span id="reg-form-password-error-span" class="error-mgs"></span>
            </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="password2">Confirm Password</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input name="password2"  placeholder="*******" id="password2" class="form-control"  type="password">
                </div>
                <span id="reg-form-password2-error-span" class="error-mgs"></span>
            </div>
        </div>




        <!-- Select Basic -->

        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="signup_success_message"></div>
        <div class="alert alert-info" role="alert" id="signup_error_message"></div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <span id="signup-wait-text" class="form-wait-texts">Please wait....</span>

            </div>
        </div>



        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <button type="submit" id="edit-form-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-check"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                <span  class="toggle-login-forms login" data-show = '#login-form' id="logout-action-link">Wanna switch account? Logout</span>
            </div>
        </div>

    </fieldset>
</form>
<!--Signup form -->
