<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Mi portal wifi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../favicon.png">

    <!-- Le styles -->
    <link href="../include/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/signin.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/portal-narrow.css" rel="stylesheet">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="clientes/js/html5shiv.js"></script>
    <![endif]-->



<div class="portal-narrow">
	<div class="masthead">
        	<ul class="nav nav-pills pull-right">
          	<li><a href="../index.html">Home</a></li>
          	<li><a href="../contacto/">Contacto</a></li>
          	<li class="active"><a href="../clientes/">Acceso clientes</a></li>
        	</ul>
                <a class="brand" href="../index.html"><img src="../include/logo.png"/></a>
	</div>
<br><br>
    
	<div class="container">
		<form class="form-signin" action="checklogin.php" method="POST">
			<h2 class="form-signin-heading">Conectarse</h2>
			<input type="text" class="form-control" placeholder="Usuario" name="myusername">
			<input type="password" class="form-control" placeholder="Contraseña" name="mypassword">
			<label class="checkbox">
				<input type="checkbox" value="remember-me"> Recordarme
			</label>
        		<button class="btn btn-lg btn-primary btn-block" type="submit">Conectar</button>
         	</form>
                  
	<div align="center" id="footer">
		<div class="container">
			<p class="muted credit">&copy; Mi portal wifi 2013</p>
		</div>
	</div>
</div> <!-- /container -->

    <!-- Le javascript
    ================================================== 
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
