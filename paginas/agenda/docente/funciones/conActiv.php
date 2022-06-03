<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $grupo = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ACTIVIDAD WHERE cod_grupo = ".$grupo.";");
    ob_start();
    while ($row = $sql->fetch()) {
        $gra = $conn->query("SELECT GRADO.grado AS Grado, GRADO.cod_grado AS Cod, GRUPO.nombre_grupo AS Grupo FROM GRADO INNER JOIN GRUPO ON GRUPO.cod_grado = GRADO.cod_grado WHERE GRUPO.cod_grupo = ".$grupo."");
        $rowGra = $gra->fetch();
        ?>
        <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $rowGra['Grado']; ?></td>
            <td><?php echo $rowGra['Grupo']; ?></td>
            <td><?php echo $row['descripcion']; ?></td>
            <td><?php echo $row['fecha_creacion']; ?></td>
            <td><?php echo $row['fecha_entrega']; ?></td>
        </tr>
        <?php
    }
    
    $getHTML = ob_get_clean();
    echo $getHTML;
}

?>