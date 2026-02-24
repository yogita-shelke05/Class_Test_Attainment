-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2025 at 04:42 AM
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
-- Database: `class_test_co`
--

-- --------------------------------------------------------

--
-- Table structure for table `attainment`
--

CREATE TABLE `attainment` (
  `id` int(11) NOT NULL,
  `enrollment` varchar(50) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `selected_cos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attainment`
--

INSERT INTO `attainment` (`id`, `enrollment`, `test_name`, `selected_cos`) VALUES
(1, '2212410256', 'Unknown Test', 'CO1, CO2'),
(2, '2212410227', 'Unknown Test', 'CO2');

-- --------------------------------------------------------

--
-- Table structure for table `class_test`
--

CREATE TABLE `class_test` (
  `id` int(11) NOT NULL,
  `enrollment` varchar(20) NOT NULL,
  `test_type` varchar(20) NOT NULL,
  `co_count` int(11) NOT NULL,
  `total_marks` int(11) NOT NULL,
  `marks_obtained` int(11) NOT NULL,
  `co_details` text NOT NULL,
  `total_percentage` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class_test`
--

INSERT INTO `class_test` (`id`, `enrollment`, `test_type`, `co_count`, `total_marks`, `marks_obtained`, `co_details`, `total_percentage`, `created_at`) VALUES
(6, '2212410272', 'PA Test 1', 2, 20, 19, '[{\"co\":\"CO1\",\"outof\":8,\"got\":8,\"percentage\":100,\"attained\":\"Yes\"},{\"co\":\"CO2\",\"outof\":12,\"got\":11,\"percentage\":91.67,\"attained\":\"Yes\"}]', 95, '2025-04-15 05:58:48'),
(7, '2212410267', 'PA Test 1', 2, 20, 18, '[{\"co\":\"CO1\",\"outof\":8,\"got\":7,\"percentage\":87.5,\"attained\":\"Yes\"},{\"co\":\"CO2\",\"outof\":12,\"got\":11,\"percentage\":91.67,\"attained\":\"Yes\"}]', 90, '2025-04-15 06:05:17'),
(10, '2212410248', 'PA Test 2', 2, 20, 20, '[{\"co\":\"CO1\",\"outof\":10,\"got\":10,\"percentage\":100,\"attained\":\"Yes\"},{\"co\":\"CO2\",\"outof\":10,\"got\":10,\"percentage\":100,\"attained\":\"Yes\"}]', 100, '2025-04-15 17:18:25'),
(11, '2212410248', 'PA Test 2', 3, 20, 19, '[{\"co\":\"CO1\",\"outof\":6,\"got\":6,\"percentage\":100,\"attained\":\"Yes\"},{\"co\":\"CO2\",\"outof\":6,\"got\":5,\"percentage\":83.33,\"attained\":\"Yes\"},{\"co\":\"CO3\",\"outof\":8,\"got\":8,\"percentage\":100,\"attained\":\"Yes\"}]', 95, '2025-04-15 17:19:12'),
(12, '2212410248', 'PA Test 1', 2, 20, 3, '[{\"co\":\"CO1\",\"outof\":10,\"got\":2,\"percentage\":20,\"attained\":\"No\"},{\"co\":\"CO2\",\"outof\":10,\"got\":1,\"percentage\":10,\"attained\":\"No\"}]', 15, '2025-04-15 17:21:00'),
(13, '2212410248', 'PA Test 2', 3, 20, 12, '[{\"co\":\"CO1\",\"outof\":5,\"got\":2,\"percentage\":40,\"attained\":\"No\"},{\"co\":\"CO2\",\"outof\":7,\"got\":5,\"percentage\":71.43,\"attained\":\"Yes\"},{\"co\":\"CO3\",\"outof\":8,\"got\":5,\"percentage\":62.5,\"attained\":\"Yes\"}]', 60, '2025-04-15 17:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `class_test_co`
--

CREATE TABLE `class_test_co` (
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `enrollment` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `roll_no`, `email`, `enrollment`, `password`) VALUES
(1, 'John Doe', '23CS101', 'johndoe@example.com', '123456', 'password123'),
(2, 'Yogita Kachruba Shelke', '46', 'shelkeyogita12@gmail.com', '2212410265', 'yogita@123'),
(3, 'Sakshi Gawai', '19', 'sakshi1@gmail.com', '2212410227', 'sakshi@123'),
(5, 'Srushti ', '49', 'shruu12@gmail.com', '2212410127', '$2y$10$Fck8Ae3mOUGQuT7JxCmx6OrbsZyxWnwQmXxAyolLOwYtAF0cwToe2'),
(7, 'varsha', '69', 'abc@gmail.com', '2212410302', '$2y$10$1wurxRinMpnuAZANOQEMo.Vphl.uWQzdlKO2BbrF/15Ag1UDZfDfG'),
(8, 'siddhika', '71', 'siddhika@gmail.com', '2212410201', '$2y$10$T2rVst6mv8JQN.vM5IKXw.bU7jrU5M4yvFCEHGqcFwYe7KhuLTOnm'),
(10, 'nisha', '51', 'nisha@gmail.com', '2212410272', '$2y$10$O6wLKKEgV/qO2haBxSPeWOLn3LGkfK25YsH4l90rclPP0.HS1ak5i'),
(11, 'vedika', '48', 'vedika@gmail.com', '2212410267', '$2y$10$F5b5R6mfrI4MPtDd.5Sp8upeg0VRXHF4aXAY1P0FQV4JCDBgWzn1S'),
(12, 'Vinod ', '33', 'mangatevinod62@gmail.com', '2212410248', '$2y$10$1641mKCOQycExC.1MPhDieXkmwmgCnQZhIHGXRuZ4CtTXGqIBS9Su');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attainment`
--
ALTER TABLE `attainment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_test`
--
ALTER TABLE `class_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `enrollment` (`enrollment`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attainment`
--
ALTER TABLE `attainment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_test`
--
ALTER TABLE `class_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
