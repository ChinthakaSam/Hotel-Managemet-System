<?php

class Cycling {
	private $_db;
	private	$_data;
	
	public function __construct($cycling = null) {
		$this->_db = DB::getInstance();

		$this->findCY($cycling);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('cycling', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findCY($cycling = null) {
		if($cycling) {
			$field = (is_numeric($cycling)) ? 'reservationId' : '	NumberOfBicycle';
			$data = $this->_db->get('cycling', array($field, '=', $cycling));

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