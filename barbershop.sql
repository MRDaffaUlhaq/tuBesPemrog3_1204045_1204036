-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `criticisms_n_suggests`;
CREATE TABLE `criticisms_n_suggests` (
  `cns_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) NOT NULL,
  `criticism` varchar(255) NOT NULL,
  `suggest` varchar(255) NOT NULL,
  `rate` int(20) NOT NULL,
  PRIMARY KEY (`cns_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `criticisms_n_suggests_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `criticisms_n_suggests` (`cns_id`, `customer_id`, `criticism`, `suggest`, `rate`) VALUES
(1,	1,	'Tukang cukurnya judes dan juga tidak pernah senyum',	'lebih humble terhadap pelanggan, agar pelanggan merasa nyaman',	10),
(3,	1,	'Pijatannya kurang mantap, rasa pegel nya masih ada',	'belajar mijat dulu yang bener biar ga asal pijat',	6);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `customers` (`customer_id`, `name`, `telp`, `email`) VALUES
(1,	'Nawaf',	'081234566543',	'nawafgeming@gmail.com'),
(7,	'Naofal',	'087766665555',	'naofal@gmail.com'),
(8,	'Daffa',	'086677776666',	'daffa@gmail.com'),
(9,	'Rifqi',	'089922223333',	'rifqi@yahoo.com'),
(11,	'Ilman',	'087722223333',	'ilman@gmail.com'),
(12,	'alfin',	'+6282127291418',	'alfin@gmail.com');

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `position_id` int(5) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `bank_acc` varchar(50) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `position_id` (`position_id`),
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `job_positions` (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `employees` (`emp_id`, `position_id`, `emp_name`, `telp`, `address`, `bank_acc`) VALUES
(1,	1,	'Nawaf Naofal',	'082124352637',	'Subang',	'034101000743543'),
(2,	2,	'Daffa Ulhaq',	'082534167645',	'Cianjur',	'034101000743999'),
(3,	3,	'Ilman Suhadi',	'08276467377',	'Cihampelas',	'034101000743111'),
(4,	4,	'Aqila',	'089421256533',	'Bandung',	'034101000743222'),
(5,	5,	'Fadil',	'082126478576',	'Cibogo',	'034101000743444');

DROP TABLE IF EXISTS `job_positions`;
CREATE TABLE `job_positions` (
  `position_id` int(5) NOT NULL AUTO_INCREMENT,
  `position` varchar(100) NOT NULL,
  `salary` int(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `job_positions` (`position_id`, `position`, `salary`, `desc`) VALUES
(1,	'Owner',	5000000,	'Pemilik barbershop'),
(2,	'Barberman',	1000000,	'Tukang Cukur'),
(3,	'Barista',	1000000,	'Kang Kopi'),
(4,	'Kasir',	1000000,	'Menangani transaksi dengan pelanggan'),
(5,	'Office Boy',	500000,	'Menjaga kebersihan barbershop'),
(6,	'Bendahara1',	4000000,	'Pencatatan Keuangan Barbershop1');

DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) DEFAULT NULL,
  `key` varchar(40) DEFAULT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `keys_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1,	1,	'ulbi123',	1,	0,	0,	NULL,	1),
(2,	NULL,	'jopares147',	1,	0,	0,	NULL,	1),
(3,	NULL,	'semangatpagi',	1,	0,	0,	NULL,	2022),
(4,	NULL,	'sipaling',	1,	0,	0,	NULL,	2022),
(5,	NULL,	'sipalingKey',	1,	0,	0,	NULL,	22),
(6,	NULL,	'sipalingKey123',	1,	0,	0,	NULL,	2022),
(7,	NULL,	'sipalingKey1',	1,	0,	0,	NULL,	2022);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `service_id` int(5) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `services` (`service_id`, `service_name`, `desc`, `price`) VALUES
(1,	'Potong Rambut',	'Hanya potong rambut',	15000),
(2,	'Potong Rambut + Keramas',	'Potong rambut + dikeramasin',	20000),
(3,	'Potong Rambut + Keramas + Pijat',	'Rambut bersih badan bugar',	25000),
(4,	'Potong Kumis ',	'Potong kumis auto ganteng',	7000),
(5,	'Potong Jenggot',	'Harusnya gausah sih, biar sunnah rosul. Tapi kalau mau ya dilayani sampai bersih',	10000),
(6,	'Kopi Signature',	'Kopi tubruk, kopi susu, kopi karamel, dan kopi hazelnut',	14000),
(7,	'Pijit',	'Pijit ajah',	15000);

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `t_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `total` int(255) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `customer_id` (`customer_id`),
  KEY `emp_id` (`emp_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `transactions_ibfk_5` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `transactions_ibfk_6` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  CONSTRAINT `transactions_ibfk_7` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `transactions` (`t_id`, `customer_id`, `emp_id`, `service_id`, `date`, `time`, `total`) VALUES
(13,	1,	2,	1,	'2022-06-30',	'00:00:21',	15000),
(14,	1,	3,	6,	'2022-07-21',	'10:49:00',	14000),
(15,	9,	1,	1,	'2019-01-29',	'04:53:00',	15000),
(16,	11,	5,	7,	'2022-08-01',	'11:46:00',	15000);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_id` int(5) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `emp_id` (`emp_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `emp_id`, `username`, `password`, `email`) VALUES
(1,	1,	'daffa',	'123',	'daffa@gmail.com'),
(2,	NULL,	'user1',	'user1',	'user1@gmail.com'),
(3,	NULL,	'daul',	'123',	'daul@asoy.com'),
(4,	1,	'user2',	'123',	'user@user.com'),
(6,	1,	'daffa',	'123',	'difa09@gmail.com'),
(7,	1,	'naofal',	'123',	'naofal@gmail.com');

-- 2022-08-02 14:40:10
