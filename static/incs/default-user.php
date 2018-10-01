

<?php echo $HomePage->Header->DisplayHeader() ?>
<div id="user-profile-2" class="user-profile">
    <div class="tabbable">
        <ul class="nav nav-tabs padding-18">
            <li class="active">
                <a data-toggle="tab" href="#home">
                    <i class="green ace-icon fa fa-user bigger-120"></i>
                    Profile
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#feed">
                    <i class="orange ace-icon fa fa-sign-in bigger-120"></i>
                    Login
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#friends">
                    <i class="blue ace-icon fa fa-money bigger-120"></i>
                    Payment
                </a>
            </li>

            <li>
                <a data-toggle="tab" href="#pictures">
                    <i class="pink ace-icon fa fa-paw bigger-120"></i>
                    More
                </a>
            </li>
        </ul>

        <div class="tab-content no-border padding-24">
            <div id="home" class="tab-pane in active">
            <div id="home-cover">
                <div class="row">
                    <div class="col-xs-12 col-sm-3 center">
							<span class="profile-picture" id="profile-container">
								<img class="editable img-responsive" alt=" Avatar" id="avatar2" src="<?php echo $HomePage->WebsiteDetails->IMG_FOLDER;?>avatar.png">
							</span>

                        <div class="space space-4"></div>

                        <a href="#" class="btn btn-sm btn-block btn-success" id="fund-account-button">
                            <i class="ace-icon fa fa-money bigger-120"></i>
                            <span class="bigger-110">Fund your account</span>
                        </a>

                        <a href="#" class="btn btn-sm btn-block btn-primary" id="withdraw-button">
                            <i class="ace-icon fa fa-credit-card"></i>
                            <span class="bigger-110">Withdraw</span>
                        </a>
                    </div><!-- /.col -->

                    <div class="col-xs-12 col-sm-9">
                        <h4 class="blue">
                            <span class="middle">Kosi Eric <span class="profile-account-balance">₦2,000</span> </span>

                            <span class="label label-purple arrowed-in-right">
									<i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
									online
								</span>
                        </h4>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> username </div>

                                <div class="profile-info-value">
                                    <span>realkosieric</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Location </div>

                                <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span>Lagos</span>
                                    <span>Nigeria</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Age </div>

                                <div class="profile-info-value">
                                    <span>38</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Joined </div>

                                <div class="profile-info-value">
                                    <span>Two months ago</span>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name"> Last Online </div>

                                <div class="profile-info-value">
                                    <span>3 hours ago</span>
                                </div>
                            </div>
                        </div>

                        <div class="hr hr-8 dotted"></div>

                        <div class="profile-user-info">
                            <div class="profile-info-row">
                                <div class="profile-info-name"> Email </div>

                                <div class="profile-info-value">
                                    <a href="#" target="_blank">username@domain.com</a>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name">
                                    <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                                </div>

                                <div class="profile-info-value">
                                    <a href="<?php echo $HomePage->WebsiteDetails->FacebookHandle?>">Our facebook page</a>
                                </div>
                            </div>

                            <div class="profile-info-row">
                                <div class="profile-info-name">
                                    <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                                </div>

                                <div class="profile-info-value">
                                    <a href="<?php echo $HomePage->WebsiteDetails->TwitterHandle;?>">Follow us on Twitter</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="space-20"></div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="widget-box transparent">
                            <div class="widget-header widget-header-small">
                                <h4 class="widget-title smaller">
                                    <i class="ace-icon fa fa-check-square-o bigger-110"></i>
                                    Little About Us
                                </h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
<?php echo $HomePage->WebsiteDetails->AboutUs; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- /#home -->

            <div id="feed" class="tab-pane">


<?php require_once $HomePage->WebsiteDetails->INCS_FOLDER.'default-login.php'; ?>
                <!--
                <div class="center">
                    <button type="button" class="btn btn-sm btn-primary btn-white btn-round">
                        <i class="ace-icon fa fa-rss bigger-150 middle orange2"></i>
                        <span class="bigger-110">View more activities</span>

                        <i class="icon-on-right ace-icon fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>-->
            </div>
            <div id="friends" class="tab-pane">

                <!--<ul class="pager pull-right">
                    <li class="previous disabled">
                        <a href="#">← Prev</a>
                    </li>

                    <li class="next">
                        <a href="#">Next →</a>
                    </li>
                </ul> -->
                <?php require_once $HomePage->WebsiteDetails->INCS_FOLDER.'default-payment-details.php'; ?>

            </div><!-- /#friends -->

            <div id="pictures" class="tab-pane">

                <?php require_once $HomePage->WebsiteDetails->INCS_FOLDER.'default-more-details.php'; ?>

            </div><!-- /#pictures -->

    </div>
</div>
</div>
