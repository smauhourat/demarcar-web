<?php
    require("class.phpmailer.php");
    require("class.smtp.php");


    $to = "youremail.com"; // replace this email with yours
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $headers = "Content-type: text/html;From: $from";
    $subject = $_REQUEST['subject'];

    $fields = array();
    $fields["name"] = $_REQUEST['name'];
    $fields["email"] = $_REQUEST['email'];
    $fields["subject"] = $_REQUEST['subject'];
    $fields["message"] = $_REQUEST['message'];


    $body = 'Mensaje Web <br><br>';
    $body .= '<strong>Name</strong> : '.$fields['name'].'<br><br>';
    $body .= '<strong>Email</strong> : '.$fields['email']. '<br><br>';
    $body .= '<strong>Subject</strong> : '.$fields['subject']. '<br><br>';
    $body .= '<strong>Message</strong> : <br><br>'.$fields['message']. '<br>';

    $bodyFlat = 'Mensaje Web';
    $bodyFlat .= 'Name : '.$fields['name'];
    $bodyFlat .= 'Email : '.$fields['email'];
    $bodyFlat .= 'Subject : '.$fields['subject'];
    $bodyFlat .= 'Message : <br><br>'.$fields['message'];

    // echo $body;

     $EmailTo = "info@demarcar.com.ar";
     // $Subject = "Contacto Web - adhentux.com";

    // Datos de la cuenta de correo utilizada para enviar vía SMTP
    $smtpHost = "c1561680.ferozo.com";  // Dominio alternativo brindado en el email de alta 
    $smtpUsuario = "web@demarcar.com.ar";  // Mi cuenta de correo
    $smtpClave = "A*WMSP77pA";  // Mi contraseña

    //$send = mail($to, $subject, $body, $headers);
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
    $mail->FromName = $name;
    $mail->AddAddress($EmailTo); // Esta es la dirección a donde enviamos los datos del formulario
    
    $mail->Subject = "Demarcar.com.ar - Contacto Web"; // Este es el titulo del email.
    $mensajeHtml = nl2br($body);
    $mail->Body = "{$mensajeHtml}"; // Texto del email en formato HTML
    $mensajeFlat = nl2br($bodyFlat);
    $mail->AltBody = "{$mensajeFlat}";
    
    // echo $body;
    
    // FIN - VALORES A MODIFICAR //
    
    $success = $mail->Send();

    echo $success;

    // // redirect to success page
    // if ($success && $errorMSG == ""){
    //     echo "success";
    // }else{
    //     if($errorMSG == ""){
    //         echo "Ha ocurrido un error :(";
    //     } else {
    //         echo $errorMSG;
    //     }
    // }

    ?>