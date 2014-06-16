<html>
<head><title>My Shipments</title></head>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>

<body>
<?php

include("header.php");
include("dbconnect.php");

if ( isset( $_SESSION['user'] ) ) {
    $userid   = $_SESSION['user'];
}

$dbconn = getdbConnection();

$MYSQL_SELECT_USER_SHIPMENT_DELIVERED =
"SELECT confirmation_num, tracking_num, receiver.fname, receiver.lname, receiver.address1, receiver.address2
FROM user_shipment
INNER JOIN receiver ON user_shipment.receiver_id=receiver.receiver_id
WHERE sender_username='$userid', is_confirmed=1 AND is_delivered=0";


?>
<div class="container">
	<div class="row">
		<h2>My Shipments</h2>
		<hr>
	</div>


<div class="row">
		<div class="col-md-10"> <!-- Col1 Begin -->
			<h3>Current Shipments</h3>
			<table class="table table-condensed table-stripped">
				<thead>
					<tr><th>S.N</th>
						<th>Tracking Number</th>
						<th>Confirmation Number</th>
						<th>Receiver</th>
						<th>Receiver Address</th>
					</tr>
				</thead>

				<?php
			$MYSQL_SELECT_USER_SHIPMENT =
			"SELECT confirmation_num, tracking_num, receiver.fname, receiver.lname, receiver.address1, receiver.address2
			FROM user_shipment
			INNER JOIN receiver ON user_shipment.receiver_id=receiver.receiver_id
			WHERE sender_username='$userid' AND is_confirmed=1 AND is_delivered=0";

				if ( $dbconn !== null ) {
					$userShipmentQuery = mysqli_query($dbconn,$MYSQL_SELECT_USER_SHIPMENT);
					$i=1;
					while ( $userShipment = mysqli_fetch_array($userShipmentQuery,MYSQLI_BOTH)) {
						$tracking_num = $userShipment['tracking_num'];

						echo "<tr><td>";
						echo $i++. "</td><td>";
						echo "<a href='trackShipment.php?tracking=$tracking_num' target='_blank'>" . $tracking_num . "</a></td><td>";
						echo $userShipment['confirmation_num']. "</td><td>";
						echo $userShipment['fname']. " ". $userShipment['lname'] ."</td><td>";
						echo $userShipment['address1']. " ". $userShipment['address2'] ."</td>";
					}
				}
				?>
			
			</table>
		</div>
</div>

<hr>

<div class="row">
		<div class="col-md-10"> <!-- Col1 Begin -->
			<h3>Past Shipments <small>Delivered</small></h3>
			<table class="table table-condensed table-stripped">
				<thead>
					<tr><th>S.N</th>
						<th>Tracking Number</th>
						<th>Confirmation Number</th>
						<th>Receiver</th>
						<th>Receiver Address</th>
					</tr>
				</thead>

				<?php
			$MYSQL_SELECT_USER_SHIPMENT =
			"SELECT confirmation_num, tracking_num, receiver.fname, receiver.lname, receiver.address1, receiver.address2
			FROM user_shipment
			INNER JOIN receiver ON user_shipment.receiver_id=receiver.receiver_id
			WHERE sender_username='$userid' AND is_confirmed=1 AND is_delivered=1";

				if ( $dbconn !== null ) {
					$userShipmentQuery = mysqli_query($dbconn,$MYSQL_SELECT_USER_SHIPMENT);
					$i=1;
					while ( $userShipment = mysqli_fetch_array($userShipmentQuery,MYSQLI_BOTH)) {
						$tracking_num = $userShipment['tracking_num'];

						echo "<tr><td>";
						echo $i++. "</td><td>";
						echo "<a href='trackShipment.php?tracking=$tracking_num' target='_blank'>" . $tracking_num . "</a></td><td>";
						echo $userShipment['confirmation_num']. "</td><td>";
						echo $userShipment['fname']. " ". $userShipment['lname'] ."</td><td>";
						echo $userShipment['address1']. " ". $userShipment['address2'] ."</td>";
					}
				}
				?>
			
			</table>
		</div>
</div>


<script src="../js/jquery.validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>