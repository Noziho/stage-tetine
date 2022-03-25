-- MySQL Script generated by MySQL Workbench
-- Fri Mar 25 11:58:07 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema stage
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema stage
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `stage` DEFAULT CHARACTER SET utf8 ;
USE `stage` ;

-- -----------------------------------------------------
-- Table `stage`.`mdf58_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stage`.`mdf58_role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stage`.`mdf58_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stage`.`mdf58_user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `email` VARCHAR(155) NOT NULL,
  `phone_number` INT UNSIGNED NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `city` VARCHAR(155) NOT NULL,
  `postal_code` VARCHAR(45) NOT NULL,
  `adress` VARCHAR(255) NOT NULL,
  `role_fk` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  INDEX `fk_mdf58_user_mdf58_role_idx` (`role_fk` ASC),
  CONSTRAINT `fk_mdf58_user_mdf58_role`
    FOREIGN KEY (`role_fk`)
    REFERENCES `stage`.`mdf58_role` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stage`.`mdf58_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stage`.`mdf58_category` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stage`.`mdf58_product`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stage`.`mdf58_product` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` VARCHAR(255) NOT NULL,
  `price` DOUBLE NOT NULL,
  `image` VARCHAR(45) NOT NULL,
  `category_fk` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_mdf58_product_mdf58_category1_idx` (`category_fk` ASC),
  CONSTRAINT `fk_mdf58_product_mdf58_category1`
    FOREIGN KEY (`category_fk`)
    REFERENCES `stage`.`mdf58_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stage`.`mdf58_basket`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stage`.`mdf58_basket` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `quantity` INT UNSIGNED NOT NULL,
  `price` INT UNSIGNED NOT NULL,
  `product_fk` INT UNSIGNED NOT NULL,
  `mdf58_user_fk` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_mdf58_basket_mdf58_product1_idx` (`product_fk` ASC),
  INDEX `fk_mdf58_basket_mdf58_user1_idx` (`mdf58_user_fk` ASC),
  CONSTRAINT `fk_mdf58_basket_mdf58_product1`
    FOREIGN KEY (`product_fk`)
    REFERENCES `stage`.`mdf58_product` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mdf58_basket_mdf58_user1`
    FOREIGN KEY (`mdf58_user_fk`)
    REFERENCES `stage`.`mdf58_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `stage`.`mdf58_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stage`.`mdf58_order` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `basket_fk` INT NOT NULL,
  `user_fk` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_mdf58_order_mdf58_basket1_idx` (`basket_fk` ASC),
  INDEX `fk_mdf58_order_mdf58_user1_idx` (`user_fk` ASC),
  CONSTRAINT `fk_mdf58_order_mdf58_basket1`
    FOREIGN KEY (`basket_fk`)
    REFERENCES `stage`.`mdf58_basket` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mdf58_order_mdf58_user1`
    FOREIGN KEY (`user_fk`)
    REFERENCES `stage`.`mdf58_user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
