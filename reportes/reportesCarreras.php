<?php 

require_once '../vendor/autoload.php';
require_once '../app/config.php';

$mes = $_REQUEST['mes'];
$anio = $_REQUEST['anio'];
if ($mes==4 || $mes==6 || $mes==9 || $mes==11) {
	$diasMes = 30;
}

if ($mes==1 || $mes==3 || $mes==5 || $mes==7 || $mes==8 || $mes==10 || $mes==12) {
	$diasMes = 31;
}
else
{
	$diasMes==28;
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
			$html .= '<td colspan="14" style="text-align:center; border-top-style: none; border-left-style: none; border-right-style: none; margin-bottom:50px;">';
				
				$html .= 'UNIVERSIDAD ALBERT EINSTEIN<br>
								UNIDAD DE BIBLIOTECA<br>
REPORTE ESTADISTICO DEL SISTEMA DE GESTION BIBLIOGRAFICA AUTOMATIZADO
';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="3" style="text-align:left;">';
				$html .= 'INSTITUCION :  ';
			$html .= '</td>';

			$html .= '<td colspan="5" style="text-align:center;">';
				$html .= 'Universidad Albert Einstein ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:left;">';
				$html .= 'TELEFONO: ';
			$html .= '</td>';

			$html .= '<td colspan="4" style="text-align:center;">';
				$html .= '2212-7600 Ext. 121';
			$html .= '</td>';

	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="3" style="text-align:left;">';
				$html .= 'NOMBRE DE LA BIBLIOTECA: ';
			$html .= '</td>';

			$html .= '<td colspan="5" style="text-align:center;">';
				$html .= 'Biblioteca Especializada UAE ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:left;">';
				$html .= 'CORREO ELECTRÓNICO: ';
			$html .= '</td>';

			$html .= '<td colspan="4" style="text-align:center;">';
				$html .= 'biblioteca@uae.edu.sv';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="3" style="text-align:left;">';
				$html .= 'DIRECCIÓN: ';
			$html .= '</td>';

			$html .= '<td colspan="5" style="text-align:center;">';
				$html .= 'Final y Avenida Albert Einstein y Calle Teotl, Urbanización Lomas de San Francisco.  ';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:left;">';
				$html .= 'MUNICIPIO Y DEPARTAMENTO: ';
			$html .= '</td>';

			$html .= '<td colspan="4" style="text-align:center;">';
				$html .= 'Antiguo Cuscatlán, La Libertad';
			$html .= '</td>';

	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td colspan="15" style="text-align:center;">';
				$html .= 'INFORME POR CARRERAS, CORRESPONDIENTE AL MES DE: &nbsp; '.'<b>'.strtoupper($nombreMes).'</b>';
			$html .= '</td>';
	$html .= '</tr>';



	$html .= '<tr>';
			$html .= '<td style="text-align:center; vertical-aling: middle;" rowspan="2">';
				$html .= 'CARRERA';
			$html .= '</td>';

			$html .= '<td colspan="3" style="text-align:center; vertical-aling: middle;">';
				$html .= 'LECTORES';
			$html .= '</td>';

			$html .= '<td colspan="12" style="text-align:center; vertical-aling: middle;">';
				$html .= 'OBRAS CONSULTADAS';
			$html .= '</td>';
	$html .= '</tr>';

	$html .= '<tr>';
			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'TOTAL';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'HOMBRES';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'MUJERES';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'TOTAL';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Obras Generales (000)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Filosofia (100)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Religión (200)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Ciencias Sociales (300)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Filología y lingüística (400)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Ciencias Puras (500)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Ciencias Aplicadas (600)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Bellas Artes (700)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Literatura (800)';
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= 'Historia y Geografía (900)';
			$html .= '</td>';

	$html .= '</tr>';




		// OBTENER CARRERAS
		$sql = "SELECT distinct(c.nombre),c.id from prestamo p
				inner join usuario u 
				on p.idUsuario = u.id
				inner join carrera c
				on u.idCarrera=c.id;";
		$con = conectar();
				$carreras = $con->query($sql);
				mysqli_close($con);
		$r = 0;
		// FIN OBTENER CARRERAS

		foreach ($carreras as $row) {
			$r++;
			$idCarrera = $row['id'];

			$html .= '<tr>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$html .= $row['nombre'];
			$html .= '</td>';

		$html .= '<td style="text-align:center; vertical-aling: middle;">';

				$sql = "SELECT count(p.idUsuario) as totalUsuarios from prestamo p 
   inner join usuario u on p.idUsuario = u.id 
   inner join carrera c on u.idCarrera = c.id 
   where month(p.fechaRealizacion) = '{$mes}' and year(fechaRealizacion) = '{$anio}' and p.estado=1 and c.id='{$idCarrera}'";
				$con = conectar();
				$result = $con->query($sql);
				$result = $result->fetch_assoc();
				$html .= $result['totalUsuarios'];
				mysqli_close($con);

			$html .= '</td>';


			
			$html .= '<td style="text-align:center; vertical-aling: middle;">';

			$sql = "SELECT count(p.idUsuario) as hombres from prestamo p 
				   inner join usuario u on p.idUsuario = u.id 
				   inner join carrera c on u.idCarrera = c.id 
				   where month(p.fechaRealizacion) = '{$mes}' and year(fechaRealizacion) = '{$anio}' and p.estado=1 and c.id='{$idCarrera}' and u.genero='Masculino'";
				$con = conectar();
				$result = $con->query($sql);
				$result = $result->fetch_assoc();
				$html .= $result['hombres'];
				mysqli_close($con);

			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				$sql = "SELECT count(p.idUsuario) as mujeres from prestamo p 
				   inner join usuario u on p.idUsuario = u.id 
				   inner join carrera c on u.idCarrera = c.id 
				   where month(p.fechaRealizacion) = '{$mes}' and year(fechaRealizacion) = '{$anio}' and p.estado=1 and c.id='{$idCarrera}' and u.genero='Femenino'";
				$con = conectar();
				$result = $con->query($sql);
				$result = $result->fetch_assoc();
				$html .= $result['mujeres'];
				mysqli_close($con);
			$html .= '</td>';

			$col = '';
			$acum = 0;
			//COLUMNAS POR EPIGRAFE
			for ($c=0; $c < 10; $c++) {

				$sql = "SELECT count(*) as historia from prestamo p
					inner join inventario iv
					on p.idInventario=iv.id
					inner join libro l
					on iv.idLibro=l.id
					inner join usuario u on p.idUsuario = u.id 
				   	inner join carrera c on u.idCarrera = c.id 
					where (l.clasificacion like 'COL.NB&{$c}%' 
				   or l.clasificacion like 'CPERLA&{$c}%' 
				   or l.clasificacion like '{$c}%' -- obras generales
				   or l.clasificacion like 'C.DPI&{$c}%' -- diplomados
				   or l.clasificacion like 'DIP&{$c}%' -- diplomados
				   or l.clasificacion like '{$c}%' -- libros
				   or l.clasificacion like 'REF.&{$c}%' -- libros
				   or l.clasificacion like 'JSA.&{$c}%'
				   or concat_ws('',clasificacion,libristica) like '%&{$c}%' AND concat_ws('',clasificacion,libristica) like 'T%')-- libros
				   and iv.estadoMaterial='Prestado' and month(p.fechaRealizacion) = '{$mes}' and year(fechaRealizacion) = '{$anio}' and c.id='{$idCarrera}' ";
				$con = conectar();
				$result = $con->query($sql);
				$result = $result->fetch_assoc();

				mysqli_close($con);

				$col .= '<td style="text-align:center; vertical-aling: middle;">';
					$col .= $result['historia'];
				$col .= '</td>';
				$acum += $result['historia'];
			}

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
					$html .= $acum;
			$html .= '</td>';

			$html .= $col;


			$html .= '</tr>';
			
		}

			for ($r; $r < 9; $r++) { 
			
			$html .= '<tr>';

			$html .= '<td style="text-align:center; vertical-aling: middle; height:40px;">';
			
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
			$html .= '</td>';

			$html .= '<td style="text-align:center; vertical-aling: middle;">';
				
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