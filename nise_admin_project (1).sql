-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2024 at 03:45 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `image` varchar(500) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `rule_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `parent_id`, `rule_id`) VALUES
(16, 'mostafa', 'mo@123', '$2y$10$G6jx1XB9bHjCKXl4ABgsAuHUE6Qxhm/rpaM0kNNjHdM9K8WLZKPeG', 'app/users/upload/704WhatsApp Image 2024-04-04 at 02.01.17_7956bd32.jpg', NULL, 1),
(17, 'shams', 'shams@2005', '$2y$10$ltUyWeB6cZTt/YZwEostkOTwbDIOYgBiqr92KGfIuoM4OrXmmduIC', 'app/users/upload/49WhatsApp Image 2024-04-04 at 02.01.18_c9da413c.jpg', 16, 3),
(18, 'elhoosiny', 'mohamed@elhossiny.net', '$2y$10$i3PnQKuZnZ4mz/QjCbZhL.8mXSoXvS5pKrm4dKQ3hUYq2fmEUSXRm', 'upload/74WhatsApp Image 2024-04-04 at 02.01.17_189242f7.jpg', 16, 2),
(19, 'tony', 'tony@111', '$2y$10$uppNLAxOzBKca3I1ux1cb.u.m.2F/Xcxm75pd.B7urwQYmNjNG9Du', 'round31-dashboard-main/shared/image.jpg', 16, 3),
(20, 'desha', 'desha@123', '$2y$10$L9X3qHE4zKQ1RdDvA5l.0ux9qMeWhuxoWuJY8Tk6dpa2lUdYej1yK', 'image.jpg', 19, 1),
(21, 'zi', 'zi@123', '$2y$10$uQKBpQJQBnDjRqZzQ5ke0OZ.PQzDhZ7w18j4drx072SV2rlpICV6m', 'image.jpg', 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `desciption` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `desciption`, `created_at`, `updated_at`) VALUES
(1, 'web', 'web development', '2024-08-26 13:11:15', '2024-08-26 13:11:15'),
(2, 'Accusantium et inven', 'bororirypa@mailinator.com', '2024-08-26 13:11:20', '2024-08-26 13:11:20'),
(3, 'Web developments', 'sdfg', '2024-09-09 17:28:52', '2024-09-09 17:28:52'),
(4, 'network', 'network securtiy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  `attachments` text DEFAULT NULL,
  `round_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `demo_link`, `attachments`, `round_id`, `created_at`, `updated_at`) VALUES
(1, 'project_1', 'xadakukaw@mailinator.com', 'https://www.cyfohatylyfak.info', NULL, 1, '2024-08-26 13:11:58', '2024-08-26 13:11:58'),
(2, 'project_2', 'jipy@mailinator.com', 'https://www.zuci.org.uk', NULL, 1, '2024-08-26 13:12:01', '2024-08-26 13:12:01'),
(3, 'project_3', 'qajigiso@mailinator.com', 'https://www.coquvy.org.au', NULL, 3, '2024-09-09 17:29:39', '2024-09-09 17:29:39'),
(4, 'nise_admin', 'dashboard', 'niefeifbe@nndocn', NULL, 6, NULL, NULL),
(7, 'final project', 'this is final native project', 'courdesha@123', NULL, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `demo_link` varchar(255) DEFAULT NULL,
  `attachments` text DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `title`, `demo_link`, `attachments`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'the final project courdesha is very fantstic', 'courdesha@123', NULL, 7, 19, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `repliy_project`
-- (See below for the actual view)
--
CREATE TABLE `repliy_project` (
`id` bigint(20) unsigned
,`rep_title` varchar(255)
,`demo_link` varchar(255)
,`title` varchar(255)
,`name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `rounds`
--

CREATE TABLE `rounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `round_number` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rounds`
--

INSERT INTO `rounds` (`id`, `round_number`, `description`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '507', 'buny@mailinator.com', 1, 9, '2024-08-26 13:11:48', '2024-08-26 13:11:48'),
(2, 'flutter 30', 'romytyrux@mailinator.com', 2, 6, '2024-08-26 13:11:51', '2024-08-26 13:11:51'),
(3, 'Web Round 31', 'dfhgjk', 3, 6, '2024-09-09 17:29:12', '2024-09-09 17:29:12'),
(6, 'web 31', 'web development', 1, 9, NULL, NULL),
(7, 'network 30', 'net', 4, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `round_course`
-- (See below for the actual view)
--
CREATE TABLE `round_course` (
`id` bigint(20) unsigned
,`round_number` varchar(255)
,`course_name` varchar(255)
,`user_name` varchar(255)
,`created_at` timestamp
,`updated_at` timestamp
);

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
(3, 'only view', 'only view the pages'),
(4, 'student_rule', 'student only');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `round_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `round_id`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 6, 19, NULL, NULL),
(6, 2, 20, NULL, NULL),
(7, 7, 21, NULL, NULL),
(8, 2, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_info`
-- (See below for the actual view)
--
CREATE TABLE `student_info` (
`id` bigint(20) unsigned
,`round_name` varchar(255)
,`user_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `types` enum('instructor','student') NOT NULL DEFAULT 'student',
  `rule_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `types`, `rule_id`, `created_at`, `updated_at`) VALUES
(6, 'moahmed elhossiny', 'toma@gmai.com', '$2y$10$mv.b.6YpapiUWc6sC/firO6lCeyKrdWV3eb4Ju6.bV7aa/8z6Hm4K', 'instructor', NULL, '2024-09-09 17:28:38', '2024-09-09 17:28:38'),
(9, 'ziad', 'zi@123', '$2y$10$4Kk103ozgmMm1telt951Pe.cfaOpFlSYGn9fV9g0IsYorRZv0TkT.', 'instructor', NULL, NULL, NULL),
(19, 'hana', 'hana@123', '$2y$10$L5IhHDWZFLAGFyp4SFpMru/jmjOe0VCxArumuohIsJwlVurvXNVGW', 'student', 4, NULL, NULL),
(20, 'islam', 'islam@123', '$2y$10$B3VclL1SzXhlWVMN8HNEgurtO/hZeK8Y59sFUoTacaeX3/nuSgi9G', 'student', 4, NULL, NULL),
(21, 'tony', 'tony@111', '$2y$10$7zACon3CanP7QHrc8UnKw.cbvTHPxhnrsvRor5KaWAZxYoc8EeAEC', 'student', 4, NULL, NULL),
(22, 'masrayyyy', 'massry@123', '$2y$10$R7q8d8g9iF8b0ibqq9uas.kQ0Yz6bA59v1QXA.I/rFhDVD5t6F1NW', 'student', 4, NULL, NULL);

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
-- Structure for view `repliy_project`
--
DROP TABLE IF EXISTS `repliy_project`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `repliy_project`  AS SELECT `replies`.`id` AS `id`, `replies`.`title` AS `rep_title`, `replies`.`demo_link` AS `demo_link`, `projects`.`title` AS `title`, `users`.`name` AS `name` FROM ((`replies` join `projects` on(`replies`.`project_id` = `projects`.`id`)) join `users` on(`replies`.`user_id` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `round_course`
--
DROP TABLE IF EXISTS `round_course`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `round_course`  AS SELECT `r`.`id` AS `id`, `r`.`round_number` AS `round_number`, `c`.`title` AS `course_name`, `u`.`name` AS `user_name`, `r`.`created_at` AS `created_at`, `r`.`updated_at` AS `updated_at` FROM ((`rounds` `r` join `courses` `c` on(`r`.`course_id` = `c`.`id`)) join `users` `u` on(`r`.`user_id` = `u`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `student_info`
--
DROP TABLE IF EXISTS `student_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_info`  AS SELECT `students`.`id` AS `id`, `rounds`.`round_number` AS `round_name`, `users`.`name` AS `user_name` FROM ((`students` join `rounds` on(`students`.`round_id` = `rounds`.`id`)) join `users` on(`students`.`user_id` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_admin`
--
DROP TABLE IF EXISTS `user_admin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_admin`  AS SELECT `parent`.`id` AS `id`, `parent`.`name` AS `name`, `parent`.`email` AS `email`, `parent`.`password` AS `password`, `parent`.`image` AS `image`, `admins`.`name` AS `createc_by`, `rules`.`id` AS `rule_id`, `rules`.`name` AS `rule_name`, `rules`.`description` AS `description` FROM ((`admins` `parent` left join `admins` on(`admins`.`id` = `parent`.`parent_id`)) join `rules` on(`parent`.`rule_id` = `rules`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `rule_id` (`rule_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_round_id_foreign` (`round_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_project_id_foreign` (`project_id`),
  ADD KEY `replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `rounds`
--
ALTER TABLE `rounds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rounds_course_id_foreign` (`course_id`),
  ADD KEY `rounds_user_id_foreign` (`user_id`);

--
-- Indexes for table `rules`
--
ALTER TABLE `rules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_round_id_foreign` (`round_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `rule_id` (`rule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rounds`
--
ALTER TABLE `rounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rules`
--
ALTER TABLE `rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `admins_ibfk_2` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_round_id_foreign` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`),
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `rounds`
--
ALTER TABLE `rounds`
  ADD CONSTRAINT `rounds_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `rounds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_round_id_foreign` FOREIGN KEY (`round_id`) REFERENCES `rounds` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rule_id`) REFERENCES `rules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
