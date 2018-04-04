<?php
/* Registration process, inserts user info into the database */
include ('config.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Initialize all the input
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $UTORid = $_POST['UTORid'];
    $password = $_POST['password'];

    // Check whether the logintype is int and save the value
    if (isset($_POST['logintype']) && is_numeric($_POST['logintype']))
        $logintype = $_POST['logintype'];
    else
        $logintype = 1;

    // Check if user with that UTORid already exists
    $mysqli = "SELECT * from Accounts WHERE UTORid = '$UTORid'";
    $result = mysqli_query($db,$mysqli);

    // We know user email exists if the rows returned are more than 0
    if (mysqli_num_rows($result) == 1) {
        $error = 'User with this UTORid already exists!';
        header("location: error.php");
    } else {
        // Insert the user information to the database
        $sql = "INSERT INTO Accounts (firstname, lastname, UTORid, password, logintype) " 
                . "VALUES ('$firstname','$lastname','$UTORid','$password', '$logintype')";
        // Add user to the database
        $res = mysqli_query($db, $sql);
        header("location: main.php");
    }
}
?>
    
<html>
	<head>
        <title>Register</title>
		<link rel="stylesheet" href="html/style.css">
	</head>
	<body>
		<div class="loginplace" style="height: 700px">
			<img src="html/ut.png" class="user">
            <h2>Create Account</h2>

			<form action="" method="POST">
                <p>First Name</p>
                    <input type="text" name="firstname" placeholder="Enter First Name" required>
                <p>Last Name</p>
				    <input type="text" name="lastname" placeholder="Enter Last Name" required>
				<p>UTORid</p>
				    <input type="text" name="UTORid" placeholder="Enter UTORid" required>
				<p>Password</p>
                    <input type="text" name="password" placeholder="Enter Password" required>

                <p>Login As</p>
                <script src="js/option.js"></script>
                <div class="test-box" style="padding: 15px 5px 20px 0px">
                    <select name="logintype" id="type1">
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
