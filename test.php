<?php


$words = Array("nature" , "education" ,  "command" , "country" , "region" , "agent" , "university" , "state" , "money" , "camel" , "horse" , "assasin");


shuffle($words);

$words_count = 0;

$generated_words = Array();

foreach ($words as $word) {

    if(in_array($word , $generated_words))
        continue;
    if($words_count == 10)
        break;
    array_push($generated_words , $word);
    $words_count ++;


}






?>