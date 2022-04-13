-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 10:14 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pprog_projekt_zaliczeniowy`
--

-- --------------------------------------------------------

--
-- Table structure for table `correct_answers`
--

CREATE TABLE `correct_answers` (
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `correct_answer` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `correct_answers`
--

INSERT INTO `correct_answers` (`question_id`, `correct_answer`) VALUES
(1, 3),
(2, 5),
(3, 9),
(4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `owner_id`, `created_at`, `updated_at`) VALUES
(1, 'test_course1', 'test_course1d', 2, '2021-10-21 10:43:12', '2022-03-16 18:56:50'),
(2, 'test_course2', 'test_course2d', 1, '2021-10-21 10:43:29', '2021-10-21 10:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `course_memberships`
--

CREATE TABLE `course_memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `access_level` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_memberships`
--

INSERT INTO `course_memberships` (`id`, `course_id`, `user_id`, `access_level`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, '2021-10-21 10:48:55', '2021-10-21 10:48:55'),
(2, 2, 1, 1, '2021-10-21 10:49:10', '2021-10-21 10:49:10'),
(4, 2, 2, 1, NULL, NULL),
(5, 2, 6, 1, '2022-03-17 19:18:03', '2022-03-17 19:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `course_membership_access_levels`
--

CREATE TABLE `course_membership_access_levels` (
  `level` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_membership_access_levels`
--

INSERT INTO `course_membership_access_levels` (`level`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1d', '2021-10-21 10:41:24', '2021-10-21 10:41:24'),
(2, 'test2', 'test2d', '2021-10-21 10:42:02', '2021-10-21 10:42:02');

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
(5, '2021_10_17_154655_create_courses_table', 1),
(6, '2021_10_17_161226_create_course_membership_access_levels_table', 1),
(7, '2021_10_17_161227_create_course_memberships_table', 1),
(8, '2021_10_21_174234_create_question_types_table', 1),
(9, '2021_10_21_174539_create_tests_table', 1),
(10, '2021_10_21_174540_create_test_questions_table', 1),
(11, '2021_10_21_174808_create_question_answers_table', 1),
(12, '2021_10_21_175024_create_correct_answers_table', 1),
(13, '2021_10_21_175458_create_test_accesses_table', 1),
(14, '2021_10_21_175643_create_test_approaches_table', 1),
(15, '2021_10_21_180327_create_test_approach_answers_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_answers`
--

CREATE TABLE `question_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answers`
--

INSERT INTO `question_answers` (`id`, `question_id`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '2021-10-21 15:39:06', '2021-10-21 15:39:06'),
(2, 1, '3', '2021-10-21 15:39:17', '2021-10-21 15:39:17'),
(3, 1, '4', '2021-10-21 15:39:29', '2021-10-21 15:39:29'),
(4, 2, '4', '2021-10-21 15:40:34', '2021-10-21 15:40:34'),
(5, 2, '5', '2021-10-21 15:40:42', '2021-10-21 15:40:42'),
(6, 2, '6', '2021-10-21 15:40:50', '2021-10-21 15:40:50'),
(7, 3, '6', '2021-10-21 15:41:09', '2021-10-21 15:41:09'),
(8, 3, '1', '2021-10-21 15:41:23', '2021-10-21 15:41:23'),
(9, 3, '5', '2021-10-21 15:41:31', '2021-10-21 15:41:31'),
(10, 4, '1', '2021-10-21 15:41:53', '2021-10-21 15:41:53'),
(11, 4, '2', '2021-10-21 15:42:00', '2021-10-21 15:42:00'),
(12, 4, '3', '2021-10-21 15:42:09', '2021-10-21 15:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `question_types`
--

CREATE TABLE `question_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_types`
--

INSERT INTO `question_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'test_1', '2021-10-21 10:52:51', '2021-10-21 10:52:51'),
(2, 'test_2', '2021-10-21 10:53:00', '2021-10-21 10:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `required_score` double NOT NULL DEFAULT 0,
  `duration` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `description`, `course_id`, `required_score`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test1d', 1, 3, '00:00:12', '2021-10-21 13:05:18', '2022-03-16 05:00:13'),
(2, 'test2', 'test2d', 2, 61, '00:00:12', '2021-10-21 13:07:39', '2022-03-15 21:38:27'),
(3, 'testTworzeniaTestu', 'testTworzeniaTestu', 1, 0, '00:00:00', '2022-03-16 19:31:30', '2022-03-16 19:31:50'),
(4, 'testTworzeniaTestu2', 'testTworzeniaTestu2', 1, 0, '00:00:10', '2022-03-16 19:32:37', '2022-03-16 19:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `test_accesses`
--

CREATE TABLE `test_accesses` (
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_accesses`
--

INSERT INTO `test_accesses` (`test_id`, `membership_id`, `expiration_date`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-21 15:28:31', '2021-10-21 15:26:05', '2021-10-21 15:26:05'),
(1, 2, '2022-10-21 15:28:56', '2021-10-21 15:28:58', '2021-10-21 15:28:58'),
(2, 1, '2022-10-21 15:29:10', '2021-10-21 15:29:12', '2021-10-21 15:29:12'),
(2, 2, '2022-10-21 15:29:22', '2021-10-21 15:29:23', '2021-10-21 15:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `test_approaches`
--

CREATE TABLE `test_approaches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `membership_id` bigint(20) UNSIGNED NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_approach_answers`
--

CREATE TABLE `test_approach_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_approach_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `given_answer_id` bigint(20) UNSIGNED NOT NULL,
  `score_awarded` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `question_type` bigint(20) UNSIGNED NOT NULL,
  `max_points` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`id`, `question_text`, `test_id`, `question_type`, `max_points`, `created_at`, `updated_at`) VALUES
(1, 'How many is 2+2?', 1, 1, 4, '2021-10-21 13:19:41', '2021-10-21 13:19:41'),
(2, 'How many is 2+3?', 1, 1, 2, '2021-10-21 13:20:03', '2021-10-21 13:20:03'),
(3, 'How many is 2+3?', 2, 1, 6, '2021-10-21 13:20:34', '2021-10-21 13:20:34'),
(4, 'How many is 3?', 2, 1, 61, '2021-10-21 13:21:00', '2021-10-21 13:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(96) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test1', 'test11@t', '$argon2id$v=19$m=1024,t=2,p=2$cWx6Ry9aSi9Ec0tmQWsvZA$d3+jE8cyUQC64Sn0jJC5THsyaWqNk1dCh4XiQzcnNK8', NULL, 'gWhExnaZIL1P7FFHtJ7GD7NGquxQco8edFtKKhrDhXvPFL7eO1ZOfRsSvFeJ', '2021-10-21 10:37:24', '2022-01-28 18:14:23'),
(2, 'test2', 'test2@t', '$argon2id$v=19$m=1024,t=2,p=2$Mzg5OWQ2TGJkMnNMZE10Tg$NBGBs+40vAorjVd+paFLFa1akznxOxPql7Bb/Jg8iMY', NULL, 'wQiD4pM2blEgQILk2NLS9s8AI4zJTpBGKH8dxBYjZaOmDl0hx2LIfcjonfhZ', '2021-10-21 10:39:17', '2022-03-06 16:25:11'),
(3, 'test', 'test@test', '$argon2id$v=19$m=1024,t=2,p=2$WlJka2ZIREhhc0xqb3pNNA$Eur2XBV', NULL, NULL, '2021-10-31 17:01:55', '2021-10-31 17:01:55'),
(4, 'użytkownik', 'urzytkownik@w', '$argon2id$v=19$m=1024,t=2,p=2$eC4ubTNhQWFKMlNLUkE0NQ$uqkYzYj', NULL, NULL, '2021-10-31 17:02:54', '2021-10-31 17:02:54'),
(5, 'abc', 'abcabc@w', '$argon2id$v=19$m=1024,t=2,p=2$UXIydnlrZzdyMlBWdTFMLw$lf5YQAY', NULL, NULL, '2021-10-31 18:03:52', '2021-10-31 18:03:52'),
(6, 'test3', 'test3@t', '$argon2id$v=19$m=1024,t=2,p=2$US4zUThIMEtnekM4am1FeQ$F7bCn+7ODPDmbakZadeqOlV4igaOH8y8t2mYFH3NFBw', NULL, NULL, '2022-03-06 16:42:52', '2022-03-06 16:42:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `correct_answers`
--
ALTER TABLE `correct_answers`
  ADD KEY `correct_answers_question_id_foreign` (`question_id`),
  ADD KEY `correct_answers_correct_answer_foreign` (`correct_answer`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_memberships`
--
ALTER TABLE `course_memberships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_memberships_course_id_user_id_unique` (`course_id`,`user_id`),
  ADD KEY `course_memberships_user_id_foreign` (`user_id`),
  ADD KEY `course_memberships_access_level_foreign` (`access_level`);

--
-- Indexes for table `course_membership_access_levels`
--
ALTER TABLE `course_membership_access_levels`
  ADD PRIMARY KEY (`level`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `question_types`
--
ALTER TABLE `question_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tests_course_id_foreign` (`course_id`);

--
-- Indexes for table `test_accesses`
--
ALTER TABLE `test_accesses`
  ADD KEY `test_accesses_test_id_foreign` (`test_id`),
  ADD KEY `test_accesses_membership_id_foreign` (`membership_id`);

--
-- Indexes for table `test_approaches`
--
ALTER TABLE `test_approaches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_approaches_membership_id_foreign` (`membership_id`),
  ADD KEY `test_approaches_test_id_foreign` (`test_id`);

--
-- Indexes for table `test_approach_answers`
--
ALTER TABLE `test_approach_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_approach_answers_test_approach_id_foreign` (`test_approach_id`),
  ADD KEY `test_approach_answers_question_id_foreign` (`question_id`),
  ADD KEY `test_approach_answers_given_answer_id_foreign` (`given_answer_id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test_questions_test_id_foreign` (`test_id`),
  ADD KEY `test_questions_question_type_foreign` (`question_type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_memberships`
--
ALTER TABLE `course_memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_membership_access_levels`
--
ALTER TABLE `course_membership_access_levels`
  MODIFY `level` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_answers`
--
ALTER TABLE `question_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `question_types`
--
ALTER TABLE `question_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test_approaches`
--
ALTER TABLE `test_approaches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_approach_answers`
--
ALTER TABLE `test_approach_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `correct_answers`
--
ALTER TABLE `correct_answers`
  ADD CONSTRAINT `correct_answers_correct_answer_foreign` FOREIGN KEY (`correct_answer`) REFERENCES `question_answers` (`id`),
  ADD CONSTRAINT `correct_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `test_questions` (`id`);

--
-- Constraints for table `course_memberships`
--
ALTER TABLE `course_memberships`
  ADD CONSTRAINT `course_memberships_access_level_foreign` FOREIGN KEY (`access_level`) REFERENCES `course_membership_access_levels` (`level`),
  ADD CONSTRAINT `course_memberships_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `question_answers`
--
ALTER TABLE `question_answers`
  ADD CONSTRAINT `question_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `test_questions` (`id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `tests_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `test_accesses`
--
ALTER TABLE `test_accesses`
  ADD CONSTRAINT `test_accesses_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `course_memberships` (`id`),
  ADD CONSTRAINT `test_accesses_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`);

--
-- Constraints for table `test_approaches`
--
ALTER TABLE `test_approaches`
  ADD CONSTRAINT `test_approaches_membership_id_foreign` FOREIGN KEY (`membership_id`) REFERENCES `course_memberships` (`id`),
  ADD CONSTRAINT `test_approaches_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`);

--
-- Constraints for table `test_approach_answers`
--
ALTER TABLE `test_approach_answers`
  ADD CONSTRAINT `test_approach_answers_given_answer_id_foreign` FOREIGN KEY (`given_answer_id`) REFERENCES `question_answers` (`id`),
  ADD CONSTRAINT `test_approach_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `test_questions` (`id`),
  ADD CONSTRAINT `test_approach_answers_test_approach_id_foreign` FOREIGN KEY (`test_approach_id`) REFERENCES `test_approaches` (`id`);

--
-- Constraints for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD CONSTRAINT `test_questions_question_type_foreign` FOREIGN KEY (`question_type`) REFERENCES `question_types` (`id`),
  ADD CONSTRAINT `test_questions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
