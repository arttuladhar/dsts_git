<html>
<head>
	<title>User Login - DSTS </title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<body>
<?php
include("header.php");

if(isset($_SESSION)) {
session_destroy();
}

?>

<div class="container">
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


<?php

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
	include 'dbconnect.php';
	session_start();

	$uname = $_POST["uname"];
	$pass  = $_POST["pass"];
	$dbconn = getdbConnection();

	$result = checkuserpassword ($dbconn, $uname, $pass);
	
	if ( ! empty($result) ) {
		$dbpass   = $result['password'];
		$username = $result['firstname'];

		//Check if Correct Password
		if ( $dbpass === $pass) {
			$_SESSION['user']      = $uname;
			$_SESSION['firstname'] = $username;
			header("location: welcome.php");
		}
	}
		else {echo "<div class='row' align='center'><div class='col-md-6 col-md-offset-3'><div class='alert alert-danger'>Incorrect Username and Password</div></div></div>";
	}
}

?>
	</div>
</div>
<!-- jQuery Validation -->
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>