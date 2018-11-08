<?php


require_once '../config/functions.php';


$accountBalance = $functions->fetch_data_from_table($functions->users_table_name , 'user_id' , $_POST['userID'])[0]['account_balance'];

echo $accountBalance;



?>