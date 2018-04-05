<?php
    include('../config.php');
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        //this section is to set the variable for remark options
        $Studentid = $_POST['Studentid'];

        //check the input mark and remark option to be int
        if (isset($_POST['markop']) && is_numeric($_POST['markop'])){
            $markop = $_POST['markop'];
        }
        
        if (isset($_POST['mark']) && is_numeric($_POST['mark'])){
            $mark = $_POST['mark'];
        }

        //select the data about the student's marks from the database
        $mysqli = "SELECT * from Mark WHERE UTORid = '$Studentid'";
        $result = mysqli_query($db,$mysqli);

        if (mysqli_num_rows($result) == 1) {
            //pair the integers from 1 to 8 to different quizzes, exams or assignments
            //update the marks of each remark option
            while($row = mysqli_fetch_assoc($result)) {
                if ($markop == 1){
                    $sql = "UPDATE Mark SET quiz1='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 2){
                    $sql = "UPDATE Mark SET quiz2='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 3 ){
                    $sql = "UPDATE Mark SET quiz3='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 4){
                    $sql = "UPDATE Mark SET midterm='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 5){
                    $sql = "UPDATE Mark SET assignment1='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 6){
                    $sql = "UPDATE Mark SET assignment2='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 7){
                    $sql = "UPDATE Mark SET assignment3='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 8){
                    $sql = "UPDATE Mark SET final='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                }
            }
        }
        
        //this section is to automatically delete remark requests when the mark is updated
        $delsql = "DELETE from Remark WHERE utorid='$Studentid' and remarkreq ='$markop'";
        $delete = mysqli_query($db,$delsql);
        if (mysqli_num_rows($delete) == 0) {
            echo "Cannot find this request.";
        }
        
        //redirect to the previous academic page
        $row = $_SESSION['logintype'];
        if($row->logintype == 2) {
            header("Location: academic2.php");
        } else if($row->logintype == 3){
            header("Location: academic3.php");
        }

    }
?>