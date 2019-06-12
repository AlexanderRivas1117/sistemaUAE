<?php 

require_once '../vendor/autoload.php';
require_once '../app/config.php';

ini_set("memory_limit","-1");


if (isset($_REQUEST['anio'])) {
	$anio = $_REQUEST['anio'];
}
else
{
	$anio = date("Y");
}




$html = '<table border="1" style="border-collapse: collapse;width:100%;">';
	$html .= '<tr>';
			$html .= '<td colspan="10" style="text-align:center;">';
				$html .= 'UBICACIÓN';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="5" style="text-align:left;">';
				$html .= 'Nombre de la Biblioteca';
			$html .= '</td>';
			$html .= '<td colspan="5" style="text-align:left;">';
				$html .= 'Teléfono';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="5" style="text-align:left;">';
				$html .= 'Dirección';
			$html .= '</td>';
			$html .= '<td colspan="5" style="text-align:left;">';
				$html .= 'Departamento';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="10" style="text-align:left;">';
				$html .= 'Municipio';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="10" style="text-align:left;">';
				$html .= 'Informe correspondiente al año: &nbsp; '.'<b>'.$anio.'</b>';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td style="text-align:center;">';
				$html .= 'Inventario';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Título';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Autor';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Colección';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Clasificación';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Edición';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Editorial';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Año de Publicación';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Forma de Adquisición';
			$html .= '</td>';

			$html .= '<td style="text-align:center;">';
				$html .= 'Fecha de Adquisición';
			$html .= '</td>';

	$html .= '</tr>';


$sql = "SELECT iv.numeroInventario,l.nombre as titulo,l.autor,l.idTipoColeccion,l.clasificacion,
l.numeroEdicion,l.idEditorial,l.fechaPublicacion,iv.formaAdquisicion,iv.fechaAdquisicion
from inventario iv
inner join libro l
on iv.idLibro= l.id
where iv.eliminado=0
		and year(iv.fechaAdquisicion) = '{$anio}'";
$con = conectar();
				$result = $con->query($sql);
				mysqli_close($con);

$i=0;
	foreach ($result as $row) {
		$i++;

		$html .= '<tr>';

		$html .= '<td style="text-align:center;">';
				$html .= $row['numeroInventario'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['titulo'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['autor'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['idTipoColeccion'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['clasificacion'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['numeroEdicion'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['idEditorial'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['fechaPublicacion'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= $row['formaAdquisicion'];
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				$html .= date("d-m-Y", strtotime($row['fechaAdquisicion']));
		$html .= '</td>';

		
	$html .= '</tr>';
	}

for ($i; $i < 16; $i++) {
	$html .= '<tr>';

		$html .= '<td style="text-align:center;  height:30px;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:left;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				
		$html .= '</td>';

		$html .= '<td style="text-align:center;">';
				
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