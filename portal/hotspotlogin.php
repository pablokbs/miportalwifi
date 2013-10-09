    <?php
    #
    # chilli - ChilliSpot.org. A Wireless LAN Access Point Controller
    # Copyright (C) 2003, 2004 Mondru AB.
    #
    # The contents of this file may be used under the terms of the GNU
    # General Public License Version 2, provided that the above copyright
    # notice and this permission notice is included in all copies or
    # substantial portions of the software.
     
    # Redirects from ChilliSpot daemon:
    #
    # Redirection when not yet or already authenticated
    #   notyet:  ChilliSpot daemon redirects to login page.
    #  already: ChilliSpot daemon redirects to success status page.
    #
    # Response to login:
    #   already: Attempt to login when already logged in.
    #   failed:  Login failed
    #   success: Login succeded
    #
    # logoff:  Response to a logout
     
     
    # Shared secret used to encrypt challenge with. Prevents dictionary attacks.
    # You should change this to your own shared secret.
    $uamsecret = "10pzmq";
     
    # Uncomment the following line if you want to use ordinary user-password
    # for radius authentication. Must be used together with $uamsecret.
    #$userpassword=1;
     
    # Our own path
    $loginpath = $_SERVER['PHP_SELF'];
     
    $ChilliSpot="Mi portal wifi";
    $title="$ChilliSpot";
    $centerUsername="Username";
    $centerPassword="Password";
    $centerLogin="Conectarse";
    $centerPleasewait="Por favor espere...";
    $centerLogout="Desconectarse";
    $h1Login="$ChilliSpot";
    $h1Failed="Datos incorrectos";
    $h1Loggedin="Conectado";
    $h1Loggingin="Conectando";
    $h1Loggedout="Desconectado";
    $centerdaemon="Debe conectarse usando otra URL";
    $centerencrypted="Login must use encrypted connection";
    $timeReached="No tiene más tiempo disponible en su PIN"; 
     
    # Make sure that the form parameters are clean
    #$OK_CHARS='-a-zA-Z0-9_.@&=%!';
    #$_ = $input = <STDIN>;
    #s/[^$OK_CHARS]/_/go;
    #$input = $_;
     
    # Make sure that the get query parameters are clean
    #$OK_CHARS='-a-zA-Z0-9_.@&=%!';
    #$_ = $query=$ENV{QUERY_STRING};
    #s/[^$OK_CHARS]/_/go;
    #$query = $_;
     
     
    # If she did not use https tell her that it was wrong.
    //if (!($_ENV['HTTPS'] == 'on')) {
    // disable https
    if (false) {
    #    echo "Content-type: text/html\n\n";
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
    <html>
    <head>
     <title>$title</title>
     <meta http-equiv=\"Cache-control\" content=\"no-cache\">
     <meta http-equiv=\"Pragma\" content=\"no-cache\">
    </head>
     <h1 style=\"text-align: center;\">$h1Failed</h1>
     <center>
       $centerencrypted
     </center>
    </body>
    <!--
    <?xml version=\"1.0\" encoding=\"UTF-8\"?>
    <WISPAccessGatewayParam
     xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
     xsi:noNamespaceSchemaLocation=\"http://www.acmewisp.com/WISPAccessGatewayParam.xsd\">
    <AuthenticationReply>
    <MessageType>120</MessageType>
    <ResponseCode>102</ResponseCode>
    <ReplyMessage>Login must use encrypted connection</ReplyMessage>
    </AuthenticationReply>
    </WISPAccessGatewayParam>
    -->
    </html>
    ";
        exit(0);
    }
     
     
    # Read form parameters which we care about
    if (isset($_POST['UserName']))    $username    = $_POST['UserName'];
    if (isset($_POST['Password']))    $password    = $_POST['Password'];
    if (isset($_POST['challenge']))    $challenge    = $_POST['challenge'];
    if (isset($_POST['button']))    $button        = $_POST['button'];
    if (isset($_POST['logout']))    $logout        = $_POST['logout'];
    if (isset($_POST['prelogin']))    $prelogin    = $_POST['prelogin'];
    if (isset($_POST['res']))    $res        = $_POST['res'];
    if (isset($_POST['uamip']))    $uamip        = $_POST['uamip'];
    if (isset($_POST['uamport']))    $uamport    = $_POST['uamport'];
    if (isset($_POST['userurl']))    $userurl    = $_POST['userurl'];
    if (isset($_POST['timeleft']))    $timeleft    = $_POST['timeleft'];
    if (isset($_POST['redirurl']))    $redirurl    = $_POST['redirurl'];
     
    # Read query parameters which we care about
    if (isset($_GET['res']))    $res        = $_GET['res'];
    if (isset($_GET['challenge']))    $challenge    = $_GET['challenge'];
    if (isset($_GET['uamip']))    $uamip        = $_GET['uamip'];
    if (isset($_GET['uamport']))    $uamport    = $_GET['uamport'];
    if (isset($_GET['reply']))    $reply        = $_GET['reply'];
    if (isset($_GET['userurl']))    $userurl    = $_GET['userurl'];
    if (isset($_GET['timeleft']))    $timeleft    = $_GET['timeleft'];
    if (isset($_GET['redirurl']))    $redirurl    = $_GET['redirurl'];
     
     
    #$reply =~ s/\+/ /g;
    #$reply =~s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/seg;
     
    $userurldecode = $userurl;
    #$userurldecode =~ s/\+/ /g;
    #$userurldecode =~s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/seg;
     
    $redirurldecode = $redirurl;
    #$redirurldecode =~ s/\+/ /g;
    #$redirurldecode =~s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/seg;
     
    #$password =~ s/\+/ /g;
    #$password =~s/%([a-fA-F0-9][a-fA-F0-9])/pack("C", hex($1))/seg;
     
    # If attempt to login
    if ($button == 'Conectar') {
      $hexchal = pack ("H32", $challenge);
      if ($uamsecret) {
        $newchal = pack ("H*", md5($hexchal . $uamsecret));
      } else {
        $newchal = $hexchal;
      }
      $response = md5("\0" . $password . $newchal);
      $newpwd = pack("a32", $password);
      $pappassword = implode ("", unpack("H32", ($newpwd ^ $newchal)));
    # sleep 5;
    # echo 'Content-type: text/html\n\n';
     echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
    <html>
    <head>
     <title>$title</title>
     <meta http-equiv=\"Cache-control\" content=\"no-cache\">
     <meta http-equiv=\"Pragma\" content=\"no-cache\">";
      if (isset($uamsecret) && isset($userpassword)) {
        echo "  <meta http-equiv=\"refresh\" content=\"0;url=http://$uamip:$uamport/logon?username=$username&password=$pappassword\">";
      } else {
        echo "  <meta http-equiv=\"refresh\" content=\"0;url=http://$uamip:$uamport/logon?username=$username&response=$response&userurl=$userurl\">";
      }
      echo "</head>
    <h1 style=\"text-align: center;\">$h1Loggingin</h1>
     <center>
       $centerPleasewait
     </center>
    </body>
    <!--
    <?xml version=\"1.0\" encoding=\"UTF-8\"?>
    <WISPAccessGatewayParam
     xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"
     xsi:noNamespaceSchemaLocation=\"http://www.acmewisp.com/WISPAccessGatewayParam.xsd\">
    <AuthenticationReply>
    <MessageType>120</MessageType>
    <ResponseCode>201</ResponseCode>
    ";
      if (isset($uamsecret) && isset($userpassword)) {
        echo "<LoginResultsURL>http://$uamip:$uamport/logon?username=$username&password=$pappassword</LoginResultsURL>";
      } else {
        echo "<LoginResultsURL>http://$uamip:$uamport/logon?username=$username&response=$response&userurl=$userurl</LoginResultsURL>";
      }
      echo "</AuthenticationReply>
    </WISPAccessGatewayParam>
    -->
    </html>
    ";
        exit(0);
    }
     
    switch($res) {
      case 'success':     $result =  1; break; // If login successful
      case 'failed':      $result =  2; break; // If login failed
      case 'logoff':      $result =  3; break; // If logout successful
      case 'already':     $result =  4; break; // If tried to login while already logged in
      case 'notyet':      $result =  5; break; // If not logged in yet
      case 'smartclient': $result =  6; break; // If login from smart client
      case 'popup1':      $result = 11; break; // If requested a logging in pop up window
      case 'popup2':      $result = 12; break; // If requested a success pop up window
      case 'popup3':      $result = 13; break; // If requested a logout pop up window
      default: $result = 0; // Default: It was not a form request
    }
     
    # Otherwise it was not a form request
    # Send out an error message
    if ($result == 0) {
    #    echo "Content-type: text/html\n\n";
       echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
    <html>
    <head>
     <title>$title</title>
     <meta http-equiv=\"Cache-control\" content=\"no-cache\">
     <meta http-equiv=\"Pragma\" content=\"no-cache\">
    </head>
     <h1 style=\"text-align: center;\">$h1Failed</h1>
     <center>
       $centerdaemon
     </center>
    </body>
    </html>
    ";
        exit(0);
    }
     
    # Generate the output
    #echo "Content-type: text/html\n\n";
    echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
    <html>
    <head>
	<link href=\"../bootstrap/dist/css/bootstrap.css\" rel=\"stylesheet\">
     <title>$title</title>
     <meta http-equiv=\"Cache-control\" content=\"no-cache\">
     <meta http-equiv=\"Pragma\" content=\"no-cache\">
     <SCRIPT LANGUAGE=\"JavaScript\">
       var blur = 0;
       var starttime = new Date();
       var startclock = starttime.getTime();
       var mytimeleft = 0;
     
       function doTime() {
         window.setTimeout( \"doTime()\", 1000 );
         t = new Date();
         time = Math.round((t.getTime() - starttime.getTime())/1000);
         if (mytimeleft) {
           time = mytimeleft - time;
           if (time <= 0) {
             window.location = \"$loginpath?res=popup3&uamip=$uamip&uamport=$uamport\";
           }
         }
         if (time < 0) time = 0;
         hours = (time - (time % 3600)) / 3600;
         time = time - (hours * 3600);
         mins = (time - (time % 60)) / 60;
         secs = time - (mins * 60);
         if (hours < 10) hours = \"0\" + hours;
         if (mins < 10) mins = \"0\" + mins;
         if (secs < 10) secs = \"0\" + secs;
         title = \"Online time: \" + hours + \":\" + mins + \":\" + secs;
         if (mytimeleft) {
           title = \"Tiempo disponible: \" + hours + \":\" + mins + \":\" + secs;
         }
         if(document.all || document.getElementById){
            document.title = title;
         }
         else {  
           self.status = title;
         }
       }
     
       function popUp(URL) {
         if (self.name != \"chillispot_popup\") {
           chillispot_popup = window.open(URL, 'chillispot_popup', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=375');
         }
       }
     
       function doOnLoad(result, URL, userurl, redirurl, timeleft) {
         if (timeleft) {
           mytimeleft = timeleft;
         }
         if ((result == 1) && (self.name == \"chillispot_popup\")) {
           doTime();
         }
         if ((result == 1) && (self.name != \"chillispot_popup\")) {
           chillispot_popup = window.open(URL, 'chillispot_popup', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=500,height=375');
         }
         if ((result == 2) || result == 5) {
           document.form1.UserName.focus()
         }
         if ((result == 2) && (self.name != \"chillispot_popup\")) {
           chillispot_popup = window.open('', 'chillispot_popup', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=400,height=200');
           chillispot_popup.close();
         }
         if ((result == 12) && (self.name == \"chillispot_popup\")) {
           doTime();
           if (redirurl) {
             opener.location = redirurl;
           }
           else if (opener.home) {
             opener.home();
           }
           else {
             opener.location = \"about:home\";
           }
           self.focus();
           blur = 0;
         }
         if ((result == 13) && (self.name == \"chillispot_popup\")) {
           self.focus();
           blur = 1;
         }
       }
     
       function doOnBlur(result) {
         if ((result == 12) && (self.name == \"chillispot_popup\")) {
           if (blur == 0) {
             blur = 1;
             self.focus();
           }
         }
       }
     </script>
    </head>
    <body onLoad=\"javascript:doOnLoad($result, '$loginpath?res=popup2&uamip=$uamip&uamport=$uamport&userurl=$userurl&redirurl=$redirurl&timeleft=$timeleft','$userurldecode', '$redirurldecode', '$timeleft')\" onBlur = 'javascript:doOnBlur($result)' >";
     
    /*# begin debugging
      print "<center>THE INPUT (for debugging):<br>";
      foreach ($_GET as $key => $value) {
        print $key . "=" . $value . "<br>";
      }
      print "<br></center>";
    # end debugging
    */
    if ($result == 2) {
        echo "
     <h1 style=\"text-align: center;\">$h1Failed</h1>";
        if ($reply == 'Your maximum never usage time has been reached') {
        echo "<center> $timeReached </BR></BR></center>";
        }
    }
     
    /*if ($result == 5) {
        echo "
     <h1 style=\"text-align: center;\">$h1Login</h1>";
    }*/
     
    if ($result == 2 || $result == 5) {
    
	?>  

    <!-- Le styles -->
    <link href="../include/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/signin.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/portal-narrow.css" rel="stylesheet">
    
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="clientes/js/html5shiv.js"></script>
    <![endif]-->

<meta charset="utf-8">
    <div class="container">
<script>
	var host='<?php echo "$loginpath?res=popup1&uamip=$uamip&uamport=$uamport"; ?>'; 
</script>
<form class="form-signin" name="form1" method="post" action="<?php echo $loginpath; ?>">
  <!-- <h2 class="form-signin-heading">Mi portal wifi</h2> --!>


<?php
		require_once("../clientes/include/config.php");
		require_once("../clientes/include/funciones.php");

		// Connect to server and select databse.
		mysql_connect("$dbhost", "$dbuser", "$dbpass")or die("cannot connect");
		mysql_select_db("$dbname")or die("cannot select DB");

		$contenido = trae_contenido($_GET['nasid']);
		echo "$contenido";
	?> <br> 
  <input type="hidden" name="challenge" value="<?php echo $challenge; ?>">
  <input type="hidden" name="uamip" value="<?php echo $uamip; ?>">
  <input type="hidden" name="uamport" value="<?php echo $uamport; ?>">
  <input type="hidden" name="userurl" value="<?php echo $userurl; ?>">
        <input type="text" class="form-control" placeholder="PIN" name="UserName">
        <input type="password" class="form-control" placeholder="Contraseña" name="Password"><br>
	<div align=center><input class="btn btn-lg btn-primary" type="submit" name="button" onClick="javascript:popUp(host)" value="Conectar" /></div> <br>
	
  <div align=center>Servicio brindado por<a href="http://miportalwifi.com.ar/"><img src="../include/logo.png"></a></div><br>

	
<br>
  </form>
  </div> <!-- /container -->


    <div align=center class="footer">
        <a class="brand" href="http://miportalwifi.com.ar"><p>&copy; Mi portal wifi 2013</p></a>
      </div>

    </body>
    </html>

<?php
    }
     
    if ($result == 1) {
      echo "
     <h1 style=\"text-align: center;\">$h1Loggedin</h1>";
?>    
   <div align=center class="footer">
        <a class="brand" href="http://miportalwifi.com.ar"><p>&copy; Mi portal wifi 2013</p></a>
      </div>

<?php
      if ($reply) {
          echo "<center> $reply </br></br></center>";
      }
     
      echo "
     <center>
       <a href=\"http://$uamip:$uamport/logoff\">Logout</a>
     </center>
    </body>
    </html>";
    }
     
    if (($result == 4) || ($result == 12)) {
      echo "<br><br>
     <h1 style=\"text-align: center;\">$h1Loggedin</h1>
     <center> <br>
       <a class=\"btn btn-danger\" href=\"http://$uamip:$uamport/logoff\">$centerLogout</a>
     </center>
    </body>
    </html>";
    }
     
     
    if ($result == 11) {
      echo "
     <h1 style=\"text-align: center;\">$h1Loggingin</h1>
     <center>
       $centerPleasewait
     </center>
    </body>
    </html>";
    }
     
     
    if (($result == 3) || ($result == 13)) {
      echo "<br><br>
     <h1 style=\"text-align: center;\">$h1Loggedout</h1>
     <center><br>
       <a class=\"btn btn-primary\" href=\"http://$uamip:$uamport/prelogin\">$centerLogin</a>
     </center>
    </body>
    </html>";
    }
     
    exit(0);
    ?>


