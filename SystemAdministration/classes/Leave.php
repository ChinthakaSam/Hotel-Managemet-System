<?php

class Leave {
	private $_db;
	private	$_data;
	
	public function __construct($leave = null) {
		$this->_db = DB::getInstance();

		$this->findLeave($leave);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('employeeleave', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findLeave($leave = null) {
		if($leave) {
			$field = (is_numeric($leave)) ? 'empLeaveId' : 'requestedBy';
			$data = $this->_db->get('employeeleave', array($field, '=', $leave));

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