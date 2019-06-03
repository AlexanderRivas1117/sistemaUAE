<?php 

require_once realpath (dirname (__FILE__).'/../../model/Editorial.php');
require_once realpath (dirname (__FILE__).'/../../model/Pais.php');
require_once realpath (dirname (__FILE__).'/../../model/Libro.php');
require_once realpath (dirname (__FILE__).'/../../model/TipoColeccion.php');
require_once realpath (dirname (__FILE__).'/../../model/TipoLiteratura.php');
require_once'head.php';

 ?>
 <?php 

include_once realpath (dirname (__FILE__).'/../../app/validacionAdministrador.php');

 ?>
<!DOCTYPE html>
<html>
<head>
		<title>Biblioteca UAE/ Libros</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		

<style type="text/css">
  #regiration_form fieldset:not(:first-of-type) {
    display: none;
  }
  </style>

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
								<h4>Gestión de Libros</h4>
								<hr color="black">
							</div>
						</div>
						<form id="formulario" method="" action="">
						<div class="container contenedor" style="width: 1000px;">
							<div class="row" style="background-color: #0d7e83;">
								<div class="col-md-4">
									<h4 class="textoTop" style="color: white;">Nuevo Libro  									
								</div>
							</div>

							
							<br>
							<!-- FIN CONTENEDOR -->
<table width="100%" cellspacing="1" cellpadding="1" border="0" style="width: 80px;"> 
         <tr> 
               <td><font color="#FFFFFF" face="arial, verdana, helvetica">
<!--                 <div class="col-md-9" style="margin-top: 30px;">

                </div> -->
                <div class="col-md-2" style="margin-top: 30px; padding-left: 30px;">
                    <!-- <div class="btn-group pull-left">
                       <button type="button" class="btn btn-warning btn-sm" id="devolucion" value="devolucion"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Devolución</button>
                    </div> -->
                </div>
                <div class="col-md-1 col-md-offset-9" style="margin-top: 30px; padding-right: 30px;">
                    <div class="btn-group pull-right">
                       <button type="button" class="btn btn-success btn-sm" id="nuevo" value="nuevo"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Nuevo Libro</button>
                    </div>
                </div>
                <div class="clearfix"></div>
         <font color="#080000" face="arial, verdana, helvetica"> 
             <div class="col-md-12" style="margin-top: 10px;">
                  <table id="listadoLibros" class="mdl-data-table" cellspacing="3" width="100%" style="width: 80%;">
                        <thead>
                            
                            <th>Número Inventario</th>
                            <th>Nombre Libro</th>
                            <th>Autor(es)</th>
                            <th>Editorial</th>
                            <!-- <th>Pais</th> -->
                            <th>Tipo Colección</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                        <?php 
                            $objLibro = new Libro();
                            $data = $objLibro->getAll();
                            if ($data!=false) {
                                foreach ($data as  $value) {
                                    
                                    echo "<tr>
                                            
                                            <td>".$value['numeroInventario']."</td>
                                            <td>".$value['nombre']."</td>
                                            <td>".$value['detalleautorID']."</td>
                                            <td>".$value['editorial']."</td>
                                            
                                            <td>".$value['tipoColeccion']."</td>
                                            <td>
                                                <button type='button' class='btn btn-info btn-sm Editar' id='".$value['id']."' value='Editar'>Editar</button>
                                                <button type='button' class='btn btn-danger btn-sm Eliminar' id='".$value['id']."' value='Eliminar'>Eliminar</button>
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

<script type="text/javascript" src="../../resources/js/administrador/libro.js"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script> -->
<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css"/>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>	 -->
			
			<!-- <script src="../../assets/js/jquery.min.js"></script> -->
			<script src="../../assets/js/jquery.dropotron.min.js"></script>
			<script src="../../assets/js/jquery.scrollgress.min.js"></script>
			<script src="../../assets/js/skel.min.js"></script>
			<script src="../../assets/js/util.js"></script>
			<script src="../../assets/js/main.js"></script>

	</body>


<!-- MODAL DE NUEVO LIBRO -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade" id="nuevoPrestamo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 65px;">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nuevo Libro</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body"  id="modal-body">

<!-- AQUI -->
<div id="infoLibro"> 
<form id="regiration_form" data-toggle="validator" role="form" method="POST">
  <fieldset id="info1">

    <h4 class="h4">INFORMACION DEL LIBRO</h4>

    <div class="row">
    	<div class="col-md-5">
    		<div class="form-group">
    			<label for="nombre">Título de Documento</label>
    			<input type="text" class="form-control required" id="nombre" name="nombre" placeholder="Titulo" required>
    		</div>
    	</div>
    	<div class="col-md-2">
    		<div class="form-group">
    			<label for="cantidadPaginas">Cantidad Páginas</label>
    			<input type="number" class="form-control required" id="cantidadPaginas" name="cantidadPaginas" placeholder="Nº págs.">
    		</div>
    	</div>
    	<div class="col-md-5">
    		<div class="form-group">
    			<label for="informacionAdicional">Información Adicional</label>
    			<input type="textarea" class="form-control noRequired" id="informacionAdicional" name="informacionAdicional" placeholder="Información Adicional">
    		</div>
    	</div>
    </div>
    <div class="row">
    	
    	<div class="col-md-4">
    		<div class="form-group">
    			<label for="terminosResumen">Términos Resumen</label>
    			<input type="text" class="form-control noRequired" id="terminosResumen" name="terminosResumen" placeholder="Términos Resumen">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="numeroEdicion">Número de Edición</label>
    			<input type="number" class="form-control required" id="numeroEdicion" name="numeroEdicion" placeholder="Nº Edición">
    		</div>
    	</div>
    	<div class="col-md-5">
    		<div class="form-group">
    			<label for="referenciaDigital">Referencia Digital</label>
    			<input type="text" class="form-control required" id="referenciaDigital" name="referenciaDigital" placeholder="Referencia Digital">
    		</div>
    	</div>
    </div>
    <div class="row">    	
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="fechaIso">Fecha ISO</label>
    			<input type="date" class="form-control required" id="fechaIso" name="fechaIso" placeholder="Fecha ISO">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="fechaPublicacion">Fecha publicación</label>
    			<input type="date" class="form-control required" id="fechaPublicacion" name="fechaPublicacion" placeholder="Fecha Publicación">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="idioma">Idioma</label>
    			<input type="text" class="form-control required" id="idioma" name="idioma" placeholder="Idioma">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="isbn">ISBN</label>
    			<input type="text" class="form-control required" id="isbn" name="isbn" placeholder="Isbn">
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-3">
    		<div class="form-group">
				<label>Editorial</label>
				<select class="form-control required" id="editorial" name="editorial">
					<option value="0">Seleccione</option>
				<?php 
					$obj = new Editorial();
					$data = $obj->getAll();
					if($data!=null)
					{
						foreach ($data as $value) 
						{
						echo "<option value=".$value['id'].">".$value['nombre']."</option>";
						}
					}
				?>
				</select>
			</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
				<label>Pais</label>
				<select class="form-control required" id="pais" name="pais">
					<option value="0">Seleccione</option>
				<?php 
					$obj = new Pais();
					$data = $obj->getAll();
					if($data!=null)
					{
						foreach ($data as $value) 
						{
						echo "<option value=".$value['id'].">".$value['nombre']."</option>";
						}
					}
				?>
				</select>
			</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group required">
				<label>Tipo Coleccion</label>
				<select class="form-control required" id="tipoColeccion" name="tipoColeccion">
					<option value="0">Seleccione</option>
				<?php 
					$obj = new TipoColeccion();
					$data = $obj->getAll();
					if($data!=null)
					{
						foreach ($data as $value) 
						{
						echo "<option value=".$value['id'].">".$value['nombre']."</option>";
						}
					}
				?>
				</select>
			</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group required">
				<label>Tipo Literatura</label>
				<select class="form-control required" id="tipoLiteratura" name="tipoLiteratura">
					<option value="0">Seleccione</option>
				<?php 
					$obj = new TipoLiteratura();
					$data = $obj->getAll();
					if($data!=null)
					{
						foreach ($data as $value) 
						{
						echo "<option value=".$value['id'].">".$value['nombre']."</option>";
						}
					}
				?>
				</select>
			</div>
    	</div>
    </div>
    
    <div class="row" id="misAutores">
    	<div id="listas" class="listas">
    		<div class="col-md-3 grupos">
    		<div class="form-group"> 
    			<label>Cod. Autor</label>
    			<!-- <input type="text" name="autores[]" class="form-control required" id="autores"> -->

				<div >
   				 	<div>
   				 		<input type="text" name="campo" class="form-control txtAutor required" id="campo">
                        
   				 	</div>
				</div>
    		</div>

    		
    		</div>
    	</div>
    	
    	<div class="col-md-3">
    		<div class="form-group">
    			        <div style="margin-top: 22px;">
            <div class="btn-group">
 <button style=" height: 30px;" type="button" class="btn btn-info btn-sm" id="find" value="find" name="btnBuscar">
 	<span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
 </button>

  <button style=" height: 30px;margin-left: 5px;" type="button" class="btn btn-success btn-sm" id="add_field" value="more" hidden="true" name="btnAgregar">
  	<span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>
  </button>
            </div>
        </div>
    		</div>
    		
    		
    	</div>


    </div>
<button type="button" name="close" class="btn btn-danger" data-dismiss="modal"  style="margin-left: 570px;">Cerrar</button>
<button type="button" name="siguiente" class="next btn btn-info" value="Next" id="siguiente">Siguiente</button>
 
 
    

  </fieldset>

  <fieldset id="info2">
    <h4 class="h4">LIBRO EN INVENTARIO</h4>
    <div class="row">    	
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="numeroInventario">Número Inventario</label>
    			<input type="text" class="form-control required" id="numeroInventario" name="numeroInventario" placeholder="Nº Inventario">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="fechaAdquisicion">Fecha Adquisición</label>
    			<input type="date" class="form-control required" id="fechaAdquisicion" name="fechaAdquisicion" placeholder="Fecha Adquisición">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="precio">Precio</label>
    			<input type="text" class="form-control required" id="precio" name="precio" placeholder="$00.00" required>
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="facilitante">Facilitante</label>
    			<input type="text" class="form-control required" id="facilitante" name="facilitante" placeholder="facilitante">
    		</div>
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="solicitante">Solicitante</label>
    			<input type="text" class="form-control required" id="solicitante" name="solicitante" placeholder="Solicitante">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="entrego">Entregó</label>
    			<input type="text" class="form-control required" id="entrego" name="entrego" placeholder="Entregó">
    		</div>
    	</div>
    	<div class="col-md-3">
    		<div class="form-group">
    			<label for="fechaEntrega">Fecha Entrega</label>
    			<input type="date" class="form-control required" id="fechaEntrega" name="fechaEntrega" placeholder="Fecha Entrega">
    		</div>
    	</div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="formaAdquisicion">Forma Adquisición</label>
                <input type="text" class="form-control required" id="formaAdquisicion" name="formaAdquisicion" placeholder="formaAdquisicion">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="volumen">Volumen</label>
                <input type="number" class="form-control required" id="volumen" name="volumen" placeholder="Volumen">
            </div>
        </div>
    </div>
    <button type="button" name="previous" class="previous btn btn-info" value="Previous" style="margin-left: 520px;">Anterior</button>
    <button type="button" class="btn btn-danger" name="clo" data-dismiss="modal" >Cerrar</button>
    <button type="button" id="enviar" name="submit" class="submit btn btn-success" form="regiration_form" value="Submit">Enviar</button>
  </fieldset>
  </form>
</div>
<!-- AQUI -->
<!-- TABLA DATOS USUARIO -->
      </div>
      <div class="modal-footer">
  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" id="realizar" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>
</font>




<!-- MODAL BUCAR CODIGO INVENTARIO -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade" id="modalAutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 90px;">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Buscar Autores</h5>
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
	<div class="col-md-1" style="padding-left: 0px; margin-top: 3px; margin-left: 10px">
		<br>
		<button type="button" class="btn btn-success btn-sm" id="btnNuevo" value="nuevo">Nuevo</button>
	</div>

</div>

<br>

<!-- TABLA LIBROS -->
<DIV class="row">
	<div class="col-md-12">
		<table>
				<th>Código Autor</th>
				<th>Nombre</th>
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
        <button type="button" class="btn btn-danger" id="cerrar" data-dismiss="modal">Cerrar</button>
        <!-- <button type="button" class="btn btn-primary" id="ok" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>
</font>


<!-- MODAL EDITAR LIBRO -->
<font color="#080000" face="arial, verdana, helvetica"> 
<div class="modal fade" id="editarLibro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="margin-top: 65px;">
  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 800px;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Libro</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body"  id="modal-body">

<!-- AQUI -->


    <h4 class="h4">INFORMACION DEL LIBRO</h4>

    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="nombre">Título de Documento</label>
                <input type="text" class="form-control required" id="nombreEdit" name="nombre" placeholder="Titulo" required>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label for="cantidadPaginas">Cantidad Páginas</label>
                <input type="number" class="form-control required" id="cantidadPaginasEdit" name="cantidadPaginas" placeholder="Nº págs.">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="informacionAdicional">Información Adicional</label>
                <input type="textarea" class="form-control noRequired" id="informacionAdicionalEdit" name="informacionAdicional" placeholder="Información Adicional">
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-4">
            <div class="form-group">
                <label for="terminosResumen">Términos Resumen</label>
                <input type="text" class="form-control noRequired" id="terminosResumenEdit" name="terminosResumen" placeholder="Términos Resumen">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="numeroEdicion">Número de Edición</label>
                <input type="number" class="form-control required" id="numeroEdicionEdit" name="numeroEdicion" placeholder="Nº Edición">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="referenciaDigital">Referencia Digital</label>
                <input type="text" class="form-control required" id="referenciaDigitalEdit" name="referenciaDigital" placeholder="Referencia Digital">
            </div>
        </div>
    </div>
    <div class="row">       
        <div class="col-md-3">
            <div class="form-group">
                <label for="fechaIso">Fecha ISO</label>
                <input type="date" class="form-control required" id="fechaIsoEdit" name="fechaIso" placeholder="Fecha ISO">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="fechaPublicacion">Fecha publicación</label>
                <input type="date" class="form-control required" id="fechaPublicacionEdit" name="fechaPublicacion" placeholder="Fecha Publicación">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="idioma">Idioma</label>
                <input type="text" class="form-control required" id="idiomaEdit" name="idioma" placeholder="Idioma">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control required" id="isbnEdit" name="isbn" placeholder="Isbn">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Editorial</label>
                <select class="form-control required" id="editorialEdit" name="editorial">
                    <option value="0">Seleccione</option>
                <?php 
                    $obj = new Editorial();
                    $data = $obj->getAll();
                    if($data!=null)
                    {
                        foreach ($data as $value) 
                        {
                        echo "<option value=".$value['id'].">".$value['nombre']."</option>";
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Pais</label>
                <select class="form-control required" id="paisEdit" name="pais">
                    <option value="0">Seleccione</option>
                <?php 
                    $obj = new Pais();
                    $data = $obj->getAll();
                    if($data!=null)
                    {
                        foreach ($data as $value) 
                        {
                        echo "<option value=".$value['id'].">".$value['nombre']."</option>";
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Tipo Coleccion</label>
                <select class="form-control required" id="tipoColeccionEdit" name="tipoColeccion">
                    <option value="0">Seleccione</option>
                <?php 
                    $obj = new TipoColeccion();
                    $data = $obj->getAll();
                    if($data!=null)
                    {
                        foreach ($data as $value) 
                        {
                        echo "<option value=".$value['id'].">".$value['nombre']."</option>";
                        }
                    }
                ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group required">
                <label>Tipo Literatura</label>
                <select class="form-control required" id="tipoLiteraturaEdit" name="tipoLiteratura">
                    <option value="0">Seleccione</option>
                <?php 
                    $obj = new TipoLiteratura();
                    $data = $obj->getAll();
                    if($data!=null)
                    {
                        foreach ($data as $value) 
                        {
                        echo "<option value=".$value['id'].">".$value['nombre']."</option>";
                        }
                    }
                ?>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row" id="misAutores">
        <div id="listas" class="listas">
            <div class="col-md-3 grupos">
            <div class="form-group"> 
                <label>Cod. Autor</label>
                <!-- <input type="text" name="autores[]" class="form-control required" id="autores"> -->

                <div >
                    <div>
                        <input type="text" name="campo" class="form-control txtAutor required" id="campo">
                        
                    </div>
                </div>
            </div>

            
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
                        <div style="margin-top: 22px;">
            <div class="btn-group">
 <button style=" height: 30px;" type="button" class="btn btn-info btn-sm" id="find" value="find" name="btnBuscar">
    <span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span>
 </button>

  <button style=" height: 30px;margin-left: 5px;" type="button" class="btn btn-success btn-sm" id="add_field" value="more" hidden="true" name="btnAgregar">
    <span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span>
  </button>
            </div>
        </div>
            </div>
            
            
        </div>


    </div>
<button type="button" name="close" class="btn btn-danger" data-dismiss="modal"  style="margin-left: 570px;">Cerrar</button>
<button type="button" name="siguiente" class="next btn btn-info" value="Next" id="siguiente">Siguiente</button>
 

<!-- AQUI -->
<!-- TABLA DATOS USUARIO -->
      </div>
      <div class="modal-footer">
  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  <button type="button" class="btn btn-primary" id="realizar" value="registrar">Realizar Prestamo</button> -->
      </div>
    </div>
  </div>
</div>
</font> <!-- FIN MODAL EDITAR LIBRO -->

</html>


