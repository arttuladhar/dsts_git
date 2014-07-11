<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DSTS - User Registration</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
      <script src="js/jquery.js"></script>

      <style type="text/css">
      #myCarousel {
        margin-top: 40px;
      }

      .carousel-linked-nav,
      .item img {
        display: block; 
        margin: 0 auto;
      }

      .carousel-linked-nav {
        width: 120px;
        margin-bottom: 20px;   
      }
      html, body {
  height: 100%;
}

#wrap {
  min-height: 100%;
}

#main {
  overflow:auto;
  padding-bottom:150px; /* this needs to be bigger than footer height*/
}

.footer {
  position: relative;
  margin-top: -150px; /* negative value of footer height */
  height: 150px;
  clear:both;
  padding-top:20px;
}
      </style>

    <?php include("header.php"); ?>

    </head>
    <body>

    <div id="header"></div>
    <div class="container">
      
        <div class="jumbotron">
          <h2>Domestic Shipment Tracking System<br>
            <small>
              <i>Complete Solution for Domestic Shipment Tracking</i>
            </small>
          </h2>
      </div>
      <div class="col-md-6">
        <p class='lead'>
          Domestic Shipment Tracking System (DSTS) is an end to end tracking solution for all shipments
          and letter mails for an organization.
        </p>
          <hr>
        <h3>User Features</h3>
        <ul>
         <li>User Registration</li>
         <li>Track Shipment</li>
         <li>Past Shipments</li>
         <li>Pay at Site</li>
         <li>E-Pay</li>
       </ul>
        <hr>
       <h3>Branch Features</h3>
       <ul>
        <li>Add New Branches</li>
        <li>Branch Login</li>
        <li>Register Shipments</li>
        <li>Update Shipments</li>
      </ul>
     </div>
     <div class="col-md-6 bg-info">
      <div id="mycarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active"><!-- class of active since it's the first item -->
            <img src="img/carousel1.png" alt="" />
            <div class="carousel-caption">
              <h3>Total Shipment Tracking Life-cycle Solution</h3>
            </div>
          </div>
          <div class="item">
            <img src="img/carousel2.png" alt="" />
            <div class="carousel-caption">
              <h3>Get Updates on Tracking Status</h3>
            </div>
          </div>
          <div class="item">
            <img src="img/carousel3.png" alt="" />
            <div class="carousel-caption">
              <h3>Serving Domestic Shipments</h3>
            </div>
          </div>
        </div><!-- /.carousel-inner -->
  <!--  Next and Previous controls below
  href values must reference the id for this carousel -->
  <a class="carousel-control left" href="#mycarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#mycarousel" data-slide="next">&rsaquo;</a>
</div>
</div>
</div>
<br>
<br>
<br>
<div class='container'>
<div class='row'>
<div class='col-md-4-offset-4' align='center'>
<a href='aboutme.html'> About Me </a> &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; <a href='admin/index.php'>Branch Login</a>
</div>
</div>
</div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
		//alert("Hello World");
		$('.carousel').carousel();
		
	});

</script>
</body>

</html>