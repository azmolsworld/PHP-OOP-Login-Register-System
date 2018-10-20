<?php 
require_once 'core/init.php';

if (Input::exists()) {
	$validate = new validate();
	$validation = $validate->check($_POST, array(
		'username' => array(
			'required' => true,
			'min' => 5,
			'max' => 20,
			'unique' => 'users'
		),
		'password' => array(
			'required' => true,
			'min' => 8
		),
		'password_again' => array(
			'required' => true,
			'matches' => 'password'
		),
		'name' => array(
			'required' => true;
			'min' => 3,
			'max' => 50
		)
	));
	if ($validation->passed) {
		//register
	}else {
		// not
	}
}

?>


<form action="" method="post">
	<div class="field">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off">
	</div>

	<div class="field">
		<label for="password">Choose a password</label>
		<input type="password" name="password" id="password" >
	</div>

	<div class="field">
		<label for="username_again">Enter your username again</label>
		<input type="password" name="username_again" id="username_again" >
	</div>

	<div class="field">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" autocomplete="off">
	</div>

	<input type="submit" name="" value="Register">
	
</form>