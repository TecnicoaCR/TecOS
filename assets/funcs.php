<?php

    function isNull($name, $service, $email, $phone, $message){
	if(strlen(trim($name)) < 1 || strlen(trim($service)) < 1 || strlen(trim($email)) < 1 || strlen(trim($phone)) < 1 || strlen(trim($message)) < 1){
            return true;
	} else {
            return false;
	}
    }

    function isEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        } else {
            return false;
        }
    }

    function resultBlock($errors){
        if(count($errors) > 0){
            echo "<div id='error' class='alert alert-danger' role='alert'>
			<a href='#' onclick=\"showHide('error');\">[X]</a>
			<ul>";
            foreach($errors as $error){
                echo "<li>".$error."</li>";
            }
            echo "</ul>";
            echo "</div>";
	}
    }

    function enviarEmail($body){

        require_once 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer(); // create a new object
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';

            $mail->Username = 'mail.tecnicoacr@gmail.com';
            $mail->Password = 'Mtecnicoa15';

            $mail->setFrom('mail.tecnicoacr@gmail.com', 'Mensaje del Formulario de Contacto');
            $mail->addAddress('maynor.greencr@gmail.com', 'Maynor Sequeira');

            $mail->Subject = 'Mensaje del Formulario de Contacto';
            $mail->Body    = $body;
            $mail->IsHTML(true);

            if($mail->send()){
                $msg = " Formulario enviado satisfactoriamente";
                $msg .= " Dentro de poco tiempo nos comunicaremos con usted.";
                
                echo "<script type='text/javascript'>alert('$msg');</script>";
                return true;

            } else {               
                $msg = "Su información NO enviada. Por favor, refresque la pagina e intentelo nuevamente.";     
                
                echo "<script type='text/javascript'>alert('$msg');</script>";
                return false;
            }
        } /* END sendEmail Function */
        
        function sendConfirm($email, $name, $subject, $body){

        require_once 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer(); // create a new object
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';

            $mail->Username = 'mail.tecnicoacr@gmail.com';
            $mail->Password = 'Mtecnicoa15';

            $mail->setFrom('mail.tecnicoacr@gmail.com', 'Mensaje de Recibido');
            $mail->addAddress($email, $name);

            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->IsHTML(true);

            if($mail->send()){
                return true;
            } else {               
                return false;
            }
        } /* END sendEmail Function */ 
        
        function sendConfirm2($body){

        require_once 'PHPMailer/PHPMailerAutoload.php';

        $mail = new PHPMailer(); // create a new object
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = 'smtp.gmail.com';
            $mail->Port = '587';

            $mail->Username = 'mail.tecnicoacr@gmail.com';
            $mail->Password = 'Mtecnicoa15';

            $mail->setFrom('mail.tecnicoacr@gmail.com', 'Mensaje de Recibido');
            $mail->addAddress('produccion.tecnicoacr@gmail.com', 'TecnicoaCR');

            $mail->Subject = 'Mensaje de Contacto';
            $mail->Body    = $body;
            $mail->IsHTML(true);

            if($mail->send()){
                return true;
            } else {               
                return false;
            }
        } /* END sendEmail Function */