
<!--Signup form -->

<form class="well left form-horizontal"  action="#" method="post"  id="bank-details-form">
    <fieldset id = "bank-details-fieldset"<?php echo ($HomePage->loggedInUserDetails["bank_name"] != 0)?"disabled='disabled'" :""?>>
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
                    <select name="bank-name" id="bank-name" class="form-control selectpicker" autocomplete="off">
                        <option value="" <?php echo ($HomePage->loggedInUserDetails["bank_name"] == "0")?"selected" : ""; ?>>Select your bank</option>
                        <?php foreach ($HomePage->WebsiteDetails->Banks as $bank) {
                            $selected_text = ($HomePage->loggedInUserDetails["bank_name"] == $bank)?"selected" : "";

                            echo "<option value='$bank' $selected_text>$bank</option>";

                        }?>
                    </select>
                </div>
                <span id="bank-name-error-span" class="error-mgs"></span>
            </div>
        </div>


        <div class="form-group">
            <label class="col-md-4 control-label" for="bank-account-name">Account Name</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input id="bank-account-name" value='<?php echo ($HomePage->loggedInUserDetails["account_name"] == "0") ? "": ucwords($HomePage->loggedInUserDetails['account_name']); ?>' name="bank-account-name" placeholder="John Doe" class="form-control"  type="text" />
                </div>
                <span id="bank-account-name-error-span" class="error-mgs"></span>
            </div>
        </div>



        <!-- Birth day -->

        <div class="form-group">
            <label class="col-md-4 control-label" for="bank-account-number">Account Number</label>
            <div class="col-md-4 inputGroupContainer">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-hashtag"></i></span>
                    <input  name="bank-account-number" placeholder="2093954344" value='<?php echo ($HomePage->loggedInUserDetails["account_number"] == 0)? "": $HomePage->loggedInUserDetails['account_number'] ?>' class="form-control"  id="bank-account-number" type="text" />
                </div>
                <span id="bank-account-number-error-span" class="error-mgs"></span>
            </div>
        </div>



        <div class="alert alert-success bank-details-server-messages" role="alert" id="bank-details-success-message"></div>
        <div class="alert alert-info bank-details-server-messages" role="alert" id="bank-details-error-message"></div>

        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <span id="bank-details-wait-text" class="form-wait-texts">Please wait....</span>

            </div>
        </div>        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label"></label>
            <div class="col-md-4"><br>
                <button type="submit" id="signup-form-button" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSave&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span class="fa fa-check"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
            </div>
        </div>




    </fieldset>
</form>
<!--Signup form -->