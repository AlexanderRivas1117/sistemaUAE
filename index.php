<?php 

session_start();

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Sistema Bibliotecario UAE</title>
	<link rel="stylesheet" type="text/css" href="resources/css/styleLogin.css">
	
    <link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.css">



<link rel="stylesheet" type="text/css" href="resources/sweetalert-master/dist/sweetalert.css">
    <script type="text/javascript" src="resources/js/jquery.js"></script>
    <script type="text/javascript" src="resources/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="resources/sweetalert-master/dist/sweetalert.min.js"></script>


</head>
<body>
	<div class="contenedor">
		
		<div class="contenedorBody">
			<div class="container" id="infoLogin">
				<div class="row" style="margin-top: 120px; margin-left: 10px;">
					<div class="col-md-2 input-group" style="width: 250px;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="usuario" type="text" class="form-control" name="carnet" placeholder="Usuario">
 					</div>
				</div>
				<div class="row" style="margin-top: 10px; margin-left: 10px;">
					<div class="col-md-2 input-group" style="width: 250px;">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="contrasena" type="password" class="form-control" name="contra" placeholder="Contraseña">
 					</div>
				</div>
				<div class="row" style="margin-top: 10px; margin-left: 10px;">
					<div class="col-md-8 input-group" style="width: 250px;">
						<button type="button" class="btn btn-primary" style="width: 250px;" id="entrar">Ingresar</button>
 					</div>
				</div>
			</div>

		</div>
		<div class="contenedorTop">
		</div>
	</div>
    <!-- <script src="resources/login/js/jquery-1.11.2.js"></script> -->
	<script>
     $(document).ready(function(){
        $('body').keyup(function(e) {
    if(e.keyCode == 13) {
        login();
    }
});
        $("#entrar").on('click',function(){
            
            login();

            
        });

function login() {

    var data =  JSON.stringify($('#infoLogin  :input').serializeArray());
            //console.log(data);
            $.ajax({

                        type: 'POST',
                        dataType: 'json',
                        data: {data: data, key:'login'},
                        url: "controller/UsuarioController.php",
                        success: function(data)
                        {

                            
                            //console.log(data);
                            //alert(data.descripcion);
                            if(data.estado==true)
                            {
                                swal({
                                    title: "Exito!",
                                    text: data.descripcion,
                                    timer: 1000,
                                    type: 'success', //puede ser success, info, error o warning.
                                    closeOnConfirm: true,
                                    closeOnCancel: true

                                });
                                
                                setTimeout(function(){
                                    window.location.replace('app/validacionGeneral.php');
                                },1000);
                            }
                            else
                            {
                                if(data.estado== false)
                                {
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

                                    //window.location.replace('../app/validacionGeneral.php');
                                    //location.reload();

                                    },1000);
                                }

                                $("#carnet").val("");
                                $("#contra").val("");
                                
                            }
                            
                        
                        },
                        error: function(xhr, status)
                        {

                        }

                });
}
     });   
    </script>
</body>
</html>