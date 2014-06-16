<html>
<head>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
<body>
<?php
$bname=$_SESSION['bname'];
$bid=$_SESSION['bid'];
?>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="welcome_admin.php">Admin - <?= $bname?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="registerShipment.php">Register Shipment</a></li>
        <li><a href="updateShipment.php">Update Shipment</a></li>
        <li><a href="logout.php">Logout</a></li>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- jQuery Validation -->
<script src="../js/jquery.validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>