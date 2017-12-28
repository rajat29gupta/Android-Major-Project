-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2017 at 03:55 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `local_services`
--

-- --------------------------------------------------------

--
-- Table structure for table `services_admin`
--

CREATE TABLE IF NOT EXISTS `services_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_number` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `services_admin`
--

INSERT INTO `services_admin` (`admin_id`, `admin_name`, `admin_image`, `admin_email`, `admin_number`, `admin_password`) VALUES
(1, 'admin', 'admin/1.png', 'admin@gmail.com', '1234569870', 'c2f6420584c4ae00e755d6d6dbaa05a5'),
(2, 'admin', 'admin/1.png', 'admin@gmail.com', '1234569870', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `services_healths`
--

CREATE TABLE IF NOT EXISTS `services_healths` (
  `health_id` int(11) NOT NULL AUTO_INCREMENT,
  `health_title` varchar(255) NOT NULL,
  `health_description` longtext NOT NULL,
  `health_image` varchar(255) NOT NULL,
  `health_language` varchar(255) NOT NULL,
  `health_status` int(11) NOT NULL DEFAULT '1',
  `health_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`health_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `services_healths`
--

INSERT INTO `services_healths` (`health_id`, `health_title`, `health_description`, `health_image`, `health_language`, `health_status`, `health_created`) VALUES
(1, 'lorem ipsum', 'lorem ipsum', '', 'hindi', 1, '2017-06-06 17:38:31'),
(2, 'lorem ipsum', 'lorem ipsum', '', 'english', 1, '2017-06-06 17:38:40'),
(3, 'lorem ipsum', 'lorem ipsum', '', 'spanish', 1, '2017-06-06 17:38:48'),
(4, 'lorem ipsum', 'lorem ipsum', '', 'hindi', 1, '2017-06-06 17:38:54'),
(5, 'hhh', 'fgfk', '', 'Hindi', 1, '2017-06-07 13:52:46'),
(6, 'fghf', 'VNVM', '', '', 1, '2017-06-07 13:54:11'),
(7, 'Health13', 'des hlthsdgf', '', 'Spanish', 1, '2017-06-09 08:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `services_online_news`
--

CREATE TABLE IF NOT EXISTS `services_online_news` (
  `online_news_id` int(11) NOT NULL AUTO_INCREMENT,
  `online_news_title` varchar(255) NOT NULL,
  `online_news_description` longtext NOT NULL,
  `online_news_image` varchar(255) NOT NULL,
  `online_news_language` varchar(255) NOT NULL,
  `online_news_date` varchar(255) NOT NULL,
  `online_news_status` int(11) NOT NULL DEFAULT '1',
  `online_news_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`online_news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services_online_news`
--

INSERT INTO `services_online_news` (`online_news_id`, `online_news_title`, `online_news_description`, `online_news_image`, `online_news_language`, `online_news_date`, `online_news_status`, `online_news_created`) VALUES
(1, 'lorem ipsum', 'lorem ipsum', '', 'hindi', '', 1, '2017-06-06 17:38:31'),
(2, 'lorem ipsum', 'lorem ipsum', '', 'english', '', 1, '2017-06-06 17:38:40'),
(3, 'lorem ipsum', 'lorem ipsum', '', 'spanish', '', 1, '2017-06-06 17:38:48'),
(4, 'lorem ipsum', 'lorem ipsum', '', 'hindi', '', 1, '2017-06-06 17:38:54'),
(5, 'News12', 'New1 description', 'news/5.png', 'Hindi', '', 1, '2017-06-09 08:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `services_restaurant`
--

CREATE TABLE IF NOT EXISTS `services_restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(255) NOT NULL,
  `restaurant_address` longtext NOT NULL,
  `restaurant_category` int(11) NOT NULL COMMENT '0 - both 1- veg 2- nonveg',
  `restaurant_image` varchar(255) NOT NULL,
  `restaurant_language` varchar(255) NOT NULL,
  `restaurant_status` int(11) NOT NULL DEFAULT '1',
  `restaurant_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `services_restaurant`
--

INSERT INTO `services_restaurant` (`restaurant_id`, `restaurant_name`, `restaurant_address`, `restaurant_category`, `restaurant_image`, `restaurant_language`, `restaurant_status`, `restaurant_created`) VALUES
(1, 'lorem ipsum', 'lorem ipsum', 0, '', 'hindi', 1, '2017-06-06 17:38:31'),
(2, 'lorem ipsum', 'lorem ipsum', 1, '', 'english', 1, '2017-06-06 17:38:40'),
(3, 'lorem ipsum', 'lorem ipsum', 1, '', 'spanish', 1, '2017-06-06 17:38:48'),
(4, 'lorem ipsum', 'lorem ipsum', 2, '', 'hindi', 1, '2017-06-06 17:38:54'),
(5, 'Dominozfhg', 'Pune 123dsfg', 0, 'restaurant/5.gif', 'English', 1, '2017-06-09 08:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `services_retail_foods`
--

CREATE TABLE IF NOT EXISTS `services_retail_foods` (
  `retail_food_id` int(11) NOT NULL AUTO_INCREMENT,
  `retail_food_name` varchar(255) NOT NULL,
  `retail_food_price` varchar(255) NOT NULL,
  `retail_food_image` varchar(255) NOT NULL,
  `retail_food_language` varchar(255) NOT NULL,
  `retail_food_status` int(11) NOT NULL DEFAULT '1',
  `retail_food_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`retail_food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `services_retail_foods`
--

INSERT INTO `services_retail_foods` (`retail_food_id`, `retail_food_name`, `retail_food_price`, `retail_food_image`, `retail_food_language`, `retail_food_status`, `retail_food_created`) VALUES
(1, 'lorem ipsum', '100', '', 'hindi', 1, '2017-06-06 17:38:31'),
(2, 'lorem ipsum', '100', '', 'english', 1, '2017-06-06 17:38:40'),
(3, 'lorem ipsum', '100', '', 'spanish', 1, '2017-06-06 17:38:48'),
(4, 'lorem ipsum', '100', '', 'hindi', 1, '2017-06-06 17:38:54'),
(7, 'hgfhg', '2012', '', 'Hindi,English', 0, '0000-00-00 00:00:00'),
(8, 'rttry', '', '', '', 1, '2017-06-07 12:31:06'),
(9, 'hiii', '234', '', 'Hindi,English', 1, '2017-06-07 12:32:18'),
(10, 'Chips', '345', '', 'Hindi,English', 1, '2017-06-07 12:45:42'),
(11, 'jjj', '234', '', 'Hindi,English', 1, '2017-06-07 12:49:27'),
(12, 'rrrr', '234', 'food/12.png', 'Hindi,English', 1, '2017-06-07 12:51:01'),
(13, 'rrrr', '234', 'food/13.png', 'Hindi,English', 1, '2017-06-07 12:52:20'),
(14, 'ghfg', '200', 'food/14.png', '', 1, '2017-06-07 13:53:35'),
(15, 'Burgar', '250', 'food/15.png', 'English', 1, '2017-06-09 08:38:51'),
(16, '123', '112', '', 'Spanish', 1, '2017-06-09 13:38:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
