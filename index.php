<? php
    require_once "dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
        <script src="./js/script.js"></script>
		<meta charset="utf-8">
		<title>Match your skill</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>


	<body class="body">
	<nav class = "navbar navbar-expand-md navbar-dark bg-dark">

<a class = "navbar-brand" href = "#">Job Finder</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
		<span class="navbar-toggler-icon"></span>
</button>

<div class = "collapse navbar-collapse" id = "navbarNav">

		<ul class = "navbar-nav">

				<li class = "nav-item">
						<a class = "nav-link" href = "#">Home</a>
				</li>
				<li class = "nav-item">
						<a class = "nav-link" href = "about.php">About Us</a>
				</li>
		</ul>

</div>
</nav>

		<!-- <center>
			<a href = "login.php">Login</a><br><br>
			<a href = "signup.php">Signup</a>
		</center> -->

		<div class="main-body" style="margin:0; padding:0;">
		<div id="wrapper">
			<div class="container-fluid">
				<div class="row" style="height: inherit;">
           <div id="seeker" class="col-md-6 col-sm-6 col-xs-0 content" onclick="openSeekerLogin()">
						<h1> I need Employee </h1>
					</div>

					<div id="poster" class="col-md-6 col-sm-6 col-xs-12 content" onclick="openPosterLogin()">
						<h1> I need employee </h1>
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
