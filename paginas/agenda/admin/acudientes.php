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
                <div class="opcion opcionSel" namespace="Menú Principal">
                    <img src="../logos/EstudiantesSel.svg" alt="">
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
                <h3 class="text-center mb-4">Registro de acudientes</h3>
                <div>
                    <div class="w-100">
                        <div class="d-flex justify-content-between w-100">
                            <div class="w-50">
                                <label for="">Nombre del acudiente</label>
                                <input class="form-control" type="text" name="nombre" id="nombre">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Documento de identidad</label>
                                <input class="form-control" type="text" name="documento" id="documento">
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
                                <label for="">Fecha de nacimiento</label>
                                <input class="form-control" type="date" name="fNacimiento" id="fNacimiento" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between w-100 mt-3">
                            <div class="w-50">
                                <label for="">Parentesco</label>
                                <input class="form-control" type="text" name="parentesco" id="parentesco">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Telefono</label>
                                <input class="form-control" type="text" name="telefono" id="telefono">
                            </div>
                            <div class="w-50 ms-3">
                                <label for="">Correo</label>
                                <input class="form-control" type="text" name="correo" id="correo">
                            </div>
                        </div>
                        <div class="my-3 d-flex justify-content-center">
                            <button class="btn btn-success me-3" onclick="registroAcudiente()">Enviar</button>
                            <button class="btn btn-danger" onclick="limpiarAcudiente()">Limpiar</button>
                        </div>
                        <div class="card">
                            <div class="card-header">Acudientes</div>
                            <div class="card-body">
                                <div>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Identificación</th>
                                                <th>Nombre completo</th>
                                                <th>Estudiante a cargo</th>
                                                <th>Correo electrónico</th>
                                                <th>Comandos</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include_once('funciones/acudiente.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                <div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Editar acudiente</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex justify-content-between w-100 mb-2">
                                    <div class="w-50">
                                        <label for="">Nombre del acudiente</label>
                                        <input class="form-control" type="text" name="nombreModal" id="nombreModal">
                                    </div>
                                    <div class="w-50 ms-3">
                                        <label for="">Documento de identidad</label>
                                        <input class="form-control" type="text" name="documentoModal" id="documentoModal">
                                    </div>
                                    <div class="w-50 ms-3">
                                        <label for="">Género</label>
                                        <select class="form-select" name="generoModal" id="generoModal">
                                            <option value="0">Seleccionar</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between w-100 mb-2">
                                    <div class="w-50">
                                        <label for="">Parentesco</label>
                                        <input class="form-control" type="text" name="parentescoModal" id="parentescoModal">
                                    </div>
                                    <div class="w-50 ms-3">
                                        <label for="">Telefono</label>
                                        <input class="form-control" type="text" name="telefonoModal" id="telefonoModal">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between w-100">
                                    <div class="w-50">
                                        <label for="">Fecha de nacimiento</label>
                                        <input class="form-control" type="date" name="fNacimientoModal" id="fNacimientoModal"
                                            required>
                                    </div>
                                    <div class="w-50 ms-3">
                                        <label for="">Correo</label>
                                        <input class="form-control" type="text" name="correoModal" id="correoModal">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="enviarActualizacion btn btn-primary"
                                    onclick="enviarActualizacionAcudiente(this.id)">Actualizar</button>
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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6 class="h6" id="eliminarConfirmText"></h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="eliminarDocente btn btn-danger"
                                    onclick="eliminarAcudiente(this.id)">Eliminar</button>
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