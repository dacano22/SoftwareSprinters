<?php

require_once('../../../../funciones/conexion.php');

session_start();

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $genero = $_POST['data2'];
    $estado = $_POST['data3'];
    $grado = $_POST['data4'];
    $fNacimiento = $_POST['data5'];
    $fIngreso = $_POST['data6'];
    $eps = $_POST['data7'];
    $arl = $_POST['data8'];
    $correo = $_POST['data9'];
    $direccion = $_POST['data10'];
    $documento = $_POST['data11'];

    $sql = "INSERT INTO DOCENTE VALUES (NULL, '".$nombre."', '".$genero."', '".$estado."', '".$eps."', '".$arl."', '".$fNacimiento."', '".$fIngreso."', '".$correo."', '".$documento."', '".$direccion."');";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>