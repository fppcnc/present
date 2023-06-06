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
    email            VARCHAR(255) UNIQUE,
    registrationTime DATE
);

CREATE TABLE event
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    organizedBy  INT,
    FOREIGN KEY (organizedBy) REFERENCES user (id),
    date         DATE,
    country      VARCHAR(255),
    city         VARCHAR(255),
    postcode     VARCHAR(5),
    streetNr     VARCHAR(10),
    street       VARCHAR(255),
    creationTime DATE
);

CREATE TABLE wishlist
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    createdBy    INT,
    FOREIGN KEY (createdBy) REFERENCES user (id),
    creationTime DATE
);

CREATE TABLE wishlistItems
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    wishlistId   INT,
    FOREIGN KEY (wishlistId) REFERENCES wishlist (id),
    description  LONGTEXT NULL,
    externalLink LONGTEXT NULL
);

CREATE TABLE connections
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    userId      INT,
    FOREIGN KEY (userId) REFERENCES user (id),
    connectedTo INT,
    FOREIGN KEY (connectedTo) REFERENCES user (id)
);

CREATE TABLE fullEvent
(
    id         INT PRIMARY KEY AUTO_INCREMENT,
    wishlistId INT,
    FOREIGN KEY (wishlistId) REFERENCES wishlist (id),
    eventId    INT,
    FOREIGN KEY (eventId) REFERENCES event (id)
);

CREATE TABLE guests
(
    connectedToId INT,
    fullEventId   INT,
    PRIMARY KEY (connectedToId, fullEventId),
    FOREIGN KEY (connectedToId) REFERENCES connections (connectedTo),
    FOREIGN KEY (fullEventId) REFERENCES fullEvent (id)
)
