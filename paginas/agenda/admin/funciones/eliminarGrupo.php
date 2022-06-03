<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $id = $_POST['data1'];
    $grupo = $_POST['data2'];

    $sql = "UPDATE ACTIVIDAD SET cod_grupo = '".$grupo."';";
    $sql .= "UPDATE ESTUDIANTE SET cod_grupo = '".$grupo."';";
    $sql .= "DELETE FROM GRUPO WHERE cod_grupo = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>