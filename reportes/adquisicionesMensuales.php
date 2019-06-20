<?php 

require_once '../vendor/autoload.php';
require_once '../app/config.php';

$mes = $_REQUEST['mes'];
if (isset($_REQUEST['anio'])) {
	$anio = $_REQUEST['anio'];
}
else
{
	$anio = date("Y");
}

if ($mes==1) {
	$nombreMes='Enero';
}
if ($mes==2) {
	$nombreMes='Febrero';
}
if ($mes==3) {
	$nombreMes='Marzo';
}
if ($mes==4) {
	$nombreMes='Abril';
}
if ($mes==5) {
	$nombreMes='Mayo';
}
if ($mes==6) {
	$nombreMes='Junio';
}
if ($mes==7) {
	$nombreMes='Julio';
}
if ($mes==8) {
	$nombreMes='Agosto';
}
if ($mes==9) {
	$nombreMes='Septiembre';
}
if ($mes==10) {
	$nombreMes='Octubre';
}
if ($mes==11) {
	$nombreMes='Noviembre';
}
if ($mes==12) {
	$nombreMes='Diciembre';
}


$html = '<table border="1" style="border-collapse: collapse;width:100%;">';
	$html .= '<tr>';
				$html .= '<td colspan="1" style="text-align:center; border-top-style: none; border-left-style: none; border-right-style: none;">';
				$html .= '<div><img style="margin-bottom:15px;" align="center" width="70" height="70"  src="logo_UAE.jpg"/></div>';
				$html .= '</td>';
			$html .= '<td colspan="9" style="text-align:center; border-top-style: none; border-left-style: none; border-right-style: none; margin-bottom:50px;">';
				
				$html .= 'UNIVERSIDAD ALBERT EINSTEIN<br>
								UNIDAD DE BIBLIOTECA<br>
REPORTE ESTADISTICO DEL SISTEMA DE GESTION BIBLIOGRAFICA AUTOMATIZADO
';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="2" style="text-align:left;">';
				$html .= 'INSTITUCION :  ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center;">';
				$html .= 'Universidad Albert Einstein ';
			$html .= '</td>';

			$html .= '<td colspan="2" style="text-align:left;">';
				$html .= 'TELEFONO: ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center;">';
				$html .= '2212-7600 Ext. 121';
			$html .= '</td>';

	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="2" style="text-align:left;">';
				$html .= 'NOMBRE DE LA BIBLIOTECA: ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center;">';
				$html .= 'Biblioteca Especializada UAE ';
			$html .= '</td>';

			$html .= '<td colspan="2" style="text-align:left;">';
				$html .= 'CORREO ELECTRÓNICO: ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center;">';
				$html .= 'biblioteca@uae.edu.sv';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="2" style="text-align:left;">';
				$html .= 'DIRECCIÓN: ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center;">';
				$html .= 'Final y Avenida Albert Einstein y Calle Teotl, Urbanización Lomas de San Francisco.  ';
			$html .= '</td>';

			$html .= '<td colspan="2" style="text-align:left;">';
				$html .= 'MUNICIPIO Y DEPARTAMENTO: ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center;">';
				$html .= 'Antiguo Cuscatlán, La Libertad';
			$html .= '</td>';

	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="10" style="text-align:center;">';
				$html .= 'INFORME DE ADQUISIONES MENSUALES CORRESPONDIENTE A: &nbsp; '.'<b>'.strtoupper($nombreMes).'</b>';
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
				$html .= 'Librística';
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
				$html .= 'Fecha de Adquisición';
			$html .= '</td>';

	$html .= '</tr>';


$sql = "SELECT iv.numeroInventario,l.nombre as titulo,l.autor,l.idTipoColeccion,l.clasificacion,
l.numeroEdicion,l.idEditorial,l.libristica,l.fechaPublicacion,iv.formaAdquisicion,iv.fechaAdquisicion
from inventario iv
inner join libro l
on iv.idLibro= l.id
where iv.eliminado=0
		and year(iv.fechaAdquisicion) = '{$anio}'
        and month(iv.fechaAdquisicion) = '{$mes}';";
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
				$html .= $row['libristica'];
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
				$html .= date("d-m-Y", strtotime($row['fechaAdquisicion']));
		$html .= '</td>';

		
	$html .= '</tr>';
	}

for ($i; $i < 12; $i++) {
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