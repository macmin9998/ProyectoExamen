-- MySQL dump 10.16  Distrib 10.1.21-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text,
  `id_examen` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_examen` (`id_examen`),
  CONSTRAINT `id_examen` FOREIGN KEY (`id_examen`) REFERENCES `examen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuestas`
--

LOCK TABLES `encuestas` WRITE;
/*!40000 ALTER TABLE `encuestas` DISABLE KEYS */;
INSERT INTO `encuestas` VALUES (17,'En cualquier aportunidad que se presenta, doy lo m',9),(18,'Â¿pregunta ...?',10),(19,'Â¿pregunta .......................................',11),(20,'klhjkl',12),(21,'cuantos aÃ±os',12),(22,'sdfsq3',12),(23,'Â¿ Â¿ hola ? ?',12),(24,'Â¿ Â¿ pregunto ? ?',12),(25,'Â¿ Â¿ pregunta ? ?',12),(26,'Â¿ Â¿ preguntas ? ?',12),(27,'Â¿Â¿kalasdad??',12),(28,'Â¿Â¿ada??',12),(29,'mmm',12),(30,'pruebaOpciones',12),(31,'preguntas',12),(32,'sfdf',13),(33,'holasss',16),(34,'holasss',16),(38,'dadaaaa',9),(39,'ddww',9),(40,'SD',19),(41,'',19),(42,'',19),(43,'',19),(44,'',19),(45,'',19),(46,'',19),(47,'',19),(48,'',19),(49,'',19),(50,'',19),(51,'',19),(52,'',19),(53,'',19),(54,'',19),(55,'asd',19),(56,'s',19),(57,'asda',21);
/*!40000 ALTER TABLE `encuestas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES (9,'Valores Mabe','2017-05-29 14:55:46'),(10,'Examen Prueba2','2017-05-30 09:35:19'),(11,'prueba 5','2017-05-30 12:01:42'),(12,'jkgku6','2017-05-31 11:03:19'),(13,'nuevoExa e','2017-05-31 12:45:06'),(14,'aadd','2017-05-31 13:45:35'),(15,'  ','2017-05-31 14:00:48'),(16,'bien','2017-05-31 14:21:58'),(17,'analitica','2017-05-31 14:40:13'),(18,'ad','2017-06-01 09:18:43'),(19,'pruebaId','2017-06-01 09:53:00'),(20,'pruebaId2','2017-06-01 09:57:12'),(21,'a','2017-06-01 10:10:35'),(22,'as','2017-06-01 12:30:47');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opciones`
--

DROP TABLE IF EXISTS `opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_examenop` int(11) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_examenop` (`id_examenop`),
  CONSTRAINT `id_examenop` FOREIGN KEY (`id_examenop`) REFERENCES `examen` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones`
--

LOCK TABLES `opciones` WRITE;
/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
INSERT INTO `opciones` VALUES (42,17,'Totalmente desacuerdo',0,9,1),(43,17,'Desacuerdo',0,9,1),(44,17,'De acuerdo',0,9,1),(45,17,'Totalmente de acuerdo',0,9,1),(46,18,'opcion1',0,10,1),(47,18,'opcion2',0,10,1),(48,18,'opcion3',0,10,1),(49,19,'opciones1',0,11,1),(50,19,'opciones2',0,11,1),(51,19,'opciones3',0,11,1),(52,20,'klnkÃ±',0,12,1),(53,20,'Ã±kjkÃ±',0,12,1),(54,21,'2',0,12,1),(55,21,'3',0,12,1),(56,22,'sf',0,12,1),(57,22,'sdf',0,12,1),(58,23,'adsa',0,12,1),(59,23,'asda',0,12,1),(60,25,'dsa',0,12,1),(61,25,'asda',0,12,1),(62,26,'hola',0,12,1),(63,26,'comomsasd',0,12,1),(64,27,'sdsd',0,12,1),(65,27,'sdds',0,12,1),(66,28,'asd',0,12,1),(67,28,'asdsa',0,12,1),(68,29,'a1',0,12,1),(69,29,'as',0,12,1),(70,32,'dfs',0,13,1),(71,32,'sdf',0,13,1),(72,33,'asdasd',0,16,1),(73,33,'asda',0,16,1),(74,34,'asdasd',0,16,1),(75,34,'asda',0,16,1),(76,38,'asd',0,9,1),(77,38,'ds',0,9,1),(78,39,'sd',0,9,1),(79,39,'eee',0,9,1),(80,39,'aaa',0,9,1),(81,40,'SD',0,19,1),(82,40,'SDF',0,19,1),(83,55,'a',0,19,1),(84,55,'ad',0,19,1),(85,55,'aa',0,19,1),(86,56,'wew',0,19,1),(87,56,'we',0,19,1),(88,56,'we',0,19,1),(89,57,'asd',0,21,1),(90,57,'asd',0,21,1),(91,57,'asd',0,21,1),(92,57,'asd',0,21,1);
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'carlos117','carlos2017'),(4,'macario03','macario2017'),(5,'mac03','macarip2017');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-01 12:43:15
