<?php

function recibirMensajes() {
    require_once('../../../funciones/conexion.php');

    $texto = "<b>Iniciando chat...</b><br>";

    $sql = $conn->query("SELECT * FROM MENSAJERIA;");

    while ($row = $sql->fetch()) {
        $texto = $texto." ( ".$row['fecha']." ".$row['hora'].") ".$row['remitente']."<br>".$row['mensaje']."<br>";
    }

    echo $texto;
}

if (isset($_POST['mensaje'])) {
    session_start();

    require_once('../../../../funciones/conexion.php');

    $sql = $conn->query("SELECT nombre FROM ACUDIENTE WHERE cedula_acudiente = '".$_SESSION['Documento']."';");
    $row = $sql->fetch();

    $sql = "INSERT INTO MENSAJERIA VALUES (NULL, DATE(NOW()), '".$row['nombre']." - <b>Acudiente</b>', '".$_POST['mensaje']."', TIME(NOW()));";
    $run = $conn->prepare($sql);
    $run->execute();

    echo $_SESSION['Documento'];
}

?>