<?php 

require_once realpath (dirname (__FILE__).'/../app/config.php');
/**
 * 
 Nombre de la clase: Carrera
 Version: 1.0
 Author: Alexander Rivas
 CopyRigth: Universidad Albert Einstein
 Fecha: 26-11-2018
 *
 */
class Carrera
{
	private $id;
	private $nombre;
	private $duracion;
	public $con;
	function __construct()
	{
		$this->con = conectar();
	}



	public function getAll()
    {
        $sqlAll = "SELECT * from carrera WHERE estado =1";
        $info = $this->con->query($sqlAll);
        if ($info->num_rows>0) {
            
            $dato = $info;
        }else{

            $dato = false;
        }
        return $dato;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     *
     * @return self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * @param mixed $duracion
     *
     * @return self
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }
}

 ?>