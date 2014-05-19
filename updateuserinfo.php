<html>
<head><title>Update UserInfo</title></head>
<body>
<h3>Update User Profile</h3>
<?php
session_start();
$user_check=$_SESSION['user'];
$sender_fname="Aayush";
$sender_lname="Tuladhar";

echo "<h2>Welcome, $user_check</h2>";
if (! isset($user_check)) {
	header("Location: login.php");
}
?>

</body>
</html>