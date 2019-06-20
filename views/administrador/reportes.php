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

  <title>UAE - Tipo Literatura</title>
  <link rel = "icon" type = "image/png" href = "logo_UAE.JPG">

  <!-- Custom fonts for this template -->
  <link href="../../resources/bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../resources/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../resources/bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../resources/sweetalert-master/dist/sweetalert.css">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
 <?php include'menu.php' ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
     
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <br>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Reportes Estadísticos</h1>
          <p class="mb-4">Permite generar reportes de préstamos realizados.</p>

      <div class="row">
            <div class="col-lg-4">
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Reporte General de Préstamos Mensual</h6>
                </div>
                <div class="card-body">
                  <p class="text-xs">Para generar este reporte, por favor seleccione un mes y a continuación de click en Generar</p>
              <form method="GET" action="../../reportes/estadisticoGeneral.php" target="_blank">
                    
                 
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="mes" required="true">
                        <option value="">Seleccione</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="anio" required="true">
                        <option value="">Seleccione Año</option>
                        <?php for ($i=date("Y"); $i > 1980; $i--) { 
                          
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-file-pdf"></i>
                          </span>
                         <span class="text">Generar</span>
                      </button>
                    </div>
                  </div>
          </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Reporte por Carreras</h6>
                </div>
                <div class="card-body">
                  <p class="text-xs">Para generar este reporte, por favor seleccione un mes y a continuación de click en Generar</p>
<form method="GET" action="../../reportes/reportesCarreras.php" target="_blank">
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="mes" required="true">
                        <option value="">Seleccione</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="anio" required="true">
                        <option value="">Seleccione Año</option>
                        <?php for ($i=date("Y"); $i > 1980; $i--) { 
                          
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-file-pdf"></i>
                          </span>
                         <span class="text">Generar</span>
                      </button>
                    </div>
                  </div>
   </form>               
                </div>
            </div>
        </div>

        <div class="col-lg-4">
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Reporte Usuarios con Mora</h6>
                </div>
                <div class="card-body">
                  <p class="text-xs">Para generar este reporte, por favor seleccione un mes y a continuación de click en Generar</p>
<form method="GET" action="../../reportes/usuariosMora.php" target="_blank">
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="mes" required="true">
                        <option value="">Seleccione</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="anio" required="true">
                        <option value="">Seleccione Año</option>
                        <?php for ($i=date("Y"); $i > 1980; $i--) { 
                          
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-file-pdf"></i>
                          </span>
                         <span class="text">Generar</span>
                      </button>
                    </div>
                  </div>
</form> 

                </div>
            </div>
        </div>

  </div><!--  fin row -->


<div class="row">
         <div class="col-lg-4">
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Reporte Adquisiciones Mensuales</h6>
                </div>
                <div class="card-body">
                  <p class="text-xs">Para generar este reporte, por favor seleccione un mes y año, de click en Generar</p>
<form method="GET" action="../../reportes/adquisicionesMensuales.php" target="_blank">
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="mes" required="true">
                        <option value="">Seleccione Mes</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="anio" required="true">
                        <option value="">Seleccione Año</option>
                        <?php for ($i=date("Y"); $i > 1980; $i--) { 
                          
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-file-pdf"></i>
                          </span>
                         <span class="text">Generar</span>
                      </button>
                    </div>
                  </div>
</form> 

                </div>
            </div>
        </div>

        <div class="col-lg-4">
          <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Reporte Adquisiciones Anuales</h6>
                </div>
                <div class="card-body">
                  <p class="text-xs">Para generar este reporte, por favor seleccione un año y a continuación de click en Generar</p>
              <form method="GET" action="../../reportes/adquisicionesAnuales.php" target="_blank">
                    
                  <div class="row">
                    <div class="col-md-12">
                      <select class="form-control form-control-sm" name="anio" required="true">
                        <option value="">Seleccione Año</option>
                        <?php for ($i=date("Y"); $i > 1980; $i--) { 
                          
                        ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                      <?php } ?>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                            <i class="fas fa-file-pdf"></i>
                          </span>
                         <span class="text">Generar</span>
                      </button>
                    </div>
                  </div>
          </form>
                </div>
            </div>
        </div>
</div> <!-- fin row -->



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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../../resources/bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="../../resources/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

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


</body>

<!-- MODALES --> 

<!-- MODALES -->
</html>
