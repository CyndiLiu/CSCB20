<?php 
/* Main page with two forms: sign up and log in */
require 'config.php';
session_start();
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // user logging in
    if (isset($_POST['login'])) {
        require 'login.php';
    }

    // user registering
    else if (isset($_POST['register'])) {
        require 'register.php';
    }
}
?>

<html>
	<head>
		<title>CSCB20</title>
		<link rel="stylesheet" href="html/style.css">
	</head>
	
	<body>
		<div class="loginplace">
			<img src="html/ut.png" class="user">
			<h2>Log In</h2>
			<form>
				<p>UTORid</p>
				<input type="text" name="" placeholder="Enter UTORid">
				<p>Password</p>
				<input type="password" name="" placeholder="••••••">
				<a href="html/index.html"><button class="button button-block" name="login" />Sign In</button></a><br>
				<a href="register.php" name="register">Create Account</a>
			</form>
		</div>
	</body>
</html>

