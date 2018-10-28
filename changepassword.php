<?php 
require_once 'core/init.php';

$user = new User();

if (!$user->isLoggedIn()) {
	Redirect::to('index.php');
}

if (Input::exists()) {
	if (Token::check(Input::get('token'))) {
		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'cpassword' => array(
				'required' => true,
				'min' => 8
			),
			'new_password' => array(
				'required' => true,
				'min' => 8
			),
			'new_password_again' => array(
				'required' => true,
				'min' => 8,
				'matches' => 'new_password'
			)
		));

		if($validation->passed()) {

			if (Hash::make(Input::get('cpassword'), $user->data()->salt) !== $user->data()->password) {
				echo "Your current password don't match";
			}else{
				$salt = Hash::salt(32);
				$user->update(array(
					'password' => Hash::make(Input::get('new_password'), $salt),
					'salt' => $salt
				));				
			}

				Session::flash('home', 'Your password successfully changed');
				Redirect::to('index.php');
		}else{
			foreach($validation->errors() as $error) {
				echo $error, '<br>';
			}
		}
	}
}

?>

<form action="" method="post">
	<div class="field">
		<label for="cpassword">Current passworld</label>
		<input type="password" name="cpassword" id="cpassword" value="" >
	</div>

	<div class="field">
		<label for="new_password">New password</label>
		<input type="password" name="new_password" id="new_password" >
	</div>

	<div class="field">
		<label for="new_password_again">New password again</label>
		<input type="password" name="new_password_again" id="new_password_again" >
	</div>



	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
	<input type="submit" name="" value="Change">
	
</form>