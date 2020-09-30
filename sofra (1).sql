-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 11:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sofra`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'kfc'),
(15, '2020-09-12 12:46:19', '2020-09-12 12:46:19', 'sze'),
(16, '2020-09-12 12:46:22', '2020-09-12 12:46:22', 'ouj');

-- --------------------------------------------------------

--
-- Table structure for table `category_restaurant`
--

CREATE TABLE `category_restaurant` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_restaurant`
--

INSERT INTO `category_restaurant` (`id`, `created_at`, `updated_at`, `restaurant_id`, `category_id`) VALUES
(11, NULL, NULL, 17, 1),
(13, NULL, NULL, 22, 1),
(14, NULL, NULL, 22, 1),
(15, NULL, NULL, 24, 1),
(16, NULL, NULL, 24, 1),
(17, NULL, NULL, 25, 1),
(18, NULL, NULL, 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'cairo'),
(2, NULL, NULL, 'borsa3ed'),
(3, NULL, NULL, 'fayom'),
(4, NULL, NULL, 'giza'),
(5, NULL, NULL, 'aswan');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `photo`, `password`, `region_id`, `api_token`, `pin_code`, `is_activate`) VALUES
(1, '2020-09-06 16:29:55', '2020-09-06 16:29:56', 'amrpp', 'auusien99@gmail.com', '01101867608', 'ttttmrrr.jpj', '$2y$10$ntnmlU90q2p0WAZ2yTE0MOao/sE.tPC3z.WbVeCC/TfniEPcg2h3G', 1, 'GUK0wezTshLrkDqAZPtBCFmcPgDSXjrB5zxFhQhALB6EYHegZQgBz3Kmv7gx', NULL, 0),
(3, '2020-09-10 00:01:11', '2020-09-22 18:27:06', 'عمرو حسين', 'amrhuusien99@gmail.com', '01201867608', '4tmrrr.jpj', '$2y$10$e/kQf..mSFkKQYjAamSJHO0u.lvFpxvsxxQZIju.nMXURvleO4sHW', 1, '92gyBRPCnyFtx9jtbF1h7DKmLMgVKbKHtNO3PP7eiMYhLo3l8Vn88LbqYHtV', NULL, 1),
(4, '2020-09-15 14:43:52', '2020-09-22 18:27:07', 'mohamed', 'mohamed@gmail.com', '0148765489', NULL, '$2y$10$qEs5z664d17HJfBMIuotU.3Hjb5WCTZxpUKjS2MsIJppKcdRC5kja', 12, 'Q7uMNYV2xqzvS4nT9dhsM0jfPlzy4gpsvKXPmyh5ORHFtQpYiOFFET2m7XJE', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_message` enum('complaint','suggestion','enquiry') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `message`, `type_of_message`) VALUES
(1, '2020-09-06 16:15:11', '2020-09-06 16:15:11', 'amr', 'amr@gamil.com', '0123456789', 'aaaaaaaaa a aaaa a a a a a a', 'suggestion'),
(3, '2020-09-20 09:40:29', '2020-09-20 09:40:29', 'عمرو حسين', 'amrhuusien99@gmail.com', '01201867608', 'asjhdv SIFGUL sdvhgusdk adkfbkla ladfhkja a;ldjvadlibafv', 'suggestion'),
(4, '2020-09-20 09:42:35', '2020-09-20 09:42:35', 'aam', 'amrhuusien99@gmail.com', '0123249856', 'asdSF LKHADF;K ;ADLFKN d;lknakj a;jbdfkl adfjvhbadfilv', 'enquiry'),
(5, '2020-09-21 07:32:58', '2020-09-21 07:32:58', 'عمرو حسينccc', 'amrhuusien99@gmail.com', '01234551696', 'askjhcvSJB;kefj KLEUFH; ;KUHFKs jhlarfgskljbg slfigkubsnkf', 'suggestion');

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
(3, '2017_01_31_203742_create_tokens_table', 1),
(4, '2020_03_22_144155_create_payment_methods_table', 1),
(5, '2020_07_22_125342_create_clients_table', 1),
(6, '2020_07_22_125342_create_comments_table', 1),
(7, '2020_07_22_125342_create_orders_table', 1),
(8, '2020_07_22_125342_create_products_table', 1),
(9, '2020_07_22_125343_create_categories_table', 1),
(10, '2020_07_22_125343_create_cities_table', 1),
(11, '2020_07_22_125343_create_contact_us_table', 1),
(12, '2020_07_22_125343_create_notifications_table', 1),
(13, '2020_07_22_125343_create_offers_table', 1),
(14, '2020_07_22_125343_create_order_product_table', 1),
(15, '2020_07_22_125343_create_regions_table', 1),
(16, '2020_07_22_125343_create_restaurants_table', 1),
(17, '2020_07_22_125343_create_settings_table', 1),
(18, '2020_07_22_125353_create_foreign_keys', 1),
(19, '2020_09_11_211654_entrust_setup_tables', 2),
(23, '2020_03_22_144155_create_category_restaurant_table', 3),
(24, '2017_06_02_160915_create_carts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(11) NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `created_at`, `updated_at`, `title`, `content`, `notifiable_id`, `notifiable_type`) VALUES
(1, '2020-09-08 00:07:54', '2020-09-08 00:07:54', 'يوجد طلب جديد', 'amrppلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(2, '2020-09-08 01:18:12', '2020-09-08 01:18:12', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(3, '2020-09-08 01:21:27', '2020-09-08 01:21:27', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(4, '2020-09-08 01:22:41', '2020-09-08 01:22:41', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(5, '2020-09-08 01:24:35', '2020-09-08 01:24:35', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(6, '2020-09-08 01:25:26', '2020-09-08 01:25:26', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(7, '2020-09-08 01:27:13', '2020-09-08 01:27:13', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(8, '2020-09-08 01:35:20', '2020-09-08 01:35:20', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(9, '2020-09-08 01:36:42', '2020-09-08 01:36:42', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(10, '2020-09-08 01:37:23', '2020-09-08 01:37:23', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(11, '2020-09-08 01:38:14', '2020-09-08 01:38:14', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(12, '2020-09-08 01:39:06', '2020-09-08 01:39:06', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(13, '2020-09-08 01:39:38', '2020-09-08 01:39:38', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(14, '2020-09-08 01:40:26', '2020-09-08 01:40:26', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(15, '2020-09-08 01:41:25', '2020-09-08 01:41:25', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(16, '2020-09-08 01:42:25', '2020-09-08 01:42:25', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(17, '2020-09-08 01:43:30', '2020-09-08 01:43:30', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(18, '2020-09-08 01:44:05', '2020-09-08 01:44:05', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(19, '2020-09-08 01:45:55', '2020-09-08 01:45:55', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(20, '2020-09-08 01:48:20', '2020-09-08 01:48:20', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(21, '2020-09-08 01:52:28', '2020-09-08 01:52:28', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(22, '2020-09-08 02:00:07', '2020-09-08 02:00:07', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(23, '2020-09-08 02:00:47', '2020-09-08 02:00:47', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(24, '2020-09-08 02:01:42', '2020-09-08 02:01:42', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(25, '2020-09-08 02:02:32', '2020-09-08 02:02:32', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(26, '2020-09-08 02:06:49', '2020-09-08 02:06:49', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(27, '2020-09-08 02:14:10', '2020-09-08 02:14:10', 'تم قبول الطلب', 'bbbmrdتم قبول الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(28, '2020-09-08 02:20:59', '2020-09-08 02:20:59', 'تم الغاء الطلب', 'bbbmrdتم الغاء الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(29, '2020-09-08 02:33:09', '2020-09-08 02:33:09', 'تم الغاء الطلب', 'bbbmrdتم الغاء الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(30, '2020-09-08 02:34:00', '2020-09-08 02:34:00', 'تم الغاء الطلب', 'bbbmrdتم الغاء الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(31, '2020-09-08 02:34:29', '2020-09-08 02:34:29', 'تم الغاء الطلب', 'bbbmrdتم الغاء الطلب من مطعم  ', 1, 'App\\Models\\Restaurant'),
(32, '2020-09-08 03:10:58', '2020-09-08 03:10:58', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 1, 'App\\Models\\Restaurant'),
(33, '2020-09-08 03:11:35', '2020-09-08 03:11:35', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 1, 'App\\Models\\Restaurant'),
(34, '2020-09-08 03:12:43', '2020-09-08 03:12:43', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 1, 'App\\Models\\Restaurant'),
(35, '2020-09-08 03:13:31', '2020-09-08 03:13:31', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 1, 'App\\Models\\Restaurant'),
(36, '2020-09-08 03:15:49', '2020-09-08 03:15:49', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 1, 'App\\Models\\Restaurant'),
(37, '2020-09-08 03:41:46', '2020-09-08 03:41:46', 'يوجد طلب جديد', 'amrppلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(38, '2020-09-08 03:42:07', '2020-09-08 03:42:07', 'يوجد طلب جديد', 'amrppلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(39, '2020-09-08 03:59:24', '2020-09-08 03:59:24', 'يوجد طلب جديد', 'amrppلديك طلب جديد من العميل', 2, 'App\\Models\\Restaurant'),
(40, '2020-09-11 02:48:10', '2020-09-11 02:48:10', 'يوجد طلب جديد', 'amrppلديك طلب جديد من العميل', 2, 'App\\Models\\Restaurant'),
(41, '2020-09-11 02:49:29', '2020-09-11 02:49:29', 'يوجد طلب جديد', 'amrppلديك طلب جديد من العميل', 2, 'App\\Models\\Restaurant'),
(42, '2020-09-22 03:12:05', '2020-09-22 03:12:05', 'تم قبول الطلب', 'kentaky55تم قبول الطلب من مطعم  ', 44, 'App\\Models\\Restaurant'),
(43, '2020-09-22 03:14:59', '2020-09-22 03:14:59', 'تم الغاء الطلب', 'bbbmrdتم الغاء الطلب من مطعم  ', 44, 'App\\Models\\Restaurant'),
(44, '2020-09-22 03:17:21', '2020-09-22 03:17:21', 'تم قبول الطلب', 'kentaky55تم قبول الطلب من مطعم  ', 44, 'App\\Models\\Restaurant'),
(45, '2020-09-22 05:03:51', '2020-09-22 05:03:51', 'تم استلام الطلب', 'amrppتم استلام العميل للطلب', 1, 'App\\Models\\Restaurant'),
(46, '2020-09-22 05:32:17', '2020-09-22 05:32:17', 'تم استلام الطلب', 'عمرو حسينتم استلام العميل للطلب', 44, 'App\\Models\\Restaurant'),
(47, '2020-09-22 05:32:32', '2020-09-22 05:32:32', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 44, 'App\\Models\\Restaurant'),
(48, '2020-09-22 05:41:55', '2020-09-22 05:41:55', 'لقد تم رفض الطلب من جانب العميل', 'amrppتم رفض الطلب من عميل', 44, 'App\\Models\\Restaurant'),
(49, '2020-09-22 05:42:19', '2020-09-22 05:42:19', 'تم استلام الطلب', 'عمرو حسينتم استلام العميل للطلب', 44, 'App\\Models\\Restaurant'),
(50, '2020-09-27 12:39:39', '2020-09-27 12:39:39', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(51, '2020-09-27 12:40:27', '2020-09-27 12:40:27', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(52, '2020-09-27 12:42:47', '2020-09-27 12:42:47', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(53, '2020-09-27 12:43:30', '2020-09-27 12:43:30', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(54, '2020-09-27 12:45:35', '2020-09-27 12:45:35', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(55, '2020-09-27 12:46:51', '2020-09-27 12:46:51', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(56, '2020-09-27 19:05:07', '2020-09-27 19:05:07', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(57, '2020-09-27 19:09:09', '2020-09-27 19:09:09', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(58, '2020-09-27 19:12:48', '2020-09-27 19:12:48', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(59, '2020-09-29 07:13:36', '2020-09-29 07:13:36', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(60, '2020-09-29 07:14:39', '2020-09-29 07:14:39', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(61, '2020-09-29 07:15:18', '2020-09-29 07:15:18', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(62, '2020-09-29 07:18:01', '2020-09-29 07:18:01', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(63, '2020-09-29 07:48:35', '2020-09-29 07:48:35', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(64, '2020-09-29 07:52:39', '2020-09-29 07:52:39', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(65, '2020-09-29 07:56:51', '2020-09-29 07:56:51', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(66, '2020-09-29 08:03:35', '2020-09-29 08:03:35', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(67, '2020-09-29 08:06:20', '2020-09-29 08:06:20', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(68, '2020-09-29 08:08:00', '2020-09-29 08:08:00', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(69, '2020-09-30 07:57:25', '2020-09-30 07:57:25', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(70, '2020-09-30 07:58:06', '2020-09-30 07:58:06', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(71, '2020-09-30 08:31:36', '2020-09-30 08:31:36', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(72, '2020-09-30 08:33:19', '2020-09-30 08:33:19', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(73, '2020-09-30 08:34:19', '2020-09-30 08:34:19', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(74, '2020-09-30 08:57:24', '2020-09-30 08:57:24', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(75, '2020-09-30 09:01:09', '2020-09-30 09:01:09', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(76, '2020-09-30 09:01:58', '2020-09-30 09:01:58', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(77, '2020-09-30 09:09:39', '2020-09-30 09:09:39', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(78, '2020-09-30 09:26:32', '2020-09-30 09:26:32', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(79, '2020-09-30 09:35:08', '2020-09-30 09:35:08', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(80, '2020-09-30 09:42:21', '2020-09-30 09:42:21', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(81, '2020-09-30 09:47:12', '2020-09-30 09:47:12', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant'),
(82, '2020-09-30 09:48:53', '2020-09-30 09:48:53', 'يوجد طلب جديد', 'عمرو حسينلديك طلب جديد من العميل', 1, 'App\\Models\\Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `created_at`, `updated_at`, `photo`, `title`, `content`, `from`, `to`, `restaurant_id`) VALUES
(3, '2020-09-21 05:11:35', '2020-09-21 07:02:08', 'front/uploads/offers/160067892846927.jpg', 'asdasdasd', 'asegga ahsh strjhtyj sytj', '11/2/2020', '20/4/2020', 44),
(5, '2020-09-23 03:24:43', '2020-09-23 03:24:43', 'front/uploads/Offers/160083868321814.PNG', 'ndghngh', 'ndghndghndg sfgnfgsn sfgn sfgn', '11/1/2020', '20/4/2020', 44);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` enum('pending','accepted','rejected','delivered','declined','complete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `commission` decimal(8,2) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `note`, `address`, `delivery_cost`, `state`, `total_cost`, `cost`, `net`, `quantity`, `commission`, `client_id`, `payment_method_id`, `restaurant_id`) VALUES
(1, '2020-09-08 00:07:53', '2020-09-22 05:41:55', 'nothing', 'giza', '50', 'declined', '30050', '30000', 27050, 4, '3000.00', 1, 1, 44),
(2, '2020-09-08 03:41:46', '2020-09-22 05:48:50', 'nothing', 'giza', '50', 'delivered', '30050', '30000', 27050, 4, '3000.00', 3, 1, 44),
(3, '2020-09-08 03:42:07', '2020-09-08 03:42:07', 'nothing', 'giza', '50', 'pending', '30050', '30000', 27050, 4, '3000.00', 1, 1, 1),
(5, '2020-09-11 02:47:07', '2020-09-11 02:47:07', 'nothing', 'giza', '70', 'delivered', '30070', '30000', 27070, 3, '3000.00', 3, 1, 1),
(6, '2020-09-11 02:47:31', '2020-09-11 02:47:32', 'nothing', 'giza', '70', 'accepted', '30070', '30000', 27070, 3, '3000.00', 3, 1, 44),
(7, '2020-09-11 02:48:10', '2020-09-22 05:42:19', 'nothing', 'giza', '70', 'complete', '30070', '30000', 27070, 3, '3000.00', 3, 1, 44),
(8, '2020-09-11 02:49:29', '2020-09-11 02:49:29', 'nothing', 'giza', '70', 'delivered', '30070', '30000', 27070, 3, '3000.00', 3, 1, 44),
(9, '2020-09-25 03:43:51', '2020-09-25 03:43:51', 'only katcheb', 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(10, '2020-09-25 03:45:34', '2020-09-25 03:45:34', 'only katcheb', 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(11, '2020-09-25 03:50:49', '2020-09-25 03:50:49', 'only katcheb', 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(12, '2020-09-25 04:13:16', '2020-09-25 04:13:16', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(13, '2020-09-27 12:07:12', '2020-09-27 12:07:12', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 2, NULL, 3, 1, 1),
(14, '2020-09-27 12:19:31', '2020-09-27 12:19:31', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 2, NULL, 3, 1, 1),
(15, '2020-09-27 12:20:07', '2020-09-27 12:20:07', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 2, NULL, 3, 1, 1),
(16, '2020-09-27 12:24:07', '2020-09-27 12:24:07', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 3, NULL, 3, 1, 1),
(17, '2020-09-27 12:25:04', '2020-09-27 12:25:04', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 3, NULL, 3, 1, 1),
(18, '2020-09-27 12:26:20', '2020-09-27 12:26:20', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 3, NULL, 3, 1, 1),
(19, '2020-09-27 12:36:48', '2020-09-27 12:36:48', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 3, NULL, 3, 1, 1),
(20, '2020-09-27 12:38:22', '2020-09-27 12:38:22', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, 3, NULL, 3, 1, 1),
(21, '2020-09-27 12:39:39', '2020-09-27 12:39:39', NULL, 'cairo', '50', 'pending', '120050', '120000', 108050, 3, '12000.00', 3, 1, 1),
(22, '2020-09-27 12:40:27', '2020-09-27 12:40:27', NULL, 'cairo', '50', 'pending', '240050', '240000', 216050, 6, '24000.00', 3, 1, 1),
(23, '2020-09-27 12:42:47', '2020-09-27 12:42:47', NULL, 'cairo', '50', 'pending', '120050', '120000', 108050, 3, '12000.00', 3, 1, 1),
(24, '2020-09-27 12:43:30', '2020-09-27 12:43:30', NULL, 'cairo', '50', 'pending', '240050', '240000', 216050, 6, '24000.00', 3, 1, 1),
(25, '2020-09-27 12:45:35', '2020-09-27 12:45:35', NULL, 'cairo', '50', 'pending', '320050', '320000', 288050, 8, '32000.00', 3, 2, 1),
(26, '2020-09-27 12:46:51', '2020-09-27 12:46:51', 'only katcheb', 'cairo', '50', 'pending', '800050', '800000', 720050, 20, '80000.00', 1, 2, 1),
(27, '2020-09-27 19:05:07', '2020-09-27 19:05:07', 'only katcheb', 'cairo', '50', 'pending', '500050', '500000', 450050, 25, '50000.00', 3, 1, 1),
(28, '2020-09-27 19:09:09', '2020-09-27 19:09:09', 'only katcheb', 'cairo', '50', 'pending', '800050', '800000', 720050, 40, '80000.00', 3, 1, 1),
(29, '2020-09-27 19:12:48', '2020-09-27 19:12:48', 'dublle katcheb', 'cairo', '50', 'pending', '1600050', '1600000', 1440050, 80, '160000.00', 3, 1, 1),
(30, '2020-09-29 07:11:35', '2020-09-29 07:11:35', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(31, '2020-09-29 07:13:35', '2020-09-29 07:13:35', 'nothing', 'giza', '50', 'pending', '60050', '60000', 54050, 3, '6000.00', 3, 1, 1),
(32, '2020-09-29 07:14:39', '2020-09-29 07:14:39', 'nothing', 'giza', '50', 'pending', '60050', '60000', 54050, 3, '6000.00', 3, 1, 1),
(33, '2020-09-29 07:15:18', '2020-09-29 07:15:18', 'nothing', 'giza', '50', 'pending', '60050', '60000', 54050, 3, '6000.00', 3, 1, 1),
(34, '2020-09-29 07:18:00', '2020-09-29 07:18:01', 'nothing', 'giza', '50', 'pending', '60050', '60000', 54050, 3, '6000.00', 3, 1, 1),
(35, '2020-09-29 07:48:35', '2020-09-29 07:48:35', 'nothing', 'giza', '50', 'pending', '160050', '160000', 144050, 4, '16000.00', 3, 1, 1),
(36, '2020-09-29 07:52:38', '2020-09-29 07:52:39', 'nothing', 'giza', '50', 'pending', '400050', '400000', 360050, 20, '40000.00', 3, 1, 1),
(37, '2020-09-29 07:54:59', '2020-09-29 07:54:59', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(38, '2020-09-29 07:56:51', '2020-09-29 07:56:51', 'nothing', 'giza', '50', 'pending', '600050', '600000', 540050, 30, '60000.00', 3, 1, 1),
(39, '2020-09-29 07:59:20', '2020-09-29 07:59:20', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(40, '2020-09-29 07:59:39', '2020-09-29 07:59:39', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(41, '2020-09-29 08:01:23', '2020-09-29 08:01:23', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(42, '2020-09-29 08:03:08', '2020-09-29 08:03:08', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(43, '2020-09-29 08:03:35', '2020-09-29 08:03:35', 'nothing', 'giza', '50', 'pending', '600050', '600000', 540050, 30, '60000.00', 3, 1, 1),
(44, '2020-09-29 08:06:20', '2020-09-29 08:06:20', 'nothing', 'giza', '50', 'pending', '600050', '600000', 540050, 30, '60000.00', 3, 1, 1),
(45, '2020-09-29 08:07:38', '2020-09-29 08:07:38', 'nothing', 'giza', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(46, '2020-09-29 08:08:00', '2020-09-29 08:08:00', 'nothing', 'giza', '50', 'pending', '600050', '600000', 540050, 30, '60000.00', 3, 1, 1),
(68, '2020-09-30 01:39:40', '2020-09-30 01:39:40', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(69, '2020-09-30 01:41:00', '2020-09-30 01:41:00', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(70, '2020-09-30 01:41:17', '2020-09-30 01:41:17', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(71, '2020-09-30 01:42:32', '2020-09-30 01:42:32', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(72, '2020-09-30 07:21:28', '2020-09-30 07:21:28', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(73, '2020-09-30 07:55:59', '2020-09-30 07:55:59', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(74, '2020-09-30 07:56:34', '2020-09-30 07:56:34', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(75, '2020-09-30 07:57:00', '2020-09-30 07:57:00', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(76, '2020-09-30 07:57:24', '2020-09-30 07:57:25', NULL, 'cairo', '50', 'pending', '400050', '400000', 360050, 4, '40000.00', 3, 1, 1),
(77, '2020-09-30 07:58:06', '2020-09-30 07:58:06', NULL, 'cairo', '50', 'pending', '400050', '400000', 360050, 4, '40000.00', 3, 1, 1),
(78, '2020-09-30 08:31:35', '2020-09-30 08:31:36', NULL, 'cairo', '50', 'pending', '550050', '550000', 495050, 5, '55000.00', 3, 1, 1),
(79, '2020-09-30 08:33:19', '2020-09-30 08:33:19', NULL, 'cairo', '50', 'pending', '450050', '450000', 405050, 1, '45000.00', 3, 1, 1),
(80, '2020-09-30 08:34:19', '2020-09-30 08:34:19', NULL, 'cairo', '50', 'pending', '490050', '490000', 441050, 3, '49000.00', 3, 1, 1),
(81, '2020-09-30 08:57:23', '2020-09-30 08:57:24', NULL, 'cairo', '50', 'pending', '220050', '220000', 198050, 7, '22000.00', 3, 1, 1),
(82, '2020-09-30 09:01:08', '2020-09-30 09:01:08', NULL, 'cairo', '50', 'pending', '260050', '260000', 234050, 9, '26000.00', 3, 1, 1),
(83, '2020-09-30 09:01:58', '2020-09-30 09:01:58', NULL, 'cairo', '50', 'pending', '260050', '260000', 234050, 9, '26000.00', 3, 1, 1),
(84, '2020-09-30 09:09:39', '2020-09-30 09:09:39', NULL, 'cairo', '50', 'pending', '230050', '230000', 207050, 7, '23000.00', 3, 1, 1),
(85, '2020-09-30 09:26:32', '2020-09-30 09:26:32', 'nothing', 'giza', '50', 'pending', '600050', '600000', 540050, 30, '60000.00', 3, 1, 1),
(86, '2020-09-30 09:35:07', '2020-09-30 09:35:07', NULL, 'cairo', '50', 'pending', '80050', '80000', 72050, NULL, '8000.00', 3, 1, 1),
(87, '2020-09-30 09:41:08', '2020-09-30 09:41:08', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(88, '2020-09-30 09:42:10', '2020-09-30 09:42:10', NULL, 'cairo', NULL, 'pending', NULL, NULL, NULL, NULL, NULL, 3, 1, 1),
(89, '2020-09-30 09:42:21', '2020-09-30 09:42:21', NULL, 'cairo', '50', 'pending', '80050', '80000', 72050, NULL, '8000.00', 3, 1, 1),
(90, '2020-09-30 09:47:12', '2020-09-30 09:47:12', NULL, 'cairo', '50', 'pending', '180050', '180000', 162050, NULL, '18000.00', 3, 1, 1),
(91, '2020-09-30 09:48:53', '2020-09-30 09:48:53', NULL, 'cairo', '50', 'pending', '180050', '180000', 162050, NULL, '18000.00', 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `created_at`, `updated_at`, `order_id`, `product_id`, `quantity`, `price`, `note`) VALUES
(1, NULL, NULL, 1, 1, NULL, NULL, NULL),
(2, NULL, NULL, 2, 1, NULL, NULL, NULL),
(3, NULL, NULL, 3, 1, NULL, NULL, NULL),
(5, NULL, NULL, 5, 1, NULL, NULL, NULL),
(6, NULL, NULL, 6, 1, NULL, NULL, NULL),
(7, NULL, NULL, 7, 1, NULL, NULL, NULL),
(8, NULL, NULL, 8, 1, NULL, NULL, NULL),
(9, NULL, NULL, 14, 4, NULL, NULL, NULL),
(10, NULL, NULL, 15, 4, NULL, NULL, NULL),
(14, NULL, NULL, 16, 4, NULL, NULL, NULL),
(18, NULL, NULL, 17, 4, NULL, NULL, NULL),
(22, NULL, NULL, 19, 4, NULL, NULL, NULL),
(23, NULL, NULL, 20, 4, NULL, NULL, NULL),
(24, NULL, NULL, 21, 4, NULL, NULL, NULL),
(25, NULL, NULL, 22, 4, NULL, NULL, NULL),
(27, NULL, NULL, 24, 4, NULL, NULL, NULL),
(28, NULL, NULL, 25, 4, NULL, NULL, NULL),
(29, NULL, NULL, 26, 4, NULL, NULL, NULL),
(30, NULL, NULL, 27, 3, NULL, NULL, NULL),
(31, NULL, NULL, 28, 3, NULL, NULL, NULL),
(32, NULL, NULL, 29, 3, NULL, NULL, NULL),
(33, NULL, NULL, 31, 3, 3, '20000', 'only katchup'),
(34, NULL, NULL, 32, 3, 3, '20000', 'only katchup'),
(35, NULL, NULL, 33, 3, 3, '20000', 'only katchup'),
(36, NULL, NULL, 34, 3, 3, '20000', 'only katchup'),
(37, NULL, NULL, 35, 4, 4, '40000', 'only katchup'),
(38, NULL, NULL, 36, 2, 20, '20000', 'only katchup'),
(39, NULL, NULL, 37, 2, 30, '20000', 'only katchup'),
(40, NULL, NULL, 38, 2, 30, '20000', 'only katchup'),
(41, NULL, NULL, 39, 2, 30, '20000', 'only katchup'),
(42, NULL, NULL, 40, 2, 30, '20000', 'only katchup'),
(43, NULL, NULL, 41, 2, 30, '20000', 'only katchup'),
(44, NULL, NULL, 42, 2, 30, '20000', 'only katchup'),
(45, NULL, NULL, 43, 2, 30, '20000', 'only katchup'),
(46, NULL, NULL, 44, 2, 30, '20000', 'only katchup'),
(47, NULL, NULL, 45, 2, 30, '20000', 'only katchup'),
(48, NULL, NULL, 46, 2, 30, '20000', 'only katchup'),
(49, NULL, NULL, 75, 4, 8, '40000', 'only katcheb'),
(50, NULL, NULL, 76, 4, 8, '40000', 'only katcheb'),
(51, NULL, NULL, 76, 2, 4, '20000', 'only katcheb'),
(52, NULL, NULL, 77, 4, 8, '40000', 'only katcheb'),
(53, NULL, NULL, 77, 2, 4, '20000', 'only katcheb'),
(54, NULL, NULL, 78, 4, 9, '40000', 'only katcheb'),
(55, NULL, NULL, 78, 2, 7, '20000', 'only katcheb'),
(56, NULL, NULL, 78, 1, 5, '10000', 'only katcehb'),
(57, NULL, NULL, 79, 4, 7, '40000', 'only katcheb'),
(58, NULL, NULL, 79, 2, 8, '20000', 'only katcheb'),
(59, NULL, NULL, 79, 1, 1, '10000', 'only katcehb'),
(60, NULL, NULL, 80, 4, 9, '40000', 'only katcheb'),
(61, NULL, NULL, 80, 2, 5, '20000', 'only katcheb'),
(62, NULL, NULL, 80, 1, 3, '10000', 'only katcehb'),
(63, NULL, NULL, 81, 1, 8, '10000', 'only katcehb'),
(64, NULL, NULL, 81, 2, 7, '20000', 'only katcheb'),
(65, NULL, NULL, 82, 1, 8, '10000', 'only katcehb'),
(66, NULL, NULL, 82, 3, 9, '20000', 'only katcheb'),
(67, NULL, NULL, 83, 1, 8, '10000', 'only katcehb'),
(68, NULL, NULL, 83, 3, 9, '20000', 'only katcheb'),
(69, NULL, NULL, 84, 1, 9, '10000', 'only katcehb'),
(70, NULL, NULL, 84, 3, 7, '20000', 'only katcheb'),
(71, NULL, NULL, 85, 2, 30, '20000', 'only katchup'),
(72, NULL, NULL, 86, 1, 8, '10000', 'only katcehb'),
(73, NULL, NULL, 87, 1, 8, '10000', 'only katcehb'),
(74, NULL, NULL, 88, 1, 8, '10000', 'only katcehb'),
(75, NULL, NULL, 89, 1, 8, '10000', 'only katcehb'),
(76, NULL, NULL, 90, 3, 9, '20000', 'only katcheb'),
(77, NULL, NULL, 91, 3, 9, '20000', 'only katcheb');

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
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created_at`, `updated_at`, `name`) VALUES
(1, NULL, NULL, 'Cash On Receipt'),
(2, NULL, NULL, 'Visa On Receipt\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `routes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `routes`, `created_at`, `updated_at`) VALUES
(1, 'users-list', 'users list', NULL, 'users.index', NULL, NULL),
(2, 'users-create', 'users create', NULL, 'users.create,users.store', NULL, NULL),
(3, 'users-edit', 'users edit', NULL, '	 users.edit,users.update', NULL, NULL),
(4, 'users-delete', 'users delete', NULL, 'user.destroy', NULL, NULL),
(5, 'role-list', 'role list', NULL, 'role.index', NULL, NULL),
(6, 'role-create', 'role create', NULL, 'role.create,role.store', NULL, NULL),
(7, 'role-edit', 'role edit', NULL, 'role.edit,role.update', NULL, NULL),
(8, 'role-delete', 'role delete', NULL, 'role.destroy', NULL, NULL),
(9, 'clients-list', 'clients list', NULL, 'clients.index', NULL, NULL),
(10, 'clients-create', 'clients create', NULL, 'clients.create,clients.store', NULL, NULL),
(11, 'clients-edit', 'clients edit', NULL, 'clients.edit,clients.update', NULL, NULL),
(12, 'clients-delete', 'clients delete', NULL, 'clients.destroy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 4),
(1, 5),
(2, 4),
(3, 4),
(3, 5),
(4, 4),
(5, 4),
(5, 5),
(6, 4),
(7, 4),
(7, 5),
(8, 4),
(9, 4),
(9, 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `restaurant_id` int(10) UNSIGNED DEFAULT NULL,
  `price_offer` decimal(8,2) DEFAULT NULL,
  `processing_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `created_at`, `updated_at`, `photo`, `title`, `content`, `price`, `restaurant_id`, `price_offer`, `processing_time`) VALUES
(1, '2020-09-06 16:32:58', '2020-09-06 16:32:58', 'front/uploads/products/160068023461273.jpg', '444كميكس فراخ', 'صسي صسثلي لق\\للقلا', '10000', 1, '100.00', '20 ]rdri'),
(2, '2020-09-08 03:39:26', '2020-09-08 03:39:26', 'front/uploads/products/160068023461273.jpg', 'ميكس فراخ', 'صسي oooo', '20000', 1, NULL, NULL),
(3, '2020-09-08 03:42:04', '2020-09-08 03:42:04', 'front/uploads/products/160068023461273.jpg', 'ميكس فراخ', 'صسي oooo', '20000', 1, NULL, NULL),
(4, '2020-09-16 01:56:05', '2020-09-16 01:56:05', 'front/uploads/products/160068023461273.jpg', 'ميكس فراخ جريل', 'لحم علي الجريل مضاف اليه كاتشب ومايونيز', '40000', 1, NULL, NULL),
(6, '2020-09-21 04:00:49', '2020-09-21 07:23:54', 'front/uploads/products/160068023461273.jpg', 'price offer price offer', 'price_offer price_offer price_offer price_offer price_offer price_offer', '$1000', 44, '200.00', '30minute');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `created_at`, `updated_at`, `name`, `city_id`) VALUES
(1, NULL, NULL, 'mtrya', 1),
(2, NULL, NULL, 'bbbbbb', 2),
(3, NULL, NULL, 'bb', 2),
(11, NULL, NULL, 'fffff', 3),
(12, NULL, NULL, 'ff', 3),
(13, NULL, NULL, 'ggggggg', 4),
(14, NULL, NULL, 'ggg', 4),
(15, NULL, NULL, 'aaaaaaa', 5),
(16, NULL, NULL, 'aaa', 5),
(17, NULL, NULL, 'ccccccc', 1),
(18, NULL, NULL, 'ccc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_cost` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `whats_app` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_number` int(11) NOT NULL,
  `is_activate` int(11) NOT NULL DEFAULT 0,
  `state` enum('open','close') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'close',
  `category_id` int(10) UNSIGNED NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `password`, `minimum_order`, `delivery_cost`, `photo`, `whats_app`, `delivery_number`, `is_activate`, `state`, `category_id`, `region_id`, `api_token`, `pin_code`) VALUES
(1, '2020-09-06 16:30:56', '2020-09-22 18:26:35', 'bbbmrd', 'amrhuusien99@gmail.com', '01201867608', '$2y$10$XmAfHJiGDZyx6Hfgmp8Qzu0zQuQUijALiX9t/hru87TYE8vTlV69O', '200', '50', 'bbmrd.jpj', '0123456789', 123456788, 1, 'open', 1, 1, '5aDCgU5sva6CgrIyzjwnEA58GvgQLR0JImtguTKV8KiD9QwmAgDgJmfvZ0lW', NULL),
(3, '2020-09-11 23:50:31', '2020-09-11 23:50:32', '88bmrd', 'ahsien99@gmail.com', '01601867608', '$2y$10$F/53Z7.JRFCyJXUza5N6wudpV3uUJZvT.qvDl3G5bgSJk48DIBjV.', '100', '70', '88mrd.jpj', '0153456789', 153456788, 0, 'open', 1, 1, 'Mn5FzEeThXi8A9lR7J65wOSNU7lDGnxSCFGoOXnBy5zYhrL43Wf5FhWhlICZ', NULL),
(25, '2020-09-12 01:36:14', '2020-09-22 08:44:02', 'bbbmrd', 'ssssdusien99@gmail.com', '010867608', '$2y$10$eD4TEy4uH9R6tfKGO/kooe1Ekc9BneR4/icpemh84gTFMTW8hIqxW', '100', '70', '44mrd.jpj', '0153456789', 153456788, 0, 'open', 1, 1, 'KFQBuKFAyzzt22hREryOEW6lxAqeg7SZAhSbxvpyqnIMtbhiHFalrL0g92hu', NULL),
(44, '2020-09-15 22:03:56', '2020-09-22 18:26:30', 'kentaky55', 'ken@gmail.com', '0168798684', '$2y$10$EhC6HUr/dSD48MCOnpAXtOn1FwDBu1z4Y2RinvFVR7Y.jqx/WOjPa', '2000', '50', 'front/uploads/restaurants/160021463766897.jpg', '01231684984', 1112488146, 1, 'close', 16, 1, 'lsWwY2MBzGN7lmSot57M9Loz9kV7ELM2qTPlZOruKwcu8EbdlCuGQnpzV9z1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'aa', 'aa', '2020-09-11 20:50:40', '2020-09-11 20:50:40'),
(5, 'editor', 'ee', 'ee', '2020-09-11 21:04:03', '2020-09-11 21:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(2, 4),
(2, 5),
(3, 5),
(4, 5),
(5, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `app_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_us` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `app_link`, `facebook`, `twitter`, `insta`, `bank_account`, `about_us`, `commission`) VALUES
(1, NULL, '2020-09-14 23:29:33', 'amr_hussien@gmail.com', 'amr_hussien@gmail.com', 'amr_hussien@gmail.com', 'amrhussien@gmail.com', 'amrhussien', 'amrhussien@gmail.comamrhussien@ gmail.comamrhussien@gmail.comamrhussien@gmail.c omamrhussien@gmail.comamrhussien@gm ail.comamrhussien@gmail.com amrhussien@gmail.comamrhussien@gmail.comamrhussien@gmail.com amrhussien@gmail.comamrhussien@gmail.com amrhussie', '.10');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('android','ios') COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountable_id` int(11) NOT NULL,
  `accountable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `created_at`, `updated_at`, `token`, `type`, `accountable_id`, `accountable_type`) VALUES
(2, '2020-09-06 16:37:45', '2020-09-06 16:37:45', 'chJME6T25nw:APA91bHHW1BHzZeDNIBwF89d8-8f1Q1axJS4nfh7U8tHzR0ILVKtUcAMFxuWDjIPDXbW9QHPn-CwswS9jNQCQFrX4tvbPUILlv7bxqP2f7o-iC4CR5qOM9W_Qb7flms6Wq7n9KZnSrVM', 'android', 1, 'App\\Models\\Client'),
(3, '2020-09-06 21:20:56', '2020-09-06 21:20:56', 'eX2R5HcJFas:APA91bFS74QNwsVoQDcdVOJiCVUmgMownE6eKLvW_M2zfzGo5oZx-jP-wj6uCexllom7Eoag0V17GjMsRrBWcqrUKAL3VEydMgCs_CopN3NoWzGcH9cyHblk0cA89LrCZv7RPuoXtu64', 'android', 1, 'App\\Models\\Restaurant');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `photo`, `email`, `email_verified_at`, `password`, `pin_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'amrr hussien', '01201867608', NULL, 'amrhuusien99@gmail.com', NULL, '$2y$10$ucia/oREs28hOw/NjQzR1.Tkx86vWbn7ssLHnFli9Ek10m7EPCNku', '1456', NULL, '2020-09-10 02:34:17', '2020-09-22 22:49:54'),
(3, 'www', '01234551696', 'uploads/160004792648837.jpg', 'www@gmail.com', NULL, '$2y$10$N7IiKA.0pvtRIaH24asSGOIgUcNkZIOm35kEcvSw3UooKC0WIaSxS', NULL, NULL, '2020-09-13 23:45:26', '2020-09-13 23:45:26'),
(4, 'awdwd', '01234551696', 'uploads/users/160004800499217.jpg', 'wdawd@gmail.com', NULL, '$2y$10$0/.4uxdwbxRWKGwVuHmlnOW3sPU5EDxexWHtKek9.W1kHgAbQvsB.', NULL, NULL, '2020-09-13 23:46:44', '2020-09-13 23:46:44'),
(5, 'piza', '0168465156', 'uploads/users/160021404813235.jpg', 'piza@gmail.com', NULL, '$2y$10$niyur2pH/T1XuJKR6PnLqOEwXZHdw8gOF834sMAlAqH6Hl18YOWu6', NULL, NULL, '2020-09-15 21:54:07', '2020-09-15 21:54:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_restaurant`
--
ALTER TABLE `category_restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_api_token_unique` (`api_token`),
  ADD KEY `clients_region_id_foreign` (`region_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_restaurant_id_foreign` (`restaurant_id`),
  ADD KEY `comments_client_id_foreign` (`client_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_client_id_foreign` (`client_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_restaurant_id_foreign` (`restaurant_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_city_id_foreign` (`city_id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `restaurants_api_token_unique` (`api_token`),
  ADD KEY `restaurants_category_id_foreign` (`category_id`),
  ADD KEY `restaurants_region_id_foreign` (`region_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category_restaurant`
--
ALTER TABLE `category_restaurant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `restaurants_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
