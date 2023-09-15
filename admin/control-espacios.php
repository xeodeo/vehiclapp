<?php
// Incluir el archivo de conexión
include('includes/dbconnection.php');

// Obtener los datos del formulario
$nroEspacio = $_POST['nro_espacio'];
$estadoEspacio = $_POST['estado_espacio'];
$obs = $_POST['obs'];

// Obtener la fecha y hora actual
$fechaCreacion = date("Y-m-d H:i:s");

// Sentencia SQL para insertar los datos en la tabla
$sql = "INSERT INTO tb_mapeos (nro_espacio, estado_espacio, obs, estado, fyh_creacion)
        VALUES ('$nroEspacio', '$estadoEspacio', '$obs', '1', '$fechaCreacion')";

if ($con->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();
?>

