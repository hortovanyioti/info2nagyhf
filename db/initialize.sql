DROP DATABASE IF EXISTS tanks;

CREATE DATABASE tanks
	DEFAULT CHARACTER SET UTF8
	DEFAULT COLLATE UTF8_GENERAL_CI;
    
USE tanks;

CREATE TABLE user(
	id INT PRIMARY KEY AUTO_INCREMENT,
	name NVARCHAR(40) NOT NULL UNIQUE,
    pw NVARCHAR(255) NOT NULL,
	uitheme NVARCHAR(40)
);

INSERT INTO user (name,pw,uitheme) VALUES ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918','purple');
INSERT INTO user (name,pw,uitheme) VALUES ('Germany', '80db4ccdca106d37b920206331fcfe3e9e50a9e763d89b54ce3ad5ac8cf30f03','dark');

CREATE TABLE class(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(40) NOT NULL
);

INSERT INTO class (name) VALUES ('Light');
INSERT INTO class (name) VALUES ('Medium');
INSERT INTO class (name) VALUES ('Heavy');
INSERT INTO class (name) VALUES ('Superheavy');
INSERT INTO class (name) VALUES ('Destroyer');
INSERT INTO class (name) VALUES ('SPG');

CREATE TABLE tank(
	id INT PRIMARY KEY AUTO_INCREMENT,
	ownerid INT NOT NULL,
    name NVARCHAR(40) NOT NULL,
	classid INT,
	manufacture INT,

    FOREIGN KEY (ownerid) REFERENCES user(id),
	FOREIGN KEY (classid) REFERENCES class(id)
);

INSERT INTO tank (ownerid,classid,name) VALUES (1,1,'t34');
INSERT INTO tank (ownerid,classid,name) VALUES (1,3,'tiger');
INSERT INTO tank (ownerid,classid,name) VALUES (1,5,'jgpz');

CREATE TABLE quali( /*quali = qualification, munkakör*/
	id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(40) NOT NULL
);

INSERT INTO quali (name) VALUES ('Commander');
INSERT INTO quali (name) VALUES ('Gunner');
INSERT INTO quali (name) VALUES ('Loader');
INSERT INTO quali (name) VALUES ('Driver');
INSERT INTO quali (name) VALUES ('Radio Operator');
INSERT INTO quali (name) VALUES ('Cleaner');

CREATE TABLE soldier(
	id INT PRIMARY KEY AUTO_INCREMENT,
    name NVARCHAR(40) NOT NULL,
	byear YEAR 
);

INSERT INTO soldier (name,byear) VALUES ('János',1995);
INSERT INTO soldier (name,byear) VALUES ('Vladimir',1985);
INSERT INTO soldier (name,byear) VALUES ('Pityu',2000);

CREATE TABLE tankcrew(
	soldierid INT NOT NULL,
	tankid INT NOT NULL,
    qualiid INT NOT NULL,
	startdate DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tankcrew (soldierid,tankid,qualiid) VALUES (1,1,1);
INSERT INTO tankcrew (soldierid,tankid,qualiid) VALUES (1,1,1);
INSERT INTO tankcrew (soldierid,tankid,qualiid) VALUES (2,1,1);
INSERT INTO tankcrew (soldierid,tankid,qualiid) VALUES (3,1,1);
INSERT INTO tankcrew (soldierid,tankid,qualiid) VALUES (1,2,1);