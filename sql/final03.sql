-- Adminer 4.8.1 MySQL 5.7.11 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1,	'2025-01-04 07:54:37',	'2025-01-04 07:54:37',	'期間限定'),
(2,	'2025-01-04 07:54:48',	'2025-01-04 07:54:48',	'經典口味'),
(3,	'2025-01-04 07:54:59',	'2025-01-04 07:54:59',	'個人比薩'),
(4,	'2025-01-04 07:55:15',	'2025-01-04 07:55:15',	'義大利麵/飯/雞翅'),
(5,	'2025-01-04 07:55:27',	'2025-01-04 07:55:27',	'拼盤'),
(6,	'2025-01-04 07:55:34',	'2025-01-04 07:55:34',	'點心'),
(7,	'2025-01-04 07:55:42',	'2025-01-04 07:55:42',	'飲料');

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `meals`;
CREATE TABLE `meals` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `meals_category_id_foreign` (`category_id`),
  CONSTRAINT `meals_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `meals` (`id`, `category_id`, `name`, `price`, `image`, `created_at`, `updated_at`) VALUES
(1,	1,	'肉丸滿滿',	299,	'1736006262.jpg',	'2025-01-04 07:57:42',	'2025-01-04 07:57:42'),
(2,	1,	'嫩牛大蝦起司',	649,	'1736006299.jpg',	'2025-01-04 07:58:19',	'2025-01-04 07:58:19'),
(3,	2,	'松露干貝鮮蝦起司',	639,	'1736006340.jpg',	'2025-01-04 07:59:00',	'2025-01-04 07:59:00'),
(4,	2,	'法式海陸盛宴',	639,	'1736006363.jpg',	'2025-01-04 07:59:23',	'2025-01-04 07:59:23'),
(5,	3,	'嫩牛鮮蝦個人比薩',	222,	'1736006391.jpg',	'2025-01-04 07:59:51',	'2025-01-04 07:59:51'),
(6,	3,	'法式海陸盛宴個人比薩',	222,	'1736006437.jpg',	'2025-01-04 08:00:37',	'2025-01-04 08:00:37'),
(7,	4,	'蒜香培根起司麵',	139,	'1736006474.jpg',	'2025-01-04 08:01:14',	'2025-01-04 08:01:14'),
(8,	4,	'奶油燻雞燉飯',	139,	'1736006500.jpg',	'2025-01-04 08:01:40',	'2025-01-04 08:01:40'),
(9,	4,	'霸王功夫雞_招牌秘製香料',	149,	'1736006530.jpg',	'2025-01-04 08:02:10',	'2025-01-04 08:02:10'),
(10,	5,	'HOT烤雞拼盤',	499,	'1736006558.jpg',	'2025-01-04 08:02:38',	'2025-01-04 08:02:38'),
(11,	5,	'HOT燒大拼盤',	449,	'1736006579.jpg',	'2025-01-04 08:02:59',	'2025-01-04 08:02:59'),
(12,	6,	'蒜香起司軟法',	49,	'1736006607.jpg',	'2025-01-04 08:03:27',	'2025-01-04 08:03:27'),
(13,	6,	'黑芝麻軟法',	59,	'1736006628.jpg',	'2025-01-04 08:03:48',	'2025-01-04 08:03:48'),
(14,	7,	'百事可樂 1.25L',	42,	'1736006659.jpg',	'2025-01-04 08:04:19',	'2025-01-04 08:04:19'),
(15,	7,	'七喜1.25L',	42,	'1736006677.jpg',	'2025-01-04 08:04:38',	'2025-01-04 08:04:38');

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_reset_tokens_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_12_14_000001_create_personal_access_tokens_table',	1),
(5,	'20225_01_04_083533_create_sessions_table',	1),
(6,	'2025_01_04_083443_create_categories_table',	1),
(7,	'2025_01_04_083536_create_customers_table',	1),
(8,	'2025_01_04_083601_create_meals_table',	1),
(9,	'2025_01_04_083616_create_orders_table',	1),
(10,	'2025_01_04_083635_create_order_items_table',	1),
(11,	'2025_01_04_083650_create_posters_table',	1),
(12,	'2025_01_04_083706_create_staff_table',	1);

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `pay` int(11) NOT NULL,
  `starttime` datetime DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `way` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `orders` (`id`, `user_id`, `pay`, `starttime`, `total`, `way`, `status`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'2025-01-04 16:05:33',	'598',	0,	2,	'2025-01-04 07:48:48',	'2025-01-04 08:10:19'),
(2,	1,	0,	NULL,	'0',	0,	0,	'2025-01-04 08:08:12',	'2025-01-04 08:08:12'),
(3,	1,	0,	NULL,	'0',	0,	0,	'2025-01-04 08:11:03',	'2025-01-04 08:11:03'),
(4,	2,	0,	NULL,	'0',	0,	0,	'2025-01-04 08:17:26',	'2025-01-04 08:17:26'),
(5,	1,	1,	'2025-01-06 13:18:18',	'240',	0,	2,	'2025-01-06 05:16:53',	'2025-01-06 05:19:16'),
(6,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 05:20:03',	'2025-01-06 05:20:03'),
(7,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 05:20:47',	'2025-01-06 05:20:47'),
(8,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 05:21:02',	'2025-01-06 05:21:02'),
(9,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 06:19:07',	'2025-01-06 06:19:07'),
(10,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 06:33:14',	'2025-01-06 06:33:14'),
(11,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 06:36:23',	'2025-01-06 06:36:23'),
(12,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 06:40:55',	'2025-01-06 06:40:55'),
(13,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 06:46:53',	'2025-01-06 06:46:53'),
(14,	1,	0,	NULL,	'0',	0,	0,	'2025-01-06 06:58:07',	'2025-01-06 06:58:07'),
(15,	1,	1,	'2025-01-06 15:08:42',	'42',	0,	2,	'2025-01-06 07:07:11',	'2025-01-06 07:09:13');

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) unsigned NOT NULL,
  `meal_id` bigint(20) unsigned DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `endtime` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_meal_id_foreign` (`meal_id`),
  CONSTRAINT `order_items_meal_id_foreign` FOREIGN KEY (`meal_id`) REFERENCES `meals` (`id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `order_items` (`id`, `order_id`, `meal_id`, `quantity`, `status`, `endtime`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	2,	1,	NULL,	'2025-01-04 08:04:58',	'2025-01-04 08:10:17'),
(2,	5,	15,	1,	1,	NULL,	'2025-01-06 05:17:36',	'2025-01-06 05:19:14'),
(3,	5,	13,	1,	1,	NULL,	'2025-01-06 05:17:45',	'2025-01-06 05:19:11'),
(4,	5,	8,	1,	1,	NULL,	'2025-01-06 05:17:52',	'2025-01-06 05:19:15'),
(5,	15,	14,	1,	1,	NULL,	'2025-01-06 07:08:31',	'2025-01-06 07:09:22');

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
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


DROP TABLE IF EXISTS `posters`;
CREATE TABLE `posters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `staffs`;
CREATE TABLE `staffs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `role`, `created_at`, `updated_at`) VALUES
(1,	'客人',	'123@gmail.com',	NULL,	'$2y$12$4jUx7rZra16SUGafLqhuE.VpZTdsd7louvpG5cuhKqZs41PDdUcX6',	NULL,	NULL,	NULL,	'0',	'2025-01-04 07:46:57',	'2025-01-04 07:46:57'),
(2,	'工作人員',	'staff@gmail.com',	NULL,	'$2y$12$4jUx7rZra16SUGafLqhuE.VpZTdsd7louvpG5cuhKqZs41PDdUcX6',	NULL,	NULL,	NULL,	'2',	'2025-01-04 08:17:25',	'2025-01-04 08:17:25'),
(3,	'管理人員',	'poster@gmail.com',	NULL,	'$2y$12$4jUx7rZra16SUGafLqhuE.VpZTdsd7louvpG5cuhKqZs41PDdUcX6',	NULL,	NULL,	NULL,	'1',	NULL,	NULL);

-- 2025-01-06 15:11:41
