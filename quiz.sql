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
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `maths6english`
--

CREATE TABLE `maths6english` (
  `qid` int(11) NOT NULL,
  `chapter_no` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correctoption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maths6english`
--

INSERT INTO `maths6english` (`qid`, `chapter_no`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) VALUES
(9, 1, 'A for?', 'a', 'A', 'aa', 'AA', 'A'),
(10, 1, 'B for?', 'b', 'B', 'bb', 'BB', 'B'),
(11, 2, 'C for?', 'c', 'C', 'cc', 'CC', 'C'),
(12, 2, 'D for?', 'd', 'D', 'dd', 'DD', 'D'),
(14, 1, 'A for?', 'a', 'A', 'aa', 'AA', 'A'),
(15, 1, 'B for?', 'b', 'B', 'bb', 'BB', 'B'),
(16, 2, 'C for?', 'c', 'C', 'cc', 'CC', 'C'),
(17, 2, 'D for?', 'd', 'D', 'dd', 'DD', 'D'),
(18, 2, 'B for ?', 'e', 'B', 'ee', 'EE', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `maths6englishsubjective`
--

CREATE TABLE `maths6englishsubjective` (
  `qid` int(11) NOT NULL,
  `chapter_no` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `maths6englishsubjective`
--

INSERT INTO `maths6englishsubjective` (`qid`, `chapter_no`, `question`, `answer`) VALUES
(1, 1, 'A for?', 'apple'),
(2, 1, 'B for?', 'bat'),
(3, 2, 'C for?', 'cat'),
(5, 1, 'A for?', 'apple'),
(6, 1, 'B for?', 'bat'),
(7, 2, 'C for?', 'cat'),
(8, 2, 'D for?', 'dog'),
(51, 1, 'abc', 'abc'),
(52, 1, 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `science6english`
--

CREATE TABLE `science6english` (
  `qid` int(11) NOT NULL,
  `chapter_no` int(11) NOT NULL,
  `question` text NOT NULL,
  `option1` text NOT NULL,
  `option2` text NOT NULL,
  `option3` text NOT NULL,
  `option4` text NOT NULL,
  `correctoption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `science6english`
--

INSERT INTO `science6english` (`qid`, `chapter_no`, `question`, `option1`, `option2`, `option3`, `option4`, `correctoption`) VALUES
(1, 1, 'A for?', 'a', 'A', 'aa', 'AA', 'A'),
(2, 1, 'B for?', 'b', 'B', 'bb', 'BB', 'B'),
(3, 2, 'C for?', 'c', 'C', 'cc', 'CC', 'C'),
(15, 1, 'uploads/10.png', 'uploads/11.png', 'uploads/12.png', 'uploads/13.png', 'uploads/14.png', 'uploads/12.png');

-- --------------------------------------------------------

--
-- Table structure for table `science6englishsubjective`
--

CREATE TABLE `science6englishsubjective` (
  `qid` int(11) NOT NULL,
  `chapter_no` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `science6englishsubjective`
--

INSERT INTO `science6englishsubjective` (`qid`, `chapter_no`, `question`, `answer`) VALUES
(1, 1, 'A for?', 'apple'),
(2, 1, 'B for?', 'bat'),
(4, 2, 'D for?', 'dog');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `maths6english`
--
ALTER TABLE `maths6english`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `maths6englishsubjective`
--
ALTER TABLE `maths6englishsubjective`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `science6english`
--
ALTER TABLE `science6english`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `science6englishsubjective`
--
ALTER TABLE `science6englishsubjective`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `maths6english`
--
ALTER TABLE `maths6english`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `maths6englishsubjective`
--
ALTER TABLE `maths6englishsubjective`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `science6english`
--
ALTER TABLE `science6english`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `science6englishsubjective`
--
ALTER TABLE `science6englishsubjective`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
