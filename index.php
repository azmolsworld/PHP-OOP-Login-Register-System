<?php 
require_once 'core/init.php';

$use = DB::getInstance()->insert('users', array(
	'username' 	=> 'bady',
	'password' 	=> 'password',
	'salt'		=> 'salt'
));