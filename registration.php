<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DSTS - User Registration</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="js/jquery.js"></script>
 </head>
 
<body>
  <div class="container">
    <div class="row">
      <?php 
      include 'header.php';
      include 'dbconnect.php';
      ?>

    </div>
    <h2>User Registration</h2>
    <hr>
    <br>

    <div class="col-md-5">
      <form role="form" id="registrationform" action="register.php" method="post">
        <div class="form-group">
          <label for"uname">Username*</label>
          <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter Username">
        </div>

        <div class="form-group">
          <label for="fname">First Name*</label>
          <input type="text" id="fname" name="fname" class="form-control" placeholder="Enter FirstName">
        </div>

        <div class="form-group">
          <label for="lname">Last Name*</label>
          <input type="text" id="lname" name="lname" class="form-control" placeholder="Enter LastName">
        </div>

        <div class="form-group">
          <label for="email">Email*</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="form-group">
          <label for="telephone">Telephone</label>
          <input type="text" id="telephone" name="telephone" class="form-control" placeholder="Eg. 014250269">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
        </div>


        <div class="form-group">
          <label for="streetadd">Addess 1*</label>
          <input type="text" id="streetadd" name="streetadd" class="form-control" placeholder="Eg. 294 Chittadhar Marg">
        </div>

        <div class="form-group">
          <label for="blockadd">Address 2</label>
          <input type="text" id="blockadd" name="blockadd" class="form-control" placeholder="Eg. Ason, Nhaikantala">
        </div>

        <div class="form-group">
          <label for="district">District*</label>
          <select id="district" name="district" class="form-control">
            <?php
            $districts = getDistricts();
            foreach ($districts as $district) {
              echo "<option>$district</option>";
            }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="zone">Zone*</label>
          <select id="zone" name="zone" class="form-control">
            <?php
            $zones = getZones();
            foreach ($zones as $zone) {
              echo "<option>$zone</option>";
              }
            ?>
          </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <p>* Required Fields</p>
      </form>
    </div>


    <div class="col-md-1">  </div>

    <div class="col-md-6">

      <img src="img/nepal_postal.png" class="img-responsive" alt="Postal Service">


      <p>
        <blockquote>DSTS - First System in Nepal to provide Complete Solutions to Domestic Tracking System
          <br><br><i>- General Post Office</i>
        </blockquote>
      </p>
      <hr>
      <h4>New to DSTS.com?</h4>
      <p>Create a DSTS.com Account to...</p>
      <ul>
        <li>Feature 1</li>
        <li>Feature 2</li>
      <ul>

    </div>

    <!-- Container -->
  </div>

  <!-- Footer Page Begin -->

  <!-- Footer Page End -->

<script>
$(document).ready(function(){

//Forms Validation
$("#registrationform").validate({
  errorClass: "text-danger",
  rules: {
    uname: {
      required: true,
      maxlength: 20
    },
    fname:{
      required: true,
      maxlength: 20
    },
    lname:{
      required: true,
      maxlength: 20
    },
    email:{
      required: true,
      email: true
    },
    pass:{
      required: true,
      minlength: 5,
      maxlength: 20
    },
    telephone:{
      digits: true,
      maxlength: 20
    },
    streetadd:{
      required: true,
      maxlength: 30
    },
    blockadd:{
      maxlength: 30
    }
  }
});



//End of jQuery
});
</script>

<!-- jQuery Validation -->
<script src="js/jquery.validate.js"></script>
<script src="js/additional-methods.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>