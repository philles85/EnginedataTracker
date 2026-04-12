<?php

class EngineValuesService {

    function __construct(){


    }

    // // OBS!! Denna används inte Ta bort sen
    // static function getByTime($input){
    //     // Denna get requesten hämtar utifrån var det är för tid, och tanken är då att den ska ta nuvarande tid klockslag för att hämta
    //     // det typ live per minut och klockslag typ. Och datan i databasen har pushats in med nuvarande, alltså de nya värderna
    //     // och då hämtar den direkt efter nuvarande tid för att få det senaste hela tiden typ live, tror det funkar, finns kanske bättre sätt för detta
    //     $DBRep = new dbRW();
    //     $DB = $DBRep->connectDB();
    //     $DBObj = $DBRep->readTable("engine_values", "time", $input);

    //     // Kolla om det ska vara empty eller något annat här
    //     if(empty($DBObj)){
    //         throw Exception(["error" => "No times matching"]);
    //     } else {
    //         return $DBObj;
    //     }

    // }

    static function getEngineValue($input){

        $dbService = new dbService();

        if(empty($input)){
            $serviceGetAll = $dbService->getAllTable("engine_values");
            return $serviceGetAll;
        } else {
            $serviceGetByTime = $dbService->getByColumn("engine_values", "time", $input["time"]);
            return $serviceGetByTime;
        }

    }


    static function postEngineValue($input){
        
        $dateTemplate = "\d{4}-\d{2}-\d{2}";
        if(!preg_match($dateTemplate, $input["time"])){
            throw new Exception("Wrong format");
        } else if(!is_numeric($input["coolanttemp"])){
            throw new Exception("Wrong format");
        } else if(!is_numeric($input["enginespeed"])){
            throw new Exception("wrong format");
        } else if(!is_numeric($input["fuelconsumption"]) && !is_float($input["fuelconsumption"])){
            throw new Exception("wrong format");
        } else if(!is_numeric($input["oiltemp"])){
            throw new Exception("wrong format");
        } else if(!is_numeric($input["oilpressure"]) && ! is_float($input["oilpressure"])){
            throw new Exception("wrong format");
        } else {
        
            $dbService = new dbService();
            $serviceAddData = $dbService->addDataTable("engine_values", $input);

            return $serviceData;

        }  
                
    }

    static function deleteEngineValue($input){
         
    }






}




?>