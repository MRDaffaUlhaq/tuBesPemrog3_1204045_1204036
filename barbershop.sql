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
  CONSTRAINT `criticisms_n_suggests_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `criticisms_n_suggests` (`cns_id`, `customer_id`, `criticism`, `suggest`, `rate`) VALUES
(1,	5,	'Tukang cukurnya judes dan juga tidak pernah senyum',	'lebih humble terhadap pelanggan, agar pelanggan merasa nyaman',	7),
(2,	2,	'kopinya terlalu manis',	'lain kali ditanya dulu mau manis sedeng apa engga',	5),
(3,	1,	'Pijatannya kurang mantap, rasa pegel nya masih ada',	'belajar mijat dulu yang bener biar ga asal pijat',	6),
(4,	3,	'Tempatnya kotor dan bau, office boy nya jelek',	'ganti office boy, cari yang rajin dan amanah',	3),
(5,	4,	'-',	'Pakai pewangi ruangan, tapi jangan stella rasa jeruk',	10);

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `customers` (`customer_id`, `name`, `telp`, `email`) VALUES
(1,	'Nawaf',	'081234566543',	'nawaf@gmail.com'),
(2,	'Naofal',	'089966665555',	'naofal@gmail.com'),
(3,	'Daffa',	'087755554444',	'daffa@gmail.com'),
(4,	'Ulhaq',	'086633332222',	'ulhaq@gmail.com'),
(5,	'Ilman',	'081122223333',	'ilman@gmail.com');

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
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `job_positions` (`position_id`),
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`position_id`) REFERENCES `job_positions` (`position_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
  `salary` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `job_positions` (`position_id`, `position`, `salary`, `desc`) VALUES
(1,	'Owner',	'Rp. 5.000.000',	'Pemilik barbershop'),
(2,	'Barberman',	'Rp. 1.000.000',	'Tukang Cukur'),
(3,	'Barista',	'Rp. 1.000.000',	'Kang Kopi'),
(4,	'Kasir',	'Rp. 1.000.000',	'Menangani transaksi dengan pelanggan'),
(5,	'Office Boy',	'Rp. 500.000',	'Menjaga kebersihan barbershop');

DROP TABLE IF EXISTS `keys`;
CREATE TABLE `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT '0',
  `is_private_key` tinyint(1) NOT NULL DEFAULT '0',
  `ip_addresses` text,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1,	1,	'ulbi123',	1,	0,	0,	NULL,	1);

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `service_id` int(5) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO `services` (`service_id`, `service_name`, `desc`, `price`) VALUES
(1,	'Potong Rambut',	'Hanya potong rambut',	'Rp. 15.000'),
(2,	'Potong Rambut + Keramas',	'Potong rambut + dikeramasin',	'Rp. 20.000'),
(3,	'Potong Rambut + Keramas + Pijat',	'Rambut bersih badan bugar',	'Rp. 25.000'),
(4,	'Potong Kumis ',	'Potong kumis auto ganteng',	'Rp. 7.000'),
(5,	'Potong Jenggot',	'Harusnya gausah sih, biar sunnah rosul. Tapi kalau mau ya dilayani sampai bersih',	'Rp. 10.000'),
(6,	'Kopi',	'Kopi tubruk, kopi susu, kopi caramel, dan kopi hazelnut',	'Rp. 15.000');

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `t_id` int(5) NOT NULL AUTO_INCREMENT,
  `customer_id` int(5) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `service_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `total` varchar(50) NOT NULL,
  PRIMARY KEY (`t_id`),
  KEY `customer_id` (`customer_id`),
  KEY `emp_id` (`emp_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`emp_id`) ON DELETE CASCADE,
  CONSTRAINT `transactions_ibfk_4` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `transactions` (`t_id`, `customer_id`, `emp_id`, `service_id`, `date`, `time`, `total`) VALUES
(1,	1,	1,	1,	'2022-07-17',	'00:00:21',	'Rp. 15.000'),
(2,	2,	2,	2,	'2022-07-11',	'00:00:19',	'Rp. 20.000'),
(3,	3,	3,	3,	'2022-07-09',	'00:00:15',	'Rp. 25.000'),
(4,	4,	4,	4,	'2022-07-05',	'00:00:12',	'Rp. 7.000');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1,	'nawaf',	'nawaf',	'naofalgeming@gmail.com'),
(2,	'daffa',	'daffa',	'dapaslebew@gmail.com'),
(3,	'ilman',	'ilman',	'ilmanlocos@gmail.com'),
(4,	'aqila',	'aqila',	'aqilaanjay@gmail.com'),
(5,	'fadil',	'fadil',	'fadilteax@gmail.com');

-- 2022-07-19 17:06:49
