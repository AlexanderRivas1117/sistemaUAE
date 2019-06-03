<?php 


require_once realpath (dirname (__FILE__).'/../../model/Libro.php');


//require_once'head.php';

 ?>
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

  <title>UAE -Gestión de Libros</title>
 

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
          <h1 class="h3 mb-2 ">Gestión de Libros</h1>
          <p class="mb-4">Permite gestionar los documentos del Sistema Bibliotecario</p>

          <div class="d-sm-flex align-items-rigth justify-content-between mb-4 col-md-offset-8">
            
            <button type="button" class="d-none d-sm-inline-block btn  btn-primary shadow-sm" id="nuevo" value="nuevo"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Nuevo Libro</button>


           
          </div>
          <div class="d-sm-flex align-items-rigth justify-content-between mb-4 col-md-offset-8">
           

          </div>
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Datos de Libros</h6>
            </div>
            <div class="card-body">
              
                <!-- INICIO -->
                <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="listadoLibros" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Número Inventario</th>
                      <th>Nombre Libro</th>
                      <th>Autor(es)</th>
                      <th>Editorial</th>
                      <!-- <th>Pais</th> -->
                      <th>Tipo Colección</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Número Inventario</th>
                      <th>Nombre Libro</th>
                      <th>Autor(es)</th>
                      <th>Editorial</th>
                      <!-- <th>Pais</th> -->
                      <th>Tipo Colección</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                  <tbody>

                   <?php 
                            $objLibro = new Libro();
                            $data = $objLibro->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                            <td class=''>".$value['numeroInventario']."</td>
                                            <td class=''>".$value['nombre']."</td>
                                            <td class=''>".$value['detalleautorID']."</td>
                                            <td class=''>".$value['editorial']."</td>
                                            
                                            <td class=''>".$value['tipoColeccion']."</td>
                                            <td>
                                                
                                                

                                                <button type='button' class='btn btn-info btn-circle Editar' id='".$value['id']."' value='Editar'><i class='fas fa-edit'></i></button>
                                                <button type='button' class='btn btn-danger btn-circle Eliminar' id='".$value['id']."' value='Eliminar'><i class='fas fa-trash'></i></button>
                                                
                                            </td>
                                          </tr>";
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
  
<script type="text/javascript" src="../../resources/js/administrador/libro.js"></script>
<script type="text/javascript" src="../../resources/jQueryMask/dist/jquery.mask.js"></script>


<!-- AUTOCOMPLETE -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->


<script src="../../resources/select2/dist/js/select2.min.js"></script>






 

</body>


<!-- MODALES --> 

<!-- NUEVO LIBRO -->
<div class="modal fade bd-example-modal-lg" id="nuevoPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" style="width: 3000px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Libro</h5>
      </div>
      <div class="modal-body"  id="modal-body " style="max-height: calc(110vh - 190px);
    overflow-y: auto;">

 <style type="text/css">
  /*#regiration_form form:not(:first-of-type) {
    display: none;
  }*/
  #info2  {
    display: none;
  }
  
  </style>
<!-- AQUI -->
<div id="infoLibro">
  <fieldset id="info1">
<form id="data1" method="POST" action="#" autocomplete="off">
    <h6 class="h6 mb-4 ">INFORMACION DEL LIBRO</h6>  
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">

          <label class="" for="nombre">Título de Documento</label>
          <input type="text" class="form-control required form-control-sm " id="nombre" name="nombre" placeholder="Titulo">
          

        </div>
      </div>


      <div class="col-md-5">
        <div class="form-group">
          <label class="" for="tituloParalelo">Titulo Paralelo</label>
          <input type="text" class="form-control required form-control-sm " id="tituloParalelo" name="tituloParalelo" placeholder="Titulo Paralelo">
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label class=""for="cantidadPaginas">Cant. Págs.</label>
<input type="number" class="form-control required form-control-sm" id="cantidadPaginas" name="cantidadPaginas" placeholder="Nº págs">
        </div>
      </div>
      <div class="col-md-5">
        <div class="form-group">
          <label class=""for="informacionAdicional">Información Adicional</label>
          <input type="textarea" class="form-control form-control-sm" id="informacionAdicional" name="informacionAdicional" placeholder="Información Adicional">
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label class=""for="terminosResumen">Epígrafe</label>
          <input type="text" class="form-control noRequired form-control-sm " id="terminosResumen" name="terminosResumen" placeholder="Epígrafe">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="numeroEdicion">Número de Edición</label>
          <input type="number" class="form-control required form-control-sm " id="numeroEdicion" name="numeroEdicion" placeholder="Nº Edición">
        </div>
      </div>
    </div>
    <div class="row">    
      <div class="col-md-5">
        <div class="form-group">
          <label class=""for="referenciaDigital">Referencia Digital</label>
          <input type="text" class="form-control required form-control-sm " id="referenciaDigital" name="referenciaDigital" placeholder="Referencia Digital">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="fechaPublicacion">Fecha publicación</label>
          <select class="form-control form-control-sm"" id="fechaPublicacion" name="fechaPublicacion">
            <option>Seleccione</option>
                      <?php 

                      for ($i=2019 ; $i >=  1950 ; $i--) { 
                       ?>
                       <option><?php echo $i ?></option>
                       <?php 
                        }
                        ?>
          </select>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="idioma">Idioma</label>
          <select class="form-control form-control-sm"" id="idioma" name="idioma">
            <option value="">Seleccione</option>
            <option value="1">spa.</option>
            <option value="2">ing.</option>         
          </select>
        </div>
      </div>

    </div>
    <div class="row">


      <div class="col-md-3">
        <div class="select2-container">
          <label class="" for="editorial">Editorial</label>
              <select id="editorial" name="editorial" class="js-example-basic-single form-control-sm" required="true" style="width: 100%;">


                
                <option value="">Seleccione</option>
              </select>
        </div>
      </div> 

      <!-- <div class="col-md-3">
        <div class="form-group">
          <label class=""for="fechaIso">Fecha ISO</label>
          <input type="date" class="form-control required form-control-sm " id="fechaIso" name="fechaIso" placeholder="Fecha ISO">
        </div>
      </div> -->
      
      

      <div class="col-md-3">
        <div class="form-group">
          <label class="" for="dimensiones">Dimensiones del Libro</label>
          <input type="text" class="form-control form-control-sm" id="dimensiones" name="dimensiones" placeholder="Dimensiones" data-inputmask="'mask': '9999 x 9999'">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="isbn">ISBN</label>
          <input type="text" class="form-control required form-control-sm " id="isbn" name="isbn" placeholder="Isbn">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="iscn">ISCN</label>
          <input type="text" class="form-control required form-control-sm " id="iscn" name="iscn" placeholder="Iscn">
        </div>
      </div>
  
      <div class="col-md-3">
        <div class="form-group">
        <label class="" for="pais">Pais</label>
        <select id="pais" name="pais" class="js-example-basic-single" required="true" style="width: 100%;">
          <option value="">Seleccione</option>
        </select>
      </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
        <label class="">Tipo Coleccion</label>
        <select id="tipoColeccion" name="tipoColeccion[]" class="js-example-basic-single form-control-sm" required="true" style="width: 100%;">
          <option value="">Seleccione</option>
        </select>
      </div>
      </div>
      <div class="col-md-3">
        <div class="form-group required">
        <label class="">Tipo Literatura</label>
        <select id="tipoLiteratura" name="tipoLiteratura[]" class="js-example-basic-single form-control-sm" required="true" style="width: 100%;">
          <option value="">Seleccione</option>
        </select>
      </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class="" for="asesor">Asesor</label>
          <input type="text" class="form-control required form-control-sm " id="asesor" name="asesor" placeholder="Asesor">
        </div>
      </div>
    </div>
    <div class="row">

      <div class="col-md-3">
        <div class="form-group">
          <label class="" for="notas">Área de las notas</label>
          <input type="text" class="form-control required form-control-sm " id="notas" name="notas" placeholder="Notas">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label class="" for="numeroClasificacion">Nº de Clasificación</label>
          <input type="text" class="form-control required form-control-sm " id="numeroClasificacion" name="numeroClasificacion" placeholder="Número de Clasificación">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label class="" for="libristicaAutor">Librística del Autor</label>
          <input type="text" class="form-control required form-control-sm " id="libristicaAutor" name="libristicaAutor" placeholder="Librística del Autor">
        </div>
      </div>

      <div class="col-md-3">
        <div class="form-group">
          <label class="" for="detallesFisicos">Detalles Físicos</label>
          <select class="form-control form-control-sm " id="detallesFisicos" name="detallesFisicos">
              <option value="">Seleccione</option>
              <option value="col">Col.</option>
              <option value="b y n">B & N</option>
        
        </select>
        </div>
      </div>
      
      
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label class="" for="tablaContenido">Tabla de Contenido</label>
          <textarea class="form-control" id="tablaContenido" rows="4" name="tablaContenido"></textarea>        
        </select>
        </div>
      </div>
    </div>
    
    <div class="row" id="misAutores">
      <div class="col-md-4 grupos">
        <div class="form-group"> 
          <label class="">Autor</label>
        <select id="autor" name="autor" multiple="multiple" class="js-example-basic-multiple form-control-sm" style="width: 100%" required>
            
          </select>
        </div>

        
        </div>
    </div>
<section class="row">
  <h1 class="col-md-9"></h1>

  
<div class="btn-group col-md-3" role="group">
    <p class="float-left">
      <a>
        <button type="button" name="close" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </a>
      <a>
        <button type="submit" name="siguiente" class="next btn btn-info" value="Next" id="siguiente">Siguiente</button>
      </a>
    </p>
  </div>
</section>



 
 
     </form>

  </fieldset>

  <fieldset id="info2">
<form id="data2" method="POST">
  

    <h4 class="h4">LIBRO EN INVENTARIO</h4>
    <div class="row">     
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="numeroInventario">Número Inventario</label>
          <input type="text" class="form-control form-control-sm " id="numeroInventario" name="numeroInventario" placeholder="Nº Inventario" required="true">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="fechaAdquisicion">Fecha Adquisición</label>
          <input type="date" class="form-control required form-control-sm " id="fechaAdquisicion" name="fechaAdquisicion" placeholder="Fecha Adquisición" >

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="precio">Precio</label>
          <input type="text" class="form-control required form-control-sm " id="precio" name="precio" placeholder="$00.00" required>
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="facilitante">Facilitante</label>
          <input type="text" class="form-control required form-control-sm " id="facilitante" name="facilitante" placeholder="facilitante">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="entrego">Entregó</label>
          <input type="text" class="form-control required form-control-sm " id="entrego" name="entrego" placeholder="Entregó">
        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">
          <label class=""for="fechaEntrega">Fecha Entrega</label>
          <input type="date" class="form-control required form-control-sm " id="fechaEntrega" name="fechaEntrega" placeholder="Fecha Entrega">
        </div>
      </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="" for="formaAdquisicion">Forma Adquisición</label>
                <select class="form-control  form-control-sm " id="formaAdquisicion" name="formaAdquisicion">
                      <option value="">Seleccione</option>
                      <option value="compra">Compra</option>
                      <option value="donación">Donación</option>
        </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class=""for="volumen">Volumen</label>
                <!-- <input type="number" class="form-control required form-control-sm " id="volumen" name="volumen" placeholder="Volumen"> -->
                <select id="volumen" class="form-control form-control-sm" name="volumen">
                  <option value="1">I</option>
                  <option value="2">II</option>
                  <option value="3">III</option>
                  <option value="4">IV</option>
                  <option value="5">V</option>
                  <option value="6">VI</option>
                  <option value="7">VII</option>
                  <option value="8">VII</option>
                  <option value="9">IX</option>
                  <option value="10">X</option>

                </select>
            </div>
        </div>
    </div>
    <div class="row">
        
    </div>
    <button type="button" name="previous" class="previous btn btn-info" value="Previous" style="margin-left: 520px;">Anterior</button>
    <button type="button" class="btn btn-danger" name="clo" data-dismiss="modal" >Cerrar</button>
    <button type="submit" id="enviar" name="submit" class="submit btn btn-success" value="Submit">Enviar</button>

   
    </form>

  </fieldset>
  </form>
  </div>
</div>
<!-- AQUI -->
<!-- TABLA DATOS USUARIO -->
      </div>

    </div>
  </div>
</div>
<!-- FIN NUEVO LIBRO -->
   <!-- EDITAR LIBRO -->
  <div class="modal fade" id="modalAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buscar Autores</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
<div class="row">
  <div class="col-md-10">
    <div class="form-group">
      <label>Buscar:</label>
<input type="text" id="txtBusqueda" name="txtBusqueda" placeholder="Ingrese lo que desea buscar.." class="form-control" required="true">
    </div>
  </div>
  <div class="col-md-1" style="padding-left: 0px; margin-top: 3px; margin-left: 10px">
    <br>
    <button type="button" class="btn btn-success btn-sm" id="btnNuevo" value="nuevo">Nuevo</button>
  </div>

</div>

<br>

<!-- TABLA LIBROS -->
<DIV class="row">

  <div class="col-md-12 table-responsive">
     <table class="table table-bordered" id="listadoLibros" width="100%" cellspacing="0">
        <th>Código Autor</th>
        <th>Nombre</th>
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



<script>
$(document).ready(function() {

// SELECT DE AUTORES
    $.ajax({
     url: "../../controller/LibroController.php",
    method: 'POST',
    data: {key:'searchAutor2'},
    success: function (d) {  
      d = JSON.parse(d);             
        $('#autor').select2({
            data: d,
            language: 'es',
            dropdownParent: $('#nuevoPrestamo'),
            placeholder: 'Seleccione'

        });
    }
  });

// SELECT DE EDITORIAL

$.ajax({
     url: "../../controller/LibroController.php",
    method: 'POST',
    data: {key:'selectEditorial'},
    success: function (d) {  
      d = JSON.parse(d);             
        $('#editorial').select2({
            data: d,
            language: 'es',
            dropdownParent: $('#nuevoPrestamo'),
            placeholder: 'Seleccione'
        });
    }
  });

//SELECT TIPO COLECCION


$.ajax({
     url: "../../controller/LibroController.php",
    method: 'POST',
    data: {key:'tipoColeccion'},
    success: function (d) {  
      d = JSON.parse(d);                  
        $('#tipoColeccion').select2({
            data: d,
            language: 'es',
            dropdownParent: $('#nuevoPrestamo'),
            placeholder: 'Seleccione'
        });
    }
  });

// SELECT PAIS

$.ajax({
     url: "../../controller/LibroController.php",
    method: 'POST',
    data: {key:'selectPais'},
    success: function (d) {  
      d = JSON.parse(d);           
        $('#pais').select2({
            data: d,
            language: 'es',
            dropdownParent: $('#nuevoPrestamo'),
            placeholder: 'Seleccione'
        });
    }
  });

// SELECT TIPO LITERATURA

$.ajax({
     url: "../../controller/LibroController.php",
    method: 'POST',
    data: {key:'tipoLiteratura'},
    success: function (d) {  
      d = JSON.parse(d);         
        $('#tipoLiteratura').select2({
            data: d,
            language: 'es',
            dropdownParent: $('#nuevoPrestamo'),
            placeholder: 'Seleccione'
        });
    }
  });


});
</script>


<!-- FIN EDITAR -->
<!-- MODALES -->
</html>
