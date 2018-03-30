<?php
/* User login process, checks if user exists and password is correct */
include 'config.php';
// Escape email to protect against SQL injections
$UTORid = $mysqli->escape_string($_POST['UTORid']);
$result = $mysqli->query("SELECT * FROM Accounts WHERE UTORid='$UTORid'");


if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: error.php");
} else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        $_SESSION['UTORid'] = $user['UTORid'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['logintype'] = $user['logintype'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        header("location: success.php");
    } else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}

?>







