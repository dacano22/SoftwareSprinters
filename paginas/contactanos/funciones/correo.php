<?php
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $apellido = $_POST['data2'];
    $asunto = $_POST['data3'];
    $email = $_POST['data4'];
    $mensaje = $_POST['data5'];

    try {
        //Server settings
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'jardin.inquietudes.icbf@gmail.com';                     //SMTP username
        $mail->Password   = 'nomejodas789';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->CharSet = 'UTF-8';
    
        //Recipients
        $mail->setFrom('jardin.inquietudes.icbf@gmail.com', 'Jardín Infantil Inquietudes');
        $mail->addAddress($email, $nombre.' '.$apellido);     //Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Jardín Infantíl Inquietudes | ¡Te contactámos!';
        $mail->Body    = '<b>¡Hola '.$nombre.' '.$apellido.'!</b><br><br>Estamos atendiendo la siguiente solicitud que realizaste:<br><b>Asunto:</b> '.$asunto.'<br><b>Mensaje:</b> '.$mensaje.'<br><br>Te estaremos contactándo en los próximos minutos para atender tu requerimiento. Gracias por confiar en nosotros.<br><br><b>Atentamente: Jardín Infantíl Inquietudes</b>';
        $mail->AltBody = '¡Hola '.$nombre.' '.$apellido.'! Estamos atendiendo la siguiente solicitud que realizaste:\nAsunto: '.$asunto.'\nMensaje: '.$mensaje.'\n\nTe estaremos contactándo en los próximos minutos para atender tu requerimiento. Gracias por confiar en nosotros.\n\nAtentamente: Jardín Infantíl Inquietudes';
        $mail->send();
        echo '1';
    } catch (Exception $e) {
        echo '2';
    }
}
?>