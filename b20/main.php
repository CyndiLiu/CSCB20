
<?php
/* User login process, checks if user exists and password is correct */
include ("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape all the special characters
    $myutorid = mysqli_real_escape_string($db,$_POST['UTORid']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
	
	// Username and password sent from SQL
    $sql = "SELECT * FROM Accounts WHERE UTORid = '$myutorid' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);

	// If result matched $myutorid and $mypassword, table row must be 1
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['UTORid'] = $myutorid;
		header("Location: success.php");
	// Error happen when user have already been created
    } else {
		$error = "Your Login Name or Password is invalid";
		header("location: error.php");
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
			<form action="" method="POST">
				<p>UTORid</p>
				<input type="text" name="UTORid" placeholder="Enter UTORid" required>
				<p>Password</p>
				<input type="password" name="password" placeholder="••••••" required>
				<input type="submit" name="" value="Sign In">
				<a href="register.php" name="register">Create Account</a>
			</form>
		</div>
	</body>
</html>

