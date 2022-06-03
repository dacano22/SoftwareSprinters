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
                <div class="opcion opcionSel" namespace="Menú Principal">
                    <img src="../logos/NovedadesSel.svg" alt="">
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
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='informacion.php'">
                    <img src="../logos/Informacion.svg" alt="">
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
                <h3 class="text-center mb-4">Envío de novedades</h3>
                <div class="d-flex">
                    <div class="card w-25">
                        <div class="card-header">Datos del estudiante</div>
                        <div class="card-body">
                            <label for="">Grado</label>
                            <select class="form-select" name="grado" id="grado">
                                <?php include_once('funciones/grado.php'); ?>
                            </select>
                            <label for="" class="mt-2">Curso</label>
                            <select class="form-select" name="curso" id="curso">
                                <option value="0">Seleccionar</option>
                            </select>
                            <label for="" class="mt-2">Estudiante</label>
                            <select class="form-select" name="estudiante" id="estudiante">
                                <option value="0">Seleccionar</option>
                            </select>
                        </div>
                    </div>
                    <div class="w-75 px-3">
                        <div class="d-flex justify-content-between w-100">
                            <div class="w-50">
                                <label for="">Nombre del estudiante</label>
                                <input class="form-control" type="text" name="nombre" id="nombre" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Género</label>
                                <input class="form-control" type="text" name="genero" id="genero" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Estado</label>
                                <input class="form-control" type="text" name="estado" id="estado" disabled>
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
                                <label for="">Grado</label>
                                <input class="form-control" type="text" name="grupo" id="grupo" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">EPS</label>
                                <input class="form-control" type="text" name="eps" id="eps" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Dirección de residencia</label>
                                <input class="form-control" type="text" name="direccion" id="direccion" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Acudiente</label>
                                <input class="form-control" name="nombreAcudiente" id="nombreAcudiente" disabled>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">Nombre de padre</label>
                                <input class="form-control" type="text" name="nomPadre" id="nomPadre" disabled>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Nombre de madre</label>
                                <input class="form-control" type="text" name="nomMadre" id="nomMadre" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex mt-2">
                    <div class="w-25 me-3">
                        <label for="asunto">Asunto</label>
                        <input class="form-control" type="text" name="asunto" id="asunto" required>
                    </div>
                    <div class="w-75">
                        <label for="asunto">Novedad</label>
                        <select class="form-select" name="novedad" id="novedad">
                            <?php include_once('funciones/listaNov.php'); ?>
                        </select>
                    </div>
                </div>
                <label class="mt-2" for="observaciones">Observaciones</label>
                <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="5"
                    style="resize: none;" required></textarea>
                <div class="mt-2 form-check d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" name="envCorreo" id="envCorreo">
                    <label for="envCorreo" class="ms-2">Enviar correo</label>
                </div>
                <button class="btn btn-success mt-3 w-25 d-block m-auto" onclick="enviarNovedad()">Enviar</button>

                <div class="modal fade" id="configuracion" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Cambiar contraseña</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center mb-3">
                                    <label class="me-2">Código de confirmación</label>
                                    <button class="btn btn-primary" id="auth" onclick="codigoRC()">Enviar</button>
                                </div>
                                <input class="form-control" id="token" type="text"
                                    placeholder="Escribe aquí el código que te enviamos al correo">
                                <br>
                                <input class="form-control mb-3" type="text" id="authAnt"
                                    placeholder="Contraseña anterior">
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
            </div>
        </section>
    </div>
</body>

<script src="../../../funciones/jquery-3.6.0.js"></script>
<script src="../../../funciones/bootstrap.min.js"></script>
<script src="funciones/novedades.js"></script>
<script src="funciones/funciones.js"></script>

</html>