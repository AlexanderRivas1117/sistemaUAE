<?php 

require_once realpath (dirname (__FILE__).'/../../model/Prestamo.php');

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

  <title>UAE - Préstamo de Libros</title>
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
<style>
.greenL {
  border-left: 3px solid green;
  height: 100%;
  padding-left: 10px;
}
</style>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<?php include'menu.php' ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Préstamo de Libros</h1>
          <p class="mb-4">Permite realizar préstamos y devoluciones a usuarios del Sistema Bibliotecario</p>

          <div class="d-sm-flex align-items-rigth justify-content-between mb-4 col-md-offset-8">
            
            <button type="button" class="d-none d-sm-inline-block btn  btn-primary shadow-sm" id="nuevo" value="nuevo"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo Préstamo</button>


           
          </div>
          <div class="d-sm-flex align-items-rigth justify-content-between mb-4 col-md-offset-8">
           

            <button type="button" class="d-none d-sm-inline-block btn btn-success shadow-sm" id="devolucion" value="devolucion"><i class="fas fa-bookmark fa-sm text-white-50"></i> Devolución</button>
          </div>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Datos de Préstamo</h6>
            </div>
            <div class="card-body">
              
                <!-- INICIO -->
                <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>N° Inventario</th>
                      <th>Nombre Libro</th>
                      <th>Fecha Realización</th>
                      <th>Nombre</th>
                      <th>Carnet</th>
                      <!-- <th>Acciones</th> -->
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>N° Inventario</th>
                      <th>Nombre Libro</th>
                      <th>Fecha Realización</th>
                      <th>Nombre</th>
                      <th>Carnet</th>
                      <!-- <th>Acciones</th> -->
                    </tr>
                  </tfoot>
                  <tbody>

                   <?php 
                            $objPrestamo = new Prestamo();
                            $data = $objPrestamo->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                            <td>".$value['numeroInventario']."</td>
                                            <td>".$value['libro']."</td>
                                            <td>".$value['fechaRealizacion']."</td>
                                            <td>".$value['nombre']."</td>
                                            <td>".$value['carnet']."</td>
                                            
                                          </tr>";
                                          // <td>
                                                
                                          //       <button type='button' class='btn btn-info btn-circle btn-sm info ' id='".$value['numeroInventario']."' value='Editar'><i class='fas fa-edit'></i></button>
                                                
                                          //   </td>
                                }
                            }

                         ?>
                    
                  
               
                  </tbody>
                </table>
              </div>
            </div>
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
  
<script type="text/javascript" src="../../resources/js/administrador/prestamo.js"></script>

</body>

<!-- MODALES --> 
    <!-- NUEVO -->

<!-- MODAL DE NUEVO PRESTAMO -->

<div class="modal fade bd-example-modal-lg" id="nuevoPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 3000px;">
    <div class="modal-content">
      <div class="modal-header">
          <h6 class="modal-title">Editar Usuario</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body"  id="modal-body">

<!-- AQUI -->
<div id="infoPrestamo">
  <div class="row">
  <div class="col-md-8">
    <div class="form-group">
      <div class="form-group">
        <label>Tipo de Préstamo</label><br>
<!--         <div class="custom-control custom-radio custom-control-inline">
          <input type="radio" id="customRadioInline1" name="tipoPrestamo" class="custom-control-input" value="1" checked>
            <label class="custom-control-label" for="customRadioInline1">En Sala&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
          <input type="radio" id="customRadioInline2" name="tipoPrestamo" class="custom-control-input" value="2">
            <label class="custom-control-label" for="customRadioInline2">Externo</label>
        </div> -->

        <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadioInline1" name="tipoPrestamo" value="1" class="custom-control-input" checked="true">
    <label class="custom-control-label" for="customRadioInline1">En Sala</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="tipoPrestamo" class="custom-control-input" value="2">
  <label class="custom-control-label" for="customRadioInline2">Externo</label>
</div>


      </div>
    </div>
                </div>
</div>
  <div class="row">
  <div class="col-md-4">
    <div class="form-group">
    <label>Fecha a Devolver</label>
    <input type="date" name="fechaDevolver" class="form-control form-control-sm" id="fechaDevolver" >
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label>Carnet Usuario</label>
      <input type="carnet" name="carnet" id="carnet" class="form-control form-control-sm" placeholder="1234-5">
    </div>
    <input type="hidden" name="idUsuario" id="idUsuario">
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label>Codigo Inventario</label>
      <input type="codInventario" name="codInventario" id="codInventario" class="form-control form-control-sm" placeholder="NNN-1234">
    </div>
    <input type="hidden" name="idInventario" id="idInventario" value="">
  </div>
  <div class="col-md-1" style="padding-left: 0px; margin-top: 8px;">

        <br>
    <button type="button" class="btn btn-info btn-sm" id="buscarInventario" value="buscar"><i class='fas fa-search'></i></button>

    </div>
</div>
</div>
<!-- AQUI -->
<!-- TABLA DATOS USUARIO -->
<DIV class="row">
  <div class="col-md-12">
    <table  class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Telefono</th>
        <th>Correo</th>
      </thead>
      <tbody>
        <tr id="sinRegistros">
          <td colspan="4">
            <h7>No hay registros</h7>
          </td>

        </tr>
      </tbody>
    </table>
  </div>
</DIV>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="realizar" value="registrar">Realizar Prestamo</button>
      </div>
    </div>
  </div>
</div>



<!-- MODAL BUCAR CODIGO INVENTARIO -->

<div class="modal fade bd-example-modal-lg" id="modalInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 3000px;">
    <div class="modal-content">
      <div class="modal-header">
          <h6 class="modal-title">Editar Usuario</h6>
          <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> -->
        </div>
      <div class="modal-body"  id="modal-body">
<div class="row">
  <div class="col-md-10">
    <div class="form-group">
      <label>Buscar:</label>
<input type="text" id="txtBusqueda" name="txtBusqueda" placeholder="Ingrese lo que desea buscar.." class="form-control form-control-sm" required="true">
    </div>
  </div>
  <div class="col-md-1" style="padding-left: 0px; margin-top: 3px;">
    <br>
    <button type="button" class="btn btn-primary btn-sm" id="btnSearch" value="buscar">Buscar</button>
  </div>

</div>
<div class="row">
<div class="col-md-12">
            <div class="form-group">
 <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="sNombre" name="search" class="custom-control-input" value="1" checked>
    <label class="custom-control-label" for="sNombre">Nombre</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="sAutor" name="search" class="custom-control-input" value="2">
    <label class="custom-control-label" for="sAutor">Autor</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="sIsbn" name="search" class="custom-control-input" value="3">
    <label class="custom-control-label" for="sIsbn">ISBN</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="sEpigrafe" name="search" class="custom-control-input" value="4">
    <label class="custom-control-label" for="sEpigrafe">EPÍGRAFE</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="sInventario" name="search" class="custom-control-input" value="5">
    <label class="custom-control-label" for="sInventario">N° INVENTARIO</label>
</div>
    <!-- <div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="sNombre" name="search" class="custom-control-input" value="1" checked>
    <label class="custom-control-label" for="sNombre">Nombre</label>
<input type="radio" id="sAutor" name="search" class="custom-control-input" value="2">
    <label class="custom-control-label" for="sAutor">Autor</label>
<input type="radio" id="sIsbn" name="search" class="custom-control-input" value="3">
    <label class="custom-control-label" for="sIsbn">ISBN</label>
    </div> -->
            </div>
</div>
    

</div>
<br>

<!-- TABLA LIBROS -->
<DIV class="row">
  <div class="col-md-12">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <th>Nombre Libro</th>
        <th>Codigo Inventario</th>
        <th>Seleccionar</th>
      </thead>
      <tbody id="sinDatos">
          <tr >
            <td colspan="4">
              <h7 class="h9">No hay registros</h7>
            </td>
          </tr>         
      </tbody>
    </table>
  </div>
</DIV>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cerrar">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" id="ok" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>

    <!-- NUEVO -->

<!-- MODAL DEVOLUCIONES -->

<div class="modal fade bd-example-modal-lg" id="modalDevoluciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 3000px;">
    <div class="modal-content">
      <div class="modal-header">
          <h6 class="modal-title">Editar Usuario</h6>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
      <div class="modal-body"  id="modal-body">
  <div class="row">
    <div class="col-md-10">
      <div class="form-group">
      <label>Buscar:</label>
<input type="text" id="txtBuscar" name="txtBucar" placeholder="Ingrese lo que desea buscar.." class="form-control form-control-sm" required="true">
      </div>
    </div>
  <div class="col-md-1" style="padding-left: 0px; margin-top: 3px;">
    <br>
    <button type="button" class="btn btn-primary btn-sm" id="btnBuscar" value="buscar">Buscar</button>
  </div>

</div>
<div class="row">
  <div class="col-md-5">
    <div class="form-group">
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="ssInventario" name="buscar" class="custom-control-input" value="1" checked="">
    <label class="custom-control-label" for="ssInventario">Inventario</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
 <input type="radio" id="ssCarnet" name="buscar" class="custom-control-input" value="2">
    <label class="custom-control-label" for="ssCarnet">Carnet</label>
</div>
    </div>  



  </div>
  <div class="col-md-3 col-md-offset-2">
    <div class="form-group">
      <div class="custom-control custom-checkbox custom-control-inline">
<input type="checkbox" id="mora" name="mora" class="custom-control-input" >
    <label class="custom-control-label" for="mora">Con Mora</label>
      </div>
    </div>
  </div>
</div>

  

<br>

<!-- TABLA PRESTAMOS -->
<DIV class="row">
  <div class="col-md-12">
    <table class="table table-bordered">
      <thead>
        <th>Número Inventario</th>
        <th>Título</th>
        <th>Fecha Préstamo</th>
        <th>Fecha a Devolver</th>
        <th>Multa</th>
        <th>Seleccionar</th>
      </thead>
      <tbody id="sinInfo">
          <tr >
            <td colspan="6">
              <h7 class="h9">No hay registros</h7>
            </td>
          </tr>         
      </tbody>
    </table>
  </div>
</DIV>
<div class="row">
  <div class="col-md-2" style="margin-top: 0px;">
    <button type="button" class="btn btn-primary btn-sm" id="imprimir" value="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp; Imprimir</button>
    </div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cerrar2">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" id="ok" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>


<!-- MODAL INFO LIBRO -->

<div class="modal fade bd-example-modal-lg" id="modalInfo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" style="width: 3000px;">
    <div class="modal-content">
      <div class="modal-header">
          <h6 class="modal-title">Información de Documento</h6>
          <!-- <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button> -->
        </div>
      <div class="modal-body"  id="modal-body">
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <p class=" col-sm-2 font-weight-normal">Título</p>
            <div class="col-sm-10">
              <div class="greenL"><p class="font-weight-bold" id="txtNombre"><!-- Mejoramiento de las instalaciones existentes de la Sala Cuna y habilitación de un edificio aledaño Centro de Orientación --></p>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <p class=" col-sm-2 font-weight-normal">Autor(es)</p>
            <div class="col-sm-10">
              <div class="greenL">
                <p class="font-weight-normal" id="txtAutor"> </p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-md-6">
          <div class="form-group row">
            <p class=" col-sm-4 font-weight-normal">Inventario: </p>
            <div class="col-sm-8">
              <div class="greenL">
                <p class="font-weight-bold" id="txtInventario"> </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group row">
            <p class=" col-sm-3 font-weight-normal">Clasificación: </p>
            <div class="col-sm-9">
              <div class="greenL">
                <p class="font-weight-bold" id="txtClasificacion"> </p>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <hr style="background: #4e73df;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <p class=" col-sm-2 font-weight-normal">Epígrafes: </p>
            <div class="col-sm-10">
              <p class="font-weight-bold" id="txtEpigrafe"> </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group row">
            <p class=" col-sm-6 font-weight-normal">Edición: </p>
            <div class="col-sm-6">
              <p class="font-weight-bold" id="txtEdicion"> </p>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group row">
            <p class=" col-sm-2 font-weight-normal">Editorial: </p>
            <div class="col-sm-10">
              <div><p class="font-weight-bold" id="txtEditorial"> </p>
                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <p class=" col-sm-4 font-weight-normal">Asesor: </p>
            <div class="col-sm-8">
              <p class="font-weight-bold" id="txtAsesor"> </p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group row">
            <p class=" col-sm-4 font-weight-normal">F.Publicación: </p>
            <div class="col-sm-8">
              <p class="font-weight-bold" id="txtFecha"> </p>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <hr style="background: #4e73df;">
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="form-group row">
            <p class=" col-sm-2 font-weight-normal">Tabla de Contenido: </p>
            <div class="col-sm-10">
              <p class="font-weight-bold" id="txtContenido"> </p>
            </div>
          </div>
        </div>
      </div>

      </div> <!-- modal body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cerrarInfo">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" id="ok" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>

<style type="text/css">
  .modal {
  overflow-y:auto;
}
</style>
<!-- FIN MODAL INFO LIBRO -->

<!-- MODALES -->
</html>
