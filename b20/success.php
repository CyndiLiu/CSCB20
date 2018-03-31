<?php
/* Displays all successful messages */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Success!</title>
        <link rel="stylesheet" href="html/style.css">
    </head>

    <body>
		<div class="loginplace" style="height: 500px">
			<img src="html/ut.png" class="user">
			<h2 style="margin-top: 70px">Successfully Connect!</h2>
			<form style="padding: 30px" action="html/index.html">
                <!-- should be able to link to main.php -->
				<input href="html/index.html" type="submit" name="login" value="Go to Home" style="margin-top: 50px">
				<a href="register.php" name="register">Create Account</a>
			</form>
		</div>
	</body>
</html>
