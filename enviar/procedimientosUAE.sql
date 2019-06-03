use bibliotecauae;


-- OBTENER CODIGO INVENTARIO 
-- drop procedure searchInventario;
DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`searchInventario` $$
CREATE PROCEDURE `bibliotecauae`.`searchInventario`(in p_1 int, in p_2 varchar(50))
BEGIN
-- BUSQUEDA POR NOMBRE DE LIBRO
 IF p_1=1 THEN
   select l.nombre,iv.id as idInventario,iv.numeroInventario
   from libro l 
   inner join inventario iv on iv.idLibro = l.id 
   where 
   nombre like concat('%', p_2, '%')
   AND iv.estadoMaterial!='Prestado' limit 10;
 END IF;
 -- BUSQUEDA POR NOMBRE DE AUTOR
  IF p_1=2 THEN
   select l.nombre,inv.id as idInventario,inv.numeroInventario 
	from autor a 
		inner join detalleautor dta on a.id=dta.idAutor 
		inner join libro l on dta.idLibro=l.id 
		inner join inventario inv on inv.idLibro=l.id
	where a.nombre like concat('%', p_2, '%') AND inv.estadoMaterial!='Prestado' AND inv.eliminado!=1 limit 10;
 END IF;
 
 -- BUSQUEDA POR ISBN
 IF p_1=3 THEN
   select l.nombre,iv.id as idInventario,iv.numeroInventario 
	from libro l 
    inner join inventario iv on iv.idLibro = l.id 
where isbn like concat(p_2, '%') AND iv.estadoMaterial!='Prestado' AND inv.eliminado!=1 limit 10;
 END IF;
END $$
DELIMITER ;

-- GENERAR NUEVO PRESTAMO

DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`nuevoPrestamo` $$
CREATE PROCEDURE `bibliotecauae`.`nuevoPrestamo`(in p_fechaDevolver date,in p_idUsuario int,in p_tipoPrestamo int,in p_idInventario int)
BEGIN

INSERT INTO `prestamo` 
(`id`, `fechaRealizacion`, `fechaDevolver`, `fechaDevolvio`, `idUsuario`, `tipoPrestamo`, `estado`, `idInventario`,`eliminado`)
 VALUES 
 (NULL, CURDATE(), p_fechaDevolver, NULL, p_idUsuario, p_tipoPrestamo, 1,p_idInventario,0);
 
 update inventario set estadoMaterial='Prestado' where id=p_idInventario;
END $$
DELIMITER ;

-- VER TODOS LOS PRESTAMOS

DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`allPrestamos` $$
CREATE PROCEDURE `bibliotecauae`.`allPrestamos`()
BEGIN

select l.nombre as libro,p.fechaRealizacion,u.nombre,p.id,u.carnet 
from libro l inner join inventario iv
on iv.idLibro = l.id
inner join prestamo p
on p.idInventario=iv.id
inner join usuario u
on p.idUsuario = u.id
where iv.estadoMaterial='Prestado' AND p.estado=1 AND p.eliminado!=1;

END $$
DELIMITER ;

-- OBTENER PRESTAMOS PARA DEVOLUCIONES

DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`obtenerPrestamos` $$
CREATE PROCEDURE `bibliotecauae`.`obtenerPrestamos`(in p_1 int,in p_2 varchar(30))
BEGIN

SET @v = 0;

-- buscar por inventario con multa
IF p_1=1 THEN

SELECT iv.numeroInventario,l.nombre,p.fechaRealizacion,p.fechaDevolver,p.id,datediff(curdate(), p.fechaDevolver) as multa,p.idUsuario 
FROM prestamo p 
inner join inventario iv
on iv.id = p.idInventario
inner join libro l
on iv.idLibro =l.id
WHERE p.fechaDevolver < curdate() AND iv.numeroInventario=p_2 AND p.estado=1 AND p.eliminado!=1;

END IF;

-- buscar por carnet con multa
IF p_1=2 THEN
SELECT iv.numeroInventario,l.nombre,p.fechaRealizacion,p.fechaDevolver,p.id,datediff(curdate(), p.fechaDevolver) as multa,p.idUsuario 
FROM prestamo p 
inner join inventario iv
on iv.id = p.idInventario
inner join libro l
on iv.idLibro =l.id
inner join usuario u
on u.id=p.idUsuario
WHERE p.fechaDevolver < curdate() AND u.carnet=p_2 AND p.estado=1 AND p.eliminado!=1;
END IF;

-- buscar por inventario 
IF p_1=3 THEN

SELECT iv.numeroInventario,l.nombre,p.fechaRealizacion,p.fechaDevolver,p.fechaDevolver,p.id,datediff(curdate(), p.fechaDevolver) as multa,p.idUsuario 
FROM prestamo p 
inner join inventario iv
on iv.id = p.idInventario
inner join libro l
on iv.idLibro =l.id
WHERE iv.numeroInventario=p_2 AND p.estado=1 AND p.eliminado!=1;

END IF;

-- buscar por carnet 
IF p_1=4 THEN
SELECT iv.numeroInventario,l.nombre,p.fechaDevolver,p.fechaRealizacion,p.id,datediff(curdate(), p.fechaDevolver) as multa,p.idUsuario 
FROM prestamo p 
inner join inventario iv
on iv.id = p.idInventario
inner join libro l
on iv.idLibro =l.id
inner join usuario u
on u.id=p.idUsuario
WHERE u.carnet=p_2 AND p.estado=1 AND p.eliminado!=1;

END IF;



END $$
DELIMITER ;

-- 
-- call obtenerPrestamos(4,'11');



DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`devolverPrestamo` $$
CREATE PROCEDURE `bibliotecauae`.`devolverPrestamo`(in p_1 int)
BEGIN

UPDATE `prestamo` SET `estado` = '0' , fechaDevolvio=curdate() WHERE `prestamo`.`id` = p_1;

UPDATE inventario as  iv INNER JOIN prestamo p
ON p.idInventario = iv.id
SET `estadoMaterial` = 'Disponible' WHERE p.id = p_1;

END $$
DELIMITER ;


-- GUARDAR DOCUMENTO -- 
DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`guardarDocumento` $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `guardarDocumento`(in p_nombre varchar(40),in p_cantidadPaginas int,
in p_informacionAdicional varchar(25),in p_terminosResumen varchar(40),in p_numeroEdicion int,
in p_referenciaDigital varchar(50),in p_fechaPublicacion date,in p_idioma varchar(15),
in p_isbn varchar(20),in p_idEditorial text, in p_idPais int,in p_idTipoColeccion int,in p_idTipoLiteratura int,
in p_numeroInventario varchar(40),in p_fechaAdquisicion date,in p_volumen int,in p_formaAdquisicion varchar(40),
in p_precio varchar(40),in p_facilitante varchar(40),in p_entrego varchar(40),
in p_fechaEntrega date,in p_iscn text,in p_asesor text,in p_notas text,in p_clasificacion text,in p_libristica text,
in p_detallesFisicos text,in p_dimensiones text)
BEGIN
INSERT INTO `libro` 
(`nombre`, `cantidadPaginas`,
 `informacionAdicional`, `terminosResumen`, `numeroEdicion`,
 `referenciaDigital`, `fechaPublicacion`, `idioma`,
 `isbn`, `idEditorial`, `idPais`, `idTipoColeccion`, `idTipoLiteratura`, `eliminado`,
`iscn`,`asesor`,`notas`,`clasificacion`,`libristica`,
`detallesFisicos`,`dimensiones`)
 VALUES (p_nombre, p_cantidadPaginas,
 p_informacionAdicional, p_terminosResumen, p_numeroEdicion,
 p_referenciaDigital, p_fechaPublicacion, p_idioma,
 p_isbn, p_idEditorial, p_idPais, p_idTipoColeccion, p_idTipoLiteratura,0,
	p_iscn,p_asesor,p_notas,p_clasificacion,p_libristica,
	p_detallesFisicos,p_dimensiones);
 

SET @idLibro := (SELECT max(id) FROM libro);
-- SET @idLibro := (SELECT LAST_INSERT_ID());
select @idLibro as idLibro;

INSERT INTO `inventario` 
(`id`, `numeroInventario`, `idLibro`, `fechaAdquisicion`, `volumen`, `formaAdquisicion`, 
`precio`, `estadoMaterial`, `fechaEstado`, `facilitante`, `entrego`, `fechaEntrega`,`eliminado`) 

VALUES (NULL, p_numeroInventario, @idLibro, p_fechaAdquisicion, p_volumen, p_formaAdquisicion, p_precio, 
p_facilitante, 'Disponible', curdate(),p_entrego, p_fechaEntrega,0);

END$$


-- 
--  call guardarDocumento(
--         'Documento prueba',
--         100,
--         '$informacionAdicional',
--         '".$terminosResumen."',
--         2,
--         '.$referenciaDigital.',
--         curdate(),
--         curdate(),
--         'Espaniol',
--         33333,
--         1,
--         1,
--         1,
--         1,
--         123,
--         curdate(),
--         1,
--         '.$formaAdquisicion.',
--         '.$precio.',
--         '.$facilitante.',
--         '.$solicitante.',
--         '.$entrego.',
--         curdate());
-- 


-- where d.idLibro=35;

DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`infoLibro` $$
CREATE PROCEDURE `bibliotecauae`.`infoLibro`()
	BEGIN
select l.id,iv.numeroInventario,l.nombre,l.numeroEdicion,l.idioma,l.idEditorial as editorial,p.nombre as pais,tCol.nombre as tipoColeccion,
tLi.nombre as tipoLiteratura,l.idioma as detalleautorID from libro l
inner join pais p
	on p.id=l.idPais
inner join tipoColeccion tCol
	on l.idTipoColeccion=tCol.id
inner join tipoLiteratura tLi
	on tLi.id=l.idTipoLiteratura
inner join inventario iv
	on iv.idLibro=l.id
where l.eliminado!=1
    order by l.id DESC limit 400;    
    END $$
DELIMITER ;
-- 
-- call infoLibro();
-- 
    
-- RECUPERAR AUTORES DE UN DOCUMENTO

DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`obtenerAutores` $$
CREATE PROCEDURE `bibliotecauae`.`obtenerAutores`(in p_idLibro int)
	BEGIN
select d.idLibro,d.idAutor,a.nombre from detalleautor d
inner join libro l
	on l.id=d.idLibro
inner join autor a
	on a.id=d.idAutor
where l.id=p_idLibro
order by d.idAutor DESC;
    END $$
DELIMITER ;


-- call obtenerAutores(35);



DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`getInfoLibro` $$
CREATE PROCEDURE `bibliotecauae`.`getInfoLibro`(in p_idLibro int)
	BEGIN
select l.id,iv.numeroInventario,l.nombre,l.numeroEdicion,l.idioma,e.id as editorial,p.id as pais,tCol.id as tipoColeccion,
tLi.id as tipoLiteratura,l.idioma from libro l
inner join editorial e
	on e.id=l.idEditorial
inner join pais p
	on p.id=l.idPais
inner join tipoColeccion tCol
	on l.idTipoColeccion=tCol.id
inner join tipoLiteratura tLi
	on tLi.id=l.idTipoLiteratura
inner join inventario iv
	on iv.idLibro=l.id
where l.eliminado!=1 AND
	l.id = p_idLibro
    order by l.id DESC;
    END $$
DELIMITER ;

-- call getInfoLibro(3);



DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`eliminarDocumento` $$
CREATE PROCEDURE `bibliotecauae`.`eliminarDocumento`(in p_idLibro int)
	BEGIN


SET @idInventario := (SELECT id FROM inventario WHERE idLibro =p_idLibro);


SET @prestado := (SELECT id FROM prestamo WHERE `prestamo`.`idInventario`= @idInventario  AND estado=0);
select @prestado as prestado;




-- IF @prestado>0 THEN

UPDATE detalleautor d SET d.eliminado=1 WHERE d.idLibro = p_idLibro;
-- DELETE FROM `detalleautor` WHERE `detalleautor`.`idLibro` = p_idLibro;


UPDATE prestamo p SET p.eliminado=1 WHERE p.idInventario= @idInventario  AND estado=0;
-- DELETE FROM `prestamo` WHERE `prestamo`.`idInventario`= @idInventario  AND estado=0;

UPDATE inventario i SET i.eliminado=1 WHERE i.idLibro = p_idLibro AND i.estadoMaterial="Disponible";
-- DELETE FROM `inventario` WHERE `inventario`.`idLibro` = p_idLibro AND `inventario`.`estadoMaterial`="Disponible";

UPDATE libro l SET l.eliminado=1 WHERE l.id = p_idLibro;
-- DELETE FROM `libro` WHERE `libro`.`id` = p_idLibro;

-- END IF;
select @prestado as prestado;
    END $$
DELIMITER ;



-- SELECT * from editorial where eliminado=0


 -- call eliminarDocumento(5);
 


-- 
-- 
-- 
-- SET @prestado := (SELECT id FROM prestamo WHERE `prestamo`.`idInventario`= 1  AND estado=0);
-- select @prestado as prestado;
-- 
-- 
-- SELECT u.carnet as carnet , r.nombre as rol FROM usuario u
-- INNER JOIN rol r ON u.idRol = r.id 
-- 	WHERE u.estado = 1 and u.carnet = 11 and u.clave= sha1(123)
-- 
-- 

DELIMITER $$
DROP PROCEDURE IF exists `bibliotecauae`.`saveChanges` $$
CREATE PROCEDURE `bibliotecauae`.`saveChanges`(in p_id int,in p_carnet varchar(25),in p_nombre varchar(50),
in p_apellido varchar(50), in p_clave varchar(50), in p_idRol int,in P_idTipoUsuario int,in p_idMunicipio int,
in p_genero varchar(25),in p_edad int,in p_idCarrera int,in p_telefono varchar(25),
in p_direccion varchar(50), in p_correo varchar(25), in p_cargo varchar(10)
)
	BEGIN
UPDATE usuario
SET
`carnet`=p_carnet,
 `nombre`=p_nombre,
 `apellido`=p_apellido,
 `clave`=p_clave,
 `idRol`=p_idRol,
 `idTipoUsuario`=p_idTipoUsuario,
 `idMunicipio`=p_idMunicipio,
 `genero`=p_genero,
 `edad`=p_edad,
 `idCarrera`=p_idCarrera,
 `telefono`=p_telefono,
 `direccion`=p_direccion,
 `correo`=p_correo,
 `cargo`=p_cargo
 WHERE `id`=p_id;
    END $$
DELIMITER ;

-- call saveChanges(1, 777, 'Porfirio', 'Días', sha1(123), 1, 2, 2, 'genero', 33, 2, 'telefono', 'direccion', 'correo', '')
-- 
-- select *
-- 	from departamento d
-- LEFT OUTER JOIN municipio m
-- 	on m.idDepartamento=d.id
--     
-- 	where m.id=2;
--     
    
    
-- select u.id as idUsuario, u.carnet, u.nombre, u.apellido,u.idRol, u.idTipoUsuario, u.idMunicipio,
--  u.genero, u.edad, u.idCarrera, u.telefono, u.direccion, u.correo, u.cargo,
-- 	d.nombre as departamento,d.id as idDepartamento,m.id as idMunicipio
-- 	from usuario u
--     inner join municipio m
--     on m.id=u.idMunicipio
-- inner JOIN departamento d
-- 	on m.idDepartamento=d.id
-- 	where  u.id=1;


DELIMITER ;

