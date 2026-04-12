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
        // Try catch här för att fånga eventuella fel från uppkopplingen av sql databasen
        try {
            $conn = new PDO("mysql:host=localhost;dbname='$databse'", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;  
        } catch(Exception $DBerror){
                        
        }
    }

    function readTable($table, $key = null, $value = null){
        if($column != null){
           $sqlQuery = "SELECT * FROM '$table' WHERE '$key' = '$value'";
            return $sqlQuery;
        } else {
            $sqlQuery = "SELECT * FROM 'table'";
            
            return $sqlQuery;
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

    function resetTable($table){
         
    }

}


?>