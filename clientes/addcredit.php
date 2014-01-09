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
<div class="container">


<h3>Cargar crédito a mi cuenta</h3>

Crédito actual: <?php $credito = checkea_credito($logged_user); echo "$credito minutos"; ?>

  <div class="btn-group">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
      Elige tu pack
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">Pack 50 (1000 minutos)</a></li>
      <li><a href="#">Pack 100 (5000 minutos)</a></li>
    </ul>
  </div>

<br><br><br>
	<form action='https://argentina.dineromail.com/Shop/Shop_Ingreso.asp' method='post'>
	<input type='hidden' name='NombreItem' value='Pack100'>
	<input type='hidden' name='TipoMoneda' value='1'>
	<input type='hidden' name='PrecioItem' value='100.00'>
	<input type='hidden' name='E_Comercio' value='3632904'>
	<input type='hidden' name='NroItem' value='-'>
	<input type='hidden' name='image_url' value='http://miportalwifi.com.ar/include/logo.png'>
	<input type='hidden' name='DireccionExito' value='http://miportalwifi.com.ar/clientes'>
	<input type='hidden' name='DireccionFracaso' value='http://miportalwifi.com.ar/clientes'>
	<input type='hidden' name='DireccionEnvio' value='0'>
	<input type='hidden' name='Mensaje' value='0'>
	<input type='hidden' name='MediosPago' value='4,5,6,14,15,16,17,18,13'>
	<input type='image' src='https://argentina.dineromail.com/import/img/payment-button-ar.png?dmbypayu' border='0' name='submit' alt='Pagar con DineroMail'>
	</form>
</div>
