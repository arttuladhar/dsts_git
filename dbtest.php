<html>
<head><title>DB Test</title>
</head>
<body>
<h2>Testing Page for Database Repositories</h2>

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

$branches = getBranchNames();
foreach ($branches as $branch) {
	echo $branch;
}

?>
</body>
</html>