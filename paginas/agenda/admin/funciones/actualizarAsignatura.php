<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $grupo = $_POST['data2'];
    $id = $_POST['data3'];

    $sql = "UPDATE ASIGNATURA SET nombre = '".$nombre."', cod_grupo = '".$grupo."' WHERE cod_asignatura = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>