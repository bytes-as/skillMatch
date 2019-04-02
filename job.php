<?php
	session_start();
	require_once 'dbconnect.php';
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Match your skill</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
<style>        html{
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
	<? php
			require_once "dbconnect.php";
			session_start();	
			if(!$_SESSION['auth']) {
				header('location:logins.php');
			}
	?>
	<nav class = "navbar navbar-expand-md navbar-dark bg-dark">
		<a class = "navbar-brand" href = "#">Job Finder</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
		</button>
		<div class = "collapse navbar-collapse" id = "navbarNav">
		<ul class = "navbar-nav">
		<li class = "nav-item">
                <a class = "nav-link" href = "home.php">Profile</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "#">Jobs Posted</a>
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

		<!-- <center>
			<a href = "login.php">Login</a><br><br>
			<a href = "signup.php">Signup</a>
		</center> -->

		<div class="main-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12 content">
						<?php
							require_once "dbconnect.php";
							if($dbcon == FALSE)
								die("connection query failed...");
							$query = "SELECT organization.name as orgName, job.job_type, job.description, job.job_id FROM organization, job, employerinfo WHERE organization.org_id = employerinfo.org_id AND job.employer_id = employerinfo.employer_id";
							$result = mysqli_query($dbcon, $query);
							if($result == FALSE) {
								printf("error: %s\n", mysqli_error($dbcon));
								die("SQL query failed...");
							}
							// $row = mysqli_fetch_row($result);
							while($row = mysqli_fetch_assoc($result)) {
								$id = $row['job_id'];
								?>
								<div class= "profile-div applications" >

									<a href="particularjob.php?id=<?php echo $id; ?>" style="color: black; text-decoration: none"> 
										<div class="user-info"><?php echo $row['orgName'];?>&nbsp;|&nbsp;<?php echo $row['job_type']; ?></div>
										<div class="for-job"><?php echo $row['description']; ?>
									</a>
								</div>
							</div>
						<?php	} ?>
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</body>


</html>
