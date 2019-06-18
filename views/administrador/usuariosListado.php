 <?php
include_once realpath (dirname (__FILE__).'/../../app/validacionAdministrador.php');
include_once realpath (dirname (__FILE__).'/../../model/tipoUsuario.php');
 require_once'../../controller/DepartamentoController.php'; 
 require_once'../../model/Rol.php';
 require_once'../../model/Usuario.php';
 require_once'../../model/Carrera.php';
 //require_once'head.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UAE - Listado Usuarios</title>
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
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Listado Usuarios</h1>
          <p class="mb-4">Permite visualizar todos los usuarios registrados en el Sistema Bibliotecario</p>

           <div class="d-sm-flex align-items-rigth justify-content-between mb-4 col-md-offset-8">
            
            <a href="usuarios.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo usuario</a>
          </div>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tabla de Usuarios</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Carnet</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Telefono</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Carnet</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Telefono</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    
                    <?php 
                            $objU = new Usuario();
                            $data = $objU->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                        <td>".$value['carnet']."</td>
                                            <td>".$value['nombre']."</td>
                                            <td>".$value['apellido']."</td>
                                            <td>".$value['telefono']."</td>
                                            <td>
                                                <button type='button' class='btn btn-info btn-circle btn-sm editar' id='".$value['id']."' value='Editar'><i class='fas fa-edit'></i></button>
                                                <button type='button' class='btn btn-danger btn-circle btn-sm eliminar' value='".$value['id']."'><i class='fas fa-trash'></i></button>
                                            </td>
                                          </tr>";
                                }
                            }

                         ?>

               
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
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
  <script type="text/javascript" src="../../resources/js/administrador/usuarioListado.js"></script>

</body>

<!-- MODALES --> 
    <!-- EDIT -->
    
<div class="modal fade bd-example-modal-lg" id="editarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
<div>
  <form id="infoUsuario" name="infoUsuario">
  
  
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Carnet</label>
        <input type="hidden" name="idUsuario" id="idUsuario">
        <input type="text" name="carnet" class="form-control form-control-sm" placeholder="ABC-123" id="carnet" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Nombres</label>
        <input type="text" name="nombre" class="form-control form-control-sm" placeholder="Escriba sus nombres" id="nombre" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Apellidos</label>
        <input type="text" name="apellido" id="apellido" class="form-control form-control-sm" placeholder="Escriba sus apellidos" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <div class="form-group">
          <label class="col-form-label col-form-label-sm">Genero</label><br>
            <!-- <div class="custom-control custom-radio custom-control-inline">
              <input type="radio" id="customRadioInline1" name="genero" class="custom-control-input" value="Masculino" checked>
              <label class="custom-control-label" for="customRadioInline1">M&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
              <input type="radio" id="customRadioInline2" name="genero" class="custom-control-input" value="Femenino">
              <label class="custom-control-label" for="customRadioInline2">F</label>
              <div class="custom-control custom-radio custom-control-inline">
              </div>
            </div> -->
<div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadioInline1" name="genero" value="Masculino" class="custom-control-input" checked="true">
    <label class="custom-control-label" for="customRadioInline1">M</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="customRadioInline2" name="genero" class="custom-control-input" value="Femenino">
  <label class="custom-control-label" for="customRadioInline2">F</label>
</div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Edad</label>
        <select class="form-control form-control-sm" id="selectEdad" name="idEdad" required>
            <option>Seleccione</option>
              <?php 

              for ($i=10; $i < 80 ; $i++) { 
                ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php 
                              }
                ?>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">                
        <label class="col-form-label col-form-label-sm">Departamento</label>
          <select class="form-control form-control-sm" id="selectDepartamento" name="idDepartamento" required>
            <option value="777">Seleccione</option>
                       
                      
                    <?php 
//codigo siguiente...

                    $objDepto = new Departamento();
                    $data = $objDepto->getAll();
                    if($data!=null)
                    {
                      foreach ($data as $value) 
                      {
                        echo "<option value=".$value['id'].">".$value['nombre']."</option>";
                      }
                    }
                     ?>
          </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Municipio</label>
        <select class="form-control form-control-sm" id="selectMunicipio" name="idMunicipio" required>
          <option value="Seleccione">Seleccione</option>
        </select>
      </div>
    </div>  
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Direccion</label>
        <input type="text" name="direccion" id="direccion" class="form-control form-control-sm" placeholder="Escriba su direccion" required>
      </div>
    </div>    
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Tipo Usuario</label>
          <select class="form-control form-control-sm" id="selectUsuario" name="idTipoUsuario" required>
            <option>Seleccione</option>

                       <?php 

                    $objUs = new TipoUsuario();
                    $d = $objUs->getAll();
                    if($d!=null)
                    {
                      foreach ($d as $va) 
                      {
                        echo "<option value=".$va['id'].">".$va['nombre']."</option>";
                      }
                    }
                     ?>
          </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Carrera</label>
          <select class="form-control form-control-sm" id="selectCarrera" name="idCarrera" required>
            <option>Seleccione</option>
                      <?php 
                       
                    $objCa = new Carrera();
                    $d = $objCa->getAll();
                    if($d!=null)
                    {
                      foreach ($d as $va) 
                      {
                        echo "<option value=".$va['id'].">".$va['nombre']."</option>";
                      }
                    }
                     ?>
          </select>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      
      <hr color="#eeeeee">
      <h6 class="h6 mb-4 text-gray-800">INFORMACIÓN DE CONTACTO</h6>  
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Telefono</label>
        <input type="text" name="telefono" id="telefono" placeholder="1234-1234" class="form-control form-control-sm form-control form-control-sm-sm" required>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Correo Electrónico</label>
        <input type="email" name="correo" id="correo" placeholder="correoEjemplo@gmail.com" class="form-control form-control-sm" required>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Rol Usuario</label>
        <select class="form-control form-control-sm" id="selectRol" name="idRol" required>
          <option>Seleccione</option>
                       <?php 
//codigo siguiente...

                    $objDepto = new Rol();
                    $dat = $objDepto->getAll();
                    if($dat!=null)
                    {
                      foreach ($dat as $val) 
                      {
                        echo "<option value=".$val['id'].">".$val['nombre']."</option>";
                      }
                    }
                     ?>
        </select>
      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Cargo</label>
        <input type="text" name="cargo" id="cargo" placeholder="Escriba cargo de Usuario" class="form-control form-control-sm" required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">

      <hr color="#eeeeee" style="height: 2px;"> 
      <h6 class="h6 mb-4 text-gray-800">SEGURIDAD</h6>  
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Contraseña</label>
  <input type="password" name="password" id="password" placeholder="*************" class="form-control form-control-sm" required>

      </div>
    </div>
    <div class="col-md-3">
      <div class="form-group">
        <label class="col-form-label col-form-label-sm">Repetir Contraseña</label>
        <input type="password" name="passwordR" id="passwordR" placeholder="*************" class="form-control form-control-sm" required>
      </div>
    </div>
  </div>

</div>

      </div>
      <div class="modal-footer">
     <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cerrar</button>
     <button type="submit" class="btn btn-primary btn-sm" id="guardarCambios" value="guardarCambios">Guardar Cambios</button>

      </div>
      </form>
    </div>
  </div>
</div>
    <!-- EDIT -->


<!-- MODALES -->
</html>
