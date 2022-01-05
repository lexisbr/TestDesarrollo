DROP DATABASE IF EXISTS USERS;
CREATE DATABASE IF NOT EXISTS USERS;
USE USERS;

CREATE TABLE IF NOT EXISTS `ROLES`(
    roleId INT NOT NULL AUTO_INCREMENT,
    roleName VARCHAR(100) NOT NULL,
    status TINYINT NOT NULL,
    PRIMARY KEY (roleId)
);


CREATE TABLE IF NOT EXISTS `USER`(
    userId INT NOT NULL AUTO_INCREMENT,
    roleId INT NOT NULL,
    user_name VARCHAR(45) NOT NULL,
    firstName VARCHAR(45) NOT NULL,
    lastName VARCHAR(45) NOT NULL,
    password VARCHAR(45) NOT NULL,
    status VARCHAR(45) NOT NULL,
    attempts INT NOT NULL,
    createUser VARCHAR(45) NOT NULL,
    createDate DATETIME NOT NULL,
    modifiedUser VARCHAR(45),
    modifiedDate DATETIME,
    PRIMARY KEY (userId),
    FOREIGN KEY (roleId) REFERENCES ROLES (roleId)
);


INSERT INTO ROLES (roleName, status) VALUES ("ADMINISTRADOR", 1);
INSERT INTO ROLES (roleName, status) VALUES ("COLABORADOR", 1);

DELIMITER $$

CREATE PROCEDURE insertUser(
    IN roleIdP INT, 
    IN user_nameP VARCHAR(45), 
    IN firstNameP VARCHAR(45), 
    IN lastNameP VARCHAR(45), 
    IN passwordP VARCHAR(45), 
    IN statusP VARCHAR(45),
    IN attemptsP INT,
    IN createUserP VARCHAR(45),
    IN createDateP DATETIME)
BEGIN
    INSERT INTO USER(roleId,user_name,firstName,lastName,password,status,attempts,createUser,createDate) VALUES (
        roleIdP,
        user_nameP,
        firstNameP,
        lastNameP,
        passwordP,
        statusP,
        attemptsP,
        createUserP,
        createDateP); 
END$$

CALL insertUser(1,"lex",'alejandro','barrios','123','activo',0,"admin","2022-01-04");