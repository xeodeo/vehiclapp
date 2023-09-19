<?php

session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');

// Obtener los datos del formulario AJAX
$placa = $_POST['placa'];
$nombre_cliente = $_POST['nombre_cliente'];
$telefono = $_POST['telefono'];
$cuviculo = $_POST['cuviculo'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$hora_ingreso = $_POST['hora_ingreso'];
$user_sesion =  $_POST['user_session'];
$estado_ticket = "OCUPADO";

date_default_timezone_set("America/bogota");
$fechaHora = date("Y-m-d h:i:s");

// Sentencia SQL para insertar los datos en la tabla
$sql = "INSERT INTO tb_tickets (placa_auto, nombre_cliente, telefono_cliente, cuviculo, fecha_ingreso, hora_ingreso, estado_ticket, estado)
        VALUES ('$placa', '$nombre_cliente', '$telefono', '$cuviculo', '$fecha_ingreso', '$hora_ingreso', '$estado_ticket', '1')";

if ($con->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();


?>