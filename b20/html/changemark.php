<?php
    include('../config.php');
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $Studentid = $_POST['Studentid'];
        if (isset($_POST['markop']) && is_numeric($_POST['markop'])){
            $markop = $_POST['markop'];
        }
        
        if (isset($_POST['mark']) && is_numeric($_POST['mark'])){
            $mark = $_POST['mark'];
        }

        $mysqli = "SELECT * from Marks WHERE UTORid = '$Studentid'";
        $result = mysqli_query($db,$mysqli);
        if (mysqli_num_rows($result) == 1) {
            while($row = mysqli_fetch_assoc($result)) {
                if ($markop == 1){
                    $sql = "UPDATE Marks SET quiz1='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 2){
                    $sql = "UPDATE Marks SET quiz2='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 3 ){
                    $sql = "UPDATE Marks SET quiz3='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 4){
                    $sql = "UPDATE Marks SET midterm='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 5){
                    $sql = "UPDATE Marks SET assignment1='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 6){
                    $sql = "UPDATE Marks SET assignment2='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 7){
                    $sql = "UPDATE Marks SET assignment3='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                } else if ($markop == 8){
                    $sql = "UPDATE Marks SET final='$mark' WHERE UTORid='$Studentid'";
                    $res = mysqli_query($db, $sql);
                }
            }
        }

        $delsql = "DELETE from Remark WHERE UTORid='$Studentid' and remarkreq ='$markop'";
        $delete = mysqli_query($db,$delsql);
        if (mysqli_num_rows($delete) == 0) {
            echo "Cannot find this request.";
        }
        
        $row = $_SESSION['logintype'];
        if($row->logintype == 2) {
            header("Location: academic2.php");
        } else if($row->logintype == 3){
            header("Location: academic3.php");
        }

    }
?>