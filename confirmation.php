<html>
<head><title>Confirmation</title></head>
<body>
<h2>Confirmation Page</h2>
<?php
include 'dbconnect.php';

session_start();

$rfname     = isset($_SESSION['rfname'])?$_SESSION['rfname']:'';
$rlname     = isset($_SESSION['rlname'])?$_SESSION['rlname']:'';
$rtelephone = isset($_SESSION['rtelephone'])?$_SESSION['rtelephone']:'';
$remail     = isset($_SESSION['remail'])?$_SESSION['remail']:'';
$radd1      = isset($_SESSION['radd1'])?$_SESSION['radd1']:'';
$radd2      = isset($_SESSION['radd2'])?$_SESSION['radd2']:'';
$rdistrict  = isset($_SESSION['rdistrict'])?$_SESSION['rdistrict']:'';
$rzone      = isset($_SESSION['rzone'])?$_SESSION['rzone']:'';

$conn = getdbConnection();

//Insert to receiver
$SQL_INSERT_RECEIVER = "INSERT INTO receiver (receiver_id, fname, lname, telephone, email,".
	" address1, address2, district, zone) VALUES ('$receiver_id','$rfname','$rlname',".
	"'$rtelephone','$remail','$radd1','$radd2','$rdistrict', '$rzone')";

//Insert to user_shipment
$SQL_INSERT_USER_SHIPMENT = "INSERT INTO user_shipment(shipmentid, confirmation_num,".
		"tracking_num, sender_username, receiver_id, type, weight, cost)".
		"VALUES ('$shipmentid','$confirmation_num','$tracking_num','$sender_username'".
		",'$receiver_id','$type','$weight','$cost')";

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}


if ( $conn !== null ) {
	//Insert Receiver
	if (!mysqli_query($conn,$SQL_INSERT_RECEIVER)){
		die ('Error: '. mysqli_error($conn));	    	
	}

	//Insert Shipment Info


	mysqli_close($con);
}

//Insert 





?>

<?= $rfname ?><br>
<?= $rfname ?><br>
<?= $rlname ?><br>
<?= $rtelephone ?><br>
<?= $remail ?><br>
<?= $radd1 ?><br>
<?= $radd2 ?><br>
<?= $rdistrict ?><br>
<?= $rzone ?><br>

</body>
</html>