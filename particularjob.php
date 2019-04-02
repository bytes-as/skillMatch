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
                    <a class = "nav-link" href = "./job.php">Jobs Posted</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "./applications.php">Applications</a>
                </li>
                <li class = "nav-item">
                    <a class = "nav-link" href = "logouts.php">Logout</a>
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
                            $id = $_GET['id'];
							$query = "SELECT organization.name as orgName, job.job_type, job.description, job.job_id FROM organization, job, employerinfo WHERE organization.org_id = employerinfo.org_id AND job.employer_id = employerinfo.employer_id AND job_id = $id";
							$result = mysqli_query($dbcon, $query);
							if($result == FALSE) {
								printf("error: %s\n", mysqli_error($dbcon));
								die("SQL query failed...");
							}
							$userName = $_SESSION['username'];
							$query = "SELECT employee_id from employeeInfo WHERE username='{$userName}'";
							$runQuery = mysqli_query($dbcon, $query);
							$id_fetch = mysqli_fetch_assoc($runQuery);
							echo $id_fetch['employee_id'];							 
							// $row = mysqli_fetch_row($result);
							$row = mysqli_fetch_assoc($result);
								?>
								<div class= "profile-div applications" >

										<div class="user-info"><?php echo $row['orgName'];?>&nbsp;|&nbsp;<?php echo $row['job_type']; ?></div>
										<div class="for-job"><?php echo $row['description']; ?>
										<?php
											printf("job-id");
											echo $id;
											printf("emp-id");
											echo $id_fetch['employee_id'];
											$result = mysqli_fetch_assoc($runQuery);
											$query = "SELECT `status` FROM `application` WHERE job_id={$id} AND employee_id={$id_fetch['employee_id']}";
											$runQuery = mysqli_query($dbcon, $query);
											if($runQuery == FALSE) {
												printf("error: %s\n", mysqli_error($dbcon));
												die("SQL query failed...");
											}
											$numResult = mysqli_num_rows($result);
											if ($numResult == 0) {
												echo "You haven't applied";
											} else {
												if(result['status'] == 0)
													echo "You have applied, Be patient and wait for the employer to contact you.";
												else{
												if(result['status'] == 1) echo "You have been accepted, if the employer haven't contacted you, he will...just wait for it";
												else echo "you have been rejected";
												}
											}
										?>
								</div>
							</div>
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
