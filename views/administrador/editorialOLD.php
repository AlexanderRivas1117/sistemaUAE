<?php 

include_once realpath (dirname (__FILE__).'/../../app/validacionAdministrador.php');

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD de editoriales</title>

 <link rel="stylesheet" href="../../assets/css/custom.css">

		<link rel="stylesheet" href="../../assets/css/main.css" />
		
		<link rel="stylesheet" type="text/css" href="../../resources/css/administrador/usuarios.css">
		<link rel="stylesheet" type="text/css" href="../../resources/bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="../../resources/js/jquery.js"></script>
		<script type="text/javascript" src="../../resources/bootstrap/js/bootstrap.js"></script>
		<script type="text/javascript" src="../../resources/sweetalert-master/dist/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../resources/sweetalert-master/dist/sweetalert.css">	



<!-- <link rel="stylesheet" href="../../resources/bootstrap/bootstrap.min.css">
<script src="../../resources/js/jquery.min.js"></script>
<script src="../../resources/bootstrap/js/bootstrap.min.js"></script> -->

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
						<h2>Administrar <b style="color: white;">editoriales</b></h2>
					</div>
					<div class="col-sm-6">
						<button type="submit" href="#addEditorialModal" class="btn btn-success" data-toggle="modal">
							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Agregar nueva editorial</button >
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
	<?php include("editorial/modal_editorial_add.php");?>
	<?php include("editorial/modal_editorial_edit.php");?>
	<?php include("editorial/modal_editorial_delete.php");?>
	<script src="../../resources/js/administrador/editorial.js"></script>
</body>
<script>
	
</script>
</html>                                		                            