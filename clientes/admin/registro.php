<?php
require_once('../include/funciones.php');
require_once('../include/config.php');
#conectar($dbhost, $dbuser, $dbpass, $dbname);

// Connect to server and select databse.
mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");


$user = strip_tags($_POST['user']);
$pass = strip_tags(sha1($_POST['pass']));

//comprobar usuario que no exista

$query = @mysql_query('SELECT username FROM clients WHERE username="'.mysql_real_escape_string($user).'"');
if ($existe = @mysql_fetch_object($query))
{

  echo "El usuario '.$user.' ya existe.";

} else{
 $meter = @mysql_query('INSERT INTO clients (username, password) values ("'.mysql_real_escape_string($user).'", "'.mysql_real_escape_string($pass).'")');
 
 if ($meter)
 {
   echo "Usuario registrado con éxito";
 }else{
 
   echo "Hubo un error en el registro";
 }

}
?>
