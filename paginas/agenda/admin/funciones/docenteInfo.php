<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $docente = $_POST['data1'];

    $sql = $conn->query("SELECT DOCENTE.*, GRADO.cod_grado AS cod_grado FROM DOCENTE INNER JOIN GRADO ON DOCENTE.cod_docente = GRADO.cod_docente WHERE DOCENTE.cod_docente = '".$docente."';");
    $row = $sql->fetch();

    $nombre = $row['nombre'];

    if ($row['genero'] == 'Femenino') {
        $genero = 2;
    } else {
        $genero = 1;
    }

    if ($row['estado'] == 'Activo') {
        $estado = 1;
    } else {
        $estado = 2;
    }

    $fecha_nacimiento = $row['fecha_nac'];
    $fecha_ingreso = $row['fecha_ingreso'];
    $eps = $row['eps'];
    $arl = $row['arl'];
    $correo = $row['correo_docente'];
    $documento = $row['cedula_docente'];
    $direccion = $row['direccion_residencia'];
    $grado = $row['cod_grado'];

    $phpArray = array($nombre, $documento, $genero, $estado, $fecha_nacimiento, $fecha_ingreso, $eps, $arl, $correo, $direccion, $grado);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>