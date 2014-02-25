CREATE TABLE IF NOT EXISTS `tblCategory` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`created`		DATETIME 		NOT NULL,
	`changed`		DATETIME 		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblCategory`
		PRIMARY KEY (`id`),

	KEY `i_tblCategory_id` (`id`),
	INDEX `i_tblCategory_state_id` (`state`, `id`)
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblNews` (
	`id`				INT				NOT NULL AUTO_INCREMENT,
	`title`				VARCHAR(255) 	NOT NULL,
	`summary`			TEXT 			NOT NULL,
	`contain`			TEXT,
	`fount`				VARCHAR(255)	NOT NULL,
	`imagename` 		VARCHAR(45)		DEFAULT NULL,
	`newsdate`			DATETIME			NOT NULL,
	`categoryId`		INT(11)			DEFAULT NULL,
	`administratorId`	INT(11)			NOT NULL,
	`created`			DATETIME		NOT NULL,
	`changed`			DATETIME		DEFAULT NULL,
	`createdBy`			INT(11)			DEFAULT NULL,
	`changedBy`			INT(11)			DEFAULT NULL,
	`state`				TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblNews`
		PRIMARY KEY (`id`),

	KEY `i_tblNews_id` (`id`),
	INDEX `i_tblNews_state_id` (`state`, `id`),
	INDEX `i_tblNews_categoryId` (`categoryId`),
	INDEX `i_tblNews_administratorId` (`administratorId`),

	CONSTRAINT `fk_tblNews_categoryId`
	FOREIGN KEY (`categoryId`)
	REFERENCES `tblCategory` (`id`)
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblNews_administratorId`
	FOREIGN KEY (`administratorId`)
	REFERENCES `tblAdministrator` (`id`)
	ON UPDATE CASCADE
) ENGINE = INNODB;