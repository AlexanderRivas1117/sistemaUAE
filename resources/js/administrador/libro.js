$(document).ready(function(){

// $('#informacionAdicional').summernote({

// });
// MASCARAS
// $('#dimensiones').mask('99.99 x 99.99 cm.');
// $('#precio').mask('$99.99');

$("#cerrar").click(function(){
  $('#modalAutor').modal('toggle');

  //$('#nuevoPrestamo').modal('toggle');

  //$('body').addClass('modal-open');

  
  $("#nuevoPrestamo").modal('show');
  $("#nombre").focus();
});

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
          },
          "scrollX": true,
                "pagingType": "numbers",
                "processing": true,
                "serverSide": true,
                "ajax": "column-search/server.php",
                order: [[2, 'asc']],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                 }]
          //fin de la configuracion del data table
      });

var validado = false;
var butonclick = false;


var current = 1,current_step,next_step,steps;
  steps = $("fieldset").length;
  $(".next").click(function(){

    

    
    //validate("info1");
    //ret==1

    // var a = $("#autor").val();
    
      

    
    //alert(dataAutores);

  });

  $("#previous").click(function(){
    current_step = $("#data2").parent();
    next_step = $("#data2").parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });

  setProgressBar(current);

  $("#previousEdit").click(function(){
    current_step = $("#dataEdit2").parent();
    next_step = $("#dataEdit2").parent().prev();
    next_step.show();
    current_step.hide();
    setProgressBar(--current);
  });

  // Change progress bar action
  function setProgressBar(curStep){
    var percent = parseFloat(100 / steps) * curStep;
    percent = percent.toFixed();
    $(".progress-bar")
      .css("width",percent+"%")
      .html(percent+"%");   
  }






$("#nuevo").on('click', function(){

	$("#nuevoPrestamo").modal({backdrop: 'static',keyboard: false});
  //$( "#tags" ).focus();
});

$("#enviar").on('click', function(){
	// validate('infoLibro');
	// butonclick = true;
});

//VALIDAR NUMERO INVENTARIO
$("#numeroInventario").on('change',function(){
  validarNumeroInventario();
});

function validarNumeroInventario()
{
  var numeroInventario = $("#numeroInventario").val();
  $.ajax({
        type: 'POST',
        data: {numeroInventario: numeroInventario, key:'validarNumeroInventario'},
        url: "../../controller/LibroController.php",
        success: function(data)
        {
          data = JSON.parse(data);

          if(data.estado==false)
          {
            swal({
                            title: "Aviso!",
                            text: data.descripcion,
                            timer: 700000,
                            type: 'success',
                            closeOnConfirm: true,
                            closeOnCancel: true
                              }),
                  setTimeout(function(){
                  
                },1000); 
          }
          else
          {
                
                swal({
                            title: "Error!",
                            text: data.descripcion,
                            timer: 1500,
                            type: 'error',
                            closeOnConfirm: true,
                            closeOnCancel: true
                              });
                $("#numeroInventario").val("");              
              }

        },
        error: function(xhr, status)
        {

        }
      });
}

$("#dataEdit1").submit(function( event ) {

event.preventDefault();

  
      //var parametros = $(this).serialize();
      //alert(parametros);

      // if(event.isDefaultPrevented)
      // {

        event.preventDefault();
        // alert("prevent");

        current_step = $(this).parent();
        next_step = $(this).parent().next();
    
        next_step.show();
        current_step.hide();
        setProgressBar(++current);

      // } 
      
    });

$("#data1").submit(function( event ) {

event.preventDefault();

  
      //var parametros = $(this).serialize();
      //alert(parametros);

      // if(event.isDefaultPrevented)
      // {

        event.preventDefault();
        // alert("prevent");

        current_step = $(this).parent();
        next_step = $(this).parent().next();
    
        next_step.show();
        current_step.hide();
        setProgressBar(++current);



        //$("#info1").css("display", "none");
        //$("#info2").css("display", "block");
      // } 
      
    });

$("#enviar").click(function(e){
var evento = e;
  $("#data2").submit(function(ev){
    
    ev.preventDefault();
    evento = ev;  
  });

if(evento.isDefaultPrevented)
    {  
      //var  p = JSON.stringify($('#infoLibro  input,select').serialize();
      guardarDocumento();    
    }

});

$("#guardarCambios").click(function(e){
var evento = e;
  $("#dataEdit2").submit(function(ev){
    
    ev.preventDefault();
    evento = ev;  
  });

if(evento.isDefaultPrevented)
    {  
      //var  p = JSON.stringify($('#infoLibro  input,select').serialize();
      guardarCambios();    
    }

});

function guardarCambios() {
  var dataLibro = JSON.stringify($('#infoLibroEdit').find('select, textarea, input').not(".js-example-basic-multiple").serializeArray());
  //console.log(dataLibro);

  $.ajax({
        type: 'POST',
        data: {dataLibro: dataLibro, key:'guardarCambios'},
        url: "../../controller/LibroController.php",
        success: function(data)
        {
          data = JSON.parse(data);
          console.log(data);
          
          //console.log(data.idLibro['idLibro']);
          if(data.estado==true)
          {
                // var id= data.idLibro['idLibro'];
                // id = parseInt(id);
                swal({
                title: "Exito!",
                text: data.descripcion,
                timer: 1000,
                type: 'success',
                closeOnConfirm: true,
                closeOnCancel: true
                });
                setTimeout(function(){
                  location.reload();
                },1000);
                

          }
          else
          {
            // swal({
            //     title: "Error!",
            //     text: data.descripcion,
            //     timer: 1000,
            //     type: 'error', 
            //     closeOnConfirm: true,
            //     closeOnCancel: true
            //     });
            //     setTimeout(function(){
            //       //location.reload();
            //     },1000);
          }
        },
        error: function(xhr, status)
        {

        }
      }); //FIN AJAX

}


// FIN FUNCION DE VALIDACION

function guardarDocumento() {

  var dataLibro = JSON.stringify($('#infoLibro select,textarea,input').not(".js-example-basic-multiple").serializeArray());
  $(".txtAutor").attr("disabled", false);


  //console.log(JSON.parse(dataLibro));

  $.ajax({
        type: 'POST',
        data: {dataLibro: dataLibro, key:'guardarDocumento'},
        url: "../../controller/LibroController.php",
        success: function(data)
        {
          data = JSON.parse(data);

          
          //console.log(data.idLibro['idLibro']);
          if(data.estado==true)
          {
                // var id= data.idLibro['idLibro'];
                // id = parseInt(id);


                swal({
                title: "Exito!",
                text: data.descripcion,
                timer: 1000,
                type: 'success',
                closeOnConfirm: true,
                closeOnCancel: true
                });
                setTimeout(function(){
                  //location.reload();
                },1000);
                

          }
          else
          {
            swal({
                title: "Error!",
                text: data.descripcion,
                timer: 1000,
                type: 'error', 
                closeOnConfirm: true,
                closeOnCancel: true
                });
                setTimeout(function(){
                  //location.reload();
                },1000);
          }
        },
        error: function(xhr, status)
        {

        }
      });
}


// Buscar Autores

$("#find").on('click', function(){

  //$("#modalAutor").modal({backdrop: 'static',keyboard: false});
  $("#modalAutor").modal('show');
});


$("#txtBusqueda").on('keyup',function(){
  var txtBuscar = $("#txtBusqueda").val();
  if(txtBuscar!="")
  {
    $.ajax({

        type: 'POST',
        data: {txtBuscar: txtBuscar, key:'searchAutor'},
        url: "../../controller/LibroController.php",
        success: function(data)
        {
         
          d = JSON.parse(data);

          if(d[0].estado!=false)
          {

  $("#sinDatos").replaceWith("<tbody id='sinDatos'></body>");

$.each(JSON.parse(data),function(){
  $("#sinDatos").append("<tr><td>"+this.id+"</td><td>"+this.nombre+"</td><td><button type='button' class='btn btn-success  btn-sm seleccionar' id="+this.id+" x-moz-errormessage='"+this.nombre+"'><i class='fas fa-check-circle'></i>&nbsp;</button></td></tr>");
              });
            
          }
          else
          {
$("#sinDatos").replaceWith('<tbody id="sinDatos"><tr><td colspan="3"><h7 class="h9">No se encontraron registros</h7></td></tr></tbody>');           
          } 
        },
        error: function(xhr, status)
        {

        }

        });
  }
  else
  {
    $("#sinDatos").replaceWith('<tbody id="sinDatos"><tr><td colspan="4"><h7 class="h9">No se encontraron registros</h7></td></tr></tbody>');
  }

});

$(document).on("click",".seleccionar",  function(){

  var id = $(this).attr('id');
  var nombre = $(this).attr('x-moz-errormessage');
  var vector=[];
//alert("x="+x+"  y="+y);
  if(x==y & y==0)
  {
    $(".txtAutor").val(nombre);
    $(".txtAutor").attr('id',id);


    $('#modalAutor').modal('toggle');
    
    $(".txtAutor").attr("disabled", true);
    $("#add_field").attr("hidden",false);
    $("#find").attr("hidden",true);
    y++;
  }
  else
  {
    if (x < campos_max && y!=0) {

      $(".txtAutor").attr("disabled", false);

      var dataAutores= JSON.stringify($('#misAutores  input').serializeArray());
      $(".txtAutor").attr("disabled", true);
      var acum=0;
      var valor =0;
      $.each(JSON.parse(dataAutores),function(){

        //valor = JSON.parse(dataAutores);
        valor = this.value;
          vector.push(valor);
         });
         var repetidos = false; 
      $.each(vector,function(){
        if(this==id)
        {
          repetidos=true;
        }
         }); 

              if(repetidos==false)
              { 
                $('#listas').append('<div class="col-md-3">\
                                <label>Autor</label>\
                                <input type="text" name="campo'+numCaja+'" class="form-control txtAutor" value="'+id+'"id="autor'+numCaja+'">\
                                <a href="#" class="remover_campo">Remover</a>\
                                </div>');
                        x++;
                        $('#modalAutor').modal('toggle');
              }
              else
              {
                swal({
                            title: "Aviso!",
                            text: "Autor ya está agregado!",
                            timer: 700000,
                            type: 'error',
                            closeOnConfirm: true,
                            closeOnCancel: true
                              }),
                  setTimeout(function(){
                  
                },1000); 
              }
              // }


              
          
                
                }
  }

  

   numCaja++;
    });
$("#autores").on('input',function(){
  var va = $("#autores").val();
  if(va=="" || va <=0)
  {
    $("#more").attr("disabled", true);
  }
});
// Agregar nuevo autor
$("#more").on('click',function(){
  
  $("#modalAutor").modal({backdrop: 'static',keyboard: false});
   $("#sinDatos").replaceWith('<tbody id="sinDatos"><tr><td colspan="4"><h7 class="h9">Sin registros</h7></td></tr></tbody>');
   $("#txtBusqueda").val("");
});

$(document).on("click",".Editar",  function(){

  var id = $(this).attr('id');
 
  $("#edit").modal({backdrop: 'static',keyboard: false});
  $.ajax({
        type: 'POST',
        data: {id: id, key:'editar'},
        url: "../../controller/LibroController.php",
        success: function(data)
        {
          data = JSON.parse(data);
          console.log(data);

          $("#nombreE").val(data[0].titulo);
          $("#cantidadPaginasE").val(data[0].cantidadPaginas);
          $("#informacionAdicionalE").val(data[0].informacionAdicional);
          $("#terminosResumenE").val(data[0].epigrafe);
          $("#numeroEdicionE").val(data[0].numeroEdicion);
          $("#referenciaDigitalE").val(data[0].referenciaDigital);

          $("#fechaPublicacionE").val(data[0].fechaPublicacion);
          $("#idiomaE").val(data[0].idioma);
          $("#isbnE").val(data[0].isbn);
          $("#editorialE").val(data[0].idEditorial);
          $("#paisE").val(data[0].idPais);
          $('#paisE').select2().trigger('change');
          $("#tipoColeccionE").val(data[0].idTipoColeccion);
          $("#tipoDocumentoE").val(data[0].idTipoLiteratura);
          $("#iscnE").val(data[0].iscn);
          $("#dimensionesE").val(data[0].iscn);
          $("#asesorE").val(data[0].asesor);
          $("#numeroClasificacionE").val(data[0].clasificacion);
          $("#libristicaAutorE").val(data[0].libristica);
          $("#detallesFisicosE").val(data[0].detallesFisicos);
          $("#notasE").val(data[0].notas);
          $("#tablaContenidoE").val(data[0].contenido);
          $("#autorE").val(data[0].autor);
          $("#numeroInventarioE").val(data[0].numeroInventario);
          $("#fechaAdquisicionE").val(data[0].fechaAdquisicion);
          $("#precioE").val(data[0].precio);
          $("#facilitanteE").val(data[0].facilitante);
          $("#entregoE").val(data[0].entrego);
          $("#fechaEntregaE").val(data[0].fechaEntrega);
          $("#formaAdquisicionE").val(data[0].formaAdquisicion);
          $("#volumenE").val(data[0].volumen);
          $("#idInventarioE").val(data[0].idInventario);
          $("#idLibroE").val(id);
        },
        error: function(xhr, status)
        {

        }
      });

});

$(document).on("click",'.Eliminar',function(){
  var idLibro = $(this).attr('id');
  //alert(idLibro);

swal({ 
title: "¿Desea Eliminar?",
text: "El documento será eliminado",
type: "warning",
showCancelButton: true,
confirmButtonColor: "#DD6B55",
confirmButtonText: "Aceptar",
cancelButtonText: "Cancelar", 
closeOnConfirm: false,
closeOnCancel: false },

function(isConfirm){ 
if (isConfirm) 
{
      

    $.ajax({
        type: 'POST',
        data: {idLibro: idLibro, key:'eliminarLibro'},
        url: "../../controller/LibroController.php",
        success: function(data)
        {
          data = JSON.parse(data);
          //console.log(data);
          if(data.estado==false)
          {
            swal({
                            title: "Error!",
                            text: data.descripcion,
                            timer: 1500,
                            type: 'error',
                            closeOnConfirm: true,
                            closeOnCancel: true
                              });
          }
          else
          {
                swal({
                            title: "Aviso!",
                            text: data.descripcion,
                            timer: 700000,
                            type: 'success',
                            closeOnConfirm: true,
                            closeOnCancel: true
                              }),
                  setTimeout(function(){
                  //location.reload();
                },1000);  
              }

        },
        error: function(xhr, status)
        {

        }
      });
} 
else 
{ 
swal("¡Aviso!", 
"Eliminar Cancelado...", 
"warning"); 

} 

});      





}); //fin eliminar

//EDITAR

//FIN EDITAR

  //FIN
});






