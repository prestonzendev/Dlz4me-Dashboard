-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2019 lúc 12:00 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fako`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `app_customers`
--

CREATE TABLE `app_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `account_holder` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `account_holder`, `bank_name`, `account_number`, `ifsc`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 28, 'Sar', 'Gsgs', '46464', 'SGSG', 1, '2019-07-15 09:44:37', '2019-07-15 09:44:37', NULL),
(6, 28, 'test customer', 'test bank', '123456789', '12345', 1, '2019-07-23 07:15:39', '2019-07-23 07:15:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bannerfile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `bannerfile`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Banner 1', '1551182922slider-img.jpg', '<h2>Whether<br />you are looking for a one off relationship, a friend or a life long<br />partner, you can be sure to find them on Eagermeets!</h2>', 1, '2019-02-11 01:34:42', '2019-02-28 05:52:20', NULL),
(2, 'Banner 2', '1551182977slider-img.jpg', '<h2>Whether<br />you are looking for a one off relationship, a friend or a life long<br />partner, you can be sure to find them on Eagermeets!</h2>', 1, '2019-02-11 01:35:44', '2019-02-28 05:52:32', NULL),
(5, 'Banner 3', '1551182989slider-img.jpg', '<h2>Whether<br />you are looking for a one off relationship, a friend or a life long<br />partner, you can be sure to find them on Eagermeets!</h2>', 1, '2019-02-18 06:00:38', '2019-02-28 05:52:45', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_datetime` datetime NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Published','Draft','InActive','Scheduled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `publish_datetime`, `featured_image`, `content`, `meta_title`, `cannonical_link`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Services', '2019-01-01 15:41:00', '1548671281Capture-min (1).PNG', '<p>sfsdfgsdag</p>', NULL, NULL, 'services', NULL, NULL, 'InActive', 1, NULL, '2019-01-28 04:58:01', '2019-01-28 04:58:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Category A', 1, 1, NULL, '2019-01-28 04:35:21', '2019-01-28 04:35:21', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_map_categories`
--

CREATE TABLE `blog_map_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_map_categories`
--

INSERT INTO `blog_map_categories` (`id`, `blog_id`, `category_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_map_tags`
--

CREATE TABLE `blog_map_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_map_tags`
--

INSERT INTO `blog_map_tags` (`id`, `blog_id`, `tag_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'asd', 1, 1, NULL, '2019-01-28 04:41:32', '2019-01-28 04:41:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chats`
--

INSERT INTO `chats` (`id`, `sender_id`, `receiver_id`, `message`, `seen`, `status`, `created`, `modified`) VALUES
(1, 23, 55, 'hi rachita !!! :grinning::grinning:', 1, 1, '2019-03-22 03:18:40', '2019-03-22 03:18:40'),
(2, 23, 55, 'how are you dear ?', 1, 1, '2019-03-22 03:18:53', '2019-03-22 03:18:53'),
(3, 55, 23, 'Oh ! Hi :grin::grin::blush:\n', 1, 1, '2019-03-22 03:19:47', '2019-03-22 03:19:47'),
(4, 23, 55, 'Nice to see you again...', 1, 1, '2019-03-22 03:20:05', '2019-03-22 03:20:05'),
(5, 55, 23, 'Thanks', 1, 1, '2019-03-22 03:20:12', '2019-03-22 03:20:12'),
(6, 23, 55, 'Check Msg  :star_struck::star_struck:\n', 1, 1, '2019-03-29 05:27:05', '2019-03-29 05:27:05'),
(7, 55, 23, 'Great :sunglasses:\n', 1, 1, '2019-03-29 05:28:40', '2019-03-29 05:28:40'),
(8, 23, 49, 'hi jack :grinning:\n', 1, 1, '2019-05-14 00:20:58', '2019-05-14 00:20:58'),
(9, 23, 49, 'hi', 1, 1, '2019-05-14 00:21:36', '2019-05-14 00:21:36'),
(10, 49, 23, 'hello ', 1, 1, '2019-05-14 00:21:45', '2019-05-14 00:21:45'),
(11, 49, 23, 'hello ', 1, 1, '2019-05-14 00:21:50', '2019-05-14 00:21:50'),
(12, 49, 23, 'hello ', 1, 1, '2019-05-14 00:21:56', '2019-05-14 00:21:56'),
(13, 49, 23, 'hello ', 1, 1, '2019-05-14 00:21:57', '2019-05-14 00:21:57'),
(14, 49, 23, 'hello ', 1, 1, '2019-05-14 00:21:57', '2019-05-14 00:21:57'),
(15, 49, 23, 'hello ', 1, 1, '2019-05-14 00:21:57', '2019-05-14 00:21:57'),
(16, 49, 23, 'hello ', 1, 1, '2019-05-14 00:22:03', '2019-05-14 00:22:03'),
(17, 23, 49, 'hi', 1, 1, '2019-05-14 04:30:11', '2019-05-14 04:30:11'),
(18, 23, 49, '', 1, 1, '2019-05-14 04:30:20', '2019-05-14 04:30:20'),
(19, 23, 49, 'sdrg', 1, 1, '2019-05-14 04:30:24', '2019-05-14 04:30:24'),
(20, 23, 49, 'srg', 1, 1, '2019-05-14 04:33:39', '2019-05-14 04:33:39'),
(21, 23, 49, 'hi\n\n', 1, 1, '2019-05-14 05:06:31', '2019-05-14 05:06:31'),
(22, 23, 49, 'hi', 1, 1, '2019-05-14 05:07:44', '2019-05-14 05:07:44'),
(23, 23, 49, 'yeh\n\n', 1, 1, '2019-05-14 05:08:16', '2019-05-14 05:08:16'),
(24, 23, 49, 'hi', 1, 1, '2019-05-15 06:19:27', '2019-05-15 06:19:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish_datetime` datetime NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Published','Draft','InActive','Scheduled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_services`
--

CREATE TABLE `customer_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `customer_services`
--

INSERT INTO `customer_services` (`id`, `user_id`, `category_id`, `service_id`, `token`, `url`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 28, 5, 5, 'NFKRmnlnt8zgRqWd', 'http://abc.com/123?as=qwert&offer_code=NFKRmnlnt8zgRqWd&category_name=Electronics', 'success', '2019-07-04 04:32:28', '2019-07-04 04:47:07', NULL),
(2, 28, 4, 3, 't77ID3ZIjqciz6yZ', 'http://127.0.0.1:8000/vendor/offerform&offer_code=t77ID3ZIjqciz6yZ&category_name=Health and beauty', 'success', '2019-07-15 07:31:19', '2019-07-15 07:31:19', NULL),
(3, 28, 1, 1, 'COcB9S08V9vSXhSD', 'http://127.0.0.1:8000/vendor/show-offer&offer_code=COcB9S08V9vSXhSD&category_name=Electronics', 'success', '2019-07-15 08:30:45', '2019-07-15 08:30:45', NULL),
(4, 28, 1, 1, 'GTLe2GvLyQ3d62iF', 'http://127.0.0.1:8000/vendor/show-offer&offer_code=GTLe2GvLyQ3d62iF&category_name=Electronics', 'success', '2019-07-15 09:29:42', '2019-07-15 09:29:42', NULL),
(5, 28, 4, 3, 'xcec64Ou0KitlQX5', 'http://127.0.0.1:8000/vendor/offerform&offer_code=xcec64Ou0KitlQX5&category_name=Health and beauty', 'success', '2019-07-22 05:05:37', '2019-07-22 05:05:37', NULL),
(6, 28, 4, 6, '4IpcX4vjlnqf9kvG', 'http://test.com/&offer_code=4IpcX4vjlnqf9kvG&category_name=Health and beauty', 'success', '2019-07-23 06:15:59', '2019-07-23 06:15:59', NULL),
(7, 28, 4, 6, '4mgC3rdVzqTFPEcY', 'http://test.com/&offer_code=4mgC3rdVzqTFPEcY&category_name=Health and beauty', 'success', '2019-07-23 06:24:09', '2019-07-23 06:24:09', NULL),
(8, 28, 4, 6, 'xPVy2Nvq77NEWQXz', 'http://test.com/&offer_code=xPVy2Nvq77NEWQXz&category_name=Health and beauty', 'success', '2019-07-23 06:37:04', '2019-07-23 06:37:04', NULL),
(9, 28, 2, 7, 'hEBEq57ZEJJ4URo6', 'http://test.com/&offer_code=hEBEq57ZEJJ4URo6&category_name=Clothing', 'success', '2019-07-23 07:11:39', '2019-07-23 07:11:39', NULL),
(10, 63, 1, 1, '964Rhy39tvzhopBp', 'http://127.0.0.1:8000/vendor/show-offer&offer_code=964Rhy39tvzhopBp&category_name=Electronics', 'success', '2019-10-04 16:59:16', '2019-10-04 16:59:16', NULL),
(11, 80, 4, 6, 'mavUOinxvWMUeAiQ', 'http://test.com/&offer_code=mavUOinxvWMUeAiQ&category_name=Health and beauty', 'success', '2019-10-07 16:33:39', '2019-10-07 16:33:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `email_templates`
--

INSERT INTO `email_templates` (`id`, `type_id`, `title`, `subject`, `body`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 10, 'Successful Payment Notification', 'Cashback earned, on your successfull payment on FAKO', '<p>Dear [user_name],</p>\r\n<p>Thank you for completing your payment on FAKO. Please review the transaction details below:</p>\r\n<p>&nbsp;</p>\r\n<p>[message_body]</p>\r\n<p>&nbsp;</p>\r\n<p><strong>We hope you enjoy using FAKO</strong></p>\r\n<p>&nbsp;</p>\r\n<p><strong>Best Wishes</strong><br /><strong>[app_name]</strong></p>', 1, 1, 1, '2019-02-19 18:30:00', '2019-05-28 04:42:48', NULL),
(2, 9, 'Contact Request', 'You just received a contact request on FAKO', '<p>Dear [user_name],</p>\r\n<p>[message_body]</p>\r\n<p>Please review details about this request in your account.</p>\r\n<p>Thanks<br />[app_name]</p>', 1, 1, 1, '2019-02-19 13:00:00', '2019-05-28 04:38:56', NULL),
(3, 8, 'Thank You for Contacting FAKO', 'Thank You for Contacting FAKO', '<p>Dear [user_name],</p>\r\n<p>Thanks for contacting [app_name].<br />Your message has been submitted and we aim to respond to your message within 2 working days.</p>\r\n<p>Regards,<br />[app_name]</p>', 1, 1, 1, '2019-03-17 18:30:00', '2019-05-28 04:43:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email_template_placeholders`
--

CREATE TABLE `email_template_placeholders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `email_template_placeholders`
--

INSERT INTO `email_template_placeholders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'app_name', '2018-08-02 08:25:40', '2018-08-02 08:25:40'),
(2, 'user_name', '2018-08-02 08:25:40', '2018-08-02 08:25:40'),
(3, 'user_email', '2018-08-02 08:25:40', '2018-08-02 08:25:40'),
(4, 'message_body', '2018-08-02 08:25:40', '2018-08-02 08:25:40'),
(5, 'contact_email', '2018-08-02 08:25:40', '2018-08-02 08:25:40'),
(13, 'contact_address', '2019-02-19 18:30:00', '2019-02-19 18:30:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email_template_types`
--

CREATE TABLE `email_template_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `email_template_types`
--

INSERT INTO `email_template_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'Thanks For Contact Us', '2019-02-19 18:30:00', '2019-02-19 18:30:00'),
(9, 'Contact To Searched User', '2019-03-17 18:30:00', NULL),
(10, 'Subscription Plan Payment Successfull Notification', '2019-03-17 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `reply` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `enquiries`
--

INSERT INTO `enquiries` (`id`, `email`, `name`, `phone`, `body`, `status`, `reply`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fakolive@mailinator.com', 'test', '9865327845', 'demo message', 1, NULL, '2019-07-17 02:39:53', '2019-07-17 02:39:53', NULL),
(2, 'fakolive@mailinator.com', 'test', '9865327845', 'demo message', 1, NULL, '2019-07-17 02:42:53', '2019-07-17 02:42:53', NULL),
(3, 'fakotest@yopmail.com', 'Fufufuvbh usertup B', '7894561329', 'Uggh', 1, NULL, '2019-07-17 06:47:28', '2019-07-17 06:47:28', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faqcategories`
--

CREATE TABLE `faqcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faqcategories`
--

INSERT INTO `faqcategories` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'PAYMENT', 1, 0, NULL, '2019-03-05 23:24:41', '2019-03-05 23:24:41', NULL),
(2, 'REPORTING OTHER USERS', 1, 0, NULL, '2019-03-05 23:25:03', '2019-03-05 23:25:03', NULL),
(3, 'ABOUT US', 1, 0, NULL, '2019-03-05 23:25:26', '2019-03-05 23:25:26', NULL),
(4, 'EAGERMEETS CLUB', 1, 0, NULL, '2019-03-05 23:25:46', '2019-03-05 23:25:46', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(5) NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `faqs`
--

INSERT INTO `faqs` (`id`, `category_id`, `question`, `answer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Test Question 1', '<p>Test Ans</p>', 1, '2019-05-28 02:59:28', NULL, NULL),
(13, 3, 'Test Ques 2', '<p>This is test ques answer</p>', 1, '2019-07-17 01:33:36', '2019-07-17 01:33:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `entity_id` int(10) UNSIGNED DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assets` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `type_id`, `user_id`, `entity_id`, `icon`, `class`, `text`, `assets`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 23, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-01-31 09:46:21', '2019-01-31 09:46:21'),
(2, 1, 1, 23, 'times', 'bg-yellow', 'trans(\"history.backend.users.deactivated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-01-31 09:54:59', '2019-01-31 09:54:59'),
(3, 4, 1, 1, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>asdfasdf</strong>', NULL, '2019-01-31 10:04:04', '2019-01-31 10:04:04'),
(4, 1, 1, 24, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Aplha Miller\",24]}', '2019-01-31 10:53:17', '2019-01-31 10:53:17'),
(5, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Aplha Miller\",24]}', '2019-01-31 10:54:01', '2019-01-31 10:54:01'),
(6, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Aplha Miller\",24]}', '2019-02-04 09:09:45', '2019-02-04 09:09:45'),
(7, 4, 1, 2, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>gvujmygum</strong>', NULL, '2019-02-07 06:13:06', '2019-02-07 06:13:06'),
(8, 1, 1, 1, 'lock', 'bg-blue', 'trans(\"history.backend.users.changed_password\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Admin Admin\",1]}', '2019-02-08 05:23:31', '2019-02-08 05:23:31'),
(9, 1, 1, 1, 'lock', 'bg-blue', 'trans(\"history.backend.users.changed_password\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Admin Admin\",1]}', '2019-02-08 05:25:01', '2019-02-08 05:25:01'),
(10, 4, 1, 2, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>cfgbnfn ft</strong>', NULL, '2019-02-10 23:32:55', '2019-02-10 23:32:55'),
(11, 4, 1, 1, 'trash', 'bg-maroon', 'trans(\"history.backend.pages.deleted\") <strong>asdfasdf</strong>', NULL, '2019-02-10 23:56:05', '2019-02-10 23:56:05'),
(12, 4, 1, 2, 'trash', 'bg-maroon', 'trans(\"history.backend.pages.deleted\") <strong>cfgbnfn ft</strong>', NULL, '2019-02-10 23:56:14', '2019-02-10 23:56:14'),
(13, 4, 1, 3, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>Business Dashboards</strong>', NULL, '2019-02-10 23:57:03', '2019-02-10 23:57:03'),
(14, 1, 1, 25, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Himanshu Vyas\",25]}', '2019-02-12 04:13:12', '2019-02-12 04:13:12'),
(15, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Aplham Millerm\",24]}', '2019-02-12 04:27:21', '2019-02-12 04:27:21'),
(16, 1, 1, 26, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"harsh test\",26]}', '2019-02-13 18:02:08', '2019-02-13 18:02:08'),
(17, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-02-14 07:03:37', '2019-02-14 07:03:37'),
(18, 4, 1, 4, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>Safety</strong>', NULL, '2019-02-14 07:04:39', '2019-02-14 07:04:39'),
(19, 4, 1, 5, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>How It Works</strong>', NULL, '2019-02-14 07:05:27', '2019-02-14 07:05:27'),
(20, 1, 1, 29, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Jughkuyjh Juygkuy\",29]}', '2019-02-16 02:45:02', '2019-02-16 02:45:02'),
(21, 1, 1, 29, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Jughkuyjh Juygkuy\",29]}', '2019-02-16 02:51:50', '2019-02-16 02:51:50'),
(22, 1, 1, 29, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Jughkuyjh Juygkuy\",29]}', '2019-02-16 02:53:09', '2019-02-16 02:53:09'),
(23, 1, 1, 29, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Jughkuyjh Juygkuy\",29]}', '2019-02-16 02:56:14', '2019-02-16 02:56:14'),
(24, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-02-16 04:13:17', '2019-02-16 04:13:17'),
(25, 4, 1, 6, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>About Us Home</strong>', NULL, '2019-02-16 04:44:11', '2019-02-16 04:44:11'),
(26, 4, 1, 7, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>How It Works Home</strong>', NULL, '2019-02-16 04:46:04', '2019-02-16 04:46:04'),
(27, 1, 1, 32, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Name\",32]}', '2019-02-16 05:57:44', '2019-02-16 05:57:44'),
(28, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-18 01:35:50', '2019-02-18 01:35:50'),
(29, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-18 01:36:29', '2019-02-18 01:36:29'),
(30, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-18 01:40:31', '2019-02-18 01:40:31'),
(31, 1, 1, 33, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Gupta\",33]}', '2019-02-18 04:22:21', '2019-02-18 04:22:21'),
(32, 1, 1, 34, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Gupta\",34]}', '2019-02-18 04:40:12', '2019-02-18 04:40:12'),
(33, 1, 1, 38, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Gupta\",38]}', '2019-02-18 06:31:30', '2019-02-18 06:31:30'),
(34, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Aplham Millerm\",24]}', '2019-02-18 06:37:57', '2019-02-18 06:37:57'),
(35, 1, 1, 34, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deeptest Gupta\",34]}', '2019-02-18 06:40:35', '2019-02-18 06:40:35'),
(36, 1, 1, 34, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deeptest Gupta\",34]}', '2019-02-18 06:41:15', '2019-02-18 06:41:15'),
(37, 1, 1, 34, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deeptest Gupta\",34]}', '2019-02-18 07:58:09', '2019-02-18 07:58:09'),
(38, 1, 1, 39, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Gupta\",39]}', '2019-02-18 08:12:01', '2019-02-18 08:12:01'),
(39, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Name\",32]}', '2019-02-18 09:15:50', '2019-02-18 09:15:50'),
(40, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Name\",32]}', '2019-02-18 09:16:15', '2019-02-18 09:16:15'),
(41, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Name\",32]}', '2019-02-19 01:18:28', '2019-02-19 01:18:28'),
(42, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-02-19 07:48:29', '2019-02-19 07:48:29'),
(43, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-02-19 07:51:22', '2019-02-19 07:51:22'),
(44, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home2</strong>', NULL, '2019-02-19 07:51:40', '2019-02-19 07:51:40'),
(45, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-02-19 07:52:23', '2019-02-19 07:52:23'),
(46, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home2</strong>', NULL, '2019-02-19 07:55:26', '2019-02-19 07:55:26'),
(47, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-02-19 07:55:51', '2019-02-19 07:55:51'),
(48, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-19 08:08:23', '2019-02-19 08:08:23'),
(49, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-19 08:09:19', '2019-02-19 08:09:19'),
(50, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 01:13:43', '2019-02-22 01:13:43'),
(51, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 01:21:30', '2019-02-22 01:21:30'),
(52, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 01:25:37', '2019-02-22 01:25:37'),
(53, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 01:29:10', '2019-02-22 01:29:10'),
(54, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:00:03', '2019-02-22 02:00:03'),
(55, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:04:44', '2019-02-22 02:04:44'),
(56, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:06:44', '2019-02-22 02:06:44'),
(57, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:26:29', '2019-02-22 02:26:29'),
(58, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Aplham Millerm\",24]}', '2019-02-22 02:27:50', '2019-02-22 02:27:50'),
(59, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:38:49', '2019-02-22 02:38:49'),
(60, 1, 1, 41, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Gupta\",41]}', '2019-02-22 02:41:55', '2019-02-22 02:41:55'),
(61, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:42:18', '2019-02-22 02:42:18'),
(62, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 02:43:25', '2019-02-22 02:43:25'),
(63, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-22 09:01:46', '2019-02-22 09:01:46'),
(64, 4, 1, 5, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works</strong>', NULL, '2019-02-25 05:46:19', '2019-02-25 05:46:19'),
(65, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-25 05:50:06', '2019-02-25 05:50:06'),
(66, 1, 1, 29, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Jughkuyjh Juygkuy\",29]}', '2019-02-25 06:31:12', '2019-02-25 06:31:12'),
(67, 1, 1, 35, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Deep Gupta\",35]}', '2019-02-25 06:32:58', '2019-02-25 06:32:58'),
(68, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 06:34:58', '2019-02-25 06:34:58'),
(69, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 06:35:42', '2019-02-25 06:35:42'),
(70, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 07:12:51', '2019-02-25 07:12:51'),
(71, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 07:13:38', '2019-02-25 07:13:38'),
(72, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 07:13:57', '2019-02-25 07:13:57'),
(73, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 07:15:54', '2019-02-25 07:15:54'),
(74, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 07:22:15', '2019-02-25 07:22:15'),
(75, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-25 07:22:31', '2019-02-25 07:22:31'),
(76, 1, 1, 23, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"First User\",23]}', '2019-02-26 03:45:27', '2019-02-26 03:45:27'),
(77, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-26 05:54:56', '2019-02-26 05:54:56'),
(78, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-26 06:19:10', '2019-02-26 06:19:10'),
(79, 1, 1, 45, 'times', 'bg-yellow', 'trans(\"history.backend.users.deactivated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harsh Dangara\",45]}', '2019-02-26 23:58:38', '2019-02-26 23:58:38'),
(80, 1, 1, 45, 'check', 'bg-green', 'trans(\"history.backend.users.reactivated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harsh Dangara\",45]}', '2019-02-26 23:59:13', '2019-02-26 23:59:13'),
(81, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-02-27 01:22:52', '2019-02-27 01:22:52'),
(82, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-02-27 01:23:10', '2019-02-27 01:23:10'),
(83, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-02-27 06:01:28', '2019-02-27 06:01:28'),
(84, 1, 1, 45, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harsh Dangara\",45]}', '2019-02-27 06:20:12', '2019-02-27 06:20:12'),
(85, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-27 23:56:23', '2019-02-27 23:56:23'),
(86, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-27 23:57:17', '2019-02-27 23:57:17'),
(87, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-02-27 23:57:48', '2019-02-27 23:57:48'),
(88, 1, 1, 49, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Jack Sharma\",49]}', '2019-03-04 23:58:05', '2019-03-04 23:58:05'),
(89, 1, 1, 50, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ricky Rich\",50]}', '2019-03-04 23:58:20', '2019-03-04 23:58:20'),
(90, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-03-05 02:09:18', '2019-03-05 02:09:18'),
(91, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-03-05 02:09:47', '2019-03-05 02:09:47'),
(92, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-03-05 02:10:49', '2019-03-05 02:10:49'),
(93, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-03-05 02:12:19', '2019-03-05 02:12:19'),
(94, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-03-05 02:15:17', '2019-03-05 02:15:17'),
(95, 4, 1, 7, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works Home</strong>', NULL, '2019-03-05 02:15:57', '2019-03-05 02:15:57'),
(96, 4, 1, 5, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works</strong>', NULL, '2019-03-05 02:16:36', '2019-03-05 02:16:36'),
(97, 4, 1, 5, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works</strong>', NULL, '2019-03-05 02:17:15', '2019-03-05 02:17:15'),
(98, 1, 1, 56, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harsh Dangara\",56]}', '2019-03-06 16:36:19', '2019-03-06 16:36:19'),
(99, 4, 1, 11, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>What Reviews Say About Us</strong>', NULL, '2019-03-08 12:31:55', '2019-03-08 12:31:55'),
(100, 1, 1, 47, 'times', 'bg-yellow', 'trans(\"history.backend.users.deactivated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"THOMAS GALBRAITH\",47]}', '2019-03-13 03:53:20', '2019-03-13 03:53:20'),
(101, 1, 1, 57, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Rakesh Sharma\",57]}', '2019-03-13 17:01:01', '2019-03-13 17:01:01'),
(102, 1, 1, 48, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Thomas Galbraith\",48]}', '2019-03-13 21:30:19', '2019-03-13 21:30:19'),
(103, 1, 1, 50, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ricky Rich\",50]}', '2019-03-13 21:31:30', '2019-03-13 21:31:30'),
(104, 1, 1, 51, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Richard Freeman\",51]}', '2019-03-13 21:32:01', '2019-03-13 21:32:01'),
(105, 1, 1, 48, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Thomas Galbraith\",48]}', '2019-03-13 21:35:31', '2019-03-13 21:35:31'),
(106, 1, 1, 51, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Richard Freeman\",51]}', '2019-03-14 02:00:33', '2019-03-14 02:00:33'),
(107, 1, 1, 58, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"t t\",58]}', '2019-03-14 02:03:58', '2019-03-14 02:03:58'),
(108, 1, 1, 61, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harsh Dangara\",61]}', '2019-03-20 17:22:25', '2019-03-20 17:22:25'),
(109, 1, 1, 55, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Rachita Mishra\",55]}', '2019-03-20 18:03:22', '2019-03-20 18:03:22'),
(110, 1, 1, 66, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Arnav Jain\",66]}', '2019-03-20 21:04:04', '2019-03-20 21:04:04'),
(111, 1, 1, 66, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Arnav Jain\",66]}', '2019-03-20 21:04:48', '2019-03-20 21:04:48'),
(112, 4, 1, 8, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>Manage your profile</strong>', NULL, '2019-03-21 04:01:01', '2019-03-21 04:01:01'),
(113, 4, 1, 9, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>Easy to Use</strong>', NULL, '2019-03-21 04:05:30', '2019-03-21 04:05:30'),
(114, 4, 1, 10, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>Rewarding our Users and their Communities</strong>', NULL, '2019-03-21 04:10:00', '2019-03-21 04:10:00'),
(115, 4, 1, 11, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>What Reviews Say About Us</strong>', NULL, '2019-03-21 04:13:56', '2019-03-21 04:13:56'),
(116, 1, 1, 68, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Mary Richards\",68]}', '2019-04-01 00:41:04', '2019-04-01 00:41:04'),
(117, 1, 1, 68, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Mary Richards\",68]}', '2019-04-01 00:48:03', '2019-04-01 00:48:03'),
(118, 1, 1, 68, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Mary Richards\",68]}', '2019-04-01 00:48:39', '2019-04-01 00:48:39'),
(119, 1, 1, 69, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Mary Richards\",69]}', '2019-04-01 02:15:44', '2019-04-01 02:15:44'),
(120, 1, 1, 70, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Hannah Pickle\",70]}', '2019-04-01 02:16:08', '2019-04-01 02:16:08'),
(121, 1, 1, 71, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harry Maxwell\",71]}', '2019-04-01 02:16:36', '2019-04-01 02:16:36'),
(122, 1, 1, 72, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Morven Peters\",72]}', '2019-04-01 02:17:13', '2019-04-01 02:17:13'),
(123, 1, 1, 73, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Matthew Anderson\",73]}', '2019-04-01 02:17:40', '2019-04-01 02:17:40'),
(124, 1, 1, 74, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Harry Colins\",74]}', '2019-04-01 03:35:29', '2019-04-01 03:35:29'),
(125, 1, 1, 75, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Eva Morrison\",75]}', '2019-04-01 03:35:58', '2019-04-01 03:35:58'),
(126, 1, 1, 77, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Emily Baxter\",77]}', '2019-04-01 04:02:18', '2019-04-01 04:02:18'),
(127, 1, 1, 76, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Anna Dowie\",76]}', '2019-04-01 04:02:51', '2019-04-01 04:02:51'),
(128, 1, 1, 48, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Thomas Galbraith\",48]}', '2019-04-01 04:03:41', '2019-04-01 04:03:41'),
(129, 1, 1, 78, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Richard Duff\",78]}', '2019-04-01 04:03:59', '2019-04-01 04:03:59'),
(130, 1, 1, 79, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ramon Smith\",79]}', '2019-04-01 04:12:27', '2019-04-01 04:12:27'),
(131, 1, 1, 79, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ramon Smith\",79]}', '2019-04-01 04:12:28', '2019-04-01 04:12:28'),
(132, 1, 1, 80, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Mia Nicol\",80]}', '2019-04-01 04:12:41', '2019-04-01 04:12:41'),
(133, 1, 1, 81, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Louise Henderson\",81]}', '2019-04-01 04:17:18', '2019-04-01 04:17:18'),
(134, 1, 1, 82, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Andrew Morrison\",82]}', '2019-04-01 04:22:47', '2019-04-01 04:22:47'),
(135, 1, 1, 83, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ellee Paterson\",83]}', '2019-04-01 04:27:05', '2019-04-01 04:27:05'),
(136, 1, 1, 84, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Graham Mcdonald\",84]}', '2019-04-01 04:30:21', '2019-04-01 04:30:21'),
(137, 1, 1, 85, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Olivia Green\",85]}', '2019-04-01 04:36:32', '2019-04-01 04:36:32'),
(138, 1, 1, 86, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Pete Gordon\",86]}', '2019-04-01 16:42:37', '2019-04-01 16:42:37'),
(139, 1, 1, 87, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"John Getti\",87]}', '2019-04-01 16:48:54', '2019-04-01 16:48:54'),
(140, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-04-02 21:48:49', '2019-04-02 21:48:49'),
(141, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-04-02 23:45:11', '2019-04-02 23:45:11'),
(142, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-04-02 23:47:47', '2019-04-02 23:47:47'),
(143, 1, 1, 67, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"paul d\",67]}', '2019-04-05 13:31:55', '2019-04-05 13:31:55'),
(144, 4, 1, 10, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>Eagermeets Events</strong>', NULL, '2019-04-08 19:46:24', '2019-04-08 19:46:24'),
(145, 1, 1, 99, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Thomas Galbraith\",99]}', '2019-04-09 17:45:08', '2019-04-09 17:45:08'),
(146, 1, 1, 67, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"paul d\",67]}', '2019-04-17 16:31:51', '2019-04-17 16:31:51'),
(147, 1, 1, 101, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Logan Mainord\",101]}', '2019-04-30 16:50:32', '2019-04-30 16:50:32'),
(148, 1, 1, 1, 'lock', 'bg-blue', 'trans(\"history.backend.users.changed_password\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Admin Admin\",1]}', '2019-05-04 00:52:46', '2019-05-04 00:52:46'),
(149, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-05-04 04:17:21', '2019-05-04 04:17:21'),
(150, 1, 1, 1, 'lock', 'bg-blue', 'trans(\"history.backend.users.changed_password\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Admin Admin\",1]}', '2019-05-09 16:59:28', '2019-05-09 16:59:28'),
(151, 1, 1, 99, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Thomas Galbraith\",99]}', '2019-05-10 02:40:42', '2019-05-10 02:40:42'),
(152, 1, 1, 102, 'plus', 'bg-green', 'trans(\"history.backend.users.created\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ben Baxter\",102]}', '2019-05-10 02:43:51', '2019-05-10 02:43:51'),
(153, 4, 1, 4, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>Safety</strong>', NULL, '2019-05-11 04:03:42', '2019-05-11 04:03:42'),
(154, 4, 1, 5, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>How It Works</strong>', NULL, '2019-05-12 01:45:07', '2019-05-12 01:45:07'),
(155, 4, 1, 3, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-05-12 01:47:56', '2019-05-12 01:47:56'),
(156, 4, 1, 6, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us Home</strong>', NULL, '2019-05-12 01:48:19', '2019-05-12 01:48:19'),
(157, 4, 1, 4, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>Safety</strong>', NULL, '2019-05-12 01:54:54', '2019-05-12 01:54:54'),
(158, 1, 1, 103, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"David Thompson\",103]}', '2019-05-18 05:39:59', '2019-05-18 05:39:59'),
(159, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Testds TestUsr\",24]}', '2019-05-31 01:43:06', '2019-05-31 01:43:06'),
(160, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"fako vendor\",32]}', '2019-06-27 17:12:44', '2019-06-27 17:12:44'),
(161, 1, 1, 31, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"test 123\",31]}', '2019-06-27 17:23:58', '2019-06-27 17:23:58'),
(162, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Testds TestUsr\",24]}', '2019-06-27 18:21:42', '2019-06-27 18:21:42'),
(163, 1, 1, 31, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"test 123\",31]}', '2019-06-27 18:21:58', '2019-06-27 18:21:58'),
(164, 4, 1, 12, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>Terms and Conditions</strong>', NULL, '2019-06-28 16:15:17', '2019-06-28 16:15:17'),
(165, 4, 1, 13, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>Privacy Policy</strong>', NULL, '2019-06-28 16:15:54', '2019-06-28 16:15:54'),
(166, 4, 1, 1, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-06-28 16:22:00', '2019-06-28 16:22:00'),
(167, 4, 1, 1, 'save', 'bg-aqua', 'trans(\"history.backend.pages.updated\") <strong>About Us</strong>', NULL, '2019-06-28 16:22:37', '2019-06-28 16:22:37'),
(168, 4, 1, 14, 'plus', 'bg-green', 'trans(\"history.backend.pages.created\") <strong>Home Page Content</strong>', NULL, '2019-06-28 16:26:35', '2019-06-28 16:26:35'),
(169, 1, 1, 31, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"test 123\",31]}', '2019-06-28 18:49:55', '2019-06-28 18:49:55'),
(170, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Testds TestUsr\",24]}', '2019-06-28 18:51:41', '2019-06-28 18:51:41'),
(171, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"fako vendor\",32]}', '2019-06-28 18:52:29', '2019-06-28 18:52:29'),
(172, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Testds TestUsr\",24]}', '2019-07-05 12:14:59', '2019-07-05 12:14:59'),
(173, 1, 1, 31, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"test 123\",31]}', '2019-07-05 12:17:19', '2019-07-05 12:17:19'),
(174, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"fako vendor\",32]}', '2019-07-05 12:19:00', '2019-07-05 12:19:00'),
(175, 1, 1, 36, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Sarjeet Saharan\",36]}', '2019-07-10 07:04:02', '2019-07-10 07:04:02'),
(176, 1, 1, 31, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"test 123\",31]}', '2019-07-19 02:41:34', '2019-07-19 02:41:34'),
(177, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Testds TestUsr\",24]}', '2019-07-19 02:41:53', '2019-07-19 02:41:53'),
(178, 1, 1, 24, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Testds TestUsr\",24]}', '2019-07-19 02:42:10', '2019-07-19 02:42:10'),
(179, 1, 1, 32, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"fako vendor\",32]}', '2019-07-19 02:42:34', '2019-07-19 02:42:34'),
(180, 1, 1, 51, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Dtest Dots\",51]}', '2019-07-23 06:22:16', '2019-07-23 06:22:16'),
(181, 1, 1, 51, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Dtest Dots\",51]}', '2019-07-23 06:22:29', '2019-07-23 06:22:29'),
(182, 1, 1, 52, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"testvendor test\",52]}', '2019-07-23 06:42:21', '2019-07-23 06:42:21'),
(183, 1, 1, 80, 'save', 'bg-aqua', 'trans(\"history.backend.users.updated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Ngoc Nguyen\",80]}', '2019-10-24 21:38:09', '2019-10-24 21:38:09'),
(184, 1, 1, 61, 'times', 'bg-yellow', 'trans(\"history.backend.users.deactivated\") <strong>{user}</strong>', '{\"user_link\":[\"admin.access.user.show\",\"Chjc Hdfh\",61]}', '2019-10-28 03:56:36', '2019-10-28 03:56:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_types`
--

CREATE TABLE `history_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_types`
--

INSERT INTO `history_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2019-01-22 00:26:41', '2019-01-22 00:26:41'),
(2, 'Role', '2019-01-22 00:26:41', '2019-01-22 00:26:41'),
(3, 'Permission', '2019-01-22 00:26:41', '2019-01-22 00:26:41'),
(4, 'Page', '2019-01-22 00:26:41', '2019-01-22 00:26:41'),
(5, 'BlogTag', '2019-01-22 00:26:41', '2019-01-22 00:26:41'),
(6, 'BlogCategory', '2019-01-22 00:26:41', '2019-01-22 00:26:41'),
(7, 'Blog', '2019-01-22 00:26:41', '2019-01-22 00:26:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `memberships`
--

INSERT INTO `memberships` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Silver', 1, NULL, NULL),
(2, 'Gold', 1, NULL, NULL),
(3, 'Platinum', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `membership_details`
--

CREATE TABLE `membership_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `membership_level` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('backend','frontend') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `type`, `name`, `items`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'backend', 'Backend Sidebar Menu', '[{\"id\":11,\"name\":\"Users Management\",\"url\":\"\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-male\",\"view_permission_id\":\"view-access-management\",\"content\":\"Users Management\",\"children\":[{\"view_permission_id\":\"view-user-management\",\"icon\":\"fa-street-view\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.access.user.customers.index\",\"name\":\"Manage Customers\",\"id\":12,\"content\":\"Manage Customers\"},{\"id\":20,\"name\":\"Manage Vendors\",\"url\":\"admin.access.user.vendor.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-star\",\"view_permission_id\":\"view-user-management\",\"content\":\"Manage Vendors\",\"children\":[]}]},{\"view_permission_id\":\"view-servicecategory-permission\",\"icon\":\"fa-list-alt\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.servicecategories.index\",\"name\":\"Offer Categories\",\"id\":36,\"content\":\"Offer Categories\",\"children\":[]},{\"id\":38,\"name\":\"Offers Management\",\"url\":\"\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-gift\",\"view_permission_id\":\"\",\"content\":\"Offers Management\",\"children\":[{\"view_permission_id\":\"view-service-permission\",\"icon\":\"fa-gift\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.services.index\",\"name\":\"Offers\",\"id\":35,\"content\":\"Offers\"},{\"view_permission_id\":\"\",\"icon\":\"fa-star\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.services.featured\",\"name\":\"Featured Offers\",\"id\":37,\"content\":\"Featured Offers\"}]},{\"view_permission_id\":\"\",\"icon\":\"fa-envelope\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.emailtemplates.index\",\"name\":\"Email Templates\",\"id\":21,\"content\":\"Email Templates\"},{\"view_permission_id\":\"view-page\",\"icon\":\"fa-file-text\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.pages.index\",\"name\":\"CMS Pages\",\"id\":2,\"content\":\"CMS Pages\"},{\"view_permission_id\":\"edit-settings\",\"icon\":\"fa-gear\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.settings.edit?id=1\",\"name\":\"Settings\",\"id\":9,\"content\":\"Settings\"},{\"view_permission_id\":\"view-redeem-permission\",\"icon\":\"fa fa-gift\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.redeems.index\",\"name\":\"Redeems\",\"id\":39,\"content\":\"Redeems\"},{\"view_permission_id\":\"view-faq\",\"icon\":\"fa-question-circle\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.faqs.index\",\"name\":\"Faq Management\",\"id\":30,\"content\":\"Faq Management\"},{\"view_permission_id\":\"view-banner-permission\",\"icon\":\"fa-street-view\",\"open_in_new_tab\":0,\"url_type\":\"route\",\"url\":\"admin.banners.index\",\"name\":\"Banners\",\"id\":33,\"content\":\"Banners\"},{\"id\":34,\"name\":\"Contact Enquiries\",\"url\":\"admin.enquiries.index\",\"url_type\":\"route\",\"open_in_new_tab\":0,\"icon\":\"fa-question-circle\",\"view_permission_id\":\"view-enquiry-permission\",\"content\":\"Contact Enquiries\"}]', 1, NULL, '2019-01-22 00:26:41', '2019-07-23 08:26:24', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_11_02_060149_create_blog_categories_table', 1),
(2, '2017_11_02_060149_create_blog_map_categories_table', 1),
(3, '2017_11_02_060149_create_blog_map_tags_table', 1),
(4, '2017_11_02_060149_create_blog_tags_table', 1),
(5, '2017_11_02_060149_create_blogs_table', 1),
(6, '2017_11_02_060149_create_faqs_table', 1),
(7, '2017_11_02_060149_create_history_table', 1),
(8, '2017_11_02_060149_create_history_types_table', 1),
(9, '2017_11_02_060149_create_modules_table', 1),
(10, '2017_11_02_060149_create_notifications_table', 1),
(11, '2017_11_02_060149_create_pages_table', 1),
(12, '2017_11_02_060149_create_password_resets_table', 1),
(13, '2017_11_02_060149_create_permission_role_table', 1),
(14, '2017_11_02_060149_create_permission_user_table', 1),
(15, '2017_11_02_060149_create_permissions_table', 1),
(16, '2017_11_02_060149_create_role_user_table', 1),
(17, '2017_11_02_060149_create_roles_table', 1),
(18, '2017_11_02_060149_create_sessions_table', 1),
(19, '2017_11_02_060149_create_settings_table', 1),
(20, '2017_11_02_060149_create_social_logins_table', 1),
(21, '2017_11_02_060149_create_users_table', 1),
(22, '2017_11_02_060152_add_foreign_keys_to_history_table', 1),
(23, '2017_11_02_060152_add_foreign_keys_to_notifications_table', 1),
(24, '2017_11_02_060152_add_foreign_keys_to_permission_role_table', 1),
(25, '2017_11_02_060152_add_foreign_keys_to_permission_user_table', 1),
(26, '2017_11_02_060152_add_foreign_keys_to_role_user_table', 1),
(27, '2017_11_02_060152_add_foreign_keys_to_social_logins_table', 1),
(28, '2017_12_10_122555_create_menus_table', 1),
(29, '2017_12_24_042039_add_null_constraint_on_created_by_on_user_table', 1),
(30, '2017_12_28_005822_add_null_constraint_on_created_by_on_role_table', 1),
(31, '2017_12_28_010952_add_null_constraint_on_created_by_on_permission_table', 1),
(32, '2019_02_25_072250_update_users_for_cashier', 2),
(33, '2016_06_01_000001_create_oauth_auth_codes_table', 3),
(34, '2016_06_01_000002_create_oauth_access_tokens_table', 3),
(35, '2016_06_01_000003_create_oauth_refresh_tokens_table', 3),
(36, '2016_06_01_000004_create_oauth_clients_table', 3),
(37, '2016_06_01_000005_create_oauth_personal_access_clients_table', 3),
(38, '2019_06_14_081349_create_app_customers_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `view_permission_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'view_route',
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `modules`
--

INSERT INTO `modules` (`id`, `view_permission_id`, `name`, `url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'view-access-management', 'Access Management', NULL, 1, NULL, '2019-01-22 00:26:41', NULL),
(2, 'view-user-management', 'User Management', 'admin.access.user.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(3, 'view-role-management', 'Role Management', 'admin.access.role.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(4, 'view-permission-management', 'Permission Management', 'admin.access.permission.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(5, 'view-menu', 'Menus', 'admin.menus.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(6, 'view-module', 'Module', 'admin.modules.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(7, 'view-page', 'Pages', 'admin.pages.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(8, 'edit-settings', 'Settings', 'admin.settings.edit', 1, NULL, '2019-01-22 00:26:41', NULL),
(9, 'view-blog', 'Blog Management', NULL, 1, NULL, '2019-01-22 00:26:41', NULL),
(10, 'view-blog-category', 'Blog Category Management', 'admin.blogcategories.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(11, 'view-blog-tag', 'Blog Tag Management', 'admin.blogtags.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(12, 'view-blog', 'Blog Management', 'admin.blogs.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(13, 'view-faq', 'Faq Management', 'admin.faqs.index', 1, NULL, '2019-01-22 00:26:41', NULL),
(16, 'view-customer-permission', 'Customers', 'admin.customers.index', 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26'),
(17, 'view-event-permission', 'Events', 'admin.events.index', 1, NULL, '2019-01-25 04:49:49', '2019-01-25 04:49:49'),
(18, 'view-servicecategory-permission', 'Service Categories', 'admin.servicecategories.index', 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01'),
(19, 'view-termandcondition-permission', 'Terms And Conditions', 'admin.termandconditions.index', 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53'),
(20, 'view-service-permission', 'Services', 'admin.services.index', 1, NULL, '2019-01-28 03:46:10', '2019-01-28 03:46:10'),
(21, 'view-testmod-permission', 'Testmod', 'admin.testmods.index', 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51'),
(22, 'view-banner-permission', 'Banner', 'admin.banners.index', 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10'),
(23, 'view-faqcategory-permission', 'Faqcategory', 'admin.faqcategories.index', 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38'),
(24, 'view-contact-permission', 'Contact', 'admin.contacts.index', 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31'),
(25, 'view-preferences-permission', 'Preferences', 'admin.preferences.index', 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52'),
(26, 'view-enquiry-permission', 'Enquiry', 'admin.enquiries.index', 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00'),
(27, 'view-preferences-permission', 'Preferences', 'admin.preferences.index', 1, NULL, '2019-02-12 22:47:52', '2019-02-12 22:47:52'),
(28, 'view-preferencesoption-permission', 'Preferences Options', 'admin.preferencesoptions.index', 1, NULL, '2019-02-13 23:00:02', '2019-02-13 23:00:02'),
(29, 'view-subscriptionplan-permission', 'Subscription Plans', 'admin.subscriptionplans.index', 1, NULL, '2019-02-15 18:57:25', '2019-02-15 18:57:25'),
(30, 'view-review-permission', 'Review', 'admin.reviews.index', 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58'),
(31, 'view-usersubscriptionplan-permission', 'userSubscriptionPlan', 'admin.usersubscriptionplans.index', 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `allow_notification` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `status`, `allow_notification`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@admin.com', 1, 0, '2019-02-06 08:08:44', '2019-02-06 08:08:44', NULL),
(2, 'harsh.dangara@dotsquares.com', 1, 1, '2019-03-01 06:30:42', '2019-03-01 06:30:42', NULL),
(3, 'nyco@yopmail.com', 1, 1, '2019-03-05 03:20:54', '2019-03-05 03:20:54', NULL),
(4, 'harsh321@yopmail.com', 1, 1, '2019-03-05 03:25:57', '2019-03-05 03:25:57', NULL),
(5, 'rohan@yopmail.com', 1, 1, '2019-03-05 03:31:11', '2019-03-05 03:31:11', NULL),
(6, 'rohan123@yopmail.com', 1, 1, '2019-03-05 03:34:47', '2019-03-05 03:34:47', NULL),
(7, 'rachita@yopmail.com', 1, 1, '2019-03-05 03:38:51', '2019-03-05 03:38:51', NULL),
(8, 'rakesh123@yopmail.com', 1, 1, '2019-03-13 16:55:45', '2019-03-13 16:55:45', NULL),
(9, 'harsh.dangara@dotsquare.com', 1, 1, '2019-03-19 08:58:55', '2019-03-19 08:58:55', NULL),
(10, 'dgupta123@yopmail.com', 1, 1, '2019-03-19 09:05:46', '2019-03-19 09:05:46', NULL),
(11, 'apurba.saha@dotsquares.com', 1, 1, '2019-03-20 12:11:02', '2019-03-20 12:11:02', NULL),
(12, 'dstestingu9@gmail.com', 1, 1, '2019-03-20 12:18:33', '2019-03-20 12:18:33', NULL),
(13, '10theden@gmail.com', 1, 0, '2019-03-31 19:50:53', '2019-03-31 19:50:53', NULL),
(14, 'ettaluffe-6440@yopmail.com', 1, 1, '2019-03-31 12:52:48', '2019-03-31 12:52:48', NULL),
(15, 'emmajonne-0669@yopmail.com', 1, 1, '2019-03-31 12:55:52', '2019-03-31 12:55:52', NULL),
(16, 'qippawaxomm-4692@yopmail.com', 1, 1, '2019-03-31 12:58:22', '2019-03-31 12:58:22', NULL),
(17, 'ciqecannajo-3316@yopmail.com', 1, 1, '2019-03-31 13:00:01', '2019-03-31 13:00:01', NULL),
(18, 'pehifagottu-6298@yopmail.com', 1, 1, '2019-03-31 13:01:48', '2019-03-31 13:01:48', NULL),
(19, 'epyddattak-9547@yopmail.com', 1, 1, '2019-03-31 13:03:47', '2019-03-31 13:03:47', NULL),
(20, 'zeneqonnyxu-2002@yopmail.com', 1, 1, '2019-03-31 13:05:44', '2019-03-31 13:05:44', NULL),
(21, 'kumedewi-9828@yopmail.com', 1, 1, '2019-03-31 13:07:31', '2019-03-31 13:07:31', NULL),
(22, 'messoddazatte-8860@yopmail.com', 1, 1, '2019-03-31 13:09:08', '2019-03-31 13:09:08', NULL),
(23, 'iserunaty-2844@yopmail.com', 1, 1, '2019-03-31 13:10:44', '2019-03-31 13:10:44', NULL),
(24, 'adderucije-2695@yopmail.com', 1, 1, '2019-03-31 13:12:42', '2019-03-31 13:12:42', NULL),
(25, 'ofevennup-6234@yopmail.com', 1, 1, '2019-03-31 13:14:51', '2019-03-31 13:14:51', NULL),
(26, 'uvojagaku-9832@yopmail.com', 1, 1, '2019-03-31 13:17:14', '2019-03-31 13:17:14', NULL),
(27, 'evavallu-1815@yopmail.com', 1, 1, '2019-03-31 13:20:17', '2019-03-31 13:20:17', NULL),
(28, 'zaqubusik-3562@yopmail.com', 1, 0, '2019-03-31 13:28:55', '2019-03-31 13:28:55', NULL),
(29, 'izovotah-7850@yopmail.com', 1, 1, '2019-03-31 13:31:35', '2019-03-31 13:31:35', NULL),
(30, 'poguramati-3070@yopmail.com', 1, 0, '2019-03-31 13:33:18', '2019-03-31 13:33:18', NULL),
(31, 'arujedaffa-9330@yopmail.com', 1, 1, '2019-03-31 13:34:55', '2019-03-31 13:34:55', NULL),
(32, 'jettaxussidd-9205@yopmail.com', 1, 1, '2019-03-31 13:36:51', '2019-03-31 13:36:51', NULL),
(33, 'vagefferrassu-8444@yopmail.com', 1, 1, '2019-03-31 13:38:30', '2019-03-31 13:38:30', NULL),
(34, 'issekarroppo-4947@yopmail.com', 1, 1, '2019-03-31 13:39:55', '2019-03-31 13:39:55', NULL),
(35, 'nyppodakene-6782@yopmail.com', 1, 1, '2019-03-31 13:41:40', '2019-03-31 13:41:40', NULL),
(36, 'taffodawony-8429@yopmail.com', 1, 0, '2019-03-31 13:43:20', '2019-03-31 13:43:20', NULL),
(37, 'ilakeke-2352@yopmail.com', 1, 1, '2019-03-31 13:44:46', '2019-03-31 13:44:46', NULL),
(38, 'jugixaveny-5987@yopmail.com', 1, 0, '2019-03-31 13:46:07', '2019-03-31 13:46:07', NULL),
(39, 'kalezeno-9551@yopmail.com', 1, 0, '2019-03-31 13:47:55', '2019-03-31 13:47:55', NULL),
(40, 'faluwave-0828@yopmail.com', 1, 1, '2019-03-31 13:50:59', '2019-03-31 13:50:59', NULL),
(41, 'ugallapid-1198@yopmail.com', 1, 1, '2019-03-31 13:53:16', '2019-03-31 13:53:16', NULL),
(42, 'ennepirryxe-6104@yopmail.com', 1, 0, '2019-03-31 14:14:35', '2019-03-31 14:14:35', NULL),
(43, 'meeteager@gmail.com', 1, 1, '2019-04-09 17:24:52', '2019-04-09 17:24:52', NULL),
(44, 'meetseager@gmail.com', 1, 1, '2019-04-09 17:36:22', '2019-04-09 17:36:22', NULL),
(45, 'ukamabo-1676@yopmail.com', 1, 1, '2019-04-14 08:15:53', '2019-04-14 08:15:53', NULL),
(46, 'commanderlogang@gmail.com', 1, 0, '2019-04-30 08:09:48', '2019-04-30 08:09:48', NULL),
(47, 'basketdave@gmail.com', 1, 1, '2019-05-17 15:58:39', '2019-05-17 15:58:39', NULL),
(48, 'testds@yopmail.com', 1, 1, '2019-05-28 05:17:33', '2019-05-28 05:17:33', NULL),
(49, 'fakotest@yopmail.com', 1, 1, '2019-06-14 02:28:20', '2019-06-14 02:28:20', NULL),
(50, 'fakovendor@yopmail.com', 1, 1, '2019-06-19 04:19:42', '2019-06-19 04:19:42', NULL),
(51, 'dstest@yopmail.com', 1, 1, '2019-07-23 04:23:51', '2019-07-23 04:23:51', NULL),
(52, 'testvendor|@yopmail.com', 1, 1, '2019-07-23 06:40:54', '2019-07-23 06:40:54', NULL),
(53, 'testnew@yopmail.com', 1, 1, '2019-07-23 06:45:58', '2019-07-23 06:45:58', NULL),
(54, 'demovendor@yopmail.com', 1, 1, '2019-10-06 22:17:23', '2019-10-06 22:17:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 - Dashboard , 2 - Email , 3 - Both',
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `message`, `user_id`, `type`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 09:51:59', NULL),
(2, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 09:52:42', NULL),
(3, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 09:53:19', NULL),
(4, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 09:53:37', NULL),
(5, 'User Deactivated: First | firstuser@yopmail.com', 1, 1, 0, '2019-01-31 09:54:59', NULL),
(6, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:01:13', NULL),
(7, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:01:31', NULL),
(8, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:01:42', NULL),
(9, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:01:49', NULL),
(10, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:21:55', NULL),
(11, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:51:41', NULL),
(12, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 10:52:00', NULL),
(13, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 11:07:02', NULL),
(14, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 14:35:05', NULL),
(15, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-01-31 17:37:23', NULL),
(16, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-01 07:23:53', NULL),
(17, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-01 08:59:11', NULL),
(18, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-01 09:07:50', NULL),
(19, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-03 23:11:44', NULL),
(20, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-04 00:19:54', NULL),
(21, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-04 08:14:06', NULL),
(22, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-04 08:48:47', NULL),
(23, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-04 09:12:11', NULL),
(24, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-04 09:12:27', NULL),
(25, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-05 01:48:34', NULL),
(26, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-05 03:25:55', NULL),
(27, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-05 03:58:44', NULL),
(28, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-05 04:10:16', NULL),
(29, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-05 06:18:32', NULL),
(30, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-05 07:44:38', NULL),
(31, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 01:19:27', NULL),
(32, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 06:32:54', NULL),
(33, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 06:33:06', NULL),
(34, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 06:33:14', NULL),
(35, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 06:33:20', NULL),
(36, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 06:33:37', NULL),
(37, 'User Logged Out: Aplha | alphadots@yopmail.com', 24, 1, 0, '2019-02-06 07:46:25', NULL),
(38, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 07:46:55', NULL),
(39, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 08:40:48', NULL),
(40, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 08:42:00', NULL),
(41, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 08:47:12', NULL),
(42, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-06 23:19:34', NULL),
(43, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 03:04:43', NULL),
(44, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 06:10:08', NULL),
(45, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 06:51:31', NULL),
(46, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 06:52:19', NULL),
(47, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 06:53:28', NULL),
(48, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 07:15:13', NULL),
(49, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-07 08:15:31', NULL),
(50, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-08 04:52:40', NULL),
(51, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-08 05:15:04', NULL),
(52, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-08 05:16:59', NULL),
(53, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-08 05:17:43', NULL),
(54, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-02-08 05:19:45', NULL),
(55, 'User Logged Out: Admin | admin-test@yopmail.com', 1, 1, 0, '2019-02-08 05:20:39', NULL),
(56, 'User Logged Out: Admin | admin-test@yopmail.com', 1, 1, 0, '2019-02-08 05:22:23', NULL),
(57, 'User Logged In: Admin | admin-test@yopmail.com', 1, 1, 0, '2019-02-08 05:23:02', NULL),
(58, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-08 05:25:15', NULL),
(59, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-08 05:25:24', NULL),
(60, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-09 00:47:13', NULL),
(61, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-10 23:03:39', NULL),
(62, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-10 23:03:49', NULL),
(63, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-10 23:05:19', NULL),
(64, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 01:31:05', NULL),
(65, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 01:41:07', NULL),
(66, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 01:48:41', NULL),
(67, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 01:50:07', NULL),
(68, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 04:11:15', NULL),
(69, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 09:41:35', NULL),
(70, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-11 23:19:05', NULL),
(71, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 00:44:21', NULL),
(72, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 00:48:04', NULL),
(73, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:15:32', NULL),
(74, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:26:29', NULL),
(75, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:39:07', NULL),
(76, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 04:23:27', NULL),
(77, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 04:51:39', NULL),
(78, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:51:00', NULL),
(79, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:58:15', NULL),
(80, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:58:19', NULL),
(81, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 03:59:49', NULL),
(82, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-12 18:17:55', NULL),
(83, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-13 00:13:40', NULL),
(84, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-13 03:03:51', NULL),
(85, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-13 03:20:17', NULL),
(86, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-13 03:20:22', NULL),
(87, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-13 17:50:38', NULL),
(88, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 01:19:18', NULL),
(89, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 01:30:12', NULL),
(90, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 01:57:42', NULL),
(91, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 02:16:34', NULL),
(92, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 02:16:47', NULL),
(93, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 02:17:35', NULL),
(94, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 03:50:55', NULL),
(95, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 03:51:22', NULL),
(96, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 04:56:40', NULL),
(97, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 04:58:58', NULL),
(98, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:30:29', NULL),
(99, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:36:55', NULL),
(100, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:37:19', NULL),
(101, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:40:01', NULL),
(102, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:41:02', NULL),
(103, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:46:06', NULL),
(104, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:46:17', NULL),
(105, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:48:46', NULL),
(106, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-15 05:51:21', NULL),
(107, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 06:55:14', NULL),
(108, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-15 22:49:21', NULL),
(109, 'User Verified: Deep | dgupta@yopmail.com', 27, 1, 0, '2019-02-16 01:08:28', NULL),
(110, 'User Verified: Jughkuyjh | deepgupta@yopmail.com', 29, 1, 0, '2019-02-16 01:57:00', NULL),
(111, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-16 03:49:49', NULL),
(112, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-16 03:49:58', NULL),
(113, 'User Logged Out: Jughkuyjh | deepgupta@yopmail.com', 29, 1, 0, '2019-02-16 03:52:34', NULL),
(114, 'User Logged Out: Jughkuyjh | deepgupta@yopmail.com', 29, 1, 0, '2019-02-16 03:54:40', NULL),
(115, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-16 03:57:20', NULL),
(116, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-16 05:21:24', NULL),
(117, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-18 03:37:45', NULL),
(118, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-18 03:38:04', NULL),
(119, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-18 05:23:04', NULL),
(120, 'User Verified: Deep | dyoptest@yopmail.com', 35, 1, 0, '2019-02-18 05:28:19', NULL),
(121, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-18 05:53:36', NULL),
(122, 'User Logged In: Deep | dyoptest@yopmail.com', 35, 1, 0, '2019-02-18 07:55:44', NULL),
(123, 'User Logged Out: Deep | dyoptest@yopmail.com', 35, 1, 0, '2019-02-18 07:55:50', NULL),
(124, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-18 07:56:38', NULL),
(125, 'User Logged Out: Deep | dyoptest@yopmail.com', 35, 1, 0, '2019-02-18 09:16:33', NULL),
(126, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-18 09:57:51', NULL),
(127, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 00:33:45', NULL),
(128, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-19 00:37:41', NULL),
(129, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 00:59:33', NULL),
(130, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 01:03:13', NULL),
(131, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 01:04:13', NULL),
(132, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 01:05:34', NULL),
(133, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 01:09:40', NULL),
(134, 'User Verified: Deep | admintest@yopmail.com', 40, 1, 0, '2019-02-19 01:16:35', NULL),
(135, 'User Logged In: Deep | dgupta@yopmail.com', 27, 1, 0, '2019-02-19 01:50:00', NULL),
(136, 'User Logged Out: Deep | dgupta@yopmail.com', 27, 1, 0, '2019-02-19 02:01:12', NULL),
(137, 'User Logged In: Deep | dyoptest@yopmail.com', 35, 1, 0, '2019-02-19 02:02:16', NULL),
(138, 'User Logged Out: Deep | dyoptest@yopmail.com', 35, 1, 0, '2019-02-19 02:02:30', NULL),
(139, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-19 02:02:59', NULL),
(140, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-19 02:05:04', NULL),
(141, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-19 02:05:13', NULL),
(142, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-20 01:07:25', NULL),
(143, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-20 03:31:41', NULL),
(144, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-20 23:16:15', NULL),
(145, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-21 01:06:35', NULL),
(146, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-21 01:58:36', NULL),
(147, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-21 03:04:42', NULL),
(148, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-21 04:37:07', NULL),
(149, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-21 07:07:49', NULL),
(150, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-21 23:26:06', NULL),
(151, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-21 23:43:24', NULL),
(152, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-22 09:00:40', NULL),
(153, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-22 09:09:59', NULL),
(154, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-22 23:11:28', NULL),
(155, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-23 00:09:05', NULL),
(156, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-23 00:17:29', NULL),
(157, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-23 00:27:19', NULL),
(158, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-23 01:12:45', NULL),
(159, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-23 05:07:57', NULL),
(160, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-25 01:25:36', NULL),
(161, 'User Logged In: Deep | dgupta@yopmail.com', 27, 1, 0, '2019-02-25 01:27:33', NULL),
(162, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-25 03:58:21', NULL),
(163, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-25 04:29:52', NULL),
(164, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-25 04:53:48', NULL),
(165, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-25 05:29:14', NULL),
(166, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-25 23:18:51', NULL),
(167, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-25 23:28:07', NULL),
(168, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-25 23:28:07', NULL),
(169, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-25 23:28:19', NULL),
(170, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-26 03:04:05', NULL),
(171, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-26 03:04:29', NULL),
(172, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-26 03:04:48', NULL),
(173, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-26 03:42:48', NULL),
(174, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-26 04:15:09', NULL),
(175, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-26 05:30:37', NULL),
(176, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-26 05:56:21', NULL),
(177, 'User Verified: Harsh | harsh.dangara@dotsquares.com', 44, 1, 0, '2019-02-26 06:26:49', NULL),
(178, 'User Verified: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 06:35:07', NULL),
(179, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 06:35:27', NULL),
(180, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-26 06:55:18', NULL),
(181, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:36:44', NULL),
(182, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-26 23:38:47', NULL),
(183, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:56:30', NULL),
(184, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:56:49', NULL),
(185, 'User Deactivated: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:58:38', NULL),
(186, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:58:49', NULL),
(187, 'User Reactivated: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:59:13', NULL),
(188, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-26 23:59:22', NULL),
(189, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 03:59:47', NULL),
(190, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 04:00:18', NULL),
(191, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 04:15:51', NULL),
(192, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 04:44:07', NULL),
(193, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 04:44:23', NULL),
(194, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 05:17:47', NULL),
(195, 'User Verified: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 05:20:12', NULL),
(196, 'User Logged In: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 05:20:38', NULL),
(197, 'User Logged Out: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 05:22:22', NULL),
(198, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-27 05:59:22', NULL),
(199, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-02-27 06:06:21', NULL),
(200, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 45, 1, 0, '2019-02-27 06:53:28', NULL),
(201, 'User Logged In: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 07:00:00', NULL),
(202, 'User Logged In: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 07:03:30', NULL),
(203, 'User Logged Out: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 07:50:14', NULL),
(204, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-27 07:51:34', NULL),
(205, 'User Logged In: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-27 07:53:12', NULL),
(206, 'User Verified: THOMAS | thomasgalbraith14@gmail.com', 47, 1, 0, '2019-02-27 11:10:26', NULL),
(207, 'User Logged In: THOMAS | thomasgalbraith14@gmail.com', 47, 1, 0, '2019-02-27 11:10:37', NULL),
(208, 'User Logged In: THOMAS | thomasgalbraith14@gmail.com', 47, 1, 0, '2019-02-27 11:13:33', NULL),
(209, 'User Verified: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-02-27 11:54:00', NULL),
(210, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-02-27 11:54:40', NULL),
(211, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-27 23:20:25', NULL),
(212, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-27 23:54:49', NULL),
(213, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-28 03:45:27', NULL),
(214, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-02-28 03:46:11', NULL),
(215, 'User Logged In: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-28 08:44:22', NULL),
(216, 'User Logged Out: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-02-28 08:45:39', NULL),
(217, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-02-28 12:26:25', NULL),
(218, 'User Logged In: Herry | harsh123@yopmail.com', 46, 1, 0, '2019-03-01 03:13:17', NULL),
(219, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-01 05:15:52', NULL),
(220, 'User Verified: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-01 06:31:56', NULL),
(221, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-01 06:32:24', NULL),
(222, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-01 15:11:20', NULL),
(223, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-02 00:38:07', NULL),
(224, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-02 00:39:41', NULL),
(225, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-02 00:44:39', NULL),
(226, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-02 01:11:49', NULL),
(227, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-02 01:12:30', NULL),
(228, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-02 10:32:24', NULL),
(229, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-04 00:07:17', NULL),
(230, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-04 00:07:22', NULL),
(231, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-04 00:07:45', NULL),
(232, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 01:03:24', NULL),
(233, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 01:07:30', NULL),
(234, 'User Verified: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 01:08:42', NULL),
(235, 'User Logged In: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 01:08:58', NULL),
(236, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 01:21:20', NULL),
(237, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 03:27:19', NULL),
(238, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 03:27:32', NULL),
(239, 'User Logged Out: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 03:27:56', NULL),
(240, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 04:00:46', NULL),
(241, 'User Logged In: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 04:01:08', NULL),
(242, 'User Logged In: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 04:09:26', NULL),
(243, 'User Logged Out: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 04:09:36', NULL),
(244, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 04:09:57', NULL),
(245, 'User Logged Out: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 04:45:26', NULL),
(246, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-04 05:24:55', NULL),
(247, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 05:48:43', NULL),
(248, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 06:49:21', NULL),
(249, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 07:50:41', NULL),
(250, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-04 07:53:22', NULL),
(251, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 07:55:28', NULL),
(252, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 08:23:13', NULL),
(253, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-04 08:33:18', NULL),
(254, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-04 08:34:36', NULL),
(255, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-04 08:35:34', NULL),
(256, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-04 08:45:42', NULL),
(257, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-04 09:50:24', NULL),
(258, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-04 10:28:01', NULL),
(259, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-04 10:29:03', NULL),
(260, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-04 13:42:15', NULL),
(261, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-04 23:50:49', NULL),
(262, 'User Logged In: Ricky | ricky123@yopmail.com', 50, 1, 0, '2019-03-04 23:51:04', NULL),
(263, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-04 23:51:52', NULL),
(264, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-05 00:17:16', NULL),
(265, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-05 00:18:34', NULL),
(266, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-05 02:01:46', NULL),
(267, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-05 02:06:36', NULL),
(268, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-05 03:05:29', NULL),
(269, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-05 03:07:44', NULL),
(270, 'User Verified: Richard | nyco@yopmail.com', 51, 1, 0, '2019-03-05 03:21:21', NULL),
(271, 'User Logged In: Richard | nyco@yopmail.com', 51, 1, 0, '2019-03-05 03:21:31', NULL),
(272, 'User Logged In: Richard | nyco@yopmail.com', 51, 1, 0, '2019-03-05 03:21:51', NULL),
(273, 'User Logged In: Richard | nyco@yopmail.com', 51, 1, 0, '2019-03-05 03:22:24', NULL),
(274, 'User Logged In: Richard | nyco@yopmail.com', 51, 1, 0, '2019-03-05 03:22:24', NULL),
(275, 'User Verified: Hars | harsh321@yopmail.com', 52, 1, 0, '2019-03-05 03:26:06', NULL),
(276, 'User Logged In: Hars | harsh321@yopmail.com', 52, 1, 0, '2019-03-05 03:26:12', NULL),
(277, 'User Logged In: Richard | nyco@yopmail.com', 51, 1, 0, '2019-03-05 03:27:12', NULL),
(278, 'User Verified: Harsh | rohan@yopmail.com', 53, 1, 0, '2019-03-05 03:31:40', NULL),
(279, 'User Logged In: Harsh | rohan@yopmail.com', 53, 1, 0, '2019-03-05 03:31:49', NULL),
(280, 'User Verified: Rohan | rohan123@yopmail.com', 54, 1, 0, '2019-03-05 03:34:54', NULL),
(281, 'User Logged Out: Harsh | rohan@yopmail.com', 53, 1, 0, '2019-03-05 03:35:35', NULL),
(282, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-05 03:35:54', NULL),
(283, 'User Verified: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 03:39:03', NULL),
(284, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 03:39:18', NULL),
(285, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 03:41:57', NULL),
(286, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-03-05 03:46:38', NULL),
(287, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-05 04:07:02', NULL),
(288, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 04:07:31', NULL),
(289, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-05 04:08:51', NULL),
(290, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 04:19:33', NULL),
(291, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-05 20:56:09', NULL),
(292, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-05 21:05:19', NULL),
(293, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-05 21:07:44', NULL),
(294, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-03-05 21:22:17', NULL),
(295, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 21:23:08', NULL),
(296, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-05 21:23:11', NULL),
(297, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-05 21:23:19', NULL),
(298, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 21:27:58', NULL),
(299, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 21:29:32', NULL),
(300, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-05 21:29:50', NULL),
(301, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-05 21:55:07', NULL),
(302, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-06 03:20:20', NULL),
(303, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:11:16', NULL),
(304, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:15:41', NULL),
(305, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:17:28', NULL),
(306, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:19:37', NULL),
(307, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:21:27', NULL),
(308, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-06 12:31:50', NULL),
(309, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:47:31', NULL),
(310, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:53:01', NULL),
(311, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 12:53:28', NULL),
(312, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 13:01:52', NULL),
(313, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 13:13:34', NULL),
(314, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-06 13:20:47', NULL),
(315, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-06 16:31:51', NULL),
(316, 'User Verified: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:35:26', NULL),
(317, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:35:42', NULL),
(318, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:42:16', NULL),
(319, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:44:05', NULL),
(320, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:44:10', NULL),
(321, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:44:35', NULL),
(322, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-06 16:54:48', NULL),
(323, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-06 16:59:19', NULL),
(324, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-06 23:29:11', NULL),
(325, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-07 19:35:59', NULL),
(326, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-07 19:37:03', NULL),
(327, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-08 11:56:22', NULL),
(328, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-08 12:07:30', NULL),
(329, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-08 16:10:58', NULL),
(330, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-08 16:13:30', NULL),
(331, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-11 13:02:14', NULL),
(332, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-12 11:47:43', NULL),
(333, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-12 11:49:24', NULL),
(334, 'User Deactivated: THOMAS | thomasgalbraith14@gmail.com', 47, 1, 0, '2019-03-13 03:53:20', NULL),
(335, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-13 16:53:12', NULL),
(336, 'User Verified: Rakesh | rakesh123@yopmail.com', 57, 1, 0, '2019-03-13 16:57:20', NULL),
(337, 'User Logged In: Rakesh | rakesh123@yopmail.com', 57, 1, 0, '2019-03-13 16:57:53', NULL),
(338, 'User Logged Out: Rakesh | rakesh123@yopmail.com', 57, 1, 0, '2019-03-13 17:08:44', NULL),
(339, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-13 18:02:32', NULL),
(340, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-13 19:55:52', NULL),
(341, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-13 21:58:11', NULL),
(342, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-13 22:24:31', NULL),
(343, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-13 22:25:10', NULL),
(344, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-14 01:59:16', NULL),
(345, 'User Verified: Ttttttt | thomasgalbraith816@gmail.com', 59, 1, 0, '2019-03-14 02:32:33', NULL),
(346, 'User Logged In: Ttttttt | thomasgalbraith816@gmail.com', 59, 1, 0, '2019-03-14 02:32:39', NULL),
(347, 'User Logged Out: Ttttttt | thomasgalbraith816@gmail.com', 59, 1, 0, '2019-03-14 02:32:39', NULL),
(348, 'User Logged In: Ttttttt | thomasgalbraith816@gmail.com', 59, 1, 0, '2019-03-14 02:32:44', NULL),
(349, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-14 19:50:28', NULL),
(350, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-14 20:33:46', NULL),
(351, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-14 20:34:02', NULL),
(352, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-16 21:20:58', NULL),
(353, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-17 04:35:42', NULL),
(354, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-19 01:19:08', NULL),
(355, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-19 03:22:24', NULL),
(356, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-19 13:55:19', NULL),
(357, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-19 14:11:17', NULL),
(358, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-19 15:57:25', NULL),
(359, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 56, 1, 0, '2019-03-19 18:00:34', NULL),
(360, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-19 19:45:05', NULL),
(361, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-19 20:30:02', NULL),
(362, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-19 20:48:20', NULL),
(363, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-19 20:58:46', NULL),
(364, 'User Verified: Dgupta | dgupta123@yopmail.com', 62, 1, 0, '2019-03-19 21:06:25', NULL),
(365, 'User Logged In: Dgupta | dgupta123@yopmail.com', 62, 1, 0, '2019-03-19 21:06:40', NULL),
(366, 'User Logged Out: Dgupta | dgupta123@yopmail.com', 62, 1, 0, '2019-03-19 21:11:54', NULL),
(367, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-19 21:12:12', NULL),
(368, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-19 21:12:29', NULL),
(369, 'User Verified: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-19 21:13:50', NULL),
(370, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-19 21:15:12', NULL),
(371, 'User Logged In: Dgupta | dgupta123@yopmail.com', 62, 1, 0, '2019-03-19 21:16:04', NULL),
(372, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-19 21:21:18', NULL),
(373, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-19 21:26:16', NULL),
(374, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 03:18:27', NULL),
(375, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-20 03:20:30', NULL),
(376, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 11:40:00', NULL),
(377, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-20 11:47:39', NULL),
(378, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 11:50:14', NULL),
(379, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 11:50:46', NULL),
(380, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 11:51:09', NULL),
(381, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 11:51:13', NULL),
(382, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 11:52:02', NULL),
(383, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 11:57:44', NULL),
(384, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 12:07:46', NULL),
(385, 'User Verified: Apurba | apurba.saha@dotsquares.com', 63, 1, 0, '2019-03-20 12:15:32', NULL),
(386, 'User Verified: Testing | dstestingu9@gmail.com', 64, 1, 0, '2019-03-20 12:26:21', NULL),
(387, 'User Logged In: Testing | dstestingu9@gmail.com', 64, 1, 0, '2019-03-20 12:26:57', NULL),
(388, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-20 13:53:54', NULL),
(389, 'User Logged In: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-20 13:54:13', NULL),
(390, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 14:07:44', NULL),
(391, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 14:07:44', NULL),
(392, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 14:08:06', NULL),
(393, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 14:29:59', NULL),
(394, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 14:57:13', NULL),
(395, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 15:02:25', NULL),
(396, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 15:02:25', NULL),
(397, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 15:02:40', NULL),
(398, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 16:49:48', NULL),
(399, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 17:05:56', NULL),
(400, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 17:22:04', NULL),
(401, 'User Logged Out: Testing | dstestingu9@gmail.com', 64, 1, 0, '2019-03-20 17:25:42', NULL),
(402, 'User Logged In: Testing | dstestingu9@gmail.com', 64, 1, 0, '2019-03-20 17:26:15', NULL),
(403, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 17:54:09', NULL),
(404, 'User Logged Out: Harsh | harsh.dangara@dotsquares.com', 61, 1, 0, '2019-03-20 18:03:59', NULL),
(405, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 18:04:13', NULL),
(406, 'User Logged Out: Testing | dstestingu9@gmail.com', 64, 1, 0, '2019-03-20 18:04:19', NULL),
(407, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 18:04:36', NULL),
(408, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 18:07:34', NULL),
(409, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 18:11:36', NULL),
(410, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 18:12:11', NULL),
(411, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 18:12:40', NULL),
(412, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 18:13:11', NULL),
(413, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 18:22:20', NULL),
(414, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 20:06:21', NULL),
(415, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-20 20:11:20', NULL),
(416, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-20 20:11:40', NULL),
(417, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-20 20:13:07', NULL),
(418, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 21:02:21', NULL),
(419, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-20 21:09:05', NULL),
(420, 'User Logged In: Arnav | arnav.jain@dotsquares.com', 66, 1, 0, '2019-03-20 21:17:08', NULL),
(421, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-20 21:24:48', NULL),
(422, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-21 00:48:59', NULL),
(423, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-21 01:06:37', NULL),
(424, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-21 01:54:50', NULL),
(425, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-21 03:10:25', NULL),
(426, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-21 23:10:13', NULL),
(427, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-22 11:22:28', NULL),
(428, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-22 13:29:17', NULL),
(429, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-22 16:58:39', NULL),
(430, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-22 17:17:21', NULL),
(431, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-22 17:17:42', NULL),
(432, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-22 17:17:50', NULL),
(433, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-22 17:19:19', NULL),
(434, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-22 17:37:27', NULL),
(435, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-23 23:29:58', NULL),
(436, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-23 23:37:21', NULL),
(437, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-23 23:39:10', NULL),
(438, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-23 23:39:23', NULL),
(439, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-23 23:39:27', NULL),
(440, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-23 23:41:19', NULL),
(441, 'User Logged Out: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-24 00:09:14', NULL),
(442, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-24 00:09:21', NULL),
(443, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-29 19:26:22', NULL),
(444, 'User Logged In: Rachita | rachita@yopmail.com', 55, 1, 0, '2019-03-29 19:27:54', NULL),
(445, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-29 19:42:36', NULL),
(446, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-30 02:59:49', NULL),
(447, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-30 12:11:10', NULL),
(448, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-03-30 12:11:51', NULL),
(449, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-30 22:53:11', NULL),
(450, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-30 22:54:44', NULL),
(451, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-31 00:30:15', NULL),
(452, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-31 00:54:45', NULL),
(453, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-31 19:47:06', NULL),
(454, 'User Verified: paul | 10theden@gmail.com', 67, 1, 0, '2019-03-31 19:51:26', NULL),
(455, 'User Logged In: paul | 10theden@gmail.com', 67, 1, 0, '2019-03-31 19:53:41', NULL),
(456, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-03-31 23:36:12', NULL),
(457, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-03-31 23:38:15', NULL),
(458, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-01 00:49:37', NULL),
(459, 'User Verified: Mary | ettaluffe-6440@yopmail.com', 69, 1, 0, '2019-04-01 00:53:07', NULL),
(460, 'User Verified: Hannah | emmajonne-0669@yopmail.com', 70, 1, 0, '2019-04-01 00:56:10', NULL),
(461, 'User Verified: Harry | qippawaxomm-4692@yopmail.com', 71, 1, 0, '2019-04-01 00:58:35', NULL),
(462, 'User Verified: Morven | ciqecannajo-3316@yopmail.com', 72, 1, 0, '2019-04-01 01:00:08', NULL),
(463, 'User Verified: Matthew | pehifagottu-6298@yopmail.com', 73, 1, 0, '2019-04-01 01:01:57', NULL),
(464, 'User Verified: Harry | epyddattak-9547@yopmail.com', 74, 1, 0, '2019-04-01 01:03:53', NULL),
(465, 'User Verified: Eva | zeneqonnyxu-2002@yopmail.com', 75, 1, 0, '2019-04-01 01:05:53', NULL),
(466, 'User Verified: Anna | kumedewi-9828@yopmail.com', 76, 1, 0, '2019-04-01 01:07:37', NULL),
(467, 'User Verified: Emily | messoddazatte-8860@yopmail.com', 77, 1, 0, '2019-04-01 01:09:13', NULL),
(468, 'User Verified: Richard | iserunaty-2844@yopmail.com', 78, 1, 0, '2019-04-01 01:10:51', NULL),
(469, 'User Verified: Ramon | adderucije-2695@yopmail.com', 79, 1, 0, '2019-04-01 01:12:50', NULL),
(470, 'User Verified: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-04-01 01:14:59', NULL),
(471, 'User Verified: Louise | uvojagaku-9832@yopmail.com', 81, 1, 0, '2019-04-01 01:18:09', NULL),
(472, 'User Verified: Andrew | evavallu-1815@yopmail.com', 82, 1, 0, '2019-04-01 01:20:25', NULL),
(473, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 01:20:48', NULL),
(474, 'User Verified: Ellee | zaqubusik-3562@yopmail.com', 83, 1, 0, '2019-04-01 01:29:05', NULL),
(475, 'User Verified: Graham | izovotah-7850@yopmail.com', 84, 1, 0, '2019-04-01 01:31:48', NULL),
(476, 'User Verified: Olivia | poguramati-3070@yopmail.com', 85, 1, 0, '2019-04-01 01:33:28', NULL),
(477, 'User Verified: Pete | arujedaffa-9330@yopmail.com', 86, 1, 0, '2019-04-01 01:35:12', NULL),
(478, 'User Verified: John | jettaxussidd-9205@yopmail.com', 87, 1, 0, '2019-04-01 01:37:02', NULL),
(479, 'User Verified: Brodie | vagefferrassu-8444@yopmail.com', 88, 1, 0, '2019-04-01 01:38:37', NULL),
(480, 'User Verified: Jack | issekarroppo-4947@yopmail.com', 89, 1, 0, '2019-04-01 01:40:07', NULL),
(481, 'User Verified: Max | nyppodakene-6782@yopmail.com', 90, 1, 0, '2019-04-01 01:41:47', NULL),
(482, 'User Verified: Phil | taffodawony-8429@yopmail.com', 91, 1, 0, '2019-04-01 01:43:24', NULL),
(483, 'User Verified: Holly | ilakeke-2352@yopmail.com', 92, 1, 0, '2019-04-01 01:44:50', NULL),
(484, 'User Verified: Marry | jugixaveny-5987@yopmail.com', 93, 1, 0, '2019-04-01 01:46:33', NULL),
(485, 'User Verified: Mia | kalezeno-9551@yopmail.com', 94, 1, 0, '2019-04-01 01:48:07', NULL),
(486, 'User Verified: Tracey | faluwave-0828@yopmail.com', 95, 1, 0, '2019-04-01 01:51:11', NULL),
(487, 'User Verified: Milly | ennepirryxe-6104@yopmail.com', 97, 1, 0, '2019-04-01 02:14:39', NULL),
(488, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-01 02:14:59', NULL),
(489, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-01 02:19:39', NULL),
(490, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-04-01 02:19:49', NULL),
(491, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 02:24:42', NULL),
(492, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-04-01 02:24:48', NULL),
(493, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-04-01 02:24:59', NULL),
(494, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-04-01 02:25:07', NULL),
(495, 'User Logged In: Hannah | emmajonne-0669@yopmail.com', 70, 1, 0, '2019-04-01 02:25:14', NULL),
(496, 'User Logged Out: Hannah | emmajonne-0669@yopmail.com', 70, 1, 0, '2019-04-01 02:28:25', NULL),
(497, 'User Logged In: Mary | ettaluffe-6440@yopmail.com', 69, 1, 0, '2019-04-01 02:29:20', NULL),
(498, 'User Logged Out: Mary | ettaluffe-6440@yopmail.com', 69, 1, 0, '2019-04-01 02:32:57', NULL),
(499, 'User Logged In: Harry | qippawaxomm-4692@yopmail.com', 71, 1, 0, '2019-04-01 02:33:08', NULL),
(500, 'User Logged Out: Harry | qippawaxomm-4692@yopmail.com', 71, 1, 0, '2019-04-01 02:35:54', NULL),
(501, 'User Logged In: Morven | ciqecannajo-3316@yopmail.com', 72, 1, 0, '2019-04-01 02:36:03', NULL),
(502, 'User Logged Out: Morven | ciqecannajo-3316@yopmail.com', 72, 1, 0, '2019-04-01 02:37:22', NULL),
(503, 'User Logged In: Morven | ciqecannajo-3316@yopmail.com', 72, 1, 0, '2019-04-01 02:45:17', NULL),
(504, 'User Logged Out: Morven | ciqecannajo-3316@yopmail.com', 72, 1, 0, '2019-04-01 02:51:32', NULL),
(505, 'User Logged In: Matthew | pehifagottu-6298@yopmail.com', 73, 1, 0, '2019-04-01 02:51:44', NULL),
(506, 'User Logged Out: Matthew | pehifagottu-6298@yopmail.com', 73, 1, 0, '2019-04-01 03:09:01', NULL),
(507, 'User Logged In: Harry | epyddattak-9547@yopmail.com', 74, 1, 0, '2019-04-01 03:09:29', NULL),
(508, 'User Logged Out: Harry | epyddattak-9547@yopmail.com', 74, 1, 0, '2019-04-01 03:15:51', NULL),
(509, 'User Logged In: Eva | zeneqonnyxu-2002@yopmail.com', 75, 1, 0, '2019-04-01 03:16:11', NULL),
(510, 'User Logged Out: Eva | zeneqonnyxu-2002@yopmail.com', 75, 1, 0, '2019-04-01 03:34:59', NULL),
(511, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 03:35:14', NULL),
(512, 'User Logged In: Anna | kumedewi-9828@yopmail.com', 76, 1, 0, '2019-04-01 03:37:57', NULL),
(513, 'User Logged Out: Anna | kumedewi-9828@yopmail.com', 76, 1, 0, '2019-04-01 03:44:20', NULL),
(514, 'User Logged In: Emily | messoddazatte-8860@yopmail.com', 77, 1, 0, '2019-04-01 03:44:46', NULL),
(515, 'User Logged Out: Emily | messoddazatte-8860@yopmail.com', 77, 1, 0, '2019-04-01 03:50:16', NULL),
(516, 'User Logged In: Richard | iserunaty-2844@yopmail.com', 78, 1, 0, '2019-04-01 03:50:51', NULL),
(517, 'User Logged Out: Richard | iserunaty-2844@yopmail.com', 78, 1, 0, '2019-04-01 04:01:59', NULL),
(518, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 04:02:10', NULL),
(519, 'User Logged In: Ramon | adderucije-2695@yopmail.com', 79, 1, 0, '2019-04-01 04:06:10', NULL),
(520, 'User Logged Out: Ramon | adderucije-2695@yopmail.com', 79, 1, 0, '2019-04-01 04:11:57', NULL),
(521, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 04:12:21', NULL),
(522, 'User Logged In: Louise | uvojagaku-9832@yopmail.com', 81, 1, 0, '2019-04-01 04:13:18', NULL),
(523, 'User Logged Out: Louise | uvojagaku-9832@yopmail.com', 81, 1, 0, '2019-04-01 04:17:22', NULL),
(524, 'User Logged In: Andrew | evavallu-1815@yopmail.com', 82, 1, 0, '2019-04-01 04:17:56', NULL),
(525, 'User Logged Out: Andrew | evavallu-1815@yopmail.com', 82, 1, 0, '2019-04-01 04:22:34', NULL),
(526, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 04:22:40', NULL),
(527, 'User Logged In: Ellee | zaqubusik-3562@yopmail.com', 83, 1, 0, '2019-04-01 04:23:49', NULL),
(528, 'User Logged Out: Ellee | zaqubusik-3562@yopmail.com', 83, 1, 0, '2019-04-01 04:27:09', NULL),
(529, 'User Logged In: Graham | izovotah-7850@yopmail.com', 84, 1, 0, '2019-04-01 04:27:29', NULL),
(530, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 04:30:10', NULL);
INSERT INTO `notifications` (`id`, `message`, `user_id`, `type`, `is_read`, `created_at`, `updated_at`) VALUES
(531, 'User Logged Out: Graham | izovotah-7850@yopmail.com', 84, 1, 0, '2019-04-01 04:31:17', NULL),
(532, 'User Logged In: Olivia | poguramati-3070@yopmail.com', 85, 1, 0, '2019-04-01 04:31:29', NULL),
(533, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 04:36:15', NULL),
(534, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 11:31:10', NULL),
(535, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 11:35:47', NULL),
(536, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 16:32:57', NULL),
(537, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-01 16:33:20', NULL),
(538, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-01 16:37:52', NULL),
(539, 'User Logged In: Pete | arujedaffa-9330@yopmail.com', 86, 1, 0, '2019-04-01 16:38:01', NULL),
(540, 'User Logged Out: Pete | arujedaffa-9330@yopmail.com', 86, 1, 0, '2019-04-01 16:42:06', NULL),
(541, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 16:42:20', NULL),
(542, 'User Logged In: John | jettaxussidd-9205@yopmail.com', 87, 1, 0, '2019-04-01 16:43:20', NULL),
(543, 'User Logged Out: John | jettaxussidd-9205@yopmail.com', 87, 1, 0, '2019-04-01 16:49:12', NULL),
(544, 'User Logged In: Brodie | vagefferrassu-8444@yopmail.com', 88, 1, 0, '2019-04-01 16:49:21', NULL),
(545, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 16:53:01', NULL),
(546, 'User Logged Out: Brodie | vagefferrassu-8444@yopmail.com', 88, 1, 0, '2019-04-01 16:53:07', NULL),
(547, 'User Logged In: Pete | arujedaffa-9330@yopmail.com', 86, 1, 0, '2019-04-01 16:53:23', NULL),
(548, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 16:54:31', NULL),
(549, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 18:12:47', NULL),
(550, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 18:17:10', NULL),
(551, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-01 22:16:48', NULL),
(552, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-02 01:30:48', NULL),
(553, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-02 03:44:50', NULL),
(554, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-02 15:25:17', NULL),
(555, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-02 16:03:43', NULL),
(556, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-02 21:39:03', NULL),
(557, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-02 23:49:29', NULL),
(558, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-03 15:24:43', NULL),
(559, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-03 18:48:56', NULL),
(560, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-04 17:18:58', NULL),
(561, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-04 20:00:16', NULL),
(562, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-05 13:30:44', NULL),
(563, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-05 19:35:20', NULL),
(564, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-06 19:54:01', NULL),
(565, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-07 03:38:23', NULL),
(566, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-07 22:26:21', NULL),
(567, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-08 19:25:55', NULL),
(568, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-08 19:26:45', NULL),
(569, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-09 12:08:59', NULL),
(570, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-09 12:15:25', NULL),
(571, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-09 15:28:56', NULL),
(572, 'User Logged In: Thomas | meetseager@gmail.com', 99, 1, 0, '2019-04-09 17:45:26', NULL),
(573, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-10 06:05:50', NULL),
(574, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-11 01:00:39', NULL),
(575, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-13 07:57:05', NULL),
(576, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-14 05:13:37', NULL),
(577, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-15 17:20:13', NULL),
(578, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-16 20:46:13', NULL),
(579, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-17 04:19:16', NULL),
(580, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-17 15:29:58', NULL),
(581, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-17 17:02:12', NULL),
(582, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-17 17:22:16', NULL),
(583, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-17 17:24:59', NULL),
(584, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-04-17 23:35:10', NULL),
(585, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-19 05:32:44', NULL),
(586, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-20 01:23:37', NULL),
(587, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-21 03:59:27', NULL),
(588, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-25 01:27:46', NULL),
(589, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-25 17:07:27', NULL),
(590, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-26 17:13:45', NULL),
(591, 'User Verified: Logan | commanderlogang@gmail.com', 101, 1, 0, '2019-04-30 08:12:32', NULL),
(592, 'User Logged In: Logan | commanderlogang@gmail.com', 101, 1, 0, '2019-04-30 08:12:42', NULL),
(593, 'User Logged Out: Logan | commanderlogang@gmail.com', 101, 1, 0, '2019-04-30 08:20:48', NULL),
(594, 'User Logged In: Logan | commanderlogang@gmail.com', 101, 1, 0, '2019-04-30 08:21:27', NULL),
(595, 'User Logged In: Logan | commanderlogang@gmail.com', 101, 1, 0, '2019-04-30 08:22:36', NULL),
(596, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-30 16:49:37', NULL),
(597, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-04-30 20:12:05', NULL),
(598, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-01 01:38:07', NULL),
(599, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-01 14:44:11', NULL),
(600, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-01 16:58:54', NULL),
(601, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-01 22:02:34', NULL),
(602, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-02 04:07:42', NULL),
(603, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-03 01:13:53', NULL),
(604, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-04 00:20:15', NULL),
(605, 'User Logged Out: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-04 00:53:04', NULL),
(606, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-04 04:15:32', NULL),
(607, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-04 04:17:43', NULL),
(608, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-05 04:43:47', NULL),
(609, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-07 18:25:06', NULL),
(610, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-07 22:14:41', NULL),
(611, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-08 23:24:46', NULL),
(612, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-09 16:38:32', NULL),
(613, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-09 16:39:45', NULL),
(614, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-09 17:33:08', NULL),
(615, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-10 00:12:31', NULL),
(616, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 00:13:04', NULL),
(617, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 02:38:39', NULL),
(618, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-10 02:40:19', NULL),
(619, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 02:54:27', NULL),
(620, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 02:56:13', NULL),
(621, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 02:56:24', NULL),
(622, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 02:56:55', NULL),
(623, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 02:57:02', NULL),
(624, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 03:02:27', NULL),
(625, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 03:02:36', NULL),
(626, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-10 03:21:36', NULL),
(627, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 04:19:25', NULL),
(628, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 04:19:34', NULL),
(629, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 04:19:44', NULL),
(630, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 04:19:50', NULL),
(631, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 04:20:52', NULL),
(632, 'User Logged In: Mary | ettaluffe-6440@yopmail.com', 69, 1, 0, '2019-05-10 04:21:35', NULL),
(633, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-10 17:45:00', NULL),
(634, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 17:57:41', NULL),
(635, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-10 17:59:16', NULL),
(636, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-10 17:59:22', NULL),
(637, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-10 20:04:03', NULL),
(638, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-10 20:49:24', NULL),
(639, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-10 23:37:40', NULL),
(640, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-11 00:56:07', NULL),
(641, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-11 00:56:07', NULL),
(642, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-11 00:56:16', NULL),
(643, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-11 01:00:11', NULL),
(644, 'User Logged In: Harry | epyddattak-9547@yopmail.com', 74, 1, 0, '2019-05-11 01:00:17', NULL),
(645, 'User Logged Out: Harry | epyddattak-9547@yopmail.com', 74, 1, 0, '2019-05-11 01:01:28', NULL),
(646, 'User Logged In: Hannah | emmajonne-0669@yopmail.com', 70, 1, 0, '2019-05-11 01:01:42', NULL),
(647, 'User Logged Out: Hannah | emmajonne-0669@yopmail.com', 70, 1, 0, '2019-05-11 01:14:23', NULL),
(648, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-11 01:14:31', NULL),
(649, 'User Logged Out: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-11 02:47:13', NULL),
(650, 'User Logged In: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-11 02:47:19', NULL),
(651, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-11 03:06:30', NULL),
(652, 'User Logged Out: Mia | ofevennup-6234@yopmail.com', 80, 1, 0, '2019-05-11 04:35:19', NULL),
(653, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-12 01:03:38', NULL),
(654, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-12 01:25:23', NULL),
(655, 'User Logged In: Thomas | thomas.eager.m@gmail.com', 48, 1, 0, '2019-05-13 04:00:26', NULL),
(656, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-13 04:10:14', NULL),
(657, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-13 12:42:38', NULL),
(658, 'User Logged In: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-05-13 19:05:20', NULL),
(659, 'User Logged Out: Admin | eager-admin@yopmail.com', 1, 1, 0, '2019-05-13 20:36:04', NULL),
(660, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 12:28:45', NULL),
(661, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 12:46:02', NULL),
(662, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 14:18:40', NULL),
(663, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-05-14 14:19:57', NULL),
(664, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 18:27:19', NULL),
(665, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 19:55:05', NULL),
(666, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 19:58:17', NULL),
(667, 'User Logged In: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-05-14 20:03:13', NULL),
(668, 'User Logged Out: Jack | harsh.dangara@dotsquares.com', 49, 1, 0, '2019-05-14 20:05:20', NULL),
(669, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-14 20:05:43', NULL),
(670, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-15 13:35:00', NULL),
(671, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-15 13:43:30', NULL),
(672, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-15 21:18:46', NULL),
(673, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-15 21:21:29', NULL),
(674, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-16 02:08:51', NULL),
(675, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-18 05:37:58', NULL),
(676, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-18 15:03:12', NULL),
(677, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-20 06:20:54', NULL),
(678, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-22 03:02:14', NULL),
(679, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-22 14:49:19', NULL),
(680, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-22 15:19:01', NULL),
(681, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-22 19:53:08', NULL),
(682, 'User Logged In: Admin | admin@eagermeets.com', 1, 1, 0, '2019-05-23 02:07:55', NULL),
(683, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-05-24 04:10:15', NULL),
(684, 'User Logged Out: Admin | admin@yopmail.com', 1, 1, 0, '2019-05-24 05:17:21', NULL),
(685, 'User Logged In: Admin | admin@yopmail.com', 1, 1, 0, '2019-05-24 05:18:01', NULL),
(686, 'User Logged Out: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-24 05:18:35', NULL),
(687, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-24 05:18:45', NULL),
(688, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-24 09:34:02', NULL),
(689, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-27 04:16:46', NULL),
(690, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-27 04:26:05', NULL),
(691, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-27 08:11:08', NULL),
(692, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-28 00:16:54', NULL),
(693, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-28 04:24:19', NULL),
(694, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-28 04:25:56', NULL),
(695, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-28 04:25:57', NULL),
(696, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-28 04:26:10', NULL),
(697, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-28 04:26:16', NULL),
(698, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-28 04:26:28', NULL),
(699, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-05-28 04:26:35', NULL),
(700, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-28 04:29:56', NULL),
(701, 'User Verified: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:21:00', NULL),
(702, 'User Logged In: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:21:15', NULL),
(703, 'User Logged Out: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:57:15', NULL),
(704, 'User Logged In: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:57:33', NULL),
(705, 'User Logged Out: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:58:03', NULL),
(706, 'User Logged In: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:58:22', NULL),
(707, 'User Logged Out: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:58:37', NULL),
(708, 'User Logged In: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 05:58:57', NULL),
(709, 'User Logged Out: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 06:06:42', NULL),
(710, 'User Logged In: Testds | testds@yopmail.com', 24, 1, 0, '2019-05-28 06:06:58', NULL),
(711, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-28 06:18:30', NULL),
(712, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-29 01:00:36', NULL),
(713, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-29 04:31:34', NULL),
(714, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-29 07:31:10', NULL),
(715, 'User Logged Out: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-29 09:38:28', NULL),
(716, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-05-31 01:30:01', NULL),
(717, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-06-14 01:37:36', NULL),
(718, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-06-14 01:37:53', NULL),
(719, 'User Logged Out: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-06-14 01:38:11', NULL),
(720, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-06-14 02:29:08', NULL),
(721, 'User Verified: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 02:30:29', NULL),
(722, 'User Logged In: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 02:30:52', NULL),
(723, 'User Logged Out: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 02:31:04', NULL),
(724, 'User Logged In: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 02:35:01', NULL),
(725, 'User Logged Out: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 02:38:16', NULL),
(726, 'User Logged In: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 09:38:57', NULL),
(727, 'User Logged Out: fakotest | fakotest@yopmail.com', 28, 1, 0, '2019-06-14 09:39:01', NULL),
(728, 'User Verified: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-19 16:20:26', NULL),
(729, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-19 16:20:30', NULL),
(730, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-06-19 16:41:31', NULL),
(731, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:23:23', NULL),
(732, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:23:58', NULL),
(733, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:26:05', NULL),
(734, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:26:43', NULL),
(735, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:29:32', NULL),
(736, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:31:03', NULL),
(737, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-25 08:34:15', NULL),
(738, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-26 08:22:08', NULL),
(739, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-27 08:05:49', NULL),
(740, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-06-27 17:11:50', NULL),
(741, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-28 08:14:09', NULL),
(742, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-28 08:21:39', NULL),
(743, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-06-28 16:12:47', NULL),
(744, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-06-28 19:18:58', NULL),
(745, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-06-29 12:08:24', NULL),
(746, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-03 15:01:33', NULL),
(747, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-05 12:01:34', NULL),
(748, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-05 16:59:35', NULL),
(749, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-05 17:04:47', NULL),
(750, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-05 17:31:19', NULL),
(751, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-05 17:31:42', NULL),
(752, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-05 17:32:01', NULL),
(753, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-09 22:10:54', NULL),
(754, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-10 02:07:29', NULL),
(755, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-12 05:01:11', NULL),
(756, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-17 01:16:32', NULL),
(757, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-19 00:50:20', NULL),
(758, 'User Logged Out: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-19 04:14:54', NULL),
(759, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-22 05:07:01', NULL),
(760, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-22 05:08:18', NULL),
(761, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-22 05:08:40', NULL),
(762, 'User Verified: Dtest | dstest@yopmail.com', 51, 1, 0, '2019-07-23 04:24:11', NULL),
(763, 'User Logged In: Dtest | dstest@yopmail.com', 51, 1, 0, '2019-07-23 04:26:31', NULL),
(764, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-23 04:36:57', NULL),
(765, 'User Logged Out: Dtest | dstest@yopmail.com', 51, 1, 0, '2019-07-23 05:10:50', NULL),
(766, 'User Logged In: Dtest | dstest@yopmail.com', 51, 1, 0, '2019-07-23 05:11:34', NULL),
(767, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-07-23 05:26:42', NULL),
(768, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-23 06:12:00', NULL),
(769, 'User Verified: testnew | testnew@yopmail.com', 53, 1, 0, '2019-07-23 06:46:15', NULL),
(770, 'User Logged In: testnew | testnew@yopmail.com', 53, 1, 0, '2019-07-23 06:46:32', NULL),
(771, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-07-23 08:21:41', NULL),
(772, 'User Verified: Demo | demovendor@yopmail.com', 79, 1, 0, '2019-10-07 10:18:21', NULL),
(773, 'User Logged In: Demo | demovendor@yopmail.com', 79, 1, 0, '2019-10-07 10:18:39', NULL),
(774, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-10-07 11:53:19', NULL),
(775, 'User Logged Out: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-10-07 11:53:29', NULL),
(776, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-10-07 11:54:33', NULL),
(777, 'User Logged Out: Demoa | demovendor@yopmail.com', 79, 1, 0, '2019-10-07 11:54:43', NULL),
(778, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-07 11:55:33', NULL),
(779, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-07 11:56:50', NULL),
(780, 'User Logged In: Fufufuvbh | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 11:57:38', NULL),
(781, 'User Logged Out: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 12:53:54', NULL),
(782, 'User Logged In: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 12:54:20', NULL),
(783, 'User Logged Out: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 12:58:31', NULL),
(784, 'User Logged In: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 12:58:51', NULL),
(785, 'User Logged Out: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 12:59:30', NULL),
(786, 'User Logged In: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-07 12:59:37', NULL),
(787, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-10-22 16:01:24', NULL),
(788, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-22 16:02:26', NULL),
(789, 'User Logged In: Admin | fakoadmin@yopmail.com', 1, 1, 0, '2019-10-22 17:24:07', NULL),
(790, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-22 17:26:05', NULL),
(791, 'User Logged Out: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-22 17:27:03', NULL),
(792, 'User Logged In: Demo | fakotest@yopmail.com', 28, 1, 0, '2019-10-22 17:27:19', NULL),
(793, 'User Logged In: Admin | admin@gmail.com', 1, 1, 0, '2019-10-24 20:52:12', NULL),
(794, 'User Logged Out: Admin | admin@gmail.com', 1, 1, 0, '2019-10-24 21:03:41', NULL),
(795, 'User Logged In: Admin | admin@gmail.com', 1, 1, 0, '2019-10-24 21:04:08', NULL),
(796, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-10-24 21:04:42', NULL),
(797, 'User Logged Out: Admin | admin@gmail.com', 1, 1, 0, '2019-10-24 21:04:54', NULL),
(798, 'User Logged In: Admin | admin@gmail.com', 1, 1, 0, '2019-10-24 21:06:31', NULL),
(799, 'User Logged In: First | firstuser@yopmail.com', 23, 1, 0, '2019-10-24 21:09:24', NULL),
(800, 'User Logged Out: First | firstuser@yopmail.com', 23, 1, 0, '2019-10-24 21:32:52', NULL),
(801, 'User Logged In: Admin | admin@gmail.com', 1, 1, 0, '2019-10-24 21:33:07', NULL),
(802, 'User Deactivated: new | newcustuser@yopmail.com', 59, 1, 0, '2019-10-24 21:39:33', NULL),
(803, 'User Deactivated: Rdgg | zxxz@yopmail.com', 43, 1, 0, '2019-10-24 21:39:45', NULL),
(804, 'User Logged In: Admin | admin@gmail.com', 1, 1, 0, '2019-10-28 01:16:26', NULL),
(805, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-28 01:19:59', NULL),
(806, 'User Logged Out: Admin | admin@gmail.com', 1, 1, 0, '2019-10-28 01:21:35', NULL),
(807, 'User Logged In: Admin | admin@gmail.com', 1, 1, 0, '2019-10-28 01:45:12', NULL),
(808, 'User Logged In: fako | fakovendor@yopmail.com', 32, 1, 0, '2019-10-28 02:22:56', NULL),
(809, 'User Deactivated: Chjc | dhdh@hc.hd', 61, 1, 0, '2019-10-28 03:40:01', NULL),
(810, 'User Deactivated: Chjc | dhdh@hc.hd', 61, 1, 0, '2019-10-28 03:40:22', NULL),
(811, 'User Deactivated: Chjc | dhdh@hc.hd', 61, 1, 0, '2019-10-28 03:55:44', NULL),
(812, 'User Deactivated: Chjc | dhdh@hc.hd', 61, 1, 0, '2019-10-28 03:56:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('021dfd6bfe963a2e52579469b3c044a1122bdbc8516d82d3d910bd061798de5fd41fb7181f771921', 35, 1, 'MyApp', '[]', 0, '2019-07-01 09:56:43', '2019-07-01 09:56:43', '2020-07-01 15:26:43'),
('02e923847ccd27f434e30fae3deae003965b762ee9cecdee874d1c633b98261086d66db51223fe22', 66, 1, 'MyApp', '[]', 0, '2019-10-05 10:03:18', '2019-10-05 10:03:18', '2020-10-05 15:33:18'),
('051b8e8921a1c3fe8242bbc5ccc6f7fb1b2ee546d9337dfb9d3bf03840c74db81168cdd3f66d246f', 28, 1, 'MyApp', '[]', 0, '2019-07-19 09:01:13', '2019-07-19 09:01:13', '2020-07-19 14:31:13'),
('05290518398fca0afa0a33d13a4454287968bb8aa5aa50cb12eac4db56e22ccb3c02bc2fe403d7aa', 28, 1, 'MyApp', '[]', 0, '2019-07-01 17:32:52', '2019-07-01 17:32:52', '2020-07-01 23:02:52'),
('0602c941810f19718a64513f3ecb2bd3b3fee575ab35b6e1b130fdd45bb0ed5b850a09c7e79a4318', 28, 1, 'MyApp', '[]', 0, '2019-06-14 06:59:25', '2019-06-14 06:59:25', '2020-06-14 12:29:25'),
('07dd87c59c6ca084e95e50863f528eecb3fdabd5175d34c525e737646d62bc71fdebfa3502b61cb4', 32, 1, 'MyApp', '[]', 0, '2019-07-01 15:44:16', '2019-07-01 15:44:16', '2020-07-01 21:14:16'),
('08525578898750cdc7c4dfe783965440311329b722e7a3c11332b82f88cc90f923a1af67730533af', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:28:46', '2019-06-28 15:28:46', '2020-06-28 20:58:46'),
('08561952ab361e2dea90193b6eeafe65c735c84f5df8a01fc93099edfa459e982c7125a49cf683e1', 28, 1, 'MyApp', '[]', 0, '2019-06-20 17:01:55', '2019-06-20 17:01:55', '2020-06-20 22:31:55'),
('096b586aba068d3f03cf5361d41143070ac9ad0f57c550ebda789497f670498a70383e632a16fb34', 28, 1, 'MyApp', '[]', 0, '2019-06-27 11:48:58', '2019-06-27 11:48:58', '2020-06-27 17:18:58'),
('0a3c4d64d3530c3760e9b117805ab72f7ccf83a892b80e763b95dbb6b86d7b432726d773b0113302', 28, 1, 'MyApp', '[]', 0, '2019-06-20 17:27:06', '2019-06-20 17:27:06', '2020-06-20 22:57:06'),
('0c3a78b4ec2ee822975987835a76d172a27c73d0f80d39ed9a01c7d2c4acc3edfa5fc3f5d35b0072', 41, 1, 'MyApp', '[]', 0, '2019-07-04 14:47:15', '2019-07-04 14:47:15', '2020-07-04 20:17:15'),
('0f1c42f4a1831b21b9413dff4081fce2bc2c270b5a25e6521bce5a660991aca6bfe157a4e35e8265', 48, 1, 'MyApp', '[]', 0, '2019-07-15 09:25:26', '2019-07-15 09:25:26', '2020-07-15 14:55:26'),
('1026314c1129a9788c1fa5813261cdc81fa5667eaa6f87dded8588b32ef905629ab561be58cda7a1', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:21:56', '2019-06-28 15:21:56', '2020-06-28 20:51:56'),
('12554471a929fc8c07cfeee2bc1f9686eead1176b2da2603b15ef1fcd6ecefcf025e6756637b471b', 28, 1, 'MyApp', '[]', 0, '2019-07-08 08:29:16', '2019-07-08 08:29:16', '2020-07-08 13:59:16'),
('12bed810351eaecf80acc7fd01272bd7074585095135377a1a98a68354d4c69afca032b558a405fe', 28, 1, 'MyApp', '[]', 0, '2019-07-23 06:23:18', '2019-07-23 06:23:18', '2020-07-23 11:53:18'),
('1565741c43b82aee74404aca6f67f6199899f7a13094ca88ebf6f779490ab1687843a70a96fe9d10', 28, 1, 'MyApp', '[]', 0, '2019-07-25 01:52:10', '2019-07-25 01:52:10', '2020-07-25 07:22:10'),
('165eda75977e23e8d48ea9bb492fa40899db289cb1e625665d5ae1235392a7d257cf5268b3171692', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:06', '2019-06-28 15:22:06', '2020-06-28 20:52:06'),
('17663f4b05db24f17ed34945540d9c24090389c5f2fe2fa0ecc7868180a2de48b7337c097121b005', 57, 1, 'MyApp', '[]', 0, '2019-07-23 07:43:17', '2019-07-23 07:43:17', '2020-07-23 13:13:17'),
('1b7afec99acabe05280561cba8b0d9cefbe9fad1509dfe375440ccc1096be74fba07f3f34c81981a', 59, 1, 'MyApp', '[]', 0, '2019-07-23 08:10:42', '2019-07-23 08:10:42', '2020-07-23 13:40:42'),
('1ca9d5c4caa11038be682fdf41d26e1705737daab6f765a2ddc186ceba02ebf0083779cb92dc935a', 28, 1, 'MyApp', '[]', 0, '2019-07-22 01:49:52', '2019-07-22 01:49:52', '2020-07-22 07:19:52'),
('1cc7b59d461d97b3340f7e7d3f9bf9b5e580bd797f145096c35d7d2fb2f1ee6565c9d3c95776bde7', 28, 1, 'MyApp', '[]', 0, '2019-06-17 07:50:40', '2019-06-17 07:50:40', '2020-06-17 13:20:40'),
('2103e042593779cc91df1ba0ca02475b227877d939a916dd0d10d78b77f7aa395d0ab1f33a3638a3', 28, 1, 'MyApp', '[]', 0, '2019-06-28 14:11:35', '2019-06-28 14:11:35', '2020-06-28 19:41:35'),
('24f49aafd0b1101af32b80efcaf124f8501fe621a94269eaca5391b69087992b728c568b6dbb61fe', 28, 1, 'MyApp', '[]', 0, '2019-07-12 09:21:27', '2019-07-12 09:21:27', '2020-07-12 14:51:27'),
('2610d0bad88b2e8ea12ae82f1b1f605b54ffd988a1fb12c3ec7a2b7e4d3fe183c81d5dc09fdb6ea4', 28, 1, 'MyApp', '[]', 0, '2019-07-23 06:18:59', '2019-07-23 06:18:59', '2020-07-23 11:48:59'),
('2788adc24ac9c889af05f4fedbc9378a0db7aa568b08c832fa3be4f3d95ba939ebc198104803e942', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:18', '2019-06-28 15:22:18', '2020-06-28 20:52:18'),
('28d85543155e24ee51e0c97cc98476760aceb8f3cfd73e5323447e4660e49ad07a16e560f9ef555c', 28, 1, 'MyApp', '[]', 0, '2019-07-10 07:15:29', '2019-07-10 07:15:29', '2020-07-10 12:45:29'),
('2ca7a03d9f573df1368e5da643c522546ea8f04b13b18522d460baeb6565db3a42aa0bca0ab697b3', 63, 1, 'MyApp', '[]', 0, '2019-10-04 16:53:05', '2019-10-04 16:53:05', '2020-10-04 22:23:05'),
('2e6183e86a7655d74cc5de73311ee92a09c00e1e392aeeee1f2daa23103094bff25e19977207e5fe', 28, 1, 'MyApp', '[]', 0, '2019-07-01 08:29:02', '2019-07-01 08:29:02', '2020-07-01 13:59:02'),
('317dbc1f15a56b0d294cc268cabd4d3d94ef11f28e76bac021a67e9e757ec1fb58e296829c5b3cd8', 56, 1, 'MyApp', '[]', 0, '2019-07-23 07:03:31', '2019-07-23 07:03:31', '2020-07-23 12:33:31'),
('32e527327f252974d8eb346e3933673c0eb2a2c22432ddc9088df2de25068adb7ae9500d623af812', 28, 1, 'MyApp', '[]', 0, '2019-06-28 14:13:04', '2019-06-28 14:13:04', '2020-06-28 19:43:04'),
('3423167323e76dc5f7e147bbf045d1fa4470d21c02f5bd37178c2e29f883ddcc066dd8bb5a2b41a6', 46, 1, 'MyApp', '[]', 0, '2019-07-12 09:03:02', '2019-07-12 09:03:02', '2020-07-12 14:33:02'),
('36d83fb1b33d7fe101a859f754c8f0be4edaccb43d86f0bc9002a717d829722460228f74943a2864', 28, 1, 'MyApp', '[]', 0, '2019-06-20 17:18:15', '2019-06-20 17:18:15', '2020-06-20 22:48:15'),
('37385608e5ca20e7ccd35599d6cf1a4bf84960c3418d23fc2444c9ddde21fb376fdc953b46335edc', 28, 1, 'MyApp', '[]', 0, '2019-06-29 12:40:02', '2019-06-29 12:40:02', '2020-06-29 18:10:02'),
('376a50cbf185a49f89573d3be42a9c5a90f1ecce43103eec9dd9f6c91949ea33979091dc20cbcbc9', 28, 1, 'MyApp', '[]', 0, '2019-06-20 17:06:59', '2019-06-20 17:06:59', '2020-06-20 22:36:59'),
('37782f2490e2356e7a77a1a95e62fa4593a9a76ee052a531b33a955e204b4640ea6d39cf6b3a145b', 28, 1, 'MyApp', '[]', 0, '2019-07-01 13:46:30', '2019-07-01 13:46:30', '2020-07-01 19:16:30'),
('39b1931ee2adb597044d7d1aaf3dbc20b826a494b4ab8dc02f70018a4259e1c07a7db6429e0675cc', 38, 1, 'MyApp', '[]', 0, '2019-07-02 15:41:46', '2019-07-02 15:41:46', '2020-07-02 21:11:46'),
('3a8f123d92d3c95abd15eab4a17ea47e64fd92ab769fe9f09059b9d493554ebfc3d194d52e56efd1', 37, 1, 'MyApp', '[]', 0, '2019-07-01 10:11:38', '2019-07-01 10:11:38', '2020-07-01 15:41:38'),
('3b68dd3e7da4457e57bdd27dc7c7b92c483a395b2bdc4ed3f119e699cfb7bcc7ef43684e5287bb93', 28, 1, 'MyApp', '[]', 0, '2019-07-19 00:59:13', '2019-07-19 00:59:13', '2020-07-19 06:29:13'),
('3bcd9875fd03768110fab62f6425fb6b99cf22c3c8922127e14f4c7211d2032df6c2ef56fc8ae760', 28, 1, 'MyApp', '[]', 0, '2019-06-27 16:51:02', '2019-06-27 16:51:02', '2020-06-27 22:21:02'),
('40c5b961e4b4be6d0c76b4689eadce872429a0161224d47d48ad2a06fe97b43214152a8e016a5471', 67, 1, 'MyApp', '[]', 0, '2019-10-05 10:11:25', '2019-10-05 10:11:25', '2020-10-05 15:41:25'),
('445d5662eef304849e399a76667c87aa9ff46d937d1fb163048453783aa8e86999cd0b0ccce92fd9', 28, 1, 'MyApp', '[]', 0, '2019-06-30 18:01:42', '2019-06-30 18:01:42', '2020-06-30 23:31:42'),
('44f08e6b513e5d7317ad17ebbac0e8e121980b7aa137a7477ffdcff916ae2c7883bd58b46aa74cb1', 43, 1, 'MyApp', '[]', 0, '2019-07-04 16:15:02', '2019-07-04 16:15:02', '2020-07-04 21:45:02'),
('47ca4c2c61bb1b6650eaff8648e75e5484c9f5f90c4790a52a1671bdd28378ab6a1765e62b9b950d', 81, 1, 'MyApp', '[]', 0, '2019-10-22 12:38:00', '2019-10-22 12:38:00', '2020-10-22 18:08:00'),
('492433dcc76e71f8fb9172cd256178594081aeadf4c2f092d7b09e0c82222c1b8af39f14051b13ed', 28, 1, 'MyApp', '[]', 0, '2019-06-28 14:32:46', '2019-06-28 14:32:46', '2020-06-28 20:02:46'),
('4975a492e18fbf4ac3024952a141b01e24584cae652f5c1f7ec22b37ba128d4bcc02a3f040bb49b4', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:16', '2019-06-28 15:22:16', '2020-06-28 20:52:16'),
('4aa539e026b36e0e44016051346e46dfa5f02eb9b611ce60d9cdd9b04d6f369ad3ce1d0badbaed16', 28, 1, 'MyApp', '[]', 0, '2019-07-01 13:00:52', '2019-07-01 13:00:52', '2020-07-01 18:30:52'),
('4c18e53b2be0fef64fabed3bf54d78d1cb5561a14338e7a0ee1717b68f17e2bffc3a427f0143b354', 64, 1, 'MyApp', '[]', 0, '2019-10-05 09:48:49', '2019-10-05 09:48:49', '2020-10-05 15:18:49'),
('4d909a85c52c94566378e8091909fa38403bc0136e1b0db0866999f45bef41b03a76dc7cac10197b', 28, 1, 'MyApp', '[]', 0, '2019-10-16 13:59:18', '2019-10-16 13:59:18', '2020-10-16 19:29:18'),
('4e22e7e9105046757ac3e86f4dab57cee1fd3885a0b06614eee0cdca89a6a8414aa62972aff29dac', 40, 1, 'MyApp', '[]', 0, '2019-07-04 14:40:32', '2019-07-04 14:40:32', '2020-07-04 20:10:32'),
('53f4343ccff5467f871cc948472b128565fdd27edec4c58cf2bffe051d2c476a2777c494741d729a', 28, 1, 'MyApp', '[]', 0, '2019-07-12 02:13:47', '2019-07-12 02:13:47', '2020-07-12 07:43:47'),
('5531bc8ab3d3035cb87c9ab7f69eb953b72146d39156e774edc1cda12d52052005ff4885cdeadad7', 28, 1, 'MyApp', '[]', 0, '2019-07-01 08:29:00', '2019-07-01 08:29:00', '2020-07-01 13:59:00'),
('57bd69171d3e8949b70da3ea059cd902b752a2c36e635c364795de0081a2f58ceaa89d2027f00b02', 28, 1, 'MyApp', '[]', 0, '2019-06-14 07:00:32', '2019-06-14 07:00:32', '2020-06-14 12:30:32'),
('5a7c7b8e47883a22884ecdb782a9c400df4d3e1ecc764fe3bdc5a7887054830c512cdbc273b594f7', 28, 1, 'MyApp', '[]', 0, '2019-07-01 08:29:01', '2019-07-01 08:29:01', '2020-07-01 13:59:01'),
('5c79171af4b9d6297539b51fa7493c6ffeb0b97d1cb19ded4037fcb90f75928352dfac97f588a420', 28, 1, 'MyApp', '[]', 0, '2019-07-04 17:15:16', '2019-07-04 17:15:16', '2020-07-04 22:45:16'),
('607c08a616479afe0ab9d38023d455d7d52f44e96fa588b1dc2ed6649210567806fdfe57ca6d7753', 28, 1, 'MyApp', '[]', 0, '2019-06-25 09:36:28', '2019-06-25 09:36:28', '2020-06-25 15:06:28'),
('611914a7b54a590967d0e2324ea1833b6cb656fa5bafa28eb5ad9e5174bfd80614868d2f6a8c2fe8', 28, 1, 'MyApp', '[]', 0, '2019-10-16 22:45:33', '2019-10-16 22:45:33', '2020-10-17 04:15:33'),
('6191a14a4fd32b4ad171f1b73ec9c310d57de0267c179b9d5018c6f3f9f473a29d8f5c0b6f85a290', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:18', '2019-06-28 15:22:18', '2020-06-28 20:52:18'),
('624d55855e39f5704a78a5b8b460527994d71732bb12e013a627506ed932fc6da7510d40f1678c82', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:56:58', '2019-06-28 15:56:58', '2020-06-28 21:26:58'),
('62d2bdec9b9e5a93c14b4be4c11080bf44012f6180215c550d31274c620e8bf23fe5da4ed9080e97', 28, 1, 'MyApp', '[]', 0, '2019-07-11 01:40:03', '2019-07-11 01:40:03', '2020-07-11 07:10:03'),
('6534750891d45b4cb132ea13376ea0ebf51ba90407e21aeb3fdf75ac75331e048bfdb89249b390bd', 70, 1, 'MyApp', '[]', 0, '2019-10-05 10:38:13', '2019-10-05 10:38:13', '2020-10-05 16:08:13'),
('660c6b457b4c17cd791d5001fb00f37ab1acf5d918ff0b509f839ae762bc9c4890aabf52c84af62d', 36, 1, 'MyApp', '[]', 0, '2019-07-01 09:58:51', '2019-07-01 09:58:51', '2020-07-01 15:28:51'),
('67296d7def82ecfbd5d5d1386c4acc07572dd11d722a5185715eabbd0ae33598571ede5a05a2e0ce', 28, 1, 'MyApp', '[]', 0, '2019-10-21 17:20:10', '2019-10-21 17:20:10', '2020-10-21 22:50:10'),
('6a93978f02b2617ba6695be85f93af7aa05abedd3c6a8518599237a685fa751be97aed58d1403336', 49, 1, 'MyApp', '[]', 0, '2019-07-19 07:40:10', '2019-07-19 07:40:10', '2020-07-19 13:10:10'),
('6a989d2a439147f6cd6dc373133ae629ca7e1be128e162842e187620ae0c27127f8a46e7048f26eb', 28, 1, 'MyApp', '[]', 0, '2019-07-23 09:30:54', '2019-07-23 09:30:54', '2020-07-23 15:00:54'),
('6d7eb5b6ea9cd327ddac317892205a7174461f978213d4fd0ab872a4c9f8f6c945b9230eac999a0d', 67, 1, 'MyApp', '[]', 0, '2019-10-05 10:13:10', '2019-10-05 10:13:10', '2020-10-05 15:43:10'),
('6db61e68bff448e640d1d4790f4f7b7a8b0ca74cedc0435cf17aef05470509be62df43ba7f92f567', 28, 1, 'MyApp', '[]', 0, '2019-07-23 07:07:17', '2019-07-23 07:07:17', '2020-07-23 12:37:17'),
('6dc995699765859cea51e8cfd168909bc5e284c753ee099b3eb922a944a27ac6d1ffbe0b43df4843', 58, 1, 'MyApp', '[]', 0, '2019-07-23 07:49:53', '2019-07-23 07:49:53', '2020-07-23 13:19:53'),
('6de50498aa822bff5bc06a56ea3b54d8d64bfae96a07f8e08957414e27788ae66acd6035157ed451', 44, 1, 'MyApp', '[]', 0, '2019-07-04 16:21:20', '2019-07-04 16:21:20', '2020-07-04 21:51:20'),
('6f844fcb42ad6269042dfcd73ece8c2d66f35f2c66e87819526070d0ecce46ee42d9990b7413efbb', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:10', '2019-06-28 15:22:10', '2020-06-28 20:52:10'),
('706f0228971586e684850e676e566eb159a5b90938a03cb56adefd4c70a917d67d5f8e65ee6e1438', 54, 1, 'MyApp', '[]', 0, '2019-07-23 06:58:52', '2019-07-23 06:58:52', '2020-07-23 12:28:52'),
('70caf904dfd921422703ed0906d0945c68ff4552e843de1cd814b3bfbe82a8d88e83165c3910986a', 28, 1, 'MyApp', '[]', 0, '2019-07-23 07:13:12', '2019-07-23 07:13:12', '2020-07-23 12:43:12'),
('74e85d8f9c574d3cf82b67a089dd564faa19763422d694650db7f730a32cf00b9778b887a3278a6c', 28, 1, 'MyApp', '[]', 0, '2019-07-16 06:25:16', '2019-07-16 06:25:16', '2020-07-16 11:55:16'),
('7797cb0cabcfe9f55b06043b186014f7a58d26f2af7268223801633879803e733db768f3010a0eec', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:56:56', '2019-06-28 15:56:56', '2020-06-28 21:26:56'),
('798ae707b3359d22abd5a5c3b9a803a0dd74c13f21cc578882a481b3a63d329e75d397a6cf047ec3', 28, 1, 'MyApp', '[]', 0, '2019-06-20 16:37:19', '2019-06-20 16:37:19', '2020-06-20 22:07:19'),
('7ad3a3b1b727b19b031db128bb2678f0eb3356d4e6b8d25caa27ace6f8e446a8e634dba982c95c7c', 28, 1, 'MyApp', '[]', 0, '2019-06-20 16:34:14', '2019-06-20 16:34:14', '2020-06-20 22:04:14'),
('7b157128d76cfc5ce2068f8d87f6ce62dbe7e9eba58d2069706e10753578937ea3fe4da78729cf51', 33, 1, 'MyApp', '[]', 0, '2019-06-28 08:18:18', '2019-06-28 08:18:18', '2020-06-28 13:48:18'),
('7bd00a00413f3e42de5aa3363adad2b267c3790ad332baccad8a18aaa96c289501dc7a8217e1b694', 45, 1, 'MyApp', '[]', 0, '2019-07-12 08:40:06', '2019-07-12 08:40:06', '2020-07-12 14:10:06'),
('7efeb06213a8228e5bb492b2d25e61c8cd29571e871b44952c0ca82fb860495021cdc9d1e5a5badd', 78, 1, 'MyApp', '[]', 0, '2019-10-05 11:13:57', '2019-10-05 11:13:57', '2020-10-05 16:43:57'),
('8056aad49efbd588d91a54d08fc74fbba16d849db2a651fd821c2697ed156701e892c5c70c2c19c2', 28, 1, 'MyApp', '[]', 0, '2019-07-15 09:29:23', '2019-07-15 09:29:23', '2020-07-15 14:59:23'),
('81271e12323496bc86a6e20490e943d7539a87e5ba15d9879d3434ee26618bc54a8f4462c59d0f5e', 28, 1, 'MyApp', '[]', 0, '2019-06-17 00:46:34', '2019-06-17 00:46:34', '2020-06-17 06:16:34'),
('814eb3aa56cd39c24826d53f99e2143359316903a0d84c5dbfb9ee241b256f8449a0a3b646b82535', 76, 1, 'MyApp', '[]', 0, '2019-10-05 11:10:12', '2019-10-05 11:10:12', '2020-10-05 16:40:12'),
('81f0828816979798daaaf4af2e4f940fbce0e06bd43051bac5fe90942d233ed8607f4b090d8b3bc0', 28, 1, 'MyApp', '[]', 0, '2019-06-27 09:17:27', '2019-06-27 09:17:27', '2020-06-27 14:47:27'),
('831b50adb89816c42a5d708d45253ac1f7e00b095f1b439d2681274b619d5b86811a330f32976693', 47, 1, 'MyApp', '[]', 0, '2019-07-15 09:17:16', '2019-07-15 09:17:16', '2020-07-15 14:47:16'),
('8544dc2ced500bbd200e407466a19e0e3607437dde2192b3fa8118b4aa6249b0ab738d967e3b91f5', 28, 1, 'MyApp', '[]', 0, '2019-06-17 00:34:40', '2019-06-17 00:34:40', '2020-06-17 06:04:40'),
('861b62fbd9a564bf9e88f42975f642e13db1b1bc8449f115ae9400f7b0fc7baceb615219e5dd4590', 28, 1, 'MyApp', '[]', 0, '2019-07-15 01:39:23', '2019-07-15 01:39:23', '2020-07-15 07:09:23'),
('881e8d7e2a430cafd9e8b34366362ea4e582fd9257b8d14881c663b354c5b137b475c0bbae7a64ad', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:17', '2019-06-28 15:22:17', '2020-06-28 20:52:17'),
('89b396552640ad9ed658674752ba5a36f17e648f4ecac6b9e579c137c0ed97e71eef3098b1553a39', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:55:31', '2019-06-28 15:55:31', '2020-06-28 21:25:31'),
('8b63daede151040863566cc132f07f39e0bbba9b183429ab88662515bd103938286c58a7182e1474', 28, 1, 'MyApp', '[]', 0, '2019-07-22 04:48:59', '2019-07-22 04:48:59', '2020-07-22 10:18:59'),
('8be3b47bd5955cfb6896a1e9bf3853949feac8bfb311fdab86620d89b5f7385ef125bbc61e3cc6e9', 73, 1, 'MyApp', '[]', 0, '2019-10-05 10:49:21', '2019-10-05 10:49:21', '2020-10-05 16:19:21'),
('8e4e7102738d2aca2b65e3195d6c81bb7f7c9fda366411899f59c17d0c20b28a1dee75f1ede9f8b0', 28, 1, 'MyApp', '[]', 0, '2019-07-19 07:27:39', '2019-07-19 07:27:39', '2020-07-19 12:57:39'),
('91df1dde0c525b0528a0064ce819ab07edc383f77bc5f008dee2f37653dea5d9cac112892f9290e2', 28, 1, 'MyApp', '[]', 0, '2019-07-23 06:39:24', '2019-07-23 06:39:24', '2020-07-23 12:09:24'),
('959cc92b61f81d8e84e5026b52930a709b6029fa216e5d86ebb265f2e2cf9e8269f1e277297b962d', 80, 1, 'MyApp', '[]', 0, '2019-10-07 16:24:15', '2019-10-07 16:24:15', '2020-10-07 21:54:15'),
('9715ddfff45853908b897b27092f84de6cf26389cec49a402a78f6b8f0c9afe3efbfbf4e8eab9839', 28, 1, 'MyApp', '[]', 0, '2019-06-17 02:08:32', '2019-06-17 02:08:32', '2020-06-17 07:38:32'),
('99d9e58b9ac5700b3874528ccc708fdc4d263db5c6cb1e7b39d04ddc4328f2847541385a923d736f', 28, 1, 'MyApp', '[]', 0, '2019-07-01 09:35:06', '2019-07-01 09:35:06', '2020-07-01 15:05:06'),
('9b24b6715124251ce9e429147dbafad0c575f071bf82bf09fe99bf3c49739154162fbe77b4137c83', 28, 1, 'MyApp', '[]', 0, '2019-06-25 08:20:47', '2019-06-25 08:20:47', '2020-06-25 13:50:47'),
('9b6257a74b8eb980a75e73f6abb4844389897258c3abb082de36124489bd5ff0eae6acfa974506d6', 45, 1, 'MyApp', '[]', 0, '2019-07-12 09:30:10', '2019-07-12 09:30:10', '2020-07-12 15:00:10'),
('9c4dc83d7f97344532875b49057b5c2e7ace522e04caad968f0e3e32398b58a810daa2feb7413266', 28, 1, 'MyApp', '[]', 0, '2019-06-28 17:25:37', '2019-06-28 17:25:37', '2020-06-28 22:55:37'),
('9cacdb687e8225957a572d23bbe91c87b78e34c8a866133603503b8f31725034131cee8967e51190', 28, 1, 'MyApp', '[]', 0, '2019-10-21 17:42:53', '2019-10-21 17:42:53', '2020-10-21 23:12:53'),
('9dc12a7d877eb5e0094be2b3543519be3b8df9c1c89abc26437b342f01a918551c68519508115329', 72, 1, 'MyApp', '[]', 0, '2019-10-05 10:45:11', '2019-10-05 10:45:11', '2020-10-05 16:15:11'),
('9e043901c6eae919b152c8ebe7dda83c2f57bf67b827463d0f3c4a44869a5e3e979824c9ecdea1c2', 28, 1, 'MyApp', '[]', 0, '2019-07-10 02:12:39', '2019-07-10 02:12:39', '2020-07-10 07:42:39'),
('a0ac7df77878480720e30f275bc73d02cf54c2b6da47eb825678b0b4c21f4f7b71e2ef2c037f41cb', 28, 1, 'MyApp', '[]', 0, '2019-06-28 08:39:55', '2019-06-28 08:39:55', '2020-06-28 14:09:55'),
('a1998c6e807299aaf9e22d6058e99d7fb3aeeda1f47284ad6f2266e9c8e8e475d762941f0cfe123a', 1, 1, 'MyApp', '[]', 0, '2019-06-14 08:20:20', '2019-06-14 08:20:20', '2020-06-14 13:50:20'),
('a1ecc12d85b069d2796c1840509797687bed8886beb814c973080dcf1e359d825def7ee2e2d6793c', 28, 1, 'MyApp', '[]', 0, '2019-06-20 16:47:56', '2019-06-20 16:47:56', '2020-06-20 22:17:56'),
('a25cb6d87488a74d7d53e60cc20a8eb1fde335c11d22365780e5a7e37e2f79f2dd6e30a4def7323f', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:17', '2019-06-28 15:22:17', '2020-06-28 20:52:17'),
('a309f4ac121b789cb630cd289fc230cdf4abbb5fa0a61c0fefc1b61d28ab6617e436662ad69e9f8e', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:23:07', '2019-06-28 15:23:07', '2020-06-28 20:53:07'),
('a34eb2397a88463fddccab0475263fb35363ac167a9f954d6b4191ef61b4fbf795bb25f8aba3bec0', 28, 1, 'MyApp', '[]', 0, '2019-07-15 08:29:54', '2019-07-15 08:29:54', '2020-07-15 13:59:54'),
('a7878b844536ae87f6a4da6e2b426497fabd50614bdd72d5a73205ab380cca3addaef01ce06af7b6', 28, 1, 'MyApp', '[]', 0, '2019-06-14 10:05:57', '2019-06-14 10:05:57', '2020-06-14 15:35:57'),
('a9b47d3a0946f1bde95f463361532db82ba14f6b2823cac23781f069a0d7bebf7efddc535907b40b', 82, 1, 'MyApp', '[]', 0, '2019-10-22 12:47:30', '2019-10-22 12:47:30', '2020-10-22 18:17:30'),
('ab4553eb4d881dcf668976de31a722e5d38b691103680f9f7986bd7ef8bf7d8105181acb6da271c6', 28, 1, 'MyApp', '[]', 0, '2019-06-27 09:17:43', '2019-06-27 09:17:43', '2020-06-27 14:47:43'),
('aba783804d843251a8bfd41ed02faac23a29169ca6f29c7987fe1a5e33920161f13e85eb50d4cfbb', 60, 1, 'MyApp', '[]', 0, '2019-07-23 08:25:29', '2019-07-23 08:25:29', '2020-07-23 13:55:29'),
('ad3bba0002724d6cdd5caca306f6471c4ec0d6930503e8b7e6af936de5f4b60e6e78a3141d055ab9', 28, 1, 'MyApp', '[]', 0, '2019-07-01 09:25:08', '2019-07-01 09:25:08', '2020-07-01 14:55:08'),
('af6c156ab996dbeaefebc51d0ff47e0df6ac3d228519c98fb9dba317d093ef634ef2c6d680673494', 28, 1, 'MyApp', '[]', 0, '2019-07-12 00:48:05', '2019-07-12 00:48:05', '2020-07-12 06:18:05'),
('b55b9ed1a2f701863629c3f58efdebf4690c6901b6af2ba06812891334b978106612c1e316d488d2', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:42:28', '2019-06-28 15:42:28', '2020-06-28 21:12:28'),
('b7dc80abfd1ca2219d37446a3681767f8faa8326cee378961cbbc5db99d83f344af49e0935112222', 42, 1, 'MyApp', '[]', 0, '2019-07-04 16:10:35', '2019-07-04 16:10:35', '2020-07-04 21:40:35'),
('b966c25bf624f1113da2d08c5413b13c938e6f1c7bf549ebfae16dea0d947e7d8a9c52dff05687ed', 77, 1, 'MyApp', '[]', 0, '2019-10-05 11:12:45', '2019-10-05 11:12:45', '2020-10-05 16:42:45'),
('b97888fa2dbbbe6c0136602ad5328817074af061c4f388c4ecd0b748e47375d293569d5ba3a22a43', 71, 1, 'MyApp', '[]', 0, '2019-10-05 10:43:37', '2019-10-05 10:43:37', '2020-10-05 16:13:37'),
('b9f27b962f840b12484b91b2a0db39f07a48c0fec6e98a82747232306ac3dd7c1246d4f6b023cb50', 32, 1, 'MyApp', '[]', 0, '2019-06-27 09:50:29', '2019-06-27 09:50:29', '2020-06-27 15:20:29'),
('ba7fd10df3b18801f678f35cad63dcbab474dd06113efa7c68e79b991bcbf8952e63b76733b8de23', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:07', '2019-06-28 15:22:07', '2020-06-28 20:52:07'),
('baf99018861d85e80ce249db076dac4f9ea95bb37355c86d338300f24208a97eaf5bed4c03f33401', 28, 1, 'MyApp', '[]', 0, '2019-06-14 07:00:09', '2019-06-14 07:00:09', '2020-06-14 12:30:09'),
('bb2035ee1f76c864d7ca546ccec9a3accba6000247cda614342fad0cfc397921a5c7c82e2a1d9e38', 80, 1, 'MyApp', '[]', 0, '2019-10-07 16:32:50', '2019-10-07 16:32:50', '2020-10-07 22:02:50'),
('bb26bdaa8ce9f1c2e96deef3bf090c0c54ffb6e08ef3c4bc7a4de2ed88e022ebe56f7693d2d1035b', 31, 1, 'MyApp', '[]', 0, '2019-06-17 07:56:18', '2019-06-17 07:56:18', '2020-06-17 13:26:18'),
('bcc1ef189dbb45d01c42f8971e8789a26bb4f06c1c16b9ba78d6d810bd4927533900b58f6e9c0e17', 28, 1, 'MyApp', '[]', 0, '2019-06-28 18:57:02', '2019-06-28 18:57:02', '2020-06-29 00:27:02'),
('be530d982dd536557374ec08067ae11539a8d8678b61de806282330b13c85573c95b05056bbd4036', 39, 1, 'MyApp', '[]', 0, '2019-07-04 14:38:44', '2019-07-04 14:38:44', '2020-07-04 20:08:44'),
('be8816a55e9244aea9ca9c5ab7531c2cdd634cf384f98015318226cd0a6e9c81264b0678033e1712', 65, 1, 'MyApp', '[]', 0, '2019-10-05 09:57:40', '2019-10-05 09:57:40', '2020-10-05 15:27:40'),
('bec4a9a7dbbbd79a96a2458c6c3b13de91a2f1c09abf80e12b7ccba81add87dcb2f8fda8fda03f96', 28, 1, 'MyApp', '[]', 0, '2019-06-29 05:24:51', '2019-06-29 05:24:51', '2020-06-29 10:54:51'),
('c03c21fb1064171a1142d1f9c65cad9445ba208deb7aaaf969764c8b14c01553de2bba34cb3720a5', 28, 1, 'MyApp', '[]', 0, '2019-07-01 14:10:16', '2019-07-01 14:10:16', '2020-07-01 19:40:16'),
('c331dd9c323760bf9170a2b373259f52532f53a632f0c5e0effcaa9b21512b08c5213f059b378968', 28, 1, 'MyApp', '[]', 0, '2019-06-27 16:17:46', '2019-06-27 16:17:46', '2020-06-27 21:47:46'),
('c34d5a155f59fab02af7bce8dc4ef0330c99e3630012f8ead2754d3c07c87f3b680903b511ed634b', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:56:59', '2019-06-28 15:56:59', '2020-06-28 21:26:59'),
('cadf7011782a5cbb12591dbe0835edadd4593da61d8faef000b47ad9f9e70dc5d485c8abf6345392', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:48:03', '2019-06-28 15:48:03', '2020-06-28 21:18:03'),
('ccf26892bf2d79b1b7a3b05a1d0a60d320a4859465c22eb32957d700efadde16a79755738d8b08e6', 28, 1, 'MyApp', '[]', 0, '2019-07-22 05:08:23', '2019-07-22 05:08:23', '2020-07-22 10:38:23'),
('cde8378bf01a9aa39b9c9b566d1002ce18b0202b3f1ec44d07c1c10e7c9290f8d45fbfd300a6107c', 28, 1, 'MyApp', '[]', 0, '2019-07-02 16:45:48', '2019-07-02 16:45:48', '2020-07-02 22:15:48'),
('ce6a9c874ab130e0e21660bfbdac5f3598c6aff474c05947549627a79f43cfb725f2254fac1a22c6', 28, 1, 'MyApp', '[]', 0, '2019-07-01 08:45:40', '2019-07-01 08:45:40', '2020-07-01 14:15:40'),
('d05438d0890999c9fecbed94749473c5cb06a4686966fdec07a7b9db50815313996c6be1618826ef', 28, 1, 'MyApp', '[]', 0, '2019-07-12 02:50:17', '2019-07-12 02:50:17', '2020-07-12 08:20:17'),
('d17ea37f81a8eef11ae569208c277cc942587df1049f615edb39aa4a5f96ea9a3eb6faf207151519', 28, 1, 'MyApp', '[]', 0, '2019-06-27 16:51:05', '2019-06-27 16:51:05', '2020-06-27 22:21:05'),
('d3618d0af0de41877028f0ba40953fd861d2e7cf32a278dd2e578fe5e5e0e10af48a5b976cfa57b1', 28, 1, 'MyApp', '[]', 0, '2019-07-01 13:41:04', '2019-07-01 13:41:04', '2020-07-01 19:11:04'),
('d3c0b32051ad631a6989504a250f56d8966420ca41d0975dab1aa5d1ae5d5dbd2bf1053fe62cf34b', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:17', '2019-06-28 15:22:17', '2020-06-28 20:52:17'),
('d3f548166ae94a8f29702edfc91e4168b452fc43ba27b5e98ace2bffa15beb192acf1dbdbed521bf', 55, 1, 'MyApp', '[]', 0, '2019-07-23 07:00:25', '2019-07-23 07:00:25', '2020-07-23 12:30:25'),
('d5f750e20c62cb85f9c101ddbb67db114e553bd9813a3268dd35cdf9db1d44846c1ad635655ae326', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:08', '2019-06-28 15:22:08', '2020-06-28 20:52:08'),
('d60d74224b1790839c82f150b3fa0cea31acb63148980d3d425b5f5defbf82f4bb67d6700e4757d8', 61, 1, 'MyApp', '[]', 0, '2019-07-23 09:21:00', '2019-07-23 09:21:00', '2020-07-23 14:51:00'),
('d7ce6996f0d7319161e645aba405c5d384fc89650b69680a43379f10961492d7521f4020209de9d2', 28, 1, 'MyApp', '[]', 0, '2019-07-01 15:45:28', '2019-07-01 15:45:28', '2020-07-01 21:15:28'),
('d7f2531793459d4a68c38c883f7998e16d18d1c529bd76c868af5e97ff5fb95331e7007da0dd7cff', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:55:44', '2019-06-28 15:55:44', '2020-06-28 21:25:44'),
('d9057c44155ca3d8c3f9c3f1b96cba70c2d8212e51d5c60fdd4821fc387af5b56012dd1d5da2b2b4', 28, 1, 'MyApp', '[]', 0, '2019-06-21 08:11:02', '2019-06-21 08:11:02', '2020-06-21 13:41:02'),
('da9b0500c051cfff078588ea00f1a0263419fb8cd7630147fee6daa5c8dbda5ec868bc7432814aaa', 28, 1, 'MyApp', '[]', 0, '2019-06-29 09:12:28', '2019-06-29 09:12:28', '2020-06-29 14:42:28'),
('dab24728bbfd71002d43f75322788607aecda80249414129940ed42dcc35a9dc8af9b1febb6c2c71', 28, 1, 'MyApp', '[]', 0, '2019-06-14 06:57:25', '2019-06-14 06:57:25', '2020-06-14 12:27:25'),
('dae5047ff25218b717055cd4ba7d06ba9819354a0a8d2f747dfe0a31c8da91de3191afafadbf853c', 28, 1, 'MyApp', '[]', 0, '2019-06-28 12:49:12', '2019-06-28 12:49:12', '2020-06-28 18:19:12'),
('dfb67b29f772e0caab2c841d6c17ba4d2e69f4db7351d26cc20ef0413151c9bd2f397447451a061b', 28, 1, 'MyApp', '[]', 0, '2019-07-19 07:37:19', '2019-07-19 07:37:19', '2020-07-19 13:07:19'),
('e021d0cd0cea3ba9f1b21289a243188c087f4e35f8f34e2d347c2c535cf29ddac1d61f42e719e32f', 28, 1, 'MyApp', '[]', 0, '2019-07-08 12:35:16', '2019-07-08 12:35:16', '2020-07-08 18:05:16'),
('e383e0ddb2150df8f803d7c87c11bd6b0392590126a8530085db1c205befad14f8f84f6e7815e977', 28, 1, 'MyApp', '[]', 0, '2019-06-25 13:05:45', '2019-06-25 13:05:45', '2020-06-25 18:35:45'),
('e570fe2c9d6235accf8df62b7c8dc4762888a7b5cf3f31f4c44e7a14f636ce8b1e4b0b6778678a40', 28, 1, 'MyApp', '[]', 0, '2019-07-01 08:27:16', '2019-07-01 08:27:16', '2020-07-01 13:57:16'),
('e7ab5825942abd9ee903e771e89c77530d6fe7af999303bba7f649614f0f9f1de5237c53b7468e94', 28, 1, 'MyApp', '[]', 0, '2019-07-19 05:45:02', '2019-07-19 05:45:02', '2020-07-19 11:15:02'),
('e9984de1736bc9276c13f295abb6202f6f680103fecf077ccdc299d26c6a9a72a6f34ac1853645bb', 45, 1, 'MyApp', '[]', 0, '2019-07-12 09:56:04', '2019-07-12 09:56:04', '2020-07-12 15:26:04'),
('ea71f66361ec9e075ffc83bff89f41bf1e8a0faa757f730bd7994bd59183b91f0f8e2bc99db465b9', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:17', '2019-06-28 15:22:17', '2020-06-28 20:52:17'),
('ed731b5aedac83e9fde6cd0b8fe7cc7f673d5b1909206e85903b028201da90bad270470c45dffa03', 28, 1, 'MyApp', '[]', 0, '2019-06-27 09:17:46', '2019-06-27 09:17:46', '2020-06-27 14:47:46'),
('ee9fcc4eee889847334a2ba59819f35fea697ccde70b793db711b4f696df9f06a3d05745f2d510ff', 28, 1, 'MyApp', '[]', 0, '2019-06-28 15:22:18', '2019-06-28 15:22:18', '2020-06-28 20:52:18'),
('f7690c9ad75112c8f24443e08ae9401591847507daa3b7890ac3be2a453b7a40a993ea6c077f9b72', 36, 1, 'MyApp', '[]', 0, '2019-09-24 09:56:25', '2019-09-24 09:56:25', '2020-09-24 15:26:25'),
('f805146daf61fe3ff08eaee33ae04bfeb43c103024827d893574409d88ff55dccf2f26cde8a326e4', 28, 1, 'MyApp', '[]', 0, '2019-10-04 16:47:49', '2019-10-04 16:47:49', '2020-10-04 22:17:49'),
('f916059486d2909fb84123a9245947728ea6ed9a0523170ddc726bd8ce8dea3bf30d1622fe8dcc9b', 28, 1, 'MyApp', '[]', 0, '2019-06-29 05:14:57', '2019-06-29 05:14:57', '2020-06-29 10:44:57'),
('f941274f1e04af5c54ab9a310b00c05383a252fd4be0d2921d6c7a11acb8c3622af0a5c1490e44a1', 28, 1, 'MyApp', '[]', 0, '2019-07-22 05:03:37', '2019-07-22 05:03:37', '2020-07-22 10:33:37'),
('f98c2bf9c212a5cac5e2c8808dbd6a66474d2cf19669473c6a58fb0e313c949aea577b0b8b1d6b16', 31, 1, 'MyApp', '[]', 0, '2019-06-17 07:58:26', '2019-06-17 07:58:26', '2020-06-17 13:28:26'),
('fc936b4b4f815f2d42aed5b2475654fff405001754c2739c66a1f58cf0001b25a8169a28694b9622', 28, 1, 'MyApp', '[]', 0, '2019-06-14 06:48:51', '2019-06-14 06:48:51', '2020-06-14 12:18:51'),
('fdd7ee4d0b1ea44a91170c504e9fc331ad1631476ad0731b6d4ac9219448966ce4d42d9dd9b3812c', 28, 1, 'MyApp', '[]', 0, '2019-06-14 07:01:37', '2019-06-14 07:01:37', '2020-06-14 12:31:37'),
('fe4c9f39fab6a82495526702600de8bfaed26edc3d3359484074f1b8700c61ce531f0c06c1449f4e', 62, 1, 'MyApp', '[]', 0, '2019-10-04 16:49:30', '2019-10-04 16:49:30', '2020-10-04 22:19:30'),
('fe546e2e626404254a87c07d2de27bc5ece9fe480053d34ff5b05a4913f9395f740d3a9acd15eb6f', 28, 1, 'MyApp', '[]', 0, '2019-07-01 09:25:16', '2019-07-01 09:25:16', '2020-07-01 14:55:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'FAKO Personal Access Client', 'PtMnkQFruG0F38krWETeF5P2vi9RxCWMe4C5vBcM', 'http://localhost', 1, 0, 0, '2019-06-14 06:35:54', '2019-06-14 06:35:54'),
(2, NULL, 'FAKO Password Grant Client', 'avcYaUBTjNLYNG8xrGMpA7OUHoah0f5RZaAqDeYa', 'http://localhost', 0, 1, 0, '2019-06-14 06:35:54', '2019-06-14 06:35:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-06-14 06:35:54', '2019-06-14 06:35:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cannonical_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `title`, `page_slug`, `description`, `cannonical_link`, `seo_title`, `seo_keyword`, `seo_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'About Us', 'about-us', '<p>About Us Content</p>', NULL, 'cfyg', 'df', '<p>dn</p>', 1, 1, 1, '2019-02-10 23:57:03', '2019-06-28 16:22:37', NULL),
(14, 'Home Page Content', 'home-text', '<p>Fako is your one-stop destination for the Best and Cheapest Deals on online shopping, food orders, recharges, electronics, travel, baby products and many more. In addition to the latest Coupons and Cashback offers, CashKaro stands out by offering more perks for its users. Some of the important value additions are latest Bank Offers, Online Shopping Sale Coupons, Festival Offers and Buying Guides. We are the ONLY site in India to offer Price Comparison, Coupons &amp; Cashback together. This makes us the cheapest way to shop online in India. It&rsquo;s time to start shopping more and earning more with CashKaro. We also have a super cool Fashion Blog called The Good Look Book. Do check it out for latest fashion trends and beauty tips! Also check out our amazing new product called EarnKaro, a platform that helps users earn unlimited money online. Start earning by sharing deals from Amazon, Myntra, Ajio etc.</p>', NULL, 'Home Page Content', 'Home Page Content', '<p>Home Page Content</p>', 1, 1, NULL, '2019-06-28 16:26:35', '2019-06-28 16:26:35', NULL),
(12, 'Terms and Conditions', 'terms-and-conditions', '<p>Terms and Conditions Content</p>', NULL, 'Terms and Conditions', 'Terms and Conditions', '<p>Terms and Conditions</p>', 1, 1, NULL, '2019-06-28 16:15:17', '2019-06-28 16:15:17', NULL),
(13, 'Privacy Policy', 'privacy-policy', '<p>Privacy Policy Content</p>', NULL, 'Privacy Policy', 'Privacy Policy', '<p>Privacy Policy</p>', 1, 1, NULL, '2019-06-28 16:15:54', '2019-06-28 16:15:54', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(22, 'testvendor@yopmail.com', '$2y$10$OHGuyR0PwApgkPsE/q8uL.wfEzwDHUfMVebLNC7CktnjDx6ZJ.H5a', '2019-07-23 12:12:52', NULL),
(18, 'sar1@yopmail.com', '71609', '2019-06-28 20:54:22', '2019-06-28 20:54:26'),
(19, 'fakotest@yopmail.com', '904632', '2019-06-28 21:23:47', '2019-06-28 21:23:47'),
(23, 'zxxz@yopmail.com', 'f07f1d93a5c2319570fe8fd40bdaa3a844e1bfe1eaf0eed1f13eb1a0fd2c25ad', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'view-backend', 'View Backend', 1, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(2, 'view-frontend', 'View Frontend', 2, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(3, 'view-access-management', 'View Access Management', 3, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(4, 'view-user-management', 'View User Management', 4, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(5, 'view-active-user', 'View Active User', 5, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(6, 'view-deactive-user', 'View Deactive User', 6, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(7, 'view-deleted-user', 'View Deleted User', 7, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(8, 'show-user', 'Show User Details', 8, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(9, 'create-user', 'Create User', 9, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(10, 'edit-user', 'Edit User', 9, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(11, 'delete-user', 'Delete User', 10, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(12, 'activate-user', 'Activate User', 11, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(13, 'deactivate-user', 'Deactivate User', 12, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(14, 'login-as-user', 'Login As User', 13, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(15, 'clear-user-session', 'Clear User Session', 14, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(16, 'view-role-management', 'View Role Management', 15, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(17, 'create-role', 'Create Role', 16, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(18, 'edit-role', 'Edit Role', 17, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(19, 'delete-role', 'Delete Role', 18, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(20, 'view-permission-management', 'View Permission Management', 19, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(21, 'create-permission', 'Create Permission', 20, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(22, 'edit-permission', 'Edit Permission', 21, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(23, 'delete-permission', 'Delete Permission', 22, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(24, 'view-page', 'View Page', 23, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(25, 'create-page', 'Create Page', 24, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(26, 'edit-page', 'Edit Page', 25, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(27, 'delete-page', 'Delete Page', 26, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(28, 'view-email-template', 'View Email Templates', 27, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(29, 'create-email-template', 'Create Email Templates', 28, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(30, 'edit-email-template', 'Edit Email Templates', 29, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(31, 'delete-email-template', 'Delete Email Templates', 30, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(32, 'edit-settings', 'Edit Settings', 31, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(33, 'view-blog-category', 'View Blog Categories Management', 32, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(34, 'create-blog-category', 'Create Blog Category', 33, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(35, 'edit-blog-category', 'Edit Blog Category', 34, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(36, 'delete-blog-category', 'Delete Blog Category', 35, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(37, 'view-blog-tag', 'View Blog Tags Management', 36, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(38, 'create-blog-tag', 'Create Blog Tag', 37, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(39, 'edit-blog-tag', 'Edit Blog Tag', 38, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(40, 'delete-blog-tag', 'Delete Blog Tag', 39, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(41, 'view-blog', 'View Blogs Management', 40, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(42, 'create-blog', 'Create Blog', 41, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(43, 'edit-blog', 'Edit Blog', 42, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(44, 'delete-blog', 'Delete Blog', 43, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(45, 'view-faq', 'View FAQ Management', 44, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(46, 'create-faq', 'Create FAQ', 45, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(47, 'edit-faq', 'Edit FAQ', 46, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(48, 'delete-faq', 'Delete FAQ', 47, 1, 1, NULL, '2019-01-22 00:26:41', '2019-01-22 00:26:41', NULL),
(49, 'manage-emailtemplate', 'Manage Emailtemplate Permission', 0, 1, 1, NULL, '2019-01-23 03:19:09', '2019-01-23 03:19:09', NULL),
(50, 'create-emailtemplate', 'Create Emailtemplate Permission', 0, 1, 1, NULL, '2019-01-23 03:19:09', '2019-01-23 03:19:09', NULL),
(51, 'store-emailtemplate', 'Store Emailtemplate Permission', 0, 1, 1, NULL, '2019-01-23 03:19:09', '2019-01-23 03:19:09', NULL),
(52, 'edit-emailtemplate', 'Edit Emailtemplate Permission', 0, 1, 1, NULL, '2019-01-23 03:19:09', '2019-01-23 03:19:09', NULL),
(53, 'update-emailtemplate', 'Update Emailtemplate Permission', 0, 1, 1, NULL, '2019-01-23 03:19:09', '2019-01-23 03:19:09', NULL),
(54, 'delete-emailtemplate', 'Delete Emailtemplate Permission', 0, 1, 1, NULL, '2019-01-23 03:19:09', '2019-01-23 03:19:09', NULL),
(55, 'manage-customer', 'Manage Customer Permission', 0, 1, 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26', NULL),
(56, 'create-customer', 'Create Customer Permission', 0, 1, 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26', NULL),
(57, 'store-customer', 'Store Customer Permission', 0, 1, 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26', NULL),
(58, 'edit-customer', 'Edit Customer Permission', 0, 1, 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26', NULL),
(59, 'update-customer', 'Update Customer Permission', 0, 1, 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26', NULL),
(60, 'delete-customer', 'Delete Customer Permission', 0, 1, 1, NULL, '2019-01-24 23:26:26', '2019-01-24 23:26:26', NULL),
(61, 'manage-event', 'Manage Event Permission', 0, 1, 1, NULL, '2019-01-25 04:49:49', '2019-01-25 04:49:49', NULL),
(62, 'manage-servicecategory', 'Manage Servicecategory Permission', 0, 1, 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01', NULL),
(63, 'create-servicecategory', 'Create Servicecategory Permission', 0, 1, 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01', NULL),
(64, 'store-servicecategory', 'Store Servicecategory Permission', 0, 1, 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01', NULL),
(65, 'edit-servicecategory', 'Edit Servicecategory Permission', 0, 1, 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01', NULL),
(66, 'update-servicecategory', 'Update Servicecategory Permission', 0, 1, 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01', NULL),
(67, 'delete-servicecategory', 'Delete Servicecategory Permission', 0, 1, 1, NULL, '2019-01-25 05:34:01', '2019-01-25 05:34:01', NULL),
(68, 'manage-termandcondition', 'Manage Termandcondition Permission', 0, 1, 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53', NULL),
(69, 'create-termandcondition', 'Create Termandcondition Permission', 0, 1, 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53', NULL),
(70, 'store-termandcondition', 'Store Termandcondition Permission', 0, 1, 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53', NULL),
(71, 'edit-termandcondition', 'Edit Termandcondition Permission', 0, 1, 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53', NULL),
(72, 'update-termandcondition', 'Update Termandcondition Permission', 0, 1, 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53', NULL),
(73, 'delete-termandcondition', 'Delete Termandcondition Permission', 0, 1, 1, NULL, '2019-01-27 23:49:53', '2019-01-27 23:49:53', NULL),
(74, 'manage-service', 'Manage Service Permission', 0, 1, 1, NULL, '2019-01-28 03:46:09', '2019-01-28 03:46:09', NULL),
(75, 'create-service', 'Create Service Permission', 0, 1, 1, NULL, '2019-01-28 03:46:10', '2019-01-28 03:46:10', NULL),
(76, 'store-service', 'Store Service Permission', 0, 1, 1, NULL, '2019-01-28 03:46:10', '2019-01-28 03:46:10', NULL),
(77, 'edit-service', 'Edit Service Permission', 0, 1, 1, NULL, '2019-01-28 03:46:10', '2019-01-28 03:46:10', NULL),
(78, 'update-service', 'Update Service Permission', 0, 1, 1, NULL, '2019-01-28 03:46:10', '2019-01-28 03:46:10', NULL),
(79, 'delete-service', 'Delete Service Permission', 0, 1, 1, NULL, '2019-01-28 03:46:10', '2019-01-28 03:46:10', NULL),
(80, 'manage-testmod', 'Manage Testmod Permission', 0, 1, 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51', NULL),
(81, 'create-testmod', 'Create Testmod Permission', 0, 1, 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51', NULL),
(82, 'store-testmod', 'Store Testmod Permission', 0, 1, 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51', NULL),
(83, 'edit-testmod', 'Edit Testmod Permission', 0, 1, 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51', NULL),
(84, 'update-testmod', 'Update Testmod Permission', 0, 1, 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51', NULL),
(85, 'delete-testmod', 'Delete Testmod Permission', 0, 1, 1, NULL, '2019-02-08 04:58:51', '2019-02-08 04:58:51', NULL),
(86, 'manage-banner', 'Manage Banner Permission', 0, 1, 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10', NULL),
(87, 'create-banner', 'Create Banner Permission', 0, 1, 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10', NULL),
(88, 'store-banner', 'Store Banner Permission', 0, 1, 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10', NULL),
(89, 'edit-banner', 'Edit Banner Permission', 0, 1, 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10', NULL),
(90, 'update-banner', 'Update Banner Permission', 0, 1, 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10', NULL),
(91, 'delete-banner', 'Delete Banner Permission', 0, 1, 1, NULL, '2019-02-11 00:44:10', '2019-02-11 00:44:10', NULL),
(92, 'manage-faqcategory', 'Manage Faqcategory Permission', 0, 1, 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38', NULL),
(93, 'create-faqcategory', 'Create Faqcategory Permission', 0, 1, 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38', NULL),
(94, 'store-faqcategory', 'Store Faqcategory Permission', 0, 1, 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38', NULL),
(95, 'edit-faqcategory', 'Edit Faqcategory Permission', 0, 1, 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38', NULL),
(96, 'update-faqcategory', 'Update Faqcategory Permission', 0, 1, 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38', NULL),
(97, 'delete-faqcategory', 'Delete Faqcategory Permission', 0, 1, 1, NULL, '2019-02-11 05:43:38', '2019-02-11 05:43:38', NULL),
(98, 'manage-contact', 'Manage Contact Permission', 0, 1, 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31', NULL),
(99, 'create-contact', 'Create Contact Permission', 0, 1, 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31', NULL),
(100, 'store-contact', 'Store Contact Permission', 0, 1, 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31', NULL),
(101, 'edit-contact', 'Edit Contact Permission', 0, 1, 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31', NULL),
(102, 'update-contact', 'Update Contact Permission', 0, 1, 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31', NULL),
(103, 'delete-contact', 'Delete Contact Permission', 0, 1, 1, NULL, '2019-02-11 08:06:31', '2019-02-11 08:06:31', NULL),
(104, 'manage-preference', 'Manage Preference Permission', 0, 1, 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52', NULL),
(105, 'create-preference', 'Create Preference Permission', 0, 1, 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52', NULL),
(106, 'store-preference', 'Store Preference Permission', 0, 1, 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52', NULL),
(107, 'edit-preference', 'Edit Preference Permission', 0, 1, 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52', NULL),
(108, 'update-preference', 'Update Preference Permission', 0, 1, 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52', NULL),
(109, 'delete-preference', 'Delete Preference Permission', 0, 1, 1, NULL, '2019-02-13 04:17:52', '2019-02-13 04:17:52', NULL),
(110, 'manage-enquiry', 'Manage Enquiry Permission', 0, 1, 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00', NULL),
(111, 'create-enquiry', 'Create Enquiry Permission', 0, 1, 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00', NULL),
(112, 'store-enquiry', 'Store Enquiry Permission', 0, 1, 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00', NULL),
(113, 'edit-enquiry', 'Edit Enquiry Permission', 0, 1, 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00', NULL),
(114, 'update-enquiry', 'Update Enquiry Permission', 0, 1, 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00', NULL),
(115, 'delete-enquiry', 'Delete Enquiry Permission', 0, 1, 1, NULL, '2019-02-15 07:11:00', '2019-02-15 07:11:00', NULL),
(116, 'manage-review', 'Manage Review Permission', 0, 1, 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58', NULL),
(117, 'create-review', 'Create Review Permission', 0, 1, 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58', NULL),
(118, 'store-review', 'Store Review Permission', 0, 1, 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58', NULL),
(119, 'edit-review', 'Edit Review Permission', 0, 1, 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58', NULL),
(120, 'update-review', 'Update Review Permission', 0, 1, 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58', NULL),
(121, 'delete-review', 'Delete Review Permission', 0, 1, 1, NULL, '2019-02-19 04:06:58', '2019-02-19 04:06:58', NULL),
(122, 'manage-usersubscriptionplan', 'Manage Usersubscriptionplan Permission', 0, 1, 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10', NULL),
(123, 'create-usersubscriptionplan', 'Create Usersubscriptionplan Permission', 0, 1, 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10', NULL),
(124, 'store-usersubscriptionplan', 'Store Usersubscriptionplan Permission', 0, 1, 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10', NULL),
(125, 'edit-usersubscriptionplan', 'Edit Usersubscriptionplan Permission', 0, 1, 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10', NULL),
(126, 'update-usersubscriptionplan', 'Update Usersubscriptionplan Permission', 0, 1, 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10', NULL),
(127, 'delete-usersubscriptionplan', 'Delete Usersubscriptionplan Permission', 0, 1, 1, NULL, '2019-02-25 08:12:10', '2019-02-25 08:12:10', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(35, 2, 2),
(36, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_user`
--

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`) VALUES
(41, 24, 2),
(49, 33, 2),
(45, 28, 2),
(53, 37, 2),
(37, 7, 2),
(57, 41, 2),
(39, 16, 2),
(47, 30, 2),
(43, 26, 2),
(51, 35, 2),
(35, 2, 2),
(55, 39, 2),
(40, 20, 2),
(48, 31, 2),
(44, 27, 2),
(52, 36, 2),
(36, 6, 2),
(56, 40, 2),
(61, 45, 2),
(66, 2, 5),
(64, 48, 2),
(67, 2, 6),
(50, 34, 2),
(46, 29, 2),
(42, 25, 2),
(63, 47, 2),
(62, 46, 2),
(54, 38, 2),
(38, 8, 2),
(58, 42, 2),
(59, 43, 2),
(60, 44, 2),
(65, 2, 4),
(34, 2, 3),
(68, 2, 7),
(69, 2, 8),
(80, 2, 9),
(71, 2, 10),
(87, 2, 11),
(73, 2, 12),
(74, 2, 13),
(77, 2, 14),
(76, 2, 15),
(78, 2, 16),
(81, 2, 17),
(82, 2, 18),
(83, 2, 19),
(84, 2, 20),
(85, 2, 21),
(86, 2, 22),
(146, 2, 23),
(263, 2, 24),
(92, 2, 25),
(94, 2, 26),
(95, 2, 27),
(96, 2, 28),
(136, 2, 29),
(102, 2, 30),
(261, 2, 31),
(264, 2, 32),
(105, 2, 33),
(114, 2, 34),
(137, 2, 35),
(260, 2, 36),
(109, 2, 37),
(110, 2, 38),
(115, 2, 39),
(118, 2, 40),
(130, 2, 41),
(134, 2, 42),
(135, 2, 43),
(147, 2, 44),
(150, 2, 45),
(149, 2, 46),
(151, 2, 47),
(225, 2, 48),
(155, 2, 49),
(167, 2, 50),
(266, 2, 51),
(267, 2, 52),
(159, 2, 53),
(160, 2, 54),
(179, 2, 55),
(163, 2, 56),
(165, 2, 57),
(171, 2, 58),
(172, 2, 59),
(173, 2, 60),
(178, 2, 61),
(175, 2, 62),
(176, 2, 63),
(177, 2, 64),
(180, 2, 65),
(182, 2, 66),
(242, 2, 67),
(186, 2, 68),
(216, 2, 69),
(217, 2, 70),
(218, 2, 71),
(219, 2, 72),
(220, 2, 73),
(221, 2, 74),
(222, 2, 75),
(224, 2, 76),
(223, 2, 77),
(226, 2, 78),
(228, 2, 79),
(0, 2, 80),
(230, 2, 81),
(231, 2, 82),
(232, 2, 83),
(233, 2, 84),
(234, 2, 85),
(235, 2, 86),
(236, 2, 87),
(206, 2, 88),
(207, 2, 89),
(208, 2, 90),
(209, 2, 91),
(210, 2, 92),
(211, 2, 93),
(212, 2, 94),
(213, 2, 95),
(214, 2, 96),
(215, 2, 97),
(238, 2, 98),
(245, 2, 99),
(241, 2, 100),
(244, 2, 101),
(246, 2, 102),
(248, 2, 103);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `policy_types`
--

CREATE TABLE `policy_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `policy_types`
--

INSERT INTO `policy_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Privacy Policy', 1, '2019-02-04 09:05:28', '2019-02-04 09:05:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `redeems`
--

CREATE TABLE `redeems` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `bank_account_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(5,2) NOT NULL,
  `msg` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `redeems`
--

INSERT INTO `redeems` (`id`, `user_id`, `bank_account_id`, `amount`, `msg`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 28, 1, '12.00', '', 1, '2019-07-12 23:02:20', '2019-10-24 21:34:21', NULL),
(2, 28, 3, '999.99', 'Gufy', 0, '2019-07-15 09:38:54', '2019-07-15 09:38:54', NULL),
(3, 28, 5, '999.99', 'Gegd', 0, '2019-07-15 09:44:41', '2019-07-15 09:44:41', NULL),
(4, 28, 5, '999.99', 'Hithis istest', 0, '2019-07-15 09:54:33', '2019-07-15 09:54:33', NULL),
(5, 28, 5, '999.99', 'Fbvvv', 0, '2019-07-22 00:44:18', '2019-07-22 00:44:18', NULL),
(6, 28, 5, '999.99', 'Test msg', 0, '2019-07-22 00:45:08', '2019-07-22 00:45:08', NULL),
(7, 28, 5, '205.96', 'Hello I', 0, '2019-07-22 02:21:40', '2019-07-22 02:21:40', NULL),
(8, 28, 5, '205.96', 'T', 0, '2019-07-22 02:58:25', '2019-07-22 02:58:25', NULL),
(9, 28, 6, '756.16', 'please redeem this to my given account', 1, '2019-07-23 07:16:12', '2019-07-23 07:17:40', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `referrals`
--

CREATE TABLE `referrals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amt` decimal(5,2) NOT NULL,
  `refer_to` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `referrals`
--

INSERT INTO `referrals` (`id`, `user_id`, `amt`, `refer_to`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 28, '10.00', 36, 1, NULL, NULL, NULL),
(2, 28, '10.00', 49, 1, '2019-07-19 07:41:23', '2019-07-19 07:41:23', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` tinyint(1) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`id`, `photo`, `name`, `grade`, `message`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1557519446download.png', 'David Clark', 5, '<p>Can\'t wait!</p>', 1, '2019-02-19 05:37:15', '2019-05-11 03:17:26', NULL),
(3, '1557519470download.png', 'Julia Młynarski', 5, '<p>I look forward to use this site to meet others</p>', 1, '2019-02-19 08:15:38', '2019-05-11 03:17:50', NULL),
(4, '1557519433download.png', 'Adam Richards', 4, '<p>&nbsp; I have just setup an account and am excited for the sites launch. The websites look really good and I just can\'t wait to try it out :) . I didn\'t give 5 stars as the site hasn\'t launched yet and so would be wrong to give it 5 stars at this stage.&nbsp;&nbsp;</p>', 1, '2019-02-19 08:16:49', '2019-05-11 03:17:13', NULL),
(5, '1557519411download.png', 'Amy Faulds', 5, '<p>&nbsp; The site is Amazing! I would highly recommend&nbsp;&nbsp;</p>', 1, '2019-05-11 03:16:51', '2019-05-11 03:20:44', NULL),
(6, '1557519830download.png', 'Peachy', 3, '<p>Good site for meeting people. I given 3 star as haven\'t yet found match, but when I do I will give 5*****</p>', 1, '2019-05-11 03:23:50', '2019-05-11 03:23:50', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT 0,
  `sort` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `all`, `sort`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrator', 1, 1, 1, 1, NULL, '2019-01-22 00:26:40', '2019-01-22 00:26:40', NULL),
(2, 'Vendor', 0, 2, 0, 1, 1, '2019-01-22 00:26:40', '2019-01-22 00:32:35', NULL),
(3, 'Customer', 0, 3, 0, 1, 1, '2019-01-22 00:26:40', '2019-01-22 08:27:15', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(86, 23, 3),
(222, 24, 2),
(191, 28, 3),
(220, 31, 2),
(223, 32, 2),
(198, 33, 3),
(215, 36, 3),
(204, 37, 3),
(206, 39, 3),
(207, 40, 3),
(208, 41, 3),
(209, 42, 3),
(210, 43, 3),
(211, 44, 3),
(216, 45, 3),
(217, 46, 3),
(218, 47, 3),
(219, 48, 3),
(224, 49, 3),
(227, 51, 2),
(229, 52, 2),
(230, 53, 2),
(231, 54, 3),
(232, 55, 3),
(233, 56, 3),
(234, 57, 3),
(235, 58, 3),
(236, 59, 3),
(237, 60, 3),
(238, 61, 3),
(239, 62, 3),
(240, 63, 3),
(244, 67, 3),
(0, 80, 3),
(252, 79, 2),
(254, 81, 3),
(255, 82, 3),
(2, 89, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `services`
--

CREATE TABLE `services` (
  `id` int(10) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `disc_perc` varchar(50) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `offer_type` tinyint(1) NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `services`
--

INSERT INTO `services` (`id`, `vendor_id`, `name`, `title`, `image`, `image_path`, `description`, `url`, `start_date`, `end_date`, `disc_perc`, `coupon_code`, `offer_type`, `is_featured`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 24, 'Mobile', 'Get 10% off', '1561827124s.png', 'http://fako.projectstatus.in/storage/app/public/img/offer/1561827124s.png', '10% off', 'http://127.0.0.1:8000/vendor/show-offer', '2019-06-28 18:30:00', '2019-07-05 18:30:00', '10', 'm1o', 1, 2, 1, '2019-06-19 16:46:55', '2019-06-29 12:22:04', NULL),
(2, 32, 'shirt', '12% discount at every purchase', '1561766277sindoh_temp_13.jpg', 'http://fako.projectstatus.in/storage/app/public/img/offer/1561766277sindoh_temp_13.jpg', '12% discount at every purchase', NULL, '2019-06-29 00:01:23', '2019-07-26 18:30:00', '12', 'ts12', 2, 2, 1, '2019-06-28 19:27:57', '2019-06-28 19:31:23', NULL),
(3, 24, '12 percent', '12% blockbuster discount', '1561828163productboard.png', 'http://fako.projectstatus.in/storage/app/public/img/offer/1561828163productboard.png', '12% blockbuster discount', 'http://127.0.0.1:8000/vendor/offerform', '2019-06-30 18:30:00', '2019-07-05 18:30:00', '12', 's12', 1, 2, 1, '2019-06-29 12:39:23', '2019-06-29 13:19:32', NULL),
(4, 24, 'enrich', 'Summer kickoff event', '1561828392work-title-copy.jpg', 'http://fako.projectstatus.in/storage/app/public/img/offer/1561828392work-title-copy.jpg', 'Summer kickoff event', 'http://127.0.0.1:8000/vendor/offerform', '2019-06-28 18:30:00', '2019-07-05 18:30:00', '20', '20skof', 1, 2, 1, '2019-06-29 12:43:12', '2019-06-29 12:43:12', NULL),
(5, 24, 'lance', 'Up to 25% off with our code', '1561830721Lance-business-cards-02-960x640.jpg', 'http://fako.projectstatus.in/storage/app/public/img/offer/1561830721Lance-business-cards-02-960x640.jpg', 'Up to 25% off with our code', 'http://127.0.0.1:8000/vendor/offerform', '2019-06-28 18:30:00', '2019-07-05 18:30:00', '25', 'qa25', 2, 2, 1, '2019-06-29 13:22:01', '2019-06-29 13:22:48', NULL),
(6, 51, '20% Off On Beauty Care', 'SunScreen Lotion', '1563872745home.jpg', 'http://fako.projectstatus.in/storage/app/public/img/offer/1563872745home.jpg', 'These are the test details', 'http://test.com/', '2019-07-22 18:30:00', '2019-07-29 18:30:00', '20', '123456', 1, 1, 1, '2019-07-23 04:35:45', '2019-07-23 04:46:09', NULL),
(7, 24, 'test offer', '20% discount', '1563880799images.jpg', 'http://fako.projectstatus.in/storage/app/public/img/offer/1563880799images.jpg', 'test offer details', 'http://test.com/', '2019-07-22 18:30:00', '2019-07-29 18:30:00', '20', '123456', 1, 2, 1, '2019-07-23 06:49:59', '2019-07-23 06:50:40', NULL),
(8, 24, 'First Offer', 'Firoffer', '1570460907s.png', 'http://fako.projectstatus.in/storage/app/public/img/offer/1570460907s.png', 'this is first offer', 'http://http://fako.projectstatus.in/firstoffer', '2019-10-06 18:30:00', '2019-10-08 18:30:00', '10', 'Foffer', 1, 2, 1, '2019-10-07 10:38:27', '2019-10-07 13:04:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `service_categories`
--

INSERT INTO `service_categories` (`id`, `name`, `image`, `image_path`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '1561827949ELECTRONICS1.jpg', 'http://fako.projectstatus.in/storage/app/public/img/category/1561827949ELECTRONICS1.jpg', 1, '2019-06-29 17:05:49', '2019-06-29 12:35:49'),
(2, 'Clothing', '1561765080minimalistwardrobe.jpg', 'http://fako.projectstatus.in/storage/app/public/img/category/1561765080minimalistwardrobe.jpg', 1, '2019-06-28 19:08:00', '2019-06-28 19:08:00'),
(3, 'Shoes', '1561765151main-qimg-12e085fca358d910fea084a62b407b42.png', 'http://fako.projectstatus.in/storage/app/public/img/category/1561765151main-qimg-12e085fca358d910fea084a62b407b42.png', 1, '2019-06-28 19:09:11', '2019-06-28 19:09:11'),
(4, 'Health and beauty', '1561765224Top_10_moisturizers_1.jpg', 'http://fako.projectstatus.in/storage/app/public/img/category/1561765224Top_10_moisturizers_1.jpg', 1, '2019-06-28 19:10:24', '2019-06-28 19:10:24'),
(5, 'Eyewear', '1561765650download.jpg', 'http://fako.projectstatus.in/storage/app/public/img/category/1561765650download.jpg', 1, '2019-06-28 19:17:30', '2019-06-28 19:17:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service_map_categories`
--

CREATE TABLE `service_map_categories` (
  `id` int(10) NOT NULL,
  `service_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `service_map_categories`
--

INSERT INTO `service_map_categories` (`id`, `service_id`, `category_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4),
(4, 5, 5),
(5, 6, 4),
(6, 7, 2),
(7, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('eiEGJaR6c08VNGz4qO0Tv56JJaPY3BvYrti9aBMn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'ZXlKcGRpSTZJbGR1VVNzclNsQXdUWGxTSzBJeGNXVkhYQzlMZUhSUlBUMGlMQ0oyWVd4MVpTSTZJbVpIWlV3NFJrZE1lV1Z0UVhOVmRUaEJTWFZvWEM5RlZFdEpVVzEzTjBSdk1rOVNlbWsyVUZkM1QwUlNaVE5oVjJOSU9XUXhSR016WlVsMVJXZHJVVTF0U1VneFFUTmNMelU1TlRaa2FsZHhjRVZXTVV0WlRHTlJibWhMTlVJMVoxazJORlp0SzJ0eVoydE1YQzlOVGtOM2FIRnBabXRJVFRRMFp6WkRTbHd2UzB4clhDODFRa281ZWt4VmRVZEJXR2hQVFV4Uk5UZFdhbFpxZDJSbGNqbHlVRXg0VEVOV1pEVnVOREZTVDBoRFp6UkRha05wV0VZNFFteHVSVGx5Y0ZCeE9HUmNMMm81TjNOVk4ySjZjblJ5WkZOd00xcE1TVkE1UmxZemNVaFJlVGhqWm1sdWNtcFhaR3R3VkRObmFEQlNWalZJUm5ObFNuWnJXSGtyYlhKVVFqbFpTbEl5ZFRjelNXVTFjakJjTHl0VmJrcHRhR1owT0V0elRWZEZiMjRyUWxSNU5uZDJkbEZPVDFOcFhDOWpPRnd2WTFaemRWRlpPRWxHY0dJMVQwRmlYQzlWU1hObWRscERXWFJKWWx3dmQwaFhhMGxzVm0xY0wxUjNOVU0wWlhsSlkwOXBVRTFUU1dKY0wyUjVNMjF6VnpsV1IyWmFTMFowWEM5dGJXNUxWVTQxYURJMU1FZzFVVFE1UVZJeGQxd3ZWblU0YUU5VFNteFBSbHBPY0RKY0x6Tm5TbkJYYkZobmVXTm5VamwzUjBkRU5VdFdTa2Q2TVU5TFRVZzBibXBoTkN0UmJsQllRMlpVV0VKVVIxRkJUMHR5WWsxVFFtOTNlREpjTHpsc1JVcEZNVVp3ZEU5bVNWTllRbWs1VkVWMFVHOXFURWRIY2xCRmEyWTNNSGxpUnpOY0wyUktVMk5SZDIxV1dFbDNiWE54YUhRd2VVZG1abkJ4ZG5SM1VFOWFhMXd2VURoaGFFWjJlVXhKZFVaQ2JtSjRiRUpDTTJaV1FqUTlJaXdpYldGaklqb2lNbVEwTjJVMlpqSmhaVFpoTVRnd1pERmhNak13TUdFd056ZzNZV1UzWm1RMVpEVTRaRFV3TURVelpXSXhNekk0WkdJM1pUSmxPVGRoWTJZeE5tRmtNeUo5', 1572260377);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_business_info` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_status` tinyint(1) NOT NULL,
  `company_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disclaimer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_security` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `limit_per_page` tinyint(4) DEFAULT 0,
  `currency_symbol` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currencycodes` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_amt` decimal(10,0) NOT NULL,
  `referral_status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `seo_title`, `seo_keyword`, `seo_description`, `contact_name`, `contact_business_info`, `contact_description`, `contact_img`, `contact_status`, `company_contact`, `company_email`, `company_address`, `from_name`, `from_email`, `facebook`, `instagram`, `twitter`, `google`, `youtube`, `copyright_text`, `footer_text`, `text_content`, `terms`, `disclaimer`, `google_analytics`, `smtp_address`, `smtp_username`, `smtp_password`, `smtp_port`, `smtp_security`, `limit_per_page`, `currency_symbol`, `currencycodes`, `referral_amt`, `referral_status`, `created_at`, `updated_at`) VALUES
(1, '1561754591dlz4me-logo.jpg', '1570477519favicon-16x16.png', 'FAKO', NULL, NULL, 'Dfgfg', 'PPPFguyjgyhmudtyj rthppp', 'PPPErth wy eh wqgwger erf', '1550141745Lighthouse.jpg', 1, '0700654035', 'fakoadmin@yopmail.com', NULL, 'Admin', 'wwwsmtp@24livehost.com', 'https://www.facebook.com', 'https://www.insta.org', 'https://www.twitter.com/username', 'http://google.com', 'http://youtube.com', '2019 FAKO. All rights reserved.', 'FAKO, Get More Discounts', 'a:2:{s:11:\"footer_text\";s:24:\"FAKO, Get More Discounts\";s:14:\"copyright_text\";s:31:\"2019 FAKO. All rights reserved.\";}', '<p>T &amp; C Content</p>', '<p>Privacy Policy Content</p>', NULL, '', '', '', '587', NULL, 50, '£', 'a:5:{s:6:\"dollor\";s:1:\"$\";s:3:\"EUR\";s:3:\"EUR\";s:3:\"CFA\";s:3:\"CFA\";s:3:\"NGN\";s:3:\"NGN\";s:3:\"GHS\";s:3:\"GHS\";}', '10', 1, NULL, '2019-10-07 15:15:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sms_verifications`
--

CREATE TABLE `sms_verifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_number` varchar(191) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sms_verifications`
--

INSERT INTO `sms_verifications` (`id`, `contact_number`, `code`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '+9351614931', '8578', 'pending', '2019-07-02 05:59:08', '2019-07-02 05:59:08', NULL),
(2, '+919610505499', '4614', 'verified', '2019-07-02 06:01:22', '2019-07-02 06:02:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_logins`
--

CREATE TABLE `social_logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `provider` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_logins`
--

INSERT INTO `social_logins` (`id`, `user_id`, `provider`, `provider_id`, `token`, `avatar`, `created_at`, `updated_at`) VALUES
(3, 36, 'google', '115164990387527431846', NULL, NULL, '2019-07-01 09:58:51', '2019-07-01 09:58:51'),
(4, 37, 'facebook', '102886344348524', NULL, NULL, '2019-07-01 10:11:38', '2019-07-01 10:11:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `braintree_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `braintree_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_plan`, `braintree_id`, `braintree_plan`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 23, 'main', 'sub_Ej57U73nfZHaES', 'plan_EguyPRPw7pQbqj', '', '', 1, NULL, NULL, '2019-03-19 15:05:40', '2019-03-19 15:05:40'),
(2, 55, 'main', 'sub_EkEGA7AdUmyrAQ', 'plan_EguxIwIqrqFKir', '', '', 1, NULL, NULL, '2019-03-22 16:37:01', '2019-03-22 16:37:01'),
(3, 55, 'main', 'sub_EkEMbxHpYeTLuw', 'plan_EguyPRPw7pQbqj', '', '', 1, NULL, NULL, '2019-03-22 16:42:28', '2019-03-22 16:42:28'),
(4, 48, 'main', 'sub_F2KVKBTiOXGcbi', 'plan_Ej9bAJxNDHOsxK', '', '', 1, NULL, NULL, '2019-05-10 00:15:28', '2019-05-10 00:15:28'),
(5, 80, 'main', 'sub_F2N47YXguWm1AP', 'plan_Ej9bAJxNDHOsxK', '', '', 1, NULL, NULL, '2019-05-10 02:54:55', '2019-05-10 02:54:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `usercount` int(11) NOT NULL,
  `duration` int(5) DEFAULT 12,
  `stripe_id` varchar(50) DEFAULT NULL,
  `strip_test_id` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `subscription_plans`
--

INSERT INTO `subscription_plans` (`id`, `title`, `price`, `usercount`, `duration`, `stripe_id`, `strip_test_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, '12 Months', '69.99', 50, 12, 'plan_Ej9bAJxNDHOsxK', 'plan_EguyPRPw7pQbqj', 1, '2019-02-18 03:41:36', '2019-05-12 01:29:15', NULL),
(3, '1 Month', '9.99', 50, 1, 'plan_Ej9eKrhwneZi3f', 'plan_EguxIwIqrqFKir', 1, '2019-02-22 23:14:49', '2019-05-12 01:28:58', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subscription_plan_features`
--

CREATE TABLE `subscription_plan_features` (
  `id` int(11) NOT NULL,
  `subscription_plan_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `subscription_plan_features`
--

INSERT INTO `subscription_plan_features` (`id`, `subscription_plan_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Able to send unlimited messages.', '2019-05-11 18:29:15', '2019-05-12 01:29:15'),
(2, 2, 'You will become a member of the Eagermeets Club, Meaning you could win prizes, Such as luxury holidays.', '2019-05-11 18:29:15', '2019-05-12 01:29:15'),
(3, 3, 'Able to use all parts of the site.', '2019-05-11 18:28:58', '2019-05-12 01:28:58'),
(5, 7, 'Good to see youGood to see youGood to see youGood to see youGood to see youGood to see', '2019-02-27 08:53:53', '2019-02-27 03:23:53'),
(6, 7, 'testing overall process', '2019-02-27 08:53:53', '2019-02-27 03:23:53'),
(7, 8, 'Very good plan', '2019-03-01 12:55:45', '2019-03-01 07:25:45'),
(8, 9, 'no', '2019-03-01 12:55:55', '2019-03-01 07:25:55'),
(9, 2, 'Free and priority entry to dating events that we will be running this year.', '2019-05-11 18:29:15', '2019-05-12 01:29:15'),
(10, 3, 'Able to send unlimited messages.', '2019-05-11 18:28:58', '2019-05-12 01:28:58'),
(11, 2, 'Able to use all parts of the site.', '2019-05-11 18:29:15', '2019-05-12 01:29:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` int(10) NOT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `is_latest` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `type_id`, `title`, `description`, `is_latest`, `status`, `created_at`, `updated_at`) VALUES
(6, 5, 'Sample Privacy Policy', '<p>Sample Entry</p>', 1, 1, '2019-02-04 09:08:42', '2019-02-04 09:08:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `testmods`
--

CREATE TABLE `testmods` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `third_party_responses`
--

CREATE TABLE `third_party_responses` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_amount` decimal(5,2) NOT NULL,
  `offer_percentage` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `offer_amount` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `third_party_responses`
--

INSERT INTO `third_party_responses` (`id`, `token`, `category`, `purchase_amount`, `offer_percentage`, `offer_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NFKRmnlnt8zgRqWd', '', '100.00', '10.00', '10.00', 1, '2019-07-04 04:47:08', '2019-07-04 04:47:08'),
(2, 'GTLe2GvLyQ3d62iF', 'Electronics', '831.00', '10', '83.10', 1, '2019-07-15 09:29:42', '2019-07-15 09:29:42'),
(3, 'xcec64Ou0KitlQX5', 'Health and beauty', '885.00', '12', '106.20', 1, '2019-07-22 05:05:37', '2019-07-22 05:05:37'),
(4, '4IpcX4vjlnqf9kvG', 'Health and beauty', '195.00', '20', '39.00', 1, '2019-07-23 06:15:59', '2019-07-23 06:15:59'),
(5, '4mgC3rdVzqTFPEcY', 'Health and beauty', '913.00', '20', '182.60', 1, '2019-07-23 06:24:09', '2019-07-23 06:24:09'),
(6, 'xPVy2Nvq77NEWQXz', 'Health and beauty', '513.00', '20', '102.60', 1, '2019-07-23 06:37:04', '2019-07-23 06:37:04'),
(7, 'hEBEq57ZEJJ4URo6', 'Clothing', '599.00', '20', '119.80', 1, '2019-07-23 07:11:39', '2019-07-23 07:11:39'),
(8, '964Rhy39tvzhopBp', 'Electronics', '829.00', '10', '82.90', 1, '2019-10-04 16:59:17', '2019-10-04 16:59:17'),
(9, 'mavUOinxvWMUeAiQ', 'Health and beauty', '214.00', '20', '42.80', 1, '2019-10-07 16:33:40', '2019-10-07 16:33:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `profilepic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picapproved` tinyint(1) DEFAULT 0,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `search_radius` int(5) DEFAULT 5,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `refer_by` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `is_term_accept` tinyint(1) NOT NULL DEFAULT 0 COMMENT ' 0 = not accepted,1 = accepted',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `aboutme` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `card_brand` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `braintree_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adminnote` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `profilepic`, `picapproved`, `email`, `phone`, `password`, `address`, `address_2`, `city`, `state`, `country`, `zip`, `latitude`, `longitude`, `search_radius`, `status`, `confirmation_code`, `mobile_code`, `referral_code`, `refer_by`, `confirmed`, `is_term_accept`, `remember_token`, `accountname`, `dob`, `age`, `aboutme`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `braintree_id`, `paypal_email`, `adminnote`) VALUES
(1, 'Admin', 'Admin', NULL, '1551172527about-img.jpg', 1, 'admin@gmail.com', NULL, '$2y$10$pqa6Wb3KvIVlrdJtMrjXcOhquj1kYT5MRThddHnaGI5NZGC.QgLei', NULL, NULL, NULL, NULL, NULL, NULL, 56.1907058, -3.9488461999999345, 5, 1, '9a04dee61ed5f8f188f3f517d3286a26', NULL, NULL, '', 1, 0, 'Ti9RB9vrLAWXg2JWq1Nm8UmVbeiTawV0cnSPKnVxuH5A6hbtZj20d9Nciu9u', NULL, NULL, NULL, NULL, 1, 1, '2019-01-22 00:26:40', '2019-05-24 05:18:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'First', 'User', NULL, '1551275346home.jpg', 1, 'firstuser@yopmail.com', '1234567890', '$2y$10$pqa6Wb3KvIVlrdJtMrjXcOhquj1kYT5MRThddHnaGI5NZGC.QgLei', 'rtdhdrh drty', 'ry65bndrth', 'Fxtgbn', 'Dsrtgrt', 'Australia', '345343', 56.1907058, -3.9488461999999345, 25, 1, '3746313a3879e68c734b6bd4f04ea16f', NULL, NULL, '', 1, 0, 'qPfACovMkOK2H7XJgI4uLvTKY1tmOptkMaJa3clOi05skblz9MIQZDqVp1XH', 'TestName1', '14/01/1993', 26, 'Sg srrtgb', 1, 23, '2019-01-31 09:46:21', '2019-04-01 00:43:52', NULL, 'cus_Ej9i9fg21lEqu1', 'Visa', '4242', NULL, NULL, NULL, 'test note'),
(24, 'Testds', 'TestUsr', NULL, '1561764101unnamed.png', 1, 'testds@yopmail.com', '6586785658', '$2y$10$euFg/8cK02Oj8gEYGMC20eGPTlCihGEBpB3o72iZJ9JpUuwGHssvW', 'C Scheme, Ashok Nagar, Jaipur, Rajasthan, India', 'test addr line2', 'Douala', 'Littoral', 'Cameroon', '00237', 4.0510564, 9.767868700000008, 5, 1, '99d6bff3b59c167de3b345a055f7c796', NULL, NULL, '', 1, 0, 'e8PMGiTozKv8B9iR4q7wfHfinvBMhpX5RDUyrlnTOTkC5hCPfkPOCg0mN7rm', 'Testds_TestUsr', '20/01/2005', 14, NULL, NULL, NULL, '2019-05-28 05:17:27', '2019-07-19 02:41:53', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hello'),
(28, 'Demo', 'User', 1, '', 0, 'fakotest@yopmail.com', '7894561329', '$2y$10$3XArHdOAJtEHOXk43gED4en5uz4fsU0somXIYnUstHVDLQRTuc/GC', 'test address', 'Demo', 'User', 'Rajasthan', 'India', '123458', NULL, NULL, 5, 1, '155add691c03e3a291b13c5163bdf094', NULL, 'NE1It7', '', 1, 0, '7oHcjbsQHoXrCDy0v6Suh2p1E7q1eQUaa3JNQviSEyMS4JHirRFUhaHCvgOB', 'fakotest_user', '01/01/1990', NULL, 'Dummy data', NULL, 28, '2019-06-14 02:28:15', '2019-10-07 12:59:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'test', '123', NULL, '1561763995images.jpg', 1, 'test12@yopmail.com', '7894561239', '$2y$10$jr2vwNzo0fUZQIqkE8aTpe3G39MRjDG.8LmxleD7uXtpasD1hULaK', 'MNIT Back Gate Road, Jhalana Gram, Malviya Nagar, Jaipur, Rajasthan, India', NULL, 'Jaipur', 'RJ', 'India', '302017', 26.8590973, 75.81628479999995, 5, 1, '', NULL, NULL, '', 1, 0, NULL, 'test', '20/01/2006', 13, NULL, NULL, NULL, '2019-06-17 07:56:13', '2019-07-19 02:41:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hello'),
(32, 'Fako', 'Vendor', NULL, '1561764149Coin_Bronze.png', 1, 'fakovendor@yopmail.com', '78456123', '$2y$10$Tyt4Dziw/xKgM66i5jG.bOgIKokFBcLmxcnbqiBOUEW/AEM33IXYW', 'Raja Park, Jaipur, Rajasthan, India', 'main road', 'Jaipur', 'RJ', 'India', '302007', NULL, NULL, 5, 1, 'e0bb7b65983ed92f1c4e0074e4b9c6cf', NULL, NULL, '', 1, 0, 'hLc2iPs8DuywcBEreuyJAt9SiIlNJAh0TvW2JBeOMIKx5w4ZDJUCn3eCmmV7', 'fako_vendor', '13/01/2006', 13, NULL, NULL, 32, '2019-06-19 16:19:35', '2019-10-28 03:37:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hello'),
(33, 'Dh', 'Xgxhxy', NULL, '', 0, 'sar1@yopmail.com', '86852524242', '$2y$10$fxfHoT7j9ikDHHf0txGa..4B25KChedlMNmZ3XZRBDG6HWxQBx1.e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '34921', NULL, NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-06-28 08:18:10', '2019-06-28 12:47:56', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Sarjeet', 'Saharan', NULL, '', 0, 'sarjeetshrn50@gmail.com', '9876543210', NULL, NULL, NULL, NULL, NULL, NULL, '123456', NULL, NULL, 5, 1, NULL, NULL, NULL, '', 1, 0, NULL, 'Sarjeet Saharan', '01/01/2002', 17, NULL, NULL, NULL, '2019-07-01 09:58:51', '2019-07-10 07:04:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test'),
(37, 'Joe Alchhadgehfig Seligsteinman', 'Joe Alchhadgehfig Seligsteinman', NULL, '', 0, 'lecetbncwv_1561963490@tfbnw.net', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, NULL, NULL, NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-01 10:11:38', '2019-07-01 10:11:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'f', 'Dots', NULL, '', 0, 'sd@rt.oo', '+919079052143', '$2y$10$Ej3bw3eZ6081vXXQECMLnOay6Da7PkJv3nDoIDbLEQAvb/M8tcJLq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '490627', '323544', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 14:38:39', '2019-07-04 14:38:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Hdgd', 'Kddh', NULL, '', 0, 'saz0@yopmail.com', '+919079052143', '$2y$10$qBjt8U.YkG8Pd8h35C97vOjpdQBB78Rcz6NCUlp0dMocbNLCcRGIW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '814568', '802743', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 14:40:27', '2019-07-04 14:40:27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Fs', 'Dghcj', NULL, '', 0, 'xz@yopmail.com', '+919086545236', '$2y$10$85D8tWfxad3LO0aTdMbkduD8wluVz6qNttD23eQU.QqXXoAVhE0FW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '435117', '910146', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 14:47:10', '2019-07-04 14:47:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Gsgs', 'Dggd', NULL, '', 0, 'zxx@yopmail.com', '+919079052144', '$2y$10$wqmvS7kbm7kxTCmdQ1PkguCxJD2OUsrBeUzMH8gKXFDtW62XLECym', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '167760', '2863', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 16:10:30', '2019-07-04 16:10:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Rdgg', 'Dcgg', NULL, '', 0, 'zxxz@yopmail.com', '+918568456657', '$2y$10$Kw1.5yhXKLc3sJJzYfrZMuKmSkzkzvAekPYF7i.gJU3dJ/RIRrwGu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '658537', '681564', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 16:14:57', '2019-07-04 16:27:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Cyhc', 'Dyyd', NULL, '', 0, 'sd@gv.jhv', '+918558755895', '$2y$10$RuVGK/YEF7QODoE0Trm/HukMbipxWYBJHQsZMuDf2lN5cX.0Clqoq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '293072', '726806', NULL, '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-04 16:21:15', '2019-07-04 16:22:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'Dtest', 'Test', NULL, '', 0, 'dtest@yopmail.com', '+919876543210', '$2y$10$oLlSTvtmbnqG5xDubA2HpeyBxxqIBSGT0xBTtu65KLfwoR.ZQgID.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '890007', '190123', NULL, '', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 08:39:58', '2019-07-12 08:44:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Hcfh', 'Fbfh', NULL, '', 0, 'a@yopmail.cc', '+1855888698', '$2y$10$yTzAGH0lt.clDvS6ocXDOu1UMRTgwZXE9LIJESwVpyW3OYvpBvKwi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '202824', '968230', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-12 09:02:57', '2019-07-12 09:03:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Hchc', 'Gdg', NULL, '', 0, 'dff@cc.nm', '+17542745655', '$2y$10$MWWNu7riNnlIbFo2PQoLMeO6oT8KUI54D2o.nQUBdPY3fAj1lwDQq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '648087', '189990', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-15 09:17:08', '2019-07-15 09:23:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Raf', 'Jdhsb', NULL, '', 0, 'sff@bsh.dhsh', '+14545484644', '$2y$10$KrP3PC2xiGMSuFE19seKBeC5bB1BANps.eIw7qJh/Uut6ceCgJXl2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '539882', '682247', NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-15 09:25:21', '2019-07-15 09:25:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(49, 'refer', 'test', NULL, '', 0, 'refertest@yopmail.com', '+916375098554', '$2y$10$AohinjLhko6yADZlDQ05O.dmuh3uHIN0sRnK7K9/mgmxjszZQ.qNa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '895344', '55239', 'aLjmlA', 'NE1It7', 1, 0, NULL, 'refer_test', NULL, NULL, NULL, NULL, NULL, '2019-07-19 07:40:04', '2019-07-19 07:41:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(50, '', '', NULL, '', 0, 'dgtest@yopmail.com', '+919667001597', '$2y$10$tJD8l4AAyJA935pSHnB5Ke12Vsl83Rk5uADZewmEWXuQa78KH6oWC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '8837c511582b13b21c19a13c8f90a2a8', NULL, NULL, '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-07-23 01:35:34', '2019-07-23 01:35:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, 'Dtest', 'Dots', NULL, '1563879136images.jpg', 1, 'dstest@yopmail.com', '5473657365', '$2y$10$F5FSAd9SFLvOC3Gm7j0FT.Pa7OMrJ5yVQAGI/pJrgyXUOzIbjPnZS', 'Airport Road, Chitrakoot Nagar, Jagatpura, Jaipur, Rajasthan, India', NULL, 'Jaipur', 'RJ', 'India', '302029', 26.8241381, 75.83741229999998, 5, 1, '8541e4125256a9b1688187e5e8cce547', NULL, NULL, '', 1, 0, '8A9b7TJW7q98yzezTmHORnppkXuQPSQUh6UCY4dfwDgAq2rRxbw5dimvtzIt', 'Dtest_Dots', '19/01/2007', 12, NULL, NULL, NULL, '2019-07-23 04:23:44', '2019-07-23 06:22:29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'testvendor', 'test', NULL, '', 0, 'testvendor@yopmail.com', '8796585895', '$2y$10$MZmfdfsFkxAqoMa5BR9P5OdZ9XQxs3UXOZaiHwUQgfnHFmPMIOKGS', 'India Gate, New Delhi, Delhi, India', NULL, 'New Delhi', 'DL', 'India', '1105250', 28.6110886, 77.23451840000007, 5, 1, 'e7830541a0394d35f513db50ad5254bb', NULL, NULL, '', 0, 0, NULL, 'testvendor_test', '20/01/2007', 12, NULL, NULL, NULL, '2019-07-23 06:40:48', '2019-07-23 06:42:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 'testnew', 'test', NULL, '', 0, 'testnew@yopmail.com', '457878585698', '$2y$10$H74MuEOL7V1nVewllPSwoegqnxX08RxJSuwDeqWMLUo1Tc81C7dB.', 'India Gate, New Delhi, Delhi, India', 't6est line 2', 'New Delhi', 'DL', 'India', '1105250', NULL, NULL, 5, 1, 'ca17c3ffa680651d6e716f94bee22d1d', NULL, NULL, '', 1, 0, NULL, 'testnew_test', NULL, NULL, NULL, NULL, NULL, '2019-07-23 06:45:53', '2019-07-23 06:46:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(54, 'Dgdh', 'Dgyr', NULL, '', 0, 'ryyr@fufh.sf', '+3765365656556', '$2y$10$5elCdGzopUJJqOqIe5ux2e2TSnT3iPJE/l2NVfXXRVokPCrNDI386', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '259065', '692612', 'FeedWA', 'xg', 0, 0, NULL, 'Dgdh_Dgyr', NULL, NULL, NULL, NULL, NULL, '2019-07-23 06:58:47', '2019-07-23 06:58:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Customer', 'Test', NULL, '', 0, 'testuser@yopmail.com', '+18829009220', '$2y$10$XQk0SZlrbT7/XTJPyxm1J.hqTpeuYzB/tSHtg2TL7Hsy/jlOd7iAq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '784496', '620239', 'LkQfUw', '12345', 0, 0, NULL, 'Customer_Test', NULL, NULL, NULL, NULL, NULL, '2019-07-23 07:00:20', '2019-07-23 07:00:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'testcustomer', 'test', NULL, '', 0, 'newcustomer@yopmail.com', '+1454654754576', '$2y$10$c7zNF4YvhKQ1pE8f/D2rDuApoxIe34y7wN4rKJxM7xHamSr6M0AVe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '739820', '914026', 'P2eX9M', '123456', 1, 0, NULL, 'testcustomer_test', NULL, NULL, NULL, NULL, NULL, '2019-07-23 07:03:25', '2019-07-23 07:06:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Yd', 'Dydyd', NULL, '', 0, '1572250636_xray1@yopmail.com', '+168564542', '$2y$10$Rajkg9IwwHFZetgZCrj6VOu30RA7ZGQnU3dP5AnH9qDR2hr4cJMRK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '658885', '937454', '1nA8fM', 'bxxb', 1, 0, NULL, 'Yd_Dydyd', NULL, NULL, NULL, NULL, NULL, '2019-07-23 07:43:11', '2019-10-28 01:17:16', '2019-10-28 01:17:16', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 'new11', 'cust11', NULL, '', 0, 'newcust11@yopmail.com', '+916375098589', '$2y$10$igpjpClHGyzZOiwIMHHw1OADsgEX7jmIm8ojLpEwa.9nHLiPNY8hq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '388804', '871400', 'JUhzXV', '1nA8fM', 1, 0, NULL, 'new11_cust11', NULL, NULL, NULL, NULL, NULL, '2019-07-23 07:49:47', '2019-07-23 08:52:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 'new', 'custuser', NULL, '', 0, 'newcustuser@yopmail.com', '+916375098516', '$2y$10$Y5btSR7UIk15FdrBHk5Y4uy1k0nwJjOTxDnnLmb9xuGqNsFv5q2H.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '623382', '860429', 'u4k4dk', '', 1, 0, NULL, 'new_custuser', NULL, NULL, NULL, NULL, NULL, '2019-07-23 08:10:37', '2019-07-23 08:11:42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Hfuf', 'Uffu', NULL, '', 0, 'xray2@yopmail.com', '+16886856', '$2y$10$yD3R6jwroJKUJyBXzAHoKO9VMWn2EalXxib.jeKLFVADudaq0VKWm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '145825', '871611', 'aUw2Ph', '', 0, 0, NULL, 'Hfuf_Uffu', NULL, NULL, NULL, NULL, NULL, '2019-07-23 08:25:25', '2019-07-23 08:30:45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 'Chjc', 'Hdfh', NULL, '', 0, 'dhdh@hc.hd', '+189686868', '$2y$10$dxA7Fc1HEGT49ANhPR.kMue2PcBi8gCebCCrx766R7g70l74pLaiK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, '644786', '281384', '37QBMk', '', 1, 0, NULL, 'Chjc_Hdfh', NULL, NULL, NULL, NULL, NULL, '2019-07-23 09:20:55', '2019-10-28 03:56:36', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Sudeep', 'Singh', NULL, '', 0, 'sudeep.panwar@dotsquares.com', '+919635852525', '$2y$10$zuE7nSkLf.uzGmHyCNwA4OpmVOXTJJ/6XA6LFe4yBJ/lpswCTS0Bi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '231495', '557964', 'lYb0i9', '', 0, 0, NULL, 'Sudeep_Singh', NULL, NULL, NULL, NULL, NULL, '2019-10-04 16:49:23', '2019-10-04 16:49:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 'Sudeep', 'Singh', NULL, '', 0, 'sudeep.panwar@yopmail.com', '+19635852525', '$2y$10$PBTlVuOWWnNMiY/XXjarceVKMDItJ/4fRjSkgiNVD4EIoMDA28tbi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '504500', '818267', 'TTvpx1', '', 1, 0, NULL, 'Sudeep_Singh', NULL, NULL, NULL, NULL, NULL, '2019-10-04 16:53:00', '2019-10-04 16:56:22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 'demotest', 'test', NULL, '', 0, 'dtestfako@yopmail.com', '+916375098967', '$2y$10$UyTqHqgFAEuurZerDBL2ge9tZ5i1ee63/bVf97i6gT6xel4cBTQzi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '173662', '803010', 'nDze1n', '', 1, 0, NULL, 'demotest_test', NULL, NULL, NULL, NULL, NULL, '2019-10-05 10:11:17', '2019-10-05 10:12:40', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Ngoc', 'Nguyen', NULL, '', 0, 'nguyengoc1950@gmail.com', '0366388171', '$2y$10$fAgIVRm3afqnT2zkIpGkHupCRi3rJN4UsC/1mLQnkLc5u0NdVvZWC', '87-89 Nguyen Dinh HIen, Hoa Hai, Ngu Hanh Son', NULL, 'Da Nang', 'À Nng', 'Việt Nam', '55000', 15.9787422, 108.24883599999998, 5, 1, '971322', '492296', '0a2oCg', '', 1, 0, NULL, 'Ashu_Mantri', '25/10/1998', 21, NULL, NULL, NULL, '2019-10-07 16:24:09', '2019-10-24 21:38:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'toi muon update'),
(79, 'Demoa', 'Vendor', NULL, '', 0, 'demovendor@yopmail.com', '919638527418', '$2y$10$xOw7EMRhCihfq5Y8pFw5v.OwzjEY/i0yUrWspxJQRJV8AAFrDoGN.', 'Malviya Nagar, Chandrakala Colony, Mata colony, Jaipur, Rajasthan, India', NULL, 'Jaipur', 'RJ', 'India', '789456', 26.8548662, 75.82429660000003, 5, 1, '0c4ee0c5808e52647d35843c9dbd8d52', NULL, NULL, '', 1, 0, 'Xpv1qVTpg1ofGHlsH5BPrRfvLoahpFNPj2H23mnGpftlTTmkj5rQR9Kv8klq', 'Demo_Vendor', NULL, NULL, NULL, NULL, 79, '2019-10-07 10:17:18', '2019-10-07 10:19:25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(81, 'Kumar', 'Test', NULL, '', 0, 'mickkyvirus@gmail.com', '+18854010242', '$2y$10$NhDy6aMlZlNXwpg93bpbOuSoKi1gThz1/iSuK1jKh7RqbAEYjnBJ6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '936044', '237642', 'zp1Wh9', '', 0, 0, NULL, 'Kumar_Test', NULL, NULL, NULL, NULL, NULL, '2019-10-22 12:37:42', '2019-10-22 12:45:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 'Kumar', 'Test', NULL, '', 0, 'kkpiyush5@gmail.com', '+918854010242', '$2y$10$4Nq5GpS2mBd1/3A1APxlW.MqNmTUK/0fJoOTo39pcYEwTz/mqhBRq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '594522', '657176', 'sCfqv3', '', 0, 0, NULL, 'Kumar_Test', NULL, NULL, NULL, NULL, NULL, '2019-10-22 12:47:25', '2019-10-22 12:49:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(89, 'Ngoc', 'Bao', NULL, '', 1, 'nbngoc.it@gmail.com', '0366388171', '$2y$10$pqa6Wb3KvIVlrdJtMrjXcOhquj1kYT5MRThddHnaGI5NZGC.QgLei', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, '0d10045f25cef17a73a899fa09299fc2', NULL, NULL, '', 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-10-24 20:41:50', '2019-10-24 20:41:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_subscription_plans`
--

CREATE TABLE `user_subscription_plans` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transactionid` varchar(20) DEFAULT NULL,
  `stripe_product_id` varchar(50) DEFAULT NULL,
  `plan_id` int(11) NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `paystatus` varchar(50) DEFAULT 'initiated',
  `title` varchar(250) NOT NULL,
  `price` decimal(18,2) NOT NULL,
  `usercount` int(11) NOT NULL,
  `duration` int(5) DEFAULT 12,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_service_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `purchase_amount` decimal(5,2) NOT NULL,
  `offer_percentage` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer_amount` decimal(5,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `wallets`
--

INSERT INTO `wallets` (`id`, `customer_service_id`, `user_id`, `purchase_amount`, `offer_percentage`, `offer_amount`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, '100.00', '10.00', '10.00', 1, '2019-07-04 04:47:08', '2019-07-04 04:47:08', NULL),
(2, 2, 0, '343.00', '12', '41.16', 1, '2019-07-15 07:31:19', '2019-07-15 07:31:19', NULL),
(3, 3, 0, '517.00', '10', '51.70', 1, '2019-07-15 08:30:45', '2019-07-15 08:30:45', NULL),
(4, 4, 0, '831.00', '10', '83.10', 1, '2019-07-15 09:29:42', '2019-07-15 09:29:42', NULL),
(5, 5, 0, '885.00', '12', '106.20', 1, '2019-07-22 05:05:37', '2019-07-22 05:05:37', NULL),
(6, 6, 0, '195.00', '20', '39.00', 1, '2019-07-23 06:15:59', '2019-07-23 06:15:59', NULL),
(7, 7, 0, '913.00', '20', '182.60', 1, '2019-07-23 06:24:09', '2019-07-23 06:24:09', NULL),
(8, 8, 0, '513.00', '20', '102.60', 1, '2019-07-23 06:37:04', '2019-07-23 06:37:04', NULL),
(9, 9, 0, '599.00', '20', '119.80', 1, '2019-07-23 07:11:39', '2019-07-23 07:11:39', NULL),
(10, 10, 0, '829.00', '10', '82.90', 1, '2019-10-04 16:59:17', '2019-10-04 16:59:17', NULL),
(11, 11, 0, '214.00', '20', '42.80', 1, '2019-10-07 16:33:39', '2019-10-07 16:33:39', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `app_customers`
--
ALTER TABLE `app_customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blog_map_categories`
--
ALTER TABLE `blog_map_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_map_categories_blog_id_index` (`blog_id`),
  ADD KEY `blog_map_categories_category_id_index` (`category_id`);

--
-- Chỉ mục cho bảng `blog_map_tags`
--
ALTER TABLE `blog_map_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_map_tags_blog_id_index` (`blog_id`),
  ADD KEY `blog_map_tags_tag_id_index` (`tag_id`);

--
-- Chỉ mục cho bảng `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_type_id_index` (`type_id`);

--
-- Chỉ mục cho bảng `email_template_placeholders`
--
ALTER TABLE `email_template_placeholders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `email_template_types`
--
ALTER TABLE `email_template_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `faqcategories`
--
ALTER TABLE `faqcategories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_type_id_foreign` (`type_id`),
  ADD KEY `history_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `history_types`
--
ALTER TABLE `history_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `membership_details`
--
ALTER TABLE `membership_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_details_membership_level_index` (`membership_level`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Chỉ mục cho bảng `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_page_slug_unique` (`page_slug`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `policy_types`
--
ALTER TABLE `policy_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `redeems`
--
ALTER TABLE `redeems`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service_map_categories`
--
ALTER TABLE `service_map_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sms_verifications`
--
ALTER TABLE `sms_verifications`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `social_logins`
--
ALTER TABLE `social_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_logins_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subscription_plan_features`
--
ALTER TABLE `subscription_plan_features`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Chỉ mục cho bảng `testmods`
--
ALTER TABLE `testmods`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `third_party_responses`
--
ALTER TABLE `third_party_responses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `first_name` (`first_name`),
  ADD KEY `last_name` (`last_name`),
  ADD KEY `city` (`city`(250)),
  ADD KEY `state` (`state`(250)),
  ADD KEY `status` (`status`),
  ADD KEY `confirmed` (`confirmed`),
  ADD KEY `age` (`age`),
  ADD KEY `lat` (`latitude`),
  ADD KEY `lng` (`longitude`);

--
-- Chỉ mục cho bảng `user_subscription_plans`
--
ALTER TABLE `user_subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT cho bảng `app_customers`
--
ALTER TABLE `app_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog_map_categories`
--
ALTER TABLE `blog_map_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog_map_tags`
--
ALTER TABLE `blog_map_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT cho bảng `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=813;

--
-- AUTO_INCREMENT cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
