<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT * FROM NOVEDAD;");
ob_start();
while ($row = $sql->fetch()) {
    ?>
    <option value="<?php echo $row['cod_novedad']; ?>">
        <?php echo $row['novedad']; ?>
    </option>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>