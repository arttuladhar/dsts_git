<html>
<head><title>DSTS - Welcome</title></head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
</head>
<?php include("header.php"); ?>

<body>
<?php
 if ( isset( $_SESSION['user'] ) ) {
    $userid   = $_SESSION['user'];
    $username = $_SESSION['firstname'];
}

if (! isset($userid)) {
	header("Location: login.php");
}
?>
<div class='container'>
<div class='row'>
	<div class='col-md-4'><h1>Welcome, <?= $username ?></h1>
	</div>
</div>

<div class='row'>
	<br>
	<br>
</div>

<div class='row'><div class='col-md-4'>
<div class="panel panel-primary">
  <div class="panel-heading"><h4 align='center'>Create Mails and Packages</h4></div>
  <div class="panel-body">
  	<h4>
  	Create your mail or packages right from your home and drop it at your nearest
  	office to send your mails or packages<hr>
  	<br>
  	<ul>
  		<li>No Waiting in line</li>
  		<li>Online Payment</li>
  		<li>Pay at Site</li>
  		<li>Faster Processing</li>
  	<ul>
  	</h4>
  	<br>
  	<center><a href="send.php?session=new"><button type="submit" class="btn btn-success">Create Shipment</button></a></center>
  </div>
</div>
</div>



<div class='col-md-4'>
<div class="panel panel-primary">
  <div class="panel-heading"><h4 align='center'>Track Shipments</h4></div>
  <div class="panel-body">
  	<h4>
  		Track shipments of your mails or packages to keep record of status of your package
  	<hr>
  	<br>
  	<ul>
  		<li>Detailed Shipment Tracking</li>
  		<li>Actual Location of your package</li>
  		<li>Google Map Integration</li>
  		<li>Share Shipment Information</li>
  	
  	<ul>
  	</h4>
  	<br>
  	<center><a href="trackShipment.php"><button type="submit" class="btn btn-success">Track Shipment</button></a></center>
  </div>
</div>
</div>


<div class='col-md-4'>
<div class="panel panel-primary">
  <div class="panel-heading"><h4 align='center'>My Shipments</h4></div>
  <div class="panel-body">
  	<h4>
  		You can track shipments of your mails or packages to keep record of status of your package. You can also send the tracking number to your the receipent.
  	<hr>
  	<ul>
  		<li>Detailed Shipment Tracking</li>
  		<li>Actual Location of your package</li>
  		<li>Google Map Integration</li>
  		<li>Share Shipment Information</li>
  	
  	<ul>
  	</h4>
  	<br>
  	<center><a href="send.php?session=new"><button type="submit" class="btn btn-success">My Shipment</button></a></center>
  </div>
</div>
</div>

</div>


</ul>

</div>
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
