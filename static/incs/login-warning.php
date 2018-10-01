<!--Login Warning -->
<div id="login-warning" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login Notification</h4>
            </div>
            <div class="modal-body">
                <p>It appears you're not currently logged in to <?php echo $HomePage->WebsiteDetails->SiteName; ?> at the moment,
                    Please click on login icon
                    <img src="<?php echo $HomePage->WebsiteDetails->IMG_FOLDER.'login-icon.png'; ?>"  class="img-responsive modal-login-icon" /> to login or create an account for free.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default login-warning-modal-button" data-dismiss="modal">Got it</button>
            </div>
        </div>

    </div>
</div>
<!--Login Warning-->