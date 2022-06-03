<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $documento = $_POST['data2'];
    $genero = $_POST['data3'];
    $estado = $_POST['data4'];
    $fNacimiento = $_POST['data5'];
    $fIngreso = $_POST['data6'];
    $eps = $_POST['data7'];
    $direccion = $_POST['data8'];
    $acudiente = $_POST['data9'];
    $nomPadre = $_POST['data10'];
    $nomMadre = $_POST['data11'];
    $grupo = $_POST['data12'];
    $id = $_POST['data13'];

    $sql = "UPDATE ESTUDIANTE SET cod_grupo = '".$grupo."', cod_acudiente = '".$acudiente."', documento = '".$documento."', nombre = '".$nombre."', genero = '".$genero."', fecha_nacimiento = '".$fNacimiento."', fecha_ingreso = '".$fIngreso."', eps = '".$eps."', estado = '".$estado."', direccion_residencia = '".$direccion."', nombre_padre = '".$nomPadre."', nombre_madre = '".$nomMadre."' WHERE cod_estudiante = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>