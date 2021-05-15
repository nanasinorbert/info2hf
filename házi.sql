-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema info2hf
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema info2hf
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `info2hf` DEFAULT CHARACTER SET utf8 ;
USE `info2hf` ;

-- -----------------------------------------------------
-- Table `info2hf`.`Artists`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `info2hf`.`Artists` ;

CREATE TABLE IF NOT EXISTS `info2hf`.`Artists` (
  `id` INT NOT NULL auto_increment,
  `artistName` VARCHAR(45) NOT NULL,
  `artistAlias` VARCHAR(45) NULL,
  `artistCountry` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `info2hf`.`Songs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `info2hf`.`Songs` ;

CREATE TABLE IF NOT EXISTS `info2hf`.`Songs` (
  `id` INT NOT NULL auto_increment,
  `songName` VARCHAR(45) NOT NULL,
  `releaseYear` VARCHAR(45) NULL,
  `songStyle` VARCHAR(45) NULL,
  `Artists_id` INT,
  PRIMARY KEY (`id`),
  INDEX `fk_Songs_Artists_idx` (`Artists_id` ASC),
  CONSTRAINT `fk_Songs_Artists`
    FOREIGN KEY (`Artists_id`)
    REFERENCES `info2hf`.`Artists` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Willem Rebergen', 'Headhunterz', 'Netherlands');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Joram Metekohy', 'Wildstylez', 'Netherlands');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Bas Oskam', 'Noisecontrollers', 'Netherlands');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Tim van de Stadt', 'Atmozfears', 'Netherlands');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Koen Bauweraerts', 'Coone', 'Belgium');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Fabian Bohn', 'Brennan Heart', 'Netherlands');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Gerardo Roschini', 'Zatox', 'Italy');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Cristiano Giusberti', 'Technoboy', 'Italy');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Robbert van de Corput', 'Hardwell', 'Netherlands');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Fabian Schmidt', 'Omegatypez', 'Germany');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Malthe Mehlskov', 'Adrenalize', 'Denmark');
insert into `info2hf`.`artists` (artistName, artistAlias, artistCountry) values ('Corey Soljan', 'Code Black', 'Australia');