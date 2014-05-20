<html>
<head>
<title>Confirmation</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<?php

	//Checking if the request is forwarded by POST
	if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Unpriviledge Acces</h1>";
    echo "The page that you have requested could not be found.<br>";
    echo "<a href='index.html''>Home</a><br>";
    echo "<a href='login.php'>Login</a>";
    exit();
	}

session_start();
$user_check=$_SESSION['user'];
$user_step1=$_POST['step1'];

if (! isset($user_check)) {
	header("Location: login.php");
}

//Loading Receiver / Sender Information
$_SESSION["rfname"]     = $rfname     = $_POST["rfname"];
$_SESSION["rlname"]     = $rlname     = $_POST["rlname"];
$_SESSION["rtelephone"] = $rtelephone = $_POST["rtelephone"];
$_SESSION["remail"]     = $remail     = $_POST["remail"];
$_SESSION["radd1"]      = $radd1      = $_POST["radd1"];
$_SESSION["radd2"]      = $radd2      = $_POST["radd2"];
$_SESSION["rdistrict"]  = $rdistrict  = $_POST["rdistrict"];
$_SESSION["rzone"]      = $rzone      = $_POST["rzone"];

$sfname     = $_SESSION['sfname'];
$slname     = $_SESSION['slname'];
$stelephone = $_SESSION['stelephone'];
$semail     = $_SESSION['semail'];
$sadd1      = $_SESSION['sadd1'];
$sadd2      = $_SESSION['sadd2'];
$sdistrict  = $_SESSION['sdistrict'];
$szone      = $_SESSION['szone'];

/*
mail
	-letter  [(Baseweight - 20 gm)
	Price = 20 + Top ( (Weight - BWeight) / 20 ) * 5
	Eg,
		Weight = 41
		Price  = 20 + Top (Weight - BWeight /20) * 5
	           = 20 + 2 * 5
 			   = 20 + 10
 			   = 30
		
		Weight = 99
		Price  = 20 + Top (Weight - BWeight) /20) * 5
			   = 20 + Top (99 - 20)/20 * 5
			   = 20 + 4 * 5 = 40

	-parcel [(Baseweight - 500 gm)]
	Price = 30 + Top ( (Weight - BWeight) / 100 ) * 15
	
	Eg,
	Weight = 650
	Price = 30 + Top(150/100) * 15
		  = 30 + 2 * 15
		  = 60

*/
$type   = $_POST["mail"];
$weight = $_POST["weight"];
$bweight_letter = 20;
$bweight_parcel = 30;

//Cost Calculation Logic
if ($type == "letter") {
	$price = $bweight_letter + ceil( ($weight - $bweight_letter) / 20) * 5;
}
else if ($type == "parcel"){
	$price = $bweight_parcel + ceil( ($weight - $bweight_parcel) / 100) * 15;
}


/* 
* Do Cost Calculation
* Choose Payment
*/

?>

<body>
<div class="container">
	<?php include("header.html"); ?>
	<div class="page-header">
			<h1>Send Package<br><small>Welcome, <?= $user_check ?> </small></h1>
	</div>

	<div class="row">
		<ol class="breadcrumb">
  			<li><a href="send.php?session=active">Step1: Informations</a></li>
  			<li class="active">Step2: Payment</li>
  			<li>Step3: Confirmation</li>
		</ol>

	</div>
	<div class="row">
	<div class="col-md-4">
			<strong><h4 class="text-info">Receiver Information</h4></strong>
			<table class="table table-condensed table-striped">
				<tr>
					<th>First Name</th><td><?= $rfname ?></td></tr>
					<th>Last name</th><td><?= $rlname ?></td></tr>
					<th>Telephone</th><td><?= $rtelephone ?></td></tr>
					<th>Address 1 </th><td><?= $radd1 ?></td></tr>
					<th>Address 2 </th><td><?= $radd2 ?></td></tr>
					<th>District</th><td><?= $rdistrict ?></td></tr>
					<th>Zone</th><td><?= $rzone ?></td></tr>
			</table>
	</div>
	<div class="col-md-1"></div>
	<div class="col-md-4">
		<strong><h4 class="text-info">Sender Information</h4></strong>
		<table class="table table-condensed table-striped">
			<tr>
				<th>First Name</th><td><?= $sfname ?></td></tr>
				<th>Last name</th><td><?= $slname ?></td></tr>
				<th>Telephone</th><td><?= $stelephone ?></td></tr>
				<th>Address 1 </th><td><?= $sadd1 ?></td></tr>
				<th>Address 2 </th><td><?= $sadd2 ?></td></tr>
				<th>District</th><td><?= $sdistrict ?></td></tr>
				<th>Zone</th><td><?= $szone ?></td></tr>
		</table>
	</div>
	</div>
	<div class="row">
	<div class="col-md-4">
			<strong><h4 class="text-info">Cost</h4></strong>
			<table class="table table-condensed table-striped">
				<tr><th>Package Type</th><td><?= $type ?></td></tr>
				<tr><th>Weight (grams)</th><td><?= $weight ?></td></tr>
				<tr><th>Price (NRS)</th><td><?= $price ?></td></tr>
			</table>
	</div>
	</div>
	<form role="form" id="sendmail" action="confirmation.php" method="post">
	<div class="row">
	<div class="col-md-4">
			<strong><h4 class="text-info">Payment</h4></strong>
						<div class="radio">
				<label>
					<input type="radio" name="payment" id="site" value="site" checked>
					Pay on Site
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="payment" id="epay" value="epay">
					E-Payment
				</label>
			</div>
	</div>
	</div>

	<input type="hidden" name="mail" value="<?= $type ?>">
	<input type="hidden" name="weight" value="<?= $weight ?>">
	<input type="hidden" name="cost" value="<?= $price ?>">

	</form>
		<div class="row">
		<div class="col-md-8">
		<ul class="pager">
			<li><a href="send.php?session=active">Previous</a></li>
  			<li><a href="#" onclick="document.forms[0].submit();return false;">Proceed With Send Package</a></li>
		</ul>
		</div>
	</div>
</div>
<script src="js/additional-methods.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>