<?php 


require_once realpath (dirname (__FILE__).'/../../app/config.php');

if ($_REQUEST['libre']=="" && $_REQUEST['titulo']=="" && $_REQUEST['autor']=="" && $_REQUEST['anio'] == "" && $_REQUEST['dewey']=="") {

    if (isset($_REQUEST['user'])) {
       header('Location: ../../indexUser.php?estado=false');
    }
    else
    {
      header('Location: buscador.php?estado=false');
    }
                             
}
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

  <title>UAE -Resultados de Búsqueda</title>
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
<style>
.greenL {
  border-left: 3px solid green;
  height: 100%;
  padding-left: 10px;
}
</style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->

   <?php 

if (!isset($_REQUEST['user'])) {
  include'menu.php'; 
}
   

   ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <br>
          <h1 class="h3 mb-2 ">Resultados de Búsqueda</h1>
          <p class="mb-4">A continuación se muestran los resultados que coinciden con su búsqueda</p>

          <div class="row">
                <div class="col-md-9">
                  <div class="float-md-left">
                    <?php 

                  if (!isset($_REQUEST['user'])) {
                     ?>
                    <a href="buscador.php" class="btn btn-success"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;Volver</a>  
                    <?php 

                  }
                  else
                  {
                     ?>                
                     <a href="../../indexUser.php" class="btn btn-success"><i class="fas fa-long-arrow-alt-left"></i>&nbsp;Volver</a>  
                   <?php } ?>
                  </div>
                </div>
          </div>
              <br>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Resultados</h6>
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
                            $con = conectar();
                            $sql = "";
                            $campos = "SELECT iv.numeroInventario,l.nombre as titulo, l.autor,l.fechaPublicacion, concat_ws('',l.clasificacion,l.libristica) as dewey,l.idTipoColeccion as tipoColeccion,l.idEditorial as editorial,l.id";
                            $innerJoin = " from libro l inner join inventario iv on iv.idLibro=l.id ";
                            $limit = " LIMIT 100";
                            $where = "";
                            if ($_REQUEST['tipoColeccion']!='todos') {
                              $where = " WHERE l.idTipoColeccion like concat('%','".$_REQUEST['tipoColeccion']."', '%') ";
                            }
                            else
                            {
                              $where .= " WHERE ";
                            }


                            if ($_REQUEST['libre']!='') {
                              if ($_REQUEST['tipoColeccion']!='todos') {
                                $where .= " AND ";
                              }
                            
                            $where .= "(l.nombre like concat('%','".$_REQUEST['libre']."', '%')";
                            $where .= " OR l.autor like concat('%','".$_REQUEST['libre']."', '%')";
                            $where .= " OR l.nombre like concat('%','".$_REQUEST['libre']."', '%')";
                            $where .= " OR l.fechaPublicacion like concat('%','".$_REQUEST['libre']."', '%')";
                            $where .= " OR concat_ws('',l.clasificacion,l.libristica) like concat('%','".$_REQUEST['libre']."', '%') )";


                              $sql .= $campos.$innerJoin.$where.$limit;
                              $palabra = $_REQUEST['libre'];
                            }
                            else
                            {


                              if ($_REQUEST['titulo']!='') {
                                if ($_REQUEST['tipoColeccion']!='todos') {
                                  $where .= " AND ";
                                }
                            $where .= "l.nombre like concat('%','".$_REQUEST['titulo']."', '%')";
                            $sql .= $campos.$innerJoin.$where.$limit;
                            $palabra = $_REQUEST['titulo'];
                              }


                              if ($_REQUEST['autor']!='') {
                                if ($_REQUEST['tipoColeccion']!='todos') {
                                  $where .= " AND ";
                                }
                            $where .= "l.autor like concat('%','".$_REQUEST['autor']."', '%')";
                            $sql .= $campos.$innerJoin.$where.$limit;
                            $palabra = $_REQUEST['autor'];
                              }

                              if ($_REQUEST['anio']!='') {
                                if ($_REQUEST['tipoColeccion']!='todos') {
                                  $where .= " AND ";
                                }
                            $where .= "l.fechaPublicacion like concat('%','".$_REQUEST['anio']."', '%')";
                            $sql .= $campos.$innerJoin.$where.$limit;
                            $palabra = $_REQUEST['anio'];
                              }
                             
                             if ($_REQUEST['dewey']!='') {
                                if ($_REQUEST['tipoColeccion']!='todos') {
                                  $where .= " AND ";
                                }
                            $where .= "concat_ws('',l.clasificacion,l.libristica) like concat('%','".$_REQUEST['dewey']."', '%')";
                            $palabra = $_REQUEST['dewey'];
                            
                            $sql .= $campos.$innerJoin.$where.$limit;
                              }
                            
                              


                             

                            }

                            $data = $con->query($sql);
                            // $data = $data->fetch_assoc();
                            // var_dump($data);
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                            <td class=''>".$value['numeroInventario']."</td>
                                            <td class=''>".$value['titulo']."</td>
                                            <td class=''>".$value['autor']."</td>
                                            <td class=''>".$value['editorial']."</td>
                                            
                                            <td class=''>".$value['tipoColeccion']."</td>
                                            <td>
                                                
                                                

                                                <button type='button' class='btn btn-info btn-circle info btn-sm' id='".$value['numeroInventario']."' value='Info'><i class='fas fa-info'></i></button>
                                                
                                                
                                            </td>
                                          </tr>";
                                }
                            }
                            else
                            {
                              echo $con->error;
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

<script type="text/javascript" src="../../resources/jQueryMask/dist/jquery.mask.js"></script>


<!-- AUTOCOMPLETE -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->


<script src="../../resources/select2/dist/js/select2.min.js"></script>

<script src="highLight.js"></script>



<style type="text/css">
  .highlight { background-color: yellow }
</style>
 

</body>


<!-- MODALES --> 





<script>
$(document).ready(function() {
$("#listadoLibros").DataTable({

          "language": {
              "sProcessing":    "Procesando...",
              "sLengthMenu":    "Mostrar _MENU_ registros",
              "sZeroRecords":   "No se encontraron resultados",
              "sEmptyTable":    "Ningún dato disponible en esta tabla",
              "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
              "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
              "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
              "sInfoPostFix":   "",
              "sSearch":        "Buscar:",
              "sUrl":           "",
              "sInfoThousands":  ",",
              "sLoadingRecords": "Cargando...",
              "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":    "Último",
                  "sNext":    "Siguiente",
                  "sPrevious": "Anterior"
              },
              "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
              }
          }
          //fin de la configuracion del data table
      });

// function buscar(que)
// {
//     $('.indexable li').hide(0,function(){ //Oculta todos los resultados

//         if($('.indexable:animated').length===0) //Previene repeticiones de la animacion
//         {
//                 $('.indexable li:contains('+que+')').show() //Muestra solo los objetos que coinciden con el resultado
//         }
//     })

// }

// $("#listadoLibros:contains('sdf')").find('td').css('color','blue');

// $('#listadoLibros').text().highlight('sdf');

$('#listadoLibros td').highlight('<?php echo $palabra ?>');

$(document).on('click','.page-link',function(){
  $('#listadoLibros td').highlight('<?php echo $palabra ?>');
});

//INFO LIBRO
$(document).on("click",".info",function(){

  // $("#nuevoPrestamo").hide();
  

  var id = $(this).attr('id');


  $.ajax({
    type: 'POST',
    data: {id:id,key:'getInfo'},
    url: '../../controller/LibroController.php',
    success: function (data) {
      data = JSON.parse(data);
      console.log(data);
      // alert(data.nombre);
      $("#txtNombre").html(data[0].nombre);
      $("#txtAutor").html(data[0].autor);
      $("#txtInventario").html(id);
      $("#txtClasificacion").html(data[0].clasificacion);
      $("#txtEpigrafe").html(data[0].epigrafe);
      $("#txtEdicion").html(data[0].edicion);
      $("#txtEditorial").html(data[0].editorial);
      $("#txtAsesor").html(data[0].asesor);
      $("#txtFecha").html(data[0].fecha);
      $("#txtContenido").html(data[0].contenido);


      $('#modalInventario').modal('toggle');
      $("#modalInfo").modal({backdrop: 'static',keyboard: false});

    }
  });

});

$("#cerrarInfo").click(function(){

  $("#modalInventario").modal("show");
  $('#modalInfo').modal('toggle');
  // $('#modalInventario').show();

  // $("#modalInventario").show();
    
});



});
 

</script>
<!-- MODALES -->

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

</html>
