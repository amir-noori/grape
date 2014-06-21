
DROP DATABASE IF EXISTS angoorz;

CREATE DATABASE angoorz;

USE angoorz;

CREATE TABLE Tags
(
	id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE `Permissions`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	superAdmin BOOL NOT NULL
);

CREATE TABLE `User`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(30) NOT NULL,
	lastName VARCHAR(30) NOT NULL,
	email VARCHAR(200) NOT NULL,
	password VARCHAR(30) NOT NULL,
	userName VARCHAR(30) NOT NULL,
	created TIMESTAMP,
	permissionsID INT NOT NULL,
	FOREIGN KEY (permissionsID) REFERENCES `Permissions`(`id`)	
);

CREATE TABLE `Theme`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100) UNIQUE NOT NULL,
	title VARCHAR(200),
	summary VARCHAR(3000)
);

CREATE TABLE `Site`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	`url` VARCHAR(300) UNIQUE NOT NULL,
	`title` VARCHAR(200),
	`summary` VARCHAR(3000),
	`created` TIMESTAMP,
	`default` BOOL NOT NULL,
	`themeID` INT NOT NULL,
	`userID` INT NOT NULL,
	FOREIGN KEY (`themeID`) REFERENCES `Theme`(`id`),
	FOREIGN KEY (`userID`) REFERENCES `User`(`id`)
);

CREATE TABLE `SiteUser`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(30) NOT NULL,
	lastName VARCHAR(30) NOT NULL,
	email VARCHAR(200) NOT NULL,
	password VARCHAR(30) NOT NULL,
	userName VARCHAR(30) NOT NULL,
	created TIMESTAMP,
	permissionsID INT NOT NULL,
	FOREIGN KEY (permissionsID) REFERENCES `Permissions`(`id`)	
);

CREATE TABLE `Site_SiteUser`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	siteID INT NOT NULL,
	siteUserID INT NOT NULL,
	FOREIGN KEY (siteID) REFERENCES `Site`(`id`),
	FOREIGN KEY (siteUserID) REFERENCES `SiteUser`(`id`)	
);

CREATE TABLE `Category`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(500) NOT NULL,
	created TIMESTAMP,
	pageCount INT NOT NULL,
	tagsID INT,
	FOREIGN KEY (tagsID) REFERENCES `Tags`(`id`)
);

CREATE TABLE `Site_Category`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	siteID INT NOT NULL,
	categoryID INT NOT NULL,
	FOREIGN KEY (siteID) REFERENCES `Site`(`id`),
	FOREIGN KEY (categoryID) REFERENCES `Category`(`id`)
);

CREATE TABLE `Page`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(500) NOT NULL,
	summary VARCHAR(3000),
	userID INT NOT NULL,
	created TIMESTAMP,
	articleCount INT,
	tagsID INT,
	FOREIGN KEY (tagsID) REFERENCES `Tags`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);

CREATE TABLE `Category_Page`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	categoryID INT NOT NULL,
	pageID INT NOT NULL,
	FOREIGN KEY (categoryID) REFERENCES `Category`(`id`),
	FOREIGN KEY (pageID) REFERENCES `Page`(`id`)
);

CREATE TABLE `Article`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(500) NOT NULL,
	summary VARCHAR(3000),
	articleContent TEXT,
	created TIMESTAMP,
	commentCount INT,
	userID INT NOT NULL,
	tagsID INT,
	FOREIGN KEY (tagsID) REFERENCES `Tags`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);

CREATE TABLE `Page_Article`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	pageID INT NOT NULL,
	articleID INT NOT NULL,
	FOREIGN KEY (pageID) REFERENCES `Page`(`id`),
	FOREIGN KEY (articleID) REFERENCES `Article`(`id`)
);

CREATE TABLE `Comment`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	commentContent TEXT,
	created TIMESTAMP,
	articleID INT NOT NULL,
	userID INT NOT NULL,
	FOREIGN KEY (articleID) REFERENCES `Article`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);





#insert data:

INSERT INTO `angoorz`.`Permissions` (id , superAdmin) VALUES
(
	1,
	1
);

INSERT INTO `angoorz`.`User` (id , firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	1,
	'Amir',
	'Noori',
	'ee.amir.noori@gmail.com',
	'123',
	'amir_noori',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir2',
	'Noori2',
	'ee.amir.noori2@gmail.com',
	'123',
	'amir_noori2',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir3',
	'Noori3',
	'ee.amir.noori3@gmail.com',
	'123',
	'amir_noori3',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir4',
	'Noori4',
	'ee.amir.noori4@gmail.com',
	'123',
	'amir_noori4',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir5',
	'Noori5',
	'ee.amir.noori5@gmail.com',
	'123',
	'amir_noori5',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir6',
	'Noori6',
	'ee.amir.noori6@gmail.com',
	'123',
	'amir_noori6',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir7',
	'Noori7',
	'ee.amir.noori7@gmail.com',
	'123',
	'amir_noori7',
	1,
	now()
);
INSERT INTO `angoorz`.`User` (firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	'Amir8',
	'Noori8',
	'ee.amir.noori8@gmail.com',
	'123',
	'amir_noori8',
	1,
	now()
);

INSERT INTO `angoorz`.`Theme` (id ,name , title , summary) VALUES
(
	1,
	'default',
	'defualt theme',
	'this is used as default theme'
);

INSERT INTO `angoorz`.`Site` (`id` , `url` , `title` , `summary` , `default` , `created` , `themeID` , `UserID`) VALUES
(
	1,
	'myTestSite',
	'test site',
	'this is just a test site',
	1,
	now(),
	1,
	1
),
(
	2,
	'myTestSite2',
	'test site2',
	'this is just a test site2',
	0,
	now(),
	1,
	1
),
(
	3,
	'myTestSite3',
	'test site3',
	'this is just a test site3',
	0,
	now(),
	1,
	1
);


INSERT INTO `angoorz`.`Category` (`id` , `title` , `created` , `pageCount`) VALUES
(
	1,
	'1-This is just a test title for testing purposes :)',
	now(),
	0
),
(
	2,
	'2-This is just a test title for testing purposes :)',
	now(),
	0
),
(
	3,
	'3-This is just a test title for testing purposes :)',
	now(),
	0
),
(
	4,
	'4-This is just a test title for testing purposes :)',
	now(),
	0
),
(
	5,
	'5-This is just a test title for testing purposes :)',
	now(),
	0
),
(
	6,
	'6-This is just a test title for testing purposes :)',
	now(),
	0
);

INSERT INTO `angoorz`.`Site_Category`(siteID , CategoryID) VALUES
(
	1,
	1
),
(
	2,
	2
),
(
	3,
	1
),
(
	3,
	2
),
(
	3,
	3
);
