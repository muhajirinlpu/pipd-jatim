-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2016 at 04:26 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jatim`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `create_at`) VALUES
(1, 'Taman', '2016-10-31 01:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comments_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contens`
--

CREATE TABLE IF NOT EXISTS `contens` (
  `contents_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descrip` longtext NOT NULL,
  `hit` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `geos_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `ver_stat` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contens`
--

INSERT INTO `contens` (`contents_id`, `author`, `type`, `title`, `descrip`, `hit`, `slug`, `geos_id`, `cat_id`, `ver_stat`, `create_at`) VALUES
(1, 13, 1, 'Taman bungkul', 'Taman Bungkul berlokasi di Jalan Raya Darmo Surabaya, taman ini terletak di area sekitar 900 meter persegi dan \r\ndilengkapi dengan fasilitas pendukung seperti amfiteater dengan diameter 33 M, jogging track, taman bermain \r\nanak-anak dan lahan untuk papan luncur. Selain itu, taman ini juga difasilitasi dengan akses internet nirkabel.\r\n\r\nTaman Bungkul diambil dari nama Mbah Bungkul, dimana makam beliau juga terletak pada taman ini. Mbah Bungkul \r\nadalah julukan untuk Ki Supo, seorang ulama di kerajaan Majapahit (abad XV), yang juga saudara ipar Raden \r\nRahmat atau Sunan Ampel.\r\n\r\nTaman Bungkul sudah seperti jantung kota Surabaya. Taman ini sekarang menjadi taman wisata bagi mereka yang \r\ningin menikmati suasana hijau di tengah kota. Beberapa acara juga sering di gelar ini taman ini bagi kegiatan \r\nhiburan atau kebudayaan\r\n\r\nDi bagian belakang taman, terdapat beberapa warung yang menawarkan menu khas Surabaya, seperti Rawon, Soto, \r\nBakso dan banyak lagi. Taman Bungkul selalu ramai dikunjungi dari pagi hingga malam hari dan menjadi bagian \r\ndari kota Surabaya yang pantas untuk dibanggakan.\r\n', 1, 'taman-bungkul310725', 2, 1, 1, '2016-10-31 01:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE IF NOT EXISTS `deals` (
  `deals` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `geos`
--

CREATE TABLE IF NOT EXISTS `geos` (
  `geos_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geos`
--

INSERT INTO `geos` (`geos_id`, `name`, `parent`, `level`, `create_at`) VALUES
(1, 'Jawa timur', 0, 2, '2016-10-31 01:22:13'),
(2, 'Surabaya', 1, 1, '2016-10-31 01:22:18'),
(3, 'Malang', 1, 1, '2016-10-31 01:22:46'),
(4, 'Sidoarjo', 1, 1, '2016-10-31 01:22:55'),
(5, 'Kediri', 1, 1, '2016-10-31 01:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `pictures_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`pictures_id`, `contents_id`, `pic_name`, `create_at`) VALUES
(1, 1, 'taman-bungkul.jpg', '2016-10-31 01:32:31'),
(2, 1, 'taman-bungkul2.jpg', '2016-10-31 01:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE IF NOT EXISTS `rates` (
  `rates_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `val` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE IF NOT EXISTS `travels` (
  `travels_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `geos_id` int(11) NOT NULL,
  `address` mediumtext NOT NULL,
  `contact` varchar(255) NOT NULL,
  `ver_stat` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `ver_code` varchar(200) NOT NULL,
  `ver_stat` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `email`, `pass`, `role`, `avatar`, `ver_code`, `ver_stat`, `create_at`) VALUES
(12, 'admin', '$2y$10$AUelPfeMwxkftWn7/t.1s..HMJPxBuS9BQwKeWm40wXN9UjIqhs1C', 3, 'default.png', '5c8cd057c479d9c498d1ea45de31be1fcd215ffe', 1, '2016-10-22 04:04:07'),
(13, 'muhajirinlpu@gmail.com', '$2y$10$eiLRtrwKSBufr6YlEBDp7OCfgHp5EbEDZ18pdI0FQEwhK3rTCPo6C', 2, 'default.png', 'c3b8fd17edeb06f9270e21f92a1a442914ff21c9', 1, '2016-10-22 04:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `visitors_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitors_id`, `ip`, `create_at`) VALUES
(5, '::1', '2016-10-31 01:21:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `contens`
--
ALTER TABLE `contens`
  ADD PRIMARY KEY (`contents_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`deals`);

--
-- Indexes for table `geos`
--
ALTER TABLE `geos`
  ADD PRIMARY KEY (`geos_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pictures_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rates_id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`travels_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitors_id`),
  ADD UNIQUE KEY `ip` (`ip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contens`
--
ALTER TABLE `contens`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deals` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `geos`
--
ALTER TABLE `geos`
  MODIFY `geos_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pictures_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rates_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `travels_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitors_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
