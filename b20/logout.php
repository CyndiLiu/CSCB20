<?php
    /* User logout process */
    session_start();
    unset($_SESSION['UTORid']);
    unset($_SESSION["password"]);
    header('Refresh: 0; URL = main.php');
?>