$(document).ready(function(){



	//


/*PRIMER CLIC AL BOTON REGISTRAR*/
var butonclick = false;
/*CONTADOR DE CAJAS VACIAS*/
var conta = 0;

//FECHA ACTUAL EN PRESTAMO
$("#imprimir").attr("disabled", true);

	var now = new Date();

	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);

	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
	$("#fechaDevolver").val(today);

//MODIFICACION DE IDIOMA Y ASIGNACION DE DATATABLE

$("#listadoPrestamos").DataTable({
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

	$("#nuevo").on('click', function(){

				//$("#exampleModalCenter").modal('show');
				$("#nuevoPrestamo").modal({backdrop: 'static',keyboard: false});
			});


//OBTENER ID_USUARIO
	$("#carnet").on('change',function(){
		
		var carnet = $("#carnet").val();

		if(carnet!="")
		{
			$.ajax({

						type: 'POST',
						data: {carnet: carnet, key:'obtIdUsuario'},
						url: "../../controller/PrestamoController.php",
						success: function(data)
						{
							if(data!=0)
							{
								$.each(JSON.parse(data),function(){
							 		$("#idUsuario").val(this.id);

							 	});

								var idUser =$("#idUsuario").val();
								$.ajax({

								type: 'POST',
								data: {idUser: idUser, key:'obtNumPrestamos'},
								url: "../../controller/PrestamoController.php",
								success: function(data)
								{
									data = JSON.parse(data);

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
									$("#carnet").val("");
									$("#sinRegistros").replaceWith("<tr id='sinRegistros'><td colspan='4'><h7>No hay registros</h7></td></tr>");
								}
								else
								{
									// swal({
         //                                  title: "Exito!",
         //                                  text: data.descripcion,
         //                                  timer: 1500,
         //                                  type: 'success',
         //                                  closeOnConfirm: true,
         //                                          closeOnCancel: true
         //                                });
         							swal("¡Aviso!",data.descripcion,'success');	
									//CARGAR INFORMACION DE USUARIO

									$.ajax({

									type: 'POST',
									data: {carnet: carnet, key:'infoUsuario'},
									url: "../../controller/UsuarioController.php",
									success: function(info)
									{
										
										info = JSON.parse(info);
										//console.log(info[0].id);

$("#sinRegistros").replaceWith("<tr id='sinRegistros'><td>"+info[0].nombre+"</td><td>"+info[0].apellido+"</td><td>"+info[0].telefono+"</td><td>"+info[0].correo+"</td></tr>");
										
										
							 
									},
									error: function(xhr, status)
									{

									}

										});
								}

							 
								},
								error: function(xhr, status)
								{

								}

				});



								
							}
							else
							{
								swal({
                                          title: "Error!",
                                          text: "Carnet erróneo",
                                          timer: 1500,
                                          type: 'error',
                                          closeOnConfirm: true,
                                                  closeOnCancel: true
                                        });
                                     $("#carnet").val("");
                                     $("#idUsuario").val("");
                                     $("#sinRegistros").replaceWith("<tr id='sinRegistros'><td colspan='4'><h7>No hay registros</h7></td></tr>");
							}

							 
						},
						error: function(xhr, status)
						{

						}

				});
		}

	});
	//FIN OBTENER ID_USUARIO

//OBTENER ID_INVENTARIO
	$("#codInventario").on('change',function(){
		
		var codInventario = $("#codInventario").val();
		if(carnet!="")
		{
			$.ajax({

						type: 'POST',
						data: {codInventario: codInventario, key:'obtIdInventario'},
						url: "../../controller/PrestamoController.php",
						success: function(data)
						{
							if(data!=0)
							{
								$.each(JSON.parse(data),function(){
							 		$("#idInventario").val(this.id);
							 	});
								
							}
							else
							{
								swal({
                                    title: "Error!",
                                    text: "Codigo erróneo",
                                    timer: 1500,
									type: 'error', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true
                                        });
                                  setTimeout( function(){ 
                                     
                                  }, 1000 );

                                $("#codInventario").val("");
                                $("#idInventario").val("");

							}

							 
						},
						error: function(xhr, status)
						{

						}

				});
		}

	});
	//FIN OBTENER ID_INVENTARIO


	function validate(idValidacion) 
{
	conta = 0;
	$("#"+idValidacion+"").find(':input').each(function() {
         var elemento= this;	
         if(elemento.value==0 || elemento.value=="" || elemento.value=="Seleccione" && elemento.value!= "registrar" && elemento.value!="limpiar")
         {
         	/*alert("vacio: "+elemento.id);*/
         	$("#"+elemento.id+"").css("border-color", "red");
         	conta+=1;
         }
         else
         {
         	if( elemento.value!="Seleccione" && elemento.value!= "registrar" && elemento.value!="limpiar")
         	{
         		if(elemento.value!="")
         		{
         			$("#"+elemento.id+"").css("border-color", "#509aaf");

         			$("#registrar").removeAttr("disabled");
         		}        		
         	}
         	else
         	{
         		if(elemento.value=="" && elemento.value!="Seleccione" && elemento.value!= "registrar" && elemento.value!="limpiar" && elemento.value!="buscar" && elemento.attr("required")==true)
         		{
         			conta-=1;
         		}        		
         	}
         } 
         // var a = $("#"+elemento.id+"").attr("name");
         // alert("El texto del botón es --> " + a);
        });
}
// FIN FUNCION DE VALIDACION

$("#realizar").on('click',function(){
	validate("modal-body");
	if(conta!=0)
	{
		swal("¡Aviso!","Debe llenar todos los campos",'warning');	
	}
	else
	{
		//REALIZAR NUEVO PRESTAMO
		var dataPrestamo = JSON.stringify($('#infoPrestamo  input').serializeArray());
		console.log(dataPrestamo);
		// $.ajax({
		// 		type: 'POST',
		// 		data: {dataPrestamo: dataPrestamo, key:'nuevoPrestamo'},
		// 		url: "../../controller/PrestamoController.php",
		// 		success: function(data)
		// 		{
		// 			data = JSON.parse(data);
		// 			if(data.estado==true)
		// 			{
  //                           swal({
		// 						title: "Exito!",
		// 						text: data.descripcion,
		// 						timer: 1000,
		// 						type: 'success',
		// 						closeOnConfirm: true,
		// 						closeOnCancel: true
		// 						});
		// 						setTimeout(function(){
		// 							location.reload();
		// 						},1000);
		// 			}
		// 			else
		// 			{
		// 				swal({
		// 						title: "Error!",
		// 						text: data.descripcion,
		// 						timer: 1000,
		// 						type: 'error', 
		// 						closeOnConfirm: true,
		// 						closeOnCancel: true
		// 						});
		// 						setTimeout(function(){
		// 							location.reload();
		// 						},1000);
		// 			}
		// 		},
		// 		error: function(xhr, status)
		// 		{

		// 		}
		// 	});
	}
	butonclick = true;	
});

//PRESTAMO EXTERNO RADIOBUTTON
$("#customRadioInline2").on("click",function(){
	var now = new Date();

	var day = ("0" + (now.getDate()+7)).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);

	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
	$("#fechaDevolver").val(today);

});
 //PRESTAMO EN SALA RADIOBUTTON
$("#customRadioInline1").on("click",function(){
	var now = new Date();

	var day = ("0" + now.getDate()).slice(-2);
	var month = ("0" + (now.getMonth() + 1)).slice(-2);

	var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
	$("#fechaDevolver").val(today);

});

//BUSCAR CODIGO INVENTARIO

$("#buscarInventario").on("click",function(){
	$("#nuevoPrestamo").hide();
	$("#modalInventario").modal({backdrop: 'static',keyboard: false});

});

$("#btnSearch").on("click",function(){
	// var nval = $("input:radio[name=search]:checked").val();
	// alert(nval);
});

//EVENTO INPUT EN CAJA SEARCH

$("#txtBusqueda").on("keyup",function(){
	var txtBusqueda = $("#txtBusqueda").val();
	var tipoBusqueda = $("input:radio[name=search]:checked").val();
	if(txtBusqueda!="")
	{
		$.ajax({

				type: 'POST',
				data: {txtBusqueda: txtBusqueda,tipoBusqueda:tipoBusqueda, key:'searchInventario'},
				url: "../../controller/PrestamoController.php",
				success: function(data)
				{
					d = JSON.parse(data);
					//console.log(d);
					if(d[0].estado!=false)
					{

	$("#sinDatos").replaceWith("<tbody id='sinDatos'></body>");

$.each(JSON.parse(data),function(){
	$("#sinDatos").append("<tr><td>"+this.nombre+"</td><td>"+this.numeroInventario+"</td><td><button type='button' class='btn btn-success btn-circle seleccionar btn-sm' id="+this.numeroInventario+" ><i class='fas fa-check'></i></button>&nbsp;<button type='button' class='btn btn-primary btn-circle info btn-sm' id="+this.numeroInventario+" ><i class='fas fa-info'></i></button></td></tr>");
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

//SELECCION DEL NUMERO INVENTARIO

$(document).on("click",".seleccionar",  function(){

		var nInventario = $(this).attr('id');    

        $("#nuevoPrestamo").show();
        $('#modalInventario').modal('toggle');
        $("#codInventario").val(nInventario);

    //OBTENER ID INVENTARIO
        $.ajax({
				type: 'POST',
				data: {codInventario: codInventario, key:'obtIdInventario'},
				url: "../../controller/PrestamoController.php",
				success: function(data)
				{
					if(data!=0)
					{
						$.each(JSON.parse(data),function(){
							 $("#idInventario").val(this.id);
							});
								
					}
				},
				error: function(xhr, status)
				{

				}
			});
    });
//CERRAR MODAL INVENTARIO

$("#cerrar").on("click",function(){
	$("#nuevoPrestamo").show();
    $('#modalInventario').modal('toggle');
});

$("#cerrar2").on("click",function(){
    $('#modalDevoluciones').modal('toggle');
});


					// DEVOLUCIONES

//BUSCAR CODIGO INVENTARIO

$("#devolucion").on("click",function(){

	$("#modalDevoluciones").modal({backdrop: 'static',keyboard: false});

});

// KEY UP BUSCAR PRESTAMO

$("#txtBuscar").on('keyup',function(){


busqueda();
	

});

$("#mora").on('click',function(){
	var txtSearch = $("#txtBuscar").val();
	if(txtSearch!="")
	{
		busqueda();
	}

});

$("input[name=buscar]").on('change',function(){
	var txtSearch = $("#txtBuscar").val();
	if(txtSearch!="")
	{
		busqueda();
	}

});

// BUSQUEDA PARA DEVOLUCIONES
function busqueda() {

	if( $('#mora').prop('checked') ) 
	{
		var tipo = $("input:radio[name=buscar]:checked").val();
		var txtSearch = $("#txtBuscar").val();
    	//Prestamos con mora
    	$.ajax({

				type: 'POST',
				data: {txtSearch: txtSearch,tipo:tipo, key:'searchPrestamo'},
				url: "../../controller/PrestamoController.php",
				success: function(data)
				{
					var d = JSON.parse(data);
					if(d[0].estado==true)
					{
						$("#imprimir").attr("disabled", false);
						
	$("#sinInfo").replaceWith("<tbody id='sinInfo'></body>");

$.each(JSON.parse(data),function(){
//$("#sinInfo").replaceWith('<tbody id="sinInfo"><tr><td colspan="4"><h7 class="h9">No se encontraron registros</h7></td></tr></tbody>');

$("#sinInfo").append("<tr><td>"+this.numeroInventario+"</td><td>"+this.nombre+"</td><td>"+this.fechaRealizacion+"</td><td>"+this.fechaDevolver+"</td><td>$"+this.multa+".00</td><td><button type='button' class='btn btn-success btn-circle devolver' id="+this.id+" ><i class='fas fa-check'></i></button></td></tr>");
							});
						
					}
					else
					{
$("#sinInfo").replaceWith('<tbody id="sinInfo"><tr><td colspan="6"><h7 class="h9">No se encontraron registros</h7></td></tr></tbody>');
						$("#imprimir").attr("disabled", true);
					} 
				},
				error: function(xhr, status)
				{

				}

				});		
	}
	else
	{
		var t = $("input:radio[name=buscar]:checked").val();
		var tipo = parseInt(t);
		tipo +=2;
		var txtSearch = $("#txtBuscar").val();
    	//Prestamos sin Mora
    	$.ajax({

				type: 'POST',
				data: {txtSearch: txtSearch,tipo:tipo, key:'searchPrestamo'},
				url: "../../controller/PrestamoController.php",
				success: function(data)
				{

					var d = JSON.parse(data);
					if(d[0].estado==true)
					{
						$("#imprimir").attr("disabled", false);
	$("#sinInfo").replaceWith("<tbody id='sinInfo'></body>");

$.each(JSON.parse(data),function(){
//$("#sinInfo").replaceWith('<tbody id="sinInfo"><tr><td colspan="4"><h7 class="h9">No se encontraron registros</h7></td></tr></tbody>');
if(this.multa<=0)
{
	this.multa=0;
 }
$("#sinInfo").append("<tr><td>"+this.numeroInventario+"</td><td>"+this.nombre+"</td><td>"+this.fechaRealizacion+"</td><td>"+this.fechaDevolver+"</td><td>$"+this.multa+".00</td><td><button type='button' class='btn btn-success btn-sm btn-circle devolver' id="+this.id+" ><i class='fas fa-check'></i> </button></td></tr>");
							});
						
					}
					else
					{
						$("#imprimir").attr("disabled", true);
$("#sinInfo").replaceWith('<tbody id="sinInfo"><tr><td colspan="6"><h7 class="h9">No se encontraron registros</h7></td></tr></tbody>');
					} 
				},
				error: function(xhr, status)
				{

				}

				});
    }
}

// DEVOLVER UN PRESTAMO
$(document).on("click",".devolver",  function(){

var nPrestamo = $(this).attr('id');

swal({ 
title: "¿Desea Devolver?",
text: "El préstamo será devuelto",
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
				data: {nPrestamo: nPrestamo, key:'devolverPrestamo'},
				url: "../../controller/PrestamoController.php",
				success: function(data)
				{
					data = JSON.parse(data);

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
									location.reload();
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
"Prestamo Cancelado...", 
"error"); 

} 

});      



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



// FIN INFO LIBRO

});