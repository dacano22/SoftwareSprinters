<?php

require_once('../../../funciones/conexion.php');

$sql = $conn->query("SELECT * FROM GRADO;");
ob_start();
?>
<option value="0">Seleccionar</option>
<?php
while ($row = $sql->fetch()) {
    ?>
    <option value="<?php echo $row['cod_grado']; ?>">
        <?php echo $row['grado']; ?>
    </option>
    <?php
}

$getHTML = ob_get_clean();
echo $getHTML;

?>