DROP DATABASE IF EXISTS present;

CREATE DATABASE present;

USE present;




CREATE TABLE user
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    firstName  VARCHAR(45),
    lastName VARCHAR(45),
    dateOfBirth DATE,
    password VARCHAR(255),
    email VARCHAR(255),
    registrationTime DATE
);

