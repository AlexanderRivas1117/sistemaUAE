<?php 

require_once realpath (dirname (__FILE__).'/../model/Departamento.php');
require_once realpath (dirname (__FILE__).'/../model/Municipio.php');
require_once realpath (dirname (__FILE__).'/../app/config.php');
if (isset($_POST['key'])) {
	
	$key = $_POST['key'];

	switch ($key) {
		case 'selectMunicipio':
			
			solicitarMunicipio();
			break;
		
		default:
			# code...
			break;
	}
}

function solicitarMunicipio()
{
	$munObj = new Municipio();
	$dpto = $_POST['departamentoId'];

	$data = $munObj->getAll($dpto);
/*	$data = json_encode($data);*/
/*	$cont=0;	
	$array = array();
	$matriz = array();*/
	/*foreach ($data as $d) {
		$array['id'] = $d['id'];
		$array['nombre'] = $d['nombre'];
		$matriz[$cont] = $array;
		$cont++;
	}*/


	echo($data);
}

 ?>