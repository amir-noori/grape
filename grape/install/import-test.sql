

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

CREATE TABLE `Category`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(500) NOT NULL,
	created TIMESTAMP,
	pageCount INT NOT NULL,
	tagsID INT,
	FOREIGN KEY (tagsID) REFERENCES `Tags`(`id`)
);


CREATE TABLE `Page`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(500) NOT NULL,
	summary VARCHAR(3000),
	userID INT NOT NULL,
	categoryID INT NOT NULL,
	created TIMESTAMP,
	articleCount INT,
	tagsID INT,
	FOREIGN KEY (tagsID) REFERENCES `Tags`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`),
	FOREIGN KEY (categoryID) REFERENCES `Category`(`id`)
);


CREATE TABLE `Article`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(500) NOT NULL,
	summary VARCHAR(3000),
	articleContent TEXT,
	created TIMESTAMP,
	commentCount INT,
	pageID INT NOT NULL,
	userID INT NOT NULL,
	tagsID INT,
	FOREIGN KEY (tagsID) REFERENCES `Tags`(`id`),
	FOREIGN KEY (pageID) REFERENCES `Page`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);


CREATE TABLE `Comment`
(
	id INT AUTO_INCREMENT PRIMARY KEY,
	commentContent TEXT,
	created TIMESTAMP,
	articleID INT NOT NULL,
	pageID INT NOT NULL,
	userID INT NOT NULL,
	FOREIGN KEY (articleID) REFERENCES `Article`(`id`),
	FOREIGN KEY (pageID) REFERENCES `Page`(`id`),
	FOREIGN KEY (userID) REFERENCES `User`(`id`)
);



#insert data:

INSERT INTO `Permissions` (id , superAdmin) VALUES
(
	1,
	1
);

