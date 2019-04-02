<?php
    session_start();
    require_once 'dbconnect.php';
?>

<html>

<head>

    <title>Portal</title>

    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
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
                    <a class = "nav-link" href = "#">Jobs Postings</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "./applications.php">Applications</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "#">Logout</a>
                </li>

            </ul>

        </div>
    </nav>
    <div class= "profile-div" >
    
        <div class="cd-header"> Complete your profile </div>
        <hr>
        <form class="cd-body col" action="postJob.php" type="POST">
        
            <div class="form-group">
            
                <label for ="job_type">Job Type: </label>
                <input type="text" class="form-control bottom-margin-forms" id="job_type" placeholder=" Job_type " name="job_type">
                <div class="row">                
                    <div class="col-6">                    
                        <label for ="start_date">Start date: </label>
                        <input type="date" class="form-control bottom-margin-forms" id="start_date" name="start_date">
                    </div>
                    <div class="col-6">                    
                        <label for ="end_date">End date: </label>
                        <input type="date" class="form-control bottom-margin-forms" id="end_date" name="end_date">                    
                    </div>                
                </div>
                <label for ="salary">Salary: </label>
                <input type="text" class="form-control bottom-margin-forms" id="salary" placeholder=" Salary in rupees " name="salary">
                <label for ="location">Location: </label>
                <input type="text" class="form-control bottom-margin-forms" id="location" placeholder="Location" name="location">
                <label > Skills required: </label>
                <div class="row">                
                    <div class="col-6">                    
                        <input type="text" class="form-control bottom-margin-forms" id="skill1" name="skill1" placeholder="Skill 1">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control bottom-margin-forms" id="skill1Duration" name="skill1Duration" placeholder="skill 1 Duration in Months">                    
                    </div>                
                </div>
                <div class="row">                
                    <div class="col-6">                    
                        <input type="text" class="form-control bottom-margin-forms" id="skill2" name="skill2" placeholder="Skill 2">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control bottom-margin-forms" id="skill2Duration" name="skill2Duration" placeholder="skill 2 Duration in Months">                    
                    </div>                
                </div>
                <div class="row">                
                    <div class="col-6">                    
                        <input type="text" class="form-control bottom-margin-forms" id="skill3" name="skill3" placeholder="Skill 3">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control bottom-margin-forms" id="skill3Duration" name="skill3Duration" placeholder="skill 3 Duration in Months">                    
                    </div>                
                </div>
                <div class="row">                
                    <div class="col-6">                    
                        <input type="text" class="form-control bottom-margin-forms" id="skill4" name="skill4" placeholder="Skill 4">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control bottom-margin-forms" id="skill4Duration" name="skill4Duration" placeholder="skill 4 Duration in Months">                    
                    </div>                
                </div>
                <div class="row">                
                    <div class="col-6">                    
                        <input type="text" class="form-control bottom-margin-forms" id="skill5" name="skill5" placeholder="Skill 5">
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control bottom-margin-forms" id="skill5Duration" name="skill5Duration" placeholder="skill 5 Duration in Months">                    
                    </div>                
                </div>
                <label for ="description">Job Description: </label>
                <textarea class="form-control bottom-margin-forms" id="description" placeholder=" Job description " name="description" rows="3"></textarea>
                
            </div>
            <hr>
            <div class="cd-footer">

                <button type="submit" class="btn btn-sm btn-info float-right btn-width">Post</button>
                <div class="clearfix"></div>

            </div>
        </form>
    
    </div>

</body>

<script src = "../assets/js/jquery.min.js"></script>
<script src = "../assets/js/jquery-ui.js"></script>
<script src = "../assets/js/popper.min.js"></script>
<script src = "../assets/js/bootstrap.js"></script>

<script type="text/javascript">
    
    $(document).ready(function(){
        
        $("#skill1").autocomplete({
            source: 'FetchSkills.php',
            select: function(event,ui){
                alert(ui.item.id);
            }
        });
         $("#skill2").autocomplete({
            source: 'FetchSkills.php'
        });
        $("#skill3").autocomplete({
            source: 'FetchSkills.php'
        });
        $("#skill4").autocomplete({
            source: 'FetchSkills.php'
        });
        $("#skill5").autocomplete({
            source: 'FetchSkills.php'
        });
        
    })  

</script>

</html>