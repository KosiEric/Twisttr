<?php

require_once 'config.php';
require_once 'functions.php';
class WordsGenerator extends Functions {


    private $config;
    private $words = Array("anger" , "master" , "sister" , "charity" ,  "builder" , "android" , "building" , "calendar" , "remember" ,  "standard" , "article" , "mandate" , "acting" , "leader" , "follower", "kingsmen" ,  "principal" , "education" , "teacher" , "prefect" , "lecture" , "school" , "degree" , "award" , "pass" , "fail" , "repeat");


    function __construct()

    {

        $this->config = new WebsiteDetails();
    }

    public  final function generateRandomWords () : array  {


        $words_count = 0;



        $generated_words = Array();
        shuffle($this->words);

        $random_keys = array_rand($this->words , $this->config->NumberOfRandomWords);

        for($i = 0; $i < count($random_keys); ++$i){

            array_push($generated_words , $this->words[$random_keys[$i]]);
        }


        return $generated_words;

}


}

$wordsGenerator = new WordsGenerator();


?>