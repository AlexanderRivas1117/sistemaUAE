<?php

	require_once ("../../app/config.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	mysqli_set_charset($con, "utf8");
	$tables="editorial";
	$campos="*";
	$sWhere=" editorial.nombre LIKE '%".$query."%' and estado=1";
	$sWhere.=" order by editorial.nombre";
	
	
	include '../pagination.php'; 
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); 
	$adjacents  = 4; 
	$offset = ($page - 1) * $per_page;
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	


		
	
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-bordered" id="dataTabled" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     	<th class='text-center'>Nombre</th>
						<th>Acción </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                     	<th class='text-center'>Nombre</th>
						<th>Acción </th>
                    </tr>
                  </tfoot>
                  <tbody>





                   <?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id'];
							$nombre=$row['nombre'];					
							$finales++;
						?>	
						<tr class="<?php echo $text_class;?>">
							<td class='text-center'><?php echo $nombre;?></td>
							<td>
								<button href="#"  data-target="#editEditorialModal" class="edit btn btn-info btn-circle" data-toggle="modal" data-nombre='<?php echo $nombre;?>' data-id="<?php echo $id; ?>">
									<i class='fas fa-edit'></i></button>
								<button href="#deleteEditorialModal" class="delete btn btn-danger btn-circle" data-toggle="modal" data-id="<?php echo $id;?>">
									<i class="fas fa-trash"></i></button>
                    		</td>
                    		
						</tr>
						<?php } ?>
	
							
                    
                  
               
                  </tbody>
                </table>
			<!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th class='text-center'>Nombre</th>
						<th>Acción </th>
					</tr>
				</thead>
				<tbody>	
						
				</tbody>			
			</table> -->
		</div>	

	
	
	<?php	
	}	
}
?>          
<script>
  $(document).ready(function() {

         //$('#dataTabled').css("color", "green");
         $('#dataTabled').DataTable({
         	"searching": false,
			    "language": {
			        "sProcessing":    "Procesando...",
			        "sLengthMenu":    "Mostrar _MENU_ registros",
			        "sZeroRecords":   "No se encontraron resultados",
			        "sEmptyTable":    "Ningún dato disponible en esta tabla",
			        "sInfo":          "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			        "sInfoEmpty":     "Mostrando registros del 0 al 0 de un total de 0 registros",
			        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
			        "sInfoPostFix":   "",
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
        //alert(123);
});
</script>
