<?php

class User{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users(){
        return self::find_this_qyery("SELECT * FROM users");
    }
    public static function find_users_From_ID($value){
        global $database;
        $the_result_array = self::find_this_qyery("SELECT * FROM users WHERE id = $value LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        return $row;
    }

    public static function verify_user($username, $password){
        global $database;

        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        $sql = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        $the_result_array = self::find_this_qyery($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public static function find_this_qyery($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        $rows = $result_set->fetchAll();
        foreach($rows as $row){
            $the_object_array[] = self::instantation($row);
        }
        return $the_object_array;
    }
    public static function instantation($the_record){

        $the_object = new self;
        //$the_object->id           = $result['id'];
        // $the_object->username     = $result['username'];
        // $the_object->password     = $result['password'];
        // $the_object->first_name   = $result['first_name'];
        // $the_object->last_name    = $result['last_name'];
        foreach($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;

    }
    
    private function has_the_attribute($the_attribute){

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);

    }

}


?>