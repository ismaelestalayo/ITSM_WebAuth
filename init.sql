CREATE DATABASE IF NOT EXISTS ITSM_L3;
USE ITSM_L3;

DROP TABLE IF EXISTS USERS;
CREATE TABLE IF NOT EXISTS USERS (
  _id integer PRIMARY KEY AUTO_INCREMENT,
  _name varchar(256) NOT NULL, 
  _mail varchar(256) NOT NULL, 
  _domain varchar(256) DEFAULT 'itsm_domain',
  _pass varchar(256) NOT NULL,
  _digest varchar(256) NOT NULL,
  UNIQUE(_name));

-- the password is 'admin' hashed with:
-- Algorythm: Bcrypt (cost 11)
-- Salt: 'ITSM-webAuth-task-laboratory3'
INSERT INTO USERS (_name, _mail, _pass, _digest)
	VALUES ("admin", "it_admin@vgtu.lt", "$2y$11$SVRTTS13ZWJBdXRoLXRhcuenHHfW8wIDmFMYcmhbR0scNln254KfW", MD5('admin:itsm_domain:admin'));
