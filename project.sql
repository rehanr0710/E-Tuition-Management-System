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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `standard` int(11) NOT NULL,
  `medium` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`standard`, `medium`) VALUES
(6, 'english'),
(7, 'english'),
(7, 'hindi');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `recep_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`recep_id`, `name`, `mobile_no`, `address`, `salary`, `email`, `password`, `joined_on`) VALUES
(2, 'Vinit Katariya', 7264941113, 'Ralegaon', 20000, 'vinit@gmail.com', 'Vinit@123', '2021-08-05 06:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `registered_students`
--

CREATE TABLE `registered_students` (
  `enrollement_no` bigint(20) NOT NULL,
  `name_of_stu` varchar(50) NOT NULL,
  `parent_contact_no` bigint(10) NOT NULL,
  `class` int(11) NOT NULL,
  `medium` varchar(20) NOT NULL,
  `total_fees` int(11) NOT NULL,
  `paid_fees` int(11) NOT NULL,
  `rem_fees` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_students`
--

INSERT INTO `registered_students` (`enrollement_no`, `name_of_stu`, `parent_contact_no`, `class`, `medium`, `total_fees`, `paid_fees`, `rem_fees`, `timestamp`) VALUES
(74920045, 'onkar hanchate', 9822801466, 6, 'english', 20000, 10000, 10000, '2021-08-11 17:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `subjective_testdata`
--

CREATE TABLE `subjective_testdata` (
  `testid` int(11) NOT NULL,
  `test_name` varchar(20) NOT NULL,
  `standard` int(11) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `no_of_ques` int(11) NOT NULL,
  `question_id_array` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjective_testdata`
--

INSERT INTO `subjective_testdata` (`testid`, `test_name`, `standard`, `subject_id`, `created_on`, `created_by`, `no_of_ques`, `question_id_array`) VALUES
(2, 'sample 2', 6, 'maths6english', '2021-08-06 06:39:14', 'arihant@gmail.com', 3, '1,3,4'),
(3, 'python 3', 6, 'maths6english', '2021-08-07 04:43:22', 'arihant@gmail.com', 4, '2,6,7,8');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` varchar(40) NOT NULL,
  `subject_name` varchar(20) NOT NULL,
  `standard` int(10) NOT NULL,
  `medium` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `standard`, `medium`) VALUES
('maths6english', 'maths', 6, 'english'),
('science6english', 'science', 6, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `joined_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `mobile_no`, `address`, `salary`, `email`, `password`, `joined_on`) VALUES
(1, 'Arihant', 9370681212, 'Beed, Maharashtra', 100000, 'arihant@gmail.com', 'Arihant@18', '2021-02-27 18:40:07'),
(2, 'Rehan', 9511927355, '583, ', 250000, 'rehan.br.10@gmail.com', 'Rehan@123', '2021-08-05 10:13:33'),
(4, 'Rahul', 7330242905, 'NTPC', 20000, 'rpatil@gmail.com', 'Rahul@123', '2021-08-05 07:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_teaches`
--

CREATE TABLE `teacher_teaches` (
  `teacher_id` int(10) NOT NULL,
  `subject_id` varchar(40) NOT NULL,
  `standard` int(10) NOT NULL,
  `medium` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_teaches`
--

INSERT INTO `teacher_teaches` (`teacher_id`, `subject_id`, `standard`, `medium`) VALUES
(1, 'maths6english', 6, 'english'),
(1, 'science6english', 6, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `testdata`
--

CREATE TABLE `testdata` (
  `testid` int(11) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `standard` int(11) NOT NULL,
  `medium` varchar(20) NOT NULL,
  `subject_id` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(50) NOT NULL,
  `no_of_ques` int(11) NOT NULL,
  `question_id_array` text NOT NULL,
  `correct_option_array` text DEFAULT NULL,
  `corres_mark_per_question` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `mark_per_question` int(11) DEFAULT NULL,
  `negative_mark` int(11) NOT NULL DEFAULT 0,
  `instant_result` varchar(10) NOT NULL,
  `type` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testdata`
--

INSERT INTO `testdata` (`testid`, `test_name`, `standard`, `medium`, `subject_id`, `created_on`, `created_by`, `no_of_ques`, `question_id_array`, `correct_option_array`, `corres_mark_per_question`, `duration`, `start_date`, `start_time`, `mark_per_question`, `negative_mark`, `instant_result`, `type`) VALUES
(20, 'python 6', 6, 'english', 'maths6english', '2021-08-11 10:26:11', 'arihant@gmail.com', 3, '9,10,11', 'A,B,C', '2,2,3', 11, '0111-11-11', '11:01:00', NULL, 1, 'true', 1),
(21, 'python 7', 6, 'english', 'maths6english', '2021-08-12 04:48:14', 'arihant@gmail.com', 4, '9,18,12,16', 'A,B,D,C', NULL, 1, '2021-08-12', '11:11:00', 4, 1, 'true', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`standard`,`medium`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`recep_id`,`email`);

--
-- Indexes for table `registered_students`
--
ALTER TABLE `registered_students`
  ADD PRIMARY KEY (`enrollement_no`);

--
-- Indexes for table `subjective_testdata`
--
ALTER TABLE `subjective_testdata`
  ADD PRIMARY KEY (`testid`),
  ADD KEY `standard` (`standard`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `standard` (`standard`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`,`email`);

--
-- Indexes for table `teacher_teaches`
--
ALTER TABLE `teacher_teaches`
  ADD PRIMARY KEY (`teacher_id`,`subject_id`,`standard`,`medium`),
  ADD KEY `FK_subjectid` (`subject_id`),
  ADD KEY `FK_standard` (`standard`);

--
-- Indexes for table `testdata`
--
ALTER TABLE `testdata`
  ADD PRIMARY KEY (`testid`),
  ADD KEY `standard` (`standard`),
  ADD KEY `subject_id` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `recep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registered_students`
--
ALTER TABLE `registered_students`
  MODIFY `enrollement_no` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74920046;

--
-- AUTO_INCREMENT for table `subjective_testdata`
--
ALTER TABLE `subjective_testdata`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testdata`
--
ALTER TABLE `testdata`
  MODIFY `testid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subjective_testdata`
--
ALTER TABLE `subjective_testdata`
  ADD CONSTRAINT `subjective_testdata_ibfk_1` FOREIGN KEY (`standard`) REFERENCES `class` (`standard`),
  ADD CONSTRAINT `subjective_testdata_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`standard`) REFERENCES `class` (`standard`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_teaches`
--
ALTER TABLE `teacher_teaches`
  ADD CONSTRAINT `FK_standard` FOREIGN KEY (`standard`) REFERENCES `class` (`standard`),
  ADD CONSTRAINT `FK_subjectid` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`),
  ADD CONSTRAINT `FK_teacherid` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`teacher_id`);

--
-- Constraints for table `testdata`
--
ALTER TABLE `testdata`
  ADD CONSTRAINT `standard` FOREIGN KEY (`standard`) REFERENCES `class` (`standard`),
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
