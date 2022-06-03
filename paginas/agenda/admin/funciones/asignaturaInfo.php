<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $asignatura = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ASIGNATURA WHERE cod_asignatura = '".$asignatura."';");
    $row = $sql->fetch();

    $nombre = $row['nombre'];
    $grupo = $row['cod_grupo'];

    $phpArray = array($nombre, $grupo);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>