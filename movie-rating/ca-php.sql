-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2020 at 12:45 PM
-- Server version: 5.7.21-1ubuntu1
-- PHP Version: 7.2.3-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ca-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `movieDetail`
--

CREATE TABLE `movieDetail` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `moviename` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `rating` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movieDetail`
--

INSERT INTO `movieDetail` (`id`, `username`, `moviename`, `image`, `description`, `rating`) VALUES
(98, 'Prince', 'Soryanvanshi', NULL, 'Sooryavanshi is an upcoming Indian Hindi-language action film directed by Rohit Shetty and written by Yunus Sajawal. Produced by Hiroo Yash Johar, Aruna Bhatia, Apoorva Mehta and Rohit Shetty.', '3'),
(99, 'Prince', 'Namaste London', NULL, 'Namaste London.', '5'),
(100, 'Prince ', 'Soryanvanshi', NULL, 'Sooryavanshi is an upcoming Indian Hindi-language action film directed by Rohit Shetty and written by Yunus Sajawal. Produced by Hiroo Yash Johar, Aruna Bhatia, Apoorva Mehta and Rohit Shetty.', '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movieDetail`
--
ALTER TABLE `movieDetail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movieDetail`
--
ALTER TABLE `movieDetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
