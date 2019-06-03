<?php 

/**
 Nombre de la clase: Municipio
 Version: 1.0
 Author: Alexander Rivas
 CopyRight: Universidad Albert Einstein
 Fecha: 28-11-2018
 */
require_once realpath (dirname (__FILE__).'/../app/config.php');
 

class Municipio
{
	private $id;
	private $nombre;
	private $idDepartamento;
	public $con;
	function __construct()
	{
		$this->con = new mysqli(HOST,USER,PASS,DBNAME);
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
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * @param mixed $idDepartamento
     *
     * @return self
     */
    public function setIdDepartamento($idDepartamento)
    {
        $this->idDepartamento = $idDepartamento;

        return $this;
    }

    public function getAll($dptoId)
    {
       $sql = "SELECT * from municipio WHERE idDepartamento='".$dptoId."'";
        mysqli_set_charset($this->con, "utf8");
        $json = "";
        $info = $this->con->query($sql);
       
           
        while ($fila =$info->fetch_assoc()) 
        {
         $obj = json_encode($fila);
         $json .= $obj.",";
        }
        $json = substr($json,0, strlen($json)-1);
/*        return '{"data":['.$json.']}'; */
        return '['.$json.']';   
    }

}

 ?>
