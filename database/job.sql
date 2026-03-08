-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 07:13 PM
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
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` text NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `address` text NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `employer_employe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`first_name`, `last_name`, `email`, `mobile_number`, `address`, `date_of_birth`, `gender`, `password`, `employer_employe`) VALUES
('', '', '', 0, '', '0000-00-00', '', '', ''),
('nom', 'an', 'nomanvi123@gmail.com', 9373, 'dhaka', '2024-10-23', 'male', 'hh', 'employer'),
('nom', 'an', 'oyan123@gmail.com', 12345, 'dcd', '2024-10-01', 'male', '123', 'employer'),
('dfd', 'df', 'nomanvi123@gmail.com', 23243, 'dcd', '2024-10-01', 'male', 'dd', 'employer'),
('oyon', 'doga', 'denny12@gmail.com', 1878779, 'nurerchala', '0000-00-00', 'male', 'doga', 'employee'),
('oyon ', 'doga', 'oyan123@gmail.com', 123456789, 'dhaka', '2024-09-30', 'male', '123', 'employer'),
('Naeem', 'doga', 'nomanvi123@gmail.com', 1683674237, 'dhaka', '2024-10-06', 'male', '12345', 'employer'),
('noman', 'akanda', 'nomanvi123@gmail.com', 1878779710, 'dhaka', '2024-10-02', 'male', 'nn', 'employer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`mobile_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
