<?php
    require("class.phpmailer.php");
    require("class.smtp.php");

    $from = $_REQUEST['email_news'];

    $body = "La cuenta {$from} se ha registrado al newsletter";

    $EmailTo = "info@demarcar.com.ar";
    $Subject = "Demarcar.com.ar - Suscripcion Newsletter";

    // Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = "c1561680.ferozo.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "web@demarcar.com.ar";  // Mi cuenta de correo
    $smtpClave = "A*WMSP77pA";  // Mi contraseña

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 465; 
    $mail->SMTPSecure = 'ssl';
    $mail->IsHTML(true); 
    $mail->CharSet = "utf-8";

    // VALORES A MODIFICAR //
    $mail->Host = $smtpHost; 
    $mail->Username = $smtpUsuario; 
    $mail->Password = $smtpClave;    

    $mail->From = $from; // Email desde donde envío el correo.
    $mail->FromName = $from;
    $mail->AddAddress($EmailTo); // Esta es la dirección a donde enviamos los datos del formulario

    $mail->Subject = $Subject; // Este es el titulo del email.
    $mensajeHtml = nl2br($body);
    $mail->Body = "{$mensajeHtml}"; // Texto del email en formato HTML
    $mail->AltBody = "{$mensajeHtml}";

    // FIN - VALORES A MODIFICAR //
    
    $success = $mail->Send();

    if ($success){
        echo "success";
    } else {
        echo "error";
    }

    ?>