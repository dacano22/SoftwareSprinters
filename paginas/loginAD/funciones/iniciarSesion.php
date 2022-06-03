<?php
require_once ('../../../funciones/conexion.php'); 

if (isset($_POST['data1'])) {
    session_start();

    $rol = $_POST['data1'];
    $usr = $_POST['data2'];
    $password = $_POST['data3'];

    $_SESSION['Documento'] = $usr;

    $sql = $conn->query("SELECT ROL.nombre_rol AS NombreRol FROM USUARIO INNER JOIN ROL ON USUARIO.cod_rol = ROL.cod_rol WHERE USUARIO.documento = '".$usr."' AND USUARIO.Contrasenha = '".$password."' AND USUARIO.cod_rol = '".$rol."';");
    $row = $sql->fetch();

    if ($sql->rowCount() > 0) {
        if ($row['NombreRol'] == 'docente') {
            $_SESSION['Rol'] = 2;
            echo 'Docente';
        } else if ($row['NombreRol'] == 'acudiente') {
            $_SESSION['Rol'] = 3;
            echo 'Acudiente';
        }
    } else {
        $sql = $conn->query("SELECT ROL.nombre_rol AS NombreRol FROM USUARIO INNER JOIN ROL ON USUARIO.cod_rol = ROL.cod_rol WHERE USUARIO.documento = '".$usr."' AND USUARIO.Contrasenha = '".$password."' AND USUARIO.cod_rol = '1';");
        $row = $sql->fetch();

        if ($sql->rowCount() > 0) {
            if ($row['NombreRol'] == 'administrador') {
                $_SESSION['Rol'] = 1;
                echo 'Administrador';
            }
        } else {
            echo 'No';
        }
    }
}
?>