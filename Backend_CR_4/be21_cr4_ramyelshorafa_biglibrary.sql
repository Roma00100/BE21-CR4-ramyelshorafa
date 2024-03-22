-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2024 at 07:53 PM
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
-- Database: `be21_cr4_ramyelshorafa_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be21_cr4_ramyelshorafa_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be21_cr4_ramyelshorafa_biglibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `short_description` text NOT NULL,
  `type` enum('book','CD','DVD') NOT NULL DEFAULT 'book',
  `author_first_name` varchar(100) NOT NULL,
  `author_last_name` varchar(100) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `publisher_address` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `status` enum('available','reserved') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `picture`, `isbn`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(7, 'The Great Gatsby', 'pic1.avif', '9780142437266', 'A novel by F. Scott Fitzgerald', 'book', 'F. Scott', 'Fitzgerald', 'Scribner', '123 Main St, New York', '1925-04-10', 'available'),
(8, 'To Kill a Mockingbird', 'pic2.avif', '9780061120084', 'A novel by Harper Lee', 'book', 'Harper', 'Lee', 'HarperCollins', '456 Elm St, Chicago', '1960-07-11', 'available'),
(9, '1984', 'pic3.avif', '9780451524935', 'A novel by George Orwell', 'book', 'George', 'Orwell', 'Secker & Warburg', '789 Oak St, London', '1949-06-08', 'available'),
(10, 'The Catcher in the Rye', 'picture.jpg', '9780316769488', 'A novel by J.D. Salinger', 'book', 'J.D.', 'Salinger', 'Little, Brown and Company', '101 Pine St, Boston', '1951-07-16', 'available'),
(11, 'Moby-Dick', 'picture.jpg', '9780486432151', 'A novel by Herman Melville', 'book', 'Herman', 'Melville', 'Harper & Brothers', '567 Cedar St, New York', '1851-10-18', 'available'),
(12, 'Pride and Prejudice', 'picture.jpg', '9780486284736', 'A novel by Jane Austen', 'book', 'Jane', 'Austen', 'T. Egerton, Whitehall', '321 Maple St, London', '1813-01-28', 'available'),
(13, 'Crime and Punishment', 'picture.jpg', '9780679734505', 'A novel by Fyodor Dostoevsky', 'book', 'Fyodor', 'Dostoevsky', 'The Russian Messenger', '456 Birch St, St. Petersburg', '1866-01-01', 'available'),
(14, 'The Hobbit', 'picture.jpg', '9780547928227', 'A novel by J.R.R. Tolkien', 'book', 'J.R.R.', 'Tolkien', 'George Allen & Unwin', '789 Willow St, London', '1937-09-21', 'available'),
(15, 'The Lord of the Rings', 'picture.jpg', '9780345339706', 'A novel by J.R.R. Tolkien', 'book', 'J.R.R.', 'Tolkien', 'Allen & Unwin', '101 Cedar St, London', '1954-07-29', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
