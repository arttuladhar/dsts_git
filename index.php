<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DSTS - User Registration</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- Loading jQuery -->
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
      </style>

    </head>
    <body>

    <!-- Header Start -->
    <?php include("header.php"); ?>

    <!-- Header End --> 

    <div id="header"></div>
    <div class="container">
      <div class="row">
        <div class="jumbotron">
          <h2>Domestic Shipment Tracking System</h2>

          <italics>Complete Solution for Domestic Shipment Tracking</italics>
          <br><a class="btn btn-primary btn-med" role="button">Learn more</a>
        </div>
      </div>

      <!--  Carousel -->
      <div class="col-md-6">
        <h3>Features</h3>
        <ul>
         <li>Tracking</li>
         <li>Supreme</li>
         <li>Tacos</li>
       </ul>
       <h3>Things to To</h3>
       <ul>
        <li>Make All Images Same Size</li>
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
<!-- /.carousel -->


<!-- Inner Container -->
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