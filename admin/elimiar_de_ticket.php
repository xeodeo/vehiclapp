<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');

$placa2 = $_POST['placa2'];

// Verifica si la placa2 tiene un valor válido y elimina espacios en blanco
if (!empty($placa2)) {
    $placa2 = trim($placa2); // Elimina espacios en blanco alrededor del valor
    
    // Muestra la placa que se va a eliminar (línea de depuración)
    echo "Placa a eliminar: " . $placa2;
    
    // Utiliza una sentencia preparada para eliminar los registros
    $sql = "DELETE FROM tb_tickets WHERE placa_auto = ?";
    
    if ($stmt = $con->prepare($sql)) {
        $stmt->bind_param("s", $placa2); // "s" indica que $placa2 es una cadena
        if ($stmt->execute()) {
            echo "Los datos se han eliminado correctamente.";
        } else {
            echo "Error al eliminar los datos: " . mysqli_error($con);
        }
        $stmt->close();
        
        // Agregar JavaScript para recargar la página después de que se muestre el mensaje
    } else {
        echo "Error en la consulta: " . mysqli_error($con);
    }
} else {
    echo "Placa no proporcionada.";
}

// Cerrar la conexión a la base de datos
$con->close();
?>
