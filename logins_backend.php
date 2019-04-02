<?php
require_once 'dbconnect.php';
$username_or_email = $_POST["username_or_email"];
$password = $_POST["password"];

// $password = md5($password);

$query1 = "SELECT username FROM recruit.loginInfo WHERE `username`='$username_or_email' AND `password`='$password'";
// $query2 = "SELECT * FROM user WHERE email='$username_or_email' AND password='$password'";

$result1 = mysqli_query($dbcon, $query1);
// $result2 = mysqli_query($dbcon, $query2);
// $row1=mysqli_fetch_array($result1);
// $row2=mysqli_fetch_array($result1);
if($result1 == FALSE) {
    printf("error: %s\n", mysqli_error($dbcon));
    die("SQL query failed...");
}

$numResults1 = mysqli_num_rows($result1);
// $numResults2 = mysqli_num_rows($result2);
// $total_result = $numResults1 + $numResults2;

if($numResults1 == 1) {
    $row = mysqli_fetch_assoc($result1);
    printf("fetched&nbsp;row : ");
    session_start();
    $_SESSION['auth'] = 'true';
    // if($_SESSION['auth']) printf("this is true\n");
    $_SESSION['username'] = $row['username'];
    $query = "SELECT employee_id from employeeInfo WHERE username='{$userName}'";
    $runQuery = mysqli_query($dbcon, $query);
    $id_fetch = mysqli_fetch_assoc($runQuery);
    $_SESSION['id'] = $id_fetch['employee_id']; 
    echo $_SESSION['username'];
    // $_SESSION['user_type'] = 1;
	header('location:home.php');
} else {
	header('location:logins.php');
}
?>