<?php

class User {

	private $_db;
	private $_data;
	private $_sessionName;
	private $_isloggedIn;
	
	public function __construct($user = null) {
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get('session/session_name');

		if (!$user) {
			if (Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);

				if ($this->find($user)) {
					$this->_isloggedIn = true;
				} else {
					# code...
				}
				
			}
		} else {
			$this->find($user);
		}
	}

	public function update($fields = array(), $id = null){
		if (!$id && $this->isloggedIn()) {
			$id = $this->data()->id;
		}

		if (!$this->_db->update('users', $id, $fields)) {
			throw new Exception("Error update Request");
		}
	}

	public function create($fields = array()){
		if (!$this->_db->insert('users', $fields)) {
			throw new Exception('Error creating an account');
		}
	}

	public function find($user = null){
		if ($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));

			if ($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function login($username = null, $password = null){
		$user = $this->find($username);
		
		if ($user) {
			if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
				Session::put($this->_sessionName, $this->data()->id);
				return true;
			}
		}
		return false;
	}

	public function hasPermission($key){
		$group = $this->_db->get('groups', array('id', '=', $this->data()->groups));
		//print_r($group->first());

		if ($group->count()) {
			$permissions = json_decode($group->first()->permissions, true);

			if ($permissions[$key] === true) {
				return true;
			}
		}
		return false;
	}
	
	public function exists(){
		return (!empty($this->_db)) ? true : false ;
	}
	
	public function logout(){
		Session::delete($this->_sessionName);
	}

	public function data(){
		return $this->_data;
	}

	public function isloggedIn(){
		return $this->_isloggedIn;
	}
}