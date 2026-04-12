<?php


class DbService{

    function getByColumn($table, $column, $input){
        try {
            $DB = new dbRW();
            $DBconn = $DB->connectDB();
            $tableRead = $DB->readTable($table, $column, $input);
            
            $readDbStatus = $DBconn->query($tableRead);
            if(!$readDbstatus){

            } else {
                $tablePayload = $readDbStatus->fetch_assoc();
                return $tablePayload;
            }

        } catch(Exception $error){

        }

    }

    function getAllTable($table){
        try {
            $DB = new dbRW();
            $DBconn = $DB->connectDB();
            $tableRead = $DB->readTable($table);

            $readDbStatus = $DBconn->query($tableRead);
            if(!$readDbStatus){
                
            } else {
                $tablePayload = $readDbStatus->fetch_assoc();
                return $tablePayload;
            }

        } catch(Exception $error){

        }
    }

    function addDataTable($table, $input){
        try {
            $DB = new dbRW();
            $DBconn = $DB->connectDB();
            $tableWrite = $DB->writeTable($table, $input);

            $readDbStatus = $DBconn->query($tableWrite);

            if(!$readDbStatus){

            } else {
                $lastInsertedId = $DBconn->lastInsertId();
                $lastInsertedObj = $DB->readTable($table, "id", $lastInsertedId);
                return $lastInsertedObj;
            }


        } catch(Exception $error){

        }
    }




}


?>