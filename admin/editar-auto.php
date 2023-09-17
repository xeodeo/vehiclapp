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
     $numplaca=$_POST['numplaca'];
     $nomdueño=$_POST['nomdueño'];
     $numtelefono=$_POST['numtelefono'];
     $email=$_POST['email'];
     $doc=$_POST['doc'];
  $eid=$_GET['editid'];
   
    $query = mysqli_query($con, "UPDATE tblvehiculo SET Tipo='$catname', Placa='$numplaca', NombreDueño='$nomdueño', TelefonoDueño='$numtelefono', EmailDueño='$email', Documento='$doc' WHERE ID='$eid'");
    if ($query) {
    
    echo "<script>alert('Category Details updated');</script>";
  }
  else
    {
    
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

  }
  ?>
<!doctype html>
<html class="no-js bg-dark" lang="">
<head>
    
    <title>Editar Categoria</title>
   

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
                                    <li><a href="manage-category.php">Categoria</a></li>
                                    <li class="active">Actualizar Categoria</li>
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
                            <strong>Actualizar  </strong>Vehiculo
                            </div>
                            <div class="card-body card-block ">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                     
                     
                     <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblvehiculo where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>              
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tipo</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="catename" name="catename" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['Tipo'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Placa</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="numplaca" name="numplaca" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['Placa'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nombre del Dueño</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="nomdueño" name="nomdueño" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['NombreDueño'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Telefono del Dueño</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="numtelefono" name="numtelefono" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['TelefonoDueño'];?>"></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Email del Dueño</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="email" name="email" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo" required="true" value="<?php  echo $row['EmailDueño'];?>"></div>
                                        <center>
                                        <div id="email-error" style="color: red;"></div>
                                        </center>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Documento</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="doc" name="doc" class="form-control bg-secondary text-white" placeholder="Categoría de vehículo"  value="<?php  echo $row['Documento'];?>"></div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    var alertaMostrada = false;

    // Cambia el selector para apuntar al ID correcto
    $("#numplaca").on("blur", function() {
        validarPlaca($(this));
    });

    // Cambia el selector para apuntar al ID correcto
    $("#numplaca").on("input", function() {
        // Convertir el texto a mayúsculas
        $(this).val($(this).val().toUpperCase());

        if (alertaMostrada) {
            alertaMostrada = false;
        }
    });

    function validarPlaca(input) {
        var placaInput = input.val().trim().toUpperCase();
        var placaPattern = /^[A-Z]{3}\d{3}$/; // Patrón para placas colombianas (3 letras seguidas de 3 números)

        if (!placaPattern.test(placaInput) && !alertaMostrada) {
            alert("Por favor, ingrese una placa colombiana válida (Ejemplo: ABC123).");
            input.val(''); // Limpiar el campo si no es válido
            input.focus(); // Darle enfoque nuevamente al campo
            alertaMostrada = true;
        }
    }
});
</script>
<script>
    $(document).ready(function() {
        // Función para validar una dirección de correo electrónico
        function esCorreoValido(email) {
            // Expresión regular para validar el formato de un correo electrónico
            var regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return regex.test(email);
        }

        // Manejar el evento blur en el campo de entrada
        $("#email").on("blur", function() {
            var emailInput = $(this).val();

            if (!esCorreoValido(emailInput)) {
                $("#email-error").text("Por favor, ingrese una dirección de correo electrónico válida.");
                $(this).val(""); // Limpiar el campo si no es válido
                $(this).focus(); // Darle enfoque nuevamente al campo
            } else {
                $("#email-error").text(""); // Limpiar el mensaje de error
            }
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