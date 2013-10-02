<?php

session_start();
ob_start();

require_once('include/config.php');

// Connect to server and select databse.
mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
mysql_select_db("$dbname")or die("cannot select DB");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM clients WHERE username='$myusername' and password=sha1('$mypassword')";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

	// Register $myusername, $mypassword and redirect to file "login_success.php"
	$_SESSION['myusername'] = mysql_result($result,0,'username');
	$_SESSION['mypassword'] = 'sesion_ok';
	header("location:index2.php");
}
else {
		echo "Wrong Username or Password";
}

ob_end_flush();
 
?>
