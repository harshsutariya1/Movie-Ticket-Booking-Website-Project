<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
// define('DB_NAME', 'login');

// Try connecting to the Database
// $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, "login");
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, "login");
// $conn2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, "theaters");
$conn2 = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, "theaters");


//Check the connection
if($conn == false){
    dir('Error: Cannot connect login DB');
}
if($conn2 == false){
    dir('Error: Cannot connect theaters DB');
}


?>
