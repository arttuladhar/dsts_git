<html>
<head><title>Update Shipment</title></head>
<body>
<?php
session_start();

$bname=$_SESSION['bname'];
$bid=$_SESSION['bid'];


if (isset($bname) && isset($bid)) {
	include("adminHeader.php");
} else {
	header("location: login.php");
}

?>

<div class="container">
	<div class="row">
		<h2>Update Shipment Information</h2>
	</div>
	<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" role="form" name="updateShipment" action="updateShipment.php" method="get">
		<div class="form-group">
			<label for="shipmentid">Shipment ID</label>
			<input type="text" id="shipmentid" name="shipmentid">
			<input type="submit" value="Check Shipment">
		</div>
		</form>
	</div>
</div>


<?php
include '../dbconnect.php';
include '../helper.php';
date_default_timezone_set('Asia/Katmandu');

#Check Database Details on Shipment
if (isset($_GET["shipmentid"])) {

	$shipmentInfoArray = Array();
	$dbconn = getdbConnection();
	$shipmentid = $_GET["shipmentid"];

	//Parity Curent Check
	$MYSQL_SELECT_SHIPMENT_CHECK ="
	SELECT shipmentid, destination_branchid 
	FROM user_shipment_status
	WHERE shipmentid='$shipmentid' ORDER BY date desc LIMIT 1";

	//Get Shipment Details From Shipment Status Table
	$MYSQL_SELECT_SHIPMENT_INFO ="
	SELECT us_status.date, us_status.status, us_status.description, sbranch.name as source_branch_name, 
	sbranch.add1 as source_add1, sbranch.add2 as source_add2, dbranch.name as destination_branch_name, 
	dbranch.add1 as destination_add1, dbranch.add2 as destination_add2
	FROM user_shipment_status us_status
	LEFT JOIN branch sbranch ON us_status.source_branchid=sbranch.branchid
	LEFT JOIN branch dbranch ON us_status.destination_branchid=dbranch.branchid
	WHERE shipmentid='$shipmentid' AND destination_branchid='$bid' ORDER BY date desc LIMIT 1 ";

	$shipmentid = mysqli_real_escape_string($dbconn,$shipmentid);

	if ( $dbconn !== null ) {
		$shipmentCheck       = mysqli_query($dbconn,$MYSQL_SELECT_SHIPMENT_CHECK);
		$shipmentCheckArray   = mysqli_fetch_array($shipmentCheck,MYSQLI_BOTH);

		if ( $shipmentCheckArray['destination_branchid'] != $bid ) {
			echo "<h3>No Shipment Found</h3>";
			exit;
		}

		$shipmentResult       = mysqli_query($dbconn,$MYSQL_SELECT_SHIPMENT_INFO);

		//Shipment Info
		if ($shipmentResult !== false ){
			$shipmentInfoArray=mysqli_fetch_array($shipmentResult,MYSQLI_BOTH);
		}
		else {
			die ('Error: '. mysqli_error($dbconn));	    	
		}

		if ($shipmentInfoArray != null ) {

		echo "<div class='row'>";
		echo "<strong><h4 class='text-info'>Shipment Information</h4></strong>";
		echo "<div class='col-md-7'>";
		echo "<table class='table table-hover'>";
		echo "<tr>";
		echo "<th>Shipment ID</th><td>{$shipmentid}</td></tr>";
		echo "<th>Date</th><td>{$shipmentInfoArray['date']}</td></tr>";
		echo "<th>Status</th><td>{$shipmentInfoArray['status']}</td></tr>";
		echo "<th>Source Branch</th><td>{$shipmentInfoArray['source_branch_name']}</td></tr>";
		echo "<th>Source Address</th><td>{$shipmentInfoArray['source_add1']}<br>{$shipmentInfoArray['source_add2']}</td></tr>";
		echo "<th>Destination Branch</th><td>{$shipmentInfoArray['destination_branch_name']}</td></tr>";
		echo "<th>Destination Address</th><td>{$shipmentInfoArray['destination_add1']}<br>{$shipmentInfoArray['destination_add1']}</td></tr>";
		echo "<th>Description</th><td>{$shipmentInfoArray['description']}</td></tr>";
		echo "</table>";
		echo "</div>";
		echo "</div>";
		echo "<div class='row'><h2>Update</h2></div>";
		echo "<div class='row'><div class='col-md-7'>";
		echo "<form class='form-horizontal' action='updateShipment.php' method='post'><table class='table table-striped'>";
		
		$cDate = date('Y-m-d');
		$currentDate = date('Y-m-d H:i:s');

		echo "<input type='hidden' name='currentDate' value='{$currentDate}'>";
		echo "<tr><th>Date</th><td><input name='cDate' id='cDate' class='form-control' type='text' value='{$cDate}' disabled></td></tr>";
		echo "<tr><th>Status</th><td><select name='status' class='form-control'><option>PROCESSING</option><option>ON-TRANSIT</option><option>ON-DELIVERY</option><option>DELIVERED</option></select></td></tr>";
		echo "<tr><th>Source Branch</th><td><input name='srcbranch' type='text' class='form-control' value='$bname' disabled></input></td></tr>";
		echo "<tr><th>Destination Branch</th><td><select name='dbranch' class='form-control' id='dbranch'>";
		echo "<hr>";

		$branches = getBranchIDNames();
		foreach ($branches as $branch) {
			echo "<option value='{$branch[0]}'>{$branch[1]}</option>";
		}

		echo "</select></td></tr>";
		echo "<tr><th>Notes</th><td><textarea name='notes' class='form-control' row='10' cols='50'></textarea></td></tr>";
		echo "<tr><th><input class='btn btn-primary' type='submit' value='Update'></th></tr>";
		echo "<input type='hidden' name='sid' value='{$shipmentid}'";
		echo "<input type='hidden' name='sbranch' value='{$bid}'>";
		echo "</table></form></div>";
	} else {
		echo "<h3>No Shipment Found</h3>";
	}
	}
}

#Update Process
if ( (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ) ) {
	#Reading Form
	$shipmentid  = $_POST['sid'];
	$currentDate = $_POST['currentDate'];
	$status      = $_POST['status'];
	$sid         = $_POST['sid'];
	$sbranch     = $bid;
	$dbranch     = $_POST['dbranch'];
	$description = $_POST['notes'];

	#Pushing to Database

	#Purification
	if ( !IsNullOrEmptyString($shipmentid) && !IsNullOrEmptyString($currentDate) && 
		 !IsNullOrEmptyString($status) && !IsNullOrEmptyString($sid) && 
		 !IsNullOrEmptyString($sbranch) && !IsNullOrEmptyString($dbranch) &&
		 !IsNullOrEmptyString($description)
	  ) {
	
	$conn = getdbConnection();
	
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$INSERT_SHIPMENT_STATUS = "INSERT INTO user_shipment_status(date, status, shipmentid, 
				source_branchid, destination_branchid, description) VALUES ('$currentDate', 
				'$status', '$sid', '$sbranch', '$dbranch', '$description')";

	if (!mysqli_query($conn,$INSERT_SHIPMENT_STATUS)) {
		die ('Error: '. mysqli_error($conn));	    	
	} else {
		echo "<h3>Shipment Status Updated</h3>";
	}

	} else {

		echo "<h3>Update Error</h3>";
		echo "Shipment ID - $shipmentid<br>";
		echo "Current Date - $currentDate<br>";
		echo "Status - $status<br>";
		echo "Shipment ID - $sid<br>";
		echo "Source Branch - $sbranch<br>";
		echo "Destination Branch - $dbranch";
		echo "Description - $description";

	}

	
}
?>
</div>
</body>
</html>