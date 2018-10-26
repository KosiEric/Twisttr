<div id="password-reset-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reset your password</h4>
            </div>
            <div class="modal-body">
                <p>Reset your password for <strong><?php echo $about_to_be_recovered_user["email"] ?></strong>

                <form class="well left form-horizontal new-user-forms" id="password-reset-form" action="#" name="password-reset-form" method="post" enctype="application/x-www-form-urlencoded">
                    <fieldset id="password-reset-form-fieldset">


                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password">Password</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input name="password-reset" data-username = "<?php echo $about_to_be_recovered_user["username"]?>" placeholder="*******" id="password-reset"  class="form-control"  type="password">
                                </div>
                                <span id="reset-password-error-span" class="error-mgs"></span>
                            </div>
                        </div>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-4 control-label" for="password2">Confirm Password</label>
                            <div class="col-md-4 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input name="password2-reset"  placeholder="*******" id="password2-reset" class="form-control"  type="password">
                                </div>
                                <span id="reset-password2-error-span" class="error-mgs"></span>
                            </div>
                        </div>

                        <div class="alert alert-success password-reset-alert" role="alert" id="reset-password-success-message"></div>
                        <div class="alert alert-info password-reset-alert" role="alert" id="reset-password-error-message"></div>


                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4"><br>
                                <span id="reset-password-wait-text" class="form-wait-texts">Please wait....</span>

                            </div>
                        </div>



                    </fieldset>

                </form>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default save-reset-password-button" form="password-reset-form">Save</button>
            </div>
        </div>

    </div>
</div>
