<html>
<head><title>Update UserInfo</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery.js"></script>
<?php
include("header.php");
if ( isset( $_SESSION['user'] ) ) {
    $userid   = $_SESSION['user'];
    $username = $_SESSION['firstname'];
}

if (! isset($userid)) {
  header("Location: login.php");
}
?>
</head>
<body>
<div class='container'>

<h3>Update User Profile<br>
<small>Coming Soon</small>
</h3>

</div>

<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>