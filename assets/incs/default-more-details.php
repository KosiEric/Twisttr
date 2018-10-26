
<!--Signup form -->

<form class="well left form-horizontal"  action="#" method="post"  id="more-details-form">
    <fieldset disabled="disabled">
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
            <label class="col-md-4 control-label" for="facebook-name">Facebook Name</label>
            <div class="col-md-4 selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-facebook-f"></i></span>
                    <input id="facebook-name" name="facebook-name" placeholder="<?php echo  $HomePage->WebsiteDetails->SiteName?>" class="form-control"  type="text" />

                </div>
                <span id="reg-form-gender-error-span" class="error-mgs"></span>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="fullname">Twitter username</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-at"></i></span>
                    <input id="twitter-username" name="twitter-username" placeholder="<?php echo  $HomePage->WebsiteDetails->SiteName?>" class="form-control"  type="text" />
                </div>
                <span id="reg-form-name-error-span" class="error-mgs"></span>
            </div>
        </div>



        <!-- Birth day -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="status-message">Status msg(Max. 140)</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                    <input  name="status-message" placeholder="Enter your status" class="form-control"  id="status-message" type="text" />
                </div>
                <span id="reg-form-birthday-error-span" class="error-mgs"></span>
            </div>
        </div>




        <!-- Success message -->
        <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <button type="submit" id="signup-form-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspOk&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-check"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            </div>
        </div>

    </fieldset>
</form>
<!--Signup form -->