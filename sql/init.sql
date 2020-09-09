CREATE DATABASE IF NOT EXISTS cogit DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use cogit;
SET NAMES utf8;
CREATE TABLE IF NOT EXISTS cogit_Type(
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS cogit_Country(
    id INT NOT NULL AUTO_INCREMENT,
    Country VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS cogit_Company(
    id INT NOT NULL AUTO_INCREMENT,
    idType INT(11),
    idCountry INT(11),
    Name VARCHAR(50),
    Tva VARCHAR(15),
    Phone VARCHAR(12),
    PRIMARY KEY (id),
    FOREIGN KEY (idType) REFERENCES cogit_Type(id),
    FOREIGN KEY (idCountry) REFERENCES cogit_Country(id)
);

CREATE TABLE IF NOT EXISTS cogit_Contact(
    id INT NOT NULL AUTO_INCREMENT,
    idCompany INT(11),
    LastName VARCHAR(50),
    FirstName VARCHAR(50),
    Phone VARCHAR(12),
    Email VARCHAR(50),
    PRIMARY KEY(id),
    FOREIGN KEY (idCompany) REFERENCES cogit_Company(id)
);

CREATE TABLE IF NOT EXISTS cogit_Invoice(
    id INT NOT NULL AUTO_INCREMENT,
    idCompany INT(11),
    idContact INT(11),
    NumberInvoice VARCHAR(13),
    date date NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idCompany) REFERENCES cogit_Company(id),
    FOREIGN KEY (idContact) REFERENCES cogit_Contact(id)
);

CREATE TABLE IF NOT EXISTS cogit_users(
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50),
    psw VARCHAR(255),
    role VARCHAR(50),
    PRIMARY KEY (id)
);