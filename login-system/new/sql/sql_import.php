<?php

//connection variables
$host = 'mathlab.utsc.utoronto.ca';
$user = 'liaoxin6';
$password = 'liaoxin6';

//create mysql connection
$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

//create the database
if ( !$mysqli->query('CREATE DATABASE accounts') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

//create users table with all the fields
$mysqli->query('
CREATE TABLE `accounts`.`users` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `firstname` VARCHAR(50) NOT NULL,
     `lastname` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `usertype` VARCHAR(50) NOT NULL,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

?>