
<html lang="en">
	<head>
		<title>academic</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link href="main.css" rel="stylesheet" type="text/css"/>
	</head>

	<body >
		<div class="container">
		
		<header>
			<p><img src="ut.png" alt="ut" style="width:70px;height:70px;margin-left:15px;"></p>
			<h1 id="branding">CSCB20 - Introduction to Database and Web Applications</h1>
		</header>
		
		<nav>
			<li><a class="active" href="academic.php">Back</a></li>			
		</nav>

		<main>
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
					<tbody>
						<?php
						include('../config.php');
						session_start();
						
						$myutorid = $_SESSION['UTORid'];
						$mysql = "SELECT quiz1, quiz2, quiz3, midterm, assignment1, assignment2, assignment3, final  
						FROM Mark WHERE Mark.UTORid = '$myutorid'";
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
			<p><h1>Remark Request</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<select name="logintype" id="type1">
                <option value="1" selected>Quiz1</option>
                <option value="2">Quiz2</option>
                <option value="3">Quiz3</option>
				<option value="4">Midterm</option>
				<option value="5">Assignment1</option>
				<option value="6">Assignment2</option>
				<option value="7">Assignment3</option>
				<option value="8">Final</option>
            </select>
			<input type="submit" name="" value="Remark">

			<p><h1>Feedback</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<p>You can start with......</p>
				<pre>
(a) What do you like about the instructor teaching?
(b) What do you recommand the instructor to do to improve their teaching?
(c) What do you like about the labs?
(d) What do you recommand the lab instructors to do to improve their lab teaching?
(e) ......
            	</pre>
			<textarea rows="10" cols="50">Comments here. <	/textarea><br>
			<button href="academic1.html">Click Me!</button>

             
        </main>

			
	<footer>
		<a href="http://web.cs.toronto.edu/">cs lab</a>
		<p>Copyright © Wenyun Liu, Xinyi Liao</p>
	</footer>

		</div>	
	</body>
</html>