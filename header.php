<style> body { padding-top: 65px; } </style>
<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
    <div class="container-fluid">
     <!-- Brand and toggle get grouped for better mobile display -->
     <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Domestic Shipment Tracking System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a href="trackShipment.php">Track Shipment</a>
        </li>
        <li>
          
        </li>
        <?php

        if(session_id() == '' || !isset($_SESSION)) {
          // session isn't started
          session_start();
        }

        if ( isset( $_SESSION['user'] ) ) {
          $userid   = $_SESSION['user'];
          $username = $_SESSION['firstname'];
          
          echo "<li><a href='send.php?session=new'>Create Shipment</a></li>";
          echo "<li><a href='myshipments.php'>My Shipments</a></li>";
          echo "<li><a href='logout.php'>$username [ LOGOUT ]</a></li>";  

        } else {
          echo "<li><a href='registration.php'>Register</a></li>";
          echo "<li><a href='login.php'>User Login</a></li>";
        }

        ?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
</nav>