<?php
/* Displays all error messages */
?>
<!DOCTYPE html>


<html>
    <head>
        <title>Error</title>
        <link rel="stylesheet" href="html/style.css">
    </head>

    <body>
		<div class="loginplace" style="height: 300px">
			<img src="html/ut.png" class="user">
			<h2>Error</h2>
			<form style="padding: 30px">
                <!-- should be able to link to main.php -->
				<input href="main.php" type="submit" name="login" value="Try Again">
				<a href="register.php" name="register">Create Account</a>
			</form>
		</div>
	</body>
</html>
