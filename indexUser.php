
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Biblioteca UAE | Busqueda</title>
  <link rel = "icon" type = "image/png" href = "logo_UAE.JPG">

  <!-- Custom fonts for this template-->
  <!-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

  <!-- Custom styles for this template-->
   <link href="/sistemaUAE/resources/bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<style type="text/css">
  /*body { zoom:80% }*/
</style>

<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark navbar-static-top" style="background-color:  #e74a3b!important;">
  <a class="navbar-brand" href="#">UAE | Biblioteca</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/sistemaUAE/indexUser.php">BUSCADOR <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          SERVICIOS
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="views/carta_servicios.php">Carta de Servicios</a>
          <!-- <a class="dropdown-item" href="views/carta_servicios.php">Carta de Servicios</a> -->
          <a class="dropdown-item" href="views/horarios.php">Horarios de Atención</a>
          <a class="dropdown-item" href="views/contactenos.php">Contáctenos</a>
          <!-- <a class="dropdown-item" href="#">Another action</a> -->
          <!-- <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a> -->
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
    </ul>
    <span class="navbar-text">
      Sistema Biblioteca Einstein
    </span>
  </div>
</nav>

<body class="bg-gradient-primary">

  <div class="container" style="padding-top: 1px;">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">

          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
           
            <div class="p-5">
              <div class="text-left">

                <h2 class="h4 text-gray-900 mb-4">Bienvenido al Sistema Biblioteca Einstein &nbsp; <img src="logo_UAE.JPG" height="70" width="70" class="rounded"></h2>
                
              </div>
              <div class="text-right">
   
</div>
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
              <form action="views/administrador/resultados.php" method="GET" autocomplete="off" class="user">
                <div class="row">
                  <div class="col-md-12">
                  <div class="form-group">
                    <label class="col-form-label">Tipo Coleccion</label>
                    <select id="tipoColeccion" name="tipoColeccion" class="custom-select custom-select-md mb-3 form-control-sm">
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

                <div class="form-group row">
                  <div class="col-sm-12 mb-6 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="libre" placeholder="Búsqueda por título, autor, editorial, tabla de contenido, epígrafe" name="libre">
                  </div>
                  
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control input-sm form-control-user" id="titulo" placeholder="Búsqueda por título" name="titulo">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control form-control-user" id="titulo" placeholder="Búsqueda por Autor/a" name="autor">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control form-control-user" id="editorial" placeholder="Búsqueda por Editorial" name="editorial">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="titulo" placeholder="Búsqueda por año" name="anio">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="titulo" placeholder="Búsqueda por Dewey" name="dewey">
                  </div>

                </div>

                <div class="form-group row">
                  <div class="col-sm-12">
                    <input type="text" class="form-control form-control-user" id="epigrafe" placeholder="Búsqueda por Epígrafe" name="epigrafe">
                  </div>
                </div>
                
                <input type="hidden" name="user">
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <button type="reset" class="btn btn-danger btn-user btn-block">
                    LIMPIAR
                    </button>
                  </div>
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                  BUSCAR DOCUMENTO
                    </button>
                  </div>
                </div>
                

               
              </form>
              <hr>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <!-- <script src="vendor/jquery/jquery.min.js"></script> -->
  <!-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript-->
  <!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages-->
  <!-- <script src="js/sb-admin-2.min.js"></script> -->

  <script src="resources/bootstrap/vendor/jquery/jquery.min.js"></script>
  <script src="resources/bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
