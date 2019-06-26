<?php 
require_once realpath (dirname (__FILE__).'/../app/config.php');
/**
 * 
 Nombre de la clase: Usuario
 Version: 1.0
 Author: Alexander Rivas
 CopyRigth: Universidad Albert Einstein
 Fecha: 26-11-2018
 *
 */
class Usuario  
{
	private $id;
	private $carnet;
	private $nombre;
	private $apellido;
	private $clave;
	private $idRol;
	private $idTipoUsuario;
	private $idMunicipio;
	private $genero;
	private $edad;
	private $idCarrera;
	private $telefono;
	private $direccion;
	private $correo;
	private $cargo;
	private $creacion;
	public $con;
	function __construct()
	{
		$this->con = conectar();
	}

public function eliminar($id)
    {
        //echo $idLibro;
        $sql = "UPDATE usuario SET estado = 0 WHERE id = '{$id}';";
            $res = $this->con->query($sql);
            $data = array();
            if($res)
            {
                $data['estado'] = true;
                
                $data['descripcion'] = "Usuario eliminado exitosamente!";
                
            }else
            {
                $data['estado'] = false;
                $data['descripcion'] = "¡Error al eliminar Usuario".$this->con->error;
            }

        return json_encode($data);
    }

public function getInfo($data)
    {
       $sql = "SELECT u.id, u.carnet, u.nombre, u.apellido,
                    u.idRol, u.idTipoUsuario, u.idMunicipio,
                    u.genero, u.edad, u.idCarrera, u.telefono, 
                    u.direccion, u.correo, u.cargo,
                    d.nombre as departamento,d.id as idDepartamento,m.id as idMunicipio
                FROM usuario u
                    inner join municipio m
                        on m.id=u.idMunicipio
                    inner JOIN departamento d
                        on m.idDepartamento=d.id
                WHERE  u.id='".$data."'";
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

    public function guardarCambios($data)
    {

        $data = json_decode($data);
        $contra = sha1($data[15]->value);
//$consulta = "call saveChanges (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
//$sentencia = mysqli_prepare($this->con, $consulta);
// (`id`, `carnet`, `nombre`, `apellido`, `clave`, `idRol`, `idTipoUsuario`, `idMunicipio`, `genero`, `edad`, `idCarrera`, `telefono`, `direccion`, `correo`, `cargo`) VALUES 
//call saveChanges(?, ?, ?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)


$sql= "call saveChanges(
            '".$data[0]->value."',
            '".$data[1]->value."', 
            '".$data[2]->value."', 
            '".$data[3]->value."',
            '".$contra."',
            '".$data[13]->value."',
            '".$data[9]->value."',
            '".$data[7]->value."',
            '".$data[4]->value."',
            '".$data[5]->value."',
            '".$data[10]->value."',
            '".$data[11]->value."',
            '".$data[8]->value."',
            '".$data[12]->value."',
            '".$data[14]->value."')";
$res = $this->con->query($sql);

        if ($res) {
            $json['estado']=true;
            $json['descripcion']="Datos modificados exitosamente";
        }else{
            $json['estado']=false;
            $json['descripcion']="Error en la modificacion ".$this->con->error;
        }

    return json_encode($json);
    }   

     public function ingresar($carnet,$contra)
    {
        $contra = sha1($contra);
        $sql = "SELECT u.carnet as carnet , r.nombre as rol FROM usuario u
INNER JOIN rol r ON u.idRol = r.id WHERE u.estado = 1 and u.carnet = '".$carnet."' and u.clave='".$contra."'";

        $info = $this->con->query($sql);
        session_start();
        if ($info->num_rows>0) 
        {

            $data = $info->fetch_assoc();


            $data['estado'] = true;
            $data['descripcion'] = "Datos Correctos";

            //session_start();

            if(!isset($_SESSION)) 
            { 
        session_start(); 
            }
            $_SESSION['ROL']=$data['rol'];

            

            //header("Location: ../app/validacionGeneral.php");
            
            
        }
        else
        {
            $data['estado'] = false;
            $data['descripcion'] = "Datos Incorrectos".$this->con->error;
            session_destroy();
            //die();
        }       

        return $data;
        
        
    }
    public function infoUsuario()
    {
       $sql = "SELECT * from usuario WHERE carnet='".$this->carnet."'";
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
            $fila['estado'] = false;
            $obj = json_encode($fila);
            $json .= $obj;
        }
        
/*        return '{"data":['.$json.']}'; */
        return '['.$json.']';   
    }

    public function obtIdUsuario()
    {
        $sql = "SELECT id FROM usuario WHERE carnet='".$this->carnet."'";
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
            $json = "";
        }
        return $retur;
    }
    public function validarCarnet()
    {
        $sql = "SELECT id FROM usuario WHERE carnet=?";
        $sentencia = mysqli_prepare($this->con,$sql);
        mysqli_stmt_bind_param(
            $sentencia,
            's',
            $this->carnet
            );
        $ok = mysqli_stmt_execute($sentencia);
        $ok = mysqli_stmt_bind_result($sentencia,$id);
        $sentencia->store_result();
        $data = array();
        //echo mysqli_stmt_num_rows($sentencia);

        if($sentencia->num_rows==0){

            $data['estado'] = false;
            $data['descripcion'] = "Carnet Disponible ";
        }else{
            
            $data['estado'] = true;
            $data['descripcion'] = "Este carnet pertenece a otro usuario!";
        }
        mysqli_stmt_close($sentencia);
        return json_encode($data);
    }

    public function save()
    {

$consulta = "INSERT INTO usuario (`id`, `carnet`, `nombre`, `apellido`, `clave`, `idRol`, `idTipoUsuario`, `idMunicipio`, `genero`, `edad`, `idCarrera`, `telefono`, `direccion`, `correo`, `cargo`, `creacion`, `estado`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURDATE(), '1')";
$sentencia = mysqli_prepare($this->con, $consulta);
$contra = sha1($this->clave);

$ok = mysqli_stmt_bind_param(
            $sentencia,
            "ssssiiisiissss",
            $this->carnet, 
            $this->nombre, 
            $this->apellido,
            $contra,
            $this->idRol,
            $this->idTipoUsuario,
            $this->idMunicipio,
            $this->genero,
            $this->edad,
            $this->idCarrera,
            $this->telefono,
            $this->direccion,
            $this->correo,
            $this->cargo
);

/* Ejecutar la sentencia */
mysqli_stmt_execute($sentencia);

/* cerrar la sentencia */
mysqli_stmt_close($sentencia);
        

        $data = array();
        if($ok){
            $data['estado'] = true;
            $data['descripcion'] = "Datos ingresados exitosamente";
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "Error al ingresar los datos".$this->con->error;
        }

        return json_encode($data);
    }   

//METODO PARA LLENAR SELECT
    public function getAll()
    {
        $sqlAll = "SELECT * from usuario where estado=1";
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
    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * @param mixed $carnet
     *
     * @return self
     */
    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;

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
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * @param mixed $apellido
     *
     * @return self
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @param mixed $clave
     *
     * @return self
     */
    public function setClave($clave)
    {
        $this->clave = $clave;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param mixed $idRol
     *
     * @return self
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdTipoUsuario()
    {
        return $this->idTipoUsuario;
    }

    /**
     * @param mixed $idTipoUsuario
     *
     * @return self
     */
    public function setIdTipoUsuario($idTipoUsuario)
    {
        $this->idTipoUsuario = $idTipoUsuario;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }

    /**
     * @param mixed $idMunicipio
     *
     * @return self
     */
    public function setIdMunicipio($idMunicipio)
    {
        $this->idMunicipio = $idMunicipio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * @param mixed $genero
     *
     * @return self
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @param mixed $edad
     *
     * @return self
     */
    public function setEdad($edad)
    {
        $this->edad = $edad;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdCarrera()
    {
        return $this->idCarrera;
    }

    /**
     * @param mixed $idCarrera
     *
     * @return self
     */
    public function setIdCarrera($idCarrera)
    {
        $this->idCarrera = $idCarrera;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     *
     * @return self
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     *
     * @return self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     *
     * @return self
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }

    /**
     * @param mixed $cargo
     *
     * @return self
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreacion()
    {
        return $this->creacion;
    }

    /**
     * @param mixed $creacion
     *
     * @return self
     */
    public function setCreacion($creacion)
    {
        $this->creacion = $creacion;

        return $this;
    }
}

 ?>