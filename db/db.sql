CREATE DATABASE skyroom_db;

CREATE TABLE skyroom_db.users (
                                   id INT NOT NULL AUTO_INCREMENT ,
                                   Firstname VARCHAR(30) NOT NULL ,
                                   Lastname VARCHAR(30) NOT NULL ,
                                   Email VARCHAR(50) NOT NULL ,
                                   Mobile VARCHAR(12) NULL,
                                   Password VARCHAR(255) NOT NULL,
                                   PRIMARY KEY (`id`)
) ENGINE = InnoDB;