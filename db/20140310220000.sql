INSERT INTO `tblCategory` ( `name`, `description`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
	('Aventureros', '', NOW(), NULL, 1, NULL, 1),
	('Conquistadores', '', NOW(), NULL, 1, NULL, 1),
	('Universitarios', '', NOW(), NULL, 1, NULL, 1),
	('JA (Jovenes Adventistas)', '', NOW(), NULL, 1, NULL, 1),
	('Ministerio Joven', '', NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblRole` ( `name`, `description`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
	('Administrador', 'Encargado de Administrador todo el Sistema', NOW(), NULL, 1, NULL, 1),
	('Miembro', 'Encargado de utilizar algunas funcionalidades del sistema', NOW(), NULL, 1, NULL, 1),
	('Invitado', 'No realiza ninguna funcionalidad en el Sistema', NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblperson`(`identityCard`,`firstName`,`lastName`,`dateOfBirth`,`phone`,`phonework`,`phonemobil`,`sex`,`type`,`created`,`changed`,`createdBy`,`changedBy`,`state`,`profilePictureId`) VALUES
	(5938782,'Victor','Villca',NOW(),'',NULL,70016783,1,'administrator',NOW(),NULL,NULL,NULL,1,NULL);
INSERT INTO `tblaccount`(`username`,`password`,`email`,`role`,`accountType`,`created`,`changed`,`createdBy`,`changedBy`,`state`) VALUES
	('admin','611c3ad3789e24980d2f5f37579aca55','victor.villca@gmail.com','Administrador',1,NOW(),NULL,NULL,NULL,1);
INSERT INTO `tbladministrator`(`visible`,`accountId`,`roleId`) VALUES
	(1,1,1);