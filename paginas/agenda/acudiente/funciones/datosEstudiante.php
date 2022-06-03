<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    session_start();

    $nombre = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE cod_estudiante = ".$nombre.";");
    $row = $sql->fetch();

    $sql = $conn->query("SELECT GRADO.grado AS grado FROM GRADO INNER JOIN GRUPO ON GRADO.cod_grado = GRUPO.cod_grado WHERE GRUPO.cod_grupo = '".$row['cod_grupo']."';");
    $grado = $sql->fetch();

    $sql = $conn->query("SELECT nombre FROM ACUDIENTE WHERE cedula_acudiente = '".$_SESSION['Documento']."';");
    $acudiente = $sql->fetch();

    $genero = $row['genero'];
    $estado = $row['estado'];
    $grado = $grado['grado'];
    $fNacimiento = $row['fecha_nacimiento'];
    $fIngreso = $row['fecha_ingreso'];
    $eps = $row['eps'];
    $direccion = $row['direccion_residencia'];
    $acudiente = $acudiente['nombre'];
    $nPadre = $row['nombre_padre'];
    $nMadre = $row['nombre_padre'];

    $sql = $conn->query("SELECT * FROM ANOTACION WHERE cod_estudiante = '".$nombre."';");
    ob_start();
    while ($row = $sql->fetch()) {
        $nov = $conn->query("SELECT novedad FROM NOVEDAD WHERE cod_novedad = '".$row['cod_novedad']."';");
        $novedad = $nov->fetch();
        ?>
        <tr>
            <td><?php echo $row['fecha_anotacion']; ?></td>
            <td><?php echo $row['asunto']; ?></td>
            <td><?php echo $novedad['novedad']; ?></td>
        </tr>
        <?php
    }
    $getHTML = ob_get_clean();

    $sql = $conn->query("SELECT ACTIVIDAD.* FROM ACTIVIDAD INNER JOIN GRUPO ON ACTIVIDAD.cod_grupo = GRUPO.cod_grupo INNER JOIN ESTUDIANTE ON ESTUDIANTE.cod_grupo = GRUPO.cod_grupo WHERE ESTUDIANTE.cod_estudiante = '".$nombre."';");
    ob_start();
    while ($row = $sql->fetch()) {
        ?>
        <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['fecha_creacion']; ?></td>
            <td><?php echo $row['fecha_entrega']; ?></td>
        </tr>
        <?php
    }
    $actividades = ob_get_clean();
    
    $phpArray = array($genero, $estado, $grado, $fNacimiento, $fIngreso, $eps, $direccion, $acudiente, $nPadre, $nMadre, $getHTML, $actividades);
    $arrayToJS = json_encode($phpArray);
    echo $arrayToJS;
}

?>