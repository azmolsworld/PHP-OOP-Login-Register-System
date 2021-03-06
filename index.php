<?php 
require_once 'core/init.php';

if (Session::exists('home')) {
	echo Session::flash('home');
}

$user = new User();
if ($user->isLoggedIn()) {
?>
	<p> Hello <a href="#"><?php echo escape($user->data()->username); ?></a></p>
	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="update.php">Update details</a></li>
		<li><a href="changepassword.php">Change Password</a></li>
	</ul>
<?php
	if(!$user->hasPermission('admin')) {
		echo 'Your are an administrator!';
	}

} else {
	echo '<p>You need to <a href="login.php"> log in</a> or <a href="register.php"> register<a></p>';
}