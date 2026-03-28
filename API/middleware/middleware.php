<?php

class Middleware {

    static function cors(){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
        header("Access-Control-Allow-Headers: *");

    }

}


?>