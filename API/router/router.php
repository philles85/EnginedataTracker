<?php

class Router {

    public $url;
    public $method;
    public $input;

    function __construct($request){
        $this->url = $request["REQUEST_URI"];
        $this->method = $request["REQUEST_METHOD"];
    }

    static function extractUrl(){

    }

    static function inputData() {
        if($method == "GET") {
            $this->data = $_GET;
            self::$method($data);
        } else {
            $this->data = file_get_contents('php://input');
            self::$method($data);
        }
    }


    static function navigate(){
        switch ($url) {
            case "rpm":



        }
    }


}





?>