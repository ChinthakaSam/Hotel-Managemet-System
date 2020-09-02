<?php
class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct() {
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array()) {
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				$value = trim($source[$item]);
				$item = escape($item);

				if($rule === 'required' && empty($value)) {
					$this->addError("{$item} is required");
				}else if(!empty($value)) {
					switch ($rule) {
						case 'min':
								if(strlen($value) < $rule_value){
									$this->addError("{$item} must be a minimum of {$rule_value} characters.");
								}
							break;
						
						case 'max':
								if(strlen($value) > $rule_value){
									$this->addError("{$item} must be a maximum of {$rule_value} characters.");
								}
							break;

						case 'matches':
								if($value != $source[$rule_value]){
									$this->addError("{$rule_value} must match {$item}");
								}
							break;

						case 'expDate':
								if($value < $source[$rule_value]){
									$this->addError("Expire date must be greater than Arrival date");
								}
							break;

						case 'expDateMatch':
								if($value < $rule_value){
									$this->addError("You can't choose a Expiry date which is less than Current date");
								}
							break;
						
						case 'unique':
								$check = $this->_db->get($rule_value, array($item, '=', $value));
								if($check->count()){
									$this->addError("{$item} already taken.");
								}
							break;

						case 'uniqueItem':
								$check = $this->_db->get($rule_value, array($item, '=', $value));
								if($check->count()){
									$this->addError("This item is already in system. You have to just update the quantity of the previously entered item.");
								}
							break;

						case 'checkUnique':
								$check = $this->_db->get($rule_value, array($item, '=', $value));
								if(!$check->count()){
									$this->addError("This item is not available right now.");
								}
							break;

						case 'checkQuantity':
								$checks = $this->_db->get($rule_value, array($item, '>', $value));
								if($checks->count()){
									$this->addError("There are not enough item quantity for process this transaction.");
								}
							break;

						case 'numbers':
								if(!is_numeric($value)){
									$this->addError("{$item} field valuses must be in Integers");
								}
							break;
						

						default:
							# code...
							break;

					}
				}
			}
		}

		if(empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;
	}

	private function addError($error) {
		$this->_errors[] = $error;
	}

	public function errors() {
		return $this->_errors;
	}

	public function passed() {
		return $this->_passed;
	}
}