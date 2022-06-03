<?php
session_start();

if (!isset($_SESSION['Rol'])) {
    header("location:../../loginAD");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Schedule APP</title>
    <link rel="shortcut icon" href="../../../favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link rel="stylesheet" href="../../../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../../../fuentes/fuentes.css">
</head>

<body>
    <div class="cuerpo d-flex">
        <section class="colIzq user-select-none role-button" namespace="COLUMNA IZQUIERDA">
            <div class="logo" namespace="Logo">
                <img src="../logos/Logo.svg" alt="">
            </div>
            <div class="colIzqMenu">
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='index.php'">
                    <img src="../logos/Consultas.svg" alt="">
                    <p>Consultas</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='novedades.php'">
                    <img src="../logos/Novedades.svg" alt="">
                    <p>Envío de novedades</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal" onclick="window.location.href='chat.php'">
                    <img src="../logos/Chat.svg" alt="">
                    <p>Chat</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='actividades.php'">
                    <img src="../logos/Actividades.svg" alt="">
                    <p>Actividades</p>
                </div>
                <div class="opcion opcionSel" namespace="Menú Principal">
                    <img src="../logos/InformacionSel.svg" alt="">
                    <p>Información</p>
                </div>
            </div>
        </section>
        <section class="principal px-4 pt-4" namespace="PRINCIPAL">
            <div class="d-flex justify-content-between usuario">
                <h2 class="mb-0 d-flex align-items-center">Tablero de docente</h2>
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">¡Bienvenido al Tablero del Docente!</h5>
                    <button class="ms-3 btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#configuracion">Configuración</button>
                    <button class="ms-3 btn btn-danger" onclick="cerrarSesion()">Cerrar sesión</button>
                </div>
            </div>
            <div class="hr">
                <hr>
            </div>
            <div class="py-3 border contenido px-4" style="overflow-y:scroll;">
                <h3 class="text-center mb-4">Información</h3>
                <p class="text-justify">La plataforma de la Agenda Digital fue diseñado exclusivamente para el Jardín
                    Infantil Inquietudes, que se resume en un Sistema de Gestión de Información para mejorar la
                    comunicación entre Docentes y Acudientes, además del registro y automatización
                    de ciertos procesos dentro de la Institución.</p>
                <h5><b>Versión 1.0</b></h5>
                <p>
                    - Creación de las sesión para el ingreso a la plataforma.
                    <br> - Creación de tableros automatizados para el ingreso de la información.
                </p>
            </div>

            <div class="modal fade" id="configuracion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Cambiar contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex align-items-center mb-3">
                                <label class="me-2">Código de confirmación</label>
                                <button class="btn btn-primary" id="auth" onclick="codigoRC()">Enviar</button>
                            </div>
                            <input class="form-control" id="token" type="text"
                                placeholder="Escribe aquí el código que te enviamos al correo">
                            <br>
                            <input class="form-control mb-3" type="text" id="authAnt" placeholder="Contraseña anterior">
                            <input class="form-control" type="text" id="authNue" placeholder="Contraseña nueva">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-success" onclick="cambiarAuth()">Cambiar
                                contraseña</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

<script src="../../../funciones/jquery-3.6.0.js"></script>
<script src="../../../funciones/bootstrap.min.js"></script>
<script src="funciones/funciones.js"></script>

</html>