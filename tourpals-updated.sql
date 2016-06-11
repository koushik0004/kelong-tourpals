-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2016 at 11:24 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `makemarr_tourpals`
--
CREATE DATABASE `makemarr_tourpals` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `makemarr_tourpals`;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `childrens` int(11) DEFAULT '0',
  `adults` int(11) DEFAULT '0',
  `check_in` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `no_of_days` int(11) DEFAULT NULL,
  `service_charges` double DEFAULT '0',
  `sevice_tax` double DEFAULT '0',
  `other_taxes` double DEFAULT '0',
  `bank_charges` double DEFAULT '0',
  `courier_charges` double DEFAULT '0',
  `misc_charges` double DEFAULT '0',
  `extra_charges` double DEFAULT '0',
  `extra_bed_charges` double DEFAULT '0',
  `discount` double DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bookings_room_details`
--

DROP TABLE IF EXISTS `bookings_room_details`;
CREATE TABLE IF NOT EXISTS `bookings_room_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) NOT NULL,
  `room_detail_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_contents`
--

DROP TABLE IF EXISTS `cms_contents`;
CREATE TABLE IF NOT EXISTS `cms_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_type` enum('about_us','how_it_works','faq') NOT NULL,
  `title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `title_alias` varchar(255) NOT NULL,
  `icon_path` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeletd` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `title`, `title_alias`, `icon_path`, `created`, `updated`, `isactive`, `isdeletd`) VALUES
(1, 'Test', 'test', 'Sunset14208767832040.jpg', '2015-01-10 08:33:56', '2015-01-10 08:59:43', 1, 0),
(2, 'Test', 'test-1', 'Winter14208752798836.jpg', '2015-01-10 08:34:39', '2015-01-10 08:34:39', 1, 0),
(3, 'Test', 'test-2', 'Winter14208752895558.jpg', '2015-01-10 08:34:49', '2015-01-10 08:34:49', 1, 0),
(4, 'Test', 'test-3', 'Sunset14208768038925.jpg', '2015-01-10 09:00:03', '2015-01-10 09:00:03', 1, 0),
(5, 'tested', 'tested', 'hotel_booking_screen14306584931374.jpg', '2015-05-03 07:08:13', '2015-05-03 07:08:13', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `facilities_hotels`
--

DROP TABLE IF EXISTS `facilities_hotels`;
CREATE TABLE IF NOT EXISTS `facilities_hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecility_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `facilities_register_properties`
--

DROP TABLE IF EXISTS `facilities_register_properties`;
CREATE TABLE IF NOT EXISTS `facilities_register_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_id` int(11) NOT NULL,
  `register_property_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_approved_rating`
--

DROP TABLE IF EXISTS `hotel_approved_rating`;
CREATE TABLE IF NOT EXISTS `hotel_approved_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `avarage_rating` float NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_ratings`
--

DROP TABLE IF EXISTS `hotel_ratings`;
CREATE TABLE IF NOT EXISTS `hotel_ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_title` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `rating` float NOT NULL,
  `is_approvied` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `property_type` enum('Owned Property','Commision') NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `image_caption` varchar(255) NOT NULL,
  `thumb_img` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `place_id`, `title`, `description`, `property_type`, `main_image`, `image_caption`, `thumb_img`, `created`, `updated`, `isactive`, `isdeleted`) VALUES
(1, 1, 'Grand Hotel', '', 'Owned Property', '', '', '', '2015-01-10 10:25:12', '2015-01-10 10:30:54', 1, 1),
(2, 1, 'Grand Hotel', '', 'Owned Property', '', '', '', '2015-01-10 10:26:01', '2015-04-25 04:08:25', 0, 1),
(3, 1, 'Sonar Bangla', '', 'Owned Property', '', '', '', '2015-04-25 04:09:57', '2015-04-25 04:09:57', 1, 0),
(4, 1, 'park', '', 'Owned Property', '', '', '', '2015-04-25 04:11:29', '2015-04-25 04:11:29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_galaries`
--

DROP TABLE IF EXISTS `image_galaries`;
CREATE TABLE IF NOT EXISTS `image_galaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `place_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL COMMENT 'this is main image for upload',
  `main_thumb_big` varchar(255) DEFAULT NULL COMMENT 'this is cropped size for php',
  `main_gallery_size` varchar(255) DEFAULT NULL COMMENT 'this is big size provided by client',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

DROP TABLE IF EXISTS `places`;
CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `main_image` varchar(255) NOT NULL,
  `image_caption` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `state_id`, `title`, `description`, `sequence`, `main_image`, `image_caption`, `created`, `updated`, `isactive`, `isdeleted`) VALUES
(1, 1, 'Kolkata', '', 0, '', '', '2015-01-10 09:44:15', '2015-01-10 10:22:18', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_properties`
--

DROP TABLE IF EXISTS `register_properties`;
CREATE TABLE IF NOT EXISTS `register_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `property_type` enum('Home','Hotel') NOT NULL,
  `rooms_available` int(11) NOT NULL,
  `commision_percent` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `approval_date` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

DROP TABLE IF EXISTS `room_details`;
CREATE TABLE IF NOT EXISTS `room_details` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `room_type_id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_details` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

DROP TABLE IF EXISTS `room_types`;
CREATE TABLE IF NOT EXISTS `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `type_title` varchar(255) NOT NULL,
  `total_nuber_of_rooms` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `room_occupied` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `title`, `code`) VALUES
(1, 'West Bengal', 'IN-WB'),
(2, 'Orissa', 'IN-OR');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `imgae_path` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(30) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('ADMIN','NORMAL','SUBADMIN','CLIENT') NOT NULL DEFAULT 'NORMAL',
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `role`, `isactive`, `isdeleted`, `created`, `modified`) VALUES
(1, 'Dhiman', 'Chakraborty', 'neel.dhiman', 'neel.dhiman@yahoo.com', 'e20942c3cff85f77346d865785b5763363292794', 'ADMIN', 1, 0, '2015-01-10 12:11:00', '2015-01-10 12:11:00'),
(3, 'koushik', 'Sadhukhan', 'ronn.idia', 'ronn.idia@gmail.com', 'e20942c3cff85f77346d865785b5763363292794', 'ADMIN', 1, 0, '2015-01-12 02:05:34', '2015-01-12 02:05:34'),
(8, 'test1', 'test1', 'test1', 'test@gmail.com', 'e30c731d4438cdb9e4c0d676cd12e18dec50343e6bf2568238e46b80b5238d73', 'ADMIN', 1, 0, '2015-01-26 12:25:39', '2015-01-26 12:25:39'),
(9, 'keso', 'keso', 'keso', 'keso@gmail.com', 'e30c731d4438cdb9e4c0d676cd12e18dec50343e6bf2568238e46b80b5238d73', 'ADMIN', 1, 0, '2015-02-01 05:41:38', '2015-02-01 05:41:38'),
(10, 'Sudip', 'Dutta', 'sudip', 'sudip_d7@yahoo.com', '54331df40f874780c29e94617817a6524b4396f5b7debc19579a9cf8d1627f50', 'ADMIN', 1, 0, '2015-02-01 07:23:39', '2015-02-01 07:23:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
