var radio = '2';
var cuadro = 0;

$('.radio-acudiente').css('display', 'none');
$('.cuadro').css('display', 'none');

function radioButton(mode) {
    if (mode == 'Docente') {
        if ($('.radio-docente').css('display') == 'none') {
            $('.radio-docente').css('display', '');
            if (($('.radio-acudiente').css('display') != 'none')) {
                $('.radio-acudiente').css('display', 'none');
            }
            radio = '2';
        }
    } else if (mode == 'Acudiente') {
        if ($('.radio-acudiente').css('display') == 'none') {
            $('.radio-acudiente').css('display', '');
            if (($('.radio-docente').css('display') != 'none')) {
                $('.radio-docente').css('display', 'none');
            }
            radio = '3';
        }
    }
}

function checkBox() {
    if ($('.cuadro').css('display') == 'none') {
        $('.cuadro').css('display', '');
        cuadro++;
    } else {
        $('.cuadro').css('display', 'none');
        cuadro--;
    }
}

$('#usuario').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        iniciarSesion();
        console.log("aa");
    }
});

$('#auth').keypress(function(event) {
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if (keycode == '13') {
        iniciarSesion();
    }
});

function iniciarSesion() {
    var rol = radio;
    var usr = $('#usuario').val();
    var password = $('#auth').val();

    $.ajax({
        type: "POST",
        url: 'funciones/iniciarSesion.php',
        data: {
            data1: rol,
            data2: usr,
            data3: password
        },
        success: function(data) {
            if (data == 'No') {
                alert('Usuario no encontrado');
            } else {
                if (data == 'Administrador') {
                    window.location.href = "../agenda/admin";
                } else if (data == 'Docente') {
                    window.location.href = "../agenda/docente";
                } else if (data == 'Acudiente') {
                    window.location.href = "../agenda/acudiente";
                }
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function recuperarAuth() {
    var documento = $('#documentoR').val();

    $.ajax({
        type: "POST",
        url: 'funciones/recuperacion.php',
        data: {
            data1: documento
        },
        success: function(data) {
            if (data == 'No') {
                alert("No se encontró usuario en la base de datos");
            } else {
                alert("Correo enviado exitosamente");
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}