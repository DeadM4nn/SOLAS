-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2023 at 01:02 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `account_id`, `library_id`, `date_created`, `last_version`) VALUES
(14, 25, 10186, '2023-04-24 04:08:24', 'Newest Update'),
(16, 26, 10191, '2023-05-09 17:44:08', '2.0.0'),
(17, 26, 10188, '2023-05-09 17:48:50', NULL),
(18, 26, 10187, '2023-05-09 17:49:01', NULL),
(19, 29, 10212, '2023-05-10 00:36:44', '2.13.0'),
(20, 30, 10212, '2023-05-10 01:43:50', '2.14.0'),
(21, 26, 10212, '2023-05-10 13:10:24', '2,0,0');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks_archived`
--

DROP TABLE IF EXISTS `bookmarks_archived`;
CREATE TABLE IF NOT EXISTS `bookmarks_archived` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `account_id` bigint UNSIGNED NOT NULL,
  `library_id` bigint UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_version` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookmarks_archived`
--

INSERT INTO `bookmarks_archived` (`id`, `account_id`, `library_id`, `date_created`, `last_version`) VALUES
(6, 1, 10183, '2023-04-21 12:38:41', '6.1.4'),
(7, 20, 10194, '2023-04-21 14:23:17', '1.4'),
(8, 20, 10194, '2023-04-21 14:23:18', '1.4'),
(9, 20, 10183, '2023-04-22 00:42:13', NULL),
(10, 21, 10186, '2023-04-22 00:42:24', 'Newest Update'),
(11, 21, 10190, '2023-04-22 00:42:34', NULL),
(12, 21, 10205, '2023-04-22 00:42:52', '1.23.3245.5'),
(13, 21, 10192, '2023-04-23 02:37:58', NULL),
(15, 25, 10188, '2023-04-24 04:09:04', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comparisons`
--

INSERT INTO `comparisons` (`id`, `library_id`, `account_id`, `note`, `updated_at`, `created_at`) VALUES
(56, 10183, 13, '', '2023-04-30 17:01:43', '2023-04-30 17:01:43'),
(57, 10186, 13, '', '2023-04-30 17:15:57', '2023-04-30 17:15:57'),
(58, 10212, 30, 'Open Source, Developed By Google. \r\n- Can be used in C++ (Our target)', '2023-05-09 17:45:31', '2023-05-09 17:44:22'),
(59, 10214, 30, 'Deep Learning\r\nDeveloped by Microsoft', '2023-05-09 17:45:31', '2023-05-09 17:44:37'),
(60, 10212, 26, 'I like this one, easy to install', '2023-05-10 05:19:55', '2023-05-10 05:19:25'),
(61, 10214, 26, 'Cheaper', '2023-05-10 05:19:55', '2023-05-10 05:19:38'),
(62, 10192, 26, '', '2023-05-10 05:20:27', '2023-05-10 05:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`library_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`library_id`, `name`, `description`, `license`, `views`, `command`, `link`, `is_file`, `creator_id`, `updated_at`, `created_at`) VALUES
(10186, 'CryptoCompare', 'Python3 wrapper to query cryptocurrency prices (and more) using the CryptoCompare API.', 'MIT License', 643, 'pip3 install cryptocompare', NULL, 1, 14, '2023-05-09 21:23:42', NULL),
(10187, 'Cryptocurrency Exchange Feed Handler', 'Handles multiple cryptocurrency exchange data feeds and returns normalized and standardized results to client registered callbacks for events like trades, book updates, ticker updates, etc. Utilizes websockets when possible, but can also poll data via REST endpoints if a websocket is not provided.', 'XFree86', 9, 'pip install cryptofeed', 'https://github.com/bmoscon/cryptofeed', 0, 14, '2023-05-09 01:48:59', NULL),
(10188, 'Asio C++ library', 'Asio is a freely available, open-source, cross-platform C++ library for network programming. It provides developers with a consistent asynchronous I/O model using a modern C++ approach. Boost.Asio was accepted into the Boost library on 30 December 2005 after a 20-day review. The library has been developed by Christopher M. Kohlhoff since 2003. A networking proposal based on Asio was submitted to the C++ standards committee in 2006 for possible inclusion in the second Technical Report on C++ Library Extensions (TR2).', 'Boost Software License', 8, NULL, 'https://think-async.com/Asio/', 0, 15, '2023-05-09 01:48:48', NULL),
(10189, 'cryptography', 'cryptography is a package which provides cryptographic recipes and primitives to Python developers. Our goal is for it to be your “cryptographic standard library”. It supports Python 3.6+ and PyPy3 7.3.10+.', 'Apache Software License, BSD License ((Apache-2.0 OR BSD-3-Clause) AND PSF-2.0)', 12, 'pip install cryptography', 'https://pypi.org/project/cryptography/', 0, 15, '2023-05-09 21:10:30', NULL),
(10190, 'Hypatia', 'Hypatia, a Greek mathematician, 355-415 C.E. Considered by many to be the first female mathematician of note.\r\n\r\nHypatia is a single-file-header, pure-C math library. It is almost 100% C89/C90 compliant. This library is intended for use in 2d/3d graphics program (such as games). Since it is not a general purpose math library, but a library meant for 3d graphics, certain opinions have been expressed in its design. One of those design choices, intended to help with speed, is that all objects (quaternions, matrices, vectors) are mutable. (That means that the objects change their values.) This was a purposeful design choice. Construct your program around this choice.', 'open source license', 3, NULL, 'https://dagostinelli.github.io/hypatia/', 0, 16, '2023-04-21 08:42:35', NULL),
(10191, 'MathFu', 'MathFu is a C++ math library developed primarily for games focused on simplicity and efficiency.\r\n\r\nIt provides a suite of vector, matrix and quaternion classes to perform basic geometry suitable for game developers. This functionality can be used to construct geometry for graphics libraries like OpenGL or perform calculations for animation or physics systems.', 'Apache License 2.0', 16, NULL, 'https://google.github.io/mathfu/', 1, 16, '2023-05-29 00:38:04', '2023-04-20 23:18:42'),
(10192, 'astar-algorithm', 'This code is an efficient implementation in C++ and C# of the A* algorithm, designed to be used from high performance realtime applications (video games) and with an optional fast memory allocation scheme.\r\n\r\nIt accompanies this A* tutorial: https://www.heyes-jones.com/astar.php\r\n\r\nThe A* algorithm was described in the paper https://ieeexplore.ieee.org/document/4082128 by Hart, Nillson and Raphael.\r\n\r\nSadly Nils Nillson passed away in 2019, his work is much appreciated.', 'MIT License', 12, NULL, 'https://github.com/justinhj/astar-algorithm-cpp', 0, 17, '2023-05-09 21:20:25', '2023-04-20 23:18:42'),
(10193, 'Pygame', 'Over the next weeks we have plenty of game jams that people from the pygame communities take part in.\r\n\r\nThe pygames hackathon runs from March 20th, 2023 to April 17th 2023, and is open to people in USA and Canada. For this one there\'s $12,700 in prizes. \"If you love programming and gaming, this is the perfect opportunity to showcase your skills and have some fun!\"\r\n\r\nThen the must-use-python PyWeek challenge \"Invites entrants to write a game in one week from scratch either as an individual or in a team. Is intended to be challenging and fun. Will hopefully increase the public body of python game tools, code and expertise. Will let a lot of people actually finish a game, and may inspire new projects (with ready made teams!).\" PyWeek runs from March 26nd, 2023 to April 2nd 2023, and theme voting is already on.\r\n\r\nFinally, Ludum Dare is an event where you create a game from scratch in a weekend based on a theme. April 28th, 2023. Starts at 3:00 AM CEST *. Ludumdare is the oldest online game jam, and has the largest number of participants. There is a Jam (72h, less restrictive rules), and a compo (48h more rules). The Jam now lets people submit paper board games, and even things like crafts that aren\'t games at all!', 'GNU LGPL version 2.1,', 3, 'python -m pip install -U pygame==2.3.0 --user', 'https://www.pygame.org/news', 0, 17, '2023-05-09 08:44:17', NULL),
(10209, 'R-LearnPro', 'R-LearnPro is an all-in-one machine learning library for R programming language. It provides a comprehensive set of tools and algorithms for data preprocessing, feature engineering, model selection, and performance evaluation. With R-LearnPro, you can easily build and deploy machine learning models for various domains, such as finance, healthcare, and marketing. R-LearnPro also supports advanced techniques like deep learning and reinforcement learning, making it a versatile library for complex machine learning projects.', 'GNU Affero General Public License Version 3 (AGPLv3)', 2, 'npm install rlearnpro', 'https://github.com/rlearnpro/rlearnpro', 1, 25, '2023-05-29 02:50:28', '2023-04-23 12:07:23'),
(10212, 'TensorFlow', 'TensorFlow is a free and open-source software library for machine learning and artificial intelligence. It can be used across a range of tasks but has a particular focus on training and inference of deep neural networks.\r\n\r\nTensorFlow was developed by the Google Brain team for internal Google use in research and production. The initial version was released under the Apache License 2.0 in 2015. Google released the updated version of TensorFlow, named TensorFlow 2.0, in September 2019.\r\n\r\nTensorFlow can be used in a wide variety of programming languages, including Python, JavaScript, C++, and Java. This flexibility lends itself to a range of applications in many different sectors', 'Apache License 2.0', 36, 'pip install tensorflow', 'https://github.com/tensorflow/tensorflow', 1, 28, '2023-05-09 21:19:08', '2023-05-09 07:00:04'),
(10213, 'Caffee', 'Caffe is a deep learning framework, originally developed at University of California, Berkeley. It is open source, under a BSD license. It is written in C++, with a Python interface.', 'BSD License', 4, NULL, NULL, 1, 28, '2023-05-09 07:34:50', '2023-05-09 07:02:37'),
(10214, 'The Microsoft Cognitive Toolkit (CNTK)', 'The Microsoft Cognitive Toolkit (CNTK) is an open-source toolkit for commercial-grade distributed deep learning. It describes neural networks as a series of computational steps via a directed graph. CNTK allows the user to easily realize and combine popular model types such as feed-forward DNNs, convolutional neural networks (CNNs) and recurrent neural networks (RNNs/LSTMs). CNTK implements stochastic gradient descent (SGD, error backpropagation) learning with automatic differentiation and parallelization across multiple GPUs and servers.', 'MIT License', 10, NULL, NULL, 1, 28, '2023-05-29 02:50:08', '2023-05-09 07:09:14'),
(10215, 'mlpack', 'mlpack is a machine learning software library for C++, built on top of the Armadillo library and the ensmallen numerical optimization library. mlpack has an emphasis on scalability, speed, and ease-of-use. Its aim is to make machine learning possible for novice users by means of a simple, consistent API, while simultaneously exploiting C++ language features to provide maximum performance and maximum flexibility for expert users. Its intended target users are scientists and engineers.\r\n\r\nIt is open-source software distributed under the BSD license, making it useful for developing both open source and proprietary software. Releases 1.0.11 and before were released under the LGPL license. The project is supported by the Georgia Institute of Technology and contributions from around the world.', 'BSD License', 6, NULL, NULL, 1, 28, '2023-05-09 07:37:17', '2023-05-09 07:34:24'),
(10216, 'DyNet', 'DyNet is a neural network library developed by Carnegie Mellon University and many others. It is written in C++ (with bindings in Python) and is designed to be efficient when run on either CPU or GPU, and to work well with networks that have dynamic structures that change for every training instance. For example, these kinds of networks are particularly important in natural language processing tasks, and DyNet has been used to build state-of-the-art systems for syntactic parsing, machine translation, morphological inflection, and many other application areas.', 'Apache License 2.0', 0, NULL, NULL, 1, 28, '2023-05-09 07:45:09', '2023-05-09 07:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `libraries_archived`
--

DROP TABLE IF EXISTS `libraries_archived`;
CREATE TABLE IF NOT EXISTS `libraries_archived` (
  `library_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'This is the library id, serves as the primary key for each of the library recorded in SOLAS',
  `name` varchar(100) NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `license` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Not Specified',
  `views` int UNSIGNED NOT NULL DEFAULT '0',
  `command` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `is_file` tinyint(1) DEFAULT '0',
  `creator_id` int NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`library_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10221 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `libraries_archived`
--

INSERT INTO `libraries_archived` (`library_id`, `name`, `description`, `license`, `views`, `command`, `link`, `is_file`, `creator_id`, `updated_at`, `created_at`) VALUES
(10183, 'The SHOGUN machine learning toolbox', 'Shogun is a free, open-source machine learning software library written in C++. It offers numerous algorithms and data structures for machine learning problems. It offers interfaces for Octave, Python, R, Java, Lua, Ruby and C# using SWIG.\r\n\r\nIt is licensed under the terms of the GNU General Public License version 3 or later.', 'GNU General Public License (GPL) Version 3 or later', 405, NULL, 'https://github.com/shogun-toolbox/shogun', 0, 13, '2023-04-30 14:48:16', NULL),
(10194, 'OpenAI baselines', 'OpenAI Baselines is a set of high-quality implementations of reinforcement learning algorithms.\r\nThese algorithms will make it easier for the research community to replicate, refine, and identify new ideas, and will create good baselines to build research on top of. Our DQN implementation and its variants are roughly on par with the scores in published papers. We expect they will be used as a base around which new ideas can be added, and as a tool for comparing a new approach against existing ones.', 'MIT License', 10, 'pip install virtualenv', 'https://github.com/openai/baselines', 1, 18, '2023-04-20 22:23:50', NULL),
(10197, 'asdasd Huh', 'asdasd', NULL, 7, NULL, NULL, 1, 19, '2023-04-20 21:11:29', '2023-04-20 21:04:49'),
(10198, 'Should be 1', '1', NULL, 0, NULL, NULL, 1, 19, '2023-04-20 21:29:08', '2023-04-20 21:29:08'),
(10199, 'Should be 2', 'asdfsdf', NULL, 2, NULL, NULL, 1, 19, '2023-04-20 21:29:49', '2023-04-20 21:29:31'),
(10200, 'Should be 3', 'asdasd', NULL, 4, NULL, NULL, 1, 19, '2023-04-20 21:31:03', '2023-04-20 21:30:24'),
(10201, 'sadasd', 'asdasd', NULL, 15, 'asdasd', 'asdasd', 1, 21, '2023-04-20 22:49:13', '2023-04-20 22:42:06'),
(10202, 'asdasd', 'asdasd', NULL, 6, NULL, NULL, 1, 21, '2023-04-20 22:55:36', '2023-04-20 22:54:07'),
(10203, 'wat', 'gfhfhg', NULL, 9, NULL, NULL, 1, 1, '2023-04-21 05:59:38', '2023-04-21 03:14:27'),
(10204, '123123', 'asdasd', NULL, 235, NULL, NULL, 0, 1, '2023-04-23 03:34:25', '2023-04-21 05:34:24'),
(10205, 'asdasdasdf', 'sdfsdf', NULL, 27, NULL, NULL, 1, 21, '2023-04-23 11:44:02', '2023-04-21 08:22:19'),
(10206, '123132', 'asdasdasd', NULL, 1, NULL, NULL, 1, 1, '2023-04-23 21:19:17', '2023-04-22 22:45:07'),
(10207, 'Laravel2', 'Hey', 'GNU Affero General Public License Version 3 (AGPLv3)', 3, 'Whatsup', 'asdsdfsdf', 1, 21, '2023-04-30 07:04:49', '2023-04-23 00:30:31'),
(10208, 'PyNetMind', 'PyNetMind is a powerful machine learning library written in Python that provides a wide range of algorithms and tools for neural network development. With PyNetMind, you can easily build, train, and deploy neural networks for various tasks, such as image recognition, natural language processing, and anomaly detection. PyNetMind is highly optimized for speed and memory efficiency, making it an ideal choice for large-scale machine learning projects.', 'GNU General Public License (GPL)', 2, 'npm install pynetmind', 'https://github.com/pnetmind/pnetmind', 1, 25, '2023-04-30 13:21:42', '2023-04-23 12:05:58'),
(10210, 'SuperMachine', 'This is a library on Machine Learning', 'GNU Affero General Public License Version 3 (AGPLv3)', 2, 'npm install superMachine', 'www.github.com/library/SuperMachine', 1, 25, '2023-04-30 13:21:09', '2023-04-30 11:49:44'),
(10211, 'SuperMachine Kit', 'Best one', NULL, 1, NULL, NULL, 1, 25, '2023-04-30 11:56:04', '2023-04-30 11:51:15'),
(10217, 'New goood library', 'Adsasd', NULL, 1, NULL, NULL, 1, 28, '2023-05-09 08:50:11', '2023-05-09 08:48:27'),
(10218, 'New Good Library', '123', NULL, 2, NULL, NULL, 1, 28, '2023-05-09 08:52:14', '2023-05-09 08:50:38'),
(10219, 'New Good Library', '123', NULL, 1, NULL, NULL, 1, 28, '2023-05-09 08:51:32', '2023-05-09 08:51:21'),
(10220, 'Muhammad\'s Machine Learning Library', 'This is a library I created for my Final Year Project that is made convinience', 'MIT License', 4, NULL, NULL, 1, 30, '2023-05-09 20:54:36', '2023-05-09 09:47:11');

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
(10187, 26),
(10187, 19),
(10188, 18),
(10189, 19),
(10190, 27),
(10191, 18),
(10192, 18),
(10193, 19),
(10209, 24),
(10186, 19),
(10212, 13),
(10212, 18),
(10212, 19),
(10213, 19),
(10213, 18),
(10215, 18),
(10214, 18),
(10216, 19),
(10216, 18);

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
(10209, 19),
(10186, 21),
(10186, 24),
(10212, 39),
(10212, 40),
(10212, 41),
(10212, 42),
(10212, 19),
(10213, 19),
(10213, 22),
(10213, 39),
(10213, 15),
(10215, 19),
(10215, 21),
(10215, 22),
(10214, 43),
(10214, 19),
(10214, 39),
(10214, 22),
(10216, 19);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `library_id`, `account_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(6, 10186, 14, 1, 'Actually Unusable. Installation instruction not clear', '2023-04-18 09:31:46', '2023-04-18 09:31:46'),
(26, 10186, 25, 4, 'Not bad. Poor documentation but its a great library once you get used to it.', '2023-04-23 20:08:18', '2023-04-23 20:08:18'),
(28, 10191, 25, 5, 'This is pretty good!', '2023-04-30 15:21:09', '2023-04-30 15:21:09'),
(30, 10213, 28, 5, NULL, '2023-05-09 15:34:49', '2023-05-09 15:34:49'),
(31, 10214, 28, 4, NULL, '2023-05-09 15:35:20', '2023-05-09 15:35:20'),
(32, 10215, 28, 4, NULL, '2023-05-09 15:35:32', '2023-05-09 15:35:32'),
(33, 10212, 14, 4, 'Quite good except confusing documentation', '2023-05-09 15:50:15', '2023-05-09 15:50:15'),
(34, 10212, 16, 5, 'Extremely Good and Helpful :)', '2023-05-09 15:56:52', '2023-05-09 15:56:52'),
(35, 10212, 17, 3, 'Confusing', '2023-05-09 15:57:43', '2023-05-09 15:57:43'),
(36, 10212, 30, 4, 'Quite Good!', '2023-05-09 17:43:38', '2023-05-09 17:43:38'),
(37, 10212, 26, 3, 'This is Great User', '2023-05-10 05:19:07', '2023-05-10 05:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `ratings_archived`
--

DROP TABLE IF EXISTS `ratings_archived`;
CREATE TABLE IF NOT EXISTS `ratings_archived` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `library_id` bigint UNSIGNED NOT NULL,
  `account_id` bigint UNSIGNED NOT NULL,
  `rating` int NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings_archived`
--

INSERT INTO `ratings_archived` (`id`, `library_id`, `account_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(5, 10186, 15, 5, 'Really useful for my project', '2023-04-18 09:31:00', '2023-04-18 09:31:00'),
(7, 10186, 13, 4, 'It was fine until it stopped working. Tried to contact support. no response so far. Would recommend once its up again. :)', '2023-04-18 09:32:53', '2023-04-18 09:32:53'),
(9, 10189, 1, 4, 'This is the best library eva!!!!!', '2023-04-20 06:13:52', '2023-04-20 06:13:52'),
(10, 10183, 19, 3, 'This Is a subpar library', '2023-04-21 04:48:57', '2023-04-21 04:48:57'),
(11, 10194, 20, 3, 'Pretty Good', '2023-04-21 06:23:12', '2023-04-21 06:23:12'),
(12, 10183, 20, 1, 'Made this for the test (1/5)', '2023-04-21 06:27:47', '2023-04-21 06:27:47'),
(13, 10186, 20, 2, 'made this as a test (2/5)', '2023-04-21 06:28:12', '2023-04-21 06:28:12'),
(14, 10187, 20, 3, 'Made this as a test (3/5)', '2023-04-21 06:28:46', '2023-04-21 06:28:46'),
(15, 10188, 20, 4, 'Made this as a test (4/5)', '2023-04-21 06:29:14', '2023-04-21 06:29:14'),
(16, 10189, 20, 5, 'Made this as a test (5/5)', '2023-04-21 06:29:33', '2023-04-21 06:29:33'),
(17, 10183, 21, 5, 'Not a bad Library Honestly', '2023-04-22 11:37:16', '2023-04-22 11:37:16'),
(18, 10186, 21, 4, 'Subpar but possible', '2023-04-22 11:37:30', '2023-04-22 11:37:30'),
(19, 10187, 21, 3, 'Do what we can', '2023-04-22 11:37:57', '2023-04-22 11:37:57'),
(20, 10192, 21, 1, 'Hmm, bad', '2023-04-22 12:19:36', '2023-04-22 12:19:36'),
(21, 10183, 21, 3, 'Pretty Good', '2023-04-22 15:38:33', '2023-04-22 15:38:33'),
(22, 10183, 21, 1, 'Hey what', '2023-04-22 18:01:34', '2023-04-22 18:01:34'),
(23, 10183, 21, 1, 'asd', '2023-04-22 18:02:35', '2023-04-22 18:02:35'),
(24, 10189, 13, 5, 'Wow', '2023-04-23 02:33:50', '2023-04-23 02:33:50'),
(25, 10183, 25, 5, 'Wow! This is a quite good library.', '2023-04-23 20:07:43', '2023-04-23 20:07:43'),
(27, 10183, 17, 2, NULL, '2023-04-24 05:35:43', '2023-04-24 05:35:43'),
(29, 10191, 13, 4, 'Quite good but confusion documentation', '2023-04-30 15:23:35', '2023-04-30 15:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8u4qs9JEuYIpvuiDBlmz268vjbdO9pgx7dI9P7yM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ0dLRlRscEYwajZlT3BVOGY2a3A1ZTJyNjBTa21ERWJMWlZSalYxbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWcvc2VhcmNoLzE5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1685357640),
('aDfcDWM5kV2g7ShJbFEP0wFWsySZNjdUw2JTbgye', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickRlMllBSlFsNDZMNndnY3o2bUI3ZXhIdk9kdGRtMzNoNGJZc0RIVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWcvc2VhcmNoLzE5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1685408162),
('BOQ2uTQvsBBqXSv1oGXLsCEpHZvZACt3EjBCAprI', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQnh1VWhzaXBTajJjZEZPN3l5NWtIaDltc3ZHd3ZTR3ZnUTJ0Mmk2eSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1685267186),
('IkErH2L9u3FJozYD6veVPBW4WIDMPgxZzwWdWuyx', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVDVYS2trZVF0SnY4OVZuSE5HOGVEdjRBbFRLcEZQZ1J6ZTRqZkJIbiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9saWJyYXJ5L3JlcXVlc3QvMTAxODYiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1683696222),
('RITaumYwEMuIJjHIa8tvm9DIRZ6SWuRL8zTk05kS', 28, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZzhQc0NQWVlLZzNoSW1UZDFFWHhhSzcyWllleVQ2Y1hKTWdtR0gxOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC91c2VyL3ZpZXcvMjgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyODt9', 1683696070),
('rvcruSm375Ayo5irjtzazbinJTxOMwauq3VjQDDD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNzUxSEZGM2xuNzk4RG5zUlViTWg2ZWJvT0EydVZmVlNzWlZ5Y1BmMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWcvc2VhcmNoLzI0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1683717933),
('YXtYruqHcZRD2asmhHzvNE6NpdlTvEl2eUuPhWGR', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiclNXQXlVS3JidURvdDJob1lTVHh2WTJBOVlBemlkbXRKZW5nMjNBbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC90YWcvc2VhcmNoLzMxIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1685349496);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(39, 'Deep Learning'),
(40, 'Deep Neural Network'),
(41, 'Neural Network'),
(42, 'Mathematics'),
(43, 'Convolutional Neural Network');

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(18, 18, '\'s Team', 1, '2023-03-27 19:56:55', '2023-03-27 19:56:55'),
(19, 19, '\'s Team', 1, '2023-04-20 20:48:26', '2023-04-20 20:48:26'),
(20, 20, '\'s Team', 1, '2023-04-20 22:22:37', '2023-04-20 22:22:37'),
(21, 21, '\'s Team', 1, '2023-04-20 22:41:48', '2023-04-20 22:41:48'),
(22, 25, '\'s Team', 1, '2023-04-23 11:50:37', '2023-04-23 11:50:37'),
(23, 26, '\'s Team', 1, '2023-05-09 01:44:00', '2023-05-09 01:44:00'),
(24, 27, '\'s Team', 1, '2023-05-09 01:48:21', '2023-05-09 01:48:21'),
(25, 28, '\'s Team', 1, '2023-05-09 06:49:00', '2023-05-09 06:49:00'),
(26, 29, '\'s Team', 1, '2023-05-09 08:36:24', '2023-05-09 08:36:24'),
(27, 30, '\'s Team', 1, '2023-05-09 09:43:08', '2023-05-09 09:43:08');

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
  `picture` int UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`, `picture`) VALUES
(1, 'Admin6', 'Admin@admin.com', NULL, '$2y$10$m6PU/n2IZYj/Lef14GaAEuEelN3jTc3JUnMDHIMA9CuBy0Js1pYVW', NULL, NULL, NULL, NULL, 1, NULL, '2023-02-18 09:34:28', '2023-04-30 14:48:28', 1, 7),
(14, 'sdevoy1', 'krobinet1@opensource.org', NULL, '$2y$10$iPEyHdLvYvPBhY4p4PtMnOdSKcEEQvwTEtgz/DR5VB5DP1ENYryZ.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:36:22', '2023-03-27 14:36:22', 0, 49),
(15, 'tmanchester2', 'ngumm2@linkedin.com', NULL, '$2y$10$2ldBAeAqwsDNQr.Z04EjH.Ke5zN3Hr3qqIV.rFBpUiv7/lWLbINwi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:56:58', '2023-03-27 14:56:58', 0, 7),
(16, 'jgeraldi3', 'lposvner3@fotki.com', NULL, '$2y$10$tRBjqw7dfU1nl9C0NFxOQOC.enUNRqGNRroGSfs3so6yY9RomK2Xe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 15:02:04', '2023-03-27 15:02:04', 0, 39),
(17, 'cheustace4', 'dosherin4@wp.com', NULL, '$2y$10$AELBSQ7OmA6j43pB2bTkxe9b4LcbdpHiaMwcs8gBuHkYiMYEF8iyq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 15:08:37', '2023-03-27 15:08:37', 0, 24),
(21, 'user', 'user@user2.com', NULL, '$2y$10$sFmCWM3hC5yk5zDqK70SHuoT5eyCNuHbWzaD/KKAuWAag2lpodegq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20 22:41:48', '2023-04-23 04:14:45', 0, 8),
(22, 'user2', 'user2@user.com', NULL, '$2y$10$UmuqbdZydsHatM2CYuICE.AkmI4pHqKyH2P/WAQVMNXBnoP0OdDaK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 03:16:34', '2023-04-23 03:16:34', 0, 1),
(23, 'admin2', 'admin2@admin.com', NULL, '$2y$10$azfS.hS/vTLS.t1iF3pdauml02nNfNfo1LuCt1kGsxZRN.QeW4y2m', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 03:17:28', '2023-04-23 03:17:28', 0, 1),
(24, 'admin3', 'admin3@admin.com', NULL, '$2y$10$i9SeyHyiJS6MXsDGzhZs1u1MvwoekK.IzpXdxBV1Jtj2xiPh7oIjq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 03:17:57', '2023-04-23 03:17:57', 1, 1),
(25, 'ManualUser', 'user@manual.com', NULL, '$2y$10$GcTZsg17BsR8NU1h9ZtoUeZR1WIyjPPpSw0/C5MrZybeTZGoIXpUC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 11:50:37', '2023-04-23 12:22:53', 0, 9),
(26, 'Madman', 'mad@man.com', NULL, '$2y$10$SdxjRCKYX.Xd77ZdZELtVu8dLPrxRStTkuNB1V7u/.1ktfLOp1Tyy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 01:44:00', '2023-05-09 21:20:58', 0, 6),
(27, 'NewUser', 'New@user.com', NULL, '$2y$10$GNtcsyArtRsuXMc7R1HrXeb50PEpntJN63vWTJeIn.OyTicVGLWQC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 01:48:21', '2023-05-09 01:48:21', 0, 1),
(28, 'ErenJaeger', 'eren@titan.com', NULL, '$2y$10$5YOK1lEyXIIercaOCCj5y.wzg0RCxf34NdVthAT/2IpDvfTtflCIW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 06:49:00', '2023-05-09 07:35:07', 0, 45),
(29, 'MuhammadIskandar2001', 'muhd.iskndr01@gmail.com', NULL, '$2y$10$uoYBztLq26I.ejbbQoNSr.UltpJ7F/m/yMBj40cy.KVe0p3kP4Enu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 08:36:24', '2023-05-09 09:18:24', 0, 2),
(30, 'MuhammadIskandar001', 'muhd.iskndr001@gmail.com', NULL, '$2y$10$2h.DYxa4kgLhvs2B1iGDM.uqUySmQXmDjy0n8i6FvO3eBub9RlDWG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 09:43:08', '2023-05-09 09:43:08', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_archived`
--

DROP TABLE IF EXISTS `users_archived`;
CREATE TABLE IF NOT EXISTS `users_archived` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_archived`
--

INSERT INTO `users_archived` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
(13, 'akkible', 'twilse0@aboutads.info', NULL, '$2y$10$pwWmMEcuKSaSBUulSO8kM.fbUK9iuvCZhmD2ufBSskzlZKM2PTT8.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:26:39', '2023-04-22 21:38:37', 0),
(18, 'Muhammad2001', 'muhd.iskndr01@gmail.com', NULL, '$2y$10$2X.8mxokpsGpKDCrmKoRbORP2Z6H4YD4/8SqdatTQG57n1BLJ5aKG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 19:56:55', '2023-03-27 19:56:55', 0),
(19, 'user', 'user@user.com', NULL, '$2y$10$bEVgQWfkrUZ9YBarOWRSc.MPpFS.8H2H0uiBZ36YImZADopVVgkh6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20 20:48:26', '2023-04-20 20:48:26', 0),
(20, 'user', 'user@user.com', NULL, '$2y$10$I2lgv4jk0tiFkxSa5FVm8ulTip4EOztF62KDiAxQ/jLxprhx54W/q', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20 22:22:37', '2023-04-20 22:22:37', 0);

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
  `file_extension` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rar',
  PRIMARY KEY (`version_id`),
  KEY `version_library_id_foreign` (`library_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`version_id`, `library_id`, `version_number`, `description`, `created_at`, `updated_at`, `file_extension`) VALUES
(96, 10186, '1.2.22.2', 'New Update', '2023-04-21 10:00:06', '2023-04-21 10:00:06', 'rar'),
(97, 10186, 'Even Newer', 'asdasd', '2023-04-21 10:24:20', '2023-04-21 10:24:20', 'zip'),
(98, 10186, 'Absolute Newest', 'Wow so new', '2023-04-21 10:28:09', '2023-04-21 10:28:09', 'rar'),
(99, 10186, 'Newest Update', 'Whoop', '2023-04-21 10:53:52', '2023-04-21 10:53:52', 'rar'),
(103, 10209, '0.20.5', 'Entered Beta Stage', '2023-04-23 12:07:23', '2023-04-23 12:07:23', 'zip'),
(108, 10191, '2.0.0', 'Newly Added', '2023-05-09 01:50:21', '2023-05-09 01:50:21', 'zip'),
(109, 10212, '2.12.0', 'Build, Compilation and Packaging\r\n\r\nRemoved redundant packages tensorflow-gpu and tf-nightly-gpu. These packages were removed and replaced with packages that direct users to switch to tensorflow or tf-nightly respectively. Since TensorFlow 2.1, the only difference between these two sets of packages was their names, so there is no loss of functionality or GPU support. See https://pypi.org/project/tensorflow-gpu for more details.\r\ntf.function:\r\n\r\ntf.function now uses the Python inspect library directly for parsing the signature of the Python function it is decorated on. This change may break code where the function signature is malformed, but was ignored previously, such as:\r\nUsing functools.wraps on a function with different signature\r\nUsing functools.partial with an invalid tf.function input\r\ntf.function now enforces input parameter names to be valid Python identifiers. Incompatible names are automatically sanitized similarly to existing SavedModel signature behavior.\r\nParameterless tf.functions are assumed to have an empty input_signature instead of an undefined one even if the input_signature is unspecified.\r\ntf.types.experimental.TraceType now requires an additional placeholder_value method to be defined.\r\ntf.function now traces with placeholder values generated by TraceType instead of the value itself.\r\nExperimental APIs tf.config.experimental.enable_mlir_graph_optimization and tf.config.experimental.disable_mlir_graph_optimization were removed.', '2023-05-09 07:00:04', '2023-05-09 07:00:04', 'zip'),
(110, 10213, '1.0.00', 'Stable Release', '2023-05-09 07:02:37', '2023-05-09 07:02:37', 'zip'),
(111, 10214, '1.0.00', 'Stable Release', '2023-05-09 07:09:14', '2023-05-09 07:09:14', 'zip'),
(112, 10215, '1.0.00', 'Stable Release', '2023-05-09 07:34:24', '2023-05-09 07:34:24', 'zip'),
(113, 10216, '1.00.0', 'Stable Release', '2023-05-09 07:45:09', '2023-05-09 07:45:09', 'zip'),
(116, 10212, '2.13.0', 'Stable Release', '2023-05-09 08:54:26', '2023-05-09 08:54:26', 'zip'),
(117, 10212, '2.14.0', 'Added New Features', '2023-05-09 09:43:59', '2023-05-09 09:43:59', 'zip'),
(120, 10212, '2,0,0', 'Added Features', '2023-05-09 21:16:59', '2023-05-09 21:16:59', 'zip');

-- --------------------------------------------------------

--
-- Table structure for table `versions_archived`
--

DROP TABLE IF EXISTS `versions_archived`;
CREATE TABLE IF NOT EXISTS `versions_archived` (
  `version_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `library_id` bigint UNSIGNED NOT NULL,
  `version_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_extension` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'rar',
  PRIMARY KEY (`version_id`),
  KEY `version_library_id_foreign` (`library_id`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions_archived`
--

INSERT INTO `versions_archived` (`version_id`, `library_id`, `version_number`, `description`, `created_at`, `updated_at`, `file_extension`) VALUES
(72, 10194, '1.4', 'Supports Tensorflow', '2023-03-27 20:03:40', '2023-03-27 20:03:40', 'rar'),
(74, 10196, '1.2.3', 'What', '2023-04-20 21:01:49', '2023-04-20 21:01:49', 'rar'),
(75, 10196, 'Wait What', 'Heheh', '2023-04-20 21:02:13', '2023-04-20 21:02:13', 'rar'),
(76, 10197, '1.3', 'sdf', '2023-04-20 21:04:49', '2023-04-20 21:04:49', 'rar'),
(77, 10197, '1.23.425', 'sdfsdfsdf', '2023-04-20 21:06:09', '2023-04-20 21:06:09', 'rar'),
(78, 10197, '1.90.2', 'What the hell', '2023-04-20 21:09:10', '2023-04-20 21:09:10', 'rar'),
(79, 10198, 'A_1', 'Hey', '2023-04-20 21:29:08', '2023-04-20 21:29:08', 'rar'),
(80, 10199, 'B_1', 'Haha', '2023-04-20 21:29:31', '2023-04-20 21:29:31', 'rar'),
(81, 10199, 'B_2', 'asdasd', '2023-04-20 21:29:48', '2023-04-20 21:29:48', 'rar'),
(82, 10200, 'C_1', 'asdasd', '2023-04-20 21:30:24', '2023-04-20 21:30:24', 'rar'),
(83, 10200, 'ASdasdas', 'C_2', '2023-04-20 21:30:40', '2023-04-20 21:30:40', 'rar'),
(84, 10200, 'C_3', 'asdasd', '2023-04-20 21:30:55', '2023-04-20 21:30:55', 'rar'),
(85, 10201, '1ewsads', 'asdasd', '2023-04-20 22:42:06', '2023-04-20 22:42:06', 'rar'),
(86, 10202, 'asdasd', 'asdasd', '2023-04-20 22:54:07', '2023-04-20 22:54:07', 'rar'),
(93, 10203, '1.2345.345', 'asdsdf', '2023-04-21 05:58:57', '2023-04-21 05:58:57', 'zip'),
(94, 10205, 'asdasds', 'sadsdf', '2023-04-21 08:22:19', '2023-04-21 08:22:19', 'rar'),
(95, 10205, '1.23.3245.5', 'asdasd', '2023-04-21 09:53:34', '2023-04-21 09:53:34', 'rar'),
(100, 10206, 'asdasd', 'asdasd', '2023-04-22 22:45:07', '2023-04-22 22:45:07', 'rar'),
(101, 10207, 'asdasdasda', 'asdasd', '2023-04-23 00:30:31', '2023-04-23 00:30:31', 'rar'),
(102, 10208, '1.20.3 GA', 'Fixed Bugs', '2023-04-23 12:05:58', '2023-04-23 12:05:58', 'rar'),
(104, 10210, '1.90.2', 'Added Feature', '2023-04-30 11:49:44', '2023-04-30 11:49:44', 'rar'),
(105, 10211, '1.90.2', 'Added Feature', '2023-04-30 11:51:15', '2023-04-30 11:51:15', 'rar'),
(106, 10210, '1.90.5', 'New one', '2023-04-30 13:12:36', '2023-04-30 13:12:36', 'zip'),
(107, 10210, '1.90.5', 'New one', '2023-04-30 13:13:20', '2023-04-30 13:13:20', 'zip'),
(114, 10217, '123', 'asd', '2023-05-09 08:48:27', '2023-05-09 08:48:27', 'rar'),
(115, 10219, '123', '123', '2023-05-09 08:51:21', '2023-05-09 08:51:21', 'zip'),
(118, 10220, '1.0.0.0', 'Stable Release', '2023-05-09 09:47:11', '2023-05-09 09:47:11', 'zip'),
(119, 10220, '1.0.10', 'BugFixes', '2023-05-09 09:47:42', '2023-05-09 09:47:42', 'zip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libraries`
--
ALTER TABLE `libraries` ADD FULLTEXT KEY `fulltext_index_name` (`name`,`description`,`license`);
ALTER TABLE `libraries` ADD FULLTEXT KEY `fulltext_index` (`name`,`description`,`license`,`command`,`link`);

--
-- Indexes for table `libraries_archived`
--
ALTER TABLE `libraries_archived` ADD FULLTEXT KEY `fulltext_index_name` (`name`,`description`,`license`);
ALTER TABLE `libraries_archived` ADD FULLTEXT KEY `fulltext_index` (`name`,`description`,`license`,`command`,`link`);

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD FULLTEXT KEY `username` (`username`,`email`);

--
-- Constraints for dumped tables
--

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
