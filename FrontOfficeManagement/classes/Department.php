<?php

class Department {
	private $_db;
	private	$_data;
	
	public function __construct($department = null) {
		$this->_db = DB::getInstance();

		$this->findDep($department);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('department', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findDep($department = null) {
		if($department) {
			$field = (is_numeric($department)) ? 'depId' : 'depName';
			$data = $this->_db->get('department', array($field, '=', $department));

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