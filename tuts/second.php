<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <h2>Welcome to Online Domestic Registration System</h2>
    <hr>
    <h3>User Registration</h3>
    <form name="guestbook" action="guestbook.php" method="post">
    <div class="container">
    	<div class="row">
    		<div class="col-md-6">
    			<table class="table">
    				<tr><th>UserName</th><td><input type="text" id="uname" name="username" class="form-control" placeholder="Enter Username"></td><td><button type="button" id="checkavail" class="btn btn-link">Check Availability</button></td>
					<tr><th>First Name</th><td><input type="text" id="fname" name="fname" class="form-control" placeholder="Enter FirstName"></td>
					<tr><th>Last Name</th><td><input type="text" id="lname" name="lname" class="form-control" placeholder="Enter LastName"></td>
					<tr><th>Email Address</th><td><input type="text" id="email" name="email" class="form-control" placeholder="Enter Email"></td>
					<tr><th>Password</th><td><input type="password" id="pass" name="pass" class="form-control" placeholder="Password"></td>
				</table>
				<button type="submit" class="btn btn-default">Submit</button>
	    		</div>
    	</div>
    </div>
</form>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>

    $(document).ready(function(){
     $('#checkavail').click(function() {
     	var uname = $('#uname').val();
     	alert (uname);
     });

	});

    </script>



    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
