<?php

require_once ('../../../funciones/conexion.php');

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$valide = 0;
$email = "";
$auth = "";

if (isset($_POST['data1'])) {
    $documento = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM DOCENTE WHERE cedula_docente = '".$documento."';");
    $temp = $sql->fetch();

    if ($sql->rowCount() > 0) {
        $email = $temp['correo_docente'];
        $sql = $conn->query("SELECT contrasenha FROM USUARIO WHERE documento = '".$documento."';");
        $row = $sql->fetch();

        $valide = 1;
        $auth = $row['contrasenha'];
    } else {
        $sql = $conn->query("SELECT * FROM ACUDIENTE WHERE cedula_acudiente = '".$documento."';");
        $temp = $sql->fetch();

        if ($sql->rowCount() > 0) {
            $email = $temp['correo_acudiente'];
            $sql = $conn->query("SELECT contrasenha FROM USUARIO WHERE documento = '".$documento."';");
            $row = $sql->fetch();

            $valide = 1;
            $auth = $row['contrasenha'];
        }
    }

    if ($valide == 1) {
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
            $mail->addAddress($email, 'Colaborador');     //Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Jardín Infantíl Inquietudes | ¡Te contactámos!';
            $mail->Body    = 'Contraseña: '.$auth;
            $mail->AltBody = 'Contraseña: '.$auth;
            $mail->send();
            echo "Correo enviado exitosamente";
        } catch (Exception $e) {
        }
    } else {
        echo "No";
    }
}

?>