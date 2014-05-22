<html>
<head>
<title>Branch LogIn</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
<body>
<?php
include '../dbconnect.php';

?>

<div id="header"></div>
<div class="container">
<div class="row">
<div class="col-md-8">
<h2>Branch Login</h2><hr>
<form class="form-horizontal" id="branchadd" role="form" action="addBranch.php" method="post">
<div class="well">
	<div class="form-group">
		<label for="bzone" class="col-md-2 control-label">Branch Name</label>
		<div class="col-md-6">
			<select id="bname" name="bname" class="form-control">
				<?php
				$branches = getBranchNames();
				foreach ($branches as $branch) {
					echo "<option>$branch</option>";
				}
			?>
		</select>
	</div>
	</div>
		<div class="form-group">
		<label for="bpassword" class="col-md-2 control-label">Password</label>
		<div class="col-md-6">
			<input type="password" class="form-control" id="bpassword" name="bpassword" placeholder="Password" required>
		</div>
	</div>
		<div class="form-group">
		<div class="col-md-offset-2 col-md-5">
			<button type="submit" class="btn btn-default">Sign in</button>
		</div>
	</div>
</div>
</form>
</div>
</div>
<!-- jQuery Validation -->
<script src="js/jquery.validate.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>