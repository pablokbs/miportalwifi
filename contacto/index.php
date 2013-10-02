<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Acceso clientes - Mi portal wifi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../clientes/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }



      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="../clientes/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="clientes/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="clientes/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="clientes/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="clientes/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="clientes/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="favicon.ico">
  </head>

  <body>

    <div class="container-narrow">


 <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="../index.html">Home</a></li>
          <li class="active"><a href="../contacto/">Contacto</a></li>
          <li><a href="../clientes/">Acceso clientes</a></li>
        </ul>
                <a class="brand" href="../index.html"><img src="../include/logo.png"/></a>

      </div>


<br>      
        <div class="container">  
          
            <div class="page-header">  
                <h2>Contacto</h2>  
            </div>  
    <?php  
      
            // check for a successful form post  
            if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
      
            // check for a form error  
            elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";  
      
    ?>  
            <form method="POST" action="enviamail.php" class="form-horizontal">  
                <div class="control-group">  
                    <label class="control-label" for="input1">Nombre</label>  
                    <div class="controls">  
                        <input type="text" name="contact_name" id="input1" placeholder="Tu nombre">  
                    </div>  
                </div>  
                <div class="control-group">  
                    <label class="control-label" for="input2">Dirección de correo</label>  
                    <div class="controls">  
                        <input type="text" name="contact_email" id="input2" placeholder="Tu dirección de correo">  
                    </div>  
                </div>  
                <div class="control-group">  
                    <label class="control-label" for="input3">Mensaje</label>  
                    <div class="controls">  
                        <textarea name="contact_message" id="input3" rows="8" class="span5" placeholder="Este es el mensaje que nos enviarás."></textarea>  
                    </div>  
                </div>  
                <div class="form-actions">  
                    <input type="hidden" name="save" value="contact">  
                    <button type="submit" class="btn btn-large btn-primary">Enviar</button>  
                </div>  
            </form>  
              
        </div>  

              
    </body>  
    </html>  
