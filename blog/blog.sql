-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2018 at 01:35 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` varchar(50) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `body`, `date`, `image_path`) VALUES
(1, 1, 'The Title1', 'Hello Everyone!', '2018-10-12 08:19:40', ''),
(2, 1, 'Article Test Title', 'Test Body', '2018-10-12 08:19:40', ''),
(3, 1, 'New Article', 'New Article Body', '2018-10-12 08:19:40', ''),
(5, 1, 'Test', 'Test', '2018-10-12 08:19:40', ''),
(6, 1, 'Title1', 'Test', '2018-10-12 08:19:40', ''),
(7, 1, 'Title2', 'Test', '2018-10-12 08:19:40', ''),
(8, 1, 'Title3', 'Test', '2018-10-12 08:19:40', ''),
(9, 1, 'Title4', 'Test', '2018-10-12 08:19:40', ''),
(10, 1, 'Title5', 'Test', '2018-10-12 08:19:40', ''),
(11, 1, 'Title6', 'Test', '2018-10-12 08:19:40', ''),
(12, 1, 'Test11__', 'Test date time', '2018-10-12 08:22:34', ''),
(13, 1, 'Test12', 'test', '2018-10-12 04:58:28', ''),
(14, 1, 'Article Test Title', 'sf', '2018-10-12 06:28:18', ''),
(15, 1, 'Article Test Title', 'Test1', '2018-10-12 06:37:24', 'http://localhost/project/blog/uploads/example.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pword` varchar(255) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `pword`, `fname`, `lname`) VALUES
(1, 'praveen', 'praveen', 'Praveen', 'Dewangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
