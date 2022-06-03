<?php
session_start();

if (isset($_SESSION['Rol'])) {
    if ($_SESSION['Rol'] == 1) {
        header("location:../agenda/administrador");
    } else if ($_SESSION['Rol'] == 2) {
        header("location:../agenda/docente");
    } else {
        header("location:../agenda/acudiente");
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="shortcut icon" href="../../favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="estilos/estilo.css">
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../../fuentes/fuentes.css">
</head>

<body>
    <section class="formulario">
        <h1>Bienvenido al panel de administración</h1>
        <p class="descripcion">Inicia sesión para empezar el recorrido por la agenda digital</p>
        <div class="parte1">
            <div onclick="radioButton('Docente')">
                <span>
                    <punto class="radio-docente"></punto>
                </span>
                <input type="radio" name="radio" id="docente" checked>&nbsp&nbspDocente
            </div>
            <div onclick="radioButton('Acudiente')">
                <span>
                    <punto class="radio-acudiente"></punto>
                </span>
                <input type="radio" name="radio" id="acudiente">&nbsp&nbspAcudiente
            </div>
        </div>
        <div class="parte2">
            <input class="form-control" type="email" name="usuario" id="usuario" placeholder="Documento de identidad">
            <input class="form-control" type="password" name="auth" id="auth" placeholder="Contraseña">
        </div>
        <div class="parte3 d-flex justify-content-end">
            <p class="cursor-pointer" type="button" data-bs-toggle="modal" data-bs-target="#oc"><u>¿Olvidaste tu
                    contraseña?</u></p>
        </div>
        <div class="d-flex justify-content-between botones">
            <button onclick="iniciarSesion()">Ingresar</button>
            <button onclick="window.location.href='../../index.html'">Volver</button>
        </div>
    </section>

    <div class="modal fade" id="oc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Recuperación de contraseña</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label for="">Escribe tu documento de identidad</label>
                    <input class="form-control mt-3" type="text" name="documentoR" id="documentoR">
                    <h6 class="mt-3">Te enviaremos un correo electrónico con tu contraseña</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="recuperarAuth()">Enviar contraseña</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="../../funciones/jquery-3.6.0.js"></script>
<script src="../../funciones/bootstrap.min.js"></script>
<script src="funciones/funciones.js"></script>

</html>