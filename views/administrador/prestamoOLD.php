<?php 

require_once realpath (dirname (__FILE__).'/../../model/Prestamo.php');

 ?>
 <?php 

include_once realpath (dirname (__FILE__).'/../../app/validacionAdministrador.php');

 ?>
<!DOCTYPE html>
<html>
<head>
		<title>Biblioteca UAE/ Prestamo</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		
		
		
		<link rel="stylesheet" type="text/css" href="../../resources/sweetalert-master/dist/sweetalert.css">
<link rel="stylesheet" type="text/css" href="../../resources/dataTable/material.min.css">		
<link rel="stylesheet" type="text/css" href="../../resources/dataTable/dataTables.material.min.css">
<link rel="stylesheet" href="../../assets/css/main.css" />
<link rel="stylesheet" type="text/css" href="../../resources/css/administrador/usuarios.css">
<link rel="stylesheet" type="text/css" href="../../resources/bootstrap/css/bootstrap.css">






	</head>
	<body>
		

			<!-- Header -->
<?php 

require_once'dashboard.php';
 ?>
			<!-- Main -->
				
					
						<br><br><br><br>

						<div class="container">
							<div class="row">
								<h1>SISTEMA BIBLIOTECARIO</h1>
								<h4>Gestión de Préstamos</h4>
								<hr color="black">
							</div>
						</div>
						<form id="formulario" method="" action="">
						<div class="container contenedor" style="width: 1000px;">
							<div class="row" style="background-color: #0d7e83;">
								<div class="col-md-4">
									<h4 class="textoTop" style="color: white;">Nuevo Préstamo  									
								</div>
							</div>

							
							<br>
							<!-- FIN CONTENEDOR -->
							
<table width="100%" cellspacing="1" cellpadding="3" border="0" > 
         <tr> 
               <td><font color="#FFFFFF" face="arial, verdana, helvetica">
<!--                 <div class="col-md-9" style="margin-top: 30px;">

                </div> -->
                <div class="col-md-2" style="margin-top: 30px; padding-left: 30px;">
                    <div class="btn-group pull-left">
                       <button type="button" class="btn btn-warning btn-sm" id="devolucion" value="devolucion"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Devolución</button>
                    </div>
                </div>
                <div class="col-md-1 col-md-offset-9" style="margin-top: 30px; padding-right: 30px;">
                    <div class="btn-group pull-right">
                       <button type="button" class="btn btn-success btn-sm" id="nuevo" value="nuevo"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Nuevo Prestamo</button>
                    </div>
                </div>
                <div class="clearfix"></div>
         <font color="#080000" face="arial, verdana, helvetica"> 
             <div class="col-md-12" style="margin-top: 10px;">
                    <table id="listadoPrestamos" class="mdl-data-table" cellspacing="1" width="100%">
                        <thead>
                            <th>Nombre Libro</th>
                            <th>Fecha Realización</th>
                            <th>Nombre</th>
                            <th>Carnet</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        <?php 
                            $objPrestamo = new Prestamo();
                            $data = $objPrestamo->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                    		<td>".$value['libro']."</td>
                                            <td>".$value['fechaRealizacion']."</td>
                                            <td>".$value['nombre']."</td>
                                            <td>".$value['carnet']."</td>
                                            <td>
                                                <button type='button' class='btn btn-info btn-sm' id='".$value['id']."' value='Editar'>Editar</button>
                                                
                                            </td>
                                          </tr>";
                                }
                            }

                         ?>
                            
                        </tbody>
                    </table>
                </div>
                                        
                </font></td> 
            </tr> 
        </table>
						</div>
						</form>
					


		<!-- Scripts -->
			<script type="text/javascript" src="../../resources/js/jquery.js"></script>
			<script type="text/javascript" src="../../resources/bootstrap/js/bootstrap.js"></script>
			<script type="text/javascript" src="../../resources/sweetalert-master/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../../resources/dataTable/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../resources/dataTable/dataTables.material.min.js"></script>

<script type="text/javascript" src="../../resources/js/administrador/prestamo.js"></script>
			
			
			<!-- <script src="../../assets/js/jquery.min.js"></script> -->
			<script src="../../assets/js/jquery.dropotron.min.js"></script>
			<script src="../../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../../assets/js/skel.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>

	</body>


<!-- MODAL DE NUEVO PRESTAMO -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade" id="nuevoPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 75px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Realizar nuevo préstamo</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body"  id="modal-body">

<!-- AQUI -->
<div id="infoPrestamo">
	<div class="row">
	<div class="col-md-8">
		<div class="form-group">
			<div class="form-group">
				<label>Tipo de Préstamo</label>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="customRadioInline1" name="tipoPrestamo" class="custom-control-input" value="1" checked>
						<label class="custom-control-label" for="customRadioInline1">En Sala</label>
					<input type="radio" id="customRadioInline2" name="tipoPrestamo" class="custom-control-input" value="2">
						<label class="custom-control-label" for="customRadioInline2">Externo</label>
				</div>
			</div>
		</div>
								</div>
</div>
	<div class="row">
	<div class="col-md-4">
		<div class="form-group">
		<label>Fecha a Devolver</label>
		<input type="date" name="fechaDevolver" class="form-control" id="fechaDevolver" >
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group">
			<label>Carnet Usuario</label>
			<input type="carnet" name="carnet" id="carnet" class="form-control" placeholder="1234-5">
		</div>
		<input type="hidden" name="idUsuario" id="idUsuario">
	</div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			<label>Codigo Inventario</label>
			<input type="codInventario" name="codInventario" id="codInventario" class="form-control" placeholder="NNN-1234">
		</div>
		<input type="hidden" name="idInventario" id="idInventario" value="">
	</div>
	<div class="col-md-1" style="padding-left: 0px; margin-top: 3px;">

				<br>
		<button type="button" class="btn btn-info btn-sm" id="buscarInventario" value="buscar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;</button>

		</div>
</div>
</div>
<!-- AQUI -->
<!-- TABLA DATOS USUARIO -->
<DIV class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Telefono</th>
				<th>Correo</th>
			</thead>
			<tbody>
				<tr id="sinRegistros">
					<td colspan="4">
						<h7>No hay registros</h7>
					</td>

				</tr>
			</tbody>
		</table>
	</div>
</DIV>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="realizar" value="registrar">Realizar Prestamo</button>
      </div>
    </div>
  </div>
</div>
</font>


<!-- MODAL BUCAR CODIGO INVENTARIO -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade" id="modalInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 90px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buscar Codigo Inventario</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
<div class="row">
	<div class="col-md-10">
		<div class="form-group">
			<label>Buscar:</label>
<input type="text" id="txtBusqueda" name="txtBusqueda" placeholder="Ingrese lo que desea buscar.." class="form-control" required="true">
		</div>
	</div>
	<div class="col-md-1" style="padding-left: 0px; margin-top: 3px;">
		<br>
		<button type="button" class="btn btn-primary btn-sm" id="btnSearch" value="buscar">Buscar</button>
	</div>

</div>
<div class="row">

		<div class="form-group">
		<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="sNombre" name="search" class="custom-control-input" value="1" checked>
		<label class="custom-control-label" for="sNombre">Nombre</label>
<input type="radio" id="sAutor" name="search" class="custom-control-input" value="2">
		<label class="custom-control-label" for="sAutor">Autor</label>
<input type="radio" id="sIsbn" name="search" class="custom-control-input" value="3">
		<label class="custom-control-label" for="sIsbn">ISBN</label>
		</div>
	</div>

</div>
<br>

<!-- TABLA LIBROS -->
<DIV class="row">
	<div class="col-md-12">
		<table>
			<thead>
				<th>Nombre Libro</th>
				<th>Codigo Inventario</th>
				<th>Seleccionar</th>
			</thead>
			<tbody id="sinDatos">
					<tr >
						<td colspan="4">
							<h7 class="h9">No hay registros</h7>
						</td>
					</tr>					
			</tbody>
		</table>
	</div>
</DIV>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cerrar">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" id="ok" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>
</font>


<!-- MODAL DEVOLUCIONES -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade" id="modalDevoluciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 90px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buscar Préstamo</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-10">
			<div class="form-group">
			<label>Buscar:</label>
<input type="text" id="txtBuscar" name="txtBucar" placeholder="Ingrese lo que desea buscar.." class="form-control" required="true">
			</div>
		</div>
	<div class="col-md-1" style="padding-left: 0px; margin-top: 3px;">
		<br>
		<button type="button" class="btn btn-primary btn-sm" id="btnBuscar" value="buscar">Buscar</button>
	</div>

</div>
<div class="row">
	<div class="col-md-5">
		<div class="form-group">
			<div class="custom-control custom-radio custom-control-inline">
<input type="radio" id="sInventario" name="buscar" class="custom-control-input" value="1" checked>
		<label class="custom-control-label" for="sInventario">Inventario</label>
<input type="radio" id="sCarnet" name="buscar" class="custom-control-input" value="2">
		<label class="custom-control-label" for="sCarnet">Carnet</label>
			</div>
		</div>	
	</div>
	<div class="col-md-3 col-md-offset-2">
		<div class="form-group">
			<div class="custom-control custom-checkbox custom-control-inline">
<input type="checkbox" id="mora" name="mora" class="custom-control-input" >
		<label class="custom-control-label" for="mora">Con Mora</label>
			</div>
		</div>
	</div>
</div>

	

<br>

<!-- TABLA PRESTAMOS -->
<DIV class="row">
	<div class="col-md-12">
		<table class="table table-bordered">
			<thead>
				<th>Número Inventario</th>
				<th>Título</th>
				<th>Fecha Préstamo</th>
				<th>Fecha a Devolver</th>
				<th>Multa</th>
				<th>Seleccionar</th>
			</thead>
			<tbody id="sinInfo">
					<tr >
						<td colspan="6">
							<h7 class="h9">No hay registros</h7>
						</td>
					</tr>					
			</tbody>
		</table>
	</div>
</DIV>
<div class="row">
	<div class="col-md-2" style="margin-top: 0px;">
		<button type="button" class="btn btn-primary btn-sm" id="imprimir" value="imprimir"><span class="glyphicon glyphicon-print" aria-hidden="true"></span>&nbsp; Imprimir</button>
		</div>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="cerrar2">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" id="ok" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>
</font>
	


</html>


