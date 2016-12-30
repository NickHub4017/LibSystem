-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2016 at 11:44 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `AuthID` int(11) NOT NULL,
  `AuthorName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `book_id` int(11) NOT NULL,
  `ISBN` varchar(11) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Edition` varchar(5) NOT NULL,
  `Type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookname`, `book_id`, `ISBN`, `Author`, `Edition`, `Type`) VALUES
('ttt', 1, '566', '1', 'hgh', NULL),
('klk', 2, 'klk', '1', 'ioi', NULL),
('mjmj', 3, '2323', '1', 'fgf', NULL),
('pop', 4, '65', '1', 'ng', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE IF NOT EXISTS `booktype` (
  `idBookType` int(11) NOT NULL,
  `TypeName` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `copybook`
--

CREATE TABLE IF NOT EXISTS `copybook` (
  `idCopyBook` int(11) NOT NULL,
  `BookID` varchar(45) DEFAULT NULL,
  `BookType` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `copybook`
--

INSERT INTO `copybook` (`idCopyBook`, `BookID`, `BookType`) VALUES
(1, '2', 'len'),
(2, '2', 'len'),
(3, '1', 'len'),
(4, '3', 'ref'),
(5, '3', 'ref');

-- --------------------------------------------------------

--
-- Table structure for table `fine`
--

CREATE TABLE IF NOT EXISTS `fine` (
  `LendingID` int(11) NOT NULL,
  `FineAmount` varchar(45) DEFAULT NULL,
  `PaymentID` varchar(45) DEFAULT NULL
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
  `isReturned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lendingrecord`
--

INSERT INTO `lendingrecord` (`idLendingRecord`, `CopybookID`, `Date`, `ReturnDate`, `memship_id`, `isReturned`) VALUES
(2, '1', '2016-12-29 06:55:07', NULL, 1, 0),
(7, '2', '2016-12-30 05:27:47', NULL, 1, 0),
(25, '4', '2016-12-30 09:46:17', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `memship`
--

CREATE TABLE IF NOT EXISTS `memship` (
  `Start` date NOT NULL,
  `END` date DEFAULT NULL,
  `UserID` varchar(45) DEFAULT NULL,
  `memship_id` int(11) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memship`
--

INSERT INTO `memship` (`Start`, `END`, `UserID`, `memship_id`, `isactive`) VALUES
('2016-12-29', '2017-12-29', '5', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `idPayment` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Amount` varchar(45) DEFAULT NULL,
  `UserID` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservation_id` int(11) NOT NULL,
  `copybook_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `isReserved` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `uid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uname`, `pwd`, `address`, `telno`, `name`, `email`, `type`, `uid`) VALUES
('aaa', '123', 'dddd', '232323', 'aaaa', 'a@g.com', 'st', 1),
('bbb', 'bbb', 'bbb', '444', 'bbb', 'bbb', 'li', 2),
('gfgfg', '232', 'xfdf', '121212', 'wewe', 'sdsdsd', 'st', 3),
('gfgf', 'fgfg', 'dfdf', '4343434', 'dfdf', 'dfdf', 'st', 4),
('ffer', '23232', 'fdfdf', '232323', 'weweffd', 'dfdfd@g.com', 'st', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`AuthID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`idBookType`);

--
-- Indexes for table `copybook`
--
ALTER TABLE `copybook`
  ADD PRIMARY KEY (`idCopyBook`);

--
-- Indexes for table `fine`
--
ALTER TABLE `fine`
  ADD PRIMARY KEY (`LendingID`);

--
-- Indexes for table `lendingrecord`
--
ALTER TABLE `lendingrecord`
  ADD PRIMARY KEY (`idLendingRecord`);

--
-- Indexes for table `memship`
--
ALTER TABLE `memship`
  ADD PRIMARY KEY (`memship_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idPayment`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `AuthID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `copybook`
--
ALTER TABLE `copybook`
  MODIFY `idCopyBook` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `lendingrecord`
--
ALTER TABLE `lendingrecord`
  MODIFY `idLendingRecord` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `memship`
--
ALTER TABLE `memship`
  MODIFY `memship_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
