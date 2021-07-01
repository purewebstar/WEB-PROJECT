CREATE DATABASE website;

CREATE TABLE CUSTOMER(
    custId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    custEmail VARCHAR(40) NOT NULL,
    custPassword VARCHAR(50S0) NOT NULL,
    custLastName VARCHAR(15) NOT NULL,
    custFirstName VARCHAR(15) NOT NULL,
    custBirth TIMESTAMP NOT NULL,
    custPhone VARCHAR(15) NOT NULL,
    custAddress VARCHAR(15) NOT NULL,
    custCity VARCHAR(15) NOT NULL,
    custCountry VARCHAR(15) NOT NULL,
    uploadCv VARCHAR(100) NOT NULL
);


CREATE TABLE EXPERT(
    expertId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    expertEmail VARCHAR(500) NOT NULL,
    expertPassword VARCHAR(40) NOT NULL,
    expertLastName VARCHAR(15) NOT NULL,
    expertFirstName VARCHAR(15) NOT NULL,
    expertPhone VARCHAR(15) NOT NULL,
    expertAddress VARCHAR(15) NOT NULL,
    expertCity VARCHAR(15) NOT NULL,
    expertCountry VARCHAR(15) NOT NULL
);

CREATE TABLE ADMIN_S(
    adminId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    adminEmail VARCHAR(40) NOT NULL,
    amdinPassword VARCHAR(500) NOT NULL,
    adminLastName VARCHAR(15) NOT NULL,
    adminFirstName VARCHAR(15) NOT NULL,
    adminBirth TIMESTAMP NOT NULL,
    adminPhone VARCHAR(15) NOT NULL,
    adminAddress VARCHAR(15) NOT NULL,
    adminCity VARCHAR(15) NOT NULL,
    adminCountry VARCHAR(15) NOT NULL
);