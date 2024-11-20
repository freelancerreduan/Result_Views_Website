-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 05:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_result`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `roll_number` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester1_result` varchar(5) DEFAULT NULL,
  `semester2_result` varchar(5) DEFAULT NULL,
  `semester3_result` varchar(5) DEFAULT NULL,
  `semester4_result` varchar(5) DEFAULT NULL,
  `semester5_result` varchar(5) DEFAULT NULL,
  `semester6_result` varchar(5) DEFAULT NULL,
  `semester7_result` varchar(5) DEFAULT NULL,
  `semester8_result` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `roll_number`, `name`, `session`, `semester1_result`, `semester2_result`, `semester3_result`, `semester4_result`, `semester5_result`, `semester6_result`, `semester7_result`, `semester8_result`) VALUES
(1, '649928', 'Reduan', '2021-22', 'A', 'A', 'A+', 'A+', 'B', 'B+', 'Null', 'Null'),
(2, '649901', 'Selim', '2021-22', 'A', 'B+', 'A', 'A+', 'F', 'B', NULL, NULL),
(3, '649902', 'Tohin', '2021-22', 'A', 'B+', 'A', 'A+', 'F', 'C', NULL, NULL),
(4, '649925', 'Piyash', '2021-22', 'A', 'B+', 'A', 'A+', 'F', '-B', NULL, NULL),
(5, '649921', 'Rony', '2021-22', 'A', 'B+', 'A', 'A+', 'F', 'B', NULL, NULL),
(6, '649905', 'Rifat', '2021-22', 'A', 'B+', 'A', 'A+', 'F', 'A+', NULL, NULL),
(7, '649911', 'Sadik', '2021-22', 'A', 'A', 'B', 'B+', 'F', 'Null', 'Null', 'Null'),
(8, '649998', 'Al-amin', '2021-22', 'A', 'A+', 'A+', 'B+', 'C', 'A', 'A', 'A'),
(10, '649912', 'Megla', '2021-22', 'A', 'B', 'A+', 'C', 'F', 'Null', 'Null', 'Null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
