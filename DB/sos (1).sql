-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 17, 2017 at 07:41 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `card_type` bigint(20) NOT NULL,
  `card_number` bigint(16) NOT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_expiry_date` date NOT NULL,
  `medical_syndicate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_medical_syndicate_id` date NOT NULL,
  `license_ministry_health_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccv` bigint(20) NOT NULL,
  `national_id` bigint(20) NOT NULL,
  `back_national_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_national_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialty_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `rejected` tinyint(1) NOT NULL,
  `pending` tinyint(1) NOT NULL,
  `approved_terms` tinyint(1) NOT NULL,
  `front_medical_syndicate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `back_medical_syndicate` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `mobile_identifier` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `gender`, `address`, `mobile`, `card_type`, `card_number`, `card_name`, `number_expiry_date`, `medical_syndicate`, `date_medical_syndicate_id`, `license_ministry_health_id`, `ccv`, `national_id`, `back_national_id`, `image_national_id`, `specialty_id`, `active`, `approved`, `verify`, `rejected`, `pending`, `approved_terms`, `front_medical_syndicate`, `back_medical_syndicate`, `personal_photo`, `user_id`, `mobile_identifier`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Salah', 'salah@gmail.com', '$2y$10$INKtMCTZYzG9OP3OuWOYJuuWkX0mLRRWILeiE9hEZhDf98hqYV9tS', 1, 'Address 1', 10000023, 1, 0, 'Doctor - card', '2017-11-23', 'Syndicate', '2017-11-12', '1212', 222, 2981937182, '', 'images.png', 1, 0, 0, 0, 0, 0, 0, '', '', '', 1, '3d884dad-30ea-47fc-8324-15ef38a170e5', '21250a512122188b37a304a2d6cb9717c35b93176dbec006ea22a55e724dc328', '2017-11-07 09:56:57', '2017-11-16 13:05:44'),
(2, 'ahmed', 'ahmed@yahoo.com', '$2y$10$BN5ONuNP4hbL6Eg/qzIus.iYUP.pRjG2BROOqAQN3Vm9vE2g46eba', 1, 'www', 12345678, 1, 23456789873456, 'v667687788778', '2017-11-01', '453454', '2017-11-04', '22', 22, 45656565656565656, 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 1, 0, 0, 0, 0, 0, 1, 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 0, NULL, 'AxqeorevJz1YvXGnB5AZV266x9ew4RkmwXRtyfeyAmf5OediiSxZkVhDoand', '2017-11-09 13:56:51', '2017-11-09 13:56:51'),
(3, 'ahmedkkk', 'do666c@yahoo.com', '$2y$10$5NGUrpJWa4gYvbl6ctH/CuB7mFCXo5.wFkYpfMWT3Gtv3DDqvSE6.', 1, 'addeerreess', 12345678, 2, 23456789873456, '5423', '2017-11-01', '453454', '2017-11-04', '5464', 22, 4, 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 1, 0, 0, 0, 0, 0, 1, 'soap-bubble-1958650_960_720.jpg', 'images.jpg', 'soap-bubble-1958650_960_720.jpg', 0, NULL, '54ffd45c1dca3fae6f978bccd3af6e78cd3ad7bd973dbf4b50941b099cd4f08a', '2017-11-09 13:58:29', '2017-11-09 13:58:29'),
(4, 'ahmed444', 'ad5min@admin.com', '$2y$10$Y2PdMQhLcw0tJcPPP3gpaO69P7l7o2ixTpTC2w3cl3CX5isyZd.TG', 1, 'addeerreess', 1475662, 1, 23456789873456, '5423', '2017-11-01', '453454', '2017-11-17', '5464', 56456, 2212222222222222222, 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 1, 0, 0, 0, 0, 0, 1, 'images.jpg', 'images-0.jpg', 'soap-bubble-1958650_960_720.jpg', 0, NULL, 'NvkhRgUDlfIdGmWiA6o64bYDqEuF5a7YJXpRJOkHsevZInxrWcHSBu7jgMcO', '2017-11-12 05:13:12', '2017-11-12 05:13:12'),
(5, 'Home', 'ad555min@admin.com', '$2y$10$4KXb3qmlT2dpUYtf0N7rB.giFn/EaH3INoQJn1lyIMGbjrjOvNZgK', 2, 'www', 12345678, 2, 23456789873456, 'v667687788778', '2017-11-02', '453454', '2017-11-10', '5', 56456, 4, 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 1, 0, 0, 0, 0, 0, 1, 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 'soap-bubble-1958650_960_720.jpg', 0, NULL, 'WqlTN15t3pIAzrw25B2FjDWBQM3rzOIOqugMoKrMyP3Ii6ol9afEeMZdzfvS', '2017-11-12 05:19:14', '2017-11-12 05:19:14'),
(6, 'doctor2', 'docoto3@doctor.com', '$2y$10$ISHSRRlUNREBeJEHogASg.RYRufSx9rb4Mw2cfLGKRx/4RmQF2GHq', 1, 'address', 10202223, 2, 68553, 'mohamed', '2017-11-29', '5465464544', '2017-11-23', '3232332232', 5656, 45454545454, 'images.png', 'images.png', 1, 0, 0, 0, 0, 0, 1, 'images.png', 'images.png', 'images.png', 0, NULL, '2XUBXGLPD8roLKgFsIq2aqeCrRR6rdtcnYy9Ic1z7wc4Sz7ezsN31zI0Z3fM', '2017-11-12 06:52:05', '2017-11-12 06:52:05'),
(7, 'doctor1', 'doctor1@doctor.com', '$2y$10$DqDACD5kt1xaGH5/XYHQz.1Y/glqKwRRmhiLaWO3yuOz8V2aJLzVi', 1, 'address1', 923232323232, 2, 1234567891234, 'Mahamed', '2017-11-30', '767757585757', '2017-10-23', '47474774747474', 1234, 8883888882382838, 'images.png', 'images.png', 1, 0, 0, 0, 0, 0, 1, 'images.png', 'images.png', 'images.png', 0, NULL, 'Q9NdX4sTn3cAsA5VH9nHgGVQa187pPlbZolSWX56iwM2d4AY8UMYj0RTJTFt', '2017-11-13 07:13:28', '2017-11-13 07:13:28'),
(8, 'Doctor2', 'docoto2@doctor.com', '$2y$10$GxEYU.VfbVIcyDuLZbbYTu5CdFenqqjh6kPWykWBOk5Wb7SCEPzka', 1, 'address2', 9585857474, 1, 90909090909090, 'mahmoud', '2017-12-21', '500500', '2017-10-10', '89888888', 7878, 2212222222222222223, 'images.png', 'images.png', 1, 0, 0, 0, 0, 0, 1, 'images.png', 'images.png', 'images.png', 0, NULL, 'FtSREfFErnRQV1MHkHCy6kaOqVcGhy9oYZkLpuYsAM5pcAbUo6yJqV1ru7dl', '2017-11-13 08:41:05', '2017-11-13 08:41:05'),
(9, 'mohamed', 'mohammedosama.amagd@gmail.com', '$2y$10$QXRgKur1/Qcseh9souOgcOh.Q9FI.FJZ22ZiPX79eycJRoXr6lbKu', 1, 'Haram', 1008239268, 1, 12345678912345, 'Mohamed', '2017-11-30', '94333673', '2017-09-19', '5889587', 557, 123589332, 'images.png', 'images.png', 1, 0, 0, 0, 0, 0, 1, 'images.png', 'images.png', 'images.png', 0, NULL, 'hj2B5OMNAg78FRDg2LmNsyptU1JkLMVZThaYwo5OdWUj7gx4SXVh43tEfEaG', '2017-11-13 10:02:15', '2017-11-13 10:02:15'),
(10, 'محمد ذكريا عبد المحسن', 'zico@gmail.com', '$2y$10$BFViFYAoomPkRYZNEDfAbeZCPaB/pk/a2KHt6SaiHlnjMgTTJSft2', 1, 'الجيزة', 1008252247, 1, 12345678998741, 'محمد', '2017-11-30', '9984738483874', '2017-08-15', '5558557755775', 556, 123133422342134, 'images.png', 'images.png', 1, 0, 0, 0, 0, 0, 1, 'images.png', 'images.png', 'images.png', 0, NULL, 'SF1UYCS7rh0LHcJ0cYaDeTge8HHvNEbRTPyMt1O5jDDxxTBEeR8GE6Ic5MgZ', '2017-11-13 12:39:32', '2017-11-13 12:39:32'),
(11, 'أمانى', 'amany@gmail.com', '$2y$10$pnZAQzyi9lKS10I1jp.XkOJN0zHZt6P297PS1Uh6vSZfd6T.vm85C', 2, 'أكتوبر', 100929292, 1, 1234567891258, 'أمانى', '2017-12-31', '58555558566', '2017-09-12', '822622558', 555, 77232323238, 'images.png', 'images.png', 1, 0, 0, 0, 0, 0, 1, 'images.png', 'images.png', 'images.png', 0, NULL, 'oeiq8XIbU8XKRzB58kfKI66YigJFtMMSNW2JChYN7D9v0rrPVhuXlYS7lzFG', '2017-11-14 10:05:26', '2017-11-14 10:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_password_resets`
--

CREATE TABLE `doctor_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_companies`
--

INSERT INTO `insurance_companies` (`id`, `name`, `address`, `email`, `user_id`, `contact_person`, `mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Company', 'Address1', 'company1@company.com', 4, 'Manger1', '0100000929', '2017-11-12 10:27:22', '2017-11-12 12:32:26', NULL),
(2, 'Company2', 'address2', 'company2@company.com', 6, 'Company2', '019992929292', '2017-11-13 05:01:45', '2017-11-13 05:06:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `display_name`, `url`, `description`, `user_id`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home_menu', 'Home menu', '#', 'home', 4, 1, '2017-11-08 11:23:56', '2017-11-08 11:23:56', NULL),
(8, 'main_menu_ar', 'main_menu_ar', 'main_menu_ar', 'main_menu_ar', 4, 1, '2017-11-09 06:47:44', '2017-11-09 06:47:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `name`, `display_name`, `url`, `menu_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Home', 'Home', '/en', 1, '2017-11-09 05:10:02', '2017-11-09 05:10:02', NULL),
(2, 'About Us', 'About Us', '/en/about', 1, '2017-11-09 05:35:35', '2017-11-09 05:35:35', NULL),
(3, 'Contact Us', 'Contact Us', '/en/contact', 1, '2017-11-09 05:35:59', '2017-11-09 05:35:59', NULL),
(4, 'My Dashboard', 'My Dashboard', '/en/my-dashboard', 1, '2017-11-09 05:36:27', '2017-11-09 05:36:27', NULL),
(5, '666', '66', '666', 1, '2017-11-09 06:16:18', '2017-11-09 06:17:37', '2017-11-09 06:17:37'),
(6, '66', '66', '66', 1, '2017-11-09 06:16:24', '2017-11-09 06:17:35', '2017-11-09 06:17:35'),
(7, 'tft', 'tff', 'ftft', 1, '2017-11-09 06:16:33', '2017-11-09 06:17:33', '2017-11-09 06:17:33'),
(8, 'tft', 'tf', 'tft', 1, '2017-11-09 06:16:47', '2017-11-09 06:17:28', '2017-11-09 06:17:28'),
(9, 'home_ar', 'الرئيسية', '/ar/home', 8, '2017-11-09 06:50:07', '2017-11-13 10:31:04', NULL),
(10, 'about_ar', 'من نحن', '/ar/about', 8, '2017-11-09 06:50:58', '2017-11-13 10:31:29', NULL),
(11, 'contact_ar', 'اتصل بنا', '/ar/contact', 8, '2017-11-09 06:51:34', '2017-11-13 10:43:28', NULL),
(12, 'ِArabic Dashboard', 'لوحة التحكم', '/ar/my-dashboard', 8, '2017-11-13 10:44:58', '2017-11-13 10:44:58', NULL);

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
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2017_10_24_081254_create_admins_table', 1),
(17, '2017_10_24_081255_create_admin_password_resets_table', 1),
(18, '2017_10_24_081312_create_doctors_table', 1),
(19, '2017_10_24_081313_create_doctor_password_resets_table', 1),
(20, '2017_10_24_081331_create_patients_table', 1),
(21, '2017_10_24_081332_create_patient_password_resets_table', 1),
(22, '2017_10_31_130239_create_cities_table', 1),
(23, '2017_11_01_063239_create_regions_table', 1),
(24, '2017_11_01_111454_create_locations_table', 1),
(25, '2017_11_01_145638_create_roles_table', 1),
(26, '2017_11_01_150358_create_routes_table', 1),
(27, '2017_11_06_111035_create_specialties_table', 2),
(28, '2017_11_06_114525_create_employers_table', 2),
(29, '2017_11_06_131332_create_insurance_companies_table', 2),
(30, '2017_08_23_165057_create_menus_table', 3),
(31, '2017_08_23_165105_create_menu_items_table', 3),
(32, '2017_11_08_140233_create_settings_table', 4),
(33, '2017_11_09_070902_create_menu_items_table', 5);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `card_type` int(11) NOT NULL,
  `card_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_expiry_date` date NOT NULL,
  `national_id` bigint(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `personal_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `approved_terms` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `gender`, `address`, `mobile`, `card_type`, `card_name`, `number_expiry_date`, `national_id`, `active`, `personal_image`, `user_id`, `approved_terms`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'patient1', 'patient1@patient.com', '$2y$10$p0AS2agLarkBa/wQX3Ny2OPeHBAb2nIBss0/29DorkcttidMpnXw6', 1, 'address1', 10000982, 1, 'Visa', '2017-11-30', 9040049494944, 0, 'images.png', 0, 0, 'UYd62Cw30nsFGqCOIJkpkoxXgo6sHBUPzmZ6ezeZlT3PfN0kX516Z9hRmpvQ', '2017-11-12 13:55:37', '2017-11-12 13:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `patient_password_resets`
--

CREATE TABLE `patient_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `description`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'standard', 'This is standard user', 'images.png', NULL, '2017-11-06 08:13:48', NULL),
(2, 'Super User', 'This User Can Access All Pages', 'images.png', NULL, '2017-11-06 09:02:56', NULL),
(5, 'Doctors Admin', 'This Admin Can Access Doctors', 'images.png', '2017-11-06 09:14:20', '2017-11-06 09:14:20', NULL),
(6, 'Admin', 'This is Page Admin', 'images.png', '2017-11-06 09:15:45', '2017-11-06 09:15:45', NULL),
(7, 'Company Manger', 'This is Roles of Company Mangers', 'images.png', '2017-11-12 12:44:28', '2017-11-12 12:44:28', NULL),
(8, 'HR Manger', 'This is Role of HR Manger', 'images.png', '2017-11-12 13:57:04', '2017-11-12 13:57:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` int(10) UNSIGNED NOT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `route`, `role_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'doctors.index', 1, '2017-11-06 08:13:46', '2017-11-07 08:28:19', '2017-11-07 08:28:19'),
(2, 'doctors.create', 1, '2017-11-06 08:13:47', '2017-11-07 08:28:22', '2017-11-07 08:28:22'),
(3, 'doctors.store', 1, '2017-11-06 08:13:47', '2017-11-07 08:28:25', '2017-11-07 08:28:25'),
(4, 'doctors.show', 1, '2017-11-06 08:13:47', '2017-11-07 08:28:28', '2017-11-07 08:28:28'),
(5, 'doctors.edit', 1, '2017-11-06 08:13:48', '2017-11-07 08:28:32', '2017-11-07 08:28:32'),
(6, 'doctors.update', 1, '2017-11-06 08:13:48', '2017-11-07 08:28:35', '2017-11-07 08:28:35'),
(7, 'roles.index', 1, '2017-11-06 08:18:16', '2017-11-07 08:28:37', '2017-11-07 08:28:37'),
(8, 'roles.create', 1, '2017-11-06 08:18:16', '2017-11-07 08:28:41', '2017-11-07 08:28:41'),
(9, 'roles.store', 1, '2017-11-06 08:18:16', '2017-11-07 08:28:43', '2017-11-07 08:28:43'),
(10, 'roles.show', 1, '2017-11-06 08:18:17', '2017-11-07 08:28:46', '2017-11-07 08:28:46'),
(11, 'roles.edit', 1, '2017-11-06 08:18:17', '2017-11-07 08:30:02', '2017-11-07 08:30:02'),
(12, 'roles.update', 1, '2017-11-06 08:18:17', '2017-11-07 08:30:05', '2017-11-07 08:30:05'),
(13, 'roles.destroy', 1, '2017-11-06 08:18:17', '2017-11-07 08:30:08', '2017-11-07 08:30:08'),
(14, 'doctors.index', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(15, 'doctors.create', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(16, 'doctors.store', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(17, 'doctors.show', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(18, 'doctors.edit', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(19, 'doctors.update', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(20, 'doctors.destroy', 2, '2017-11-06 09:02:52', '2017-11-06 09:02:52', NULL),
(21, 'login', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(22, 'logout', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(23, 'register', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(24, 'password.request', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(25, 'password.email', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(26, 'password.reset', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(27, 'doctor.login', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(28, 'doctor.logout', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(29, 'doctor.register', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(30, 'doctor.password.request', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(31, 'doctor.password.email', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(32, 'doctor.password.reset', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(33, 'patient.login', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(34, 'patient.logout', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(35, 'patient.register', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(36, 'patient.password.request', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(37, 'patient.password.email', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(38, 'patient.password.reset', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(39, 'home', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(40, 'cities.index', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(41, 'cities.create', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(42, 'cities.store', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(43, 'cities.show', 2, '2017-11-06 09:02:53', '2017-11-06 09:02:53', NULL),
(44, 'cities.edit', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(45, 'cities.update', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(46, 'cities.destroy', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(47, 'regions.index', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(48, 'regions.create', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(49, 'regions.store', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(50, 'regions.show', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(51, 'regions.edit', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(52, 'regions.update', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(53, 'regions.destroy', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(54, 'locations.index', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(55, 'locations.create', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(56, 'locations.store', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(57, 'locations.show', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(58, 'locations.edit', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(59, 'locations.update', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(60, 'locations.destroy', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(61, 'roles.index', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(62, 'roles.create', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(63, 'roles.store', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(64, 'roles.show', 2, '2017-11-06 09:02:54', '2017-11-06 09:02:54', NULL),
(65, 'roles.edit', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(66, 'roles.update', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(67, 'roles.destroy', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(68, 'routes.index', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(69, 'routes.create', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(70, 'routes.store', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(71, 'routes.show', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(72, 'routes.edit', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(73, 'routes.update', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(74, 'routes.destroy', 2, '2017-11-06 09:02:55', '2017-11-06 09:02:55', NULL),
(75, 'patient.home', 2, '2017-11-06 09:02:56', '2017-11-06 09:02:56', NULL),
(76, 'doctor.home', 2, '2017-11-06 09:02:56', '2017-11-06 09:02:56', NULL),
(77, 'admin.home', 2, '2017-11-06 09:02:56', '2017-11-06 09:02:56', NULL),
(92, 'doctors.index', 5, '2017-11-06 09:14:21', '2017-11-06 09:14:21', NULL),
(93, 'doctors.create', 5, '2017-11-06 09:14:21', '2017-11-06 09:14:21', NULL),
(94, 'doctors.store', 5, '2017-11-06 09:14:21', '2017-11-06 09:14:21', NULL),
(95, 'doctors.show', 5, '2017-11-06 09:14:21', '2017-11-06 09:14:21', NULL),
(96, 'doctors.edit', 5, '2017-11-06 09:14:22', '2017-11-06 09:14:22', NULL),
(97, 'doctors.update', 5, '2017-11-06 09:14:22', '2017-11-06 09:14:22', NULL),
(98, 'doctors.destroy', 5, '2017-11-06 09:14:22', '2017-11-06 09:14:22', NULL),
(99, 'logout', 5, '2017-11-06 09:14:22', '2017-11-06 09:14:22', NULL),
(100, 'cities.index', 6, '2017-11-06 09:15:46', '2017-11-06 09:15:46', NULL),
(101, 'cities.create', 6, '2017-11-06 09:15:46', '2017-11-06 09:15:46', NULL),
(102, 'cities.store', 6, '2017-11-06 09:15:47', '2017-11-06 09:15:47', NULL),
(103, 'cities.show', 6, '2017-11-06 09:15:47', '2017-11-06 09:15:47', NULL),
(104, 'cities.edit', 6, '2017-11-06 09:15:47', '2017-11-06 09:15:47', NULL),
(105, 'cities.update', 6, '2017-11-06 09:15:47', '2017-11-06 09:15:47', NULL),
(106, 'cities.destroy', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(107, 'regions.index', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(108, 'regions.create', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(109, 'regions.store', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(110, 'regions.show', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(111, 'regions.edit', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(112, 'regions.update', 6, '2017-11-06 09:15:48', '2017-11-06 09:15:48', NULL),
(113, 'regions.destroy', 6, '2017-11-06 09:15:49', '2017-11-06 09:15:49', NULL),
(114, 'doctors.filter', 5, '2017-11-06 09:32:45', '2017-11-06 09:32:45', NULL),
(115, 'doctors.filter', 2, '2017-11-06 09:52:21', '2017-11-06 09:52:21', NULL),
(116, 'specialties.index', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(117, 'specialties.create', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(118, 'specialties.store', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(119, 'specialties.show', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(120, 'specialties.edit', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(121, 'specialties.update', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(122, 'specialties.destroy', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(123, 'employers.index', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(124, 'employers.create', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(125, 'employers.store', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(126, 'employers.show', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(127, 'employers.edit', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(128, 'employers.update', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(129, 'employers.destroy', 2, '2017-11-07 13:41:52', '2017-11-07 13:41:52', NULL),
(130, 'insurance_companies.index', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(131, 'insurance_companies.create', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(132, 'insurance_companies.show', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(133, 'insurance_companies.edit', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(134, 'insurance_companies.update', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(135, 'insurance_companies.destroy', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(136, 'specialties.index', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(137, 'specialties.create', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(138, 'specialties.store', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(139, 'specialties.show', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(140, 'specialties.edit', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(141, 'specialties.update', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(142, 'specialties.destroy', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(143, 'employers.index', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(144, 'employers.create', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(145, 'employers.store', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(146, 'employers.show', 2, '2017-11-07 13:41:53', '2017-11-07 13:41:53', NULL),
(147, 'employers.edit', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(148, 'employers.update', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(149, 'employers.destroy', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(150, 'insuranceCompanies.index', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(151, 'insuranceCompanies.create', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(152, 'insuranceCompanies.store', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(153, 'insuranceCompanies.show', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(154, 'insuranceCompanies.edit', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(155, 'insuranceCompanies.update', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(156, 'insuranceCompanies.destroy', 2, '2017-11-07 13:41:54', '2017-11-07 13:41:54', NULL),
(157, 'insurance_companies.store', 2, '2017-11-07 13:42:07', '2017-11-07 13:42:07', NULL),
(158, 'menu_items.index', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(159, 'menu_items.create', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(160, 'menu_items.store', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(161, 'menu_items.show', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(162, 'menu_items.edit', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(163, 'menu_items.update', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(164, 'menu_items.destroy', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(165, 'users.index', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(166, 'users.create', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(167, 'users.store', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(168, 'users.show', 2, '2017-11-12 10:26:09', '2017-11-12 10:26:09', NULL),
(169, 'users.edit', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(170, 'users.update', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(171, 'users.destroy', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(172, 'menus.index', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(173, 'menus.create', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(174, 'menus.store', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(175, 'menus.show', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(176, 'menus.edit', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(177, 'menus.update', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(178, 'menus.destroy', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(179, 'settings.index', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(180, 'settings.create', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(181, 'settings.store', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(182, 'settings.show', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(183, 'settings.edit', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(184, 'settings.update', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(185, 'settings.destroy', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(186, 'menuItems.index', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(187, 'menuItems.create', 2, '2017-11-12 10:26:10', '2017-11-12 10:26:10', NULL),
(188, 'menuItems.store', 2, '2017-11-12 10:26:11', '2017-11-12 10:26:11', NULL),
(189, 'menuItems.show', 2, '2017-11-12 10:26:11', '2017-11-12 10:26:11', NULL),
(190, 'menuItems.edit', 2, '2017-11-12 10:26:11', '2017-11-12 10:26:11', NULL),
(191, 'menuItems.update', 2, '2017-11-12 10:26:11', '2017-11-12 10:26:11', NULL),
(192, 'menuItems.destroy', 2, '2017-11-12 10:26:11', '2017-11-12 10:26:11', NULL),
(193, 'add.manger', 2, '2017-11-12 12:05:20', '2017-11-12 12:05:20', NULL),
(194, 'remove.manger', 2, '2017-11-12 12:05:20', '2017-11-12 12:05:20', NULL),
(195, 'insurance_companies.index', 7, '2017-11-12 12:44:28', '2017-11-12 12:44:28', NULL),
(196, 'insurance_companies.create', 7, '2017-11-12 12:44:28', '2017-11-12 12:44:28', NULL),
(197, 'insurance_companies.store', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(198, 'insurance_companies.show', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(199, 'insurance_companies.edit', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(200, 'insurance_companies.update', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(201, 'insurance_companies.destroy', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(202, 'insuranceCompanies.index', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(203, 'insuranceCompanies.create', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(204, 'insuranceCompanies.store', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(205, 'insuranceCompanies.show', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(206, 'insuranceCompanies.edit', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(207, 'insuranceCompanies.update', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL),
(208, 'insuranceCompanies.destroy', 7, '2017-11-12 12:44:29', '2017-11-12 12:44:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `url`, `logo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'facebook', '/facebook', 'facebook-icon.png', '2017-11-08 12:14:04', '2017-11-08 12:17:51', NULL),
(2, 'linkedIn', '/linkedin', 'linkedin-icon.png', '2017-11-08 12:14:48', '2017-11-08 12:18:21', NULL),
(3, 'instgram', '/instgram', 'instagram-icon.png', '2017-11-08 12:19:42', '2017-11-08 12:19:42', NULL),
(4, 'ko', '/facebook', 'images-0.jpg', '2017-11-08 13:26:42', '2017-11-09 05:37:59', '2017-11-09 05:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` tinyint(4) NOT NULL,
  `approved` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `name_en`, `name_ar`, `published`, `approved`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Graha', 'جراحة', 1, 1, '2017-11-07 09:48:16', '2017-11-07 09:48:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super User', 'super@user.com', '$2y$10$dsrFPDiGFmQL1T9zaTrdzeLG3IK5RNDyab7AENpUcRjpOYOwBMmCG', 2, 'S4vf4IV4u9yTSyv7mLcgXJFqwLGknU8N5MyovmKcLRtyldm6KhdPNOiSUvfQ', '2017-11-06 05:56:43', '2017-11-06 05:56:43'),
(2, 'Doctors Admin', 'doctor_admin@user.com', '$2y$10$bqqX4CD8O7xLysxAbkZyJOk8z3f4RGVIePEjwFP8cbwbqbQPt4JZ2', 5, 'rxByjYgZy6bElYKzhL8GodJYgIXv1TKRa1ml6bBhHLdbh4w4u1A4qidAmP68', '2017-11-06 09:06:23', '2017-11-06 09:06:23'),
(3, 'Admin', 'admin@user.com', '$2y$10$dcOzeWeFDQEf45rQlbsa8.2m34.YxBRe8I.CTHtn7Fs1WNTvZqciK', 6, 'L9ZdxaQ9VIrGLIBTFxemu8ifxOxHfC9VJJt257hJyUdZFKLNsmeuH2GigHjK', '2017-11-06 09:07:35', '2017-11-06 09:07:35'),
(4, 'Company1 Admin', 'admin@admin.com', '$2y$10$YUgfstpJaZlgn/mr.fg.leLbPY.VSVm/pu//wEconhwQJBjwFfb4W', 7, 'YRFV2QfmJdPcz41AAETgvKUYXX2rXBXtSpG2QzbG11qGaL55BHNHXGCBYlJa', '2017-10-26 13:00:43', '2017-11-13 04:59:51'),
(5, 'HR Admin', 'hr@admin.com', '$2y$10$TxxA0oBKvzCBagPnu.C9GeEB398OIqBLAH4T4yIPgbekq64nC2Z5m', 8, NULL, '2017-11-12 13:58:27', '2017-11-12 13:58:27'),
(6, 'Company2 Manger', 'company2@user.com', '$2y$10$I4Z53JT03FjTQlLG2uHwjOLHgppDLzIspgK8uZXQs1M07SjqKlY8K', 7, 'walMfm1FzgaHu2dQA0x1ns7LVV4rG7WInD7ONmwPCgcMRgLtrFpTHVC5y9nf', '2017-11-13 05:00:24', '2017-11-13 05:00:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `doctor_password_resets`
--
ALTER TABLE `doctor_password_resets`
  ADD KEY `doctor_password_resets_email_index` (`email`),
  ADD KEY `doctor_password_resets_token_index` (`token`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `patient_password_resets`
--
ALTER TABLE `patient_password_resets`
  ADD KEY `patient_password_resets_email_index` (`email`),
  ADD KEY `patient_password_resets_token_index` (`token`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
