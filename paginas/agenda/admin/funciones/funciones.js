function cerrarSesion() {
    $.ajax({
        type: "POST",
        url: 'funciones/logOut.php',
        success: function(data) {
            alert("Sesión cerrada exitosamente");
            window.location.href = "../../loginAD";
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function registroEstudiante() {
    var nombre = $('#nombre').val();
    var genero = $('#genero').find('option:selected').text();
    var estado = $('#estado').find('option:selected').text();
    var fNacimiento = $('#fNacimiento').val();
    var fIngreso = $('#fIngreso').val();
    var eps = $('#eps').val();
    var direccion = $('#direccion').val();
    var acudiente = $('#acudiente').find('option:selected').val();
    var nomPadre = $('#nomPadre').val();
    var nomMadre = $('#nomPadre').val();
    var grupo = $('#grupo').find('option:selected').val();
    var documento = $('#documento').val();

    if (nombre == '' || documento == '' || genero == '0' || estado == 'Seleccionar' || fNacimiento == '' || fIngreso == '' || eps == '' || direccion == '' || acudiente == '0' || nomPadre == '' || nomMadre == '' || grupo == '0') {
        alert("Rellena todos los campos");
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/registroEstudiante.php',
            data: {
                data1: nombre,
                data2: genero,
                data3: estado,
                data4: fNacimiento,
                data5: fIngreso,
                data6: eps,
                data7: direccion,
                data8: acudiente,
                data9: nomPadre,
                data10: nomMadre,
                data11: grupo,
                data12: documento
            },
            success: function(data) {
                alert("Registro de estudiante exitoso");
                window.location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
}

function registroDocente() {
    var nombre = $('#nombre').val();
    var genero = $('#genero').find('option:selected').text();
    var estado = $('#estado').find('option:selected').text();
    var grado = $('#grado').find('option:selected').val();
    var fNacimiento = $('#fNacimiento').val();
    var fIngreso = $('#fIngreso').val();
    var eps = $('#eps').val();
    var arl = $('#arl').val();
    var correo = $('#correo').val();
    var direccion = $('#direccion').val();
    var documento = $('#documento').val();

    if (nombre == '' || genero == '' || estado == '0' || grado == 'Seleccionar' || fNacimiento == '' || fIngreso == '' || eps == '' || arl == '' || correo == '0' || direccion == '' || documento == '') {
        alert("Rellena todos los campos");
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/registroDocente.php',
            data: {
                data1: nombre,
                data2: genero,
                data3: estado,
                data4: grado,
                data5: fNacimiento,
                data6: fIngreso,
                data7: eps,
                data8: arl,
                data9: correo,
                data10: direccion,
                data11: documento
            },
            success: function(data) {
                alert("Registro de docente exitoso");
                window.location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
}

function registroAcudiente() {
    var nombre = $('#nombre').val();
    var documento = $('#documento').val();
    var genero = $('#genero').find('option:selected').text();
    var fNacimiento = $('#fNacimiento').val();
    var parentesco = $('#parentesco').val();
    var telefono = $('#telefono').val();
    var correo = $('#correo').val();

    if (nombre == '' || documento == '' || genero == '0' || fNacimiento == 'Seleccionar' || parentesco == '' || telefono == '') {
        alert("Rellena todos los campos");
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/registroAcudiente.php',
            data: {
                data1: nombre,
                data2: documento,
                data3: genero,
                data4: fNacimiento,
                data5: parentesco,
                data6: telefono,
                data7: correo
            },
            success: function(data) {
                alert("Registro de acudiente exitoso");
                window.location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
}

function limpiarEstudiante() {
    $('#nombre').val('');
    $('#documento').val('');
    $('#genero').val('0');
    $('#estado').val('0');
    $('#fNacimiento').val('');
    $('#fIngreso').val('');
    $('#eps').val('');
    $('#direccion').val('');
    $('#acudiente').val('0');
    $('#nomPadre').val('');
    $('#nomMadre').val('');
    $('#grupo').val('0');
}

function limpiarDocente() {
    $('#nombre').val('');
    $('#documento').val('');
    $('#genero').val('0');
    $('#estado').val('0');
    $('#fNacimiento').val('');
    $('#fIngreso').val('');
    $('#eps').val('');
    $('#arl').val('');
    $('#direccion').val('');
    $('#correo').val('');
    $('#grado').val(0);
}

function limpiarAcudiente() {
    $('#nombre').val('');
    $('#documento').val('');
    $('#genero').val(0);
    $('#fNacimiento').val('');
    $('#parentesco').val('');
    $('#telefono').val('');
    $('#correo').val('');
}

function addAsignatura() {
    var nombre = $('#nombre').val();
    var grupo = $('#grupo').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/addAsignatura.php',
        data: {
            data1: nombre,
            data2: grupo
        },
        success: function(data) {
            alert("Registro de asignatura exitoso");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function addGrupo() {
    var nombre = $('#nomGrupo').val();
    var grado = $('#grado').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/addGrupo.php',
        data: {
            data1: nombre,
            data2: grado
        },
        success: function(data) {
            alert("Registro de grupo exitoso");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function codigoRC() {
    var token = Math.floor(100000 + Math.random() * 900000);

    $.ajax({
        type: "POST",
        url: 'funciones/enviarToken.php',
        data: {
            data1: token
        },
        success: function(data) {
            alert("Se ha enviado un token de confirmación a tu correo electrónico");
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function cambiarAuth() {
    var token = $('#token').val();
    var authAnt = $('#authAnt').val();
    var authNue = $('#authNue').val();

    $.ajax({
        type: "POST",
        url: 'funciones/cambiarAuth.php',
        data: {
            data1: authAnt,
            data2: authNue,
            data3: token
        },
        success: function(data) {
            if (data == 'No') {
                alert("La información no coincide. Por favor intente de nuevo más tarde");
            } else {
                alert("Se ha hecho el cambio exitosamente");
            }

            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

$(document).on("click", ".editarModalEstudiante", function() {
    var estudiante = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/estudianteInfo.php',
        data: {
            data1: estudiante
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#nombreModal').val(array[0]);
            $('#documentoModal').val(array[1]);
            $('#generoModal').val(array[2]);
            $('#estadoModal').val(array[3]);
            $('#fNacimientoModal').val(array[4]);
            $('#fIngresoModal').val(array[5]);
            $('#epsModal').val(array[6]);
            $('#direccionModal').val(array[7]);
            $('#acudienteModal').val(array[8]);
            $('#nomPadreModal').val(array[9]);
            $('#nomMadreModal').val(array[10]);
            $('#grupoModal').val(array[11]);
            $('.enviarActualizacion').attr('id', estudiante);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".eliminarModalEstudiante", function() {
    var estudiante = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/estudianteInfo.php',
        data: {
            data1: estudiante
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#eliminarConfirmText').html("¿Estás seguro que deseas eliminar al estudiante " + array[0] + "?")

            $('.eliminarEstudiante').attr('id', estudiante);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".editarModalDocente", function() {
    var docente = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/docenteInfo.php',
        data: {
            data1: docente
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#nombreModal').val(array[0]);
            $('#documentoModal').val(array[1]);
            $('#generoModal').val(array[2]);
            $('#estadoModal').val(array[3]);
            $('#fNacimientoModal').val(array[4]);
            $('#fIngresoModal').val(array[5]);
            $('#epsModal').val(array[6]);
            $('#arlModal').val(array[7]);
            $('#correoModal').val(array[8]);
            $('#direccionModal').val(array[9]);
            $('#gradoModal').val(array[10]);
            $('.enviarActualizacion').attr('id', docente);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".eliminarModalDocente", function() {
    var docente = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/docenteInfo.php',
        data: {
            data1: docente
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#eliminarConfirmText').html("¿Estás seguro que deseas eliminar al docente " + array[0] + "?")

            $('.eliminarDocente').attr('id', docente);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });

    $.ajax({
        type: "POST",
        url: 'funciones/listarDocente.php',
        data: {
            data1: docente
        },
        success: function(data) {
            $('#docenteRModal').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".editarModalAcudiente", function() {
    var acudiente = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/acudienteInfo.php',
        data: {
            data1: acudiente
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#nombreModal').val(array[0]);
            $('#generoModal').val(array[1]);
            $('#fNacimientoModal').val(array[2]);
            $('#parentescoModal').val(array[3]);
            $('#documentoModal').val(array[4]);
            $('#correoModal').val(array[5]);
            $('#telefonoModal').val(array[6]);
            $('.enviarActualizacion').attr('id', acudiente);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".eliminarModalAcudiente", function() {
    var acudiente = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/acudienteInfo.php',
        data: {
            data1: acudiente
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#eliminarConfirmText').html("¿Estás seguro que deseas eliminar al acudiente " + array[0] + "? Este se eliminará junto a los estudiantes que tenga registrados")

            $('.eliminarDocente').attr('id', acudiente);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".editarModalGrupo", function() {
    var grupo = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/grupoInfo.php',
        data: {
            data1: grupo
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#nombreModal').val(array[0]);
            $('#gradoModal').val(array[1]);
            $('.enviarActualizacionGrupo').attr('id', grupo);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".eliminarModalGrupo", function() {
    var grupo = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/grupoInfo.php',
        data: {
            data1: grupo
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#eliminarConfirmText').html("¿Estás seguro que deseas eliminar el grupo " + array[0] + "? Tendrá que asignar nuevo grupo a los estudiantes")

            $('.eliminarDocente').attr('id', grupo);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });

    $.ajax({
        type: "POST",
        url: 'funciones/listarGrupoModal.php',
        data: {
            data1: grupo
        },
        success: function(data) {
            $('#grupoRModal').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".editarModalAsignatura", function() {
    var asignatura = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/asignaturaInfo.php',
        data: {
            data1: asignatura
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#nombreModalAsig').val(array[0]);
            $('#grupoModal').val(array[1]);
            $('.enviarActualizacionAsignatura').attr('id', asignatura);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).on("click", ".eliminarModalAsignatura", function() {
    var asignatura = $(this).attr('id');

    $.ajax({
        type: "POST",
        url: 'funciones/asignaturaInfo.php',
        data: {
            data1: asignatura
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#eliminarConfirmTextAsig').html("¿Estás seguro que deseas eliminar la asignatura " + array[0] + "?")

            $('.eliminarAsignatura').attr('id', asignatura);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

function enviarActualizacionEstudiante(id) {
    var nombre = $('#nombreModal').val();
    var documento = $('#documentoModal').val();
    var genero = $('#generoModal').find('option:selected').text();
    var estado = $('#estadoModal').find('option:selected').text();
    var fNacimiento = $('#fNacimientoModal').val();
    var fIngreso = $('#fIngresoModal').val();
    var eps = $('#epsModal').val();
    var direccion = $('#direccionModal').val();
    var acudiente = $('#acudienteModal').val();
    var nomPadre = $('#nomPadreModal').val();
    var nomMadre = $('#nomMadreModal').val();
    var grupo = $('#grupoModal').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/actualizarEstudiante.php',
        data: {
            data1: nombre,
            data2: documento,
            data3: genero,
            data4: estado,
            data5: fNacimiento,
            data6: fIngreso,
            data7: eps,
            data8: direccion,
            data9: acudiente,
            data10: nomPadre,
            data11: nomMadre,
            data12: grupo,
            data13: id
        },
        success: function(data) {
            alert("Datos actualizados correctamente");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function enviarActualizacionDocente(id) {
    var nombre = $('#nombreModal').val();
    var documento = $('#documentoModal').val();
    var genero = $('#generoModal').find('option:selected').text();
    var estado = $('#estadoModal').find('option:selected').text();
    var fNacimiento = $('#fNacimientoModal').val();
    var fIngreso = $('#fIngresoModal').val();
    var eps = $('#epsModal').val();
    var arl = $('#direccionModal').val();
    var grado = $('#gradoModal').find('option:selected').val();
    var correo = $('#correoModal').val();
    var direccion = $('#direccionModal').val();

    $.ajax({
        type: "POST",
        url: 'funciones/actualizarDocente.php',
        data: {
            data1: nombre,
            data2: documento,
            data3: genero,
            data4: estado,
            data5: fNacimiento,
            data6: fIngreso,
            data7: eps,
            data8: arl,
            data9: grado,
            data10: correo,
            data11: direccion,
            data12: id
        },
        success: function(data) {
            alert("Datos actualizados correctamente");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function enviarActualizacionAcudiente(id) {
    var nombre = $('#nombreModal').val();
    var documento = $('#documentoModal').val();
    var genero = $('#generoModal').find('option:selected').text();
    var parentesco = $('#parentescoModal').val();
    var telefono = $('#telefonoModal').val();
    var fNacimiento = $('#fNacimientoModal').val();
    var correo = $('#correoModal').val();

    $.ajax({
        type: "POST",
        url: 'funciones/actualizarAcudiente.php',
        data: {
            data1: nombre,
            data2: documento,
            data3: genero,
            data4: parentesco,
            data5: telefono,
            data6: fNacimiento,
            data7: correo,
            data8: id
        },
        success: function(data) {
            alert("Datos actualizados correctamente");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function enviarActualizacionGrupo(id) {
    var nombre = $('#nombreModal').val();
    var grado = $('#gradoModal').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/actualizarGrupo.php',
        data: {
            data1: nombre,
            data2: grado,
            data3: id
        },
        success: function(data) {
            alert("Datos actualizados correctamente");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function enviarActualizacionAsignatura(id) {
    var nombre = $('#nombreModalAsig').val();
    var grupo = $('#grupoModal').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/actualizarAsignatura.php',
        data: {
            data1: nombre,
            data2: grupo,
            data3: id
        },
        success: function(data) {
            alert(data);
            //alert("Datos actualizados correctamente");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function eliminarEstudiante(id) {
    $.ajax({
        type: "POST",
        url: 'funciones/eliminarEstudiante.php',
        data: {
            data1: id
        },
        success: function(data) {
            alert("Se ha eliminado el estudiante con éxito");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function eliminarDocente(id) {
    var docenteReemplazo = $('#docenteRModal').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/eliminarDocente.php',
        data: {
            data1: id,
            data2: docenteReemplazo
        },
        success: function(data) {
            alert("Se ha eliminado el docente con éxito");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function eliminarAcudiente(id) {
    $.ajax({
        type: "POST",
        url: 'funciones/eliminarAcudiente.php',
        data: {
            data1: id
        },
        success: function(data) {
            alert("Se ha eliminado el docente con éxito");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function eliminarGrupo(id) {
    var grupoReemplazo = $('#grupoRModal').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/eliminarGrupo.php',
        data: {
            data1: id,
            data2: grupoReemplazo
        },
        success: function(data) {
            alert("Se ha eliminado el grupo con éxito");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function eliminarAsignatura(id) {
    $.ajax({
        type: "POST",
        url: 'funciones/eliminarAsignatura.php',
        data: {
            data1: id
        },
        success: function(data) {
            alert("Se ha eliminado la asignatura con éxito");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}