<?php
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername = mysqli_real_escape_string($db,$_POST['username']);
        $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
        
        $sql = "SELECT id FROM admin WHERE username = '$myusername' and password = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
          
        if($count == 1) {
           $_SESSION['login_user'] = $myusername;
           header("Location: welcome.php");
        } else {
           $error = "Your Login Name or Password is invalid";
        }
     }
?>

<html>
	<head>
		<!-- <meta charset="utf-8"> -->
		<title>Transparent Login Form</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="loginplace">
			<img src="ut.png" class="user">
            <h2>Create Account</h2>
			<form>
				<p>Email</p>
				<input type="text" name="" placeholder="Enter Email">
				<p>Password</p>
				<input type="password" name="" placeholder="••••••">
                <input type="submit" name="" value="Sign Up">
                <input type="submit" name="" value="Cancel">
				<a href="login.html">Sign In</a>
			</form>
		</div>
	</body>
</html>
