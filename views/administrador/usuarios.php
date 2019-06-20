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

  <title>UAE | Agregar Usuarios</title>
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

   <?php include'menu.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar Usuarios</h1>
          <p class="mb-4">Permite agregar nuevos usuarios al Sistema Bibliotecario</p>

          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Datos de Usuario</h6>
            </div>
            <div class="card-body">
              <form method="post" id="dataUsuario">
                
              
             <!-- INICIO -->
             <div class="row">
                <div class="col-md-12">
                 
         
                  <h6 class="h6 mb-4 text-gray-800">DATOS PERSONALES</h6>  
                </div>
              </div>

              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Carnet</label>
                    
                    <input type="text" name="carnet" class="form-control form-control-sm"" placeholder="ABC-123" id="carnet">
                    
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Nombres</label>

                    <input type="text" name="nombre" class="form-control form-control-sm"" placeholder="Escriba sus nombres" id="nombre" required>


                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Apellidos</label>
                    <input type="text" name="apellido" id="apellido" class="form-control form-control-sm"" placeholder="Escriba sus apellidos">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <div class="form-group">
                    <label>Genero</label><br>
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Edad</label>
                    <select class="form-control form-control-sm"" id="selectEdad" name="idEdad">
                      <option>Seleccione</option>
                      <?php 

                      for ($i=10; $i < 80 ; $i++) { 
                       ?>
                       <option><?php echo $i ?></option>
                       <?php 
                        }
                        ?>
                      </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control form-control-sm"" placeholder="Escriba su direccion">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">

                    
                    <label>Departamento</label>
                    <select class="form-control form-control-sm"" id="selectDepartamento" name="idDepartamento">
                       <option>Seleccione</option>
                       
                      
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
                    <label>Municipio</label>
                    <select class="form-control form-control-sm"" id="selectMunicipio" name="idMunicipio">
                       <option>Seleccione</option>
                       <option>Nahuilingo</option>
                      </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Tipo Usuario</label>
                    <select class="form-control form-control-sm"" id="selectUsuario" name="idTipoUsuario">
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
                    <label>Carrera</label>
                    <select class="form-control form-control-sm"" id="selectCarrera" name="idCarrera">
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
                <br>
                <div class="col-md-12">
                  
                  <hr color="#eeeeee">  
                  <h6 class="h6 mb-4 text-gray-800">INFORMACIÓN DE CONTACTO</h6>  
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Telefono</label>
                    <input type="text" name="telefono" id="telefono" placeholder="1234-1234" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" placeholder="correoEjemplo@gmail.com" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Rol Usuario</label>
                    <select class="form-control form-control-sm"" id="selectRol" name="idRol">
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
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Cargo</label>
                    <input type="text" name="cargo" id="cargo" placeholder="Escriba cargo de Usuario" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <div class="row">
                <br>
                <div class="col-md-12">
                  
                  <hr color="#eeeeee">  
                  <h6 class="h6 mb-4 text-gray-800">SEGURIDAD</h6>  
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="*************" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Repetir Contraseña</label>
                    <input type="password" name="passwordR" id="passwordR" placeholder="*************" class="form-control form-control-sm">
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2 col-md-offset-4">
                  <div class="form-group">
                    <button type="reset" class="btn btn-danger btn-lg" value="limpiar"><span class="icon text-white-50">
                      <i class="fas fa-trash"></i>
                    </span>&nbsp;Limpiar</button>
                  </div>
                </div>  
                <div class="col-md-2 col-md-offset-0">
                  <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg" id="registrar" value="registrar"><span class="icon text-white-50">
                      <i class="fas fa-check"></i>
                    </span>&nbsp;Registrar</button>
                  </div>
                </div>
                              
              </div>

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
  <script type="text/javascript" src="../../resources/js/administrador/usuario.js"></script>

</body>

<!-- MODALES --> 
    <!-- EDIT -->
   
    <!-- EDIT -->


<!-- MODALES -->
</html>
