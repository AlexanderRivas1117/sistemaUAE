<?php 

require_once realpath (dirname (__FILE__).'/../app/config.php');


/**
 * 
 */
class Departamento
{
	private $id;
	private $nombre;
	public $con;
	function __construct()
	{
		$this->con = conectar();
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

    public function getAll()
    {
        $sql = "SELECT * from departamento";
        $info = $this->con->query($sql);
        if ($info->num_rows>0) {           
            $dato = $info;
        }else{
            $dato = false;
        }
        return $dato;
    }
}


 ?>