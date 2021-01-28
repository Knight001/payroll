-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.32-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for payroll
CREATE DATABASE IF NOT EXISTS `payroll` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `payroll`;

-- Dumping structure for table payroll.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `status` enum('0','1') DEFAULT '1',
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.advance_payments
CREATE TABLE IF NOT EXISTS `advance_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `date_advance` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.deductions
CREATE TABLE IF NOT EXISTS `deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.earnings
CREATE TABLE IF NOT EXISTS `earnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.earning_settings
CREATE TABLE IF NOT EXISTS `earning_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `earning_id` int(11) DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `month` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table payroll.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(15) NOT NULL,
  `middlename` varchar(45) DEFAULT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(45) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `national_id` varchar(50) DEFAULT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `salary` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `photo` varchar(200) DEFAULT NULL,
  `created_on` datetime NOT NULL,
  `pay_day` int(11) DEFAULT '24',
  `account` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.employee_data
CREATE TABLE IF NOT EXISTS `employee_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `kname` varchar(45) NOT NULL,
  `kaddress` varchar(45) NOT NULL,
  `kphone` varchar(45) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id_UNIQUE` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.individual_earnings
CREATE TABLE IF NOT EXISTS `individual_earnings` (
  `id_earn` int(11) NOT NULL AUTO_INCREMENT,
  `employee` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '0',
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `is_taxable` enum('0','1') DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_earn`),
  UNIQUE KEY `id_earn` (`id_earn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.individual_earning_settings
CREATE TABLE IF NOT EXISTS `individual_earning_settings` (
  `id_earn` int(11) NOT NULL AUTO_INCREMENT,
  `employee` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '0',
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `is_taxable` enum('0','1') DEFAULT '0',
  `month` int(11) NOT NULL DEFAULT '0',
  `year` year(4) NOT NULL DEFAULT '0000',
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id_earn`) USING BTREE,
  UNIQUE KEY `id_earn` (`id_earn`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table payroll.overtime
CREATE TABLE IF NOT EXISTS `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.payee_settings
CREATE TABLE IF NOT EXISTS `payee_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `end` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `deduct` decimal(20,6) DEFAULT NULL,
  `month` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.payee_tax_bands
CREATE TABLE IF NOT EXISTS `payee_tax_bands` (
  `id_payee_tax_band` int(11) NOT NULL AUTO_INCREMENT,
  `rate` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `start` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `end` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `added` datetime NOT NULL,
  `subtract` decimal(20,6) unsigned DEFAULT '0.000000',
  PRIMARY KEY (`id_payee_tax_band`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.payroll
CREATE TABLE IF NOT EXISTS `payroll` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `gross` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `deductions` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `net` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `month` int(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_UNIQUE` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.schedules
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` decimal(20,6) NOT NULL,
  `month` int(11) NOT NULL,
  `year` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table payroll.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL DEFAULT '0',
  `key` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
