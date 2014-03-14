-- #timestamp <20140314105800>

ALTER TABLE `tblClub` 
	ADD COLUMN `street`	VARCHAR(50) DEFAULT NULL AFTER description,
	ADD COLUMN `neighborhood`	VARCHAR(50) 	 NULL,
	ADD COLUMN `zone`			VARCHAR(50) 	 NULL,
	ADD COLUMN `email`			VARCHAR(65)		 NULL,
	ADD COLUMN `phone`	VARCHAR(45)	NULL,
	ADD COLUMN `phonemobil`	INT	NULL,

	ADD COLUMN `dateInaguration`	DATETIME	NULL,
	ADD COLUMN `countMember`		INT		NULL,
	ADD COLUMN `countUnityMen`		INT		NULL,
	ADD COLUMN `countUnityWomen`	INT		NULL,
	ADD COLUMN `countMemberDirective`	INT	NULL,

	ADD COLUMN `flags`	INT NULL,
	ADD COLUMN `mastils`	INT NULL,
	ADD COLUMN `handbooks`	INT NULL,
	ADD COLUMN `banners`	INT NULL,
	ADD COLUMN `tents`	INT NULL,
	ADD COLUMN `bookMembers`	INT NULL,
	ADD COLUMN `observation`	TEXT	NULL,
	ADD COLUMN `dateRegistre`	DATETIME	NULL,

	ADD COLUMN `pastorId`		INT(11)		DEFAULT NULL,
	ADD COLUMN `departmentId`	INT(11)		DEFAULT NULL,

	ADD INDEX `i_tblClub_pastorId` (`pastorId`),
	ADD CONSTRAINT `fk_tblClub_pastorId`
		FOREIGN KEY (`pastorId`)
		REFERENCES `tblPastor` (`id`)
		ON DELETE RESTRICT
		ON UPDATE CASCADE,

	ADD INDEX `i_tblClub_departmentId` (`departmentId`),
	ADD CONSTRAINT `fk_tblClub_departmentId`
		FOREIGN KEY (`departmentId`)
		REFERENCES `tblDepartment` (`id`)
		ON DELETE RESTRICT
		ON UPDATE CASCADE;