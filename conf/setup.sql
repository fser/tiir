CREATE USER minou;
CREATE DATABASE forthelulz;
GRANT SELECT, INSERT, UPDATE, DELETE, CREATE, DROP, INDEX, ALTER ON forthelulz.* to 'minou'@'localhost' IDENTIFIED BY 'ed2d22dc15ba43883e3a60979f3dc383d8a0c26a';


use forthelulz;

-- generated by dbdsgnr.appspot.com

CREATE TABLE `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(50),
  `mail` VARCHAR(250),
  `pass` VARCHAR(50),
		`name` VARCHAR(200),
		`status` TINYINT(2),
  PRIMARY KEY  (`id`,`login`)
);


CREATE TABLE `subjects` (
		`id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50),
  `prof` INT NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `marks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_subject` INT NOT NULL,
  `id_student` INT NOT NULL,
  `mark` INT NOT NULL,
  `comment` TEXT,
		PRIMARY KEY (`id`)
);

CREATE TABLE `news` (
  `id` INT NOT NULL AUTO_INCREMENT,
		`id_user` INT NOT NULL,
  `visibility` TINYINT(2),
		`title` VARCHAR(250),
		`content` TEXT,
		PRIMARY KEY (`id`)
);

CREATE TABLE `comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `id_news` INT NOT NULL,
  `id_user` INT NOT NULL,
  `comment` TEXT,
		PRIMARY KEY (`id`)
);


-- Data
INSERT INTO `users` VALUES
	(10,'grimaud','gilles.grimaud@lifl.fr','3cda14e2677952438043b73a67696b5d','Gilles Grimaud',3),
	(11,'seinturier','lionel.seinturier@lifl.fr','c10be958781a5b9662f3b8ac4625e314','Lionel Seinturier',3),
	(12,'derbel','bilel.derbel@lifl.fr','c7d991fcd29f268067bd0d3526f4eab0','Bilel Derbel',3),
	(13,'vanhu','vanhu@freebsd.org','222e5424bbffd14b37d678a3cf8f91de','Yvan Vahullebus',3),
	(14,'vantroys','thomas.vantroys@lifl.fr','cc12fa040adac1964c5fc88c5b298f5a','Thomas Vantroys',3);

INSERT INTO `subjects` VALUES 
	(2,'IIR',10),
	(3,'IFI',11),
	(4,'USD',12),
	(5,'SRS (reseau)',13),
	(6,'wifi',14);

