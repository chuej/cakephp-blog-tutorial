CREATE SCHEMA cake;

CREATE TABLE cake.posts (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(50),
	body TEXT,
	created DATETIME DEFAULT NULL,
	updated DATETIME DEFAULT NULL,
	filename VARCHAR(50),
	category SET('A','B','C','D','E','F')
);
