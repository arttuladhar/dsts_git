<html>
<head><title>Welcome Screen !</title></head>
</head>
<body>
<?php
session_start();
$user_check=$_SESSION['user'];

echo "Welcome - $user_check";

if (! isset($user_check)) {
	header("Location: login.php");
}
?>

<h1>Welcome </h1>
<h2>User Functions</h2>
<ul>
	<li>Send Mail</li>
	<li>Send Package</li>
	<li>My Previous Shipments</li>
</body>
</html>