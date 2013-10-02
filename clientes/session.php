<?php
session_start();
if(!isset($_SESSION['myusername'])){

	#die("Hay que loguearse, redirigir");
	header('Location: index.php');
}

?>
