<?php

require_once('../../../../funciones/conexion.php');

session_start();

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['data1'])) {
    $token = $_POST['data1'];

    $sql = $conn->query("SELECT correo_docente, nombre FROM DOCENTE WHERE cedula_docente = '".$_SESSION['Documento']."';");
    $row = $sql->fetch();

    $sql = "UPDATE TOKEN SET valido = 0 WHERE documento = '".$_SESSION['Documento']."';";
    $sql .= "INSERT INTO TOKEN VALUES (NULL, '".$_SESSION['Documento']."', '".$token."', 1)";
    $run = $conn->prepare($sql);
    $run->execute();

    $mail = new PHPMailer(true);

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
        $mail->addAddress($row['correo_docente'], $row['nombre']);     //Add a recipient
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Jardín Infantíl Inquietudes | ¡Tu código de recuperación!';
        $mail->Body    = 'Tu código de recuperación es: '.$token;
        $mail->AltBody = 'Tu código de recuperación es: '.$token;
        $mail->send();
        echo '1';
    } catch (Exception $e) {
        echo '2';
    }
}

?>