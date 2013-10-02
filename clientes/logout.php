<?php
session_start();
session_destroy();

  header('Location: index.php'); //Dont forget to redirect

?>

