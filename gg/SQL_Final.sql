-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for project
CREATE DATABASE IF NOT EXISTS `project` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `project`;

-- Dumping structure for table project.domain_type
CREATE TABLE IF NOT EXISTS `domain_type` (
  `domain_id` varchar(50) NOT NULL,
  `domain_typee` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`domain_id`),
  KEY `domain_type` (`domain_typee`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.domain_type: ~3 rows (approximately)
/*!40000 ALTER TABLE `domain_type` DISABLE KEYS */;
INSERT INTO `domain_type` (`domain_id`, `domain_typee`) VALUES
	('Register', 'จดโดเมน'),
	('Time_add', 'ต่ออายุโดเมน'),
	('Move', 'ย้ายโดเมน');
/*!40000 ALTER TABLE `domain_type` ENABLE KEYS */;

-- Dumping structure for table project.oder_domain
CREATE TABLE IF NOT EXISTS `oder_domain` (
  `oder_domain_id` int(11) NOT NULL AUTO_INCREMENT,
  `oder_domain_name` varchar(50) NOT NULL,
  `oder_domain_lastname` varchar(50) NOT NULL DEFAULT '',
  `oder_domain_time_rent` varchar(50) NOT NULL,
  `oder_domain_time_date` varchar(50) NOT NULL,
  `oder_domain_price` float NOT NULL DEFAULT 0,
  `oder_domain_type` varchar(50) DEFAULT NULL,
  `oder_domain_start` datetime DEFAULT NULL,
  `oder_domain_end` datetime DEFAULT NULL,
  `oder_domain_email` varchar(50) DEFAULT NULL,
  `oder_domain_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`oder_domain_id`) USING BTREE,
  KEY `FK_oder_domain_domain_type` (`oder_domain_type`) USING BTREE,
  KEY `oder_domain_status` (`oder_domain_status`) USING BTREE,
  KEY `oder_domain_time_date` (`oder_domain_time_date`) USING BTREE,
  CONSTRAINT `FK_oder_domain_domain_type` FOREIGN KEY (`oder_domain_type`) REFERENCES `domain_type` (`domain_typee`),
  CONSTRAINT `FK_oder_domain_project.period_of_payment` FOREIGN KEY (`oder_domain_time_date`) REFERENCES `period_of_payment` (`pop_id`),
  CONSTRAINT `FK_oder_domain_project.status` FOREIGN KEY (`oder_domain_status`) REFERENCES `status` (`status_type`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.oder_domain: ~0 rows (approximately)
/*!40000 ALTER TABLE `oder_domain` DISABLE KEYS */;
INSERT INTO `oder_domain` (`oder_domain_id`, `oder_domain_name`, `oder_domain_lastname`, `oder_domain_time_rent`, `oder_domain_time_date`, `oder_domain_price`, `oder_domain_type`, `oder_domain_start`, `oder_domain_end`, `oder_domain_email`, `oder_domain_status`) VALUES
	(9, 'chakhit', '.test', '1', 'Yearly', 987, 'จดโดเมน', '2022-04-27 16:44:17', '2024-04-27 16:44:17', 'bbb@bbb.com', 'พร้อมใช้งาน');
/*!40000 ALTER TABLE `oder_domain` ENABLE KEYS */;

-- Dumping structure for table project.oder_item
CREATE TABLE IF NOT EXISTS `oder_item` (
  `oder_id` int(100) NOT NULL AUTO_INCREMENT,
  `oder_package_id` int(50) NOT NULL,
  `oder_package_type` varchar(50) NOT NULL DEFAULT '',
  `oder_os` varchar(50) NOT NULL DEFAULT '',
  `oder_price` float NOT NULL,
  `oder_time_rent` int(11) NOT NULL,
  `oder_time_rent_date_type` varchar(50) NOT NULL,
  `oder_name_server` varchar(50) DEFAULT NULL,
  `oder_password_server` varchar(50) DEFAULT NULL,
  `oder_email` varchar(50) DEFAULT NULL,
  `oder_time_start` datetime DEFAULT NULL,
  `oder_time_end` datetime DEFAULT NULL,
  `oder_status` varchar(50) DEFAULT NULL,
  `oder_ip` varchar(50) NOT NULL DEFAULT '0',
  `oder_status_price` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`oder_id`),
  KEY `FK_oder_item_period_of_payment` (`oder_time_rent_date_type`),
  KEY `FK_oder_item_package_plan_vps` (`oder_package_id`),
  KEY `FK_oder_item_status_2` (`oder_status`),
  KEY `FK_oder_item_pm_status` (`oder_status_price`),
  KEY `FK_oder_item_operating_system` (`oder_os`),
  CONSTRAINT `FK_oder_item_period_of_payment` FOREIGN KEY (`oder_time_rent_date_type`) REFERENCES `period_of_payment` (`pop_id`),
  CONSTRAINT `FK_oder_item_pm_status` FOREIGN KEY (`oder_status_price`) REFERENCES `pm_status` (`pmst_type`),
  CONSTRAINT `FK_oder_item_status_2` FOREIGN KEY (`oder_status`) REFERENCES `status` (`status_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.oder_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `oder_item` DISABLE KEYS */;
INSERT INTO `oder_item` (`oder_id`, `oder_package_id`, `oder_package_type`, `oder_os`, `oder_price`, `oder_time_rent`, `oder_time_rent_date_type`, `oder_name_server`, `oder_password_server`, `oder_email`, `oder_time_start`, `oder_time_end`, `oder_status`, `oder_ip`, `oder_status_price`) VALUES
	(1, 105, 'DDC', 'TEST', 8000.75, 1, 'Monthly', 'test', '112233', 'bbb@bbb.com', '2022-04-27 16:36:46', '2022-05-27 16:36:46', 'พร้อมใช้งาน', '111.165.104.38', 'ชำระเงินแล้ว'),
	(3, 10, 'VPS SSD', 'TEST', 10015, 1, 'Yearly', 'testtest1212', '11111111', 'bbb@bbb.com', '2022-04-27 16:39:25', '2024-05-28 16:39:25', 'พร้อมใช้งาน', '15.148.146.37', 'ชำระเงินแล้ว'),
	(4, 505, 'TestTestclouds', 'LINUX', 2000, 1, 'Daily', 'testtest1212312', '1232132123', 'bbb@bbb.com', '2022-04-27 16:41:11', '2022-04-28 16:41:11', 'กำลังติดตั้ง', '3.215.179.249', 'ชำระเงินแล้ว');
/*!40000 ALTER TABLE `oder_item` ENABLE KEYS */;

-- Dumping structure for table project.oder_item_hosting
CREATE TABLE IF NOT EXISTS `oder_item_hosting` (
  `oder_id` int(100) NOT NULL AUTO_INCREMENT,
  `oder_package_id` int(11) NOT NULL,
  `oder_package_type` varchar(50) NOT NULL,
  `oder_domain` varchar(50) NOT NULL,
  `oder_price` float NOT NULL,
  `oder_time_rent` int(11) NOT NULL,
  `oder_time_rent_date_type` varchar(50) NOT NULL,
  `oder_name_hosting` varchar(50) DEFAULT NULL,
  `oder_password_hosting` varchar(50) DEFAULT NULL,
  `oder_email` varchar(50) DEFAULT NULL,
  `oder_time_start` datetime DEFAULT NULL,
  `oder_time_end` datetime DEFAULT NULL,
  `oder_status` varchar(50) DEFAULT NULL,
  `oder_status_price` varchar(50) NOT NULL,
  PRIMARY KEY (`oder_id`) USING BTREE,
  KEY `oder_domain` (`oder_domain`) USING BTREE,
  KEY `oder_package_id` (`oder_package_id`) USING BTREE,
  KEY `FK_oder_item_hosting_period_of_payment` (`oder_time_rent_date_type`) USING BTREE,
  KEY `FK_oder_item_hosting_status` (`oder_status`) USING BTREE,
  KEY `FK_oder_item_hosting_pm_status` (`oder_status_price`) USING BTREE,
  CONSTRAINT `FK_oder_item_hosting_project.package_plan_domain` FOREIGN KEY (`oder_domain`) REFERENCES `package_plan_domain` (`pack_domain_name`),
  CONSTRAINT `FK_oder_item_hosting_project.period_of_payment` FOREIGN KEY (`oder_time_rent_date_type`) REFERENCES `period_of_payment` (`pop_id`),
  CONSTRAINT `FK_oder_item_hosting_project.pm_status` FOREIGN KEY (`oder_status_price`) REFERENCES `pm_status` (`pmst_type`),
  CONSTRAINT `FK_oder_item_hosting_project.status` FOREIGN KEY (`oder_status`) REFERENCES `status` (`status_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.oder_item_hosting: ~0 rows (approximately)
/*!40000 ALTER TABLE `oder_item_hosting` DISABLE KEYS */;
INSERT INTO `oder_item_hosting` (`oder_id`, `oder_package_id`, `oder_package_type`, `oder_domain`, `oder_price`, `oder_time_rent`, `oder_time_rent_date_type`, `oder_name_hosting`, `oder_password_hosting`, `oder_email`, `oder_time_start`, `oder_time_end`, `oder_status`, `oder_status_price`) VALUES
	(1, 400, 'HOST JUNIOR', '.test', 500, 1, 'Yearly', 'Dobee', '77777777', 'bbb@bbb.com', '2022-04-27 16:43:20', '2024-04-27 16:43:20', 'พร้อมใช้งาน', 'ชำระเงินแล้ว');
/*!40000 ALTER TABLE `oder_item_hosting` ENABLE KEYS */;

-- Dumping structure for table project.operating_system
CREATE TABLE IF NOT EXISTS `operating_system` (
  `osv_id` varchar(50) NOT NULL,
  `osv_type` varchar(50) NOT NULL,
  `osv_ib2` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`osv_id`),
  KEY `osv_type` (`osv_type`),
  KEY `osv_ib2` (`osv_ib2`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.operating_system: ~5 rows (approximately)
/*!40000 ALTER TABLE `operating_system` DISABLE KEYS */;
INSERT INTO `operating_system` (`osv_id`, `osv_type`, `osv_ib2`) VALUES
	('LINUX', 'LINUX', 1),
	('TEST', 'test', 9),
	('WS2012R2', 'Windows Server 2012r2', 2),
	('WS2016', 'Windows Server 2016', 3),
	('WS2019', 'Windows Server 2019', 4);
/*!40000 ALTER TABLE `operating_system` ENABLE KEYS */;

-- Dumping structure for table project.package_plan_clouds
CREATE TABLE IF NOT EXISTS `package_plan_clouds` (
  `pack_clouds_id` int(50) NOT NULL,
  `clouds_pack_core` int(50) NOT NULL,
  `clouds_pack_memory` int(50) NOT NULL,
  `clouds_pack_storage` int(50) NOT NULL,
  `clouds_pack_type` varchar(50) NOT NULL,
  `clouds_pack_price` float NOT NULL DEFAULT 0,
  `clouds_pack_price_d` float DEFAULT NULL,
  `clouds_pack_price_y` float DEFAULT NULL,
  `clouds_pack_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pack_clouds_id`) USING BTREE,
  KEY `FK_package_plan_clouds_period_of_payment` (`clouds_pack_type`) USING BTREE,
  CONSTRAINT `FK_package_plan_clouds_period_of_payment` FOREIGN KEY (`clouds_pack_type`) REFERENCES `period_of_payment` (`pop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.package_plan_clouds: ~5 rows (approximately)
/*!40000 ALTER TABLE `package_plan_clouds` DISABLE KEYS */;
INSERT INTO `package_plan_clouds` (`pack_clouds_id`, `clouds_pack_core`, `clouds_pack_memory`, `clouds_pack_storage`, `clouds_pack_type`, `clouds_pack_price`, `clouds_pack_price_d`, `clouds_pack_price_y`, `clouds_pack_name`) VALUES
	(500, 1, 2, 30, 'Monthly', 290, 39, 3100, 'cloud'),
	(501, 2, 4, 40, 'Monthly', 590, 69, 6400, 'cloud'),
	(502, 3, 6, 50, 'Monthly', 890, 99, 9700, 'cloud'),
	(503, 4, 8, 60, 'Monthly', 1290, 149, 14100, 'cloud'),
	(504, 99, 99, 99, 'Monthly', 2000, 1000, 4000, 'CloudsTest'),
	(505, 99, 99, 99, 'Monthly', 1000, 2000, 3000, 'TestTestclouds');
/*!40000 ALTER TABLE `package_plan_clouds` ENABLE KEYS */;

-- Dumping structure for table project.package_plan_ddc
CREATE TABLE IF NOT EXISTS `package_plan_ddc` (
  `pack_ddc_id` int(50) NOT NULL,
  `ddc_cpu_type` varchar(50) NOT NULL,
  `ddc_dis_name` varchar(100) NOT NULL,
  `ddc_cpu_turbo` varchar(50) NOT NULL DEFAULT '0',
  `ddc_cpu_score` int(11) NOT NULL DEFAULT 0,
  `ddc_pack_core` int(50) NOT NULL,
  `ddc_pack_thread` int(50) NOT NULL,
  `ddc_pack_ddr` int(50) NOT NULL,
  `ddc_pack_memory` int(50) NOT NULL,
  `ddc_pack_storage` int(50) NOT NULL,
  `ddc_pack_type` varchar(50) NOT NULL,
  `ddc_pack_price` float NOT NULL DEFAULT 0,
  `ddc_pack_price_y` float NOT NULL,
  `ddc_pack_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pack_ddc_id`),
  KEY `FK_package_plan_ddc_period_of_payment` (`ddc_pack_type`),
  CONSTRAINT `FK_package_plan_ddc_period_of_payment` FOREIGN KEY (`ddc_pack_type`) REFERENCES `period_of_payment` (`pop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.package_plan_ddc: ~6 rows (approximately)
/*!40000 ALTER TABLE `package_plan_ddc` DISABLE KEYS */;
INSERT INTO `package_plan_ddc` (`pack_ddc_id`, `ddc_cpu_type`, `ddc_dis_name`, `ddc_cpu_turbo`, `ddc_cpu_score`, `ddc_pack_core`, `ddc_pack_thread`, `ddc_pack_ddr`, `ddc_pack_memory`, `ddc_pack_storage`, `ddc_pack_type`, `ddc_pack_price`, `ddc_pack_price_y`, `ddc_pack_name`) VALUES
	(100, 'AMD', 'Ryzen 5 3600X @ 3.80 GHz', '4.4', 18310, 6, 12, 4, 32, 250, 'Monthly', 3500, 30000, 'DDC'),
	(101, 'AMD', 'Ryzen 5 3600X @ 3.80 GHz', '4.4', 18310, 6, 12, 4, 64, 250, 'Monthly', 4000, 35000, 'DDC'),
	(102, 'AMD', 'Ryzen 9 3900X @ 3.80 GHz', '4.6', 32861, 12, 24, 4, 32, 250, 'Monthly', 4500, 40000, 'DDC'),
	(103, 'AMD', 'Ryzen 9 3900X @ 3.80 GHz', '4.6', 32861, 12, 24, 4, 64, 250, 'Monthly', 5000, 45000, 'DDC'),
	(104, 'INTEL', 'Core i7-9700K @ 3.60 GHz', '4.9', 14648, 8, 8, 4, 32, 250, 'Monthly', 4500, 40000, 'DDC'),
	(105, 'AMD', 'Ryzen 8 8888X @ 8.88 GHz', '999', 9999, 999, 999, 888, 888, 888, 'Monthly', 8000.75, 9099.75, 'DDC');
/*!40000 ALTER TABLE `package_plan_ddc` ENABLE KEYS */;

-- Dumping structure for table project.package_plan_domain
CREATE TABLE IF NOT EXISTS `package_plan_domain` (
  `pack_domain_id` int(50) NOT NULL AUTO_INCREMENT,
  `pack_domain_name` varchar(50) NOT NULL,
  `pack_domain_price` float NOT NULL,
  `pack_domain_price_2` float NOT NULL,
  `pack_domain_price_3` float NOT NULL,
  PRIMARY KEY (`pack_domain_id`) USING BTREE,
  KEY `pack_domain_name` (`pack_domain_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.package_plan_domain: ~8 rows (approximately)
/*!40000 ALTER TABLE `package_plan_domain` DISABLE KEYS */;
INSERT INTO `package_plan_domain` (`pack_domain_id`, `pack_domain_name`, `pack_domain_price`, `pack_domain_price_2`, `pack_domain_price_3`) VALUES
	(1, '.com', 359, 359, 359),
	(2, '.net', 425, 425, 425),
	(3, '.org', 425, 425, 425),
	(4, '.in.th', 999, 999, 999),
	(5, '.co.th', 999, 999, 999),
	(6, '.go.th', 999, 999, 999),
	(7, '.ac.th', 999, 999, 999),
	(8, '.or.th', 999, 999, 999),
	(9, '.test', 987, 987, 987);
/*!40000 ALTER TABLE `package_plan_domain` ENABLE KEYS */;

-- Dumping structure for table project.package_plan_hosting
CREATE TABLE IF NOT EXISTS `package_plan_hosting` (
  `pack_hosting_id` int(11) NOT NULL DEFAULT 0,
  `hosting_pack_domains` int(11) NOT NULL DEFAULT 0,
  `hosting_pack_space` int(11) NOT NULL DEFAULT 0,
  `hosting_pack_transfer` int(11) NOT NULL DEFAULT 0,
  `hosting_pack_database` int(11) NOT NULL DEFAULT 0,
  `hosting_pack_type` varchar(50) NOT NULL,
  `hosting_pack_price_y` float NOT NULL DEFAULT 0,
  `hosting_pack_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pack_hosting_id`),
  KEY `hosting_pack_type` (`hosting_pack_type`),
  CONSTRAINT `FK_package_plan_hosting_period_of_payment` FOREIGN KEY (`hosting_pack_type`) REFERENCES `period_of_payment` (`pop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.package_plan_hosting: ~3 rows (approximately)
/*!40000 ALTER TABLE `package_plan_hosting` DISABLE KEYS */;
INSERT INTO `package_plan_hosting` (`pack_hosting_id`, `hosting_pack_domains`, `hosting_pack_space`, `hosting_pack_transfer`, `hosting_pack_database`, `hosting_pack_type`, `hosting_pack_price_y`, `hosting_pack_name`) VALUES
	(400, 3, 10, 200, 5, 'Yearly', 500, 'HOST JUNIOR'),
	(402, 6, 30, 500, 10, 'Yearly', 1000, 'HOST SENIOR'),
	(403, 8, 50, 1000, 15, 'Yearly', 1500, 'HOST TECHICAL');
/*!40000 ALTER TABLE `package_plan_hosting` ENABLE KEYS */;

-- Dumping structure for table project.package_plan_vps
CREATE TABLE IF NOT EXISTS `package_plan_vps` (
  `pack_vps_id` int(50) NOT NULL AUTO_INCREMENT,
  `vps_pack_core` int(50) NOT NULL,
  `vps_pack_memory` int(50) NOT NULL,
  `vps_pack_storage` int(50) NOT NULL,
  `vps_pack_type` varchar(50) NOT NULL,
  `vps_pack_price` float NOT NULL DEFAULT 0,
  `vps_pack_price_d` float NOT NULL DEFAULT 0,
  `vps_pack_price_y` float NOT NULL DEFAULT 0,
  `vps_pack_name` varchar(50) NOT NULL,
  PRIMARY KEY (`pack_vps_id`),
  KEY `FK_package_plan_vps_period_of_payment` (`vps_pack_type`),
  CONSTRAINT `FK_package_plan_vps_period_of_payment` FOREIGN KEY (`vps_pack_type`) REFERENCES `period_of_payment` (`pop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.package_plan_vps: ~9 rows (approximately)
/*!40000 ALTER TABLE `package_plan_vps` DISABLE KEYS */;
INSERT INTO `package_plan_vps` (`pack_vps_id`, `vps_pack_core`, `vps_pack_memory`, `vps_pack_storage`, `vps_pack_type`, `vps_pack_price`, `vps_pack_price_d`, `vps_pack_price_y`, `vps_pack_name`) VALUES
	(1, 1, 3, 30, 'Monthly', 200, 10, 2000, 'VPS SSD'),
	(2, 2, 4, 30, 'Monthly', 400, 20, 4000, 'VPS SSD'),
	(3, 3, 6, 40, 'Monthly', 600, 30, 6000, 'VPS SSD'),
	(4, 4, 8, 40, 'Monthly', 800, 40, 8000, 'VPS SSD'),
	(5, 5, 12, 50, 'Monthly', 1000, 50, 10000, 'VPS SSD'),
	(6, 6, 14, 80, 'Monthly', 1200, 60, 12000, 'VPS SSD'),
	(7, 7, 16, 80, 'Monthly', 1400, 70, 14000, 'VPS SSD'),
	(8, 8, 20, 120, 'Monthly', 1600, 80, 16000, 'VPS SSD'),
	(10, 999, 999, 99999, 'Monthly', 8014.95, 9014.95, 10015, 'VPS SSD');
/*!40000 ALTER TABLE `package_plan_vps` ENABLE KEYS */;

-- Dumping structure for table project.period_of_payment
CREATE TABLE IF NOT EXISTS `period_of_payment` (
  `pop_id` varchar(50) NOT NULL,
  `pop_type` varchar(50) NOT NULL,
  PRIMARY KEY (`pop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.period_of_payment: ~4 rows (approximately)
/*!40000 ALTER TABLE `period_of_payment` DISABLE KEYS */;
INSERT INTO `period_of_payment` (`pop_id`, `pop_type`) VALUES
	('Daily', 'วัน'),
	('Monthly', 'เดือน'),
	('Weeky', 'สัปดาห์'),
	('Yearly', 'ปี');
/*!40000 ALTER TABLE `period_of_payment` ENABLE KEYS */;

-- Dumping structure for table project.pm_status
CREATE TABLE IF NOT EXISTS `pm_status` (
  `pmst_id` int(50) NOT NULL,
  `pmst_type` varchar(50) NOT NULL,
  PRIMARY KEY (`pmst_id`),
  KEY `pmst_type` (`pmst_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.pm_status: ~2 rows (approximately)
/*!40000 ALTER TABLE `pm_status` DISABLE KEYS */;
INSERT INTO `pm_status` (`pmst_id`, `pmst_type`) VALUES
	(1, 'ชำระเงินแล้ว'),
	(0, 'ยังไม่ได้ผ่านการชำระเงืน');
/*!40000 ALTER TABLE `pm_status` ENABLE KEYS */;

-- Dumping structure for table project.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(50) NOT NULL,
  PRIMARY KEY (`rolename`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.role: ~3 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `rolename`) VALUES
	(1, 'user'),
	(2, 'editor'),
	(3, 'admin');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table project.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_id` varchar(50) NOT NULL,
  `status_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status_id` (`status_id`),
  KEY `status_type` (`status_type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.status: ~3 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `status_id`, `status_type`) VALUES
	(1, 'not_ready', 'ไม่พร้อมใช้งาน'),
	(2, 'installing', 'กำลังติดตั้ง'),
	(3, 'ready_to_use', 'พร้อมใช้งาน');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table project.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `urole` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `amount` decimal(20,2) NOT NULL DEFAULT 0.00,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_users_role` (`urole`),
  CONSTRAINT `FK_users_role` FOREIGN KEY (`urole`) REFERENCES `role` (`rolename`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table project.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `urole`, `created_at`, `amount`) VALUES
	(1, 'aaa33', 'aaa33', 'aaa@aaa.com', '112233', 'admin', '2022-04-27 21:24:37', 0.00),
	(2, 'bbb33', 'bbb3', 'bbb@bbb.com', '332211', 'user', '2022-04-27 21:25:43', 21766.15);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
