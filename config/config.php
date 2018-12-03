<?php

abstract class WebsiteConfigurationSettings {

    
	public  $SiteName = "Twisttr";
	public  $Https = "https://";
	public  $Www = "www.";
	public  $SiteNameWithoutHttps = "www.twisttr.com";
	public  $SiteNameWithHttps = "";
    public  $FacebookUrl = "";
    public  $TwitterUrl  = "";
    public  $InstagramUrl = "";
    public  $SiteAuthor = "Kosi Eric";
    public  $WebsiteCategory = "Online Gaming";
    public  $MaximumUsernameLength = 16;
    public  $WhatsAppContact = "+234 708 441 9530";
    public  $minimumUsernameLength = 2;
    public  $TwitterHandle = "";
    public  $FacebookHandle = "";
    public  $InstagramHandle = "";
    public  $MaximumUserProfileImageSize = 50000000;
    public  $MaximumUserProfileImageSizeInWords = "";
    public  $WebsiteCoverage = "Worldwide";
    public  $WebsiteSubject = "Online Gaming";
    public  $WebsiteClassification = "Gaming";
    public  $DOCUMENT_ROOT;
    public  $STATIC_FOLDER;
    public  $JS_FOLDER;
    public  $CSS_FOLDER;
    public  $INCS_FOLDER;
    public  $IMG_FOLDER;
    public  $AboutUs;
    public  $PrimaryEmailServer = "smtp.gmail.com";
    public  $PrimaryEmail = "mytwisttr@gmail.com";
    public  $MessageEmail = "mytwisttr@gmail.com";
    public  $MessageEmailPassword = '4mdcfohb';
    public  $PrimaryEmailPassword = '4mdcfohb';
    public  $ContactEmail;
    public  $CookieUserKey = "current_user";
    public  $ErrorPage = "/404.php";
    public  $minimumWithdrawalAmount = 500;
    public  $transferFee = 100;
    public  $NumberOfRandomWords = 45;
    public  $GameIDLength = 6;
    public  $MaximumNumberOfPlayers = 10;
    public  $Naira = "&#8358;";
    public  $ChatPage = "/chat";
    public  $BlogPage = "/blog";
    public  $AllowBonus = true;
    public  $DefaultAdminUserID;
    public  $defaultUsername = "spider";
    public $startHour = 19;
    public $endHour = 21;
    public $timeDifference;
    public $currentHour;
    public $startHourString;
    public $endHourString;
    public $allowedPlayAmountOptions = [100 , 200];

    public  $defaultBotProfilePicture;
    public  $Banks = Array("Access Bank" , "CitiBank" , "Coronation Merchant Bank" , "Diamond Bank" , "Ecobank Nigeria" , "Enterprise Bank Limited" , "FBN Merchant Bank" ,"Fidelity Bank Nigeria",
        "First Bank of Nigeria" , "First City Monument Bank" , "FSDH Merchant Bank" , "Guarantee Trust Bank" , "Heritage Bank Plc" ,"Jaiz Bank Limited" ,
        "Keystone Bank Limited" , "Polaris Bank" , "Providus Bank Plc" ,  "Rand Merchant Bank" , "Stanbic IBTC Bank Nigeria Limited" , "Standard Chartered Bank" ,
        "Sterling Bank" , "Suntrust Bank Nigeria Limited" ,  "Union Bank of Nigeria" , "United Bank for Africa Plc" , "Unity Bank Plc" , "Wema Bank" , "Zenith Bank");

    abstract function setPageTitleDescriptionKeywords(string  $title, string $description , string $keywords);

    public function __construct() {
        $this->timeDifference = $this->endHour - $this->startHour;
        $this->currentHour = date("H");
        $this->startHourString = date("g:i a", strtotime($this->startHour.":00:00"));
        $this->endHourString = date("g:i a", strtotime($this->endHour.":00:00"));
        $this->DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
        $this->STATIC_FOLDER = "/assets/";
        $this->JS_FOLDER = $this->STATIC_FOLDER."js/";
        $this->CSS_FOLDER = $this->STATIC_FOLDER."css/";
        $this->INCS_FOLDER = $_SERVER['DOCUMENT_ROOT'].$this->STATIC_FOLDER."incs/";
        $this->IMG_FOLDER = $this->STATIC_FOLDER."img/";
        $this->SiteNameWithHttps = "https://{$this->SiteNameWithoutHttps}";
        $this->FacebookUrl = "{$this->Https}{$this->Www}facebook.com";
        $this->TwitterUrl = "{$this->Https}{$this->Www}twitter.com";
        $this->InstagramUrl = "{$this->Https}{$this->Www}instagram.com";
        $this->FacebookHandle = "{$this->FacebookUrl}/{$this->SiteName}";
        $this->TwitterHandle = "{$this->TwitterUrl}/{$this->SiteName}";
        $this->InstagramHandle = "{$this->InstagramUrl}/{$this->SiteName}";
        $this->HeadOffice = "Block 2A , Quarters 3 PH Int'l Airport Omagwa.";
        $this->MaximumUserProfileImageSizeInWords = strval($this->MaximumUserProfileImageSize / 10). "mb";
        $this->ContactEmail  = 'contact@'.$this->SiteName;
        $this->DefaultAdminUserID = "Jvli";
        $this->defaultBotProfilePicture = $this->IMG_FOLDER.'spider.png';
        $this->AboutUs = <<<AboutUs
<p>
                                       Welcome to {$this->SiteName} an online word game where everybody gets to be a winner.  
                                    </p>
                                   
AboutUs;


}

}

class WebsiteDetails extends WebsiteConfigurationSettings {

    function setPageTitleDescriptionKeywords(string $title, string $description, string $keywords)
    {
        // TODO: Implement setPageTitleDescriptionKeywords() method.
    }


}

$website_details = new WebsiteDetails();



?>