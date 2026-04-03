<?php

class EngineValuesService {

    function __construct(){


    }

    static function getByTime($input){
        // Denna get requesten hämtar utifrån var det är för tid, och tanken är då att den ska ta nuvarande tid klockslag för att hämta
        // det typ live per minut och klockslag typ. Och datan i databasen har pushats in med nuvarande, alltså de nya värderna
        // och då hämtar den direkt efter nuvarande tid för att få det senaste hela tiden typ live, tror det funkar, finns kanske bättre sätt för detta
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