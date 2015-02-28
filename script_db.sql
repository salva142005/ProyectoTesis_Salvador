
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema celular_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema celular_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `celular_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `celular_db` ;

-- -----------------------------------------------------
-- Table `celular_db`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(20) NULL,
  `clave` VARCHAR(100) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`modelos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`modelos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `marca_id` INT NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`operadoras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`operadoras` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`colores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`colores` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`equipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `modelo_id` INT NOT NULL,
  `operadora_id` INT NOT NULL,
  `usuario_id` INT NOT NULL,
  `color_id` INT NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `estado` ENUM('N','U') NOT NULL DEFAULT 'N' COMMENT 'N = Nuevo\nU = Usado',
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_equipo_modelo_idx` (`modelo_id` ASC),
  INDEX `fk_equipo_operadora_idx` (`operadora_id` ASC),
  INDEX `fk_equipo_usuario_idx` (`usuario_id` ASC),
  INDEX `fk_equipo_color_idx` (`color_id` ASC),
  CONSTRAINT `fk_equipo_modelo`
    FOREIGN KEY (`modelo_id`)
    REFERENCES `celular_db`.`modelos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_operadora`
    FOREIGN KEY (`operadora_id`)
    REFERENCES `celular_db`.`operadoras` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `celular_db`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_color`
    FOREIGN KEY (`color_id`)
    REFERENCES `celular_db`.`colores` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`marcas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(60) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`repuestos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`repuestos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `marca_id` INT NULL,
  `usuario_id` INT NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_usuario_servicio_idx` (`usuario_id` ASC),
  INDEX `fk_marca_servicio_idx` (`marca_id` ASC),
  CONSTRAINT `fk_usuario_repuesto`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `celular_db`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_marca_repuesto`
    FOREIGN KEY (`marca_id`)
    REFERENCES `celular_db`.`marcas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `celular_db`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `celular_db`.`servicios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` TEXT NOT NULL,
  `usuario_id` INT NOT NULL,
  `precio` DECIMAL(10,2) NOT NULL,
  `creado` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servicio_usuario_idx` (`usuario_id` ASC),
  CONSTRAINT `fk_servicio_usuario`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `celular_db`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `celular_db`.`operadoras`
-- -----------------------------------------------------
START TRANSACTION;
USE `celular_db`;
INSERT INTO `celular_db`.`operadoras` (`id`, `nombre`, `creado`, `modificado`) VALUES (DEFAULT, 'Movistar', DEFAULT, NULL);
INSERT INTO `celular_db`.`operadoras` (`id`, `nombre`, `creado`, `modificado`) VALUES (DEFAULT, 'Movilnet', DEFAULT, NULL);
INSERT INTO `celular_db`.`operadoras` (`id`, `nombre`, `creado`, `modificado`) VALUES (DEFAULT, 'Digitel', DEFAULT, NULL);
INSERT INTO `celular_db`.`operadoras` (`id`, `nombre`, `creado`, `modificado`) VALUES (DEFAULT, 'Liberado', DEFAULT, NULL);

COMMIT;

