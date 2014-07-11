<html>
<head><title>Track Shipment</title></head>
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
<body>
<?php include("header.php"); ?>
<div class="container">
	<div class="row">
		<h2>Track Shipment</h2>
		<hr>
	</div>
<div class="row">
	<div class="col-md-6">
		<form class="form-horizontal" role="form" name="trackShipment" action="trackShipment.php" method="get">
		<div class="form-group">
			<label for="tracking">Tracking Code</label>
			<input type="number" class="input-number–noSpinners" id="tracking" name="tracking" required>
			<input type="submit" value="Check Shipment">
		</div>
		</form>
	</div>
</div>
<?php

include 'dbconnect.php';
if (isset($_GET["tracking"])) {
	$tracking = $_GET["tracking"];

	if (!empty($tracking)) {
		echo "Tracking ID :". $tracking;

		$dbconn = getdbConnection();
		$tracking = mysqli_real_escape_string($dbconn,$tracking);

		//Check for SHIPPING_ID
		$MYSQL_SELECT_SHIPMENT_ID =
		"SELECT shipmentid FROM `user_shipment` WHERE tracking_num='$tracking' AND is_confirmed='1' ";

		if ( $dbconn !== null ) {
		$shipmentidQuery   = mysqli_query($dbconn,$MYSQL_SELECT_SHIPMENT_ID);
		$shipmentidResult  = mysqli_fetch_array($shipmentidQuery,MYSQLI_BOTH);

		if ($shipmentidResult != null ) {
			echo "<h4>Tracking ID Found</h4>";
			$shipmentid = $shipmentidResult['shipmentid'];
			//Pull Tracking Info
			$MYSQL_SELECT_SHIPMENT_INFO ="
			SELECT us_status.date, us_status.status, us_status.description, sbranch.name as source_branch_name, 
			sbranch.add1 as source_add1, sbranch.add2 as source_add2, dbranch.name as destination_branch_name, 
			dbranch.add1 as destination_add1, dbranch.add2 as destination_add2,
			sbranch.lat as source_lat, sbranch.lng as source_lng,
			dbranch.lat as destination_lat, dbranch.lng as destination_lng
			FROM user_shipment_status us_status
			LEFT JOIN branch sbranch ON us_status.source_branchid=sbranch.branchid
			LEFT JOIN branch dbranch ON us_status.destination_branchid=dbranch.branchid
			WHERE shipmentid='$shipmentid' ";

			$shipmentResult       = mysqli_query($dbconn,$MYSQL_SELECT_SHIPMENT_INFO);


			//Shipment Info
			if ($shipmentResult !== false ){
				$branch = array();

				echo "<div class='col-md-12'><table class='table table-condensed table-hover table-bordered'><thead><tr class='active'><th>Date</th><th>Status</th><th>Source Branch</th><th>Destination Branch</th><th>Notes</th></tr></thead>";
				while ($shipmentInfo=mysqli_fetch_array($shipmentResult,MYSQLI_BOTH)) {
					$source_lat = $shipmentInfo['source_lat'];
					$source_lng = $shipmentInfo['source_lng'];
					$destination_lat = $shipmentInfo['destination_lat'];
					$destination_lng = $shipmentInfo['destination_lng'];
					echo "<tr><td>";
					echo $shipmentInfo['date']."</td><td>";
					echo $shipmentInfo['status']."</td><td>";
					echo $shipmentInfo['source_branch_name']."</td><td>";
					// echo $shipmentInfo['source_add1']."<br>".$shipmentInfo['source_add2']."</td><td>";
					// echo $shipmentInfo['destination_add1']."<br>".$shipmentInfo['destination_add2']."</td><td>";
					echo $shipmentInfo['destination_branch_name']."</td><td>";
					echo $shipmentInfo['description']."</td></tr>";

					$branch["${shipmentInfo['source_branch_name']}"] = array("$source_lat", "$source_lng");
					$branch["${shipmentInfo['destination_branch_name']}"] = array("$destination_lat", "$destination_lng");				
				}
			echo "</table></div>";
			echo "<div>";

			$imgLink = "http://maps.googleapis.com/maps/api/staticmap?";
			$imgLink = $imgLink . "size=800x500&sensor=false&maptype=roadmap";

			$path_lat_long = "&path=color:blue|weight:5";

			$i=0;
			$label = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J","K", "L", "M", "N", "O","P", "Q", "R", "S", "T"];
			foreach ($branch as $key => $value) {
				
				echo "Post Office - $key ($label[$i])";
				echo "<br>";
				$path_lat_long = $path_lat_long . "|$value[0],$value[1]";
				$imgLink = $imgLink . "&markers=color:red|label:$label[$i]|$value[0],$value[1]";
				$i++;
			}
			//Adding Path to the Link
			$imgLink = $imgLink . $path_lat_long;

			echo "<img src='$imgLink'>";		
			echo "</div>";
			}
			else {
				die ('Error: '. mysqli_error($dbconn));	    	
			}

		} else {
			echo "<h4>Tracking ID Not Found<h4>";
		}
		}
	}
}
?>
</div>

<script src="../js/jquery.validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>