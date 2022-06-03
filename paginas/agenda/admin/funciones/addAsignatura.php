<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $grupo = $_POST['data2'];

    $sql = "INSERT INTO ASIGNATURA VALUES(NULL, '".$grupo."', '".$nombre."');";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>