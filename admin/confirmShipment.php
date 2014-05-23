<html>
<head>
<title>Confirmation Email Sent</title>
</head>
<body>
<?php
	#Confirmation Request
	if ( (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' ) )
	{
		include '../dbconnect.php';
		include '../helper.php';

		if ( $_POST["confirmation"] == "true" ) {

			session_start();
			$branchid = "1";

	
			//Final Confirmation
			$shipmentid = $_POST['shipmentid'];
			$conn = getdbConnection();

			$UPDATE_IS_CONFIRMED ="UPDATE user_shipment SET is_confirmed=true WHERE shipmentid='$shipmentid'";
			
			$UPDATE_SHIPMENT_STATUS = "INSERT INTO user_shipment_status(date, status, shipmentid, 
					source_branchid, destination_branchid, description) 
					VALUES ('$currentDate', "CONFIRMED", '$shipmentid', '$branchid', '', 'Shipment Confirmed')";

			$shipmentid = mysqli_real_escape_string($dbconn,$shipmentid);

			if (mysqli_connect_errno()) {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}

			echo "<h1>Shipment has been registered </h1>";

			mysqli_query($conn,$UPDATE_IS_CONFIRMED);
			mysqli_query($conn,$UPDATE_SHIPMENT_STATUS);

			mysqli_close($conn);

			$tracking_num = $_POST["tracking_num"];
			$sender_email = $_POST["sender_email"];
			$receiver_email = $_POST["receiver_email"];

			echo $tracking_num;
			echo $sender_email;
			echo $receiver_email;

			/*
			//Sending Email
		  	if  ( !( IsNullorEmptyString ($sender_email) && IsNullorEmptyString($receiver_email)) ){

		    	$sender_email = $_POST["sender_email"];
				$receiver_email = $_POST["receiver_email"];
				
				$from = "info@NepalDSTS.com";
				$to = $sender_email . ', ' . $receiver_email;

				$subject = "DSTS - Item Shipment Confirmation";

		    	$message = '<html><body><h2>Shipment Item has been scheduled</h2>';
		    	$message = wordwrap($message, 70);

		    	// send mail
		    	// To send HTML mail, the Content-type header must be set
				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		    	mail($to,$subject,$message,$headers);
		    	echo "<h2>Email Sent to Sender and Receiver of the item</h2>";
		  	}
			*/
		} else {
			header("location: admin/registerShipment.php");
		}
		
	}

?>

</body>
</html>