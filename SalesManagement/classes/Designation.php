<?php

class Designation {
	private $_db;
	private	$_data;
	
	public function __construct($designation = null) {
		$this->_db = DB::getInstance();

		$this->findDes($designation);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('designation', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findDes($designation = null) {
		if($designation) {
			$field = (is_numeric($designation)) ? 'desId' : 'desName';
			$data = $this->_db->get('designation', array($field, '=', $designation));

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