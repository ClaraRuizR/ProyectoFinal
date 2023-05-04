DROP TABLE IF EXISTS `T_Reserva_Trabajador`;
DROP TABLE IF EXISTS `T_Reserva`;
DROP TABLE IF EXISTS `T_Prescripcion`;
DROP TABLE IF EXISTS `T_Fichero`;
DROP TABLE IF EXISTS `T_Consulta`;
DROP TABLE IF EXISTS `T_Trabajador`;
DROP TABLE IF EXISTS `T_Usuario`;
DROP TABLE IF EXISTS `T_Mascota`;
DROP TABLE IF EXISTS `T_Titular`;


/*TABLE CREATION*/

CREATE TABLE `T_Titular`(
	`ID` INTEGER,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `DNI` VARCHAR(9) DEFAULT NULL,
    `domicilio` VARCHAR(200) DEFAULT NULL,
    `codigo_postal` INTEGER DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    `fecha_alta` DATE DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Trabajador`(
	`ID` INTEGER,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `apellidos` VARCHAR(50) DEFAULT NULL,
    `trabajo` ENUM('Veterinario/a','ACV','Peluquero/a') DEFAULT NULL,
    `n_colegiado` VARCHAR(10) DEFAULT NULL,
    `fecha_alta` DATE DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    `id_usuario` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Usuario`(
	`ID` INTEGER,
    `nombre_usuario` VARCHAR(100) DEFAULT NULL,
    `perfil`ENUM('Veterinario/a','ACV','Peluquero/a','Administrador/a') DEFAULT NULL,
    `clave` VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Mascota`(
	`ID` INTEGER AUTO_INCREMENT,
    `pasaporte` VARCHAR(11) DEFAULT NULL,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `id_titular` INTEGER DEFAULT NULL,
    `especie` ENUM ('FEL','CAN', 'EQUI', 'OVI', 'CUNI', 'Otros') DEFAULT NULL,
    `raza` VARCHAR(50) DEFAULT NULL,
    `sexo`ENUM ('Macho', 'Hembra') DEFAULT NULL,
    `color` VARCHAR(50) DEFAULT NULL,
    `codigo_chip` VARCHAR(15) DEFAULT NULL,
    `fecha_nacimiento` DATE DEFAULT NULL,
	`operado` ENUM ('Sí', 'No', '?'),
    `fecha_alta` DATE DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Consulta`(
	`ID` INTEGER AUTO_INCREMENT,
    `id_mascota` INTEGER DEFAULT NULL,
    `id_veterinario`INTEGER DEFAULT NULL,
    `fecha` DATE DEFAULT NOW(),
    `motivo_consulta` VARCHAR(500) DEFAULT NULL,
    `peso` DECIMAL(5,2) DEFAULT NULL,
    `temperatura` DECIMAL(5,2) DEFAULT NULL,
    `exploracion_fisica` VARCHAR(500) DEFAULT NULL,
    `diagnostico` VARCHAR(100) DEFAULT NULL,
    `actuacion` VARCHAR(100) DEFAULT NULL,
    `procedimientos` VARCHAR(100) DEFAULT NULL,
    `anestesia` VARCHAR(100) DEFAULT NULL,
    `medicacion_inyectada` VARCHAR(100) DEFAULT NULL,
    `medicamentos_cedidos` VARCHAR(100) DEFAULT NULL,
    `dietas` VARCHAR(100) DEFAULT NULL,
    `tienda` VARCHAR(100) DEFAULT NULL,
    `otros` VARCHAR(100) DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Reserva`(
	`ID` INTEGER,
    `id_mascota` INTEGER DEFAULT NULL,
    `id_consulta` INTEGER DEFAULT NULL,
    `fecha` DATE DEFAULT NULL,
    `hora_inicio` TIME DEFAULT NULL, /*'hh:mm:ss'*/
    `hora_fin` TIME DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Reserva_Trabajador`(
	`ID` INTEGER,
    `id_reserva` INTEGER DEFAULT NULL,
    `id_trabajador` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Prescripcion`(
	`ID` INTEGER,
    `id_mascota` INTEGER DEFAULT NULL,
    `id_consulta` INTEGER DEFAULT NULL,
    `id_veterinario` INTEGER DEFAULT NULL,
    `diagnostico` VARCHAR(50) DEFAULT NULL, 
    `principio_activo` VARCHAR(50) DEFAULT NULL, 
    `dosis` VARCHAR(50) DEFAULT NULL,
    `via_administracion` VARCHAR(50) DEFAULT NULL,
    `cantidad` VARCHAR(50) DEFAULT NULL,
    `fecha_inicio` DATE DEFAULT NULL,
    `fecha_fin` DATE DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Fichero`(
	`ID` INTEGER,
    `id_consulta` INTEGER DEFAULT NULL,
    `id_mascota` INTEGER DEFAULT NULL,
    `fecha_hora_subida` DATETIME DEFAULT NULL,
    `fichero` LONGBLOB DEFAULT NULL,
    PRIMARY KEY (`ID`)
);


/*FOREIGN KEYS*/

ALTER TABLE T_Trabajador ADD FOREIGN KEY (id_usuario) REFERENCES T_Usuario (ID);

ALTER TABLE T_Mascota ADD FOREIGN KEY (id_titular) REFERENCES T_Titular (ID);

ALTER TABLE T_Consulta ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);

ALTER TABLE T_Consulta ADD FOREIGN KEY (id_veterinario) REFERENCES T_trabajador (ID);

ALTER TABLE T_Reserva ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);

ALTER TABLE T_Reserva ADD FOREIGN KEY (id_consulta) REFERENCES T_Consulta (ID);

ALTER TABLE T_Reserva_Trabajador ADD FOREIGN KEY (id_reserva) REFERENCES T_Reserva (ID);

ALTER TABLE T_Reserva_Trabajador ADD FOREIGN KEY (id_trabajador) REFERENCES T_Trabajador (ID);

ALTER TABLE T_Prescripcion ADD FOREIGN KEY (id_consulta) REFERENCES T_Consulta (ID);

ALTER TABLE T_Prescripcion ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);

ALTER TABLE T_Prescripcion ADD FOREIGN KEY (id_veterinario) REFERENCES T_Trabajador (ID);

ALTER TABLE T_Fichero ADD FOREIGN KEY (id_consulta) REFERENCES T_Consulta (ID);

ALTER TABLE T_Fichero ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);


/*INSERTS*/

INSERT INTO T_Titular VALUES 
(1, 'Clara Ruiz', '43465253V', 'Calle Falsa, 123', 07009, 666666666, '11-09-2019')
(2, 'Pau Valls', '43452023B', 'Calle Falsa, 123', 07009, 677777777, '11-09-2021'),
(3, 'Alicia Ruiz', '43625128M', 'Calle Cuenca, 2', 07009, 688888888, '11-09-2018');

INSERT INTO T_Mascota VALUES 
(1, 'ES052588521', 'Weepy', 2, 'FEL', 'Europeo', 'Macho', 'Blanco y atigrado naranja', '258632145885210', '01-02-2019', 'Sí', '11-09-2019')
(2, 'ES052588522', 'Emi', 1, 'FEL', 'Europeo', 'Macho', 'Blanco y atigrado marrón', '258632145885211', '01-02-2020', 'Sí', '11-09-2021'),
(3, 'ES052588523', 'Chacho', 3, 'CAN', 'Mezcla', 'Macho', 'Marrón', '258632145885212', '01-02-2018', 'Sí', '11-09-2018');