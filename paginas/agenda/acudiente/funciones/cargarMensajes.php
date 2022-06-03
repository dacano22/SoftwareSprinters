<?php

require_once('../../../../funciones/conexion.php');

$texto = "<b>Iniciando chat...</b><br>";

$sql = $conn->query("SELECT * FROM MENSAJERIA;");

while ($row = $sql->fetch()) {
    $texto = $texto." ( ".$row['fecha']." ".$row['hora'].") ".$row['remitente']."<br>".$row['mensaje']."<br>";
}

echo $texto;

?>