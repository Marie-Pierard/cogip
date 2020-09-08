CREATE DATABASE IF NOT EXISTS cogit DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use cogit;
SET NAMES utf8;
CREATE TABLE IF NOT EXISTS cogit_Type(
    idType INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(50),
    PRIMARY KEY(idType)
);

CREATE TABLE IF NOT EXISTS cogit_Company(
    idCompany INT NOT NULL AUTO_INCREMENT,
    idType INT(11),
    Name VARCHAR(50),
    Tva VARCHAR(13),
    Phone VARCHAR(12),
    Country VARCHAR(50),
    PRIMARY KEY (idCompany),
    FOREIGN KEY (idType) REFERENCES cogit_Type(idType)
);

CREATE TABLE IF NOT EXISTS cogit_Contact(
    idContact INT NOT NULL AUTO_INCREMENT,
    idCompany INT(11),
    LastName VARCHAR(50),
    FirstName VARCHAR(50),
    Phone VARCHAR(12),
    Email VARCHAR(50),
    PRIMARY KEY(idContact),
    FOREIGN KEY (idCompany) REFERENCES cogit_Company(idCompany)
);

CREATE TABLE IF NOT EXISTS cogit_Invoice(
    idInvoice INT NOT NULL AUTO_INCREMENT,
    idCompany INT(11),
    idContact INT(11),
    NumberInvoice VARCHAR(13),
    date date NOT NULL,
    PRIMARY KEY (idInvoice),
    FOREIGN KEY (idCompany) REFERENCES cogit_Company(idCompany),
    FOREIGN KEY (idContact) REFERENCES cogit_Contact(idContact)
);

CREATE TABLE IF NOT EXISTS cogit_users(
    idUser INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50),
    psw VARCHAR(255),
    PRIMARY KEY (idUSer)
);