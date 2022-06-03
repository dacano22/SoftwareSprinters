<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $id = $_POST['data1'];

    $sql = "DELETE FROM ANOTACION WHERE cod_estudiante = '".$id."';";
    $sql .= "DELETE FROM ESTUDIANTE WHERE cod_estudiante = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>