-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 02:05 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `class6english`
--

CREATE TABLE `class6english` (
  `Enrollment_ID` bigint(20) NOT NULL,
  `Roll_No` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile_No` bigint(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Fathers_Name` varchar(50) DEFAULT NULL,
  `Mothers_Name` varchar(50) DEFAULT NULL,
  `Parents_contact_no` bigint(20) NOT NULL,
  `Email_Address` varchar(256) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class6english`
--

INSERT INTO `class6english` (`Enrollment_ID`, `Roll_No`, `Name`, `Mobile_No`, `Address`, `Gender`, `Fathers_Name`, `Mothers_Name`, `Parents_contact_no`, `Email_Address`, `Password`, `dateofbirth`) VALUES
(74920045, 1, 'Onkar Hanchate', 9822801466, 'Solapur', 'male', 'abc', 'abc', 9822801466, 'onkar@gmail.com', 'Onkar@123', '2021-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `class6englishresult`
--

CREATE TABLE `class6englishresult` (
  `Enrollment_ID` bigint(20) NOT NULL,
  `test20` int(11) DEFAULT NULL,
  `test21` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class6englishresult`
--

INSERT INTO `class6englishresult` (`Enrollment_ID`, `test20`, `test21`) VALUES
(74920045, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class7english`
--

CREATE TABLE `class7english` (
  `Enrollment_ID` bigint(20) NOT NULL,
  `Roll_No` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile_No` bigint(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Fathers_Name` varchar(50) DEFAULT NULL,
  `Mothers_Name` varchar(50) DEFAULT NULL,
  `Parents_contact_no` bigint(20) NOT NULL,
  `Email_Address` varchar(256) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class7englishresult`
--

CREATE TABLE `class7englishresult` (
  `Enrollment_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class7hindi`
--

CREATE TABLE `class7hindi` (
  `Enrollment_ID` bigint(20) NOT NULL,
  `Roll_No` int(11) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile_No` bigint(20) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Fathers_Name` varchar(50) DEFAULT NULL,
  `Mothers_Name` varchar(50) DEFAULT NULL,
  `Parents_contact_no` bigint(20) NOT NULL,
  `Email_Address` varchar(256) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `class7hindiresult`
--

CREATE TABLE `class7hindiresult` (
  `Enrollment_ID` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class6english`
--
ALTER TABLE `class6english`
  ADD PRIMARY KEY (`Enrollment_ID`);

--
-- Indexes for table `class6englishresult`
--
ALTER TABLE `class6englishresult`
  ADD KEY `Enrollment_ID` (`Enrollment_ID`);

--
-- Indexes for table `class7english`
--
ALTER TABLE `class7english`
  ADD PRIMARY KEY (`Enrollment_ID`);

--
-- Indexes for table `class7englishresult`
--
ALTER TABLE `class7englishresult`
  ADD KEY `Enrollment_ID` (`Enrollment_ID`);

--
-- Indexes for table `class7hindi`
--
ALTER TABLE `class7hindi`
  ADD PRIMARY KEY (`Enrollment_ID`);

--
-- Indexes for table `class7hindiresult`
--
ALTER TABLE `class7hindiresult`
  ADD KEY `Enrollment_ID` (`Enrollment_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class6englishresult`
--
ALTER TABLE `class6englishresult`
  ADD CONSTRAINT `class6englishresult_ibfk_1` FOREIGN KEY (`Enrollment_ID`) REFERENCES `class6english` (`Enrollment_ID`) ON DELETE CASCADE;

--
-- Constraints for table `class7englishresult`
--
ALTER TABLE `class7englishresult`
  ADD CONSTRAINT `class7englishresult_ibfk_1` FOREIGN KEY (`Enrollment_ID`) REFERENCES `class7english` (`Enrollment_ID`) ON DELETE CASCADE;

--
-- Constraints for table `class7hindiresult`
--
ALTER TABLE `class7hindiresult`
  ADD CONSTRAINT `class7hindiresult_ibfk_1` FOREIGN KEY (`Enrollment_ID`) REFERENCES `class7hindi` (`Enrollment_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
