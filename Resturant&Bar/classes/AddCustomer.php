<?php

class AddCustomer {
	private $_db;
	private	$_data;
	
	public function __construct($restaurantreservation = null) {
		$this->_db = DB::getInstance();

		$this->findCus($restaurantreservation);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('restaurantreservation', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findCus($restaurantreservation = null) {
		if($restaurantreservation) {
			$field = (is_numeric($restaurantreservation)) ? 'reservationId' : 'tableNumber';
			$data = $this->_db->get('restaurantreservation', array($field, '=', $restaurantreservation));

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