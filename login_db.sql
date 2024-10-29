-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 04:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminn`
--

CREATE TABLE `adminn` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminn`
--

INSERT INTO `adminn` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'shahadat', 'shahadat@gmail.com', '$2y$10$OyfSRYsH7kIJZCq07J1VqO54uohH4uLPj.krQwdn3AZP68p8TfHqK');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'asd', 'admin@cv.com', 'bad website', '2024-10-18 12:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password_hash`) VALUES
(1, 'asd', 'admin@cv.com', '$2y$10$gGUkxOXNrzB9be/zCPGBLuQL/PkGt0QzTxSe/pP.hImVyEdep2VAW'),
(5, 'as', 'admi@cv.com', '$2y$10$QQ6JMFwfq21DLuCkBxF5l.P1fwmOgStjs6KuTGVccbnD7X0GdsSfe'),
(7, 'asfg', 'admdfi@cv.com', '$2y$10$IqIfMDRdFkjuJO8bXHQxfOjacm1bdZjw8JkrkReV82Fxo302vw5Be'),
(8, 'asfgh', 'admdfii@cv.com', '$2y$10$Os9SElJsCRoxkb9x/xqTreZw6Gj6end6J.KPk/0w0MV2PR3pzbjhK'),
(9, 'asfghg', 'admddfii@cv.com', '$2y$10$PBBS96K/H8XJLb9/NHRDO.n19EgHprg4phJS1c0aJ4hHosF2JyBs2'),
(10, 'asfghgf', 'admddfisi@cv.com', '$2y$10$nyo067Svw.vTCHOLh2YJQOaw8sGc4uUEBKNbnn0JEEFIve./sZsrG'),
(11, 'af', 'aaa@aa.com', '$2y$10$VZooBD2/95fHcZEdFEPqrej/mLF65nEXOaPKU3sSGjitqTfR8STMC'),
(12, 'asdfg', 'a@a.com', '$2y$10$k67vKReX7JSzhMIXFEXSluRA78Nb/gD8u7TMhKzVmNzny3VgVcDmq'),
(13, 'asdfg', 'a@aa.com', '$2y$10$opnuS169zdc6eDGPjKmI7OWL4rpx1/TKeaN.llapyfgHM8vkv077e'),
(14, 'bindu', 'bindu@gmail.com', '$2y$10$uGIsm4XVcrtMzsWyRkQjr.jEWHTsmyqYZtC87Ki0pFajPRnREuR6e'),
(16, 'asdfqwer', 'asdfqwer@gmail.com', '$2y$10$KgVMbIyFOLnuTMQfGnvy.erklebVSg7027sMi70sSqgfJaUiCryBS'),
(19, 'chandra', 'chan@gmail.com', '$2y$10$y1Pf1u.GnqXkgpgUQUCxGebVdEmlL3S8d0xwYDccGFqM9ZFcMMVCa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminn`
--
ALTER TABLE `adminn`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminn`
--
ALTER TABLE `adminn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
