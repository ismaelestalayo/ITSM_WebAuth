CREATE DATABASE IF NOT EXISTS ITSM_L3;
USE ITSM_L3;

DROP TABLE IF EXISTS USERS;
CREATE TABLE IF NOT EXISTS USERS (
  _id integer PRIMARY KEY AUTO_INCREMENT,
  _name varchar(256) NOT NULL, 
  _mail varchar(256) NOT NULL, 
  _pass varchar(256) NOT NULL,
  UNIQUE(_name));

INSERT INTO USERS (_id, _name, _mail, _pass) VALUES (1, "admin", "admin@itsm.lt", "admin");