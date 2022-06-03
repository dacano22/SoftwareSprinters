<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $genero = $_POST['data2'];
    $estado = $_POST['data3'];
    $fNacimiento = $_POST['data4'];
    $fIngreso = $_POST['data5'];
    $eps = $_POST['data6'];
    $direccion = $_POST['data7'];
    $acudiente = $_POST['data8'];
    $nomPadre = $_POST['data9'];
    $nomMadre = $_POST['data10'];
    $grupo = $_POST['data11'];
    $documento = $_POST['data12'];

    $sql = "INSERT INTO ESTUDIANTE VALUES (NULL, ".$grupo.", ".$acudiente.", '".$documento."', '".$nombre."', '".$genero."', '".$fNacimiento."', '".$fIngreso."', '".$eps."', '".$estado."', '".$direccion."', '".$nomPadre."', '".$nomMadre."');";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>