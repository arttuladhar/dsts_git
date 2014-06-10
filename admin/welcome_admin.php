<html>
<head>
	<title>Admin Dashboard - DSTS </title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
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
		<h2><?= $bname ?></h2>
		<!-- Branch Info -->

		<hr>
	</div>
<div class="row">
	<div class="col-md-6">
	<h3>Branch Admin Functions</h3>
	<ul>
		<li><a href="registerShipment.php">Register Shipment (Drop To Store)</a></li>
		<li><a href="updateShipment.php">Update Shipment</a></li>
	</ul>
	</div>
</div>
</div>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>