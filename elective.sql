-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 11:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elective`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@nitc.ac.in', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `elective_course`
--

CREATE TABLE `elective_course` (
  `code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `credit` varchar(255) NOT NULL,
  `slot` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `elective_course`
--

INSERT INTO `elective_course` (`code`, `title`, `credit`, `slot`, `branch`, `sem`) VALUES
('CS001', 'COURSE 1 FOR MCA 4TH', '8', 'A', 'MCA', 'FOURTH'),
('CS002', 'COURSE 2 FOR MCA 4TH', '9', 'B', 'MCA', 'FOURTH'),
('CS003', 'COURSE 3 FOR MCA 4TH', '8', 'C', 'MCA', 'FOURTH'),
('CS004', 'COURSE 4 FOR MCA 4TH', '9', 'E', 'MCA', 'FOURTH'),
('CS005', 'COURSE 1 FOR MCA 2ND', '8', 'A', 'MCA', 'SECOND'),
('CS006', 'COURSE 2 FOR MCA 2ND', '9', 'B', 'MCA', 'SECOND'),
('CS007', 'COURSE 3 FOR MCA 2ND', '8', 'C', 'MCA', 'SECOND'),
('CS008', 'COURSE 4 FOR MCA 2ND', '9', 'D', 'MCA', 'SECOND'),
('CS009', 'COURSE 1 FOR BTECH 4TH', '8', 'A', 'BTECH', 'FOURTH'),
('CS010', 'COURSE 2 FOR BTECH 4TH', '9', 'B', 'BTECH', 'FOURTH'),
('CS011', 'COURSE 1 FOR BTECH 2ND', '8', 'C', 'BTECH', 'SECOND'),
('CS012', 'COURSE 2 FOR BTECH 2ND', '8', 'C', 'BTECH', 'SECOND');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `sl no` int(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faregister`
--

CREATE TABLE `faregister` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faregister`
--

INSERT INTO `faregister` (`id`, `name`, `mail`, `department`, `contact`, `password`, `branch`, `sem`) VALUES
(1, 'MCA fa1', 'fa1@nitc.ac.in', 'Computer Science', '9876543210', 'fa1', 'MCA', 'SECOND'),
(2, 'MCA fa2', 'fa2@nitc.ac.in', 'Computer Science', '9876543210', 'fa2', 'MCA', 'FOURTH'),
(3, 'BTECH fa3', 'fa3@nitc.ac.in', 'Computer Science', '9876543210', 'fa3', 'BTECH', 'SECOND'),
(4, 'BTECH fa4', 'fa4@nitc.ac.in', 'Computer Science', '9876543210', 'fa4', 'BTECH', 'FOURTH');

-- --------------------------------------------------------

--
-- Table structure for table `sturegister`
--

CREATE TABLE `sturegister` (
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `rollno` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sturegister`
--

INSERT INTO `sturegister` (`name`, `mail`, `rollno`, `branch`, `semester`, `contact`, `password`) VALUES
('Btech Student4', 'student4@nitc.ac.in', 'B190004CS', 'BTECH', 'FOURTH', '9876543210', 'student4'),
('BTECH Student5', 'student5@nitc.ac.in', 'B190005CS', 'BTECH', 'SECOND', '9876543210', 'student5'),
('MCA Student1', 'student1@nitc.ac.in', 'M190001CA', 'MCA', 'SECOND', '9876543210', 'student1'),
('Mca Student2', 'student2@nitc.ac.in', 'M190002CA', 'MCA', 'FOURTH', '9876543210', 'student2'),
('MCA Student3', 'student3@nitc.ac.in', 'M190003CA', 'MCA', 'FOURTH', '9876543210', 'student3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `elective_course`
--
ALTER TABLE `elective_course`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`sl no`);

--
-- Indexes for table `faregister`
--
ALTER TABLE `faregister`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sturegister`
--
ALTER TABLE `sturegister`
  ADD PRIMARY KEY (`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `sl no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `faregister`
--
ALTER TABLE `faregister`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
