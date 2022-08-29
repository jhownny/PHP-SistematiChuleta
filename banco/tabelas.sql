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
CREATE SCHEMA IF NOT EXISTS `mydb` ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tbcliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbcliente` (
  `id_cliente` INT(11) NOT NULL,
  `nome_cliente` CHAR(11) NOT NULL,
  `email_cliente` VARCHAR(60) NOT NULL,
  `datacad` TIMESTAMP NOT NULL DEFAULT DF(current date),
  `ativo` BIT(0) NOT NULL DEFAULT DF('1'),
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbreserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbreserva` (
  `id_reserva` INT(11) NOT NULL,
  `mesa_reserva` INT NOT NULL,
  `data` TIMESTAMP NOT NULL DEFAULT DF('current date'),
  `ativo` BIT(0) NOT NULL DEFAULT DF('0'),
  `id_cliente_reserva` INT NOT NULL,
  PRIMARY KEY (`id_reserva`),
  INDEX `fk_tbreserva_tbcliente1_idx` (`id_cliente_reserva` ASC) ,
  CONSTRAINT `fk_tbreserva_tbcliente1`
    FOREIGN KEY (`id_cliente_reserva`)
    REFERENCES `mydb`.`tbcliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbtelefone`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`tbtelefone` (
  `id_telefone` INT(11) NOT NULL,
  `numero_telefone` VARCHAR(20) NOT NULL,
  `tipo_telefone` VARCHAR(11) NOT NULL,
  `id_cliente_telefone` INT NOT NULL,
  PRIMARY KEY (`id_telefone`),
  INDEX `fk_tbtelefone_tbcliente1_idx` (`id_cliente_telefone` ASC),
  CONSTRAINT `fk_tbtelefone_tbcliente1`
    FOREIGN KEY (`id_cliente_telefone`)
    REFERENCES `mydb`.`tbcliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
