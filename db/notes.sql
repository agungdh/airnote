-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 07, 2018 at 10:28 AM
-- Server version: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `display` enum('y','n') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `level` enum('a','u') NOT NULL,
  `validated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `level`, `validated_at`) VALUES
(1, 'Administrator', 'admin@email.com', '$2y$10$pV84F2ooJCNs/OQ0jOMpCeq1SfJytsO4xW4cbybg.YlAewPc1Nmyy', 'a', NULL),
(2, 'Basic User', 'user@email.com', '$2y$10$IbMVm7aHhxnjBlZ0XuBjVu3pbuGHsLOtD80XfbuH7dz/8VLRea686', 'u', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_note`
-- (See below for the actual view)
--
CREATE TABLE `v_note` (
`id` int(11)
,`note` text
,`date` date
,`display` enum('y','n')
,`user_id` int(11)
,`name` varchar(191)
,`email` varchar(191)
,`password` varchar(191)
,`level` enum('a','u')
,`validated_at` date
);

-- --------------------------------------------------------

--
-- Structure for view `v_note`
--
DROP TABLE IF EXISTS `v_note`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`localhost` SQL SECURITY DEFINER VIEW `v_note`  AS  select `n`.`id` AS `id`,`n`.`note` AS `note`,`n`.`date` AS `date`,`n`.`display` AS `display`,`n`.`user_id` AS `user_id`,`u`.`name` AS `name`,`u`.`email` AS `email`,`u`.`password` AS `password`,`u`.`level` AS `level`,`u`.`validated_at` AS `validated_at` from (`note` `n` join `user` `u`) where (`n`.`user_id` = `u`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
