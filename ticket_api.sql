-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tickets_api
CREATE DATABASE IF NOT EXISTS `tickets_api` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tickets_api`;

-- Dumping structure for table tickets_api.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `ticket` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table tickets_api.tickets: 4 rows
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` (`ticket_id`, `type_id`, `ticket`, `date_added`, `date_modified`) VALUES
	(1, 1, 'Ticket-1403645', '2019-01-10 02:39:29', '2019-01-10 03:16:56'),
	(6, 4, 'Ticket-0051520', '2019-01-10 03:16:37', '2019-01-10 03:16:37'),
	(5, 3, 'Ticket-3035112', '2019-01-10 03:16:32', '2019-01-10 03:16:32'),
	(4, 1, 'Ticket-1653654', '2019-01-10 02:50:23', '2019-01-10 02:50:23');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;

-- Dumping structure for table tickets_api.ticket_type
CREATE TABLE IF NOT EXISTS `ticket_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table tickets_api.ticket_type: 4 rows
/*!40000 ALTER TABLE `ticket_type` DISABLE KEYS */;
INSERT INTO `ticket_type` (`type_id`, `type_name`, `date_added`, `date_modified`) VALUES
	(1, 'Basic', '2019-01-10 01:56:01', '2019-01-10 02:23:00'),
	(2, 'Gold', '2019-01-10 01:58:56', '2019-01-10 02:23:11'),
	(3, ' Standard', '2019-01-10 03:15:48', '2019-01-10 03:15:48'),
	(4, ' Premium', '2019-01-10 03:16:13', '2019-01-10 03:16:13');
/*!40000 ALTER TABLE `ticket_type` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
