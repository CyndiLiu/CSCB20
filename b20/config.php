<?php
    // Database connection settings
    define('DB_SERVER', 'mathlab.utsc.utoronto.ca');
    define('DB_USERNAME', 'liuwenyu');
    define('DB_PASSWORD', 'liuwenyu');
    define('DB_DATABASE', 'cscb20w18_liuwenyu');
    $db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
?>
