-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2018 at 12:34 AM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.2.5-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assistacademy`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occupation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `address`, `country`, `phone`, `occupation`, `organization`, `created_at`, `updated_at`) VALUES
(1, 'SN Zisad', 'snzisad555@gmail.com', '', '', '0', 'Student', 'University Of Chittagong', '2018-06-08 12:32:30', '2018-06-08 12:32:30'),
(35, 'Arif Reza', 'arifbo@gmail.com', '', '', '0', '', NULL, '2018-06-08 12:38:01', '2018-06-08 12:38:01'),
(37, 'SN Zisad', 'snzisad2@gmail.com', '', '', '1867301260', 'Student', 'University Of Chittagong', '2018-06-11 18:19:55', '2018-06-11 18:19:55');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(34) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` int(255) DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `file_name`, `catagory_id`, `uploader_email`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(4, 'মন ভোলা পন্ডিত', '12', 'snzisad2@gmail.com', 37, '0', '4_মন ভোলা পন্ডিত.pdf', '4.jpeg', '2018-04-08 01:31:49', '2018-05-28 01:12:30'),
(5, 'আমার সোনার বাংলা আমি তোমায় ভালবাসি', '2', 'snzisad3@gmail.com', 30, '0', '5_আমার সোনার বাংলা আমি তোমায় ভালবাসি.pdf', '5.jpeg', '2018-04-08 01:32:52', '2018-06-01 14:25:52'),
(6, 'পদ্মা নদীর মাঝি', '2', 'snzisad2@gmail.com', 66, '0', '6_পদ্মা নদীর মাঝি.pdf', '6.png', '2018-04-08 01:33:39', '2018-05-10 14:55:04'),
(9, 'KPI David Parmenter', '12', 'snzisad@gmail.com', 12, '0', '9_KPI David Parmenter.pdf', '9.jpeg', '2018-04-17 21:59:04', '2018-05-08 17:55:47'),
(10, 'Performance Appraisal', '13', 'snzisad@gmail.com', 8, '0', '10_Performance Appraisal.pdf', '10.jpeg', '2018-04-17 22:12:57', '2018-05-31 13:49:23'),
(11, 'Performance Management', '13', 'snzisad@gmail.com', 7, '0,2', '11_Performance Management.pdf', '11.jpeg', '2018-04-17 22:26:24', '2018-04-26 16:57:47'),
(12, 'Performance Management', '13', 'snzisad@gmail.com', 5, '0', '12_Performance Management.pdf', '12.jpeg', '2018-04-17 22:31:11', '2018-04-25 04:17:11'),
(13, 'Performance Management', '13', 'snzisad@gmail.com', 13, '0', '13_Performance Management.pdf', '13.jpeg', '2018-04-17 22:33:24', '2018-06-03 05:40:37'),
(14, 'Performance Management', '13', 'snzisad@gmail.com', 15, '0', '14_Performance Management.pdf', '14.jpeg', '2018-04-17 22:48:01', '2018-05-01 05:33:12'),
(15, 'Performance Management', '13', 'snzisad@gmail.com', 13, '0', '15_Performance Management.pdf', '15.jpeg', '2018-04-17 22:49:32', '2018-05-08 17:31:55'),
(16, 'dfsdfs', '3', 'snzisad@gmail.com', 8, '0,5,6,3,2', '16_dfsdfs.pdf', '16.jpeg', '2018-05-11 15:43:00', '2018-06-08 17:06:40'),
(17, 'cxzcxzc', '2', 'snzisad@gmail.com', 0, NULL, '17_cxzcxzc.pdf', '17.jpeg', '2018-06-10 17:04:46', '2018-06-10 17:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `id` int(10) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `root_ID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`id`, `catagory_name`, `root_ID`, `created_at`, `updated_at`) VALUES
(1, 'HR', '0', NULL, NULL),
(2, 'Finance and Accounting', '0', NULL, NULL),
(3, 'Marketing & Sales', '0', NULL, NULL),
(4, 'EEE', '0', NULL, NULL),
(5, 'IT', '0', NULL, NULL),
(6, 'Civil', '0', NULL, NULL),
(7, 'Recruitment & Selection', '0', NULL, NULL),
(8, 'Training & Development', '0', NULL, NULL),
(9, 'Compensation & Benefit', '0', NULL, NULL),
(10, 'Introduction HRM', '0', NULL, NULL),
(11, 'Employee Relationship', '0', NULL, NULL),
(12, 'KPI', '0', NULL, NULL),
(13, 'Performance Management', '0', NULL, NULL),
(14, 'Payroll', '0', NULL, NULL),
(15, 'Leadership', '0', NULL, NULL),
(16, 'Carrer Development', '0', NULL, NULL),
(17, 'CV Writing', '0', NULL, NULL),
(18, 'Communication', '0', '2018-06-07 08:25:38', '2018-06-07 08:25:38'),
(19, 'Journal', '0', '2018-06-07 08:26:10', '2018-06-07 08:26:10'),
(20, 'CSE', '0', '2018-06-07 12:13:18', '2018-06-07 12:13:18'),
(21, 'abal', '0', '2018-06-07 12:26:01', '2018-06-07 12:26:01'),
(22, 'Hello', '0', '2018-06-07 13:35:12', '2018-06-07 13:35:12'),
(23, 'BST', '0', '2018-06-08 15:00:13', '2018-06-08 15:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `corporates`
--

CREATE TABLE `corporates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_hour` int(11) NOT NULL DEFAULT '0',
  `ppt_hour` int(11) NOT NULL DEFAULT '0',
  `video_hour` int(11) NOT NULL DEFAULT '0',
  `course_hour` int(11) NOT NULL DEFAULT '0',
  `training_hour` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corporates`
--

INSERT INTO `corporates` (`id`, `name`, `email`, `address`, `country`, `phone`, `organization`, `book_hour`, `ppt_hour`, `video_hour`, `course_hour`, `training_hour`, `created_at`, `updated_at`) VALUES
(1, 'Test Account', 'test@account.com', 'Chittagong', 'BanglaDesh', '123456', 'Bangla Soft Tech', 0, 0, 0, 0, 0, '2018-06-08 12:13:44', '2018-06-08 12:13:44'),
(24, 'BS Tech', 'bstech@gmail.com', '', '', '0', NULL, 0, 0, 0, 0, 0, '2018-06-08 13:36:24', '2018-06-08 13:36:24');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `course_fee` int(11) NOT NULL DEFAULT '0',
  `catagory_id` int(11) NOT NULL DEFAULT '0',
  `duration_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'days',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_text` text COLLATE utf8mb4_unicode_ci,
  `introduction_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppt_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ppt_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instruction` text COLLATE utf8mb4_unicode_ci,
  `exam_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_view` int(11) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `trainer_description`, `author_email`, `duration`, `course_fee`, `catagory_id`, `duration_type`, `description`, `outcome`, `introduction_text`, `introduction_file`, `book_link`, `book_file`, `ppt_link`, `ppt_file`, `video_link`, `video_file`, `instruction`, `exam_file`, `total_view`, `viewer_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Body found in search for missing woman Jastine Valdez ', 'Sharif Noor Zisad, Chittagong', NULL, 2, 0, 0, 'days', 'The 24-year-old woman was reported missing on Saturday night after she was believed to have been forced into a car on the R760 near Enniskerry in Co Wicklow.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut odio temporibus voluptas error distinctio hic quae corrupti vero doloribus optio! Inventore ex quaerat modi blanditiis soluta maiores illum, ab velit.', 'Zisad', 'Zisad', '', 'use App\\Catagory;', '', 'use App\\Catagory;', '', 'use App\\Catagory;', '', 'Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph.|A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs.|Definition of paragraph. 1 a : a subdivision of a written composition that consists of one or more sentences, deals with one point or gives the words of one speaker, and begins on a new usually indented line. The introductory paragraphs were written by the editor.|', '', 5, ',3,3,3,3,3', '', '2018-05-11 17:13:15', '2018-06-10 16:41:32'),
(2, 'Zisad, Banglasofttech, from Bangladesh', 'Zisad, Banglasofttech, from Bangladesh, Chittagong', NULL, 3, 0, 0, 'days', 'Zisad, Banglasofttech, from Bangladesh, Chittagong', 'Zisad', 'Zisad', '', 'http://google.com|http://fb.com|', '2_Hello_1.pdf|2_Hello_2.pdf|2_Hello_3.pdf|', 'Auth::user()->name|', '2_Hello_1.ppt|2_Hello_2.ppt|', 'Auth::user()->name|', '2_Hello_1.mp4|', 'Paragraphs are the building blocks of papers. Many students define paragraphs in terms of length: a paragraph is a group of at least five sentences, a paragraph is half a page long, etc. In reality, though, the unity and coherence of ideas among sentences is what constitutes a paragraph.|A paragraph is a series of sentences that are organized and coherent, and are all related to a single topic. Almost every piece of writing you do that is longer than a few sentences should be organized into paragraphs.|Definition of paragraph. 1 a : a subdivision of a written composition that consists of one or more sentences, deals with one point or gives the words of one speaker, and begins on a new usually indented line. The introductory paragraphs were written by the editor.|', '2_Hello_question_1.pdf|2_Hello_question_2.pdf|', 3, ',3,3,3', '', '2018-05-11 17:14:18', '2018-06-10 16:23:45'),
(3, 'Journal of Great Lakes Research', 'Devoted to Research on Large Lakes of the World and their Watersheds', 'snzisad@gmail.com', 2, 500, 0, 'days', 'Published six times per year, the Journal of Great Lakes Research is multidisciplinary in its coverage, publishing manuscripts on a wide range of theoretical and applied topics in the natural science fields of biology, chemistry, physics, geology, as well as social sciences of the large lakes of the...', 'Published six times per year, the Journal of Great Lakes Research is multidisciplinary in its coverage, publishing manuscripts on a wide range of theoretical and applied topics in the natural science fields of biology, chemistry, physics, geology, as well as social sciences of the large lakes of the...', 'Published six times per year, the Journal of Great Lakes Research is multidisciplinary in its coverage, publishing manuscripts on a wide range of theoretical and applied topics in the natural science fields of biology, chemistry, physics, geology, as well as social sciences of the large lakes of the...', '', 'hoo.com', '3_Journal of Great Lakes Research_1.pdf|3_Journal of Great Lakes Research_2.pdf|', 'hool.com', '3_Journal of Great Lakes Research_1.ppt|3_Journal of Great Lakes Research_2.ppt|', 'hoo.com', '', 'Published six times per year, the Journal of Great Lakes Research is multidisciplinary in its coverage, publishing manuscripts on a wide range of theoretical and applied topics in the natural science fields of biology, chemistry, physics, geology, as well as social sciences of the large lakes of the...|Published six times per year, the Journal of Great Lakes Research is multidisciplinary in its coverage, publishing manuscripts on a wide range of theoretical and applied topics in the natural science fields of biology, chemistry, physics, geology, as well as social sciences of the large lakes of the...|', '3_Journal of Great Lakes Research_question_1.pdf|3_Journal of Great Lakes Research_question_2.pdf|', 4, '0,3,2', '3_Journal of Great Lakes Research.png', '2018-05-21 14:14:11', '2018-06-10 16:23:30'),
(4, 'dfsdfdsf', 'fgfdg', 'snzisad@gmail.com', 4, 456, 3, 'Hours', 'gdg', 'gdsgds', 'gsdgd', '', 'gdgdsg', '', 'gdsgds', '', 'sdgdsgd', '', 'gsdgd|dgsdgd|', '', 0, NULL, '4_dfsdfdsf.jpeg', '2018-06-10 16:48:48', '2018-06-10 16:48:48'),
(5, 'hgfhfg', 'g', 'snzisad@gmail.com', 4, 42, 5, 'Months', 'adsads', 'dass', 'dasad', '', 'dsadsads', '', 'dadadad', '', 'dasdada', '', 'daa|dada|dada|dadad|', '', 0, NULL, '5_hgfhfg.jpeg', '2018-06-10 16:49:51', '2018-06-10 16:49:51'),
(6, 'sdfdsf', 'dsfdsf', 'snzisad@gmail.com', 2, 34345, 3, 'Year', 'sdfsdf', 'sdfsdf', 'sdfsdf', '', 'gdfgdf', '6_sdfdsf_1.pdf|', 'dfgfdg', '6_sdfdsf_1.ppt|', 'ghfghf', '', 'gfhfgh|fghfghfgh|', '6_sdfdsf_question_1.pdf|', 0, NULL, '6_sdfdsf.jpeg', '2018-06-10 16:52:09', '2018-06-10 16:52:09'),
(7, 'dsfdsfsd', 'dfsdfds', 'snzisad@gmail.com', 3, 3332, 3, 'Months', 'dsfsdfsd', 'sdfsdf', 'dsfsdf', '7_dsfdsfsd_introduction_file.pdf', 'sdfsdf', '7_dsfdsfsd_1.pdf|', 'dsfdsf', '7_dsfdsfsd_1.ppt|', 'dsfdsf', '', '', '7_dsfdsfsd_question_1.pdf|', 0, '0', '7_dsfdsfsd.jpeg', '2018-06-10 16:58:26', '2018-06-10 16:58:26'),
(8, 'dsfdsfsd', 'dfsdfds', 'snzisad@gmail.com', 3, 3332, 3, 'Months', 'dsfsdfsd', 'sdfsdf', 'dsfsdf', '8_dsfdsfsd_introduction_file.pdf', 'sdfsdf', '8_dsfdsfsd_1.pdf|', 'dsfdsf', '8_dsfdsfsd_1.ppt|', 'dsfdsf', '', '', '8_dsfdsfsd_question_1.pdf|', 0, NULL, '8_dsfdsfsd.jpeg', '2018-06-10 16:59:41', '2018-06-10 16:59:41'),
(9, 'dsfdsfsd', 'dfsdfds', 'snzisad@gmail.com', 3, 3332, 3, 'Months', 'dsfsdfsd', 'sdfsdf', 'dsfsdf', '9_dsfdsfsd_introduction_file.pdf', 'sdfsdf', '9_dsfdsfsd_1.pdf|', 'dsfdsf', '9_dsfdsfsd_1.ppt|', 'dsfdsf', '', '', '9_dsfdsfsd_question_1.pdf|', 0, '0', '9_dsfdsfsd.jpeg', '2018-06-10 17:00:33', '2018-06-10 17:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_04_01_201013_test', 1),
(3, '2018_04_07_071942_catagory', 2),
(4, '2018_04_07_200607_book', 3),
(5, '2018_04_07_200653_video', 3),
(6, '2018_04_07_200712_ppt', 3),
(7, '2018_05_11_132732_course', 4),
(8, '2018_06_08_141559_authors', 5),
(9, '2018_06_08_141621_corporates', 5),
(10, '2018_06_08_203040_trainings', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppts`
--

CREATE TABLE `ppts` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` int(255) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppts`
--

INSERT INTO `ppts` (`id`, `file_name`, `catagory_id`, `uploader_email`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Bangla Soft Tech', '3', 'snzisad2@gmail.com', 19, ',3,3', '5_test presentation.ppt', '1.jpeg', '2018-04-08 01:10:34', '2018-06-07 16:02:17'),
(2, 'ISO', '16', 'snzisad@gmail.com', 3, '', '2_ISO.pptx', '2.jpeg', '2018-05-28 21:13:23', '2018-06-07 00:31:16'),
(3, 'ISO', '3', 'snzisad@gmail.com', 2, '', '3_ISO.pptx', '3.jpeg', '2018-06-07 00:35:43', '2018-06-07 00:45:46'),
(4, 'ISO FINANCE', '2', 'snzisad@gmail.com', 0, '', '4_ISO FINANCE.pptx', '4.jpeg', '2018-06-07 00:37:43', '2018-06-07 00:37:43'),
(5, 'ISO IT', '5', 'snzisad@gmail.com', 2, ',3,3', '5_ISO IT.pptx', '5.jpeg', '2018-06-07 00:39:30', '2018-06-07 16:16:45'),
(6, 'ISO MKT', '3', 'snzisad@gmail.com', 0, '', '6_ISO MKT.pptx', '6.jpeg', '2018-06-07 00:43:35', '2018-06-07 00:43:35'),
(7, 'ঘগফহগফ', '7', 'snzisad@gmail.com', 0, '', '7_ঘগফহগফ.pptx', '7.jpeg', '2018-06-07 14:02:08', '2018-06-07 14:02:09'),
(8, 'দফফদ্গদফ', '6', 'snzisad@gmail.com', 0, '', '8_দফফদ্গদফ.pptx', '8.jpeg', '2018-06-07 14:06:59', '2018-06-07 14:06:59'),
(9, 'ফদ্গদফগ', '7', 'snzisad@gmail.com', 0, '', '9_ফদ্গদফগ.pptx', '9.jpeg', '2018-06-07 14:08:11', '2018-06-07 14:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL DEFAULT '0',
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` int(11) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `description`, `uploader_email`, `fee`, `catagory_id`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'dfsdfdsf', 'সাদসাদ', 'snzisad@gmail.com', 2, '6', 0, NULL, 'C:\\server\\temp\\php783F.tmp', 'C:\\server\\temp\\php784F.tmp', '2018-06-08 16:11:14', '2018-06-08 16:11:14'),
(3, 'dfsdfdsf', 'সাদসাদ', 'snzisad@gmail.com', 2, '6', 0, NULL, 'C:\\server\\temp\\php49C2.tmp', 'C:\\server\\temp\\php49D2.tmp', '2018-06-08 16:14:18', '2018-06-08 16:14:18'),
(4, 'dfsdfdsf', 'sdfsdfs', 'snzisad@gmail.com', 1, '5', 0, NULL, 'C:\\server\\temp\\php5335.tmp', 'C:\\server\\temp\\php5336.tmp', '2018-06-08 16:15:26', '2018-06-08 16:15:26'),
(5, 'dfsdfdsf', 'dsfsdf', 'snzisad@gmail.com', 3, '7', 0, NULL, 'C:\\server\\temp\\php75DD.tmp', 'C:\\server\\temp\\php75DE.tmp', '2018-06-08 16:16:40', '2018-06-08 16:16:40'),
(6, 'dfsdfdsf', 'gdfgfd', 'snzisad@gmail.com', 2, '5', 0, NULL, 'C:\\server\\temp\\php6149.tmp', 'C:\\server\\temp\\php6159.tmp', '2018-06-08 16:17:41', '2018-06-08 16:17:41'),
(7, 'dfsdfdsf', 'gdfgfd', 'snzisad@gmail.com', 2, '5', 0, NULL, '.mp4', '.jpeg', '2018-06-08 16:18:12', '2018-06-08 16:18:12'),
(8, 'dfsdfdsf', 'gdfgfd', 'snzisad@gmail.com', 2, '5', 0, NULL, '.mp4', '.jpeg', '2018-06-08 16:18:23', '2018-06-08 16:18:23'),
(9, 'dfsdfdsf', 'gdfgfd', 'snzisad@gmail.com', 2, '5', 0, NULL, '9_dfsdfdsf.mp4', '9_dfsdfdsf.jpeg', '2018-06-08 16:19:14', '2018-06-08 16:19:14'),
(10, 'dfsdfdsf', 'sadsad', 'snzisad@gmail.com', 3, '3', 0, NULL, '10_dfsdfdsf.mp4', '10_dfsdfdsf.jpeg', '2018-06-08 16:38:21', '2018-06-08 16:38:22'),
(11, 'dfsdfdsf', 'hgjgh', 'snzisad@gmail.com', 2, '4', 0, NULL, '11_dfsdfdsf.mp4', '11_dfsdfdsf.jpeg', '2018-06-08 16:41:20', '2018-06-08 16:41:20'),
(12, 'hgfhfg', 'sdfsdf', 'snzisad@gmail.com', 4534, '1', 0, NULL, '12_hgfhfg.mp4', '12_hgfhfg.jpeg', '2018-06-08 16:42:49', '2018-06-08 16:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `others` text COLLATE utf8mb4_unicode_ci,
  `user_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general_user',
  `request` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `country`, `occupation`, `organization`, `others`, `user_type`, `request`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'SN', 'Zisad', 'snzisad2@gmail.com', '', '1867301260', '', 'Student', 'University Of Chittagong', 'Student|Zisad|', 'author', '0', '$2y$10$vzsOjfF/kEfPTrfpmrWlv.27VqSwROoYJGNpvyd5BBKh5COviUNYa', 'UIrSjYSoqWCmOI9tH6I9uR1nbPfGSmwKmIQ8djKbKA2VzX1Oq23uj02g8UCN', '2018-04-05 08:41:19', '2018-06-11 18:19:55'),
(3, 'Sharif Noor', 'Zisad', 'snzisad@gmail.com', '', '0', '', NULL, NULL, NULL, 'admin', '0', '$2y$10$lAkYoIlRXxYC/S4wWwUagepUbPSDxf9Z3q2eBsR4FuXT5hXgrqRSK', 'uRNvXsQK5k1HXNfSxjtmEXGelD3cBfPYimcLpgeHKNVhsUnfE6976E5pb5OR', '2018-04-05 08:41:44', '2018-04-17 12:29:26'),
(5, 'Arif', 'Hossain', 'arif@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', 'author', '$2y$10$0oazJnoQ2agISc8WT2jj6.K44EJzZWBSDsg6Y56eZ2tG6qrqUpvhG', 'qXWSc587exBVIoFjHaasNmJvGuRw5t8eknA3BVL9IAP8m2ShZYXEkPiCLdzp', '2018-04-15 10:54:29', '2018-04-17 12:29:32'),
(6, 'Arif', 'Reza', 'arifbo@gmail.com', '', '0', '', NULL, NULL, NULL, 'author', '0', '$2y$10$uyPGJ0eQtactzgZnp6R3x.q/UuUak8DtD9vOJHjIjt4NgSTQpbANW', '5Y8aekZHrCntu8AGxTCQUNa3wWL0tetUR1J56UC7sOR8b4zqtl6i8Bcs5RIU', '2018-04-15 10:55:12', '2018-06-08 12:38:01'),
(7, 'Saima', 'Sultana', 'ss@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', '0', '$2y$10$WqiNkoWYCRjCB1y9nMz7EO5lHioLUShrmaX4HeABlnDu5GojBjvpS', 'wMB3JnSly546chOjjW7rJcMZEbG6RRx0oUdeP4H7LndHytMKfOTbI2NFe3wV', '2018-04-15 10:56:38', '2018-04-17 12:28:28'),
(8, 'Saima', 'Sultana', 'ssultana@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', '0', '$2y$10$m1Vx/DAiyKDPVwgkh3LaTOIBM2lhiusAKBWNltV5qTrb7VGYrhAKe', 'pRFNmE3h7QnIc8F2kvZwcjO6ErRxAzK3SktulZTWThzGt29eLnAiGIigEaWk', '2018-04-15 10:58:46', '2018-04-17 12:28:31'),
(9, 'BS', 'Tech', 'bstech@gmail.com', '', '0', '', NULL, NULL, NULL, 'learner', '1', '$2y$10$1OTEd7bIer6JmuBC24vdsOFokDpUEmAv/yOBwLP0VTxwZEUHk5TOO', '6sRDXpRbIipFbGNvWGRdI7yNFkeI1UjOwgen3j9JwKTp6JvbNpEQbbkw4AXM', '2018-04-15 11:00:00', '2018-06-08 13:39:43'),
(22, 'dsfsdf', 'dsfsdf', 'sdfsdfsdfsd@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', '1', '$2y$10$SK5.pYJgwXNY.4TZUJ2fQO2uTX1bbQScUmyZCZkNljZJzTiFSOvKa', 'umZWBJeH0PSA7IbeNiBledejLDsKH7arnHvg9AjMyWkbG4mzJ6YFmcggZ150', '2018-04-15 14:21:12', '2018-04-15 14:21:12'),
(23, 'Admin', 'Assistacademy', 'admin@assistacademy.org', '', '0', '', NULL, NULL, NULL, 'admin', '0', '$2y$10$EHM3W94VF5gcEIxoctdJoeJLIFNjINFXFe19fCB5GbF71VI9ifMfC', 'Lm5fgp1xiObrSrPl2JNj0G7PDCaVvotku6PSFIVJiw2XVKu505Cm9AYO7B9j', '2018-04-17 12:26:24', '2018-04-17 12:26:24'),
(24, 'Md. Robiul', 'Islam', 'robi.cse07@gmail.com', '', '0', '', 'Corporate Manager', 'Banglasofttech', NULL, 'general_user', '0', '$2y$10$vvQ2TX6VARtYlp8W74S2fuur5zSosROsxU3tflAshnVd3TGxTey16', 'lRdOhbLLPanzzktVhtxYGpdfnDNp0yXNO8HP7y3mdbSXh9ptDPojFL8IBlw0', '2018-04-17 12:46:04', '2018-06-08 14:09:23'),
(25, 'robiul', 'Islam', 'robi1@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', '0', '$2y$10$4kPmxQlAQws7oVAADJ9TrOnaaFSsswuF3g.ifU.S5MouVqPqW6usi', 'uDqiEg3j3kYtWrBcqZVymaiDRdomgSgWxwCu6djdnalY3eJU2SqxluVtw5XC', '2018-04-17 23:14:03', '2018-06-08 13:41:22'),
(26, 'Robi', 'Islam', 'robi123@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', '0', '$2y$10$Yy8wRHHFPaKF.7GFp6JiW.3Akxdh/m3jpA.Th1Y2UR4WXCi6vLO4i', 'pHSaDTqg7clSfX5MliR03Y6ooqel2fBQnyfGufJtm4wLdRgzXHDXV2yQgXrr', '2018-04-27 07:55:45', '2018-06-08 13:40:22'),
(27, 'Syed Salman', 'Rahman', 'insignia.intl.ltd@gmail.com', '', '0', '', NULL, NULL, NULL, 'corporate', '1', '$2y$10$SSxl6ReJA.jm6VfX/ASI7uyA5CRbl//Y3zIphl/QhDhqdnJ8idPUm', NULL, '2018-04-29 02:45:01', '2018-04-29 02:45:01'),
(28, 'saima', 'sultana', 'saimualoo@gmail.com', '', '0', '', NULL, NULL, NULL, 'corporate', '0', '$2y$10$vTO4ClmSp.Pn8UeGK9wKt.o6zjqSnoavJEYK1R3DpdgDL2.OWYNO6', NULL, '2018-05-01 02:57:19', '2018-05-01 02:57:19'),
(29, 'KAISER', 'Hamid', 'kaiser.hr00@yahoo.com', '', '0', '', NULL, NULL, NULL, 'corporate', '1', '$2y$10$G.xydOf1sHynYvRFv0B2h.7lgh/BNL60RLiM8/Gv.cvmG.pT0W2NC', NULL, '2018-05-01 05:31:47', '2018-06-08 11:23:05'),
(30, 'Sn', 'Zisad', 'snzisad3@gmail.com', '', '0', '', NULL, NULL, NULL, 'general_user', '0', '$2y$10$LCQZFxs6LbNb5vEpnnn1Qel.vFqcWv.Wg8xUKFNTUTObWE4hMem62', 'ffDTqVHT6FsV1CggN8WdMF1EYEC56271bWelZkxP3yxb8nAHZrKspwTcBC7M', '2018-05-10 11:31:19', '2018-06-08 11:59:14'),
(31, 'Test', 'Account', 'testaccc@gmail.com', NULL, '0', NULL, NULL, NULL, NULL, 'corporate', '1', '$2y$10$czPl/aUPXuDT4Jh05q1ND.cAoy30Ku1Q2uM.iY03yffYAM0zqKT02', 'utr119yUs7w4i5Q2jDe1EniIQzipbVV0lLUrk3k0It9rbxCrO0xiab67wux6', '2018-05-11 17:44:55', '2018-05-11 17:44:55'),
(32, 'First', 'Corporate', 'corporate@gmail.com', NULL, '0', NULL, NULL, NULL, NULL, 'general_user', '0', '$2y$10$Z0.Heef5gMgPS7sEkXbh3OALW6u2.NQpIIthPyFp2PD8frKx.psmG', 'G4VipgyRVXS5B3B87y0BiFoA2nUw32SrylCVb5Um7R5UiNL6f83z6Kow5Kvl', '2018-05-11 17:46:54', '2018-06-08 11:11:34'),
(33, 'Test', 'Account', 'test@account.com', 'Chittagong', '123456', 'BanglaDesh', NULL, 'Bangla Soft Tech', NULL, 'learner', '1', '$2y$10$wmOfKfQgqZGCj3NV6777dO7ietjVp6yEBEdfNLOfD51m7qPeaISWy', NULL, '2018-05-11 17:52:42', '2018-06-08 12:15:07'),
(34, 'hamid', 'kaiser', 'hamid@gmail.com', 'uttara', '1672420600', 'Bangladesh', NULL, NULL, NULL, 'corporate', '1', '$2y$10$l58lri2pE3I24Eefp/ixVeJPw7QyPonV7zuWBXEUQ7WYl8CN98OSC', 'AxIvmUhFQbPoWzVvFUyUEFlwUnxWjy8IWEomSM8RUQlol2Wxhjzy1hOpmXGi', '2018-05-30 22:18:39', '2018-06-08 11:12:48'),
(35, 'SN', 'Zisad', 'testemail@gmail.com', '6775765', '018884552', 'Bangladesh', NULL, 'BSTech', NULL, 'author', '1', '$2y$10$P/ye5QkAfJa192Aa9HBXvuOlkV68ZS6qkkpCpqi1k77xpCoAB2bgm', 'nwAT3tb3ot6gEehJwHE5jjeY9DYzjdpPOEcimDUeODMZTfK4VM4mrqE6NWgB', '2018-06-11 14:20:19', '2018-06-11 14:20:19'),
(36, 'dsadsad', 'sadsad', 'abcd@gmail.com', 'asdsad', 'sadsad', 'Antigua and Barbuda', NULL, NULL, NULL, 'corporate', '1', '$2y$10$AUvZrPBy7Kxba/6/7htMUOe/IaAEBV0jJLidK6cQYHOIu8nj4COMK', 'xVXVJ8lEqHIjscO3HOxgwkIMPE2mcl9yTCBLayPzZpOxO3rFvXcrYHGhwV12', '2018-06-11 14:57:38', '2018-06-11 14:57:38'),
(37, 'MR', 'Zisad', 'snzisad@gmail.com', 'fsdfdsf', '231351', 'Austria', NULL, 'BSTech', NULL, 'corporate', '1', '$2y$10$VLXISq/7LHO0v0K0XGjmLu36nhg6uKaKyKrwDgxrE6Pxkc31hknm.', 'aEToOWEPqL0onzjgmj7JRm4onL00EdORJWXQnk77eIP9bAPdwOoi7LZWYprP', '2018-06-11 15:07:35', '2018-06-11 15:07:35'),
(38, 'MR', 'Zisad', 'snzisad@gmail.com', 'fsdfdsf', '231351', 'Anguilla', NULL, 'snzisad@gmail.com', NULL, 'corporate', '1', '$2y$10$NjNRvcttqxRWE9JxhxebeuLfONsYYa0AQwUN4hYBNBJdCh29W3ly.', 'I4ITY51Bl9yuTt2oNsFRvpyi691J0KdNAKSYc1od5WqxVGGxUHJapAiaaPUh', '2018-06-11 15:08:40', '2018-06-11 15:08:40'),
(39, 'asdasdas', 'sadsadasd', 'snzisad444@gmail.com', 'dfsdf', '546494', 'Antigua and Barbuda', NULL, 'dsfdsfsdf', NULL, 'author', '1', '$2y$10$cSKbtTZ3dcCfR8sXfE69duYQvxkDrhEZLqBWvz0sVJH8U3vtpyJ6q', 'Vy2BjcS9NOqygcZxdvd4hFu5svITCrF6zO05hqd4ZZM9KYUDYS5HfXsM2AhL', '2018-06-11 16:23:32', '2018-06-11 16:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Fee` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free',
  `total_view` int(255) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `file_name`, `catagory_id`, `uploader_email`, `Fee`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(12, 'test video', '3', 'snzisad@gmail.com', 'Free', 36, '0,3', '12_test video.mp4', '12.png', '2018-04-17 14:23:29', '2018-06-08 17:09:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `email_3` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corporates`
--
ALTER TABLE `corporates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `ppts`
--
ALTER TABLE `ppts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `corporates`
--
ALTER TABLE `corporates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `ppts`
--
ALTER TABLE `ppts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
