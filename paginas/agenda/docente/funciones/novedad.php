<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $estudiante = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE cod_estudiante = ".$estudiante.";");
    $row = $sql->fetch();

    $sql = $conn->query("SELECT nombre FROM ACUDIENTE WHERE cod_acudiente = ".$row['cod_acudiente'].";");
    $acud = $sql->fetch();

    $nombre = $row['nombre'];
    $documento = $row['documento'];
    $genero = $row['genero'];
    $estado = $row['estado'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
    $fecha_ingreso = $row['fecha_ingreso'];
    $eps = $row['eps'];
    $direccion_residencia = $row['direccion_residencia'];
    $acudiente = $acud['nombre'];
    $nombre_padre = $row['nombre_padre'];
    $nombre_madre = $row['nombre_madre'];

    $phpArray = array($nombre, $documento, $genero, $estado, $fecha_nacimiento, $fecha_ingreso, $eps, $direccion_residencia, $acudiente, $nombre_padre, $nombre_madre);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>