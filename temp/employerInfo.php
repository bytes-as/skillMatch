<?php
    require_once 'dbconnect.php';
    $userName = $_SESSION['username'];
    $errors = array();
    $query = "SELECT  employer_id,employerinfo.name as emprName,username,employerinfo.email,employerinfo.contact,organization.name as orgName,dob FROM employerinfo, organization WHERE username = '$userName' AND employerinfo.org_id = organization.org_id;";
    $runQuery = mysqli_query($dbcon, $query);
    $numRows = mysqli_num_rows($runQuery);
    if ( $numRows == 1 ){
        $row = $runQuery->fetch_assoc();
        $_SESSION['userId'] = $row['employer_id'];
    } else {
        array_push($errors, 'User Id error_ No row returned');
    }

        
?>
