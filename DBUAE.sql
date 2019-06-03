-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema bibliotecauae
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bibliotecauae
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bibliotecauae` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `bibliotecauae` ;
-- drop database `bibliotecauae` ;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`autor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`carrera` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `duracion` INT(11) NOT NULL,
  `estado` INT(11) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`departamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`departamento` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 15
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`editorial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`editorial` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `fechaRegistro` DATE NULL DEFAULT NULL,
  `fechaEliminacion` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`pais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(40) NULL DEFAULT NULL,
   `estado` INT(10) NULL,
  `fechaRegistro` DATE NULL DEFAULT NULL,
  `fechaEliminacion` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`tipocoleccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`tipocoleccion` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cantidadMinimaEstanteria` INT(11) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`tipoliteratura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`tipoliteratura` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `estado` INT(10) NULL,
  `fechaRegistro` DATE NULL DEFAULT NULL,
  `fechaEliminacion` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`libro` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `cantidadPaginas` INT(11) NOT NULL,
  `informacionAdicional` VARCHAR(1000) NULL DEFAULT NULL,
  `terminosResumen` VARCHAR(100) NULL DEFAULT NULL,
  `numeroEdicion` INT(11) NOT NULL,
  `referenciaDigital` VARCHAR(50) NULL DEFAULT NULL,
  `fechaIso` DATE NULL DEFAULT NULL,
  `fechaPublicacion` INT NOT NULL,
  `idioma` VARCHAR(25) NULL DEFAULT NULL,
  `isbn` VARCHAR(30) NULL DEFAULT NULL,
  `idEditorial` INT(11) NOT NULL,
  `idPais` INT(11) NOT NULL,
  `idTipoColeccion` INT(11) NOT NULL,
  `idTipoLiteratura` INT(11) NOT NULL,
  `eliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idEditorial` (`idEditorial`),
  INDEX `idPais` (`idPais`),
  INDEX `idTipoColeccion` (`idTipoColeccion`),
  INDEX `idTipoLiteratura` (`idTipoLiteratura`),
  CONSTRAINT `libro_ibfk_1`
    FOREIGN KEY (`idEditorial`)
    REFERENCES `bibliotecauae`.`editorial` (`id`),
  CONSTRAINT `libro_ibfk_2`
    FOREIGN KEY (`idPais`)
    REFERENCES `bibliotecauae`.`pais` (`id`),
  CONSTRAINT `libro_ibfk_3`
    FOREIGN KEY (`idTipoColeccion`)
    REFERENCES `bibliotecauae`.`tipocoleccion` (`id`),
  CONSTRAINT `libro_ibfk_4`
    FOREIGN KEY (`idTipoLiteratura`)
    REFERENCES `bibliotecauae`.`tipoliteratura` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`detalleautor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`detalleautor` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idLibro` INT(11) NOT NULL,
  `idAutor` INT(11) NOT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `eliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idAutor` (`idAutor`),
  INDEX `idLibro` (`idLibro`),
  CONSTRAINT `detalleautor_ibfk_1`
    FOREIGN KEY (`idAutor`)
    REFERENCES `bibliotecauae`.`autor` (`id`),
  CONSTRAINT `detalleautor_ibfk_2`
    FOREIGN KEY (`idLibro`)
    REFERENCES `bibliotecauae`.`libro` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`municipio` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NOT NULL,
  `idDepartamento` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `idDepartamento` (`idDepartamento`),
  CONSTRAINT `municipio_ibfk_1`
    FOREIGN KEY (`idDepartamento`)
    REFERENCES `bibliotecauae`.`departamento` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 263
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`rol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`tipousuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`tipousuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(30) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `carnet` VARCHAR(45) NULL DEFAULT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `apellido` VARCHAR(50) NULL DEFAULT NULL,
  `clave` VARCHAR(500) NULL DEFAULT NULL,
  `idRol` INT(11) NOT NULL,
  `idTipoUsuario` INT(11) NOT NULL,
  `idMunicipio` INT(11) NOT NULL,
  `genero` VARCHAR(30) NULL DEFAULT NULL,
  `edad` INT(11) NULL DEFAULT NULL,
  `idCarrera` INT(11) NOT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `direccion` VARCHAR(50) NULL DEFAULT NULL,
  `correo` VARCHAR(45) NULL DEFAULT NULL,
  `cargo` VARCHAR(50) NULL DEFAULT NULL,
  `creacion` DATE NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idRol` (`idRol` ) ,
  INDEX `idTipoUsuario` (`idTipoUsuario` ) ,
  INDEX `idMunicipio` (`idMunicipio` ) ,
  INDEX `idCarrera` (`idCarrera` ) ,
  CONSTRAINT `usuario_ibfk_1`
    FOREIGN KEY (`idRol`)
    REFERENCES `bibliotecauae`.`rol` (`id`),
  CONSTRAINT `usuario_ibfk_2`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `bibliotecauae`.`tipousuario` (`id`),
  CONSTRAINT `usuario_ibfk_3`
    FOREIGN KEY (`idMunicipio`)
    REFERENCES `bibliotecauae`.`municipio` (`id`),
  CONSTRAINT `usuario_ibfk_4`
    FOREIGN KEY (`idCarrera`)
    REFERENCES `bibliotecauae`.`carrera` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`inventario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`inventario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numeroInventario` VARCHAR(45) NULL,
  `idLibro` INT NULL,
  `fechaAdquisicion` DATE NOT NULL,
  `volumen` INT NULL,
  `formaAdquisicion` VARCHAR(45) NULL,
  `precio` VARCHAR(45) NULL,
  `facilitante` VARCHAR(45) NULL,
  `estadoMaterial` VARCHAR(45) NULL,
  `fechaEstado` DATE NULL,
  `solicitante` VARCHAR(45) NULL,
  `entrego` VARCHAR(45) NULL,
  `fechaEntrega` DATE NULL,
  `eliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fkIdLibro_idx` (`idLibro` ) ,
  CONSTRAINT `fkIdLibro`
    FOREIGN KEY (`idLibro`)
    REFERENCES `bibliotecauae`.`libro` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`prestamo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`prestamo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `fechaRealizacion` DATE NULL DEFAULT NULL,
  `fechaDevolver` DATE NULL,
  `fechaDevolvio` DATE NULL DEFAULT NULL,
  `idUsuario` INT(11) NOT NULL,
  `tipoPrestamo` INT(11) NULL DEFAULT NULL,
  `estado` INT(11) NULL DEFAULT NULL,
  `idInventario` INT NOT NULL,
  `eliminado` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `idUsuario` (`idUsuario` ) ,
  INDEX `fknumeroInventario_idx` (`idInventario` ) ,
  CONSTRAINT `prestamo_ibfk_1`
    FOREIGN KEY (`idUsuario`)
    REFERENCES `bibliotecauae`.`usuario` (`id`),
  CONSTRAINT `fknumeroInventario`
    FOREIGN KEY (`idInventario`)
    REFERENCES `bibliotecauae`.`inventario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `bibliotecauae`.`cantidadMaxDoc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bibliotecauae`.`cantidadMaxDoc` (
  `idTipoUsuario` INT NOT NULL,
  `idTipoColeccion` INT NOT NULL,
  `numeroMaximo` INT NOT NULL,
  PRIMARY KEY (`idTipoUsuario`, `idTipoColeccion`),
  INDEX `fkTipoColeccion_idx` (`idTipoColeccion` ) ,
  CONSTRAINT `fkIdTipoUsuario`
    FOREIGN KEY (`idTipoUsuario`)
    REFERENCES `bibliotecauae`.`tipousuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkTipoColeccion`
    FOREIGN KEY (`idTipoColeccion`)
    REFERENCES `bibliotecauae`.`tipocoleccion` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

select * from libro;

select l.id,iv.numeroInventario,l.nombre,l.numeroEdicion,l.idioma,l.idEditorial as editorial,
p.nombre as pais,
l.idioma as detalleautorID from libro l
inner join pais p
	on p.id=l.idPais 
inner join inventario iv
	on iv.idLibro=l.id
where l.eliminado!=1
    order by l.id DESC;
