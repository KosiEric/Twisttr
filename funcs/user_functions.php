<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/config/functions.php';

class UserManagementFunctions extends  Functions {



    private $website_details;
    public  $user_details;
    private $user_id;
    function  setPageTitleDescriptionKeywords(string $title, string $description, string $keywords)
    {
        // TODO: Implement setPageTitleDescriptionKeywords() method.
    }


    function __construct()
    {

        parent::__construct();
        $this->website_details = new WebsiteDetails();

        if($this->isLoggedInUser()) {
            $this->user_id  = $_COOKIE[$this->website_details->CookieUserKey];

            $this->user_details = $this->fetch_data_from_table($this->users_table_name , "user_id" , $this->user_id)[0];
        }






    }


    public function  isLoggedInUser() : bool{

        //return false;


        return isset($_COOKIE[$this->website_details->CookieUserKey]);
    }


    public final function isVerifiedEmail() : bool  {


        return (!$this->isLoggedInUser())? true : ($this->user_details['email_verified']) == 1;



         }


    public final  function  logOutUser() {

    }


    public function getLoggedInUserDetails (){

        return $this->user_details;
    }





}


?>