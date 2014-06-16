<html>
<head>
	<title>DSTS - Logout</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="../js/jquery.js"></script>
</head>
<?php
include '../dbconnect.php';

if(isset($_SESSION)) {
          session_destroy();
        }

?>
<div class="container">
	<h2><small>You have been successfully Logged Off</small></h2>
<div class="row">
<div class="col-md-8">
<h2>Branch Login</h2><hr>
<form class="form-horizontal" id="branchlogin" role="form" action="login.php" method="post">
<div class="well">
	<div class="form-group">
		<label for="bname" class="col-md-2 control-label">Branch Name</label>
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
<script src="../js/jquery.validate.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>