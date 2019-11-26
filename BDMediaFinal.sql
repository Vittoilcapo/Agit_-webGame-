CREATE DATABASE  IF NOT EXISTS `juego` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `juego`;
-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: juego
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `armas_tienda`
--

DROP TABLE IF EXISTS `armas_tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `armas_tienda` (
  `armas_tienda_nombre` varchar(45) NOT NULL,
  `tienda_id` int(11) NOT NULL,
  `armas_tienda_agilidad` int(11) DEFAULT NULL,
  `armas_tienda_fuerza` int(11) DEFAULT NULL,
  `armas_tienda_velocidad` int(11) DEFAULT NULL,
  `armas_imagen` varchar(45) DEFAULT NULL,
  `armas_precio` int(11) NOT NULL,
  PRIMARY KEY (`armas_tienda_nombre`,`tienda_id`),
  KEY `tienda_id_fk_idx` (`tienda_id`),
  CONSTRAINT `tienda_id_fk` FOREIGN KEY (`tienda_id`) REFERENCES `tienda` (`tienda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `armas_tienda`
--

LOCK TABLES `armas_tienda` WRITE;
/*!40000 ALTER TABLE `armas_tienda` DISABLE KEYS */;
INSERT INTO `armas_tienda` VALUES ('Espada',1,10,10,10,'img/upg_sword.png',300),('Hacha',1,9,13,18,'img/axe.png',500),('Lanza',1,15,5,20,'img/wand.png',700),('Martillo',1,5,20,6,'img/hammer.png',1000);
/*!40000 ALTER TABLE `armas_tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `compra` (
  `tienda_id` int(5) NOT NULL,
  `usuario_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`tienda_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`tienda_id`) REFERENCES `tienda` (`tienda_id`),
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadisticas`
--

DROP TABLE IF EXISTS `estadisticas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estadisticas` (
  `usuario_mail` varchar(40) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `estadisticas_global` int(7) DEFAULT NULL,
  `estadisticas_velocidad` int(5) DEFAULT NULL,
  `estadisticas_fuerza` int(5) DEFAULT NULL,
  `estadisticas_agilidad` int(5) DEFAULT NULL,
  PRIMARY KEY (`usuario_mail`),
  KEY `usuario_id_fk_usuario_idx` (`usuario_id`),
  CONSTRAINT `usuario_id_fk_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadisticas`
--

LOCK TABLES `estadisticas` WRITE;
/*!40000 ALTER TABLE `estadisticas` DISABLE KEYS */;
INSERT INTO `estadisticas` VALUES ('',NULL,NULL,1,4,1),('11@gmail.com',11,NULL,1,3,4),('12@gmail.com',12,NULL,5,1,5),('fua@gmail.com',8,NULL,1,2,5),('hola@gmail.com',9,NULL,2,4,5),('keloke@gmail.com',10,NULL,4,2,4),('penelope@gmail.com',NULL,NULL,3,3,3),('vitto@gmail.com',NULL,NULL,1,2,3);
/*!40000 ALTER TABLE `estadisticas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `inventario` (
  `inventario_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`inventario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (7),(8),(9),(10),(11),(12);
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_armas`
--

DROP TABLE IF EXISTS `inventario_armas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `inventario_armas` (
  `inventario_id` int(11) NOT NULL,
  `inventario_armas_nombre` varchar(40) DEFAULT NULL,
  `inventario_armas_velocidad` int(20) DEFAULT NULL,
  `inventario_armas_fuerza` int(20) DEFAULT NULL,
  `inventario_armas_agilidad` int(20) DEFAULT NULL,
  KEY `armas_nombre_fk_idx` (`inventario_armas_nombre`),
  KEY `armas_inventario_fk_idx` (`inventario_id`),
  CONSTRAINT `armas_inventario_fk` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`inventario_id`),
  CONSTRAINT `armas_nombre_fk` FOREIGN KEY (`inventario_armas_nombre`) REFERENCES `armas_tienda` (`armas_tienda_nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_armas`
--

LOCK TABLES `inventario_armas` WRITE;
/*!40000 ALTER TABLE `inventario_armas` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventario_armas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_skin`
--

DROP TABLE IF EXISTS `inventario_skin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `inventario_skin` (
  `inventario_id` int(11) NOT NULL,
  `inventario_skin_foto` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`inventario_id`),
  CONSTRAINT `inventario_fk` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`inventario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_skin`
--

LOCK TABLES `inventario_skin` WRITE;
/*!40000 ALTER TABLE `inventario_skin` DISABLE KEYS */;
INSERT INTO `inventario_skin` VALUES (8,'../Tienda/img/newells.jpg'),(9,'../Tienda/img/enanoboca.png'),(10,'../Tienda/newells.png'),(12,'../Tienda/img/enanoboca.png');
/*!40000 ALTER TABLE `inventario_skin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macaco`
--

DROP TABLE IF EXISTS `macaco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `macaco` (
  `macaco_id` int(5) NOT NULL,
  `macaco_nombre` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`macaco_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macaco`
--

LOCK TABLES `macaco` WRITE;
/*!40000 ALTER TABLE `macaco` DISABLE KEYS */;
INSERT INTO `macaco` VALUES (1,'boxeador'),(2,'caballero'),(3,'raccoon');
/*!40000 ALTER TABLE `macaco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partida`
--

DROP TABLE IF EXISTS `partida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `partida` (
  `partida_id` int(5) NOT NULL AUTO_INCREMENT,
  `inventario_id` int(5) NOT NULL,
  `macaco_id` int(5) DEFAULT NULL,
  `usuario_id` int(5) NOT NULL,
  PRIMARY KEY (`partida_id`,`usuario_id`,`inventario_id`),
  KEY `usuario_id` (`usuario_id`),
  KEY `macaco_id` (`macaco_id`),
  KEY `inventario_fk_idx` (`inventario_id`),
  KEY `fk_inventario_idx` (`inventario_id`),
  CONSTRAINT `fk_inventario` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`inventario_id`),
  CONSTRAINT `partida_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`usuario_id`),
  CONSTRAINT `partida_ibfk_3` FOREIGN KEY (`macaco_id`) REFERENCES `macaco` (`macaco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partida`
--

LOCK TABLES `partida` WRITE;
/*!40000 ALTER TABLE `partida` DISABLE KEYS */;
/*!40000 ALTER TABLE `partida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultado`
--

DROP TABLE IF EXISTS `resultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `resultado` (
  `resultado_id` int(5) NOT NULL AUTO_INCREMENT,
  `partida_id` int(11) DEFAULT NULL,
  `ganador_id_usuario` int(11) DEFAULT NULL,
  `daño_causado` int(11) DEFAULT NULL,
  `resultado_fecha` date DEFAULT NULL,
  `golpes_esquivados` int(11) DEFAULT NULL,
  `dinero_ganado` int(11) DEFAULT NULL,
  PRIMARY KEY (`resultado_id`),
  KEY `id_usuario_ganador_fk_idx` (`ganador_id_usuario`),
  KEY `partida_id_fk_idx` (`partida_id`),
  CONSTRAINT `id_usuario_ganador_fk` FOREIGN KEY (`ganador_id_usuario`) REFERENCES `usuario` (`usuario_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `partida_id_fk` FOREIGN KEY (`partida_id`) REFERENCES `partida` (`partida_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultado`
--

LOCK TABLES `resultado` WRITE;
/*!40000 ALTER TABLE `resultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tienda`
--

DROP TABLE IF EXISTS `tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tienda` (
  `tienda_id` int(11) NOT NULL,
  `tienda_es` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`tienda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tienda`
--

LOCK TABLES `tienda` WRITE;
/*!40000 ALTER TABLE `tienda` DISABLE KEYS */;
INSERT INTO `tienda` VALUES (1,'Armas'),(2,'Skins');
/*!40000 ALTER TABLE `tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tienda_skin`
--

DROP TABLE IF EXISTS `tienda_skin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tienda_skin` (
  `tienda_id` int(11) NOT NULL,
  `tienda_skin_foto` varchar(50) DEFAULT NULL,
  `id_skin` varchar(45) NOT NULL,
  PRIMARY KEY (`id_skin`,`tienda_id`),
  KEY `tienda_skin_ibfk_1_idx` (`tienda_id`),
  CONSTRAINT `tienda_skin_ibfk_1` FOREIGN KEY (`tienda_id`) REFERENCES `tienda` (`tienda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tienda_skin`
--

LOCK TABLES `tienda_skin` WRITE;
/*!40000 ALTER TABLE `tienda_skin` DISABLE KEYS */;
/*!40000 ALTER TABLE `tienda_skin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `usuario_id` int(5) NOT NULL,
  `usuario_dinero` int(8) DEFAULT NULL,
  `usuario_nivel` int(3) DEFAULT NULL,
  `resultado_id` int(5) DEFAULT NULL,
  `inventario_id` int(5) DEFAULT NULL,
  `usuario_nombre` varchar(45) DEFAULT NULL,
  `usuario_mail` varchar(45) NOT NULL,
  `usuario_password` varchar(45) DEFAULT NULL,
  `macaco_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario_id`,`usuario_mail`),
  KEY `macaco_id_idx` (`macaco_id`),
  KEY `usuario_inventario_fk_idx` (`inventario_id`),
  KEY `resultado_id_fk_idx` (`resultado_id`),
  CONSTRAINT `macaco_id` FOREIGN KEY (`macaco_id`) REFERENCES `macaco` (`macaco_id`),
  CONSTRAINT `resultado_id_fk` FOREIGN KEY (`resultado_id`) REFERENCES `resultado` (`resultado_id`),
  CONSTRAINT `usuario_inventario_fk` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`inventario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (8,100,1,NULL,8,'fuaaaa','fua@gmail.com','Prueba1',2),(9,100,1,NULL,9,'Keloke','hola@gmail.com','Preuba1',2),(10,100,1,NULL,10,'loquita','keloke@gmail.com','Preuba1',2),(11,100,1,NULL,11,'eleven','11@gmail.com','Prueba1',2),(12,100,1,NULL,12,'docee','12@gmail.com','Prueba1',2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-26 18:46:39
