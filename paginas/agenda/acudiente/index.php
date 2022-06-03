<?php
session_start();

if (!isset($_SESSION['Rol'])) {
    header("location:../../loginAD");
}

include('funciones/mensajeria.php');
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
                <div class="opcion opcionSel" namespace="Menú Principal">
                    <img src="../logos/SeguimientoSel.svg" alt="">
                    <p>Seguimiento académico</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal" onclick="window.location.href='chat.php'">
                    <img src="../logos/Chat.svg" alt="">
                    <p>Chat</p>
                </div>
            </div>
        </section>
        <section class="principal px-4 pt-4" namespace="PRINCIPAL">
            <div class="d-flex justify-content-between usuario">
                <h2 class="mb-0 d-flex align-items-center">Tablero de acudiente</h2>
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">¡Bienvenido al Tablero del Acudiente!</h5>
                    <button class="ms-3 btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#configuracion">Configuración</button>
                    <button class="ms-3 btn btn-danger" onclick="cerrarSesion()">Cerrar sesión</button>
                </div>
            </div>
            <div class="hr">
                <hr>
            </div>
            <div class="py-3 border contenido px-4" style="overflow-y:scroll;">
                <div class="d-flex justify-content-center align-items-center mb-4">
                    <h3 class="text-center me-3">Seguimiento académico</h3>
                    <button class="btn btn-info" onclick="generarPDF()" id="generarPDF">Generar PDF</button>
                </div>
                <div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100">
                            <div class="w-50">
                                <label for="">Nombre del estudiante</label>
                                <select class="form-select" name="nombre" id="nombre">
                                    <?php include('funciones/estudiante.php'); ?>
                                </select>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Género</label>
                                <input class="form-control" type="text" name="genero" id="genero" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="estado">Estado</label>
                                <input class="form-control" type="text" name="estado" id="estado" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Grado</label>
                                <input class="form-control" type="text" name="grado" id="grado" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">Fecha de nacimiento</label>
                                <input class="form-control" type="date" name="fNacimiento" id="fNacimiento" disabled
                                    required>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Fecha de ingreso</label>
                                <input class="form-control" type="date" name="fIngreso" id="fIngreso" disabled required>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">EPS</label>
                                <input class="form-control" type="text" name="eps" id="eps" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Dirección de residencia</label>
                                <input class="form-control" type="text" name="direccion" id="direccion" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">Acudiente</label>
                                <input class="form-control" name="nombreAcudiente" id="nombreAcudiente" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Nombre de padre</label>
                                <input class="form-control" type="text" name="nomPadre" id="nomPadre" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Nombre de madre</label>
                                <input class="form-control" type="text" name="nomMadre" id="nomMadre" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            Anotaciones
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha de anotación</th>
                                        <th>Asunto</th>
                                        <th>Novedad</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpoAnotaciones"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            Actividades
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Descripción</th>
                                        <th>Fecha de creación</th>
                                        <th>Fecha de entrega</th>
                                    </tr>
                                </thead>
                                <tbody id="cuerpoActividades"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
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