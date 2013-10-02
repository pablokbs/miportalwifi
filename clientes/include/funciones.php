<?php
function conectar($servidor, $user, $pass, $name)
{ 
   $con = @mysql_connect($servidor, $user, $pass);
   @mysql_select_db($name, $con);
}


function genera_pin()
{
#	$pin = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); // random(ish) 5 character string
	$pin = substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz',5)),0,5);
	return $pin;
}

function genera_pin_pass()
{
	$pin_pass = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) ); 
	return $pin_pass;
}

function checkea_credito($cliente)
{
	$creditos = mysql_query("SELECT credit from clients where username='$cliente'") or die(mysql_error());
	while($row = mysql_fetch_array($creditos)) 
	{ 
		$credito = $row['credit']; 
	}
	return $credito;
}

function crea_pin($tiempo,$cliente)
{
	$pin = genera_pin();
	$pin_pass = genera_pin_pass();
	$credito = checkea_credito($cliente);
	$credito_seg = $credito * 60;
	
	if ($credito_seg >= $tiempo) {

		mysql_query("INSERT INTO radcheck (username, attribute, op, value) values ('$pin', 'Password', '==', '$pin_pass' )") or die(mysql_error()); 
		mysql_query("INSERT INTO radcheck (username, attribute, op, value) values ('$pin', 'Max-All-Session', ':=', '$tiempo' )") or die(mysql_error());
		mysql_query("INSERT INTO radcheck (username, attribute, op, value) values ('$pin', 'NAS-Identifier', '==', '$cliente' )") or die(mysql_error());
		$tiempo_min = $tiempo / 60;
		mysql_query("UPDATE clients set credit = credit-'$tiempo_min' where username = '$cliente'") or die(mysql_error());

		echo "<div class=\"alert alert-success\"><h4>¡PIN generado!</h4>
		<strong>Código: </strong> $pin <br>
		<strong>Clave: </strong> $pin_pass <br>
		<strong>Tiempo disponible:</strong> $tiempo_min minutos</div>" ;

	}
	else
	{
		echo "<div class=\"alert alert-error\"> 
		    <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
		    <h4>¡Atención!</h4> 
			No tiene suficiente crédito para generar ese PIN. 
		    </div>";
	}

	
}

function historial_pin($cantidad,$cliente)
{
	$select_historial = mysql_query("SELECT username,value FROM radcheck WHERE attribute = 'Max-All-Session' and username IN (SELECT username FROM radcheck WHERE value='$cliente') order by id desc limit '$cantidad'");
	while ($row = mysql_fetch_assoc($select_historial))
	{
		$arr_historial=array();
		$arr_historial[]=array('username'=>$row['username'], 'value'=>$row['value']);
	}
	$historial=array('historial'=>$arr_historial);
}

function trae_contenido($cliente)
{
 	$sel_contenido = mysql_query("SELECT content from dyncontent where client='$cliente'") or die(mysql_error());
	while ($row = mysql_fetch_array($sel_contenido))
	{
		$contenido = $row['content'];
	}
	return $contenido;
}

function inserta_contenido($cliente,$contenido)
{

	$check_contenido = mysql_query("SELECT content FROM dyncontent where client='$cliente'") or die(mysql_error());
	
	if ($existe = mysql_fetch_object($check_contenido))
	{
		mysql_query("UPDATE dyncontent set content='$contenido' where client='$cliente'") or die(mysql_error());
	} else {
		mysql_query("INSERT INTO dyncontent (client, content) values ('$cliente','$contenido')") or die(mysql_error());
	}
}	

?>
