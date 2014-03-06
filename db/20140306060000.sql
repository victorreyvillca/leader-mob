CREATE  TABLE IF NOT EXISTS `tblPicture` (
  `id` 					INT				NOT NULL AUTO_INCREMENT,
  `title` 				VARCHAR(50) 	NOT NULL,
  `description`			TEXT			NULL,
  `filename` 			VARCHAR(150)	NOT NULL,
  `mimeType` 			VARCHAR(45) 	NOT NULL,
  `src`		 			VARCHAR(150)	NOT NULL,
  `type` 				VARCHAR(15) 	NOT NULL,
  `created` 			DATETIME 		NOT NULL,
  `changed` 			DATETIME 		DEFAULT NULL,
  `createdBy` 			INT(11) 		DEFAULT NULL,
  `changedBy` 			INT(11) 		DEFAULT NULL,
  `state` 				TINYINT(1) 		NOT NULL DEFAULT '1',
  CONSTRAINT `pk_tblPicture`
	PRIMARY KEY (`id`) ,

	KEY `i_tblPicture_id` (`id`),
	INDEX `i_tblPicture_state_id` (`state`, `id`)
)ENGINE = INNODB;

CREATE  TABLE IF NOT EXISTS `tblPictureNews` (
  `id`		INT		NOT NULL AUTO_INCREMENT,
  `newsId`	INT		NOT NULL,
  CONSTRAINT `pk_tblPictureNews`
	PRIMARY KEY (`id`) ,

	KEY `i_tblPictureNews_id` (`id`),
	INDEX `i_tblPictureNews_newsId` (`newsId`),

	CONSTRAINT `fk_tblPictureNews_newsId`
		FOREIGN KEY (`newsId`)
		REFERENCES `tblNews` (`id`)
		ON UPDATE CASCADE)
ENGINE = INNODB;