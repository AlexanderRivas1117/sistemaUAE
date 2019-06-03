<?php 

require_once realpath (dirname (__FILE__).'/../app/config.php');

/**
 * 
 Nombre de la clase: Editorial
 Version: 1.0
 Author: Alexander Rivas
 CopyRigth: Universidad Albert Einstein
 Fecha: 21-12-2018
 *
 */
class Editorial
{
	private $id;
	private $nombre;
	public $con;
	function __construct()
	{
		$this->con=conectar();
	}

	public function getAll()
    {
        $sqlAll = "SELECT * from editorial where estado=1";
        $info = $this->con->query($sqlAll);
        $editorial = array();
        if ($info->num_rows>0) {
            
            while($row = mysqli_fetch_array($info)) 
            { 
                $id=$row['id'];
                $nombre=$row['nombre'];
    

                $editorial[] = array('id'=> $nombre, 'text'=> $nombre);

            }
        }else{

            $editorial = false;
        }
        return json_encode($editorial);
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