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


-- Dumping database structure for payroll2
CREATE DATABASE IF NOT EXISTS `payroll2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `payroll2`;

-- Dumping structure for table payroll2.admin
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

-- Dumping data for table payroll2.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT IGNORE INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `role`, `status`, `created_on`) VALUES
	(1, 'Ngoni', '$2a$08$s.wd/cz7NyT5JkhsLj0RGuINOTv8pV1EtAGELoPn3dIOGpprVt9rW', 'Ngoni', 'Furusa', '', 1, '1', '2020-12-31');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table payroll2.advance_payments
CREATE TABLE IF NOT EXISTS `advance_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `date_advance` date NOT NULL,
  `payment_date` date DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.advance_payments: ~0 rows (approximately)
/*!40000 ALTER TABLE `advance_payments` DISABLE KEYS */;
INSERT IGNORE INTO `advance_payments` (`id`, `employee_id`, `description`, `amount`, `date_advance`, `payment_date`, `created`) VALUES
	(1, '1', 'ZESSCWU', 119.100000, '2021-01-01', '2021-01-25', '2021-01-24 22:07:59');
/*!40000 ALTER TABLE `advance_payments` ENABLE KEYS */;

-- Dumping structure for table payroll2.attendance
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.attendance: ~3 rows (approximately)
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT IGNORE INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
	(1, 1, '2021-01-11', '07:26:00', 1, '17:00:00', 9.5666666666667),
	(2, 1, '2021-01-12', '08:00:00', 1, '17:44:00', 9.7333333333333),
	(3, 1, '2021-01-13', '07:30:00', 1, '18:00:00', 10.5);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;

-- Dumping structure for table payroll2.deductions
CREATE TABLE IF NOT EXISTS `deductions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.deductions: ~0 rows (approximately)
/*!40000 ALTER TABLE `deductions` DISABLE KEYS */;
INSERT IGNORE INTO `deductions` (`id`, `description`, `amount`, `status`) VALUES
	(1, 'NASSA', NULL, 1),
	(2, 'AIDS Levy', NULL, 1),
	(3, 'Nyaradzo Funeral Policy', NULL, 1),
	(4, 'Medical AID', NULL, 1);
/*!40000 ALTER TABLE `deductions` ENABLE KEYS */;

-- Dumping structure for table payroll2.earnings
CREATE TABLE IF NOT EXISTS `earnings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.earnings: ~2 rows (approximately)
/*!40000 ALTER TABLE `earnings` DISABLE KEYS */;
INSERT IGNORE INTO `earnings` (`id`, `position`, `description`, `amount`, `dateadded`) VALUES
	(1, '1,2,3,4,5,7,8,9,12,14,15', 'HOUSING ALLOWANCE', 400.000000, '2021-01-24 21:59:40'),
	(2, '1,2,3,4,5,7,8,9,12,14,15', 'TRANSPORT ALLOWANCE', 350.000000, '2021-01-24 22:04:46');
/*!40000 ALTER TABLE `earnings` ENABLE KEYS */;

-- Dumping structure for table payroll2.earning_settings
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

-- Dumping data for table payroll2.earning_settings: ~2 rows (approximately)
/*!40000 ALTER TABLE `earning_settings` DISABLE KEYS */;
INSERT IGNORE INTO `earning_settings` (`id`, `earning_id`, `position`, `description`, `amount`, `month`, `year`, `dateadded`) VALUES
	(1, 1, '1,2,3,4,5,7,8,9,12,14,15', 'HOUSING ALLOWANCE', 400.000000, 1, '2021', '2021-01-28 14:37:32'),
	(2, 2, '1,2,3,4,5,7,8,9,12,14,15', 'TRANSPORT ALLOWANCE', 350.000000, 1, '2021', '2021-01-28 14:37:32'),
	(3, 1, '1,2,3,4,5,7,8,9,12,14,15', 'HOUSING ALLOWANCE', 400.000000, 2, '2021', '2021-02-04 15:34:50'),
	(4, 2, '1,2,3,4,5,7,8,9,12,14,15', 'TRANSPORT ALLOWANCE', 350.000000, 2, '2021', '2021-02-04 15:34:50');
/*!40000 ALTER TABLE `earning_settings` ENABLE KEYS */;

-- Dumping structure for table payroll2.employees
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
  `engagement_date` date DEFAULT NULL,
  PRIMARY KEY (`employee_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.employees: ~25 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT IGNORE INTO `employees` (`employee_id`, `firstname`, `middlename`, `lastname`, `email`, `address`, `birthdate`, `national_id`, `contact_info`, `gender`, `position_id`, `schedule_id`, `salary`, `photo`, `created_on`, `pay_day`, `account`, `engagement_date`) VALUES
	(1, 'PHILIS', '', 'LINDA', 'test1@test.com', 'Tennyson', '1995-09-01', '08-647230 M08', '0712', 'on', 1, 2, 2977.490000, NULL, '2021-01-18 16:55:06', 25, '3231 203585 001', '1995-09-01'),
	(2, 'ZENZO', '', 'LINDA', 'test2@test.com', 'Tennyson', '2014-05-01', '19-018208 P19', '0712', 'on', 2, 2, 3126.360000, NULL, '2021-01-18 16:57:24', 25, '3231 203585 001', '2014-05-01'),
	(3, 'ZODWA', '', 'MAFA', 'test@test.com', 'Tennyson', '2014-05-06', '79-040632 E21', '0712', 'on', 3, 1, 3619.150000, NULL, '2021-01-18 16:59:53', 25, '3231202381001', '2014-05-06'),
	(4, 'MGABHI', '', 'MASINA', 'test3@test.com', 'Tennyson', '2008-10-23', '53-025050 Y53', '0712', 'on', 2, 2, 3126.360000, NULL, '2021-01-18 17:02:16', 25, '3231-203592-001', '2008-10-23'),
	(5, 'OWEN', '', 'MASINA', 'test4@test.com', 'Tennyson', '2008-03-07', '08-917974-Z08', '0712', 'on', 4, 1, 2835.700000, NULL, '2021-01-18 17:09:58', 25, '3231-203582-001', '2008-03-07'),
	(6, 'IRENE', '', 'MHLANGA', 'test5@test.com', 'Tennyson', '1990-09-25', '08-518497-K39', '0712', 'on', 5, 2, 3800.110000, NULL, '2021-01-18 17:16:14', 25, '3231-203584-001', '1990-09-25'),
	(7, 'THABANI', '', 'MKANDAWIRE', 'test6@test.com', 'Tennyson', '2008-03-07', '84-037052-W56', '0712', 'on', 4, 1, 2835.700000, NULL, '2021-01-19 06:57:24', 25, '3231-203590-001', '2008-03-07'),
	(8, 'LEVITY', '', 'MOYO', 'test7@test.com', 'Tennyson', '2008-01-31', '08-605788-R73', '0712', 'on', 6, 1, 4189.620000, NULL, '2021-01-19 07:00:37', 25, '1005891524', '2008-01-31'),
	(9, 'ZANELE', '', 'MOYO', 'test8@test.com', 'Tennyson', '2004-06-02', '08-694625-D39', '0712', 'on', 7, 2, 4619.060000, NULL, '2021-01-19 07:02:38', 25, '0100246518800', '2004-06-02'),
	(10, 'JULIET', 'ENID', 'NDHLOVU', 'test9@test.com', 'Tennyson', '1982-01-01', '08-181727-F39', '072', 'on', 8, 2, 739.800000, NULL, '2021-01-19 07:05:08', 25, '3231-203586-001', '1982-01-01'),
	(11, 'ZIBUSISO', '', 'NDLOVU', 'test10@test.com', 'Tennyson', '2014-05-06', '08-204072-A39', '0712', 'on', 9, 2, 3446.810000, NULL, '2021-01-19 07:07:21', 25, '006314760409600', '2014-05-06'),
	(12, 'JONHIE', 'WALKER', 'NHLANE', 'test11@test.com', 'Tennyson', '2015-07-01', 'O8-022867-G08', '0712', 'on', 10, 2, 412.000000, NULL, '2021-01-19 07:09:36', 25, '3231-203587-001', '2015-07-01'),
	(13, 'BALENI', '', 'NYONI', 'test12@test.com', 'Tennyson', '2008-03-07', '84-001356-W84', '072', 'on', 4, 2, 2835.700000, NULL, '2021-01-19 07:12:20', 25, '84-001356-W84', '2008-03-07'),
	(14, 'MUSA', '', 'SIBANDA', 'test13@test.com', 'Tennyson', '1998-06-01', '19-013353-M19', '0172', 'on', 11, 5, 4189.620000, NULL, '2021-01-24 21:22:32', 25, '3231-203588-001', '1998-06-01'),
	(15, 'NKOSIPHENDULE', '', 'SIBANDA', 'test14@test.com', 'Tennyson', '2004-02-18', '08-754575-R35', '0712', 'on', 12, 1, 3446.810000, NULL, '2021-01-24 21:24:51', 25, '2326-1014653', '2004-02-18'),
	(16, 'SIBANGANI', '', 'SINGWANGO', 'test15@test.com', 'Tennyson', '2014-09-01', '67-081652-N67', '0712', 'on', 13, 1, 3282.680000, NULL, '2021-01-24 21:29:05', 25, '3231-202868-001', '2014-09-01'),
	(17, 'KENNETH', '', 'TSHABALALA', 'test16@test.com', 'Tennyson', '2000-01-01', '08-093904-W39', '072', 'on', 14, 1, 3282.680000, NULL, '2021-01-24 21:32:22', 25, '3231-203332-001', '2000-01-01'),
	(18, 'MGCINI', '', 'NDLOVU', 'test17@test.com', 'Tennyson', '2018-03-01', '84-055813 N84', '0772', 'on', 4, 1, 3835.700000, NULL, '2021-01-24 21:36:50', 25, '1006920655', '2018-03-01'),
	(19, 'GOODSON', '', 'KUNENE', 'test18@test.com', 'Tennyson', '2017-02-01', '08-061813 K35', '0772', 'on', 10, 1, 3990.110000, NULL, '2021-01-24 21:39:32', 25, '1004636027', '2017-02-01'),
	(20, 'NOMUSA', '', 'NCUBE', 'test19@test.com', 'Tennyson', '2020-02-18', '08 -208954 T 26', '0772', 'female', 16, 1, 2027.420000, NULL, '2021-01-24 21:41:29', 25, '1005739426', '2020-02-18'),
	(21, 'SOLETHU', '', 'DUBE', 'test20@test.com', 'Tennyson', '2020-02-25', '08 - 946587 A53', '0772', 'on', 16, 1, 2027.420000, NULL, '2021-01-24 21:45:54', 25, '4630332152200', '2020-02-25'),
	(22, 'TUMELO', '', 'DUVE', 'test21@test.com', 'Tennyson', '2020-02-25', '23 -2018539 N56', '0772', 'on', 16, 1, 2027.420000, NULL, '2021-01-24 21:47:24', 25, '1028142397', '2020-02-25'),
	(23, 'CHARITY', '', 'PANGWENA', 'test22@test.com', 'Tennyson', '2019-06-01', '56-135885 Q75', '0712', 'on', 16, 1, 2027.420000, NULL, '2021-01-24 21:49:43', 25, '263782166130', '2019-06-01'),
	(24, 'THANDOLWENKOSI', '', 'SIBANDA', 'test23@test.com', 'Tennyson', '2020-02-02', '08-929569 C53', '0772', 'on', 8, 0, 4189.620000, NULL, '2021-01-24 21:52:06', 25, '0000210707417', '2020-02-02'),
	(25, 'JORAM', '', 'MULEYA', 'test24@test.com', 'Tennyson', '2020-05-01', '08-076743 E06', '0772', 'on', 15, 1, 2835.700000, NULL, '2021-01-24 21:54:29', 25, '1522', '2020-05-01');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table payroll2.employee_data
CREATE TABLE IF NOT EXISTS `employee_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `kname` varchar(45) NOT NULL,
  `kaddress` varchar(45) NOT NULL,
  `kphone` varchar(45) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id_UNIQUE` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.employee_data: ~25 rows (approximately)
/*!40000 ALTER TABLE `employee_data` DISABLE KEYS */;
INSERT IGNORE INTO `employee_data` (`id`, `employee_id`, `kname`, `kaddress`, `kphone`, `date`) VALUES
	(1, 1, 'Tennyson', 'Tennyson', '0715', '2021-01-18 16:55:06'),
	(2, 2, 'Tennyson', 'Tennyson', '0715', '2021-01-18 16:57:24'),
	(3, 3, 'Tennyson', 'Tennyson', '0715', '2021-01-18 16:59:53'),
	(4, 4, 'Tennyson', 'Tennyson', '0715', '2021-01-18 17:02:16'),
	(5, 5, 'Tennyson', 'Tennyson', '0715', '2021-01-18 17:09:58'),
	(6, 6, 'Tennyson', 'Tennyson', '0715', '2021-01-18 17:16:14'),
	(7, 7, 'Tennyson', 'Tennyson', '0715', '2021-01-19 06:57:24'),
	(8, 8, 'Tennyson', 'Tennyson', '0715', '2021-01-19 07:00:37'),
	(9, 9, 'Tennyson', 'Tennyson', '0715', '2021-01-19 07:02:38'),
	(10, 10, 'Tennyson', 'Tennyson', '0712', '2021-01-19 07:05:08'),
	(11, 11, 'Tennyson', 'Tennyson', '0715', '2021-01-19 07:07:21'),
	(12, 12, 'Tennyson', 'Tennyson', '0715', '2021-01-19 07:09:36'),
	(13, 13, 'Tennyson', 'Tennyson', '0712', '2021-01-19 07:12:20'),
	(14, 14, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:22:32'),
	(15, 15, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:24:51'),
	(16, 16, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:29:05'),
	(17, 17, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:32:22'),
	(18, 18, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:36:50'),
	(19, 19, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:39:32'),
	(20, 20, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:41:29'),
	(21, 21, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:45:54'),
	(22, 22, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:47:24'),
	(23, 23, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:49:43'),
	(24, 24, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:52:06'),
	(25, 25, 'Tennyson', 'Tennyson', '0715', '2021-01-24 21:54:30');
/*!40000 ALTER TABLE `employee_data` ENABLE KEYS */;

-- Dumping structure for table payroll2.individual_earnings
CREATE TABLE IF NOT EXISTS `individual_earnings` (
  `id_earn` int(11) NOT NULL AUTO_INCREMENT,
  `employee` int(11) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '0',
  `amount` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `is_taxable` enum('0','1') DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_earn`),
  UNIQUE KEY `id_earn` (`id_earn`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.individual_earnings: ~0 rows (approximately)
/*!40000 ALTER TABLE `individual_earnings` DISABLE KEYS */;
/*!40000 ALTER TABLE `individual_earnings` ENABLE KEYS */;

-- Dumping structure for table payroll2.individual_earning_settings
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table payroll2.individual_earning_settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `individual_earning_settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `individual_earning_settings` ENABLE KEYS */;

-- Dumping structure for table payroll2.overtime
CREATE TABLE IF NOT EXISTS `overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) NOT NULL,
  `hours` double NOT NULL,
  `rate` double NOT NULL,
  `date_overtime` date NOT NULL,
  `status` enum('pending','paid') DEFAULT 'pending',
  `payment_month` int(11) DEFAULT NULL,
  `payment_year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.overtime: ~0 rows (approximately)
/*!40000 ALTER TABLE `overtime` DISABLE KEYS */;
/*!40000 ALTER TABLE `overtime` ENABLE KEYS */;

-- Dumping structure for table payroll2.payee_settings
CREATE TABLE IF NOT EXISTS `payee_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `end` decimal(20,6) NOT NULL DEFAULT '0.000000',
  `deduct` decimal(20,6) DEFAULT NULL,
  `month` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.payee_settings: ~6 rows (approximately)
/*!40000 ALTER TABLE `payee_settings` DISABLE KEYS */;
INSERT IGNORE INTO `payee_settings` (`id`, `start`, `end`, `deduct`, `month`, `year`, `date`) VALUES
	(1, 10000.010000, 30000.000000, 2000.000000, 1, '2021', '2021-01-07 13:19:09'),
	(2, 30000.010000, 60000.000000, 3500.000000, 1, '2021', '2021-01-07 13:19:09'),
	(3, 60000.000000, 120000.000000, 6500.000000, 1, '2021', '2021-01-07 13:19:09'),
	(4, 120000.010000, 250000.000000, 12500.000000, 1, '2021', '2021-01-07 13:19:09'),
	(5, 0.000000, 10000.000000, 0.000000, 1, '2021', '2021-01-07 13:19:09'),
	(6, 250000.010000, 10000000000000.000000, 25000.000000, 1, '2021', '2021-01-07 13:19:09'),
	(7, 10000.010000, 30000.000000, 2000.000000, 2, '2021', '2021-02-04 15:34:50'),
	(8, 30000.010000, 60000.000000, 3500.000000, 2, '2021', '2021-02-04 15:34:50'),
	(9, 60000.000000, 120000.000000, 6500.000000, 2, '2021', '2021-02-04 15:34:50'),
	(10, 120000.010000, 250000.000000, 12500.000000, 2, '2021', '2021-02-04 15:34:50'),
	(11, 0.000000, 10000.000000, 0.000000, 2, '2021', '2021-02-04 15:34:50'),
	(12, 250000.010000, 10000000000000.000000, 25000.000000, 2, '2021', '2021-02-04 15:34:51');
/*!40000 ALTER TABLE `payee_settings` ENABLE KEYS */;

-- Dumping structure for table payroll2.payee_tax_bands
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

-- Dumping data for table payroll2.payee_tax_bands: ~6 rows (approximately)
/*!40000 ALTER TABLE `payee_tax_bands` DISABLE KEYS */;
INSERT IGNORE INTO `payee_tax_bands` (`id_payee_tax_band`, `rate`, `start`, `end`, `status`, `added`, `subtract`) VALUES
	(1, 20.000000, 10000.010000, 30000.000000, '1', '2021-01-01 23:16:04', 2000.000000),
	(2, 25.000000, 30000.010000, 60000.000000, '1', '2021-01-02 08:02:05', 3500.000000),
	(3, 30.000000, 60000.000000, 120000.000000, '1', '2021-01-02 08:03:23', 6500.000000),
	(4, 35.000000, 120000.010000, 250000.000000, '1', '2021-01-04 08:52:53', 12500.000000),
	(5, 0.000000, 0.000000, 10000.000000, '1', '2021-01-05 14:57:40', 0.000000),
	(6, 40.000000, 250000.010000, 10000000000000.000000, '1', '2021-01-05 15:05:40', 25000.000000);
/*!40000 ALTER TABLE `payee_tax_bands` ENABLE KEYS */;

-- Dumping structure for table payroll2.payroll
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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.payroll: ~25 rows (approximately)
/*!40000 ALTER TABLE `payroll` DISABLE KEYS */;
INSERT IGNORE INTO `payroll` (`pid`, `employee_id`, `position`, `gross`, `deductions`, `net`, `month`, `year`, `created`) VALUES
	(1, 3, 3, 3619.150000, 0.000000, 4369.150000, 1, '2021', '2021-01-28 11:03:53'),
	(2, 5, 4, 2835.700000, 0.000000, 3585.700000, 1, '2021', '2021-01-28 11:03:53'),
	(3, 7, 4, 2835.700000, 0.000000, 3585.700000, 1, '2021', '2021-01-28 11:03:53'),
	(4, 8, 6, 4189.620000, 0.000000, 4189.620000, 1, '2021', '2021-01-28 11:03:53'),
	(5, 15, 12, 3446.810000, 0.000000, 4196.810000, 1, '2021', '2021-01-28 11:03:53'),
	(6, 16, 13, 3282.680000, 0.000000, 3282.680000, 1, '2021', '2021-01-28 11:03:53'),
	(7, 17, 14, 3282.680000, 0.000000, 4032.680000, 1, '2021', '2021-01-28 11:03:53'),
	(8, 18, 4, 3835.700000, 0.000000, 4585.700000, 1, '2021', '2021-01-28 11:03:53'),
	(9, 19, 10, 3990.110000, 0.000000, 3990.110000, 1, '2021', '2021-01-28 11:03:53'),
	(10, 20, 16, 2027.420000, 0.000000, 2027.420000, 1, '2021', '2021-01-28 11:03:53'),
	(11, 21, 16, 2027.420000, 0.000000, 2027.420000, 1, '2021', '2021-01-28 11:03:53'),
	(12, 22, 16, 2027.420000, 0.000000, 2027.420000, 1, '2021', '2021-01-28 11:03:53'),
	(13, 23, 16, 2027.420000, 920.000000, 1107.420000, 1, '2021', '2021-01-28 11:03:53'),
	(14, 25, 15, 2835.700000, 0.000000, 3585.700000, 1, '2021', '2021-01-28 11:03:53'),
	(15, 1, 1, 2977.490000, 119.100000, 3608.390000, 1, '2021', '2021-01-28 11:03:53'),
	(16, 2, 2, 3126.360000, 2105.680000, 1770.680000, 1, '2021', '2021-01-28 11:03:53'),
	(17, 4, 2, 3126.360000, 0.000000, 3876.360000, 1, '2021', '2021-01-28 11:03:54'),
	(18, 6, 5, 3800.110000, 1065.000000, 3485.110000, 1, '2021', '2021-01-28 11:03:54'),
	(19, 9, 7, 4619.060000, 0.000000, 5369.060000, 1, '2021', '2021-01-28 11:03:54'),
	(20, 10, 8, 739.800000, 0.000000, 1489.800000, 1, '2021', '2021-01-28 11:03:54'),
	(21, 11, 9, 3446.810000, 0.000000, 4196.810000, 1, '2021', '2021-01-28 11:03:54'),
	(22, 12, 10, 412.000000, 0.000000, 412.000000, 1, '2021', '2021-01-28 11:03:54'),
	(23, 13, 4, 2835.700000, 920.000000, 2665.700000, 1, '2021', '2021-01-28 11:03:54'),
	(24, 14, 11, 4189.620000, 0.000000, 4189.620000, 1, '2021', '2021-01-28 11:03:54'),
	(25, 24, 8, 4189.620000, 0.000000, 4939.620000, 1, '2021', '2021-01-28 11:03:54'),
	(26, 3, 3, 3619.150000, 0.000000, 4369.150000, 2, '2021', '2021-02-04 15:34:51'),
	(27, 5, 4, 2835.700000, 0.000000, 3585.700000, 2, '2021', '2021-02-04 15:34:51'),
	(28, 7, 4, 2835.700000, 0.000000, 3585.700000, 2, '2021', '2021-02-04 15:34:51'),
	(29, 8, 6, 4189.620000, 0.000000, 4189.620000, 2, '2021', '2021-02-04 15:34:51'),
	(30, 15, 12, 3446.810000, 0.000000, 4196.810000, 2, '2021', '2021-02-04 15:34:51'),
	(31, 16, 13, 3282.680000, 0.000000, 3282.680000, 2, '2021', '2021-02-04 15:34:51'),
	(32, 17, 14, 3282.680000, 0.000000, 4032.680000, 2, '2021', '2021-02-04 15:34:51'),
	(33, 18, 4, 3835.700000, 0.000000, 4585.700000, 2, '2021', '2021-02-04 15:34:51'),
	(34, 19, 10, 3990.110000, 0.000000, 3990.110000, 2, '2021', '2021-02-04 15:34:51'),
	(35, 20, 16, 2027.420000, 0.000000, 2027.420000, 2, '2021', '2021-02-04 15:34:51'),
	(36, 21, 16, 2027.420000, 0.000000, 2027.420000, 2, '2021', '2021-02-04 15:34:51'),
	(37, 22, 16, 2027.420000, 0.000000, 2027.420000, 2, '2021', '2021-02-04 15:34:51'),
	(38, 23, 16, 2027.420000, 920.000000, 1107.420000, 2, '2021', '2021-02-04 15:34:51'),
	(39, 25, 15, 2835.700000, 0.000000, 3585.700000, 2, '2021', '2021-02-04 15:34:51'),
	(40, 1, 1, 2977.490000, 1920.000000, 1807.490000, 2, '2021', '2021-02-04 15:34:52'),
	(41, 2, 2, 3126.360000, 1330.000000, 2546.360000, 2, '2021', '2021-02-04 15:34:52'),
	(42, 4, 2, 3126.360000, 0.000000, 3876.360000, 2, '2021', '2021-02-04 15:34:52'),
	(43, 6, 5, 3800.110000, 1065.000000, 3485.110000, 2, '2021', '2021-02-04 15:34:52'),
	(44, 9, 7, 4619.060000, 0.000000, 5369.060000, 2, '2021', '2021-02-04 15:34:52'),
	(45, 10, 8, 739.800000, 0.000000, 1489.800000, 2, '2021', '2021-02-04 15:34:52'),
	(46, 11, 9, 3446.810000, 0.000000, 4196.810000, 2, '2021', '2021-02-04 15:34:52'),
	(47, 12, 10, 412.000000, 0.000000, 412.000000, 2, '2021', '2021-02-04 15:34:52'),
	(48, 13, 4, 2835.700000, 920.000000, 2665.700000, 2, '2021', '2021-02-04 15:34:52'),
	(49, 14, 11, 4189.620000, 0.000000, 4189.620000, 2, '2021', '2021-02-04 15:34:53'),
	(50, 24, 8, 4189.620000, 0.000000, 4939.620000, 2, '2021', '2021-02-04 15:34:53');
/*!40000 ALTER TABLE `payroll` ENABLE KEYS */;

-- Dumping structure for table payroll2.position
CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL,
  `grade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.position: ~16 rows (approximately)
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT IGNORE INTO `position` (`id`, `description`, `rate`, `grade`) VALUES
	(1, 'MESSENGER', 1, 0),
	(2, 'ASSISTANT COOK', 1, 0),
	(3, 'SENIOR COOK', 1, 0),
	(4, 'GENERAL HAND', 1, 0),
	(5, 'ACCOUNTS CLERK', 1, 0),
	(6, 'MATRON', 1, 0),
	(7, 'BOOKKEEPER', 1, 0),
	(8, 'LIBRARIAN', 1, 0),
	(9, 'LAB TECH', 1, 0),
	(10, 'DRIVER', 1, 6),
	(11, 'BOARDING MASTER', 1, 0),
	(12, 'RECEP/CLERK TYPIST', 1, 0),
	(13, 'COOK', 1, 0),
	(14, 'SECURITY GUARD', 1, 0),
	(15, 'GARDENER', 1, 0),
	(16, 'TEACHER', 1, 0);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;

-- Dumping structure for table payroll2.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_UNIQUE` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT IGNORE INTO `roles` (`id`, `role`) VALUES
	(1, 'Admin');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table payroll2.schedules
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.schedules: ~5 rows (approximately)
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT IGNORE INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
	(1, '08:00:00', '16:30:00'),
	(2, '08:00:00', '17:00:00'),
	(3, '09:00:00', '18:00:00'),
	(4, '10:00:00', '19:00:00'),
	(5, '18:00:00', '06:00:00');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;

-- Dumping structure for table payroll2.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `amount` decimal(20,6) NOT NULL,
  `month` int(11) NOT NULL,
  `year` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.settings: ~0 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT IGNORE INTO `settings` (`id`, `did`, `employee`, `description`, `amount`, `month`, `year`, `date`, `status`) VALUES
	(1, 1, 1, 'NASSA', 100.000000, 2, '2021', '2021-02-04 15:03:18', 1),
	(2, 2, 1, 'AIDS Levy', 20.000000, 2, '2021', '2021-02-04 15:03:18', 1),
	(3, 3, 1, 'Nyaradzo Funeral Policy', 1200.000000, 2, '2021', '2021-02-04 15:03:18', 1),
	(4, 4, 1, 'Medical AID', 600.000000, 2, '2021', '2021-02-04 15:03:18', 1),
	(5, 1, 2, 'NASSA', 200.000000, 2, '2021', '2021-02-04 15:29:26', 1),
	(6, 2, 2, 'AIDS Levy', 30.000000, 2, '2021', '2021-02-04 15:29:26', 1),
	(7, 3, 2, 'Nyaradzo Funeral Policy', 700.000000, 2, '2021', '2021-02-04 15:29:26', 1),
	(8, 4, 2, 'Medical AID', 400.000000, 2, '2021', '2021-02-04 15:29:27', 1),
	(9, 1, 6, 'NASSA', 300.000000, 1, '2021', '2021-02-04 16:59:00', 1),
	(10, 2, 6, 'AIDS Levy', 15.000000, 1, '2021', '2021-02-04 16:59:00', 1),
	(11, 3, 6, 'Nyaradzo Funeral Policy', 450.000000, 1, '2021', '2021-02-04 16:59:00', 1),
	(12, 4, 6, 'Medical AID', 300.000000, 1, '2021', '2021-02-04 16:59:00', 1),
	(13, 1, 6, 'NASSA', 300.000000, 2, '2021', '2021-02-04 17:24:09', 1),
	(14, 2, 6, 'AIDS Levy', 15.000000, 2, '2021', '2021-02-04 17:24:09', 1),
	(15, 3, 6, 'Nyaradzo Funeral Policy', 450.000000, 2, '2021', '2021-02-04 17:24:09', 1),
	(16, 4, 6, 'Medical AID', 300.000000, 2, '2021', '2021-02-04 17:24:09', 1),
	(17, 1, 2, 'NASSA', 100.000000, 1, '2021', '2021-02-04 17:27:43', 1),
	(18, 2, 2, 'AIDS Levy', 30.000000, 1, '2021', '2021-02-04 17:27:43', 1),
	(19, 3, 2, 'Nyaradzo Funeral Policy', 1340.680000, 1, '2021', '2021-02-04 17:27:43', 1),
	(20, 4, 2, 'Medical AID', 635.000000, 1, '2021', '2021-02-04 17:27:44', 1),
	(21, 1, 13, 'NASSA', 150.000000, 1, '2021', '2021-02-04 17:56:26', 1),
	(22, 2, 13, 'AIDS Levy', 20.000000, 1, '2021', '2021-02-04 17:56:26', 1),
	(23, 3, 13, 'Nyaradzo Funeral Policy', 400.000000, 1, '2021', '2021-02-04 17:56:26', 1),
	(24, 4, 13, 'Medical AID', 350.000000, 1, '2021', '2021-02-04 17:56:26', 1),
	(25, 1, 23, 'NASSA', 200.000000, 1, '2021', '2021-02-04 17:59:29', 1),
	(26, 2, 23, 'AIDS Levy', 70.000000, 1, '2021', '2021-02-04 17:59:29', 1),
	(27, 3, 23, 'Nyaradzo Funeral Policy', 400.000000, 1, '2021', '2021-02-04 17:59:29', 1),
	(28, 4, 23, 'Medical AID', 250.000000, 1, '2021', '2021-02-04 17:59:29', 1),
	(29, 1, 23, 'NASSA', 200.000000, 2, '2021', '2021-02-04 18:01:21', 1),
	(30, 2, 23, 'AIDS Levy', 70.000000, 2, '2021', '2021-02-04 18:01:21', 1),
	(31, 3, 23, 'Nyaradzo Funeral Policy', 400.000000, 2, '2021', '2021-02-04 18:01:21', 1),
	(32, 4, 23, 'Medical AID', 250.000000, 2, '2021', '2021-02-04 18:01:21', 1),
	(33, 1, 13, 'NASSA', 150.000000, 2, '2021', '2021-02-04 18:03:45', 1),
	(34, 2, 13, 'AIDS Levy', 20.000000, 2, '2021', '2021-02-04 18:03:45', 1),
	(35, 3, 13, 'Nyaradzo Funeral Policy', 400.000000, 2, '2021', '2021-02-04 18:03:45', 1),
	(36, 4, 13, 'Medical AID', 350.000000, 2, '2021', '2021-02-04 18:03:45', 1);
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table payroll2.subscriptions
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `subid` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL DEFAULT '0',
  `key` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`subid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table payroll2.subscriptions: ~0 rows (approximately)
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
