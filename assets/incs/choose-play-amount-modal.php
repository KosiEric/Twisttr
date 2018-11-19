<div class="modal fade" id="play-amount-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>

                </button>
                <h4 class="modal-title" id="myModalLabel">Select amount to play with</h4>

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#fundTab" aria-controls="uploadTab" role="tab" data-toggle="tab">Play Now</a>

                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="fundTab">

                            <!--Password Twisttr@p1 -->
                            <!--paystack key sk_test_fbced60e604b7a4bcdf0cea2aea7c9a77f535914 -->
<?php
$startHour = 15;
$endHour = 17;
$currentHour = date("H");
$startHourString = date("g:i a", strtotime($startHour.":00:00"));

$endHourString = date("g:i a", strtotime($endHour.":00:00"));
$allowedPlayAmountOptions = [100 , 200];
?>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i> </span>
                                <select name="play-amount-options" id="play-amount-options" class="form-control selectpicker">
                                    <option value="0">&#8358; 0.00 Free Mode</option>
                    <?php if(($currentHour >= $startHour) and ($currentHour < $endHour)) { ?>
                        <?php foreach ($allowedPlayAmountOptions as $allowedPlayAmountOption) { ?>


                            <?php $allowedPlayAmountOptionFormat = number_format($allowedPlayAmountOption);
                            echo "<option value='{$allowedPlayAmountOption}'>&#8358; {$allowedPlayAmountOptionFormat}</option>"; ?>
                        <?php }
                    }?>

                                </select>

                            </div>

<span class="error-mgs" id = "play-amount-error-message"></span>
                            <!-- Button -->
                            <div class="control-group">
                                <label class="control-label" for="signin"></label>
                                <div class="controls">
                                    <button id="play-amount-action-button" name="signin" class="btn btn-success">Play</button>
                                </div>
                            </div>





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
