-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 17, 2018 at 11:20 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

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
  `pp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `address`, `country`, `phone`, `occupation`, `organization`, `pp`, `created_at`, `updated_at`) VALUES
(1, 'SN Zisad', 'snzisad2@gmail.com', 'CTG', 'Afghanistan', '012233', 'STudent', 'CU', 'snzisad2@gmail.com.png', '2018-07-20 13:52:27', '2018-07-20 13:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` int(11) NOT NULL DEFAULT '1',
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

INSERT INTO `books` (`id`, `file_name`, `catagory_id`, `uploader_email`, `request`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'How to stream on twitch update', '3', 'snzisad2@gmail.com', 0, 35, ',48,49,48', '1_Introduction to Robotics: Mechanics and Control.pdf', '1.jpeg', '2018-07-20 14:01:27', '2018-08-17 16:22:05'),
(3, 'Introduction to Robotics: Mechanics and Control', '25', 'snzisad2@gmail.com', 1, 35, ',48,49,48', '1_Introduction to Robotics: Mechanics and Control.pdf', '1.jpeg', '2018-07-20 14:01:27', '2018-08-17 13:41:21');

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
(20, 'CSE', '0', '2018-06-07 12:13:18', '2018-06-07 12:13:18'),
(24, 'Social Science', '0', '2018-06-13 08:23:25', '2018-06-13 08:23:25'),
(25, 'Robotics', '0', '2018-07-20 13:57:23', '2018-07-20 13:57:23'),
(26, 'Zisad', '0', '2018-08-17 15:50:49', '2018-08-17 15:50:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `user_id`, `comment`, `type`, `created_at`, `updated_at`) VALUES
(1, '13', '49', 'Is there anyone?', 'training', '2018-08-16 15:22:06', '2018-08-16 15:22:06'),
(2, '13', '54', 'This is Zisad', 'training', '2018-08-16 15:26:13', '2018-08-16 15:26:13'),
(3, '13', '56', 'Zisad', 'training', '2018-08-16 15:26:46', '2018-08-16 15:26:46'),
(4, '1', '49', 'Hello', 'course', '2018-08-16 16:22:22', '2018-08-16 16:22:22'),
(5, '1', '49', 'This is Zisad', 'course', '2018-08-16 16:22:30', '2018-08-16 16:22:30');

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
(1, 'SN Zisad', 'snzisad4@gmail.com', 'CTG', 'Bangladesh', '012233', 'CU', 0, 0, 0, 0, 0, '2018-07-20 13:52:46', '2018-07-20 13:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trainer_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `course_fee` int(11) NOT NULL DEFAULT '0',
  `catagory_id` int(11) NOT NULL DEFAULT '0',
  `duration_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'days',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_text` text COLLATE utf8mb4_unicode_ci,
  `introduction_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_link` text COLLATE utf8mb4_unicode_ci,
  `book_file` text COLLATE utf8mb4_unicode_ci,
  `ppt_link` text COLLATE utf8mb4_unicode_ci,
  `ppt_file` text COLLATE utf8mb4_unicode_ci,
  `video_link` text COLLATE utf8mb4_unicode_ci,
  `video_file` text COLLATE utf8mb4_unicode_ci,
  `instruction` text COLLATE utf8mb4_unicode_ci,
  `exam_file` text COLLATE utf8mb4_unicode_ci,
  `request` int(11) NOT NULL DEFAULT '1',
  `total_view` int(11) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `title`, `trainer_description`, `author_email`, `duration`, `course_fee`, `catagory_id`, `duration_type`, `description`, `outcome`, `introduction_text`, `introduction_file`, `book_link`, `book_file`, `ppt_link`, `ppt_file`, `video_link`, `video_file`, `instruction`, `exam_file`, `request`, `total_view`, `viewer_id`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'The history of comma: from beginning to end in the history of mobile and technology in android and twitter', 'This is Zisad from Bangladesh a BSc Engineer on Computer Science and Engineering', 'snzisad2@gmail.com', 3, 0, 4, 'Days', 'The comma is used in many contexts and languages, mainly for separating parts of a sentence such as clauses, and items in lists, particularly when there are three or more items listed. The word comma comes from the Greek κόμμα (kómma), which originally meant a cut-off piece; specifically, in grammar, a short clause', 'Learning about comma, History of comma, how to use a comma', 'A comma-shaped mark is used as a diacritic in several writing systems, and is considered distinct from the cedilla. The rough and smooth breathings (ἁ, ἀ) appear above the letter in Ancient Greek, and the comma diacritic appears below the letter in Latvian, Romanian, and Livonian.', '1_The history of comma: from beginning to end_introduction_file.mp4', 'https://en.wikipedia.org/wiki/Comma, https://www.google.com/search?q=comma&oq=comma&aqs=chrome.0.69i59j69i57j69i60l3.743j0j7&sourceid=chrome&ie=UTF-8, https://search.yahoo.com/search?p=comma&fr=yfp-t&fp=1&toggle=1&cop=mss&ei=UTF-8', 'Assignment on Curriculum Vitae aymon.pdf|EXCEL ASSIGNMENT2PART original.pdf|', 'https://en.wikipedia.org/wiki/Comma, https://www.google.com/search?q=comma&oq=comma&aqs=chrome.0.69i59j69i57j69i60l3.743j0j7&sourceid=chrome&ie=UTF-8, https://search.yahoo.com/search?p=comma&fr=yfp-t&fp=1&toggle=1&cop=mss&ei=UTF-8', 'Lec1 = Introduction To Software Engineering.ppt|Lec2 = Software Processes.ppt|', 'https://en.wikipedia.org/wiki/Comma, https://www.google.com/search?q=comma&oq=comma&aqs=chrome.0.69i59j69i57j69i60l3.743j0j7&sourceid=chrome&ie=UTF-8, https://search.yahoo.com/search?p=comma&fr=yfp-t&fp=1&toggle=1&cop=mss&ei=UTF-8', '3 Dense and Sparse Indexing.mp4|B+ Tree Basics 1.mp4|', 'When a date is written as a month followed by a day followed by a year, a comma separates the day from the year: December 19, 1941. This style is common in American English. The comma is used to avoid confusing consecutive numbers: December 19 1941. Most style manuals, including The Chicago Manual of Style[13] and the AP Stylebook,[14] also recommend that the year be treated as a parenthetical, requiring a second comma after it: \"Feb. 14, 1987, was the target date.\"|Commas are used to separate parts of geographical references, such as city and state (Dallas, Texas) or city and country (Kampala, Uganda). Additionally, most style manuals, including The Chicago Manual of Style[16] and the AP Stylebook,[17] recommend that the second element be treated as a parenthetical, requiring a second comma after: \"The plane landed in Kampala, Uganda, that evening.\"|In representing large numbers, from the right side to the left, English texts usually use commas to separate each group of three digits in front of the decimal. This is almost always done for numbers of six or more digits and often for five or four digits but not in front of the number itself. However, in much of Europe, Southern Africa and Latin America, periods or spaces are used instead; the comma is used as a decimal separator, equivalent to the use in English of the decimal point. In India, the groups are two digits, except for the rightmost group. In some styles, the comma may not be used for this purpose at all (e.g. in the SI writing style[21]); a space may be used to separate groups of three digits instead.|', 'shahin.pdf|', 0, 290, '0,49,48,51,55,57,58', '1_The history of comma: from beginning to end.jpeg', '2018-07-20 14:28:22', '2018-08-17 16:41:47');

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
(1, '2018_08_16_115535_rating', 1),
(2, '2018_08_16_115549_comment', 1);

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
  `request` int(11) DEFAULT '1',
  `total_view` int(255) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ppts`
--

INSERT INTO `ppts` (`id`, `file_name`, `catagory_id`, `uploader_email`, `request`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'How to stream on twitch', '8', 'snzisad2@gmail.com', 0, 26, '0,49,48,51,55,57,58', '1_how to stream on twitch.ppt', '1.jpeg', '2018-07-20 14:05:25', '2018-08-17 16:25:10'),
(3, 'How to stream on twitch', '8', 'snzisad2@gmail.com', 1, 27, '0,49,48,51,55,57,58', '1_how to stream on twitch.ppt', '1.jpeg', '2018-07-20 14:05:25', '2018-08-17 14:00:07'),
(4, 'How to stream on twitch', '8', 'snzisad2@gmail.com', 1, 26, '0,49,48,51,55,57,58', '1_how to stream on twitch.ppt', '1.jpeg', '2018-07-20 14:05:25', '2018-08-16 18:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(255) DEFAULT '0',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `content_id`, `user_id`, `rating`, `comment`, `type`, `created_at`, `updated_at`) VALUES
(10, '13', '48', 1, 'Hello', 'training', '2018-08-16 06:24:47', '2018-08-16 06:24:47'),
(11, '13', '48', 5, 'Hello', 'course', '2018-08-16 06:24:47', '2018-08-16 06:24:47'),
(12, '13', '57', 4, 'Hello', 'training', '2018-08-16 13:54:56', '2018-08-16 13:54:56'),
(13, '13', '54', 1, 'Submitted', 'training', '2018-08-16 13:55:17', '2018-08-16 13:55:17'),
(14, '13', '56', 3, 'Hello', 'training', '2018-08-16 13:57:44', '2018-08-16 13:57:44'),
(15, '13', '56', 3, 'Great', 'training', '2018-08-16 14:00:17', '2018-08-16 14:00:17'),
(16, '13', '55', 2, 'Success', 'training', '2018-08-16 14:00:56', '2018-08-16 14:00:56'),
(17, '13', '49', 5, 'Hi', 'training', '2018-08-16 14:01:33', '2018-08-16 14:01:33'),
(18, '13', '49', 3, 'Hello', 'training', '2018-08-16 15:24:38', '2018-08-16 15:24:38'),
(19, '1', '49', 3, 'Very Good', 'course', '2018-08-16 16:24:46', '2018-08-16 16:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL DEFAULT '0',
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_view` int(11) NOT NULL DEFAULT '0',
  `viewer_id` text COLLATE utf8mb4_unicode_ci,
  `trainer_description` text COLLATE utf8mb4_unicode_ci,
  `duration` int(11) NOT NULL,
  `duration_type` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction_file` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_rating` float NOT NULL DEFAULT '0',
  `video_file` text COLLATE utf8mb4_unicode_ci,
  `ppt_file` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `uploader_email`, `fee`, `catagory_id`, `total_view`, `viewer_id`, `trainer_description`, `duration`, `duration_type`, `objective`, `introduction_text`, `introduction_file`, `avg_rating`, `video_file`, `ppt_file`, `thumbnail`, `request`, `created_at`, `updated_at`) VALUES
(13, 'Web results Find The Best Popular Courses in 2018 - Choose by 3 200 Courses', 'snzisad@gmail.com', 43534, '8', 351, '0,48,49', 'hjhgj', 55, 'Year', 'fdgdfg', 'fdgfdg', '13_Web results Find The Best Popular Courses in 2018 - Choose by 3 200 Courses.jpeg_introduction_file.pdf', 0, '', '282529104.ppt|', '13_Web results Find The Best Popular Courses in 2018 - Choose by 3 200 Courses.jpeg', 0, '2018-08-14 13:49:47', '2018-08-17 14:12:53'),
(16, 'Web results Find The Best Popular Courses in 2018 - Choose by 3 200 Courses', 'snzisad@gmail.com', 43534, '8', 351, '0,48,49', 'hjhgj', 55, 'Year', 'fdgdfg', 'fdgfdg', '13_Web results Find The Best Popular Courses in 2018 - Choose by 3 200 Courses.jpeg_introduction_file.pdf', 1, '', '282529104.ppt|', '13_Web results Find The Best Popular Courses in 2018 - Choose by 3 200 Courses.jpeg', 1, '2018-08-14 13:49:47', '2018-08-17 14:08:26');

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
  `user_type` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'general_user',
  `request` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pp` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `country`, `occupation`, `organization`, `user_type`, `request`, `password`, `pp`, `remember_token`, `created_at`, `updated_at`) VALUES
(48, 'Sharif Noor', 'Zisad', 'snzisad@gmail.com', 'Chittagong', '112233', 'Bangladesh', 'Software Engineer', 'Bangla Soft Tech', 'admin', '0', '$2y$10$TR6V.Yj.RbrjL/Meh1aII.y/9YjWRPlmvcsJWJ6o2G/emADMUZBw2', 'snzisad@gmail.com.jpeg', 'Bshazp3eAzdhlHJN4pR9BH84Vyv39PyU1ZipXTiBuHla9FZOFZUfnFPEiPoi', '2018-07-20 13:44:04', '2018-07-20 13:44:04'),
(49, 'SN', 'Zisad', 'snzisad2@gmail.com', 'CTG', '012233', 'Afghanistan', 'STudent', 'CU', 'author', '0', '$2y$10$lmXI8xVBBEgRXcrKlSIhe.6I4pLglSHh4K1/YV4nTgMPCtIhYIgna', 'snzisad2@gmail.com.png', 'nYLv4VJCcprIowLYQF6vMTX7yfKY8TOAdOD2Poy14qX5oprpnaNBrYrE7eBt', '2018-07-20 13:45:54', '2018-07-20 13:52:27'),
(50, 'SN', 'Zisad', 'snzisad3@gmail.com', 'CTG', '012233', 'Bangladesh', 'STudent', 'CU', 'learner', '0', '$2y$10$T3K8Q4IzEHaEBm3FKkCbxO5oKvnh5JlZcNLwYNCTQZ.8UFV7Clxn2', '', 'IkOnS18Swel3bNwoVWwJEuzrsHaR3v8tKPpxegoJMjlzeqODzhz95OdhOjOB', '2018-07-20 13:47:02', '2018-07-20 23:41:17'),
(51, 'SN', 'Zisad', 'snzisad4@gmail.com', 'CTG', '012233', 'Bangladesh', 'STudent', 'CU', 'corporate', '0', '$2y$10$0fzxiNKDFqVSPH9DXw7jI.p22b3w1IZ56Zs0hhc3pKRJTUHb0bTK2', '', 'MBm36DC868DlkYOrqpuqxTHrhw1QyuhHYHXNWfqd8Kv4m3POf3Dqkf86lLKS', '2018-07-20 13:48:29', '2018-07-20 13:52:46'),
(52, 'SN', 'Zisad', 'snzisad5@gmail.com', 'CTG', '012233', 'Afghanistan', 'STudent', 'CU', 'general_user', 'author', '$2y$10$JABZnyq7RLM39jY.fS89FuRCWb7.7FkOjsx1UKOUhoE2X/Ef8h45.', 'snzisad5@gmail.com.jpeg', '5SfEFsnCpykI0dPdKUpMSqBysOe6eIrRXuOkCuabzIBn9xf33ZNPAWh87BKN', '2018-07-20 13:49:25', '2018-07-20 23:39:55'),
(53, 'SN', 'Zisad', 'snzisad6@gmail.com', 'CTG', '012233', 'Afghanistan', 'STudent', 'CU', 'general_user', 'corporate', '$2y$10$kjUdcfaM/f2rr6o1XvA6vuwUt6zhnc8ZkHoDvPCINMDfWolqhSt2i', '', 'sFbpf79WU1XBkaAmBKHc6WfO9BIKd4n76gF1SF8MjNcWBX9tbvufdhutLBtS', '2018-07-20 13:50:30', '2018-07-20 23:40:10'),
(54, 'SN', 'Zisad', 'snzisad7@gmail.com', 'CTG', '012233', 'Afghanistan', 'STudent', 'CU', 'general_user', 'learner', '$2y$10$G58NDc/MsM9/ip3izuPn1OQJC96T6cyLoNEFvD68P/0N0q2Es6dna', '', 'wTeD8Lr0G2K8UfLVErMw3ltTGceHgdqBMEXO4MxcJjs5dwr2DBAco9vhNv1y', '2018-07-20 13:51:23', '2018-07-20 23:40:03'),
(55, 'kaiser', 'hamid', 'kaiser@gamil.com', 'dhaka', '0000', 'Bangladesh', NULL, NULL, 'general_user', 'learner', '$2y$10$whN8ZlNk76.T8sY/SV2R7OJmzZAkh0Yhp0maoz3zyrj3iLh4YlmYe', '', '13f6Ko4Wz7ya0ntKG5GZbSZj9d72AMZGE6F0htUGVjMfAF5JtS5FlW26Q76W', '2018-07-21 03:15:46', '2018-07-21 03:15:46'),
(56, 'Morshed', 'alam', 'morshed@gmail.com', 'dhaka', '01672420600', 'Bangladesh', 'job', 'assist', 'general_user', 'author', '$2y$10$QPp1JVtfqRB6.4s6HEGa6us7w3HxpitXzP8eBimxn9j9ZKlNanFEy', 'morshed@gmail.com.jpeg', 'sc2KOFcCVjCBoHd8TfOu6kzBmockcjEOlKD4xF9IoXGVmR9VIbGHod3xkExf', '2018-07-21 04:25:01', '2018-07-21 04:25:01'),
(57, 'Robi', 'Islam', 'robi.cse07@gmail.com', 'Chittagong', '+8801722341962', 'Bangladesh', 'Govt. Job', 'MOPME', 'general_user', 'author', '$2y$10$aKHu7CvocOcArcBfAaPqkOZG0r/r3YgYtinKJ5C/Mw5Mi6ppg6MMe', 'robi.cse07@gmail.com.jpeg', 'ZZRQvAyAfULafTax6r6RUFmWERCoAzZYELhFd8o4QYaHRY6repp1LpZJvRwT', '2018-07-21 07:45:42', '2018-07-21 07:45:42'),
(58, 'assist', 'academy', 'assist@gmail.com', 'uttara', '000000000', 'Bangladesh', 'Trainer', 'Assist', 'general_user', 'author', '$2y$10$By8e8rAnOcUKXutgsteIv.FlJwAkMkm8fUyBoemrZ6AttpJjFnwmu', 'assist@gmail.com.jpeg', 'APmmaUrG6EtO1833LsQfCVMkg0SGff6O9TOTNXKlykhyWPOhKFhrXelklJoE', '2018-07-21 23:54:02', '2018-07-21 23:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catagory_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploader_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request` int(11) NOT NULL DEFAULT '1',
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

INSERT INTO `videos` (`id`, `file_name`, `catagory_id`, `uploader_email`, `request`, `total_view`, `viewer_id`, `file`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'How to fix failed to open stream jhgjhg', '13', 'snzisad2@gmail.com', 0, 10, '0,49,48,51,57', '1_How to fix failed to open stream.mp4', '1.jpeg', '2018-07-20 14:04:00', '2018-08-17 16:39:45'),
(3, 'How to fix failed to open stream', '3', 'snzisad2@gmail.com', 1, 9, '0,49,48,51,57', '1_How to fix failed to open stream.mp4', '1.jpeg', '2018-07-20 14:04:00', '2018-07-21 07:46:47'),
(4, 'HELLO! - Daily royal, celebrity, fashion, beauty & lifestyle news', '3', 'snzisad2@gmail.com', 1, 9, '0,49,57', '2_HELLO! - Daily royal, celebrity, fashion, beauty & lifestyle news.mp4', '2.jpeg', '2018-07-21 03:34:31', '2018-08-16 18:25:06');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `corporates`
--
ALTER TABLE `corporates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ppts`
--
ALTER TABLE `ppts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
