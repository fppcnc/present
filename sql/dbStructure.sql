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
    name         VARCHAR(255),
    FOREIGN KEY (organizedBy) REFERENCES user (id) ON DELETE CASCADE,
    date         DATETIME,
    place        LONGTEXT,
    public       VARCHAR(5),
    creationTime DATE
);

CREATE TABLE wishlist
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    name         VARCHAR(255),
    createdBy    INT,
    FOREIGN KEY (createdBy) REFERENCES user (id) ON DELETE CASCADE,
    creationTime DATE
);

CREATE TABLE wishlistItems
(
    id           INT PRIMARY KEY AUTO_INCREMENT,
    wishlistId   INT,
    FOREIGN KEY (wishlistId) REFERENCES wishlist (id) ON DELETE CASCADE,
    description  LONGTEXT NULL,
    externalLink LONGTEXT NULL
);

CREATE TABLE connections
(
    id          INT PRIMARY KEY AUTO_INCREMENT,
    userId      INT,
    FOREIGN KEY (userId) REFERENCES user (id) ON DELETE CASCADE,
    connectedTo INT,
    FOREIGN KEY (connectedTo) REFERENCES user (id) ON DELETE CASCADE,
    connectedOn DATE
);

CREATE TABLE fullEvent
(
    id         INT PRIMARY KEY AUTO_INCREMENT,
    wishlistId INT,
    FOREIGN KEY (wishlistId) REFERENCES wishlist (id) ON DELETE CASCADE,
    eventId    INT,
    FOREIGN KEY (eventId) REFERENCES event (id) ON DELETE CASCADE
);

CREATE TABLE guests
(
    guestId INT,
    eventId INT,
    PRIMARY KEY (guestId, eventId),
    FOREIGN KEY (guestId) REFERENCES user (id) ON DELETE CASCADE,
    FOREIGN KEY (eventId) REFERENCES event (id) ON DELETE CASCADE
)
