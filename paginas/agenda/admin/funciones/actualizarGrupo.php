<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $grado = $_POST['data2'];
    $id = $_POST['data3'];

    $sql = "UPDATE GRUPO SET cod_grado = '".$grado."', nombre_grupo = '".$nombre."' WHERE cod_grupo = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>