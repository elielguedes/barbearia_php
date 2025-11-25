-- MySQL Script para Barbearia
-- Criado em: November 21, 2025

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema barbearia
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `barbearia`;
CREATE SCHEMA `barbearia` DEFAULT CHARACTER SET utf8mb4;
USE `barbearia`;

-- -----------------------------------------------------
-- Table `barbearia`.`servico`
-- -----------------------------------------------------
CREATE TABLE `servico` (
  `id_servico` INT NOT NULL AUTO_INCREMENT,
  `nome_servico` VARCHAR(45) NULL,
  `preco_servico` DECIMAL(10,2) NULL,
  `duracao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_servico`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `barbearia`.`barbeiro`
-- -----------------------------------------------------
CREATE TABLE `barbeiro` (
  `id_barbeiro` INT NOT NULL AUTO_INCREMENT,
  `nome_barbeiro` VARCHAR(45) NULL,
  `especialidade` VARCHAR(45) NULL,
  `telefone` VARCHAR(11) NULL,
  PRIMARY KEY (`id_barbeiro`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `barbearia`.`cliente`
-- -----------------------------------------------------
CREATE TABLE `cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome_cliente` VARCHAR(45) NULL,
  `telefone` VARCHAR(11) NULL,
  `email` VARCHAR(100) NULL,
  `data_cadastro` DATE NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `barbearia`.`agendamento`
-- -----------------------------------------------------
CREATE TABLE `agendamento` (
  `id_agendamento` INT NOT NULL AUTO_INCREMENT,
  `cliente_id` INT NOT NULL,
  `barbeiro_id` INT NOT NULL,
  `servico_id` INT NOT NULL,
  `data_hora` DATETIME NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`id_agendamento`),
  INDEX `fk_agendamento_cliente_idx` (`cliente_id`),
  INDEX `fk_agendamento_barbeiro_idx` (`barbeiro_id`),
  INDEX `fk_agendamento_servico_idx` (`servico_id`),
  CONSTRAINT `fk_agendamento_cliente`
    FOREIGN KEY (`cliente_id`)
    REFERENCES `cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendamento_barbeiro`
    FOREIGN KEY (`barbeiro_id`)
    REFERENCES `barbeiro` (`id_barbeiro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agendamento_servico`
    FOREIGN KEY (`servico_id`)
    REFERENCES `servico` (`id_servico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `barbearia`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE `pagamento` (
  `id_pagamento` INT NOT NULL AUTO_INCREMENT,
  `agendamento_id` INT NOT NULL,
  `valor` DECIMAL(10,2) NULL,
  `forma_pagamento` VARCHAR(120) NULL,
  `data_pagamento` DATE NULL,
  PRIMARY KEY (`id_pagamento`),
  INDEX `fk_pagamento_agendamento_idx` (`agendamento_id`),
  CONSTRAINT `fk_pagamento_agendamento`
    FOREIGN KEY (`agendamento_id`)
    REFERENCES `agendamento` (`id_agendamento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
