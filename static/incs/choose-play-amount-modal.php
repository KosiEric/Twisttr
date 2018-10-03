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

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-money"></i> </span>
                                <select name="play-amount-options" id="play-amount-options" class="form-control selectpicker">
                                    <option value="100">&#8358; 100</option>
                                    <option value="200">&#8358; 200</option>
                                    <option value="500">&#8358; 500</option>
                                    <option value="1000">&#8358; 1,000</option>


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
