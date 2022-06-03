<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT GRUPO.nombre_grupo AS Grupo, GRADO.grado AS Grado, GRUPO.cod_grupo AS Cod FROM GRUPO INNER JOIN GRADO ON GRUPO.cod_grado = GRADO.cod_grado;");
ob_start();
while ($row = $sql->fetch()) {
    ?>
    <tr class="text-center align-middle">
        <td><?php echo $row['Grupo']; ?></td>
        <td><?php echo $row['Grado']; ?></td>
        <td>
            <button class="btn btn-primary editarModalGrupo" id="<?php echo $row['Cod']; ?>" data-bs-toggle="modal" data-bs-target="#editarGrupo">Editar</button>
            <button class="btn btn-danger eliminarModalGrupo" id="<?php echo $row['Cod']; ?>" data-bs-toggle="modal" data-bs-target="#eliminarGrupo">Eliminar</button>
        </td>
    </tr>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>