<?php

require_once '../config/config.php';
require_once '../config/functions.php';



class FundAccount extends  Functions{

    private  $data , $amount , $userID , $reference_code , $date , $user_details , $currentAccountBalance , $newAccountBalance;


    private $successText = "success" , $errorText , $error , $success_message = "Payment successfull";


    function __construct()
    {


        parent::__construct();
    }

    function __destruct()
    {
        parent::__destruct(); // TODO: Change the autogenerated stub
    }



    private function  isReady() : bool  {

        return !empty($this->data = json_decode($_POST["data"] , true)) or !is_null($this->data= json_decode($_POST["data"] , true));
    }


    private function setDetails () : bool  {
        $this->amount = $this->data["amount"];
        $this->userID= $this->data["userID"];
        $this->reference_code =  $this->data["referenceCode"];
        $this->date = date("d-M-Y h:i:s A");
        $this->user_details = $this->fetch_data_from_table($this->users_table_name , "user_id" , $this->userID)[0];
        $this->currentAccountBalance = intval($this->user_details["account_balance"]);
        $this->newAccountBalance = $this->currentAccountBalance + intval($this->amount);;

        return true;
    }


    private function  update_account_balance () : bool {

        //Update the user account balance and the website account balance

       $action = ($this->update_record($this->users_table_name , "account_balance" , $this->newAccountBalance , 'user_id' , $this->userID)) ? $this->executeSQL("UPDATE {$this->stats_table_name} SET total_amount_funded = total_amount_funded + {$this->amount}") : false;
       return $this->executeSQL("UPDATE {$this->stats_table_name} SET account_balance = account_balance +  {$this->amount}");

    }

    private function store_in_records () : bool  {

        return $this->insert_into_table($this->fund_account_transactions_table_name , ["user_id" => $this->userID , "reference_code" => $this->reference_code , "time_stamp" => $this->date , "amount" => $this->amount]);
    }

    public final function Processor() {
        if($this->isReady() && $this->setDetails())
            $this->update_account_balance();
            $this->store_in_records();

            return $this->error = json_encode(Array($this->successText => "1" , $this->errorText = $this->success_message));


    }




}

$fundAccount = new FundAccount();

echo $fundAccount->Processor();



?>