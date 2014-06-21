
DROP DATABASE IF EXISTS angoor;

CREATE DATABASE angoor;

USE angoor;

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
	isAdmin BOOL,
	imagePath VARCHAR(3000),
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
	userName VARCHAR(30) NOT NULL,
	created TIMESTAMP,
	articleID INT NOT NULL,
	userID INT,
	isGuest BOOL,
	FOREIGN KEY (articleID) REFERENCES `Article`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);

CREATE TABLE `Module`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	moduleName VARCHAR(50) UNIQUE NOT NULL,
	moduleSummary TEXT
);

CREATE TABLE `Site_Module`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	isEnabled BOOL,
	siteID INT NOT NULL,
	moduleID INT NOT NULL,
	FOREIGN KEY (siteID) REFERENCES `Site`(`id`),
	FOREIGN KEY (moduleID) REFERENCES `Module`(`id`)
);

CREATE TABLE `Forum`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	topic VARCHAR(1000) NOT NULL,
	created TIMESTAMP
);

CREATE TABLE `Site_Forum`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	siteID INT NOT NULL,
	forumID INT NOT NULL,
	FOREIGN KEY (siteID) REFERENCES `Site`(`id`),
	FOREIGN KEY (forumID) REFERENCES `Forum`(`id`)
);

CREATE TABLE `ForumComment`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	commentContent TEXT,
	userName VARCHAR(30) NOT NULL,
	created TIMESTAMP,
	forumID INT NOT NULL,
	userID INT,
	isGuest BOOL,
	FOREIGN KEY (forumID) REFERENCES `Forum`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);

#insert data:

INSERT INTO `angoor`.`Permissions` (id , superAdmin) VALUES
(
	1,
	1
),
(
	2,
	0
);

INSERT INTO `angoor`.`User` (id , firstName , lastName , email , password , userName , permissionsID , created) VALUES
(
	1,
	'Amir',
	'Noori',
	'ee.amir.noori@gmail.com',
	'123',
	'amir_noori',
	1,
	now()
),
(
	2,
	'Amir2',
	'Noori2',
	'ee.amir.noori2@gmail.com',
	'123',
	'amir_noori2',
	1,
	now()
),
(
	3,
	'Amir3',
	'Noori3',
	'ee.amir.noori3@gmail.com',
	'123',
	'amir_noori3',
	1,
	now()
),
(
	4,
	'Amir4',
	'Noori4',
	'ee.amir.noori4@gmail.com',
	'123',
	'amir_noori4',
	1,
	now()
),
(
	5,
	'Amir5',
	'Noori5',
	'ee.amir.noori5@gmail.com',
	'123',
	'amir_noori5',
	1,
	now()
),
(
	6,
	'Amir6',
	'Noori6',
	'ee.amir.noori6@gmail.com',
	'123',
	'amir_noori6',
	1,
	now()
),
(
	7,
	'Amir7',
	'Noori7',
	'ee.amir.noori7@gmail.com',
	'123',
	'amir_noori7',
	1,
	now()
),
(
	8,
	'Amir8',
	'Noori8',
	'ee.amir.noori8@gmail.com',
	'123',
	'amir_noori8',
	1,
	now()
);

INSERT INTO `angoor`.`Theme` (id ,name , title , summary) VALUES
(
	1,
	'default',
	'defualt theme',
	'this is used as default theme'
),
(
	2,
	'pink',
	'its girly',
	'Just another theme.'
),
(
	3,
	'side',
	'Side Menu',
	'A theme with all menus on the left side.'
);

INSERT INTO `angoor`.`Site` (`id` , `url` , `title` , `summary` , `default` , `created` , `themeID` , `UserID`) VALUES
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


INSERT INTO `angoor`.`Category` (`id` , `title` , `created` , `pageCount`) VALUES
(
	1,
	'1-This is just a test title for testing purposes :)',
	now(),
	1
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
);

INSERT INTO `angoor`.`Site_Category`(siteID , CategoryID) VALUES
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

INSERT INTO `angoor`.`Page`(id , title , summary , userID , created , articleCount) VALUES
(
	1,
	'Just a simple page.',
	'......',
	1,
	now(),
	1
);

INSERT INTO `angoor`.`Category_Page`(id , CategoryID , pageID) VALUES
(
	1,
	1,
	1
);

INSERT INTO `angoor`.`Article`(id , title , summary , userID , created , articleContent , commentCount) VALUES
(
	1,
	'another articel',
	'just an article',
	1,
	now(),
	'............',
	3
);

INSERT INTO `angoor`.`Page_Article`(id , pageID , articleID) VALUES
(
	1,
	1,
	1
);


INSERT INTO `angoor`.`SiteUser`(id , firstName , lastName , email , password , userName , created , isAdmin , imagePath , permissionsID) VALUES
(
	1,
	"Amir",
	"Noori",
	"ee.amir.noori@gmail.com",
	'123',
	"amir_noori",
	now(),
	1,
	'amir.jpg',
	1
),
(
	2,
	"Amir",
	"Noori",
	"justmetal_1987@yahoo.com",
	'123',
	"dude",
	now(),
	0,
	'',
	2
);

INSERT INTO `angoor`.`Site_SiteUser`(id , siteID , siteUserID) VALUES
(
	1,
	1,
	1
),
(
	2,
	1,
	2
),
(
	3,
	2,
	1
);

INSERT INTO `angoor`.`Comment`(id , commentContent , userName , created , articleID , userID , isGuest) VALUES
(
	1,
	'Hey this is cool',
	'dude',
	now(),
	1,
	2,
	0
),
(
	2,
	'vowwwwww',
	'dude',
	now(),
	1,
	2,
	0
),
(
	3,
	'Hmmm... I like it',
	'amir_noori',
	now(),
	1,
	1,
	0
);

INSERT INTO `angoor`.`Module`(id , moduleName , moduleSummary) VALUES
(
	1,
	'forum',
	'make simple forum available for the site'
),
(
	2,
	'log',
	'event logging for actions on the site'
);

INSERT INTO `angoor`.`Site_Module`(id , isEnabled , siteID , moduleID) VALUES
(
	1,
	1,
	1,
	1
),
(
	2,
	1,
	1,
	2
);

INSERT INTO `angoor`.`Forum`(id , topic , created) VALUES
(
	1,
	'This is a cool forum',
	now()
),
(
	2,
	'Another Forum Topic',
	now()
);

INSERT INTO `angoor`.`Site_Forum`(id , siteID , forumID) VALUES
(
	1,
	1,
	1
),
(
	2,
	1,
	2
);;

INSERT INTO `angoor`.`ForumComment`(id , commentContent , userName , created , forumID , userID , isGuest) VALUES
(
	1,
	'Hey this is cool',
	'dude',
	now(),
	1,
	2,
	0
),
(
	2,
	'vowwwwww',
	'dude',
	now(),
	1,
	2,
	0
),
(
	3,
	'Hmmm... I like it',
	'amir_noori',
	now(),
	1,
	1,
	0
);




