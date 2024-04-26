  -- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2023 at 02:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vanvan_aquatics`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int NOT NULL,
  `name_of_buyer` varchar(225) DEFAULT NULL,
  `address` varchar(225) DEFAULT NULL,
  `contact_number` varchar(225) DEFAULT NULL,
  `mode_of_transaction` varchar(225) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `type_of_fish` varchar(225) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `total_price` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `name_of_buyer`, `address`, `contact_number`, `mode_of_transaction`, `quantity`, `type_of_fish`, `price`, `total_price`) VALUES
(9, 'vanvan', 'sogod1', '0912381273', 'JNT', 12, 'fighting_fish', 2, 23),
(10, 'manny', 'sogod southern leyte', '123123123', 'LBC', 16, 'guppies', 3, 48),
(11, 'manny1', 'sogod southern leyte', '123123', 'LBC', 123, 'fighting_fish', 25, 300);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
