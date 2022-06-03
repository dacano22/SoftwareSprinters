<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $documento = $_POST['data2'];
    $genero = $_POST['data3'];
    $parentesco = $_POST['data4'];
    $telefono = $_POST['data5'];
    $fNacimiento = $_POST['data6'];
    $correo = $_POST['data7'];
    $id = $_POST['data8'];

    $sql = "UPDATE ACUDIENTE SET nombre = '".$nombre."', genero = '".$genero."', cedula_acudiente = '".$documento."', parentesco = '".$parentesco."', telefono = '".$telefono."', fecha_nacimiento = '".$fNacimiento."', correo_acudiente = '".$correo."' WHERE cod_acudiente = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>