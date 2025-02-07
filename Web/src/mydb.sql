-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`locker`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`locker` (
  `lockerId` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(45) NOT NULL,
  `fila` VARCHAR(45) NOT NULL,
  `status` SET('DISPONIBLE', 'ASIGNADO', 'ESPERA_RENOVACION') NOT NULL,
  `userId` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lockerId`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`acuse`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`acuse` (
  `acuseId` VARCHAR(45) NOT NULL,
  `ruta` VARCHAR(45) NOT NULL,
  `comprobante_pago` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userId` VARCHAR(45) NULL,
  PRIMARY KEY (`acuseId`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`user` (
  `userId` VARCHAR(45) NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidoP` VARCHAR(45) NOT NULL,
  `apellidoM` VARCHAR(45) NULL,
  `telefono` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `estatura` INT NOT NULL,
  `credencial` VARCHAR(45) NOT NULL,
  `horario` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `status` SET('SOLICITUD', 'RENOVACION', 'PAGO_ESPERA', 'ASIGNADO','RECHAZADO') NOT NULL,
  `lockerId` VARCHAR(45) NULL DEFAULT NULL,
  `acuseId` VARCHAR(45) NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`),
  UNIQUE INDEX `lockerId_UNIQUE` (`lockerId` ASC),
  UNIQUE INDEX `acuseId_UNIQUE` (`acuseId` ASC),
  CONSTRAINT `fk_user_locker`
    FOREIGN KEY (`lockerId`)
    REFERENCES `mydb`.`locker` (`lockerId`)
    ON DELETE SET NULL
    ON UPDATE CASCADE,
  CONSTRAINT `fk_user_acuse`
    FOREIGN KEY (`acuseId`)
    REFERENCES `mydb`.`acuse` (`acuseId`)
    ON DELETE SET NULL
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`admin` (
  `userId` VARCHAR(45) NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`userId`))
ENGINE = InnoDB;






SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
