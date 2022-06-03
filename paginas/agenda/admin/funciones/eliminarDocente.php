<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $id = $_POST['data1'];
    $reemplazo = $_POST['data2'];

    $sql = $conn->query("SELECT * FROM DOCENTE WHERE cod_docente = '".$id."';");
    $row = $sql->fetch();

    echo "SELECT * FROM DOCENTE WHERE cod_docente = '".$id."';";

    $sql = "UPDATE GRADO SET cod_docente = '".$reemplazo."' WHERE cod_docente = '".$id."';";
    $sql .= "DELETE FROM USUARIO WHERE documento = '".$row['cedula_docente']."';";
    $sql .= "DELETE FROM DOCENTE WHERE cod_docente = '".$id."';";
    $run = $conn->prepare($sql);
    $run->execute();
}

?>