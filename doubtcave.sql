-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 07:25 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doubtcave`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(10) NOT NULL,
  `sendersID` int(10) NOT NULL,
  `receiversID` int(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `isSolved` tinyint(1) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `sendersID`, `receiversID`, `message`, `isSolved`, `time`) VALUES
(2, 2019450002, 201904, 'I have a doubt', 0, '2019-11-18 13:24:06'),
(3, 201904, 2019450002, 'What doubt?', 0, '2019-11-18 13:24:28'),
(4, 2019450002, 201904, 'What is HTML ?', 0, '2019-11-18 13:24:41'),
(5, 201904, 2019450002, 'Hyper Text Markup Language', 0, '2019-11-18 13:25:02'),
(44, 2019450002, 201904, 'asff', 0, '2019-11-26 21:40:46'),
(45, 2019450002, 201904, 'asff', 0, '2019-11-26 21:40:48'),
(46, 2019450002, 201904, 'asf', 0, '2019-11-26 21:40:50'),
(47, 2019450002, 201904, 'gjkki', 0, '2019-11-26 21:43:40'),
(48, 2019450002, 201904, 'gjkki', 0, '2019-11-26 21:46:14'),
(49, 2019450002, 201904, 'gjkki', 0, '2019-11-26 21:46:48'),
(50, 201904, 201904, 'dfs', 0, '2019-11-26 22:51:31'),
(51, 201904, 201904, 'sdf', 0, '2019-11-26 22:51:35'),
(52, 201904, 201904, 'sdf', 0, '2019-11-26 22:51:38'),
(53, 201904, 201904, 'sdf', 0, '2019-11-26 22:53:34'),
(54, 201904, 201904, 'sdf', 0, '2019-11-26 22:53:40'),
(55, 201904, 201904, 'fds', 0, '2019-11-26 22:53:43'),
(56, 201904, 201904, 'sdf', 0, '2019-11-26 22:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `description` varchar(100) NOT NULL,
  `specialization` varchar(25) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `description`, `specialization`, `photo`, `password`) VALUES
(201904, 'Peter Quill', 'sdfdsgad', 'asdfdfdsf', 'sdfdsxf', 'pass'),
(201905, 'Tony Stark', 'azzxd', 'sdsd', 'sad', 'pass'),
(201906, 'Thor Odinson', 'asF', 'saf', 'safs', 'pass'),
(201907, 'Bruce Banner', 'zsfdsx', 'saf', 'saf', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `faculty_id` int(10) NOT NULL,
  `description` varchar(500) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `student_id`, `faculty_id`, `description`, `time`) VALUES
(1, 2019450002, 201904, 'Abusive talk', '2019-11-26 20:06:11'),
(2, 2019450001, 201903, 'Use of bad words', '2019-11-26 20:06:35'),
(3, 2019450001, 201904, 'Use of foul language', '2019-11-26 20:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `photo`, `password`) VALUES
(2019450001, 'Saptak Patil', 'abcd', 'saptak'),
(2019450002, 'Groot', 'asdfsf', 'pass'),
(2019450003, 'Paul Rudd', 'sdasd', 'pass'),
(2019450004, 'Robert DowneyJR', 'sadsasFsf', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201908;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2019450005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
