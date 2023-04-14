DROP TABLE IF EXISTS `T_Reserva_Trabajador`;
DROP TABLE IF EXISTS `T_Titular`;
DROP TABLE IF EXISTS `T_Mascota`;
DROP TABLE IF EXISTS `T_Consulta`;
DROP TABLE IF EXISTS `T_Trabajador`;
DROP TABLE IF EXISTS `T_Usuario`;
DROP TABLE IF EXISTS `T_Reserva`;
DROP TABLE IF EXISTS `T_Prescripción`;
DROP TABLE IF EXISTS `T_Vacuna`;

CREATE TABLE `T_Titular`(
	`ID` INTEGER,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `DNI` VARCHAR(9) DEFAULT NULL,
    `domicilio` VARCHAR(200) DEFAULT NULL,
    `codigo_postal` INTEGER DEFAULT NULL,
    `persona_contacto` VARCHAR(50) DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    `fecha_alta` DATE DEFAULT NOW(),
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Trabajador`(
	`ID` INTEGER,
    `nombre` INTEGER DEFAULT NULL,
    `apellidos` VARCHAR(50) DEFAULT NULL,
    `cargo` ENUM('Veterinario/a','ACV','Peluquero/a') DEFAULT NULL,
    `n_colegiado` VARCHAR(100) DEFAULT NULL,
    `fecha_alta` DATE DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
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
	`ID` INTEGER,
    `pasaporte` VARCHAR(11) DEFAULT NULL,
    `nombre` VARCHAR(50) DEFAULT NULL,
    `titular` INTEGER DEFAULT NULL,
    `especie` ENUM ('FEL','CAN', 'EQUI', 'OVI', 'CUNI', 'Otros') DEFAULT NULL,
    `raza` VARCHAR(50) DEFAULT NULL,
    `sexo`ENUM ('Macho', 'Hembra') DEFAULT NULL,
    `color` VARCHAR(50) DEFAULT NULL,
    `codigo_chip` VARCHAR(15) DEFAULT NULL,
    `fecha_nacimiento` DATE DEFAULT NULL,
	`operado` ENUM ('Sí', 'No', '?'),
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Consulta`(
	`ID` INTEGER,
    `mascota` INTEGER DEFAULT NULL,
    `veterinario` VARCHAR(50) DEFAULT NULL,
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

CREATE TABLE `T_Vacuna`(
	`ID` INTEGER,
    `mascota` INTEGER DEFAULT NULL,
    `fabricante` VARCHAR(50) DEFAULT NULL,
    `denominacion` VARCHAR(50) DEFAULT NULL,
	`antirabica` ENUM ('Sí', 'No'),
    `fecha` DATE DEFAULT NULL,
    `veterinario`INTEGER DEFAULT NULL,
    `fecha_recuerdo` DATE DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Reserva`(
	`ID` INTEGER,
    `mascota` INTEGER DEFAULT NULL,
    `consulta` INTEGER DEFAULT NULL,
    `fecha` DATE DEFAULT NULL,
    `hora_inicio` TIME DEFAULT NULL, /*'hh:mm:ss'*/
    `hora_fin` TIME DEFAULT NULL,
    `num_contacto` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Prescripcion`(
	`ID` INTEGER,
    `mascota` INTEGER DEFAULT NULL,
    `consulta` INTEGER DEFAULT NULL,
    `veterinario` INTEGER DEFAULT NULL,
    `diagnostico` VARCHAR(50) DEFAULT NULL, 
    `principio_activo` VARCHAR(50) DEFAULT NULL, 
    `dosis` VARCHAR(50) DEFAULT NULL,
    `via_administracion` VARCHAR(50) DEFAULT NULL,
    `cantidad` VARCHAR(50) DEFAULT NULL,
    `fecha_inicio` DATE DEFAULT NULL,
    `fecha_fin` DATE DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Imagenes`(
	`ID` INTEGER,
    `consulta` INTEGER DEFAULT NULL,
    `mascota` INTEGER DEFAULT NULL,
    `fecha_hora_subida` DATETIME DEFAULT NOW(),
    `imagen` LONGBLOB DEFAULT NULL,
    PRIMARY KEY (`ID`)
);

CREATE TABLE `T_Reserva_Trabajador`(
	`ID` INTEGER,
    `reserva` INTEGER DEFAULT NULL,
    `trabajador` INTEGER DEFAULT NULL,
    PRIMARY KEY (`ID`)
);