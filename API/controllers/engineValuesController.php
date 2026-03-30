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
            } else {   
                // Vi måste kolla attributen här
                if(isset($input["time"])){
                    
                }

            }
        
        }





    }




?>