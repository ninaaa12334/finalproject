-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2025 at 06:10 PM
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
-- Database: `cv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cvs`
--

CREATE TABLE `cvs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `skills` text NOT NULL,
  `experience` text NOT NULL,
  `education` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cvs`
--

INSERT INTO `cvs` (`id`, `name`, `surname`, `email`, `phone`, `skills`, `experience`, `education`) VALUES
(1, 'nina', 'brghejrg', 'jdbhsjbvjh@jgmail.com', 'fdhbjdf', 'djfhbdjbhh', 'jdfhbjhbhjf', 'fdhbj'),
(2, 'neinkd', 'jnfrjrf', 'jrnfjrnfjrn@gmail.cpm', 'rjnfjrnfjrnf', 'jfnrjfnrjnf', 'fjnrjnfrjnf', 'fnrjfnrjfnrj'),
(3, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', 'fdhbjdf', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(4, 'neinkd', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(5, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(6, 'nina', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'jfnrjfnrjnf', 'jdfhbjhbhjf', 'fnrjfnrjfnrj'),
(7, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(8, 'nina', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fdhbj'),
(9, 'nina', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fdhbj'),
(10, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'jfnrjfnrjnf', 'jdfhbjhbhjf', 'fnrjfnrjfnrj'),
(11, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jdfhbjhbhjf', 'fnrjfnrjfnrj'),
(12, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(16, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'rfeliulrehblhr'),
(17, 'nina', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'rfeliulrehblhr'),
(18, 'nina', 'brghejrg', 'jdbhsjbvjh@jgmail.com', '0000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrjwew'),
(19, 'neinkd', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(20, 'neinkd', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(21, 'neinkd', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(22, 'neinkd', 'brghejrg', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(24, 'neinkd', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(25, 'neinkd', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(26, 'neinkd', 'jnfrjrf', 'ninakurhasani@gmail.com', '000000', 'i am very great', 'jjejeje', 'fnrjfnrjfnrj'),
(27, 'nina', 'kurhasani', 'ninakurhasani@gmail.com', '000000', 'i am very greatrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'jjejejerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'fnrjfnrjfnrjndekljbhl2jfbhhhhrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr'),
(28, 'nina', 'kurhasani', 'ninakurhasani@gmail.com', '000000', 'i am very greatrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'jjejejerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'fnrjfnrjfnrjndekljbhl2jfbhhhhrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `skills` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
