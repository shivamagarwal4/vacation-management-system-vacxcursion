-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2017 at 09:13 AM
-- Server version: 10.1.20-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id1021231_saamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `password`) VALUES
('admin', 'admin'),
('medha', '12345'),
('Medha94', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `book_address`
--

CREATE TABLE `book_address` (
  `book_id` int(11) NOT NULL,
  `street` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `pincode` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_address`
--

INSERT INTO `book_address` (`book_id`, `street`, `city`, `state`, `country`, `pincode`) VALUES
(87544, 'Bsndn', 'Kanpur', 'Up', 'India', 3773);

-- --------------------------------------------------------

--
-- Table structure for table `book_detail`
--

CREATE TABLE `book_detail` (
  `book_id` varchar(20) NOT NULL,
  `vehicle_id` varchar(20) NOT NULL,
  `hotel_id` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `s_count` int(11) NOT NULL,
  `d_count` int(11) NOT NULL,
  `m_count` int(11) NOT NULL,
  `date` date NOT NULL,
  `no_of_days` int(11) NOT NULL,
  `no_of_vehicle` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_detail`
--

INSERT INTO `book_detail` (`book_id`, `vehicle_id`, `hotel_id`, `dest`, `s_count`, `d_count`, `m_count`, `date`, `no_of_days`, `no_of_vehicle`, `price`) VALUES
('80810', '312', '7524508', 'munnar', 1, 1, 0, '2017-03-30', 5, 1, 13000),
('97623', '312', '7524508', 'munnar', 1, 1, 0, '2017-03-29', 5, 1, 13000),
('87544', '1040', '286468', 'Goa', 1, 1, 1, '2017-04-12', 3, 1, 38600),
('38587', '1040', '286468', 'goa', 1, 0, 1, '2017-03-31', 4, 1, 37300),
('17042', '1243', '280135', 'Nainital', 0, 0, 1, '2017-03-29', 3, 1, 17900);

-- --------------------------------------------------------

--
-- Table structure for table `book_member`
--

CREATE TABLE `book_member` (
  `book_id` int(11) DEFAULT NULL,
  `adul_count` int(11) DEFAULT NULL,
  `child_count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_member`
--

INSERT INTO `book_member` (`book_id`, `adul_count`, `child_count`) VALUES
(87544, 72751, 0);

-- --------------------------------------------------------

--
-- Table structure for table `book_trip`
--

CREATE TABLE `book_trip` (
  `email` varchar(50) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `booked_date` date DEFAULT NULL,
  `time_booking` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_trip`
--

INSERT INTO `book_trip` (`email`, `first_name`, `last_name`, `contact`, `book_id`, `booked_date`, `time_booking`) VALUES
('pratyushagarwal3@gmail.com', 'Pratyush', 'Agarwal', 2147483647, 87544, '2017-04-12', '2017-03-23 10:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE `budget` (
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`price`) VALUES
(50000),
(35000),
(25000),
(20000),
(15000),
(100000);

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `dest_id` varchar(20) NOT NULL,
  `dest_name` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`dest_id`, `dest_name`) VALUES
('8712583', 'nainital'),
('7829732', 'goa'),
('200104', 'Mizoram'),
('3216500', 'munnar');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` varchar(20) NOT NULL,
  `dest_name` varchar(20) NOT NULL,
  `hotel_name` varchar(30) NOT NULL,
  `hotel_type` varchar(20) NOT NULL,
  `contact` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `dest_name`, `hotel_name`, `hotel_type`, `contact`) VALUES
('3038207', 'nainital', ' Alka Hotel', '4', '1234567'),
('28738', 'goa', 'Hill Haven', '3', '8907654'),
('8418912', 'goa', 'The Goa Inn', '3', '123456'),
('280135', 'nainital', 'Manu Maharani', '5', '4567890'),
('7281652', 'Mizoram', 'Hotel Regency', '3', '6789054'),
('286468', 'goa', 'The Resorta', '4', '5678889234'),
('7524508', 'munnar', 'hotel Bliss', '4', '9144568915'),
('923241', 'munnar', 'H Residency', '4', '9839651250'),
('31307', 'munnar', 'land mark', '5', '9846512379'),
('578426', 'munnar', 'The Resorta', '3', '3566778999');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room`
--

CREATE TABLE `hotel_room` (
  `hotel_id` varchar(20) NOT NULL,
  `room_type` varchar(20) NOT NULL,
  `price_room_day` int(11) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel_room`
--

INSERT INTO `hotel_room` (`hotel_id`, `room_type`, `price_room_day`, `capacity`) VALUES
('8418912', 'single', 1000, 10),
('8418912', 'double', 1200, 10),
('8418912', 'minisuite', 1800, 10),
('28738', 'single', 1000, 10),
('28738', 'double', 1500, 10),
('28738', 'minisuite', 2000, 10),
('3038207', 'single', 1800, 10),
('3038207', 'double', 2300, 10),
('3038207', 'minisuite', 3000, 10),
('280135', 'single', 2000, 10),
('280135', 'double', 3500, 10),
('280135', 'minisuite', 4000, 10),
('7281652', 'single', 1200, 10),
('7281652', 'double', 1700, 10),
('7281652', 'minisuite', 2500, 10),
('286468', 'single', 2000, 15),
('286468', 'double', 3500, 15),
('286468', 'minisuite', 6000, 5),
('7524508', 'single', 900, 10),
('7524508', 'double', 1200, 10),
('7524508', 'minisuite', 1500, 9),
('923241', 'single', 1500, 10),
('923241', 'double', 1200, 10),
('923241', 'minisuite', 1500, 10),
('31307', 'single', 4500, 12),
('31307', 'double', 5000, 13),
('31307', 'minisuite', 6000, 10),
('578426', 'single', 4500, 2),
('578426', 'double', 5000, 2),
('578426', 'minisuite', 8000, 1),
('793566', 'single', 5000, 1),
('793566', 'double', 8000, 1),
('793566', 'minisuite', 12000, 1),
('7552756', 'single', 2, 23),
('7552756', 'double', 2, 2),
('7552756', 'minisuite', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` varchar(20) NOT NULL,
  `dest_name` varchar(20) NOT NULL,
  `hotel_id` varchar(20) NOT NULL,
  `vehicle_id` varchar(20) NOT NULL,
  `no_vehicles` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `durationday` int(10) NOT NULL,
  `durationnight` int(10) NOT NULL,
  `packimage` varchar(30) NOT NULL,
  `time_of_pack` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `dest_name`, `hotel_id`, `vehicle_id`, `no_vehicles`, `price`, `durationday`, `durationnight`, `packimage`, `time_of_pack`) VALUES
('381750', 'nainital', '280135', '1243', 1, 17900, 3, 2, 'images/nainital-lake.jpg', '2017-03-23 07:26:07'),
('326240', 'goa', '286468', '1040', 1, 37300, 4, 3, 'images/goa4.jpg', '2017-03-22 09:23:14'),
('312308', 'goa', '286468', '1040', 1, 38600, 3, 2, 'images/GOA-TRAVEL-GUIDE.jpg', '2017-03-23 07:27:54'),
('156064', 'munnar', '7524508', '312', 1, 13000, 5, 4, 'images/925013727s.jpg', '2017-03-23 07:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `package_room`
--

CREATE TABLE `package_room` (
  `package_id` varchar(20) NOT NULL,
  `single` int(11) NOT NULL DEFAULT '0',
  `doubleroom` int(11) NOT NULL DEFAULT '0',
  `minisuite` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_room`
--

INSERT INTO `package_room` (`package_id`, `single`, `doubleroom`, `minisuite`) VALUES
('312308', 1, 1, 1),
('381750', 0, 0, 1),
('156064', 1, 1, 0),
('326240', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gpluslink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `fname`, `lname`, `email`, `gender`, `locale`, `gpluslink`, `picture`, `created`, `modified`) VALUES
(7, 'google', '104634118053620384684', 'Apurva kumar', 'Singh', 'kumarapurva007@gmail.com', 'male', 'en', 'https://plus.google.com/104634118053620384684', 'https://lh5.googleusercontent.com/-U8tNjDP85nM/AAAAAAAAAAI/AAAAAAAAAC4/juHdZQ7vc2g/photo.jpg', '2017-03-20 19:03:55', '2017-03-21 20:31:06'),
(8, 'google', '114076942184645973337', 'Shivam', 'Agarwal', 'shivam00123@gmail.com', 'male', 'en-GB', 'https://plus.google.com/114076942184645973337', 'https://lh3.googleusercontent.com/-GZoQNl2-UGM/AAAAAAAAAAI/AAAAAAAAAB0/7Sb1_fDvH2M/photo.jpg', '2017-03-20 19:11:50', '2017-03-22 08:48:17'),
(9, 'google', '109348622527198214289', 'Medha', 'Agrawal', 'medhaag94@gmail.com', 'female', 'en', 'https://plus.google.com/109348622527198214289', 'https://lh6.googleusercontent.com/-CR4g5Ux-JhI/AAAAAAAAAAI/AAAAAAAAAB4/zVwy4Fox4KI/photo.jpg', '2017-03-20 22:50:08', '2017-03-23 06:34:31'),
(10, 'google', '103845691284819729982', 'Pratyush', 'Agarwal', 'pratyushagarwal3@gmail.com', '', 'en', 'https://plus.google.com/103845691284819729982', 'https://lh4.googleusercontent.com/-5iUZD3c7UdY/AAAAAAAAAAI/AAAAAAAAArs/Aqodl9avrJk/photo.jpg', '2017-03-21 07:20:20', '2017-03-23 16:34:42'),
(11, 'google', '107627981254500891649', 'Sruthi Anand', 'C', 'sruthi@nitc.ac.in', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-21 10:06:45', '2017-03-21 10:14:07'),
(12, 'google', '100800088900479463896', 'Akshita', 'Pandey', 'akshita2030@gmail.com', 'female', 'en', 'https://plus.google.com/100800088900479463896', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-21 17:54:31', '2017-03-21 18:26:27'),
(13, 'google', '114350281595368453538', 'Febna', 'M K', 'febna@nitc.ac.in', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-22 05:07:57', '2017-03-22 05:11:14'),
(14, 'google', '116704793578637685714', 'Kopal', 'Agrawal', 'kopalagrawal75429@gmail.com', '', 'en', '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2017-03-22 18:10:39', '2017-03-22 18:16:10'),
(15, 'google', '109161214261393943678', 'Sumeet', 'Toppo', 'sumeettoppo95@gmail.com', 'male', 'en', 'https://plus.google.com/109161214261393943678', 'https://lh4.googleusercontent.com/-GTYYjlT_CgQ/AAAAAAAAAAI/AAAAAAAAAJ4/WSgchfRNAhU/photo.jpg', '2017-03-22 18:42:11', '2017-03-22 18:57:26'),
(16, 'google', '109342363608743388351', 'Amit', 'Kumar', 'ami3443@gmail.com', 'male', 'en', 'https://plus.google.com/109342363608743388351', 'https://lh5.googleusercontent.com/-tu52eMWFOKM/AAAAAAAAAAI/AAAAAAAAABc/gY_hdOP0xw0/photo.jpg', '2017-03-23 09:56:52', '2017-03-23 09:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` varchar(20) NOT NULL,
  `dest_name` varchar(20) NOT NULL,
  `vehicle_type` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_day` int(11) NOT NULL,
  `total_no` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `dest_name`, `vehicle_type`, `capacity`, `price_day`, `total_no`) VALUES
('1040', 'goa', 'SUV', 7, 1200, 10),
('812', 'goa', 'sedan', 5, 1000, 10),
('260', 'goa', 'scooty', 2, 800, 10),
('530', 'nainital', 'scooty', 2, 750, 10),
('998', 'nainital', 'sedan', 5, 1200, 10),
('1243', 'nainital', 'SUV', 7, 1800, 10),
('102', 'Mizoram', 'scooty', 2, 900, 10),
('831', 'Mizoram', 'sedan', 5, 1200, 10),
('1777', 'Mizoram', 'SUV', 7, 1800, 10),
('312', 'munnar', 'scooty', 2, 400, 10),
('879', 'munnar', 'sedan', 5, 1200, 10),
('1013', 'munnar', 'SUV', 7, 2500, 7),
('16', 'g', 'scooty', 2, 2, 2),
('811', 'g', 'sedan', 5, 2, 2),
('1511', 'g', 'SUV', 7, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book_address`
--
ALTER TABLE `book_address`
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_member`
--
ALTER TABLE `book_member`
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_trip`
--
ALTER TABLE `book_trip`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_name`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `dest_id` (`dest_name`);

--
-- Indexes for table `hotel_room`
--
ALTER TABLE `hotel_room`
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`),
  ADD KEY `dest_id` (`dest_name`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `dest_id` (`dest_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
