<?php 

session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'localhost', 
		'username' => 'root',
		'db' => 'lr',
		'password' => ''
	),
	
	'remember' => array(
		'cookie_name' => 'hash', 
		'cookie_expriry' => 604800
	),
	
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token' 
	)
);

spl_autoload_register(function ($class){
	require_once 'classes/'. $class .'.php';
});

require_once 'functions/sanitize.php';