-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2023 at 02:53 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulsexpressdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangays`
--

DROP TABLE IF EXISTS `barangays`;
CREATE TABLE IF NOT EXISTS `barangays` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cover_photo_images`
--

DROP TABLE IF EXISTS `cover_photo_images`;
CREATE TABLE IF NOT EXISTS `cover_photo_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

DROP TABLE IF EXISTS `districts`;
CREATE TABLE IF NOT EXISTS `districts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `district`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `image_reports`
--

DROP TABLE IF EXISTS `image_reports`;
CREATE TABLE IF NOT EXISTS `image_reports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `report_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_reports_report_id_foreign` (`report_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_reports`
--

INSERT INTO `image_reports` (`id`, `report_id`, `image_path`, `created_at`, `updated_at`) VALUES
(5, 35, 'images/2023-12-21_17-32-38_35_405511924_901856404691373_3373861929784741175_n.jpg', '2023-12-21 09:32:38', '2023-12-21 09:32:38'),
(6, 36, 'images/2023-12-21_17-36-29_36_FELICITAS_face_detection.png', '2023-12-21 09:36:29', '2023-12-21 09:36:29'),
(7, 37, 'images/2023-12-21_17-38-20_37_405511924_901856404691373_3373861929784741175_n.jpg', '2023-12-21 09:38:20', '2023-12-21 09:38:20'),
(8, 37, 'images/2023-12-21_17-38-20_37_363791410_882342436734652_4246129962511031167_n.jpg', '2023-12-21 09:38:20', '2023-12-21 09:38:20'),
(9, 37, 'images/2023-12-21_17-38-20_37_testaws.jpg', '2023-12-21 09:38:20', '2023-12-21 09:38:20'),
(10, 37, 'images/2023-12-21_17-38-20_37_Diplo-and-prv_WP_20141114_001.jpg', '2023-12-21 09:38:20', '2023-12-21 09:38:20'),
(11, 38, 'images/2023-12-21_17-44-47_38_SampleImage.jpg', '2023-12-21 09:44:47', '2023-12-21 09:44:47'),
(12, 38, 'images/2023-12-21_17-44-47_38_394453301_1528477354555168_3531066604897034732_n.jpg', '2023-12-21 09:44:47', '2023-12-21 09:44:47'),
(13, 38, 'images/2023-12-21_17-44-47_38_387588475_6787976317946160_3168095973615366405_n.png', '2023-12-21 09:44:47', '2023-12-21 09:44:47'),
(14, 39, 'images/2023-12-21_19-37-49_39_405511924_901856404691373_3373861929784741175_n.jpg', '2023-12-21 11:37:49', '2023-12-21 11:37:49'),
(15, 40, 'images/2023-12-22_03-47-13_40_409381405_2036485290037948_1200217931204771120_n.jpg', '2023-12-21 19:47:13', '2023-12-21 19:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_29_074309_create_provinces_table', 1),
(6, '2023_09_29_080333_create_programs_table', 1),
(7, '2023_09_29_124137_create_municipalities_table', 1),
(8, '2023_09_29_124201_create_barangays_table', 1),
(9, '2023_09_29_124236_create_quarters_table', 1),
(10, '2023_09_29_124322_create_reason_of_variance_table', 1),
(11, '2023_09_29_124346_create_reason_of_variance_quarterly_table', 1),
(12, '2023_09_29_124413_create_steering_measures_table', 1),
(13, '2023_09_29_124445_create_steering_measrures_quarterly_table', 1),
(14, '2023_09_29_124521_create_cover_photo_images_table', 1),
(15, '2023_09_29_140439_create_physical_count_table', 1),
(16, '2023_10_16_090312_create_semesters_table', 1),
(17, '2023_10_16_092205_create_districts_table', 1),
(18, '2023_10_18_025422_add_created_at_to_physical_count', 1),
(19, '2023_10_18_064456_add_districts_id_to_municipalities', 1),
(20, '2023_10_19_160331_create_users_type_table', 1),
(21, '2023_10_19_163349_add_user_type_to_users', 1),
(22, '2023_10_19_171455_create_outcome_indicator_type_table', 1),
(23, '2023_10_19_172049_create_outcome_indicator_main', 1),
(24, '2023_10_19_172636_create_outcome_indicator_title_table', 1),
(25, '2023_10_20_040843_create_benefeciaries_table', 1),
(26, '2023_10_20_043421_create_batch_list_table', 1),
(27, '2023_10_21_092428_drop_steering_measures_quarterly', 1),
(28, '2023_10_21_092633_drop_steering_measures_table', 1),
(29, '2023_10_21_092710_drop_reason_of_variance_table_quarterly_table', 1),
(30, '2023_10_21_092903_drop_reason_of_variance_table', 1),
(31, '2023_10_21_093553_create_steering_measures_v2_table', 1),
(32, '2023_10_21_094111_create_reason_of_variance_v2_table', 1),
(33, '2023_10_21_102144_add_outcome_indicator_id_to_batch_list', 1),
(34, '2023_11_16_152331_create_registered_beneficiaries_table', 1),
(35, '2023_11_25_070239_drop_batchlist_table', 1),
(36, '2023_11_25_070542_drop_fourps_beneficiaries_table', 1),
(37, '2023_11_25_070605_drop_beneficiaries_table', 1),
(38, '2023_11_25_073949_create_reports_table', 2),
(39, '2023_11_26_153832_add_active_column_to_quarters_table', 3),
(40, '2023_11_26_183600_create_program_targets_table', 4),
(41, '2023_11_27_180332_add_column_to_reports_table', 5),
(43, '2023_12_19_140729_create_image_reports_table', 6),
(44, '2023_12_21_075335_add_names_to_users_table', 7),
(45, '2023_12_21_190924_drop_reason_of_variance_table_v2', 8),
(46, '2023_12_21_191024_drop_steering_measures_table_v2', 8),
(47, '2023_12_21_191109_create_variance_table', 9),
(48, '2023_12_21_201341_create_variance_submission_check_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `municipalities`
--

DROP TABLE IF EXISTS `municipalities`;
CREATE TABLE IF NOT EXISTS `municipalities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `municipality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` bigint UNSIGNED NOT NULL,
  `district_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `municipalities_province_id_foreign` (`province_id`),
  KEY `municipalities_district_id_foreign` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `municipalities`
--

INSERT INTO `municipalities` (`id`, `municipality`, `province_id`, `district_id`) VALUES
(1, 'Compostela', 2, 1),
(2, 'Maragusan', 2, 1),
(3, 'Monkayo', 2, 1),
(4, 'Montevista', 2, 1),
(5, 'New Bataan', 2, 1),
(6, 'Laak', 2, 2),
(7, 'Mabini', 2, 2),
(8, 'Maco', 2, 2),
(9, 'Mawab', 2, 2),
(10, 'Pantukan', 2, 2),
(11, 'Nabunturan', 2, 2),
(12, 'Tagum City', 4, 1),
(13, 'Asuncion', 4, 1),
(14, 'Kapalong', 4, 1),
(15, 'New Corella', 4, 1),
(16, 'San Isidro', 4, 1),
(17, 'Talaingod', 4, 1),
(18, 'Braulio Dujali', 4, 2),
(19, 'Carmen', 4, 2),
(20, 'City of Panabo', 4, 2),
(21, 'Island Garden City of Samal', 4, 2),
(22, 'Sto, Tomas', 4, 2),
(23, 'Baganga', 1, 1),
(24, 'Boston', 1, 1),
(25, 'Caraga', 1, 1),
(26, 'Cateel', 1, 1),
(27, 'Manay', 1, 1),
(28, 'Tarragona', 1, 1),
(29, 'Banaybanay', 1, 2),
(30, 'City of Mati', 1, 2),
(31, 'Governor Generoso', 1, 2),
(32, 'Lupon', 1, 2),
(33, 'San Isidro', 1, 2),
(34, 'Bansalan', 5, 4),
(35, 'City of Digos', 5, 4),
(36, 'Hagonoy', 5, 4),
(37, 'Kiblawan', 5, 4),
(38, 'Magsaysay', 5, 4),
(39, 'Malalag', 5, 4),
(40, 'Matanao', 5, 4),
(41, 'Padada', 5, 4),
(42, 'Sta. Cruz', 5, 4),
(43, 'Sulop', 5, 4),
(44, 'Don Marcelino', 3, 4),
(45, 'Jose Abad Santos', 3, 4),
(46, 'Malita', 3, 4),
(47, 'Sta. Maria', 3, 4),
(48, 'Saranggani', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`) VALUES
(1, 'Pantawid Pamilyang Pilipino Program'),
(2, 'Sustainable Livelihood Program'),
(3, 'Pantawid Pamilyang Pilipino Program'),
(4, 'Kapit Bisig Laban Sa Kahirapan'),
(5, 'Social Pension Program'),
(6, 'Supplementary Feeding Program'),
(7, 'Disaster Risk Reduction And Management'),
(8, 'Assistance To Individuals In Crisis Situations');

-- --------------------------------------------------------

--
-- Table structure for table `program_targets`
--

DROP TABLE IF EXISTS `program_targets`;
CREATE TABLE IF NOT EXISTS `program_targets` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_id` bigint UNSIGNED NOT NULL,
  `quarter_id` bigint UNSIGNED NOT NULL,
  `physical_target` bigint UNSIGNED NOT NULL,
  `budget_target` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `program_targets_program_id_foreign` (`program_id`),
  KEY `program_targets_quarter_id_foreign` (`quarter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_targets`
--

INSERT INTO `program_targets` (`id`, `program_id`, `quarter_id`, `physical_target`, `budget_target`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4353, 345, NULL, '2023-12-25 00:31:10'),
(2, 1, 2, 2, 2000, NULL, '2023-11-27 18:02:35'),
(3, 1, 3, 897, 7000000, NULL, '2023-11-28 21:20:15'),
(4, 1, 4, 12312312, 234324, NULL, '2023-11-28 22:09:36'),
(5, 2, 1, 4, 3000, NULL, '2023-11-27 18:03:01'),
(6, 2, 2, 324324, 324234234, NULL, '2023-12-03 10:07:59'),
(7, 2, 3, 1000, 1000000, NULL, '2023-12-12 01:42:47'),
(8, 2, 4, 0, 0, NULL, NULL),
(9, 4, 1, 1234567, 80000000000, NULL, NULL),
(10, 4, 2, 0, 0, NULL, NULL),
(11, 4, 3, 11, 11, NULL, '2023-12-21 12:20:17'),
(12, 4, 4, 11, 11, NULL, '2023-12-21 12:18:01'),
(13, 5, 1, 0, 0, NULL, NULL),
(14, 5, 2, 0, 0, NULL, NULL),
(15, 5, 3, 11, 11, NULL, '2023-12-21 12:34:55'),
(16, 5, 4, 0, 0, NULL, NULL),
(17, 6, 1, 0, 0, NULL, NULL),
(18, 6, 2, 0, 0, NULL, NULL),
(19, 6, 3, 0, 0, NULL, NULL),
(20, 6, 4, 0, 0, NULL, NULL),
(21, 7, 1, 0, 0, NULL, NULL),
(22, 7, 2, 0, 0, NULL, NULL),
(23, 7, 3, 0, 0, NULL, NULL),
(24, 7, 4, 0, 0, NULL, NULL),
(25, 3, 1, 0, 0, NULL, NULL),
(26, 3, 2, 0, 0, NULL, NULL),
(27, 3, 3, 0, 0, NULL, NULL),
(28, 3, 4, 0, 0, NULL, NULL),
(29, 8, 1, 500000000, 222222222222222, NULL, NULL),
(30, 8, 2, 0, 0, NULL, NULL),
(31, 8, 3, 0, 0, NULL, NULL),
(32, 8, 4, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Davao Oriental', NULL, NULL),
(2, 'Davao De Oro', NULL, NULL),
(3, 'Davao Occidental', NULL, NULL),
(4, 'Davao Del Norte', NULL, NULL),
(5, 'Davao Del Sur', NULL, NULL),
(6, 'Davao City', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quarters`
--

DROP TABLE IF EXISTS `quarters`;
CREATE TABLE IF NOT EXISTS `quarters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `quarter` int NOT NULL,
  `active` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quarters`
--

INSERT INTO `quarters` (`id`, `quarter`, `active`) VALUES
(1, 1, 0),
(2, 2, 0),
(3, 3, 0),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `province_id` bigint UNSIGNED NOT NULL,
  `municipality_id` bigint UNSIGNED NOT NULL,
  `quarter_id` bigint UNSIGNED NOT NULL,
  `program_id` bigint UNSIGNED NOT NULL,
  `male_count` int NOT NULL,
  `female_count` int NOT NULL,
  `total_physical_count` int NOT NULL,
  `total_budget_utilized` double(10,2) NOT NULL,
  `year` year NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_province_id_foreign` (`province_id`),
  KEY `reports_municipality_id_foreign` (`municipality_id`),
  KEY `reports_quarter_id_foreign` (`quarter_id`),
  KEY `reports_program_id_foreign` (`program_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `province_id`, `municipality_id`, `quarter_id`, `program_id`, `male_count`, `female_count`, `total_physical_count`, `total_budget_utilized`, `year`, `created_at`, `updated_at`) VALUES
(35, 2, 3, 4, 7, 234, 324, 558, 234.00, 2023, '2023-12-21 09:32:38', '2023-12-21 09:32:38'),
(36, 2, 2, 4, 2, 32423, 2342, 34765, 324324.00, 2023, '2023-12-21 09:36:29', '2023-12-21 09:36:29'),
(37, 1, 26, 4, 2, 345435, 345345, 690780, 435435.00, 2023, '2023-12-21 09:38:20', '2023-12-21 09:38:20'),
(38, 3, 46, 4, 7, 324, 234, 558, 324.00, 2023, '2023-12-21 09:44:47', '2023-12-21 09:44:47'),
(39, 2, 2, 4, 2, 32324, 234, 32558, 324.00, 2023, '2023-12-21 11:37:49', '2023-12-21 11:37:49'),
(40, 2, 4, 4, 6, 3242, 324, 3566, 234324.00, 2023, '2023-12-21 19:47:13', '2023-12-21 19:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `semester` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_user_type_foreign` (`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `middle_name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`) VALUES
(33, 'Admin', 'Edith', 'Pagas', 'waht', 'admin', 'admin@email.com', '$2y$10$tRwjemNUw1egoni3Efx0feoPL7KmgoHSiSRkjUiL43dT.yG4nLkKa', NULL, NULL, NULL, 1),
(34, 'Pantawid Pamilyang Pilipino Program', NULL, NULL, NULL, 'fourps', NULL, '$2y$10$/F4eL9Ytvbiy.zzUz.EDW.HahJki0G8gmLwJQRK6HgiRf53Bsprj2', NULL, NULL, NULL, 5),
(35, 'Sustainable Livelihood Program', 'Cedrick James', 'Felicitassssss', 'Bationsssssss', 'slp', 'cjbfelicitas@usep.edu.ph', '$2y$10$sBXMRDGJ7gCLjqUlJ4I7WOK3sV2SflVnLxdjdM7kLnQ2FqUmXwmqO', NULL, NULL, NULL, 7),
(36, 'Kapit Bisig Laban Sa Kahirapan', NULL, NULL, NULL, 'kalahi', NULL, '$2y$10$V.qA2YhQYth5sHa.YtPXT.jZZ0DkBw0xiT2bwZPN5.gWp8H99/7vy', NULL, NULL, NULL, 6),
(37, 'Social Pension Program', NULL, NULL, NULL, 'spp', NULL, '$2y$10$zfpahkvs4sZVUJMqZbARBeq0Vf7wYM6fbwSn4WEQGxdRAAPc8L7ra', NULL, NULL, NULL, 10),
(38, 'Supplementary Feeding Program', NULL, NULL, NULL, 'sfp', NULL, '$2y$10$27VpLTJdF6kZ3HGBba3K.Ozas86rT88jP6W6DdNHzjqFfCztVNcuO', NULL, NULL, NULL, 9),
(39, 'Disaster Risk Reduction And Management', NULL, NULL, NULL, 'drrm', NULL, '$2y$10$DMb8Am7fhBS1TzIZYMYglu8cMvnXTdqG7NTH0W./49w6ScSXEP22m', NULL, NULL, NULL, 8),
(40, 'Assistance To Individuals In Crisis Situations', NULL, NULL, NULL, 'aics', NULL, '$2y$10$hUjjzPkwvf59VaPezz27jOohVvp/Hr6N.zgJFRPpDFqA4fhlYjeIW', NULL, NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
CREATE TABLE IF NOT EXISTS `user_type` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type`, `created_at`) VALUES
(1, 'admin', '2023-11-25 07:46:29'),
(2, 'guest', '2023-11-25 07:46:29'),
(3, 'tester', '2023-11-25 07:46:29'),
(4, 'program', '2023-11-25 07:46:29'),
(5, 'fourps', '2023-11-25 07:46:29'),
(6, 'kalahi', '2023-11-25 07:46:29'),
(7, 'slp', '2023-11-25 07:46:29'),
(8, 'drrm', '2023-11-25 07:46:29'),
(9, 'feeding_program', '2023-11-25 07:46:29'),
(10, 'social_pension_program', '2023-11-25 07:46:29'),
(11, 'centenarrian', '2023-11-25 07:46:29'),
(12, 'aics', '2023-11-25 07:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `variance`
--

DROP TABLE IF EXISTS `variance`;
CREATE TABLE IF NOT EXISTS `variance` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_id` bigint UNSIGNED NOT NULL,
  `quarter_id` bigint UNSIGNED NOT NULL,
  `reason_of_variance` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `steering_measures` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `variance_program_id_foreign` (`program_id`),
  KEY `variance_quarter_id_foreign` (`quarter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variance`
--

INSERT INTO `variance` (`id`, `program_id`, `quarter_id`, `reason_of_variance`, `steering_measures`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'reason', 'steering', '2023-12-21 12:27:50', '2023-12-21 12:27:50'),
(2, 5, 4, 'test', 'test', '2023-12-21 12:38:09', '2023-12-21 12:38:09'),
(3, 2, 4, 'test', 'test', '2023-12-21 15:58:35', '2023-12-21 15:58:35'),
(4, 6, 4, 'qweqweqqwe', 'qweqwe', '2023-12-21 19:45:56', '2023-12-21 19:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `variance_submission_check`
--

DROP TABLE IF EXISTS `variance_submission_check`;
CREATE TABLE IF NOT EXISTS `variance_submission_check` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_id` bigint UNSIGNED NOT NULL,
  `quarter_id` bigint UNSIGNED NOT NULL,
  `submitted` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `variance_submission_check_program_id_foreign` (`program_id`),
  KEY `variance_submission_check_quarter_id_foreign` (`quarter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variance_submission_check`
--

INSERT INTO `variance_submission_check` (`id`, `program_id`, `quarter_id`, `submitted`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 1, '2023-12-21 12:27:50', '2023-12-21 12:27:50'),
(2, 5, 4, 1, '2023-12-21 12:38:09', '2023-12-21 12:38:09'),
(3, 2, 4, 1, '2023-12-21 15:58:35', '2023-12-21 15:58:35'),
(4, 6, 4, 1, '2023-12-21 19:45:56', '2023-12-21 19:45:56');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `image_reports`
--
ALTER TABLE `image_reports`
  ADD CONSTRAINT `image_reports_report_id_foreign` FOREIGN KEY (`report_id`) REFERENCES `reports` (`id`);

--
-- Constraints for table `municipalities`
--
ALTER TABLE `municipalities`
  ADD CONSTRAINT `municipalities_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `municipalities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `program_targets`
--
ALTER TABLE `program_targets`
  ADD CONSTRAINT `program_targets_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `program_targets_quarter_id_foreign` FOREIGN KEY (`quarter_id`) REFERENCES `quarters` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_municipality_id_foreign` FOREIGN KEY (`municipality_id`) REFERENCES `municipalities` (`id`),
  ADD CONSTRAINT `reports_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `reports_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `reports_quarter_id_foreign` FOREIGN KEY (`quarter_id`) REFERENCES `quarters` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_foreign` FOREIGN KEY (`user_type`) REFERENCES `user_type` (`id`);

--
-- Constraints for table `variance`
--
ALTER TABLE `variance`
  ADD CONSTRAINT `variance_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `variance_quarter_id_foreign` FOREIGN KEY (`quarter_id`) REFERENCES `quarters` (`id`);

--
-- Constraints for table `variance_submission_check`
--
ALTER TABLE `variance_submission_check`
  ADD CONSTRAINT `variance_submission_check_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`),
  ADD CONSTRAINT `variance_submission_check_quarter_id_foreign` FOREIGN KEY (`quarter_id`) REFERENCES `quarters` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
