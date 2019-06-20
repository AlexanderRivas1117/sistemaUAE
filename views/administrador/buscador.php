<?php 


require_once realpath (dirname (__FILE__).'/../../model/Libro.php');


//require_once'head.php';

 ?>

 <?php 

include_once realpath (dirname (__FILE__).'/../../app/validacionAdministrador.php');

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UAE | Buscador de Libros</title>
  <link rel = "icon" type = "image/png" href = "logo_UAE.JPG">
 

  <!-- Custom fonts for this template -->
  <link href="../../resources/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../resources/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../resources/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../resources/sweetalert-master/dist/sweetalert.css">

  <!-- AUTOCOMPLETE -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> -->

<link href="../../resources/select2/dist/css/select2.min.css" rel="stylesheet" />

<!-- SUMMERNOTE -->

<!-- SUMMERNOTE -->

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
   <?php include'menu.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 ">Búsqueda de Libros</h1>
          <p class="mb-4">Permite una búsqueda de los documentos del Sistema Bibliotecario</p>
<?php 

if(isset($_REQUEST['estado']))
{
  if ($_REQUEST['estado']=="false") {
    
 ?>
<div class="alert" role="alert" style="background-color: #f8d7da; border-color: #f5c6cb;color: #721c24;">
  <strong>Alerta </strong>¡Debe ingresar un criterio de Búsqueda!
</div>
 <?php 

  }
}
  ?>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Criterios de Búsqueda</h6>
            </div>

            <div class="card-body">
             
                <!-- INICIO -->
                <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <form action="resultados.php" method="GET" autocomplete="off">
        
              <div class="row">
                <div class="col-md-6">
        <div class="form-group">
          <label>Tipo Coleccion</label>
          <select id="tipoColeccion" name="tipoColeccion" class="form-control form-control-sm">
            <option value="todos">TODOS</option>
            <option value="COLECCION GENERAL">COLECCIÓN GENERAL</option>
            <option value="COLECCION DE TESIS">COLECCIÓN DE TESIS</option>
            <option value="COLECCION PERLA">COLECCIÓN PERLA</option>
            <option value="COLECCION DE DIPLOMADO">COLECCION DE DIPLOMADO</option>
            <option value="COLECCION NORTAR BARTOLO">COLECCIÓN NORTAR BARTOLO</option>
            <option value="COLECCION DE REFERENCIA">COLECCION DE REFERENCIA</option>
            <option value="COLECCION GC">COLECCION GC</option>
            <option value="COLECCION DE AUDIOVISUALES">COLECCION DE AUDIOVISUALES</option>

          </select>
        </div>
                </div>
              </div> <!-- fin row -->
              <br>
              <div class="row">
                <div class="col-md-12">
                  <hr style="background: #e3e6f0;">
                </div>
              </div>
              <div class="form-group row">
                <label for="libre" class="col-sm-1 col-form-label">Libre</label>
                  <div class="col-sm-8">
                  <input type="text"  class="form-control form-control-sm" id="libre" placeholder="Búsqueda por título, autor, tabla de contenido" name="libre">
                  </div>
              </div>

              <div class="form-group row">
                <label for="titulo" class="col-sm-1 col-form-label">Título</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="titulo" placeholder="Búsqueda por título" name="titulo">
                  </div>
              </div>

              <div class="form-group row">
                <label for="autor" class="col-sm-1 col-form-label">Autor/a</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="autor" placeholder="Búsqueda por Autor/a" name="autor">
                  </div>
              </div>

              <div class="form-group row">
                <label for="autor" class="col-sm-1 col-form-label">Editorial</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control form-control-sm" id="editorial" placeholder="Búsqueda por Editorial" name="editorial">
                  </div>
              </div>

              <div class="form-group row">
                <label for="anio" class="col-sm-1 col-form-label">Año</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm" id="anio" placeholder="Búsqueda por año" name="anio">
                  </div>
              </div>

              <div class="form-group row">
                <label for="dewey" class="col-sm-1 col-form-label">Dewey</label>
                  <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm" id="dewey" placeholder="Búsqueda por Dewey" name="dewey">
                  </div>
              </div>

              <div class="row">
                <div class="col-md-9">
                  <div class="float-md-right">
                    <button type="submit" class="btn btn-info">Buscar</button>
                     <button type="reset" class="btn btn-danger">Limpiar</button>
                   <!--  <button type="button" class="btn btn-warning">Warning</button>
                    <button type="button" class="btn btn-info">Info</button> -->
                  </div>
                </div>
              </div>

              </form>
            </div> <!-- fin card-body -->
          </div> <!-- FIN DATA TABLE -->

             <!-- FIN -->

            </div>
            </form>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; UAE 2019</span>
          </div>
        </div>
      </footer>


      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  

  <!-- Bootstrap core JavaScript-->
  <script src="../../resources/bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../resources/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- SUMMERNOTE -->
<!--   <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script> -->
  <!-- SUMMERNOTE -->
  <!-- Core plugin JavaScript-->
  <script src="../../resources/bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../resources/bootstrap/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../resources/bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../../resources/bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../resources/bootstrap/js/demo/datatables-demo.js"></script>
  <script type="text/javascript" src="../../resources/sweetalert-master/dist/sweetalert.min.js"></script>
  
<script type="text/javascript" src="../../resources/js/administrador/libro.js"></script>
<script type="text/javascript" src="../../resources/jQueryMask/dist/jquery.mask.js"></script>


<!-- AUTOCOMPLETE -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->


<script src="../../resources/select2/dist/js/select2.min.js"></script>






 

</body>


<!-- MODALES --> 






<script>
$(document).ready(function() {


});
</script>



<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->


<!-- FIN EDITAR -->
<!-- MODALES -->
</html>
