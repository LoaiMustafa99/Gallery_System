-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 03:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `photo_id`, `author`, `body`) VALUES
(17, 2, 'Loai', 'Amazing'),
(18, 2, 'svdx', 'vxcv');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `alternate_text` varchar(255) DEFAULT NULL,
  `size` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `type`, `filename`, `alternate_text`, `size`) VALUES
(2, '', '', '', 'image/jpeg', '07 - Ghost@Se7ro.com@M7agic.com@lovestoorey210.blogspot.com@by@love_stoorey210.jpg', '', 87436),
(3, '', '', '', 'image/jpeg', '0.jpg', '', 84491),
(4, '', '', '', 'image/jpeg', '0aa60bd9a81635e127fe056694dceefb.jpg', '', 177600),
(5, '', '', '', 'image/jpeg', '0uoxhv38mdb21.jpg', '', 139281),
(6, '', '', '', 'image/jpeg', '2f86cfc688c44cce11897809a90b8cb0.jpg', '', 23904),
(7, '', '', '', 'image/jpeg', '5Ln1w4b.jpg', '', 96198),
(8, '', '', '', 'image/jpeg', 'back1.jpg', '', 49826),
(9, '', '', '', 'image/png', '2.png', '', 48160),
(10, '', '', '', 'image/jpeg', 'back3.jpg', '', 52261),
(11, '', '', '', 'image/jpeg', 'back2.jpg', '', 3957888),
(12, '', '', '', 'image/jpeg', 'back4.jpg', '', 85454),
(13, '', '', '', 'image/gif', 'backadmin2.gif', '', 778632),
(14, '', '', '', 'image/jpeg', 'backadmin1.jpg', '', 2114350),
(15, '', '', '', 'image/gif', 'backadmin3.gif', '', 141501),
(16, '', '', '', 'image/jpeg', 'james_holzhauer_ad_04-08-19_sn7966_square.jpg', '', 32815),
(17, '', '', '', 'image/jpeg', 'pexels-photo-736716.jpeg', '', 13878),
(18, '', '', '', 'image/jpeg', 'Local-Business-Man-3.jpg', '', 187416),
(19, '', '', '', 'image/jpeg', 'sidebar-2.jpg', '', 705539),
(20, '', '', '', 'image/jpeg', 'pexels-pixabay-4158.jpg', '', 1412294),
(21, '', '', '', 'image/jpeg', 'sidebar-3.jpg', '', 547341);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_image`) VALUES
(4, 'ahmad12', '123', 'ahmad', 'mohammad', '0uoxhv38mdb21.jpg'),
(32, 'ahmad', '123456', 'ahmad', 'mohammad', '2f86cfc688c44cce11897809a90b8cb0.jpg'),
(38, 'loai', '1234', 'loai', 'mustafa', 'IMG_20191218_134933_380.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PHOTO_ID` (`photo_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
