DROP DATABASE IF EXISTS present;

CREATE DATABASE present;

USE present;


CREATE TABLE user
(
    id               INT PRIMARY KEY AUTO_INCREMENT,
    firstName        VARCHAR(45),
    lastName         VARCHAR(45),
    dateOfBirth      DATE,
    password         VARCHAR(255),
    email            VARCHAR(255),
    registrationTime DATE
);

CREATE TABLE place
(
    id       INT PRIMARY KEY AUTO_INCREMENT,
    country  INT PRIMARY KEY,
    city     VARCHAR(255),
    postcode VARCHAR(5),
    streetNr VARCHAR(10),
    street   VARCHAR(255)
);

CREATE TABLE event
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    organizedBy  INT,
    FOREIGN KEY (organizedBy) REFERENCES user (id),
    date         DATE,
    placeId      INT,
    FOREIGN KEY (placeId) REFERENCES place (id),
    creationTime DATE
);

CREATE TABLE wishlist
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    createdBy  INT PRIMARY KEY,
    FOREIGN KEY (createdBy) REFERENCES user (id),
    creationTime DATE
);

CREATE TABLE wishlistItems
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    wishlistId INT,
    FOREIGN KEY (wishlistId) REFERENCES wishlist(id),
    description  LONGTEXT NULL,
    externalLink LONGTEXT NULL
);

CREATE TABLE connections
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    userId INT,
    FOREIGN KEY (userId) REFERENCES user(id),
    connectedTo INT,
    FOREIGN KEY (connectedTo) REFERENCES user(id)
)


