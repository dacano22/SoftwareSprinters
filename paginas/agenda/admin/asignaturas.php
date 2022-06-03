<!-- <?php
session_start();

if (!isset($_SESSION['Rol'])) {
    header("location:../../loginAD");
}
?> -->

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
                    <img src="../logos/Estudiantes.svg" alt="">
                    <p>Registro de estudiantes</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='docentes.php'">
                    <img src="../logos/Estudiantes.svg" alt="">
                    <p>Registro de docentes</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='acudientes.php'">
                    <img src="../logos/Estudiantes.svg" alt="">
                    <p>Registro de acudientes</p>
                </div>
                <div class="opcion opcionSel" namespace="Menú Principal">
                    <img src="../logos/MatriculaSel.svg" alt="">
                    <p>Asignaturas</p>
                </div>
            </div>
        </section>
        <section class="principal px-4 pt-4" namespace="PRINCIPAL">
            <div class="d-flex justify-content-between usuario">
                <h2 class="mb-0 d-flex align-items-center">Tablero de administrador</h2>
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">¡Bienvenido al Tablero de Administrador!</h5>
                    <button class="ms-3 btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#configuracion">Configuración</button>
                    <button class="ms-3 btn btn-danger" onclick="cerrarSesion()">Cerrar sesión</button>
                </div>
            </div>
            <div class="hr">
                <hr>
            </div>
            <div class="py-3 border contenido px-4" style="overflow-y:scroll;">
                <h3 class="text-center mb-4">Asignaturas y grupos</h3>
                <div class="card mb-3">
                    <div class="card-header">
                        Añadir asignatura
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between w-100">
                            <div class="w-50">
                                <label for="">Nombre de asignatura</label>
                                <input class="form-control" type="text" name="nombre" id="nombre">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Grupo</label>
                                <select class="form-select" name="grupo" id="grupo">
                                    <?php include('funciones/grupo.php'); ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-success ms-3 h-100" onclick="addAsignatura()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        Añadir grupo
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between w-100">
                            <div class="w-50">
                                <label for="">Nombre de grupo</label>
                                <input class="form-control" type="text" name="nomGrupo" id="nomGrupo">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Grado</label>
                                <select class="form-select" name="grado" id="grado">
                                    <?php include('funciones/grado.php'); ?>
                                </select>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-success ms-3 h-100" onclick="addGrupo()">Guardar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">Grupos</div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nombre del grupo</th>
                                        <th>Nombre del grado</th>
                                        <th>Comandos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include_once('funciones/listaGrupo.php'); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Asignaturas</div>
                    <div class="card-body">
                        <div>
                            <table class="table">
                                <thead>
                                    <tr class="text-center">
                                        <th>Nombre de la asignatura</th>
                                        <th>Nombre del grupo</th>
                                        <th>Comandos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php include_once('funciones/listaAsignatura.php'); ?>
                                </tbody>
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
            <div class="modal fade" id="editarGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Editar grupo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between w-100">
                                <div class="w-50">
                                    <label for="">Nombre del grupo</label>
                                    <input class="form-control" type="text" name="nombreModal" id="nombreModal">
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Grado</label>
                                    <select class="form-select" name="gradoModal" id="gradoModal">
                                        <?php include('funciones/grado.php'); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="enviarActualizacionGrupo btn btn-primary"
                                onclick="enviarActualizacionGrupo(this.id)">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="eliminarGrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar grupo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="h6" id="eliminarConfirmText"></h6>
                            <select class="form-select" name="grupoRModal" id="grupoRModal"></select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="eliminarDocente btn btn-danger"
                                onclick="eliminarGrupo(this.id)">Eliminar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="editarAsignatura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Editar asignatura</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between w-100">
                                <div class="w-50">
                                    <label for="">Nombre de la asignatura</label>
                                    <input class="form-control" type="text" name="nombreModalAsig" id="nombreModalAsig">
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Grupo</label>
                                    <select class="form-select" name="grupoModal" id="grupoModal">
                                        <?php include('funciones/grupo.php'); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="enviarActualizacionAsignatura btn btn-primary"
                                onclick="enviarActualizacionAsignatura(this.id)">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="eliminarAsignatura" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar asignatura</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="h6" id="eliminarConfirmTextAsig"></h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="eliminarAsignatura btn btn-danger"
                                onclick="eliminarAsignatura(this.id)">Eliminar</button>
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