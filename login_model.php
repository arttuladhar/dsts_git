<?php

	//Checking if the request is forwarded by POST
	if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Unpriviledge Acces</h1>";
    echo "The page that you have requested could not be found.<br><br>";
    echo "<a href='index.html''>Home</a><br>";
    echo "<a href='login.html'>Login</a>";
    exit();
	}

	session_start();
	include 'dbconnect.php';

	$uname = $_POST["uname"];
	$pass  = $_POST["pass"];
	$dbconn = getdbConnection();

	// Checking Connection
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}

	$result = checkuserpassword ($dbconn, $uname, $pass);
	$result_count = $result -> num_rows;


	if ( $result) {		//Checking if Error Occurs

		if ( $result_count != 0 ) {
			$_SESSION['user']=$uname;
			header("location: welcome.php");
		}
		else {
			echo "<h2>InCorrect Username and Password<h2>";
		}	
	} else {
		echo "<h2>Unknown Error</h2>";
	}

function checkuserpassword($conn, $username, $password) {
	$SQL_SELECT_CHECKUSERPASSWORD = "SELECT username, password FROM user_info WHERE username='$username' AND password='$password'";

	if ( $conn !== null ) {

		if ($result = mysqli_query($conn,$SQL_SELECT_CHECKUSERPASSWORD)){
 			return $result;
		} else {
			die ('Error: '. mysqli_error($conn));	    	
		}
	}
}
   
?>
