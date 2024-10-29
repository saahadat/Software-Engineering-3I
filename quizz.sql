-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2024 at 07:07 AM
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
-- Database: `quizz`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'bangla'),
(2, 'C Programming'),
(3, 'English'),
(4, 'HTML');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option_text` text DEFAULT NULL,
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option_text`, `is_correct`) VALUES
(1, 1, 'dhaka', 1),
(2, 1, 'chittagong', 0),
(3, 1, 'rajshahi', 0),
(4, 1, 'dinajpur', 0),
(5, 2, 'Rabindranath Tagore', 0),
(6, 2, 'Kazi Nazrul Islam', 1),
(7, 2, 'Barack Obama', 0),
(8, 2, 'Albert Einistein', 0),
(9, 3, 'A poet', 1),
(10, 3, 'A madman', 0),
(11, 3, 'A historian', 0),
(12, 3, 'A footballer', 0),
(13, 4, 'A poetry book', 0),
(14, 4, 'A delicious dish', 0),
(15, 4, 'A Distopian novel', 1),
(16, 4, 'Anime', 0),
(17, 5, 'Dennis Rechard', 0),
(18, 5, 'Dennis M. Ritchie', 1),
(19, 5, 'Bjarne Stroustrup', 0),
(20, 5, 'Anders Hejlsberg', 0),
(21, 6, '1962', 0),
(22, 6, '1972', 1),
(23, 6, '1978', 0),
(24, 6, '1979', 0),
(25, 7, 'Low level Language', 0),
(26, 7, 'High Level Language', 0),
(27, 7, 'Medium Level languge', 1),
(28, 7, 'None of the above', 0),
(29, 8, '32', 1),
(30, 8, '33', 0),
(31, 8, '64', 0),
(32, 8, '128', 0),
(33, 9, 'Procedeural Programming Language', 0),
(34, 9, 'General Purpose Programming Language', 0),
(35, 9, 'Structured Programming Language', 0),
(36, 9, 'All of the Above', 1),
(37, 10, '/* and */', 1),
(38, 10, '// and //', 0),
(39, 10, '//', 0),
(40, 10, '/** and **/', 0),
(41, 11, 'Interpreter', 0),
(42, 11, 'Compiler', 1),
(43, 11, 'Compiler and Interpreter', 0),
(44, 11, 'Assembler', 0),
(45, 12, 'char', 0),
(46, 12, 'int', 0),
(47, 12, 'float', 0),
(48, 12, 'All of the Above', 1),
(49, 13, '%d', 0),
(50, 13, '%f', 0),
(51, 13, '%lf', 1),
(52, 13, '%LF', 0),
(53, 14, 'char > int > float', 0),
(54, 14, 'char < int < float', 1),
(55, 14, 'int < char < float', 0),
(56, 14, 'int < chat > float', 0),
(57, 15, 'Hyperactive Text Markup Language', 0),
(58, 15, 'Hyper Text Markup Language', 1),
(59, 15, 'Hyper Text Machine Language', 0),
(60, 15, 'None of these', 0),
(61, 16, '< head1 > to < / head6 >', 0),
(62, 16, '< p1 > to < p6 >', 0),
(63, 16, '< h1 > to < / h6 >', 1),
(64, 16, '< h1 > to < / h3 >', 0),
(65, 17, '< italic >', 0),
(66, 17, '< em >', 0),
(67, 17, '< i >', 1),
(68, 17, '< it >', 0),
(69, 18, '< sub >', 1),
(70, 18, '< subscript >', 0),
(71, 18, '< s >', 0),
(72, 18, '< subscripted >', 0),
(73, 19, '< sup >', 1),
(74, 19, '< superscript >', 0),
(75, 19, '< s >', 0),
(76, 19, '< superscripted >', 0),
(77, 20, '< a >', 1),
(78, 20, '< h >', 0),
(79, 20, '< hyperlink >', 0),
(80, 20, 'Both A. and B.', 0),
(81, 21, '< a > src=\"url\" link text < / a >', 0),
(82, 21, '< a > link=\"url\" link text < / a > ', 0),
(83, 21, ' < a > href=\"url\" link text < / a >', 1),
(84, 21, '< a > srclink=\"url\" link text < / a >', 0),
(85, 22, '< img >', 1),
(86, 22, '< pic >', 0),
(87, 22, '< image >', 0),
(88, 22, '< picture >', 0),
(89, 23, '< ol >  < / ol >', 1),
(90, 23, '< ul >  < / ul >', 0),
(91, 23, '< list >  < / list >', 0),
(92, 23, '< li >  < / li >', 0),
(93, 24, '< ol >  < / ol >', 0),
(94, 24, '< ul >  < / ul >', 1),
(95, 24, '< list >  < / list >', 0),
(96, 24, '< li >  < / li >', 0),
(97, 25, 'Web', 0),
(98, 25, '< tag >', 0),
(100, 25, 'Web language', 1),
(101, 25, 'html', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question_text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `quiz_id`, `question_text`) VALUES
(1, 2, '1.what is the capital of Bangladesh?'),
(2, 1, '1.who is the our national poet?'),
(3, 1, '2.who is kazi Nazrul Islam?'),
(4, 2, '2.what is 1984?'),
(5, 3, '1.C language was developed by ___.'),
(6, 3, '2.In which year was C language developed?'),
(7, 3, '3.C is a ___.'),
(8, 3, '4.How many keywords are there in C language?'),
(9, 3, '5.C language is a ___.'),
(10, 3, '6.A C-style comment, simply surround the text with ___.'),
(11, 3, '7.The C source file is processed by the ___.'),
(12, 3, '8.Which are the fundamental data types in C?'),
(13, 3, '9.Which is the correct format specifier for double type value in C?'),
(14, 3, '10.Which is correct with respect to the size of the data types in C?'),
(15, 4, '1.HTML stands for_______.'),
(16, 4, '2.HTML headings are defined with the _____ tags.'),
(17, 4, '3.Which HTML tag is used to define italic text?'),
(18, 4, '4.Which HTML tag is used to define subscript text?'),
(19, 4, '5.Which HTML tag is used to define superscript text?'),
(20, 4, '6.Which HTML tag is used to define a hyperlink?'),
(21, 4, '7.Which is the correct syntax of <a> tag?'),
(22, 4, '8.Which tag is used to embed an image in an HTML document?'),
(23, 4, '9.Which tag is used to define ordered listing?'),
(24, 4, '10.Which tag is used to define unordered listing?'),
(25, 4, 'What is HTML?');

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quizzes`
--

INSERT INTO `quizzes` (`id`, `title`, `description`, `category_id`, `aid`) VALUES
(1, 'Quiz1', 'Bangla1', 1, 1),
(2, 'Quiz2', 'English1', 3, 3),
(3, 'C Programming', 'C Language', 2, 2),
(4, 'HTML', 'HyperText MarkUp Language', 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`id`);

--
-- Constraints for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
