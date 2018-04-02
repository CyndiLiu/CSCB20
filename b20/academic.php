<?php
    include('../config.php');
    session_start();
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$myutorid = $_SESSION['UTORid'];
		$sql = "SELECT logintype FROM Accounts WHERE UTORid = '$myutorid'";
		$result = mysqli_query($db, $sql);
		if (mysqli_num_rows($result) == 1) {
			while($row = mysqli_fetch_assoc($result)) {
				if ($result == 1){
					header("Location: academic1.php");
				} else if($result == 2) {
					header("Location: academic2.php");
				} else if($result == 3){
					header("Location: academic3.php");
				}
			}
		}
	}
?>


<!DOCTYPE html>
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
		</header>
		
		<nav>
			<li><a href="index.html">home</a></li>
			<li><a href="calendar.html">calendar</a></li>
			<li><a href="news.html"><span style="color:rgb(255, 255, 71);">new</span> news</a></li>
			<li><a href="https://piazza.com/class/jcpjjp5l4bywd">Piazza</a></li>
			<li><a href="lecture.html">lecture</a></li>
			<li><a href="https://markus.utsc.utoronto.ca/cscb20w18/">MarkUs</a></li>
			<li><a href="assignment.html">assignment</a></li>
			<li><a class="active" href="academic1.html">academic</a></li>
			<li><a href="resource.html">resource</a></li>
		</nav>

		<main>
			<p><h1>Test</h1></p>
			<HR style="border:1  black" width="100%" color=black SIZE=1>
			<p><b>MIDTERM TEST</b><span> </span><mark><i>important!</i></mark></p>
			<p>Feb. 12th, from 9:10 a.m. to 12 :00.</p>
			<pre>
seating arrangements:

Last Name (A-N) in SW 319
				
Last Name (P-T) in  MW  120
				
Last Name (U-Z) in  PO 101
            </pre>
            
			<p><h1>Other Academic Information</h1></p>
            <HR style="border:1  black" width="100%" color=black SIZE=1>
            
			<form action="" method="POST">
				<!-- <p>UTORid</p>
				<input style="width:150px;" type="text" name="UTORid" placeholder="Enter UTORid" required>
				<p>Password</p>
				<input style="width:150px;" type="password" name="password" placeholder="••••••" required><br> -->
				<p>Countinue to Mark and Feedback......</p>
				<input type="submit" name="" value="Proceed">
            </form>

        </main>

	<footer>
		<a href="http://web.cs.toronto.edu/">cs lab</a>
		<p>Copyright © Wenyun Liu, Xinyi Liao</p>
	</footer>

		</div>	
	</body>
</html>