<?php
session_start();

require('../../../../funciones/conexion.php');

if (!isset($_SESSION['Rol'])) {
    header("location:../../loginAD");
} else {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Schedule APP</title>
    <link rel="shortcut icon" href="../../../favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="../../../../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../../../../fuentes/fuentes.css">
</head>

<div class="d-flex justify-content-center p-4 bg-light" id="imprimir" style="display: ye !important;">
    <div style="width: 21.59cm; height: 26.4cm;" class="bg-white border shadow-sm rounded p-3 position-relative">
        <h3 class="h3 text-center mt-4"><b>INFORME DE SEGUIMIENTO</b></h3>
        <table class="table table-striped mt-5 border w-100">
            <thead class="text-center">
                <tr>
                    <th>Nombre de estudiante</th>
                    <th>Nombre de acudiente</th>
                    <th>Grado</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr>
                    <td id="nombreEstudiante"></td>
                    <td id="nombreAcudiente"></td>
                    <td id="grado"></td>
                </tr>
            </tbody>
        </table>
        <div class="card mt-5">
            <div class="card-header">
                Anotaciones
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>Fecha de anotación</th>
                            <th>Asunto</th>
                            <th>Novedad</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="anotaciones"></tbody>
                </table>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                Actividades
            </div>
            <div class="card-body">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha de creación</th>
                            <th>Fecha de entrega</th>
                        </tr>
                    </thead>
                    <tbody class="text-center" id="actividades"></tbody>
                </table>
            </div>
        </div>
        <img class="position-absolute bottom-0 start-0 ms-3 mb-3" src="../../../../logos/logo.png" alt="" width="300">
    </div>
</div>

<script>
    document.getElementById('nombreEstudiante').innerHTML = sessionStorage.getItem("nombre");
    document.getElementById('nombreAcudiente').innerHTML = sessionStorage.getItem("acudiente");
    document.getElementById('grado').innerHTML = sessionStorage.getItem("grado");
    document.getElementById('anotaciones').innerHTML = sessionStorage.getItem("anotaciones");
    document.getElementById('actividades').innerHTML = sessionStorage.getItem("actividades");
</script>

<script type="text/javascript" src="jQuery.print.min.js"></script>
<script type="text/javascript" src="html2pdf.bundle.min.js"></script>
<script>
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
</script>

<script>
    setTimeout(function() {
        window.close();
    }, 1000);
</script>

<?php
}

$getHTML = ob_get_clean();

echo $getHTML;
?>