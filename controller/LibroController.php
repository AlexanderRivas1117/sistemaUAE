<?php 
/**
 Nombre del controller: LibroController
 Version: 1.0
 Author: Alexander Rivas
 CopyRight: Universidad Albert Einstein
 Fecha: 12-01-2019
 */

require_once realpath (dirname (__FILE__).'/../model/Libro.php');
require_once realpath (dirname (__FILE__).'/../model/Editorial.php');
require_once realpath (dirname (__FILE__).'/../model/TipoColeccion.php');
require_once realpath (dirname (__FILE__).'/../model/Pais.php');
require_once realpath (dirname (__FILE__).'/../model/TipoLiteratura.php');

if (isset($_POST['key'])) {
	
	$key = $_POST['key'];

	switch ($key) {
		case 'validarNumeroInventario':
			
			validarNumeroInventario();
			break;
		case 'guardarDocumento':			
			guardarDocumento();
			break;
		case 'eliminarLibro':			
			eliminarLibro();
			break;
		case 'editar':			
			editarLibro();
			break;
		case 'searchAutor':
			searchAutor();
			break;
		case 'getAutores':
			getAutores();
			break;
		case 'detalleAutor':			
			detalleAutor();
			break;
		case 'searchAutor2':
			searchAutor2();
			break;
		case 'selectEditorial':
			selectEditorial();
			break;
		case 'selectPais':
			selectPais();
			break;

		case 'tipoColeccion':
			tipoColeccion();
			break;

		case 'tipoLiteratura':
			tipoLiteratura();
			break;

		case 'getInfo':
			getInfo();
			break;
		
		default:
			# code...
			break;
	}
}


function getInfo()
{
	$id = $_REQUEST['id'];
	$objLibro = new Libro();
	echo $objLibro->getInfo($id);
}

function getAutores()
{
	$id = $_POST['id'];
	$objLibro = new Libro();
	echo $objLibro->getAutores($id);
}

function editarLibro()
{
	$id = $_POST['id'];
	$objLibro = new Libro();
	echo $objLibro->getInfoLibro($id);
}

function detalleAutor()
{
	$idAutor = $_POST['idAutor'];
	$idLibro = $_POST['id'];
	$objLibro = new Libro();
	echo $objLibro->detalleAutor($idAutor,$idLibro);
}
function eliminarLibro()
{
	$idLibro = $_POST['idLibro'];
	$objLibro = new Libro();
	echo $objLibro->eliminarLibro($idLibro);
}

function validarNumeroInventario()
{
	$numeroInventario = $_POST['numeroInventario'];
	$objLibro = new Libro();
	echo $objLibro->validarNumeroInventario($numeroInventario);
}

function guardarDocumento()
{
	$dataLibro = $_POST['dataLibro'];
	//var_dump(json_decode($dataLibro));
	$objLibro = new Libro();
	//$dataLibro = json_decode($dataLibro);
	// //var_dump($dataLibro);
	 echo $objLibro->guardarDocumento($dataLibro);
}
function searchAutor()
{
	$txtBuscar = $_POST['txtBuscar'];

	$objLib = new Libro();
	$res = $objLib->searchAutor($txtBuscar);
	echo $res;
}

function searchAutor2()
{	
	$objLib = new Libro();
	$res = $objLib->searchAutor2();
	echo($res);
}

function selectEditorial()
{
	
	$obj = new Editorial();
	$res = $obj->getAll();
	echo($res);
}
function tipoColeccion()
{
	
	$obj = new TipoColeccion();
	$res = $obj->getAll();
	echo($res);
}

function selectPais()
{
	
	$obj = new Pais();
	$res = $obj->getAll();
	echo($res);
}

function tipoLiteratura()
{
	
	$obj = new TipoLiteratura();
	$res = $obj->getAll();
	echo($res);
}


 ?>