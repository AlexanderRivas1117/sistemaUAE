<?php 

require_once '../../../../app/config.php';
$con = conectar();

$sql = "SELECT (SELECT count(*) from prestamo where month(fechaRealizacion)=1 and year(fechaRealizacion)=2019) as enero,
	   (SELECT count(*) from prestamo where month(fechaRealizacion)=2 and year(fechaRealizacion)=2019) as febrero,
       (SELECT count(*) from prestamo where month(fechaRealizacion)=3 and year(fechaRealizacion)=2019) as marzo,
       (SELECT count(*) from prestamo where month(fechaRealizacion)=4 and year(fechaRealizacion)=2019) as abril,
       (SELECT count(*) from prestamo where month(fechaRealizacion)=5 and year(fechaRealizacion)=2019) as mayo,
       (SELECT count(*) from prestamo where month(fechaRealizacion)=6 and year(fechaRealizacion)=2019) as junio";

$resultados = $con->query($sql);

 $array = array();
        if ($resultados->num_rows>0) {
            
           while ($row = mysqli_fetch_array($resultados)) {
                $id=$row['enero'];
                $nombre=$row['nombre'];
    

                $pais[] = array('id'=> $id, 'text'=> $nombre);
           }
        }


 ?>