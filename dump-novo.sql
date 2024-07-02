-- MySQL dump 10.13  Distrib 5.7.35, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.20-MariaDB

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
-- Table structure for table `cargos`
--

create database mydb;

use mydb;

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_cargo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Usuário'),(2,'Desenvolvedor'),(3,'Administrador');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_categoria` varchar(60) NOT NULL,
  `nome_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Jogos que envolvem ação rápida e reflexos','Ação'),(2,'Jogos focados em aventuras épicas','Aventura'),(3,'Jogos que exigem estratégia e planejamento','Estratégia'),(4,'Jogos de esportes e simulação de esportes','Esportes');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogos`
--

DROP TABLE IF EXISTS `jogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogos` (
  `id_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_jogo` varchar(500) NOT NULL,
  `links_jogo` varchar(255) DEFAULT NULL,
  `data_lancamento_jogo` date NOT NULL,
  `nome_jogo` varchar(45) NOT NULL,
  `qntd_votos_up_jogo` int(11) NOT NULL,
  `qntd_votos_down_jogo` int(11) NOT NULL,
  `usuarios_id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_jogo`),
  KEY `fk_jogos_usuarios1_idx` (`usuarios_id_usuario`),
  CONSTRAINT `fk_jogos_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogos`
--

LOCK TABLES `jogos` WRITE;
/*!40000 ALTER TABLE `jogos` DISABLE KEYS */;
INSERT INTO `jogos` VALUES (1,'Um jogo de estratégia complexo',NULL,'2024-03-11','Mestre da Estratégia',0,0,5),(2,'Aventura mágica em um mundo encantado',NULL,'2023-11-22','Magic Run',0,0,4),(3,'Corrida eletrizante cheia de adrenalina',NULL,'2024-02-18','Velocidade Extrema',0,0,5),(4,'Quebra-cabeça intrigante para mentes afiadas',NULL,'2023-07-04','Desafio Mental',0,0,4),(5,'Jogo de ação com batalhas intensas',NULL,'2024-01-12','Batalha Épica',0,0,5),(6,'Simulação de vida em uma cidade moderna',NULL,'2023-08-23','Cidade Viva',0,0,4),(7,'Exploração de galáxias distantes',NULL,'2024-03-30','Galáxia Infinita',0,0,5),(8,'Missões secretas em territórios inimigos',NULL,'2023-06-11','Operação Secreta',0,0,4),(9,'Simulador de agricultura realista',NULL,'2024-04-07','Fazenda Moderna',0,0,5),(10,'Jogo de sobrevivência em um apocalipse zumbi',NULL,'2023-12-19','Zumbi Survival',0,0,4),(11,'Aventura épica com heróis lendários',NULL,'2023-09-25','Heróis Lendários',0,0,5);
/*!40000 ALTER TABLE `jogos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jogos_has_categorias`
--

DROP TABLE IF EXISTS `jogos_has_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogos_has_categorias` (
  `jogos_id_jogo` int(11) NOT NULL,
  `categorias_id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`jogos_id_jogo`,`categorias_id_categoria`),
  KEY `fk_jogos_has_categorias_categorias1_idx` (`categorias_id_categoria`),
  KEY `fk_jogos_has_categorias_jogos1_idx` (`jogos_id_jogo`),
  CONSTRAINT `fk_jogos_has_categorias_categorias1` FOREIGN KEY (`categorias_id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_jogos_has_categorias_jogos1` FOREIGN KEY (`jogos_id_jogo`) REFERENCES `jogos` (`id_jogo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogos_has_categorias`
--

LOCK TABLES `jogos_has_categorias` WRITE;
/*!40000 ALTER TABLE `jogos_has_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `jogos_has_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_real_usuario` varchar(60) NOT NULL,
  `apelido_usuario` varchar(60) NOT NULL,
  `email_usuario` varchar(100) NOT NULL,
  `descricao_usuario` varchar(45) DEFAULT NULL,
  `senha_usuario` varchar(100) NOT NULL,
  `cargos_id_cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nome_fantasia_usuario_UNIQUE` (`apelido_usuario`),
  UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`),
  KEY `fk_usuarios_cargos_idx` (`cargos_id_cargo`),
  CONSTRAINT `fk_usuarios_cargos` FOREIGN KEY (`cargos_id_cargo`) REFERENCES `cargos` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (4,'Felipe Eduardo Falk','ThePersianBr','felipe.e.falk.27@gmail.com ',NULL,'71da484ff5975e427b90c2955a859e0c',3),(5,'Thiago Hattenhauer Pereira','Thiagohp1','thiagohattenhauer16@gmail.com ',NULL,'8970e489ab3a72a9e4e3023fd6db8949',3),(7,'Thiago Hattenhauer Pereira','thiago','thiago.pereira@ielusc.br',NULL,'202cb962ac59075b964b07152d234b70',2);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'mydb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-02 12:12:49
