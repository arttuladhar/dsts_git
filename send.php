<html>
<head>
	<title>DSTS - Send Shipment</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
		<style>
		input[type=number].input-number–noSpinners { -moz-appearance: textfield; }
		input[type=number].input-number–noSpinners::-webkit-inner-spin-button,
		input[type=number].input-number–noSpinners::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}
	</style>
</head>
<?php
include("header.php");

if ( isset( $_SESSION['user'] ) ) {
    $userid   = $_SESSION['user'];
    $username = $_SESSION['firstname'];
}

if (! isset($userid)) {
	header("Location: login.php");
}

$user_check = $username;

//For New Session Delete Existing Session Cookies
if (isset($_GET['session'])) {
	if ( $_GET['session']=="new" ) {

	unset($_SESSION['rfname']);
	unset($_SESSION['rlname']);
	unset($_SESSION['rtelephone']);
	unset($_SESSION['remail']);
	unset($_SESSION['radd1']);
	unset($_SESSION['radd2']);
}
}

//Loading Session Vars [If Any]
$rfname = 	  isset($_SESSION['rfname'])?$_SESSION['rfname']:'';
$rlname = 	  isset($_SESSION['rlname'])?$_SESSION['rlname']:'';
$rtelephone = isset($_SESSION['rtelephone'])?$_SESSION['rtelephone']:'';
$remail     = isset($_SESSION['remail'])?$_SESSION['remail']:'';
$radd1 = isset($_SESSION['radd1'])?$_SESSION['radd1']:'';
$radd2  = isset($_SESSION['radd2'])?$_SESSION['radd2']:'';

include 'dbconnect.php';
$user_check = $userid;
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
	<div class="page-header">
  <h1>Send Package<br></h1>
</div>

	<div class="row">
		<ol class="breadcrumb">
  			<li class="active"><b>Step1: Informations</b></li>
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
					<input type="text" id="rfname" name="rfname" class="form-control" value="<?= $rfname ?>" required>
				</div>

				<div class="form-group">
					<label for="rlname">Last Name*</label>
					<input type="text" id="rlname" name="rlname" class="form-control" value="<?= $rlname ?>" required>
				</div>
				<div class="form-group">
					<label for="rtelephone">Telephone * </label>
					<input type="number" id="rtelephone" name="rtelephone" class="form-control input-number–noSpinners" value="<?= $rtelephone ?>" placeholder="Eg. 014250269" required>
				</div>
				<div class="form-group">
					<label for="remail">Email (optional)</label>
					<input type="email" id="remail" name="remail" class="form-control" value="<?= $remail ?>">
				</div>
			</div> <!-- Col1 End -->

			<!-- Col 2 Begin -->
			<div class="col-md-4">
				<div class="form-group">
					<label for"uname">Address 1*</label>
					<input type="text" id="radd1" name="radd1" class="form-control" value="<?= $radd1 ?>" placeholder="Eg. 294 Chhitadharmarg" reqiored>
				</div>

				<div class="form-group">
					<label for"uname">Address 2*</label>
					<input type="text" id="radd2" name="radd2" class="form-control" value="<?= $radd2 ?>" placeholder="Eg. Ason-27, Nhaikantala">
				</div>

				<div class="form-group">
					<label for="rdistrict">District</label>
					<select id="rdistrict" name="rdistrict" class="form-control">
		            <?php
		            $districts = getDistricts();
		            foreach ($districts as $district) {
		              echo "<option>$district</option>";
		            }
		            ?>					
					</select>
				</div>

				<div class="form-group">
					<label for="rzone">Zone</label>
					<select id="rzone" name="rzone" class="form-control">
            		<?php
            		$zones = getZones();
            		foreach ($zones as $zone) {
            		  echo "<option>$zone</option>";
            		  }
            		?>
					</select>
				</div>
			</div>
	</div> <!-- Col2 End -->
	 <label><input type="checkbox"> Save to Addressbook </label>
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
				<div class="col-md-6">
				<label for="weight">Weight (gram) *</label>
				
				<input type="number" class="form-control input-number–noSpinners" id="weight" name="weight" class="form-control" required>
				</div>
			</div>
		</div>
	</div>
</div>
<input type="hidden" name="step1" value="complete">

<ul class="pager">
  <li><button type="submit" class="btn btn-primary">Next</button></li>
</ul>
</form>

</div> <!-- Container End -->
<hr>
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
</body>
</html>