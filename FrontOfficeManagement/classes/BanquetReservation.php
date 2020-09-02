<?php

class BanquetReservation {
	private $_db;
	private	$_data;
	
	public function __construct($banquetreservation = null) {
		$this->_db = DB::getInstance();

		$this->findBanquetRes($banquetreservation);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('banquetreservation', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findBanquetRes($banquetreservation = null) {
		if($banquetreservation) {
			$field = (is_numeric($banquetreservation)) ? 'reservationId' : 'location';
			$data = $this->_db->get('banquetreservation', array($field, '=', $banquetreservation));

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