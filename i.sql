-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 10:58 AM
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
-- Database: `i`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT', '2023-01-24 00:36:03', '2023-01-24 00:36:03', NULL),
(2, 'Accounting', '2023-01-24 01:38:07', '2023-01-24 01:38:07', NULL),
(3, 'Secretary', '2023-01-24 01:42:25', '2023-01-24 01:42:25', NULL),
(4, 'Planning', '2023-01-24 02:22:18', '2023-01-24 02:22:18', NULL),
(5, 'Maintenance', '2023-01-24 02:26:29', '2023-01-24 02:26:29', NULL),
(6, 'QA', '2023-01-24 02:28:33', '2023-01-24 02:28:33', NULL),
(7, 'PD', '2023-01-24 02:29:16', '2023-01-24 02:29:16', NULL),
(8, 'PC', '2023-01-24 02:29:57', '2023-01-24 02:29:57', NULL),
(9, 'Stock', '2023-01-24 02:30:29', '2023-01-24 02:30:29', NULL),
(10, 'HR', '2023-01-24 02:31:50', '2023-01-24 02:31:50', NULL),
(11, 'Marketing', '2023-01-24 02:34:50', '2023-01-24 02:34:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `nick_name`, `department_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'IT-Support', 'IT-Support', 1, '2023-01-24 00:36:07', '2023-01-24 00:36:07', NULL),
(2, 'Thaepong', 'DreaM', 1, '2023-01-24 01:37:48', '2023-01-24 01:37:48', NULL),
(3, 'Isarapon', 'Air', 2, '2023-01-24 01:40:34', '2023-01-24 01:40:34', NULL),
(4, 'Jantra', 'Khoi', 2, '2023-01-24 01:40:54', '2023-01-24 01:40:54', NULL),
(5, 'Sarinthip', 'Mint', 2, '2023-01-24 01:41:14', '2023-01-24 01:41:14', NULL),
(6, 'Arisara', 'Khatin', 2, '2023-01-24 01:41:35', '2023-01-24 01:41:35', NULL),
(7, 'Panida', 'Na', 2, '2023-01-24 01:41:50', '2023-01-24 01:41:50', NULL),
(8, 'Rachatakan', 'Dow', 3, '2023-01-24 01:43:30', '2023-01-24 01:43:30', NULL),
(9, 'Jirapond', 'Yee', 3, '2023-01-24 01:44:00', '2023-01-24 01:44:00', NULL),
(10, 'Wilawan', 'Uei', 3, '2023-01-24 01:44:36', '2023-01-24 01:44:36', NULL),
(11, 'Phantayuth', 'Jame', 11, '2023-01-24 02:21:04', '2023-01-24 02:21:04', NULL),
(12, 'Phanu', 'Aom', 1, '2023-01-24 02:21:48', '2023-01-24 02:21:48', NULL),
(13, 'Suwandee', 'Suwandee', 4, '2023-01-24 02:23:05', '2023-01-24 02:23:05', NULL),
(14, 'Chanakarn', 'Tai', 4, '2023-01-24 02:23:30', '2023-01-24 02:23:30', NULL),
(15, 'Jirapond', 'Au', 4, '2023-01-24 02:24:36', '2023-01-24 02:24:36', NULL),
(16, 'Phakakun', 'Bo', 4, '2023-01-24 02:25:30', '2023-01-24 02:25:30', NULL),
(17, 'Jaturong', 'Champ', 5, '2023-01-24 02:27:16', '2023-01-24 02:27:16', NULL),
(18, 'Sompond', 'Nong', 5, '2023-01-24 02:27:48', '2023-01-24 02:27:48', NULL),
(19, 'Wasong', 'Wasong', 6, '2023-01-24 02:28:43', '2023-01-24 02:28:43', NULL),
(20, 'Thanakorn', 'Aek', 7, '2023-01-24 02:29:37', '2023-01-24 02:29:37', NULL),
(21, 'Sanisara', 'Cream', 1, '2023-01-24 02:30:17', '2023-01-24 02:30:17', NULL),
(22, 'Sommai', 'Noi', 9, '2023-01-24 02:30:48', '2023-01-24 02:30:48', NULL),
(23, 'Kanya', 'Mum', 9, '2023-01-24 02:31:12', '2023-01-24 02:31:12', NULL),
(24, 'Phattawipa', 'Pat', 9, '2023-01-24 02:31:30', '2023-01-24 02:31:30', NULL),
(25, 'Phatcharin', 'Lee', 10, '2023-01-24 02:32:12', '2023-01-24 02:32:12', NULL),
(26, 'Jitruedee', 'Angun', 10, '2023-01-24 02:32:46', '2023-01-24 02:32:46', NULL),
(27, 'Chanyanuch', 'Pla', 10, '2023-01-24 02:33:09', '2023-01-24 02:33:09', NULL),
(28, 'Nattapong', 'Num', 10, '2023-01-24 02:33:30', '2023-01-24 02:33:30', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_20_071055_create_sessions_table', 1),
(7, '2023_01_23_091958_create_registrations_table', 1),
(8, '2023_01_23_093356_create_registration_logs_table', 1),
(9, '2023_01_23_110904_create_employees_table', 1),
(10, '2023_01_23_150100_create_departments_table', 1),
(11, '2023_01_24_065410_create_property_keys_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property_keys`
--

CREATE TABLE `property_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_keys`
--

INSERT INTO `property_keys` (`id`, `key`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SV.', 'Server', '2023-01-24 07:34:57', '2023-01-24 07:34:57', NULL),
(2, 'MT.', 'Mornitor', '2023-01-24 09:36:10', '2023-01-24 09:36:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` varchar(255) NOT NULL,
  `property_code` varchar(255) NOT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `spec` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `refer` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`id`, `property_id`, `property_code`, `serial_number`, `brand`, `type`, `spec`, `color`, `refer`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '53.01', '2582B2A-06HHRA5', 'IBM', 'SV COMODO', 'X3100 M4', 'Black', '-', 1, '2023-01-24 00:39:19', '2023-01-24 00:39:19', NULL),
(2, '1', '53.02', 'D63Q62S', 'Dell', 'SV MMSE', 'Power Edge T110', 'Black', '-', 1, '2023-01-24 00:41:37', '2023-01-24 00:41:37', NULL),
(3, '2', '58.01', 'MY19HDBSC02290F', 'Sumsung', 'Mornitor', '943SNXPLUS', 'Black', '-', 7, '2023-01-24 02:38:45', '2023-01-24 02:38:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `registration_logs`
--

CREATE TABLE `registration_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8IQ90LgnkauXfhONdh4VPx3G06Kj8Ddg7LzncVUB', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/109.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiQWFXWXNSYU5OT1RuaUJya3QxN2o3OEQzUnBDNjB2NU40Tk54R3NQaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RyYXRpb24iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDRkUGI5dEd0dkN1SnhVU1ZzN3UyZE85eUlQcENKLmdaaXFOSjZZZ08wdmlPQndrRnhybjd5Ijt9', 1674554051);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'thaen', 'thaenpong@gmail.com', NULL, '$2y$10$4dPb9tGtvCuJxUSVs7u2dO9yIPpCJ.gZiqNJ6YgO0viOBwkFxrn7y', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-24 00:34:46', '2023-01-24 00:34:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `property_keys`
--
ALTER TABLE `property_keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_logs`
--
ALTER TABLE `registration_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_keys`
--
ALTER TABLE `property_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration_logs`
--
ALTER TABLE `registration_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
