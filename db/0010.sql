CREATE  TABLE IF NOT EXISTS `tblPastor` (
	`id` 				INT(11) 		NOT NULL AUTO_INCREMENT,
	`dateChristening`	DATETIME		DEFAULT NULL,
	`address`			TEXT 			NULL,
	`note`				TEXT 			NULL,
	`email`				VARCHAR(65)		DEFAULT NULL,
	`yearService`		INT				DEFAULT NULL,
	`isActivo`			BOOL 			DEFAULT TRUE,

	`departmentId`		INT(11)			DEFAULT NULL,
	`districtId`		INT(11)			DEFAULT NULL,

	CONSTRAINT `pk_tblPastor`
		PRIMARY KEY (`id`),

	KEY `i_tblPastor_id` (`id`),
	INDEX `i_tblPastor_departmentId` (`departmentId`),
	INDEX `i_tblPastor_districtId` (`districtId`),

	CONSTRAINT `fk_tblPastor_departmentId`
	FOREIGN KEY (`departmentId`)
	REFERENCES `tblDepartment` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE,
	CONSTRAINT `fk_tblPastor_districtId`
	FOREIGN KEY (`districtId`)
	REFERENCES `tblDistrict` (`id`)
	ON DELETE NO ACTION
	ON UPDATE CASCADE
) ENGINE = INNODB;