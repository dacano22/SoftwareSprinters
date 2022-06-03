$(document).ready(function() {
    $('#curso').prop('disabled', 'true');
    $('#estudiante').prop('disabled', 'true');

    $('#asunto').val('');
    $('#observaciones').val('');
});

$("#grado").change(function() {
    var value = $('#grado').find('option:selected').val();

    cleanFields();

    if (value == 0) {
        $('#curso').attr('disabled', 'true');
        $('#estudiante').attr('disabled', 'true');
        $('#curso').html('<option value="0">Seleccionar</option>');
        $('#estudiante').html('<option value="0">Seleccionar</option>');
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/grupoNov.php',
            data: {
                data1: value
            },
            success: function(data) {
                $('#curso').prop('disabled', '');
                $('#curso').html(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
});

$("#curso").change(function() {
    var value = $('#curso').find('option:selected').val();

    cleanFields();

    if (value == 0) {
        $('#estudiante').attr('disabled', 'true');
        $('#estudiante').html('<option value="0">Seleccionar</option>');
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/estudiante.php',
            data: {
                data1: value
            },
            success: function(data) {
                $('#estudiante').prop('disabled', '');
                $('#estudiante').html(data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
});

$("#estudiante").change(function() {
    var value = $('#estudiante').find('option:selected').val();
    var grado = $('#grado').find('option:selected').text().trim();

    if (value == 0) {
        cleanFields()
    } else {
        $.ajax({
            type: "POST",
            url: 'funciones/novedad.php',
            data: {
                data1: value
            },
            success: function(data) {
                var array = JSON.parse(data);

                $('#nombre').val(array[0]);
                $('#documento').val(array[1]);
                $('#genero').val(array[2]);
                $('#estado').val(array[3]);
                $('#fNacimiento').val(array[4]);
                $('#fIngreso').val(array[5]);
                $('#grupo').val(grado);
                $('#eps').val(array[6]);
                $('#direccion').val(array[7]);
                $('#nombreAcudiente').val(array[8]);
                $('#nomPadre').val(array[9]);
                $('#nomMadre').val(array[10]);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status);
            }
        });
    }
});

function cleanFields() {
    $('#nombre').val('');
    $('#genero').val('');
    $('#estado').val('');
    $('#fNacimiento').val('');
    $('#fIngreso').val('');
    $('#grupo').val('');
    $('#eps').val('');
    $('#direccion').val('');
    $('#nombreAcudiente').val('');
    $('#nomPadre').val('');
    $('#nomMadre').val('');
}

function enviarNovedad() {
    var estudiante = $('#estudiante').find('option:selected').val();

    if (estudiante != 0) {
        var asunto = $('#asunto').val();
        var novedad = $('#novedad').find('option:selected').val();
        var observaciones = $('#observaciones').val();
        var correo = $('#envCorreo').is('checked');

        if (asunto != '' && observaciones != '') {
            $.ajax({
                type: "POST",
                url: 'funciones/enviarNov.php',
                data: {
                    data1: estudiante,
                    data2: asunto,
                    data3: novedad,
                    data4: observaciones,
                    data5: correo
                },
                success: function(data) {
                    alert('Se ha enviado la novedad con éxito');
                    window.location.reload();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                }
            });
        } else {
            alert("Escribe un asunto y las observaciones sobre la anotación");
        }
    } else {
        alert("Seleccione un estudiante");
    }
}