-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 11:59 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satelite`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(3) NOT NULL,
  `name_surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name_surname`, `origin`) VALUES
(1, 'Paulo Coelho', 'Brazil'),
(2, 'Dr Joe Dispenza', 'USA'),
(5, 'Yuval Harari', 'Israel'),
(11, 'J. R. R. Tolkien', 'South African Republic'),
(13, 'Robert Kiyosaki', 'USA'),
(14, 'James Redfield', 'USA'),
(15, 'George Orwell', 'England');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(3) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publication_date` int(5) NOT NULL,
  `id_author` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `publication_date`, `id_author`) VALUES
(1, 'The Alchemist', 1988, 1),
(2, 'Eleven Minutes', 1996, 1),
(4, 'Aleph', 2010, 1),
(5, 'Hippie', 2018, 1),
(6, 'Veronika Decides to Die', 1998, 1),
(7, 'By the River Piedra I Sat Down and Wept', 1994, 1),
(8, 'Sapiens: A Brief History of Human Kind', 2014, 5),
(9, '21 Lessons for the 21st Century', 2018, 5),
(10, 'Homo Deus: A Brief History of Human Kind', 2016, 5),
(11, 'Breaking the Habit of Being Yourself', 2012, 2),
(12, 'You Are the Placebo', 2014, 2),
(13, 'The Lord of the Rings', 1954, 11),
(14, 'The Hobbit', 1937, 11),
(15, 'Rich Dad Poor Dad', 1997, 13),
(16, 'Cashflow Quadrant: Rich Dad\'s Guide to Financial Freedom', 2000, 13),
(17, 'Rich Dad\'s Success Stories', 2003, 13),
(18, 'The Celestine Prophecy', 1993, 14),
(19, 'The Tenth Insight', 1996, 14),
(21, '1984', 1949, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_author` (`id_author`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
