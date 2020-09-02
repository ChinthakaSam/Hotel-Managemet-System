<?php

class AddReq {
	private $_db;
	private	$_data;
	
	public function __construct($requisitions = null) {
		$this->_db = DB::getInstance();

		$this->findReq($requisitions);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('requisitions', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findReq($requisitions = null) {
		if($requisitions) {
			$field = (is_numeric($requisitions)) ? 'reqId' : 'item_name';
			$data = $this->_db->get('requisitions', array($field, '=', $requisitions));

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