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





-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('ddd', 'ddd', '1994-04-04', 'ddd', 'ddd@ddd.ddd', '2023-05-06')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('eee', 'eee', '1995-05-05', 'eee', 'eee@eee.eee', '2023-06-05')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('fff', 'fff', '1996-06-06', 'fff', 'fff@fff.fff', '2023-06-05')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('ggg', 'ggg', '1997-07-07', 'ggg', 'ggg@ggg.ggg', '2023-06-04')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('hhh', 'hhh', '1998-08-08', 'hhh', 'hhh@hhh.hhh', '2023-06-04')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('iii', 'iii', '1999-09-09', 'iii', 'iii@iii.iii', '2023-06-04')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('lll', 'lll', '2000-10-10', 'lll', 'lll@lll.lll', '2023-06-04')
-- INSERT INTO present.user (firstName, lastName, dateOfBirth, password, email, registrationTime) VALUES ('mmm', 'mmm', '2001-11-11', 'mmm', 'mmm@mmm.mmm', '2023-06-04')
