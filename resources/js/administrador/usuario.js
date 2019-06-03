$(document).ready(function(){
$("#selectMunicipio").empty();

/*PRIMER CLIC AL BOTON REGISTRAR*/
var butonclick = false;
/*CONTADOR DE CAJAS VACIAS*/
var conta = 0;




$( "#dataUsuario" ).submit(function( event ) {

  var dataUsuario = JSON.stringify($(this).serializeArray());
      
//       /*console.log(dataUsuario);*/
//      // ENVIO DE INFORMACION DE USUARIO 
             $.ajax({
                            type: 'POST',
                            async: false,
                            dataType: 'json',
                            data: {dataUsuario:dataUsuario, key:'registrar'},
                            url: "../../controller/UsuarioController.php",
                            success: function (data)
                            {
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
                                      window.location = 'usuariosListado.php';
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

/*$('#registrar').attr("disabled", true);*/

	$("#selectDepartamento").on('change',function(){
		
		var departamentoId = $("#selectDepartamento").val();
		if(departamentoId==777)
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
						},
						error: function(xhr, status)
						{

						}

				});
		}
	});


/*OBTENER VALORES DE TODAS LAS CAJAS
 $("#registrar").on('click',function(){

	var $inputs = $('#formulario :input');
    var values = {};
    $inputs.each(function() {
        values[this.name] = $(this).val();
        if($(this).val() == "")
		{

       	}
        
    });

 });*/



function validate() 
{
	conta = 0;
	$("#formulario").find(':input').each(function() {
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
         		if(elemento.value!="" && elemento.value<=0)
         		{
         			$("#"+elemento.id+"").css("border-color", "#509aaf");

         			$("#registrar").removeAttr("disabled");
         		}        		
         	}
         	else
         	{
         		if(elemento.value=="" && elemento.value!="Seleccione" && elemento.value!= "registrar" && elemento.value!="limpiar")
         		{
         			conta-=1;
         		}        		
         	}
         } 
        });
}

$('#carnet').on('change',function(){
  var nCarnet = $('#carnet').val();


  if(nCarnet<=0)
  {
    swal("¡Aviso!","Número de Carnet no válido",'warning'); 
  }
  else
  {
    $.ajax({
          type: 'POST',
          async: true,
          dataType: 'json',
          data: {nCarnet:nCarnet, key:'validarCarnet'},
          url: "../../controller/UsuarioController.php",
          success: function (data)
          {
                        
              if(data.estado==true)
              {
                //alert(data.descripcion);
                swal("¡Aviso!",data.descripcion,'warning'); 
                $('#carnet').val("");
              }
              else{
                  swal("¡Aviso!",data.descripcion,'success'); 
              }                  
          },
          error: function (xhr, status)
          {
              
          }
                                        
          });
  }

  

});


//EVENTO CLIC A BOTON REGISTRAR
// $("#registrar").on('click',function(){
// 	validate();
// 	if(conta!=0)
// 	{
// 		swal("¡Aviso!","Debe llenar todos los campos",'warning'); 
// 	}
// 	else
// 	{
// 			/*alert("Ningun campo Vacio");*/
// 			// AGREGAR USUARIO

// // JSON que contendrá todos los input
// 			var dataUsuario = JSON.stringify($('#formulario :input').serializeArray());
//       /*console.log(dataUsuario);*/
// 			// ENVIO DE INFORMACION DE USUARIO 
// 			        $.ajax({
//                             type: 'POST',
//                             async: false,
//                             dataType: 'json',
//                             data: {dataUsuario:dataUsuario, key:'registrar'},
//                             url: "../../controller/UsuarioController.php",
//                             success: function (data)
//                             {
//                                 if (data.estado==true) {
//                                   swal({
//                                           title: "Exito!",
//                                           text: data.descripcion,
//                                           timer: 1500,
//                                           type: 'success',
//                                           closeOnConfirm: true,
//                                                   closeOnCancel: true
//                                         });
//                                   setTimeout( function(){ 
//                                       location.reload();
//                                   }, 1000 );
                                  
//                                 }else{
//                                     swal({
//                                           title: "Error!",
//                                           text: data.descripcion,
//                                           timer: 1500,
//                                           type: 'error',
//                                           closeOnConfirm: true,
//                                                   closeOnCancel: true
//                                         });
//                                 }
                                 
                                
//                             },
//                             error: function (xhr, status)
//                             {
              
//                             }
                                        
//                        });
// 	}
// 	butonclick = true;	
// });

// LLAMADA DEL METODO DE VALIDACION EN CADA EVENTO INPUT
	$("input").on('input',function(){
			if(butonclick == true)
			{
				validate();
			}		
	});


$("#nuevoUsuario").on('click', function(){

  $("#nuevoUsuario").modal({backdrop: 'static',keyboard: false});
});






});

