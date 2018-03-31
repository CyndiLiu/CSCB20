<?php 
/* Main page with two forms: sign up and log in */
require 'config.php';
session_start();
?>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // user logging in
    if (isset($_POST['login'])) {
        if ( $result->num_rows == 0 ){ // User doesn't exist
			$_SESSION['message'] = "User with that email doesn't exist!";
			header("location: error.php");
		} else { // User exists
			$UTORid = $result->fetch_assoc();
	
			$_SESSION['UTORid'] = $_POST['UTORid'];
			$_SESSION['firstname'] = $_POST['firstname'];
			$_SESSION['lastname'] = $_POST['lastname'];
	
			// Escape all $_POST variables to protect against SQL injections
			$firstname = $mysqli->escape_string($_POST['firstname']);
			$lastname = $mysqli->escape_string($_POST['lastname']);
			$UTORid = $mysqli->escape_string($_POST['UTORid']);
			$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
			// should be selection here
			//$logintype = $mysqli->escape_string( md5( rand(0,1000) ) );
	
			// UTORid and password both should not be empty
			if ($UTORid && $passowrd){
				// check whether database has the maching UTORid and password
				$sql = "select * from Accounts where UTORid = '$UTORid' and password='$passowrd'";
				$result = mysql_query($sql); // execute sql
				$rows=mysql_num_rows($result); // return a value
	
				if($rows){ // 0 false 1 true
					// if success, jump to welcome page
					header("refresh:0; url = success.php");
					exit;
				} else {
					//if error, using js to jump back to login page
					header("refresh:0; url = error.php");
				}
	
			} else { // if one of the UTORid and password is empty 
				// if error, using js to jump back to log in page
				echo "Incompleted Form";
				echo "
					<script>
						setTimeout(function(){window.location.href='main.php';},1000);
					</script>";
			}
			// close the database
			mysql_close();
		}
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
				<input type="submit" name="" value="Sign In">
				<a href="register.php" name="register">Create Account</a>
			</form>
		</div>
	</body>
</html>

