<?php

require_once('session.php');
require_once('include/config.php');
require_once('include/funciones.php');

// Connect to server and select databse.
mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");

require_once('include/header.php');
require_once('include/styles.php');

?>

<html lang="en">
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
</html>
