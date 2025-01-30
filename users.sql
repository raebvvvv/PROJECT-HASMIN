-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2025 at 02:29 AM
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
-- Database: `hasmin_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `student_number`, `username`, `email`, `password`, `created_at`) VALUES
(6, '2022-08680-MN-0', 'Raebv Lielmo Inocentes', 'raebv@gmail.com', '$2y$10$hOzvFk6aFPv0ZwhiRrBDu.9ASCda4SBdFGMMbP/EVnBryzvcyT6Ue', '2025-01-25 22:01:26'),
(12, '2022-08780-MN-0', 'rr', 'inocentesraebv@gmail.com', '$2y$10$bRGBV/y9NA0BGIDrGbcSRe89vm2SK4oLoNpNyMuu4HFKbXgn3HNra', '2025-01-25 22:37:25'),
(14, 'a', 'a', 'inocentesraebv@gmail.com', '$2y$10$NWMZeMMwQW2btnbC4VXUZu9TjCa9i9x1ihpIO4oySeAJ0K4EK2Pme', '2025-01-25 22:39:42'),
(15, '2022-08580-MN-0', 'raebv', 'inocentesraebv@gmail.com', '$2y$10$TfE1Q0oJ/MWreFiU6pIC.OJJICslTfrxwerMUOVIegtmqRHx7g/GG', '2025-01-25 23:10:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `users`
ADD COLUMN `role` ENUM('admin', 'user') DEFAULT 'user';
