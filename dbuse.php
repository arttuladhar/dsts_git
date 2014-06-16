<?php

/*
Testing Page for Database Connections
Prints Hostname, Username, Password and Database Schema Name
*/


include 'dbconnect.php';
$dbconn = getdbConnection();

if ( $dbconn != null ) {
	$dbsettings = getdbSettings();
	foreach ($dbsettings as $key => $value) {
		echo "$key = $value<br>";
	}

	//Insert to Database
	$username = "arttuladhar";
	$fname = "Aayush";
	$password = "Clock124";
	$address = "294 Ason Nkhaikantala";
	$district = "Kathmandu";

	// Check connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


/*
	if (! mysqli_query($dbconn, "INSERT INTO `userinfo`(`username`, `FName`, `Password`, `Address`, `District`)".
		                  "VALUES ('$username','$fname','$password','$address','$district')") ){
		die ('Error: '. mysqli_error($dbconn));
	} else {
		echo "<h2>Added</h2>";
	}
*/

}
?>
