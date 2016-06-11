-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2015 at 06:43 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `new_tourpals`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE IF NOT EXISTS `bookings` (
`id` bigint(20) NOT NULL,
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
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `place_id`, `hotel_id`, `user_id`, `childrens`, `adults`, `check_in`, `checkout`, `no_of_days`, `service_charges`, `sevice_tax`, `other_taxes`, `bank_charges`, `courier_charges`, `misc_charges`, `extra_charges`, `extra_bed_charges`, `discount`, `created`, `modified`, `isactive`, `isdeleted`) VALUES
(4, 1, 1, 1, 2, 8, '2015-08-02 00:00:00', '2015-08-06 00:00:00', 4, 20, 20, 0, NULL, NULL, NULL, NULL, NULL, 20, '2015-04-26 07:40:27', '2015-04-26 14:35:15', 0, 1),
(5, 1, 2, 1, 2, 11, '2015-10-12 00:00:00', '2015-10-16 00:00:00', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2015-04-26 11:27:32', '2015-04-26 14:21:04', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bookings_room_details`
--

CREATE TABLE IF NOT EXISTS `bookings_room_details` (
`id` bigint(20) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_detail_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_contents`
--

CREATE TABLE IF NOT EXISTS `cms_contents` (
  `id` int(11) DEFAULT NULL,
  `content_type` enum('about_us','how_it_works','faq') NOT NULL,
  `title` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `facilities`
--

CREATE TABLE IF NOT EXISTS `facilities` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_alias` varchar(255) DEFAULT NULL,
  `icon_path` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeletd` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `facilities`
--

INSERT INTO `facilities` (`id`, `title`, `title_alias`, `icon_path`, `created`, `updated`, `isactive`, `isdeletd`) VALUES
(1, 'Test', 'test', 'Sunset14208767832040.jpg', '2015-01-10 08:33:56', '2015-01-10 08:59:43', 1, 0),
(2, 'Test', 'test-1', 'Winter14208752798836.jpg', '2015-01-10 08:34:39', '2015-01-10 08:34:39', 1, 0),
(3, 'Test', 'test-2', 'Winter14208752895558.jpg', '2015-01-10 08:34:49', '2015-01-10 08:34:49', 1, 0),
(4, 'Test', 'test-3', 'Sunset14208768038925.jpg', '2015-01-10 09:00:03', '2015-01-10 09:00:03', 1, 0),
(5, 'new one', 'new-one', 'profile-pics14306574503123.jpg', '2015-05-03 14:38:46', '2015-05-03 15:14:58', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE IF NOT EXISTS `hotels` (
`id` int(11) NOT NULL,
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
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `place_id`, `title`, `description`, `property_type`, `main_image`, `image_caption`, `thumb_img`, `created`, `updated`, `isactive`, `isdeleted`) VALUES
(1, 1, 'Grand Hotel', '', 'Owned Property', '', '', '', '2015-01-10 10:25:12', '2015-01-10 10:30:54', 1, 1),
(2, 1, 'Grand Hotel', '', 'Owned Property', '', '', '', '2015-01-10 10:26:01', '2015-01-10 10:26:01', 1, 0),
(3, 1, 'test1', '', 'Owned Property', '', '', '', '2015-04-05 15:29:59', '2015-04-05 15:29:59', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_approved_rating`
--

CREATE TABLE IF NOT EXISTS `hotel_approved_rating` (
`id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `avarage_rating` float DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_ratings`
--

CREATE TABLE IF NOT EXISTS `hotel_ratings` (
`id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review_title` varchar(255) DEFAULT NULL,
  `review` text,
  `rating` float DEFAULT NULL,
  `is_approvied` tinyint(4) DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hotel_ratings`
--

INSERT INTO `hotel_ratings` (`id`, `hotel_id`, `user_id`, `review_title`, `review`, `rating`, `is_approvied`, `created`, `updated`, `isactive`, `isdeleted`) VALUES
(2, 2, 3, 'Best Experience', 'Best Experience', 3, 1, '2015-04-26 16:04:05', '2015-04-26 16:10:57', 1, 0),
(3, 2, 5, 'Best Experience new', 'Best Experience new', 4, 1, '2015-04-26 16:09:22', '2015-04-26 16:10:57', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `image_galaries`
--

CREATE TABLE IF NOT EXISTS `image_galaries` (
`id` int(11) NOT NULL,
  `place_id` int(11) DEFAULT NULL,
  `hotel_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL COMMENT 'this is main image for upload',
  `main_thumb_big` varchar(255) DEFAULT NULL COMMENT 'this is cropped size for php',
  `main_gallery_size` varchar(255) DEFAULT NULL COMMENT 'this is big size provided by client',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
`id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '0',
  `main_image` varchar(255) NOT NULL,
  `image_caption` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `state_id`, `title`, `description`, `sequence`, `main_image`, `image_caption`, `created`, `updated`, `isactive`, `isdeleted`) VALUES
(1, 1, 'Kolkata', '', 0, '', '', '2015-01-10 09:44:15', '2015-01-10 10:22:18', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE IF NOT EXISTS `room_details` (
`id` bigint(20) NOT NULL,
  `room_type_id` int(11) NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `room_details` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '1',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `room_types`
--

CREATE TABLE IF NOT EXISTS `room_types` (
`id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `type_title` varchar(255) NOT NULL,
  `total_nuber_of_rooms` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `room_occupied` int(11) DEFAULT NULL,
  `service_charges` double DEFAULT '0',
  `service_taxes` double DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `room_types`
--

INSERT INTO `room_types` (`id`, `hotel_id`, `type_title`, `total_nuber_of_rooms`, `unit_price`, `room_occupied`, `service_charges`, `service_taxes`, `created`, `updated`, `isactive`, `isdeleted`) VALUES
(1, 2, 'delux', 60, 1500, NULL, 300, 120, '2015-04-05 15:36:29', '2015-04-05 15:36:29', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `title`, `code`) VALUES
(1, 'West Bengal', 'IN-WB'),
(2, 'Orissa', 'IN-OR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(30) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('ADMIN','NORMAL','SUBADMIN','CLIENT') NOT NULL DEFAULT 'NORMAL',
  `isactive` tinyint(4) NOT NULL DEFAULT '0',
  `isdeleted` tinyint(4) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `role`, `isactive`, `isdeleted`, `created`, `modified`) VALUES
(1, 'Dhiman', 'Chakraborty', 'neel.dhiman', 'neel.dhiman@yahoo.com', 'e20942c3cff85f77346d865785b5763363292794', 'ADMIN', 0, 1, '2015-01-10 12:11:00', '2015-03-06 04:22:46'),
(3, 'koushik', 'Sadhukhan', 'ronn.idia', 'ronn.idia@gmail.com', 'e20942c3cff85f77346d865785b5763363292794', 'ADMIN', 0, 1, '2015-01-12 02:05:34', '2015-03-06 04:22:42'),
(5, 'keso', 'das', 'keso', 'keso@gmail.com', '$2a$10$pS1OXFux2wc0drrIaQ2ge.xRIn/X6FgzK.woTZWMgXx4ggdU4C2qW', 'ADMIN', 1, 0, '2015-01-22 10:21:01', '2015-03-06 05:41:46'),
(6, 'test1', 'test1', 'test1', 'test@gmail.com', 'e30c731d4438cdb9e4c0d676cd12e18dec50343e6bf2568238e46b80b5238d73', 'ADMIN', 1, 0, '2015-01-27 09:54:22', '2015-01-27 09:54:22'),
(7, 'Durbadal', 'Mukhopadhya', 'durba', 'durba@gmail.com', 'e30c731d4438cdb9e4c0d676cd12e18dec50343e6bf2568238e46b80b5238d73', 'ADMIN', 1, 0, '2015-03-06 05:45:48', '2015-03-06 05:45:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_room_details`
--
ALTER TABLE `bookings_room_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilities`
--
ALTER TABLE `facilities`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_approved_rating`
--
ALTER TABLE `hotel_approved_rating`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_galaries`
--
ALTER TABLE `image_galaries`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_types`
--
ALTER TABLE `room_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bookings_room_details`
--
ALTER TABLE `bookings_room_details`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `facilities`
--
ALTER TABLE `facilities`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hotel_approved_rating`
--
ALTER TABLE `hotel_approved_rating`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_ratings`
--
ALTER TABLE `hotel_ratings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `image_galaries`
--
ALTER TABLE `image_galaries`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room_types`
--
ALTER TABLE `room_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
