<?php
    // check for form submission - if it doesn't exist then send back to contact form  
    if (!isset($_POST['save']) || $_POST['save'] != 'contact') { 
        header('Location: index.php'); exit; 
    } 
         
    // get the posted data 
    $name = $_POST['contact_name']; 
    $email_address = $_POST['contact_email']; 
    $message = $_POST['contact_message']; 
         
    // check that a name was entered 
    if (empty($name)) 
        $error = 'Tienes que especificar tu nombre.'; 
    // check that an email address was entered 
    elseif (empty($email_address))  
        $error = 'Tienes que especificar tu dirección de correo.'; 
    // check for a valid email address 
    elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email_address)) 
        $error = 'Tienes que ingresar una dirección de correo válida.'; 
    // check that a message was entered 
    elseif (empty($message)) 
        $error = 'Tienes que especificar un mensaje.'; 
             
    // check if an error was found - if there was, send the user back to the form 
    if (isset($error)) { 
        header('Location: index.php?e='.urlencode($error)); exit; 
    } 
             
    // write the email content 
    $email_content = "Nombre: $name\n"; 
    $email_content .= "Dirección de correo: $email_address\n"; 
    $email_content .= "Mensaje:\n\n$message"; 
         
    // send the email 
    mail ("pablo.kerberos@gmail.com", "Mensaje de contacto de Mi portal wifi", $email_content); 
         
    // send the user back to the form 
    header('Location: index.php?s='.urlencode('¡Gracias por tu mensaje! Nos contactaremos a la brevedad :)')); exit;  
      
    ?>  
