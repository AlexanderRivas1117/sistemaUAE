<?php 

require_once realpath (dirname (__FILE__).'/../model/Usuario.php');
require_once realpath (dirname (__FILE__).'/../model/Inventario.php');
require_once realpath (dirname (__FILE__).'/../model/Prestamo.php');


if (isset($_POST['key'])) {
	
	$key = $_POST['key'];

	switch ($key) {
		case 'obtIdUsuario':
			
			obtIdUsuario();
			break;
		case 'obtIdInventario':
			obtIdInventario();
			break;
		case 'obtNumPrestamos':
			obtNumPrestamos();
			break;
		case 'searchInventario':
			searchInventario();
			break;
		case 'searchPrestamo':
			searchPrestamo();
			break;
		case 'nuevoPrestamo':
			nuevoPrestamo();
			break;
		case 'devolverPrestamo':
			devolverPrestamo();
			break;
		default:
			# code...
			break;
	}
}


function obtIdUsuario()
{
	$carnet = $_POST['carnet'];
	$objU = new Usuario();
	$objU->setCarnet($carnet);
	$res = $objU->obtIdUsuario();
	echo $res;
}

function obtIdInventario()
{
	$codInventario = $_POST['codInventario'];
	$objInv = new Inventario();
	$objInv->setcodigoInventario($codInventario);
	$res = $objInv->obtIdInventario();
	echo $res;
}

function obtNumPrestamos()
{
	$idUsuario = $_POST['idUser'];
	$objPre = new Prestamo();
	$objPre->setIdUsuario($idUsuario);
	$res = $objPre->obtNumPrestamos();
	echo $res;
}

function searchInventario()
{
	$txtBuscar = $_POST['txtBusqueda'];
	$tipoBusqueda = $_POST['tipoBusqueda'];

	$objInv = new Inventario();
	$res = $objInv->searchInventario($txtBuscar,$tipoBusqueda);
	echo $res;
}

function nuevoPrestamo()
{
	$data = $_POST['dataPrestamo'];
	$data = json_decode($data);
	$objPre = new Prestamo();
	$fechaDevolver = $data[1]->value;
	$idUsuario = $data[3]->value;
	$tipoPrestamo = $data[0]->value;
	$idInventario = $data[5]->value;
	$res = $objPre->nuevoPrestamo($fechaDevolver,$idUsuario,$tipoPrestamo,$idInventario);
	echo $res;
}

function searchPrestamo()
{
	$txtBuscar = $_POST['txtSearch'];
	$tipoBusqueda = $_POST['tipo'];

	$objPre = new Prestamo();
	$res = $objPre->searchPrestamo($txtBuscar,$tipoBusqueda);
	echo $res;
}

function devolverPrestamo()
{
	$id = $_POST['nPrestamo'];
	$objPre = new Prestamo();
	$res = $objPre->devolverPrestamo($id);
	echo $res;
}


 ?>