<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');

$placa = $_GET['placa'];

$id_cliente = '';
$nombre_cliente = '';
$telefono_cliente = '';

$query = "SELECT * FROM tblvehiculo WHERE estado = '1' AND Placa = '$placa'";
$result = mysqli_query($con, $query);
$buscars = $result->fetch_all(MYSQLI_ASSOC);

foreach ($buscars as $buscar) {
    $id_cliente = $buscar['ID'];
    $nombre_cliente = $buscar['NombreDueño'];
    $telefono_cliente = $buscar['TelefonoDueño'];
}

$id_cliente = $buscar['ID'];
$nombre_cliente = $buscar['NombreDueño'];
$telefono_cliente = $buscar['TelefonoDueño'];


echo $nombre_cliente." - ".$telefono_cliente;

if($nombre_cliente == ""){
    echo "El cliente es nuevo";
}else{
    echo "El cliente es antiguo";
}


?>