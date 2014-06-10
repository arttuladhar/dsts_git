<html>
<head>
<title>Branch LogIn</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
<body>


<?php

include '../dbconnect.php';

if (isset($bname) && isset($bid)) {
	session_start();
	$bname=$_SESSION['bname'];
	$bid=$_SESSION['bid'];
	header("location: welcome_admin.php");
}



if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

$bname = $_POST["bname"];
$bpass  = $_POST["bpassword"];
$dbconn = getdbConnection();

// Checking Connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit();
}

$result = checkbranchpassword ($dbconn, $bname, $bpass);
$result_count = $result -> num_rows;
$result_array = mysqli_fetch_array($result,MYSQLI_ASSOC);
$branchid = $result_array['branchid'];
echo $result_count;

if ( $result_count != 0 ) {
	//Get BrranchName and BranchID and Attach to the Session
	session_start();
	$_SESSION['bname']=$bname;
	$_SESSION['bid']= $branchid;

	header("location: welcome_admin.php");
}
else {
	echo "<div class='alert alert-danger'>Incorrect Username and Password</div>";
}	

}

?>

<div id="header"></div>
<div class="container">
<div class="row">
<div class="col-md-8">
<h2>Branch Login</h2><hr>
<form class="form-horizontal" id="branchlogin" role="form" action="login.php" method="post">
<div class="well">
	<div class="form-group">
		<label for="bname" class="col-md-2 control-label">Branch Name</label>
		<div class="col-md-6">
			<select id="bname" name="bname" class="form-control">
				<?php
				$branches = getBranchNames();
				foreach ($branches as $branch) {
					echo "<option>$branch</option>";
				}
			?>
		</select>
	</div>
	</div>
		<div class="form-group">
		<label for="bpassword" class="col-md-2 control-label">Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" id="bpassword" name="bpassword" placeholder="Password" required>
		</div>
	</div>
		<div class="form-group">
		<div class="col-md-offset-2 col-md-5">
			<button type="submit" class="btn btn-default">Sign in</button>
		</div>
	</div>
</div>
</form>
</div>
</div>
<!-- jQuery Validation -->
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>