<?php

require_once('../../../../funciones/conexion.php');

session_start();

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $documento = $_POST['data2'];
    $genero = $_POST['data3'];
    $fNacimiento = $_POST['data4'];
    $parentesco = $_POST['data5'];
    $telefono = $_POST['data6'];
    $correo = $_POST['data7'];

    $sql = "INSERT INTO ACUDIENTE VALUES (NULL, '".$nombre."', '".$genero."', '".$fNacimiento."', '".$parentesco."', '".$documento."', '".$correo."', '".$telefono."');";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>