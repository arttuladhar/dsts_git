<html>
<head>
	<title>Add Branch - DSTS </title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
<body>
<div id="header"></div>
<div class="container">

<?php
include '../dbconnect.php';

if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

	$bname      = $_POST["bname"];
	$bpassword  = $_POST["bpassword"];
	$badd1      = $_POST["badd1"];
	$badd2      = $_POST["badd2"];
	$blat       = $_POST["blat"];
	$blng       = $_POST["blng"];
	$bdistrict  = $_POST["bdistrict"];
	$bzone      = $_POST["bzone"];
	$bpostalcode= $_POST["bpostalcode"];

	$SQL_INSERT_BRANCH = "INSERT INTO branch(name, password, add1, add2, lat, lng, district, zone, postalcode)".
	"VALUES ('$bname', '$bpassword', '$badd1','$badd2','$blat','$blng','$bdistrict','$bzone','$bpostalcode')";

	$dbconn = getdbConnection();

	/* check connection */
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	mysqli_real_escape_string($dbconn,$bname);
	mysqli_real_escape_string($dbconn,$bpassword);
	mysqli_real_escape_string($dbconn,$badd1);   
	mysqli_real_escape_string($dbconn,$badd2);   
	mysqli_real_escape_string($dbconn,$blat);  
	mysqli_real_escape_string($dbconn,$blng);   
	mysqli_real_escape_string($dbconn,$bdistrict);
	mysqli_real_escape_string($dbconn,$bzone);
	mysqli_real_escape_string($dbconn,$bpostalcode);

	//Start Database Transaction
	if (!mysqli_query($dbconn,$SQL_INSERT_BRANCH)){
		die ('Error: '. mysqli_error($dbconn));	    	
	} else {
		echo "<h2>Branch has been successfully added</h2>";
		echo "<table class='table table-condensed'>";
		echo "<tr><th>BranchName</th><td>$bname</td></tr>";
		echo "<tr><th>Address 1</th><td>$badd1</td></tr>";
		echo "<tr><th>Address 2</th><td>$badd2</td></tr>";
		echo "<tr><th>Latitude</th><td>$blat</td></tr>";
		echo "<tr><th>Longitude</th><td>$blng</td></tr>";
		echo "<tr><th>District</th><td>$bdistrict</td></tr>";
		echo "<tr><th>Zone</th><td>$bzone</td></tr>";
		echo "<tr><th>Postal Code</th><td>$bpostalcode</td></tr>";
		echo "</table></div></body></html>";
	}
	//End Database Transaction

exit();

}


?>

<div class="row">
<div class="col-md-8">

<h2>Branch Add</h2><hr>

<form class="form-horizontal" id="branchadd" role="form" action="addBranch.php" method="post">
	<div class="form-group">
		<label for="bname" class="col-md-2 control-label">Branch Name*</label>
		<div class="col-md-5">
			<input type="text" class="form-control" id="bname" name="bname" placeholder="Branch Name" required>
		</div>
	</div>
	<div class="form-group">
		<label for="bpassword" class="col-md-2 control-label">Password</label>
		<div class="col-md-5">
			<input type="password" class="form-control" id="bpassword" name="bpassword" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label for="badd1" class="col-md-2 control-label">Address 1*</label>
		<div class="col-md-5">
			<input type="text" class="form-control" id="badd1" name="badd1" placeholder="Address 1">
		</div>
	</div>
	<div class="form-group">
		<label for="badd2" class="col-md-2 control-label">Address 2</label>
		<div class="col-md-5">
			<input type="text" class="form-control" id="badd2" name="badd2" placeholder="Address 2">
		</div>
	</div>
	<div class="form-group">
		<label for="blat" class="col-md-2 control-label">Latitide*</label>
		<div class="col-md-5">
			<input type="text" class="form-control" id="blat" name="blat" placeholder="Latitude" required>
		</div>
	</div>
	<div class="form-group">
		<label for="blng" class="col-md-2 control-label">Longitude*</label>
		<div class="col-md-5">
			<input type="text" class="form-control" id="blng" name="blng" placeholder="Longitude" required>
		</div>
	</div>
	<div class="form-group">
		<label for="bdistrict" class="col-md-2 control-label">District*</label>
		<div class="col-md-4">
		<select id="bdistrict" name="bdistrict" class="form-control">
			<?php
			$districts = getDistricts();
			foreach ($districts as $district) {
				echo "<option>$district</option>";
			}
			?>
		</select>
	</div>
	</div>
	<div class="form-group">
		<label for="bzone" class="col-md-2 control-label">Zone*</label>
		<div class="col-md-4">
		<select id="bzone" name="bzone" class="form-control">
			<?php
			$zones = getZones();
			foreach ($zones as $zone) {
				echo "<option>$zone</option>";
			}
			?>
		</select>
	</div>
	</div>
		<div class="form-group">
		<label for="bpostalcode" class="col-md-2 control-label">Postal Code*</label>
		<div class="col-md-5">
			<input type="number" class="form-control" id="bpostalcode" name="bpostalcode" placeholder="Postal Code" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-offset-2 col-md-5">
			<button type="submit" class="btn btn-default">Sign Up</button>
		</div>
	</div>
</form>
</div>
</div>
</div>

<!-- jQuery Validation -->
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>