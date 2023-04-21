-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 21, 2023 at 03:53 AM
-- Server version: 8.0.29
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` bigint UNSIGNED NOT NULL,
  `library_id` bigint UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_version` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comparisons`
--

DROP TABLE IF EXISTS `comparisons`;
CREATE TABLE IF NOT EXISTS `comparisons` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `library_id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comparisons`
--

INSERT INTO `comparisons` (`id`, `library_id`, `account_id`, `note`, `updated_at`, `created_at`) VALUES
(51, 10183, 1, 'What Ok2123234asd', '2023-04-20 09:05:23', '2023-04-20 06:14:43'),
(52, 10186, 1, 'ok?', '2023-04-20 06:25:49', '2023-04-20 06:14:57');

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
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `language_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`language_id`, `name`) VALUES
(12, 'CSS'),
(13, 'Javascript'),
(14, 'HTML'),
(15, 'PHP'),
(18, 'C++'),
(19, 'Python'),
(20, 'C#'),
(21, 'Ruby'),
(22, 'Lua'),
(23, 'Java'),
(24, 'R'),
(25, 'Octave'),
(26, 'Cython'),
(27, 'C'),
(28, 'Melayu');

-- --------------------------------------------------------

--
-- Table structure for table `libraries`
--

DROP TABLE IF EXISTS `libraries`;
CREATE TABLE IF NOT EXISTS `libraries` (
  `library_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'This is the library id, serves as the primary key for each of the library recorded in SOLAS',
  `name` varchar(100) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Not Specified',
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `command` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_file` tinyint(1) DEFAULT '0',
  `creator_id` int NOT NULL,
  PRIMARY KEY (`library_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`library_id`, `name`, `description`, `license`, `views`, `command`, `link`, `is_file`, `creator_id`) VALUES
(10183, 'The SHOGUN machine learning toolbox', 'Shogun is a free, open-source machine learning software library written in C++. It offers numerous algorithms and data structures for machine learning problems. It offers interfaces for Octave, Python, R, Java, Lua, Ruby and C# using SWIG.\r\n\r\nIt is licensed under the terms of the GNU General Public License version 3 or later.', 'GNU General Public License (GPL) Version 3 or later', 107, NULL, 'https://github.com/shogun-toolbox/shogun', 0, 13),
(10186, 'CryptoCompare', 'Python3 wrapper to query cryptocurrency prices (and more) using the CryptoCompare API.', 'MIT License', 287, 'pip3 install cryptocompare', NULL, 1, 14),
(10187, 'Cryptocurrency Exchange Feed Handler', 'Handles multiple cryptocurrency exchange data feeds and returns normalized and standardized results to client registered callbacks for events like trades, book updates, ticker updates, etc. Utilizes websockets when possible, but can also poll data via REST endpoints if a websocket is not provided.', 'XFree86', 2, 'pip install cryptofeed', 'https://github.com/bmoscon/cryptofeed', 1, 14),
(10188, 'Asio C++ library', 'Asio is a freely available, open-source, cross-platform C++ library for network programming. It provides developers with a consistent asynchronous I/O model using a modern C++ approach. Boost.Asio was accepted into the Boost library on 30 December 2005 after a 20-day review. The library has been developed by Christopher M. Kohlhoff since 2003. A networking proposal based on Asio was submitted to the C++ standards committee in 2006 for possible inclusion in the second Technical Report on C++ Library Extensions (TR2).', 'Boost Software License', 2, NULL, 'https://think-async.com/Asio/', 1, 15),
(10189, 'cryptography', 'cryptography is a package which provides cryptographic recipes and primitives to Python developers. Our goal is for it to be your “cryptographic standard library”. It supports Python 3.6+ and PyPy3 7.3.10+.', 'Apache Software License, BSD License ((Apache-2.0 OR BSD-3-Clause) AND PSF-2.0)', 3, 'pip install cryptography', 'https://pypi.org/project/cryptography/', 1, 15),
(10190, 'Hypatia', 'Hypatia, a Greek mathematician, 355-415 C.E. Considered by many to be the first female mathematician of note.\r\n\r\nHypatia is a single-file-header, pure-C math library. It is almost 100% C89/C90 compliant. This library is intended for use in 2d/3d graphics program (such as games). Since it is not a general purpose math library, but a library meant for 3d graphics, certain opinions have been expressed in its design. One of those design choices, intended to help with speed, is that all objects (quaternions, matrices, vectors) are mutable. (That means that the objects change their values.) This was a purposeful design choice. Construct your program around this choice.', 'open source license', 0, NULL, 'https://dagostinelli.github.io/hypatia/', 1, 16),
(10191, 'MathFu', 'MathFu is a C++ math library developed primarily for games focused on simplicity and efficiency.\r\n\r\nIt provides a suite of vector, matrix and quaternion classes to perform basic geometry suitable for game developers. This functionality can be used to construct geometry for graphics libraries like OpenGL or perform calculations for animation or physics systems.', 'Apache License 2.0', 3, NULL, 'https://google.github.io/mathfu/', 1, 16),
(10192, 'astar-algorithm', 'This code is an efficient implementation in C++ and C# of the A* algorithm, designed to be used from high performance realtime applications (video games) and with an optional fast memory allocation scheme.\r\n\r\nIt accompanies this A* tutorial: https://www.heyes-jones.com/astar.php\r\n\r\nThe A* algorithm was described in the paper https://ieeexplore.ieee.org/document/4082128 by Hart, Nillson and Raphael.\r\n\r\nSadly Nils Nillson passed away in 2019, his work is much appreciated.', 'MIT License', 0, NULL, 'https://github.com/justinhj/astar-algorithm-cpp', 1, 17),
(10193, 'Pygame', 'Over the next weeks we have plenty of game jams that people from the pygame communities take part in.\r\n\r\nThe pygames hackathon runs from March 20th, 2023 to April 17th 2023, and is open to people in USA and Canada. For this one there\'s $12,700 in prizes. \"If you love programming and gaming, this is the perfect opportunity to showcase your skills and have some fun!\"\r\n\r\nThen the must-use-python PyWeek challenge \"Invites entrants to write a game in one week from scratch either as an individual or in a team. Is intended to be challenging and fun. Will hopefully increase the public body of python game tools, code and expertise. Will let a lot of people actually finish a game, and may inspire new projects (with ready made teams!).\" PyWeek runs from March 26nd, 2023 to April 2nd 2023, and theme voting is already on.\r\n\r\nFinally, Ludum Dare is an event where you create a game from scratch in a weekend based on a theme. April 28th, 2023. Starts at 3:00 AM CEST *. Ludumdare is the oldest online game jam, and has the largest number of participants. There is a Jam (72h, less restrictive rules), and a compo (48h more rules). The Jam now lets people submit paper board games, and even things like crafts that aren\'t games at all!', 'GNU LGPL version 2.1,', 0, 'python -m pip install -U pygame==2.3.0 --user', 'https://www.pygame.org/news', 1, 17),
(10194, 'OpenAI baselines', 'OpenAI Baselines is a set of high-quality implementations of reinforcement learning algorithms.\r\nThese algorithms will make it easier for the research community to replicate, refine, and identify new ideas, and will create good baselines to build research on top of. Our DQN implementation and its variants are roughly on par with the scores in published papers. We expect they will be used as a base around which new ideas can be added, and as a tool for comparing a new approach against existing ones.', 'MIT License', 5, 'pip install virtualenv', 'https://github.com/openai/baselines', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `library_languages`
--

DROP TABLE IF EXISTS `library_languages`;
CREATE TABLE IF NOT EXISTS `library_languages` (
  `library_id` bigint UNSIGNED DEFAULT NULL,
  `language_id` int UNSIGNED DEFAULT NULL,
  KEY `library_id` (`library_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `library_languages`
--

INSERT INTO `library_languages` (`library_id`, `language_id`) VALUES
(10183, 20),
(10183, 21),
(10183, 22),
(10183, 23),
(10183, 24),
(10183, 19),
(10183, 25),
(10183, 18),
(10186, 19),
(10187, 26),
(10187, 19),
(10188, 18),
(10189, 19),
(10190, 27),
(10191, 18),
(10192, 18),
(10193, 19),
(10194, 14),
(10194, 19);

-- --------------------------------------------------------

--
-- Table structure for table `library_tags`
--

DROP TABLE IF EXISTS `library_tags`;
CREATE TABLE IF NOT EXISTS `library_tags` (
  `library_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `library_tags`
--

INSERT INTO `library_tags` (`library_id`, `tag_id`) VALUES
(10183, 22),
(10183, 19),
(10186, 24),
(10186, 21),
(10187, 24),
(10188, 25),
(10188, 22),
(10189, 26),
(10190, 27),
(10190, 28),
(10190, 29),
(10190, 30),
(10191, 31),
(10191, 32),
(10191, 30),
(10191, 33),
(10192, 34),
(10193, 35),
(10193, 36),
(10194, 37),
(10194, 19);

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(49, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(50, '2019_08_19_000000_create_failed_jobs_table', 1),
(51, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(52, '2020_05_21_100000_create_teams_table', 1),
(53, '2020_05_21_200000_create_team_user_table', 1),
(54, '2020_05_21_300000_create_team_invitations_table', 1),
(55, '2023_02_18_165949_create_sessions_table', 1),
(56, '2023_02_18_171237_add_more_fields_to_users_table', 1),
(57, '2023_02_20_020011_added_updated_at_library', 2),
(59, '2023_02_20_170630_create_table_version', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `library_id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `library_id`, `account_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(5, 10186, 15, 5, 'Really useful for my project', '2023-04-18 09:31:00', '2023-04-18 09:31:00'),
(6, 10186, 14, 1, 'Actually Unusable. Installation instruction not clear', '2023-04-18 09:31:46', '2023-04-18 09:31:46'),
(7, 10186, 13, 4, 'It was fine until it stopped working. Tried to contact support. no response so far. Would recommend once its up again. :)', '2023-04-18 09:32:53', '2023-04-18 09:32:53'),
(9, 10189, 1, 4, 'This is the best library eva!!!!!', '2023-04-20 06:13:52', '2023-04-20 06:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bATMAogglWAeFDqgKbckEqK9yIm846Im7hBCTCkx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmtLczdiSHFZa0FwVEoxZklWYWRQRmxZV0t4akZxMXpDS3I4VHlwWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9saWJyYXJ5L2FsbCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1681979282),
('I7KHWeliBKxulN4YEUuzYlRTefPCV4T8eMGcrBSP', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVW9UMUd4bmdibEo4a2hxWW5wQ2ZxQ2dRU0lrbWU1N3djMTNjMUtwaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2NvbXBhcmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1681979281),
('iRCRTJRacCLWJ0NpnjFSH5L94yjGkz7CsetGrwjX', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYldSeUdoOFFiY2NPOEdhbWs4RHdqTU9YMm9nZXlKdUx0WHhYaVdvMSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2NvbXBhcmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1681981666),
('kaEeoBssPo2HfMFk1BbrHKQdszC2saVyvGYiVYTr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/112.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQXRYaDAxOXdGblN0NkZBWmVrZnJFQW9YeUdwcXU3MjRkSTB0VFdmWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL2NvbXBhcmUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1681981666);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `name`) VALUES
(15, 'Framework'),
(16, 'Web Application'),
(19, 'Machine Learning'),
(21, 'API'),
(22, 'Open Source'),
(23, 'Mahchine Learning'),
(24, 'Cryptocurrency'),
(25, 'Network'),
(26, 'Cryptography'),
(27, '2D/3D Graphics'),
(28, '3D Graphics'),
(29, '2D Graphics'),
(30, 'Math'),
(31, 'Animation'),
(32, 'Physics'),
(33, 'OpenGL'),
(34, 'Algorithm'),
(35, 'Graphics'),
(36, 'Game Development'),
(37, 'Reinforcement Learning'),
(38, 'Contoh');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, '\'s Team', 1, '2023-02-18 09:34:28', '2023-02-18 09:34:28'),
(2, 2, '\'s Team', 1, '2023-02-18 13:09:25', '2023-02-18 13:09:25'),
(3, 3, '\'s Team', 1, '2023-03-19 10:42:51', '2023-03-19 10:42:51'),
(4, 4, '\'s Team', 1, '2023-03-19 10:43:25', '2023-03-19 10:43:25'),
(5, 5, '\'s Team', 1, '2023-03-19 10:43:59', '2023-03-19 10:43:59'),
(6, 6, '\'s Team', 1, '2023-03-19 10:45:18', '2023-03-19 10:45:18'),
(7, 7, '\'s Team', 1, '2023-03-19 10:46:05', '2023-03-19 10:46:05'),
(8, 8, '\'s Team', 1, '2023-03-19 10:46:41', '2023-03-19 10:46:41'),
(9, 9, '\'s Team', 1, '2023-03-19 10:47:12', '2023-03-19 10:47:12'),
(10, 10, '\'s Team', 1, '2023-03-19 10:47:43', '2023-03-19 10:47:43'),
(11, 11, '\'s Team', 1, '2023-03-19 10:48:49', '2023-03-19 10:48:49'),
(12, 12, '\'s Team', 1, '2023-03-19 10:51:22', '2023-03-19 10:51:22'),
(13, 13, '\'s Team', 1, '2023-03-27 14:26:39', '2023-03-27 14:26:39'),
(14, 14, '\'s Team', 1, '2023-03-27 14:36:22', '2023-03-27 14:36:22'),
(15, 15, '\'s Team', 1, '2023-03-27 14:56:58', '2023-03-27 14:56:58'),
(16, 16, '\'s Team', 1, '2023-03-27 15:02:04', '2023-03-27 15:02:04'),
(17, 17, '\'s Team', 1, '2023-03-27 15:08:37', '2023-03-27 15:08:37'),
(18, 18, '\'s Team', 1, '2023-03-27 19:56:55', '2023-03-27 19:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

DROP TABLE IF EXISTS `team_invitations`;
CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

DROP TABLE IF EXISTS `team_user`;
CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'Admin@admin.com', NULL, '$2y$10$m6PU/n2IZYj/Lef14GaAEuEelN3jTc3JUnMDHIMA9CuBy0Js1pYVW', NULL, NULL, NULL, NULL, 1, NULL, '2023-02-18 09:34:28', '2023-03-27 14:21:39', 1),
(13, 'akibble0', 'twilse0@aboutads.info', NULL, '$2y$10$pwWmMEcuKSaSBUulSO8kM.fbUK9iuvCZhmD2ufBSskzlZKM2PTT8.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:26:39', '2023-03-27 14:26:39', 0),
(14, 'sdevoy1', 'krobinet1@opensource.org', NULL, '$2y$10$iPEyHdLvYvPBhY4p4PtMnOdSKcEEQvwTEtgz/DR5VB5DP1ENYryZ.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:36:22', '2023-03-27 14:36:22', 0),
(15, 'tmanchester2', 'ngumm2@linkedin.com', NULL, '$2y$10$2ldBAeAqwsDNQr.Z04EjH.Ke5zN3Hr3qqIV.rFBpUiv7/lWLbINwi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:56:58', '2023-03-27 14:56:58', 0),
(16, 'jgeraldi3', 'lposvner3@fotki.com', NULL, '$2y$10$tRBjqw7dfU1nl9C0NFxOQOC.enUNRqGNRroGSfs3so6yY9RomK2Xe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 15:02:04', '2023-03-27 15:02:04', 0),
(17, 'cheustace4', 'dosherin4@wp.com', NULL, '$2y$10$AELBSQ7OmA6j43pB2bTkxe9b4LcbdpHiaMwcs8gBuHkYiMYEF8iyq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 15:08:37', '2023-03-27 15:08:37', 0),
(18, 'Muhammad2001', 'muhd.iskndr01@gmail.com', NULL, '$2y$10$2X.8mxokpsGpKDCrmKoRbORP2Z6H4YD4/8SqdatTQG57n1BLJ5aKG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 19:56:55', '2023-03-27 19:56:55', 0);

-- --------------------------------------------------------

--
-- Table structure for table `versions`
--

DROP TABLE IF EXISTS `versions`;
CREATE TABLE IF NOT EXISTS `versions` (
  `version_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `library_id` bigint UNSIGNED NOT NULL,
  `version_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`version_id`),
  KEY `version_library_id_foreign` (`library_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`version_id`, `library_id`, `version_number`, `description`, `created_at`, `updated_at`) VALUES
(62, 10183, '6.1.4', 'Bugfixes:\r\n- Fix cookbook examples for website', '2023-03-27 14:35:34', '2023-03-27 14:35:34'),
(64, 10186, '0.7.6', '-', '2023-03-27 14:53:54', '2023-03-27 14:53:54'),
(65, 10187, '2.3.1', 'Update CHANGES.md', '2023-03-27 14:56:13', '2023-03-27 14:56:13'),
(66, 10188, '1.26.0', 'Asio 1.26.0\r\n\r\n    Fixed spawn and co_spawn implementations to dispatch cancellation handlers on the correct executor. When a completion handler uses a specified (i.e. non-default) associated executor, cancellation handlers are dispatched to the executor that was passed to spawn() or co_spawn().\r\n    Fixed spawn to ensure the completion handler is dispatched through the correct executor.\r\n    Changed to use snprintf rather than sprintf on latest Xcode, to address deprecation warnings.\r\n    Fixed compatibility between co_spawn and any_completion_handler.\r\n    Fixed the arguments passed to select_reactor::run when it is run on an internal thread.\r\n    Fixed compilation errors when (BOOST_)ASIO_DISABLE_SMALL_BLOCK_RECYCLING is defined.\r\n    Updated detection of C++20 coroutine support on clang 14 and later. This includes the ability to use coroutines with libstdc++.\r\n    Changed standard library feature detection to always enable std::invoke_result when targeting C++17 or later.\r\n    Fixed detection of return type deduction with MSVC.\r\n    Added a missing include in experimental::coro implementation.\r\n    Updated the asynchronous operation requirements to relax the requirements on the associated executor.\r\n    Added io_uring to the implementation notes.', '2023-03-27 14:59:18', '2023-03-27 14:59:18'),
(67, 10189, '40.0.1', 'BACKWARDS INCOMPATIBLE: Support for OpenSSL less than 1.1.1d has been removed. Users on older version of OpenSSL will need to upgrade.\r\n\r\n    BACKWARDS INCOMPATIBLE: Support for Python 3.6 has been removed.\r\n\r\n    Updated the minimum supported Rust version (MSRV) to 1.56.0, from 1.48.0.\r\n\r\n    Added support for the OCSPAcceptableResponses OCSP extension.', '2023-03-27 15:01:05', '2023-03-27 15:01:05'),
(68, 10190, '2.0.0', 'Hypatia is now a single file header only library', '2023-03-27 15:05:19', '2023-03-27 15:05:19'),
(69, 10191, '1.10', 'The 1.1.0 release of MathFu improves the syntax for accessing x, y, z, w components of a vector (no more parentheses!). It also adds a basic rectangle class, and some useful operators to existing math types.\r\n\r\nNew features:\r\n\r\n    Add Rect class for rectangles\r\n    Add FromType() and ToType() from/to byte-wise compatible conversions.\r\n\r\nImprovements:\r\n\r\n    Improve load times for vector types\r\n    Refactor Cmake and Android build files\r\n    Add quaternion dot product\r\n    Add missing vec4 division operator.\r\n    Add Equal and Not Equal operator overload in Vector\r\n    Fix kQuatIdentity\r\n\r\nInterface changes:\r\n\r\n    Remove legacy mathfu/vector_2.h, mathfu/vector_3.h, mathfu/vector_4.h. Include mathfu/vector.h instead.\r\n    Change .x(), .y(), .z(), .w() accessors to be simply .x, .y, .z, .w, instead', '2023-03-27 15:07:51', '2023-03-27 15:07:51'),
(70, 10192, '1.0', '-', '2023-03-27 15:10:15', '2023-03-27 15:10:15'),
(71, 10193, '2.3.0', 'What\'s Changed\r\n\r\n    2.2.0 -> 2.3.0.dev1 by @illume in #3736\r\n    Remove :return from sysfont._parse_font_entry_win by @MarcellPerger1 in #3732\r\n    Add special_flags argument to Group.draw by @MarcellPerger1 in #3722\r\n    Add Spanish version of ImportInit.rst by @stefpivser in #3699\r\n    Add Spanish version of DisplayModes.rst by @stefpivser in #3700\r\n    Add Spanish version of CreateGames.rst by @stefpivser in #3714\r\n    buildconfig: Bump SDL version to 2.24.2 on windows by @illume in #3458\r\n    _camera_opencv: Add list_cameras implementation by @illume in #3738\r\n    github sdist: Do not apt-get update by @illume in #3740\r\n    Fixup deprecation error on MacOS 11 by @Tobias-Fischer in #3663\r\n    manylinux-build: Bump SDL2 to version 2.24.2 by @illume in #3741\r\n    _camera_opencv: Add ability to pass VidCapture api_preferences by @illume in #3739\r\n    2.3.0.dev2 -> 2.3.0.dev3 by @illume in #3742\r\n    camera: Make opencv backend default on win if cv2 imports by @illume in #3743\r\n    Features/rect/scaleby by @dr0id in #3077\r\n    Implement pygame.math.lerp by @JamesC01 in #3362\r\n    Defining rect assignment of floats to Rect properties by @dr0id by @illume in #3745\r\n    Rect: scale_by and scale_by_ip by @dr0id and @mcpalmer1980 by @illume in #3746\r\n    circleci: Remove config by @illume in #3748\r\n    docs: fix move images tutorial final example by @SalimBAhmed in #3747\r\n    Fix drawing of circles there intersect -+INT_MAX by @jhilmer in #3151\r\n    Implementation of Vector2.from_polar and ClassObjectMethod descriptor by @joaquin30 in #3744\r\n    github: Add back apt-get update / upgrade by @illume in #3751\r\n    _sdl2.video: Window.from_window by @Rabbid76 by @illume in #3752\r\n    class method \"from_foreign_window\" added to class \"Window\" by @Rabbid76 in #2982\r\n    draw mask: Added unit tests for test_arc and test_angle by @yujyuj by @illume in #3753\r\n    examples: Add grid movement example by @Masonstiller by @illume in #3754\r\n    docs: Fix a few sphinx warnings by @illume in #3759\r\n    Fix segfaults when using display surface after calling pygame.quit by @MarcellPerger1 in #3755', '2023-03-27 15:13:09', '2023-03-27 15:13:09'),
(72, 10194, '1.4', 'Supports Tensorflow', '2023-03-27 20:03:40', '2023-03-27 20:03:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries` ADD FULLTEXT KEY `fulltext_index_name` (`name`,`description`,`license`);
ALTER TABLE `libraries` ADD FULLTEXT KEY `fulltext_index` (`name`,`description`,`license`,`command`,`link`);

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD FULLTEXT KEY `username` (`username`,`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `library_languages`
--
ALTER TABLE `library_languages`
  ADD CONSTRAINT `library_languages_ibfk_1` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`library_id`),
  ADD CONSTRAINT `library_languages_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `languages` (`language_id`);

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `versions`
--
ALTER TABLE `versions`
  ADD CONSTRAINT `version_library_id_foreign` FOREIGN KEY (`library_id`) REFERENCES `libraries` (`library_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
