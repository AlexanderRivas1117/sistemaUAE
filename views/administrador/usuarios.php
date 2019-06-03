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

  <title>UAE - Agregar Usuarios</title>

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
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control form-control-sm"  bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

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
