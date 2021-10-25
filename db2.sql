CREATE TABLE `ozanimo`.`clients` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `names` VARCHAR(30) NULL DEFAULT NULL ,
    `email` VARCHAR(35) NULL DEFAULT NULL ,
    `password` VARCHAR(35) NULL DEFAULT NULL ,
    `contacts` VARCHAR(15) NULL DEFAULT NULL , 
       PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `ozanimo`.`sells` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `selling_date` DATE NOT NULL ,
    `amount` INT(25) NOT NULL , 
    `client` INT(10) NOT NULL ,
       PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `ozanimo`.`items` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `label` VARCHAR(25) NOT NULL ,
    `ref` VARCHAR(35) NULL DEFAULT NULL ,
    `item_type` ENUM('dog',
    'bird','accessory') NOT NULL ,
    `price` INT(15) NOT NULL DEFAULT '0' ,
    `genre` ENUM('M','F') NOT NULL ,
    `item_status` ENUM('not sold','sold') NOT NULL ,
    `link` VARCHAR(200) NULL DEFAULT NULL ,
    `description` TEXT NULL DEFAULT NULL , PRIMARY KEY (`id`)
    ) ENGINE = InnoDB;

CREATE TABLE `ozanimo`.`line_selling` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `item` INT(10) NOT NULL , 
    `sell` INT(10) NOT NULL ,
    `date_s` DATE NOT NULL , PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `ozanimo`.`items_info` ( 
    `id` INT(10) NOT NULL ,
    `item` INT(10) NOT NULL , 
    `bruit` VARCHAR(35) NULL DEFAULT NULL ,
    `fourure` VARCHAR(35) NULL DEFAULT NULL ,
    `weight` FLOAT(10) NULL DEFAULT NULL ,
    `height` FLOAT(10) NULL DEFAULT NULL ,
    `age` INT(5) NULL DEFAULT NULL ,
    `race` VARCHAR(30) NULL DEFAULT NULL , 
    `cat` VARCHAR(30) NULL DEFAULT NULL 
) ENGINE = InnoDB;

CREATE TABLE `ozanimo`.`album` ( `id` INT(10) NOT NULL AUTO_INCREMENT ,
 `item` INT(10) NOT NULL , 
 `paths` VARCHAR(200) NULL DEFAULT NULL , 
 `label` VARCHAR(35) NULL DEFAULT NULL ,
  `is_profile` BOOLEAN NOT NULL DEFAULT FALSE ,
   PRIMARY KEY (`id`)
) ENGINE = InnoDB;


CREATE TABLE `ozanimo`.`stock` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
    `item` INT(10) NOT NULL ,
    `qte` INT(10) NOT NULL DEFAULT '0' ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `ozanimo`.`stock_history` ( 
    `id` INT(10) NOT NULL AUTO_INCREMENT ,
     `date_stock` DATE NOT NULL ,
      `action` ENUM('stock','destock') 
      NOT NULL , 
      `item` INT(10) NOT NULL , 
      `qty` INT(10) NOT NULL DEFAULT '0' ,
       PRIMARY KEY (`id`)
       ) ENGINE = InnoDB;

alter table sells add CONSTRAINT fk_clients FOREIGN KEY (client) REFERENCES clients(id)
alter table line_selling add CONSTRAINT fk_sells FOREIGN KEY (sell) REFERENCES sells(id)
alter table line_selling add CONSTRAINT fk_item FOREIGN KEY (item) REFERENCES items(id)
alter table items_info add CONSTRAINT fk_item2 FOREIGN KEY (item) REFERENCES items(id)
alter table stock ADD CONSTRAINT fk_item4 FOREIGN KEY (item) REFERENCES items(id)

alter table stock_history ADD CONSTRAINT fk_item5 FOREIGN KEY (item) REFERENCES items(id)