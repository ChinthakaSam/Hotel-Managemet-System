<?php

class Evaluation {
	private $_db;
	private	$_data;
	
	public function __construct($evaluation = null) {
		$this->_db = DB::getInstance();

		$this->findEvl($evaluation);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('empevaluation', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findEvl($evaluation = null) {
		if($evaluation) {
			$field = (is_numeric($evaluation)) ? 'evalId' : 'empId';
			$data = $this->_db->get('empevaluation', array($field, '=', $evaluation));

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