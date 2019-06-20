<?php 
/**
 Nombre de la clase: Inventario
 Version: 1.0
 Author: Alexander Rivas
 CopyRight: Universidad Albert Einstein
 Fecha: 28-11-2018
 */
require_once realpath (dirname (__FILE__).'/../app/config.php');
class Inventario
{
	private $codigoInventario;
	private $idLibro;
	private $fechaAdquisicion;
	private $volumen;
	private $formaAdquisicion;
	private $precio;
	private $facilitante;
	private $estadoMaterial;
	private $fechaEstado;
	private $solicitante;
	private $entrego;
	private$fechaEntrega;
	public $con;

	function __construct()
	{
		$this->con = conectar();
	}

    public function searchUsuario($txt,$tipo)
    {
       $sql = "call searchUsuario('".$tipo."','".$txt."');";
        mysqli_set_charset($this->con, "utf8");
        $json = "";
        $info = $this->con->query($sql);
       
        if($info->num_rows>0)
        {
            while ($fila =$info->fetch_assoc()) 
            {
                $fila['estado'] = true;
                $obj = json_encode($fila);
                $json .= $obj.",";
            }
            $json = substr($json,0, strlen($json)-1);
        }
        else
        {
            $fila['estado'] = $this->con->error;
            $obj = json_encode($fila);
            $json .= $obj;
        }
        
/*        return '{"data":['.$json.']}'; */
        return '['.$json.']';   
    }
    

    public function searchInventario($txt,$tipo)
    {
       $sql = "call searchInventario('".$tipo."','".$txt."');";
        mysqli_set_charset($this->con, "utf8");
        $json = "";
        $info = $this->con->query($sql);
       
        if($info->num_rows>0)
        {
            while ($fila =$info->fetch_assoc()) 
            {
                $fila['estado'] = true;
                $obj = json_encode($fila);
                $json .= $obj.",";
            }
            $json = substr($json,0, strlen($json)-1);
        }
        else
        {
            $fila['estado'] = $this->con->error;
            $obj = json_encode($fila);
            $json .= $obj;
        }
        
/*        return '{"data":['.$json.']}'; */
        return '['.$json.']';   
    }

	public function obtIdInventario()
    {
        $sql = "SELECT id FROM inventario WHERE numeroInventario='".$this->codigoInventario."'";
         $json = "";
        $info = $this->con->query($sql);
        $retur = "";
        if($info->num_rows>0)
        {
            while ($fila =$info->fetch_assoc()) 
            {
                $obj = json_encode($fila);
                $json .= $obj.",";
            }
        $json = substr($json,0, strlen($json)-1);
        $retur = '['.$json.']';
        }
        else
        {
            $json = $this->con->error;
        }
        return $retur;
    }


    /**
     * @return mixed
     */
    public function getcodigoInventario()
    {
        return $this->codigoInventario;
    }

    /**
     * @param mixed $codigoInventario
     *
     * @return self
     */
    public function setcodigoInventario($codigoInventario)
    {
        $this->codigoInventario = $codigoInventario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdLibro()
    {
        return $this->idLibro;
    }

    /**
     * @param mixed $idLibro
     *
     * @return self
     */
    public function setIdLibro($idLibro)
    {
        $this->idLibro = $idLibro;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaAdquisicion()
    {
        return $this->fechaAdquisicion;
    }

    /**
     * @param mixed $fechaAdquisicion
     *
     * @return self
     */
    public function setFechaAdquisicion($fechaAdquisicion)
    {
        $this->fechaAdquisicion = $fechaAdquisicion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getVolumen()
    {
        return $this->volumen;
    }

    /**
     * @param mixed $volumen
     *
     * @return self
     */
    public function setVolumen($volumen)
    {
        $this->volumen = $volumen;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormaAdquisicion()
    {
        return $this->formaAdquisicion;
    }

    /**
     * @param mixed $formaAdquisicion
     *
     * @return self
     */
    public function setFormaAdquisicion($formaAdquisicion)
    {
        $this->formaAdquisicion = $formaAdquisicion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     *
     * @return self
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacilitante()
    {
        return $this->facilitante;
    }

    /**
     * @param mixed $facilitante
     *
     * @return self
     */
    public function setFacilitante($facilitante)
    {
        $this->facilitante = $facilitante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEstadoMaterial()
    {
        return $this->estadoMaterial;
    }

    /**
     * @param mixed $estadoMaterial
     *
     * @return self
     */
    public function setEstadoMaterial($estadoMaterial)
    {
        $this->estadoMaterial = $estadoMaterial;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaEstado()
    {
        return $this->fechaEstado;
    }

    /**
     * @param mixed $fechaEstado
     *
     * @return self
     */
    public function setFechaEstado($fechaEstado)
    {
        $this->fechaEstado = $fechaEstado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSolicitante()
    {
        return $this->solicitante;
    }

    /**
     * @param mixed $solicitante
     *
     * @return self
     */
    public function setSolicitante($solicitante)
    {
        $this->solicitante = $solicitante;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEntrego()
    {
        return $this->entrego;
    }

    /**
     * @param mixed $entrego
     *
     * @return self
     */
    public function setEntrego($entrego)
    {
        $this->entrego = $entrego;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * @param mixed $fechaEntrega
     *
     * @return self
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }
}

 ?>