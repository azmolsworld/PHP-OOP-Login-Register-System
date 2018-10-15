<?php 
require_once 'core/init.php';

$use = DB::getInstance()->query("SELECT * FROM users");


if(!$use->count()) {
	echo "No User";
}else {
	foreach ($use->results() as $user) {
		echo $user->username, "<br>";
	}
}