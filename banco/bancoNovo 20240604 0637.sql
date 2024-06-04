-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema simples_sistema
--

CREATE DATABASE IF NOT EXISTS simples_sistema;
USE simples_sistema;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emailAdm` varchar(45) NOT NULL,
  `senhaAdm` varchar(45) NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`emailAdm`,`senhaAdm`,`ativo`) VALUES 
 (1,'clarisse@gmail.com','123456789','A'),
 (2,'clarisse@gmail.com','123456789','A'),
 (3,'clarisse@gmail.com','123456789','A'),
 (4,'adm','*','A'),
 (5,'adm','*','A'),
 (6,'adm','*','A'),
 (7,'adm','*','A'),
 (8,'ademir@gmail.com','123456789','A'),
 (9,'ademir@gmail.com','123456789','A'),
 (10,'ademir@gmail.com','123456789','A'),
 (11,'ademir@gmail.com','123456789','A'),
 (12,'ademir@gmail.com','123456789','A'),
 (13,'ademir@gmail.com','123456789','A'),
 (14,'ademir@gmail.com','123456789','A'),
 (15,'ademir@gmail.com','123456789','A'),
 (16,'ademir@gmail.com','123456789','A'),
 (17,'ademir@gmail.com','123456789','A'),
 (18,'ademir@gmail.com','123456789','A'),
 (19,'cla1234@gmail.com','clarisse01','A'),
 (20,'mar@gmail.com','123456789','A');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE `conta` (
  `idconta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL DEFAULT 'Corrente',
  `saldo` float NOT NULL DEFAULT 0,
  `titular` varchar(45) NOT NULL,
  PRIMARY KEY (`idconta`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conta`
--

/*!40000 ALTER TABLE `conta` DISABLE KEYS */;
INSERT INTO `conta` (`idconta`,`tipo`,`saldo`,`titular`) VALUES 
 (1,'Corrente',3800,'Clarisse'),
 (2,'Corrente',100,'Ronan');
/*!40000 ALTER TABLE `conta` ENABLE KEYS */;


--
-- Definition of table `itens_biblioteca`
--

DROP TABLE IF EXISTS `itens_biblioteca`;
CREATE TABLE `itens_biblioteca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `autor` varchar(145) NOT NULL,
  `edicao` varchar(145) NOT NULL,
  `ano` varchar(145) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `itens_biblioteca`
--

/*!40000 ALTER TABLE `itens_biblioteca` DISABLE KEYS */;
/*!40000 ALTER TABLE `itens_biblioteca` ENABLE KEYS */;


--
-- Definition of table `livro`
--

DROP TABLE IF EXISTS `livro`;
CREATE TABLE `livro` (
  `idlivro` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeLivro` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `ano` varchar(45) NOT NULL,
  `disponivel` char(1) NOT NULL DEFAULT 'S',
  PRIMARY KEY (`idlivro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livro`
--

/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
