<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

  ?>
<!doctype html>
<html class="bg-dark" lang="">
<head>
    
    <title>VPMS - Add Category</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                                    <li><a href="add-category.php">Cupos</a></li>
                                    <li class="active">Agregar Cupos</li>
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
                                <strong>Agregar </strong> CUPOS
                            </div>
                            <div class="card-body" style="display: block;">
                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Numero de espacio</label>
                                        <input type="number" class="form-control" id="nro_espacio">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form group">
                                        <label for="">Estado del espacio</label>
                                        <select name="" id="estado_espacio" class="form-control">
                                            <option value="LIBRE">LIBRE</option>
                                            <option value="OCUPADO">OCUPADO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Observaciones</label>
                                        <input type="text" id="Oservaciones" class="form-control">
                                    </div>
                                    <hr>
                                    

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <a href="" class="btn btn-danger btn-block">CANCELAR</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-block" id="btn-registrar">ACEPTAR</button>
                                    </div>
                                </div>



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


<!-- Agrega esto antes del cierre del </body> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $("#btn-registrar").click(function () {
            // Obtener los valores del formulario
            var nroEspacio = $("#nro_espacio").val();
            var estadoEspacio = $("#estado_espacio").val();
            var obs = $("#Oservaciones").val();

            // Verificar si el campo "Número de espacio" está vacío
            if (nroEspacio === "") {
                alert("El campo 'Número de espacio' no puede estar vacío.");
                $("#nro_espacio").focus(); // Enfocar el campo
                return; // Detener la ejecución del script si el campo está vacío
            }

            // Realizar la solicitud AJAX
            $.ajax({
                type: "POST",
                url: "control-espacios.php", // Ruta al archivo PHP
                data: {
                    nro_espacio: nroEspacio,
                    estado_espacio: estadoEspacio,
                    obs: obs
                },
                success: function (response) {
                    // Manejar la respuesta del servidor (puede ser un mensaje de éxito o error)
                    alert(response); // Mostrar la respuesta en una alerta (puedes cambiar esto)
                    
                    // Limpiar los campos después de guardar los datos
                    $("#nro_espacio").val("");
                    $("#estado_espacio").val("LIBRE");
                    $("#Oservaciones").val("");
                }
            });
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></sodium_crypto_sign_ed25519_pk_to_curve25519>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>




</body>
</html>
<?php }  ?>

