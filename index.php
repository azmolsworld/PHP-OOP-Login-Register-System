<?php 
require_once 'core/init.php';

$use = DB::getInstance()->query("SELECT username FROM users WHERE username = ?", array('limon'));


if ($use->error()) {
	echo "No User";
} else {
	echo "Ok!";
}