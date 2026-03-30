<?php

    class EngineValuesController {

        public $input;

        function __construct($method, $input){
            // Här anropar den på funktioner beroende på metod, så metoden som kommer in avgör det
            self::$method($input);
        }


        static function sendResponse($status, $data){
            header("Content-Type: application/json");
            http_response_code($status);
            return json_encode($data);
            exit();
        }


        static function GET($input){
            if(empty($input)) {
                // Skicka direkt till service för att hämta och kolla DB
                return EngineValuesService::getAll();
            } else {   
                // Vi måste kolla attributen här
                if(!isset($input["time"])){
                    $dateTemplate = "\d{4}-\d{2}-\d{2}";
                    if(!preg_match($dateTemplate, $input["time"])){
                        return sendResponse(400, ["Error" => ""]);
                    } else {
                        // Antingen har vi en sendresponse här eller så har vi i service också så den returnerar json response hit och vidare
                        return EngineValuesService::getByTime();
                    }
                } else {
                    return sendResponse(400, ["Error" => ""]);
                }

            }
        
        }





    }




?>