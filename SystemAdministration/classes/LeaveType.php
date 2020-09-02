<?php

class LeaveType {
	private $_db;
	private	$_data;
	
	public function __construct($leavetype = null) {
		$this->_db = DB::getInstance();

		$this->findLv($leavetype);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('leavetype', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findLv($leavetype = null) {
		if($leavetype) {
			$field = (is_numeric($leavetype)) ? 'leaveTypeId' : 'leaveTypeName';
			$data = $this->_db->get('leavetype', array($field, '=', $leavetype));

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