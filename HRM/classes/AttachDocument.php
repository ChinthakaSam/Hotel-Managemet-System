<?php

class AttachDocument {
	private $_db;
	private	$_data;
	
	public function __construct($attachdocument = null) {
		$this->_db = DB::getInstance();

		$this->findAttach($attachdocument);
	}

	public function update($fields = array(), $id = null) {
		
		 if(!$id) {
		 	$id = $this->data()->id;
		 }
 

		if(!$this->_db->update('personaldocument', $id, $fields)) {
				throw new Exception('There was a problam upadting');
		}
	}

	public function create($table, $fields = array()) {
		if(!$this->_db->insert($table, $fields)) {
			throw new Exception('There was a problem');
			
		}
	}

	public function findAttach($attachdocument = null) {
		if($attachdocument) {
			$field = (is_numeric($attachdocument)) ? 'docId' : 'attachment';
			$data = $this->_db->get('personaldocument', array($field, '=', $attachdocument));

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