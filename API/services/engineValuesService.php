<?php

class EngineValuesService {

    function __construct(){


    }

    static function getByTime($input){
        $DBRep = new dbRW();
        $DB = $DBRep->connectDB();
        $DBObj = $DBRep->readTable("engine_values", "time", $input);

        // Kolla om det ska vara empty eller något annat här
        if(empty($DBObj)){
            throw Exception(["error" => "No times matching"]);
        } else {
            return $DBObj;
        }

    }

    static function getAll(){
        $DBRep = new dbRW();
        $DB = $DBRep->connectDB();
        $DBTable = $DBRep->readTable("engine_values");

        if(empty($DBTable)){
            throw Exception(["error" => "table is empty"]);
        } else {
            return $DBTable;
        }

    }






}




?>