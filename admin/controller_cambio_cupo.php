<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');

$cuviculo = $_POST['cuviculo'];
$estado_espacio = "OCUPADO";

date_default_timezone_set("America/caracas");
$fechaHora = date("Y-m-d h:i:s");
//echo $nombres."-".$email."-".$password_user;

$sql = "UPDATE tb_mapeos SET estado_espacio = '$estado_espacio', fyh_actualizacion = '$fechaHora' WHERE nro_espacio = $cuviculo";


if ($con->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
    
    // Agregar JavaScript para recargar la página después de que se muestre el mensaje
    echo "<script>window.setTimeout(function(){ window.location.reload(); }, 2000);</script>";
} else {
    echo "Error al guardar los datos: " . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();
?>
