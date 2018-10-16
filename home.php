<?php require_once $_SERVER["DOCUMENT_ROOT"].'/config/config.php';
$website_details = new WebsiteDetails();
?>

<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Play <?php echo  $website_details->SiteName; ?> Now and Win</title>
    <meta name="description" content="Play word game online and stand a chance of winning <?php echo  $website_details->Naira; ?>10000"/>
    <link href="https://fonts.googleapis.com/css?family=Dosis:600|Roboto:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/paper-kit.css?v=2.1.0" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet" />
   </head>
  <body id="top">
    <header>
      <div class="aa-header">
        <nav class="navbar navbar-expand-md navbar-transparent">
          <div class="container"><img class="img-fluid pr-3 aa-logo-img" src="images/logo.png" alt="logo"><a class="navbar-brand px-0 py-0" href="#"><?php echo $website_details->SiteName; ?></a>
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link" href="#pricing">Prices</a></li>
                <li class="nav-item"><a class="btn btn-outline-neutral btn-round" href="#download">Play Now</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container aa-header-content text-left text-white">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <h1 class="text-white mb-4"><?php echo $website_details->SiteName; ?><br/>Play Now and Win.</h1>
              <p>Online games and puzzles are a fun way to pass the time. It’s even better when you’re rewarded for your time and get paid to play. </p>
                <a href="#game-demo" id="game-demo-video-link" class="mt-4 btn btn-outline-neutral btn-round">Watch our demo Video</a>
              <ul class="py-1 list-unstyled">
                <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i>You get paid immediately you request your money.</li>
                <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i>easy payment system , no hassles </li>
                <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i>24/7 live support for any Questions</li>
              </ul><a class="mt-4 btn btn-outline-neutral btn-round" href="#features">Start Exploring</a>
            </div>
            <div class="col-md-6 col-sm-12 text-right"><img class="img-fluid" src="<?php echo $website_details->IMG_FOLDER; ?>twisttr-on-phone.png" alt="Image"></div>
          </div>
        </div>
      </div>
    </header>
    <div class="page-content">
      <div>
<div class="container">
  <div class="aa-product-details section" id="features">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="icon icon-danger"><i class="fa fa-cc-mastercard" aria-hidden="true"></i></div>
        <div class="description">
          <div class="h4">Easy payment method</div>
          <p class="text-muted">We have enabled a stress-free, world-class payment system for easy payment by users.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="icon icon-danger"><i class="fa fa-cog" aria-hidden="true"></i></div>
        <div class="description">
          <div class="h4">24/7 live support</div>
          <p class="text-muted">Our  live support team are there to provide help and resolve issues almost instantly.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="icon icon-danger"><i class="fa fa-comment-o" aria-hidden="true"></i></div>
        <div class="description">
          <div class="h4">Real-time chat room</div>
          <p class="text-muted">We've included a chat room for all users, to easily find who to play with, comes with admin support</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="icon icon-danger"><i class="fa fa-money" aria-hidden="true"></i></div>
        <div class="description">
          <div class="h4">Free Mode </div>
          <p class="text-muted">if at any time, users feel like to play without staking their money,
              users can always choose to play our free mode.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="icon icon-danger"><i class="fa fa-share-square-o" aria-hidden="true"></i></div>
        <div class="description">
          <div class="h4">Instant payout</div>
          <p class="text-muted">You can request for payment anytime, and get credited to your bank account immediately. even at mid-night!</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="icon icon-danger"><i class="fa fa-life-ring" aria-hidden="true"></i></div>
        <div class="description">
          <div class="h4">More feature coming out soon</div>
          <p class="text-muted">We are adding more features all the time.once a new feature is rolled out, you get Notified </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <hr/>
</div>
<div class="aa-product-features section">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-12"><img class="img-fluid" src="images/twisttr-on-mobile.jpg" alt="Image"/></div>
      <div class="col-md-7 col-sm-12">
        <h2 class="title mb-2">What is <?php echo $website_details->SiteName;?>?</h2>
        <p class="pt-2"><?php echo $website_details->SiteName;?> is a simple word game where players are presented with 3 random words  every 25 seconds for 4min.</p>
        <p class="pt-5 pb-1">Players are expected to derive other words from the letters found in these words, points are given for each unique word a player enters.</p>
        <ul class="py-1 list-unstyled">
            <li class="py-1"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i>More information on how the game works can be found <a href = "#">here</a></li>
          <li class="py-2"><i class="fa fa-check-circle pr-4" aria-hidden="true"></i> It is the first of it's kind anywhere.</li>
          <li><i class="fa fa-check-circle pr-4" aria-hidden="true"></i>Winners are paid immediately after Payment Request</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="aa-screenshots section">
  <div class="container text-center">
    <h2 class="title pb-3" id="game-demo">Watch our Demo Video</h2>
    <p class="pb-5">Add your app screenshots below. Make sure to make them lively by putting them inside real device mockups<br>Replace this text to describe the screenshots of your app.</p>
    <div class="row">
      <div class="col-md-12 mb-5">
        <div class="card card-raised page-carousel">
          <div class="carousel slide" id="aa-carousel-indicators" data-ride="carousel">
            <ol class="carousel-indicators">
              <li class="active " data-target="#aa-carousel-indicators" data-slide-to="0"></li>
              <li class=" " data-target="#aa-carousel-indicators" data-slide-to="1"></li>
              <li class=" " data-target="#aa-carousel-indicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active"><img class="img-fluid" src="images/3.jpg" alt="First slide"/>
                <div class="carousel-caption d-none d-md-block"> </div>
              </div>
              <div class="carousel-item"><img class="img-fluid" src="images/4.jpg" alt="Second slide"/>
                <div class="carousel-caption d-none d-md-block"> </div>
              </div>
              <div class="carousel-item"><img class="img-fluid" src="images/5.jpg" alt="Third slide"/>
                <div class="carousel-caption d-none d-md-block"> </div>
              </div>
            </div><a class="left carousel-control carousel-control-prev bg-danger" href="#aa-carousel-indicators" role="button" data-slide="prev"><span class="fa fa-angle-left"></span><span class="sr-only">Previous</span></a><a class="right carousel-control carousel-control-next bg-danger" href="#aa-carousel-indicators" role="button" data-slide="next"><span class="fa fa-angle-right"></span><span class="sr-only">Next</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="aa-price-package section" id="pricing">
  <div class="container">
    <div class="text-center">
      <h2 class="title">We've got the perfect packages for you </h2>
      <p class="pb-5">Checkout our prices and go with the one that you feel most comfortable with<br/>We ensure that winners are paid within 15min of payment request</p>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="card text-center aa-price aa-price-active">
          <div class="card-body">
            <div class="h5 mt-0">Basic</div>
            <div class="aa-price-section bg-gradient text-white"><sup><?php echo  $website_details->Naira ?></sup><span>100.0</span><small>/game</small></div>
            <ul class="list-unstyled text-muted">
              <li class="pt-3">10 players</li>
              <li>Game lasts for 4mins</li>
              <li>Winner is rewarded with <?php echo  $website_details->Naira ?>900</li>
              <li><?php echo  $website_details->Naira ?>100 will be charged for Transfer fee</li>
            </ul>
          </div>
          <div class="card-footer">
            <p><a href="/play" class="text-muted text-small" > Check it out </a></p><a class="btn btn-round bg-gradient " href="/play">Play Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card aa-price text-center">
          <div class="card-body">
            <div class="h5 mt-0">Standard</div>
            <div class="aa-price-section"><sup><?php echo  $website_details->Naira ?></sup><span>200.0</span><small>/game</small></div>
            <ul class="list-unstyled text-muted">
              <li class="pt-3">10 players</li>
              <li>Game lasts for 4mins</li>
              <li>Winner is rewarded with <?php echo  $website_details->Naira ?>1800</li>
              <li><?php echo  $website_details->Naira ?>100 will be charged for Transfer fee</li>
            </ul>
          </div>
          <div class="card-footer">
            <p><a href="#" class="text-muted text-small" > Check it out </a></p><a class="btn btn-outline-default btn-round " href="/play">Play Now</a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="card aa-price text-center">
          <div class="card-body">
            <div class="h5 mt-0">Premium</div>
            <div class="aa-price-section"><sup><?php echo  $website_details->Naira ?></sup><span>500.0</span><small>/game</small></div>
            <ul class="list-unstyled text-muted">
              <li class="pt-3">10 players</li>
              <li>Game lasts for 4min.</li>
              <li>Winner is rewarded with <?php echo  $website_details->Naira ?>4500</li>
              <li><b><?php echo  $website_details->Naira ?>100 will be charged for Transfer fee</b></li>
            </ul>
          </div>
          <div class="card-footer">
            <p><a href="#" class="text-muted text-small" > Check it out</a></p><a class="btn btn-outline-default btn-round " href="/play">Play Now</a>
          </div>
        </div>
      </div>
        <div class="col-lg-3 col-md-6">
            <div class="card aa-price text-center">
                <div class="card-body">
                    <div class="h5 mt-0">Gold</div>
                    <div class="aa-price-section"><sup><?php echo $website_details->Naira;?></sup><span>1000.0</span><small><?php /*/*/?>game</small></div>
                    <ul class="list-unstyled text-muted">
                        <li class="pt-3">10 members</li>
                        <li>Game lasts for 4min.</li>
                        <li>Winner is rewarded with <?php echo $website_details->Naira; ?>9000</li>
                        <li><b><?php echo  $website_details->Naira ?>100 will be charged for Transfer fee</b></li>
                    </ul>
                </div>
                <div class="card-footer">
                    <p><a href="#" class="text-muted text-small"> Check it out </a></p><a class="btn btn-outline-default btn-round" href="/play">Play Now</a>
                </div>
            </div>
        </div>

    </div>
  </div>
</div>
<div class="container">
  <hr/>
</div>
<div class="aa-testimonials-section section">
  <div class="container">
    <div class="text-center">
      <h2 class="title mt-0">What our users are saying</h2>
      <p>Read real testimonials by some of our users.<br/>We are simply the best!.</p>
    </div>
    <div class="aa-testimonials">
      <div class="row">
        <div class="col-md-4 mb-3">
          <div class="aa-testimonials-body">
              <blockquote><strong>"<?php echo $website_details->SiteName?> is awesome and I can't believe how easily i won <?php echo $website_details->Naira; ?>9000 Just like that. I wish this kind of platform existed before now"</strong></blockquote>
            <div class="row pt-3">
              <div class="col-lg-5 col-md-12"><img class="testimonial-images" src="<?php echo $website_details->IMG_FOLDER;?>rowland.jpg" alt="Daniels Rowland" /></div>
              <div class="col-lg-7 col-md-12 pt-3">
                <div class="h5">Rowland Daniels</div>
                <p class="text-muted">Student</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="aa-testimonials-body">
              <blockquote><strong>"After recieving my second winning here on <?php echo  $website_details->SiteName?> What else can i say than , You guys are awesome!"</strong></blockquote>
            <div class="row pt-3">
              <div class="col-lg-5 col-md-12"><img class="testimonial-images" src="<?php echo $website_details->IMG_FOLDER;?>loveth.png" alt="Loveth Nwokonkwo" /></div>
              <div class="col-lg-7 col-md-12 pt-3">
                <div class="h5">Loveth Nwokonkwo</div>
                <p class="text-muted">Youth Corper</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="aa-testimonials-body">
<blockquote><strong>"This is actually my 3rd time of Winning here on <?php echo $website_details->SiteName; ?> i've only played 5 times. it's genuine. if you win, you get paid immediately."</strong></blockquote>
            <div class="row pt-3">
              <div class="col-lg-5 col-md-12"><img class="testimonial-images" src="<?php echo $website_details->IMG_FOLDER;?>francis.jpg" alt="Francis Nwokeure"/></div>
              <div class="col-lg-7 col-md-12 pt-3">
                <div class="h5">Francis Nwokeure</div>
                <p class="text-muted">Worker</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="aa-download-section section bg-gradient" id="download">         
  <div class="container">
    <div class="h2 text-center text-title text-white pb-5">Our Android App Coming Soon.</div>
    <div class="row">
      <!--div class="col-md-4 col-sm-12"><a class="aa-apple" href="#">
          <div class="card">
            <div class="row pb-3">
              <div class="col-lg-3 col-md-12 aa-download-icon"><i class="pt-4 fa fa-apple fa-4x" aria-hidden="true"></i></div>
              <div class="col-lg-9 col-md-12 aa-download-icon-detail">
                <div class="h4 pb-1">Download</div>
                <p class="text-muted">Download from App Store</p>
              </div>
            </div>
          </div></a></div -->

      <div class="col-md-4 col-sm-12" id="google-playstore-download"><a class="aa-android" href="#">
          <div class="card">
            <div class="row pb-3">
              <div class="col-lg-3 col-md-12 aa-download-icon"><i class="pt-4 fa fa-android fa-4x" aria-hidden="true"></i></div>
              <div class="col-lg-9 col-md-12 aa-download-icon-detail">
                <div class="h4 pb-1">Download</div>
                <p class="text-muted">Coming soon on Google Play Store</p>
              </div>
            </div>
          </div></a></div>
      <!--div class="col-md-4 col-sm-12"><a class="aa-windows" href="#">
          <div class="card">
            <div class="row pb-3">
              <div class="col-lg-3 col-md-12 aa-download-icon"><i class="pt-4 fa fa-windows fa-4x" aria-hidden="true"></i></div>
              <div class="col-lg-9 col-md-12 aa-download-icon-detail">
                <div class="h4 pb-1">Download</div>
                <p class="text-muted">Download from Microsoft Store</p>
              </div>
            </div>
          </div></a></div -->
    </div>
  </div>
</div></div>
    </div>
    <footer class="footer-black aa-footer">
      <div class="container py-5">
        <div class="row text-center">
          <div class="col-md-12"><a class="btn btn-link btn-neutral" target="_blank" href="<?php echo  $website_details->FacebookHandle; ?>"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
              <a target="_blank" class="btn btn-link btn-neutral" href="<?php echo  $website_details->TwitterHandle; ?>"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>
              <a class="btn btn-link btn-neutral" target="_blank" href="<?php echo  $website_details->InstagramHandle; ?>"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></div>
          <div class="col-md-12">
            <p class="mt-3">Copyright &copy; <?php echo $website_details->SiteName; ?> Inc. All rights reserved.<!--br>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a--></p>
          </div>
        </div>
      </div>
    </footer>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-ui-1.12.1.custom.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/paper-kit.js?v=2.1.0"></script>
    <script src="scripts/main.js"></script>
  </body>
</html>