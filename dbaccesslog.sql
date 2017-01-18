-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 05:28 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

use dbaccesslog;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbaccesslog`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslogs`
--

CREATE TABLE IF NOT EXISTS `accesslogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resId` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned NOT NULL,
  `requestDate` date NOT NULL,
  `sendDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reason` longtext COLLATE utf8_unicode_ci NOT NULL,
  `accStatus` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `accesslogs_resid_foreign` (`resId`),
  KEY `accesslogs_userid_foreign` (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `accesslogs`
--

INSERT INTO `accesslogs` (`id`, `resId`, `userId`, `requestDate`, `sendDate`, `reason`, `accStatus`) VALUES
(1, 1, 2, '2016-11-12', '2017-01-05 15:55:45', 'for seeing price of game for rent', 0),
(2, 2, 2, '2016-01-02', '2017-01-05 15:55:45', 'Loyalty', 1),
(3, 1, 1, '2016-10-02', '2017-01-05 15:55:45', 'request game', 1),
(4, 2, 2, '2016-02-02', '2017-01-05 15:55:45', 'access loyalty', 1),
(5, 1, 1, '2017-10-02', '2017-01-05 15:55:45', 'request new game', 1),
(6, 2, 2, '2016-01-02', '2017-01-05 15:55:45', 'Loyalty', 1),
(7, 1, 1, '2016-10-02', '2017-01-05 15:55:45', 'request game', 2),
(8, 1, 2, '2017-11-12', '2017-01-05 15:55:45', 'for seeing price of game for rent', 0),
(9, 2, 2, '2017-01-02', '2017-01-05 15:55:45', 'access Loyalty 2017', 1),
(10, 1, 1, '2017-10-02', '2017-01-05 15:55:45', 'request game 2017', 2),
(11, 2, 2, '2017-02-02', '2017-01-05 15:55:45', 'access loyalty 2017', 1),
(12, 1, 1, '2017-01-02', '2017-01-05 15:55:45', 'request new game 2017', 2),
(13, 3, 2, '2017-01-02', '2017-01-05 15:55:45', 'Loyalty 2017', 1),
(14, 3, 1, '2017-10-02', '2017-01-05 15:55:45', 'request Engentive 2017', 2),
(15, 1, 2, '2017-10-03', '2017-01-05 15:55:45', 'request game 2017', 2),
(16, 2, 2, '2017-02-03', '2017-01-05 15:55:45', 'access loyalty 2017', 1),
(17, 1, 1, '2017-01-04', '2017-01-05 15:55:45', 'request new game 2017', 2),
(18, 3, 2, '2017-01-05', '2017-01-05 15:55:45', 'Engentive 2017', 1),
(19, 3, 1, '2017-10-03', '2017-01-05 15:55:45', 'request Engentive 2017', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deptName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `deptLocation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deptDescription` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `departments_deptname_unique` (`deptName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `deptName`, `deptLocation`, `deptDescription`) VALUES
(1, 'Master', '642 DE COURCELLE ST SUITE 404 MONTREAL QC H4C 3C5', 'Main office'),
(2, 'IT', '120 St Catherine', 'Computer Science'),
(3, 'new department 3', 'abc', ''),
(4, 'new department 1', 'abc', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_12_21_203136_create_departments_table', 1),
('2016_12_21_203136_create_notices_table', 1),
('2016_12_21_212046_create_resources_table', 1),
('2017_10_12_000000_create_users_table', 1),
('2017_12_21_212344_create_accesslogs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notifyDate` date NOT NULL,
  `expireDate` date NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notifyDate`, `expireDate`, `description`, `level`) VALUES
(1, '2017-01-10', '2017-01-20', 'We have conferrence in second office ', 2),
(2, '2017-01-11', '2017-01-20', 'We must to discuss in IT deparment', 1),
(3, '2017-01-12', '2017-01-20', 'Remember turn off computer before go home', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `resName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `resDescription` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `resources_resname_unique` (`resName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resName`, `resDescription`, `created_at`, `updated_at`) VALUES
(1, 'Loyaltysource.com', 'Loyalty Source’s diverse portfolio includes top-br', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Gameaccess.ca', ' An exclusively Canadian service that allows its s', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Engentive ', 'new resource', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Engentive 1', 'new resource', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'male',
  `firstName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `joinDate` date DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contactPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `level` tinyint(4) NOT NULL DEFAULT '1',
  `deptId` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_deptid_foreign` (`deptId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `gender`, `firstName`, `lastName`, `title`, `designation`, `joinDate`, `dateOfBirth`, `phoneNumber`, `contactName`, `contactPhone`, `picture`, `status`, `level`, `deptId`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edie.klf@gmail.com', '$2y$10$ebCQHneAYpqWn35tXePqiOKLQvw3Np0tiCxc4RbBT5NMyHrrTM3AO', 'male', 'Edie', 'Abdor', 'stage', 'new desination', '2016-11-21', '1975-01-16', '514222444', 'EdieWife', '514123456', 'Edie.jpg', 'active', 1, 1, 'isHwU83OoD4aAjtIJzV0NMj280MwcpIaQHOMquJv4yRC9RoUzoXM3eYXhMgn', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'villa.klf@gmail.com', '$2y$10$qaMZOItRhVoT3p6YnVvQh.Yu/DAvWc0L4HWqZRq0efYz51Dd7A/my', 'female', 'David', 'Villa', 'Full Time', 'new desination', '2010-10-15', '1975-01-12', '514222555', 'user1Wife', '514125555', 'villa.jpg', 'active', 1, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'messi.klf@gmail.com', '$2y$10$bsmC6SRiJEiyEz8yJTAJSujImE3tcOGiQFbTb.KjZyJ1DWBcTVFOG', 'male', 'Lionel', 'Messi', 'Full Time', 'new desination', '2010-10-15', '1975-01-12', '514222555', 'user2Wife', '514125555', 'messi.jpg', 'active', 2, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'user3.klf@gmail.com', '$2y$10$i/35blfuAOGy/K10H/w2quoDmpflH3Z5QtQyYbcj8qoNNLJpWGeRW', 'female', 'user3', 'user3', 'Full Time', 'new desination', '2010-10-15', '1975-01-12', '514222555', 'user3Wife', '514125555', 'admin.jpg', 'deactive', 2, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'admin.klf@gmail.com', '$2y$10$SKl0I5vYwcBivteg38.m/eE.sKhO5NPnLEUciW0GmhgmLPySixPFK', 'male', 'admin', 'admin', 'Full Time', 'new desination', '2010-10-15', '1975-01-12', '514222555', 'AdminWife', '514125555', 'admin.jpg', 'active', 2, 1, 'InGzmZEvcUttNm6silVxaxKzOzwvQpGxwoCL62cw5BoUJP6qsK24WXAWgVH3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'luis.klf@gmail.com', '$2y$10$HmeUsgcUFrqEf080sc/aceZUhFvsO.KcXFYumsiXdt0J8JAI3s6XC', 'male', 'Luis', 'Andres', 'Stage', 'new desination', '2016-12-20', '1974-01-12', '514222444', 'LuisWife', '514124444', 'luis.jpg', 'active', 1, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Henry.klf@gmail.com', '$2y$10$BPPzjATrICXLwfDsQdXYTei6GjJ/SVhQTaR7ydMH33KZWtDeqUQye', 'male', 'Henry', 'Thiare', 'stage', 'new desination', '2016-11-21', '1975-01-16', '514222444', 'HenryWife', '514123456', 'henry.jpg', 'active', 1, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'David.klf@gmail.com', '$2y$10$B8yRjVnqpIj6MVEYFbs1muJvOKNc0fhpgsxyKSV4SBtn/5VZIWLvO', 'male', 'David', 'Beckham', 'Full Time', 'new desination', '2012-10-15', '1975-01-12', '5148888999', 'BeckhamWife', '514125555', 'beckham.jpg', 'active', 1, 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'adminmd5.klf@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'male', 'adminMd5', 'admin', 'Full Time', 'new desination', '2010-10-15', '1975-01-12', '514222555', 'AdminWife', '514125555', 'admin.jpg', 'active', 2, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'micheal@klf.com', '$2y$10$E0.k1UJ00fooeXjqye0FSON4Fm2/.ZZNv8y9vosJygPHCWdaIWHhi', 'male', 'Micheal', 'Owen', 'new player', '', '0000-00-00', '1980-01-05', '12346', '', '', 'QuxH_owen.jpg', 'active', 0, 1, 'AQV3kEpj7YbvwtgkzOg8tA6y4DcQF7xIsFaq2tqZfDbtxYKYkzLZYBfcMGdN', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslogs`
--
ALTER TABLE `accesslogs`
  ADD CONSTRAINT `accesslogs_ibfk_2` FOREIGN KEY (`resId`) REFERENCES `resources` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accesslogs_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`deptId`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
