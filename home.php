<?php
    session_start();
    require_once 'dbconnect.php';
    require_once 'employeeInfo.php';
?>

<html>

<head>

    <title>Home</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style type = "text/css">

        html{
            position:relative;
            min-height: 100%;
        }
        body{
            background-color: #CFECF7;
            margin-bottom: 60;
        }
        #wrapper{
            position: relative;
            width:100%;
            min-height:100%;
        }
        .navbar-brand{
            font-weight: bold;
        }
        .navbar-brand:hover{
            color: skyblue;
        }
        .navbar-nav{
            margin: auto;
        }
        .topbar{
            float: right !important;
            margin: 0 !important;
        }        
        .col-centered{
            margin:auto;
        }        
        .profile-div{
            margin-top: 20px !important;
            max-width: 1000px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin: auto;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075)!important;   
        }
        .cd-header{
            font-weight: bold;
            font-size: 18px;
        }
        .cd-body{
            font-size: 15px;          
        }
        .sml-headings{
            display: inline-block;
            color: #343A40;
            font-weight: 500;
        }
        .sml-ans{
            display: inline-block;
        }
        .btn-width{
            width: 100px;
        }


    </style>

</head>
<body>

    <nav class = "navbar navbar-expand-md navbar-dark bg-primary">

        <a class = "navbar-brand" href = "#">RT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class = "collapse navbar-collapse" id = "navbarNav">

            <ul class = "navbar-nav">

                <li class = "nav-item">
                    <a class = "nav-link" href = "#">Profile</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "./job.php">Jobs Posted</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "./applications.php">Applications</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "logouts   .php">Logout</a>
                </li>

            </ul>

        </div>
    </nav>
    <?php
        $userName = $_SESSION['username'];
        $query = "SELECT employee_id from employeeInfo WHERE username='{$userName}'";
        $runQuery = mysqli_query($dbcon, $query);
        $id_fetch = mysqli_fetch_assoc($runQuery);
        $eeUserId = $id_fetch['employee_id'];
        $errors = array();
        $query = "SELECT employeeinfo.name as emplName, employeeInfo.email as emplEmail, employeeinfo.contact as emplContact FROM employeeInfo WHERE employeeInfo.employee_id =  '{$eeUserId}'";
        $runQuery = mysqli_query($dbcon, $query);
        
        while($appl_row = mysqli_fetch_assoc($runQuery)){
            echo '
            <div class= "profile-div applications" > 
                <div class="user-info"> '.$appl_row["emplName"].' | '.$appl_row["emplEmail"].' | '.$appl_row["emplContact"].' </div>
                <div class="inner-heading">Educational Qualifications: </div>
                <hr>
                ';
                $subquery_eq = "SELECT institute.name as instiName, aggregate_percentage, end_year FROM educationalqualification, institute WHERE institute.insti_id = educationalqualification.insti_id AND educationalqualification.employee_id = {$eeUserId}";
                $runQuery1_eq = mysqli_query($dbcon, $subquery_eq);
                
             	echo '
             	<ul>
             	';   
                while($qual_row = mysqli_fetch_assoc($runQuery1_eq)){
                	echo '
                  	<li> <div class="fields"> '.$qual_row["instiName"].' | '.$qual_row["aggregate_percentage"].' | '.$qual_row["end_year"].' </div>
                    	</li>
                	';
                }
                
                echo '
                </ul>
                <div class="inner-heading">Experience: </div>
                <hr>
                ';
                
               	echo'
                <div class="fields">
                ';
                $subquery_ex = "SELECT exp_type, start_date, end_date, description FROM experience WHERE experience.employee_id = {$eeUserId}";
                $runQuery1_ex = mysqli_query($dbcon, $subquery_ex);
                	
             	while($ex_row = mysqli_fetch_assoc($runQuery1_ex)){
             	    echo 
             	    '
                    <div class="exp-fields">
                    <b>'.$ex_row["exp_type"].' | '.$ex_row["start_date"].' : '.$ex_row["end_date"].' </b><br>
                    Description
                    ';
             	}
             	
                echo'
                </div>
                <div class="inner-heading">Skills: </div>
                <hr>
                <ul>
                ';
                $subquery_sk = "SELECT skill_name FROM employeeSkill, skill WHERE skill.skill_id = employeeSkill.skill_id AND employee_id = {$eeUserId}";
                $runQuery1_sk = mysqli_query($dbcon, $subquery_sk);
                
                while($sk_row = mysqli_fetch_assoc($runQuery1_sk)){
                echo'
                    <li> <div class="fields"> '.$sk_row["skill_name"].' </div>
                    </li>
                ';
                }
                    echo '
                </ul>
            </div>
            ';
        }
    ?>

</body>

<script src = "assets/js/jquery.min.js"></script>
<script src = "assets/js/bootstrap.js"></script>

</html>