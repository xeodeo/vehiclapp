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
<html class="no-js bg-dark" lang="">
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

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_map = $row['id_map'];
        $nro_espacio = $row['nro_espacio'];
        $estado_espacio = $row['estado_espacio'];

        echo '<div class="col">';
        echo '<center>';
        echo '<h2>' . $nro_espacio . '</h2>';

        // Establece el mismo estilo de tamaño para ambos botones
        echo '<button class="btn ';

        if ($estado_espacio === 'OCUPADO') {
            echo 'btn-danger custom-btn" ';
        } else {
            echo 'btn-success" ';
        }

        // Añade los atributos data-toggle y data-target para la ventana modal
        echo 'data-toggle="modal" data-target="#modal' . $id_map . '">';

        echo '<br>';
        echo '</button>'; // Cierra el botón

        // Muestra el estado debajo del botón (puedes eliminar esta línea si no deseas mostrar el estado)
        echo '<p>' . $estado_espacio . '</p>';

        // Resto del código del modal aquí...
        // Agrega el contenido de la ventana modal que permitirá seleccionar la placa.

        echo '</center>';
        echo '</div>';
    }
} else {
    echo 'Error en la consulta: ' . mysqli_error($con);
}
?>

<!-- Ventana modal (una por cada espacio) -->
<?php
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id_map = $row['id_map'];
        $nro_espacio = $row['nro_espacio'];

        echo '<div class="modal fade" id="modal' . $id_map . '">';
        echo '<div class="modal-dialog">';
        echo '<div class="modal-content">';
        
        // Contenido de la ventana modal
        echo '<div class="modal-header">';
        echo '<p class="text-black">REGSITRO ENTRADA</p>';
        echo '<h4 class="modal-title">Espacio ' . $nro_espacio . '</h4>';
        echo '<button type="button" class="close" data-dismiss="modal">&times;</button>';
        echo '</div>';
        
        echo '<div class="modal-body">';
        // Aquí puedes agregar el contenido de la ventana modal
        echo 'Contenido de la ventana modal para el espacio ' . $nro_espacio;
        echo '</div>';

        // Agrega el botón "Aceptar"
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>';
        echo '<div class="modal-footer">';
        echo '<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>';
        echo '</div>';
        

        
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
}
?>x





<style>
    .custom-btn {
        width: 100%;
        height: 114px;
        background-image: url('images/auto1.png'); /* Ruta de la imagen del auto */
        background-size: contain; /* Ajusta la imagen al tamaño del botón */
        background-repeat: no-repeat; /* Evita la repetición de la imagen */
        background-position: center center; /* Centra la imagen horizontal y verticalmente */
        color: #fff; /* Color del texto */
    }
</style>

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
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>