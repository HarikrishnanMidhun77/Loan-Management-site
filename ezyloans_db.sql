# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: ezyloans
# Generation Time: 2018-06-21 18:34:50 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cust
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cust`;

CREATE TABLE `cust` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(20) DEFAULT NULL,
  `customer_phone` varchar(10) DEFAULT NULL,
  `loan_type` enum('New Car loan','Used Car loan','Two-wheeler loan','Commercial vehicle loan','Home loan','Personal loan','Property loan') DEFAULT NULL,
  `loan_number` varchar(15) DEFAULT NULL,
  `loan_amount` varchar(25) DEFAULT NULL,
  `loan_tenure` varchar(10) DEFAULT NULL,
  `emi_amount` varchar(15) DEFAULT NULL,
  `emi_date` date DEFAULT NULL,
  `customer_location` varchar(200) DEFAULT NULL,
  `customer_email` varchar(100) DEFAULT NULL,
  `customer_dob` date DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cust` WRITE;
/*!40000 ALTER TABLE `cust` DISABLE KEYS */;

INSERT INTO `cust` (`id`, `customer_name`, `customer_phone`, `loan_type`, `loan_number`, `loan_amount`, `loan_tenure`, `emi_amount`, `emi_date`, `customer_location`, `customer_email`, `customer_dob`, `bank_name`)
VALUES
	(1,'Suraj R','8943551467','Two-wheeler loan','12231314','31313','131','311313','2018-05-30','Pathanamthitta','rsuraj38@gmail.com','2018-06-15','asad'),
	(2,'Suraj R','8943551467','Two-wheeler loan','12231314','31313','131','311313','2018-05-30','Pathanamthitta','rsuraj38@gmail.com','2018-06-15','asad'),
	(3,'Suraj R','8943551467','Two-wheeler loan','12231314','31313','131','311313','2018-05-30','Pathanamthitta','rsuraj38@gmail.com','2018-06-15','asad'),
	(4,'Suraj R','8943551467','Two-wheeler loan','12231314','31313','131','311313','2018-05-30','Pathanamthitta','rsuraj38@gmail.com','2018-06-15','asad');

/*!40000 ALTER TABLE `cust` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table login
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;

INSERT INTO `login` (`id`, `username`, `password`, `first_name`, `last_name`)
VALUES
	(1,'ezyloan','ezy111@','123','123');

/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
