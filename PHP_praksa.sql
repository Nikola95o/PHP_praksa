-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2018 at 04:53 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PHP_praksa`
--

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE `News` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `body` varchar(255) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`id`, `title`, `body`, `dateCreated`) VALUES
(1, 'News 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At commodi est ipsa, iusto odit quos suscipit voluptatem. Ad aspernatur incidunt nisi voluptatem? Amet atque culpa cumque, delectus iure iusto voluptatibus.', '2018-10-30 15:26:20'),
(2, 'Some other news', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab adipisci dolore dolorem ex iure natus nihil obcaecati odio, omnis, quo sapiente similique suscipit temporibus, tenetur ullam. Aliquam doloribus perspiciatis quidem!', '2018-10-30 16:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `email`, `name`, `password`) VALUES
(3, 'nikola@hhh.com', 'SOME NAME', '1ba3d16e9881959f8c9a9762854f72c6e6321cdd44358a10a4e939033117eab9'),
(5, 'mail@example.com', 'praksa', 'ce5ca673d13b36118d54a7cf13aeb0ca012383bf771e713421b4d1fd841f539a'),
(6, 'ex@ex.com', 'ex', 'ce5ca673d13b36118d54a7cf13aeb0ca012383bf771e713421b4d1fd841f539a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `News`
--
ALTER TABLE `News`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
