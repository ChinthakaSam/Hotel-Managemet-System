<?php

class allowancemain {
  private $_db;
  private $_data;
  
  public function __construct($allw = null) {
    $this->_db = DB::getInstance();

    $this->findAllow($allw);
  }

  public function update($fields = array(), $id = null) {
    
     if(!$id) {
      $id = $this->data()->id;
     }
 

    if(!$this->_db->update('allowance', $id, $fields)) { //table
        throw new Exception('There was a problam upadting');
    }
  }

  public function create($table, $fields = array()) {
    if(!$this->_db->insert($table, $fields)) {
      throw new Exception('There was a problem');
      
    }
  }

  public function findAllow($allw = null) {
    if($allw) {
      $field = (is_numeric($allw)) ? 'alw_id' : 'alw_name';
      $data = $this->_db->get('allowance', array($field, '=', $allw)); //table name

      if($data->count()){
        $this->_data = $data->first();
        return true;
      }
    }
    return false;
  }

  public function exists() {
    return (!empty($this->_data)) ? true : false;
  }

  public function data() {
    return $this->_data;
  }
}