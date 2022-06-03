<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT ESTUDIANTE.*, ACUDIENTE.nombre AS Acudiente, GRUPO.nombre_grupo AS Grupo FROM ESTUDIANTE INNER JOIN ACUDIENTE ON ESTUDIANTE.cod_acudiente = ACUDIENTE.cod_acudiente INNER JOIN GRUPO ON ESTUDIANTE.cod_grupo = GRUPO.cod_grupo;");
ob_start();
while ($row = $sql->fetch()) {
    ?>
    <tr class="text-center align-middle" value="<?php echo $row['cod_estudiante']; ?>">
        <td><?php echo $row['documento']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['Acudiente']; ?></td>
        <td><?php echo $row['Grupo']; ?></td>
        <td>
            <button class="btn btn-primary editarModalEstudiante" id="<?php echo $row['cod_estudiante']; ?>" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>
            <button class="btn btn-danger eliminarModalEstudiante" id="<?php echo $row['cod_estudiante']; ?>" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button>
        </td>
    </tr>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>