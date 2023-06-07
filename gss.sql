-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 05:21 AM
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
-- Database: `gss`
--

-- --------------------------------------------------------

--
-- Table structure for table `counseling_results`
--

CREATE TABLE `counseling_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `encoded_by` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counseling_results`
--

INSERT INTO `counseling_results` (`id`, `student_id`, `description`, `remarks`, `encoded_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'desc 2', 'rem 1', 'Super Admin', '2022-11-08 11:37:18', '2022-11-08 11:37:39'),
(2, 2, 'asd', 'asd', 'User 1 User 1 User 1', '2022-11-08 11:43:34', '2022-11-08 11:43:34'),
(3, 2, 'asd', 'dsa', 'User 1 User 1 User 1', '2022-11-08 11:44:03', '2022-11-08 11:44:03'),
(4, 1, 'dasdas', 'asdasd', 'User 1 User 1 User 1', '2022-11-08 11:44:50', '2022-11-08 11:44:50'),
(5, 1, 'das', 'das', 'User 1 User 1 User 1', '2022-11-08 11:46:37', '2022-11-08 11:46:37'),
(6, 2, 'asd', 'asd', 'User 1 User 1 User 1', '2022-11-08 11:47:34', '2022-11-08 11:47:34'),
(7, 1, 'asd', 'asd', 'User 1 User 1 User 1', '2022-11-08 11:48:30', '2022-11-08 11:48:30'),
(8, 2, 'asd', 'asd', 'User 1 User 1 User 1', '2022-11-08 12:02:49', '2022-11-08 12:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `downloadable_files`
--

CREATE TABLE `downloadable_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `file_type` enum('recomendation_letter','others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_location` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_06_20_023857_create_users_table', 1),
(3, '2022_06_20_024030_create_students_table', 1),
(4, '2022_06_20_024107_create_downloadable_files_table', 1),
(5, '2022_06_20_024140_create_test_results_table', 1),
(6, '2022_06_20_024231_create_counseling_results_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `civil_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_contact_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `last_name`, `first_name`, `middle_name`, `student_id`, `gender`, `birth_day`, `address`, `picture`, `civil_status`, `religion`, `contact_number`, `email_address`, `guardian_name`, `relationship`, `guardian_contact_number`, `remarks`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'b', 'a', 'a', 1, 'Male', '2022-11-10', 'a', NULL, 'Single', 'a', '1', 'a', 'a', 'a', '1', 'a', 'User 1 User 1 User 1', '2022-11-08 11:33:10', '2022-11-08 11:34:28'),
(2, 'b', 'b', 'b', 2, 'Female', '2008-11-05', 'b', 'angel-burger-flying-cartoon-vector-icon-illustration-food-object-icon-concept-isolated-flat-vector_138676-4435.jpg', 'Single', 'b', '2', 'b', 'b', 'b', '2', 'b', 'Super Admin', '2022-11-08 11:38:51', '2022-11-08 11:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `test_results`
--

CREATE TABLE `test_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `test_type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_result` double(100,2) NOT NULL,
  `encoded_by` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_results`
--

INSERT INTO `test_results` (`id`, `student_id`, `test_type`, `test_result`, `encoded_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Type 2', 1.00, 'Super Admin', '2022-11-08 11:36:08', '2022-11-08 11:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_level` tinyint(1) NOT NULL,
  `created_by` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `middle_name`, `user_name`, `password`, `salt`, `email`, `user_level`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Super', NULL, 'gssadmin', 'c93ccd78b2076528346216b3b2f701e6', NULL, NULL, 1, 'default', NULL, NULL),
(3, 'User 1', 'User 1', 'User 1', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'a87ff679a2f3e71d9181a67b7542122c', 'user1@gmail.com', 2, 'Super Admin', '2022-11-08 11:31:51', '2022-11-08 11:31:51'),
(4, 'user2', 'user2', 'user2', 'user2', '7e58d63b60197ceb55a1c487989a3720', '0cc175b9c0f1b6a831c399e269772661', 'user2', 1, 'User 1 User 1 User 1', '2022-11-08 11:57:31', '2022-11-08 11:57:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counseling_results`
--
ALTER TABLE `counseling_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloadable_files`
--
ALTER TABLE `downloadable_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `downloadable_files_student_id_foreign` (`student_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test_results`
--
ALTER TABLE `test_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counseling_results`
--
ALTER TABLE `counseling_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `downloadable_files`
--
ALTER TABLE `downloadable_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test_results`
--
ALTER TABLE `test_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloadable_files`
--
ALTER TABLE `downloadable_files`
  ADD CONSTRAINT `downloadable_files_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
