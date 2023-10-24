<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}

require_once "config.php";

$username = $_SESSION['username'];
$query = "select * from users where username='$username'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);

$full_name = $row['full_name'];
$mobile_num = $row["mobile_num"];
$id = $row['id'];
?>