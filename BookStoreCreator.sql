DROP SCHEMA IF EXISTS `project1` ;

-- -----------------------------------------------------
-- Schema project1
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `project1` DEFAULT CHARACTER SET utf8mb4 ;
USE `project1` ;

-- -----------------------------------------------------
-- Table `project1`.`bookinventory`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project1`.`bookinventory` ;

CREATE TABLE IF NOT EXISTS `project1`.`bookinventory` (
  `bookid` INT(11) NOT NULL AUTO_INCREMENT,
  `book_name` VARCHAR(30) NULL DEFAULT NULL,
  `writer_name` VARCHAR(20) NULL DEFAULT NULL,
  `price` INT(11) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`bookid`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `project1`.`cart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project1`.`cart` ;

CREATE TABLE IF NOT EXISTS `project1`.`cart` (
  `order_date` DATE NULL DEFAULT NULL)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `project1`.`customer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project1`.`customer` ;

CREATE TABLE IF NOT EXISTS `project1`.`customer` (
  `customerid` INT(11) NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(20) NULL DEFAULT NULL,
  `lastname` VARCHAR(20) NULL DEFAULT NULL,
  PRIMARY KEY (`customerid`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `project1`.`orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project1`.`orders` ;

CREATE TABLE IF NOT EXISTS `project1`.`orders` (
  `orderid` INT(11) NOT NULL AUTO_INCREMENT,
  `Bookid` INT(11) NULL DEFAULT NULL,
  `quantity` INT(11) NULL DEFAULT NULL,
  `customer_id` INT(11) NOT NULL,
  PRIMARY KEY (`orderid`),
  INDEX `customerid_idx` (`customer_id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 26
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `project1`.`payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `project1`.`payment` ;

CREATE TABLE IF NOT EXISTS `project1`.`payment` (
  `paymentid` INT(11) NOT NULL AUTO_INCREMENT,
  `cardholdername` VARCHAR(20) NULL DEFAULT NULL,
  `cardnumber` VARCHAR(20) NULL DEFAULT NULL,
  `expirydate` DATE NULL DEFAULT NULL,
  `cvv` INT(11) NULL DEFAULT NULL,
  `order_id` INT(11) NOT NULL,
  PRIMARY KEY (`paymentid`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = utf8mb4;

