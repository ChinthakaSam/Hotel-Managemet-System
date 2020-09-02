<?php

class Services{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn;

	public function __construct($sc = null) {
		$this->_db = DB::getInstance();
		$this->_sessionName = Config::get('session/session_name');
		$this->_cookieName = Config::get('remember/cookie_name');

		if(!$sc){
			if(Session::exists($this->_sessionName)){
				$sc = Session::get($this->_sessionName);

				if($this->find($sc)){
					$this->_isLoggedIn = true;
				}else{
					//process logout
				}
			}
		}else{
			$this->find($sc);
		}
	}

	public function update($fields = array(), $id = null){

		if(!$id && $this->isLoggedIn()){
			$id = $this->data()->id;
		}

		if (!$this->_db->update('salesitem', $id, $fields)) {
			throw new Exception('There was a problem updating this entry.');
		} 
	}

	public function create($fields = array()){
		if (!$this->_db->insert('salesitem', $fields)) {
			throw new Exception('There was a problem creating an entry.');
		} 
	}

	public function find($sc = null){
		if($sc){
			$field = is_numeric($sc) ? 'itemId' : 'item';
			$data = $this->_db->get('salesitem', array($field, '=', $sc));

			if($data->count()){
				$this->_data = $data->first();
				return true;
			}
			
		}
		return false;
	}	

	public function login($username = null, $password = null, $remember = false){
		 
		//print_r($this->_data);

		if(!$username && !$password && $this->exists()){
			Session::put($this->_sessionName, $this->data()->id);
		}else{
			$user = $this->findSer($username);

			if($user){
				if( $this->data()->password === Hash::make($password, $this->data()->salt)){
					Session::put($this->_sessionName,$this->data()->id);

					if($remember){
						$hash = Hash::unique();
						$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

						if(!$hashCheck->count()){
							$this->_db->insert('users_session', array(
								'user_id'=> $this->data()->id,
								'hash' => $hash
							));
						}else{
							$hash = $hashCheck->first()->hash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
					}

					return true;
				}
			}  
			
		}
		
		return false;

	}

	public function hasPermission($key){
		$group = $this->_db->get('groups', array('id', '=', $this->data()->group));

		if($group->count()){
			//$permissions = json_decode($group->first()->permissions, true);
			//print_r($permissions);

			$permissions = json_decode($group->first()->permissions, true);
			//print_r($permissions);

			if($permissions[$key] == true){
				return true;
			}
		}
		return false;
	}

	public function exists(){
		return (!empty($this->_data)) ? true : false;
	}

	public function logout(){
		
		$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	public function data(){
		return $this->_data;
	}

	public function isLoggedIn(){
		return $this->_isLoggedIn;
	}
	
}