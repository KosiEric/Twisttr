<div class="modal fade" id="fund-account-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                <h4 class="modal-title" id="myModalLabel">Select any of the options</h4>

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#fundTab" aria-controls="uploadTab" role="tab" data-toggle="tab">Fund</a>

                        </li>
                        <li role="presentation"><a href="#withdrawTab" aria-controls="browseTab" role="tab" data-toggle="tab">Withdraw</a>

                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="fundTab">

<!--Password Twisttr@p1 -->
<!--paystack key sk_test_fbced60e604b7a4bcdf0cea2aea7c9a77f535914 -->

    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-money"></i> </span>
        <select name="fund-account-amount-options" id="fund-account-amount-options" class="form-control selectpicker">
            <option value="100">&#8358; 100</option>
            <option value="200">&#8358; 200</option>
            <option value="500">&#8358; 500</option>
            <option value="1000">&#8358; 1,000</option>


        </select>

    </div>


    <!-- Button -->
    <div class="control-group">
        <label class="control-label" for="signin"></label>
        <div class="controls">
            <button id="fund-account-action-button" name="signin" class="btn btn-success">Pay</button>
        </div>
    </div>





                        </div>
                        <div role="tabpanel" class="tab-pane" id="withdrawTab">

<form id="withdraw-form" enctype="application/x-www-form-urlencoded">
    <?php $can_withdraw = ($HomePage->loggedInUserDetails["account_balance"] >= $HomePage->WebsiteDetails->minimumWithdrawalAmount) ? true : false;?>
       <fieldset id = "withdraw-form-fieldset" <?php echo ($can_withdraw && $HomePage->loggedInUserDetails["bank_name"] == '0')? "disabled = 'diabled'" : "" ?> <?php echo (!$can_withdraw)? "disabled='disabled'" : "";?>>
                           <label for="withdraw-amount">Amount</label>
                            <div class="input-group">
                                <span class="input-group-addon">&#8358;</span>
                                <input type="text" name="withdraw-fund-amount" id="withdraw-amount" class="form-control" />

                            </div>

           <div class="alert alert-success withdraw-server-messages" role="alert" id="withdraw-success-message"></div>
           <div class="alert alert-info withdraw-server-messages" role="alert" id="withdraw-error-message"></div>

           <span class="error-mgs" id="withdraw-amount-error-message"><?php echo ($can_withdraw && $HomePage->loggedInUserDetails["bank_name"] == '0')? "Please enter your bank details first" : "" ?><?php echo (!$can_withdraw)? "Sorry, minimum withdrawal amount is &#8358;{$HomePage->WebsiteDetails->minimumWithdrawalAmount}" : "";?></span>
           <!-- Button
          -->
                            <div class="control-group">
                                <label class="control-label" for="withdraw-from-account-action-button"></label>
                                <div class="controls">
                                    <button type="submit" id="withdraw-from-account-action-button" name="signin" class="btn btn-success">Withdraw</button>
                                </div>
                            </div>
           <span class="error-mgs" id="note-withdraw-charge-message">Note: Transfer fee of  &#8358;<?php echo $HomePage->WebsiteDetails->transferFee?> will be charged for the transfer.</span>

       </fieldset>

    <?php echo ($can_withdraw && $HomePage->loggedInUserDetails["bank_name"] == '0')? "<script>window.alert('Bank details not entered');</script>" : "" ?>

</form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
