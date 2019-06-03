<?php 

require_once realpath (dirname (__FILE__).'/../model/Usuario.php');


if (isset($_POST['key'])) {
	
	$key = $_POST['key'];

	switch ($key) {
		case 'registrar':
			
			registrarUsuario();
			break;

		case 'validarCarnet':
			
			validarCarnet();
			break;
		
		case 'infoUsuario':
			
			infoUsuario();
			break;
		case 'login':
			
			login();
			break;

		case 'guardarCambios':
			
			guardarCambios();
			break;
		case 'getInfo':
			
			getInfo();
			break;	
		case 'eliminar':			
			eliminar();
			break;
		default:
			# code...
			break;
	}
}

function eliminar()
{
	$id = $_POST['id'];
	$obj = new Usuario();
	echo $obj->eliminar($id);
}

function getInfo()
{
	$data = $_POST['data'];
	$objU = new Usuario();
	$res = $objU->getInfo($data);
	echo $res;
}
function guardarCambios()
	{
		$objUsuario = new Usuario();
		$data = $_POST['data'];
		//var_dump(json_decode($data));
		$res = $objUsuario->guardarCambios($data);
		$jsonRes = json_encode($res);
		echo $jsonRes;
	}

function login()
	{
		$objUsuario = new Usuario();
		$data = $_POST['data'];

		$data = json_decode($data);
		//var_dump($data);
		$carnet= $data[0]->value;
		$contra= $data[1]->value;
		$res = $objUsuario->ingresar($carnet,$contra);
		$jsonRes = json_encode($res);
		echo $jsonRes;
	}

function registrarUsuario()
{
	$info = $_POST['dataUsuario'];
	$infoDecode = json_decode($info);
	$objU = new Usuario();
	$objU->setCarnet($infoDecode[0]->value);
	$objU->setNombre($infoDecode[1]->value);
	$objU->setApellido($infoDecode[2]->value);
	$objU->setGenero($infoDecode[3]->value);
	$objU->setEdad($infoDecode[4]->value);
	$objU->setDireccion($infoDecode[5]->value);
	$objU->setIdMunicipio($infoDecode[7]->value);
	$objU->setIdTipoUsuario($infoDecode[8]->value);
	$objU->setIdCarrera($infoDecode[9]->value);
	$objU->setTelefono($infoDecode[10]->value);
	$objU->setCorreo($infoDecode[11]->value);
	$objU->setIdRol($infoDecode[12]->value);
	$objU->setCargo($infoDecode[13]->value);
	$objU->setClave($infoDecode[14]->value);

	
	$res = $objU->save();
	echo $res;
}

function validarCarnet()
{
	$carnet = $_POST['nCarnet'];
	$objU = new Usuario();
	$objU->setCarnet($carnet);
	$res = $objU->validarCarnet();
	echo $res;
}

function infoUsuario()
{
	$carnet = $_POST['carnet'];
	$objU = new Usuario();
	$objU->setCarnet($carnet);
	$res = $objU->infoUsuario();
	echo $res;
}

 ?>