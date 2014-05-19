<html>
<head>
	<title>DSTS</title>
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

//Get UserInfo from Database
include 'dbconnect.php';
$dbconn = getdbConnection();
$result_userinfo = getUserInfo($dbconn, $user_check);

$row=mysqli_fetch_array($result_userinfo,MYSQLI_BOTH);

//Storing on var for display
$sfname=$row['firstname'];
$slname=$row['lastname'];
$semail=$row['email'];
$telephone=$row['telephone'];
$add1=$row['street_address'];
$add2=$row['block_address'];
$district=$row['district'];
$zone=$row['zone'];
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
  			<li><a href="#">Step2: Confirmation</a></li>
  			<li><a href="#">Step3: Payment</a></li>
		</ol>

	</div>
	<div class="row">
		<div class="col-sm-8"><strong><h4 class="text-info">Receiver Information</h4></strong></div>
	</div>
	<div class="row">
		<div class="col-md-4"> <!-- Col1 Begin -->
			<form role="form" id="sendmail" action="send.php" method="post">
				<div class="form-group">
					<label for"rfname">First Name*</label>
					<input type="text" id="rfname" name="rfname" class="form-control">
				</div>

				<div class="form-group">
					<label for="rlname">Last Name*</label>
					<input type="text" id="rlname" name="rlname" class="form-control">
				</div>
				<div class="form-group">
					<label for="rtelephone">Telephone*</label>
					<input type="text" id="rtelephone" name="rtelephone" class="form-control" placeholder="Eg. 014250269">
				</div>
				<div class="form-group">
					<label for="remail">Email (optional)</label>
					<input type="text" id="remail" name="remail" class="form-control">
				</div>
			</div> <!-- Col1 End -->

			<!-- Col 2 Begin -->
			<div class="col-md-4">
				<div class="form-group">
					<label for"uname">Address 1*</label>
					<input type="text" id="rstreetadd" name="rstreetadd" class="form-control" placeholder="Eg. 294 Chhitadharmarg">
				</div>

				<div class="form-group">
					<label for"uname">Address 2*</label>
					<input type="text" id="rblockadd" name="rblockadd" class="form-control" placeholder="Eg. Ason-27, Nhaikantala">
				</div>

				<div class="form-group">
					<label for="district">District</label>
					<select id="district" name="district" class="form-control">
						<option>Bagmati</option>
						<option>Two</option>
					</select>
				</div>

				<div class="form-group">
					<label for="zone">Zone</label>
					<select id="zone" name="zone" class="form-control">
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
					<th>District</th><td><?= $district ?></td></tr>
					<th>Zone</th><td><?= $zone ?></td></tr>
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
					<input type="radio" name="letter" id="letter" value="letter" checked>
					Letter Mail&mdash;Regular Mail (Max - 11.5"X5")
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="package" id="package" value="package">
					Package Mail&mdash; (Max - 12"X12"X12")
				</label>
			</div>
			<div class="form-group">
				<label for="weight">Weight (kgs) *</label>
				<input type="text" id="weight" name="weight" class="form-control">
			</div>
		</div>
	</div>
</div>
</form>
<ul class="pager">
  <li><a href="#">Next</a></li>
</ul>

</div> <!-- Container End -->
<hr>



<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>