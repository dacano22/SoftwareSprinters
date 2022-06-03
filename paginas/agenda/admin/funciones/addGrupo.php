<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $grado = $_POST['data2'];

    $sql = "INSERT INTO GRUPO VALUES(NULL, '".$grado."', '".$nombre."');";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>