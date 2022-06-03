<?php

require_once('../../../../funciones/conexion.php');

session_start();

if (isset($_POST['data1'])) {
    $authAnt = $_POST['data1'];
    $authNue = $_POST['data2'];
    $token = $_POST['data3'];

    $sql = $conn->query("SELECT * FROM TOKEN WHERE documento = '".$_SESSION['Documento']."' AND VALIDO = 1 AND token = '".$token."';");

    if ($sql->rowCount() > 0) {
        $sql = $conn->query("SELECT * FROM USUARIO WHERE contrasenha = '".$authAnt."';");

        if ($sql->rowCount() > 0) {
            $sql = "UPDATE USUARIO SET contrasenha = '".$authNue."' WHERE documento = '".$_SESSION['Documento']."';";
            $sql .= "UPDATE TOKEN SET valido = 0 WHERE documento = '".$_SESSION['Documento']."';";
            $run = $conn->prepare($sql);
            $run->execute();

            echo "Si";

            session_start();
            unset($_SESSION['Rol']);
            session_destroy();
        } else {
            echo "No";
        }
    } else {
        echo "No";
    }
}

?>