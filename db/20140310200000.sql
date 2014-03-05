INSERT INTO `tblMission` ( `name`, `abreviation`, `description`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
( 'Mision Boliviana Occidental', 'MBO', 'Zona Occidental de Bolivia', NOW(), NULL, 1, NULL, 1),
( 'Mision Bolivia Central', 'MBC', 'Zona Central de Bolivia', NOW(), NULL, 1, NULL, 1),
( 'Mision del Oriente Boliviano', 'MOB', 'Zona Oriental de Bolivia', NOW(), NULL, 1, NULL, 1);

INSERT INTO `tblRegion` ( `name`, `abreviation`, `description`, `missionId`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
( 'Region - A', 'A', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - B', 'B', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - C', 'C', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - D', 'D', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - E', 'E', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - F', 'F', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - G', 'G', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - H', 'H', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - I', 'I', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - J', 'J', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Region - K', 'K', '', 3, NOW(), NULL, 1, NULL, 1);

INSERT INTO `tblDistrict` ( `name`, `description`, `regionId`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
( 'S.C. Central', '', 1, NOW(), NULL, 1, NULL, 1),
( 'S.C. Hamacas', '', 1, NOW(), NULL, 1, NULL, 1),
( 'S.C. Barrio Lindo', '', 1, NOW(), NULL, 1, NULL, 1),

( 'S.C. Villa 1 de Mayo', '', 2, NOW(), NULL, 1, NULL, 1),
( 'S.C. Plan 3000', '', 2, NOW(), NULL, 1, NULL, 1),
( 'S.C. Arroyito', '', 2, NOW(), NULL, 1, NULL, 1),
( 'S.C. Paurito', '', 2, NOW(), NULL, 1, NULL, 1),

( 'S.C. La Colorada', '', 3, NOW(), NULL, 1, NULL, 1),
( 'S.C. Nuevo Palmar', '', 3, NOW(), NULL, 1, NULL, 1),
( 'S.C. Sur', '', 3, NOW(), NULL, 1, NULL, 1),

( 'S.C. Pari', '', 4, NOW(), NULL, 1, NULL, 1),
( 'S.C. Suroeste', '', 4, NOW(), NULL, 1, NULL, 1),
( 'S.C. Pirai', '', 4, NOW(), NULL, 1, NULL, 1),
( 'S.C. Samaipata', '', 4, NOW(), NULL, 1, NULL, 1),

( 'S.C. Norte', '', 5, NOW(), NULL, 1, NULL, 1),
( 'S.C. Noreste', '', 5, NOW(), NULL, 1, NULL, 1),
( 'S.C. Soberania', '', 5, NOW(), NULL, 1, NULL, 1),

( 'Montero Central', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Montero Norte', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Warnes', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Yapacani', '', 6, NOW(), NULL, 1, NULL, 1),

( 'Chiquitania - A', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Chiquitania - B', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Puerto Suarez', '', 7, NOW(), NULL, 1, NULL, 1),

( 'Yacuiba - A', '', 8, NOW(), NULL, 1, NULL, 1),
( 'Yacuiba - B', '', 8, NOW(), NULL, 1, NULL, 1),
( 'Villamontes', '', 8, NOW(), NULL, 1, NULL, 1),

( 'Tarija Central', '', 9, NOW(), NULL, 1, NULL, 1),
( 'Tarija Loma Linda', '', 9, NOW(), NULL, 1, NULL, 1),
( 'Bermejo', '', 9, NOW(), NULL, 1, NULL, 1),

( 'Trinidad Central', '', 10, NOW(), NULL, 1, NULL, 1),
( 'Trinidad Sureste', '', 10, NOW(), NULL, 1, NULL, 1),
( 'Trinidad Suroeste', '', 10, NOW(), NULL, 1, NULL, 1),
( 'Mamore', '', 10, NOW(), NULL, 1, NULL, 1),

( 'Riberalta', '', 11, NOW(), NULL, 1, NULL, 1),
( 'Guayaramerin', '', 11, NOW(), NULL, 1, NULL, 1);


INSERT INTO `tblChurch` ( `name`, `description`, `districtId`, `created`, `changed`, `createdBy`, `changedBy`, `state`) VALUES
-- Central
( 'Central A', '', 1, NOW(), NULL, 1, NULL, 1),
( 'Central B', '', 1, NOW(), NULL, 1, NULL, 1),
( 'Guardia Nueva', '', 1, NOW(), NULL, 1, NULL, 1),
( 'Maranatha - Guardia Nueva', '', 1, NOW(), NULL, 1, NULL, 1),
( 'Mensajeros de Dios', '', 1, NOW(), NULL, 1, NULL, 1),
-- Hamacas
( 'Hamacas', '', 2, NOW(), NULL, 1, NULL, 1),
( 'San Juan', '', 2, NOW(), NULL, 1, NULL, 1),
( 'Barrio Oriental', '', 2, NOW(), NULL, 1, NULL, 1),
-- Barrio Lindo
( 'Barrio Lindo', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Barrio Militar', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Heroes del Chaco', '', 3, NOW(), NULL, 1, NULL, 1),
( 'Oriente', '', 3, NOW(), NULL, 1, NULL, 1),
-- Villa 1 de Mayo
( '15 de Abril', '', 4, NOW(), NULL, 1, NULL, 1),
( '30 de Enero', '', 4, NOW(), NULL, 1, NULL, 1),
( 'Villa 1ro de Mayo', '', 4, NOW(), NULL, 1, NULL, 1),
( 'Villa Alegre', '', 4, NOW(), NULL, 1, NULL, 1),
( 'Villa Cochabamba', '', 4, NOW(), NULL, 1, NULL, 1),
( 'Union Campeche', '', 4, NOW(), NULL, 1, NULL, 1),
( '4 de Febrero', '', 4, NOW(), NULL, 1, NULL, 1),
-- Plan 3000
( 'Plan 3000', '', 5, NOW(), NULL, 1, NULL, 1),
( '2 de Abril', '', 5, NOW(), NULL, 1, NULL, 1),
-- Arroyito
( 'Primavera', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Barrio Nuevo', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Emanuel - A', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Gedeon', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Internacional', '', 6, NOW(), NULL, 1, NULL, 1),
( 'Pepe Lucho', '', 6, NOW(), NULL, 1, NULL, 1),
( '7 de Julio', '', 6, NOW(), NULL, 1, NULL, 1),
-- Paurito
( 'El Quior', '', 7, NOW(), NULL, 1, NULL, 1),
( 'El Recreo', '', 7, NOW(), NULL, 1, NULL, 1),
( 'La Esperanza es Jesus', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Maranatha Paurito', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Nazaret', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Nuevo Mundo', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Paurito', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Pueblo Nuevo', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Santa Carla', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Villa Paraiso', '', 7, NOW(), NULL, 1, NULL, 1),
( 'La Campinia', '', 7, NOW(), NULL, 1, NULL, 1),
-- La Colorada
( 'Islas del Palmar', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Nuevo Oriente', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Nuevo Palmar', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Palmira Plan 4000', '', 7, NOW(), NULL, 1, NULL, 1),
( 'Roca Eterna', '', 7, NOW(), NULL, 1, NULL, 1)
;