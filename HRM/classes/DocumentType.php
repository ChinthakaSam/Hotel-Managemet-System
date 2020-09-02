<?php

class DocumentType {
	private $_db;
	private	$_data;
	
	public function __construct($documenttype = null) {
		$this->_db = DB::getInstance();

		$this->findDocType($documenttype);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('documenttype', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findDocType($documenttype = null) {
		if($documenttype) {
			$field = (is_numeric($documenttype)) ? 'docTypeId' : 'docTypeName';
			$data = $this->_db->get('documenttype', array($field, '=', $documenttype));

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