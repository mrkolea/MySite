-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2021 at 12:33 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indrivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(222) NOT NULL,
  `last_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `hash` varchar(222) NOT NULL,
  `email_validation` int(11) NOT NULL DEFAULT 0,
  `short_code_reset` int(11) NOT NULL DEFAULT 0,
  `data` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `first_name`, `last_name`, `email`, `password`, `hash`, `email_validation`, `short_code_reset`, `data`) VALUES
(35, 6839739, 'ALEXANDRU', 'BARAC', 'k6c8e4@gmail.com', 'qqqwwweee', '3a0772443a0739141292a5429b952fe6', 1, 0, '2021-08-18 14:53:52'),
(42, 53928894, 'mrkolea', 'mrkolea', 'mrkolea@mail.ru', '$2y$10$xm.woCGJZGmngaKySo4qlOiPGElAnZYpLEmWOTkNhNckxwBrAfU.O', '41ae36ecb9b3eee609d05b90c14222fb', 1, 9866, '2021-08-19 01:12:13'),
(43, 16623, 'Nicolae', 'Murza', 'murzanicolae@gmail.com', '$2y$10$M7ojkwWNWzJPYCfnzia1/uu0MwRauogJCKv3580hKscLRp8GOlPf6', '950a4152c2b4aa3ad78bdd6b366cc179', 1, 0, '2021-08-19 04:16:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
