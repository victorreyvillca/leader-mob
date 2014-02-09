
CREATE TABLE IF NOT EXISTS `tblDataVault` (
	`id`		INT(11) NOT NULL AUTO_INCREMENT,
	`expires`	DATETIME DEFAULT NULL,
	`filename`	VARCHAR(150) NOT NULL,
	`mimeType`	VARCHAR(45) DEFAULT NULL,
	`binary`	LONGBLOB,
	`created`	TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`state`		TINYINT(1) NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblDataVault` PRIMARY KEY (`id`),
	KEY `i_tblDataVault_id` (`id`),
	INDEX `i_tblDataVault_state_id` (`state`,`id`)
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS `tblPerson` (
	`id` 				INT(11) 	NOT NULL AUTO_INCREMENT,
	`identityCard`		INT(11) 	NOT NULL,
	`firstName`			VARCHAR(45) NOT NULL,
	`lastName`			VARCHAR(45) NOT NULL,
	`dateOfBirth`		DATETIME 	DEFAULT NULL,
	`phone`				VARCHAR(45) DEFAULT NULL,
	`phonework`			VARCHAR(45) DEFAULT NULL,
	`phonemobil`		INT(11) 	DEFAULT NULL,
	`sex`				TINYINT(4)	NOT NULL,
	`type` 				VARCHAR(15) NOT NULL,
	`created` 			DATETIME NOT NULL,
	`changed` 			DATETIME DEFAULT NULL,
	`createdBy`			INT(11) DEFAULT NULL,
	`changedBy`			INT(11) DEFAULT NULL,
	`state`				TINYINT(1) NOT NULL DEFAULT '1',
	`profilePictureId`	INT(11) DEFAULT NULL,

	CONSTRAINT `pk_tblPerson`
	PRIMARY KEY (`id`) ,

	KEY `i_tblPerson_id` (`id`) ,
	INDEX `i_tblPerson_state_id` (`state`, `id`),
	INDEX `i_tblPerson_profilePictureId` (`profilePictureId`),

	CONSTRAINT `fk_tblPerson_profilePictureId`
		FOREIGN KEY (`profilePictureId`)
		REFERENCES `tblDatavault` (`id`)
		ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE IF NOT EXISTS `tblAccount` (
	`id`			INT(11) 		NOT NULL AUTO_INCREMENT,
	`username`		VARCHAR(45) 	NOT NULL,
	`password`		VARCHAR(128)	NOT NULL,
	`email`			VARCHAR(65)		DEFAULT NULL,
	`role`			VARCHAR(45)		DEFAULT NULL,
	`accountType`	INT(11) 		DEFAULT NULL,
	`created` 		DATETIME 		NOT NULL,
	`changed` 		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11) 		DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1) 		NOT NULL DEFAULT '1',
	
	CONSTRAINT `pk_tblAccount` PRIMARY KEY (`id`),
	KEY `i_tblAccount_id` (`id`),
	INDEX `i_tblAccount_state_id` (`state`,`id`)
) ENGINE=INNODB;

CREATE  TABLE IF NOT EXISTS `tblAdministrator` (
	`id` 			INT(11) 	NOT NULL AUTO_INCREMENT,
	`visible`		TINYINT(1)	NOT NULL DEFAULT '0',
	`accountId` 	INT(11)		DEFAULT NULL,
	`roleId`		INT(11)		DEFAULT NULL,

	CONSTRAINT `pk_tblAdministrator`
		PRIMARY KEY (`id`),

	KEY `i_tblAdministrator_id` (`id`),
	INDEX `i_tblAdministrator_accountId` (`accountId`),
	INDEX `i_tblAdministrator_roleId` (`roleId`),

	CONSTRAINT `fk_tblAdministrator_accountId`
	FOREIGN KEY (`accountId`)
	REFERENCES `tblAccount` (`id`)
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblAdministrator_roleId`
	FOREIGN KEY (`roleId`)
	REFERENCES `tblRole` (`id`)
	ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE TABLE IF NOT EXISTS `tblMission` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`abreviation`	VARCHAR(10) 	NOT NULL,
	`description`	TEXT			NULL,
	`created`		DATETIME 		NOT NULL,
	`changed`		DATETIME 		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblMission`
		PRIMARY KEY (`id`),

	KEY `i_tblMission_id` (`id`),
	INDEX `i_tblMission_state_id` (`state`, `id`)
) ENGINE = INNODB;


CREATE  TABLE IF NOT EXISTS `tblRegion` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`abreviation`	VARCHAR(10) 	NULL,
	`description`	TEXT			NULL,
	`missionId`	INT(11)				DEFAULT NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblRegion`
		PRIMARY KEY (`id`),

	KEY `i_tblRegion_id` (`id`),
	INDEX `i_tblRegion_state_id` (`state`, `id`),
	INDEX `i_tblRegion_missionId` (`missionId`),

	CONSTRAINT `fk_tblRegion_missionId`
	FOREIGN KEY (`missionId`)
	REFERENCES `tblMission` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblDistrict` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`regionId`		INT(11)				DEFAULT NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblDistrict`
		PRIMARY KEY (`id`),

	KEY `i_tblDistrict_id` (`id`),
	INDEX `i_tblDistrict_state_id` (`state`, `id`),
	INDEX `i_tblDistrict_regionId` (`regionId`),

	CONSTRAINT `fk_tblDistrict_regionId`
	FOREIGN KEY (`regionId`)
	REFERENCES `tblRegion` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblChurch` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`districtId`	INT(11)				DEFAULT NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblChurch`
		PRIMARY KEY (`id`),

	KEY `i_tblChurch_id` (`id`),
	INDEX `i_tblChurch_state_id` (`state`, `id`),
	INDEX `i_tblChurch_districtId` (`districtId`),

	CONSTRAINT `fk_tblChurch_districtId`
	FOREIGN KEY (`districtId`)
	REFERENCES `tblDistrict` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
) ENGINE = INNODB;


CREATE  TABLE IF NOT EXISTS `tblDepartment` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblDepartment`
		PRIMARY KEY (`id`),

	KEY `i_tblDepartment_id` (`id`),
	INDEX `i_tblDepartment_state_id` (`state`, `id`)
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblPosition` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblPosition`
		PRIMARY KEY (`id`),

	KEY `i_tblPosition_id` (`id`),
	INDEX `i_tblPosition_state_id` (`state`, `id`)
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblRank` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblRank`
		PRIMARY KEY (`id`),

	KEY `i_tblRank_id` (`id`),
	INDEX `i_tblRank_state_id` (`state`, `id`)
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblClub` (
	`id`			INT				NOT NULL AUTO_INCREMENT,
	`name`			VARCHAR(50) 	NOT NULL,
	`description`	TEXT			NULL,
	`churchId`		INT(11)			DEFAULT NULL,
	`departmentId`	INT(11)			DEFAULT NULL,
	`created`		DATETIME		NOT NULL,
	`changed`		DATETIME		DEFAULT NULL,
	`createdBy`		INT(11)			DEFAULT NULL,
	`changedBy`		INT(11)			DEFAULT NULL,
	`state`			TINYINT(1)		NOT NULL DEFAULT '1',
	CONSTRAINT `pk_tblClub`
		PRIMARY KEY (`id`),

	KEY `i_tblClub_id` (`id`),
	INDEX `i_tblClub_state_id` (`state`, `id`),
	INDEX `i_tblClub_churchId` (`churchId`),
	INDEX `i_tblClub_departmentId` (`departmentId`),

	CONSTRAINT `fk_tblClub_churchId`
	FOREIGN KEY (`churchId`)
	REFERENCES `tblChurch` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblClub_departmentId`
	FOREIGN KEY (`departmentId`)
	REFERENCES `tblDepartment` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblDirective` (
	`id` 				INT(11) 		NOT NULL AUTO_INCREMENT,
	`dateChristening`	DATETIME		DEFAULT NULL,
	`address`			TEXT 			NULL,
	`note`				TEXT 			NULL,
	`email`				VARCHAR(65)		DEFAULT NULL,
	`yearService`		INT				DEFAULT NULL,
	`isActivo`			BOOL 			NOT NULL,

	`positions`			VARCHAR(125) 	NULL,
	`positionId` 		INT(11)			DEFAULT NULL,
	`ranks`				VARCHAR(125) 	NULL,
	`rankId`			INT(11)			DEFAULT NULL,
	`departments`		VARCHAR(125) 	NULL,
	`departmentId`		INT(11)			DEFAULT NULL,
	`clubs`				VARCHAR(125) 	NULL,
	`clubId`			INT(11)			DEFAULT NULL,
	`churchs`			VARCHAR(125) 	NULL,
	`churchId`			INT(11)			DEFAULT NULL,
	`districts`			VARCHAR(125) 	NULL,
	`districtId`		INT(11)			DEFAULT NULL,
	`regions`			VARCHAR(125) 	NULL,
	`regionId`			INT(11)			DEFAULT NULL,
	`missions`			VARCHAR(125) 	NULL,

	CONSTRAINT `pk_tblDirectivo`
		PRIMARY KEY (`id`),

	KEY `i_tblDirectivo_id` (`id`),
	INDEX `i_tblDirectivo_positionId` (`positionId`),
	INDEX `i_tblDirectivo_rankId` (`rankId`),
	INDEX `i_tblDirectivo_departmentId` (`departmentId`),
	INDEX `i_tblDirectivo_clubId` (`clubId`),
	INDEX `i_tblDirectivo_churchId` (`churchId`),
	INDEX `i_tblDirectivo_districtId` (`districtId`),
	INDEX `i_tblDirectivo_regionId` (`regionId`),

	CONSTRAINT `fk_tblDirectivo_positionId`
	FOREIGN KEY (`positionId`)
	REFERENCES `tblPosition` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirectivo_rankId`
	FOREIGN KEY (`rankId`)
	REFERENCES `tblRank` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirectivo_departmentId`
	FOREIGN KEY (`departmentId`)
	REFERENCES `tblDepartment` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirectivo_clubId`
	FOREIGN KEY (`clubId`)
	REFERENCES `tblClub` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirectivo_churchId`
	FOREIGN KEY (`churchId`)
	REFERENCES `tblChurch` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirectivo_districtId`
	FOREIGN KEY (`districtId`)
	REFERENCES `tblDistrict` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirectivo_regionId`
	FOREIGN KEY (`regionId`)
	REFERENCES `tblRegion` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
) ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblDirective_Rank` (
	`directiveId` 		INT NOT NULL,
	`rankId`	INT NOT NULL,
	PRIMARY KEY (`directiveId`, `rankId`),
	INDEX `fk_tblDirective_Rank_directiveId` (`directiveId`),
	INDEX `fk_tblDirective_Rank_rankId` (`rankId`),
	CONSTRAINT `fk_tblDirective_Rank_directiveId`
	FOREIGN KEY (`directiveId` )
	REFERENCES `tblDirective` (`id` )
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblDirective_Rank_rankId`
	FOREIGN KEY (`rankId` )
	REFERENCES `tblRank` (`id` )
	ON DELETE NO ACTION
	ON UPDATE CASCADE
	)
ENGINE = InnoDB;