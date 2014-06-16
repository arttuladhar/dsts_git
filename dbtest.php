<html>
<head><title>DB Test</title>
</head>
<body>
<h2>Testing Page for Database Repositories<br>
	<small>No Actual use in Production</small>
</h2>

<?php
include 'dbconnect.php';

$conn 	     = getdbConnection();
$receiver_id = getRowCount_Receiver($conn);
$shipment_id = getRowCount_UserShipment($conn);


echo $receiver_id+1;
echo $shipment_id+1;

$districts = getDistricts();

foreach ($districts as $district) {
	echo $district;
}

echo "<hr>";
$branches = getBranchNames();
foreach ($branches as $branch) {
	echo $branch;
}

echo "<hr>";
$row1    = getUserInfo("arttuladhar");
$row2    = getReceiverInfo("1");

echo $row1['firstname'];
echo $row2['fname'];

?>
</body>
</html>