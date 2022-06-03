<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $grupo = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM GRUPO WHERE cod_grupo = '".$grupo."';");
    $row = $sql->fetch();

    $nombre = $row['nombre_grupo'];
    $grado = $row['cod_grado'];

    $phpArray = array($nombre, $grado);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>