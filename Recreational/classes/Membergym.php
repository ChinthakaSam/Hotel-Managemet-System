<?php

class Membergym {
	private $_db;
	private	$_data;
	
	public function __construct($membership = null) {
		$this->_db = DB::getInstance();

		$this->findMem($membership);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('membership', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findMem($membership = null) {
		if($membership) {
			$field = (is_numeric($membership)) ? 'memberId' : 'fullName';
			$data = $this->_db->get('membership', array($field, '=', $membership));

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