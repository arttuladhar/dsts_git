<html>
<head>
	<title>Registration - Complete </title>
	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <?php
    include 'dbconnect.php';

	//Checking if the request is forwarded by POST
	if (strtoupper($_SERVER['REQUEST_METHOD']) != 'POST') {
	header("HTTP/1.0 404 Not Found");
	echo "<h1>404 Unpriviledge Acces</h1>";
    echo "The page that you have requested could not be found.<br>";
    echo "<a href='index.html''>Home</a><br>";
    echo "<a href='login.php'>Login</a>";
    exit();
	}
   
	?>

</head>
<body>
	<!-- Header Page -->


	<!-- End Header -->
<div class="container">
	<div class="row">
	<div class='col-md-6'>

	<?php
	$conn = getdbConnection();

	// Check conn
	if (mysqli_connect_errno()) {
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		exit();
	}
	$uname     = mysqli_real_escape_string($conn,$_POST["uname"]);
	$fname     = mysqli_real_escape_string($conn,$_POST["fname"]);
	$lname     = mysqli_real_escape_string($conn,$_POST["lname"]);
	$email     = mysqli_real_escape_string($conn,$_POST["email"]);
	$telephone = mysqli_real_escape_string($conn,$_POST["telephone"]);
	$pass      = mysqli_real_escape_string($conn,$_POST["pass"]);
	$streetAdd = mysqli_real_escape_string($conn,$_POST["streetadd"]);
	$blockAdd  = mysqli_real_escape_string($conn,$_POST["blockadd"]);
	$district  = mysqli_real_escape_string($conn,$_POST["district"]);
	$zone      = mysqli_real_escape_string($conn,$_POST["zone"]);

	$SQL_INSERT_USERINFO = 
	"INSERT INTO user_info(username, firstname, lastname, email, telephone, password,".
	"street_address, block_address, district, zone) VALUES (".
	"'$uname','$fname','$lname','$email','$telephone','$pass','$streetAdd','$blockAdd','$district','$zone')";


	if ( $conn !== null ) {
		    //Checking if the fields are non empty.
		    if ( $uname !== '' && $fname !== '' && $lname !== '' && $email !== '' && $telephone !== '' && $pass !== '' && $streetAdd !== '' && $district !== '' && $zone !== '' ) {

				//Start Database Transaction
		    	if (!mysqli_query($conn,$SQL_INSERT_USERINFO)){
		    		die ('Error: '. mysqli_error($conn));	    	
				} else {
					echo "<h2>Registration Successful</h2>";
					echo "<h3>You have been successfully registered</h3>";
		    		echo "<table class='table table-condensed'>";
		    		echo "<tr><th>Username</th><td>$uname</td></tr>";
		    		echo "<tr><th>First Name</th><td>$fname</td></tr>";
		    		echo "<tr><th>Last Name</th><td>$lname</td></tr>";
		    		echo "<tr><th>Email</th><td>$email</td></tr>";
		    		echo "<tr><th>Telephone</th><td>$telephone</td></tr>";
		    		echo "<tr><th>Street Address</th><td>$streetAdd</td></tr>";
		    		echo "<tr><th>Block</th><td>$blockAdd</td></tr>";
		    		echo "<tr><th>District</th><td>$district</td></tr>";
		    		echo "<tr><th>Zone</th><td>$zone</td></tr>";
		    		echo "</table>";
				}
		    	//End Database Transaction
		    } else {
		    	echo "<h2>Error : All Fields are Required. Please Resubmit the form</h2><hr>";
		    	echo "<a href=\"javascript:history.go(-1)\">GO BACK</a><br>";
		    }
		}
?>


		<a href="login.php">Click Here to Continue to Login</a>
		</div>
	</div>
</div> <!-- Container -->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>