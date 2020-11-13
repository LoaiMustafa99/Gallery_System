<?php


class Db_object {

    public static function find_all(){
        return static::find_by_qyery("SELECT * FROM " . static::$db_table . " ");
    }

    public static function find_by_id($value){
        global $database;
        $the_result_array = static::find_by_qyery("SELECT * FROM " . static::$db_table . " WHERE id = $value LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
        return $row;
    }

    public static function find_by_qyery($sql){
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        $rows = $result_set->fetchAll();
        foreach($rows as $row){
            $the_object_array[] = static::instantation($row);
        }
        return $the_object_array;
    }


    public static function instantation($the_record){

        $calling_class = get_called_class();

        $the_object = new $calling_class;
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

    protected function properties() {

        $properties = array();

        foreach(static::$db_table_fields as $db_field){
            if(property_exists($this, $db_field)) {

                $properties[$db_field] = $this->$db_field;

            }
        }
        return $properties;
    }


    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public function create() {
        global $database;

        $properties = $this->properties(); 

        $sql = "INSERT INTO " . static::$db_table .  "(" . implode(",", array_keys($properties)) . ") ";
        $sql .= "VALUE ('".  implode("','", array_values($properties))  ."')";
        if($database->query($sql)){
            $this->id = $database->the_insert_id();
            return true;
        }else{
            return false;
        }

    }

    public function update() {

        global $database;

        $properties = $this->properties();

        $properties_paris = array();

        foreach($properties as $key => $value) {
            $properties_paris[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $properties_paris);
        $sql .= " WHERE id= " . $this->id;
        
        // $database->con->rowCount() == 1
        $stat = $database->query($sql);
        return ($stat->rowCount()) ? true : false;
    }

    public function delete() {
        global $database;
        $sql = "DELETE FROM " . static::$db_table . " WHERE id = " . $this->id . " LIMIT 1";
        $stat = $database->query($sql);
        return ($stat->rowCount()) ? true : false;
    }

}


?>