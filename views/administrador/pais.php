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
<link rel="stylesheet" href="../../resources/bootstrap/bootstrap.min.css">
<script src="../../resources/js/jquery.min.js"></script>
<script src="../../resources/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../../assets/css/custom.css">
</head>
<body>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Administrar <b>paises</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addPaisModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar nuevo pais</span></a>
					</div>
                </div>
            </div>
			<div class='col-sm-4 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
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
	<?php include("pais/modal_pais_add.php");?>
	<?php include("pais/modal_pais_edit.php");?>
	<?php include("pais/modal_pais_delete.php");?>
	<script src="../../resources/js/administrador/pais.js"></script>
</body>
</html>                                		                            