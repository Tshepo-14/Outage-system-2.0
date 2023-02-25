-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

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
('Johannesburg', 1);


--
ALTER TABLE `outages`
  ADD PRIMARY KEY (`id`);

--

--
ALTER TABLE `tech`
  ADD PRIMARY KEY (`id`);


--
ALTER TABLE `outages`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;
