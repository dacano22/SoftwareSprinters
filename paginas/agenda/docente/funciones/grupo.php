<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT * FROM GRUPO;");
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

?>