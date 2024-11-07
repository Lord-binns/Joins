-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 04:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adbinns`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `profile_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `bio` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`profile_id`, `user_id`, `date_of_birth`, `address`, `phone_number`, `bio`) VALUES
(31, 5, '1995-03-20', '789 Oak St', '555-123-4567', 'I am Bin.'),
(32, 7, '1994-02-15', '123 Maple Ave', '555-987-6543', 'Hello, I\'m Bella'),
(33, 8, '1996-05-05', '456 Pine St', '555-555-5555', 'This is Qwe\'s bio'),
(34, 9, '1997-07-07', '987 Cedar St', '555-444-3333', 'Red\'s profile here');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `created_at`) VALUES
(1, 'binns', 'binns', 'binns', '$2y$10$Ac0PgE5CBjy/kSKXIXQCJOVZecTOsMqY0iFAnSJLJTvzPe06XZ38S', '2024-10-25 03:15:51'),
(4, 'kenneth', 'kenneth', 'kenneth', '$2y$10$Py8gfa9TRb7upJq0/jdtROxHmmyFCgeUM9.jD2ray8Jh39snPiuky', '2024-11-02 11:09:36'),
(5, 'bin', 'bin', 'bin', '$2y$10$gMr/Z4Gsox29KgZEXR5WduA0YiBVFYO/geWtnkI5/xFvwoPhtUv/.', '2024-11-02 15:02:07'),
(7, 'bella', 'bella', 'bella', '$2y$10$fKOqMPwMUt.e5B.ZUJF/E.99nLGEJXVtsBu9w07XbFUWEagMULO.i', '2024-11-04 00:50:36'),
(8, 'qwe', 'qwe', 'qwe', '$2y$10$6AEDaAReOPYj2dhyz.wdRuIAV1T5GMNSS8gPAzBXGlqML.RDYVIpK', '2024-11-04 14:57:52'),
(9, 'red', 'red', 'red', '$2y$10$Mmal9YtgO8rNUab6FL1gn.sN7gYnH22Dix2Aqa3q8y4tAs10HouAi', '2024-11-04 15:29:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `profiles_ibfk_1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
