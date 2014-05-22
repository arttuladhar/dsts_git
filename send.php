<html>
<head>
	<title>DSTS - Send Shipment</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<?php

session_start();
$user_check=$_SESSION['user'];

if (! isset($user_check)) {
	header("Location: login.php");
}

//For New Session Delete Existing Session Cookies
if ( $_GET['session']=="new" ) {
	unset($_SESSION['rfname']);
	unset($_SESSION['rlname']);
	unset($_SESSION['rtelephone']);
	unset($_SESSION['remail']);
	unset($_SESSION['radd1']);
	unset($_SESSION['radd2']);
}

//Loading Session Vars [If Any]
$rfname = 	  isset($_SESSION['rfname'])?$_SESSION['rfname']:'';
$rlname = 	  isset($_SESSION['rlname'])?$_SESSION['rlname']:'';
$rtelephone = isset($_SESSION['rtelephone'])?$_SESSION['rtelephone']:'';
$remail     = isset($_SESSION['remail'])?$_SESSION['remail']:'';
$radd1 = isset($_SESSION['radd1'])?$_SESSION['radd1']:'';
$radd2  = isset($_SESSION['radd2'])?$_SESSION['radd2']:'';

//Get UserInfo from Database
include 'dbconnect.php';

$row    = getUserInfo($user_check);


//Storing Sender Information to Session
$_SESSION['sfname']     = $sfname    = $row['firstname'];
$_SESSION['slname']     = $slname    = $row['lastname'];
$_SESSION['semail']     = $semail    = $row['email'];
$_SESSION['stelephone'] = $telephone = $row['telephone'];
$_SESSION['sadd1']      = $add1      = $row['street_address'];
$_SESSION['sadd2']      = $add2      = $row['block_address'];
$_SESSION['sdistrict']  = $sdistrict = $row['district'];
$_SESSION['szone']      = $szone     = $row['zone'];

?>

<body>
	<div class="container">
		<!-- Header -->
		<?php include("header.html"); ?>
		<!-- Header End -->
		<div class="page-header">
  <h1>Send Package<br><small>Welcome, <?= $user_check ?> </small></h1>
</div>

	<div class="row">
		<ol class="breadcrumb">
  			<li class="active">Step1: Informations</li>
  			<li>Step2: Payment</a></li>
  			<li>Step3: Confirmation</li>
		</ol>

	</div>
	<div class="row">
		<div class="col-sm-8"><strong><h4 class="text-info">Receiver Information</h4></strong></div>
	</div>
	<div class="row">
		<div class="col-md-4"> <!-- Col1 Begin -->
			<form role="form" id="sendmail" action="payment.php" method="post">
				<div class="form-group">
					<label for"rfname">First Name*</label>
					<input type="text" id="rfname" name="rfname" class="form-control" value="<?= $rfname ?>">
				</div>

				<div class="form-group">
					<label for="rlname">Last Name*</label>
					<input type="text" id="rlname" name="rlname" class="form-control" value="<?= $rlname ?>">
				</div>
				<div class="form-group">
					<label for="rtelephone">Telephone*</label>
					<input type="text" id="rtelephone" name="rtelephone" class="form-control" value="<?= $rtelephone ?>" placeholder="Eg. 014250269">
				</div>
				<div class="form-group">
					<label for="remail">Email (optional)</label>
					<input type="text" id="remail" name="remail" class="form-control" value="<?= $remail ?>">
				</div>
			</div> <!-- Col1 End -->

			<!-- Col 2 Begin -->
			<div class="col-md-4">
				<div class="form-group">
					<label for"uname">Address 1*</label>
					<input type="text" id="radd1" name="radd1" class="form-control" value="<?= $radd1 ?>" placeholder="Eg. 294 Chhitadharmarg">
				</div>

				<div class="form-group">
					<label for"uname">Address 2*</label>
					<input type="text" id="radd2" name="radd2" class="form-control" value="<?= $radd2 ?>" placeholder="Eg. Ason-27, Nhaikantala">
				</div>

				<div class="form-group">
					<label for="rdistrict">District</label>
					<select id="rdistrict" name="rdistrict" class="form-control">
						<option>Bagmati</option>
						<option>Two</option>
					</select>
				</div>

				<div class="form-group">
					<label for="rzone">Zone</label>
					<select id="rzone" name="rzone" class="form-control">
						<option>Bagmati</option>
						<option>Two</option>
					</select>
				</div>
			</div>
	</div> <!-- Col2 End -->
	 <label><input type="checkbox"> Save to Addressbook ( Coming Soon )</label>
<hr>
<!-- Sender Information -->
<div class="row">
		<div class="col-sm-8"><strong><h4 class="text-info">Sender Information</h4></strong></div>
</div>
<div class="row">
		<div class="col-md-4"> <!-- Col1 Begin -->
			<table class="table table-condensed table-bordered">
				<tr>
					<th>First Name</th><td><?= $sfname ?></td></tr>
					<th>Last name</th><td><?= $slname ?></td></tr>
					<th>Telephone</th><td><?= $telephone ?></td></tr>
					<th>Address 1 </th><td><?= $add1 ?></td></tr>
					<th>Address 2 </th><td><?= $add2 ?></td></tr>
					<th>District</th><td><?= $sdistrict ?></td></tr>
					<th>Zone</th><td><?= $szone ?></td></tr>
			</table>
		</div>
</div>
<label><a href='updateuserinfo.php?id=<?php echo "$user_check" ?>'>Update My Info</a></label>
<hr>
<!-- Package Row Heading -->
<div class="row">
	<div class="col-sm-8">
		<strong><h4 class="text-info">Package Information</h4></strong>
	</div>
</div>
<!-- Package Row Info Row -->
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label for="letter">Package Type</label>
			<div class="radio">
				<label>
					<input type="radio" name="mail" id="letter" value="letter" checked>
					Letter Mail&mdash;Regular Mail (Max - 11.5"X5")
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="mail" id="package" value="parcel">
					Package Mail&mdash; (Max - 12"X12"X12")
				</label>
			</div>
			<div class="form-group">
				<label for="weight">Weight (gram) *</label>
				<input type="text" id="weight" name="weight" class="form-control">
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="step1" value="complete">
</form>
<ul class="pager">
  <li><a href="#" onclick="document.forms[0].submit();return false;">Next</a></li>
</ul>

</div> <!-- Container End -->
<hr>
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
</body>
</html>