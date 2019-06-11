<?php 

/**
 Nombre de la clase: Libro
 Version: 1.0
 Author: Alexander Rivas
 CopyRight: Universidad Albert Einstein
 Fecha: 03-01-2019
 */
require_once realpath (dirname (__FILE__).'/../app/config.php');
class Libro 
{
	public $con;
	function __construct()
	{
		$this->con = conectar();
	}

    public function getInfo($id)
    {
        $sql = "SELECT l.id,iv.numeroInventario,l.nombre,l.numeroEdicion,l.idEditorial as editorial,
l.idTipoLiteratura as tipoLiteratura,l.autor,l.clasificacion,l.epigrafe,l.asesor,l.contenido,l.fechaPublicacion from libro l
inner join inventario iv
    on iv.idLibro=l.id
where iv.numeroInventario='{$id}'";
        mysqli_set_charset($this->con, "utf8");
        $info = $this->con->query($sql);
        $obj = array();
       
        if($info->num_rows>0)
        {
            while($row = mysqli_fetch_array($info)) 
            { 
                $id=$row['id'];
                $nombre=$row['nombre'];
                $autor = $row['autor'];
                $clasificacion = $row['clasificacion'];
                $epigrafe = $row['epigrafe'];
                $edicion = $row['numeroEdicion'];
                $editorial = $row['editorial'];
                $asesor = $row['asesor'];
                $fecha = $row['fechaPublicacion'];
                $contenido = $row['contenido'];


                $obj[] = array('id'=> $id, 'nombre'=> $nombre,'autor'=> $autor,'clasificacion'=> $clasificacion,'epigrafe'=> $epigrafe,'edicion'=> $edicion,'editorial'=> $editorial,'asesor'=> $asesor,'contenido'=> $contenido,'fecha'=> $fecha);

            }
        }
        else
        {
            $obj['estado'] = $this->con->error;
        }
        return json_encode($obj); 
    }

    public function eliminarLibro($idLibro)
    {
        //echo $idLibro;
        $sql = "call eliminarDocumento('".$idLibro."')";
            $res = $this->con->query($sql);
            $data = array();
            if($res)
            {
                $data['estado'] = true;
                
                $data['descripcion'] = "Documento eliminado exitosamente!";
                
            }else
            {
                $data['estado'] = false;
                $data['descripcion'] = "¡Error al eliminar documentor".$this->con->error;
            }

        return json_encode($data);
    }

    public function getAutores($id)
    {
        $sql = "call obtenerAutores('".$id."');";
        $info = $this->con->query($sql);

        //mysqli_set_charset($this->con, "utf8");
        $json = "";
        $info = $this->con->query($sql);

        $clientes = array();
        // if($info->num_rows>0)
        // {
            // while ($fila =$info->fetch_assoc()) 
            // {
            //     $fila['estado'] = true;
            //     $obj = json_encode($fila);
            //     $json .= $obj.",";
            // }
            // $json = substr($json,0, strlen($json)-1);
             //creamos un array

            while($row = mysqli_fetch_array($info)) 
            { 
                $id=$row['id'];
                $nombre=$row['nombre'];
    

                //$clientes[] = array('id'=> $id, 'text'=> $nombre);

            }
        // }
        // else
        // {
        //     $fila['estado'] = false;
        //     $obj = json_encode($fila);
        //     $json .= $obj;
        // }
        
/*        return '{"data":['.$json.']}'; */
        //return '['.$json.']';   
    return json_encode($clientes);
    }

    public function getInfoLibro($id)
    {
        $sql = "SELECT l.nombre as titulo,
                l.cantidadPaginas,l.informacionAdicional,l.epigrafe,
                l.numeroEdicion,l.referenciaDigital,l.fechaPublicacion,
                l.idioma,l.isbn,l.idEditorial,l.idPais,l.idioma,l.iscn,l.dimensiones,
                l.asesor,l.clasificacion,l.libristica,l.detallesFisicos,l.notas,l.contenido,l.autor,
                iv.id as idInventario,iv.numeroInventario,iv.fechaAdquisicion,iv.precio,iv.facilitante,
                iv.entrego,iv.fechaEntrega,iv.formaAdquisicion,iv.volumen
                from libro l
                inner join inventario iv
                on iv.idLibro = l.id
                where l.id='".$id."'";
        $info = $this->con->query($sql);

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
            mysqli_free_result($info);
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

    public function getAll()
    {
        $sql1 = "call infoLibro()";
        $info = $this->con->query($sql1);

            
        $autoresArray="";

        $autor = "";
        $autores="";
        $json = "";
        $jsonFinal = "";
        $all = [];
        if ($info->num_rows>0) {           
            $all = $info;
            //var_dump($dato);

            // foreach ($dato as $i => $d) {
            //     // echo $d['nombre'];
            //     //  echo $d['autor'];
            //     //var_dump($d);
            //      $con2  = conectar();
                
            //      $librosID = $d['id'];  

            //         $sql2 = "call obtenerAutores('".$librosID."')";
            //         $info2 = $con2->query($sql2); 
            //     $autor = "";   
            //     while ($filaAutores =$info2->fetch_assoc()) 
            //         {
            //             //$autor.=$filaAutores['nombre']."--LIBRO: ".$librosID."#######";
                        
            //             $autor.= $filaAutores['nombre'].",";                       
            //         }
            //         $autor = substr($autor,0, strlen($autor)-1);
            //         //echo $autor."#######";;
            //         //unset($d['detalleautorID']);
            //         $d['detalleautorID'] = $autor;
            //         $all[$i] = $d;
            //         //var_dump($d);
            //         //echo "#######" . PHP_EOL;
            //         //echo "\n\n";
            //         //echo $d['detalleautorID'];
                    
            // }
            
        }else{
            $all[] = false;
        }
        return $all;
    }

    public function detalleAutor($idAutor,$idLibro)
    {
        

       $sql = "INSERT INTO `detalleautor` (`id`, `idLibro`, `idAutor`, `estado`,`eliminado`) VALUES (NULL, '".$idLibro."', '".$idAutor."', '1','0');";
        $res = $this->con->query($sql);
        $data = array();
        if($res){
            $data['estado'] = true;
            $data['descripcion'] = "¡Detalle guardado exitosamente!";
            
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "¡Error al guardar detalle autor".$this->con->error;
        }

        return json_encode($data);
    }

    public function guardarDocumento($dataLibro)
    {
        $data = json_decode($dataLibro);

        $tipoColeccion = $data[1]->value;
        $tipoLiteratura = $data[2]->value;
        $nombre = $data[3]->value;
        $tituloParalelo = $data[4]->value;
        $cantidadPaginas = $data[5]->value;
        $informacionAdicional = $data[6]->value;
        $fechaPublicacion = $data[7]->value;
        $numeroEdicion = $data[8]->value;
        $referenciaDigital = $data[9]->value;
        $terminosResumen = $data[10]->value;
        $idioma = $data[11]->value;
        $iscn = $data[12]->value;
        $dimensiones = $data[13]->value;
        $isbn = $data[14]->value;
        $idEditorial = $data[15]->value;
        $asesor = $data[16]->value;
        $numeroClasificacion = $data[17]->value;
        $libristicaAutor = $data[18]->value;
        $detallesFisicos = $data[19]->value;
        $idPais = $data[20]->value;
        $notas = $data[21]->value;
        $contenido = $data[22]->value;

        //CAMPO NUEVO
        $autor = $data[23]->value;

        $numeroInventario = $data[24]->value;
        $fechaAdquisicion = $data[25]->value;
        $precio = $data[26]->value;
        $facilitante = $data[27]->value;
        $entrego = $data[28]->value;
        $fechaEntrega = $data[29]->value;
        $formaAdquisicion = $data[30]->value;
        $volumen = $data[31]->value;


        if($tituloParalelo!='')
        {
            $nombre = $nombre.' - '.$tituloParalelo;
        }

       $sql = "call guardarDocumento(
        '".$nombre."',
        '".$cantidadPaginas."',
        '".$informacionAdicional."',
        '".$terminosResumen."',
        '".$numeroEdicion."',
        '".$referenciaDigital."',
        '".$fechaPublicacion."',
        '".$idioma."',
        '".$isbn."',
        '".$idEditorial."',
        '".$idPais."',
        '".$tipoColeccion."',
        '".$tipoLiteratura."',
        '".$numeroInventario."',
        '".$fechaAdquisicion."',
        '".$volumen."',
        '".$formaAdquisicion."',
        '".$precio."',
        '".$facilitante."',
        '".$entrego."',
        '".$fechaEntrega."',
        '".$iscn."',
        '".$asesor."',
        '".$notas."',
        '".$numeroClasificacion."',
        '".$libristicaAutor."',
        '".$detallesFisicos."',
        '".$dimensiones."',
        '".$autor."',
        '".$contenido."');";

        $res = $this->con->query($sql);
        $data = array();
        if($res){
            $res = $res->fetch_assoc();
            $data['estado'] = true;
            $data['idLibro'] = $res;
            $data['descripcion'] = "¡Documento guardado exitosamente!";
            
        }else{
            $data['estado'] = false;
            $data['descripcion'] = "¡Error al guardar documento".$this->con->error."Error2:".mysqli_errno($this->con);
        }

        return json_encode($data);
    }

    public function searchAutor2()
    {
       $sql = "select * from autor where estado=1";
        mysqli_set_charset($this->con, "utf8");
        $json = "";
        $info = $this->con->query($sql);
        $autores = array();
       
        if($info->num_rows>0)
        {
            
        // if($info->num_rows>0)
        // {
            // while ($fila =$info->fetch_assoc()) 
            // {
            //     $fila['estado'] = true;
            //     $obj = json_encode($fila);
            //     $json .= $obj.",";
            // }
            // $json = substr($json,0, strlen($json)-1);
             //creamos un array

            while($row = mysqli_fetch_array($info)) 
            { 
                $id=$row['id'];
                $nombre=$row['nombre'];
    

                $autores[] = array('id'=> $id, 'text'=> $nombre);

            }
        }
        else
        {
            $fila['estado'] = false;
            $obj = json_encode($fila);
            $json .= $obj;
        }
        
/*        return '{"data":['.$json.']}'; */
        //return '['.$json.']';  
        return json_encode($autores); 
    }

	public function searchAutor($txt)
    {
       $sql = "select * from autor where nombre like '".$txt."%'";
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
            $fila['estado'] = false;
            $obj = json_encode($fila);
            $json .= $obj;
        }
        
/*        return '{"data":['.$json.']}'; */
        return '['.$json.']';   
    }

	public function validarNumeroInventario($numeroInventario)
    {
        $sql = "SELECT id FROM inventario WHERE numeroInventario=?";
        $sentencia = mysqli_prepare($this->con,$sql);
        mysqli_stmt_bind_param(
            $sentencia,
            's',
            $numeroInventario
            );
        $ok = mysqli_stmt_execute($sentencia);
        $ok = mysqli_stmt_bind_result($sentencia,$id);
        $sentencia->store_result();
        $data = array();
        //echo mysqli_stmt_num_rows($sentencia);

        if($sentencia->num_rows==0){

            $data['estado'] = false;
            $data['descripcion'] = "Número Disponible";
        }else{
            
            $data['estado'] = true;
            $data['descripcion'] = "Este código pertenece a otro documento!";
        }
        mysqli_stmt_close($sentencia);
        return json_encode($data);
    }
}

 ?>