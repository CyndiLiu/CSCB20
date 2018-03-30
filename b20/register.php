
<?php
/* Registration process, inserts user info into the database */
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Check if user with that email already exists
    $result = $mysqli-> query("SELECT * FROM Accounts WHERE UTORid='$UTORid'") or die($mysqli->error());

    // We know user email exists if the rows returned are more than 0
    if ( $result->num_rows > 0 ) {
        $_SESSION['message'] = 'User with this UTORid already exists!';
    } else { 
        // UTORIid doesn't already exist in a database, proceed...
        $sql = "INSERT INTO Accounts (firstname, lastname, UTORid, password, logintype) " 
                . "VALUES ('$firstname','$lastname','$UTORid','$password', '$logintype')";

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
				<p>UTORid</p>
				<input type="text" name="" placeholder="Enter UTORid">
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
            



                <a href="main.php"><button class="button button-block" name="login" />Register</button></a><br>
				<a href="main.php">Sign In</a>
			</form>
		</div>
	</body>
</html>
