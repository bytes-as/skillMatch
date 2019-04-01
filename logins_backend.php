<?php
require_once 'dbconnect.php';
$email_or_username = $_POST["username_or_email"];
$password = $_POST["password"];

$password = md5($password);

$query1 = "SELECT * FROM user WHERE username='$username_or_email' AND password='$password'";
$query2 = "SELECT * FROM user WHERE email='$username_or_email' AND password='$password'";


$result1 = mysqli_query($dbcon, $query1);
$result2 = mysqli_query($dbcon, $query2);
$row1=mysqli_fetch_array($result1);
$row2=mysqli_fetch_array($result1);

$numResults1 = mysqli_num_rows($result1);
$numResults2 = mysqli_num_rows($result2);
$total_result = $numResults1 + $numResults2;

if($total_result == 1) {
    session_start();
    $_SESSION['auth'] = true;
	header('location:job.php');
} else {
	header('location:logins.php');
}
?>