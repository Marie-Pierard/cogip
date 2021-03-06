CREATE DATABASE IF NOT EXISTS cogip DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

use cogip;
SET NAMES utf8;
CREATE TABLE IF NOT EXISTS cogip_type(
    id INT NOT NULL AUTO_INCREMENT,
    type VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS cogip_country(
    id INT NOT NULL AUTO_INCREMENT,
    Country VARCHAR(50),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS cogip_company(
    id INT NOT NULL AUTO_INCREMENT,
    idType INT(11),
    idCountry INT(11),
    Name VARCHAR(50),
    Tva VARCHAR(15),
    PRIMARY KEY (id),
    FOREIGN KEY (idType) REFERENCES cogip_type(id),
    FOREIGN KEY (idCountry) REFERENCES cogip_country(id)
);

CREATE TABLE IF NOT EXISTS cogip_contact(
    id INT NOT NULL AUTO_INCREMENT,
    idCompany INT(11),
    LastName VARCHAR(50),
    FirstName VARCHAR(50),
    Phone VARCHAR(12),
    Email VARCHAR(50),
    PRIMARY KEY(id),
    FOREIGN KEY (idCompany) REFERENCES cogip_company(id)
);

CREATE TABLE IF NOT EXISTS cogip_invoice(
    id INT NOT NULL AUTO_INCREMENT,
    idCompany INT(11),
    idContact INT(11),
    NumberInvoice VARCHAR(13),
    date date NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idCompany) REFERENCES cogip_company(id),
    FOREIGN KEY (idContact) REFERENCES cogip_contact(id)
);

CREATE TABLE IF NOT EXISTS cogip_users(
    id INT NOT NULL AUTO_INCREMENT,
    login VARCHAR(50),
    email VARCHAR(50),
    psw VARCHAR(255),
    role VARCHAR(50),
    PRIMARY KEY (id)
);
