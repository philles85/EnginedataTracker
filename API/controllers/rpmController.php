<?php

    class RpmController {

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
            
            if(iset($data[""])){
                // Hämta utifrån specifik attribut
            } else {
                // Hämta allting utifrån urlPath, som är entitet namn
                


            }
        }





    }




?>