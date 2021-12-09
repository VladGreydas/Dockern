CREATE TABLE IF NOT EXISTS `projectdb`.`movies` ( 
    `ID` INT NOT NULL AUTO_INCREMENT , 
    `title` VARCHAR(100) NOT NULL , 
    `genre` VARCHAR(50) NULL , 
    `date_production` DATE NOT NULL , 
    `description` MEDIUMTEXT NULL , 
    `poster_link` VARCHAR(100) NULL , 
    PRIMARY KEY (`ID`)) 
ENGINE = InnoDB; 