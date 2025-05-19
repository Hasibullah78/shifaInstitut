-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 07:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shifadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'عالی نرسنګ', NULL, NULL),
(2, 'فارمیسی', NULL, NULL),
(3, 'طبی تکنالوجی', NULL, NULL),
(4, 'قابلګی', NULL, NULL),
(5, 'پروتیز', NULL, NULL),
(6, 'انستیزی', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_chances`
--

CREATE TABLE `exam_chances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chance_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_chances`
--

INSERT INTO `exam_chances` (`id`, `chance_type`, `created_at`, `updated_at`) VALUES
(1, 'لومړی چانس', NULL, NULL),
(2, 'دوهم چانس', NULL, NULL),
(3, 'دریم چانس', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_marks`
--

CREATE TABLE `exam_marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mideterm_exam_marks` int(11) DEFAULT NULL,
  `final_exam_marks` int(11) DEFAULT NULL,
  `attendence_marks` int(11) DEFAULT NULL,
  `class_talent_marks` int(11) DEFAULT NULL,
  `totale_marks` int(11) DEFAULT NULL,
  `passing_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `exam_chance_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_marks`
--

INSERT INTO `exam_marks` (`id`, `mideterm_exam_marks`, `final_exam_marks`, `attendence_marks`, `class_talent_marks`, `totale_marks`, `passing_state`, `semester`, `student_id`, `subject_id`, `exam_chance_id`, `created_at`, `updated_at`) VALUES
(1, 18, 45, 10, 10, 83, 'کامیاب', 'first', 30, 1, 1, NULL, NULL),
(2, 20, 45, 10, 10, 85, 'کامیاب', 'first', 31, 1, 1, NULL, NULL),
(3, 18, NULL, NULL, NULL, NULL, NULL, 'first', 32, 1, NULL, NULL, NULL),
(4, 20, NULL, NULL, NULL, NULL, NULL, 'first', 33, 1, NULL, NULL, NULL),
(5, 18, 45, 10, 10, 83, 'کامیاب', 'first', 30, 2, 1, NULL, NULL),
(6, 20, 56, 10, 10, 96, 'کامیاب', 'second', 30, 3, 1, NULL, NULL),
(7, 18, 45, 10, 10, 83, 'کامیاب', 'second', 30, 4, 1, NULL, NULL),
(8, 18, 54, 10, 10, 92, 'کامیاب', 'third', 30, 5, 1, NULL, NULL),
(9, 18, 60, 10, 10, 98, 'کامیاب', 'third', 30, 6, 1, NULL, NULL),
(10, 18, 45, 10, 10, 83, 'کامیاب', 'fourth', 30, 7, 1, NULL, NULL),
(11, 18, 45, 10, 10, 83, 'کامیاب', 'fourth', 30, 8, 2, NULL, NULL),
(12, 15, 60, 10, 10, 95, 'کامیاب', 'first', 35, 1, 1, NULL, NULL),
(13, 20, NULL, NULL, NULL, NULL, NULL, 'first', 35, 10, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fees_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fees_amount` int(11) NOT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `fees_type`, `fees_amount`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'Admission Fess', 1000, NULL, '2023-07-18 08:10:43', '2023-07-18 08:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallary_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `gallary_image`, `description`, `created_at`, `updated_at`) VALUES
(7, 'gallary/image/this is fucluttoijtwltjl ssdflisjflks1689853965.jpg', 'this is fucluttoijtwltjl ssdflisjflks', '2023-07-20 07:22:46', '2023-07-20 07:22:46'),
(8, 'gallary/image/lefjeklf sldkfjklsjf lkj sdjflks1689853979.jpg', 'lefjeklf sldkfjklsjf lkj sdjflks', '2023-07-20 07:23:00', '2023-07-20 07:23:00'),
(9, 'gallary/image/1690002619.jpg', 'ljflskjfls lskjdfkls flks', '2023-07-20 07:23:13', '2023-07-22 00:40:20'),
(10, 'gallary/image/1690002564.jpg', 'ldjfkldsjfd lidfjslk f', '2023-07-20 07:23:24', '2023-07-22 00:39:25'),
(12, 'gallary/image/this picture is about of the nuiversity of nangarhar computer science1690007833.jpg', 'this picture is about of the nuiversity of nangarhar computer science', '2023-07-22 02:07:14', '2023-07-22 02:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Hasibullah', 'fazli@gmail.com', '123456', 'user/image/Hasibullah1689917515.jpg', NULL, NULL),
(9, 'Waseer Ahmad', 'waseer@gmail.com', 'waseer', 'user/image/Waseer Ahmad1690006786.jpg', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_20_165956_create_departments_table', 1),
(6, '2023_02_21_051515_create_logins_table', 1),
(7, '2023_02_21_193506_create_teachers_table', 1),
(8, '2023_02_25_164521_create_gallaries_table', 1),
(9, '2023_03_09_055600_create_fees_table', 2),
(10, '2023_05_21_013841_create_sessions_table', 2),
(11, '2023_06_11_071222_create_subjects_table', 2),
(12, '2023_06_13_001033_create_exam_chances_table', 2),
(13, '2023_03_04_180533_create_students_table', 3),
(14, '2023_06_13_001321_create_exam_marks_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `session_category`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'سهار', 1, '2023-07-18 08:07:19', '2023-07-18 08:07:19'),
(2, 'ماښام', 1, '2023-07-18 08:07:26', '2023-07-18 08:07:26');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `std_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_e_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_f_e_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `std_g_f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `o_vallage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_vallage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `g_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `r_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_fees` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_date` date NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passing_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `std_name`, `std_e_name`, `std_f_name`, `std_f_e_name`, `std_g_f_name`, `o_province`, `o_district`, `o_vallage`, `c_province`, `c_district`, `c_vallage`, `nic`, `school`, `phone`, `g_date`, `r_date`, `dob`, `gender`, `m_state`, `reg_fees`, `image`, `email`, `serial_number`, `exam_id`, `exam_date`, `semester`, `blood_group`, `passing_state`, `marks`, `department_id`, `session_id`, `created_at`, `updated_at`) VALUES
(21, 'جمیع الله', 'Jamiullah', 'محیب الله', 'Muhibullah', 'حبیب الله', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689837190.png', 'fazli@gmail.com', '34344', '543534', '2023-07-26', 'first', 'B+', 'pass', 87, 1, 1, '2023-07-20 02:43:10', '2023-07-21 11:44:18'),
(22, 'شاکرالله', 'Shakirullah', 'رحمن سید', 'Rahman Sayed', 'ګل سید', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689837290.png', 'fazli@gmail.com', '34344', '543534', '2023-07-21', 'first', 'B+', 'pass', NULL, 1, 1, '2023-07-20 02:44:50', '2023-07-21 14:59:56'),
(23, 'ضیاء الله', 'Zia ullah', 'نجیب الله', 'Najibullah', 'دوست محمد', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689837418.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'A+', 'pass', NULL, 3, 1, '2023-07-20 02:46:58', '2023-07-20 02:46:58'),
(24, 'سراج الحق', 'Serajulhaq', 'زرګل', 'Zar Gul', 'ګل احمد', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689841227.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'B+', 'pass', NULL, 3, 1, '2023-07-20 03:50:27', '2023-07-20 03:50:27'),
(25, 'انعام الله', 'Inamullah', 'ّهمت الله', 'Himatullah', 'همت الله', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689841548.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'B+', 'pass', NULL, 3, 1, '2023-07-20 03:55:48', '2023-07-20 03:55:48'),
(26, 'کفایت الله', 'Kefayatullah', 'همت الله', 'Mohammad', 'محمد رحیم', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689841712.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'B+', 'pass', NULL, 4, 1, '2023-07-20 03:58:32', '2023-07-20 03:58:32'),
(27, 'خیر الله', 'khirullah', 'خیر محمد', 'Abdul Jalil', 'اختر محمد', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689841787.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'B+', 'pass', NULL, 4, 1, '2023-07-20 03:59:47', '2023-07-20 03:59:47'),
(28, 'احمد', 'Ahmad', 'احمد هلال', 'Ahmad Hill', 'محمد حکیم', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689841923.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'O+', 'pass', NULL, 4, 1, '2023-07-20 04:02:04', '2023-07-20 04:02:04'),
(29, 'ولید', 'Walid', 'محمد رحیم', 'Khalili Rahman', 'رحیم الله', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 0, 'student/image/1689842090.png', 'fazli@gmail.com', '0', '0', '2023-07-20', 'first', 'B+', 'pass', NULL, 2, 1, '2023-07-20 04:04:50', '2023-07-20 04:04:50'),
(30, 'ظهور احمد', 'Zahoor Ahmad', 'خلیل الرحمن', 'Khalili Rahman', 'عبد الله', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0730274961', '2023', '2025', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689842224.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'graduated', 'A+', 'pass', 80, 2, 1, '2023-07-20 04:07:04', '2023-07-20 04:56:26'),
(31, 'الله ګل', 'Allah Gul', 'محمد رسول', 'Mohammad Rasool', 'محمد رحیم', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689842535.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'grade', 'B+', 'pass', 77, 2, 1, '2023-07-20 04:12:16', '2023-07-20 04:59:21'),
(32, 'محمد یحی', 'Mohammad Yahya', 'محمد نعیم', 'Mohammad Nyeem', 'محمد حکیم', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689842686.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'grad', 'B+', 'pass', 78, 2, 1, '2023-07-20 04:14:46', '2023-07-20 05:00:40'),
(33, 'ګل احمد', 'Gul Ahmad', 'ګل رسول', 'Gul Rasool', 'سید رسول', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689842845.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'grad', 'B+', 'pass', 77, 2, 1, '2023-07-20 04:17:25', '2023-07-20 05:00:50'),
(34, 'صفت الله', 'Sifatullah', 'محمد زمان', 'Mohammad Zaman', 'محمد نور', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689843364.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'grad', 'B+', 'pass', NULL, 2, 1, '2023-07-20 04:26:04', '2023-07-20 04:27:02'),
(35, 'وصیر احمد', 'Waseer Ahmad', 'نسار احمد', 'Nirsar Ahmad', 'محمد حنیف', 'ننګرهار', 'شیرزاد', 'توتو', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2000-02-21', 'نارینه', 'مجرد', 1, 'student/image/1689851268.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'first', 'B+', 'pass', 80, 2, 1, '2023-07-20 06:37:48', '2023-07-20 06:39:57'),
(36, 'زهیر', 'Zaheer', 'زاهد', 'zahid', 'زمیر', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'بدیع اباد', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689877546.png', 'fazli@gmail.com', '34344', '543534', '2023-07-20', 'first', 'B+', 'pass', 80, 2, 1, '2023-07-20 13:55:46', '2023-07-20 15:50:47'),
(37, 'شاهدا الله', 'Shahideullah', 'زاهد الله', 'Zahidullah', 'محمدد', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'جلال اباد لیسه', '0789515950', '2023', '2023', '2023-07-20', 'نارینه', 'مجرد', 1, 'student/image/1689879965.png', 'fazli@gmail.com', '34344', '543534', '2023-07-21', 'first', 'A+', 'pass', NULL, 2, 1, '2023-07-20 14:36:05', '2023-07-20 15:50:08'),
(38, 'ولید احمد', 'walid ahmad', 'شقح الله', 'shafiuulah', 'رحیم ګل', 'ننګرهار', 'شیرزاد', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'بدیع اباد', '0789515950', '2023', '2022', '2023-07-25', 'نارینه', 'مجرد', 1, 'student/image/1689963502.jpg', 'fazli@gmail.com', '666', '543534', '2023-07-25', 'first', 'A+', 'pass', 88, 2, 2, '2023-07-21 13:48:23', '2023-07-21 13:51:08'),
(39, 'حکمت الله', 'Hekmatullah', 'قضل الرحمن', 'Fazal Rahman', 'محمد حکیم', 'لغمان', 'شیرزاد', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'جلال اباد لیسه', '0789515950', '2023', '2022', '2023-07-26', 'نارینه', 'مجرد', 0, 'student/image/1689969706.jpg', 'fazlifazli@email.com', '0', '0', '2023-07-21', 'first', 'B+', 'pass', NULL, 2, 2, '2023-07-21 15:31:47', '2023-07-21 15:31:47'),
(40, 'ولید احمد', 'walid khan', 'شقیح الله', 'shafuillah', 'رحیم', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '17144198', 'جلال اباد لیسه', '0789515950', '2019', '2023', '2023-08-01', 'نارینه', 'مجرد', 0, 'student/image/1690002107.jpg', 'fazli@gmail.com', '0', '0', '2023-07-22', 'first', 'B+', 'pass', NULL, 2, 1, '2023-07-22 00:31:48', '2023-07-22 00:31:48'),
(41, 'ولید احمد', 'walid khan', 'شقیغ الله', 'jawad', 'رحیم ګل', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'بدیع اباد', '0789515950', '2023', '2023', '2023-07-26', 'نارینه', 'مجرد', 0, 'student/image/1690003981.png', 'fazli@gmail.com', '0', '0', '2023-07-22', 'first', 'B+', 'pass', NULL, 2, 1, '2023-07-22 01:03:01', '2023-07-22 01:03:01'),
(42, 'حکمت الله', 'Hekmatullah', 'جان', 'jan', 'رحیمم الله', 'لغمان', 'مرکز', 'چهار باغ', 'کابل', 'قرغیو', 'خیر اباد', '945830', 'بدیع اباد لیسه', '۰۷۸۱۴۵۵۶۶۶', '2023', '2023', '2022-01-19', 'نارینه', 'متحل', 0, 'student/image/1690008558.png', 'fazli@gmail.com', '0', '0', '2023-07-22', 'first', 'A+', 'pass', NULL, 2, 1, '2023-07-22 02:19:19', '2023-07-22 02:19:19'),
(43, 'ولید احمد', 'walid', 'محمد', 'mohmmad', 'رحیم ګل', 'لغمان', 'مرکز', 'چهار باغ', 'ننګرهار', 'خوګیاڼی', 'بربهار', '945830', 'ننګرهار لیسه', '۰۷۸۵۵۸۵۹۵۸', '2019', '2022', '2023-07-27', 'نارینه', 'مجرد', 0, 'student/image/1690082891.jpg', 'walid@gmail.com', '0', '0', '2023-07-23', 'first', 'B+', 'pass', NULL, 2, 1, '2023-07-22 22:58:11', '2023-07-22 22:58:11'),
(44, 'خان', 'khan', 'جان', 'jan', 'مخمد', 'لغمان', 'مرکز', 'بدیع اباد', 'کابل', 'پغمان', 'خیر اباد', '945830', 'ننګرهار لیسه', '0789515950', '2023', '2023', '2023-07-04', 'نارینه', 'مجرد', 1, 'student/image/1690085384.png', 'fazli@gmail.com', '34344', '543534', '2023-07-23', 'first', 'A+', 'pass', 80, 2, 1, '2023-07-22 23:39:44', '2023-07-22 23:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(11) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `subject_code`, `semester`, `credit`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 'کیمیا', 'AN-330', 'first', 4, 2, NULL, NULL),
(2, 'فزیک', 'AN-330', 'first', 2, 2, NULL, NULL),
(3, 'ریاضی', 'R-12', 'second', 4, 2, NULL, NULL),
(4, 'قرانکریم', 'Q-12', 'second', 4, 2, NULL, NULL),
(5, 'سیرت', 'Is-54', 'third', 2, 2, NULL, NULL),
(6, 'تاریخ', 'R-12', 'third', 2, 2, NULL, NULL),
(7, 'ساینس', 'R-12', 'fourth', 2, 2, NULL, NULL),
(8, 'ټولنیز', 'T-45', 'fourth', 4, 2, NULL, NULL),
(9, 'اسلام کورنی نظام', 'AN-330', 'first', 4, 1, NULL, NULL),
(10, 'معاصر تاریخ', 'AN-330', 'first', 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `phone` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `l_name`, `f_name`, `dob`, `phone`, `province`, `district`, `rank`, `image`, `department_id`, `created_at`, `updated_at`) VALUES
(18, 'محمد', 'احمدی', 'محمد ادریس', '2023-07-20', '0789515950', 'لغمان', 'مرکز', 'Bachelore', 'teacher/image/محمد1689836526.png', 3, NULL, NULL),
(19, 'محمد اسحاق', 'فضلی', 'محمود', '2023-07-20', '0789515950', 'لغمان', 'مرکز', 'Bachelore', 'teacher/image/محمد اسحاق1689836566.png', 1, NULL, NULL),
(20, 'خیرو الله', 'خیرخوا', 'خیر محمد', '2023-07-20', '0789515950', 'لغمان', 'مرکز', 'Bachelore', 'teacher/image/خیرو الله1689836612.png', 5, NULL, NULL),
(21, 'ستانه ګل', 'ګل', 'ښاسته ګل', '2023-07-20', '0789515950', 'لغمان', 'مرکز', 'Bachelore', 'teacher/image/ستانه ګل1689836653.png', 5, NULL, NULL),
(23, 'حماد', 'حمید', 'احمدی', '2023-07-20', '0789515950', 'لغمان', 'مرکز', 'Bachelore', 'teacher/image/حماد1689836895.png', 4, NULL, NULL),
(25, 'کل رخمان', 'شینواری', 'مسلم', '2023-06-28', '0789515950', 'ننګرهار', 'نازیان', 'PHD', 'teacher/image/کل رخمان1690002478.png', 2, NULL, NULL),
(26, 'کل رخمان', 'شینواری', 'مسلم', '2023-07-18', '۰۷۷۸۹۴۹۶۹۵', 'ننکرهار', 'نازیان', 'Master', 'teacher/image/کل رخمان1690007726.png', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hasibullah', 'hasib@gmail.com', NULL, 'fazli', 'user/image/Hasibullah1689922830.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_chances`
--
ALTER TABLE `exam_chances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_marks_student_id_foreign` (`student_id`),
  ADD KEY `exam_marks_subject_id_foreign` (`subject_id`),
  ADD KEY `exam_marks_exam_chance_id_foreign` (`exam_chance_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_department_id_foreign` (`department_id`);

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_department_id_foreign` (`department_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_department_id_foreign` (`department_id`),
  ADD KEY `students_session_id_foreign` (`session_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_department_id_foreign` (`department_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_department_id_foreign` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_chances`
--
ALTER TABLE `exam_chances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_marks`
--
ALTER TABLE `exam_marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD CONSTRAINT `exam_marks_exam_chance_id_foreign` FOREIGN KEY (`exam_chance_id`) REFERENCES `exam_chances` (`id`),
  ADD CONSTRAINT `exam_marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `exam_marks_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `students_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
