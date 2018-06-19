-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.29-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for phasons
CREATE DATABASE IF NOT EXISTS `phasons` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `phasons`;

-- Dumping structure for table phasons.address
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.address: ~2 rows (approximately)
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`id`, `user_id`, `address_line1`, `address_line2`, `city`, `state`, `pincode`, `mobile`) VALUES
	(1, 0, 'D-255 Amber Hostel', 'IIT ISM Dhanbad', 'Dhanbad', 'Jharkhand', 826004, '9155844753'),
	(2, 0, 'D-252 Amber Hostel', 'IIT ISM Dhanbad', 'Dhanbad', 'Jharkhand', 826004, '7903827936');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table phasons.art
CREATE TABLE IF NOT EXISTS `art` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.art: ~0 rows (approximately)
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` (`id`, `image`, `name`, `description`, `user_id`, `category`, `price`) VALUES
	(1, 'asd', 'naruto', 'Description', 1, 'naruto', 122);
/*!40000 ALTER TABLE `art` ENABLE KEYS */;

-- Dumping structure for table phasons.artcategory
CREATE TABLE IF NOT EXISTS `artcategory` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.artcategory: ~0 rows (approximately)
/*!40000 ALTER TABLE `artcategory` DISABLE KEYS */;
INSERT INTO `artcategory` (`id`, `name`) VALUES
	(1, 'naruto');
/*!40000 ALTER TABLE `artcategory` ENABLE KEYS */;

-- Dumping structure for table phasons.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.brands: ~0 rows (approximately)
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` (`id`, `name`) VALUES
	(1, 'Rodester');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;

-- Dumping structure for table phasons.cards
CREATE TABLE IF NOT EXISTS `cards` (
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `number` varchar(25) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `bank_name` varchar(20) DEFAULT NULL,
  `date_expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table to store the card details';

-- Dumping data for table phasons.cards: ~0 rows (approximately)
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`user_id`, `number`, `name`, `bank_name`, `date_expiry`) VALUES
	(0, '1235 1245 8759 5426', 'personal', 'SBI', '2018-06-11');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;

-- Dumping structure for table phasons.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.categories: ~8 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `type`) VALUES
	(1, 'Tshirt', 'M'),
	(2, 'Kurta', 'M'),
	(3, 'Pajama', 'M'),
	(4, 'Shirt', 'M'),
	(5, 'Tshirt', 'W'),
	(6, 'Kurta', 'W'),
	(7, 'Pajama', 'W'),
	(8, 'Shirt', 'W');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table phasons.followers
CREATE TABLE IF NOT EXISTS `followers` (
  `follower_id` bigint(20) unsigned DEFAULT NULL,
  `following_id` bigint(20) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Table for managing followers';

-- Dumping data for table phasons.followers: ~0 rows (approximately)
/*!40000 ALTER TABLE `followers` DISABLE KEYS */;
/*!40000 ALTER TABLE `followers` ENABLE KEYS */;

-- Dumping structure for table phasons.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table phasons.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `cat_id` int(10) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image` text,
  `discount` int(5) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `art` text,
  `tags` text,
  `description` text,
  `gender` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.products: ~2 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `brand_id`, `cat_id`, `price`, `image`, `discount`, `rating`, `user_id`, `art`, `tags`, `description`, `gender`) VALUES
	(2, 'Xwmen Rodies', 1, 1, 599, '["vlcsnap-error239.png","vlcsnap-error287.png","vlcsnap-error574.png","vlcsnap-error582.png"]', 6, NULL, 0, '', 'tshirt', '<p>Rodester Excellent</p>', 'M'),
	(3, 'T-Series 234', 1, 4, 999, '["adidas6.jpg","boxer.jpg","fila1.jpg","lancer.jpg","sparx4.jpg","touchwood.jpg"]', 14, NULL, 0, '', 't series', '<p>nope</p>', 'W');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table phasons.usercart
CREATE TABLE IF NOT EXISTS `usercart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_size` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.usercart: ~1 rows (approximately)
/*!40000 ALTER TABLE `usercart` DISABLE KEYS */;
INSERT INTO `usercart` (`id`, `user_id`, `pro_id`, `pro_size`, `qty`) VALUES
	(0, 0, 3, 'xll', 1);
/*!40000 ALTER TABLE `usercart` ENABLE KEYS */;

-- Dumping structure for table phasons.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `facebook_profile` varchar(100) DEFAULT NULL,
  `instagram_profile` varchar(100) DEFAULT NULL,
  `twitter_profile` varchar(100) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_image` text,
  `follower` int(10) DEFAULT NULL,
  `following` int(10) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `fname`, `lname`, `facebook_profile`, `instagram_profile`, `twitter_profile`, `username`, `email`, `password`, `profile_image`, `follower`, `following`, `mobile`) VALUES
	(0, 'prem', 'sagar', 'asd', 'asd', 'asd', 'premsagar279', 'prem.sk753@gmail.com', 'greatindia', 'profile.png', 2, 3, '9155844753');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table phasons.wishlist
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table phasons.wishlist: ~0 rows (approximately)
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
