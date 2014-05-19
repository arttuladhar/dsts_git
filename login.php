<html>
<head>
	<title>User Login - DSTS </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<body>
<div id="header"></div>
<div class="container">
<!-- Header -->
<?php include("header.html"); ?>
<!-- Header End -->

<?php

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
include 'dbconnect.php';
session_start();

$uname = $_POST["uname"];
$pass  = $_POST["pass"];
$dbconn = getdbConnection();

// Checking Connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

$result = checkuserpassword ($dbconn, $uname, $pass);
$result_count = $result -> num_rows;

if ( $result) {
	if ( $result_count != 0 ) {
		$_SESSION['user']=$uname;
		header("location: welcome.php");
	}
	else {
		echo "<div class='alert alert-danger'>Incorrect Username and Password</div>";
	}	
} else {
	echo "<div class='alert alert-danger'>Unknown Problem - If this issue still persists please contact us</div>";
}
}

?>

	<div class="row">
		<div class="col-md-3"></div>

		<div class="col-md-6">
			<h2>User Login</h2><hr>
			<div class="well">

				<form class="form-horizontal" id="login" role="form" action="login.php" method="post">
					<div class="form-group">
						<label for="inputEmail3" class="col-md-2 control-label">Username</label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="uname" name="uname" placeholder="Username" required>
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword3" class="col-md-2 control-label">Password</label>
						<div class="col-md-10">
							<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Remember me
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-2 col-md-10">
							<button type="submit" class="btn btn-default">Sign in</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- jQuery Validation -->
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>