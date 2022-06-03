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
                <div class="opcion opcionSel" namespace="Menú Principal">
                    <img src="../logos/EstudiantesSel.svg" alt="">
                    <p>Registro de docentes</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='acudientes.php'">
                    <img src="../logos/Estudiantes.svg" alt="">
                    <p>Registro de acudientes</p>
                </div>
                <div class="opcion cursor-pointer" namespace="Menú Principal"
                    onclick="window.location.href='asignaturas.php'">
                    <img src="../logos/Matricula.svg" alt="">
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
                <h3 class="text-center mb-4">Registro de docentes</h3>
                <div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100">
                            <div class="w-50">
                                <label for="">Nombre del docente</label>
                                <input class="form-control" type="text" name="nombre" id="nombre">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Género</label>
                                <select class="form-select" name="genero" id="genero">
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Masculino</option>
                                    <option value="2">Femenino</option>
                                </select>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Estado</label>
                                <select class="form-select" name="estado" id="estado">
                                    <option value="0">Seleccionar</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Inactivo</option>
                                </select>
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Documento de identidad</label>
                                <input class="form-control" name="documento" id="documento">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">Fecha de nacimiento</label>
                                <input class="form-control" type="date" name="fNacimiento" id="fNacimiento">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Fecha de ingreso</label>
                                <input class="form-control" type="date" name="fIngreso" id="fIngreso">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">EPS</label>
                                <input class="form-control" type="text" name="eps" id="eps">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">ARL</label>
                                <input class="form-control" type="text" name="arl" id="arl">
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">Dirección de correo electrónico</label>
                                <input class="form-control" name="correo" id="correo">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Dirección de residencia</label>
                                <input class="form-control" name="direccion" id="direccion">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Grado</label>
                                <select class="form-select" name="grado" id="grado">
                                    <?php include('funciones/grado.php'); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="my-3 d-flex justify-content-center">
                        <button class="btn btn-success me-3" onclick="registroDocente()">Enviar</button>
                        <button class="btn btn-danger" onclick="limpiarDocente()">Limpiar</button>
                    </div>
                    <div class="card">
                        <div class="card-header">Docentes</div>
                        <div class="card-body">
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Identificación</th>
                                            <th>Nombre completo</th>
                                            <th>Grupo</th>
                                            <th>Comandos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include_once('funciones/docente.php'); ?>
                                    </tbody>
                                </table>
                            </div>
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
            <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Editar docente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="d-flex justify-content-between w-100">
                                <div class="w-50">
                                    <label for="">Nombre del docente</label>
                                    <input class="form-control" type="text" name="nombreModal" id="nombreModal">
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Género</label>
                                    <select class="form-select" name="generoModal" id="generoModal">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenino</option>
                                    </select>
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Estado</label>
                                    <select class="form-select" name="estadoModal" id="estadoModal">
                                        <option value="0">Seleccionar</option>
                                        <option value="1">Activo</option>
                                        <option value="2">Inactivo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-3">
                                <div class="w-50">
                                    <label for="">Fecha de nacimiento</label>
                                    <input class="form-control" type="date" name="fNacimientoModal" id="fNacimientoModal" required>
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Fecha de ingreso</label>
                                    <input class="form-control" type="date" name="fIngresoModal" id="fIngresoModal" required>
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">EPS</label>
                                    <input class="form-control" type="text" name="epsModal" id="epsModal">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-3">
                                <div class="w-50">
                                    <label for="">Documento de identidad</label>
                                    <input class="form-control" name="documentoModal" id="documentoModal">
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">ARL</label>
                                    <input class="form-control" type="text" name="arlModal" id="arlModal">
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Grado</label>
                                    <select class="form-select" name="gradoModal" id="gradoModal">
                                        <?php include('funciones/grado.php'); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between w-100 mt-3">
                                <div class="w-50">
                                    <label for="">Dirección de correo electrónico</label>
                                    <input class="form-control" name="correoModal" id="correoModal">
                                </div>
                                <div class="w-50 ms-3">
                                    <label for="">Dirección de residencia</label>
                                    <input class="form-control" name="direccionModal" id="direccionModal">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="enviarActualizacion btn btn-primary"
                                onclick="enviarActualizacionDocente(this.id)">Actualizar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar docente</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="h6" id="eliminarConfirmText"></h6>
                            <label class="mb-2">Docente de reemplazo</label>
                            <select class="form-select" name="docenteRModal" id="docenteRModal"></select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="eliminarDocente btn btn-danger"
                                onclick="eliminarDocente(this.id)">Eliminar</button>
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