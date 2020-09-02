<?php

class Recieved {
	private $_db;
	private	$_data;
	
	public function __construct($recieved = null) {
		$this->_db = DB::getInstance();

		$this->find($recieved);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('inv_recieved_items', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function find($recieved = null) {
		if($recieved) {
			$field = (is_numeric($recieved)) ? 'item_id' : 'item_name';
			$data = $this->_db->get('inv_recieved_items', array($field, '=', $recieved));

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