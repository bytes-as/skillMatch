<?php
    session_start();
    require_once 'dbconnect.php';
?>
<html>

<head>

    <title>Portal</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <style type = "text/css">

        html{
            position:relative;
            min-height: 100%;
        }
        body{
            background-color: #CFECF7;
            margin-bottom: 40px;
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
        .bottom-margin-forms{
            margin-bottom: 10px;
        }
        .user-info{
            font-size: 25px;
            margin-bottom: 5px;
        }
        .for-job{
            font-size:17px;
            margin-bottom: 5px;
        }
        .letter{
            font-size: 14px;
            margin-bottom: 5px;
        }
        .applications{
            padding: 40px !important;
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
                    <a class = "nav-link" href = "./home.php">Profile</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "./portal.php">Jobs Postings</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "#">Applications</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "#">Logout</a>
                </li>

            </ul>

        </div>
    </nav>
    
    <?php
        $userId = $_SESSION['userId'];
        $errors = array();
        $query = "SELECT employeeinfo.name as emplName, employeeinfo.employee_id as eeId , employeeInfo.email as emplEmail, job.job_id, application.description FROM employerInfo, job, application, employeeinfo WHERE employerinfo.employer_id = job.employer_id AND application.job_id = job.job_id AND employeeInfo.employee_id = application.employee_id AND employerinfo.employer_id = '{$userId}'";
        $runQuery = mysqli_query($dbcon, $query);
        $numRows = mysqli_num_rows($runQuery);
        while($appl_row = mysqli_fetch_assoc($runQuery)){
            echo '<div class= "profile-div applications" > 
                <div class="user-info" onclick="openUser('.$appl_row["eeId"].')"> '.$appl_row["emplName"].' | '.$appl_row["emplEmail"].' </div>
                <div class="for-job"> For Job: '.$appl_row["job_id"].' </div>
                <div class="letter"> '.$appl_row["description"].' </div>
            </div>';
        }
    ?>

</body>

<script src = "../assets/js/jquery.min.js"></script>
<script src = "../assets/js/popper.min.js"></script>
<script src = "../assets/js/bootstrap.js"></script>

<script type="text/javascript">

    $(document).ready(function(){
        
        $(".userHyperlink").onclick(function({
            
            alert("hi");
            
        }));
        
    })
    
</script>

</html>