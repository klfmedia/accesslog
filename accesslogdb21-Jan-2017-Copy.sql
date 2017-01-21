-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 19, 2016 at 05:53 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `accesslogs`
--

INSERT INTO `accesslogs` (`acclogID`, `resID`, `loginDate`, `requestDate`, `memberID`, `reason`, `acclogStatus`) VALUES
(1, 1, '2016-11-28 00:00:00', '2016-11-30', 2, 'for seeing price of game for rent', 2),
(2, 2, '2016-11-01 00:00:00', '2016-11-08', 3, 'change the gift for customer ', 2),
(3, 2, '2016-11-01 00:00:00', '2016-11-08', 2, 'compare the point in Loyal', 2),
(4, 1, '2016-11-01 00:00:00', '2016-11-08', 3, 'change the price of game', 2),
(5, 2, '2016-11-01 00:00:00', '2016-11-08', 2, 'consult point for customer in Loyal', 2),
(6, 1, '2016-11-01 00:00:00', '2016-11-08', 2, 'give game title for customer', 0),
(33, 1, '2016-12-07 14:01:46', '2016-12-07', 2, 'hello2', 1),
(34, 2, '2016-12-07 14:01:46', '2016-12-07', 2, 'test t2', 0),
(35, 2, '2016-12-07 14:11:29', '2016-12-07', 2, 'test t2', 0),
(36, 2, '2016-12-07 14:11:29', '2016-12-07', 2, 'i need loyalty', 0),
(37, 2, '2016-12-07 14:11:29', '2016-12-07', 2, 'i need loyalty', 0),
(38, 2, '2016-12-07 14:11:29', '2016-12-07', 2, 'i need loyalty', 0),
(39, 1, '2016-12-07 14:11:29', '2016-12-07', 2, 'FIRST', 0),
(40, 1, '2016-12-07 14:20:05', '2016-12-07', 2, 'FIRST', 0),
(41, 1, '2016-12-07 14:37:05', '2016-12-07', 2, 'FIRST', 0),
(42, 1, '2016-12-07 14:37:05', '2016-12-07', 2, 'FIRST', 0),
(43, 1, '2016-12-07 14:37:05', '2016-12-07', 2, 'FIRST', 0),
(44, 1, '2016-12-07 14:37:05', '2016-12-07', 2, 'FIRST', 0),
(45, 1, '2016-12-07 14:51:24', '2016-12-07', 2, 'FIRST', 0),
(46, 2, '2016-12-07 14:51:24', '2016-12-07', 2, 'i need loyalty', 0),
(47, 2, '2016-12-07 14:51:24', '2016-12-07', 2, 'i need loyalty', 0),
(48, 2, '2016-12-07 14:51:24', '2016-12-07', 2, 'i need loyalty', 0),
(49, 1, '2016-12-12 09:39:45', '2016-12-12', 2, 'Test Game Access Require test', 0),
(50, 1, '2016-12-12 09:39:45', '2016-12-12', 2, 'Test Game Access Require test', 0),
(51, 3, '2016-12-13 14:25:39', '2016-12-13', 2, 'Require the wifi of the company', 0),
(52, 1, '2016-12-19 12:10:37', '2016-12-19', 2, 'test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `depID` int(5) NOT NULL AUTO_INCREMENT,
  `depName` varchar(30) NOT NULL,
  `depLocation` varchar(50) NOT NULL,
  `depDescription` varchar(100) NOT NULL,
  PRIMARY KEY (`depID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`depID`, `depName`, `depLocation`, `depDescription`) VALUES
(1, 'master', '642 DE COURCELLE ST SUITE 404 MONTREAL QC H4C 3C5', 'master'),
(2, 'Accounting', '100 st jacque', 'for financial'),
(3, 'IT', '120 St Catherine ', 'computer science');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `mID` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `departmentID` int(5) NOT NULL,
  `joinDate` date NOT NULL,
  `dateOfBirth` date NOT NULL,
  `phoneNumber` varchar(25) NOT NULL,
  `mEmail` varchar(20) NOT NULL,
  `mPassword` varchar(50) NOT NULL,
  `contactName` varchar(50) NOT NULL,
  `relationContact` varchar(50) NOT NULL,
  `contactPhone` varchar(25) NOT NULL,
  `picture` varchar(25) NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`mID`),
  KEY `departmentID` (`departmentID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`mID`, `gender`, `firstName`, `lastName`, `title`, `designation`, `departmentID`, `joinDate`, `dateOfBirth`, `phoneNumber`, `mEmail`, `mPassword`, `contactName`, `relationContact`, `contactPhone`, `picture`, `status`, `level`) VALUES
(2, 'male', 'Luis', 'Andres', 'stage', 'Project Access Logs', 1, '2016-11-21', '1990-01-14', '514-663-7492', 'luis.klf@gmail.com', '1111', 'Paola Rincon', 'Wife', '514-123-4567', 'a03.png', 'active', '1'),
(3, 'male', 'Edie', 'Abdor', 'stage', 'Web Application', 1, '2016-11-21', '1975-01-16', '514234561', 'edie.klf@gmail.com', '2222', 'Mrs Edies', 'Wife', '514123456', 'a05.png', 'active', '1'),
(4, 'male', 'Sandro', 'Mezzaccapa', 'full time', 'Manager', 1, '2005-11-21', '1975-01-16', '5142345611', 'admin.klf@gmail.com', 'admin', 'Mrs admin', 'Wife', '514-1234567', 'images/avatars/a07.png', 'active', '2');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `resourcesID` int(5) NOT NULL AUTO_INCREMENT,
  `resName` varchar(50) NOT NULL,
  `resDescription` text NOT NULL,
  PRIMARY KEY (`resourcesID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourcesID`, `resName`, `resDescription`) VALUES
(1, 'Gameaccess.ca', ' An exclusively Canadian service that allows its subscribers to rent video games online and receive '),
(2, 'Loyaltysource.com', 'Loyalty Source’s diverse portfolio includes top-branded merchandise, gift cards, digital/mobile products and accessories, travel, and more. With industry best lead times, world-class brands, custom integration and a-la-carte shipping solutions, Loyalty Source has raised the bar in Canadian rewards program sourcing and fulfilment.'),
(3, 'Wi-Fi', 'Wi-Fi of the company');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslogs`
--
ALTER TABLE `accesslogs`
  ADD CONSTRAINT `accesslogs_ibfk_1` FOREIGN KEY (`memberID`) REFERENCES `members` (`mID`),
  ADD CONSTRAINT `accesslogs_ibfk_2` FOREIGN KEY (`resID`) REFERENCES `resources` (`resourcesID`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `departments` (`depID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
