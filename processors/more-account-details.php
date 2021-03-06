<?php


require_once '../config/config.php';
require_once '../config/functions.php';



class EditMoreAccountDetails extends  Functions {


    private $successText = "success" , $errorText = "error" ,$success_message = "saved successfully";


    private $data ,  $twitterUsername , $instagramUsername , $statusMessage , $userID;


    function __construct()
    {

        parent::__construct();
    }

    function __destruct()
    {
        parent::__destruct(); // TODO: Change the autogenerated stub
    }


    function  isReady() : bool  {
        return !empty($this->data =json_decode($_POST['data'] , true));
    }

    private function setDetails () : bool  {
        $this->twitterUsername = ($this->data["twitterUsername"] == "") ? '0' : $this->escape_string(strtolower($this->data["twitterUsername"]));

        $this->instagramUsername = ($this->data["instagramUsername"] == "") ? '0' : $this->escape_string($this->data["instagramUsername"]);
        $this->statusMessage = ($this->data["statusMessage"] == "") ? '0' : $this->escape_string($this->data["statusMessage"]);
        $this->userID = $this->data["userID"];
        return true;
    }


    private function  updateRecord()  {
        return $this->update_multiple_fields($this->users_table_name , ["twitter_account" => $this->twitterUsername , "instagram_account" => $this->instagramUsername , "status_text" => $this->statusMessage] , "user_id = '{$this->userID}'");

    }

    public function  Processor() : string {

        if($this->isReady() && $this->setDetails())
            $this->updateRecord();
            return json_encode(Array($this->errorText => $this->success_message , $this->successText = "1"));

    }

}

$editMoreAccountDetails = new EditMoreAccountDetails();
echo $editMoreAccountDetails->Processor();





?>