<?php 

require_once '../../app/config.php';
$con = conectar();

$anio = date('Y');
$array = array();

for ($i=1; $i < 13; $i++) { 
	$sql = "SELECT (SELECT count(*) from prestamo where month(fechaRealizacion)='{$i}' and year(fechaRealizacion)='{$anio}' and estado=1) as cantidad";
	$resultados = $con->query($sql);

	if ($resultados->num_rows>0) {
            
           while ($row = mysqli_fetch_array($resultados)) {
               	$cantidad = $row['cantidad'];

                $array[] = array('mes'=> $i, 'cantidad'=> $cantidad);
           }
        }

}

echo(json_encode($array));


 ?>