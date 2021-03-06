<?php

class Inventory {
	private $_db;
	private	$_data;
	
	public function __construct($inventory = null) {
		$this->_db = DB::getInstance();

		$this->find($inventory);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('inv_category', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function find($inventory = null) {
		if($inventory) {
			$field = (is_numeric($inventory)) ? 'cId' : 'name';
			$data = $this->_db->get('inv_category', array($field, '=', $inventory));

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