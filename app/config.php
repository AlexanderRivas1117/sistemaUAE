<?php 

define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DBNAME','bibliotecauae');

	    function conectar()
		{
			$con = new mysqli(HOST, USER, PASS, DBNAME);
			mysqli_set_charset( $con, 'utf8');
			if (!$con){
				echo "Error en la Conexion".mysqli_error($con);
				die();
			}
			
			return $con;
		}

		$con=@mysqli_connect(HOST, USER, PASS, DBNAME);
	    if(!$con){
	        die("imposible conectarse: ".mysqli_error($con));
	    }
	    if (@mysqli_connect_errno()) {
	        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
	    }

 ?>