<?php
require_once 'dbconnect.php';
$username = $_POST["username_or_email"];
$password = $_POST["password"];
$email = $_POST["email"];
$name  = $_POST["name"];
$contact = $_POST["contact"];
//////////////////////////////////////////////////////////////////////
//////////            INSERT INTO QUERIES    /////////////////////////
//////////////////////////////////////////////////////////////////////
$query1 = "SELECT username FROM recruit.loginInfo WHERE `username`='$username_or_email' AND `password`='$password'";
$result1 = mysqli_query($dbcon, $query1);
if($result1 == FALSE) {
    printf("error: %s\n", mysqli_error($dbcon));
    die("SQL query failed...");
}
    session_start();
    $_SESSION['auth'] = 'true';
    $_SESSION['username'] = $username;
	header('location:portals.php');
?>