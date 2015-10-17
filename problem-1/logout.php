<?php

$connection = mysqli_connect("localhost", "root", "");
// Selecting Database
$db = mysqli_select_db($connection,"credanceinfotech");
session_start();

$user=$_SESSION['login_user'];
$password=$_SESSION['password'];
$login_time=$_SESSION['login_time'];

date_default_timezone_set('GMT');
$temp= strtotime("+5 hours 30 minutes"); 
$logout_time = date("Y-m-d H:i:s",$temp);
//$logout_time=date("Y-m-d H:i:s");
$browser=$_SESSION['browser'];
$os=$_SESSION['operating_system'];	

$sql = "UPDATE login SET login_time='$login_time' ,logout_time='$logout_time', browser='$browser' ,operating_system='$os' WHERE username='$user' AND password='$password'";

if ($connection->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $connection->error;
}

if(session_destroy()) // Destroying All Sessions
{
header("Location: index.php"); // Redirecting To Home Page
}

?>












