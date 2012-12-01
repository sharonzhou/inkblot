-- MySQL dump 10.13  Distrib 5.5.27, for Linux (i686)
--
-- Host: localhost    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.27

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL,
  `transaction` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `symbol` varchar(255) NOT NULL,
  `shares` int(11) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (7,'BUY','0000-00-00 00:00:00','GOOG',3,652.00),(7,'BUY','0000-00-00 00:00:00','GOOG',5,652.00),(7,'BUY','0000-00-00 00:00:00','GOOG',5,652.00),(7,'BUY','2012-11-09 06:09:30','GOOG',4,652.00),(7,'BUY','2012-11-09 06:10:28','GOOG',1,652.00),(7,'BUY','2012-11-09 06:13:25','GOOG',5,652.00),(7,'BUY','2012-11-09 06:14:17','GOOG',3,652.00),(7,'BUY','2012-11-09 06:17:12','GOOG',9,652.00),(7,'BUY','2012-11-09 06:20:03','GOOG',7,652.00),(7,'SELL','2012-11-09 06:20:08','GOOG',7,652.00),(7,'BUY','2012-11-09 06:22:12','GOOG',6,652.00),(7,'SELL','2012-11-09 06:24:25','GOOG',6,652.00),(7,'BUY','2012-11-09 06:27:47','GOOG',12,652.00),(7,'SELL','2012-11-09 06:27:52','GOOG',12,652.00),(7,'BUY','2012-11-09 06:33:23','GOOG',14,652.00),(7,'SELL','2012-11-09 06:33:29','GOOG',14,652.00),(7,'BUY','2012-11-09 06:33:52','GOOG',2,652.00),(7,'BUY','2012-11-09 06:36:46','GOOG',5,652.00),(7,'SELL','2012-11-09 06:37:37','GOOG',7,652.00),(7,'BUY','2012-11-09 06:40:21','GOOG',5,652.00),(7,'SELL','2012-11-09 06:42:04','GOOG',5,652.00),(7,'SELL','2012-11-09 06:42:42','GOOG',5,652.00);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolio`
--

DROP TABLE IF EXISTS `portfolio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolio` (
  `id` int(10) unsigned NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `shares` int(11) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `total` decimal(65,2) unsigned NOT NULL,
  PRIMARY KEY (`id`,`symbol`),
  KEY `Shares` (`shares`,`price`,`total`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolio`
--

LOCK TABLES `portfolio` WRITE;
/*!40000 ALTER TABLE `portfolio` DISABLE KEYS */;
INSERT INTO `portfolio` VALUES (1,'AAPL',10,0.00,0.00),(2,'AAPL',10,0.00,0.00),(3,'AAPL',10,0.00,0.00),(4,'AAPL',10,0.00,0.00),(5,'AAPL',10,0.00,0.00),(6,'AAPL',10,0.00,0.00),(7,'AAPL',10,0.00,0.00),(8,'AAPL',10,0.00,0.00),(9,'AAPL',10,0.00,0.00);
/*!40000 ALTER TABLE `portfolio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `cash` decimal(65,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'caesar','$1$50$GHABNWBNE/o4VL7QjmQ6x0',10000.00),(2,'cs50','$1$50$ceNa7BV5AoVQqilACNLuC1',10000.00),(3,'jharvard','$1$50$RX3wnAMNrGIbgzbRYrxM1/',10000.00),(4,'malan','$1$HA$azTGIMVlmPi9W9Y12cYSj/',10000.00),(5,'nate','$1$50$sUyTaTbiSKVPZCpjJckan0',10000.00),(6,'rbowden','$1$50$lJS9HiGK6sphej8c4bnbX.',10000.00),(7,'skroob','$1$50$euBi4ugiJmbpIbvTTfmfI.',23045.80),(8,'tmacwilliam','$1$50$91ya4AroFPepdLpiX.bdP1',10000.00),(9,'zamyla','$1$50$Suq.MOtQj51maavfKvFsW1',10000.00),(111,'hi','$1$TMJLiX1L$ZAHXM4twDeml4yJ8qa5UW1',10000.00),(115,'sharon','$1$WyuClU/o$LMklC3aBdSIZI/EHz8xKp.',10000.00);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-11-09  3:24:13
