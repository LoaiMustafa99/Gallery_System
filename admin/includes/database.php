<?php

// This Class To Connect With Database
require_once("config.php");
class Database {
    public $con;
    // This Method Use To Connect Directly
    function __construct(){
        $this->open_db_connect();
    }
    // This Method use TO connect With Database
    public function open_db_connect(){
        try {
            $this->con = new PDO(dsn, user, pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',));
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    
        catch(PDOException $e) {
            echo 'Failed To Connect' . $e->getMessage();
        }    
    }
    // This Method Use To Execute the query Statment 
    public function query($sql,$value = NULL){
        $result = $this->con->prepare($sql);
        $result->execute($value);
        return $result;
    }
    private function config_query($result){
        if(!$result){
            die("Query Field" . $this->con->error);
        }
    }
    public function the_insert_id() {
        return $this->con->lastInsertId();
    }
}
$database = new Database();
