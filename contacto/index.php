<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Acceso clientes - Mi portal wifi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

    <link href="../include/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <link href="../include/bootstrap/dist/css/portal-narrow.css" rel="stylesheet">
    <style>
        body { background: #e5e5e5; }
        </style>


        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="clientes/js/html5shiv.js"></script>
    <![endif]-->


    <div class="portal-narrow">

 <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li><a href="../index.html">Home</a></li>
          <li class="active"><a href="../contacto/">Contacto</a></li>
          <li><a href="../clientes/">Acceso clientes</a></li>
        </ul>
                <a class="brand" href="../index.html"><img src="../include/logo.png"/></a>

      </div>


<br>      
        <div class="starter-template">  
          
            <div class="page-header">  
                <h2>Contacto</h2>  
            </div>  
    <?php  
      
            // check for a successful form post  
            if (isset($_GET['s'])) echo "<div class=\"alert alert-success\">".$_GET['s']."</div>";  
      
            // check for a form error  
            elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";  
      
    ?>  
            <form method="POST" action="enviamail.php" class="form-signin">  
                        <input type="text" class="form-control" name="contact_name" id="input1" placeholder="Tu nombre"> <br> 
                        <input type="text" class="form-control" name="contact_email" id="input2" placeholder="Tu dirección de correo"> <br> 
                        <textarea class="form-control" name="contact_message" id="input3" rows="8" placeholder="Este es el mensaje que nos enviarás."></textarea> <br>  
                <div align="center" class="form-actions">  
                    <input type="hidden" name="save" value="contact">  
                    <button type="submit" class="btn btn-lg btn-primary">Enviar</button> 
                </div>  
            </form>  
              
        </div>  

              
    </body>  
    </html>  
