-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 11:26 AM
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
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `nama`, `email`, `telpon`, `password`, `role`) VALUES
(1, 'Admin', 'admin@gmail.com', '0987654321', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `materi_id` int(12) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`id`, `user_id`, `materi_id`, `price`, `file`, `status`) VALUES
(7, 1, 23, '100000', '20240717101657WhatsApp Image 2024-07-11 at 09.13.47.jpeg', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `exam_category`
--

CREATE TABLE `exam_category` (
  `id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `exam_time` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_category`
--

INSERT INTO `exam_category` (`id`, `category`, `exam_time`) VALUES
(1, 'TOEFL', '10'),
(2, 'TOEIC', '15'),
(3, 'IELTS', '20'),
(4, 'Kuis', '19'),
(5, 'TOEFL (Structure and Written Expression)', '2');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `tipe_exam` varchar(100) NOT NULL,
  `total_que` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `wrong_answer` varchar(10) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `username`, `tipe_exam`, `total_que`, `correct_answer`, `wrong_answer`, `exam_time`) VALUES
(1, 'Rose', 'Quiz', '10', '7', '3', '00:05:00'),
(3, 'holid', 'Tes', '1', '0', '1', '00:03'),
(4, 'Rose', 'Tes', '5', '2', '3', '00:23'),
(5, 'Rose', 'Tes', '5', '0', '5', '00:10');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `materi_course` text NOT NULL,
  `judul` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `billing_type` enum('free','pay') DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `materi_course`, `judul`, `category`, `billing_type`, `price`, `schedule`) VALUES
(23, 'TOEFL', 'TOEFL', 'TOEFL', 'pay', '100000', '[{\"start\":\"2024-07-17T14:47\",\"end\":\"2024-07-18T14:47\"},{\"start\":\"2024-07-18T14:47\",\"end\":\"2024-07-25T14:47\"},{\"start\":\"2024-07-02T14:47\",\"end\":\"2024-07-26T14:47\"}]'),
(24, 'COURSE FREE', 'COURSE FREE', 'COURSE FREE', 'free', '', '[{\"start\":\"2024-07-17T15:14\",\"end\":\"2024-07-17T15:14\"},{\"start\":\"2024-07-18T15:15\",\"end\":\"2024-07-19T15:15\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `materi_id` int(12) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `user_id`, `materi_id`, `start`, `end`, `status`) VALUES
(6, 1, 23, '2024-07-18 14:47:00', '2024-07-25 14:47:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toefl`
--

CREATE TABLE `toefl` (
  `id` int(5) NOT NULL,
  `nomor` varchar(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt1` varchar(100) NOT NULL,
  `opt2` varchar(100) NOT NULL,
  `opt3` varchar(100) NOT NULL,
  `opt4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toefl`
--

INSERT INTO `toefl` (`id`, `nomor`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `category`) VALUES
(1, '1', 'In the realm of psychological theory Margaret F. Washburn was a dualist _____ that motor phenomena have an essential role in psychology.', '(A) who she believed', '(B) who believed  ', '(C) believed', '(D) who did she believe', '(B) who believed  ', 'TOEFL'),
(2, '1', 'affah', 'hmm?', 'hm?', 'Hj?', 'HY?', 'hm?', 'TOEIC'),
(3, '1', 'a', 'aa', 'aaa', 'aaaa', 'aaaaaa', 'aa', 'Kuiss'),
(4, '2', 'apaaa', 'iya', 'iyaaa', 'lagi apa', 'yaa', 'yaa', 'Kuiss'),
(5, '1', ' The president —– the election by a landslide', 'A. Won ', 'B. He won ', 'C. Yesterday ', 'D. Fortunately', 'A. Won', 'TOEFL (Structure and Written Expression)'),
(6, '2', ' When —– the conference?', 'A. The doctor attended ', 'B. Did the doctor attend ', 'C. The doctor will attend ', 'D. The doctor attendance', 'B. Did the doctor attend', 'TOEFL (Structure and Written Expression)'),
(7, '3', ' —– range in color from pale yellow to bright orange.\r\n', 'A. Canaries ', 'B. Canaries which ', 'C. That canaries ', 'D. Canaries that are', 'A. Canaries ', 'TOEFL (Structure and Written Expression)'),
(8, '4', ' Carnivorous plants —– insects to obtain nitrogen', 'A. Are generally trapped ', 'B. Trap generally ', 'C. Are trapped generally ', 'D. Generally trap', 'D. Generally trap', 'TOEFL (Structure and Written Expression)'),
(9, '5', ' A federal type of government results in —–', 'A. A vertical distribution of power ', 'B. Power is distributed vertically ', 'C. Vertically distributed ', 'D. The distribution of power is vertical', 'A. A vertical distribution of power ', 'TOEFL (Structure and Written Expression)'),
(10, '6', ' Amanda Way’s career as a social reformer \r\n____ in 1851 when, at an antislavery \r\nmeeting in Indiana, she called for a state \r\nwoman’s rights convention.', '(A) begin ', '(B) began', '(C) have begun ', '(D) to have begun', '(B) began', 'TOEFL (Structure and Written Expression)'),
(11, '7', ' The celesta, an orchestral percussion \r\ninstrument, resembles ___', '(A) a small upright piano', ' (B) how a small upright piano ', '(C) a small upright piano is ', '(D) as a small upright piano', '(A) a small upright piano', 'TOEFL (Structure and Written Expression)'),
(12, '8', ' Thomas Paine, _____, wrote Common \r\nSense, a pamphlet that identified the \r\nAmerican colonies with the cause of liberty.', '(A) writer of eloquent ', '(B) whose eloquent writing ', '(C) an eloquent writer ', '(D) writing eloquent', '(C) an eloquent writer ', 'TOEFL (Structure and Written Expression)'),
(13, '9', ' Although beavers rarely remain submerged \r\nfor more than two minutes, they can stay \r\nunderwater ___ fi fteen minutes before \r\nhaving to surface for air.', '(A) as long ', '(B) as long as ', '(C) so long ', '(D) so long that', '(B) as long as ', 'TOEFL (Structure and Written Expression)'),
(14, '10', ' Protein digestion begins in the stomach \r\n____ ends in the small intestine.', '(A) while ', '(B) and', '(C) how', '(D) because', '(B) and', 'TOEFL (Structure and Written Expression)'),
(15, '11', ' When natural gas burns, its ___ into atoms \r\nof carbon and hydrogen.', '(A) hydrocarbon molecules, breaking up', ' (B) broke up by hydrocarbon molecules ', '(C) hydrocarbon molecules break up ', '(D) broken up hydrocarbon molecules', '(C) hydrocarbon molecules break up ', 'TOEFL (Structure and Written Expression)');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(11) NOT NULL,
  `nama` varchar(110) NOT NULL,
  `email` varchar(110) NOT NULL,
  `telpon` varchar(110) NOT NULL,
  `password` varchar(110) NOT NULL,
  `role` varchar(110) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `nama`, `email`, `telpon`, `password`, `role`) VALUES
(1, 'Rose', 'rose@gmail.com', '0987654321', 'rose1', 'user'),
(2, 'akucntik', 'daima@gmail.com', '0819374354643', 'Bunga123', 'user'),
(3, 'holid', 'holid@gmail.com', '089502234527', '123456', 'user'),
(4, 'saya', 'saya@gmail.com', '0987654321', 'saya1', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_category`
--
ALTER TABLE `exam_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toefl`
--
ALTER TABLE `toefl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_category`
--
ALTER TABLE `exam_category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `toefl`
--
ALTER TABLE `toefl`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
