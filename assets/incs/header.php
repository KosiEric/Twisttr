<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/config/classes.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/funcs/user_functions.php';


class Header extends WebsiteHeader {
         private $WebsiteDetails;
         private $PageHeader;
         private $LogoImage;
         private $SearchIcon;
         private $userManagementFunctions;
         private $isLoggedInUser;

         private $functions;
         private $tryDisableSearchForm; //Disabling the search Form for Non-logged users
         private $userBonus = "";
         private $bonus = "";
         public $userBonusLI = "";
         public $WhatsAppContactNumber;
         private function getNumberOfUnreadNotifications () {
             $unread_notifications = 0;
             if($this->isLoggedInUser) {
                 $total_notifications = $this->functions->fetch_data_from_table_with_conditions($this->functions->notifications_table_name,
                     "id != 0");
                 $total_notifications = count($total_notifications);
                 $read_notifications = (int)$this->userManagementFunctions->user_details["number_of_read_notifications"];
                 $unread_notifications = $total_notifications - $read_notifications;
                 $this->bonus = number_format($this->userManagementFunctions->user_details["bonus"]);
                if($this->WebsiteDetails->AllowBonus) {
                    $this->userBonusLI = <<<BONUS
               <li class="header-more-action-li"><a href="#" class="header-list-links header-more-actions-icon"><i class="fa fa-money header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text" id="bonus-amount">{$this->Naira}{$this->bonus}</span> Bonus</a></li>
BONUS;
                }
              }
             else if($this->WebsiteDetails->AllowBonus){
                 $this->userBonusLI = <<<BONUS
               <li class="header-more-action-li"><a href="#" class="header-list-links header-more-actions-icon"><span class="header-li-link-text more-actions-li-text" id="bonus-amount">{$this->Naira} 0 </span>Bonus</a></li>
BONUS;
             }
             return ($unread_notifications == 0) ? "" : $unread_notifications;
         }


         function __construct()
         {
             parent::__construct("title goes here", "description goes here", "keywords go here");

             $this->LogoImage = $this->IMG_FOLDER.'logo.png';
             $this->SearchIcon = $this->IMG_FOLDER.'search.png';
             $this->userManagementFunctions = new UserManagementFunctions();
             $this->isLoggedInUser = $this->userManagementFunctions->isLoggedInUser();
             $this->tryDisableSearchForm = (!$this->isLoggedInUser)?"disabled='disabled'" : "";
             $this->WebsiteDetails = new WebsiteDetails();
             $this->functions = new Functions();
             $this->WhatsAppContactNumber = str_replace(" " , "" , $this->WebsiteDetails->WhatsAppContact);
             $this->PageHeader = <<<FullHeader

 <div class="header-nav-container" id="main-site-header">
  <nav class="navbar navbar-default header-nav-white-bg" id="header-navbar">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar" style="color:#fff;background-color:#fff;" ></span>
          <span class="icon-bar" style="color:#fff;background-color:#fff;"></span>
          <span class="icon-bar" style="color:#fff;background-color:#fff;"></span>
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
          <li class="border-down-shown inactive-header-li" id="main-notification-li"><a id="toggle-notifications-action-link" href="#" class="header-list-links"><i class="fa fa-bell  header-notification-icon header-icons"></i>Notifications<span id = "notifications-header-count" class="badge game-play-count">{$this->getNumberOfUnreadNotifications()}</span></a>

          
          </li>          

          <li class="border-down-shown inactive-header-li" data-loaded = "0" data-start = "0" id="notifications-header-container">
         <div class="container" id="notifs-container">
    <div class="arrow-up" id="notifications-arrow-up"></div>

    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <span class="fa fa-bell"></span><span class="notification-span-site-name">{$this->SiteName}</span>
                    <div class="btn-group pull-right">
                        <button type="button" id="close-notifications-panel-action" class="btn btn-default btn-xs dropdown-toggles" data-toggles="dropdown">
                            <span class="fa fa-close"></span>
                        </button>
                        <ul class="dropdown-menu slidedown" style="display: none;">
                            <li><a href="#"><span class="glyphicon glyphicon-refresh"></span>Refresh</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-ok-sign"></span>Available</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-remove"></span>Busy</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-time"></span>Away</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><span class="glyphicon glyphicon-off"></span>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body" id="notifications-panel-body">
                    <ul class="chat" id="notifications-list">
                   <img data-src="{$this->IMG_FOLDER}spin.gif" id="load-more-notifications-spinner"/>
                    </ul>
                    <span id="load-more-notifications-action">Load more</span>
                </div>
                <div class="panel-footer">
                    <div class="input-group" style="display: none;">
                        <input  id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
          </li>          

          <li class="border-down-shown inactive-header-li"><a href="#play-amount-modal" id="play-action-link" data-toggle="modal" class="header-list-links"><i class="fa fa-play-circle  header-play-icon header-icons"></i>Play <span class="badge game-play-count" id="number-of-players-count"></span></a></li>
          <li class="border-down-shown inactive-header-li"><a href="https://wa.me/{$this->WhatsAppContactNumber}?text=Hello%20{$this->WebsiteDetails->SiteName}" id="contact-action-link" data-toggle="modals" class="header-list-links"><span id = "whatsapp-contact"><i class = "fa fa-whatsapp" id = "whatsapp-logo"></i><span id = "whatsapp-number">{$this->WebsiteDetails->WhatsAppContact}</span></span></a></li>
          
          </ul>

          <ul class="nav navbar-nav navbar-right">
         
          <li class="dropdown">
            <a href="#" class="dropdown-toggle header-more-text" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
              <li class="header-more-action-li"><a href="{$this->ChatPage}" target="_blank" id="show-chat-window"><i class="fa fa-comment-o header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text">Chat</span></a></li>
              <li class="header-more-action-li"><a href="{$this->BlogPage}" class="header-list-links header-more-actions-icon"><i class="fa fa-bookmark header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text">Our Blog</span></a></li>
              {$this->userBonusLI}
              <!--li class="header-more-action-li"><a href="#" class="header-list-links header-more-actions-icon"><i class="fa fa-share-alt header-more-actions-icon"></i><span class="header-li-link-text more-actions-li-text">Transfer to account</span></a></li>-->
             
              <li class="divider"><a href="#"></a></li>
              <li><a href="#" class="header-list-links close-more-action">Close <i class="fa fa-times header-close-icon"></i> </a></li>
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