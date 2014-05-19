<html>
<?php
session_start();

if(isset($_SESSION['views']))
$_SESSION['views']=$_SESSION['views']+1;
else
$_SESSION['views']=1;
echo "Views=". $_SESSION['views'];
?> 
<body>
	<h1>Guest Book</h1>
	<?php
	/*
	http://localhost/dsts/tuts/guestbook.php?fname=Ganesh&lname=Thapa
	Form Processing (key/value pair)
	Key - Name; Value - Input

	$_GET - Visible to everyone
	$_POST - Invisible
	*/

	$uname = $_POST["username"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$password = $_POST["pass"];

	//Add To Database
	


	echo "<h2>Welcome, $fname $lname ! </h2>";
	echo "Data:<br>Username - $uname<br>
				   Email - $email<br>
				   Password - $password<br>";



?>




<input type="button" value="Unset Counter">
</body>


</html>
