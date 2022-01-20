-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pokedex
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `pokedex` ;

-- -----------------------------------------------------
-- Schema pokedex
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pokedex` DEFAULT CHARACTER SET utf8 ;
USE `pokedex` ;

-- -----------------------------------------------------
-- Table `pokedex`.`regiones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pokedex`.`regiones` ;

CREATE TABLE IF NOT EXISTS `pokedex`.`regiones` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pokedex`.`pokemons`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pokedex`.`pokemons` ;

CREATE TABLE IF NOT EXISTS `pokedex`.`pokemons` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `numero` VARCHAR(3) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `altura` INT NULL,
  `peso` DECIMAL(5,2) NULL,
  `evolucion` VARCHAR(45) NULL,
  `imagen` VARCHAR(255) NULL,
  `regiones_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `numero_UNIQUE` (`numero` ASC),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC),
  UNIQUE INDEX `imagen_UNIQUE` (`imagen` ASC),
  INDEX `fk_pokemons_regiones_idx` (`regiones_id` ASC),
  CONSTRAINT `fk_pokemons_regiones`
    FOREIGN KEY (`regiones_id`)
    REFERENCES `pokedex`.`regiones` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pokedex`.`tipos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pokedex`.`tipos` ;

CREATE TABLE IF NOT EXISTS `pokedex`.`tipos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nobre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pokedex`.`tipos_has_pokemons`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `pokedex`.`tipos_has_pokemons` ;

CREATE TABLE IF NOT EXISTS `pokedex`.`tipos_has_pokemons` (
  `tipos_id` INT NOT NULL,
  `pokemons_id` INT NOT NULL,
  PRIMARY KEY (`tipos_id`, `pokemons_id`),
  INDEX `fk_tipos_has_pokemons_pokemons1_idx` (`pokemons_id` ASC),
  INDEX `fk_tipos_has_pokemons_tipos1_idx` (`tipos_id` ASC),
  CONSTRAINT `fk_tipos_has_pokemons_tipos1`
    FOREIGN KEY (`tipos_id`)
    REFERENCES `pokedex`.`tipos` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tipos_has_pokemons_pokemons1`
    FOREIGN KEY (`pokemons_id`)
    REFERENCES `pokedex`.`pokemons` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `pokedex`.`regiones`
-- -----------------------------------------------------
START TRANSACTION;
USE `pokedex`;
INSERT INTO `pokedex`.`regiones` (`id`, `nombre`) VALUES (1, 'Kanto');
INSERT INTO `pokedex`.`regiones` (`id`, `nombre`) VALUES (2, 'Jotho');
INSERT INTO `pokedex`.`regiones` (`id`, `nombre`) VALUES (3, 'Hoenn');
INSERT INTO `pokedex`.`regiones` (`id`, `nombre`) VALUES (4, 'Sinnoh ');
INSERT INTO `pokedex`.`regiones` (`id`, `nombre`) VALUES (5, 'Teselia');

COMMIT;


-- -----------------------------------------------------
-- Data for table `pokedex`.`pokemons`
-- -----------------------------------------------------
START TRANSACTION;
USE `pokedex`;
INSERT INTO `pokedex`.`pokemons` (`id`, `numero`, `nombre`, `altura`, `peso`, `evolucion`, `imagen`, `regiones_id`) VALUES (DEFAULT, '001', 'Bulbasur', 70, 6.9, 'Sin evolucionar', '/pokedex/media/pokemons/001.jpg', 1);
INSERT INTO `pokedex`.`pokemons` (`id`, `numero`, `nombre`, `altura`, `peso`, `evolucion`, `imagen`, `regiones_id`) VALUES (DEFAULT, '002', 'Ivysaur', 100, 13, 'Primera evolución', '/pokedex/media/pokemons/002.jpg', 1);
INSERT INTO `pokedex`.`pokemons` (`id`, `numero`, `nombre`, `altura`, `peso`, `evolucion`, `imagen`, `regiones_id`) VALUES (DEFAULT, '003', 'Venusaur', 2, 100, 'Segunda evolución', '/pokedex/media/pokemons/003.png', 1);
INSERT INTO `pokedex`.`pokemons` (`id`, `numero`, `nombre`, `altura`, `peso`, `evolucion`, `imagen`, `regiones_id`) VALUES (DEFAULT, '004', 'Charmander', 60, 8.5, 'Sin evolucionar', '/pokedex/media/pokemons/004.png', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `pokedex`.`tipos`
-- -----------------------------------------------------
START TRANSACTION;
USE `pokedex`;
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (1, 'Planta');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (2, 'Veneno');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (3, 'Fuego');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (4, 'Volador');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (5, 'Agua');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (6, 'Eléctrico');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (7, 'Hada');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (8, 'Bicho');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (9, 'Lucha');
INSERT INTO `pokedex`.`tipos` (`id`, `nombre`) VALUES (10, 'Psíquico');

COMMIT;


-- -----------------------------------------------------
-- Data for table `pokedex`.`tipos_has_pokemons`
-- -----------------------------------------------------
START TRANSACTION;
USE `pokedex`;
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (1, 1);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (2, 1);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (1, 2);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (2, 2);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (3, 2);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (4, 2);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (5, 2);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (6, 2);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (1, 3);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (2, 3);
INSERT INTO `pokedex`.`tipos_has_pokemons` (`tipos_id`, `pokemons_id`) VALUES (3, 4);


COMMIT;
