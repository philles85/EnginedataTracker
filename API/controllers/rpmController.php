<?php

    class RpmController {

        public $data;

        function __construct($method){
            if($method == "GET") {
                $this->data = $_GET;
                self::$method($data);
            } else {
                $this->data = file_get_contents('php://input');
                self::$method($data);
            }
        }


        static function sendResponse($status, ){

        }


        static function GET($data){
            
            if(iset($data[""])){

            } else {

                


            }
        }





    }




?>