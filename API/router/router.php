<?php

class Router {

    public $url;
    public $method;
    public $input;

    function __construct($request){
        $this->url = $request["REQUEST_URI"];
        $this->method = $request["REQUEST_METHOD"];
        self::urlPath();
        self::inputData();
        self::options($request);
    }

    static function urlPath(){
        // kanske lägga in kontroll om url path null eller något som inte stämmer i path för extra säkerhet?
        $parseUrl = parse_url($this->url, PHP_URL_PATH);
        $this->url = ltrim($parseUrl, "/");
    }

    static function inputData() {
        if($method == "GET") {
            $this->input = $_GET;
        } else {
            $this->input = file_get_contents('php://input');
        }
    }

    static function options($request){
        Middleware::cors();
        if($request["REQUEST_METHOD"] === "OPTIONS"){
            http_response_code(200);
            exit();
        }
    }


    static function navigate(){
        switch ($url) {
            case "enginevalues":
                Middleware::cors();
                self::EngineValuesControllers($method, $input);
                break;

            case "enginehistory":
                self::EngineValuesHistoryController($method, $input);
                break;
            default: 
                http_response_code(404);
                echo json_encode(["error" => "Route not found"]); 
                break;
        }
    }


}





?>