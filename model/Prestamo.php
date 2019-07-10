<?php 


/**
 Nombre de la clase: Prestamo
 Version: 1.0
 Author: Alexander Rivas
 CopyRight: Universidad Albert Einstein
 Fecha: 28-11-2018
 */
require_once realpath (dirname (__FILE__).'/../app/config.php');
class Prestamo
{
	private $id;
	private $fechaRealizacion;
	private $fechaDevolver;
	private $fechaDevolvio;
	private $idUsuario;
	private $idInventario;
	public $con;
	function __construct()
	{
		$this->con = conectar();
	}

    public function guardarCambios($tipoPrestamo,$fechaDevolver,$id)
    {
       $sql = "UPDATE prestamo set tipoPrestamo='{$tipoPrestamo}',fechaDevolver='{$fechaDevolver}' WHERE id='{$id}'";
        $res = $this->con->query($sql);
        $data = array();
        if($res){
            $data['estado'] = true;
            $data['descripcion'] = "Préstamo editado exitosamente";
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "Error al editar préstamo".$this->db->error;
        }

        return json_encode($data);
    }



    public function getInfo($id)
    {
        $sql = "SELECT * from prestamo where id='{$id}'";
        mysqli_set_charset($this->con, "utf8");
        $info = $this->con->query($sql);
        $obj = array();
       
        if($info->num_rows>0)
        {
            while($row = mysqli_fetch_array($info)) 
            { 
                $id=$row['id'];
                $tipoPrestamo=$row['tipoPrestamo'];
                $fechaDevolver = $row['fechaDevolver'];
               


                $obj[] = array('id'=> $id, 'tipoPrestamo'=> $tipoPrestamo,'fechaDevolver'=> $fechaDevolver);

            }
        }
        else
        {
            $obj['estado'] = $this->con->error;
        }
        return json_encode($obj); 
    }


    public function searchPrestamo($txt,$tipo)
    {
       $sql = "call obtenerPrestamos('{$tipo}','{$txt}');";
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

    public function nuevoPrestamo($fechaDevolver,$idUsuario,$tipoPrestamo,$idInventario)
    {
       $sql = "call nuevoPrestamo('".$fechaDevolver."','".$idUsuario."','".$tipoPrestamo."','".$idInventario."')";
        $res = $this->con->query($sql);
        $data = array();
        if($res){
            $data['estado'] = true;
            $data['descripcion'] = "Préstamo realizado exitosamente";
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "Error al realizar préstamo".$this->db->error;
        }

        return json_encode($data);
    }

    public function devolverPrestamo($id)
    {
       $sql = "call devolverPrestamo('".$id."')";
        $res = $this->con->query($sql);
        $data = array();
        if($res){
            $data['estado'] = true;
            $data['descripcion'] = "Préstamo devuelto exitosamente";
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "Error al devolver préstamo".$this->db->error;
        }

        return json_encode($data);
    }

    public function obtNumPrestamos()
    {
        $sql = "SELECT * from prestamo where idUsuario='".$this->idUsuario."'  AND fechaDevolvio IS NULL";
        $info = $this->con->query($sql);
        $data = array();

        if($info->num_rows>=4)
        {
            $data['estado'] = false;
            $data['descripcion'] = "No tiene prestamos disponibles";
        }
        else
        {
            $data['estado'] = true;
            $data['descripcion'] = "Tiene prestamos disponibles!";
        }
        return json_encode($data);
    }

    public function getAll()
    {
        $sql = "call allPrestamos()";
        $info = $this->con->query($sql);
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
    public function getFechaRealizacion()
    {
        return $this->fechaRealizacion;
    }

    /**
     * @param mixed $fechaRealizacion
     *
     * @return self
     */
    public function setFechaRealizacion($fechaRealizacion)
    {
        $this->fechaRealizacion = $fechaRealizacion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaDevolver()
    {
        return $this->fechaDevolver;
    }

    /**
     * @param mixed $fechaDevolver
     *
     * @return self
     */
    public function setFechaDevolver($fechaDevolver)
    {
        $this->fechaDevolver = $fechaDevolver;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFechaDevolvio()
    {
        return $this->fechaDevolvio;
    }

    /**
     * @param mixed $fechaDevolvio
     *
     * @return self
     */
    public function setFechaDevolvio($fechaDevolvio)
    {
        $this->fechaDevolvio = $fechaDevolvio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * @param mixed $idUsuario
     *
     * @return self
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdInventario()
    {
        return $this->idInventario;
    }

    /**
     * @param mixed $idInventario
     *
     * @return self
     */
    public function setIdInventario($idInventario)
    {
        $this->idInventario = $idInventario;

        return $this;
    }
}



 ?>