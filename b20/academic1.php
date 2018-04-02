<?php
    include('../config.php');
    session_start();
?>

<html lang="en">
	<head>
		<title>test</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="main.css" rel="stylesheet" type="text/css"/>
	</head>

	<body >
		<div class="container">
		
		<header>
			<p><img src="ut.png" alt="ut" style="width:70px;height:70px;margin-left:15px;"></p>
			<h1 id="branding">CSCB20 - Introduction to Database and Web Applications</h1>
		</header>.html
		
		<nav>
			<li><a class="active" href="academic.php">Back</a></li>			
		</nav>

		<main>action:'marks.php'
			<p><h1>Marks</h1></p>
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
					<tbody >
						<?php
						$myutorid = $_SESSION['UTORid'];
						$mysql = "SELECT quiz1, quiz2, quiz3, midterm, assignment1, assignment2, assignment3, final 
						FROM Marks WHERE UTORid = '$myutorid'";
						$results = mysql_query($db,$mysql);
						if(mysqli_num_rows($result) == 1){
							echo '<tr>
							<td>'.$quiz1.'</td>
							<td>'.$quiz2.'</td>
							<td>'.$quiz3.'</td>
							<td>'.$midterm. '</td>
							<td>'.$assignment1.'</td>
							<td>'.$assignment2.'</td>
							<td>'.$assignment3.'</td>
							<td>'.$final. '</td>
							</tr>';
						}
						?>
					</tbody>
			</table>
			<p><h1>Remark Request</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>

			<textarea rows="10" cols="50">Comments here. </textarea><br>
			<button href="academic1.html">Click Me!</button>

            
        </main>

			
	<footer>
		<a href="http://web.cs.toronto.edu/">cs lab</a>
		<p>Copyright © Wenyun Liu, Xinyi Liao</p>
	</footer>

		</div>	
	</body>
</html>