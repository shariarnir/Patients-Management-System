-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 10:12 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Bill_No` char(8) NOT NULL,
  `Doctor_Bill` varchar(8) DEFAULT NULL,
  `Room_Bill` varchar(8) DEFAULT NULL,
  `Medicine_Bill` varchar(8) DEFAULT NULL,
  `Pid` char(10) DEFAULT NULL,
  `Discharge_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Doctor_Name` varchar(100) DEFAULT NULL,
  `d_mail` varchar(100) NOT NULL,
  `d_passw` varchar(100) NOT NULL,
  `D_id` char(9) NOT NULL,
  `Phone_No` char(11) DEFAULT NULL,
  `Department` varchar(11) DEFAULT NULL,
  `Gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Doctor_Name`, `d_mail`, `d_passw`, `D_id`, `Phone_No`, `Department`, `Gender`) VALUES
('sj', '', '', 'd-1', '23456', 'medicine', 'male'),
('raihan', 'r@gmail.com', '12345', 'd12', '019775655', 'Heart', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `Name` varchar(100) DEFAULT NULL,
  `p_mail` varchar(100) NOT NULL,
  `p_passw` varchar(100) NOT NULL,
  `P_id` char(10) NOT NULL,
  `Contract_No` char(15) DEFAULT NULL,
  `Gender` varchar(7) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `Did` char(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`Name`, `p_mail`, `p_passw`, `P_id`, `Contract_No`, `Gender`, `age`, `Did`) VALUES
('Abdul job', 'aj@gmail.com', '12345', 'p1', '12345', 'male', '1993', 'd-1'),
('Rahim Khan', 'rh@gmail.com', '12345', 'p2', '01923456', 'Male', '24', NULL),
('karim Khan', 'kk@gmail.com', '12345', 'p3', '0167453745', 'Male', '23', NULL),
('Rahim Talukdar', 'r@gmail.com', '12345', 'p4', '017575645', 'Male', '35', NULL),
('Ram', 'rm@gmail.com', '12345', 'p6', '0174657686', 'male', '47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `Room_type` varchar(10) DEFAULT NULL,
  `Room_no` varchar(5) NOT NULL,
  `Nid` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`Room_type`, `Room_no`, `Nid`) VALUES
('normal', 'r-1', 'n-1');

-- --------------------------------------------------------

--
-- Table structure for table `treatment_info`
--

CREATE TABLE `treatment_info` (
  `p_id` char(10) NOT NULL,
  `d_id` char(9) NOT NULL,
  `Diseases_type` varchar(100) NOT NULL,
  `Admited_Date` varchar(50) NOT NULL,
  `cabin_no` varchar(5) NOT NULL,
  `prescription` varchar(500) NOT NULL,
  `release_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_info`
--

INSERT INTO `treatment_info` (`p_id`, `d_id`, `Diseases_type`, `Admited_Date`, `cabin_no`, `prescription`, `release_date`) VALUES
('p1', 'd-1', 'Dengue fever', '15-09-2016', '505', 'Some important thing to do.', '20-09-2016'),
('p1', 'd12', 'diabetes', '02-05-2016', '203', 'dummy prescription', '09-05-2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Bill_No`),
  ADD KEY `Pid` (`Pid`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `Did` (`Did`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`Room_no`),
  ADD KEY `Nid` (`Nid`);

--
-- Indexes for table `treatment_info`
--
ALTER TABLE `treatment_info`
  ADD PRIMARY KEY (`p_id`,`d_id`,`Diseases_type`,`Admited_Date`,`release_date`),
  ADD KEY `treatment_info_ibfk_2` (`d_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `patient` (`P_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`Did`) REFERENCES `doctor` (`D_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment_info`
--
ALTER TABLE `treatment_info`
  ADD CONSTRAINT `treatment_info_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`P_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_info_ibfk_2` FOREIGN KEY (`d_id`) REFERENCES `doctor` (`D_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
