<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT ACUDIENTE.*, ESTUDIANTE.nombre AS NombreEst FROM ACUDIENTE INNER JOIN ESTUDIANTE ON ACUDIENTE.cod_acudiente = ESTUDIANTE.cod_acudiente;");
ob_start();
while ($row = $sql->fetch()) {
    ?>
    <tr class="text-center align-middle" value="<?php echo $row['cod_acudiente']; ?>">
        <td><?php echo $row['cedula_acudiente']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['NombreEst']; ?></td>
        <td><?php echo $row['correo_acudiente']; ?></td>
        <td>
            <button class="btn btn-primary editarModalAcudiente" id="<?php echo $row['cod_acudiente']; ?>" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>
            <button class="btn btn-danger eliminarModalAcudiente" id="<?php echo $row['cod_acudiente']; ?>" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button>
        </td>
    </tr>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>