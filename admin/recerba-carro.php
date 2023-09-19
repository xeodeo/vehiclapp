<?php
session_start();
error_reporting(0);
include('includes/config.php');
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

  ?>
<!doctype html>
<html class="bg-dark" lang="">
<head>
    
    <title>Espacios</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
   <?php include_once('includes/sidebar.php');?>
    <!-- Right Panel -->

   <?php include_once('includes/header.php');?>
   <div class="breadcrumbs bg-dark">
            <div class="breadcrumbs-inner bg-dark">
                <div class="row m-0">
                    <div class="col-sm-4 ">
                        <div class="page-header float-left bg-dark">
                            <div class="page-title bg-dark text-white">
                                <h1>Panel</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 ">
                        <div class="page-header float-right bg-dark">
                            <div class="page-title ">
                                <ol class="breadcrumb text-right bg-dark text-white">
                                    <li><a href="dashboard.php">Panel</a></li>
                                    <li><a href="add-category.php">Espacios</a></li>
                                    <li class="active">Administrar Espacios</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   <div class="content bg-secondary">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                                <strong>Administrar </strong> Espacios
                            </div>
                            <div class="card-body " style="display: block;">
                              <div class="row">
                              <?php
$query = "SELECT * FROM tb_mapeos WHERE estado_espacio IN ('LIBRE', 'OCUPADO')";


$result = mysqli_query($con, $query);

$mapeos = $result->fetch_all(MYSQLI_ASSOC);

foreach ($mapeos as $mapeo) {
    $id_map = $mapeo['id_map'];
    $nro_espacio = $mapeo['nro_espacio'];
    $estado_espacio = $mapeo['estado_espacio'];

    if($estado_espacio == "LIBRE"){ ?>
            <div class="col">
            <center>
            <h2><?php echo $nro_espacio;?></h2>
                <button class="btn btn-success" style="width: 100%;height: 114px" data-toggle="modal" data-target="#modal_<?php echo $id_map;?>">
                <p class="text-white"><?php echo $estado_espacio;?></p>
                </button>
                <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade " id="modal_<?php echo $id_map;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-dark">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingreso del vehiculo</h5>
      </div>
      <div class="modal-body">
      <div class="form-group text-white">
                                <label>Seleccione una opción:</label> <br><br>
                                <select id="opcion_modal_<?php echo $id_map;?>" class="form-control bg-secondary text-white" data-id_map="' . $id_map . '">
                                <option value="control">Seleccione el Rol</option>
                                <option value="visitante">Visitante</option>
                                <option value="residente">Residente</option>
                                </select>
                            </div> 
        <div id="opciones_visitante_<?php echo $id_map; ?>" class="opcion-container" style="display: none;">
            <div class="form-group text-white">
                    <label>Documento</label>
                    <input type="text" class="form-control">
                    <label>Placa</label>
                    <input type="text" id="placa_<?php echo $id_map;?>" maxlength="6" class="form-control">
            </div>
        </div>
        
        <div id="opciones_residente_<?php echo $id_map; ?>" class="opcion-container" style="display: none;">
          <!-- Contenido para la opción "Residente" -->
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Placa: <span><b style="color: red">*</b></span></label>
              <div class="col-sm-6">
                <input type="text" id="placa2_<?php echo $id_map;?>" maxlength="6" class="form-control">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-success" id="btn_buscar_cliente<?php echo $id_map;?>">Buscar</button>
                <script>
                  $('#btn_buscar_cliente<?php echo $id_map;?>').click(function(){
                    var placa = $('#placa2_<?php echo $id_map;?>').val();
                    var id_map = "<?php echo $id_map;?>";

                    if(placa == ""){
                      alert("Tienes que llenar el campo placa");
                      $('#placa2_<?php echo $id_map;?>').focus();
                    } else{
                      var url = 'controlador-buscar-cliente.php';
                      $.get(url, {placa:placa,id_map:id_map}, function(datos){
                        $('#respuesta_buscar_cliente<?php echo $id_map;?>').html(datos);
                      });
                    }
                  });
                </script>

              </div>
            </div>

            <div  id="respuesta_buscar_cliente<?php echo $id_map;?>">

            </div>

            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Fecha de entrada:</label>
              <div class="col-sm-7">
                <?php
                date_default_timezone_set("America/caracas");
                $fechaHora = date("Y-m-d h:i:s");
                $dia = date('d');
                $mes = date('m');
                $ano = date('Y');
                ?>
                <input type="date" class="form-control" id="fecha_ingreso<?php echo $id_map;?>" value="<?php echo $ano."-".$mes."-".$dia;?>">
              </div>
            </div>

            <div class="form-group row">
              <label for="" class="col-sm-3 col-form-label">Hora de entrada:</label>
              <div class="col-sm-7">
                <?php
                date_default_timezone_set("America/bogota");
                $fechaHora = date("Y-m-d h:i:s");
                $hora = date('h');
                $minitos = date('i');
                ?>
                <input type="tine" class="form-control" id="hora_ingreso<?php echo $id_map;?>" value="<?php echo $hora.":".$minitos;?>">
              </div>
            </div>

            <div class="form-group row">
                                                                        <label for="staticEmail" class="col-sm-3 col-form-label">Cuvículo:</label>
                                                                        <div class="col-sm-7">
                                                                            <input type="text" class="form-control" id="cuviculo<?php echo $id_map;?>" value="<?php echo $nro_espacio; ?>">
                                                                        </div>
                                                                    </div>



          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="btn_registrar_ticket<?php echo $id_map;?>">Imprimir ticket</button> 
        <script>
                                                                        $('#btn_registrar_ticket<?php echo $id_map;?>').click(function () {
                                                                          var placa = $('#placa2_<?php echo $id_map;?>').val();
                                                                          var nombre_cliente = $('#nombre_cliente<?php echo $id_map;?>').val();
                                                                          var telefono = $('#telefono<?php echo $id_map;?>').val();
                                                                          var fecha_ingreso = $('#fecha_ingreso<?php echo $id_map;?>').val();
                                                                          var hora_ingreso = $('#hora_ingreso<?php echo $id_map;?>').val();
                                                                          var cuviculo = $('#cuviculo<?php echo $id_map;?>').val();
                                                                          
                                                                          if(placa == ""){
                                                                              alert('Debe de llenar el campo Placa');
                                                                               $('#placa2_<?php echo $id_map;?>').focus();
                                                                              }
                                                                              else{
                                                                                var url_1 = 'control-cambiar.php';
                                                                               $.get(url_1,{cuviculo:cuviculo},function (datos) {
                                                                                   $('#respuesta_ticket').html(datos);
                                                                                   alert('Hecho');
                                                                               });
                                                                              }
                                                                        });
                                                                    </script>
      </div>
      <div id="respuesta_ticket">

        </div>
    </div>
  </div>
</div>  
            </center>
        </div>
        
    <?php
    }
    if($estado_espacio == "OCUPADO"){ ?>
        <div class="col">
        <center>
            <h2><?php echo $nro_espacio;?></h2>
            <button class="btn btn-danger">
            <img src="images/auto1.png" width="60px" alt="">
            
            </button>
            <p class="text-white"><?php echo $estado_espacio;?></p>
        </center>
    </div>
<?php
}
                            ?>

    <?php
            }
                              ?>




                              </div>

                            </div>

                            
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        
                  
                </div>

           

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->



    <div class="clearfix bg-dark"></div>

   <?php include_once('includes/footer.php');?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script>
$(document).ready(function() {
  // Escucha cambios en el select
  $('select[id^="opcion_modal_"]').change(function() {
    // Obtén el id_map a partir del id del select
    var id_map = $(this).attr('id').match(/\d+/)[0];
    var selectedOption = $(this).val();

    console.log("id_map:", id_map);
    console.log("selectedOption:", selectedOption);

    if (selectedOption == "control") {
      $('#opciones_visitante_' + id_map).hide();
      $('#opciones_residente_' + id_map).hide();
    } else if (selectedOption == "visitante") {
      $('#opciones_visitante_' + id_map).show();
      $('#opciones_residente_' + id_map).hide();
    } else if (selectedOption == "residente") {
      $('#opciones_visitante_' + id_map).hide();
      $('#opciones_residente_' + id_map).show();
    } 

    // Resto del código para mostrar/ocultar opciones

    // Validación de placa
    var alertaMostrada = false;
    $("[id^='placa_" + id_map + "'], [id^='placa2_" + id_map + "']").on("blur", function () {
      var placaInput = $(this).val().trim().toUpperCase();
      var placaPattern = /^[A-Z]{3}\d{3}$/;

      if (!placaPattern.test(placaInput) && !alertaMostrada) {
        alert("Por favor, ingrese una placa colombiana válida (Ejemplo: ABC123).");
        $(this).val('');
        $(this).focus();
        alertaMostrada = true;
      }
    });

    $("[id^='placa_" + id_map + "'], [id^='placa2_" + id_map + "']").on("input", function () {
      $(this).val($(this).val().toUpperCase());

      if (alertaMostrada) {
        alertaMostrada = false;
      }
    });
  });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>