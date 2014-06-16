<html>
<head><title>Send Shipment - Confirmation</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<?php

	include("header.php");

	//Checking if the request is forwarded by POST
	if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
	header("HTTP/1.0 404 Not Found");
	echo "<div class='container'><h1>404 Unpriviledge Acces</h1>";
    echo "Page has expired. Please Resubmit the Form<br><hr>";
    echo "<a href='index.php''>Home</a><br>";
    echo "<a href='login.php'>Login</a></div>";
    exit();
	}


if ( isset( $_SESSION['user'] ) ) {
    $userid   = $_SESSION['user'];
    $username = $_SESSION['firstname'];
}

if (! isset($userid)) {
	header("Location: login.php");
}

include 'dbconnect.php';

$rfname     = isset($_SESSION['rfname'])?$_SESSION['rfname']:'';
$rlname     = isset($_SESSION['rlname'])?$_SESSION['rlname']:'';
$rtelephone = isset($_SESSION['rtelephone'])?$_SESSION['rtelephone']:'';
$remail     = isset($_SESSION['remail'])?$_SESSION['remail']:'';
$radd1      = isset($_SESSION['radd1'])?$_SESSION['radd1']:'';
$radd2      = isset($_SESSION['radd2'])?$_SESSION['radd2']:'';
$rdistrict  = isset($_SESSION['rdistrict'])?$_SESSION['rdistrict']:'';
$rzone      = isset($_SESSION['rzone'])?$_SESSION['rzone']:'';

$conn 	     = getdbConnection();
$receiver_id = getRowCount_Receiver($conn) + 1;
$shipmentid  = getRowCount_UserShipment($conn) + 1;
$confirmation_num = rand(0,999999);		//6 Digit
$tracking_num     = rand(0,99999999);	//8 Digit
$sender_username  = $userid;
$type             = $_POST['mail'];
$weight           = $_POST['weight'];
$cost             = $_POST['cost'];
$payment          = $_POST['payment'];


//Insert to receiver
$SQL_INSERT_RECEIVER = "INSERT INTO receiver (receiver_id, fname, lname, telephone, email,".
	" address1, address2, district, zone) VALUES ('$receiver_id','$rfname','$rlname',".
	"'$rtelephone','$remail','$radd1','$radd2','$rdistrict', '$rzone')";

//Insert to user_shipment
$SQL_INSERT_USER_SHIPMENT = "INSERT INTO user_shipment(shipmentid, confirmation_num,".
		"tracking_num, sender_username, receiver_id, type, weight, cost)".
		"VALUES ('$shipmentid','$confirmation_num','$tracking_num','$sender_username'".
		",'$receiver_id','$type','$weight','$cost')";

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

if ( $conn !== null ) {
	
	//Insert Receiver Info
	if (!mysqli_query($conn,$SQL_INSERT_RECEIVER)){
		die ('Error: '. mysqli_error($conn));	    	
	}

	//Insert Shipment Info
	if (!mysqli_query($conn,$SQL_INSERT_USER_SHIPMENT)){
		die ('Error: '. mysqli_error($conn));	    	
	}	

	mysqli_close($conn);

	//Remove Session Data
	unset($_SESSION['rfname']);
	unset($_SESSION['rlname']);
	unset($_SESSION['rtelephone']);
	unset($_SESSION['remail']);
	unset($_SESSION['radd1']);
	unset($_SESSION['radd2']);
	unset($_SESSION['rdistrict']);
	unset($_SESSION['rzone']);
}

?>
<body>
	<div class="container">
		<?php include("header.php"); ?>
		<div class="page-header">
			<h1>Send Package<br><small>Confirmation</small></h1>
		</div>

		<div class="row">
			<ol class="breadcrumb">
				<li>Step1: Informations</li>
				<li>Step2: Payment</a></li>
				<li class="active"><b>Step3: Confirmation</b></li>
			</ol>
		</div>

		<div>
		<h2>Package Registration Confirmed</h2>
		<div class="row">
			<div class="col-md-4">
			<strong><h4 class="text-info">Package Information</h4></strong>
			<table class="table table-condensed table-striped">
				<tr>
					<th>Confirmation Number</th><td><?= $confirmation_num ?></td></tr>
					<th>Tracking Number</th><td><?= $tracking_num ?></td></tr>
			</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
			<strong><h4 class="text-info">Payment Information</h4></strong>
			<table class="table table-condensed table-striped">
				<tr>
					<th>Payment Type</th><td><?= strtoupper($payment) ?></td></tr>
			</table>
			</div>
			</div>
		<hr><h4>Please drop the package to the latest drop-off location with the confirmation number</h4>
		<h4>

		</div>
</body>
</html>