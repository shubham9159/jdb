<?php
/**
 * JDB: JSON based noSQL Database
 * 
 * Base Configuration file
 *
 * @link https://cyzer.io/db-setup/
 * @package Cyzer_app
 */

namespace JDB;


require_once('base.php');


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

  //////// NO FILE OPERATION

  /** DB Initialize */
  function db_init($name){
    return parent::db_init($name);
  }

  /** Get All DB Names */
  function get_db_names(){
    return parent::get_db_names();
  }

  function delete_db($db_name){
    return parent::delete_db($db_name);
  }

  function table_exits($table_name) {
    return parent::table_exits($table_name);
  }

  function delete_table($table_name){
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
    if(0 <= validate_index($index)){
      $table_data = parent::read_table($table_name);

      if(empty($table_data)) $table_data = array();

      array_push($table_data, $row_data);

      if(parent::update_table($table_name, $table_data)) return true;
    }
    
    return false;
  }

  function update_row($table_name, $index, $row_data){
    if(0 <= validate_index($index)){
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
    if(0 <= validate_index($index)){
      return parent::read_table($table_name)[$index];
    }

    return false;
  }

  function delete_row($table_name, $index){
    if(0 <= validate_index($index)){
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

  function add_column($table_name, $index, $row_key, $data){

  }

  function update_column($table_name, $index, $row_key, $data){

  }

  function get_column($table_name, $index, $row_key){

  }

  function delete_column($table_name, $index, $row_key){

  }

  //////// FILE MICRO OPERATIONS

  function mdb_open_connection(){

  }

  function mdb_update_table($table_name, $data = null){
    return parent::update_table($table_name, $data);
  }

  function mdb_read_table($table_name){
    return parent::read_table($table_name);
  }

  function mdb_add_row(){

  }

  function mbd_update_row($table_name, $index, $row){
    if(0 <= validate_index($index)){
      return parent::delete_table($table_name);
    }
    
    return false;
  }

  function mdb_read_row($table_name, $index){

  }

  function mdb_delete_row(){

  }

  function mdb_add_data_to_set($table_name, $index, $row_key, $data){

  }

  function mdb_read_data_of_set($table_name, $index, $row_key){

  }

  function mdb_update_data_of_set($table_name, $index, $row_key, $data){

  }

  function mdb_delete_data_of_set($table_name, $index, $row_key){

  }

  function mdb_search_data($table_name, $query){

  }

  function mdb_close_connection(){

  }
}
