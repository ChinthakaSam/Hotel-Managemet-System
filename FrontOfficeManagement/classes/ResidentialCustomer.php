<?php

class ResidentialCustomer {
	private $_db;
	private	$_data;
	
	public function __construct($residentialcustomer = null) {
		$this->_db = DB::getInstance();

		$this->findResCustomer($residentialcustomer);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('residentialcustomer', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findResCustomer($residentialcustomer = null) {
		if($residentialcustomer) {
			$field = (is_numeric($residentialcustomer)) ? 'customerId' : 'customerName';
			$data = $this->_db->get('residentialcustomer', array($field, '=', $residentialcustomer));

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