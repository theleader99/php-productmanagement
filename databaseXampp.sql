-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2020 at 04:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(35, 'Khóa học thường '),
(36, 'Khóa học tầm trung'),
(37, 'Khóa học chất lượng cao'),
(38, 'Khóa học dành cho người khiếm thính'),
(39, 'Khóa học toàn diện');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `course_id` int(11) NOT NULL,
  `course_tags` varchar(255) NOT NULL,
  `course_comment_count` int(11) NOT NULL,
  `course_status` varchar(255) NOT NULL DEFAULT 'draft',
  `course_category_id` int(3) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_teacher` varchar(255) NOT NULL,
  `course_date` date NOT NULL,
  `course_image` text NOT NULL,
  `course_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`course_id`, `course_tags`, `course_comment_count`, `course_status`, `course_category_id`, `course_title`, `course_teacher`, `course_date`, `course_image`, `course_content`) VALUES
(44, 'javascript, backend, frontend, fullstack', 0, 'không có sẵn', 37, 'Javascript core', 'Thắng Vũ', '2020-06-20', 'javascript.jpg', 'Javascript là một trong các ngôn ngữ phổ biến trên thế giới, đến với khóa học này các bạn có thể trở thành một lập trình viên fullstack web hay fullstack mobile'),
(53, 'bootstrap, frontend, html, css', 0, 'có sẵn', 35, 'Bootstrap core', 'Thầy Hưng', '2020-06-24', 'bootstrap.png', '\r\n     Nếu bạn muốn trở thành mo'),
(54, 'java, backend, server, JDBC', 0, 'có sẵn', 35, 'Java core', 'Thầy giáo ba', '2020-07-02', 'java.png', '                      \r\n     Một trong những ngôn ngữ phổ biến              '),
(55, 'php, backend, phpmyadmin, wordpress, easy web built', 0, 'không có sẵn', 39, 'Php core', 'Phùng Thanh Độ', '2020-06-24', 'php.jpg', '\r\n       Php là ngôn ngữ'),
(57, 'nodejs, backend, javascript, server', 0, 'không có sẵn', 38, 'Nodejs core', 'Thắng Vũ', '2020-06-24', '919825.jpg', '\r\n       Javascript không chỉ là ngôn ngữ frontend mà giờ đây còn là ngôn ngữ của backend'),
(58, 'python, AI, machine learning, web, snake', 0, 'có sẵn', 36, 'Python core', 'Từ Minh Phương', '2020-06-24', 'python-la-gi.jpg', '\r\n     AI, machine learning và NLP đang là chủ đề hot nhất hiện nay. Và ngôn ngữ đứng sau những cái hot này đó là Python'),
(62, 'ruby, web, fullstack, japan', 0, 'không có sẵn', 35, 'rubu', 'thang', '2020-07-04', 'ruby.jpg', '\r\n       hello');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystring22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES
(12, 'ngaduong70', '123', 'nga', 'duong', 'sainttroll99@gmail.com', '', 'Khách hàng chưa mua khóa học', '$2y$10$iusesomecrazystring22'),
(21, 'toanta99', '123', 'toan', 'ta', 'toanta99@gmail.com', '', 'Khách hàng đã mua khóa học', '$2y$10$iusesomecrazystring22'),
(22, 'the code boy', '123', 'thang', 'vu', 'sainttroll99@gmail.com', '', 'Khách hàng đã mua khóa học', '$2y$10$iusesomecrazystring22'),
(23, 'hoangduong99', '123', 'duong', 'hoang', 'hoangduong99@gmail.com', '', 'Khách hàng chưa mua khóa học', '$2y$10$iusesomecrazystring22'),
(24, 'thayhungptit', '123', 'thay', 'hung', 'thayhungptit@gmail.com', '', 'khách hàng chưa mua khóa học', '$2y$10$iusesomecrazystring22'),
(26, 'vu chien thang ', '123', '', '', 'thangvu@gmail.com', '', 'khách hàng chưa mua khóa học', '$2y$10$iusesomecrazystring22'),
(27, 'thangvu', '123', '', '', 'thangvu@gmail.com', '', 'khách hàng chưa mua khóa học', '$2y$10$iusesomecrazystring22'),
(28, 'thangvudeptrai', '123', '', '', 'thangvu@gmail.com', '', 'khách hàng chưa mua khóa học', '$2y$10$iusesomecrazystring22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
