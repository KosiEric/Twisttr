
<!--Signup form -->

<form class="well left form-horizontal"  action="#" method="post"  id="bank-details-form">
    <fieldset disabled="disabled">
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <h3 class="text-left">Bank Details</h3>
                <p>Enter your bank account details</p>
            </div>
        </div>
        <!-- Form Name -->
        <!-- <legend><center><h2><b>Registration Form</b></h2></center></legend><br> -->

        <!-- Text input-->




        <div class="form-group">
            <label class="col-md-4 control-label" for="bank-name">Bank Name</label>
            <div class="col-md-4 selectContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-bank"></i></span>
                    <select name="bank-name" id="bank-name" class="form-control selectpicker">
                        <?php foreach ($HomePage->WebsiteDetails->Banks as $bank) {

                            echo "<option value='$bank'>$bank</option>";

                        }?>
                    </select>
                </div>
                <span id="reg-form-gender-error-span" class="error-mgs"></span>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="fullname">Account Name</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="bank-account-name" name="bank-account-name" placeholder="John Doe" class="form-control"  type="text">
                </div>
                <span id="reg-form-name-error-span" class="error-mgs"></span>
            </div>
        </div>



        <!-- Birth day -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="bank-account-number">Account Number</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                    <input  name="bank-account-number" placeholder="2093954338" class="form-control"  id="bank-account-number" type="text" />
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