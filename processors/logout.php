<?php

require_once '../config/config.php';
session_start();
$website_details = new WebsiteDetails();
$user_cookie = $website_details->CookieUserKey;
$time = time();
unset($_SESSION['username']);

setcookie($user_cookie , "user_id" , $time - 30 , "/");


echo json_encode(Array("success" => 1 , "error" => "success"));

?>