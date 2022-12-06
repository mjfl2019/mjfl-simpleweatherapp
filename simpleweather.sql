-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 10:14 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpleweather`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_val` varchar(40) NOT NULL,
  `city_name` varchar(40) NOT NULL,
  `country_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_val`, `city_name`, `country_code`) VALUES
(1, 'tokyo', 'TOKYO', 'JP'),
(2, 'nagoya', 'NAGOYA', 'JP'),
(3, 'osaka', 'OSAKA', 'JP'),
(4, 'kyoto', 'KYOTO', 'JP'),
(5, 'sapporo', 'SAPPORO', 'JP'),
(6, 'asahikawa', 'ASAHIKAWA', 'JP'),
(7, 'hakodate', 'HAKODATE', 'JP'),
(8, 'aomori', 'AOMORI', 'JP'),
(9, 'akita', 'AKITA', 'JP'),
(10, 'morioka', 'MORIOKA', 'JP'),
(11, 'sendai', 'SENDAI', 'JP'),
(12, 'yamagata', 'YAMAGATA', 'JP'),
(13, 'fukushima', 'FUKUSHIMA', 'JP'),
(14, 'niigata', 'NIIGATA', 'JP'),
(15, 'nagano', 'NAGANO', 'JP'),
(16, 'utsunomiya', 'UTSUNOMIYA', 'JP'),
(17, 'mito', 'MITO', 'JP'),
(18, 'maebashi', 'MAEBASHI', 'JP'),
(19, 'saitama', 'SAITAMA', 'JP'),
(20, 'chiba', 'CHIBA', 'JP'),
(21, 'kawasaki', 'KAWASAKI', 'JP'),
(22, 'shizuoka', 'SHIZUOKA', 'JP'),
(23, 'hamamatsu', 'HAMAMATSU', 'JP'),
(24, 'toyama', 'TOYAMA', 'JP'),
(25, 'kanazawa', 'KANAZAWA', 'JP'),
(26, 'fukui', 'FUKUI', 'JP'),
(27, 'tsu', 'TSU', 'JP'),
(28, 'otsu', 'OTSU', 'JP'),
(29, 'sakai', 'SAKAI', 'JP'),
(30, 'wakayama', 'WAKAYAMA', 'JP'),
(31, 'kobe', 'KOBE', 'JP'),
(32, 'okayama', 'OKAYAMA', 'JP'),
(33, 'takamatsu', 'TAKAMATSU', 'JP'),
(34, 'tokushima', 'TOKUSHIMA', 'JP'),
(35, 'matsuyama', 'MATSUYAMA', 'JP'),
(36, 'kochi', 'KOCHI', 'JP'),
(37, 'tottori', 'TOTTORI', 'JP'),
(38, 'matsue', 'MATSUE', 'JP'),
(39, 'hiroshima', 'HIROSHIMA', 'JP'),
(40, 'yamaguchi', 'YAMAGUCHI', 'JP'),
(41, 'oita', 'OITA', 'JP'),
(42, 'kitakyushu', 'KITAKYUSHU', 'JP'),
(43, 'fukuoka', 'FUKUOKA', 'JP'),
(44, 'saga', 'SAGA', 'JP'),
(45, 'kumamoto', 'KUMAMOTO', 'JP'),
(46, 'miyazaki', 'MIYAZAKI', 'JP'),
(47, 'satsumasendai', 'SATSUMASENDAI', 'JP'),
(48, 'nagasaki', 'NAGASAKI', 'JP'),
(49, 'kagoshima', 'KAGOSHIMA', 'JP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
