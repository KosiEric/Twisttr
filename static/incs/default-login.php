<!--Forgot password -->
<form class="well left form-horizontal new-user-forms" accept-charset="utf-8" method="post" action="#" id = "forgot-password-form">
    <fieldset id="forgot-password-fieldset">
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <h3 class="text-left">Forgot password?</h3>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="forgot-password-username">Username</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input  name="username" id="forgot-password-username" placeholder="username or email" class="form-control"  type="text" />
                </div>
                <span id="forgot-password-form-username-error-span" class="error-mgs"></span>
            </div>
        </div>


        <div class="alert alert-success" role="alert" id="forgot-password-success-message"></div>
        <div class="alert alert-info" role="alert" id="forgot-password-error-message"></div>


        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <span id="forgot-password-wait-text" class="form-wait-texts">Please wait....</span>

            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <button type="submit" id="forgot-password-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSearch&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-search"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                <span  class="toggle-login-forms signup" data-show = "#signup-form">Don't have an account? signup</span>
            </div>
        </div>


    </fieldset>
</form>
<!--Forgot Password -->































<!--Login form -->
<form class="well left form-horizontal new-user-forms" action="#" id="login-form" method="post" accept-charset="utf-8">
    <fieldset id = "login-form-fieldset">

        <!--Loging Text -->


        <div class="form-group login-text">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <h3 class="text-left">Login your account</h3>
            </div>
        </div>


        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <span class="toggle-login-forms forgot" data-show="#forgot-password-form">Forgot password?</span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="login-username">Username</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input  name="username" id="login-username" placeholder="username or email" class="form-control"  type="text">
                </div>
                <span id="login-form-username-error-span" class="error-mgs"></span>
            </div>
        </div>

        <!-- Text input-->

        <div class="form-group">
            <label class="col-md-4 control-label" for="login-password">Password</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input name="password" placeholder="*******" id="login-password" class="form-control"  type="password" />
                </div>

                <span id="login-form-password-error-span" class="error-mgs"></span>
            </div>
        </div>


        <div class="alert alert-success" role="alert" id="login-success-message"></div>
        <div class="alert alert-info" role="alert" id="login-error-message"></div>


        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <span id="login-wait-text" class="form-wait-texts">Please wait....</span>


                <!-- Remember checkbox -->

                <input type="checkbox" id="remember-me" checked="checked" />
                <label for="remember-me">Remember me</label>

            </div>
        </div>





        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <button type="submit" id="login-form-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOk&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-check"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                <span id="show-signup-form-span" class="toggle-login-forms signup" data-show="#signup-form">Don't have an account? Signup</span>
            </div>
        </div>


    </fieldset>
</form>
<!--Login form -->




















<!--Signup form -->

    <form   class="well left form-horizontal new-user-forms"  action="#" method="post"  id="signup-form" autocomplete="on">
        <fieldset id="signup-fieldset">
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4"><br>
                    <h3 class="text-left">Create an account</h3>
                </div>
            </div>
            <!-- Form Name -->
           <!-- <legend><center><h2><b>Registration Form</b></h2></center></legend><br> -->

            <!-- Text input-->

            <div class="form-group">
                <label class="col-md-4 control-label" for="fullname">Full Name</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input id="fullname" name="fullname" value="" placeholder="John Doe" class="form-control"  type="text">
                    </div>
                    <span id="reg-form-name-error-span" class="error-mgs"></span>
                </div>
            </div>



            <!-- Birth day -->

            <div class="form-group">
                <label class="col-md-4 control-label" for="birthday">Birthday</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input  name="birthday" placeholder="" class="form-control" required pattern="[0-9]{4}/[0-9]{2}/[0-9]{2}" value="17/18/1996" id="birthday" type="date" />
                    </div>
                    <span id="reg-form-birthday-error-span" class="error-mgs"></span>
                </div>
            </div>




            <div class="form-group">
                <label class="col-md-4 control-label" for="gender">Gender / Sex</label>
                <div class="col-md-4 selectContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-genderless"></i></span>
                        <select name="gender" id="gender" class="form-control selectpicker">
                            <option value="">Select your gender</option>
                            <option value="m">Male</option>
                            <option value="f">Female</option>
                            <option value="o">Other</option>
                        </select>
                    </div>
                    <span id="reg-form-gender-error-span" class="error-mgs"></span>
                </div>
            </div>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="email">E-Mail</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input name="email" id="email"  placeholder="username@domain.com" class="form-control"  type="text">
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
                        <input  name="username" id="username"  placeholder="style3" class="form-control"  type="text">
                    </div>
                    <span id="reg-form-username-error-span" class="error-mgs"></span>
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



            <!-- Text input-->

            <div class="form-group">
                <label  class="col-md-4 control-label" for="phone">Contact No.</label>
                <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-mobile-phone"></i></span>
                        <input name="phone" placeholder="(234)"  class="form-control" type="text" id="phone">
                    </div>
                    <span id="reg-form-phone-error-span" class="error-mgs"></span>
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
                    <button type="submit" id="signup-form-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOk&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-check"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
                    <span  class="toggle-login-forms login" data-show = '#login-form'>Already have an account? Login</span>
                </div>
            </div>

        </fieldset>
    </form>
<!--Signup form -->
