<?php 

include_once realpath (dirname (__FILE__).'/../../app/validacionAdministrador.php');

 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD de paises</title>

 <link rel="stylesheet" href="../../assets/css/custom.css">

		<link rel="stylesheet" href="../../assets/css/main.css" />
		
		<link rel="stylesheet" type="text/css" href="../../resources/css/administrador/usuarios.css">
		<link rel="stylesheet" type="text/css" href="../../resources/bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="../../resources/js/jquery.js"></script>
		<script type="text/javascript" src="../../resources/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../../resources/sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../resources/sweetalert-master/dist/sweetalert.css">	




</head>
<br><br><br><br>
<body>
		<?php 

require_once'dashboard.php';
 ?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Administrar <b style="color: white;">tipos de literatura</b></h2>
					</div>
					<div class="col-sm-6">
						<button href="#addLiteraturaModal" class="btn btn-success" data-toggle="modal">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
						&nbsp;Agregar nueva editorial</button>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-sm" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->
            
			
        </div>
    </div>
	<!-- Modales y js -->
	<?php include("literatura/modal_literatura_add.php");?>
	<?php include("literatura/modal_literatura_edit.php");?>
	<?php include("literatura/modal_literatura_delete.php");?>
	<script src="../../resources/js/administrador/literatura.js"></script>
</body>
</html>                                		                            