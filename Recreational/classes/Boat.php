<?php

class Boat {
	private $_db;
	private	$_data;
	
	public function __construct($boatservice = null) {
		$this->_db = DB::getInstance();

		$this->findBS($boatservice);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('boatservice', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findBS($boatservice = null) {
		if($boatservice) {
			$field = (is_numeric($boatservice)) ? 'reservationId' : 'noOfPassengers';
			$data = $this->_db->get('boatservice', array($field, '=', $boatservice));

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