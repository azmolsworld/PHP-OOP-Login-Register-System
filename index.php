<?php 
require_once 'core/init.php';

$use = DB::getInstance()->update('users', 3, array(
	'password' => 'newpass',
	'name' => 'limon'
));

