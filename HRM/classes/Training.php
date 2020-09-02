<?php

class Training {
    private $_db;
    private $_data;
    
    public function __construct($training = null) {
        $this->_db = DB::getInstance();

        $this->findTraining($training);
    }

    public function update($fields = array(), $id = null) {
        
         if(!$id) {
            $id = $this->data()->id;
         }
 

        if(!$this->_db->update('trainingsession', $id, $fields)) {
                throw new Exception('There was a problam upadting');
        }
    }

    public function create($table, $fields = array()) {
        if(!$this->_db->insert($table, $fields)) {
            throw new Exception('There was a problem');
            
        }
    }

    public function findTraining($training = null) {
        if($training) {
            $field = (is_numeric($training)) ? 'Id' : 'title';
            $data = $this->_db->get('trainingsession', array($field, '=', $training));

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