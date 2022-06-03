<?php

require_once('../../../../funciones/conexion.php');

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['data1'])) {
    $estudiante = $_POST['data1'];
    $asunto = $_POST['data2'];
    $novedad = $_POST['data3'];
    $observaciones = $_POST['data4'];
    $correo = $_POST['data5'];

    $sql = "INSERT INTO ANOTACION VALUES (NULL, ".$novedad.", ".$estudiante.", '".$asunto."', DATE(NOW()), '".$observaciones."');";
    $run = $conn->prepare($sql);
    $run->execute();

    if ($correo == true) {
        $sql = $conn->query("SELECT ACUDIENTE.nombre AS AcudNombre, ACUDIENTE.correo_acudiente AS Correo, ESTUDIANTE.nombre AS EstNombre FROM ACUDIENTE INNER JOIN ESTUDIANTE ON ACUDIENTE.cod_acudiente = ESTUDIANTE.cod_estudiante WHERE ESTUDIANTE.cod_estudiante = ".$estudiante.";");
        $row = $sql->fetch();

        $sql = $conn->query("SELECT novedad FROM NOVEDAD WHERE cod_novedad = ".$novedad.";");
        $anot = $sql->fetch();

        $mail = new PHPMailer(true);

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
            $mail->addAddress($row['Correo'], $row['AcudNombre']);     //Add a recipient
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');
        
            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Jardín Infantíl Inquietudes | ¡Recibiste una anotación!';
            $mail->Body    = '<b>¡Hola '.$row['AcudNombre'].'!</b><br><br>Recibiste una anotación para el estudiante '.$row['EstNombre'].':<br><b>Asunto:</b> '.$asunto.'<br><b>Novedad:</b> '.$anot['novedad'].'<br><b>Observaciones:</b> '.$observaciones.'<br><br>Puedes consultar nuestra página de administración para realizar un seguimiento a esta solicitud.<br><br><b>Atentamente: Jardín Infantíl Inquietudes</b>';
            $mail->AltBody = '¡Hola '.$row['AcudNombre'].'!\n\nRecibiste una anotación para el estudiante '.$row['EstNombre'].':\nAsunto: '.$asunto.'\nNovedad: '.$anot['novedad'].'\nObservaciones: '.$observaciones.'\n\nPuedes consultar nuestra página de administración para realizar un seguimiento a esta solicitud.\n\nAtentamente: Jardín Infantíl Inquietudes';
            $mail->send();
            echo '1';
        } catch (Exception $e) {
            echo '2';
        }
    }
}

?>