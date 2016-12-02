-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2016 at 06:00 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dubarahweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `account_id` int(11) NOT NULL,
  `account_client_id` int(11) NOT NULL,
  `account_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`account_id`, `account_client_id`, `account_balance`) VALUES
(1, 9, 20000),
(2, 10, 20000),
(3, 11, 20000),
(4, 12, 20000),
(5, 13, 20000),
(6, 14, 20000),
(7, 15, 20000),
(8, 16, 20000),
(9, 17, 20000),
(10, 18, 20000),
(11, 19, 20000),
(12, 20, 20000),
(13, 21, 20000),
(14, 22, 20000),
(15, 23, 20000),
(16, 24, 20000),
(17, 25, 20000),
(18, 26, 20000),
(19, 27, 20000),
(20, 28, 20000),
(21, 29, 20000),
(22, 30, 20000),
(23, 31, 20000),
(24, 32, 20000),
(25, 33, 20000),
(26, 34, 20000),
(27, 35, 20000),
(28, 36, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'd7zDRRjBYSwgOyH1ivA4Z2RRY9VdeYS2', '$2y$13$dvufe8cuRaUQDPXAKUHHve.xkWGH35IRHtBxZty.SPfeb0wZCXMAq', NULL, 'admin@admin.admin', 10, 1476382013, 1476382013);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `advertisement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_related` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`advertisement_id`, `user_id`, `category_id`, `category_related`, `status`, `title`, `description`, `country`, `city`, `phone`, `email`, `created_at`) VALUES
(2, 1, 9, 'nothing', 0, 'title 2 updating test', 'description2 updating test', '1', 'damascus', '09876543', 'haya@gmail.com', '2016-10-18 15:45:10'),
(10, 1, 8, 'nothing', 0, 'Samsung Galaxy S6 Edge', 'mobile phone ', '2', 'beirut', '09876543', '', '2016-10-18 18:23:14'),
(11, 1, 8, 'nothing', 0, 'laptop  for sale ', 'laptop type : asus \r\nprice 600$', 'lebanon', 'bierut', '0987654', NULL, '2016-10-18 19:08:51'),
(12, 1, 16, '[{"3":"job description"},{"1":"4"},{"2":"8"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":""}]', 1, 'working ', 'working description', '2', 'beirut', '0987654', '', '2016-10-19 12:33:50'),
(13, 1, 16, '[{"3":"image test "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"7"}]', 1, 'images test', 'description image test', '1', 'damascus', '0987654', '', '2016-10-19 13:17:12'),
(14, 1, 16, '[{"3":"image test "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"7"}]', 1, 'images test', 'description image test', '1', 'damascus', '09876543', 'haya@gmail.com', '2016-10-19 13:17:35'),
(15, 1, 16, '[{"3":"image test "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"7"}]', 1, 'images test', 'description image test', '1', '1', '098765432', '', '2016-10-19 13:23:03'),
(16, 1, 16, '[{"3":"not job "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"5"}]', 1, 'sony experia dual sim', 'new mobile phone ', '1', 'aleppo', '09876543', '', '2016-10-21 09:42:10'),
(17, 1, 16, '[{"3":"not job "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"5"}]', 1, 'sony experia dual sim', 'new mobile phone ', '1', 'aleppo', '09876543', '', '2016-10-21 09:43:13'),
(19, 1, 16, 'nothing', 0, 'iphone s6 plus', 'mobile phone', '1', 'aleppo', '09876543', '', '2016-10-21 10:44:30'),
(20, 1, 16, '[{"3":"noo job"},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"6"}]', 1, 'iphone s6 plus', 'mobile phone', '1', 'aleppo', '098765432', '', '2016-10-21 10:44:50'),
(22, 1, 13, '[]', 0, 'Samsung Galaxy S4 ', 'mobile phone', '1', 'aleppo', '0987654', '', '2016-10-21 10:51:51'),
(23, 1, 13, '[]', 0, 'Samsung Galaxy S4 ', 'mobile phone', '1', 'aleppo', '09876543', '', '2016-10-21 10:53:55'),
(24, 1, 13, '[]', 0, 'Samsung Galaxy note 3 ', 'mobile phone', '1', 'damascus', '09876543', '', '2016-10-21 10:58:24'),
(25, 1, 13, '[]', 0, 'iphone 5s ', 'mobile phone', '2', 'beirut', '098765432', '', '2016-10-21 12:33:12'),
(28, 1, 13, '[]', 0, 'Samsung Galaxy note 7', 'mobile phone', '1', 'damascus', '09876543', '', '2016-10-21 12:40:51'),
(31, 1, 15, '[]', 0, 'sony experia arc s', 'mobile phone', '1', 'damascus', '09876543', '', '2016-10-21 13:11:52'),
(33, 1, 15, '[]', 0, 'asus zenphone ', 'mobile phone ', '1', 'damascus', '0987654', '', '2016-10-21 13:58:33'),
(38, 1, 15, '[]', 0, 'massenger', 'mobile app', '2', 'beirut', '09876543', '', '2016-10-21 14:47:55'),
(39, 1, 15, '[]', 0, 'validate', 'test validate', '3', 'Abu Dhabi', '09876543', '', '2016-10-21 15:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_photos`
--

CREATE TABLE `advertisement_photos` (
  `advertisement_photos_id` int(11) NOT NULL,
  `photo_url` varchar(1000) NOT NULL,
  `advertisement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement_photos`
--

INSERT INTO `advertisement_photos` (`advertisement_photos_id`, `photo_url`, `advertisement_id`) VALUES
(1, '', 22),
(2, '', 23),
(3, '', 24);

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `apply_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL,
  `attach` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `askdubarji`
--

CREATE TABLE `askdubarji` (
  `ask_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `askdubarji`
--

INSERT INTO `askdubarji` (`ask_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'haya', 'haya@gmail', 'subject', 'message');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `arabic_name` varchar(255) NOT NULL,
  `english_name` varchar(255) NOT NULL,
  `parent_category_id` int(11) NOT NULL DEFAULT '0',
  `arabic_description` text NOT NULL,
  `english_description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `arabic_name`, `english_name`, `parent_category_id`, `arabic_description`, `english_description`, `icon`) VALUES
(2, 'الأعمال', 'Jobs', 0, 'عرض الأعلانات المتخصصة في مجال الأعمال', 'display the advertisement which specialist in the field of business', 'images/uploads/Jobs.png'),
(3, 'اسكان ', 'Housing', 0, 'عرض الاعلانات المتخصصة في مجال الاسكان ', 'display the advertisement which specialist in the field of Housing', 'images/uploads/Housing.png'),
(4, 'الاستثمار', 'Investment', 0, 'عرض الاعلانات المتخصصة غي مجال الاسثمار ', 'display the advertisement which specialist in the field of investment', 'images/uploads/investment.png'),
(5, 'التربية', 'Education', 0, 'عرض الاعلانات المتخصصة في المجال التربوي ', 'display the advertisement which specialist in the field of education', 'images/uploads/Education.png'),
(6, 'مبادرة', 'Initiative', 0, 'عرض الاعلانات المتخصصة في مجال المبادرة', 'display the advertisement which specialist in the field of initiative', 'images/uploads/Initiative.png'),
(7, 'دليل المغتربين', 'Expatriate guied', 0, 'عرض الاعلانات المتخصصة في مجال دليل المغتربين ', 'display the advertisement which specialist in the field of expatriate guied', 'images/uploads/Expatriate guied.png'),
(8, 'محاسبة', 'Accounting', 2, 'عرض الاعانات المتخصصة في مجال المحاسبة ', 'display the advertisement which specialist n the field of accounting', NULL),
(9, 'الخدمات المصرفية والمالية', 'Banking & Finance', 2, 'عرض الاعلانات المتخصصة في مجال الخدمات المصرفية و المالية', 'Display the advertisement which display in the field of Banking & Finance', NULL),
(10, 'تطوير الأعمال', 'Business Development', 2, 'عرض الاعلانات المتخصصة في مجال تطوير الاعمال', 'display the advertisement which specialist in the field of Business Development', NULL),
(11, 'الانشاءات', ' Construction', 2, 'عرض الاعلانات المتخصصة في مجال الانشاءات', 'display the advertisement which specialist in the field of construction ', NULL),
(12, 'الموارد البشرية و التوظيف', 'HR & Recruitment', 2, 'عرض الاعلانات المتخصصة في مجال الموارد البشرية و التوظيف', 'display the advertisement which specialist in the field of HR & Recruitment', NULL),
(13, 'تكنولوجيا المعلومات', 'Information Technology', 2, 'عرض الاعلانات المتخصصة في مجال تكنولوجيا المعلومات', 'display the advertisement which specialist in the field of Information Technology', NULL),
(14, 'التسويق و الاعلان', 'Marketing & Advertising', 2, 'عرض الاعلانات المتخصصة في مجال التسويق و الاعلان', 'display the advertisement which specialist in the field of Marketing & Advertising', NULL),
(15, 'علاقات عامة', ' Public Relations', 2, 'عرض الاعلانات المتخصصة في مجال العلاقات العامة ', 'display the advertisement which specialist in the field of  Public Relations', NULL),
(16, 'الديكور و التصميم', 'designe & decor', 3, 'عرض العلانات المتخصصة في مجال التصميم و الديكور', 'display the advertisement which specialist in the field of ', NULL),
(17, 'التدريس', 'Teaching ', 5, 'عرض الاعلانات المتخصصة في مجال التدريس', 'display the advertisement which specialist in the field of teaching', NULL),
(18, 'الابحاث العلمية', 'Researches', 5, 'عرض الاعلانات المتخصصة في مجال الابحاث العلمية', 'display the advertisement which specialist in the field of researches', NULL),
(19, 'الاستشارات التربوية', 'Education Consulting', 5, 'عرض الاعلانات المتخصصة في مجال الاستشارات التربوية', 'display the advertisement which specialist in the field of education consulting', NULL),
(22, 'انشاءات', 'Construction', 3, 'عرض الاعلانات المتخصصة في مجال الانشاءات', 'display the advertisement which specialist in the field of construction', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories_fields`
--

CREATE TABLE `categories_fields` (
  `categories_fields_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_fields`
--

INSERT INTO `categories_fields` (`categories_fields_id`, `category_id`, `field_id`) VALUES
(1, 3, 3),
(3, 3, 1),
(4, 3, 2),
(5, 3, 4),
(7, 3, 5),
(8, 3, 6),
(12, 2, 4),
(14, 2, 5),
(15, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_english_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `city_arabic_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `country_id`, `city_english_name`, `city_arabic_name`) VALUES
(1, 1, 'damascus', 'دمشق'),
(2, 1, 'aleppo', 'حلب'),
(3, 1, 'homs', 'حمص'),
(4, 2, 'beirut', 'بيروت'),
(6, 2, 'zahle', 'زحلة'),
(7, 3, 'Abu Dhabi', 'ابو ظبي'),
(8, 3, 'Dubai', 'دبي');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `client_id` int(11) NOT NULL,
  `client_ip` varchar(16) NOT NULL,
  `client_port` int(11) NOT NULL,
  `client_domain` varchar(255) NOT NULL,
  `client_public_key` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`client_id`, `client_ip`, `client_port`, `client_domain`, `client_public_key`) VALUES
(1, '127.0.0.1', 12345, 'Domain', 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwjJDBfcp38Pc2aJOta7H6i8UQ98bCng8\r\nlDFA18CQ+yyERf62N+wi59+0Ct4aflyFkF6kV5iwidCY4Arl0d24pv4mVoHW+YuZvdcVZ2x1u7zg\r\n2lKSsKR2YRd05cp3StqJsarNvvPj2seKOi71NySZ6+TNPYHzZ0L72QsKrnqddOFq2WQXA6+69Yfl\r\nRMHEJJFnumY7fBskWpOrXiU7aWME7QXmLoCEBBLSANEOKPk9KTTTxGqFtwQygHFuZT/XQzJeSXP8\r\nvaq7Hqhwg3z8jp2H/lFOIgM46MNMUZrG92+W18aL/lgvpAhhpGYxDcZ6LY0kklMaTZ95tdElpa0K\r\n2gvgDwIDAQAB\r\n'),
(2, '/127.0.0.1', 64057, 'Domain', ''),
(3, '/127.0.0.1', 64735, 'Domain', ''),
(4, '/127.0.0.1', 64741, 'Domain', ''),
(5, '/127.0.0.1', 64744, 'Domain', ''),
(6, '/127.0.0.1', 64747, 'Domain', ''),
(7, '/127.0.0.1', 64750, 'Domain', ''),
(8, '/127.0.0.1', 64771, 'Domain', ''),
(9, '/127.0.0.1', 64783, 'Domain', ''),
(10, '/127.0.0.1', 64953, 'fff', ''),
(11, '/127.0.0.1', 64963, 'Domain', ''),
(12, '/127.0.0.1', 64979, 'Domain', ''),
(13, '/127.0.0.1', 64982, 'Domain', ''),
(14, '/127.0.0.1', 64987, 'Domain', ''),
(15, '/127.0.0.1', 65158, 'Domain', ''),
(16, '/127.0.0.1', 65233, 'Domain', ''),
(17, '/127.0.0.1', 49261, 'Domain', ''),
(18, '/127.0.0.1', 49480, 'Domain', ''),
(19, '/127.0.0.1', 49486, 'Domain', ''),
(20, '/127.0.0.1', 49492, 'Domain', ''),
(21, '/127.0.0.1', 49545, 'Domain', ''),
(22, '/127.0.0.1', 49558, 'Domain', ''),
(23, '/127.0.0.1', 49617, 'Domain', ''),
(24, '/127.0.0.1', 49626, 'Domain', ''),
(25, '/127.0.0.1', 49631, 'Domain', ''),
(26, '/127.0.0.1', 49780, 'Domain', ''),
(27, '/127.0.0.1', 49786, 'Domain', ''),
(28, '/127.0.0.1', 49965, 'Domain', ''),
(29, '/127.0.0.1', 50259, 'Domain', ''),
(30, '/127.0.0.1', 51156, 'Domain', ''),
(31, '/127.0.0.1', 51508, 'Domain', ''),
(32, '/127.0.0.1', 51515, 'Domain', ''),
(33, '/127.0.0.1', 51527, 'Domain', ''),
(34, '/127.0.0.1', 51538, 'Domain', ''),
(35, '/127.0.0.1', 51546, 'Domain', ''),
(36, '/127.0.0.1', 51771, 'Domain', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_category`
--

CREATE TABLE `cms_category` (
  `cms_category_id` int(11) NOT NULL,
  `cms_category_name_en` varchar(100) NOT NULL,
  `cms_category_name_ar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_category`
--

INSERT INTO `cms_category` (`cms_category_id`, `cms_category_name_en`, `cms_category_name_ar`) VALUES
(1, 'stories', 'قصص'),
(2, 'news', ''),
(3, 'events', ''),
(4, 'contact', ''),
(5, 'products', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_category_field`
--

CREATE TABLE `cms_category_field` (
  `cms_category_field_id` int(11) NOT NULL,
  `cms_category_id` int(11) DEFAULT NULL,
  `cms_field_name` varchar(100) DEFAULT NULL,
  `cms_field_type` enum('img','text','area','html') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_category_field`
--

INSERT INTO `cms_category_field` (`cms_category_field_id`, `cms_category_id`, `cms_field_name`, `cms_field_type`) VALUES
(1, 1, 'title', 'text'),
(2, 1, 'desc', 'html'),
(3, 1, 'image', 'img'),
(4, 2, 'title', 'text'),
(6, 3, 'type', 'text'),
(7, 3, 'title', 'text'),
(8, 3, 'day', 'text'),
(9, 3, 'month', 'text'),
(10, 3, 'desc', 'text'),
(12, 2, 'image', 'img'),
(13, 2, 'description', 'html'),
(14, 2, 'category', 'text'),
(15, 5, 'title', 'text'),
(16, 5, 'description', 'html'),
(17, 5, 'image', 'img'),
(18, 5, 'link', 'text'),
(19, 5, 'release', 'text'),
(20, 5, 'logo', 'img'),
(21, 5, 'google_play', 'text'),
(22, 5, 'apple_store', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `cms_item`
--

CREATE TABLE `cms_item` (
  `cms_item_id` int(11) NOT NULL,
  `cms_category_id` int(11) NOT NULL,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_item`
--

INSERT INTO `cms_item` (`cms_item_id`, `cms_category_id`, `date_time`) VALUES
(20, 1, '2016-11-21 22:00:00'),
(21, 1, '2016-11-15 22:00:00'),
(26, 3, '0000-00-00 00:00:00'),
(27, 3, '0000-00-00 00:00:00'),
(31, 3, '2016-11-29 16:52:09'),
(32, 2, '2016-11-29 16:54:06'),
(33, 2, '2016-11-29 16:54:37'),
(34, 2, '2016-11-29 16:54:52'),
(35, 2, '2016-11-29 18:33:53'),
(36, 5, '2016-12-01 20:12:43');

-- --------------------------------------------------------

--
-- Table structure for table `cms_values`
--

CREATE TABLE `cms_values` (
  `cms_values_id` int(11) NOT NULL,
  `cms_item_id` int(11) NOT NULL,
  `cms_category_field_id` int(11) NOT NULL,
  `cms_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_values`
--

INSERT INTO `cms_values` (`cms_values_id`, `cms_item_id`, `cms_category_field_id`, `cms_value`) VALUES
(27, 20, 1, 'kmdslkfmdslkmflksmfd'),
(28, 20, 2, '<p>kmdaslkdmalksmdlkasmdlkasmdlk</p>\r\n'),
(29, 20, 3, 'https://scontent-frt3-1.xx.fbcdn.net/v/t1.0-9/15094452_1471988629495848_63437301685755117_n.png?oh=cd6e3f78e6e3b75e18b40c23f62208b8&oe=58C8B382'),
(30, 21, 1, 'snaxjkasnxajksnx'),
(31, 21, 2, '<p>sjnkxjncskjanckjsanckasjn</p>\r\n'),
(32, 21, 3, 'https://scontent-frt3-1.xx.fbcdn.net/v/t1.0-9/15094459_1470209489673762_9085856295984517926_n.png?oh=fbee38788feeb0aafed46d207116c2fc&oe=58BFA49B'),
(35, 26, 6, 'Fund raising'),
(36, 26, 7, 'Money raising for syrian refugees'),
(37, 26, 8, '21'),
(38, 26, 9, 'MAR'),
(39, 26, 10, 'Click on a database or table name in the navigation panel, the properties will be displayed. Then on the menu, click “Export”, you can dump the structure, the data'),
(40, 27, 6, 'Standoff for justice'),
(41, 27, 7, 'Test'),
(42, 27, 8, '22'),
(43, 27, 9, 'JAN'),
(44, 27, 10, 'Click on a database name in the navigation panel, the properties will be displayed. Select “Import” from the list of tabs'),
(54, 31, 6, 'Stupid type'),
(55, 31, 7, 'sajdasijdjjas'),
(56, 31, 8, '22'),
(57, 31, 9, 'MAY'),
(58, 31, 10, 'ksandkjasnkdjanskdjsnajkdnsakjdnkjandkjasnkdasjkndnaskjnd'),
(62, 35, 4, 'Asadnaksj dsakjndjkas asd sak dmna dn asmd '),
(63, 35, 12, 'https://scontent-mrs1-1.xx.fbcdn.net/v/t1.0-9/15241332_607957286055107_8672610907937790315_n.jpg?oh=0c30d1a6176c2dd3c261163c64063d16&oe=58B2CD65'),
(64, 35, 13, '<p>jandkjlasdkjanskdnkajlsn dkjlanlk nskajd nlsakjnd kljasndkljn lkasnlkjd sajkln kdjsanlkj naslk</p>\r\n'),
(65, 35, 14, 'Social'),
(66, 36, 15, 'nocker'),
(67, 36, 16, '<p>Book qualified, local talent recommended by your friends. On-demand.</p>\n'),
(68, 36, 17, 'http://nockerapp.com/assets/new/images/resource/mock1.png'),
(69, 36, 18, 'http://nockerapp.com/');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_english_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country_arabic_name` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_english_name`, `country_arabic_name`) VALUES
(1, 'syria', 'سوريا'),
(2, 'lebanon', 'لبنان'),
(3, 'united arab emairates', 'الامارات العربية المتحدة');

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `field_id` int(11) NOT NULL,
  `arabic_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `english_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `field_type` enum('text','checkbox','radio','file','list','between','number') NOT NULL,
  `is_required` tinyint(1) NOT NULL,
  `field_order` int(2) NOT NULL,
  `list_page` tinyint(1) NOT NULL,
  `filter_page` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`field_id`, `arabic_name`, `english_name`, `field_type`, `is_required`, `field_order`, `list_page`, `filter_page`) VALUES
(1, 'عدد سنوات الخبرة المطلوبة', 'number of minimum required years', 'list', 1, 2, 1, 1),
(2, 'الشهادة المطلوبة', 'Required Degree', 'list', 1, 3, 1, 1),
(3, 'المتطلب الوظيفي', 'Job Description', 'text', 1, 1, 0, 1),
(4, 'السيرة الذاتية', 'Cv required', 'radio', 1, 4, 1, 1),
(5, 'أللغات', 'Languages', 'checkbox', 0, 5, 1, 1),
(6, 'عدد ساعات العمل', 'working hours', 'number', 0, 6, 0, 0),
(7, 'asdsadasdasdsad', 'sadasdas', 'checkbox', 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `field_list_data`
--

CREATE TABLE `field_list_data` (
  `field_list_data_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `arabic_content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `english_content` varchar(255) NOT NULL,
  `field_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `field_list_data`
--

INSERT INTO `field_list_data` (`field_list_data_id`, `field_id`, `arabic_content`, `english_content`, `field_order`) VALUES
(3, 1, 'الخبرة ليست مطلوبة', 'No experience is needed', 1),
(4, 1, 'خبرة سنة او اقل', 'One year or less experience ', 2),
(5, 4, 'غير مطلوبة ', 'Not required', 1),
(6, 4, 'مطلوبة', 'Required', 2),
(7, 2, 'بكالوريا', 'Bachelors', 1),
(8, 2, 'ماستر', 'Master', 2),
(10, 5, 'الانكليزية', 'English', 2),
(11, 5, 'الفرنسية', 'French', 3),
(12, 5, 'التركية', 'Tukish', 4),
(16, 7, 'asdsad', 'sadasd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1476477869),
('m130524_201442_init', 1476477873);

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `social_media_id` int(11) NOT NULL,
  `social_media_name` int(11) NOT NULL,
  `social_media_link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `suggestion_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8 NOT NULL,
  `message` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Transaction`
--

CREATE TABLE `Transaction` (
  `trans_id` int(11) NOT NULL,
  `account_from` int(11) NOT NULL,
  `account_to` int(11) NOT NULL,
  `trans_ammount` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) CHARACTER SET utf8 NOT NULL,
  `place` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `mobile`, `place`, `status`, `created_at`, `updated_at`) VALUES
(1, 'haya_hamoud', 'xmLWN8_Drs2N-S3ajw8TNkVi67WHbO8G', '$2y$13$uzI3RdCSXDKQgc/t63UF3emoPOfCesSmRx5ql2Ik9QGzKQ0aWnGXS', 'rmhozzNkVanzrykpyLYDepf3dzC7aGlh_1476781043', 'haya@gmail.com', '0947079054', 'London UK', 10, 1476481337, 1477935468),
(2, 'sdjflk sdj', '7ox9FXk6gkJ1uG_MPWH6wtOiUakwJs58', '$2y$13$jih8okm54OTqeKjA9ATFCubK/W00F3Oodu3EyvtoNCReVnMXhepIG', NULL, 'dsf@asd.com', '123213', 'Newyork, USA', 10, 1476484308, 1476484308),
(3, 'omar', 'hI4q7rZwTE2_GlKL50MI6GPyveJYCCnX', '$2y$13$vSzz7skhyVNWlqEq1nZ7i.lwql4kWzeVwbrnifmJAhsy7TQrI63..', NULL, 'omar@gmail.com', '09998877', 'London UK', 10, 1476485828, 1476485828),
(4, 'Sami', 'KGp0kr0i9h14RXuf8maS3mwM8vWI23IZ', '$2y$13$.UrMrqjkHexz1pma.ZNpOuc.UGvsvf/g.JY69nXZtEo/ct1/jfBJa', NULL, 'aaa@vvv.sss', '09929213213', 'London UK', 10, 1476601736, 1476601736),
(5, 'hayosh', 'Wfn1251MIYROI7dt6MvqpsT2tvKvRjj2', '$2y$13$BHKAgZlH6MC.QuvhAyHj0OLk5sUaMH5YSM1iqOB2o3Y8lzqYCN8bO', NULL, 'hayahamoud1994@gmail.com', '0987654', 'Damascus, Syria', 10, 1477769788, 1477938174),
(6, 'maya', 'BqHu5ihzJrsv8_xLXILtxNHSO39N86XI', '$2y$13$vKlfA.NWx7YmjPbeZx16SOS.67qIs5siGEOr65dv/0qj6.MYJRPUi', NULL, 'maya@gmail.com', '07654', 'Damascus, Syria', 10, 1477771813, 1477771813),
(7, 'Haya Hammoud', 'lDc2vMZJvPzpotbFXqMV4JSBO9G4n-mR', '$2y$13$ffu.0McLBcL0dPhRrUT/Ye0.jwALoIYyIFdSJ1ZAkvWpHlc3Tnb/O', NULL, 'mama@gmail.com', '0991213123', 'London UK', 10, 1479326424, 1479326424),
(8, 'Omar Sabbagh', 'HdA0S-P-KjU2ri8SqjlOM6qCvONprA7U', '$2y$13$YzardXZah8igCIW/DFsNWehtuDQNrBL/PbKH.MfrdEK9xhl6FIKh.', NULL, 'alafandiomar79@gmail.com', '09292922', 'London UK', 10, 1479773011, 1479773011),
(9, 'akslmd nsadsd', 'rKn0m5augHCasrnkvi_dntM3JfA1r4qD', '$2y$13$bG3xZoBHhowHnlbvx/URe.J1eCcnS8d8T3lUJA2TL2mtyA1lV45zm', NULL, 'test11@gmail.com', '12312312313', 'Damascus, Syria', 10, 1479838476, 1479838476);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `advertisement_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `account_client_id_2` (`account_client_id`),
  ADD KEY `account_client_id` (`account_client_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`advertisement_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `advertisement_photos`
--
ALTER TABLE `advertisement_photos`
  ADD PRIMARY KEY (`advertisement_photos_id`),
  ADD KEY `photo_url` (`photo_url`(767)),
  ADD KEY `advertisement_id` (`advertisement_id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`apply_id`),
  ADD KEY `advertisement_id` (`advertisement_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `askdubarji`
--
ALTER TABLE `askdubarji`
  ADD PRIMARY KEY (`ask_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `categories_fields`
--
ALTER TABLE `categories_fields`
  ADD PRIMARY KEY (`categories_fields_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `cms_category`
--
ALTER TABLE `cms_category`
  ADD PRIMARY KEY (`cms_category_id`);

--
-- Indexes for table `cms_category_field`
--
ALTER TABLE `cms_category_field`
  ADD PRIMARY KEY (`cms_category_field_id`),
  ADD KEY `cms_category_id` (`cms_category_id`);

--
-- Indexes for table `cms_item`
--
ALTER TABLE `cms_item`
  ADD PRIMARY KEY (`cms_item_id`),
  ADD KEY `cms_category_id` (`cms_category_id`);

--
-- Indexes for table `cms_values`
--
ALTER TABLE `cms_values`
  ADD PRIMARY KEY (`cms_values_id`),
  ADD KEY `cms_category_field_id` (`cms_category_field_id`),
  ADD KEY `cms_item_id` (`cms_item_id`),
  ADD KEY `cms_category_field_id_2` (`cms_category_field_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `field_list_data`
--
ALTER TABLE `field_list_data`
  ADD PRIMARY KEY (`field_list_data_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`suggestion_id`);

--
-- Indexes for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `account_from` (`account_from`),
  ADD KEY `account_to` (`account_to`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `advertisement_id` (`advertisement_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `advertisement_photos`
--
ALTER TABLE `advertisement_photos`
  MODIFY `advertisement_photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `askdubarji`
--
ALTER TABLE `askdubarji`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `categories_fields`
--
ALTER TABLE `categories_fields`
  MODIFY `categories_fields_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cms_category`
--
ALTER TABLE `cms_category`
  MODIFY `cms_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cms_category_field`
--
ALTER TABLE `cms_category_field`
  MODIFY `cms_category_field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `cms_item`
--
ALTER TABLE `cms_item`
  MODIFY `cms_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cms_values`
--
ALTER TABLE `cms_values`
  MODIFY `cms_values_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `field_list_data`
--
ALTER TABLE `field_list_data`
  MODIFY `field_list_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `suggestion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Transaction`
--
ALTER TABLE `Transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`account_client_id`) REFERENCES `Client` (`client_id`);

--
-- Constraints for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD CONSTRAINT `advertisement_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `advertisement_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `advertisement_photos`
--
ALTER TABLE `advertisement_photos`
  ADD CONSTRAINT `advertisement_photos_ibfk_1` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `categories_fields`
--
ALTER TABLE `categories_fields`
  ADD CONSTRAINT `categories_fields_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `categories_fields_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `cms_category_field`
--
ALTER TABLE `cms_category_field`
  ADD CONSTRAINT `cms_category_field_ibfk_1` FOREIGN KEY (`cms_category_id`) REFERENCES `cms_category` (`cms_category_id`);

--
-- Constraints for table `cms_item`
--
ALTER TABLE `cms_item`
  ADD CONSTRAINT `cms_item_ibfk_1` FOREIGN KEY (`cms_category_id`) REFERENCES `cms_category` (`cms_category_id`);

--
-- Constraints for table `cms_values`
--
ALTER TABLE `cms_values`
  ADD CONSTRAINT `cms_values_ibfk_1` FOREIGN KEY (`cms_item_id`) REFERENCES `cms_item` (`cms_item_id`);

--
-- Constraints for table `field_list_data`
--
ALTER TABLE `field_list_data`
  ADD CONSTRAINT `field_list_data_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`);

--
-- Constraints for table `Transaction`
--
ALTER TABLE `Transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`account_from`) REFERENCES `Account` (`account_id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`account_to`) REFERENCES `Account` (`account_id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);
