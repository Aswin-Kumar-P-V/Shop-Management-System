-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2022 at 01:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rdbms_minproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Username` varchar(22) NOT NULL,
  `Password` varchar(18) NOT NULL,
  `DOB` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Username`, `Password`, `DOB`) VALUES
('', '', '0000-00-00'),
('ajaykankun', 'kannapino1', '2002-08-24'),
('athirakv', '12345678', '2002-10-30'),
('dakshina', '12345678', '2002-10-30'),
('shopkeeper123', '$hopkeeper', '2002-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_code` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `purchases` int(11) NOT NULL,
  `sales` int(255) NOT NULL,
  `mrp` float NOT NULL,
  `wholesale_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_code`, `product_name`, `purchases`, `sales`, `mrp`, `wholesale_rate`) VALUES
(1, 'Brush', 100, 20, 15, 13.5),
(2, 'Colgate', 60, 20, 35, 31.5),
(3, 'Munch', 36, 14, 5, 4),
(4, 'Batteries', 29, 11, 12, 9),
(5, 'Kit Kat', 58, 2, 10, 8.5),
(6, 'Dark Fantasy', 10, 9, 30, 27),
(7, 'American Tourister School Bags', 10, 0, 1020, 820),
(8, 'Mineral water 1 ltr', 118, 2, 15, 12),
(9, 'Class Mate Eraser', 25, 0, 5, 3.5),
(10, 'Class Mate Pencil', 77, 23, 5, 4.5),
(11, 'Syska Led 10 W', 1, 4, 75, 63.5),
(12, 'Milk Bread', 7, 1, 25, 21.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Username`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
