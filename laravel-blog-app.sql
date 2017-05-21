-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2017 at 10:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-blog-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'php', NULL, NULL),
(2, 'ruby', NULL, NULL),
(3, 'java', '2017-04-29 12:43:32', '2017-04-29 12:43:32'),
(4, 'python', '2017-04-29 12:44:39', '2017-04-29 12:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `approved`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'iaro', 'legend.ko@hotmail.com', 'normal please', 1, 18, '2017-05-05 11:57:03', '2017-05-06 14:51:21'),
(5, 'bu', 'greg@gmail.com', 'buuuuuuuu', 1, 18, '2017-05-06 10:56:51', '2017-05-06 10:56:51'),
(6, 'zuckerberg', 'zuckerberg@gmail.com', 'hi there!', 1, 18, '2017-05-06 10:58:48', '2017-05-06 10:58:48'),
(9, 'Iaro', 'test@test.com', 'testsssss', 1, 16, '2017-05-06 15:23:31', '2017-05-06 15:23:31'),
(10, 'tre', 'qwe@qwe.com', '<script>alert(\'lololololol\');</script>', 1, 21, '2017-05-06 19:23:26', '2017-05-06 19:23:26');

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
(3, '2017_04_24_112915_create_posts_table', 1),
(4, '2017_04_29_135303_create_categories_table', 2),
(5, '2017_04_29_135740_add_category_id_to_posts', 2),
(6, '2017_04_29_212341_create_tags_table', 3),
(7, '2017_04_29_213636_create_post_tag_table', 4),
(8, '2017_05_05_135757_create_comments_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@test.com', '$2y$10$VttBzzPqUA2wuQLJKK81mOXMdtdP.ltOPGBG/c/xMJdu0bGCRFSA2', '2017-04-27 17:23:44');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(15, 'checking numbers 12', 'number', 'checking-numbers-12-1493202624', NULL, 1, '2017-04-26 10:30:24', '2017-04-26 10:30:24'),
(16, '12', 'just numbers! what happens? crazy!', '12-1493203257', NULL, 1, '2017-04-26 10:31:21', '2017-04-26 10:40:57'),
(17, 'lorem ipsum dolrum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean orci leo, pharetra vitae bibendum at, tempor eu enim. Proin pulvinar mi id sapien pellentesque vestibulum. Ut maximus lorem non maximus porta. Cras sed sagittis elit. Aliquam erat volutpat. Fusce pellentesque ligula ac justo semper faucibus. Maecenas et eleifend eros. Nullam a velit id nisl efficitur lacinia. Phasellus ornare, arcu ut ultricies porttitor, dui nisl efficitur mi, et euismod mi dolor ac enim. Fusce elit orci, tincidunt vel gravida eu, convallis in nisl. Pellentesque nibh sapien, sodales ac sodales at, porttitor sed nunc. get.\r\n\r\nMauris dapibus semper velit sit amet dapibus. Duis sit amet orci egestas, porta orci at, mattis massa. Fusce sit amet mattis risus. Aliquam laoreet neque elit. Maecenas sit amet elit aliquam, consectetur nisl non, sodales sapien. Sed non dolor a neque convallis dapibus. Quisque in dolor dapibus, posuere lorem imperdiet, elementum augue. Phasellus non malesuada lectus, nec bibendum metus. Nam tempor egestas laoreet. Etiam tristique magna ac velit euismod, a accumsan velit aliquam.\r\n\r\nCras tempus convallis quam et ultrices. Proin lacinia eu magna vel iaculis. Quisque mollis ornare nisi, vitae varius mauris. Nunc pulvinar, dolor eu facilisis mollis, lacus metus facilisis mauris, eu convallis nulla libero sagittis nunc. In in dui mi. Vestibulum egestas lectus vel odio congue, et malesuada sem venenatis. Pellentesque rhoncus massa ac est ullamcorper, nec molestie ipsum varius. Praesent fringilla tristique odio, quis maximus enim. Integer scelerisque erat et metus gravida mattis. Nam interdum, orci a sagittis suscipit, sapien tellus luctus urna, sed cursus elit sapien vel sem. In hac habitasse platea dictumst.\r\n\r\nPhasellus vitae faucibus sapien. Pellentesque ornare velit lacinia, tempor elit ac, accumsan sem. Nullam vehicula volutpat malesuada. Proin dignissim, sapien eget rhoncus venenatis, orci lorem euismod lorem, sit amet tristique neque nunc id sem. Vivamus sit amet libero eros. Etiam fermentum sapien sit amet ante eleifend ultrices. Phasellus at eros et tellus maximus eleifend. Maecenas sit amet erat nec tortor dictum mattis id at libero. Duis nec iaculis dui. Praesent auctor erat ac metus elementum congue. Quisque varius nisi et finibus semper.\r\n\r\nNullam posuere dignissim tempor. Aliquam erat volutpat. Sed libero metus, tristique in ultricies nec, eleifend vitae mi. Duis risus sapien, rutrum faucibus justo at, pharetra aliquam mi. Suspendisse vel augue ac nulla tincidunt placerat ut vel nisl. Maecenas malesuada, lacus nec pharetra rutrum, tortor arcu cursus ligula, quis mollis turpis odio et leo. Nam consectetur mattis sapien, sit amet sagittis urna ultricies id. Cras iaculis facilisis interdum. Nunc pharetra nunc id elit dapibus faucibus.', 'lorem-ipsum-dolrum-1493211109', NULL, 1, '2017-04-26 11:30:23', '2017-04-26 12:51:49'),
(20, 'wazzza', '<p><strong>My first post</strong>&nbsp;with&nbsp;<strong>tinymce!</strong></p>\r\n<p>&nbsp;</p>\r\n<p><em>what now?</em></p>\r\n<p>&nbsp;</p>\r\n<h1>well. lets go!</h1>', 'wazzza-1494092778', NULL, 1, '2017-05-06 17:46:18', '2017-05-06 17:46:18'),
(21, 'hacked or no', '<p>&lt;script&gt;alert(\'lololololol\');&lt;/script&gt;</p><p>\r\n \r\nsomething more</p>', 'hacked-or-no-1494098208', NULL, 1, '2017-05-06 19:16:48', '2017-05-06 19:31:39'),
(22, 'image upload', '<p>he<strong>y wazza!</strong></p>', 'image-upload-1494101724', '1494157468.JPG', 1, '2017-05-06 20:15:25', '2017-05-07 11:44:28'),
(23, 'Just smth', '<p><strong>Lets try this out! </strong><em>I mean pagination!</em></p>', 'just-smth-1495134130', NULL, 1, '2017-05-18 19:02:10', '2017-05-18 19:07:39');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`) VALUES
(8, 18, 3),
(9, 18, 4),
(10, 17, 2),
(11, 17, 5),
(12, 20, 1),
(13, 20, 2),
(14, 21, 1),
(15, 22, 2),
(16, 23, 1),
(17, 23, 2),
(18, 23, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'php', '2017-04-29 19:09:17', '2017-04-29 19:09:17'),
(2, 'programming', '2017-04-29 19:09:26', '2017-04-29 19:09:26'),
(3, 'cooking', '2017-04-29 19:09:31', '2017-04-29 19:09:31'),
(4, 'fish&chips', '2017-04-29 19:09:38', '2017-04-29 19:09:38'),
(5, 'Ukraine', '2017-04-29 19:09:44', '2017-05-05 10:15:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Iaro', 'iaro@gmail.com', '$2y$10$dcbA37jMbi1qFdqbpXLzu.tkXVgb.dUJRaoWPml/l0bX9WiILMEe6', 'WIjEuCetMQtlUf9rTLklE3frOmC4cLcJwj051nQcfEima86I55h5SzoMcdGZ', '2017-04-27 12:26:54', '2017-04-27 12:26:54'),
(3, 'test', 'test@test.com', '$2y$10$UvLRS2pTmyeoN3A9s0uoHumJTfmiz2wD4YXRf7YRXwoPyOfpt5ypm', 'Ao3aAIleWPBj9J0tkxWt6DV7WL63MeCPeQGjtZWMQMRecg6E0QLVRSbv6zBX', '2017-04-27 15:29:02', '2017-04-27 15:29:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
