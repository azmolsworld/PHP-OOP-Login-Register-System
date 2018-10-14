<?php 
require_once 'core/init.php';

$use = DB::getInstance()->get('users', array('username', '=', 'limon'));


if(!$use->count()) {
	echo "No User";
}else {
	echo "Ok!";
}