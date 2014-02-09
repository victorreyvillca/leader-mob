CREATE  TABLE IF NOT EXISTS `tblRole` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`created` 	DATETIME 		NOT NULL,
	`changed` 	DATETIME 		DEFAULT NULL,
	`createdBy` 	INT(11) 		DEFAULT NULL,
	`changedBy` 	INT(11) 		DEFAULT NULL,
	`state` 		TINYINT(1) 		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblRole`
		PRIMARY KEY (`id`),

	KEY `i_tblRole_id` (`id`),
	INDEX `i_tblRole_state_id` (`state`, `id`))
ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblResource` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`title`			VARCHAR(50)		NOT NULL,
	`description`	TEXT			NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblResource`
		PRIMARY KEY (`id`),

	KEY `i_tblResource_id` (`id`),
	INDEX `i_tblResource_state_id` (`state`, `id`))
ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblRole_Resource` (
	`roleId` 		INT NOT NULL,
	`resourceId`	INT NOT NULL,
	PRIMARY KEY (`roleId`, `resourceId`),
	INDEX `fk_tblRole_Resource_roleId` (`roleId`),
	INDEX `fk_tblRole_Resource_resourceId` (`resourceId`),
	CONSTRAINT `fk_tblRole_Resource_roleId`
	FOREIGN KEY (`roleId` )
	REFERENCES `tblRole` (`id` )
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblRole_Resource_resourceId`
	FOREIGN KEY (`resourceId` )
	REFERENCES `tblResource` (`id` )
	ON DELETE NO ACTION
	ON UPDATE CASCADE
	)
ENGINE = InnoDB;