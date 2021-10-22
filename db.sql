CREATE TABLE `animalerie`.`animals` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `nom_animal` VARCHAR(15) NULL DEFAULT NULL , `race_animal` ENUM('race1','race2','race3') NULL , `poids_animal` INT(5) NULL DEFAULT NULL , `age_animal` INT(5) NULL DEFAULT NULL , `prix_animal` INT(5) NULL DEFAULT NULL , `taille_animal` FLOAT(10) NULL DEFAULT NULL , `fourure` VARCHAR(10) NULL DEFAULT NULL , `cat_animal` ENUM('cat1','cat2','cat3') NULL DEFAULT NULL , `type_animal` ENUM('chien','oiseau') NULL DEFAULT NULL , `description_animal` TEXT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;




CREATE TABLE `animalerie`.`albums` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `photo_str` TEXT NULL , `chien` INT(10) NULL , `libelle` VARCHAR(25) NULL , PRIMARY KEY (`id`), INDEX (`chien`)) ENGINE = InnoDB;



CREATE TABLE `animalerie`.`client` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
     `nom_client` VARCHAR(25) NULL ,
      `contact_client` VARCHAR(25) NULL ,
       PRIMARY KEY (`id`)
       ) ENGINE = InnoDB;


CREATE TABLE `animalerie`.`accessoire` (
     `id` INT(10) NOT NULL AUTO_INCREMENT , 
     `libelle` VARCHAR(30) NULL , 
     `prix` INT(25) NULL , 
     `desc` INT(200) NULL , PRIMARY KEY (`id`)
     ) ENGINE = InnoDB;

CREATE TABLE `animalerie`.`chien` (
          `id` INT(10) NOT NULL AUTO_INCREMENT ,
           `nom` VARCHAR(20) NULL ,
            `age` INT(10) NULL ,
            `taille` FLOAT(10) NULL ,
            `poids` FLOAT(8) NULL ,
            `prix` INT(10) NULL , 
            `genre` ENUM('M','F') NULL ,
            `race` ENUM('race1','race2','race3') NULL ,
            `fourure` VARCHAR(50) NULL , 
            `descs` VARCHAR(250) NULL ,
                  PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `animalerie`.`oiseau` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
     `nom` INT(25) NULL , `prix` INT(15) NULL ,
      `cat` ENUM('cat1','cat2') NULL , 
      `bruit` VARCHAR(50) NULL ,
       PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `animalerie`.`album` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `title` VARCHAR(30) NULL ,
    `dte` DATE NULL ,
       PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `animalerie`.`mesaccessoires` ( 
    `id` INT NOT NULL AUTO_INCREMENT ,
     PRIMARY KEY (`id`)
) ENGINE = InnoDB;


ALTER TABLE `mesaccessoires` ADD `oiseau` INT(10) NOT NULL AFTER `id`, ADD `chien` INT(10) NOT NULL AFTER `oiseau`, ADD `accessoire` INT(10) NOT NULL AFTER `chien`, ADD INDEX (`oiseau`), ADD INDEX (`chien`), ADD INDEX (`accessoire`);

CREATE TABLE `animalerie`.`vente` (
     `id` INT(10) NOT NULL AUTO_INCREMENT ,
      `dtr` DATE NULL , `oiseau` INT(10) NULL ,
       `accessoire` INT(10) NULL ,
        `chien` INT(10) NULL ,
         `montant` INT(15) NULL DEFAULT '0' ,
          PRIMARY KEY (`id`), 
          INDEX (`dtr`), 
          INDEX (`oiseau`), 
          INDEX (`accessoire`),
           INDEX (`chien`)
    ) ENGINE = InnoDB;

ALTER TABLE `album` ADD `paths` VARCHAR(150) NULL AFTER `dte`, ADD `oiseau` INT(10) NULL AFTER `paths`, ADD `chien` INT(10) NULL AFTER `oiseau`, ADD `accessoire` INT(10) NULL AFTER `chien`, ADD INDEX (`oiseau`), ADD INDEX (`chien`), ADD INDEX (`accessoire`);
ALTER TABLE `vente` ADD `client` INT(10) NULL AFTER `montant`, ADD INDEX (`client`);

ALTER TABLE `album` ADD `profile` BOOLEAN NULL AFTER `accessoire`;

ALTER TABLE `oiseau` ADD `descs` VARCHAR(250) NULL AFTER `bruit`;
ALTER TABLE `oiseau` ADD `age` INT(10) NULL AFTER `nom`;
ALTER TABLE `oiseau` CHANGE `age` `genre` ENUM('M','F') NULL DEFAULT NULL;
ALTER TABLE `oiseau` CHANGE `nom` `nom` VARCHAR(35) NULL DEFAULT NULL;
ALTER TABLE `chien` ADD `paye` BOOLEAN NULL DEFAULT FALSE AFTER `descs`;
ALTER TABLE `oiseau` ADD `paye` BOOLEAN NULL DEFAULT FALSE AFTER `descs`;
ALTER TABLE `accessoire` ADD `paye` BOOLEAN NULL DEFAULT FALSE AFTER `description`;