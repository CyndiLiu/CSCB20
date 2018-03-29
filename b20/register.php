
<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Set session variables to be used on profile.php page
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['first_name'] = $_POST['firstname'];
    $_SESSION['last_name'] = $_POST['lastname'];

    // Escape all $_POST variables to protect against SQL injections
    $first_name = $mysqli->escape_string($_POST['firstname']);
    $last_name = $mysqli->escape_string($_POST['lastname']);
    $email = $mysqli->escape_string($_POST['email']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    // should be selection here
    $hash = $mysqli->escape_string( md5( rand(0,1000) ) );

    // Check if user with that email already exists
    $result = $mysqli-> query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {
        $_SESSION['message'] = 'User with this email already exists!';
        header("location: error.php");
    } else { 
        // Email doesn't already exist in a database, proceed...
        // active is 0 by DEFAULT (no need to include it here)
        $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
                . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

        // Add user to the database
        if ( $mysqli->query($sql) ){
            // So we know the user has logged in
            $_SESSION['logged_in'] = true;
        } else {
            $_SESSION['message'] = 'Registration failed!';
            header("location: error.php");
        }

    }
}
?>

<html>
	<head>
        <title>Register Form</title>
		<link rel="stylesheet" href="html/style.css">
	</head>
	<body>
		<div class="loginplace" style="height: 700px">
			<img src="html/ut.png" class="user">
            <h2>Create Account</h2>
			<form>
                <p>First Name</p>
                  <input type="text" name="" placeholder="Enter First Name">
                <p>Last Name</p>
				<input type="text" name="" placeholder="Enter Last Name">
				<p>Email</p>
				<input type="text" name="" placeholder="Enter Email">
				<p>Password</p>
                <input type="text" name="" placeholder="Enter Password">



                <p>Login As</p>
                <script src="js/option.js"></script>
                <div class="test-box" style="padding: 15px 5px 20px 0px">
                    <select name="pay1" id="pay1">
                        <option value="1" selected>Student</option>
                        <option value="2">T.A.</option>
                        <option value="3">Instructor</option>
                    </select>
                </div>
            



                <input type="submit" name="" value="Register">
				<a href="main.php">Sign In</a>
			</form>
		</div>
	</body>
</html>
