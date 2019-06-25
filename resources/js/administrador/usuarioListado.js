$(document).ready(function(){



	$("#listado").DataTable({
    
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
                "ajax": "server-usuario/server2.php",
                order: [[2, 'asc']],
                columnDefs: [{
                    targets: "_all",
                    orderable: false
                 }]
          //fin de la configuracion del data table
      });
  
	$(document).on('click','.editar',function(){

		var data = $(this).attr('id');
    var idMunicipio = 0;
		$.ajax({
                type: 'POST',
                dataType: 'json',
                data: {data:data, key:'getInfo'},
                url: "../../controller/UsuarioController.php",
                success: function (data)
                {
                    $.each(data,function(){
						$("#carnet").val(this.carnet);
						$("#nombre").val(this.nombre);
						$("#apellido").val(this.apellido);
						$('input[name=genero][value="'+this.genero+'"]').attr('checked', true); 
            $("#selectEdad").val(this.edad);
            $("#selectDepartamento").val(this.idDepartamento);
            $("#direccion").val(this.direccion);
            $("#selectUsuario").val(this.idTipoUsuario);
            $("#selectCarrera").val(this.idCarrera);
            $("#telefono").val(this.telefono);
            $("#correo").val(this.correo);
            $("#selectRol").val(this.idRol);
            $("#cargo").val(this.cargo);
            
            
            $("#idUsuario").val(this.id);
            idMunicipio= this.idMunicipio;
            //alert("ID Municipio:"+idMunicipio);
 //$("#selectMunicipio").val(idMunicipio);                                        

					});   

                    $("#editarUsuario").modal({backdrop: 'static',keyboard: false});  
                    //$("#selectMunicipio").empty();
                    
                    var departamentoId = $("#selectDepartamento").val();
    
// LLENAR SELECT MUNICIPIO
    $.ajax({

            type: 'POST',
            data: {departamentoId: departamentoId, key:'selectMunicipio'},
            url: "../../controller/DepartamentoController.php",
            success: function(data)
            {
              $("#selectMunicipio").empty();
              $.each(JSON.parse(data),function(){
                /*alert(this.id);*/
                
                $("#selectMunicipio").append('<option value="'+this.id+'">'+this.nombre+'</option>');
              });

            $("#selectMunicipio").val(idMunicipio);                                        


            },
            error: function(xhr, status)
            {

            }

        });
//FIN LLENAR SELECT MUNICIPIO
                },
                error: function (xhr, status)
                {
              
                }
            });
     
	});

  $("#selectDepartamento").on('change',function(){
    selectDepartamento();
    
  });

$( "#infoUsuario" ).submit(function( event ) {

	var data = JSON.stringify($(this).serializeArray());
			
		$.ajax({
                type: 'POST',
                dataType: 'json',
                data: {data:data, key:'guardarCambios'},
                url: "../../controller/UsuarioController.php",
                success: function (data)
                {
                  data = JSON.parse(data);
                    if (data.estado==true) {
                        swal({
                            title: "Exito!",
                            text: data.descripcion,
                            timer: 1500,
                            type: 'success',
                            closeOnConfirm: true,
                            closeOnCancel: true
                        });
                        setTimeout( function(){ 
                        location.reload();
                        }, 1000 );
                                  
                    }else{
                        swal({
                            title: "Error!",
                            text: data.descripcion,
                            timer: 1500,
                            type: 'error',
                            closeOnConfirm: true,
                                closeOnCancel: true
                            });
                        }
                                 
                                
                },
                error: function (xhr, status)
                {
              
                }
                                        
            });

		event.preventDefault();
		
		  
		});

function selectDepartamento() {
  var departamentoId = $("#selectDepartamento").val();
  //alert(departamentoId);
    if(departamentoId=="Seleccione")
    {
      $("#selectMunicipio").empty();
    }
    else
    {

    $.ajax({

            type: 'POST',
            data: {departamentoId: departamentoId, key:'selectMunicipio'},
            url: "../../controller/DepartamentoController.php",
            success: function(data)
            {
              $("#selectMunicipio").empty();
              $.each(JSON.parse(data),function(){
                /*alert(this.id);*/
                
                $("#selectMunicipio").append('<option value="'+this.id+'">'+this.nombre+'</option>');
              });

           // $("#selectMunicipio").val(idMunicipio);                                        


            },
            error: function(xhr, status)
            {

            }

        });
    }
}


//ELIMINAR USUARIO
$(document).on("click",'.eliminar',function(){
  var id = $(this).val();
  // alert(id);

swal({ 
title: "¿Desea Eliminar?",
text: "Este usuario será eliminado",
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
        data: {id: id, key:'eliminar'},
        url: "../../controller/UsuarioController.php",
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
                              }),
                  setTimeout(function(){
                  location.reload();
                },1000);  ;
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

}); //FIN ELIMINAR USUARIO

});
});

