<?php

require_once('../../../../funciones/conexion.php');

if (isset($_POST['data1'])) {
    $sql = $conn->query("SELECT * FROM GRUPO WHERE cod_grupo <> '".$_POST['data1']."';");
    ob_start();
    ?>
    <option value="0">Seleccionar</option>
    <?php
    while ($row = $sql->fetch()) {
        ?>
        <option value="<?php echo $row['cod_grupo']; ?>">
            <?php echo $row['nombre_grupo']; ?>
        </option>
        <?php
    }
    
    $getHTML = ob_get_clean();
    echo $getHTML;
}

?>