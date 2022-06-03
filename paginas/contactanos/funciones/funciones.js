function correo() {
    var nombre = capitalizeFL($('#nombre').val());
    var apellido = capitalizeFL($('#apellido').val());
    var asunto = capitalizeFL($('#asunto').val());
    var email = $('#email').val();
    var mensaje = capitalizeFL($('#mensaje').val());

    $.ajax({
        type: "POST",
        url: 'funciones/correo.php',
        data: {
            data1: nombre,
            data2: apellido,
            data3: asunto,
            data4: email,
            data5: mensaje
        },
        success: function(data) {
            alert("El mensaje fue enviado exitosamente");
            window.location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
        }
    });
}

function capitalizeFL(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}