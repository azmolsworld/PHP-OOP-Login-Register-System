<?php

 class Valicate {
 	private $_passed = fales;
 	private $_errors = array();
 	private $_db = null;
 	

 	public function __construct(){
 		$this->_db = DB::getInstance();
 	}

 	public function check($source, $items = array()){
 		foreach ($items as $item => $rules) {
 			foreach ($rules as $rule => $rule_value) {
 				
 				$value = $source[$item];

 				if ($rule === 'required' && empty($value)) {
 					$this->addError("{$item}" is required)
 				}
 			}
 		}
 	}

 	private function addError($error){
 		$this->_errors[] = $error;
 	}
 } 