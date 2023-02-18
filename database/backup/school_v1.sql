-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 05:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_employee_salaries`
--

CREATE TABLE `account_employee_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = user_id',
  `date` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_employee_salaries`
--

INSERT INTO `account_employee_salaries` (`id`, `employee_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 8, '2022-02', 30000, '2022-02-05 23:19:28', '2022-02-05 23:19:28'),
(2, 9, '2022-02', 25000, '2022-02-05 23:19:28', '2022-02-05 23:19:28'),
(3, 8, '2022-01', 30000, '2022-02-05 23:20:54', '2022-02-05 23:20:54'),
(4, 9, '2022-01', 25000, '2022-02-05 23:20:54', '2022-02-05 23:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `account_student_fees`
--

CREATE TABLE `account_student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_student_fees`
--

INSERT INTO `account_student_fees` (`id`, `year_id`, `class_id`, `shift_id`, `section_id`, `student_id`, `fee_category_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 8, 1, NULL, 2, 10, 1, '2022-02', 600, '2022-02-05 13:58:17', '2022-02-05 13:58:17'),
(2, 8, 10, NULL, 2, 6, 1, '2022-02', 2250, '2022-02-05 13:59:58', '2022-02-05 13:59:58'),
(3, 8, 1, NULL, 2, 10, 2, '2022-02', 1000, '2022-02-05 23:21:47', '2022-02-05 23:21:47'),
(4, 8, 1, NULL, 2, 11, 2, '2022-02', 1000, '2022-02-05 23:21:47', '2022-02-05 23:21:47'),
(6, 8, 10, NULL, 2, 6, 2, '2022-11', 2880, '2022-11-23 02:47:19', '2022-11-23 02:47:19'),
(11, 8, 1, NULL, 2, 10, 1, '2022-12', 600, '2023-01-02 06:57:04', '2023-01-02 06:57:04'),
(12, 8, 1, NULL, 2, 11, 1, '2022-12', 600, '2023-01-02 06:57:04', '2023-01-02 06:57:04'),
(13, 8, 1, NULL, 2, 12, 1, '2022-12', 570, '2023-01-02 06:57:04', '2023-01-02 06:57:04'),
(17, 8, 1, NULL, 2, 10, 2, '2023-01', 1000, '2023-01-02 08:13:31', '2023-01-02 08:13:31'),
(18, 8, 1, NULL, 2, 12, 2, '2023-01', 950, '2023-01-02 08:13:31', '2023-01-02 08:13:31');

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` varchar(255) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `section_id`, `created_at`, `updated_at`) VALUES
(3, 5, '50001', 5, 3, 1, 1, 2, '2022-01-19 16:08:27', '2022-01-19 16:08:27'),
(4, 6, '420420', 10, 8, 5, 1, 2, '2022-01-20 11:16:13', '2022-01-20 12:24:13'),
(5, 7, '9002', 9, 7, 1, 1, 2, '2022-01-20 11:19:02', '2022-01-20 11:19:02'),
(6, 10, '001', 1, 8, 4, 1, 2, '2022-02-04 21:52:07', '2022-02-04 21:52:07'),
(7, 11, '002', 1, 8, 4, 2, 2, '2022-02-04 21:53:49', '2022-02-04 21:53:49'),
(8, 12, '121122', 1, 8, 4, 1, 2, '2022-11-23 13:05:17', '2022-11-23 13:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(3, 3, 4, 100, 33, 50, '2022-01-18 10:56:44', '2022-01-18 10:56:44'),
(25, 2, 4, 100, 33, 50, '2022-02-04 21:10:19', '2022-02-04 21:10:19'),
(26, 2, 5, 100, 33, 50, '2022-02-04 21:10:19', '2022-02-04 21:10:19'),
(27, 2, 6, 100, 33, 50, '2022-02-04 21:10:19', '2022-02-04 21:10:19'),
(28, 2, 7, 100, 33, 50, '2022-02-04 21:10:19', '2022-02-04 21:10:19'),
(29, 2, 7, 100, 33, 50, '2022-02-04 21:10:19', '2022-02-04 21:10:19'),
(30, 2, 8, 100, 33, 50, '2022-02-04 21:10:19', '2022-02-04 21:10:19'),
(31, 1, 4, 100, 33, 50, '2022-02-04 21:10:38', '2022-02-04 21:10:38'),
(32, 1, 5, 100, 33, 40, '2022-02-04 21:10:38', '2022-02-04 21:10:38'),
(33, 1, 6, 100, 33, 50, '2022-02-04 21:10:38', '2022-02-04 21:10:38'),
(34, 4, 4, 100, 33, 25, '2022-02-04 21:11:40', '2022-02-04 21:11:40'),
(35, 4, 5, 100, 33, 25, '2022-02-04 21:11:40', '2022-02-04 21:11:40'),
(36, 4, 6, 100, 33, 25, '2022-02-04 21:11:40', '2022-02-04 21:11:40'),
(37, 4, 7, 100, 33, 25, '2022-02-04 21:11:40', '2022-02-04 21:11:40'),
(38, 4, 8, 100, 33, 25, '2022-02-04 21:11:40', '2022-02-04 21:11:40'),
(39, 5, 4, 100, 33, 25, '2022-02-04 21:12:31', '2022-02-04 21:12:31'),
(40, 5, 5, 100, 33, 25, '2022-02-04 21:12:31', '2022-02-04 21:12:31'),
(41, 5, 6, 100, 33, 25, '2022-02-04 21:12:31', '2022-02-04 21:12:31'),
(42, 5, 7, 100, 33, 25, '2022-02-04 21:12:31', '2022-02-04 21:12:31'),
(43, 5, 8, 100, 33, 25, '2022-02-04 21:12:31', '2022-02-04 21:12:31'),
(44, 6, 4, 100, 33, 25, '2022-02-04 21:13:28', '2022-02-04 21:13:28'),
(45, 6, 5, 100, 33, 25, '2022-02-04 21:13:28', '2022-02-04 21:13:28'),
(46, 6, 6, 100, 33, 25, '2022-02-04 21:13:28', '2022-02-04 21:13:28'),
(47, 6, 7, 100, 33, 25, '2022-02-04 21:13:28', '2022-02-04 21:13:28'),
(48, 6, 8, 100, 33, 25, '2022-02-04 21:13:28', '2022-02-04 21:13:28'),
(49, 7, 4, 100, 33, 25, '2022-02-04 21:15:43', '2022-02-04 21:15:43'),
(50, 7, 5, 100, 33, 25, '2022-02-04 21:15:43', '2022-02-04 21:15:43'),
(51, 7, 6, 100, 33, 25, '2022-02-04 21:15:43', '2022-02-04 21:15:43'),
(52, 7, 7, 100, 33, 25, '2022-02-04 21:15:43', '2022-02-04 21:15:43'),
(53, 7, 8, 100, 33, 25, '2022-02-04 21:15:43', '2022-02-04 21:15:43'),
(54, 7, 11, 100, 33, 25, '2022-02-04 21:15:43', '2022-02-04 21:15:43'),
(66, 9, 4, 100, 70, 30, '2022-11-23 10:29:06', '2022-11-23 10:29:06'),
(67, 9, 5, 100, 70, 30, '2022-11-23 10:29:06', '2022-11-23 10:29:06'),
(69, 10, 4, 100, 70, 30, '2023-01-02 09:23:17', '2023-01-02 09:23:17'),
(70, 10, 5, 100, 70, 30, '2023-01-02 09:23:17', '2023-01-02 09:23:17'),
(71, 8, 4, 100, 33, 25, '2023-01-02 09:35:10', '2023-01-02 09:35:10'),
(72, 8, 5, 100, 33, 25, '2023-01-02 09:35:10', '2023-01-02 09:35:10'),
(73, 8, 6, 100, 33, 25, '2023-01-02 09:35:10', '2023-01-02 09:35:10'),
(74, 8, 7, 100, 33, 25, '2023-01-02 09:35:10', '2023-01-02 09:35:10'),
(75, 8, 8, 100, 33, 25, '2023-01-02 09:35:10', '2023-01-02 09:35:10'),
(76, 8, 11, 100, 33, 25, '2023-01-02 09:35:10', '2023-01-02 09:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Science Teacher', '2022-01-18 14:41:42', '2022-01-18 14:43:37'),
(2, 'Assistant Teacher', '2022-01-19 10:08:01', '2022-01-19 10:08:01'),
(3, 'Principal', '2022-01-19 10:08:51', '2022-01-19 10:08:51'),
(4, 'Vice Principal', '2022-01-19 10:09:12', '2022-01-19 10:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 100, '2022-01-19 16:08:27', '2022-01-19 16:08:27'),
(2, 4, 1, 10, '2022-01-20 11:16:13', '2022-01-26 11:30:15'),
(3, 5, 1, NULL, '2022-01-20 11:19:02', '2022-01-20 11:19:02'),
(4, 6, 1, 0, '2022-02-04 21:52:07', '2022-02-04 21:52:07'),
(5, 7, 1, 0, '2022-02-04 21:53:49', '2022-02-04 21:53:49'),
(6, 8, 1, 5, '2022-11-23 13:05:17', '2022-11-23 13:05:17');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = User id',
  `date` date NOT NULL,
  `attendance_status` varchar(255) NOT NULL COMMENT 'attendance_status = Present, Absent, Leave, Half Day',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(1, 8, '2022-02-01', 'Present', '2022-02-03 14:19:53', '2022-02-03 14:19:53'),
(2, 9, '2022-02-01', 'Present', '2022-02-03 14:19:53', '2022-02-03 14:19:53'),
(3, 8, '2022-02-02', 'Present', '2022-02-03 14:20:05', '2022-02-03 14:20:05'),
(4, 9, '2022-02-02', 'Present', '2022-02-03 14:20:05', '2022-02-03 14:20:05'),
(5, 8, '2022-02-03', 'Present', '2022-02-03 14:20:13', '2022-02-03 14:20:13'),
(6, 9, '2022-02-03', 'Present', '2022-02-03 14:20:13', '2022-02-03 14:20:13'),
(7, 8, '2022-02-04', 'Leave', '2022-02-03 14:20:26', '2022-02-03 14:20:26'),
(8, 9, '2022-02-04', 'Leave', '2022-02-03 14:20:26', '2022-02-03 14:20:26'),
(9, 8, '2022-01-01', 'Present', '2022-02-03 14:23:54', '2022-02-03 14:23:54'),
(10, 9, '2022-01-01', 'Present', '2022-02-03 14:23:54', '2022-02-03 14:23:54'),
(11, 8, '2021-12-01', 'Present', '2022-02-03 14:24:10', '2022-02-03 14:24:10'),
(12, 9, '2021-12-01', 'Present', '2022-02-03 14:24:10', '2022-02-03 14:24:10'),
(13, 8, '2022-11-01', 'Present', '2022-11-25 14:12:13', '2022-11-25 14:12:13'),
(14, 9, '2022-11-01', 'Present', '2022-11-25 14:12:13', '2022-11-25 14:12:13'),
(15, 8, '2022-11-02', 'Present', '2022-11-25 14:12:19', '2022-11-25 14:12:19'),
(16, 9, '2022-11-02', 'Present', '2022-11-25 14:12:19', '2022-11-25 14:12:19'),
(17, 8, '2022-11-03', 'Present', '2022-11-25 14:12:25', '2022-11-25 14:12:25'),
(18, 9, '2022-11-03', 'Present', '2022-11-25 14:12:25', '2022-11-25 14:12:25'),
(19, 8, '2022-11-04', 'Present', '2022-11-25 14:12:32', '2022-11-25 14:12:32'),
(20, 9, '2022-11-04', 'Present', '2022-11-25 14:12:32', '2022-11-25 14:12:32'),
(21, 8, '2022-11-05', 'Present', '2022-11-25 14:12:43', '2022-11-25 14:12:43'),
(22, 9, '2022-11-05', 'Present', '2022-11-25 14:12:43', '2022-11-25 14:12:43'),
(23, 8, '2022-11-06', 'Present', '2022-11-25 14:12:50', '2022-11-25 14:12:50'),
(24, 9, '2022-11-06', 'Present', '2022-11-25 14:12:50', '2022-11-25 14:12:50'),
(25, 8, '2022-11-07', 'Absent', '2022-11-25 14:14:36', '2022-11-25 14:14:36'),
(26, 9, '2022-11-07', 'Absent', '2022-11-25 14:14:36', '2022-11-25 14:14:36'),
(27, 8, '2022-12-02', 'Present', '2022-12-01 05:58:08', '2022-12-01 05:58:08'),
(28, 9, '2022-12-02', 'Present', '2022-12-01 05:58:08', '2022-12-01 05:58:08'),
(29, 8, '2022-12-05', 'Present', '2022-12-05 09:40:29', '2022-12-05 09:40:29'),
(30, 9, '2022-12-05', 'Present', '2022-12-05 09:40:29', '2022-12-05 09:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee_leaves`
--

CREATE TABLE `employee_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = User id',
  `leave_purpose_id` int(11) DEFAULT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_leaves`
--

INSERT INTO `employee_leaves` (`id`, `employee_id`, `leave_purpose_id`, `leave_from`, `leave_to`, `created_at`, `updated_at`) VALUES
(16, 9, 23, '2022-11-01', '2022-11-12', '2022-11-25 14:07:41', '2022-11-25 14:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_logs`
--

CREATE TABLE `employee_salary_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL COMMENT 'employee_id = User_id',
  `previous_salary` int(11) DEFAULT NULL,
  `present_salary` int(11) DEFAULT NULL,
  `increment_salary` int(11) DEFAULT NULL,
  `effected_salary` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_salary_logs`
--

INSERT INTO `employee_salary_logs` (`id`, `employee_id`, `previous_salary`, `present_salary`, `increment_salary`, `effected_salary`, `created_at`, `updated_at`) VALUES
(1, 8, 25000, 25000, 0, '2020-03-27', '2022-02-02 14:18:31', '2022-02-02 14:18:31'),
(2, 9, 25000, 25000, 0, '2020-06-02', '2022-02-02 14:21:21', '2022-02-02 14:21:21'),
(3, 8, 25000, 30000, 5000, '2022-02-02', '2022-02-02 14:22:04', '2022-02-02 14:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Term Exam', '2022-01-18 10:43:18', '2022-01-18 10:43:58'),
(2, 'Middle Term Exam', '2022-01-18 10:43:40', '2022-01-18 10:44:05'),
(3, 'Final Exam', '2022-01-18 10:43:51', '2022-01-18 10:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', '2022-01-17 00:12:55', '2022-01-17 00:12:55'),
(2, 'Monthly Fee', '2022-01-17 00:09:20', '2022-01-17 00:09:20'),
(3, 'Sports Fee', '2022-01-17 00:15:19', '2022-01-17 00:15:19'),
(4, 'Exam Fee', '2022-01-17 00:16:21', '2022-01-17 00:16:21'),
(5, 'Vaccine Fee', '2022-01-17 00:17:01', '2022-01-17 00:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(24, 1, 1, 600, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(25, 1, 2, 800, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(26, 1, 3, 1000, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(27, 1, 4, 1200, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(28, 1, 5, 1200, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(29, 1, 6, 1500, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(30, 1, 7, 1700, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(31, 1, 8, 2000, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(32, 1, 9, 2200, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(33, 1, 10, 2500, '2022-01-26 11:34:49', '2022-01-26 11:34:49'),
(43, 2, 1, 1000, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(44, 2, 2, 2000, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(45, 2, 3, 2300, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(46, 2, 4, 2500, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(47, 2, 5, 2500, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(48, 2, 6, 2700, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(49, 2, 8, 2800, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(50, 2, 9, 3000, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(51, 2, 10, 3200, '2022-01-26 11:48:06', '2022-01-26 11:48:06'),
(54, 4, 1, 200, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(55, 4, 2, 200, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(56, 4, 3, 300, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(57, 4, 4, 300, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(58, 4, 5, 300, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(59, 4, 6, 400, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(60, 4, 7, 400, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(61, 4, 8, 400, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(62, 4, 9, 500, '2023-01-02 09:38:29', '2023-01-02 09:38:29'),
(63, 4, 10, 500, '2023-01-02 09:38:29', '2023-01-02 09:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `leave_purposes`
--

CREATE TABLE `leave_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_purposes`
--

INSERT INTO `leave_purposes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(23, 'ABC1', '2022-11-25 14:07:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` int(20) NOT NULL,
  `weekday` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `weekday`, `start_time`, `end_time`, `created_at`, `updated_at`, `deleted_at`, `teacher_id`, `class_id`, `subject_id`) VALUES
(1, 1, '02:00:00', '03:00:00', '2022-12-09 13:51:17', '2022-12-09 15:58:28', '2022-12-09 15:58:28', 8, 1, 4),
(2, 2, '08:00:00', '09:00:00', '2022-12-10 05:18:23', '2022-12-10 05:18:23', NULL, 8, 1, 4),
(3, 2, '09:00:00', '10:00:00', '2022-12-10 05:19:30', '2022-12-10 05:19:30', NULL, 8, 1, 5),
(4, 2, '10:00:00', '11:00:00', '2022-12-10 05:19:59', '2022-12-10 05:19:59', NULL, 8, 1, 6),
(5, 2, '11:00:00', '12:00:00', '2022-12-10 05:22:11', '2022-12-10 05:22:11', NULL, 8, 1, 7),
(7, 2, '09:00:00', '10:00:00', '2022-12-10 08:54:42', '2022-12-10 08:54:42', NULL, 13, 2, 3),
(8, 2, '08:00:00', '09:00:00', '2022-12-10 08:55:21', '2022-12-10 08:55:21', NULL, 13, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `marks_grades`
--

CREATE TABLE `marks_grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) NOT NULL,
  `grade_point` varchar(255) NOT NULL,
  `start_marks` varchar(255) NOT NULL,
  `end_marks` varchar(255) NOT NULL,
  `start_point` varchar(255) NOT NULL,
  `end_point` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_01_05_091112_create_sessions_table', 1),
(8, '2022_01_15_095645_create_student_classes_table', 3),
(9, '2022_01_15_112837_create_student_years_table', 3),
(10, '2022_01_15_115018_create_student_groups_table', 3),
(11, '2022_01_15_120905_create_student_shifts_table', 3),
(12, '2022_01_15_123435_create_fee_categories_table', 3),
(13, '2022_01_17_062423_create_fee_category_amounts_table', 4),
(14, '2022_01_18_095624_create_exam_types_table', 5),
(15, '2022_01_18_110455_create_school_subjects_table', 5),
(16, '2022_01_18_112817_create_assign_subjects_table', 5),
(17, '2022_01_18_202525_create_designations_table', 6),
(19, '2014_10_12_000000_create_users_table', 7),
(20, '2022_01_19_110244_create_assign_students_table', 7),
(21, '2022_01_19_110643_create_discount_students_table', 7),
(22, '2022_01_27_121033_create_employee_salary_logs_table', 8),
(23, '2022_02_02_120723_create_leave_purposes_table', 9),
(24, '2022_02_02_120908_create_employee_leaves_table', 9),
(25, '2022_02_02_210524_create_employee_attendances_table', 10),
(26, '2022_02_03_205527_create_student_marks_table', 11),
(27, '2022_02_05_045455_create_marks_grades_table', 12),
(28, '2022_02_05_121335_create_account_student_fees_table', 13),
(29, '2022_02_05_200352_create_account_employee_salaries_table', 14),
(30, '2022_02_06_052527_create_other_account_costs_table', 15),
(31, '2022_11_23_182002_create_student_sections_table', 16),
(32, '2022_11_23_201236_create_user_permissions_table', 17),
(33, '2022_11_25_173557_create_student_attendances_table', 18),
(34, '2022_11_25_182104_create_student_leaves_table', 19),
(35, '2022_12_05_055638_create_routines_table', 20),
(43, '2022_12_09_093436_create_lessons_table', 21),
(44, '2022_12_09_160015_add_relationship_fields_to_lessons', 21);

-- --------------------------------------------------------

--
-- Table structure for table `other_account_costs`
--

CREATE TABLE `other_account_costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `routines`
--

CREATE TABLE `routines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` int(11) NOT NULL COMMENT 'teacher_id = User id',
  `class_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `school_subjects`
--

CREATE TABLE `school_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `school_subjects`
--

INSERT INTO `school_subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Physics', '2022-01-18 10:44:17', '2022-01-18 10:44:17'),
(2, 'Chemistry', '2022-01-18 10:44:26', '2022-01-18 10:44:26'),
(3, 'Biology', '2022-01-18 10:44:43', '2022-01-18 10:44:43'),
(4, 'Bangla', '2022-01-18 10:44:52', '2022-01-18 10:44:52'),
(5, 'English', '2022-01-18 10:45:02', '2022-01-18 10:45:02'),
(6, 'Mathematics', '2022-01-18 10:45:19', '2022-01-18 10:45:19'),
(7, 'General Science', '2022-01-18 10:45:29', '2022-01-18 10:45:29'),
(8, 'Social Science', '2022-01-18 10:45:38', '2022-01-18 10:45:38'),
(9, 'Higher Mathematics', '2022-02-04 21:14:05', '2022-02-04 21:14:05'),
(10, 'Accounting', '2022-02-04 21:14:18', '2022-02-04 21:14:18'),
(11, 'ICT', '2022-02-04 21:14:27', '2022-02-04 21:14:27'),
(12, 'Religion: Islam', '2022-02-04 21:16:19', '2022-02-04 21:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ACnDhi2LJzVfW8EBfmtdTRz02yJi9oo1PuqRAiZC', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieVkxWFhvcllJRFYzYjU1cEp1VmJlTDZITkpNNlVwbmVKaG9pQnRXNyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1672675096),
('H9Au4s1ic06joaOcMWntpYG2I4HdTHNngmnuC5Hc', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidGR3cXVkSHpTVjZUSUpMVlJCaFE3ekk4djNNWXZReWIyNk1EQTJDcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXJrcy9lbnRyeS9hZGQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkaWUxVk4wQ09PWE54WUFhWjBVeXZQLkQxdGxidG9GOUxpL3BOVmNJQlJQTmc2WC8vSUlZRHEiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJGllMVZOMENPT1hOeFlBYVowVXl2UC5EMXRsYnRvRjlMaS9wTlZjSUJSUE5nNlgvL0lJWURxIjt9', 1672675271),
('NKdXMAeRkgByFGpjTm5WlPseolB5x3RF3mvZ6LJj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:108.0) Gecko/20100101 Firefox/108.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicXNad2paVGVUYzJuVUFPMzBRU0taTmZkSmV3S0xzV2JJUlhoQ3VsTiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hcmtzL2VudHJ5L2FkZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWFya3MvZW50cnkvYWRkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1672675095),
('NlXhLvnodGMQjesOjdcdqDyT4VrX0Bid5JqazgC3', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiTllpMWY2Mjg4WnJEOTkxSnY1N2pQQzREa3NEU2U3aUV0V1BBcE5LNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTA5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWFya3MvZ2V0c3R1ZGVudHM/YXNzaWduX3N1YmplY3RfaWQ9MzImY2xhc3NfaWQ9MSZleGFtX3R5cGVfaWQ9MSZzZWN0aW9uX2lkPTImeWVhcl9pZD04Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGllMVZOMENPT1hOeFlBYVowVXl2UC5EMXRsYnRvRjlMaS9wTlZjSUJSUE5nNlgvL0lJWURxIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRpZTFWTjBDT09YTnhZQWFaMFV5dlAuRDF0bGJ0b0Y5TGkvcE5WY0lCUlBOZzZYLy9JSVlEcSI7fQ==', 1672686505);

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = User id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `attendance_status` varchar(255) NOT NULL COMMENT 'attendance_status = Present, Absent, Leave, Half Day',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `shift_id`, `section_id`, `group_id`, `date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(10, 10, NULL, 1, 8, 1, 2, NULL, '2022-12-01', 'Present', '2022-12-01 06:03:34', '2022-12-01 06:03:34'),
(16, 10, NULL, 1, 8, 1, 2, NULL, '2022-12-02', 'Present', '2022-12-01 06:22:00', '2022-12-01 06:22:00'),
(17, 11, NULL, 1, 8, 1, 2, NULL, '2022-12-02', 'Present', '2022-12-01 06:22:00', '2022-12-01 06:22:00'),
(18, 12, NULL, 1, 8, 1, 2, NULL, '2022-12-02', 'Present', '2022-12-01 06:22:00', '2022-12-01 06:22:00'),
(19, 10, 1, 1, 8, 1, 2, NULL, '2022-12-03', 'Present', '2022-12-01 06:24:44', '2022-12-01 06:24:44'),
(20, 11, 2, 1, 8, 1, 2, NULL, '2022-12-03', 'Present', '2022-12-01 06:24:44', '2022-12-01 06:24:44'),
(21, 12, 121122, 1, 8, 1, 2, NULL, '2022-12-03', 'Present', '2022-12-01 06:24:44', '2022-12-01 06:24:44'),
(22, 10, 1, 1, 8, 1, 2, NULL, '2022-12-07', 'Present', '2022-12-02 00:19:37', '2022-12-02 00:19:37'),
(23, 11, 2, 1, 8, 1, 2, NULL, '2022-12-07', 'Present', '2022-12-02 00:19:37', '2022-12-02 00:19:37'),
(24, 12, 121122, 1, 8, 1, 2, NULL, '2022-12-07', 'Present', '2022-12-02 00:19:37', '2022-12-02 00:19:37'),
(25, 10, 1, 1, 8, 1, 2, NULL, '2022-12-05', 'Present', '2022-12-05 09:41:37', '2022-12-05 09:41:37'),
(26, 11, 2, 1, 8, 1, 2, NULL, '2022-12-05', 'Present', '2022-12-05 09:41:37', '2022-12-05 09:41:37'),
(27, 12, 121122, 1, 8, 1, 2, NULL, '2022-12-05', 'Present', '2022-12-05 09:41:37', '2022-12-05 09:41:37');

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Class One', '2022-01-17 00:15:40', '2022-01-17 00:15:40'),
(2, 'Class Two', '2022-01-17 11:34:28', '2022-01-17 11:34:28'),
(3, 'Class Three', '2022-01-17 11:34:35', '2022-01-17 11:34:35'),
(4, 'Class Four', '2022-01-17 11:34:43', '2022-01-17 11:34:43'),
(5, 'Class Five', '2022-01-17 11:35:03', '2022-01-17 11:35:03'),
(6, 'Class Six', '2022-01-17 11:35:22', '2022-01-17 11:35:22'),
(7, 'Class Seven', '2022-01-20 11:08:48', '2022-01-20 11:08:48'),
(8, 'Class Eight', '2022-01-20 11:09:06', '2022-01-20 11:09:06'),
(9, 'Class Nine', '2022-01-20 11:09:14', '2022-01-20 11:09:14'),
(10, 'Class Ten', '2022-01-20 11:09:25', '2022-01-20 11:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'Science', '2022-01-18 09:45:39', '2022-01-18 09:45:39'),
(2, 'Commerce', '2022-01-18 09:45:47', '2022-01-18 09:45:47'),
(3, 'Arts', '2022-01-18 09:45:53', '2022-01-18 09:45:53'),
(4, 'Section A', '2022-01-20 11:12:24', '2022-01-20 11:12:24'),
(5, 'Section B', '2022-01-20 11:12:30', '2022-01-20 11:12:30'),
(6, 'Section C', '2022-01-20 11:12:36', '2022-01-20 11:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `student_leaves`
--

CREATE TABLE `student_leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id = User id',
  `leave_purpose_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_leaves`
--

INSERT INTO `student_leaves` (`id`, `student_id`, `leave_purpose_id`, `leave_from`, `leave_to`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2022-11-01', '2022-11-03', '2022-11-25 12:35:10', '2022-11-25 12:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE `student_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'student_id=user_id',
  `id_no` varchar(255) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `exam_type_id` int(11) DEFAULT NULL,
  `assign_subject_id` int(11) DEFAULT NULL,
  `marks` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_marks`
--

INSERT INTO `student_marks` (`id`, `student_id`, `id_no`, `year_id`, `class_id`, `shift_id`, `section_id`, `group_id`, `session_id`, `exam_type_id`, `assign_subject_id`, `marks`, `created_at`, `updated_at`) VALUES
(3, 10, '202210008', 8, 1, NULL, 2, NULL, NULL, 1, 31, 80, '2022-02-04 22:48:20', '2022-02-04 22:48:20'),
(4, 11, '202210011', 8, 1, NULL, 2, NULL, NULL, 1, 31, 90, '2022-02-04 22:48:20', '2022-02-04 22:48:20'),
(5, 10, '202210008', 8, 1, NULL, NULL, NULL, NULL, 1, 31, 50, '2023-01-02 09:55:42', '2023-01-02 09:55:42'),
(6, 11, '202210011', 8, 1, NULL, NULL, NULL, NULL, 1, 31, 60, '2023-01-02 09:55:42', '2023-01-02 09:55:42'),
(7, 12, '202210012', 8, 1, NULL, NULL, NULL, NULL, 1, 31, 60, '2023-01-02 09:55:42', '2023-01-02 09:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `student_sections`
--

CREATE TABLE `student_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_sections`
--

INSERT INTO `student_sections` (`id`, `section_name`, `created_at`, `updated_at`) VALUES
(2, 'MS01', '2022-11-23 12:39:50', '2022-11-23 13:22:50'),
(3, 'MS02', '2022-11-23 13:22:59', '2022-11-23 13:22:59'),
(4, 'MS03', '2022-11-23 13:23:09', '2022-11-23 13:23:09'),
(5, 'DS01', '2022-11-23 13:23:16', '2022-11-23 13:23:16'),
(6, 'DS02', '2022-11-23 13:23:21', '2022-11-23 13:23:21'),
(7, 'DS03', '2022-11-23 13:23:27', '2022-11-23 13:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `shift_name`, `created_at`, `updated_at`) VALUES
(1, 'Morning', '2022-01-18 09:46:11', '2022-01-18 09:46:11'),
(2, 'Day', '2022-01-18 09:46:21', '2022-01-18 09:46:21'),
(3, 'Noon', '2022-01-18 09:46:30', '2022-01-18 09:46:30'),
(4, 'Afternoon', '2022-01-18 09:46:41', '2022-01-18 09:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `year`, `created_at`, `updated_at`) VALUES
(1, '2015', '2022-01-18 09:43:41', '2022-01-18 09:43:41'),
(2, '2016', '2022-01-18 09:43:49', '2022-01-18 09:43:49'),
(3, '2017', '2022-01-18 09:43:56', '2022-01-18 09:43:56'),
(4, '2018', '2022-01-20 11:11:36', '2022-01-20 11:11:36'),
(5, '2019', '2022-01-20 11:11:42', '2022-01-20 11:11:42'),
(6, '2020', '2022-01-20 11:11:47', '2022-01-20 11:11:47'),
(7, '2021', '2022-01-20 11:11:53', '2022-01-20 11:11:53'),
(8, '2022', '2022-01-20 11:11:59', '2022-01-20 11:11:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) DEFAULT NULL COMMENT 'Student, Teacher, Employee, Admin',
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `id_no` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT 'admin=headofsoft, operator, user=employee',
  `joindate` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active, 0=inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `joindate`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$ie1VN0COOXNxYAaZ0UyvP.D1tlbtoF9Li/pNVcIBRPNg6X//IIYDq', '01674729903', 'moazzemhb@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2022-11-22 15:40:08'),
(5, 'student', 'Sara', NULL, NULL, '$2y$10$FvP1xqds3JbZ5EdeUGYOW.EMWdX89q/IPNazE/IaPUHxUGp7UQQFq', '12345678', 'NY', 'Female', NULL, 'Logan', 'Lillie', 'Christian', '202210001', '2002-01-02', '3831', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-01-19 16:08:27', '2022-01-19 16:08:27'),
(6, 'student', 'Rowan Sebastian Atkinson', NULL, NULL, '$2y$10$9TNRAb.RPfdXji7b.m1L4eRIED3ajkhuMZogtMTQHXCDFKu1T56/i', '1234567800', NULL, 'Male', '202201201716202201201232file-20191203-67028-qfiw3k.jpeg', 'Eric Atkinson', 'Ella May Bainbridge', 'Christian', '202210006', '2000-01-06', '4049', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-01-20 11:16:13', '2022-01-20 12:24:13'),
(7, 'student', 'Sara Peterson', NULL, NULL, '$2y$10$QDU98DF6umggtJPtV3pvGe2wHAdaTb4uAKBIk9prjxwFPkvrDs5hC', '1234567811', 'New Yprk, USA', 'Female', '202201201719no-revisions-UhpAf0ySwuk-unsplash.jpg', 'John Peterson', 'Lillie Peterson', 'Christian', '202110007', '2003-01-10', '4780', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-01-20 11:19:02', '2022-01-20 11:19:02'),
(8, 'teacher', 'Aristotle Terrell', 'terrell@gmail.com', NULL, '$2y$10$UibnEeEJrYBDqxValemhAO9LeeSYszgihNjuynEdtqtOQ0UC0pX3e', '017827536253', 'Excepteur rem accusa', 'Male', '202202022020aterrell.jpg', 'Winifred Gill', 'Quentin Underwood', 'Christian', '2020030001', '1984-01-01', '1115', NULL, '2020-03-27', 4, 30000, 1, NULL, NULL, NULL, '2022-02-02 14:18:31', '2022-02-02 14:22:04'),
(9, 'employee', 'Gloria Shepherd', 'gloria@gmail.com', NULL, '$2y$10$opKsoU7G0QBzI9bi8lo7J.TDAH.TpokCp57ZC8sEDMVzu.vSQ/VsS', '012312321', 'Sit nemo autem dese', 'Female', '202202022021gloria.jpg', 'Tatiana Wilson', 'Lynn Wade', 'Christian', '2020060009', '1978-03-27', '5177', NULL, '2020-06-02', 2, 25000, 1, NULL, NULL, NULL, '2022-02-02 14:21:21', '2022-02-02 14:21:21'),
(10, 'student', 'Alvin Mahmudov', 'student2@gmail.com', NULL, '$2y$10$wL9GXWZRMJSnLoVdz4ETqO.CU0JJCwWxmztBHlNLa0rr4tbu5urny', '03432432', 'Dolorem ab aperiam v', 'Male', '202202050352alvin-mahmudov.jpg', 'Brett Rutledge', 'Garth Dorsey', 'Islam', '202210008', '2011-02-25', '5468', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-02-04 21:52:07', '2022-02-04 21:52:07'),
(11, 'student', 'Ben White', NULL, NULL, '$2y$10$11G3h.myklgemUZraCPsg.KIlRpU3xSI3284zpSs3pvR35Lyo1Yjm', '016758945', 'Earum quia dolorem d', 'Male', '202202050353ben-white.jpg', 'Minerva Mcmahon', 'Alan Kirkland', 'Christian', '202210011', '2016-02-25', '9567', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-02-04 21:53:49', '2022-02-04 21:53:49'),
(12, 'student', 'Jasmin', NULL, NULL, '$2y$10$PLAXPrQRSTC2tFCZtI/TYOm7CGW5UBD02bOpc1H3A3DtErQntbAnS', '01674729901', 'dffdgfdgdfg', 'Female', '2022112319052014-07-31 21.14.51.jpg', 'Javed', 'Jahanara', 'Islam', '202210012', '2016-01-01', '1254', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2022-11-23 13:05:17', '2022-11-23 13:05:17'),
(13, 'teacher', 'Vinicious Armax', 'teacher1@gmail.com', NULL, '$2y$10$9HiLidrRY2xf5OqL0uNwDu/ulINHS8FEcFacXJQYXD1xM2pNVh79S', 'Vinicious Armax', 'Dhaka', 'Male', '202212101254vinicius-amnx-amano-0NCjjD0zGnw-unsplash.jpg', 'sgsdgfsd sdf sf', 'fdsf dsf dsf ds f', 'Christian', '202210013', '1989-01-01', '5454', NULL, '2022-12-01', 1, 15000, 1, NULL, NULL, NULL, '2022-12-10 06:20:20', '2022-12-10 06:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `dashboard` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `manage_profile` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `setup_management` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `student_management` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `employee_management` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `mark_management` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `account_management` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `result` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `report` varchar(255) DEFAULT NULL COMMENT '1=active, 0=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `role_name`, `dashboard`, `manage_profile`, `setup_management`, `student_management`, `employee_management`, `mark_management`, `account_management`, `result`, `report`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1', '1', '1', '1', '1', '1', '1', '1', '1', '2022-11-25 17:29:46', '2022-12-05 06:04:07'),
(2, 'operator', '1', '1', '0', '0', '1', '1', '0', '0', '0', '2022-11-25 17:29:46', '2022-11-25 17:29:46'),
(3, 'employee', '1', '1', '1', '1', '1', '1', '1', '0', '0', NULL, NULL),
(4, 'teacher', '1', '1', '1', '1', '0', '1', '0', '1', '1', NULL, NULL),
(5, 'student', '1', '1', '0', '0', '0', '0', '0', '1', '0', NULL, '2022-12-10 13:16:46'),
(6, 'others', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leave_purposes_name_unique` (`name`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_fk_1001` (`teacher_id`),
  ADD KEY `class_fk_1002` (`class_id`),
  ADD KEY `subject_fk_1003` (`subject_id`);

--
-- Indexes for table `marks_grades`
--
ALTER TABLE `marks_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_account_costs`
--
ALTER TABLE `other_account_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `routines`
--
ALTER TABLE `routines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_subjects`
--
ALTER TABLE `school_subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `school_subjects_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_group_name_unique` (`group_name`);

--
-- Indexes for table `student_leaves`
--
ALTER TABLE `student_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_marks`
--
ALTER TABLE `student_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_sections`
--
ALTER TABLE `student_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_sections_section_name_unique` (`section_name`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_shift_name_unique` (`shift_name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_employee_salaries`
--
ALTER TABLE `account_employee_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `account_student_fees`
--
ALTER TABLE `account_student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employee_leaves`
--
ALTER TABLE `employee_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_salary_logs`
--
ALTER TABLE `employee_salary_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `leave_purposes`
--
ALTER TABLE `leave_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `marks_grades`
--
ALTER TABLE `marks_grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `other_account_costs`
--
ALTER TABLE `other_account_costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `routines`
--
ALTER TABLE `routines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_subjects`
--
ALTER TABLE `school_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_leaves`
--
ALTER TABLE `student_leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_marks`
--
ALTER TABLE `student_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_sections`
--
ALTER TABLE `student_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `class_fk_1002` FOREIGN KEY (`class_id`) REFERENCES `student_classes` (`id`),
  ADD CONSTRAINT `subject_fk_1003` FOREIGN KEY (`subject_id`) REFERENCES `student_classes` (`id`),
  ADD CONSTRAINT `teacher_fk_1001` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
