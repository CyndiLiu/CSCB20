<?php
// Database connection settings
$host = 'localhost';
$username = 'root';
$password = 'm';
$db = 'accounts';
$mysqli = new mysqli($host,$username,$password,$db) or die($mysqli->error);
?>