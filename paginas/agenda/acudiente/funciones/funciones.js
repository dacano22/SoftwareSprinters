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

$('#nombre').on("change", function() {
    var estudiante = $('#nombre').find('option:selected').val();

    $.ajax({
        type: "POST",
        url: 'funciones/datosEstudiante.php',
        data: {
            data1: estudiante
        },
        success: function(data) {
            var array = JSON.parse(data);

            $('#genero').val(array[0]);
            $('#estado').val(array[1]);
            $('#grado').val(array[2]);
            $('#fNacimiento').val(array[3]);
            $('#fIngreso').val(array[4]);
            $('#eps').val(array[5]);
            $('#direccion').val(array[6]);
            $('#nombreAcudiente').val(array[7]);
            $('#nomPadre').val(array[8]);
            $('#nomMadre').val(array[9]);
            $('#cuerpoAnotaciones').html(array[10]);
            $('#cuerpoActividades').html(array[11]);
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
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

function generarPDF() {
    var nombre = $('#nombre').find('option:selected').text();

    if (nombre != 'Seleccionar') {
        var acudiente = $('#nombreAcudiente').val();
        var grado = $('#grado').val();

        var anotaciones = $('#cuerpoAnotaciones').html();
        var actividades = $('#cuerpoActividades').html();

        sessionStorage.setItem("nombre", nombre);
        sessionStorage.setItem("acudiente", acudiente);
        sessionStorage.setItem("grado", grado);
        sessionStorage.setItem("anotaciones", anotaciones);
        sessionStorage.setItem("actividades", actividades);
        window.open("funciones/reporte.php", "_blank");
    } else {
        alert("Selecciona un estudiante");
    }
}

function PDF() {
    const element = document.getElementById("imprimir");

    html2pdf(element, {
        margin: 1,
        filename: 'Seguimiento',
        image: { type: 'jpeg', quality: 0.95 },
        html2canvas: { scale: 1, logging: true, dpi: 300, letterRendering: true, useCORS: true },
        jsPDF: {
            unit: 'mm',
            format: 'letter',
            orientation: 'portrait'
        }
    });
}