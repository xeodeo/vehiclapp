<?php
// Incluir el archivo de conexión
include('includes/dbconnection.php');

// Obtener los datos del formulario
$nroEspacio = $_POST['nro_espacio'];
$estadoEspacio = $_POST['estado_espacio'];
$obs = $_POST['obs'];

// Sentencia SQL para insertar los datos en la tabla
$sql = "INSERT INTO tb_mapeos (nro_espacio, estado_espacio, obs, estado)
        VALUES ('$nroEspacio', '$estadoEspacio', '$obs', 'Activo')";

if ($con->query($sql) === TRUE) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $con->error;
}

// Cerrar la conexión a la base de datos
$con->close();
?>

