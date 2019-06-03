<?php 


require_once realpath (dirname (__FILE__).'/../app/config.php');
/**
 * 
 Nombre de la clase: TipoLiteratura
 Version: 1.0
 Author: Alexander Rivas
 CopyRigth: Universidad Albert Einstein
 Fecha: 26-11-2018
 *
 */

class TipoLiteratura
{
		private $id;
		private $nombre;
		public $conectar;
 	function __construct()
 	{
 		$this->con=conectar();
 	}

 	public function getAll()
    {
        mysqli_set_charset($this->con, "utf8");
        $sqlAll = "SELECT * from tipoliteratura where estado=1";

        $info = $this->con->query($sqlAll);
        $tipoliteratura = array();
        if ($info->num_rows>0) {
            
            while($row = mysqli_fetch_array($info))
            {
                $id = $row['id'];
                $nombre = $row['nombre'];

                $tipoliteratura[] = array('id'=>$id,'text'=>$nombre);
            }
           
        }else{

            $tipoliteratura = false;
        }
        return json_encode($tipoliteratura);
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

	}
 ?>