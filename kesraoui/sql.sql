SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `mydb`.`documents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `documents` (
  `id_doc` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(255) NULL,
  `latlng` POINT NULL,
  `url` VARCHAR(2048) NULL,
  PRIMARY KEY (`id_doc`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`personnes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `personnes` (
  `id_perso` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL,
  PRIMARY KEY (`id_perso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`scores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `scores` (
  `id_scores` INT NOT NULL AUTO_INCREMENT,
  `id_perso` INT NOT NULL,
  `id_doc` INT NOT NULL,
  `distance` INT NULL,
  `maj` DATETIME NULL,
  PRIMARY KEY (`id_scores`),
  INDEX `fk_scores_personnes_idx` (`id_perso` ASC),
  INDEX `fk_scores_documents1_idx` (`id_doc` ASC))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;