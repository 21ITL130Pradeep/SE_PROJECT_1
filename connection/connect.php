<?php

//main connection file for both admin & front end
$servername = "	sql303.byethost17.com"; //server
$username = "b17_35383764"; //username
$password = "password"; //password
$dbname = "b17_35383764_Kattu_soru";  //database

// Create connection
$db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
// Check connection
if (!$db) {       //checking connection to DB	
    die("Connection failed: " . mysqli_connect_error());
}

?>
