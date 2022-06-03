<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT ASIGNATURA.nombre AS Asignatura, GRUPO.nombre_grupo AS Grupo, ASIGNATURA.cod_asignatura AS Cod FROM ASIGNATURA INNER JOIN GRUPO ON ASIGNATURA.cod_grupo = GRUPO.cod_grupo;");
ob_start();
while ($row = $sql->fetch()) {
    ?>
    <tr class="text-center align-middle">
        <td><?php echo $row['Asignatura']; ?></td>
        <td><?php echo $row['Grupo']; ?></td>
        <td>
            <button class="btn btn-primary editarModalAsignatura" id="<?php echo $row['Cod']; ?>" data-bs-toggle="modal" data-bs-target="#editarAsignatura">Editar</button>
            <button class="btn btn-danger eliminarModalAsignatura" id="<?php echo $row['Cod']; ?>" data-bs-toggle="modal" data-bs-target="#eliminarAsignatura">Eliminar</button>
        </td>
    </tr>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>