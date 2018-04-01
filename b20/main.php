
<?php
/* User login process, checks if user exists and password is correct */
include ("config.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    // username and password sent from SQL
    $myutorid = mysqli_real_escape_string($db,$_POST['UTORid']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    
    $sql = "SELECT * FROM Accounts WHERE UTORid = '$myutorid' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);

	// If result matched $myutorid and $mypassword, table row must be 1 row
    if(mysqli_num_rows($result) == 1) {
        $_SESSION['UTORid'] = $myutorid;
        header("Location: success.php");
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
				<input type="text" name="UTORid" placeholder="Enter UTORid">
				<p>Password</p>
				<input type="password" name="password" placeholder="••••••">
				<input type="submit" name="" value="Sign In" href="register.php">
				<a href="register.php" name="register">Create Account</a>
			</form>
		</div>
	</body>
</html>

