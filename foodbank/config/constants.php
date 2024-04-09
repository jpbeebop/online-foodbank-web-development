<?php

    // define('SITEURL','http://localhost/jiapao/php/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','foodbank');

    $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD);
    $db_select = mysqli_select_db($conn,DB_NAME);

    if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        exit();
    }
?>