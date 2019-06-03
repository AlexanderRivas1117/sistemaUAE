<?php
	if (empty($_POST['nombre'])){
		$errors[] = "Ingresa el nombre del tipo de literatura";
	} elseif (!empty($_POST['nombre'])){
	require_once ("../../app/config.php");
	$nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
	

    $sql = "INSERT INTO tipoliteratura(id, nombre, estado, fechaRegistro) VALUES (NULL,'$nombre', 1, NOW())";
    $query = mysqli_query($con,$sql);
    if ($query) {
        $messages[] = "El tipo de literatura ha sido guardado con éxito.";
    } else {
        $errors[] = "Lo sentimos, el registro falló. Por favor, regrese y vuelva a intentarlo.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>			