-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2016 at 11:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

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
-- Table structure for table `belibeli`
--

CREATE TABLE `belibeli` (
  `id` int(11) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `merk` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belibeli`
--

INSERT INTO `belibeli` (`id`, `nama`, `merk`) VALUES
(1, 'A', 'Bensin'),
(2, 'A', 'Solar'),
(3, 'B', 'Bensin'),
(4, 'B', 'Solar'),
(5, 'B', 'Solar'),
(6, 'B', 'WOWO'),
(7, 'A', 'COCACOLA');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
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

CREATE TABLE `contens` (
  `contents_id` int(11) NOT NULL,
  `author` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descrip` longtext NOT NULL,
  `hit` int(11) NOT NULL,
  `geos_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `ver_stat` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
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

CREATE TABLE `geos` (
  `geos_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `pictures_id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
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

CREATE TABLE `travels` (
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

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'default.png',
  `ver_code` varchar(200) NOT NULL,
  `ver_stat` tinyint(1) NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `visitors` (
  `visitors_id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `belibeli`
--
ALTER TABLE `belibeli`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`visitors_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `belibeli`
--
ALTER TABLE `belibeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contens`
--
ALTER TABLE `contens`
  MODIFY `contents_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `deals` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `geos`
--
ALTER TABLE `geos`
  MODIFY `geos_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pictures_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitors_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
