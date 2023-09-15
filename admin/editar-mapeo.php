<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $aid=$_SESSION['vpmsaid'];
     $catname=$_POST['catename'];
  $eid=$_GET['editid'];
  $estado=$_POST['estado'];
   
    $query=mysqli_query($con, "update tb_mapeos set nro_espacio='$catname', estado_espacio='$estado' where id_map='$eid'");
    if ($query) {
    
    echo "<script>alert('Detalles de Estacionamiento actualizados');</script>";
  }
  else
    {
    
      echo "<script>alert('Algo salió mal. Inténtalo de nuevo');</script>";
    }

  }
  ?>
<!doctype html>
<html class="no-js bg-dark" lang="">
<head>
    
    <title>Editar Estacionamiento</title>
   

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

   <div class="breadcrumbs ">
            <div class="breadcrumbs-inner bg-dark">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left bg-dark text-white">
                            <div class="page-title">
                                <h1>Panel</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right bg-dark">
                            <div class="page-title">
                                <ol class="breadcrumb text-right bg-dark text-white">
                                    <li><a href="dashboard.php">Panel</a></li>
                                    <li><a href="manage-category.php">Estacionamiento</a></li>
                                    <li class="active">Administrar Estacionamiento</li>
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

              

                    <div class="col-lg-12 ">
                        <div class="card bg-dark text-white">
                            <div class="card-header">
                            <strong>Administrar  </strong>Estacionamiento
                            </div>
                            <div class="card-body card-block ">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                     
                     
                     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tb_mapeos where id_map='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>              
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Numero Estacionamiento</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="catename" name="catename" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['nro_espacio'];?>"></div>
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Estado de Parqueo</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="estado" name="estado" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['estado_espacio'];?>"></div>
                                    </div>
                                 
                                    <?php } ?>
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Actualizar</button></p>
                                </form>
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