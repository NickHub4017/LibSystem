-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 05:30 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `libsystem`
--
CREATE DATABASE IF NOT EXISTS `libsystem` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `libsystem`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `AuthID` int(11) NOT NULL AUTO_INCREMENT,
  `AuthorName` varchar(255) NOT NULL,
  PRIMARY KEY (`AuthID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`AuthID`, `AuthorName`) VALUES
(1, 'dfdfd');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `bookname` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Edition` varchar(5) NOT NULL,
  `Type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookname`, `book_id`, `ISBN`, `Author`, `Edition`, `Type`) VALUES
('ttt', 1, '566', '1', 'hgh', NULL),
('klk', 2, 'klk', '1', 'ioi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE IF NOT EXISTS `booktype` (
  `idBookType` int(11) NOT NULL,
  `TypeName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idBookType`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `copybook`
--

CREATE TABLE IF NOT EXISTS `copybook` (
  `idCopyBook` int(11) NOT NULL AUTO_INCREMENT,
  `BookID` varchar(45) DEFAULT NULL,
  `BookType` varchar(30) NOT NULL,
  PRIMARY KEY (`idCopyBook`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `copybook`
--

INSERT INTO `copybook` (`idCopyBook`, `BookID`, `BookType`) VALUES
(1, '2', 'len');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `LendingID` int(11) NOT NULL,
  `FineAmount` varchar(45) DEFAULT NULL,
  `PaymentID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`LendingID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lendingrecord`
--

CREATE TABLE IF NOT EXISTS `lendingrecord` (
  `idLendingRecord` int(11) NOT NULL,
  `CopybookID` varchar(45) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ReturnDate` date DEFAULT NULL,
  `memship_id` int(11) NOT NULL,
  `isReturned` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idLendingRecord`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `memship`
--

CREATE TABLE IF NOT EXISTS `memship` (
  `Start` date NOT NULL,
  `END` date DEFAULT NULL,
  `UserID` varchar(45) DEFAULT NULL,
  `memship_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`memship_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `idPayment` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Amount` varchar(45) DEFAULT NULL,
  `UserID` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPayment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `copybook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `isReserved` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uname` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telno` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(2) NOT NULL,
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `pwd`, `address`, `telno`, `name`, `email`, `type`, `uid`) VALUES
('aaa', '123', 'dddd', '232323', 'aaaa', 'a@g.com', 'st', 1),
('bbb', 'bbb', 'bbb', '444', 'bbb', 'bbb', 'li', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
