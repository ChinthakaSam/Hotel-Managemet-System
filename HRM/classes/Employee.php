<?php

class Employee {
	private $_db;
	private	$_data;
	
	public function __construct($employee = null) {
		$this->_db = DB::getInstance();

		$this->findEmp($employee);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('employee', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findEmp($employee = null) {
		if($employee) {
			$field = (is_numeric($employee)) ? 'empId' : 'fullName';
			$data = $this->_db->get('employee', array($field, '=', $employee));

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