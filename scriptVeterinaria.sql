DROP TABLE IF EXISTS `T_Reserva_Trabajador`;
DROP TABLE IF EXISTS `T_Reserva`;
DROP TABLE IF EXISTS `T_Prescripcion`;
DROP TABLE IF EXISTS `T_Consulta`;
DROP TABLE IF EXISTS `T_Usuario`;
DROP TABLE IF EXISTS `T_Trabajador`;
DROP TABLE IF EXISTS `T_Mascota`;
DROP TABLE IF EXISTS `T_Titular`;


/*TABLE CREATION*/

CREATE TABLE `T_Titular`(
	`ID` INTEGER AUTO_INCREMENT,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `DNI` VARCHAR(9) DEFAULT NULL,
    `domicilio` VARCHAR(200) DEFAULT NULL,
    `codigo_postal` INTEGER DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    `fecha_alta` DATE DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Trabajador`(
	`ID` INTEGER AUTO_INCREMENT,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `apellidos` VARCHAR(50) DEFAULT NULL,
    `trabajo` ENUM('Veterinario/a','ACV','Peluquero/a') DEFAULT NULL,
    `n_colegiado` VARCHAR(10) DEFAULT NULL,
    `fecha_alta` DATE DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Usuario`(
	`ID` INTEGER AUTO_INCREMENT,
    `nombre_usuario` VARCHAR(100) DEFAULT NULL,
    `perfil`ENUM('Veterinario/a','ACV','Peluquero/a','Administrador/a') DEFAULT NULL,
    `clave` VARCHAR(100) DEFAULT NULL,
    `id_trabajador` INTEGER DEFAULT NULL,
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
    `antecedentes` VARCHAR(100) DEFAULT NULL,
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
	`ID` INTEGER AUTO_INCREMENT,
    `id_mascota` INTEGER DEFAULT NULL,
    `tipo_reserva` ENUM ('Veterinario', 'Peluquería') DEFAULT NULL,
    `sala` ENUM ('Consulta 1', 'Consulta 2', 'Peluquería') DEFAULT NULL,
    `fecha` DATE DEFAULT NULL,
    `hora_inicio` TIME DEFAULT NULL, /*'hh:mm:ss'*/
    `num_contacto` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Reserva_Trabajador`(
	`ID` INTEGER AUTO_INCREMENT,
    `id_reserva` INTEGER DEFAULT NULL,
    `id_trabajador` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Prescripcion`(
	`ID` INTEGER AUTO_INCREMENT,
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


/*FOREIGN KEYS*/

ALTER TABLE T_Usuario ADD FOREIGN KEY (id_trabajador) REFERENCES T_Trabajador (ID);

ALTER TABLE T_Mascota ADD FOREIGN KEY (id_titular) REFERENCES T_Titular (ID);

ALTER TABLE T_Consulta ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);

ALTER TABLE T_Consulta ADD FOREIGN KEY (id_veterinario) REFERENCES T_trabajador (ID);

ALTER TABLE T_Reserva ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);

ALTER TABLE T_Reserva_Trabajador ADD FOREIGN KEY (id_reserva) REFERENCES T_Reserva (ID);

ALTER TABLE T_Reserva_Trabajador ADD FOREIGN KEY (id_trabajador) REFERENCES T_Trabajador (ID);

ALTER TABLE T_Prescripcion ADD FOREIGN KEY (id_consulta) REFERENCES T_Consulta (ID);

ALTER TABLE T_Prescripcion ADD FOREIGN KEY (id_mascota) REFERENCES T_Mascota (ID);

ALTER TABLE T_Prescripcion ADD FOREIGN KEY (id_veterinario) REFERENCES T_Trabajador (ID);


/*INSERTS*/

INSERT INTO T_Titular VALUES 
(1, 'Clara Ruiz', '43465253V', 'Calle Falsa, 123', 07009, 666666666, '2021-09-11'),
(2, 'Pau Valls', '43452023B', 'Calle Falsa, 123', 07009, 677777777, '2019-09-11'),
(3, 'Alicia Ruiz', '43625128M', 'Calle Cuenca, 2', 07009, 688888888, '2018-09-11');

INSERT INTO T_Mascota VALUES 
(1, 'ES052588521', 'Weepy', 2, 'FEL', 'Europeo', 'Macho', 'Blanco y atigrado naranja', '258632145885210', '2019-01-02', 'Sí', '2019-09-11'),
(2, 'ES052588522', 'Emi', 1, 'FEL', 'Europeo', 'Macho', 'Blanco y atigrado marrón', '258632145885211', '2020-01-02', 'Sí', '2021-09-11'),
(3, 'ES052588523', 'Chacho', 3, 'CAN', 'Mezcla', 'Macho', 'Marrón', '258632145885212', '2018-01-02', 'Sí', '2018-09-11');

INSERT INTO T_Reserva VALUES
(1, 1, 'Peluquería', 'Peluquería', '2023-06-01', '10:00:00', '666552233'),
(2, 2, 'Peluquería', 'Peluquería', '2023-06-02', '15:00:00', '666552233');

INSERT INTO T_Trabajador VALUES
(1, 'Pablo', 'Martín', 'Veterinario/a', '94764830', '2020-02-05', 666666666), 
(2, 'Laura', 'Sánchez', 'Veterinario/a', '94764831', '2019-03-11', 677777777),
(3, 'Pepi', 'Sánchez', 'Peluquero/a', '94764831', '2019-03-11', 677777777);

INSERT INTO T_Reserva_Trabajador VALUES
(1, 1, 1),
(2, 2, 2);

INSERT INTO T_Consulta VALUES 
(2, 2, 1, '2023-01-07', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet.', 3.88, 35.1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', '-', '-', 'Lorem ipsum dolor sit amet.', 'Ninguna.', '-', '-'), 
(3, 2, 1, '2023-02-05', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet.', 3.88, 35.1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', '-', '-', 'Lorem ipsum dolor sit amet.', 'Ninguna.', '-', '-'), 
(4, 3, 2, '2023-02-08', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet.', 4.88, 34.2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat, suscipit?', '-','-', 'Lorem ipsum dolor sit amet.', 'Ninguna.', '-', '-');