-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 27, 2019 at 09:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DigitalDashboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `emloyeeDetails`
--

CREATE TABLE `emloyeeDetails` (
  `eId` int(11) NOT NULL,
  `eName` varchar(50) DEFAULT NULL,
  `eUsername` varchar(50) NOT NULL,
  `ePassword` varchar(50) NOT NULL,
  `eEmail` varchar(50) DEFAULT NULL,
  `ePhone` varchar(50) DEFAULT NULL,
  `eAddress` varchar(50) DEFAULT NULL,
  `eDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `emloyeeDetails`
--

INSERT INTO `emloyeeDetails` (`eId`, `eName`, `eUsername`, `ePassword`, `eEmail`, `ePhone`, `eAddress`, `eDate`) VALUES
(1, NULL, 'emp', '123', NULL, NULL, NULL, '2019-09-27 09:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `projectDetails`
--

CREATE TABLE `projectDetails` (
  `projectId` int(11) NOT NULL,
  `pIdfk` int(11) NOT NULL,
  `projectName` int(11) NOT NULL,
  `projectDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `projectLeader`
--

CREATE TABLE `projectLeader` (
  `pId` int(11) NOT NULL,
  `pName` varchar(50) DEFAULT NULL,
  `pUsername` varchar(50) NOT NULL,
  `pPassword` varchar(50) NOT NULL,
  `pEmail` varchar(50) DEFAULT NULL,
  `pPhone` varchar(50) DEFAULT NULL,
  `pAddress` varchar(50) DEFAULT NULL,
  `pDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projectLeader`
--

INSERT INTO `projectLeader` (`pId`, `pName`, `pUsername`, `pPassword`, `pEmail`, `pPhone`, `pAddress`, `pDate`) VALUES
(1, NULL, 'vivek', 'vivekfsf', NULL, NULL, NULL, '2019-09-27 09:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `taskDetails`
--

CREATE TABLE `taskDetails` (
  `tId` int(11) NOT NULL,
  `projectId` int(11) NOT NULL,
  `eId` int(11) NOT NULL,
  `tDescription` varchar(200) NOT NULL,
  `tChallenges` varchar(100) DEFAULT NULL,
  `tStatus` varchar(15) NOT NULL,
  `tDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emloyeeDetails`
--
ALTER TABLE `emloyeeDetails`
  ADD PRIMARY KEY (`eId`);

--
-- Indexes for table `projectDetails`
--
ALTER TABLE `projectDetails`
  ADD PRIMARY KEY (`projectId`),
  ADD KEY `pIdfk` (`pIdfk`);

--
-- Indexes for table `projectLeader`
--
ALTER TABLE `projectLeader`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `taskDetails`
--
ALTER TABLE `taskDetails`
  ADD PRIMARY KEY (`tId`),
  ADD KEY `projectId` (`projectId`),
  ADD KEY `eId` (`eId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emloyeeDetails`
--
ALTER TABLE `emloyeeDetails`
  MODIFY `eId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projectDetails`
--
ALTER TABLE `projectDetails`
  MODIFY `projectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projectLeader`
--
ALTER TABLE `projectLeader`
  MODIFY `pId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `taskDetails`
--
ALTER TABLE `taskDetails`
  MODIFY `tId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `projectDetails`
--
ALTER TABLE `projectDetails`
  ADD CONSTRAINT `projectDetails_ibfk_1` FOREIGN KEY (`pIdfk`) REFERENCES `projectLeader` (`pId`);

--
-- Constraints for table `taskDetails`
--
ALTER TABLE `taskDetails`
  ADD CONSTRAINT `taskDetails_ibfk_1` FOREIGN KEY (`projectId`) REFERENCES `projectDetails` (`projectId`),
  ADD CONSTRAINT `taskDetails_ibfk_2` FOREIGN KEY (`eId`) REFERENCES `emloyeeDetails` (`eId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
