-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2024 at 10:47 AM
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
-- Database: `log`
--

-- --------------------------------------------------------

--
-- Table structure for table `aoa`
--

CREATE TABLE `aoa` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aoa`
--

INSERT INTO `aoa` (`id`, `name`, `comment`, `size`, `type`, `path`, `uploaded at`) VALUES
(3, 'aoa_exp3.docx', 'exp3', 97480, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/aoa_exp3.docx', '2024-02-10 08:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(100) NOT NULL,
  `faculty_name` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `from_time` varchar(255) NOT NULL,
  `to_time` varchar(255) NOT NULL,
  `xie_id` int(9) NOT NULL,
  `date` date NOT NULL,
  `status` enum('Present','Absent','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `faculty_name`, `subject`, `from_time`, `to_time`, `xie_id`, `date`, `status`) VALUES
(146, 'MR. JOSE SEBASTIAN', 'maths', '8:45', '9:45', 202204030, '2024-03-08', 'Present'),
(147, 'MR. JOSE SEBASTIAN', 'maths', '8:45', '9:45', 202204029, '2024-03-08', 'Present'),
(148, 'MR. JOSE SEBASTIAN', 'maths', '8:45', '9:45', 202204028, '2024-03-08', 'Absent'),
(149, 'MR. JOSE SEBASTIAN', 'maths', '8:45', '9:45', 202204033, '2024-03-08', 'Absent'),
(150, 'MR. JOSE SEBASTIAN', 'maths', '8:45', '9:45', 202204007, '2024-03-08', 'Absent'),
(151, 'Faculty Name Not Found', 'aoa', '8:45', '9:45', 202204030, '2024-03-08', 'Present'),
(152, 'Faculty Name Not Found', 'aoa', '8:45', '9:45', 202204029, '2024-03-08', 'Present'),
(153, 'Faculty Name Not Found', 'aoa', '8:45', '9:45', 202204028, '2024-03-08', 'Present'),
(154, 'Faculty Name Not Found', 'aoa', '8:45', '9:45', 202204033, '2024-03-08', 'Absent'),
(155, 'Faculty Name Not Found', 'aoa', '8:45', '9:45', 202204007, '2024-03-08', 'Absent'),
(156, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204030, '2024-03-08', 'Present'),
(157, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204029, '2024-03-08', 'Absent'),
(158, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204028, '2024-03-08', 'Absent'),
(159, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204033, '2024-03-08', 'Absent'),
(160, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204007, '2024-03-08', 'Present'),
(161, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204030, '2024-03-08', 'Present'),
(162, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204029, '2024-03-08', 'Absent'),
(163, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204028, '2024-03-08', 'Absent'),
(164, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204033, '2024-03-08', 'Absent'),
(165, 'Faculty Name Not Found', 'os', '8:45', '9:45', 202204007, '2024-03-08', 'Present'),
(166, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204030, '2024-03-08', 'Present'),
(167, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204029, '2024-03-08', 'Present'),
(168, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204028, '2024-03-08', 'Absent'),
(169, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204033, '2024-03-08', 'Present'),
(170, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204007, '2024-03-08', 'Absent'),
(171, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204030, '2024-03-08', 'Present'),
(172, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204029, '2024-03-08', 'Present'),
(173, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204028, '2024-03-08', 'Absent'),
(174, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204033, '2024-03-08', 'Present'),
(175, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '8:45', '10:45', 202204007, '2024-03-08', 'Absent'),
(176, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '10:45', '1:00', 202204030, '2024-03-08', 'Present'),
(177, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '10:45', '1:00', 202204029, '2024-03-08', 'Absent'),
(178, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '10:45', '1:00', 202204028, '2024-03-08', 'Present'),
(179, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '10:45', '1:00', 202204033, '2024-03-08', 'Absent'),
(180, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '10:45', '1:00', 202204007, '2024-03-08', 'Absent'),
(181, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204030, '2024-03-08', 'Absent'),
(182, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204029, '2024-03-08', 'Absent'),
(183, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204028, '2024-03-08', 'Absent'),
(184, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204033, '2024-03-08', 'Absent'),
(185, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204007, '2024-03-08', 'Present'),
(186, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204030, '2024-03-08', 'Absent'),
(187, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204029, '2024-03-08', 'Absent'),
(188, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204028, '2024-03-08', 'Absent'),
(189, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204033, '2024-03-08', 'Absent'),
(190, 'Faculty Name Not Found', 'Faculty Name Not Found', '10:45', '10:45', 202204007, '2024-03-08', 'Present'),
(191, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '11:00', '12:00', 202204030, '2024-03-08', 'Present'),
(192, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '11:00', '12:00', 202204029, '2024-03-08', 'Present'),
(193, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '11:00', '12:00', 202204028, '2024-03-08', 'Present'),
(194, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '11:00', '12:00', 202204033, '2024-03-08', 'Present'),
(195, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '11:00', '12:00', 202204007, '2024-03-08', 'Present'),
(196, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(197, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(198, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(199, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(200, 'MR. JOSE SEBASTIAN', 'ENGINEERING MATHEMATICS-IV', '02:30', '03:30', 202204007, '2024-03-08', 'Absent'),
(201, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(202, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(203, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(204, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(205, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204007, '2024-03-08', 'Absent'),
(206, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(207, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(208, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(209, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(210, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204007, '2024-03-08', 'Absent'),
(211, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(212, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(213, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(214, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(215, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204007, '2024-03-08', 'Absent'),
(216, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(217, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(218, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(219, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(220, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204007, '2024-03-08', 'Absent'),
(221, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(222, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(223, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(224, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(225, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204007, '2024-03-08', 'Absent'),
(226, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204030, '2024-03-08', 'Present'),
(227, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204029, '2024-03-08', 'Absent'),
(228, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204028, '2024-03-08', 'Present'),
(229, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204033, '2024-03-08', 'Absent'),
(230, 'Faculty Name Not Found', 'Faculty Name Not Found', '02:30', '03:30', 202204007, '2024-03-08', 'Absent');

-- --------------------------------------------------------

--
-- Table structure for table `bonafide`
--

CREATE TABLE `bonafide` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `text` varchar(500) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bonafide`
--

INSERT INTO `bonafide` (`id`, `name`, `size`, `type`, `path`, `text`, `uploaded at`) VALUES
(1, '', 0, '', '', 'me', '2024-02-11 13:37:29'),
(2, 'Letter.docx', 14043, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/Letter.docx', 'required', '2024-02-11 16:07:48'),
(3, 'birth certificate.jpg', 2906027, 'image/jpeg', 'uploads/birth certificate.jpg', 'my bonofide', '2024-02-13 09:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `dbms`
--

CREATE TABLE `dbms` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dbms`
--

INSERT INTO `dbms` (`id`, `name`, `comment`, `size`, `type`, `path`, `uploaded at`) VALUES
(1, 'DBMS_exp5.docx', 'Exp 5\r\nwrite in xie sheets!!\r\n', 84547, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/DBMS_exp5.docx', '2024-02-10 09:48:24'),
(3, 'MU_Sem 3&4.pdf', 'ffdg', 212197, 'application/pdf', 'uploads/MU_Sem 3&4.pdf', '2024-02-20 09:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`, `comment`, `size`, `type`, `path`, `uploaded at`) VALUES
(1, 'DBMS_exp6.docx', 'yess', 138718, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/DBMS_exp6.docx', '2024-02-10 15:31:54'),
(2, 'DBMS_exp3.docx', 'yess', 77692, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/DBMS_exp3.docx', '2024-02-10 15:54:17');

-- --------------------------------------------------------

--
-- Table structure for table `fac_info`
--

CREATE TABLE `fac_info` (
  `id` int(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `xie_id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fac_info`
--

INSERT INTO `fac_info` (`id`, `photo`, `photo_path`, `xie_id`, `name`, `dept`, `email`, `contact`, `subject`) VALUES
(1, 'suhas_sir.jpeg', 'uploads/suhas_sir.jpeg', 202204095, 'MR. SUHAS LAWAND', 'COMPUTER SCIENCE AND ENGINEERING (CYBER SECURITY,IOT,BLOCKCHAIN TECHNOLOGY))', 'suhas.l@xavier,ac,in', '8897658905', 'ANALYSIS OF ALGORITHM\r\n'),
(2, 'ninad_sir.jpeg', 'uploads/ninad_sir.jpeg', 202204096, 'DR. NINAD MORE', 'COMPUTER SCIENCE AND ENGINEERING (CYBER SECURITY,IOT,BLOCKCHAIN TECHNOLOGY))', 'ninad.m@xavier,ac,in', '8488024896', 'DATABASE MANAGEMENT SYSTEM'),
(3, 'pankaj_sir.jpeg', 'uploads/pankaj_sir.jpeg', 202204097, 'DR. PANKAJ MISHRA', 'COMPUTER SCIENCE AND ENGINEERING (CYBER SECURITY,IOT,BLOCKCHAIN TECHNOLOGY))', 'pankaj.m@xavier,ac,in', '7789245609', 'OPERATING SYSTEMS'),
(4, 'jose_sir.jpeg', 'uploads/jose_sir.jpeg', 202204098, 'MR. JOSE SEBASTIAN', 'COMPUTER SCIENCE AND ENGINEERING (CYBER SECURITY,IOT,BLOCKCHAIN TECHNOLOGY))', 'jose.s@xavier.ac.in', '7700983479', 'ENGINEERING MATHEMATICS-IV'),
(5, 'manali_mam.jpeg', 'uploads/manali_mam.jpeg', 202204099, 'MRS. MANALI TAYADE', 'COMPUTER SCIENCE AND ENGINEERING (CYBER SECURITY,IOT,BLOCKCHAIN TECHNOLOGY))', 'manali.t@xavier.ac.in', '7786900984', 'MICROPROCESSOR');

-- --------------------------------------------------------

--
-- Table structure for table `le_appl`
--

CREATE TABLE `le_appl` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `le_appl`
--

INSERT INTO `le_appl` (`id`, `text`, `uploaded at`) VALUES
(1, 'hi', '2024-02-11 13:23:55'),
(2, 'from tomorrow onwards', '2024-02-11 13:31:18'),
(3, 'sick', '2024-02-13 09:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `maths`
--

CREATE TABLE `maths` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maths`
--

INSERT INTO `maths` (`id`, `name`, `comment`, `size`, `type`, `path`, `uploaded at`) VALUES
(19, 'aoa_exp3.docx', 'maths', 97480, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/aoa_exp3.docx', '2024-02-10 08:30:27'),
(20, 'DBMS_exp3.docx', 'yes', 77692, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/DBMS_exp3.docx', '2024-02-10 08:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `micro`
--

CREATE TABLE `micro` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mp`
--

CREATE TABLE `mp` (
  `id` int(50) NOT NULL,
  `user` int(9) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mp`
--

INSERT INTO `mp` (`id`, `user`, `pass`) VALUES
(1, 202204030, '202204030'),
(2, 202204028, '202204028'),
(3, 202204029, '202204029'),
(4, 202204033, '202204033'),
(5, 202204007, '202204007');

-- --------------------------------------------------------

--
-- Table structure for table `mp1`
--

CREATE TABLE `mp1` (
  `id` int(100) NOT NULL,
  `user` int(10) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mp1`
--

INSERT INTO `mp1` (`id`, `user`, `pass`) VALUES
(1, 202204095, '202204095'),
(2, 202204096, '202204096'),
(3, 202204097, '202204097'),
(4, 202204098, '1234'),
(5, 202204099, '202204099');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(100) NOT NULL,
  `notice` varchar(500) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice`, `uploaded at`) VALUES
(13, 'Hello, XIE!!', '2024-02-10 14:29:16'),
(17, 'me', '2024-02-10 16:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `os`
--

CREATE TABLE `os` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `os`
--

INSERT INTO `os` (`id`, `name`, `comment`, `size`, `type`, `path`, `uploaded at`) VALUES
(1, 'aoa_exp3.docx', 'vcgc', 97480, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'uploads/aoa_exp3.docx', '2024-02-20 10:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `python`
--

CREATE TABLE `python` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `size` int(100) NOT NULL,
  `type` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(100) NOT NULL,
  `quiz` varchar(500) NOT NULL,
  `uploaded at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quiz`, `uploaded at`) VALUES
(2, 'AOA Quiz\r\nLink:- http://localhost/try/notice_stu.php\r\nDeadline:- 14/02/2024', '2024-02-10 14:45:23'),
(4, '2nd quiz', '2024-02-10 15:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `rail`
--

CREATE TABLE `rail` (
  `id` int(100) NOT NULL,
  `xie_id` int(9) NOT NULL,
  `name` varchar(255) NOT NULL,
  `from_station` varchar(50) NOT NULL,
  `to_station` varchar(50) NOT NULL,
  `class_duration` varchar(50) NOT NULL,
  `class_type` varchar(50) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rail`
--

INSERT INTO `rail` (`id`, `xie_id`, `name`, `from_station`, `to_station`, `class_duration`, `class_type`, `date_time`) VALUES
(7, 202204030, 'LAGISHETTY PARTH LAXMAN KAVITA', 'Lower Parel', 'Mahim', 'quarterly', 'second_class', '2024-02-19 10:55:56'),
(9, 202204029, 'KUMBHAR AJAY RAJKUMAR SANTA', 'Ghatkopar', 'Mahim', 'quarterly', 'second_class', '2024-02-19 10:57:51'),
(13, 202204028, 'KHOT KHSITIJ NILESH MEGHNA', 'Andheri', 'Mahim', 'monthly', 'First_class', '2024-02-20 09:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `stu_info`
--

CREATE TABLE `stu_info` (
  `id` int(100) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `roll_no` int(100) NOT NULL,
  `xie_id` int(10) NOT NULL,
  `sem` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `student_contact` varchar(10) NOT NULL,
  `parent_contact` varchar(10) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `bg` varchar(5) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_info`
--

INSERT INTO `stu_info` (`id`, `photo`, `photo_path`, `roll_no`, `xie_id`, `sem`, `name`, `email`, `dept`, `student_contact`, `parent_contact`, `dob`, `bg`, `category`) VALUES
(1, 'parth.jpeg', 'uploads/parth.jpeg', 1, 202204030, 'IV', 'LAGISHETTY PARTH LAXMAN KAVITA', '202204030.parthllk@student.xavier.ac.in', 'Computer Science and Engineering (IOT,Cyber Security & Block chain technology)', '7738480381', '9819128390', '30/12/2004', 'B+ve', 'SBC'),
(2, 'ajay.jpeg', 'uploads/ajay.jpeg', 2, 202204029, 'IV', 'KUMBHAR AJAY RAJKUMAR SANTA', '202204029.ajaykrs@student.xavier.ac.in', 'Computer Science and Engineering (IOT,Cyber Security & Block chain technology)', '7304795024', '9984356289', '17/03/2004', 'B+ve', 'GENERAL'),
(3, 'kshitij.jpeg', 'uploads/kshitij.jpeg', 3, 202204028, 'IV', 'KHOT KHSITIJ NILESH MEGHNA', '202204028.kshitijknm@student.xavier.ac.in', 'Computer Science and Engineering (IOT,Cyber Security & Block chain technology)', '8355994998', '8898867045', '27/12/2004', 'AB+ve', 'OBC'),
(4, 'sahil.jpeg', 'uploads/sahil.jpeg', 4, 202204033, 'IV', 'MATHARA SAHIL HILDEG SHAMIANA', '202204033.sahilmhs@student.xavier.ac.in', 'Computer Science and Engineering (IOT,Cyber Security & Block chain technology)', '9987399175', '8796546780', '20/10/2004', 'AB+ve', 'MINORITY(CHRISTIAN)'),
(5, 'jayesh.jpeg', 'uploads/jayesh.jpeg', 5, 202204007, 'IV', 'CHAURASIA JAYESH RAMASHARE LALTIDEVI', '202204007.jayeshcrl@student.xavier.ac.in', 'Computer Science and Engineering (IOT,Cyber Security & Block chain technology)', '8369095484', '7789435890', '06/10/2004', 'B+ve', 'GENERAL'),
(6, '[value-2]', '[value-3]', 6, 202204031, '[valu', 'LAKHAN PRACHI PRASHANT PRIYA', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[valu', '[value-14]'),
(7, '[value-2]', '[value-3]', 7, 202204027, '[valu', 'KHAROSE PRARAMBHI RAMESH RESHMA', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[valu', '[value-14]'),
(8, '[value-2]', '[value-3]', 8, 202204016, '[valu', 'GOUNDER PRANAV RAJAN SUJATHA', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[valu', '[value-14]'),
(9, '[value-2]', '[value-3]', 9, 202204045, '[valu', 'PARATE PIYUSH RAJESH PRAMILA', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[valu', '[value-14]'),
(10, '[value-2]', '[value-3]', 10, 202204043, '[valu', 'PANDEY HIMANSHU SANTOSH KIRAN', '[value-8]', '[value-9]', '[value-10]', '[value-11]', '[value-12]', '[valu', '[value-14]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aoa`
--
ALTER TABLE `aoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bonafide`
--
ALTER TABLE `bonafide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbms`
--
ALTER TABLE `dbms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fac_info`
--
ALTER TABLE `fac_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `le_appl`
--
ALTER TABLE `le_appl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maths`
--
ALTER TABLE `maths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `micro`
--
ALTER TABLE `micro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mp`
--
ALTER TABLE `mp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mp1`
--
ALTER TABLE `mp1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `os`
--
ALTER TABLE `os`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `python`
--
ALTER TABLE `python`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rail`
--
ALTER TABLE `rail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_info`
--
ALTER TABLE `stu_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aoa`
--
ALTER TABLE `aoa`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `bonafide`
--
ALTER TABLE `bonafide`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dbms`
--
ALTER TABLE `dbms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fac_info`
--
ALTER TABLE `fac_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `le_appl`
--
ALTER TABLE `le_appl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `maths`
--
ALTER TABLE `maths`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `micro`
--
ALTER TABLE `micro`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mp`
--
ALTER TABLE `mp`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mp1`
--
ALTER TABLE `mp1`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `os`
--
ALTER TABLE `os`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `python`
--
ALTER TABLE `python`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rail`
--
ALTER TABLE `rail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stu_info`
--
ALTER TABLE `stu_info`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
