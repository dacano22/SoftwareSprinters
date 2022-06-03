<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $grupo = $_POST['data1'];

    $sql = $conn->query("SELECT * FROM ESTUDIANTE WHERE cod_grupo = ".$grupo.";");
    ob_start();
    ?>
    <option value="0">Seleccionar</option>
    <?php
    while ($row = $sql->fetch()) {
        ?>
        <option value="<?php echo $row['cod_estudiante']; ?>">
            <?php echo $row['nombre']; ?>
        </option>
        <?php
    }
    
    $getHTML = ob_get_clean();
    echo $getHTML;
}

?>