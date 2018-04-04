<?php
    include('../config.php');
    session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		$mymessage = $_POST['message'];
		$myutorid = $_SESSION['UTORid'];

		// Check whether input "remarkreq" is int type as wanted
		if (isset($_POST['remarkreq']) && is_numeric($_POST['remarkreq'])){
			$remarkreq = $_POST['remarkreq'];
		}
		
		// Select all information with user information
		$mysql = "SELECT * FROM Remark WHERE UTORid = '$myutorid'";
		$result = mysqli_query($db, $mysql);
		
		if (mysqli_num_rows($result) == 0) {
			$sql = "INSERT INTO Remark (UTORid, remarkreq, message) VALUE ('$myutorid', '$remarkreq', '$mymessage')";
			$res = mysqli_query($db, $sql);
		} else if (mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['remarkreq'] != $remarkreq){
					$sql = "INSERT INTO Remark (UTORid, remarkreq, message) VALUE ('$myutorid', '$remarkreq', '$mymessage')";
					$res = mysqli_query($db, $sql);
				} else {
					echo "Your request has been sent!";
				}
			}
		}
	}
?>

<html lang="en">
	<head>
		<title>Academic</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="main.css" rel="stylesheet" type="text/css"/>
	</head>

	<body>
		<div class="container">
		
		<header>
			<p><img src="ut.png" alt="ut" style="width:70px;height:70px;margin-left:15px;"></p>
			<h1 id="branding">CSCB20 - Introduction to Database and Web Applications</h1>
		</header>
		
		<nav>
			<li><a class="active" href="academic1.php">Academic</a></li>
			<li><a href="feedback.php">Feedback</a></li>
			<li><a href="academic.php">Back</a></li>

		</nav>

		<main>
			<p><h1>My Marks</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<table class="data-table">
					<thead>
							<th>Quiz1</th>
							<th>Quiz2</th>
							<th>Quiz3</th>
							<th>Midterm</th>
							<th>Assignment1</th>
							<th>Assignment2</th>
							<th>Assignment3</th>
							<th>Final</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$myutorid = $_SESSION['UTORid'];
						$mysql = "SELECT quiz1, quiz2, quiz3, midterm, assignment1, assignment2, assignment3, final  
						FROM Mark WHERE UTORid = '$myutorid'";
						$result = mysqli_query($db,$mysql);
						if(mysqli_num_rows($result) > 0){
							while ($row = mysqli_fetch_assoc($result)) {
								echo '<tr>
								<td>'.$row['quiz1'].'</td>
								<td>'.$row['quiz2'].'</td>
								<td>'.$row['quiz3'].'</td>
								<td>'.$row['midterm']. '</td>
								<td>'.$row['assignment1'].'</td>
								<td>'.$row['assignment2'].'</td>
								<td>'.$row['assignment3'].'</td>
								<td>'.$row['final']. '</td>
								</tr>';
							}
						}
						?>
					</tbody>
			</table>

			<form action="" method="POST">
				<p><h1>Remark Request</h1></p>
				<HR style="border:1  black" width="100%" color=black SIZE=1>
				<select style="margin-top:10px" name="remarkreq" id="type1">
					<option value="Null" selected>--SELECT--</option>
					<option value="1" >Quiz1</option>
					<option value="2">Quiz2</option>
					<option value="3">Quiz3</option>
					<option value="4">Midterm</option>
					<option value="5">Assignment1</option>
					<option value="6">Assignment2</option>
					<option value="7">Assignment3</option>
					<option value="8">Final</option>
				</select><br>

				<textarea name="message" rows="3" cols="50" style="margin-top:20px">Comments here(Please limit in 150 words).</textarea><br>
				<input style="margin-top:20px" type="submit" name="" value="Remark">

			</form>
        </main>

			
	<footer>
		<a href="http://web.cs.toronto.edu/">cs lab</a>
		<p>Copyright © Wenyun Liu, Xinyi Liao</p>
	</footer>

		</div>	
	</body>
</html>
