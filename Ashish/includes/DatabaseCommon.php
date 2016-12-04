<?php
include_once "database.php";

class DatabaseCommon
{
  public static $database_fields = array();
  protected static $table_name = "";
  protected $id;

  private static function instantiate($row) {
    /*  $this->id       = $row['id'];
        $this->username = $row['username'];
        $this->email    = $row['email'];
    */
    $object = new static;
    foreach( $row as $attribute => $value ) {
      if( $object->has_attribute($attribute) ) {
        $object->$attribute = $value;
      }
    }
    return $object;
  }

  private function has_attribute($attribute) {
    // get_object_vars returns an associative array with all attributes
    // (incl. private ones!) as the keys and their current values as the value
    $object_vars = get_object_vars($this);

    // We don't care about the value, we just want to know if the key exists
    // Will return true if $attribute is present in $object_vars array else false
    return array_key_exists($attribute, $object_vars);
  }

  public static function find_by_sql($sql = "") {
    global $database;
    // echo $sql;
    $result_set = $database->query($sql);
    $object_array = array();
    while( $row = $database->fetch_array($result_set) ) {
      $object_array[] = static::instantiate($row);
    }
    return $object_array;
  }

  public static function find_all() {
    return static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE id>1 ");
  }

  public static function find_all_with_limit($limit) {
  return static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE id>1 ORDER BY id DESC LIMIT {$limit}");
}

  public static function find_by_id($id = 0) {
    $result_array = static::find_by_sql("SELECT * FROM " . static::$table_name . " WHERE id=$id LIMIT 1");
    // We are returning false so that we could do conditional check on returned value
    // Since there will be only one value we will return object directly instead of array of objects
    return !empty( $result_array ) ? $result_array[0] : false;
  }

  public function find_by_attribute_with_limit($attribute, $value, $limit) {
    $result_set = static::find_by_sql("SELECT * FROM users WHERE {$attribute}='{$value}' LIMIT {$limit}");
    return !empty( $result_set ) ? $result_set[0] : false;
  }


  protected function attributes() {
    $attributes = array();
    foreach( static::$database_fields as $val ) {
      if( property_exists($this, $val) ) {
        $attributes[$val] = $this->$val;
      }
    }
    return $attributes;
  }

  protected function escaped_attributes() {
    global $database;
    $attributes = $this->attributes();
    $escaped_attributes = array();
    foreach( $attributes as $key => $attribute ) {
      $escaped_attributes[$key] = $database->escape_value($attribute);
    }
    return $escaped_attributes;
  }

  public function create() {
    global $database;
    $attributes = $this->escaped_attributes();
    $sql = "INSERT INTO " . static::$table_name;
    $sql .= " (" . join(", ", array_keys($attributes)) . ") ";
    $sql .= "VALUES ('";
    $sql .= join("', '", array_values($attributes));
    $sql .= "')";
    if( $database->query($sql) ) {
      $this->id = $database->insert_id();
      return true;
    } else {
      return false;
    }
  }

  public function update() {
    global $database;
    $attributes = $this->escaped_attributes();
    $attribute_pairs = array();
    foreach( $attributes as $key => $value ) {
      $attribute_pairs[] = "{$key}='{$value}'";
    }
    $sql = "UPDATE " . static::$table_name . " SET ";
    $sql .= join(", ", $attribute_pairs);
    $sql .= " WHERE id=" . $database->escape_value($this->id);
    $database->query($sql);
    return ( $database->affected_rows() == 1 ) ? true : false;
  }

  public function delete() {
    global $database;
    $sql = "DELETE FROM " . static::$table_name . " WHERE ";
    $sql .= "id=" . $database->escape_value($this->id);
    $database->query($sql);
    return ( $database->affected_rows() == 1 ) ? true : false;
  }

}
