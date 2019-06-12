CREATE DATABASE  IF NOT EXISTS `hospital1`
USE `hospital1`;

DROP TABLE IF EXISTS `cita`;

CREATE TABLE `cita` (
  `nombre_paciente` varchar(100) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `hora` time NOT NULL,
  `costo` varchar(50) DEFAULT NULL,
  `fecha` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`hora`,`fecha`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


LOCK TABLES `rol` WRITE;

INSERT INTO `rol` VALUES (1,'Médico'),(2,'Recepcionista'),(3,'Administrador');

UNLOCK TABLES;


DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(20) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `paterno` varchar(50) DEFAULT NULL,
  `materno` varchar(50) DEFAULT NULL,
  `especialidad` varchar(100) DEFAULT NULL,
  `subespecialidad` varchar(100) DEFAULT NULL,
  `domicilio` varchar(150) DEFAULT NULL,
  `clues` varchar(30) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pasword` varchar(32) DEFAULT NULL,
  `horaentrada` time DEFAULT NULL,
  `horasalida` time DEFAULT NULL,
  `fechalimite` date DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


LOCK TABLES `usuario` WRITE;

insert into usuario (cedula,curp,nombre,paterno,materno,especialidad,subespecialidad,domicilio,clues,id_rol,username,pasword)
values("78642167","SELA951102HTSPZN09","Angel Fernando","Sepulveda","Lozada","","","calle Cielo","AFSLA000691",2,"angel","angel");

UNLOCK TABLES;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `alta_cita`(_nombre_paciente varchar(100),_motivo varchar(100),_hora time,_fecha date,_email varchar(50))
BEGIN
insert into cita(nombre_paciente,motivo,hora,fecha,email) values(_nombre_paciente,_motivo,_hora,_fecha,_email);
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_citas`(_fecha date)
BEGIN
select * from cita where fecha=_fecha;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `iniciar_sesion`(_username varchar(32), _pasword varchar(32))
BEGIN
select u.id_rol,u.id_usuario from usuario u where u.username = _username and u.pasword=_pasword;
END$$
DELIMITER ;
