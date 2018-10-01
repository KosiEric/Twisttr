<?php

require_once '../config/config.php';

$website_details = new WebsiteDetails();
$user_cookie = $website_details->CookieUserKey;
$time = time();
setcookie($user_cookie , "user_id" , $time - 30 , "/");


echo json_encode(Array("success" => 1 , "error" => "success"));

?>