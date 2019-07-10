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

    public function crearEjemplar($idInventario,$numeroInventario)
    {
        //echo $idLibro;
        $sql = "SELECT * from inventario where numeroInventario='{$numeroInventario}' and eliminado=0";
        $resp = $this->con->query($sql);
        $data = array();

        //VALIDA SI EXISTE EL NÚMERO DE INVENTARIO
        if($resp->num_rows>0){
            $data['estado'] = "existe";
                
            $data['descripcion'] = "Número de Inventario ya ha sido usado!";
            return json_encode($data);
            die();

        }

        $sql = "INSERT INTO `inventario`( `numeroInventario`, `idLibro`, `fechaAdquisicion`, `volumen`, `formaAdquisicion`, `precio`, `facilitante`, `estadoMaterial`, `fechaEstado`, `solicitante`, `entrego`, `fechaEntrega`, `eliminado`)  SELECT  '{$numeroInventario}', `idLibro`, `fechaAdquisicion`, `volumen`, `formaAdquisicion`, `precio`, `facilitante`, `estadoMaterial`, `fechaEstado`, `solicitante`, `entrego`, `fechaEntrega`, `eliminado` FROM `inventario` WHERE id='{$idInventario}' and eliminado=0";
        $res = $this->con->query($sql);

        $sql = "INSERT INTO `libro`(`nombre`, `autor`, `cantidadPaginas`, `informacionAdicional`, `epigrafe`, `numeroEdicion`, `referenciaDigital`, `fechaPublicacion`, `idioma`, `isbn`, `idEditorial`, `idTipoColeccion`, `idTipoLiteratura`, `dimensiones`, `iscn`, `idPais`, `asesor`, `notas`, `clasificacion`, `libristica`, `detallesFisicos`, `contenido`, `mfn`, `eliminado`, `portada`) 
SELECT `nombre`, `autor`, `cantidadPaginas`, `informacionAdicional`, `epigrafe`, `numeroEdicion`, `referenciaDigital`, `fechaPublicacion`, `idioma`, `isbn`, `idEditorial`, `idTipoColeccion`, `idTipoLiteratura`, `dimensiones`, `iscn`, `idPais`, `asesor`, `notas`, `clasificacion`, `libristica`, `detallesFisicos`, `contenido`, `mfn`, `eliminado`, `portada` FROM `libro` WHERE id='{$idInventario}'";
        $res = $this->con->query($sql);



            
            if($res)
            {
                $data['estado'] = true;
                
                $data['descripcion'] = "Documento agregado exitosamente!";
                
            }else
            {
                $data['estado'] = false;
                $data['descripcion'] = "¡Error al agregar documento".$this->con->error;
            }

        return json_encode($data);
    }


     public function getName($id)
    {
        $sql = "SELECT l.id,iv.numeroInventario,l.nombre,l.numeroEdicion,l.idEditorial as editorial,
l.idTipoLiteratura as tipoLiteratura,l.autor,l.clasificacion,l.libristica,l.epigrafe,l.portada,l.asesor,l.contenido,l.fechaPublicacion from libro l
inner join inventario iv
    on iv.idLibro=l.id
where iv.id='{$id}'";
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
                $libristica = $row['libristica'];
                $epigrafe = $row['epigrafe'];
                $edicion = $row['numeroEdicion'];
                $editorial = $row['editorial'];
                $asesor = $row['asesor'];
                $fecha = $row['fechaPublicacion'];
                $contenido = $row['contenido'];
                $portada = $row['portada'];


                $obj[] = array('id'=> $id, 'nombre'=> $nombre,'autor'=> $autor,'clasificacion'=> $clasificacion,'epigrafe'=> $epigrafe,'edicion'=> $edicion,'editorial'=> $editorial,'asesor'=> $asesor,'contenido'=> $contenido,'fecha'=> $fecha,'libristica'=> $libristica,'portada'=> $portada);

            }
        }
        else
        {
            $obj['estado'] = $this->con->error;
        }
        return json_encode($obj); 
    }


    public function guardarCambios($data)
    {
        $data = json_decode($data);
        // var_dump($data);
        $tipoColeccion = $data[0]->value;
        $tipoLiteratura = $data[1]->value;
        $nombre = $data[2]->value;
        $tituloParalelo = $data[3]->value;
        $cantidadPaginas = $data[4]->value;
        $informacionAdicional = $data[5]->value;
        $fechaPublicacion = $data[6]->value;
        $numeroEdicion = $data[7]->value;
        $referenciaDigital = $data[8]->value;
        $terminosResumen = $data[9]->value;
        $idioma = $data[10]->value;
        $iscn = $data[11]->value;
        $dimensiones = $data[12]->value;
        $isbn = $data[13]->value;
        $idEditorial = $data[14]->value;
        $asesor = $data[15]->value;
        $numeroClasificacion = $data[16]->value;
        $libristicaAutor = $data[17]->value;
        $detallesFisicos = $data[18]->value;
        $idPais = $data[19]->value;
        $notas = $data[20]->value;
        $contenido = $data[21]->value;

        //CAMPO NUEVO
        $autor = $data[22]->value;

        $numeroInventario = $data[23]->value;
        $fechaAdquisicion = $data[24]->value;
        $precio = $data[25]->value;
        $facilitante = $data[26]->value;
        $entrego = $data[27]->value;
        $fechaEntrega = $data[28]->value;
        $formaAdquisicion = $data[29]->value;
        $volumen = $data[30]->value;

        $idLibro = $data[31]->value;
        $idInventario = $data[32]->value;


        if($tituloParalelo!='')
        {
            $nombre = $nombre.' - '.$tituloParalelo;
        }
        //LIBRO 
        $sql = "UPDATE libro set 
        idTipoColeccion='{$tipoColeccion}',
        idTipoLiteratura='{$tipoLiteratura}',
        nombre='{$nombre}',
        cantidadPaginas='{$cantidadPaginas}',
        informacionAdicional='{$informacionAdicional}',
        fechaPublicacion='{$fechaPublicacion}',
        numeroEdicion='{$numeroEdicion}',
        referenciaDigital='{$numeroEdicion}',
        epigrafe='{$terminosResumen}',
        idioma='{$idioma}',
        iscn='{$iscn}',
        dimensiones='{$dimensiones}',
        isbn='{$isbn}',
        idEditorial='{$idEditorial}',
        asesor='{$asesor}',
        clasificacion='{$numeroClasificacion}',
        libristica='{$libristicaAutor}',
        detallesFisicos='{$detallesFisicos}',
        idPais='{$idPais}',
        notas='{$notas}',
        contenido='{$contenido}',
        autor='{$autor}' WHERE id='{$idLibro}'";
        mysqli_set_charset($this->con, "utf8");
        $info = $this->con->query($sql);
        //FIN LIBRO

        //INVENTARIO 
        $sql = "UPDATE inventario set numeroInventario='{$numeroInventario}',
                fechaAdquisicion='{$fechaAdquisicion}',
                precio='{$precio}',
                facilitante='{$facilitante}',
                entrego='{$entrego}',
                fechaEntrega='{$fechaEntrega}',
                formaAdquisicion='{$formaAdquisicion}',
                volumen='{$volumen}' where id='{$idInventario}'";
        //mysqli_set_charset($this->con, "utf8");
        $info = $this->con->query($sql);
        //FIN INVENTARIO
        

        if($info)
            {
                $data['estado'] = true;
                $data['id'] = $idLibro;
                
                $data['descripcion'] = "Documento modificado exitosamente!";
                
            }else
            {
                $data['estado'] = $this->con->error;
                $data['descripcion'] = "¡Error al modificar documento".$this->con->error;
            }

            mysqli_close($this->con);

        return json_encode($data);
        
    }


    public function getInfo($id)
    {
        $sql = "SELECT l.id,iv.numeroInventario,l.nombre,l.numeroEdicion,l.idEditorial as editorial,
l.idTipoLiteratura as tipoLiteratura,l.autor,l.clasificacion,l.libristica,l.epigrafe,l.portada,l.asesor,l.contenido,l.fechaPublicacion from libro l
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
                $libristica = $row['libristica'];
                $epigrafe = $row['epigrafe'];
                $edicion = $row['numeroEdicion'];
                $editorial = $row['editorial'];
                $asesor = $row['asesor'];
                $fecha = $row['fechaPublicacion'];
                $contenido = $row['contenido'];
                $portada = $row['portada'];


                $obj[] = array('id'=> $id, 'nombre'=> $nombre,'autor'=> $autor,'clasificacion'=> $clasificacion,'epigrafe'=> $epigrafe,'edicion'=> $edicion,'editorial'=> $editorial,'asesor'=> $asesor,'contenido'=> $contenido,'fecha'=> $fecha,'libristica'=> $libristica,'portada'=> $portada);

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
            while($row = mysqli_fetch_array($info)) 
            { 
                $id=$row['id'];
                $nombre=$row['nombre'];
            }

    return json_encode($clientes);
    }

    public function getInfoLibro($id)
    {
        $sql = "SELECT l.idTipoColeccion,l.idTipoLiteratura,l.nombre as titulo,l.id as idLibro,
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

        $tipoColeccion = $data[0]->value;
        $tipoLiteratura = $data[1]->value;
        $nombre = $data[2]->value;
        $tituloParalelo = $data[3]->value;
        $cantidadPaginas = $data[4]->value;
        $informacionAdicional = $data[5]->value;
        $fechaPublicacion = $data[6]->value;
        $numeroEdicion = $data[7]->value;
        $referenciaDigital = $data[8]->value;
        $terminosResumen = $data[9]->value;
        $idioma = $data[10]->value;
        $iscn = $data[11]->value;
        $dimensiones = $data[12]->value;
        $isbn = $data[13]->value;
        $idEditorial = $data[14]->value;
        $asesor = $data[15]->value;
        $numeroClasificacion = $data[16]->value;
        $libristicaAutor = $data[17]->value;
        $detallesFisicos = $data[18]->value;
        $idPais = $data[19]->value;
        $notas = $data[20]->value;
        $contenido = $data[21]->value;

        //CAMPO NUEVO
        $autor = $data[22]->value;

        $numeroInventario = $data[23]->value;
        $fechaAdquisicion = $data[24]->value;
        $precio = $data[25]->value;
        $facilitante = $data[26]->value;
        $entrego = $data[27]->value;
        $fechaEntrega = $data[28]->value;
        $formaAdquisicion = $data[29]->value;
        $volumen = $data[30]->value;


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