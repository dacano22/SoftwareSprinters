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

function busqueda(busqueda) {
    var filtro = busqueda;

    if (busqueda == 'estudiante') {
        busqueda = $('#estudiante').val();
    } else if (busqueda == 'acudiente') {
        busqueda = $('#acudiente').val();
    } else {
        busqueda = $('#grupo').find('option:selected').val();
    }

    $.ajax({
        type: "POST",
        url: 'funciones/busqueda.php',
        data: {
            data1: busqueda,
            data2: filtro
        },
        success: function(data) {
            $('#datosTabla').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function enviarActividad() {
    var titulo = $('#titulo').val();
    var grupo = $('#grupo1').val();
    var fCreacion = $('#fCreacion').val();
    var fEntrega = $('#fEntrega').val();
    var descripcion = $('#descripcion').val();

    if (titulo == '' || grupo == '' || fCreacion == '' || fEntrega == '' || descripcion == '') {
        alert("Rellena todos los campos");
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/envActiv.php',
            data: {
                data1: titulo,
                data2: grupo,
                data3: fCreacion,
                data4: fEntrega,
                data5: descripcion
            },
            success: function(data) {
                alert("Datos registrados exitosamente");
                window.location.reload();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
}

function limpiarActividad() {
    $('#titulo').val('');
    $('#grupo1').val('0');
    $('#fCreacion').val('');
    $('#fEntrega').val('');
    $('#descripcion').val('');
}

function enviarMensaje() {
    var mensaje = $('#mensaje').val();

    $.ajax({
        type: "POST",
        url: 'funciones/mensajeria.php',
        data: {
            mensaje: mensaje
        },
        success: function(data) {
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

$('#grupo').on("change", function() {
    var grupo = $('#grupo').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/conActiv.php',
        data: {
            data1: grupo
        },
        success: function(data) {
            $('#actividades').html(data);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
});

$(document).ready(function() {
    if ($('#chat').html() == 'Chat de Acudientes y Docentes') {
        var interval = 1000; // 1000 = 1 second, 3000 = 3 seconds
        function doAjax() {
            $.ajax({
                type: 'POST',
                url: 'funciones/cargarMensajes.php',
                success: function(data) {
                    $('#cuerpoChat').html(data); // first set the value     
                },
                complete: function(data) {
                    // Schedule the next
                    setTimeout(doAjax, interval);
                }
            });
        }
        setTimeout(doAjax, interval);
    }
});

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