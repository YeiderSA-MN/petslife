-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: petslife
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Current Database: `petslife`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `petslife` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `petslife`;

--
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `id_ciudad` varchar(4) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES ('0000','N/A'),('0001','Medellin'),('0002','Bogota'),('0003','Cali'),('0004','Bucaramanga'),('0005','Barranquilla');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discapacidad`
--

DROP TABLE IF EXISTS `discapacidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discapacidad` (
  `cod_discapacidad` varchar(4) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_discapacidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discapacidad`
--

LOCK TABLES `discapacidad` WRITE;
/*!40000 ALTER TABLE `discapacidad` DISABLE KEYS */;
INSERT INTO `discapacidad` VALUES ('0000','N/A'),('0001','Fisica'),('0002','Visual'),('0003','Auditiva'),('0004','Vocal'),('0005','Olfativa');
/*!40000 ALTER TABLE `discapacidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enfermedad`
--

DROP TABLE IF EXISTS `enfermedad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enfermedad` (
  `cod_enfermedad` varchar(4) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_enfermedad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enfermedad`
--

LOCK TABLES `enfermedad` WRITE;
/*!40000 ALTER TABLE `enfermedad` DISABLE KEYS */;
INSERT INTO `enfermedad` VALUES ('0000','N/A'),('0001','Moquillo'),('0002','Hepatitis canina'),('0003','Leptospirosis'),('0004','Parvovirus'),('0005','Rabia');
/*!40000 ALTER TABLE `enfermedad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especie`
--

DROP TABLE IF EXISTS `especie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especie` (
  `cod_especie` varchar(4) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_especie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especie`
--

LOCK TABLES `especie` WRITE;
/*!40000 ALTER TABLE `especie` DISABLE KEYS */;
INSERT INTO `especie` VALUES ('0001','Perro'),('0002','Gato'),('0003','Hamster');
/*!40000 ALTER TABLE `especie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura_detalle`
--

DROP TABLE IF EXISTS `factura_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura_detalle` (
  `id_factura` varchar(4) NOT NULL,
  `id_producto` varchar(4) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio_unitario` int(9) NOT NULL,
  PRIMARY KEY (`id_factura`,`id_producto`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `factura_detalle_ibfk_1` FOREIGN KEY (`id_factura`) REFERENCES `factura_encabezado` (`id_factura`),
  CONSTRAINT `factura_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura_detalle`
--

LOCK TABLES `factura_detalle` WRITE;
/*!40000 ALTER TABLE `factura_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura_encabezado`
--

DROP TABLE IF EXISTS `factura_encabezado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura_encabezado` (
  `id_factura` varchar(4) NOT NULL,
  `id_dueño` varchar(10) NOT NULL,
  `fecha` datetime NOT NULL,
  `precio_total` int(9) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `id_dueño` (`id_dueño`),
  CONSTRAINT `factura_encabezado_ibfk_1` FOREIGN KEY (`id_dueño`) REFERENCES `persona` (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura_encabezado`
--

LOCK TABLES `factura_encabezado` WRITE;
/*!40000 ALTER TABLE `factura_encabezado` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura_encabezado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `local`
--

DROP TABLE IF EXISTS `local`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `local` (
  `id_local` varchar(4) NOT NULL,
  `id_servicio` varchar(4) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `ciudad` varchar(4) NOT NULL,
  `hora_abierto` time NOT NULL,
  `hora_cerrado` time NOT NULL,
  PRIMARY KEY (`id_local`),
  KEY `id_servicio` (`id_servicio`),
  KEY `local_ibfk_2` (`ciudad`),
  CONSTRAINT `local_ibfk_1` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  CONSTRAINT `local_ibfk_2` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `local`
--

LOCK TABLES `local` WRITE;
/*!40000 ALTER TABLE `local` DISABLE KEYS */;
INSERT INTO `local` VALUES ('0000','0000','N/A','N/A','0000','00:00:00','00:00:00'),('0001','0001','PetsLife','Cl. 20 #22-33','0001','08:00:00','22:00:00'),('0002','0003','Peluqueria PetsLife','Cl. 35 #25-80','0004','10:00:00','20:00:00'),('0003','0003','PetsLife Training','Cr. 22 #18-25','0001','09:00:00','20:00:00'),('0005','0002','Peluqueria','cr33#55-67','0001','15:00:00','09:00:00'),('0006','0003','Entrenamiento','cr60#45-87','0002','08:00:00','06:00:00'),('0007','0002','Tienda','cr65B#44-80','0005','07:30:00','08:30:00'),('0008','0002','Spa','cr56#22-89','0003','06:30:00','07:30:00'),('0009','0001','Entrenamiento','cr15#45-67','0004','08:00:00','07:30:00');
/*!40000 ALTER TABLE `local` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id_marca` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES ('0001','Royal Canin'),('0002','Hill\'s'),('0003','Farmina Vet Life'),('0004','Taste of the Wild'),('0005','Diamond Naturals');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mascota`
--

DROP TABLE IF EXISTS `mascota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mascota` (
  `id_mascota` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `cod_dueño` varchar(10) NOT NULL,
  `edad` int(2) NOT NULL,
  `raza` varchar(4) NOT NULL,
  `enfermedad` varchar(4) NOT NULL,
  `discapacidad` varchar(4) NOT NULL,
  PRIMARY KEY (`id_mascota`),
  KEY `cod_dueño` (`cod_dueño`),
  KEY `discapacidad` (`discapacidad`),
  KEY `enfermedad` (`enfermedad`),
  KEY `raza` (`raza`),
  CONSTRAINT `mascota_ibfk_1` FOREIGN KEY (`cod_dueño`) REFERENCES `persona` (`cedula`),
  CONSTRAINT `mascota_ibfk_2` FOREIGN KEY (`discapacidad`) REFERENCES `discapacidad` (`cod_discapacidad`),
  CONSTRAINT `mascota_ibfk_3` FOREIGN KEY (`enfermedad`) REFERENCES `enfermedad` (`cod_enfermedad`),
  CONSTRAINT `mascota_ibfk_4` FOREIGN KEY (`raza`) REFERENCES `raza` (`cod_raza`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascota`
--

LOCK TABLES `mascota` WRITE;
/*!40000 ALTER TABLE `mascota` DISABLE KEYS */;
INSERT INTO `mascota` VALUES (1,'Hanna','1020111726',5,'0001','0000','0000'),(2,'Luna','1011486059',8,'0002','0002','0002'),(3,'Benny','1030146781',2,'0003','0000','0000'),(4,'Lucky','1035672401',10,'0004','0004','0001'),(5,'Lucas','485569',5,'0005','0005','0005'),(6,'Zeus','1012345567',7,'0006','0000','0000'),(7,'Lulu','645378',12,'0005','0002','0000'),(8,'Lili','1012345567',1,'0003','0000','0000'),(9,'Max','1011486059',9,'0004','0003','0005'),(10,'Buddy','1050678943',4,'0006','0004','0000'),(11,'Jack','1032567872',3,'0002','0002','0003'),(12,'Rocky','1020156432',15,'0003','0002','0005'),(13,'Teo','1034567849',6,'0001','0000','0003'),(14,'Dana','103684067',4,'0002','0001','0000'),(15,'Any','1030146781',8,'0002','0000','0000'),(16,'Chloe','1020111726',7,'0002','0002','0000'),(20,'Pancho','1020111745',5,'0003','0000','0000');
/*!40000 ALTER TABLE `mascota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_de_compra`
--

DROP TABLE IF EXISTS `orden_de_compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_de_compra` (
  `id_orden` varchar(4) NOT NULL,
  `id_proveedor` varchar(4) NOT NULL,
  `precio` int(9) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_orden`),
  KEY `id_proveedor` (`id_proveedor`),
  CONSTRAINT `orden_de_compra_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_de_compra`
--

LOCK TABLES `orden_de_compra` WRITE;
/*!40000 ALTER TABLE `orden_de_compra` DISABLE KEYS */;
INSERT INTO `orden_de_compra` VALUES ('0001','0002',200000,'2023-07-01 02:16:07');
/*!40000 ALTER TABLE `orden_de_compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_detalle`
--

DROP TABLE IF EXISTS `orden_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_detalle` (
  `id_orden` varchar(4) NOT NULL,
  `id_producto` varchar(4) NOT NULL,
  `cantidad` int(7) NOT NULL,
  `precio_unitario` int(9) NOT NULL,
  PRIMARY KEY (`id_orden`,`id_producto`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `orden_detalle_ibfk_1` FOREIGN KEY (`id_orden`) REFERENCES `orden_de_compra` (`id_orden`),
  CONSTRAINT `orden_detalle_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_detalle`
--

LOCK TABLES `orden_detalle` WRITE;
/*!40000 ALTER TABLE `orden_detalle` DISABLE KEYS */;
INSERT INTO `orden_detalle` VALUES ('0001','0001',20,10000);
/*!40000 ALTER TABLE `orden_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `cedula` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipo_persona` varchar(1) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `numero` varchar(15) NOT NULL,
  `cod_local` varchar(4) NOT NULL DEFAULT '0000',
  PRIMARY KEY (`cedula`),
  KEY `cod_local` (`cod_local`),
  KEY `tipo_persona` (`tipo_persona`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`cod_local`) REFERENCES `local` (`id_local`),
  CONSTRAINT `tipo_persona` FOREIGN KEY (`tipo_persona`) REFERENCES `tipo_persona` (`tipo_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES ('1011486059','migue15','2','Miguel','Restrepo','3207809657','0003'),('101160938','joel12','2','Joel','Mendoza','3156784976','0007'),('1012345567','karen3','2','Karen','Cardona','3156785068','0002'),('101234566','0006','2','Mariana','Gomez','312567894','0002'),('1020106547','0002','2','pablo','Galvis','3506589022','0001'),('1020111726','yeider12','1','Yeider','Garzon','3042715553','0000'),('1020111745','yeider12','2','Usuario','Prueba','312123','0000'),('1020156432','cris37','2','Cristina','Garcia','3028765495','0003'),('1030146781','yorman12','2','Yorman','Garzon','3042715550','0003'),('1032567872','0008','2','Emanuel','Zapata','3145678436','0000'),('1034567849','A123','2','Alejandra ','Montoya','3208405815','0003'),('1035672401','tomas04','2','Tomas','Moreno','3045407815','0001'),('103684067','Kate612','2','Katerin ','Gomez','313679588','0000'),('1050678943','sof39','2','Sofia','Rendon','3169874536','0002'),('3123123','yeider21','2','asdasdas','fagawgae','12412412','0000'),('485569','0014','2','Mauricio','Florez','3014567327','0002'),('645378','luis20','2','Luis','Roman','3129875643','0002');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id_producto` varchar(4) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `precio` int(7) NOT NULL,
  `tipo_producto` varchar(2) NOT NULL,
  `marca` varchar(30) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `marca` (`marca`),
  KEY `tipo_producto` (`tipo_producto`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca`) REFERENCES `marca` (`id_marca`),
  CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`tipo_producto`) REFERENCES `tipo_producto` (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES ('0001','Pet Towel','Toalla','http://localhost/petslife/img/toalla.jpg',23500,'01','0002'),('0002','Juguete','Juguete para Perros','http://localhost/petslife/img/juguete.jpg',50000,'01','0002'),('0003','Galleta Perro','Galletas para Perro','http://localhost/petslife/img/galletas.jpg',70000,'01','0002'),('0004','Gimnasio','Gimnasio para mascotas','http://localhost/petslife/img/gimnasio.jpg',150000,'01','0002'),('0005','Shampoo','Shampoo limpieza y suavidad petys','http://localhost/petslife/img/shampoo.jpg',20000,'01','0002'),('0006','Cama',' Cama cómoda ,super cálida para tus mascotas','http://localhost/petslife/img/Cama.jpg',119000,'01','0002'),('0007','Collar ','Collar personalizado para tu mascota','http://localhost/petslife/img/Collar.jpg',17000,'01','0002'),('0008','Fuente','Fuente de agua para tus mascotas','http://localhost/petslife/img/Fuente.jpg',98000,'01','0002'),('0009','Cepillo','Secador De Pelo, Peine Para Mascotas 2 En 1 Portátil','http://localhost/petslife/img/Cepillo.jpg',86000,'01','0002'),('0010','Pañitos','Pañitos humedos para mascotas','http://localhost/petslife/img/Pañitos.jpg',13000,'01','0002'),('0011','Hueso','Hueso chick sabor a pollo Pequeño','http://localhost/petslife/img/Hueso.jpg',30400,'01','0002'),('0012','Arnes','Arnes refletivo ','http://localhost/petslife/img/Arnes.jpg',104990,'01','0002'),('0013','Comedero','Comedero para perritos','http://localhost/petslife/img/Comedero.jpg',27100,'01','0002'),('0014','Spray','Spray Antipulgas','http://localhost/petslife/img/Spray.jpg',28900,'01','0002'),('0015','Guacal','Guacal plegable para mascotas pequeñas, transpirable','http://localhost/petslife/img/Guacal.jpg',125000,'01','0002'),('0016','Pañoleta','Pañoleta Menta 2.0 Pluto','http://localhost/petslife/img/Pañoleta.jpg',25000,'01','0002'),('0017','Espuma','Espuma Baño Seco para Perros y Gatos','http://localhost/petslife/img/Espuma.jpg',30000,'01','0002'),('0018','Colonia','Colonia que otorga un agradable y fresco aroma','http://localhost/petslife/img/Colonia.jpg',15000,'01','0002'),('0019','Cobija','Cobijas Fabricadas en tela peluche, variedad de diseños','http://localhost/petslife/img/Cobija.jpg',30000,'01','0002'),('0020','Arenero','Arenero semicubierto para gatos adultos.','http://localhost/petslife/img/Arenero.jpg',112500,'01','0002');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id_proveedor` varchar(4) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `ubicacion` varchar(30) NOT NULL,
  `ciudad` varchar(4) NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `proveedor_ibfk_1` (`ciudad`),
  CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`ciudad`) REFERENCES `ciudad` (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES ('0001','Gearpet','Cr. 44 #22-77','0001'),('0002','IconoPet','Cl. 29 #33-12','0001'),('0003','Saludpro','cr26eg#35-88','0003'),('0004','Walmart','cr80#45-60','0004'),('0005','Gioatope','cr22#50-23','0005'),('0006','Mascotecno','cr55#80-69','0004'),('0007','Animal Home','cr67#54-89','0002'),('0008','Pet outlet','cr66#24-60','0001'),('0009','Animal Factor','cr32#25-54','0005'),('0010','Japan','cr20#27-58','0000');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_producto`
--

DROP TABLE IF EXISTS `proveedor_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_producto` (
  `id_proveedor` varchar(4) NOT NULL,
  `id_producto` varchar(4) NOT NULL,
  `cantidad` int(9) NOT NULL,
  `precio_unitario` int(9) NOT NULL,
  PRIMARY KEY (`id_proveedor`,`id_producto`),
  KEY `id_producto` (`id_producto`),
  CONSTRAINT `proveedor_producto_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`),
  CONSTRAINT `proveedor_producto_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_producto`
--

LOCK TABLES `proveedor_producto` WRITE;
/*!40000 ALTER TABLE `proveedor_producto` DISABLE KEYS */;
INSERT INTO `proveedor_producto` VALUES ('0001','0001',300,18750);
/*!40000 ALTER TABLE `proveedor_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `raza`
--

DROP TABLE IF EXISTS `raza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `raza` (
  `cod_raza` varchar(4) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `especie` varchar(4) NOT NULL,
  PRIMARY KEY (`cod_raza`),
  KEY `especie` (`especie`),
  CONSTRAINT `raza_ibfk_1` FOREIGN KEY (`especie`) REFERENCES `especie` (`cod_especie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `raza`
--

LOCK TABLES `raza` WRITE;
/*!40000 ALTER TABLE `raza` DISABLE KEYS */;
INSERT INTO `raza` VALUES ('0001','Siames','0002'),('0002','Maine Coon','0002'),('0003','Ragdoll','0002'),('0004','Siberiano','0002'),('0005','Birmano','0002'),('0006','Shih Tsu','0001');
/*!40000 ALTER TABLE `raza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `id_registro` int(8) NOT NULL AUTO_INCREMENT,
  `id_servicio` varchar(4) NOT NULL,
  `id_local` varchar(4) NOT NULL,
  `id_mascota` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_registro`),
  KEY `id_servicio` (`id_servicio`),
  KEY `id_local` (`id_local`),
  KEY `id_mascota` (`id_mascota`),
  CONSTRAINT `registro_ibfk_3` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`),
  CONSTRAINT `registro_ibfk_4` FOREIGN KEY (`id_local`) REFERENCES `local` (`id_local`),
  CONSTRAINT `registro_ibfk_5` FOREIGN KEY (`id_mascota`) REFERENCES `mascota` (`id_mascota`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
INSERT INTO `registro` VALUES (2,'0002','0008',1,'09:00:00','2023-09-07 00:00:00'),(3,'0002','0002',20,'14:34:00','2023-09-13 00:00:00'),(4,'0003','0003',20,'15:01:00','2023-09-14 00:00:00'),(5,'0002','0000',1,'00:00:00','0000-00-00 00:00:00'),(6,'0003','0000',20,'00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `id_servicio` varchar(4) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES ('0000','N/A'),('0001','Tienda'),('0002','Spa'),('0003','Entrenamiento');
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_persona`
--

DROP TABLE IF EXISTS `tipo_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_persona` (
  `tipo_persona` varchar(1) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`tipo_persona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_persona`
--

LOCK TABLES `tipo_persona` WRITE;
/*!40000 ALTER TABLE `tipo_persona` DISABLE KEYS */;
INSERT INTO `tipo_persona` VALUES ('1','Administrador'),('2','Usuario'),('3','Trabajador');
/*!40000 ALTER TABLE `tipo_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_producto` (
  `cod_producto` varchar(2) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_producto`
--

LOCK TABLES `tipo_producto` WRITE;
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto` VALUES ('01','Membresia'),('02','Alimento'),('03','Ropa'),('04','Muebles'),('05','Juguetes');
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-16 22:06:49
