<?php

class DbRW {

    public $database;
    public $username;
    public $password;
    public $dbConnected;

    function __construct(){
        $this->database = "engineTracker";
        $this->username = "philles";
        $this->password = "philles85";
        $this->dbConnected = self::connectDB();
    }

    static function connectDB(){
        try {
            $conn = new PDO("mysql:host=localhost;dbnamer='$databse'", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;  
        } catch(Exception $error){
            
        }
    }

    function readTable($table, $column = null, $value = null){
        if($column != null){
           $sqlQuery = "SELECT * FROM '$table' WHERE '$column' = '$value'";
        } else {
            $sqlQuery = "SELECT * FROM 'table'";
        }
    }

    function writeTable($table, $data = []){
        // Data består då utav kolumn och värde, så { coolanttemp: 85 osv }; Då loopar vi igenom associativ array och kollar, blir som ett objekt
        $columns = [];
        $values = [];
        if(count($data) == 0) {
            // Throw error, needs to be values;, eller skita i error helt då det kontrollerar i controller
        } else {
            foreach($data as $key => $value){
                array_push($columns, $key);
                array_push($values, $key[$value]);
            }
            $sqlQuery = "INSERT INTO '$table' ('...$columns')
                VALUES('...$values')";
        }
    }

}


?>