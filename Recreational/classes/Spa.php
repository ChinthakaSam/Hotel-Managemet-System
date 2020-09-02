<?php

class Spa {
	private $_db;
	private	$_data;
	
	public function __construct($spa = null) {
		$this->_db = DB::getInstance();

		$this->findSpa($spa);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('spa', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findSpa($spa = null) {
		if($spa) {
			$field = (is_numeric($spa)) ? '	reservationId' : 'CustomerName';
			$data = $this->_db->get('spa', array($field, '=', $spa));

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