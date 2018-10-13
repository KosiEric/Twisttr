<?php

date_default_timezone_set("Africa/Lagos");
class DatabaseConnection {


    public $database_username = "root"; // username for the database
    public $database_password = "";
    public $database_host = "localhost";
    public $database = "game"; // database name
    public  $conn;
    protected   $password_recovery_table_name = "password_recovery"; //password recovery table name
    public  $users_table_name = "users"; // Users table name
    public   $unverified_emails_table_name = "unverified_emails"; // table for unverified emails
    public  $profiles_table_name = "profiles";
    public  $messages_table_name = "messages";  // This is the table for the public chat messages 
    public   $password_reset_code_length = 16;
    public  $email_verification_code_length = 16;
    public  $bank_details_verification_code_length = 22;
    public $pending_bank_details_table_name = "pending_bank_details";
    public $fund_account_transactions_table_name = "fund_account_transactions";
    public $games_table_name = "games";
    public $withdrawals_table_name = "withdrawals";
    public $notifications_table_name = "notifications";
    public $game_words_table_name = "game_words";

    final protected  function  establish_database_connection () : bool
    {

        try {

            $database = $this->database;
            $username = $this->database_username;
            $password = $this->database_password;
            $database_host = $this->database_host;

            $this->conn = new PDO("mysql:dbname=$database;host=$database_host", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $exception) {

            echo "Connection failed : " . $exception->getMessage();
            return false;


        }
    }

        function __construct () {

            // Establish  connection with the Database

            $this->establish_database_connection(); 
            return true;


        }

         function __destruct()
    {
        // TODO: Implement __destruct() method.

    $this->conn = null; // Close the database connection on Class Destruct

    }


    public function  create_pending_bank_details_table() : bool {
        $sql = "CREATE TABLE {$this->pending_bank_details_table_name}(
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY ,
                        user_id VARCHAR(100) NOT NULL UNIQUE ,
                        bank_name VARCHAR (1000) NOT NULL , 
                        account_name VARCHAR (1000) NOT NULL , 
                        account_number VARCHAR (1000) NOT NULL  ,
                        verification_code VARCHAR (1000) NOT NULL , 
                        last_requested VARCHAR (1000) NOT NULL


)";


        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }

    }

   public final function update_multiple_fields (string $table_name , array  $fields_and_values , string $where_clause){

       $field_length = count($fields_and_values);
       $counter = 0;

       $sql = "UPDATE {$table_name} SET ";

       foreach ($fields_and_values as $field => $value){


           $sql.= ($field_length - $counter == 1 )?  "{$field} = '{$value}'"  : "{$field} = '{$value}',";

           $counter += 1;
       }

        $sql.= " WHERE $where_clause";

       try {

            $this->conn->exec($sql);
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";

            return false;
        }

    }

    public final function insert_into_table(string $table_name , array $fields_and_values){
        $field_string = "";
        $field_length = count($fields_and_values);
        $values_string = "";
        $counter = 0;
        foreach ($fields_and_values as $field => $value){
            $counter += 1;

            $field_string.= ($counter == $field_length)?  $field  : $field.",";
            $values_string.= ($counter == $field_length) ? "'$value'" : "'$value'".",";
        }

        $counter = 0;

        $sql = "INSERT INTO {$table_name} ($field_string) VALUES ($values_string)";
        try {

            $this->conn->exec($sql);
            return true;
        }

        catch (PDOException $exception) {
             return false;
        }


    }
/*



    You can add a new column at the end of your table

    ALTER TABLE assessment ADD q6 VARCHAR( 255 )

    Add column to the begining of table

    ALTER TABLE assessment ADD q6 VARCHAR( 255 ) FIRST

    Add column next to a specified column

    ALTER TABLE assessment ADD q6 VARCHAR( 255 ) after q5




*/

    public final function  create_users_table () : bool {

        $users_table_name = $this->users_table_name;
        $sql = "CREATE TABLE {$users_table_name}(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
    fullname VARCHAR(100)  NOT NULL ,
    birthday VARCHAR (100) NOT NULL , 
    gender VARCHAR (100) NOT  NULL ,
    email VARCHAR (100) NOT NULL UNIQUE , 
    username VARCHAR (100) NOT NULL UNIQUE ,
    username_text VARCHAR (100) NOT  NULL UNIQUE ,
    password VARCHAR (100) NOT NULL , 
    phone VARCHAR (100) NOT NULL UNIQUE ,
    registration_timestamp VARCHAR (100) NOT NULL ,
    email_verified VARCHAR (100) DEFAULT  '0' , 
    user_id VARCHAR (100) NOT NULL UNIQUE , 
    game_id VARCHAR (100) NOT NULL UNIQUE ,
    password_reset_code  VARCHAR (100) DEFAULT '0' UNIQUE , 
    email_verification_code VARCHAR (100) DEFAULT  '0' UNIQUE ,
    number_of_read_notifications VARCHAR (100) NOT NULL DEFAULT  '0',
    bank_name VARCHAR (100) DEFAULT '0' ,
    account_name VARCHAR (100) DEFAULT '0',
    account_number VARCHAR (100) DEFAULT '0', 
  
    
    
    account_balance VARCHAR (100) DEFAULT '0' , 
    
    
    
    twitter_account VARCHAR (100) DEFAULT '0' , 
    instagram_account VARCHAR (100) DEFAULT '0' ,
    status_text VARCHAR (100) DEFAULT '0',
    
    
    
    
    location  VARCHAR (100) DEFAULT '0', 
    country  VARCHAR (100) DEFAULT '0', 
    
    
    profile VARCHAR (100) DEFAULT '0', 
    last_seen VARCHAR (100) DEFAULT '0', 
    active VARCHAR (100) DEFAULT '0', 
    
    
    
    game_id_about_to_play VARCHAR (100) DEFAULT '0', 
    total_points VARCHAR (100) DEFAULT '0',
    current_point VARCHAR (100) DEFAULT '0' ,
    current_game_id VARCHAR (100) DEFAULT '0'  , 
    total_wins VARCHAR (100) NOT NULL DEFAULT  '0', 
    total_games_played VARCHAR (100) DEFAULT '0' ,
    total_amount_won VARCHAR (100) DEFAULT '0',
    last_win_date VARCHAR (100) DEFAULT '0' ,
    last_played_game_id VARCHAR (100) DEFAULT '0' , 
    last_amount_won VARCHAR (100)DEFAULT '0' ,
    last_played_date VARCHAR (100) DEFAULT  '0' 
    
    
    
)";

        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }


    }


    public final  function  create_games_table() : bool  {

        $sql = "CREATE TABLE {$this->games_table_name}(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
        
    game_id VARCHAR (100) NOT NULL , 
    words VARCHAR (10000) NOT NULL  , 
    amount VARCHAR (100) NOT  NULL,
    started VARCHAR (100) NOT  NULL  DEFAULT  '0' ,
    start_time VARCHAR (100) NOT  NULL , 
    current_word VARCHAR (100) NOT NULL ,
    number_of_players VARCHAR (100) NOT  NULL DEFAULT '0',
    game_ended VARCHAR (100) NOT  NULL  DEFAULT  '0',
    winner VARCHAR (150) NOT NULL  DEFAULT  '0'
    )";

        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }



    }

    public function create_fund_account_transactions_table() {

        $sql = "CREATE TABLE {$this->fund_account_transactions_table_name}(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
    user_id VARCHAR(100)  NOT NULL ,
    reference_code VARCHAR (100) NOT NULL , 
    time_stamp VARCHAR (100) NOT  NULL , 
    amount VARCHAR (100) NOT  NULL)";





        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }

    }

    public function create_notifications_table(){
        $sql = "CREATE TABLE {$this->notifications_table_name}(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
     title VARCHAR (100) NOT  NULL ,

    message VARCHAR(100)  NOT NULL ,
    link VARCHAR (100) NOT NULL , 
    
    time_stamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
    
   )";




        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }
    }

    public final  function create_game_words_table() {


        $sql = "CREATE TABLE {$this->game_words_table_name}(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
        game_id VARCHAR (100) NOT  NULL ,

        user_id VARCHAR(100)  NOT NULL ,
        username VARCHAR (100) NOT NULL , 
        word VARCHAR (10000) NOT NULL , 
        point VARCHAR (100) NOT NULL ,
        gender VARCHAR (100) NOT  NULL ,
        time_stamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP 
        
   )";




        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }


    }
    public final  function create_withdrawals_table() {
        $sql = "CREATE TABLE {$this->withdrawals_table_name}(
        id INT UNSIGNED AUTO_INCREMENT PRIMARY  KEY,
    user_id VARCHAR(100)  NOT NULL ,
    reference_code VARCHAR (100) NOT NULL , 
    time_stamp VARCHAR (100) NOT  NULL , 
    amount VARCHAR (100) NOT  NULL,
    bank_name VARCHAR (100) NOT  NULL  , 
    account_name VARCHAR (100) NOT  NULL ,
    account_number VARCHAR (100) NOT  NULL  
    )";



        try {

            $this->conn->exec($sql);
            echo "Table Created successfully";
            return true;
        }

        catch (PDOException $exception) {
            echo "Error occured {$exception->getMessage()}";
            return false;
        }

    }
    public  function fetch_data_from_table_desc(string $table , string $row , string $value): array

    {

        $sql = "SELECT * FROM $table  WHERE $row = '{$value}' order by id DESC ";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $set_type_record = $result->setFetchMode(PDO::FETCH_ASSOC);
        $record = $result->fetchAll();
        return $record;
    }



    public  final  function record_exists_in_table(string  $table_name , string   $row_name , string  $value) : bool {
        $value = strtolower($value);
        $sql = "SELECT $row_name  FROM $table_name WHERE $row_name = '{$value}'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $num_rows = $result->rowCount();

        if($num_rows > 0)
            return true;
        return false;


    }

    public  final function  delete_record(string  $table_name , string   $row_name , string  $value) : bool  {

        $value = strtolower($value);
        $sql = "DELETE FROM {$table_name} WHERE {$row_name} = '{$value}'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return true;
    }


    public  final  function  update_record (string  $table_name , string  $row_name , string $new_value , string $row_to_searc_for , string $old_value , $lowercase = true) {

        $new_value = ($lowercase)?strtolower($new_value):$new_value;
        $old_value = strtolower($old_value);
        $sql = "UPDATE {$table_name} SET {$row_name} = '{$new_value}' WHERE {$row_to_searc_for} = '{$old_value}'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        return true;
    }

    public final function fetch_data_from_table(string $table , string $row , string $value): array

    {

        $sql = "SELECT * FROM $table  WHERE $row = '{$value}'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $set_type_record = $result->setFetchMode(PDO::FETCH_ASSOC);
        $record = $result->fetchAll();
        return $record;
    }

    public  final  function fetch_data_from_table_with_conditions(string  $table , string $conditions){
        $sql = "SELECT * FROM $table  WHERE $conditions";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $set_type_record = $result->setFetchMode(PDO::FETCH_ASSOC);
        $record = $result->fetchAll();
        return $record;

    }

    public final function executeSQL (string $sql){

        $result = $this->conn->prepare($sql);
        $result->execute();

        return true;

    }





}


$DatabaseConnection = new DatabaseConnection();
//$DatabaseConnection->create_users_table();
//$DatabaseConnection->create_pending_bank_details_table();
//$DatabaseConnection->create_fund_account_transactions_table();
//$DatabaseConnection->create_withdrawals_table();
//$DatabaseConnection->create_games_table();
//$DatabaseConnection->create_notifications_table();
//$DatabaseConnection->create_game_words_table();
?>