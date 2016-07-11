-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ticketing
-- -----------------------------------------------------
-- Model za ticketing sustav

-- -----------------------------------------------------
-- Schema ticketing
--
-- Model za ticketing sustav
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ticketing` DEFAULT CHARACTER SET utf8 ;
USE `ticketing` ;

-- -----------------------------------------------------
-- Table `ticketing`.`city`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketing`.`city` (
  `city` VARCHAR(50) NOT NULL,
  `region` ENUM('sjever', 'istok', 'zapad', 'jug') NOT NULL,
  PRIMARY KEY (`city`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ticketing`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketing`.`users` (
  `id_user` INT NOT NULL AUTO_INCREMENT COMMENT 'ID korisnika',
  `name` VARCHAR(50) NULL,
  `lastname` VARCHAR(50) NULL,
  `email` VARCHAR(70) NOT NULL,
  `phone` INT NULL,
  `city` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `FK_kor_mjesto_idx` (`city` ASC),
  CONSTRAINT `FK_users_city`
    FOREIGN KEY (`city`)
    REFERENCES `ticketing`.`city` (`city`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ticketing`.`equipment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketing`.`equipment` (
  `serial_num` VARCHAR(50) NOT NULL,
  `part_num` VARCHAR(45) NULL,
  `equip_name` VARCHAR(75) NULL,
  `warr_start_date` DATE NOT NULL COMMENT 'pocetni datum garancije',
  `warr_end_date` DATE NOT NULL COMMENT 'zavrsni datum garancije',
  PRIMARY KEY (`serial_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ticketing`.`admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketing`.`admins` (
  `id_user` INT NOT NULL COMMENT 'ID korisnika koji je Administrator',
  PRIMARY KEY (`id_user`),
  CONSTRAINT `FK_admins_users`
    FOREIGN KEY (`id_user`)
    REFERENCES `ticketing`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ticketing`.`password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketing`.`password` (
  `id_user` INT NOT NULL,
  `password` CHAR(64) NOT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ticketing`.`service`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ticketing`.`service` (
  `id_ticket` INT NOT NULL,
  `id_user` INT NOT NULL,
  `serial_num` VARCHAR(50) NOT NULL COMMENT 'serijski broj opreme',
  `failure_desc` TINYTEXT NULL,
  `failure_date` DATE NOT NULL,
  `fix_date` DATE NULL,
  PRIMARY KEY (`id_ticket`),
  INDEX `FK_servis_korisnikID_idx` (`id_user` ASC),
  INDEX `FK2_servis_serijski_idx` (`serial_num` ASC),
  CONSTRAINT `FK1_service_users`
    FOREIGN KEY (`id_user`)
    REFERENCES `ticketing`.`users` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK2_service_equipment`
    FOREIGN KEY (`serial_num`)
    REFERENCES `ticketing`.`equipment` (`serial_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
