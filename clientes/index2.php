<?php

require_once('session.php');
require_once('include/config.php');
require_once('include/funciones.php');

// Connect to server and select databse.
mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");


?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Carga de PIN - miportalwifi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../include/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/signin.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/portal-narrow.css" rel="stylesheet">


    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

  </head>
   <div class="container">

      <h1>Panel de carga de PIN</h1>

	<?php
	
	$logged_user = $_SESSION['myusername'];


	if (isset($_POST['15min'])){
		crea_pin("900","$logged_user");	
	} elseif (isset($_POST['30min'])){
		crea_pin("1800","$logged_user");	
	} elseif (isset($_POST['1h'])){
		crea_pin("3600","$logged_user");	
	}

	?>

	<form name="carga" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

        	<button class="btn btn-lg btn-info" type="submit" name="15min" value="15 minutos">15 minutos</button>
	        <button class="btn btn-lg btn-info" type="submit" name="30min" value="30 minutos">30 minutos</button>
        	<button class="btn btn-lg btn-info" type="submit" name="1h" value="1 hora">1 hora</button>

	</form>

    </div> <!-- /container -->

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index2.php">Mi portal wifi</a>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
	      <li><a href="#">
		<?php 
			$logged_user = $_SESSION['myusername']; 
			$credito = checkea_credito($logged_user);
			if ($credito >= 15) 
			{
				echo "Crédito: <span class=\"badge badge-success\">$credito min</span>";
			} else {
				echo "Crédito: <span class=\"badge badge-important\">$credito min</span>";
			}
		?>
		</a></li>
  	      <li><a href="account.php">Cuenta</a></li>
	     <li><a href="logout.php">Desconectarse</a></li> 
            </ul>
          </div><!--/.navbar-collapse -->
        </div>
      </div>
    </div>


    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster 
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-alert.js"></script>
    <script src="js/bootstrap-modal.js"></script>
    <script src="js/bootstrap-dropdown.js"></script>
    <script src="js/bootstrap-scrollspy.js"></script>
    <script src="js/bootstrap-tab.js"></script>
    <script src="js/bootstrap-tooltip.js"></script>
    <script src="js/bootstrap-popover.js"></script>
    <script src="js/bootstrap-button.js"></script>
    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-carousel.js"></script>
    <script src="js/bootstrap-typeahead.js"></script> -->

  </body>
</html>

