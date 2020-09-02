<?php

class RoomReservation {
	private $_db;
	private	$_data;
	
	public function __construct($roomreservation = null) {
		$this->_db = DB::getInstance();

		$this->findRoom($roomreservation);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('roomreservation', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findRoom($roomreservation = null) {
		if($roomreservation) {
			$field = (is_numeric($roomreservation)) ? 'reservationId' : 'roomNo';
			$data = $this->_db->get('roomreservation', array($field, '=', $roomreservation));

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