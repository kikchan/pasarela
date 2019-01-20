CREATE DATABASE  IF NOT EXISTS `pasarelabd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pasarelabd`;
-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 192.168.1.10    Database: pasarelabd
-- ------------------------------------------------------
-- Server version	5.7.23-log

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
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'generado'),(2,'espera'),(3,'aceptado'),(4,'rechazado');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idUsuario` int(10) unsigned NOT NULL,
  `idTicket` int(10) unsigned NOT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adjunto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mensajes_idusuario_foreign` (`idUsuario`),
  KEY `mensajes_idticket_foreign` (`idTicket`),
  CONSTRAINT `mensajes_idticket_foreign` FOREIGN KEY (`idTicket`) REFERENCES `tickets` (`id`),
  CONSTRAINT `mensajes_idusuario_foreign` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (1,2,1,'Hola, estoy haciendo un pago y me dice que el número de la tarjeta no es válida','',NULL,NULL),(2,3,1,'Hola, estamos revisando la página. En breve le informaremos.','',NULL,NULL),(3,6,4,'Buenas, al hacer login me dice que no existe el usuario cuando he comprobado que mi usuario es correcto.','',NULL,NULL);
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=201 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (129,'2014_10_12_000000_create_usuarios_table',2),(193,'2014_10_12_000000_create_users_table',3),(194,'2014_10_12_100000_create_password_resets_table',3),(195,'2019_01_04_121923_create_tarjetas_table',3),(196,'2019_01_04_121935_create_estados_table',3),(197,'2019_01_04_121941_create_transacciones_table',3),(198,'2019_01_04_121947_create_tickets_table',3),(199,'2019_01_04_122003_create_mensajes_table',3),(200,'2019_01_04_122040_create_valoraciones_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('antonio1@gmail.com','XeW3j3v3ZRe1KIe5DcOmzgE4MGPxK23Rk7pXhuCAqZTyBswSyk',NULL),('jose1@gmail.com','LrRy1qMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurSLrP',NULL),('francisco1@gmail.com','SmRy1qMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurSPrL',NULL),('juanito12@gmail.com','JkRy1qMd2BBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurMNrK',NULL),('isabella@gmail.com','KpOi2qMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGurKKiY',NULL),('carmen31@gmail.com','AfRg8pMd2EBZkTUDNA7KfGZ89sgITGC8njhvqozGP9mGuoYYtF',NULL);
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caducidad` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvv` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
INSERT INTO `tarjetas` VALUES (1,'4889226075981240','10/19','240'),(2,'4910892216664871','09/19','501'),(3,'4617557818404440','11/19','522'),(4,'4261326453930450','12/19','281'),(5,'4676202204018045','04/19','835'),(6,'5886658693225404','06/19','533'),(7,'5672292991982314','03/19','476'),(8,'5060347945850759','03/19','570');
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idComercio` int(10) unsigned NOT NULL,
  `idTecnico` int(10) unsigned NOT NULL,
  `idTransaccion` int(10) unsigned DEFAULT NULL,
  `asunto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEstado` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tickets_idcomercio_foreign` (`idComercio`),
  KEY `tickets_idtecnico_foreign` (`idTecnico`),
  KEY `tickets_idtransaccion_foreign` (`idTransaccion`),
  KEY `tickets_idestado_foreign` (`idEstado`),
  CONSTRAINT `tickets_idcomercio_foreign` FOREIGN KEY (`idComercio`) REFERENCES `users` (`id`),
  CONSTRAINT `tickets_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  CONSTRAINT `tickets_idtecnico_foreign` FOREIGN KEY (`idTecnico`) REFERENCES `users` (`id`),
  CONSTRAINT `tickets_idtransaccion_foreign` FOREIGN KEY (`idTransaccion`) REFERENCES `transacciones` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,2,3,1,'No he podido realizar el pago',1,NULL,NULL),(2,5,3,3,'No he podido realizar el pago',1,NULL,NULL),(3,6,3,4,'No me aparece la página para realizar el pago',1,NULL,NULL),(4,6,3,NULL,'No me deja hacer login',2,NULL,NULL),(5,2,3,NULL,'En la página de estadística no veo el número de pagos totales realizados',3,NULL,NULL);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transacciones`
--

DROP TABLE IF EXISTS `transacciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transacciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idComercio` int(10) unsigned NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `idTarjeta` int(10) unsigned NOT NULL,
  `idEstado` int(10) unsigned NOT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transacciones_idcomercio_foreign` (`idComercio`),
  KEY `transacciones_idtarjeta_foreign` (`idTarjeta`),
  KEY `transacciones_idestado_foreign` (`idEstado`),
  CONSTRAINT `transacciones_idcomercio_foreign` FOREIGN KEY (`idComercio`) REFERENCES `users` (`id`),
  CONSTRAINT `transacciones_idestado_foreign` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`),
  CONSTRAINT `transacciones_idtarjeta_foreign` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjetas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transacciones`
--

LOCK TABLES `transacciones` WRITE;
/*!40000 ALTER TABLE `transacciones` DISABLE KEYS */;
INSERT INTO `transacciones` VALUES (1,2,520.50,1,1,'Venta de un portátil hp',NULL,NULL),(2,2,22.50,2,1,'Venta de unos auriculares',NULL,NULL),(3,5,22.50,2,2,'Venta de una funda para ipad',NULL,NULL),(4,6,500.00,3,2,'Venta de un iphone 6',NULL,NULL);
/*!40000 ALTER TABLE `transacciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esComercio` tinyint(1) NOT NULL DEFAULT '1',
  `esAdministrador` tinyint(1) NOT NULL DEFAULT '0',
  `esTecnico` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nick_unique` (`nick`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Antonio','García Martinez','Antoni','antonio1@gmail.com',NULL,'$2y$10$AEdUZRZSr3qwZmQfV3OxDuF1Aka9PuIyoQb2Odmi/75Q/.UwomGEK','cl12345',NULL,0,1,0,NULL,NULL),(2,'Jose','Martinez Lopez','Jose1','jose1@gmail.com',NULL,'$2y$10$J1R2c0LavVQZVe.d2NdXBuK1EO8/4LmzSHhKHaens.5piUHhhVIDq','cl12346',NULL,1,0,0,NULL,NULL),(3,'Francisco','Lopez Sanchez','Fran','francisco1@gmail.com',NULL,'$2y$10$n5As0z2ftRbgNGVOCZTPN.SujXg3l.gomRV0BfypL35ov1nH5V3eO','cl12347',NULL,0,0,1,NULL,NULL),(4,'Juan','Gonzalez Sanchez','Juanito','juanito12@gmail.com',NULL,'$2y$10$RF2y3SVxiMm/X5MIYxJEjOJCEn8HfOIJmmC6mJynq5Cy2/9o/g6AW','cl12348',NULL,0,0,1,NULL,NULL),(5,'Isabel','Jimenez Moreno','Isa','isabella@gmail.com',NULL,'$2y$10$/mc9XR97ly25.JYwTqrQyuAKa2TY36r.EJ1xxNS5OwBk/klp5tBQ.','cl12349',NULL,1,0,0,NULL,NULL),(6,'Carmen','Ruiz Rodriguez','Carmen22','carmen31@gmail.com',NULL,'$2y$10$0jo1cYq34pUpg2CAhbdSJuC8e158EWoo4z8sV3WrMFjoHIKj3WowC','cl12350',NULL,1,0,0,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esComercio` tinyint(1) NOT NULL DEFAULT '1',
  `esAdministrador` tinyint(1) NOT NULL DEFAULT '0',
  `esTecnico` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_nick_unique` (`nick`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (7,'Antonio','García Martinez','Antoni','antonio1@gmail.com',NULL,'$2y$10$q8KW84i5CRol/rOHcEVYvOJNW1VJrqFbmFs9Kf4o6zRv/gQhgcQRK','cl12345',NULL,0,1,0,NULL,NULL),(8,'Jose','Martinez Lopez','Jose1','jose1@gmail.com',NULL,'$2y$10$aTzx7d7Tfzmse1HSLxecMObH2TDvJDefhTixVIiLEPAwAtAI/BC2O','cl12346',NULL,1,0,0,NULL,NULL),(9,'Francisco','Lopez Sanchez','Fran','francisco1@gmail.com',NULL,'$2y$10$.rRhDlk9LgM9SPULcQSqte9Yg.oWhF/pJot0liZy2WQWeKx11/EHS','cl12347',NULL,0,0,1,NULL,NULL),(10,'Juan','Gonzalez Sanchez','Juanito','juanito12@gmail.com',NULL,'$2y$10$X9p8SQ..7GUt3jZP0W09Nu.7lBqR6h.pOmMfKjSkUVtCcKjW4tnYW','cl12348',NULL,0,0,1,NULL,NULL),(11,'Isabel','Jimenez Moreno','Isa','isabella@gmail.com',NULL,'$2y$10$PNcZm5GtPZ36CagxMuw8X.R6FZNk9kD8H31fvLy/Q03rqfRR3Wuga','cl12349',NULL,1,0,0,NULL,NULL),(12,'Carmen','Ruiz Rodriguez','Carmen22','carmen31@gmail.com',NULL,'$2y$10$oGIygcR8TKRA8AQalHgcJueiAHGr28a7sbKzOm.tCsxaQqQZpD0/K','cl12350',NULL,1,0,0,NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valoraciones`
--

DROP TABLE IF EXISTS `valoraciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valoraciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idComercio` int(10) unsigned NOT NULL,
  `idTecnico` int(10) unsigned NOT NULL,
  `valoracion` int(11) NOT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `valoraciones_idcomercio_foreign` (`idComercio`),
  KEY `valoraciones_idtecnico_foreign` (`idTecnico`),
  CONSTRAINT `valoraciones_idcomercio_foreign` FOREIGN KEY (`idComercio`) REFERENCES `users` (`id`),
  CONSTRAINT `valoraciones_idtecnico_foreign` FOREIGN KEY (`idTecnico`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valoraciones`
--

LOCK TABLES `valoraciones` WRITE;
/*!40000 ALTER TABLE `valoraciones` DISABLE KEYS */;
INSERT INTO `valoraciones` VALUES (1,2,3,8,'El técnico ha sido muy amable',NULL,NULL),(2,5,3,9,'',NULL,NULL),(3,6,3,8,'La respuesta del técnico ha sido muy rápida',NULL,NULL),(4,6,4,5,'La respuesta del técnico ha sido muy lenta',NULL,NULL);
/*!40000 ALTER TABLE `valoraciones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-10 23:28:59
