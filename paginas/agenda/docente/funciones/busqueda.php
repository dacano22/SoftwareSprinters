<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $documento = $_POST['data1'];
    $filtro = $_POST['data2'];

    if ($filtro == 'estudiante') {
        $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE documento = '".$documento."';");
        ob_start();
        while ($row = $sql->fetch()) {
            $grupo = $conn->query("SELECT nombre_grupo, cod_grado FROM GRUPO WHERE cod_grupo = '".$row['cod_grupo']."';");
            $rowG = $grupo->fetch();
            $acudiente = $conn->query("SELECT nombre FROM ACUDIENTE WHERE cod_acudiente = '".$row['cod_acudiente']."';");
            $rowA = $acudiente->fetch();
            $grado = $conn->query("SELECT grado FROM GRADO WHERE cod_grado = '".$rowG['cod_grado']."';");
            $rowGra = $grado->fetch();
            ?>
            <tr class="align-middle">
                <td><?php echo $row['documento']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $rowA['nombre']; ?></td>
                <td><?php echo $rowG['nombre_grupo']; ?></td>
                <td><?php echo $rowGra['grado']; ?></td>
                <td>
                    <button class="btn btn-primary">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <?php
        }
    } else if ($filtro == 'acudiente') {
        $acudiente = $conn->query("SELECT cod_acudiente FROM ACUDIENTE WHERE cedula_acudiente = '".$documento."';");
        $ac = $acudiente->fetch();

        if ($acudiente->rowCount() > 0) {
            $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE cod_acudiente = '".$ac['cod_acudiente']."';");
            ob_start();
            while ($row = $sql->fetch()) {
                $grupo = $conn->query("SELECT nombre_grupo, cod_grado FROM GRUPO WHERE cod_grupo = '".$row['cod_grupo']."';");
                $rowG = $grupo->fetch();
                $acudiente = $conn->query("SELECT nombre FROM ACUDIENTE WHERE cod_acudiente = '".$row['cod_acudiente']."';");
                $rowA = $acudiente->fetch();
                $grado = $conn->query("SELECT grado FROM GRADO WHERE cod_grado = '".$rowG['cod_grado']."';");
                $rowGra = $grado->fetch();
                ?>
                <tr class="align-middle">
                    <td><?php echo $row['documento']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $rowA['nombre']; ?></td>
                    <td><?php echo $rowG['nombre_grupo']; ?></td>
                    <td><?php echo $rowGra['grado']; ?></td>
                    <td>
                        <button class="btn btn-primary">Editar</button>
                        <button class="btn btn-danger">Eliminar</button>
                    </td>
                </tr>
                <?php
            }
        }
    } else if ($filtro == 'grupo') {
        $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE cod_grupo = '".$documento."';");
        ob_start();
        while ($row = $sql->fetch()) {
            $grupo = $conn->query("SELECT nombre_grupo, cod_grado FROM GRUPO WHERE cod_grupo = '".$row['cod_grupo']."';");
            $rowG = $grupo->fetch();
            $acudiente = $conn->query("SELECT nombre FROM ACUDIENTE WHERE cod_acudiente = '".$row['cod_acudiente']."';");
            $rowA = $acudiente->fetch();
            $grado = $conn->query("SELECT grado FROM GRADO WHERE cod_grado = '".$rowG['cod_grado']."';");
            $rowGra = $grado->fetch();
            ?>
            <tr class="align-middle">
                <td><?php echo $row['documento']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $rowA['nombre']; ?></td>
                <td><?php echo $rowG['nombre_grupo']; ?></td>
                <td><?php echo $rowGra['grado']; ?></td>
                <td>
                    <button class="btn btn-primary">Editar</button>
                    <button class="btn btn-danger">Eliminar</button>
                </td>
            </tr>
            <?php
        }
    }

    $getHTML = ob_get_clean();
    echo $getHTML;
}

?>