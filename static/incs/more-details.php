
<!--Signup form -->

<form class="well left form-horizontal"  action="#" method="post"  id="more-details-form">
    <fieldset id = "more-details-form-fieldset">
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <h3 class="text-left">Social Details</h3>
                <p>We are social. Share your Profile with Members</p>
            </div>
        </div>
        <!-- Form Name -->
        <!-- <legend><center><h2><b>Registration Form</b></h2></center></legend><br> -->

        <!-- Text input-->




        <div class="form-group">
            <label class="col-md-4 control-label" for="facebook-name">Instagram username</label>
            <div class="col-md-4 selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                    <input value="<?php echo  ($HomePage->loggedInUserDetails["instagram_account"] == '0' ) ? "" : $HomePage->loggedInUserDetails['instagram_account']  ?>" id="instagram-username" name="instagram-username" placeholder="<?php echo  $HomePage->WebsiteDetails->SiteName?>" class="form-control"  type="text" />

                </div>
                <span id="instagram-username-error-span" class="error-mgs"></span>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="fullname">Twitter username</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                    <input value="<?php echo  ($HomePage->loggedInUserDetails["twitter_account"] == '0' ) ? "" : $HomePage->loggedInUserDetails['twitter_account']  ?>" id="twitter-username" name="twitter-username" placeholder="<?php echo  $HomePage->WebsiteDetails->SiteName?>" class="form-control"  type="text" />
                </div>
                <span id="twitter-username-error-span" class="error-mgs"></span>
            </div>
        </div>



        <!-- Birth day -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="status-message">Status msg(Max. 140)</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                    <input value="<?php echo  ($HomePage->loggedInUserDetails["status_text"] == '0' ) ? "" : $HomePage->loggedInUserDetails['status_text']  ?>" name="status-message" placeholder="Enter your status" class="form-control"  id="status-message" type="text" />
                </div>
                <span id="status-message-error-span" class="error-mgs"></span>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <span id="more-details-wait-text" class="form-wait-texts">Please wait....</span>

            </div>
        </div>
        <div class="alert alert-success more-details-server-messages" role="alert" id="more-details-success-message"></div>
        <div class="alert alert-info more-details-server-messages" role="alert" id="more-details-error-message"></div>


        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <button type="submit" id="signup-form-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-check"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            </div>
        </div>

    </fieldset>
</form>
<!--Signup form -->