<?php

require_once('../../../funciones/conexion.php');

//$sql = $conn->query("SELECT DOCENTE.*, GRUPO.nombre_grupo AS Grupo FROM DOCENTE INNER JOIN GRADO ON DOCENTE.cod_docente = GRADO.cod_grado INNER JOIN GRUPO ON GRADO.cod_grado = GRUPO.cod_grado;");
$sql = $conn->query("SELECT * FROM DOCENTE;");
ob_start();
while ($row = $sql->fetch()) {
    ?>
    <tr class="text-center align-middle" value="<?php echo $row['cod_docente']; ?>">
        <td><?php echo $row['cedula_docente']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['correo_docente']; ?></td>
        <td>
            <button class="btn btn-primary editarModalDocente" id="<?php echo $row['cod_docente']; ?>" data-bs-toggle="modal" data-bs-target="#editar">Editar</button>
            <button class="btn btn-danger eliminarModalDocente" id="<?php echo $row['cod_docente']; ?>" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button>
        </td>
    </tr>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>