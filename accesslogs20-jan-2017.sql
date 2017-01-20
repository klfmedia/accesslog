-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 20, 2017 at 07:12 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

create database accesslogdb;
use accesslogdb;

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accesslogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslogs`
--

CREATE TABLE IF NOT EXISTS `accesslogs` (
  `acclogID` int(5) NOT NULL AUTO_INCREMENT,
  `resID` int(5) NOT NULL,
  `loginDate` datetime NOT NULL,
  `requestDate` date NOT NULL,
  `memberID` int(5) NOT NULL,
  `reason` text NOT NULL,
  `acclogStatus` int(11) NOT NULL COMMENT '0: Deny 1: Accept 2:New',
  `adminResponse` varchar(100) NOT NULL COMMENT 'Reponse for the administrator',
  PRIMARY KEY (`acclogID`),
  KEY `systemID` (`resID`),
  KEY `memberID` (`memberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `accesslogs`
--

INSERT INTO `accesslogs` (`acclogID`, `resID`, `loginDate`, `requestDate`, `memberID`, `reason`, `acclogStatus`, `adminResponse`) VALUES
(1, 1, '2016-11-28 00:00:00', '2017-01-12', 2, 'for seeing price of game for rent', 2, ''),
(2, 2, '2016-11-01 00:00:00', '2017-01-14', 3, 'change the gift for customer ', 2, ''),
(3, 2, '2016-11-01 00:00:00', '2017-01-16', 2, 'compare the point in Loyal', 2, ''),
(4, 1, '2016-11-01 00:00:00', '2017-01-16', 3, 'change the price of game', 2, 'test2'),
(5, 2, '2016-11-01 00:00:00', '2016-12-30', 2, 'consult point for customer in Loyal', 2, ''),
(6, 1, '2016-11-01 00:00:00', '2016-12-28', 2, 'give game title for customer', 2, 'test1'),
(33, 1, '2016-12-07 14:01:46', '2016-12-07', 2, 'hello2', 2, ''),
(52, 1, '2016-12-19 12:10:37', '2016-12-19', 2, 'test', 2, ''),
(53, 1, '2016-12-20 09:21:53', '2016-12-20', 2, 'test modification', 2, ''),
(54, 1, '2016-12-20 09:21:53', '2016-12-20', 2, 'test with modifications 2', 2, ''),
(55, 1, '2016-12-21 10:40:20', '2016-12-21', 2, 'test 21-dec-2016', 1, 'The password is : 1234\r\nThe username is: luis'),
(56, 3, '2017-01-03 11:00:27', '2017-01-03', 2, 'need to watch movies in the office', 0, ''),
(75, 3, '2017-01-13 10:25:21', '2017-01-13', 2, 'everything fine', 1, ''),
(76, 1, '2017-01-18 13:32:24', '2017-01-18', 2, 'Access to a new client ', 1, ''),
(77, 2, '2017-01-18 16:27:44', '2017-01-18', 2, 'iujik', 1, ''),
(78, 2, '2017-01-18 16:38:01', '2017-01-18', 2, 'xdf', 1, ''),
(79, 1, '2017-01-19 12:24:17', '2017-01-19', 2, 'need pass', 1, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslogs`
--
ALTER TABLE `accesslogs`
  ADD CONSTRAINT `accesslogs_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`mID`),
  ADD CONSTRAINT `accesslogs_ibfk_2` FOREIGN KEY (`resID`) REFERENCES `resources` (`resourcesID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
