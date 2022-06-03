<?php

require_once('../../../../funciones/conexion.php');

session_start();

if (isset($_POST['data1'])) {
    $id = $_POST['data1'];

    $sql = $conn->query("SELECT cod_estudiante FROM ESTUDIANTE WHERE cod_acudiente = '".$id."'");
    $row = $sql->fetch();

    $sql = "DELETE FROM ANOTACION WHERE cod_estudiante = '".$row['cod_estudiante']."';";
    $sql .= "DELETE FROM ESTUDIANTE WHERE cod_acudiente = '".$id."';";
    $sql .= "DELETE FROM USUARIO WHERE documento = '".$_SESSION['Documento']."';";
    $sql .= "DELETE FROM ACUDIENTE WHERE cod_acudiente = '".$id."';";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>