<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $titulo = $_POST['data1'];
    $grupo = $_POST['data2'];
    $fCreacion = $_POST['data3'];
    $fEntrega = $_POST['data4'];
    $descripcion = $_POST['data5'];

    $sql = "INSERT INTO ACTIVIDAD VALUES (NULL, ".$grupo.", '".$titulo."', '".$descripcion."', '".$fCreacion."', '".$fEntrega."');";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>