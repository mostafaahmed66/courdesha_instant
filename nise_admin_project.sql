-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 01:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nise_admin_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE `rules` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`id`, `name`, `description`) VALUES
(1, 'super_admin', 'all access'),
(2, 'sub_admin', 'some access'),
(3, 'only view', 'only view the pages');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `rule_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `parent_id`, `rule_id`) VALUES
(16, 'mostafa', 'mo@123', '$2y$10$G6jx1XB9bHjCKXl4ABgsAuHUE6Qxhm/rpaM0kNNjHdM9K8WLZKPeG', 'app/users/upload/704WhatsApp Image 2024-04-04 at 02.01.17_7956bd32.jpg', NULL, 1),
(17, 'shams', 'shams@2005', '$2y$10$ltUyWeB6cZTt/YZwEostkOTwbDIOYgBiqr92KGfIuoM4OrXmmduIC', 'app/users/upload/49WhatsApp Image 2024-04-04 at 02.01.18_c9da413c.jpg', 16, 3),
(18, 'elhoosiny', 'mohamed@elhossiny.net', '$2y$10$i3PnQKuZnZ4mz/QjCbZhL.8mXSoXvS5pKrm4dKQ3hUYq2fmEUSXRm', 'upload/74WhatsApp Image 2024-04-04 at 02.01.17_189242f7.jpg', 16, 2),
(19, 'tony', 'tony@111', '$2y$10$uppNLAxOzBKca3I1ux1cb.u.m.2F/Xcxm75pd.B7urwQYmNjNG9Du', 'round31-dashboard-main/shared/image.jpg', 16, 3),
(20, 'desha', 'desha@123', '$2y$10$L9X3qHE4zKQ1RdDvA5l.0ux9qMeWhuxoWuJY8Tk6dpa2lUdYej1yK', 'image.jpg', 19, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_admin`
-- (See below for the actual view)
--
CREATE TABLE `user_admin` (
`id` int(11)
,`name` varchar(200)
,`email` varchar(200)
,`password` varchar(300)
,`image` varchar(500)
,`createc_by` varchar(200)
,`rule_id` int(11)
,`rule_name` varchar(200)
,`description` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `user_admin`
--
DROP TABLE IF EXISTS `user_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_admin`  AS SELECT `parent`.`id` AS `id`, `parent`.`name` AS `name`, `parent`.`email` AS `email`, `parent`.`password` AS `password`, `parent`.`image` AS `image`, `users`.`name` AS `createc_by`, `rules`.`id` AS `rule_id`, `rules`.`name` AS `rule_name`, `rules`.`description` AS `description` FROM ((`users` `parent` left join `users` on(`users`.`id` = `parent`.`parent_id`)) join `rules` on(`parent`.`rule_id` = `rules`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `rule_id` (`rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
