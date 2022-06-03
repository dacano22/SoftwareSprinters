<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $estudiante = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE cod_estudiante = '".$estudiante."';");
    $row = $sql->fetch();

    $nombre = $row['nombre'];
    $documento = $row['documento'];

    if ($row['genero'] == 'femenino') {
        $genero = 2;
    } else {
        $genero = 1;
    }

    if ($row['estado'] == 'Activo') {
        $estado = 1;
    } else {
        $estado = 2;
    }

    $fecha_nacimiento = $row['fecha_nacimiento'];
    $fecha_ingreso = $row['fecha_ingreso'];
    $eps = $row['eps'];
    $direccion_residencia = $row['direccion_residencia'];
    $acudiente = $row['cod_acudiente'];
    $nombre_padre = $row['nombre_padre'];
    $nombre_madre = $row['nombre_madre'];
    $grupo = $row['cod_grupo'];

    $phpArray = array($nombre, $documento, $genero, $estado, $fecha_nacimiento, $fecha_ingreso, $eps, $direccion_residencia, $acudiente, $nombre_padre, $nombre_madre, $grupo);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>