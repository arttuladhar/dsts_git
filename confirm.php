<html>
<head>
<title>Confirmation</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery.js"></script>
</head>
<?php
	//Checking if the request is forwarded by POST
	if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Unpriviledge Acces</h1>";
    echo "The page that you have requested could not be found.<br>";
    echo "<a href='index.html''>Home</a><br>";
    echo "<a href='login.php'>Login</a>";
    exit();
	}


session_start();
$user_check=$_SESSION['user'];
$user_step1=$_POST['step1'];

if (! isset($user_check)) {
	header("Location: login.php");
}

//Loading Receiver / Sender Information
$rfname = $_POST["rfname"];
$rlname = $_POST["rlname"];
$rtelephone = $_POST["rtelephone"];
$remail     = $_POST["remail"];
$radd1 = $_POST["radd1"];
$radd2  = $_POST["radd2"];
$rdistrict  = $_POST["rdistrict"];
$rzone = $_POST["rzone"];

$sfname = 	  $_SESSION['sfname'];
$slname = 	  $_SESSION['slname'];
$stelephone = $_SESSION['stelephone'];
$semail     = $_SESSION['semail'];
$sadd1 = $_SESSION['sadd1'];
$sadd2  = $_SESSION['sadd2'];
$sdistrict = $_SESSION['sdistrict'];
$szone = $_SESSION['szone']


/* 
* Store Receiver Information to Session
* Display Receiver / Sender Information
* Do Cost Calculation
* Choose Payment
*/


?>

<body>
Read Post Values from Previous
<br>


<script src="js/additional-methods.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>