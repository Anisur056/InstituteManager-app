-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2025 at 08:53 AM
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
-- Database: `test_laravel_ima`
--

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
(1, '0001_01_01_000000_install_database_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_academic_years`
--

CREATE TABLE `tbl_academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year_en` varchar(255) DEFAULT NULL,
  `year_bn` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_academic_years`
--

INSERT INTO `tbl_academic_years` (`id`, `year_en`, `year_bn`, `display_order`, `created_at`, `updated_at`) VALUES
(1, '2025', '২০২৫', 1, '2025-08-15 00:51:54', '2025-08-15 00:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`id`, `name_en`, `name_bn`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'PLAY', 'প্লে', 1, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(2, 'NURSERY', 'নার্সারী', 2, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(3, 'ONE', 'প্রথম', 3, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(4, 'TWO', 'দ্বিতীয়', 4, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(5, 'THREE', 'তৃতীয়', 5, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(6, 'FOUR', 'চতুর্থ', 6, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(7, 'HIFZ NAZERA', 'হিফজ নাজেরা', 7, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(8, 'HIFZ INTERNATIONAL', 'হিফজ আন্তর্জাতিক', 8, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(9, 'HIFZ RIVISION', 'হিফজ রিভিশন', 9, '2025-08-15 00:51:54', '2025-08-15 00:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE `tbl_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `enrolled_date` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `birth_reg` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `health_issues` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL DEFAULT 'Bangladeshi',
  `contact_sms` varchar(255) DEFAULT NULL,
  `contact_whatsapp` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `father_name_en` varchar(255) DEFAULT NULL,
  `father_name_bn` varchar(255) DEFAULT NULL,
  `father_contact` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_birth_reg` varchar(255) DEFAULT NULL,
  `father_nid` varchar(255) DEFAULT NULL,
  `father_income` varchar(255) DEFAULT NULL,
  `mother_name_en` varchar(255) DEFAULT NULL,
  `mother_name_bn` varchar(255) DEFAULT NULL,
  `mother_contact` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_birth_reg` varchar(255) DEFAULT NULL,
  `mother_nid` varchar(255) DEFAULT NULL,
  `mother_income` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_relation` varchar(255) DEFAULT NULL,
  `emergency_contact_contact` varchar(255) DEFAULT NULL,
  `emergency_contact_address` varchar(255) DEFAULT NULL,
  `previous_institute` varchar(255) DEFAULT NULL,
  `previous_institute_address` varchar(255) DEFAULT NULL,
  `previous_institute_experiance` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institutes`
--

CREATE TABLE `tbl_institutes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `address_en` varchar(255) DEFAULT NULL,
  `address_bn` varchar(255) DEFAULT NULL,
  `eiin_number` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `map` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_institutes`
--

INSERT INTO `tbl_institutes` (`id`, `name_en`, `name_bn`, `address_en`, `address_bn`, `eiin_number`, `mobile`, `email`, `website`, `logo`, `map`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Sirikotia Hafezia Nurani Model Madrasha', 'ছিরিকোটিয়া হাফেজিয়া নূরানী মডেল মাদ্রাসা', 'Biswash Para, kattoli, Akborsha, CTG', 'বিশ্বাসপাড়া আগ্রাবাদ চট্টগ্রাম', '', '', '', '', '', '', 1, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(2, 'AMN Islamia Madrasha', 'এএমএন ইসলামিয়া মাদ্রাসা', 'Lotifpur, Akborsha, CTG', 'লতিফপুর, আকবরশাহ্, চট্টগ্রাম', '', '', '', '', '', '', 2, '2025-08-15 00:51:54', '2025-08-15 00:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shifts`
--

CREATE TABLE `tbl_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shifts`
--

INSERT INTO `tbl_shifts` (`id`, `name_en`, `name_bn`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'Day Shift', 'দিনের শিফট/বিদা শাখা', 1, '2025-08-15 00:51:54', '2025-08-15 00:51:54'),
(2, 'Moktob Shift', 'মক্তব শাখা', 2, '2025-08-15 00:51:54', '2025-08-15 00:51:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `enrolled_date` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `academic_year` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `shift` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `roll` varchar(255) DEFAULT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `date_of_birth` varchar(255) DEFAULT NULL,
  `birth_reg` varchar(255) DEFAULT NULL,
  `nid` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `health_issues` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) NOT NULL DEFAULT 'Bangladeshi',
  `contact_sms` varchar(255) DEFAULT NULL,
  `contact_whatsapp` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `present_address` varchar(255) DEFAULT NULL,
  `permanent_address` varchar(255) DEFAULT NULL,
  `father_name_en` varchar(255) DEFAULT NULL,
  `father_name_bn` varchar(255) DEFAULT NULL,
  `father_contact` varchar(255) DEFAULT NULL,
  `father_occupation` varchar(255) DEFAULT NULL,
  `father_birth_reg` varchar(255) DEFAULT NULL,
  `father_nid` varchar(255) DEFAULT NULL,
  `father_income` varchar(255) DEFAULT NULL,
  `mother_name_en` varchar(255) DEFAULT NULL,
  `mother_name_bn` varchar(255) DEFAULT NULL,
  `mother_contact` varchar(255) DEFAULT NULL,
  `mother_occupation` varchar(255) DEFAULT NULL,
  `mother_birth_reg` varchar(255) DEFAULT NULL,
  `mother_nid` varchar(255) DEFAULT NULL,
  `mother_income` varchar(255) DEFAULT NULL,
  `local_guardian_name_en` varchar(255) DEFAULT NULL,
  `local_guardian_name_bn` varchar(255) DEFAULT NULL,
  `local_guardian_relation` varchar(255) DEFAULT NULL,
  `local_guardian_contact` varchar(255) DEFAULT NULL,
  `local_guardian_nid` varchar(255) DEFAULT NULL,
  `local_guardian_address` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) DEFAULT NULL,
  `emergency_contact_relation` varchar(255) DEFAULT NULL,
  `emergency_contact_contact` varchar(255) DEFAULT NULL,
  `emergency_contact_address` varchar(255) DEFAULT NULL,
  `previous_institute` varchar(255) DEFAULT NULL,
  `previous_institute_address` varchar(255) DEFAULT NULL,
  `previous_institute_tc_number` varchar(255) DEFAULT NULL,
  `previous_institute_tc_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'guest',
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `full_name`, `phone_number`, `email`, `role`, `password`, `profile_pic`, `created_at`, `updated_at`) VALUES
(1, 'anis', 'Anisur Rahman', '01871123427', 'anis14109@gmail.com', 'admin', '$2y$12$FcrUq8Sgu9mmzo40oxyxye3AuRz429REvqcj7hda0BBuOEfMiJNt.', 'assets/admin/img/users/anis.jpg', '2025-08-15 00:51:53', '2025-08-15 00:51:53'),
(2, 'rofiq', 'Rofiqul Islam', '', '', 'admin', '$2y$12$cAuAksVVpxKiNQ0al6GiV.GFte/xO9Ga3gKqPyz0IeOH0uCi0WqHK', '', '2025-08-15 00:51:54', '2025-08-15 00:51:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_academic_years`
--
ALTER TABLE `tbl_academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_institutes`
--
ALTER TABLE `tbl_institutes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shifts`
--
ALTER TABLE `tbl_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_academic_years`
--
ALTER TABLE `tbl_academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_institutes`
--
ALTER TABLE `tbl_institutes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_shifts`
--
ALTER TABLE `tbl_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
