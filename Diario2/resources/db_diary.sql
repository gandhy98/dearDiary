-- MySQL Script generated by MySQL Workbench
-- Mon Jul 26 23:36:04 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_diary
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_diary
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_diary` DEFAULT CHARACTER SET utf8 ;
USE `db_diary` ;

-- -----------------------------------------------------
-- Table `db_diary`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(250) NULL,
  `password` VARCHAR(500) NULL,
  `nombre` VARCHAR(50) NULL,
  `apellido` VARCHAR(100) NULL,
  `fecha_nacimiento` DATE NULL,
  `url_foto` VARCHAR(500) NULL,
  `estado` INT NULL DEFAULT 1,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`nota`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`nota` (
  `idnota` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) NULL,
  `contenido` VARCHAR(500) NULL,
  `fecha_publicacion` TIMESTAMP NULL DEFAULT current_timestamp(),
  `url_foto` VARCHAR(200) NULL,
  `estado` INT NULL COMMENT '0: privado\n1: seguidores\n2: publico\n',
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idnota`),
  INDEX `fk_nota_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_nota_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`comentario` (
  `idcomentario` INT NOT NULL AUTO_INCREMENT,
  `contenido` VARCHAR(200) NULL,
  `usuario_idusuario` INT NOT NULL,
  `nota_idnota` INT NOT NULL,
  PRIMARY KEY (`idcomentario`),
  INDEX `fk_comentario_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_comentario_nota1_idx` (`nota_idnota` ASC),
  CONSTRAINT `fk_comentario_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_nota1`
    FOREIGN KEY (`nota_idnota`)
    REFERENCES `db_diary`.`nota` (`idnota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`app`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`app` (
  `idapp` INT NOT NULL AUTO_INCREMENT,
  `nombre_app` VARCHAR(45) NULL,
  `descripcion` VARCHAR(45) NULL,
  `user` VARCHAR(45) NULL,
  `password` VARCHAR(500) NULL,
  `version` VARCHAR(45) NULL,
  `estado` INT NULL,
  PRIMARY KEY (`idapp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`retrive_password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`retrive_password` (
  `idretrive_password` INT NOT NULL AUTO_INCREMENT,
  `pregunta` VARCHAR(250) NULL,
  `respuesta` VARCHAR(45) NULL,
  `estado` INT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idretrive_password`),
  INDEX `fk_retrive_password_usuario_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_retrive_password_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`calificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`calificacion` (
  `idcalificacion` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL,
  `nota_idnota` INT NOT NULL,
  PRIMARY KEY (`idcalificacion`),
  INDEX `fk_calificacion_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_calificacion_nota1_idx` (`nota_idnota` ASC),
  CONSTRAINT `fk_calificacion_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_calificacion_nota1`
    FOREIGN KEY (`nota_idnota`)
    REFERENCES `db_diary`.`nota` (`idnota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`seguiendo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`seguiendo` (
  `idseguiendo` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL COMMENT 'Usuario principal\n',
  `usuario_idusuario1` INT NOT NULL COMMENT 'usuario secundario que se sigue',
  PRIMARY KEY (`idseguiendo`),
  INDEX `fk_seguiendo_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_seguiendo_usuario2_idx` (`usuario_idusuario1` ASC),
  CONSTRAINT `fk_seguiendo_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_seguiendo_usuario2`
    FOREIGN KEY (`usuario_idusuario1`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_diary`.`mis_seguidores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_diary`.`mis_seguidores` (
  `idmis_seguidores` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL COMMENT 'usuario principal\n',
  `usuario_idusuario1` INT NOT NULL COMMENT 'usuarios que son mis seguidores\n',
  PRIMARY KEY (`idmis_seguidores`),
  INDEX `fk_mis_seguidores_usuario1_idx` (`usuario_idusuario` ASC),
  INDEX `fk_mis_seguidores_usuario2_idx` (`usuario_idusuario1` ASC),
  CONSTRAINT `fk_mis_seguidores_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mis_seguidores_usuario2`
    FOREIGN KEY (`usuario_idusuario1`)
    REFERENCES `db_diary`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
