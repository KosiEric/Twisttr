<?php

require_once 'DatabaseConnection.php';



class Functions extends  DatabaseConnection {

    public final function escape_string (string $string){
        $conn=mysqli_connect("{$this->database_host}","{$this->database_username}","{$this->database_password}","{$this->database}");

        return  mysqli_real_escape_string($conn , $string);

    }


    function __construct()
    {
        //   This iniatializes connection with the database i.e DatabaseConnection::_construct();

        parent::__construct();


    }

    public  function generateID (int  $length) : string {

        $letters = Array("A" , "B" , "C" , "D" , "E" , "F" , "G" , "H" ,  "I" , "J" , "K" ,"L" ,"M" ,"N" ,"O" ,"P" ,"Q" ,"R" ,"S" , "T" ,
            "U" ,"V" ,"W" ,"X" ,"Y" ,"Z" ,"a" ,"b" ,"c" ,"d" ,"e" ,"f" ,"g" ,"h" ,"i" ,"j" ,"k" ,"l" ,"m" ,"n" ,"o" ,
            "p" ,"q" ,"r" ,"s" ,"t" ,"u" ,"v" ,"w" ,"x" ,"y" ,"z" ,"0" ,"1" ,"2" ,"3" ,"4" ,"5" ,"6" ,"7" ,"8"
        , "9"  , "_");

        $random_string = "";
        $string_length = count($letters);
        for($i = 0; $i < $length; $i++) {
            $random_string.= $letters[rand(0 , $string_length-1)];

        }

        return $random_string;
    }


}

?>