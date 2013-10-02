<?php
require_once('session.php');

if(isset($_POST['submit'])){

	if(_$POST['submit'] === "15min"){
		echo "tocaron el boton 15";
	else if(_$POST['submit'] === "30min")
	
	echo "<br>tocaron el boton $asd";
	

?>
<p>Panel de carga de PIN</p>

<form name="carga" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

	<td><input type="submit" name="15min" value="15 minutos"></td>
	<td><input type="submit" name="30min" value="30 minutos"></td>
	<td><input type="submit" name="1h" value="1 hora"></td>

