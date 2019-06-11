CREATE DATABASE  IF NOT EXISTS `hospital` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hospital`;
--
-- Table structure for table `cita`
--

DROP TABLE IF EXISTS `cita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cita` (
  `nombre_paciente` varchar(100) DEFAULT NULL,  
  `motivo` varchar(100) DEFAULT NULL,
  `hora` time NOT NULL,
  `costo` varchar(50) DEFAULT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`hora`,`fecha`)  
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
ALTER TABLE cita
ADD COLUMN email varchar(50)  after fecha;
/*!40101 SET character_set_client = @saved_cs_client */;


--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Médico'),(2,'Recepcionista'),(3,'Administrador');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'84351337','JUPA750626HTSPZN09','Juan','Pablo','Sánchez','Psicología','Psicoanalisis','Calle Bernardo Turrubiates 1286','MSSSA000691',1,'juan','juan'),(2,'84345167','JORO441015HTSPZN09','José','Roberto','Martínez','','','Fraccionamiento Olivos, Calle Redención 174','MSSSA000691',3,'jose','jose'),(3,'87643541','AEUO874519HTSPZN09','Alexia','Kyung','Gómez','Radiología','','Fraccionamiento del Valle, Calle Marte R Gomez','MSSSA000691',1,'alexia','alexia'),(4,'78642167','MARI240422HTSPZN09','Martín','Ríos','Flores','','','Calle Suave Patria 783','MSSSA000691',2,'martin','martin'),(6,'37647168','MASE8451ADA3541325','Mario','Sepulveda','Lozada','Pediatría','','29 Bernardo Turrubiates, Fracc. Sierra Venta 1301','MSSSA000691',1,NULL,NULL),(7,'37647168','MASE8451ADA3541325','Mario','Sepulveda','Lozada','Pediatría','','29 Bernardo Turrubiates, Fracc. Sierra Venta 1301','MSSSA000691',1,NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hospital'
--

--
-- Dumping routines for database 'hospital'
--
/*!50003 DROP PROCEDURE IF EXISTS `alta_cita` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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

/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-19 21:46:12
