-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 30, 2015 at 12:35 AM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL AUTO_INCREMENT,
  `prod_title` varchar(30) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `img_url` varchar(200) NOT NULL,
  `prod_price` float(6,2) NOT NULL,
  PRIMARY KEY (`prod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_title`, `prod_desc`, `img_url`, `prod_price`) VALUES
(1, 'Spicy Soup', 'This soup has the best flavor in the North East!', 'soup.jpg', 3.50),
(2, 'Flank Steak', 'Try our delicious steak from grass fed cage free disease ridden cows.', 'steak.jpg', 22.50),
(3, 'Chilean Peppers', 'Our legally obtained peppers are imported directly from Chile. Spicier than the ghost pepper.', 'peppers.jpg', 11.50),
(4, 'Steamed Vegetables', 'Delicious steamed vegatables delivered directly to your door!', 'vegetables.jpg', 8.75);
