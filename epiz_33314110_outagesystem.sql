-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.epizy.com
-- Generation Time: Feb 25, 2023 at 12:43 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33314110_outagesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(0, 'tmolaoa966@gmail.com', 'Test1234.');

-- --------------------------------------------------------

--
-- Table structure for table `outages`
--

CREATE TABLE `outages` (
  `id` int(9) NOT NULL,
  `city` varchar(50) NOT NULL,
  `outages` varchar(255) NOT NULL,
  `progress` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outages`
--

INSERT INTO `outages` (`id`, `city`, `outages`, `progress`) VALUES
(1, 'Johannesburg', 'Outage', 80),
(2, 'Midrand', 'Outage', 70),
(3, 'Cape Town', 'Fibre break', 20),
(4, 'Port Elizabeth', 'Battery replacement', 40),
(5, 'Polokwane', 'Fibre cut', 40);

-- --------------------------------------------------------

--
-- Table structure for table `reportz`
--

CREATE TABLE `reportz` (
  `numPeople` int(50) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportz`
--

INSERT INTO `reportz` (`numPeople`, `city`) VALUES
(9, 'Johannesburg'),
(9, 'Pretoria');

-- --------------------------------------------------------

--
-- Table structure for table `tech`
--

CREATE TABLE `tech` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tech`
--

INSERT INTO `tech` (`id`, `username`, `password`) VALUES
(477, 'jfaja@gmail.com', 'LLLl'),
(667675, 'support@kpg.co.za', 'HHH'),
(989489, 'tmmmm@gmail.com', 'TTTTT'),
(799898, 'fff@gmail.com', 'JJJJ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `city` varchar(50) NOT NULL,
  `counts` int(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`city`, `counts`) VALUES
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1),
('Johannesburg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outages`
--
ALTER TABLE `outages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tech`
--
ALTER TABLE `tech`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `outages`
--
ALTER TABLE `outages`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
