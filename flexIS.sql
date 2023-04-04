-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2023 at 07:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flexIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `dailyschedule`
--

CREATE TABLE `dailyschedule` (
  `employeeID` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `workLocation` varchar(25) NOT NULL,
  `workHours` int(20) NOT NULL,
  `workReport` varchar(50) DEFAULT NULL,
  `supervisorComments` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dailyschedule`
--

INSERT INTO `dailyschedule` (`employeeID`, `date`, `workLocation`, `workHours`, `workReport`, `supervisorComments`) VALUES
('E123', '2023-03-21', 'Subang', 4, 'Done with task', NULL),
('E124', '2023-03-24', 'Penang', 5, 'Finish investigate', 'very very good'),
('E123', '2023-03-29', 'Sepang', 10, 'Go meeting', NULL),
('E001', '2023-03-21', 'KL', 12, 'Site survey', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `deptID` varchar(10) NOT NULL,
  `deptName` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`deptID`, `deptName`) VALUES
('D0001', 'Information Technology'),
('D0002', 'Marketing'),
('D0003', 'Human Resources');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `FWAstatus` varchar(14) NOT NULL,
  `SupervisorID` varchar(10) DEFAULT NULL,
  `deptID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `password`, `name`, `position`, `email`, `FWAstatus`, `SupervisorID`, `deptID`) VALUES
('E001', 'abc123', 'Chew Kai Liang', 'IT developer', 'iamcubex@gmail.com', 'Work From Home', 'S001', 'D0001'),
('E002', 'abc123', 'Fung Lok Then', 'Data Analyst', 'fung@gmail.com', 'NEW', 'S001', 'D0001'),
('E005', 'abc123', 'Abu', 'Admin Clerk', 'abu@gmail.com', 'NEW', 'S002', 'D0002'),
('E123', 'abc123', 'Yeoh Por Sie', 'Intern', 'yeoh@gmail.com', 'NEW', 'S002', 'D0002'),
('E124', 'abc123', 'Wong Jian Wen', 'Software developer', 'wong@gmail.com', 'NEW', 'S001', 'D0001'),
('H001', 'abc123', 'Leon', 'HR Admin', 'leon@gmail.com', 'HR', NULL, 'D0003'),
('S001', 'abc123', 'Wong Ze Liang', 'IT Supervisor', 'wongZL@gmail.com', 'NEW', NULL, 'D0001'),
('S002', 'abc123', 'Dr. Abdul Qayoom', 'Marketing Supervisor', 'qayoom@gmail.com', 'NEW', NULL, 'D0002');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestID` varchar(10) NOT NULL,
  `employeeID` varchar(10) NOT NULL,
  `requestDate` date NOT NULL,
  `workType` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `FWAstatus` varchar(10) NOT NULL,
  `comment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestID`, `employeeID`, `requestDate`, `workType`, `description`, `reason`, `FWAstatus`, `comment`) VALUES
('S001', 'E005', '2023-04-01', 'Hybrid', 'ss', 'ss', 'Pending', 'qq'),
('S063', 'E123', '2023-04-04', 'Flexible Work Hour', 'Very tired', 'Lazy and sick already', 'Accept', 'Approved lazy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD KEY `fk_employeeID` (`employeeID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`deptID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dailyschedule`
--
ALTER TABLE `dailyschedule`
  ADD CONSTRAINT `fk_employeeID` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`deptID`) REFERENCES `department` (`deptID`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`employeeID`) REFERENCES `employee` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
