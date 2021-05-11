-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: LunaAcostaInd
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `id_libro` bigint(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creador` varchar(50) NOT NULL,
  `año` smallint(6) NOT NULL,
  `editorial` varchar(30) DEFAULT NULL,
  `lugar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (9780307475732,'La ladrona de libros','Markus Zusak',2005,'Lumen','Australia'),(9781250079800,'Los buscadores de libros','Jennifer Chambliss Bertman',2015,'Planeta','Estados Unidos'),(9786070776274,'El campamento','Blue Jeans',2021,'Planeta','España'),(9786073197748,'El Ickabog','J. K. Rowling',2020,'Salamandra','Inglaterra'),(9786073800259,'Ready Player Two','Ernest Cline',2021,'Nova','Estados Unidos');
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `musica`
--

DROP TABLE IF EXISTS `musica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `musica` (
  `id_musica` varchar(12) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `creador` varchar(50) NOT NULL,
  `año` smallint(6) NOT NULL,
  `album` varchar(30) DEFAULT 'The Wall',
  PRIMARY KEY (`id_musica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `musica`
--

LOCK TABLES `musica` WRITE;
/*!40000 ALTER TABLE `musica` DISABLE KEYS */;
INSERT INTO `musica` VALUES ('JPPC01700575','Shinzou Wo Sasageyo','Linked Horizon',2017,'Shingeki no Kiseki'),('KRA402000111','How You Like That','BlackPink',2020,'The Wall'),('QZGWX2086469','Blue Bird','Akano',2020,'Blue Bird (From \"Naruto Shippu'),('QZK6J2086739','Chocolate con almendras','Mikecrack',2020,'Chocolate con almendras'),('USUM71806694','Natural','Imagine Dragones',2018,'Origins (Deluxe)');
/*!40000 ALTER TABLE `musica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `creador` varchar(50) NOT NULL,
  `año` smallint(6) NOT NULL,
  `actorPrincipal` varchar(50) DEFAULT NULL,
  `clasificacion` enum('AA','A','B','B15','C') DEFAULT 'AA',
  PRIMARY KEY (`id_pelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelicula`
--

LOCK TABLES `pelicula` WRITE;
/*!40000 ALTER TABLE `pelicula` DISABLE KEYS */;
/*!40000 ALTER TABLE `pelicula` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videojuego`
--

DROP TABLE IF EXISTS `videojuego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videojuego` (
  `id_videjuego` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `creador` varchar(50) NOT NULL,
  `año` smallint(6) NOT NULL,
  `prota` varchar(50) DEFAULT 'Sans',
  PRIMARY KEY (`id_videjuego`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videojuego`
--

LOCK TABLES `videojuego` WRITE;
/*!40000 ALTER TABLE `videojuego` DISABLE KEYS */;
INSERT INTO `videojuego` VALUES (1,'Watch Dogs Legion','Ubisoft Entertainment',2020,'Sans'),(2,'Resident Evil 3','Capcom',2020,'Sans'),(3,'Minecraft','Mojang Studios',2011,'Steve'),(4,'Super Smash Bros Ultimate','Nintendo',2018,'Mario Bros'),(5,'Garena Free Fire','Garena',2017,'Sans');
/*!40000 ALTER TABLE `videojuego` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-09 20:21:59
