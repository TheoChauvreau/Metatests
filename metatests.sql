-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 25, 2018 at 04:45 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metatests`
--

-- --------------------------------------------------------

--
-- Table structure for table `alt_message_receiveds`
--

CREATE TABLE `alt_message_receiveds` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `Bot` tinyint(1) NOT NULL,
  `Message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alt_message_receiveds`
--

INSERT INTO `alt_message_receiveds` (`id`, `message_id`, `Bot`, `Message`, `created_at`, `updated_at`) VALUES
(93, 35, 1, 'Bonjour !', '2018-10-23 07:40:15', '2018-10-23 07:40:15'),
(94, 35, 1, 'Salut :)', '2018-10-23 07:40:15', '2018-10-23 07:40:15'),
(95, 37, 1, 'Je me sens bien dans mes baskets aujourd\'hui !', '2018-10-23 07:42:37', '2018-10-23 07:42:37'),
(96, 37, 1, 'Très bien merci', '2018-10-23 07:42:37', '2018-10-23 07:42:37'),
(103, 41, 1, 'Salut :)', '2018-10-23 10:50:29', '2018-10-23 10:50:29'),
(104, 41, 1, 'Bonjour !', '2018-10-23 10:50:29', '2018-10-23 10:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `alt_message_sents`
--

CREATE TABLE `alt_message_sents` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `Bot` tinyint(1) NOT NULL,
  `Message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `Nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `Nom`, `created_at`, `updated_at`) VALUES
(5, 'Greetings', '2018-10-23 07:39:39', '2018-10-23 07:39:39'),
(9, 'test', '2018-10-23 10:49:59', '2018-10-23 10:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `message_receiveds`
--

CREATE TABLE `message_receiveds` (
  `id` int(10) UNSIGNED NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `conv_id` int(11) NOT NULL,
  `message_received` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_receiveds`
--

INSERT INTO `message_receiveds` (`id`, `bot`, `conv_id`, `message_received`, `created_at`, `updated_at`) VALUES
(35, 1, 5, 'Salut :)', '2018-10-23 07:40:07', '2018-10-23 07:40:07'),
(37, 1, 5, 'Très bien merci', '2018-10-23 07:42:20', '2018-10-23 07:42:20'),
(41, 1, 9, 'Salut :)', '2018-10-23 10:50:13', '2018-10-23 10:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `message_sents`
--

CREATE TABLE `message_sents` (
  `id` int(10) UNSIGNED NOT NULL,
  `bot` tinyint(1) NOT NULL,
  `conv_id` int(11) NOT NULL,
  `message_sent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message_sents`
--

INSERT INTO `message_sents` (`id`, `bot`, `conv_id`, `message_sent`, `created_at`, `updated_at`) VALUES
(6, 0, 5, 'Hey !', '2018-10-23 07:39:54', '2018-10-23 07:39:54'),
(7, 0, 5, 'ça va ?', '2018-10-23 07:40:32', '2018-10-23 07:40:32'),
(11, 0, 9, 'Salut', '2018-10-23 10:50:05', '2018-10-23 10:50:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_17_100635_create_conversations_table', 1),
(4, '2018_09_28_090245_create_message_sents_table', 1),
(5, '2018_09_28_090254_create_message_receiveds_table', 1),
(6, '2018_09_28_132834_create_alt_message_sents_table', 1),
(7, '2018_09_28_132843_create_alt_message_receiveds_table', 1),
(8, '2018_10_09_091730_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Théo', 'theo.chauvreau@metapolis.fr', NULL, '$2y$10$t5caY87gCFzw/9OMh3VW6.SV0qKIN8KSZoXGqrJ7rju85o.T7nHEm', 'rWnrlOQ9lhTOU1Pc5Ks0qpJBXzKnRQZay9gAyCs5w7l7Ldzzi730UdppQVJo', '2018-10-10 07:32:01', '2018-10-10 07:32:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alt_message_receiveds`
--
ALTER TABLE `alt_message_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alt_message_sents`
--
ALTER TABLE `alt_message_sents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_receiveds`
--
ALTER TABLE `message_receiveds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_sents`
--
ALTER TABLE `message_sents`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alt_message_receiveds`
--
ALTER TABLE `alt_message_receiveds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `alt_message_sents`
--
ALTER TABLE `alt_message_sents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message_receiveds`
--
ALTER TABLE `message_receiveds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `message_sents`
--
ALTER TABLE `message_sents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
