<?php
	include('../config.php');
	session_start();
	if($_SERVER["REQUEST_METHOD"] == "POST") {

        $mymessage = $_POST['textmessage'];

        // Insert the feedback to database anonymously
        $sql = "INSERT INTO Feedback (feedback) VALUE ('$mymessage')";
        $res = mysqli_query($db, $sql);
    }
?>

<!-- a special link for students to give feed back anonymously -->
<html lang="en">
	<head>
		<title>feedback</title>
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
                <form action="" method="POST">
                    <textarea name="textmessage" rows="10" cols="50">Comments here. (Please limit in 150 words).</textarea><br>
                    <input style="margin-top: 20px" type="submit" name="" value="Submit">
                    
                    <script>
                        var btn = document.querySelector('input');
                        var txt = document.querySelector('p');

                        btn.addEventListener('click', updateBtn);

                        function updateBtn() {
                            if (btn.value != 'Submit') {
                                btn.value = 'Submit';
                                txt.textContent = 'You have submitted your feedback successfully!';
                            }
                        }  
                    </script>
                </form>


            </main>

                
            <footer>
                <a href="http://web.cs.toronto.edu/">cs lab</a>
                <p>Copyright © Wenyun Liu, Xinyi Liao</p>
            </footer>
	    </div>	
	</body>
</html>