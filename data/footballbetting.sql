-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2016 at 03:03 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `footballbetting`
--

-- --------------------------------------------------------

--
-- Table structure for table `bettings`
--

CREATE TABLE IF NOT EXISTS `bettings` (
`id` int(10) unsigned NOT NULL,
  `match_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `bets` int(11) NOT NULL,
  `money_bet` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Dumping data for table `bettings`
--

INSERT INTO `bettings` (`id`, `match_id`, `user_id`, `bets`, `money_bet`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 2, 2000, '2016-07-01 08:20:13', '2016-07-01 08:20:13'),
(2, 2, 2, 3, 1000, '2016-07-01 08:21:20', '2016-07-01 08:21:20'),
(3, 5, 2, 3, 1000, NULL, NULL),
(4, 10, 2, 1, 2000, '2016-07-02 09:53:13', '2016-07-02 09:53:13'),
(5, 10, 1, 2, 3000, '2016-07-02 10:52:21', '2016-07-02 10:52:21'),
(6, 3, 1, 2, 2000, '2016-07-02 11:16:53', '2016-07-02 11:16:53'),
(7, 2, 1, 1, 1000, '2016-07-02 11:18:28', '2016-07-02 11:18:28'),
(9, 11, 1, 1, 2000, '2016-07-02 16:13:37', '2016-07-02 16:13:37'),
(10, 11, 2, 2, 1000, '2016-07-02 16:14:23', '2016-07-02 16:14:23'),
(11, 11, 3, 1, 2000, '2016-07-02 16:15:23', '2016-07-02 16:15:23'),
(12, 12, 1, 1, 5000, '2016-07-03 16:52:26', '2016-07-03 16:52:26'),
(13, 12, 4, 2, 1000, '2016-07-03 16:53:53', '2016-07-03 16:53:53'),
(14, 14, 1, 1, 4000, '2016-07-03 17:32:47', '2016-07-03 17:32:47'),
(15, 13, 1, 2, 3000, '2016-07-03 17:33:23', '2016-07-03 17:33:23'),
(16, 12, 2, 2, 1000, '2016-07-03 17:34:30', '2016-07-03 17:34:30'),
(17, 14, 2, 1, 1500, '2016-07-03 17:35:11', '2016-07-03 17:35:11'),
(18, 13, 2, 3, 1000, '2016-07-03 17:35:28', '2016-07-03 17:35:28'),
(19, 12, 3, 2, 1000, '2016-07-03 17:36:21', '2016-07-03 17:36:21'),
(20, 13, 3, 1, 1500, '2016-07-03 17:36:46', '2016-07-03 17:36:46'),
(21, 14, 4, 3, 1000, '2016-07-03 17:38:32', '2016-07-03 17:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE IF NOT EXISTS `matchs` (
`id` int(10) unsigned NOT NULL,
  `hometeam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `awayteam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `homegoal` int(11) NOT NULL,
  `awaygoal` int(11) NOT NULL,
  `timestart` datetime NOT NULL,
  `timeend` datetime NOT NULL,
  `timebet` datetime NOT NULL,
  `win` double(8,2) NOT NULL,
  `draw` double(8,2) NOT NULL,
  `lose` double(8,2) NOT NULL,
  `status` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `hometeam`, `awayteam`, `homegoal`, `awaygoal`, `timestart`, `timeend`, `timebet`, `win`, `draw`, `lose`, `status`, `level`, `created_at`, `updated_at`) VALUES
(2, 'Đức', 'Italia', 0, 0, '2016-07-04 02:00:00', '2016-07-04 05:00:00', '2016-07-04 01:45:00', 3.15, 2.40, 3.85, 0, 0, '2016-06-30 02:15:27', '2016-06-30 02:15:28'),
(3, 'Pháp', 'Iceland', 0, 0, '2016-07-03 02:00:00', '2016-07-03 05:00:00', '2016-07-03 01:45:00', 1.50, 2.80, 3.25, 0, 0, '2016-06-30 02:17:17', '2016-06-30 02:17:17'),
(4, 'Bồ Đào Nha', 'Wales', 0, 0, '2016-07-08 02:00:00', '2016-07-08 05:00:00', '2016-07-08 01:45:00', 2.75, 3.00, 2.00, 0, 1, '2016-06-30 02:20:23', '2016-07-02 16:43:29'),
(5, 'Wales', 'Bỉ', 3, 1, '2016-07-02 02:00:00', '2016-07-02 05:00:00', '2016-07-02 01:45:00', 3.50, 2.50, 1.50, 1, 0, '2016-06-30 02:46:33', '2016-06-30 02:46:33'),
(6, 'Ba Lan', 'Bồ Đào Nha', 1, 1, '2016-07-01 02:00:00', '2016-07-01 05:00:00', '2016-07-01 01:45:00', 3.00, 2.50, 1.75, 1, 0, '2016-06-30 02:59:45', '2016-06-30 02:59:45'),
(8, 'Đức', 'Pháp', 0, 0, '2016-07-07 02:00:00', '2016-07-07 05:00:00', '2016-07-07 01:45:00', 2.50, 2.00, 3.00, 0, 1, '2016-06-30 04:31:03', '2016-07-02 09:56:01'),
(10, 'Việt Nam', 'Lào', 4, 1, '2016-07-01 17:00:00', '2016-07-01 19:00:00', '2016-07-01 16:50:00', 1.00, 2.50, 3.50, 1, 0, '2016-06-30 06:51:55', '2016-07-02 16:09:38'),
(11, 'Thái Lan', 'Singapo', 0, 0, '2016-07-03 15:00:00', '2016-07-03 17:00:00', '2016-04-03 14:55:00', 1.30, 2.50, 3.00, 0, 0, '2016-07-02 16:13:04', '2016-07-02 16:13:04'),
(12, 'Việt Nam', 'Brazil', 0, 0, '2016-07-04 08:30:00', '2016-07-04 10:30:00', '2016-07-04 08:25:00', 4.00, 2.00, 1.30, 0, 0, '2016-07-02 16:47:10', '2016-07-03 16:50:25'),
(13, 'Brazil', 'Argentina', 0, 0, '2016-07-04 03:00:00', '2016-07-04 05:00:00', '2016-07-04 02:50:00', 2.50, 3.50, 5.00, 0, 0, '2016-07-03 17:29:42', '2016-07-03 17:30:33'),
(14, 'Chile', 'Campuchia', 0, 0, '2016-07-04 04:00:00', '2016-07-04 06:00:00', '2016-07-04 03:55:00', 0.75, 2.50, 3.00, 0, 0, '2016-07-03 17:32:03', '2016-07-03 17:32:20');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_06_27_015033_create_matchs_table', 1),
('2016_06_27_021118_create_betting_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `money`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$bBF//lsa08aAD6cAlurE.euDrRhA4r0koiJQxlQ6ZYUgqAOjEJfT2', 8000, 1, 'Lj8M1IBHTWnh3DXCCGhv9ZMgYBhcsBZn9mlOzF1V4Ksx0gIMcKaACJpgyTeG', '2016-06-28 07:35:51', '2016-07-03 17:33:49'),
(2, 'user1', 'user1@gmail.com', '$2y$10$Mw.B1/p0cIw0cjjv6PZEeObxsWUdxhvPgKmgf5b7mhISnxzb1m.wi', 2500, 0, 'WyZ3xe83BNEK5EdGBTe9Yvb5wMcIAnheBR9xOJ1rC9oSiCFxob6S9SuvgrSW', '2016-06-28 07:35:51', '2016-07-03 17:35:33'),
(3, 'user2', 'user2@gmail.com', '$2y$10$Ezljz1W80BofxsRhqk2eSuDKihWVttz146MF/xHMEKQU4QRA6CwIW', 5500, 0, 'y2MUGDTOBrv8qc3H0kDq69zfJycHSMD5XbQLnLR7hQByCT5MbWCCuW3keMNK', '2016-06-28 07:35:51', '2016-07-03 17:36:52'),
(4, 'user3', 'user3@gmail.com', '$2y$10$SszLwL1bhALscHxnuSyJ8ewY6ncmJGt4MRWOnlv.nTT16B/fIE6I.', 3000, 0, 'wsaMpKVbqTFNzBPi4tx2NvGV4CeGQLL0wHF0znzoqTNFtLNQBCyB5ECczZD2', '2016-07-03 16:08:14', '2016-07-03 17:39:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bettings`
--
ALTER TABLE `bettings`
 ADD PRIMARY KEY (`id`), ADD KEY `bettings_match_id_foreign` (`match_id`), ADD KEY `bettings_user_id_foreign` (`user_id`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_username_unique` (`username`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bettings`
--
ALTER TABLE `bettings`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bettings`
--
ALTER TABLE `bettings`
ADD CONSTRAINT `bettings_match_id_foreign` FOREIGN KEY (`match_id`) REFERENCES `matchs` (`id`) ON DELETE CASCADE,
ADD CONSTRAINT `bettings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
