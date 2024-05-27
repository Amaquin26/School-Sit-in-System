-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2024 at 02:53 AM
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
-- Database: `sitindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT current_timestamp(),
  `title` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `userId`, `datecreated`, `title`, `message`) VALUES
(1, 2, '2024-05-13 09:41:19', 'Hello Students', 'Welcome to our new sitin system.'),
(6, 2, '2024-05-13 10:39:47', 'Laboratories are now open.', 'Laboratories are now open for sit in. Please be responsible.');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_ID`, `title`, `message`, `datecreated`) VALUES
(1, 1, '526', 'All computers are working great.', '2024-05-13 10:14:07'),
(2, 1, '524', 'Computer 30 is not working. Mouse is broken.', '2024-05-13 11:01:23'),
(3, 1, '526', 'Sample', '2024-05-26 19:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `lab` varchar(255) NOT NULL,
  `date_requested` datetime DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitinrecord`
--

CREATE TABLE `sitinrecord` (
  `id` int(11) NOT NULL,
  `idno` int(11) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `laboratory` varchar(255) DEFAULT NULL,
  `time_started` datetime DEFAULT current_timestamp(),
  `time_ended` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitinrecord`
--

INSERT INTO `sitinrecord` (`id`, `idno`, `purpose`, `laboratory`, `time_started`, `time_ended`) VALUES
(1, 21420351, 'Python', '526', '2024-04-21 11:21:45', '2024-04-21 11:24:43'),
(2, 21420352, 'Python', '526', '2024-04-21 11:21:50', '2024-04-21 11:24:52'),
(3, 21420353, 'C#', '524', '2024-04-21 11:21:59', '2024-04-21 11:24:51'),
(4, 21420354, 'Mobile Development', '526', '2024-04-21 11:22:11', '2024-04-21 11:24:51'),
(5, 21420355, 'Javascript', '535', '2024-04-21 11:22:21', '2024-04-21 11:24:50'),
(6, 21420356, 'Java', '542', '2024-04-21 11:22:36', '2024-04-21 11:24:50'),
(7, 21420357, 'C', '526', '2024-04-21 11:22:52', '2024-04-21 11:24:49'),
(8, 21420358, 'Python', '526', '2024-04-21 11:23:02', '2024-04-21 11:24:49'),
(9, 21420359, 'PHP', '526', '2024-04-21 11:23:13', '2024-04-21 11:24:45'),
(10, 21420360, 'PHP', '524', '2024-04-21 11:23:26', '2024-04-21 11:24:48'),
(11, 21420361, 'C++', '542', '2024-04-21 11:23:37', '2024-04-21 11:24:48'),
(12, 21420362, 'C#', '524', '2024-04-21 11:23:56', '2024-04-21 11:24:44'),
(13, 21420363, 'PHP', '535', '2024-04-21 11:24:15', '2024-04-21 11:24:46'),
(14, 21420364, 'C++', '524', '2024-04-21 11:24:25', '2024-04-21 11:24:46'),
(15, 21420365, 'Java', '524', '2024-04-21 11:24:37', '2024-04-21 11:24:47'),
(16, 21420351, 'Python', '526', '2024-04-22 11:21:45', '2024-04-22 11:24:43'),
(17, 21420363, 'PHP', '535', '2024-04-20 11:24:15', '2024-04-20 11:24:46'),
(18, 21420366, 'Python', '526', '2024-04-22 11:26:40', '2024-04-22 11:26:49'),
(19, 21420351, 'Java', '542', '2024-04-21 16:48:26', '2024-04-21 16:48:27'),
(24, 21420351, 'Python', '526', '2024-05-11 23:29:11', '2024-05-11 23:32:40'),
(25, 21420351, 'test', '526', '2024-05-12 12:08:11', '2024-05-12 12:08:20'),
(26, 21420351, 'Python', '526', '2024-05-17 19:49:30', '2024-05-17 19:49:32'),
(27, 21420351, 'Python', '526', '2024-05-17 19:49:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `idno` int(11) DEFAULT NULL,
  `firstname` varchar(80) NOT NULL,
  `middlename` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `age` int(11) NOT NULL,
  `yearlevel` int(11) DEFAULT NULL,
  `gender` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `sessions` int(11) DEFAULT 30,
  `role` varchar(30) NOT NULL DEFAULT 'student',
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_ID`, `idno`, `firstname`, `middlename`, `lastname`, `age`, `yearlevel`, `gender`, `contact`, `email`, `address`, `sessions`, `role`, `password`) VALUES
(1, 21420351, 'Brayl James', 'Cortez', 'Amaquin', 21, 3, 'Male', '09562241845', 'brayljamesamaquin@gmail.com', '12-8H BAGANO COMPOUND, DOÑA MA', 24, 'student', '$2y$10$dJSykk4H7T8zcsXmOnrxr.ldJyRd.wnT7QlLVVDCvYgMQ3TNHLvu2'),
(2, -1, 'Jeff', '', 'Salimbangon', 30, NULL, 'Male', '0000', 'jeff@admin.com', 'Cebu City', NULL, 'admin', '$2y$10$dJSykk4H7T8zcsXmOnrxr.ldJyRd.wnT7QlLVVDCvYgMQ3TNHLvu2'),
(3, 21420352, 'Nedrey Jon', '', 'Golosino', 21, 3, 'Male', '0000', 'golosino@gmail.com', 'Ce', 29, 'student', '$2y$10$wSe50p9pc2onaT.boPIncOYw.H0.V3KxKEbcPYZ5Vxe2T9WiAEStW'),
(4, 21420353, 'Brandon', '', 'Alcarmen', 21, 3, 'Male', '0000', 'alcarmen@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(5, 21420354, 'Jeremiah Rae', '', 'Tabacon', 23, 3, 'Male', '0000', 'tabacon@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(6, 21420355, 'Kyle', '', 'Lim', 23, 3, 'Male', '0000', 'lim@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(7, 21420356, 'Roy', '', 'Dumasig', 69, 3, 'Male', '0000', 'dumasig@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(8, 21420357, 'Melvin', '', 'Sagnoy', 69, 3, 'Male', '0000', 'sagnoy@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(9, 21420358, 'Allan', '', 'Villegas', 23, 3, 'Male', '0000', 'villegas@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(10, 21420359, 'Joshua', '', 'Caranzo', 69, 3, 'Male', '0000', 'caranzo@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(11, 21420360, 'Joshua', '', 'Geram', 69, 3, 'Male', '0000', 'geram@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(12, 21420361, 'John', '', 'Soco', 23, 3, 'Male', '0000', 'soco@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(13, 21420362, 'John Denver', '', 'Vargas', 69, 3, 'Male', '0000', 'vargas@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(14, 21420363, 'Shyrelle Shine', '', 'Managaytay', 69, 3, 'Female', '0000', 'managaytay@gmail.com', 'Cebu City', 28, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(15, 21420364, 'Shyra', '', 'Galon', 23, 3, 'Female', '0000', 'galon@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(16, 21420365, 'Irene', '', 'Luga', 69, 3, 'Male', '0000', 'luga@gmail.com', 'Cebu City', 29, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa'),
(17, 21420366, 'Kate', '', 'Clemente', 20, 3, 'Female', '0000', 'clemente@gmail.com', 'Cebu City', 28, 'student', '$2y$10$b7jQSCZ1lzTk.5iawhB7U.sulYoblbhZGCDhB7wb6MO04KLftyTfa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcements_ibfk_1` (`userId`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedbacks_ibfk_1` (`user_ID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sitinrecord`
--
ALTER TABLE `sitinrecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idno` (`idno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `idno_2` (`idno`),
  ADD KEY `idno` (`idno`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sitinrecord`
--
ALTER TABLE `sitinrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_ID`);

--
-- Constraints for table `sitinrecord`
--
ALTER TABLE `sitinrecord`
  ADD CONSTRAINT `sitinrecord_ibfk_1` FOREIGN KEY (`idno`) REFERENCES `users` (`idno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
