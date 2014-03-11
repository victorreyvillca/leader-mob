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


INSERT INTO `tblPosition` ( `name`, `description`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
	('Director', 'Director del Club', NOW(), NULL, 1, NULL, 1),
	('Directora', 'Directora del Club', NOW(), NULL, 1, NULL, 1),
	('Director Asociado', 'Director Asociado del Club', NOW(), NULL, 1, NULL, 1),
	('Directora Asociada', 'Directora Asociada del Club', NOW(), NULL, 1, NULL, 1),
	('Secretario', 'Secretario del Club', NOW(), NULL, 1, NULL, 1),
	('Secretaria', 'Secretaria del Club', NOW(), NULL, 1, NULL, 1),
	('Tesorero', 'Tesorero del Club', NOW(), NULL, 1, NULL, 1),
	('Tesorera', 'Tesorero del Club', NOW(), NULL, 1, NULL, 1),
	('Capellan', 'Capellan del Club, un Anciano de Iglesia', NOW(), NULL, 1, NULL, 1),
	('Instructor', 'Instructor del Club', NOW(), NULL, 1, NULL, 1),
	('Instructora', 'Instructora del Club', NOW(), NULL, 1, NULL, 1),
	('Consejero', 'Consejero del Club', NOW(), NULL, 1, NULL, 1),
	('Consejera', 'Consejera del Club', NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblRank` ( `name`, `description`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
	('Aspirante a Guia Mayor', 'Aspirante a Guia Mayor', NOW(), NULL, 1, NULL, 1),
	('Guia Mayor', 'Guia Mayor', NOW(), NULL, 1, NULL, 1),
	('Guia Mayor Master', 'Guia Mayor Master', NOW(), NULL, 1, NULL, 1),
	('Guia Mayor Master Avanzado', 'Guia Mayor Master Avanzado', NOW(), NULL, 1, NULL, 1),
	('Lider JA', 'Lider JA', NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblDepartment` ( `name`, `description`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
	('Santa Cruz', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Cochabamba', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('La Paz', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Beni', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Pando', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Tarija', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Oruro', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Potosi', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Chuquisaca', 'Departamento de Bolivia', NOW(), NULL, 1, NULL, 1),
	('Otro', 'Otro Departamento o Pais', NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblClassConqueror` ( `name`, `description`, `classType`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
	('Clase Amigo', '', 1, NOW(), NULL, 1, NULL, 1),
	('Clase Amigo de la Naturaleza', '', 2, NOW(), NULL, 1, NULL, 1),
	('Clase Companiero', '', 1, NOW(), NULL, 1, NULL, 1),
	('Clase Companiero de Excursionista', '', 2, NOW(), NULL, 1, NULL, 1),
	('Clase Explorador', '', 1, NOW(), NULL, 1, NULL, 1),
	('Clase Explorador del Campo y del Bosque', '', 2, NOW(), NULL, 1, NULL, 1),
	('Clase Pionero', '', 1, NOW(), NULL, 1, NULL, 1),
	('Clase Pionero de Nuevas Fronteras', '', 2, NOW(), NULL, 1, NULL, 1),
	('Clase Excursionista', '', 1, NOW(), NULL, 1, NULL, 1),
	('Clase Excursionista en el Bosque', '', 2, NOW(), NULL, 1, NULL, 1),
	('Clase Guia', '', 1, NOW(), NULL, 1, NULL, 1),
	('Clase Guia de Exploracion', '', 2, NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblperson`(`identityCard`,`firstName`,`lastName`,`dateOfBirth`,`phone`,`phonework`,`phonemobil`,`sex`,`type`,`created`,`changed`,`createdBy`,`changedBy`,`state`,`profilePictureId`) VALUES
	(5938782,'Victor','Villca',NOW(),'',NULL,70016783,1,'administrator',NOW(),NULL,NULL,NULL,1,NULL);
INSERT INTO `tblaccount`(`username`,`password`,`email`,`role`,`accountType`,`created`,`changed`,`createdBy`,`changedBy`,`state`) VALUES
	('admin',md5('admin123456'),'victor.villca@gmail.com','Administrador',1,NOW(),NULL,NULL,NULL,1);
INSERT INTO `tbladministrator`(`visible`,`accountId`,`roleId`) VALUES
	(1,1,1);