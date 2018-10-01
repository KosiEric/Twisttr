<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/config/classes.php';



class Header extends WebsiteHeader {
         private $WebsiteDetails;
         private $PageHeader;
         private $LogoImage;
         private $SearchIcon;
         private $userManagementFunctions;
         private $isLoggedInUser;

         private $tryDisableSearchForm; //Disabling the search Form for Non-logged users


         function __construct()
         {
             parent::__construct("title goes here", "description goes here", "keywords go here");

             $this->LogoImage = $this->IMG_FOLDER.'logo.png';
             $this->SearchIcon = $this->IMG_FOLDER.'search.png';
             $this->userManagementFunctions = new UserManagementFunctions();
             $this->isLoggedInUser = $this->userManagementFunctions->isLoggedInUser();
             $this->tryDisableSearchForm = (!$this->isLoggedInUser)?"disabled='disabled'" : "";



             $this->PageHeader = <<<FullHeader

 <div class="header-nav-container">
  <nav class="navbar navbar-default header-nav-white-bg">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <ul class="nav navbar-nav navbar-left">
        <li><a class="navbar-brand header-logo" href="/">
        {$this->SiteName}
        </a></li>
        </ul>
      </div>
       <div id="navbar1" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
          <li class="border-down-shown active-header-li"><a href="#" class="header-list-links"><i class="fa fa-home  header-home-icon header-icons"></i> Home</a></li>
          <li class="border-down-shown inactive-header-li"><a href="#" class="header-list-links"><i class="fa fa-bell  header-notification-icon header-icons"></i>Notifications<span class="badge game-play-count">0</span></a></li>          

          <li class="border-down-shown inactive-header-li"><a href="#" class="header-list-links"><i class="fa fa-location-arrow  header-play-icon header-icons"></i>Play <span class="badge game-play-count">10</span></a></li>
<li class="border-down-shown inactive-header-li" id="header-search-form-li"><form class="form-inline header-search-user-form"><fieldset {$this->tryDisableSearchForm}>
    <input class="form-control form-control-sm ml-3 w-75 search-user-input" style="background-image: url({$this->SearchIcon})" type="text" placeholder="Search for  user" aria-label="Search">
</fieldset></form></li>          
          </ul>

          <ul class="nav navbar-nav navbar-right">
         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="header-more-action-li"><a href="#"><i class="fa fa-bar-chart header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text">Stats for Nerds</span></a></li>
              <li class="header-more-action-li"><a href="#" class="header-list-links header-more-actions-icon"><i class="fa fa-bookmark header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text">View leaderboard</span></a></li>
              <li class="header-more-action-li"><a href="#" class="header-list-links header-more-actions-icon"><i class="fa fa-share-alt header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text">Transfer to account</span></a></li>
              <li class="divider"><a href="#"></a></li>
              <li><a href="#" class="header-list-links">Close <i class="fa fa-times header-close-icon"></i> </a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>
</div>




FullHeader;











         }


         public function  DisplayHeader() {
             return $this->PageHeader;
         }





}


?>