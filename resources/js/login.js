$(document).ready(function(){
	


		$("#login").on("click", function(){

				$("#modalLogin").modal({backdrop: 'static',keyboard: false});

			});





		$("#entrar").on("click", function(){

				var dataUsuario = JSON.stringify($('#infoLogin  :input').serializeArray());
				
				$.ajax({

						type: 'POST',
						async: false,
						dataType: 'json',
						data: {dataUsuario: dataUsuario, key:'ingresar'},
						url: "../controller/usuarioController.php",
						success: function(data)
						{

							if(data.estado== true){
								$("#modalLogin").attr("hide");
								// $("#modalLogin").attr("disabled", true);
								swal({
									title: "Exito!",
									text: data.descripcion,
									timer: 1000,
									type: 'success', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true

								});
								
								setTimeout(function(){
									

								},1000);

								
							}

							else
							{
								if(data.estado== false){
									// $("#modalLogin").attr("disabled", true);
									swal({
									title: "Error, datos Incorrectos!",
									text: data.descripcion,
									timer: 1000,
									type: 'error', //puede ser success, info, error o warning.
									closeOnConfirm: true,
									closeOnCancel: true

									
								});
								setTimeout(function(){
									window.location.replace('../app/validacionGeneral.php');
									location.reload();

								},1000);
								}

								$("#usernameEdit").val("");
								$("#passwordEdit").val("");
							}
						},
						error: function(xhr, status)
						{

						}

				});
window.location.replace('../app/validacionGeneral.php');
				//Fin del click agregar usuario

			});


});