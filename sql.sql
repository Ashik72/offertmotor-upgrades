-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2016 at 09:53 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offertmotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `page_2_choice` varchar(40) NOT NULL,
  `today_pay` int(30) NOT NULL,
  `months_remaining` int(20) NOT NULL,
  `valuename_importance` varchar(60) NOT NULL,
  `tailed_importance` int(30) NOT NULL,
  `budget` int(30) NOT NULL,
  `final_close_result` int(30) NOT NULL,
  `final_close_result_month` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `email`, `page_2_choice`, `today_pay`, `months_remaining`, `valuename_importance`, `tailed_importance`, `budget`, `final_close_result`, `final_close_result_month`) VALUES
(1, 'My Company 1', 'company1@mail.com', '', 0, 0, '', 0, 0, 0, 0),
(2, 'COmpany My 2', 'comapny2@mail.com', '', 0, 0, '', 0, 0, 0, 0),
(3, 'my company', 'com@dskfd.lop', '40, 50 , 60', 1122, 22, '7886, 455, 99', 511, 5562, 4151, 0),
(4, 'ddsds', 'abcd@test.net', '3 , 4', 500, 4, '2000 , 4000 , 2000 , 2000', 10000, 45678, 45678, 0),
(5, 'ddsds', 'abcd@test.net', '3 , 4', 500, 4, '2000 , 4000 , 2000 , 2000', 10000, 45678, 45678, 0),
(6, 'ddsds', 'abcd@test.net', '2 , 3', 500, 1, '2000 , 2000 , 2000 , 2000', 8000, 45678, 45678, 0),
(7, 'ddsds', 'abcd@test.net', '2 , 3', 500, 1, '2000 , 2000 , 2000 , 2000', 8000, 45678, 45678, 0),
(8, 'ddsds', 'abcd@test.net', '2 , 3', 500, 1, '2000 , 2000 , 2000 , 2000', 8000, 45678, 45678, 0),
(9, 'ab45', 'ab45@45.net', '2 , 4', 500, 3, '2000 , 4000 , 2000 , 3000', 11000, 589, 589, 0),
(10, 'ab44', 'ab45@45d.net', '1 , 2 , 4', 500, 2, '3000 , 4000 , 2000 , 3000', 12000, 569, 569, 0),
(11, 'abcRT', 'abcd@test.net', '2 , 3', 500, 3, '2000 , 2000 , 2000 , 2000', 8000, 45678, 3807, 0),
(12, 'abcRT', 'abcd@test.net', '2 , 3', 500, 3, '2000 , 2000 , 2000 , 2000', 8000, 45678, 3807, 0),
(13, 'my company2', 'com@dskfd.lop2', '40, 50 , 602', 11222, 89, '7886, 455, 992', 5112, 55622, 4151, 23),
(14, 'abcRT', 'abcd@test.net', '2 , 3', 500, 3, '2000 , 2000 , 2000 , 2000', 8000, 45678, 3807, 12),
(15, 'abcRT', 'abcd@test.net', '2 , 3', 500, 3, '2000 , 2000 , 2000 , 2000', 8000, 45678, 3807, 12),
(16, 'abcRT', 'abcd@test.net', '2 , 3', 500, 3, '2000 , 2000 , 2000 , 2000', 8000, 45678, 3807, 12),
(17, 'ddsds', 'as.bdrah@gmail.com', '3 , 4', 545545, 1, '2000 , 2000 , 2000 , 2000', 8000, 589, 49045, 12),
(18, 'ddsds', 'as.bdrah@gmail.com', '3 , 4', 545545, 1, '2000 , 2000 , 2000 , 2000', 8000, 589, 49045, 12),
(19, 'ddsds', 'as.bdrah@gmail.com', '3 , 4', 545545, 1, '2000 , 2000 , 2000 , 2000', 8000, 589, 49045, 12),
(20, 'ddsds', 'as.bdrah@gmail.com', '3 , 4', 545545, 1, '2000 , 2000 , 2000 , 2000', 8000, 589, 49045, 12),
(21, 'ddsds', 'as.bdrah@gmail.com', '3 , 4', 545545, 1, '2000 , 2000 , 2000 , 2000', 8000, 589, 49045, 12),
(22, 'ddsds', 'abcd@test.net', '3 , 4', 500, 1, '3000 , 4000 , 6000 , 4000', 17000, 45678, 3807, 12),
(23, 'ddsds', 'ashik@noksa.net', '3 , 1115', 500, 1, '3000 , 4000 , 3000 , 3000', 13000, 45678, 3807, 12),
(24, 'ddsds', 'ashik@noksa.net', '3 , 1115', 500, 1, '3000 , 4000 , 3000 , 3000', 13000, 45678, 3807, 12),
(25, 'ddsds', 'ashik@noksa.net', '3 , 1115', 500, 1, '3000 , 4000 , 3000 , 3000', 13000, 45678, 3807, 12),
(26, 'ddsds', 'ashik@noksa.net', '3 , 1115', 500, 1, '3000 , 4000 , 3000 , 3000', 13000, 45678, 3807, 12),
(27, 'ddsds', 'as.bdrah@gmail.com', '3 , 542', 500, 1, '4000 , 3000 , 6000 , 2000', 15000, 589, 49, 12),
(28, 'ddsds', 'as.bdrah@gmail.com', '3 , 542', 500, 1, '4000 , 3000 , 6000 , 2000', 15000, 589, 49, 12),
(29, 'ddsds', 'as.bdrah@gmail.com', '3 , 542', 500, 1, '4000 , 3000 , 6000 , 2000', 15000, 589, 49, 12),
(30, 'myname', 'abcd@test.net', '3 , 542', 545545, 1, '3000 , 4000 , 3000 , 3000', 13000, 45678, 49462, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

