<?php

session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');

$cuviculo = $_POST['cuviculo'];
$estado_espacio = "LIBRE";

date_default_timezone_set("America/bogota");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sql = "UPDATE tb_mapeos SET estado_espacio = '$estado_espacio', fyh_actualizacion = '$fechaHora' WHERE nro_espacio = $cuviculo";


if ($con->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";

} else {
    echo "Error al guardar los datos: " . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();




?>