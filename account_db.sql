-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2018 at 08:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `account_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `year` int(12) NOT NULL,
  `purchase` int(12) NOT NULL,
  `sale` int(12) NOT NULL,
  `profit` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `year`, `purchase`, `sale`, `profit`) VALUES
(1, 2008, 1000, 1050, 50),
(2, 2010, 1500, 1550, 50),
(3, 2012, 2000, 3000, 1000),
(4, 2014, 2000, 2500, 500);

-- --------------------------------------------------------

--
-- Table structure for table `php_framework`
--

CREATE TABLE `php_framework` (
  `id` int(11) NOT NULL,
  `framework` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `php_framework`
--

INSERT INTO `php_framework` (`id`, `framework`) VALUES
(1, 'Symfony'),
(2, 'Codeigniter'),
(3, 'Yii'),
(4, 'Codeigniter'),
(5, 'CakePHP'),
(6, 'Yii'),
(7, 'Codeigniter'),
(8, 'CakePHP'),
(9, 'Yii'),
(10, 'Codeigniter'),
(11, 'Laravel'),
(12, 'Laravel'),
(13, 'Laravel'),
(14, 'Laravel'),
(15, 'Codeigniter'),
(16, 'Laravel'),
(17, 'Laravel'),
(18, 'Codeigniter'),
(19, 'Codeigniter'),
(20, 'Codeigniter'),
(21, 'Laravel'),
(22, 'Laravel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php_framework`
--
ALTER TABLE `php_framework`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `php_framework`
--
ALTER TABLE `php_framework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
