<?php
/**
 * JDB: JSON based noSQL Database
 * 
 * Base Configuration file
 *
 * @link https://cyzer.io/db-setup/
 * @package Cyzer_app
 */

/** If you are not using composer - than comment this out */
// namespace JDB;


require_once 'base.php';


/** JSON DB Class */
class CYZ_JDB extends cyz_jdb_base {
  /** Call parent Constructor */
  function __construct($dir){
    parent::__construct($dir);
  }

  /**
   * This function validates index value
   * 
   * @param:
   *    -> index value
   * 
   * @return:
   *    -> Success: Validated index value
   *    -> Failure: return false */
  private function validate_index($index){
    if(isset($index) && "integer" == gettype($index)){
      if(0 <= $index) return $index;
      else return 0;
    }

    /** If index value is not integer */
    return false;
  }

  /**
   * This function validates index value
   * 
   * @param:
   *    -> index value
   * 
   * @return:
   *    -> Success: Validated index value
   *    -> Failure: return false */
  private function validate_row($index){
    if(isset($index) && "integer" == gettype($index)){
      if(0 <= $index) return $index;
      else return 0;
    }

    /** If index value is not integer */
    return false;
  }

  /**
   * This function validates name
   * 
   * @param:
   *    -> index value
   * 
   * @return:
   *    -> Success: Validated index value
   *    -> Failure: return false */
  private function validate_name($name){
    if(isset($name)){
      $name = strtolower($name);

      $name = preg_replace("/[^\w\-]/i", "", $name);
      
      return $name;
    }

    /** If index value is not integer */
    return null;
  }

  //////// NO FILE OPERATION

  /** Get All DB Names */
  function get_db_names(){
    return parent::get_db_names();
  }

  /** DB Initialize */
  function db_init($name){
    $name = $this->validate_name($name);

    if(empty($name)) return false;

    return parent::db_init($name);
  }

  function delete_db($db_name){
    $db_name = $this->validate_name($db_name);

    if(empty($db_name)) return false;

    return parent::delete_db($db_name);
  }

  // Table Name
  function get_all_tables(){
    return parent::get_all_tables();
  }

  function table_exits($table_name){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return false;

    return parent::table_exits($table_name);
  }

  function create_table($table_name){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return false;

    /** Return true if table exists */
    if(parent::table_exits($table_name)) return true;

    /** Return result of update table */
    return parent::update_table($table_name, array());
  }

  function delete_table($table_name){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return false;

    return parent::delete_table($table_name);
  }

  //////// FILE OPERATION TABLE

  function update_table($table_name, $data = null){
    return parent::update_table($table_name, $data);
  }

  function get_table($table_name){
    return parent::read_table($table_name);
  }

  //////// FILE OPERATION ROW

  function add_row($table_name, $row_data){

    $table_data = parent::read_table($table_name);

    $columns = array();

    if(empty($table_data)) $table_data = array();
    else{
      foreach($table_data as $row_index => $row_data_set) {
        foreach($row_data as $column_key => $column_value) {
          if(!isset($table_data[$row_index][$column_key])){
            $table_data[$row_index][$column_key] = "";
          }
        }

        foreach($row_data_set as $column_key => $column_value) {
          if(!in_array($column_key, $columns)) array_push($columns, $column_key);
        }
      }

      foreach($columns as $column) {
        if(!isset($row_data[$column])) $row_data[$column] = "";
      }
    }

    array_push($table_data, $row_data);

    if(parent::update_table($table_name, $table_data)) return true;
    
    return false;
  }

  function update_row($table_name, $index, $row_data){
    if(0 <= $this->validate_index($index)){
      $table_data = parent::read_table($table_name);

      if(empty($table_data)) $table_data = array();

      /** Loop through DB */
      foreach($table_data as $table_index => $table_row){
        if($index == $table_index){
          $table_data[$table_index] = $row_data;

          if(parent::update_table($table_name, $table_data)) return true;
        }
      }
    }
    
    return false;
  }

  function get_row($table_name, $index){
    if(0 <= $this->validate_index($index)){
      return parent::read_table($table_name)[$index];
    }

    return false;
  }

  function delete_row($table_name, $index){
    if(0 <= $this->validate_index($index)){
      $table_data = parent::read_table($table_name);

      if(empty($table_data)) return true;

      /** Loop through DB */
      foreach($table_data as $table_index => $table_row){
        if($index == $table_index){
          array_splice($table_data, $index, 1);

          if(parent::update_table($table_name, $table_data)) return true;
        }
      }
    }
    
    return false;
  }

  //////// FILE OPERATION ROW

  function add_column($table_name, $column_key){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return false;

    $table_data = parent::read_table($table_name);

    if(empty($table_data)) return false;

    foreach ($table_data as $row_index => $row_data_set) {
      $table_data[$row_index][$column_key] = "";
    }

    if(parent::update_table($table_name, $table_data)) return true;

    return false;
  }

  function update_column_data($table_name, $index, $column_key, $column_data){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return false;

    $table_data = parent::read_table($table_name);

    if(empty($table_data)) return false;

    foreach ($table_data as $row_index => $row_data_set) {
      if($index == $row_index){
        $table_data[$row_index][$column_key] = $column_data;
      }
    }

    if(parent::update_table($table_name, $table_data)) return true;

    return false;
  }

  function get_column_data($table_name, $index, $column_key){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return false;

    $table_data = parent::read_table($table_name);

    if(empty($table_data)) return false;

    foreach ($table_data as $row_index => $row_data_set) {
      if($index == $row_index){
        return $row_data_set[$column_key];
      }
    }

    return false;
  }

  function delete_column($table_name, $column_key){
    $table_name = $this->validate_name($table_name);

    if(empty($table_name)) return true;

    $table_data = parent::read_table($table_name);

    if(empty($table_data)) return true;

    foreach ($table_data as $row_index => $row_data_set) {
      unset($row_data_set[$column_key]);

      $table_data[$row_index] = $row_data_set;
    }

    if(parent::update_table($table_name, $table_data)) return true;

    return false;
  }
}
