-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 11:20 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phasons`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_line1` text NOT NULL,
  `address_line2` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` int(11) NOT NULL,
  `mobile` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `address_line1`, `address_line2`, `city`, `state`, `pincode`, `mobile`) VALUES
(1, 0, 'D-255 Amber Hostel', 'IIT ISM Dhanbad', 'Dhanbad', 'Jharkhand', 826004, '9155844753'),
(2, 0, 'D-252 Amber Hostel', 'IIT ISM Dhanbad', 'Dhanbad', 'Jharkhand', 826004, '7903827936');

-- --------------------------------------------------------

--
-- Table structure for table `art`
--

CREATE TABLE `art` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `art`
--

INSERT INTO `art` (`id`, `image`, `name`, `description`, `user_id`, `category`, `price`) VALUES
(1, 'asd', 'naruto', 'Description', 1, 'naruto', 122);

-- --------------------------------------------------------

--
-- Table structure for table `artcategory`
--

CREATE TABLE `artcategory` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artcategory`
--

INSERT INTO `artcategory` (`id`, `name`) VALUES
(1, 'naruto');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Rodester');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Tshirt'),
(2, 'Kurta'),
(3, 'Pajama'),
(4, 'Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `user_id` int(12) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
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
  `gender` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand_id`, `cat_id`, `price`, `image`, `discount`, `rating`, `user_id`, `art`, `tags`, `description`, `gender`) VALUES
(2, 'Xwmen Rodies', 1, 1, 599, '["vlcsnap-error239.png","vlcsnap-error287.png","vlcsnap-error574.png","vlcsnap-error582.png"]', 6, NULL, 0, '', 'tshirt', '<p>Rodester Excellent</p>', 'M'),
(3, 'T-Series 234', 1, 4, 999, '["adidas6.jpg","boxer.jpg","fila1.jpg","lancer.jpg","sparx4.jpg","touchwood.jpg"]', 14, NULL, 0, '', 't series', '<p>nope</p>', 'W');

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_size` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercart`
--

INSERT INTO `usercart` (`id`, `user_id`, `pro_id`, `pro_size`, `qty`) VALUES
(0, 0, 3, 'xll', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_image` text,
  `follower` int(10) DEFAULT NULL,
  `following` int(10) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `profile_image`, `follower`, `following`, `mobile`) VALUES
(0, 'prem', 'sagar', 'premsagar279', 'prem.sk753@gmail.com', 'greatindia', 'profile.png', 2, 3, '9155844753');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `art`
--
ALTER TABLE `art`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artcategory`
--
ALTER TABLE `artcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercart`
--
ALTER TABLE `usercart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `art`
--
ALTER TABLE `art`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `artcategory`
--
ALTER TABLE `artcategory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
