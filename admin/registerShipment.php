<html>
<head><title>Register Shipment</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
<body>
<div class="container">
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" role="form" name="registerShipment" action="registerShipment.php" method="get">
		<div class="form-group">
			<label for="confirmation">Confirmation Code</label>
			<input type="text" id="confirmation" name="confirmation">
			<input type="submit" value="Check Shipment">
		</div>
		</form>
	</div>
</div>
<div>

<?php

include '../dbconnect.php';

#Confirmation Request
if ( (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ) )
{
	if ( $_POST["confirmation"] == "true" ) {
		//Final Confirmation
		echo "<h1>Shipment has been registered </h1>";
		echo "Email Sent to Sender and Receiver of the item";
		return;
	} else {
		header("location: admin/registerShipment.php");
	}
	
}


#Check Database Details on Shipment
if (isset($_GET["confirmation"])) {

	$dbconn = getdbConnection();
	$confirmation = mysqli_real_escape_string($dbconn,$_GET["confirmation"]);

	//Get Shipment Information
	$MYSQL_SELECT_SHIPMENT_INFO = "SELECT us.shipmentid, us.confirmation_num, us.tracking_num, us.sender_username,".
	 " us.receiver_id, us.type, us.weight, us.cost FROM user_shipment AS us WHERE us.confirmation_num ='$confirmation'";


	//Get Shipment Information
	$shipmentInfoArray       = Array();

	if ( $dbconn !== null ) {
		
		$shipmentResult       = mysqli_query($dbconn,$MYSQL_SELECT_SHIPMENT_INFO);
		
		//Shipment Info
		if ($shipmentResult !== false ){
			$shipmentInfoArray=mysqli_fetch_array($shipmentResult,MYSQLI_BOTH);
		}
		else {
			die ('Error: '. mysqli_error($dbconn));	    	
		}

		
		if ($shipmentInfoArray != null ) {

			$sender_username = $shipmentInfoArray['sender_username'];
			$receiver_id     = $shipmentInfoArray['receiver_id'];

			$senderInfoArray      = getUserInfo("$sender_username");
			$receiverInfoArray    = getReceiverInfo("$receiver_id");
			//Print Shipment Information
			echo "<hr>";
			echo "<div class='row'>";
			echo "<strong><h4 class='text-info'>Shipment Information</h4></strong>";
			echo "<div class='col-md-4'>";
			echo "<table class='table table-condensed table-bordered'>";
			echo "<tr>";
			echo "<th>Shipment ID</th><td>{$shipmentInfoArray['shipmentid']}</td></tr>";
			echo "<th>Confirmation Number</th><td>{$shipmentInfoArray['confirmation_num']}</td></tr>";
			echo "<th>Tracking Number</th><td>{$shipmentInfoArray['tracking_num']}</td></tr>";
			echo "<th>Item Type</th><td>{$shipmentInfoArray['type']}</td></tr>";
			echo "<th>Item Weight</th><td>{$shipmentInfoArray['weight']}</td></tr>";
			echo "<th>Item Paid</th><td>{$shipmentInfoArray['cost']}</td></tr>";
			echo "</table>";
			echo "</div>";
			echo "</div>";
			
			//Print Receiver / Sender Information
			echo "<div class='row'>";
			echo "<div class='col-md-4'>";
			echo "<strong><h4 class='text-info'>Receiver Information</h4></strong>";
			echo "<table class='table table-condensed table-bordered'>";
			echo "<tr>";
			echo "<th>First Name</th><td>{$receiverInfoArray['fname']}</td></tr>";
			echo "<th>Last Name</th><td>{$receiverInfoArray['lname']}</td></tr>";
			echo "<th>Address 1</th><td>{$receiverInfoArray['address1']}</td></tr>";
			echo "<th>Address 2</th><td>{$receiverInfoArray['address2']}</td></tr>";
			echo "<th>District</th><td>{$receiverInfoArray['district']}</td></tr>";
			echo "<th>Zone</th><td>{$receiverInfoArray['zone']}</td></tr>";
			echo "</table>";
			echo "</div>";

			echo "<div class='col-md-1'></div>";
			echo "<div class='col-md-4'>";
			echo "<strong><h4 class='text-info'>Sender Information</h4></strong>";
			echo "<table class='table table-condensed table-bordered'>";
			echo "<tr>";
			echo "<th>First Name</th><td>{$senderInfoArray['firstname']}</td></tr>";
			echo "<th>Last Name</th><td>{$senderInfoArray['lastname']}</td></tr>";
			echo "<th>Address 1</th><td>{$senderInfoArray['street_address']}</td></tr>";
			echo "<th>Address 2</th><td>{$senderInfoArray['block_address']}</td></tr>";
			echo "<th>Distirct</th><td>{$senderInfoArray['district']}</td></tr>";
			echo "<th>Zone</th><td>{$senderInfoArray['zone']}</td></tr>";
			echo "</table>";
			echo "</div>";
			echo "</div>";

			echo "<form class='form-horizontal' role='form' name='confirmShipment' action='registerShipment.php' method='post'>";
			echo "<div class='form-group'>";
			echo "<input type='submit' value='Confirm Shipment'>";
			echo "</div>";
			echo "<input type='hidden' name='confirmation' value='true'>";
			echo "</form>";

			
		}
			else {
			echo "<h4>Confirmation Number Not Found</h4>";
		}
	}

}

#If Found Option for Register New Shipment
?>



</div>
</div>
<!-- jQuery Validation -->
<script src="../js/jquery.validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>