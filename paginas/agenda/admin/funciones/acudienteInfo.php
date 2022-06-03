<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $acudiente = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ACUDIENTE WHERE cod_acudiente = '".$acudiente."';");
    $row = $sql->fetch();

    $nombre = $row['nombre'];

    if ($row['genero'] == 'femenino') {
        $genero = 2;
    } else {
        $genero = 1;
    }

    $fecha_nacimiento = $row['fecha_nacimiento'];
    $parentesco = $row['parentesco'];
    $documento = $row['cedula_acudiente'];
    $correo = $row['correo_acudiente'];
    $telefono = $row['telefono'];

    $phpArray = array($nombre, $genero, $fecha_nacimiento, $parentesco, $documento, $correo, $telefono);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>