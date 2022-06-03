<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $id = $_POST['data1'];

    $sql = "DELETE FROM ASIGNATURA WHERE cod_asignatura = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>