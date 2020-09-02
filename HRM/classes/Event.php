<?php

class Event {
    private $_db;
    private $_data;
    
    public function __construct($event = null) {
        $this->_db = DB::getInstance();

        $this->findEvent($event);
    }

    public function update($fields = array(), $id = null) {
        
         if(!$id) {
            $id = $this->data()->id;
         }
 

        if(!$this->_db->update('event', $id, $fields)) {
                throw new Exception('There was a problam upadting');
        }
    }

    public function create($table, $fields = array()) {
        if(!$this->_db->insert($table, $fields)) {
            throw new Exception('There was a problem');
            
        }
    }

    public function findEvent($event = null) {
        if($event) {
            $field = (is_numeric($event)) ? 'Id' : 'title';
            $data = $this->_db->get('event', array($field, '=', $event));

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