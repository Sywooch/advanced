-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2016 at 03:21 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dubarahweb`
--

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
(12, 1, 16, '[{"3":"job description"},{"1":"4"},{"2":"8"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":""}]', 0, 'working ', 'working description', '2', 'beirut', '0987654', '', '2016-10-19 12:33:50'),
(13, 1, 16, '[{"3":"image test "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"7"}]', 0, 'images test', 'description image test', '1', 'damascus', '0987654', '', '2016-10-19 13:17:12'),
(14, 1, 16, '[{"3":"image test "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"7"}]', 0, 'images test', 'description image test', '1', 'damascus', '09876543', 'haya@gmail.com', '2016-10-19 13:17:35'),
(15, 1, 16, '[{"3":"image test "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"7"}]', 0, 'images test', 'description image test', '1', '1', '098765432', '', '2016-10-19 13:23:03'),
(16, 1, 16, '[{"3":"not job "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"5"}]', 0, 'sony experia dual sim', 'new mobile phone ', '1', 'aleppo', '09876543', '', '2016-10-21 09:42:10'),
(17, 1, 16, '[{"3":"not job "},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"5"}]', 0, 'sony experia dual sim', 'new mobile phone ', '1', 'aleppo', '09876543', '', '2016-10-21 09:43:13'),
(19, 1, 16, 'nothing', 0, 'iphone s6 plus', 'mobile phone', '1', 'aleppo', '09876543', '', '2016-10-21 10:44:30'),
(20, 1, 16, '[{"3":"noo job"},{"1":"3"},{"2":"7"},{"4":"5"},{"5":"9"},{"5":"10"},{"6":"6"}]', 0, 'iphone s6 plus', 'mobile phone', '1', 'aleppo', '098765432', '', '2016-10-21 10:44:50'),
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
(20, 'الفنون', 'Arts', 0, 'عرض الاعلانات المتخصصة في مجال الفنون', 'display the advertisement which specialist in the field of HR & Recruitment', 'categoriesImageUpload/Arts.png'),
(22, 'انشاءات', 'Construction', 3, 'عرض الاعلانات المتخصصة في مجال الانشاءات', 'display the advertisement which specialist in the field of construction', NULL),
(23, 'wedwed', 'dwdwewd', 0, 'wedwedew', 'ewdewdewdw', 'categoriesImageUpload/dwdwewd.jpg'),
(24, 'asdasdsadasd', 'asdasd', 3, 'asdasd', 'asdasdad', 'categoriesImageUpload/asdasd.mp4'),
(25, 'sadsadasdasd', 'asd', 0, 'asdas', 'sadasd', NULL),
(26, 'asdsadas', 'asdasdasd', 0, 'asdsad', 'sadsadsad', 'categoriesImageUpload/asdasdasd.sql'),
(27, 'asdasd', 'asdasdasdas', 0, 'asdasdasd', 'asdasdasdasd', 'images/uploads/asdasdasdas.jpg'),
(28, 'asdasd', 'sadasd', 0, 'asdsadas', 'asdsadasd', NULL),
(29, 'asdasdsad', 'asdasd', 0, 'asdasda', 'asdasd', 'images/uploads/asdasd.jpg');

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
(8, 3, 6);

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
(6, 'عدد ساعات العمل', 'working hours', 'number', 0, 6, 0, 0);

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
(9, 5, 'العربية', 'Arabic', 1),
(10, 5, 'الانكليزية', 'English', 2),
(11, 5, 'الفرنسية', 'French', 3),
(12, 5, 'التركية', 'Tukish', 4);

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
(7, 'Haya Hammoud', 'lDc2vMZJvPzpotbFXqMV4JSBO9G4n-mR', '$2y$13$ffu.0McLBcL0dPhRrUT/Ye0.jwALoIYyIFdSJ1ZAkvWpHlc3Tnb/O', NULL, 'mama@gmail.com', '0991213123', 'London UK', 10, 1479326424, 1479326424);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `advertisement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `advertisement_photos`
--
ALTER TABLE `advertisement_photos`
  MODIFY `advertisement_photos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `apply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `askdubarji`
--
ALTER TABLE `askdubarji`
  MODIFY `ask_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `categories_fields`
--
ALTER TABLE `categories_fields`
  MODIFY `categories_fields_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `field_list_data`
--
ALTER TABLE `field_list_data`
  MODIFY `field_list_data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `suggestion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

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
-- Constraints for table `field_list_data`
--
ALTER TABLE `field_list_data`
  ADD CONSTRAINT `field_list_data_ibfk_1` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`advertisement_id`) REFERENCES `advertisement` (`advertisement_id`);
