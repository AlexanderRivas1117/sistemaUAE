<?php 

require_once '../vendor/autoload.php';
require_once '../app/config.php';

$html = '<table border="1" style="border-collapse: collapse;width:100%;">';
	$html .= '<tr>';
			$html .= '<td colspan="8" style="text-align:center;">';
				$html .= 'UBICACIÓN';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="4" style="text-align:left;">';
				$html .= 'Nombre de la Biblioteca';
			$html .= '</td>';
			$html .= '<td colspan="4" style="text-align:left;">';
				$html .= 'Teléfono';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="4" style="text-align:left;">';
				$html .= 'Dirección';
			$html .= '</td>';
			$html .= '<td colspan="4" style="text-align:left;">';
				$html .= 'Departamento';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="8" style="text-align:left;">';
				$html .= 'Municipio';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="8" style="text-align:left;">';
				$html .= 'Informe correspondiente al mes de ';
			$html .= '</td>';
	$html .= '</tr>';


	$html .= '<tr>';
		$html .= '<td style="text-align:center;">';
				$html .= '#';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'N° Inventario';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'Título Prestado';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'Fecha Devolución';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'Nombre Usuario';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'Carnet';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'Carrera';
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= 'Multa';
		$html .= '</td>';
	$html .= '</tr>';


$sql = 'SELECT iv.numeroInventario,l.nombre as titulo,p.fechaDevolver,u.nombre as nombreUsuario,
u.carnet,c.nombre as carrera,datediff(curdate(), p.fechaDevolver) as multa 
from prestamo p
inner join inventario iv
on p.idInventario = iv.id
inner join usuario u
on p.idUsuario = u.id
inner join libro l
on iv.idLibro= l.id
inner join carrera c
on u.idCarrera=c.id
where datediff(curdate(), p.fechaDevolver)>0';
$con = conectar();
				$result = $con->query($sql);
				mysqli_close($con);

$i = 0;
foreach ($result as $row) {
	$i++;

	$html .= '<tr>';
		$html .= '<td style="text-align:center;">';
				$html .= $i;
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= $row['numeroInventario'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['titulo'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['fechaDevolver'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['nombreUsuario'];
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= $row['carnet'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['carrera'];
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				$html .= '$'.$row['multa'].'.00';
		$html .= '</td>';
	$html .= '</tr>';

}


	

$html .= '</table>';

$html = utf8_decode($html);

		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);
        $html= utf8_encode($html);
        $mpdf->WriteHTML($html);
        $mpdf->Output();

 ?>