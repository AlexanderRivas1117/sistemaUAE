<?php
	
		require_once('../Models/login.php');


		$boton=$_POST['boton'];

		switch ($boton) {
			case 'cerrar':
					session_start();
					session_destroy();
				break;
			case 'ingresar':
					$carnet = $_POST['carnet'];
					$password = $_POST['password'];

					$ins = new login();
					$array=$ins->identificar($carnet,$password);
					if ($array[0]==0) 
					{
						echo '0';
					}
					else
					{
						session_start();
						$_SESSION['ingreso']='YES';
						$_SESSION['nombre']=$array[1];
					}
				break;
			default:
				# code...
				break;
		}

		
?>