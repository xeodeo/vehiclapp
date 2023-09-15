<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>

<html class="no-js bg-dark" lang="">
<head>
   
    <title>VPMS - Search Vehicle</title>
   

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

</head>
<body>
    <!-- Left Panel -->

  <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>

     <div class="breadcrumbs bg-dark">
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
                                <ol class="breadcrumb text-right  bg-dark text-white">
                                    <li><a href="dashboard.php">Panel</a></li>
                                    <li><a href="search-vehicle.php">Buscar Vehiculo</a></li>
                                    <li class="active">Buscar Vehiculo</li>
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
                   
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <strong class="card-title">Buscar Vehículo</strong>
                        </div>
                        <div class="card-body bg-dark text-white">
<form action="" method="post" enctype="multipart/form-data" class="form-horizontal" name="search">
                                    
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Buscar por número de estacionamiento</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="searchdata" name="searchdata" class="form-control bg-secondary text-white"  required="required" autofocus="autofocus" ></div>
                                    </div>
                                 
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="search" >Buscar</button></p>
                                </form>

 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Resultado en contra "<?php echo $sdata;?>" palabra clave </h4> 
                             <table class="table">
                <thead>
                                        <tr>
                                            <tr>
                  <th>N°.</th>
            
                 
                    <th>Número de estacionamiento</th>
                    <th>Nombre del Dueño</th>
                    <th>Placa</th>
                   
                          <th>Acción</th>
                </tr>
                                        </tr>
                                        </thead>
               <?php
$ret=mysqli_query($con,"select *from   tblvehicle where ParkingNumber like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

              
                <tr>
                  <td><?php echo $cnt;?></td>
            
                 
                  <td><?php  echo $row['ParkingNumber'];?></td>
                  <td><?php  echo $row['OwnerName'];?></td>
                  <td><?php  echo $row['RegistrationNumber'];?></td>
                  
                  <td><a href="view-incomingvehicle-detail.php?viewid=<?php echo $row['ID'];?>">Ver</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} } else { ?>
     <tr>
    <td colspan="8">No se encontró ningún registro en esta búsqueda</td>

  </tr>
   
<?php } }?>
              </table>

                    </div>
                </div>
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