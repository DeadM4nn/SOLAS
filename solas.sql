-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2023 at 08:53 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `account_id`, `library_id`, `date_created`, `last_version`) VALUES
(30, 63, 10225, '2023-06-01 03:44:50', '1,0,0,3 GA'),
(31, 63, 10246, '2023-06-01 03:45:56', '2.09.7 Beta');

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(14, 25, 10186, '2023-04-24 04:08:24', 'Newest Update'),
(15, 25, 10188, '2023-04-24 04:09:04', NULL),
(16, 26, 10191, '2023-05-09 17:44:08', '2.0.0'),
(17, 26, 10188, '2023-05-09 17:48:50', NULL),
(18, 26, 10187, '2023-05-09 17:49:01', NULL),
(19, 29, 10212, '2023-05-10 00:36:44', '2.13.0'),
(20, 30, 10212, '2023-05-10 01:43:50', '2.14.0'),
(21, 26, 10212, '2023-05-10 13:10:24', '2,0,0'),
(22, 32, 10187, '2023-05-30 18:14:10', NULL),
(23, 32, 10214, '2023-05-30 18:15:52', '1.0.00'),
(24, 32, 10190, '2023-05-30 18:49:53', NULL),
(25, 32, 10190, '2023-05-30 18:50:27', NULL),
(26, 27, 10188, '2023-05-31 09:18:12', NULL),
(27, 27, 10193, '2023-05-31 09:24:02', NULL),
(28, 32, 10212, '2023-05-31 09:49:43', '2,0,0'),
(29, 32, 10192, '2023-05-31 09:50:02', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(33, 'Scala'),
(34, 'GLSL'),
(35, 'CMake'),
(36, 'Golang'),
(37, 'Objective-C++'),
(38, 'Shell'),
(39, 'SWIG'),
(40, 'Starlark'),
(41, 'MLIR'),
(42, 'PostScript');

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
) ENGINE=InnoDB AUTO_INCREMENT=10255 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `libraries`
--

INSERT INTO `libraries` (`library_id`, `name`, `description`, `license`, `views`, `command`, `link`, `is_file`, `creator_id`, `updated_at`, `created_at`) VALUES
(10225, 'Apache Hadoop', 'Apache Hadoop software is an open source framework that allows for the distributed storage and processing of large datasets across clusters of computers using simple programming models. Hadoop is designed to scale up from a single computer to thousands of clustered computers, with each machine offering local computation and storage. In this way, Hadoop can efficiently store and process large datasets ranging in size from gigabytes to petabytes of data.', 'MIT License', 60, NULL, 'https://hadoop.apache.org/docs/stable/', 1, 42, '2023-05-31 12:07:31', '2023-05-31 09:48:58'),
(10226, 'Apache Kajka', 'Apache Kafka is a distributed data store optimized for ingesting and processing streaming data in real-time. Streaming data is data that is continuously generated by thousands of data sources, which typically send the data records in simultaneously. A streaming platform needs to handle this constant influx of data, and process the data sequentially and incrementally.', 'Apache License 2.0', 22, NULL, 'https://kafka.apache.org/', 1, 42, '2023-05-31 12:08:19', '2023-05-31 09:49:38'),
(10227, 'Apache Spark', 'Apache Spark is a data processing framework that can quickly perform processing tasks on very large data sets, and can also distribute data processing tasks across multiple computers, either on its own or in tandem with other distributed computing tools. These two qualities are key to the worlds of big data and machine learning, which require the marshalling of massive computing power to crunch through large data stores. Spark also takes some of the programming burdens of these tasks off the shoulders of developers with an easy-to-use API that abstracts away much of the grunt work of distributed computing and big data processing. From its humble beginnings in the AMPLab at U.C. Berkeley in 2009, Apache Spark has become one of the key big data distributed processing frameworks in the world. Spark can be deployed in a variety of ways, provides native bindings for the Java, Scala, Python, and R programming languages, and supports SQL, streaming data, machine learning, and graph processing. You’ll find it used by banks, telecommunications companies, games companies, governments, and all of the major tech giants such as Apple, IBM, Meta, and Microsoft.', 'LGPL', 200, NULL, 'https://spark.apache.org/', 1, 42, '2023-05-31 09:50:36', '2023-05-31 09:50:36'),
(10228, 'D3.js', 'D3 allows you to bind arbitrary data to a Document Object Model (DOM), and then apply data-driven transformations to the document. For example, you can use D3 to generate an HTML table from an array of numbers. Or, use the same data to create an interactive SVG bar chart with smooth transitions and interaction. D3 is not a monolithic framework that seeks to provide every conceivable feature. Instead, D3 solves the crux of the problem: efficient manipulation of documents based on data. This avoids proprietary representation and affords extraordinary flexibility, exposing the full capabilities of web standards such as HTML, SVG, and CSS. With minimal overhead, D3 is extremely fast, supporting large datasets and dynamic behaviors for interaction and animation. D3’s functional style allows code reuse through a diverse collection of official and community-developed modules.', 'BSD 3-Clause \"New\" or \"Revised\" License', 234, NULL, 'https://d3js.org/', 1, 42, '2023-05-31 09:52:17', '2023-05-31 09:52:17'),
(10229, 'Matplot++', 'Data visualization can help programmers and scientists identify trends in their data and efficiently communicate these results with their peers. Modern C++ is being used for a variety of scientific applications, and this environment can benefit considerably from graphics libraries that attend the typical design goals toward scientific data visualization. Besides the option of exporting results to other environments, the customary alternatives in C++ are either non-dedicated libraries that depend on existing user interfaces or bindings to other languages. Matplot++ is a graphics library for data visualization that provides interactive plotting, means for exporting plots in high-quality formats for scientific publications, a compact syntax consistent with similar libraries, dozens of plot categories with specialized algorithms, multiple coding styles, and supports generic backends.', 'MIT License', 123, NULL, 'https://alandefreitas.github.io/matplotplusplus/', 1, 42, '2023-05-31 12:09:10', '2023-05-31 09:53:30'),
(10230, 'Flask', 'Flask is a lightweight WSGI web application framework. It is designed to make getting started quick and easy, with the ability to scale up to complex applications. It began as a simple wrapper around Werkzeug and Jinja and has become one of the most popular Python web application frameworks. Flask offers suggestions, but doesn\'t enforce any dependencies or project layout. It is up to the developer to choose the tools and libraries they want to use. There are many extensions provided by the community that make adding new functionality easy.', 'BSD 3-Clause \"New\" or \"Revised\" License', 132, NULL, 'https://flask.palletsprojects.com/en/2.3.x/', 1, 55, '2023-05-31 10:09:11', '2023-05-31 10:09:11'),
(10231, 'Gazebo', 'Gazebo brings a fresh approach to simulation with a complete toolbox of development libraries and cloud services to make simulation easy. Iterate fast on your new physical designs in realistic environments with high fidelity sensors streams. Test control strategies in safety, and take advantage of simulation in continuous integration tests.', 'Apache License 2.0', 25, NULL, 'https://gazebosim.org/home', 1, 55, '2023-05-31 12:14:33', '2023-05-31 10:09:14'),
(10232, 'ggplot', 'ggplot2 is a system for declaratively creating graphics, based on The Grammar of Graphics. You provide the data, tell ggplot2 how to map variables to aesthetics, what graphical primitives to use, and it takes care of the details.', 'MIT License', 753, NULL, 'https://ggplot2.tidyverse.org/reference/', 1, 55, '2023-05-31 10:09:17', '2023-05-31 10:09:17'),
(10233, 'SpaCy', 'If you want to do natural language processing (NLP) in Python, then look no further than spaCy, a free and open-source library with a lot of built-in capabilities. It’s becoming increasingly popular for processing and analyzing data in the field of NLP. Unstructured text is produced by companies, governments, and the general population at an incredible scale. It’s often important to automate the processing and analysis of text that would be impossible for humans to process. To automate the processing and analysis of text, you need to represent the text in a format that can be understood by computers. spaCy can help you do that.', 'MIT License', 212, NULL, 'https://spacy.io/', 1, 55, '2023-05-31 12:09:13', '2023-05-31 10:09:27'),
(10234, 'Socket.io', 'It was developed to use open connections to facilitate realtime communication, still a relatively new phenomenon at the time. Socket.IO allows bi-directional communication between client and server. Bi-directional communications are enabled when a client has Socket.IO in the browser, and a server has also integrated the Socket.IO package. While data can be sent in a number of forms, JSON is the simplest. To establish the connection, and to exchange data between client and server, Socket.IO uses Engine.IO. This is a lower-level implementation used under the hood. Engine.IO is used for the server implementation and Engine.IO-client is used for the client.', 'MIT License', 451, NULL, 'https://socket.io/docs/v4/', 1, 55, '2023-05-31 10:09:32', '2023-05-31 10:09:32'),
(10235, 'Matplotlib', 'Matplotlib is a popular data visualization library in Python that provides a wide range of tools for creating static, animated, and interactive visualizations. It was created by John D. Hunter and is widely used by data scientists, analysts, and researchers for visualizing data in a clear and concise manner. With Matplotlib, you can create various types of plots, including line plots, scatter plots, bar plots, histograms, pie charts, and more. It provides a flexible and customizable API that allows you to control every aspect of your visualizations, from colors and line styles to axis labels and annotations. Matplotlib supports multiple backends, allowing you to generate plots in different formats, such as interactive plots in Jupyter Notebooks, static image files (PNG, JPG, etc.), and even interactive plots for web applications using libraries like Flask or Django.', 'MIT License', 351, 'pip install -U matplotlib', 'https://matplotlib.org/', 1, 77, '2023-05-31 12:08:07', '2023-05-31 10:13:24'),
(10236, 'Dask', 'Most of the analytics use NumPy and pandas to analyze big data. These packages are helpful in supporting various computations. Dask is also of great use in cases where our dataset does not fit in the given memory. It helps in scaling up to a cluster with 1000s of cores or CPUs. It also allows scaling down to a single process, or a single core for processing.', 'Boost Software License - Version 1.0', 12, NULL, 'https://www.dask.org/', 1, 77, '2023-05-31 12:07:43', '2023-05-31 10:17:21'),
(10237, 'Netty', '\"Netty is an NIO client server framework which enables quick and easy development of network applications such as protocol servers and clients. It greatly simplifies and streamlines network programming such as TCP and UDP socket server.\r\n\r\n\'Quick and easy\' doesn\'t mean that a resulting application will suffer from a maintainability or a performance issue. Netty has been designed carefully with the experiences earned from the implementation of a lot of protocols such as FTP, SMTP, HTTP, and various binary and text-based legacy protocols. As a result, Netty has succeeded to find a way to achieve ease of development, performance, stability, and flexibility without a compromise.\"', 'Apache License 2.0', 5, NULL, 'https://netty.io/wiki/', 1, 77, '2023-05-31 10:19:28', '2023-05-31 10:19:28'),
(10238, 'OpenCV', 'OpenCV is a huge open-source library for computer vision, machine learning, and image processing. OpenCV supports a wide variety of programming languages like Python, C++, Java, etc. It can process images and videos to identify objects, faces, or even the handwriting of a human. When it is integrated with various libraries, such as Numpy which is a highly optimized library for numerical operations, then the number of weapons increases in your Arsenal i.e whatever operations one can do in Numpy can be combined with OpenCV. This OpenCV tutorial will help you learn the Image-processing from Basics to Advance, like operations on Images, Videos using a huge set of Opencv-programs and projects.', 'Apache License 2.0', 50, NULL, 'https://opencv.org/', 1, 77, '2023-05-31 10:21:25', '2023-05-31 10:21:25'),
(10239, 'Plotly', 'Plotly is a powerful data visualization library that offers interactive and dynamic visualizations for data analysis and presentation. It provides a wide range of chart types, including scatter plots, line plots, bar charts, histograms, 3D plots, and more. One of the standout features of Plotly is its interactivity. It allows users to zoom, pan, and hover over data points to reveal additional information. Plotly visualizations can be embedded in web applications, Jupyter Notebooks, and even exported as standalone HTML files, making them easily shareable and accessible.', 'MIT License', 212, NULL, 'https://plotly.com/python/', 1, 77, '2023-05-31 12:09:25', '2023-05-31 10:22:19'),
(10240, 'PyRobot', 'PyRobot is a Python package for benchmarking and running experiments in robot learning. The goal of this project is to abstract away the low-level controls for individual robots from the high-level motion generation and learning in an easy-to-use way. Using PyRobot will allow you to run robots without having to deal with the robot specific software along with enabling better comparisons.', 'Apache License 2.0', 53, NULL, 'https://pyrobot.org/', 1, 64, '2023-05-31 12:09:06', '2023-05-31 10:58:09'),
(10241, 'Pytorch', 'PyTorch is a fully featured framework for building deep learning models, which is a type of machine learning that’s commonly used in applications like image recognition and language processing. Written in Python, it’s relatively easy for most machine learning developers to learn and use. PyTorch is distinctive for its excellent support for GPUs and its use of reverse-mode auto-differentiation, which enables computation graphs to be modified on the fly. This makes it a popular choice for fast experimentation and prototyping.', '3-Clause BSD', 125, NULL, 'https://pytorch.org/', 1, 64, '2023-05-31 12:08:01', '2023-05-31 10:58:31'),
(10242, 'Robot Framework', 'Robot Framework is supported by Robot Framework Foundation. Many industry-leading companies use the tool in their software development. Robot Framework is open and extensible. Robot Framework can be integrated with virtually any other tool to create powerful and flexible automation solutions. Robot Framework is free to use without licensing costs. Robot Framework has an easy syntax, utilizing human-readable keywords. Its capabilities can be extended by libraries implemented with Python, Java or many other programming languages. Robot Framework has a rich ecosystem around it, consisting of libraries and tools that are developed as separate projects.', 'HPND License', 156, NULL, 'https://robotframework.org/', 1, 64, '2023-05-31 12:09:16', '2023-05-31 10:58:32'),
(10243, 'scikit-image', 'scikit-image is a Python package dedicated to image processing, and using natively NumPy arrays as image objects. This chapter describes how to use scikit-image on various image processing tasks, and insists on the link with other scientific Python modules such as NumPy and SciPy.', 'BSD License', 212, NULL, 'https://scikit-image.org/', 1, 64, '2023-05-31 12:08:48', '2023-05-31 10:58:34'),
(10244, 'Scikit-learn', 'Scikit-learn (Sklearn) is the most useful and robust library for machine learning in Python. It provides a selection of efficient tools for machine learning and statistical modeling including classification, regression, clustering and dimensionality reduction via a consistence interface in Python. This library, which is largely written in Python, is built upon NumPy, SciPy and Matplotlib. It was originally called scikits.learn and was initially developed by David Cournapeau as a Google summer of code project in 2007. Later, in 2010, Fabian Pedregosa, Gael Varoquaux, Alexandre Gramfort, and Vincent Michel, from FIRCA (French Institute for Research in Computer Science and Automation), took this project at another level and made the first public release (v0.1 beta) on 1st Feb. 2010.', 'Apache License 2.0', 21, NULL, 'https://scikit-learn.org/stable/', 1, 64, '2023-05-31 12:08:04', '2023-05-31 10:59:25'),
(10245, 'SentencePiece', 'SentencePiece is an unsupervised text tokenizer and detokenizer mainly for Neural Network-based text generation systems where the vocabulary size is predetermined prior to the neural model training. SentencePiece implements subword units (e.g., byte-pair-encoding (BPE) [Sennrich et al.]) and unigram language model [Kudo.]) with the extension of direct training from raw sentences. SentencePiece allows us to make a purely end-to-end system that does not depend on language-specific pre/postprocessing.', 'Apache License 2.0', 531, NULL, 'https://github.com/google/sentencepiece', 1, 64, '2023-05-31 11:00:41', '2023-05-31 11:00:41'),
(10246, 'Tensorflow', 'TensorFlow is an end-to-end open source platform for machine learning. It has a comprehensive, flexible ecosystem of tools, libraries, and community resources that lets researchers push the state-of-the-art in ML and developers easily build and deploy ML-powered applications. TensorFlow was originally developed by researchers and engineers working on the Google Brain team within Google\'s Machine Intelligence Research organization to conduct machine learning and deep neural networks research. The system is general enough to be applicable in a wide variety of other domains, as well. TensorFlow provides stable Python and C++ APIs, as well as non-guaranteed backward compatible API for other languages. Keep up-to-date with release announcements and security updates by subscribing to announce@tensorflow.org. See all the mailing lists.', 'Apache License 2.0', 521, 'pip install tensorflow', 'https://www.tensorflow.org/', 1, 79, '2023-05-31 12:08:26', '2023-05-31 11:11:41'),
(10247, 'NLTK (Natural Language Toolkit)', 'The Natural Language Toolkit (NLTK) is a platform used for building Python programs that work with human language data for applying in statistical natural language processing (NLP). It contains text processing libraries for tokenization, parsing, classification, stemming, tagging and semantic reasoning. It also includes graphical demonstrations and sample data sets as well as accompanied by a cook book and a book which explains the principles behind the underlying language processing tasks that NLTK supports.', 'Apache License 2.0', 245, NULL, 'https://www.nltk.org/', 1, 79, '2023-05-31 12:09:19', '2023-05-31 11:11:43'),
(10248, 'Keras', 'The purpose of Keras is to give an unfair advantage to any developer looking to ship Machine Learning-powered apps. Keras focuses on debugging speed, code elegance & conciseness, maintainability, and deployability. When you choose Keras, your codebase is smaller, more readable, easier to iterate on. Your models run faster thanks to XLA compilation and Autograph optimizations, and are easier to deploy across every surface (server, mobile, browser, embedded) thanks to TF Serving, TF Lite, and TF.js.', 'Apache License 2.0', 531, NULL, 'https://keras.io/', 1, 79, '2023-05-31 12:16:05', '2023-05-31 11:11:44'),
(10249, 'Pillow', 'The Python Imaging Library adds image processing capabilities to your Python interpreter. This library provides extensive file format support, an efficient internal representation, and fairly powerful image processing capabilities. The core image library is designed for fast access to data stored in a few basic pixel formats. It should provide a solid foundation for a general image processing tool.', 'HPND License', 421, NULL, 'https://github.com/mit-nlp/MITIE', 1, 79, '2023-05-31 12:16:16', '2023-05-31 11:11:46'),
(10250, 'MITIE', 'This project provides free (even for commercial use) state-of-the-art information extraction tools. The current release includes tools for performing named entity extraction and binary relation detection as well as tools for training custom extractors and relation detectors. MITIE is built on top of dlib, a high-performance machine-learning library[1], MITIE makes use of several state-of-the-art techniques including the use of distributional word embeddings[2] and Structural Support Vector Machines[3]. MITIE offers several pre-trained models providing varying levels of support for both English, Spanish, and German trained using a variety of linguistic resources (e.g., CoNLL 2003, ACE, Wikipedia, Freebase, and Gigaword). The core MITIE software is written in C++, but bindings for several other software languages including Python, R, Java, C, and MATLAB allow a user to quickly integrate MITIE into his/her own applications. Outside projects have created API bindings for OCaml, .NET, .NET Core, PHP, and Ruby. There is also an interactive tool for labeling data and training MITIE.', 'Boost Software License - Version 1.0', 325, NULL, 'https://github.com/mit-nlp/MITIE', 1, 79, '2023-05-31 12:08:51', '2023-05-31 11:11:47'),
(10251, 'Gensim', '\"This tutorial is going to provide you with a walk-through of the Gensim library.\r\nGensim : It is an open source library in python written by Radim Rehurek which is used in unsupervised topic modelling and natural language processing. It is designed to extract semantic topics from documents. It can handle large text collections. Hence it makes it different from other machine learning software packages which target memory processing. Gensim also provides efficient multicore implementations for various algorithms to increase processing speed. It provides more convenient  facilities for text processing than other packages like Scikit-learn, R etc.\"', 'Boost Software License - Version 1.0', 521, NULL, 'https://github.com/mit-nlp/MITIE', 1, 80, '2023-05-31 12:07:39', '2023-05-31 11:14:28'),
(10252, 'Django', 'Django is a high-level Python web framework that enables rapid development of secure and maintainable websites. Built by experienced developers, Django takes care of much of the hassle of web development, so you can focus on writing your app without needing to reinvent the wheel.', 'BSD 3-Clause \"New\" or \"Revised\" License', 32, 'pip install Django', 'https://www.djangoproject.com/', 1, 80, '2023-05-31 12:09:22', '2023-05-31 11:15:04'),
(10253, 'Pandas', 'working with “relational” or “labeled” data both easy and intuitive. It aims to be the fundamental high-level building block for doing practical, real-world data analysis in Python. Additionally, it has the broader goal of becoming the most powerful and flexible open source data analysis/manipulation tool available in any language. It is already well on its way toward this goal.', 'Apache License 2.0', 2000, NULL, 'https://pandas.pydata.org/', 1, 80, '2023-05-31 11:15:51', '2023-05-31 11:15:51'),
(10254, 'XGBoost', 'XGBoost, which stands for Extreme Gradient Boosting, is a scalable, distributed gradient-boosted decision tree (GBDT) machine learning library. It provides parallel tree boosting and is the leading machine learning library for regression, classification, and ranking problems. It’s vital to an understanding of XGBoost to first grasp the machine learning concepts and algorithms that XGBoost builds upon: supervised machine learning, decision trees, ensemble learning, and gradient boosting. Supervised machine learning uses algorithms to train a model to find patterns in a dataset with labels and features and then uses the trained model to predict the labels on a new dataset’s features.', 'Apache License 2.0', 3, NULL, 'https://xgboost.readthedocs.io/en/stable/', 1, 80, '2023-05-31 12:14:42', '2023-05-31 11:17:04');

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
) ENGINE=InnoDB AUTO_INCREMENT=10225 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `libraries_archived`
--

INSERT INTO `libraries_archived` (`library_id`, `name`, `description`, `license`, `views`, `command`, `link`, `is_file`, `creator_id`, `updated_at`, `created_at`) VALUES
(10183, 'The SHOGUN machine learning toolbox', 'Shogun is a free, open-source machine learning software library written in C++. It offers numerous algorithms and data structures for machine learning problems. It offers interfaces for Octave, Python, R, Java, Lua, Ruby and C# using SWIG.\r\n\r\nIt is licensed under the terms of the GNU General Public License version 3 or later.', 'GNU General Public License (GPL) Version 3 or later', 405, NULL, 'https://github.com/shogun-toolbox/shogun', 0, 13, '2023-04-30 14:48:16', NULL),
(10186, 'CryptoCompare', 'Python3 wrapper to query cryptocurrency prices (and more) using the CryptoCompare API.', 'MIT License', 647, 'pip3 install cryptocompare', NULL, 1, 14, '2023-05-30 07:54:52', NULL),
(10187, 'Cryptocurrency Exchange Feed Handler', 'Handles multiple cryptocurrency exchange data feeds and returns normalized and standardized results to client registered callbacks for events like trades, book updates, ticker updates, etc. Utilizes websockets when possible, but can also poll data via REST endpoints if a websocket is not provided.', 'XFree86', 11, 'pip install cryptofeed', 'https://github.com/bmoscon/cryptofeed', 0, 14, '2023-05-30 02:15:46', NULL),
(10188, 'Asio C+++ library', 'Asio is a freely available, open-source, cross-platform C++ library for network programming. It provides developers with a consistent asynchronous I/O model using a modern C++ approach. Boost.Asio was accepted into the Boost library on 30 December 2005 after a 20-day review. The library has been developed by Christopher M. Kohlhoff since 2003. A networking proposal based on Asio was submitted to the C++ standards committee in 2006 for possible inclusion in the second Technical Report on C++ Library Extensions (TR2).', 'Boost Software License', 18, NULL, 'https://think-async.com/Asio/', 0, 15, '2023-05-30 17:44:14', NULL),
(10189, 'cryptography', 'cryptography is a package which provides cryptographic recipes and primitives to Python developers. Our goal is for it to be your “cryptographic standard library”. It supports Python 3.6+ and PyPy3 7.3.10+.', 'Apache Software License, BSD License ((Apache-2.0 OR BSD-3-Clause) AND PSF-2.0)', 15, 'pip install cryptography', 'https://pypi.org/project/cryptography/', 0, 15, '2023-05-30 23:44:43', NULL),
(10190, 'Hypatias', 'Hypatia, a Greek mathematician, 355-415 C.E. Considered by many to be the first female mathematician of note.\r\n\r\nHypatia is a single-file-header, pure-C math library. It is almost 100% C89/C90 compliant. This library is intended for use in 2d/3d graphics program (such as games). Since it is not a general purpose math library, but a library meant for 3d graphics, certain opinions have been expressed in its design. One of those design choices, intended to help with speed, is that all objects (quaternions, matrices, vectors) are mutable. (That means that the objects change their values.) This was a purposeful design choice. Construct your program around this choice.', 'open source license', 8, NULL, 'https://dagostinelli.github.io/hypatia/', 0, 16, '2023-05-30 10:09:27', NULL),
(10191, 'MathFu', 'MathFu is a C++ math library developed primarily for games focused on simplicity and efficiency.\r\n\r\nIt provides a suite of vector, matrix and quaternion classes to perform basic geometry suitable for game developers. This functionality can be used to construct geometry for graphics libraries like OpenGL or perform calculations for animation or physics systems.', 'Apache License 2.0', 16, NULL, 'https://google.github.io/mathfu/', 1, 16, '2023-05-29 00:38:04', '2023-04-20 23:18:42'),
(10192, 'astar-algorithm', 'This code is an efficient implementation in C++ and C# of the A* algorithm, designed to be used from high performance realtime applications (video games) and with an optional fast memory allocation scheme.\r\n\r\nIt accompanies this A* tutorial: https://www.heyes-jones.com/astar.php\r\n\r\nThe A* algorithm was described in the paper https://ieeexplore.ieee.org/document/4082128 by Hart, Nillson and Raphael.\r\n\r\nSadly Nils Nillson passed away in 2019, his work is much appreciated.', 'MIT License', 15, NULL, 'https://github.com/justinhj/astar-algorithm-cpp', 0, 17, '2023-05-30 23:39:05', '2023-04-20 23:18:42'),
(10193, 'Pygame', 'Over the next weeks we have plenty of game jams that people from the pygame communities take part in.\r\n\r\nThe pygames hackathon runs from March 20th, 2023 to April 17th 2023, and is open to people in USA and Canada. For this one there\'s $12,700 in prizes. \"If you love programming and gaming, this is the perfect opportunity to showcase your skills and have some fun!\"\r\n\r\nThen the must-use-python PyWeek challenge \"Invites entrants to write a game in one week from scratch either as an individual or in a team. Is intended to be challenging and fun. Will hopefully increase the public body of python game tools, code and expertise. Will let a lot of people actually finish a game, and may inspire new projects (with ready made teams!).\" PyWeek runs from March 26nd, 2023 to April 2nd 2023, and theme voting is already on.\r\n\r\nFinally, Ludum Dare is an event where you create a game from scratch in a weekend based on a theme. April 28th, 2023. Starts at 3:00 AM CEST *. Ludumdare is the oldest online game jam, and has the largest number of participants. There is a Jam (72h, less restrictive rules), and a compo (48h more rules). The Jam now lets people submit paper board games, and even things like crafts that aren\'t games at all!', 'GNU LGPL version 2.1,', 4, 'python -m pip install -U pygame==2.3.0 --user', 'https://www.pygame.org/news', 0, 17, '2023-05-30 17:24:01', NULL),
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
(10209, 'R-LearnPro', 'R-LearnPro is an all-in-one machine learning library for R programming language. It provides a comprehensive set of tools and algorithms for data preprocessing, feature engineering, model selection, and performance evaluation. With R-LearnPro, you can easily build and deploy machine learning models for various domains, such as finance, healthcare, and marketing. R-LearnPro also supports advanced techniques like deep learning and reinforcement learning, making it a versatile library for complex machine learning projects.', 'GNU Affero General Public License Version 3 (AGPLv3)', 2, 'npm install rlearnpro', 'https://github.com/rlearnpro/rlearnpro', 1, 25, '2023-05-29 02:50:28', '2023-04-23 12:07:23'),
(10210, 'SuperMachine', 'This is a library on Machine Learning', 'GNU Affero General Public License Version 3 (AGPLv3)', 2, 'npm install superMachine', 'www.github.com/library/SuperMachine', 1, 25, '2023-04-30 13:21:09', '2023-04-30 11:49:44'),
(10211, 'SuperMachine Kit', 'Best one', NULL, 1, NULL, NULL, 1, 25, '2023-04-30 11:56:04', '2023-04-30 11:51:15'),
(10212, 'TensorFlow', 'TensorFlow is a free and open-source software library for machine learning and artificial intelligence. It can be used across a range of tasks but has a particular focus on training and inference of deep neural networks.\r\n\r\nTensorFlow was developed by the Google Brain team for internal Google use in research and production. The initial version was released under the Apache License 2.0 in 2015. Google released the updated version of TensorFlow, named TensorFlow 2.0, in September 2019.\r\n\r\nTensorFlow can be used in a wide variety of programming languages, including Python, JavaScript, C++, and Java. This flexibility lends itself to a range of applications in many different sectors', 'Apache License 2.0', 40, 'pip install tensorflow', 'https://github.com/tensorflow/tensorflow', 1, 28, '2023-05-30 17:49:40', '2023-05-09 07:00:04'),
(10213, 'Caffee', 'Caffe is a deep learning framework, originally developed at University of California, Berkeley. It is open source, under a BSD license. It is written in C++, with a Python interface.', 'BSD License', 5, NULL, NULL, 1, 28, '2023-05-30 09:21:12', '2023-05-09 07:02:37'),
(10214, 'The Microsoft Cognitive Toolkit (CNTK)', 'The Microsoft Cognitive Toolkit (CNTK) is an open-source toolkit for commercial-grade distributed deep learning. It describes neural networks as a series of computational steps via a directed graph. CNTK allows the user to easily realize and combine popular model types such as feed-forward DNNs, convolutional neural networks (CNNs) and recurrent neural networks (RNNs/LSTMs). CNTK implements stochastic gradient descent (SGD, error backpropagation) learning with automatic differentiation and parallelization across multiple GPUs and servers.', 'MIT License', 24, NULL, NULL, 1, 28, '2023-05-30 17:39:44', '2023-05-09 07:09:14'),
(10215, 'mlpack', 'mlpack is a machine learning software library for C++, built on top of the Armadillo library and the ensmallen numerical optimization library. mlpack has an emphasis on scalability, speed, and ease-of-use. Its aim is to make machine learning possible for novice users by means of a simple, consistent API, while simultaneously exploiting C++ language features to provide maximum performance and maximum flexibility for expert users. Its intended target users are scientists and engineers.\r\n\r\nIt is open-source software distributed under the BSD license, making it useful for developing both open source and proprietary software. Releases 1.0.11 and before were released under the LGPL license. The project is supported by the Georgia Institute of Technology and contributions from around the world.', 'BSD License', 9, NULL, NULL, 1, 28, '2023-05-30 17:49:31', '2023-05-09 07:34:24'),
(10216, 'DyNet', 'DyNet is a neural network library developed by Carnegie Mellon University and many others. It is written in C++ (with bindings in Python) and is designed to be efficient when run on either CPU or GPU, and to work well with networks that have dynamic structures that change for every training instance. For example, these kinds of networks are particularly important in natural language processing tasks, and DyNet has been used to build state-of-the-art systems for syntactic parsing, machine translation, morphological inflection, and many other application areas.', 'Apache License 2.0', 13, NULL, NULL, 1, 28, '2023-05-30 07:19:52', '2023-05-09 07:45:09'),
(10217, 'New goood library', 'Adsasd', NULL, 1, NULL, NULL, 1, 28, '2023-05-09 08:50:11', '2023-05-09 08:48:27'),
(10218, 'New Good Library', '123', NULL, 2, NULL, NULL, 1, 28, '2023-05-09 08:52:14', '2023-05-09 08:50:38'),
(10219, 'New Good Library', '123', NULL, 1, NULL, NULL, 1, 28, '2023-05-09 08:51:32', '2023-05-09 08:51:21'),
(10220, 'Muhammad\'s Machine Learning Library', 'This is a library I created for my Final Year Project that is made convinience', 'MIT License', 4, NULL, NULL, 1, 30, '2023-05-09 20:54:36', '2023-05-09 09:47:11'),
(10221, 'New Library 2', 'Description of the New Library', 'MIT License', 26, 'Install New Library 2', 'www.github.com', 1, 32, '2023-05-30 18:29:27', '2023-05-30 09:16:11'),
(10222, 'New Library', 'Description', NULL, 12, NULL, NULL, 1, 32, '2023-05-30 18:33:22', '2023-05-30 09:22:37'),
(10223, 'asdasdasd', 'asdasdasd', NULL, 2, NULL, NULL, 1, 32, '2023-05-30 17:49:36', '2023-05-30 09:28:04'),
(10224, 'New Library 3', 'Electric Boogaloo', 'MIT License', 3, NULL, NULL, 1, 32, '2023-05-30 18:32:15', '2023-05-30 18:19:58');

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
(10225, 23),
(10226, 23),
(10227, 24),
(10227, 19),
(10227, 33),
(10227, 23),
(10228, 13),
(10229, 18),
(10230, 19),
(10231, 19),
(10231, 14),
(10231, 27),
(10231, 18),
(10232, 24),
(10233, 26),
(10233, 19),
(10234, 19),
(10234, 23),
(10235, 19),
(10236, 19),
(10237, NULL),
(10237, 18),
(10237, 35),
(10237, 19),
(10237, 27),
(10237, 23),
(10238, 23),
(10238, 35),
(10238, 19),
(10238, 27),
(10238, 18),
(10239, 19),
(10240, 27),
(10240, NULL),
(10240, 35),
(10240, 18),
(10240, 19),
(10241, 19),
(10242, 12),
(10242, 14),
(10242, 13),
(10242, 19),
(10243, 18),
(10243, 27),
(10243, 26),
(10243, 19),
(10244, 19),
(10245, NULL),
(10245, 35),
(10245, 19),
(10245, 18),
(10246, NULL),
(10246, NULL),
(10246, 19),
(10246, 18),
(10247, 19),
(10248, 19),
(10249, 38),
(10249, NULL),
(10249, 14),
(10249, 27),
(10249, 19),
(10250, 24),
(10250, 27),
(10250, 35),
(10250, 19),
(10250, 18),
(10251, 19),
(10252, 19),
(10253, 19),
(10254, 19);

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
(10225, 45),
(10225, 15),
(10225, 25),
(10226, 46),
(10227, 25),
(10228, 47),
(10229, 47),
(10230, 48),
(10231, 49),
(10232, 47),
(10233, 50),
(10234, 21),
(10234, 25),
(10235, 47),
(10236, 25),
(10237, 21),
(10237, 25),
(10238, 51),
(10238, 52),
(10239, 47),
(10240, 52),
(10241, 19),
(10242, 49),
(10243, 52),
(10244, 19),
(10245, 50),
(10246, 19),
(10247, 50),
(10248, 19),
(10249, 52),
(10250, 50),
(10251, 50),
(10252, 48),
(10253, 46),
(10254, 21),
(10254, 19);

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
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `library_id`, `account_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(47, 10246, 63, 4, 'An execellent Python library that can make your lives easier for ML. Steep learning curves though.', '2023-05-31 19:47:03', '2023-05-31 19:47:03'),
(48, 10246, 64, 4, NULL, '2023-06-01 03:48:41', '2023-06-01 03:48:41'),
(49, 10225, 44, 4, NULL, '2023-06-01 04:01:37', '2023-06-01 04:01:37'),
(50, 10225, 48, 4, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(52, 10225, 58, 4, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(53, 10225, 54, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(54, 10225, 47, 1, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(55, 10226, 44, 5, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(56, 10226, 37, 4, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(57, 10226, 58, 2, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(58, 10226, 59, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(59, 10226, 56, 5, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(60, 10227, 40, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(61, 10227, 59, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(62, 10227, 42, 2, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(63, 10227, 46, 5, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(64, 10227, 55, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(65, 10228, 48, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(66, 10228, 60, 5, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(67, 10228, 46, 4, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(68, 10228, 55, 2, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(69, 10228, 38, 2, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(70, 10229, 50, 4, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(71, 10229, 40, 5, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(72, 10229, 52, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(73, 10229, 51, 1, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(74, 10229, 46, 1, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(75, 10230, 39, 3, NULL, '2023-06-01 04:06:39', '2023-06-01 04:06:39'),
(76, 10230, 37, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(77, 10230, 46, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(78, 10230, 48, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(79, 10230, 43, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(80, 10231, 43, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(81, 10231, 58, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(82, 10231, 53, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(83, 10231, 49, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(84, 10231, 40, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(85, 10232, 44, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(86, 10232, 41, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(87, 10232, 46, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(88, 10232, 58, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(89, 10232, 53, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(90, 10233, 51, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(91, 10233, 42, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(92, 10233, 38, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(93, 10233, 43, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(94, 10233, 37, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(95, 10234, 47, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(96, 10234, 57, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(97, 10234, 59, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(98, 10234, 48, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(99, 10234, 39, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(100, 10235, 59, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(101, 10235, 54, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(102, 10235, 47, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(103, 10235, 45, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(104, 10235, 44, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(105, 10236, 56, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(106, 10236, 44, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(107, 10236, 47, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(108, 10236, 54, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(109, 10236, 40, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(110, 10237, 60, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(111, 10237, 47, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(112, 10237, 37, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(113, 10237, 40, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(114, 10237, 44, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(115, 10238, 48, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(116, 10238, 56, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(117, 10238, 51, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(118, 10238, 39, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(119, 10238, 57, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(120, 10239, 49, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(121, 10239, 59, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(122, 10239, 46, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(123, 10239, 60, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(124, 10239, 57, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(125, 10240, 57, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(126, 10240, 58, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(127, 10240, 49, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(128, 10240, 47, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(129, 10240, 46, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(130, 10241, 37, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(131, 10241, 39, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(132, 10241, 48, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(133, 10241, 47, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(134, 10241, 38, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(135, 10242, 50, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(136, 10242, 45, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(137, 10242, 52, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(138, 10242, 54, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(139, 10242, 40, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(140, 10243, 43, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(141, 10243, 39, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(142, 10243, 58, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(143, 10243, 52, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(144, 10243, 59, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(145, 10244, 50, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(146, 10244, 40, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(147, 10244, 59, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(148, 10244, 45, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(149, 10244, 58, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(150, 10245, 49, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(151, 10245, 56, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(152, 10245, 37, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(153, 10245, 51, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(154, 10245, 58, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(155, 10246, 39, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(156, 10246, 58, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(157, 10246, 51, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(158, 10246, 49, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(159, 10246, 60, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(160, 10247, 50, 4, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(161, 10247, 58, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(162, 10247, 53, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(163, 10247, 52, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(164, 10247, 46, 3, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(165, 10248, 45, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(166, 10248, 58, 1, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(167, 10248, 37, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(168, 10248, 60, 2, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40'),
(169, 10248, 47, 5, NULL, '2023-06-01 04:06:40', '2023-06-01 04:06:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings_archived`
--

INSERT INTO `ratings_archived` (`id`, `library_id`, `account_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(5, 10186, 15, 5, 'Really useful for my project', '2023-04-18 09:31:00', '2023-04-18 09:31:00'),
(6, 10186, 14, 1, 'Actually Unusable. Installation instruction not clear', '2023-04-18 09:31:46', '2023-04-18 09:31:46'),
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
(26, 10186, 25, 4, 'Not bad. Poor documentation but its a great library once you get used to it.', '2023-04-23 20:08:18', '2023-04-23 20:08:18'),
(27, 10183, 17, 2, NULL, '2023-04-24 05:35:43', '2023-04-24 05:35:43'),
(28, 10191, 25, 5, 'This is pretty good!', '2023-04-30 15:21:09', '2023-04-30 15:21:09'),
(29, 10191, 13, 4, 'Quite good but confusion documentation', '2023-04-30 15:23:35', '2023-04-30 15:23:35'),
(30, 10213, 28, 5, NULL, '2023-05-09 15:34:49', '2023-05-09 15:34:49'),
(31, 10214, 28, 4, NULL, '2023-05-09 15:35:20', '2023-05-09 15:35:20'),
(32, 10215, 28, 4, NULL, '2023-05-09 15:35:32', '2023-05-09 15:35:32'),
(33, 10212, 14, 4, 'Quite good except confusing documentation', '2023-05-09 15:50:15', '2023-05-09 15:50:15'),
(34, 10212, 16, 5, 'Extremely Good and Helpful :)', '2023-05-09 15:56:52', '2023-05-09 15:56:52'),
(35, 10212, 17, 3, 'Confusing', '2023-05-09 15:57:43', '2023-05-09 15:57:43'),
(36, 10212, 30, 4, 'Quite Good!', '2023-05-09 17:43:38', '2023-05-09 17:43:38'),
(37, 10212, 26, 3, 'This is Great User', '2023-05-10 05:19:07', '2023-05-10 05:19:07'),
(38, 10214, 32, 3, 'Quite Meh honestly. This is somewhat of a mid library that gives no advantage to other libraries that offer the same features 2', '2023-05-30 10:17:02', '2023-05-30 10:39:53'),
(39, 10216, 32, 3, 'pretty great', '2023-05-30 10:34:28', '2023-05-30 10:34:49'),
(40, 10216, 32, 4, 'Pretty Good', '2023-05-30 10:36:00', '2023-05-30 10:36:00'),
(41, 10216, 32, 2, '312', '2023-05-30 10:36:30', '2023-05-30 10:36:30'),
(42, 10221, 32, 3, 'what', '2023-05-31 01:05:20', '2023-05-31 01:10:08'),
(43, 10222, 32, 5, NULL, '2023-05-31 01:10:21', '2023-05-31 01:10:21'),
(44, 10214, 27, 3, 'asd', '2023-05-31 01:21:44', '2023-05-31 01:21:44'),
(45, 10214, 32, 5, NULL, '2023-05-31 01:39:32', '2023-05-31 01:39:32'),
(46, 10214, 32, 5, NULL, '2023-05-31 01:39:43', '2023-05-31 01:39:43');

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
('GYxlUnHCe1bUyRn3ndoRSobve5pSL4wSBLPE05C4', 63, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/113.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoienlseFlheVZGeGlwRnlxcEE5NUhnMnBxZURmVjhwdEk1ZDR0blF6SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9saWJyYXJ5L3JlcXVlc3QvMTAyNDYiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo2Mzt9', 1685562547),
('Q9qBIdeMd7kRvgX15zTDWK4JHtbEUwEbrNcMszUn', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaHFzWXVKRzNVSm0xY08yRUpiSzhwZmhuR1RjRTVvQmlQREM0MDU5dSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ob21lIjt9fQ==', 1685566390);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(43, 'Convolutional Neural Network'),
(44, 'New Tag'),
(45, 'Storage'),
(46, 'Big Data'),
(47, 'Data Visualization'),
(48, 'Web Development'),
(49, 'Robotics'),
(50, 'Natural Language Processing (NLP)'),
(51, 'Artificial Intelligence (AI)'),
(52, 'Image Processing');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(27, 30, '\'s Team', 1, '2023-05-09 09:43:08', '2023-05-09 09:43:08'),
(28, 31, '\'s Team', 1, '2023-05-30 01:53:34', '2023-05-30 01:53:34'),
(29, 32, '\'s Team', 1, '2023-05-30 01:55:52', '2023-05-30 01:55:52'),
(30, 36, '\'s Team', 1, '2023-05-30 16:51:16', '2023-05-30 16:51:16');

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
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`, `picture`) VALUES
(1, 'Admin', 'Admin@admin2.com', NULL, '$2y$10$m6PU/n2IZYj/Lef14GaAEuEelN3jTc3JUnMDHIMA9CuBy0Js1pYVW', NULL, NULL, NULL, NULL, 1, NULL, '2023-02-18 09:34:28', '2023-05-30 17:46:25', 1, 2),
(37, 'artist123', 'artist123@example.com', NULL, '$2y$10$QUC2eg2gawdEhT.Bbt3u6uTTEYorW2GoxMlWupcMxacl7qVUjlPXi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:28:50', '2023-05-31 09:28:50', 0, 12),
(38, 'foodcritic', 'foodcritic@example.com', NULL, '$2y$10$/MGtMxOTy2rPb4ymf/jDrOmdQnGZlASZ/.kNtgIfw.rm0s7.Wj4zq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:28:53', '2023-05-31 09:28:53', 0, 14),
(39, 'sportsfan56', 'sportsfan56@example.com', NULL, '$2y$10$eEjQIE5rLO66XphW5.PDEevQ5lcRvxPWPFB7yYtxjJG6cOUXjupGW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:06', '2023-05-31 09:29:06', 0, 12),
(40, 'bookworm45', 'bookworm45@example.com', NULL, '$2y$10$Bin2qQhUKV2Y9QqW9HIqSeb3d2mALjcTUxr936Bj6ApUnRuVzjFMC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:08', '2023-05-31 09:29:08', 0, 17),
(41, 'fashionista23', 'fashionista23@example.com', NULL, '$2y$10$gHFWUY0D8ivrXNFNhseRgeVOlpIu72HuolvjzWyeQGc.Wk21gQysy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:10', '2023-05-31 09:29:10', 0, 7),
(42, 'techlover77', 'techlover77@example.com', NULL, '$2y$10$cmJLzBRDuY0BXdZVds6N.ee7oDe/R/3ZFsb2PSeDCmsmDcuLJwO7.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:11', '2023-05-31 09:29:11', 0, 6),
(43, 'fashiondiva76', 'fashiondiva76@example.com', NULL, '$2y$10$Ipcj4ILdNtSqOv.eThN19OdSuUsWvaXDZvorkdSa3eY.PfmLwUsuu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:13', '2023-05-31 09:29:13', 0, 6),
(44, 'wanderlust99', 'wanderlust99@example.com', NULL, '$2y$10$uu9VyA3g16Qh6dxQxVCbxe0yTLXnRg13G9J.a1M1RKNfPfUokcWUS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:14', '2023-05-31 09:29:14', 0, 13),
(45, 'fitnessjunkie', 'fitnessjunkie@example.com', NULL, '$2y$10$i7aqkBOu/YNg2MroRXNmH.5aEpPqZQe9PGupGk2fdeGtdG2OdoUYC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:16', '2023-05-31 09:29:16', 0, 8),
(46, 'animaladvocate', 'animaladvocate@example.com', NULL, '$2y$10$QxTO9bxNDJ1n1nMmQCgOkuGkKe8JE0iX7JAYaqrh7zZwPxT36VYCO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:29:17', '2023-05-31 09:29:17', 0, 20),
(47, 'musicfanatic', 'musicfanatic@gmail.com', NULL, '$2y$10$CI3RNX3nbbdUxMTjEgga2Oc8QzBGZxyKYgEVM.aPMi0yG4/zXsXn2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:26', '2023-05-31 09:39:26', 0, 15),
(48, 'sciencegeek89', 'sciencegeek89@gmail.com', NULL, '$2y$10$S8CySXt7RmhXKgDU4VdTWetBTny0biWc1l.rMhxJmjsDiiZOibHDG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:29', '2023-05-31 09:39:29', 0, 15),
(49, 'gamerpro23', 'gamerpro23@gmail.com', NULL, '$2y$10$OrUGhFRzCJR8NyGc8IxRpujPST6F4dlPqN3pT.mC2B6HcdLRCvG2a', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:31', '2023-05-31 09:39:31', 0, 8),
(50, 'travelbug77', 'travelbug77@gmail.com', NULL, '$2y$10$UUkc23rRoVCpDZXwbTaKCexMF14mfpUuPEQADOhLi7j95tkNbKLCa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:33', '2023-05-31 09:39:33', 0, 14),
(51, 'gamerchick', 'gamerchick@gmail.com', NULL, '$2y$10$74otRhKQumweoM/cEPvS6Om6ZlANViEZWHyaRBIWc6CQMHynnABAu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:35', '2023-05-31 09:39:35', 0, 5),
(52, 'fitnessguru99', 'fitnessguru99@gmail.com', NULL, '$2y$10$eR2TeMcwKpWvuiCMc/2Dxu.rStJyC4Y3heHmJkiSw/2fd1eTu2Q3.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:36', '2023-05-31 09:39:36', 0, 5),
(53, 'happygal89', 'happygal89@gmail.com', NULL, '$2y$10$7qj.HBkzQCb72SlgH8VQqOP5m5AYPmCELEs/whWPvijaw6xdYf2i2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:38', '2023-05-31 09:39:38', 0, 11),
(54, 'moviefan32', 'moviefan32@gmail.com', NULL, '$2y$10$eH5kWHqFwkoW28HU3RM3L.f3z8qguvwjfWR0v9MkOX/Ocm1hEmuEG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:39', '2023-05-31 09:39:39', 0, 16),
(55, 'techguru21', 'techguru21@gmail.com', NULL, '$2y$10$YQLb/mbKxOnuS5f8ldtZG.bRxdAtT4lAXKwPPlb0tYuxbAV1bx07u', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:41', '2023-05-31 09:39:41', 0, 7),
(56, 'sportyjoe', 'sportyjoe@gmail.com', NULL, '$2y$10$wz4f0pMXrm4ylftUsqCPsONUd0jXR4MJt7W3mRkg/dAtzcc0PMJX2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:43', '2023-05-31 09:39:43', 0, 8),
(57, 'naturelover92', 'naturelover92@gmail.com', NULL, '$2y$10$lgy3Rd.jE7AipzXRGnxHHu9KHpTC4k8Dix.WimRw5qfxMYIIkK2hG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:44', '2023-05-31 09:39:44', 0, 18),
(58, 'coolguy34', 'coolguy34@gmail.com', NULL, '$2y$10$GPwN38xgrN/9E9Fzu/TWY.I.PtHpdZ/sV6m1kc0xAapfsSk0.mlrG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:46', '2023-05-31 09:39:46', 0, 7),
(59, 'foodiechef', 'foodiechef@gmail.com', NULL, '$2y$10$t8qhZATvH7iBh0L1U9UzGOBJWNSbt7V0SMHq2deMR67Gmm1hW8SJi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:47', '2023-05-31 09:39:47', 0, 19),
(60, 'awesome123', 'awesome123@gmail.com', NULL, '$2y$10$lx6fDn/Tf9Yq1USvYAnYp.qY.h1H0sW8sdtcxtJq61xw2SKGGzFha', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:49', '2023-05-31 09:39:49', 0, 12),
(61, 'animallover88', 'animallover88@gmail.com', NULL, '$2y$10$wEh9RoTWsuaH76yOyXhCf.UuErvzkW1.a5cwggjQ6qgKijtHZwV8W', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:51', '2023-05-31 09:39:51', 0, 5),
(62, 'moviebuff55', 'moviebuff55@gmail.com', NULL, '$2y$10$vsfBV6s8qCN6eIKoxURX9epDLPD/I/WHICyfqupl0Q0YjLjRokqvK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:52', '2023-05-31 09:39:52', 0, 8),
(63, 'artlover17', 'artlover17@gmail.com', NULL, '$2y$10$2xmO2x2Ayh0D/E99PgRmQ.Lh/bGJwYGlv1o5Y970c5mt4HegBJPBC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:54', '2023-05-31 09:39:54', 0, 6),
(64, 'sunnydays', 'sunnydays@gmail.com', NULL, '$2y$10$hHMnd07iWAQWtxAfpw0.KOrdiKeadeRe85M6M8prtLBLw/MxHv.B6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:55', '2023-05-31 09:39:55', 0, 4),
(65, 'yogalover33', 'yogalover33@gmail.com', NULL, '$2y$10$oKuoyF28jUgsLJVxaYw4KeY//YLhy/WtCRJZv8MDhpOizWxamaiMe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:39:57', '2023-05-31 09:39:57', 0, 2),
(66, 'dreamer22', 'dreamer22@gmail.com', NULL, '$2y$10$IXp/axP4dtLAwUk0kkVhD.HeBI5Mmq8QmbOYa6Sh4qv87TZvG7ujC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:40:00', '2023-05-31 09:40:00', 0, 19),
(67, 'photographylover', 'photographylover@yahoo.my', NULL, '$2y$10$vdaO6Oi.v4y1.Cos72/CQuZ8u9nuoMcyuE6TzU1uJVyvyrvcBbtUu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:49', '2023-05-31 09:43:49', 0, 6),
(68, 'fashionicon27', 'fashionicon27@yahoo.my', NULL, '$2y$10$u0WxezURaDkhsZ0CuC20lOdLXBTb3A6py/yZuFbnIDMYOrGAEaA5W', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:52', '2023-05-31 09:43:52', 0, 14),
(69, 'movielover91', 'movielover91@yahoo.my', NULL, '$2y$10$NzXPmbexduJxPachmebHbuZkgkpYHEzJoyL86Q7rAip38ri2MmjdW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:53', '2023-05-31 09:43:53', 0, 11),
(70, 'natureenthusiast', 'natureenthusiast@yahoo.my', NULL, '$2y$10$BWUJQts4uJypBL2Dpx3wCO1uSbybKr.0MWBnTMgXIWRHPQM9GTIri', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:55', '2023-05-31 09:43:55', 0, 14),
(71, 'adventureseeker', 'adventureseeker@yahoo.my', NULL, '$2y$10$HQ.mF6k3RrOCR2FAcBJc8uMntSynD4uUsWqNEEaHRUTYdXDQLGFZK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:56', '2023-05-31 09:43:56', 0, 17),
(72, 'petlover12', 'petlover12@yahoo.my', NULL, '$2y$10$.rEPRyOh6328rn3zHlFEiu4nvZaIzvNyf28jadmVSGPDRBvChofd6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:58', '2023-05-31 09:43:58', 0, 20),
(73, 'gamingwizard', 'gamingwizard@yahoo.my', NULL, '$2y$10$zGptEMD/trS8H5jhl7cJuOYzTiezpDOHbxiq9MxIPu07VJZ2.I2.G', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:43:59', '2023-05-31 09:43:59', 0, 11),
(74, 'booknerd55', 'booknerd55@yahoo.my', NULL, '$2y$10$pe.ewtaX.HsHhAEy2V2VSuxWMPhWdgN7HffW5F09RmMvPwtxt5VIG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:01', '2023-05-31 09:44:01', 0, 13),
(75, 'traveladdict77', 'traveladdict77@yahoo.my', NULL, '$2y$10$PjhdeZvyzGs6AkyTUXXZxuq933gbVlX6AXa9avnyO8ZO.YjT0Rd.m', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:02', '2023-05-31 09:44:02', 0, 11),
(76, 'animalactivist', 'animalactivist@yahoo.my', NULL, '$2y$10$tTWIxTDUokTMO7nYx/DcOOncyv0qIK2K/xBVwLKebb9mN3p1oQj7u', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:04', '2023-05-31 09:44:04', 0, 15),
(77, 'EmilyThompson', 'EmilyThompson@yahoo.my', NULL, '$2y$10$HiSK0M6zQZ1/iE7NzCl.I.1VpI4A7b88ny1ZrNahE6n7uoxlqUO.S', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:06', '2023-05-31 09:44:06', 0, 4),
(78, 'BenjaminWoods', 'BenjaminWoods@yahoo.my', NULL, '$2y$10$YGo.lma3Bg/8aStKA7Kt/.Of53j06W19dBDYKRR8z.besm/xt7SXW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:07', '2023-05-31 09:44:07', 0, 14),
(79, 'OliviaSmith', 'OliviaSmith@yahoo.my', NULL, '$2y$10$SkjhboSc7yQLTj0rjKdnKO4lTSpddQxFX1COilwoNOgx/KSgAZGfS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:08', '2023-05-31 09:44:08', 0, 16),
(80, 'AlexanderBaker', 'AlexanderBaker@yahoo.my', NULL, '$2y$10$/cPe1MU1q7l4HWNMcNoSVexpP4Av9XjxxyqgLHNYMcHlK7gV6/XbO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-31 09:44:10', '2023-05-31 09:44:10', 0, 20);

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_archived`
--

INSERT INTO `users_archived` (`id`, `username`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `is_admin`) VALUES
(13, 'akkible', 'twilse0@aboutads.info', NULL, '$2y$10$pwWmMEcuKSaSBUulSO8kM.fbUK9iuvCZhmD2ufBSskzlZKM2PTT8.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:26:39', '2023-04-22 21:38:37', 0),
(14, 'sdevoy1', 'krobinet1@opensource.org', NULL, '$2y$10$iPEyHdLvYvPBhY4p4PtMnOdSKcEEQvwTEtgz/DR5VB5DP1ENYryZ.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:36:22', '2023-03-27 14:36:22', 0),
(15, 'tmanchester2022', 'ngumm2@linkedin.com', NULL, '$2y$10$2ldBAeAqwsDNQr.Z04EjH.Ke5zN3Hr3qqIV.rFBpUiv7/lWLbINwi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 14:56:58', '2023-05-31 00:02:42', 0),
(16, 'jgeraldi3', 'lposvner3@fotki.com', NULL, '$2y$10$tRBjqw7dfU1nl9C0NFxOQOC.enUNRqGNRroGSfs3so6yY9RomK2Xe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 15:02:04', '2023-03-27 15:02:04', 0),
(17, 'cheustace4', 'dosherin4@wp.com', NULL, '$2y$10$AELBSQ7OmA6j43pB2bTkxe9b4LcbdpHiaMwcs8gBuHkYiMYEF8iyq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 15:08:37', '2023-03-27 15:08:37', 0),
(18, 'Muhammad2001', 'muhd.iskndr01@gmail.com', NULL, '$2y$10$2X.8mxokpsGpKDCrmKoRbORP2Z6H4YD4/8SqdatTQG57n1BLJ5aKG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-27 19:56:55', '2023-03-27 19:56:55', 0),
(19, 'user', 'user@user.com', NULL, '$2y$10$bEVgQWfkrUZ9YBarOWRSc.MPpFS.8H2H0uiBZ36YImZADopVVgkh6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20 20:48:26', '2023-04-20 20:48:26', 0),
(20, 'user', 'user@user.com', NULL, '$2y$10$I2lgv4jk0tiFkxSa5FVm8ulTip4EOztF62KDiAxQ/jLxprhx54W/q', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20 22:22:37', '2023-04-20 22:22:37', 0),
(21, 'user', 'user@user2.com', NULL, '$2y$10$sFmCWM3hC5yk5zDqK70SHuoT5eyCNuHbWzaD/KKAuWAag2lpodegq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-20 22:41:48', '2023-04-23 04:14:45', 0),
(22, 'user2', 'user2@user.com', NULL, '$2y$10$UmuqbdZydsHatM2CYuICE.AkmI4pHqKyH2P/WAQVMNXBnoP0OdDaK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 03:16:34', '2023-04-23 03:16:34', 0),
(23, 'admin2', 'admin2@admin.com', NULL, '$2y$10$azfS.hS/vTLS.t1iF3pdauml02nNfNfo1LuCt1kGsxZRN.QeW4y2m', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 03:17:28', '2023-04-23 03:17:28', 0),
(25, 'ManualUser', 'user@manual.com', NULL, '$2y$10$GcTZsg17BsR8NU1h9ZtoUeZR1WIyjPPpSw0/C5MrZybeTZGoIXpUC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-23 11:50:37', '2023-04-23 12:22:53', 0),
(26, 'Madman', 'mad@man.com', NULL, '$2y$10$SdxjRCKYX.Xd77ZdZELtVu8dLPrxRStTkuNB1V7u/.1ktfLOp1Tyy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 01:44:00', '2023-05-09 21:20:58', 0),
(27, 'NewUser', 'New@user.com', NULL, '$2y$10$GNtcsyArtRsuXMc7R1HrXeb50PEpntJN63vWTJeIn.OyTicVGLWQC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 01:48:21', '2023-05-09 01:48:21', 0),
(28, 'ErenJaeger', 'eren@titan.com', NULL, '$2y$10$5YOK1lEyXIIercaOCCj5y.wzg0RCxf34NdVthAT/2IpDvfTtflCIW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 06:49:00', '2023-05-09 07:35:07', 0),
(29, 'MuhammadIskandar2001', 'muhd.iskndr01@gmail.com', NULL, '$2y$10$uoYBztLq26I.ejbbQoNSr.UltpJ7F/m/yMBj40cy.KVe0p3kP4Enu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 08:36:24', '2023-05-09 09:18:24', 0),
(30, 'MuhammadIskandar001', 'muhd.iskndr001@gmail.com', NULL, '$2y$10$2h.DYxa4kgLhvs2B1iGDM.uqUySmQXmDjy0n8i6FvO3eBub9RlDWG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-09 09:43:08', '2023-05-09 09:43:08', 0),
(31, 'aasd asdasdasd', 'aasdasd@asdasd.com', NULL, '$2y$10$rFATJ5l3VywgFwao8eYGVeaIXTI8e/aqF9jHT48eyDjW8vmiM//BW', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 01:53:33', '2023-05-30 01:53:33', 0),
(32, 'TestUser', 'test@test.com.my', NULL, '$2y$10$3Rut5/aZA3aRdcMKtiEhNOrtJhezql54ZK9ybS69OIJF5Ia2bEjt.', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 01:55:52', '2023-05-30 02:13:27', 0),
(33, 'NewTestUserUpdated', 'New123abc@user.my', NULL, '$2y$10$tdbC47LptbSe1KwtMiI7F.bK8TCidcOcamMHP7SagFXESwWRdVEFm', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 09:40:16', '2023-05-30 10:02:11', 0),
(34, '123wer', '123@123', NULL, '$2y$10$ZmKAShcdlojoDqEdQNhN/uJOPQ8iCwTl8/kzuBcdfnq9ypIrDTHDa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 09:41:49', '2023-05-30 09:41:49', 0),
(35, 'asdasdasdasd', 'asdas@asdasd', NULL, '$2y$10$xML6LsX84Klw8E2xIgS8LeESh.laP8oPkLZD264DDoALHKX0klJS2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 16:49:24', '2023-05-30 16:49:24', 0),
(36, 'asdasd asdassd', 'asdasd@asdasd.me', NULL, '$2y$10$GzQqg6dxmO7/EbSLsHB5BuJ/qJ5KVB.FyjtzWigADxeVusZZZK.9C', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-30 16:51:16', '2023-05-30 16:51:16', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `versions`
--

INSERT INTO `versions` (`version_id`, `library_id`, `version_number`, `description`, `created_at`, `updated_at`, `file_extension`) VALUES
(126, 10225, 'V 1.0.0.2 GA', 'Stable Build', '2023-05-31 09:48:58', '2023-05-31 09:48:58', 'rar'),
(127, 10226, 'Version 3.5.0 Stable', 'Stable Build', '2023-05-31 09:49:38', '2023-05-31 09:49:38', 'rar'),
(128, 10227, 'V 3.0.0.2 GA', 'Stable Build', '2023-05-31 09:50:36', '2023-05-31 09:50:36', 'rar'),
(129, 10228, 'Version 3.5.0 Stable', 'Stable Build', '2023-05-31 09:52:17', '2023-05-31 09:52:17', 'zip'),
(130, 10229, 'V 2.0.0.2 GA', 'Stable Build', '2023-05-31 09:53:30', '2023-05-31 09:53:30', 'zip'),
(131, 10230, '1.90.2', 'Stable Release', '2023-05-31 10:09:11', '2023-05-31 10:09:11', 'rar'),
(132, 10231, 'V.2.0.0', 'Stable Release', '2023-05-31 10:09:14', '2023-05-31 10:09:14', 'rar'),
(133, 10232, '1.0.0', 'Stable Release', '2023-05-31 10:09:17', '2023-05-31 10:09:17', 'zip'),
(134, 10233, '3.0.1.2', 'Patchfix Update', '2023-05-31 10:09:27', '2023-05-31 10:09:27', 'zip'),
(135, 10234, '5.0.2.1', 'Unstable Release', '2023-05-31 10:09:32', '2023-05-31 10:09:32', 'zip'),
(136, 10235, '2.0.3.1', 'Stable Release', '2023-05-31 10:13:24', '2023-05-31 10:13:24', 'zip'),
(137, 10236, 'Build 29 GA', 'Stable Release', '2023-05-31 10:17:21', '2023-05-31 10:17:21', 'rar'),
(138, 10237, '5.0.12.3', 'Stable Release', '2023-05-31 10:19:28', '2023-05-31 10:19:28', 'zip'),
(139, 10238, '5.2.1.4', 'Stable Release', '2023-05-31 10:21:25', '2023-05-31 10:21:25', 'rar'),
(140, 10239, '2.4.6.1', 'Stable Release', '2023-05-31 10:22:19', '2023-05-31 10:22:19', 'rar'),
(141, 10240, '53.2.1 GA', 'Stable Release', '2023-05-31 10:58:09', '2023-05-31 10:58:09', 'zip'),
(142, 10241, '2.13.2', 'Stable Release Public', '2023-05-31 10:58:31', '2023-05-31 10:58:31', 'rar'),
(143, 10242, '1.2.4', 'Bug Patchfix', '2023-05-31 10:58:32', '2023-05-31 10:58:32', 'zip'),
(144, 10243, '23.123.1', 'Stable Release', '2023-05-31 10:58:34', '2023-05-31 10:58:34', 'rar'),
(145, 10244, '2.34.1', 'Stable Release', '2023-05-31 10:59:25', '2023-05-31 10:59:25', 'rar'),
(146, 10245, '24.1.5', 'Stable Release', '2023-05-31 11:00:41', '2023-05-31 11:00:41', 'rar'),
(147, 10246, '2.09.7 Beta', 'Unstable Build', '2023-05-31 11:11:41', '2023-05-31 11:11:41', 'rar'),
(148, 10247, '32.12.3', 'Stable Release', '2023-05-31 11:11:43', '2023-05-31 11:11:43', 'rar'),
(149, 10248, '2.31.24.1', 'Unstable Release', '2023-05-31 11:11:44', '2023-05-31 11:11:44', 'zip'),
(150, 10249, '23.124.1', 'Stable Release', '2023-05-31 11:11:46', '2023-05-31 11:11:46', 'rar'),
(151, 10250, 'Version 2.1.410 GA', 'Stable Release', '2023-05-31 11:11:47', '2023-05-31 11:11:47', 'zip'),
(152, 10251, '21.23.1', 'Stable Release', '2023-05-31 11:14:28', '2023-05-31 11:14:28', 'rar'),
(153, 10252, '123.12.1', 'Stable Release', '2023-05-31 11:15:04', '2023-05-31 11:15:04', 'rar'),
(154, 10253, '123.12.45', 'Stable Release', '2023-05-31 11:15:51', '2023-05-31 11:15:51', 'zip'),
(155, 10254, '2.1.34', 'Stable Release', '2023-05-31 11:17:04', '2023-05-31 11:17:04', 'rar'),
(156, 10225, '1,0,0,3 GA', 'Bug Fix', '2023-05-31 11:46:01', '2023-05-31 11:46:01', 'rar');

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
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(96, 10186, '1.2.22.2', 'New Update', '2023-04-21 10:00:06', '2023-04-21 10:00:06', 'rar'),
(97, 10186, 'Even Newer', 'asdasd', '2023-04-21 10:24:20', '2023-04-21 10:24:20', 'zip'),
(98, 10186, 'Absolute Newest', 'Wow so new', '2023-04-21 10:28:09', '2023-04-21 10:28:09', 'rar'),
(99, 10186, 'Newest Update', 'Whoop', '2023-04-21 10:53:52', '2023-04-21 10:53:52', 'rar'),
(100, 10206, 'asdasd', 'asdasd', '2023-04-22 22:45:07', '2023-04-22 22:45:07', 'rar'),
(101, 10207, 'asdasdasda', 'asdasd', '2023-04-23 00:30:31', '2023-04-23 00:30:31', 'rar'),
(102, 10208, '1.20.3 GA', 'Fixed Bugs', '2023-04-23 12:05:58', '2023-04-23 12:05:58', 'rar'),
(103, 10209, '0.20.5', 'Entered Beta Stage', '2023-04-23 12:07:23', '2023-04-23 12:07:23', 'zip'),
(104, 10210, '1.90.2', 'Added Feature', '2023-04-30 11:49:44', '2023-04-30 11:49:44', 'rar'),
(105, 10211, '1.90.2', 'Added Feature', '2023-04-30 11:51:15', '2023-04-30 11:51:15', 'rar'),
(106, 10210, '1.90.5', 'New one', '2023-04-30 13:12:36', '2023-04-30 13:12:36', 'zip'),
(107, 10210, '1.90.5', 'New one', '2023-04-30 13:13:20', '2023-04-30 13:13:20', 'zip'),
(108, 10191, '2.0.0', 'Newly Added', '2023-05-09 01:50:21', '2023-05-09 01:50:21', 'zip'),
(109, 10212, '2.12.0', 'Build, Compilation and Packaging\r\n\r\nRemoved redundant packages tensorflow-gpu and tf-nightly-gpu. These packages were removed and replaced with packages that direct users to switch to tensorflow or tf-nightly respectively. Since TensorFlow 2.1, the only difference between these two sets of packages was their names, so there is no loss of functionality or GPU support. See https://pypi.org/project/tensorflow-gpu for more details.\r\ntf.function:\r\n\r\ntf.function now uses the Python inspect library directly for parsing the signature of the Python function it is decorated on. This change may break code where the function signature is malformed, but was ignored previously, such as:\r\nUsing functools.wraps on a function with different signature\r\nUsing functools.partial with an invalid tf.function input\r\ntf.function now enforces input parameter names to be valid Python identifiers. Incompatible names are automatically sanitized similarly to existing SavedModel signature behavior.\r\nParameterless tf.functions are assumed to have an empty input_signature instead of an undefined one even if the input_signature is unspecified.\r\ntf.types.experimental.TraceType now requires an additional placeholder_value method to be defined.\r\ntf.function now traces with placeholder values generated by TraceType instead of the value itself.\r\nExperimental APIs tf.config.experimental.enable_mlir_graph_optimization and tf.config.experimental.disable_mlir_graph_optimization were removed.', '2023-05-09 07:00:04', '2023-05-09 07:00:04', 'zip'),
(110, 10213, '1.0.00', 'Stable Release', '2023-05-09 07:02:37', '2023-05-09 07:02:37', 'zip'),
(111, 10214, '1.0.00', 'Stable Release', '2023-05-09 07:09:14', '2023-05-09 07:09:14', 'zip'),
(112, 10215, '1.0.00', 'Stable Release', '2023-05-09 07:34:24', '2023-05-09 07:34:24', 'zip'),
(113, 10216, '1.00.0', 'Stable Release', '2023-05-09 07:45:09', '2023-05-09 07:45:09', 'zip'),
(114, 10217, '123', 'asd', '2023-05-09 08:48:27', '2023-05-09 08:48:27', 'rar'),
(115, 10219, '123', '123', '2023-05-09 08:51:21', '2023-05-09 08:51:21', 'zip'),
(116, 10212, '2.13.0', 'Stable Release', '2023-05-09 08:54:26', '2023-05-09 08:54:26', 'zip'),
(117, 10212, '2.14.0', 'Added New Features', '2023-05-09 09:43:59', '2023-05-09 09:43:59', 'zip'),
(118, 10220, '1.0.0.0', 'Stable Release', '2023-05-09 09:47:11', '2023-05-09 09:47:11', 'zip'),
(119, 10220, '1.0.10', 'BugFixes', '2023-05-09 09:47:42', '2023-05-09 09:47:42', 'zip'),
(120, 10212, '2,0,0', 'Added Features', '2023-05-09 21:16:59', '2023-05-09 21:16:59', 'zip'),
(121, 10221, 'V2.0.0.0 abc', 'Unstable Release', '2023-05-30 09:16:11', '2023-05-30 09:16:11', 'zip'),
(122, 10222, 'V2.0.1.0', 'Stable Release', '2023-05-30 09:22:37', '2023-05-30 09:22:37', 'rar'),
(123, 10222, 'V1.5.0', 'Compressed as ZIP INSTEAD', '2023-05-30 09:27:10', '2023-05-30 09:27:10', 'zip'),
(124, 10223, '1.23.4', 'sdfsdfs', '2023-05-30 09:28:04', '2023-05-30 09:28:04', 'rar'),
(125, 10224, '2.0.0', 'asdasd', '2023-05-30 18:19:58', '2023-05-30 18:19:58', 'zip');

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
