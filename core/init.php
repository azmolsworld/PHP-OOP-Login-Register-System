<?php 

session_start():

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'localhost', 
		'username' => 'root';
		'db' => 'lr';
		'password' => ''
	),
	
	'remember' = array(
		'cookie_name' => 'hash', 
		'cookie_expriry' => 604800
	),
	
	'session' = array(
		'session_name' => 'user' 
	)
);

spl_autoload_register(function ($class){
	reguire_once 'classes/'.$class.'.php';
});

reguire_once 'functions/sanitize.php';