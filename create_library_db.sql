-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema wmst_library_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema wmst_library_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `wmst_library_db` DEFAULT CHARACTER SET utf8 ;
USE `wmst_library_db` ;

-- -----------------------------------------------------
-- Table `wmst_library_db`.`all_book_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `wmst_library_db`.`all_book_info` (
  `book_title` VARCHAR(170) NOT NULL, -- sets the entity of the book's title to be a string of no more than 170 characters 
  `primary_author_or_editor` VARCHAR(45) NULL, -- sets the entity of the book's primary author to be a string of no more than 45 characters
  `other_authors_or_editors` VARCHAR(45) NULL, -- sets the entity of the book's secondary and other authors to be a string of no more than 45 characters
  `publisher` VARCHAR(60) NOT NULL, -- sets the entity of the book's publisher to be a string of no more than 60 characters
  `pub_date` VARCHAR(20) NULL, -- sets the entity of the book's publication date to be a string of no more than 20 characters
  `shelf_subject` VARCHAR(40) NOT NULL, -- sets the entity of the book's shelf subject label to be a string of no more than 40 characters
  `region_of_interest` VARCHAR(20) NULL, -- sets the entity of the book's region (US, Non-US, Global, or some region) to be a string of no more than 20 characters
  `book_genre` VARCHAR(50) NOT NULL, -- sets the entity of the book's genre to be a string of no more than 50 characters
  `isbn_or_issn` VARCHAR(20) NULL, -- sets the entity of the book's isbn or issn code to be a string of no more than 20 characters
  `edition` VARCHAR(45) NULL, -- sets the entity of the book's edition to be a string of no more than 45 characters (due to some book editions not being numbers)
  `copies_available` INT NOT NULL, -- sets the entity of the number of book copies available at the library to be an integer
  `list_price` VARCHAR(6) NULL) -- sets the entity of the book's list price to be a string of no more than 6 characters
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;