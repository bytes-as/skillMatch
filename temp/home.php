<?php
    session_start();
    require_once 'dbconnect.php';
    require_once 'employeeInfo.php';
?>

<html>

<head>

    <title>Home</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

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
                    <a class = "nav-link" href = "./portals.php">Job Application</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "logouts.php">Logout</a>
                </li>

            </ul>

        </div>
    </nav>
    <div class= "profile-div" >
    
        <div class="cd-header"> Personal Profile </div>
        <hr>
        <div class="cd-body col">
            <div class="row">
                <div class="sml-headings col-4"> Username: </div>
                <div class="sml-ans col-8"> 
                    <?php echo htmlspecialchars($row['username']) ?> 
                </div>
            </div>
            <div class="row">
                <div class="sml-headings col-4"> Name: </div>
                <div class="sml-ans col-8"> 
                    <?php echo htmlspecialchars($row['emprName']) ?> 
                </div>
            </div>
            <div class="row">
                <div class="sml-headings col-4"> Email Id: </div>
                <div class="sml-ans col-8">
                    <?php echo htmlspecialchars($row['email']) ?> 
                </div>
            </div>
            <div class="row">
                <div class="sml-headings col-4"> Contact no.: </div>
                <div class="sml-ans col-8">
                    <?php echo htmlspecialchars($row['contact']) ?> 
                </div>
            </div>
            <div class="row">
                <div class="sml-headings col-4"> Organization: </div>
                <div class="sml-ans col-8">
                    <?php echo htmlspecialchars($row['orgName']) ?> 
                </div>
            </div>
            <div class="row">
                <div class="sml-headings col-4"> DOB: </div>
                <div class="sml-ans col-8">
                    <?php echo htmlspecialchars($row['dob']) ?> 
                </div>
            </div>
        
        </div>
        <hr>
        <div class="cd-footer">
        
            <button class="btn btn-sm btn-info float-right btn-width">Edit</button>
            <div class="clearfix"></div>
        
        </div>       
    
    </div>

</body>

<script src = "../assets/js/jquery.min.js"></script>
<script src = "../assets/js/bootstrap.js"></script>

</html>