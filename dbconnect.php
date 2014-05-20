<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dsts";


function getdbConnection() {

$hostname = $GLOBALS['hostname'];
$username = $GLOBALS['username'];
$password = $GLOBALS['password'];
$dbname = $GLOBALS['dbname'];

//connection to the database
$conn=mysqli_connect($hostname, $username, $password, $dbname) or die("Unable to connect to MySQL");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

return $conn;
}

function getdbSettings() {
$hostname = $GLOBALS['hostname'];
$username = $GLOBALS['username'];
$password = $GLOBALS['password'];
$dbname = $GLOBALS['dbname'];

	$dbsettings = array('hostname' => "$hostname",
						'username' => "$username",
						'password' => "$password",
						'dbname' => "$dbname");
	return $dbsettings;
}

function checkuserpassword($conn, $username, $password) {
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}

	$SQL_SELECT_CHECKUSERPASSWORD = "SELECT username, password FROM user_info WHERE username='$username' AND password='$password'";

	if ( $conn !== null ) {

		if ($result = mysqli_query($conn,$SQL_SELECT_CHECKUSERPASSWORD)){
			return $result;
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	}
}

function getUserInfo($conn, $username) {

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$SQL_SELECT_GETUSERINFO = "SELECT username, firstname, lastname, email, telephone, street_address, 
						  block_address, district, zone FROM user_info WHERE username='$username'";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_GETUSERINFO);

		if ($result !== false ){
			return $result;
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	}
}

function getRowCount_Receiver($conn) {
	$SQL_SELECT_GETRECEIVER_ROW = "SELECT COUNT(*) AS RECEIVER_INDEX FROM receiver";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_GETRECEIVER_ROW);

		if ($result !== false ){
			$row=mysqli_fetch_array($result,MYSQLI_BOTH);
			return $row['RECEIVER_INDEX'];
			
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	}
}

function getRowCount_UserShipment($conn) {
	$SQL_SELECT_GETRECEIVER_ROW = "SELECT COUNT(*) AS SHIPMENT_INDEX FROM user_shipment";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_GETRECEIVER_ROW);

		if ($result !== false ){
			$row=mysqli_fetch_array($result,MYSQLI_BOTH);
			return $row['SHIPMENT_INDEX'];
			
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	}
}



?>