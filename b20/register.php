<?php
/* Registration process, inserts user info into the database */
include ('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $UTORid = $_POST['UTORid'];
    $password = $_POST['password'];

    // Int type field
    


    // Check if user with that UTORid already exists
    $mysqli = "SELECT * from Accounts WHERE UTORid = $UTROid";
    $result = mysqli_query($db,$mysqli);
    // We know user email exists if the rows returned are more than 0
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = 'User with this UTORid already exists!';
    } else { 
        // UTORIid doesn't already exist in a database, proceed...
        $sql = "INSERT INTO Accounts (firstname, lastname, UTORid, password, logintype) " 
                . "VALUES ('$firstname','$lastname','$UTORid','$password', '$logintype')";
        // Add user to the database
        if ($db->query($sql) === TRUE) {
            $_SESSION['message'] = "New account created successfully";
            header("loaction: main.php");
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

			<form action="" method="POST">
                <p>First Name</p>
                  <input type="text" name="firstname" placeholder="Enter First Name">
                <p>Last Name</p>
				<input type="text" name="lastname" placeholder="Enter Last Name">
				<p>UTORid</p>
				<input type="text" name="UTORid" placeholder="Enter UTORid">
				<p>Password</p>
                <input type="text" name="password" placeholder="Enter Password">



                <p>Login As</p>
                <script src="js/option.js"></script>
                <div class="test-box" style="padding: 15px 5px 20px 0px">
                    <select name="usertype" id="type1">
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
