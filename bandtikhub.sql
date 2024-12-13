-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 03:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandtikhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `bandname` varchar(255) NOT NULL,
  `LocaEvent` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `bandname`, `LocaEvent`, `mail`, `time`) VALUES
(1, 'HAHA', 'a', 'tomriot700@gmail.com', '2024-11-20'),
(2, 'blackRed', 'VN', 'BR@gmail.com', '2024-11-23'),
(3, 'blackRed', 'VN', 'BR@gmail.com', '2024-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(10, 'Thinh', '$2y$10$g0M2y8RICes/jQkIvjSXHO8r6X3kIs7A1nhXbDgHeWTaTSfiAtfbi'),
(13, 'Hung', '$2y$10$/0/PFNgArWVIh4O9aJ/3V.G/Mk.474WPfrIGNUbqZfoHN7y1rels2'),
(14, 'Tam', '$2y$10$kkOC6ckL1nDpMLmyvzhSlefBa5x7R0Mcvw77RVunsrKQ5bDw5ivga'),
(15, 'A', '$2y$10$q6Dg8ZmlRPulSWWJ8n3JrO1GmFlEaxVKJx09/K4NS3H6GWrb/0Ove'),
(17, 'LinhHeo', '$2y$10$ZPCVSSxG2PNXCQEtnR7Pbel4n/nL7iPtcWxDsAw789SamNh5fDKre');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_usename` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
