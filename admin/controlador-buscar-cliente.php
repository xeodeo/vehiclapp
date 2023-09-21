<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');

$placa = $_GET['placa'];
$id_map = $_GET['id_map'];

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
    ?>
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Nombre:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Telefono:</label>
              <div class="col-sm-7">
                <input type="number" class="form-control" id="telefono<?php echo $id_map;?>">
              </div>
            </div>
    <?php
}else{
    echo "El cliente es antiguo";
    ?>

            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Nombre:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="nombre_cliente<?php echo $id_map;?>" value="<?php echo $nombre_cliente;?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Telefono:</label>
              <div class="col-sm-7">
                <input type="text" class="form-control" id="telefono<?php echo $id_map;?>" value="<?php echo $telefono_cliente;?>">
              </div>
            </div>


    <?php
}


?>