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

	<?php

        $logged_user = $_SESSION['myusername'];


	if (isset($_POST['texto']))
	{
		$contenido = $_POST['texto'];
		inserta_contenido($logged_user,$contenido);
	}

	?>
	
                <script src="include/nicEdit.js" type="text/javascript"></script>
                <script type="text/javascript">
                        bkLib.onDomLoaded(function() 
                        {
                                nicEditors.allTextAreas
                                (
                                        {
                                                maxWidth : 100, 
                                                iconsPath : 'include/nicEditorIcons.gif',
                                        }
                                )
                         });
		</script>
							
		<form name="textarea" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
			<h4>Edición de pantalla de bienvenida</h4>
				<textarea name="texto"  style="width: 60%; height: 60%;">
					<?php
						echo trae_contenido($logged_user);
					?>
				</textarea> <br>
			<div class="form-actions">
	 			<button class="btn btn-primary" type="submit" name="contenido">Guardar</button> 
				<button type="button" class="btn">Cancelar</button>
			</div>
		</form>
    </div> <!-- /container -->
</html>

