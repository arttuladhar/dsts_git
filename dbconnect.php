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



function getUserInfo($username) {
$conn = getdbConnection();

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$username=mysqli_real_escape_string($conn,$username);

$SQL_SELECT_GETUSERINFO = "SELECT username, firstname, lastname, email, telephone, street_address, 
						  block_address, district, zone FROM user_info WHERE username='$username'";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_GETUSERINFO);

		if ($result !== false ){
			$row=mysqli_fetch_array($result,MYSQLI_BOTH);
			return $row;
		} else {
			die ('Error: '. mysqli_error($conn)); 	
		}
	}
}


function getReceiverInfo($receiverid) {
$conn = getdbConnection();

$receiverid = mysqli_real_escape_string($conn,$receiverid);

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$SQL_SELECT_GETRECEIVERINFO = "SELECT fname, lname, email, telephone, address1, 
						  address2, district, zone FROM receiver WHERE receiver_id='$receiverid'";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_GETRECEIVERINFO);

		if ($result !== false ){
			$row=mysqli_fetch_array($result,MYSQLI_BOTH);
			return $row;
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

function getDistricts(){
/* Return String Array of Districts */

$conn = getdbConnection();
$SQL_SELECT_DISTRICTS = "SELECT * FROM info_district";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_DISTRICTS);
		$storeArray = Array();

		if ($result !== false ){
			while ($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
				$storeArray[] = $row['district'];
			}
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	return $storeArray;
	}

}


function getZones(){
/* Returns String Array of Zones */

$conn = getdbConnection();
$SQL_SELECT_ZONES = "SELECT * FROM info_zone";

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_ZONES);
		$storeArray = Array();

		if ($result !== false ){
			while ($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
				$storeArray[] = $row['zone'];
			}
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	return $storeArray;
	}

}

function getBranchNames(){
/* Returns String Array of Branch Names */

$conn = getdbConnection();
$SQL_SELECT_BRANCH_NAMES = "SELECT name FROM branch";;

	if ( $conn !== null ) {
		$result = mysqli_query($conn,$SQL_SELECT_BRANCH_NAMES);
		$storeArray = Array();

		if ($result !== false ){
			while ($row=mysqli_fetch_array($result,MYSQLI_BOTH)){
				$storeArray[] = $row['name'];
			}
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	return $storeArray;
	}

}


?>