<?php
if(isset($_POST['email'])) {
 
    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados
 
    $email_to = "produccion.tecnicoacr@gmail.com";
 
    $email_subject = "Contacto de Servicio";   
 
    function died($error) {
 
        // si hay algún error, el formulario puede desplegar su mensaje de aviso
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
        
        echo $error."<br /><br />";
 
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['nombrecompleto']) ||
 
        !isset($_POST['servicio']) ||
 
        !isset($_POST['telefono']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['mensaje'])) {
 
        died('Lo sentimos pero parece haber un problema con los datos enviados.');       
 
    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo
    
    $nombrecompleto = $_POST['nombrecompleto']; // requerido
 
    $servicio = $_POST['servicio']; // requerido
 
    $telefono = $_POST['telefono']; // requerido
 
    $email_from = $_POST['email']; // no requerido 

    $mensaje = $_POST['mensaje']; // requerido
 
    $error_message = "Error";

//En esta parte se verifica que la dirección de correo sea válida 
    
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nombrecompleto)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }

 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($nombrecompleto)."\n";
 
    $email_message .= "Apellido: ".clean_string($servicio)."\n";
 
    $email_message .= "Email: ".clean_string($telefono)."\n";
 
    $email_message .= "Teléfono: ".clean_string($email_from)."\n";
 
    $email_message .= "Mensaje: ".clean_string($mensaje)."\n";
  
 
//Se crean los encabezados del correo
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
 
<!-- incluye aqui tu propio mensaje de Éxito-->
 
Gracias! Nos pondremos en contacto contigo a la brevedad
 
 
<?php
 
}
 
?>