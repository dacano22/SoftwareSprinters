<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $nombre = $_POST['data1'];
    $documento = $_POST['data2'];
    $genero = $_POST['data3'];
    $estado = $_POST['data4'];
    $fNacimiento = $_POST['data5'];
    $fIngreso = $_POST['data6'];
    $eps = $_POST['data7'];
    $arl = $_POST['data8'];
    $grado = $_POST['data9'];
    $correo = $_POST['data10'];
    $direccion = $_POST['data11'];
    $id = $_POST['data12'];

    $sql = "UPDATE DOCENTE SET nombre = '".$nombre."', genero = '".$genero."', estado = '".$estado."', arl = '".$arl."', fecha_nac = '".$fNacimiento."', fecha_ingreso = '".$fIngreso."', correo_docente = '".$correo."', cedula_docente = '".$documento."', direccion_residencia = '".$direccion."' WHERE cod_docente = '".$id."';";
    echo $sql;
    $run = $conn->prepare($sql);
    $run->execute();
}

?>