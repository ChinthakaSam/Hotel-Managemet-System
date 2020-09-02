<?php

class Residentialpayment {
	private $_db;
	private	$_data;
	
	public function __construct($payment = null) {
		$this->_db = DB::getInstance();

		$this->findRP($payment);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('payment', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findSpa($payment = null) {
		if($payment) {
			$field = (is_numeric($payment)) ? 'paymentId' : 'amount';
			$data = $this->_db->get('payment', array($field, '=', $payment));

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