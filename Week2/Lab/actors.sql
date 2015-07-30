-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2015 at 03:12 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phpclasssummer2015`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) COLLATE utf8_bin NOT NULL,
  `lastName` varchar(100) COLLATE utf8_bin NOT NULL,
  `dob` varchar(100) COLLATE utf8_bin NOT NULL,
  `height` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstName`, `lastName`, `dob`, `height`) VALUES
(2, 'Andrew', 'Lincoln', '1973-09-14', '5''10'''''),
(3, 'Steven', 'Yeun', '1983-12-21', '5''9'''''),
(4, 'Chandler', 'Riggs', '1999-06-27', '5''4'''''),
(5, 'Norman', 'Reedus', '1969-01-06', '5''10'''''),
(6, 'Lauren', 'Cohan', '1982-01-07', '5''7'''''),
(7, 'asdf', 'asdf', '2015-07-22', '5''10'''''),
(8, 'fa;lkjashf', 'ihsadfiao', '2015-07-16', 'awet3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
