<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        #Reemplazar este correo por el correo electrónico del destinatario
        $mail_to = "produccion.tecnicoacr@gmail.com";
        
        # Envío de datos
        $servicio = trim($_POST["servicio"]);
        $nombrecompleto = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["nombrecompleto"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $telefono = trim($_POST["telefono"]);
        $mensaje = trim($_POST["mensaje"]);
        
        /*if ( empty($nombrecompleto) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($telefono) OR empty($servicio) OR empty($mensaje)) {
            # Establecer un código de respuesta y salida.
            http_response_code(400);
            echo "Por favor completa el formulario y vuelve a intentarlo.";
            exit;
        }*/
        
        # Contenido del correo
        $content = "Nombre: $nombrecompleto\n";
        $content .= "E-mail: $email\n\n";
        $content .= "Telefono: $telefono\n";
        $content .= "Mensaje:\n$mensaje\n";

        # Encabezados de correo electrónico.
        $headers = "From: $nombrecompleto <$email>";

        # Envía el correo.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            # Establece un código de respuesta 200 (correcto).
            http_response_code(200);
            echo "¡Gracias! Tu mensaje ha sido enviado.";
        } else {
            # Establezce un código de respuesta 500 (error interno del servidor).
            http_response_code(500);
            echo "Oops! Algo salió mal, no pudimos enviar tu mensaje.";
        }

    } else {
        # No es una solicitud POST, establezce un código de respuesta 403 (prohibido).
        http_response_code(403);
        echo "Hubo un problema con tu envío, intenta de nuevo.";
    }

?>
