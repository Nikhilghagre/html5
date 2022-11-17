-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 07:03 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_station_pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_table`
--

CREATE TABLE `activity_table` (
  `activity_id` int(11) NOT NULL,
  `activity_user_id` int(11) NOT NULL,
  `activity_agent` varchar(255) NOT NULL,
  `activity_time` varchar(20) NOT NULL,
  `activity_ip` varchar(15) NOT NULL,
  `activity_login_status` tinyint(1) NOT NULL COMMENT '1: Success | 2: UnSuccess',
  `activity_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Activity Table';

-- --------------------------------------------------------

--
-- Table structure for table `admob_setting_table`
--

CREATE TABLE `admob_setting_table` (
  `admob_setting_id` int(11) NOT NULL,
  `admob_setting_app_id` varchar(255) NOT NULL,
  `admob_setting_banner_unit_id` varchar(255) NOT NULL,
  `admob_setting_interstitial_unit_id` varchar(255) NOT NULL,
  `admob_setting_rewarded_unit_id` varchar(255) NOT NULL,
  `admob_setting_native_advanced_unit_id` varchar(255) NOT NULL,
  `admob_setting_banner_size` varchar(35) NOT NULL,
  `admob_setting_interstitial_clicks` smallint(6) NOT NULL,
  `admob_setting_banner_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable',
  `admob_setting_interstitial_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable',
  `admob_setting_rewarded_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable',
  `admob_setting_native_advanced_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='AdMob Setting Table';

--
-- Dumping data for table `admob_setting_table`
--

INSERT INTO `admob_setting_table` (`admob_setting_id`, `admob_setting_app_id`, `admob_setting_banner_unit_id`, `admob_setting_interstitial_unit_id`, `admob_setting_rewarded_unit_id`, `admob_setting_native_advanced_unit_id`, `admob_setting_banner_size`, `admob_setting_interstitial_clicks`, `admob_setting_banner_status`, `admob_setting_interstitial_status`, `admob_setting_rewarded_status`, `admob_setting_native_advanced_status`) VALUES
(1, 'ca-app-pub-3940256099942544~3347511713', 'ca-app-pub-3940256099942544/6300978111', 'ca-app-pub-3940256099942544/1033173712', 'ca-app-pub-3940256099942544/5224354917', 'ca-app-pub-3940256099942544/2247696110', 'LARGE_BANNER', 5, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `api_table`
--

CREATE TABLE `api_table` (
  `api_id` int(11) NOT NULL,
  `api_key` varchar(255) NOT NULL,
  `api_status` tinyint(1) NOT NULL COMMENT '0: Inactive | 1: Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='API Table';

--
-- Dumping data for table `api_table`
--

INSERT INTO `api_table` (`api_id`, `api_key`, `api_status`) VALUES
(1, 'L/3U!83!D54]T:\'I:55)Z35-P,F%V;$5/>F1856AP2$UX8U=7;U9Z3G=.,5H`\n`\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark_table`
--

CREATE TABLE `bookmark_table` (
  `bookmark_id` int(11) NOT NULL,
  `bookmark_user_id` int(11) NOT NULL,
  `bookmark_content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bookmark Table';

-- --------------------------------------------------------

--
-- Table structure for table `captcha_table`
--

CREATE TABLE `captcha_table` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `captcha_ip_address` varchar(45) NOT NULL,
  `captcha_word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `category_id` int(11) NOT NULL,
  `category_parent_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_image` varchar(100) NOT NULL,
  `category_icon` varchar(50) NOT NULL DEFAULT 'fab fa-android',
  `category_color` varchar(20) NOT NULL DEFAULT '#FF0000',
  `category_role_id` tinyint(4) NOT NULL,
  `category_status` tinyint(1) NOT NULL COMMENT '0: Inactive | 1: Active',
  `category_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Category Table';

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`category_id`, `category_parent_id`, `category_title`, `category_slug`, `category_image`, `category_icon`, `category_color`, `category_role_id`, `category_status`, `category_order`) VALUES
(1, 0, 'Strategy', 'strategy', '393cb59ce2eec959c8f48af767df28dd.png', 'fab fa-android', '#FF0000', 0, 1, 1),
(2, 0, 'Role Play', 'role-play', 'e02cc89db256fc4ff71dd6ae4461fa1f.png', 'fab fa-android', '#FF0000', 0, 1, 2),
(3, 0, 'Action', 'action', '5d73699d8ee7aebb5ddd53dc0941928d.png', 'fab fa-android', '#FF0000', 0, 1, 3),
(4, 0, 'Driving', 'driving', 'd41fa957f1826ce4d1c35431bcb422e3.png', 'fab fa-android', '#FF0000', 0, 1, 4),
(5, 0, 'Adventure', 'adventure', '1b1f55f1035dcd1b020d8e3db94b8416.png', 'fab fa-android', '#FF0000', 0, 1, 5),
(6, 0, 'Educational', 'educational', '90255dfa8bc147e70717784c144fb616.png', 'fab fa-android', '#FF0000', 0, 1, 6),
(7, 0, 'Fancy', 'fancy', 'e43eedb038553c2727eec9ca8ce1de47.png', 'fab fa-android', '#FF0000', 0, 1, 7),
(8, 0, 'Family', 'family', '5389eebd197b31373dc8fd5711e19eca.png', 'fab fa-android', '#FF0000', 0, 1, 8),
(9, 0, 'Simulation', 'simulation', '0c0165b604304eb2940651ae2ed34c6d.png', 'fab fa-android', '#FF0000', 0, 1, 9),
(10, 0, 'Intellectual', 'intellectual', '11249f854e7c6024659d36978c2914db.png', 'fab fa-android', '#FF0000', 0, 1, 10),
(11, 0, 'Sports', 'sports', '41097201d1d0564316ab760d77e03d65.png', 'fab fa-android', '#FF0000', 0, 1, 11),
(12, 0, 'Words', 'words', 'da6ffb532f2f9c18d6363b910917997b.png', 'fab fa-android', '#FF0000', 0, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `comment_table`
--

CREATE TABLE `comment_table` (
  `comment_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_device_type_id` int(11) NOT NULL,
  `comment_content_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_rate` float NOT NULL COMMENT '1 ~ 5 star',
  `comment_user_ip` varchar(80) NOT NULL,
  `comment_user_agent` varchar(255) NOT NULL,
  `comment_time` varchar(20) NOT NULL,
  `comment_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_status` int(11) NOT NULL DEFAULT 0 COMMENT '0: Not Approved | 1: Approved | 2: Removed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Comment Table';

-- --------------------------------------------------------

--
-- Table structure for table `content_table`
--

CREATE TABLE `content_table` (
  `content_id` int(11) NOT NULL,
  `content_user_id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_slug` varchar(255) NOT NULL,
  `content_description` longtext NOT NULL,
  `content_phone` varchar(15) DEFAULT NULL,
  `content_email` varchar(100) DEFAULT NULL,
  `content_latitude` varchar(30) DEFAULT '0',
  `content_longitude` varchar(30) DEFAULT '0',
  `content_property1` varchar(100) NOT NULL COMMENT 'Custom Property',
  `content_property2` varchar(100) NOT NULL,
  `content_orientation` tinyint(1) NOT NULL COMMENT '1: It does not matter | 2: portrait | 3: landscape',
  `content_price` float NOT NULL,
  `content_type_id` tinyint(4) NOT NULL,
  `content_player_type_id` tinyint(4) NOT NULL DEFAULT 1,
  `content_access` tinyint(1) NOT NULL COMMENT '1: Indirect Access | 2: Direct Access',
  `content_category_id` smallint(6) NOT NULL,
  `content_user_role_id` tinyint(4) NOT NULL,
  `content_image` varchar(100) DEFAULT NULL,
  `content_url` varchar(200) NOT NULL,
  `content_open_url_inside_app` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1: Inside App | 0: Outside App',
  `content_duration` varchar(15) DEFAULT NULL,
  `content_viewed` int(11) NOT NULL,
  `content_liked` int(11) NOT NULL,
  `content_featured` tinyint(1) NOT NULL COMMENT '0: Not Featured | 1: Featured',
  `content_special` tinyint(1) NOT NULL COMMENT '0: Not Special | 1: Special',
  `content_cached` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable',
  `content_rating_average` float NOT NULL DEFAULT 0,
  `content_rating_count` int(11) NOT NULL DEFAULT 0,
  `content_publish_date` varchar(20) NOT NULL,
  `content_publish_timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `content_expired_date` varchar(20) NOT NULL,
  `content_order` int(11) NOT NULL DEFAULT 1,
  `content_status` tinyint(1) NOT NULL COMMENT '0: Inactive | 1: Active | 2: Expired'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Item Tables';

--
-- Dumping data for table `content_table`
--

INSERT INTO `content_table` (`content_id`, `content_user_id`, `content_title`, `content_slug`, `content_description`, `content_phone`, `content_email`, `content_latitude`, `content_longitude`, `content_property1`, `content_property2`, `content_orientation`, `content_price`, `content_type_id`, `content_player_type_id`, `content_access`, `content_category_id`, `content_user_role_id`, `content_image`, `content_url`, `content_open_url_inside_app`, `content_duration`, `content_viewed`, `content_liked`, `content_featured`, `content_special`, `content_cached`, `content_rating_average`, `content_rating_count`, `content_publish_date`, `content_publish_timestamp`, `content_expired_date`, `content_order`, `content_status`) VALUES
(1, 1, 'Zombie Invasion', 'zombie-invasion', '<p>This is a <strong>HTML5 Game</strong> for demo. This game load from: www.codethislab.com</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', '', '', '', '', 'p1', 'p2', 3, 0, 13, 1, 1, 5, 5, '27c27201d481aaa41ac2181a311f34f0.png', 'http://showcase.codethislab.com/games/zombie_invasion/', 0, '', 22, 0, 1, 1, 1, 0, 0, '1610364334', '2021-01-11 11:25:34', '2398764334', 1, 1),
(2, 1, 'Horse Racing', 'horse-racing', '<p>This is a <strong>HTML5 Game</strong> for demo. This game load from: www.codethislab.com</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', NULL, NULL, NULL, NULL, 'p1', 'p2', 3, 0, 13, 1, 1, 11, 5, 'bcce5025f3f5231fa5572b82e115a0d3.jpg', 'http://showcase.codethislab.com/games/horse_racing/', 1, NULL, 11, 0, 1, 1, 1, 0, 0, '1610538672', '2021-01-13 11:51:12', '2398938672', 1, 1),
(3, 1, 'Rocking Wheels', 'rocking-wheels', '<p>This is a <strong>HTML5 Game</strong> for demo. This game load from: www.codethislab.com</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>', NULL, NULL, '0', '0', 'p1', 'p2', 3, 0, 13, 1, 1, 4, 5, 'c47fc60304f5e762e05094da90e08b31.png', 'https://showcase.codethislab.com/games/rocking_wheels/', 1, NULL, 8, 0, 0, 0, 1, 0, 0, '1610606368', '2021-01-14 06:39:28', '2399006368', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_type_table`
--

CREATE TABLE `content_type_table` (
  `content_type_id` int(11) NOT NULL,
  `content_type_title` varchar(40) NOT NULL,
  `content_type_description` varchar(60) NOT NULL,
  `content_type_status` tinyint(1) NOT NULL COMMENT '0: Inactive | 1: Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Content Type Table';

--
-- Dumping data for table `content_type_table`
--

INSERT INTO `content_type_table` (`content_type_id`, `content_type_title`, `content_type_description`, `content_type_status`) VALUES
(13, 'HTML5 Game', 'For HTML5 games', 1);

-- --------------------------------------------------------

--
-- Table structure for table `currency_table`
--

CREATE TABLE `currency_table` (
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(5) NOT NULL COMMENT 'eg. IRR, USD, GBP, etc...',
  `currency_prefix` varchar(15) NOT NULL,
  `currency_suffix` varchar(15) NOT NULL,
  `currency_decimals` tinyint(1) NOT NULL,
  `currency_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Currency Table';

--
-- Dumping data for table `currency_table`
--

INSERT INTO `currency_table` (`currency_id`, `currency_code`, `currency_prefix`, `currency_suffix`, `currency_decimals`, `currency_rate`) VALUES
(1, 'USD', '', '$', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `device_type_table`
--

CREATE TABLE `device_type_table` (
  `device_type_id` int(11) NOT NULL,
  `device_type_title` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Device Type Table';

--
-- Dumping data for table `device_type_table`
--

INSERT INTO `device_type_table` (`device_type_id`, `device_type_title`) VALUES
(1, 'Website'),
(2, 'Android'),
(3, 'iOS'),
(4, 'AdminPanel');

-- --------------------------------------------------------

--
-- Table structure for table `email_setting_table`
--

CREATE TABLE `email_setting_table` (
  `email_setting_id` tinyint(4) NOT NULL,
  `email_setting_mailtype` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_smtpport` smallint(6) NOT NULL,
  `email_setting_smtphost` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_smtpuser` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_smtppass` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_crypto` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_fromname` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_fromemail` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_cc` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_signature` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `email_setting_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='Email Setting Table';

--
-- Dumping data for table `email_setting_table`
--

INSERT INTO `email_setting_table` (`email_setting_id`, `email_setting_mailtype`, `email_setting_smtpport`, `email_setting_smtphost`, `email_setting_smtpuser`, `email_setting_smtppass`, `email_setting_crypto`, `email_setting_fromname`, `email_setting_fromemail`, `email_setting_cc`, `email_setting_signature`, `email_setting_status`) VALUES
(1, 'mail', 21, 'mail.domain.com', 'smtpuser', 'smtppass', 'none', 'Game Station Pro', 'No-Reply@gsPro.inw24.com', '', 'Best Regards,<br>\r\ngsPro.inw24.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images_gallery_table`
--

CREATE TABLE `images_gallery_table` (
  `images_gallery_id` int(11) NOT NULL,
  `images_gallery_content_id` int(11) NOT NULL,
  `images_gallery_image` varchar(100) NOT NULL,
  `images_gallery_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: Inactive | 1: Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Images Gallery Table';

-- --------------------------------------------------------

--
-- Table structure for table `page_table`
--

CREATE TABLE `page_table` (
  `page_id` int(11) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `page_slug` varchar(100) NOT NULL,
  `page_type` tinyint(2) NOT NULL COMMENT '1:News | 2: Annunciation | 3: Page | 4: Version',
  `page_content` mediumtext NOT NULL,
  `page_image` varchar(60) DEFAULT NULL,
  `page_keyword` varchar(100) DEFAULT NULL,
  `page_publish_time` varchar(15) NOT NULL,
  `page_status` tinyint(4) NOT NULL COMMENT '0:Inactive | 1: Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Page Table';

--
-- Dumping data for table `page_table`
--

INSERT INTO `page_table` (`page_id`, `page_title`, `page_slug`, `page_type`, `page_content`, `page_image`, `page_keyword`, `page_publish_time`, `page_status`) VALUES
(1, 'Terms of Service', 'terms-of-service', 3, '<p>Terms of Service: You can edit this page from admin dashboard. some<strong> HTML5</strong> tags are supported here.</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.</p>', '', '', '1543481842', 1),
(2, 'Privacy Policy', 'privacy-policy', 3, '<p>Privacy Policy: You can edit this page from admin dashboard. some<strong> HTML5</strong> tags are supported here.</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.</p>', '', '', '1543481882', 1),
(3, 'GDPR Law', 'gdpr-law', 3, '<p>GDPR Law: You can edit this page from admin dashboard. some<strong> HTML5</strong> tags are supported here.</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.</p>', '', '', '1543481894', 1),
(4, 'About Us', 'about-us', 3, '<p>About Us: You can edit this page from admin dashboard. some<strong> HTML5</strong> tags are supported here.</p>\r\n<p>Lorem the It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using, making it look like readable English.</p>', '', '', '1543481904', 1),
(5, 'Contact Us', 'contact-us', 3, '<p><strong>Website:</strong> <br><a href=\"http://www.inw24.com\">www.inw24.com</a></p>\r\n<p><strong>Email:</strong><br><a href=\"mailto:inw24.com@gmail.com\">inw24.com@gmail.com</a></p>\r\n<p><strong>Purchase This App:<br></strong><a href=\"https://www.viacoders.com/project/multi-purpose-app-website-reward-coin/\">https://www.viacoders.com/project/multi-purpose-app-website-reward-coin/</a></p>', '', '', '1543731556', 1),
(6, 'Reward Coin', 'reward-coin', 3, '<p>Do the following to reward coins and get more services with the coins you reward</p>\r\n<ol>\r\n<li>Playing Game:<br><strong>One coin</strong> per 1 hour.<br><br></li>\r\n<li>Watching Video Ads:<br><strong><span class=\"VIiyi\" lang=\"en\"><span class=\"JLqJ4b ChMk0b\" data-language-for-alternatives=\"en\" data-language-to-translate-into=\"fa\" data-phrase-index=\"0\">Twenty</span></span> coins</strong> per ads once a day (Rewarded Ads).<br><br></li>\r\n<li>Write a Review:<br><strong>One coin</strong> per review.<br><br></li>\r\n<li>Referral Freinds:<br> <strong>Ten coin</strong> per user (<span class=\"tlid-translation translation\" lang=\"en\" tabindex=\"-1\"><span title=\"\">You and your friend get reward. </span></span>Requires email verification)</li>\r\n</ol>\r\n<p> </p>', '', '', '1543731622', 1),
(7, 'Advertising', 'advertising', 3, '<p>Need digital advertising help? Contact us today for a consultation.<br> </p>\r\n<ul>\r\n<li>Email: <strong><a href=\"mailto:Ads@YourDomain.com\">Ads@YourDomain.com</a></strong></li>\r\n<li>Phone: <strong>0018180000000</strong></li>\r\n<li>WhatsApp:<strong> 123456789</strong></li>\r\n</ul>', '', '', '1566137566', 1),
(8, 'Reserved Page 1', 'reserved-page-1', 3, '<p>Reserved Page 1</p>', NULL, NULL, '1576145214', 0),
(9, 'Reserved Page 2', 'reserved-page-2', 3, '<p>Reserved Page 2</p>', NULL, NULL, '1576145252', 0),
(10, 'Version 1.0.0', 'version-100', 4, '<p><code class=\"html plain\">Version 1.0.0 - June 12th, 2020</code></p>\r\n<p><code class=\"html plain\">- Initial release.</code></p>', NULL, NULL, '1576145327', 1);

-- --------------------------------------------------------

--
-- Table structure for table `player_type_table`
--

CREATE TABLE `player_type_table` (
  `player_type_id` int(11) NOT NULL,
  `player_type_title` varchar(30) NOT NULL,
  `player_type_description` varchar(100) NOT NULL,
  `player_type_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Player Type Table';

--
-- Dumping data for table `player_type_table`
--

INSERT INTO `player_type_table` (`player_type_id`, `player_type_title`, `player_type_description`, `player_type_status`) VALUES
(1, 'ExoPlayer', 'Write full direct URL', 1),
(2, 'JzPlayer', 'Write full direct URL', 1),
(3, 'WebView Player', 'Write full direct URL', 1),
(4, 'YouTube Player', 'Only write Youtube Id. ex: MJLB4Qv38vM ', 1),
(5, 'YouTube Embed Player', 'Only write Youtube Id. ex: MJLB4Qv38vM ', 1),
(6, 'Vimeo Embed Player', 'Only write Vimeo Id. ex: 253989945', 1),
(7, 'HLS ExoPlayer', 'Write full direct HLS URL like m3u8', 1),
(8, 'Native Player', 'Write full direct URL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `reward_coin_table`
--

CREATE TABLE `reward_coin_table` (
  `reward_coin_id` int(11) NOT NULL,
  `reward_coin_banner_ad_exp` int(11) NOT NULL COMMENT 'Expiration: 3600 = 1 Hour',
  `reward_coin_interstitial_ad_exp` int(11) NOT NULL COMMENT 'Expiration: 3600 = 1 Hour',
  `reward_coin_rewarded_ad_exp` int(11) NOT NULL COMMENT 'Expiration: 3600 = 1 Hour',
  `reward_coin_native_ad_exp` int(11) NOT NULL COMMENT 'Expiration: 3600 = 1 Hour',
  `reward_coin_play_game_exp` int(11) NOT NULL COMMENT ' Expiration: 3600 = 1 Hour ',
  `reward_coin_watching_video_exp` int(11) NOT NULL COMMENT 'Expiration: 3600 = 1 Hour ',
  `reward_coin_banner_ad_coin_req` int(11) NOT NULL COMMENT 'Account Update: Coin Requirement',
  `reward_coin_interstitial_ad_coin_req` int(11) NOT NULL COMMENT 'Account Update: Coin Requirement',
  `reward_coin_rewarded_ad_coin_req` int(11) NOT NULL COMMENT 'Account Update: Coin Requirement',
  `reward_coin_native_ad_coin_req` int(11) NOT NULL COMMENT 'Account Update: Coin Requirement',
  `reward_coin_vip_user_coin_req` int(11) NOT NULL COMMENT ' Account Update: Coin Requirement ',
  `reward_coin_banner_ad_click` int(11) NOT NULL COMMENT 'Each click, reward x coin',
  `reward_coin_interstitial_ad_click` int(11) NOT NULL COMMENT ' Each click, reward x coin ',
  `reward_coin_rewarded_ad_click` int(11) NOT NULL COMMENT ' Each click, reward x coin ',
  `reward_coin_native_ad_click` int(11) NOT NULL COMMENT ' Each click, reward x coin ',
  `reward_coin_write_review` int(11) NOT NULL COMMENT 'Write a review, reward x coin ',
  `reward_coin_play_game` int(11) NOT NULL COMMENT 'Play game, reward x coin',
  `reward_coin_watching_video` int(11) NOT NULL COMMENT 'Watch video, reward x coin',
  `reward_coin_referral_user` int(11) NOT NULL COMMENT 'Give referral ID to reward coin',
  `reward_coin_referral_friend` int(11) NOT NULL COMMENT 'Get referral ID to reward coin',
  `reward_coin_publish_game` int(100) NOT NULL COMMENT 'Publish a game to reward coin',
  `reward_coin_new_registeration` int(11) NOT NULL DEFAULT 10,
  `reward_coin_withdrawal_coin_minimum_req` int(11) NOT NULL DEFAULT 1000 COMMENT 'Minimum number of coins to withdraw from the account',
  `reward_coin_price_of_each_coin` float NOT NULL DEFAULT 0.01 COMMENT 'The price of each coin. For example 1000 coins * 0.01 = 10 USD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Reward Coin Table';

--
-- Dumping data for table `reward_coin_table`
--

INSERT INTO `reward_coin_table` (`reward_coin_id`, `reward_coin_banner_ad_exp`, `reward_coin_interstitial_ad_exp`, `reward_coin_rewarded_ad_exp`, `reward_coin_native_ad_exp`, `reward_coin_play_game_exp`, `reward_coin_watching_video_exp`, `reward_coin_banner_ad_coin_req`, `reward_coin_interstitial_ad_coin_req`, `reward_coin_rewarded_ad_coin_req`, `reward_coin_native_ad_coin_req`, `reward_coin_vip_user_coin_req`, `reward_coin_banner_ad_click`, `reward_coin_interstitial_ad_click`, `reward_coin_rewarded_ad_click`, `reward_coin_native_ad_click`, `reward_coin_write_review`, `reward_coin_play_game`, `reward_coin_watching_video`, `reward_coin_referral_user`, `reward_coin_referral_friend`, `reward_coin_publish_game`, `reward_coin_new_registeration`, `reward_coin_withdrawal_coin_minimum_req`, `reward_coin_price_of_each_coin`) VALUES
(1, 21600, 21600, 3600, 21600, 3600, 3600, 1000, 1000, 1000, 1000, 2000, 0, 0, 20, 2, 1, 1, 1, 10, 10, 50, 10, 1000, 0.01);

-- --------------------------------------------------------

--
-- Table structure for table `seo_table`
--

CREATE TABLE `seo_table` (
  `seo_id` int(11) NOT NULL,
  `seo_description` varchar(100) NOT NULL,
  `seo_keywords` varchar(255) NOT NULL,
  `seo_author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='SEO Table';

--
-- Dumping data for table `seo_table`
--

INSERT INTO `seo_table` (`seo_id`, `seo_description`, `seo_keywords`, `seo_author`) VALUES
(1, 'Game Station Pro, You can publish any kind of HTML5 Games', 'HTML5 game, application, website, online game, Firebase, OneSignal', 'ViaCoders.com');

-- --------------------------------------------------------

--
-- Table structure for table `setting_table`
--

CREATE TABLE `setting_table` (
  `setting_id` int(11) NOT NULL,
  `setting_app_name` varchar(50) NOT NULL,
  `setting_app_desc` varchar(100) NOT NULL,
  `setting_website` varchar(50) NOT NULL,
  `setting_email` varchar(50) NOT NULL,
  `setting_phone1` varchar(15) NOT NULL,
  `setting_phone2` varchar(15) NOT NULL,
  `setting_phone3` varchar(15) NOT NULL,
  `setting_sms_no` varchar(20) NOT NULL,
  `setting_address` varchar(100) NOT NULL,
  `setting_logo` varchar(80) NOT NULL,
  `setting_favicon` varchar(50) NOT NULL,
  `setting_version_code` smallint(6) NOT NULL,
  `setting_version_string` varchar(25) NOT NULL,
  `setting_skype` varchar(60) NOT NULL,
  `setting_telegram` varchar(60) NOT NULL,
  `setting_whatsapp` varchar(60) NOT NULL,
  `setting_instagram` varchar(60) NOT NULL,
  `setting_facebook` varchar(60) NOT NULL,
  `setting_twiiter` varchar(60) NOT NULL,
  `setting_custom1` varchar(60) NOT NULL,
  `setting_custom2` varchar(60) NOT NULL,
  `setting_one_signal_app_id` varchar(255) NOT NULL,
  `setting_one_signal_rest_api_key` varchar(255) NOT NULL,
  `setting_youtube_api_key` varchar(255) NOT NULL,
  `setting_text_maintenance` varchar(255) NOT NULL,
  `setting_site_maintenance` tinyint(1) NOT NULL COMMENT '0: No | 1: Yes',
  `setting_android_maintenance` tinyint(1) NOT NULL COMMENT '0: No | 1: Yes',
  `setting_ios_maintenance` tinyint(1) NOT NULL COMMENT '0: No | 1: Yes',
  `setting_other_maintenance` tinyint(1) NOT NULL COMMENT '0: No | 1: Yes',
  `setting_disable_registration` tinyint(1) NOT NULL COMMENT '0: No | 1: Yes',
  `setting_checking` int(11) NOT NULL,
  `setting_pc` tinyint(1) DEFAULT NULL,
  `setting_mobile_verification` tinyint(1) NOT NULL DEFAULT 0 COMMENT ' 0: No Need | Need To Verify ',
  `setting_email_verification` tinyint(1) NOT NULL DEFAULT 0 COMMENT ' 0: No Need | Need To Verify ',
  `setting_document_verification` tinyint(1) NOT NULL DEFAULT 0 COMMENT ' 0: No Need | Need To Verify ',
  `setting_recaptcha_protection` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Disable protection | 1: Enable protection'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Setting Table';

--
-- Dumping data for table `setting_table`
--

INSERT INTO `setting_table` (`setting_id`, `setting_app_name`, `setting_app_desc`, `setting_website`, `setting_email`, `setting_phone1`, `setting_phone2`, `setting_phone3`, `setting_sms_no`, `setting_address`, `setting_logo`, `setting_favicon`, `setting_version_code`, `setting_version_string`, `setting_skype`, `setting_telegram`, `setting_whatsapp`, `setting_instagram`, `setting_facebook`, `setting_twiiter`, `setting_custom1`, `setting_custom2`, `setting_one_signal_app_id`, `setting_one_signal_rest_api_key`, `setting_youtube_api_key`, `setting_text_maintenance`, `setting_site_maintenance`, `setting_android_maintenance`, `setting_ios_maintenance`, `setting_other_maintenance`, `setting_disable_registration`, `setting_checking`, `setting_pc`, `setting_mobile_verification`, `setting_email_verification`, `setting_document_verification`, `setting_recaptcha_protection`) VALUES
(1, 'Game Station Pro', 'Game Station Pro + Website + Reward Coin', 'http://gsPro.inw24.com', 'inw24.com@gmail.com', '01234', '', '', '', '2354 Alanin street, Ollka blv, no.1542', 'd3d1ae2b8cfebe6eabc210f017b5b208.png', '', 2, '1.1.0', 'Skype', '', 'WhatsApp', 'Instagram', '', 'Twiiter', '', '', 'xxx', 'xxx', 'xxx', 'We are under maintenance mode. Please try again later.', 0, 0, 1, 1, 0, 1, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slider_table`
--

CREATE TABLE `slider_table` (
  `slider_id` int(11) NOT NULL,
  `slider_category_id` smallint(6) NOT NULL,
  `slider_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slider_slug` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slider_description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slider_url` varchar(100) CHARACTER SET utf8 NOT NULL,
  `slider_image` varchar(120) CHARACTER SET utf8 NOT NULL,
  `slider_content_id` int(11) DEFAULT 0,
  `slider_content_type_id` int(11) NOT NULL DEFAULT 1,
  `slider_status` tinyint(1) NOT NULL COMMENT '0: Inactive | 1: Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci COMMENT='Slider Table';

--
-- Dumping data for table `slider_table`
--

INSERT INTO `slider_table` (`slider_id`, `slider_category_id`, `slider_title`, `slider_slug`, `slider_description`, `slider_url`, `slider_image`, `slider_content_id`, `slider_content_type_id`, `slider_status`) VALUES
(1, 0, 'Zombie Invasion', 'zombie-invasion', 'Zombie Invasion', '', 'f682723e121de8c6622dcb907a920f67.png', 1, 13, 1),
(2, 0, 'Horse Racing', 'horse-racing', 'Horse Racing', '', 'da2ef417dcc4bbe450f623cd71664e2c.jpg', 2, 13, 1),
(3, 0, 'Rocking Wheels', 'rocking-wheels', 'Rocking Wheels', '', '3169ffd099022ddb561aab0d822a7806.png', 3, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `update_coin_table`
--

CREATE TABLE `update_coin_table` (
  `update_coin_id` bigint(20) NOT NULL,
  `update_coin_user_id` int(11) NOT NULL,
  `update_coin_type` varchar(35) NOT NULL,
  `update_coin_time` int(10) NOT NULL,
  `update_coin_user_ip` varchar(30) NOT NULL,
  `update_coin_user_agent` varchar(60) NOT NULL,
  `update_coin_status` tinyint(1) NOT NULL COMMENT '0: Expired | 1: Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Update Coin Table';

-- --------------------------------------------------------

--
-- Table structure for table `user_role_table`
--

CREATE TABLE `user_role_table` (
  `user_role_id` smallint(6) NOT NULL,
  `user_type_id` smallint(6) NOT NULL,
  `user_role_title` varchar(30) NOT NULL,
  `user_role_price` float NOT NULL,
  `user_role_permission` text NOT NULL COMMENT 'Seprrate laste segment with |',
  `user_role_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1: Active | 2: Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User Role Table';

--
-- Dumping data for table `user_role_table`
--

INSERT INTO `user_role_table` (`user_role_id`, `user_type_id`, `user_role_title`, `user_role_price`, `user_role_permission`, `user_role_status`) VALUES
(1, 1, 'Super Admin', 0, 'No need to set permission for Super Admin.', 1),
(2, 1, 'Admin', 0, 'index users_list show_user add_user delete_user users_role delete_role general_settings email_settings sliders delete_slider edit_slider pages add_page delete_page edit_page users_activity categories edit_category delete_category content_list add_content edit_content delete_content push_notification admob_settings api_key withdrawal_coins show_withdrawal_coin reward_settings withdrawal_accounts', 1),
(3, 1, 'Employee', 0, 'index users_list show_user add_user delete_user users_role delete_role general_settings email_settings sliders delete_slider edit_slider pages add_page delete_page edit_page users_activity categories edit_category delete_category content_list add_content edit_content delete_content push_notification admob_settings api_key withdrawal_coins show_withdrawal_coin reward_settings', 1),
(4, 1, 'Demo Admin', 0, 'index users_list show_user add_user delete_user users_role delete_role general_settings email_settings sliders delete_slider edit_slider pages add_page delete_page edit_page users_activity categories edit_category delete_category content_list add_content edit_content delete_content push_notification admob_settings comments_list show_comment reward_settings withdrawal_coins show_withdrawal_coin withdrawal_accounts', 2),
(5, 2, 'Regular', 0, 'index withdrawal_coins show_withdrawal_coin add_content content_list edit_content', 1),
(6, 2, 'VIP', 2000, 'index add_content content_list edit_content withdrawal_coins show_withdrawal_coin', 1),
(7, 2, 'Demo User', 0, 'index add_content content_list edit_content withdrawal_coins show_withdrawal_coin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_firstname` varchar(50) DEFAULT NULL,
  `user_lastname` varchar(50) DEFAULT NULL,
  `user_image` varchar(80) NOT NULL DEFAULT 'avatar.png',
  `user_credit` float DEFAULT 0,
  `user_coin` int(11) NOT NULL DEFAULT 0,
  `user_type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1: Staff | 2: User | 3: Guest',
  `user_role_id` smallint(6) NOT NULL DEFAULT 5,
  `user_duration` int(11) DEFAULT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_mobile` varchar(15) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: Deactive | 1: Active',
  `user_reg_date` varchar(12) NOT NULL,
  `user_last_login` varchar(12) DEFAULT NULL,
  `user_device_type_id` tinyint(2) NOT NULL,
  `user_note` text DEFAULT NULL,
  `user_referral` int(11) NOT NULL,
  `user_mobile_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: No| 1: Yes',
  `user_mobile_verification_code` varchar(100) DEFAULT NULL,
  `user_email_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: No| 1: Yes',
  `user_email_verification_code` varchar(100) DEFAULT NULL,
  `user_document_verified` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: No| 1: Yes',
  `user_online` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Offline | 1: Online',
  `user_onesignal_player_id` varchar(100) NOT NULL DEFAULT 'Not set yet.',
  `user_hide_banner_ad` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Disable | 1: Enable (Hide)',
  `user_hide_interstitial_ad` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Disable | 1: Enable (Hide)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User Table';

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_username`, `user_firstname`, `user_lastname`, `user_image`, `user_credit`, `user_coin`, `user_type`, `user_role_id`, `user_duration`, `user_email`, `user_password`, `user_mobile`, `user_phone`, `user_status`, `user_reg_date`, `user_last_login`, `user_device_type_id`, `user_note`, `user_referral`, `user_mobile_verified`, `user_mobile_verification_code`, `user_email_verified`, `user_email_verification_code`, `user_document_verified`, `user_online`, `user_onesignal_player_id`, `user_hide_banner_ad`, `user_hide_interstitial_ad`) VALUES
(1, 'super_admin', 'Super', 'Admin', 'avatar.png', 0, 0, 1, 1, NULL, 'inw24.com@gmail.com', 'ab551e792f24dbcc8fedc3cb198c9f0218a99ce7', '0123456789', '', 1, '1605617141', NULL, 1, '', 0, 0, NULL, 1, NULL, 0, 0, 'Not set yet.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type_table`
--

CREATE TABLE `user_type_table` (
  `user_type_id` smallint(6) NOT NULL COMMENT '1: Staff | 2: User | 3: Guest',
  `user_type_title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User Type Table';

--
-- Dumping data for table `user_type_table`
--

INSERT INTO `user_type_table` (`user_type_id`, `user_type_title`) VALUES
(1, 'Staff'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_account_type_table`
--

CREATE TABLE `withdrawal_account_type_table` (
  `withdrawal_account_type_id` int(11) NOT NULL,
  `withdrawal_account_type_title` varchar(30) NOT NULL,
  `withdrawal_account_type_status` tinyint(1) NOT NULL COMMENT '0: Disable | 1: Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Withdrawal Account Type Table';

--
-- Dumping data for table `withdrawal_account_type_table`
--

INSERT INTO `withdrawal_account_type_table` (`withdrawal_account_type_id`, `withdrawal_account_type_title`, `withdrawal_account_type_status`) VALUES
(1, 'PayPal', 1),
(2, 'WebMoney', 1),
(3, 'WesternUnion', 1),
(4, 'Bitcoin', 1),
(5, 'Offline Bank', 1),
(6, 'Gift Card', 1);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_table`
--

CREATE TABLE `withdrawal_table` (
  `withdrawal_id` int(11) NOT NULL,
  `withdrawal_user_id` int(11) NOT NULL,
  `withdrawal_account_type` varchar(60) NOT NULL COMMENT ' For example: PayPal| Bitcoin',
  `withdrawal_account_name` varchar(60) NOT NULL COMMENT 'For example: PayPal Email | Bitcoin Wallet Address',
  `withdrawal_req_coin` int(11) NOT NULL,
  `withdrawal_req_cash` float DEFAULT NULL,
  `withdrawal_req_date` varchar(12) NOT NULL,
  `withdrawal_date_paid` varchar(12) DEFAULT NULL,
  `withdrawal_transaction` varchar(60) DEFAULT NULL,
  `withdrawal_user_comment` varchar(255) DEFAULT NULL,
  `withdrawal_admin_comment` varchar(255) DEFAULT NULL,
  `withdrawal_status` tinyint(1) NOT NULL COMMENT '1: Pending | 2: Paid | 3. Cancel'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Withdrawal Table';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_table`
--
ALTER TABLE `activity_table`
  ADD PRIMARY KEY (`activity_id`);

--
-- Indexes for table `admob_setting_table`
--
ALTER TABLE `admob_setting_table`
  ADD PRIMARY KEY (`admob_setting_id`);

--
-- Indexes for table `api_table`
--
ALTER TABLE `api_table`
  ADD PRIMARY KEY (`api_id`);

--
-- Indexes for table `bookmark_table`
--
ALTER TABLE `bookmark_table`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `captcha_table`
--
ALTER TABLE `captcha_table`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `captcha_word` (`captcha_word`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment_table`
--
ALTER TABLE `comment_table`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `content_table`
--
ALTER TABLE `content_table`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `content_type_table`
--
ALTER TABLE `content_type_table`
  ADD PRIMARY KEY (`content_type_id`);

--
-- Indexes for table `currency_table`
--
ALTER TABLE `currency_table`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `device_type_table`
--
ALTER TABLE `device_type_table`
  ADD PRIMARY KEY (`device_type_id`);

--
-- Indexes for table `email_setting_table`
--
ALTER TABLE `email_setting_table`
  ADD PRIMARY KEY (`email_setting_id`);

--
-- Indexes for table `images_gallery_table`
--
ALTER TABLE `images_gallery_table`
  ADD PRIMARY KEY (`images_gallery_id`);

--
-- Indexes for table `page_table`
--
ALTER TABLE `page_table`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `player_type_table`
--
ALTER TABLE `player_type_table`
  ADD PRIMARY KEY (`player_type_id`);

--
-- Indexes for table `reward_coin_table`
--
ALTER TABLE `reward_coin_table`
  ADD PRIMARY KEY (`reward_coin_id`);

--
-- Indexes for table `seo_table`
--
ALTER TABLE `seo_table`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indexes for table `setting_table`
--
ALTER TABLE `setting_table`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slider_table`
--
ALTER TABLE `slider_table`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `update_coin_table`
--
ALTER TABLE `update_coin_table`
  ADD PRIMARY KEY (`update_coin_id`);

--
-- Indexes for table `user_role_table`
--
ALTER TABLE `user_role_table`
  ADD PRIMARY KEY (`user_role_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type_table`
--
ALTER TABLE `user_type_table`
  ADD PRIMARY KEY (`user_type_id`);

--
-- Indexes for table `withdrawal_account_type_table`
--
ALTER TABLE `withdrawal_account_type_table`
  ADD PRIMARY KEY (`withdrawal_account_type_id`);

--
-- Indexes for table `withdrawal_table`
--
ALTER TABLE `withdrawal_table`
  ADD PRIMARY KEY (`withdrawal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_table`
--
ALTER TABLE `activity_table`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admob_setting_table`
--
ALTER TABLE `admob_setting_table`
  MODIFY `admob_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `api_table`
--
ALTER TABLE `api_table`
  MODIFY `api_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookmark_table`
--
ALTER TABLE `bookmark_table`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `captcha_table`
--
ALTER TABLE `captcha_table`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_table`
--
ALTER TABLE `comment_table`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content_table`
--
ALTER TABLE `content_table`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `content_type_table`
--
ALTER TABLE `content_type_table`
  MODIFY `content_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `currency_table`
--
ALTER TABLE `currency_table`
  MODIFY `currency_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `device_type_table`
--
ALTER TABLE `device_type_table`
  MODIFY `device_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `email_setting_table`
--
ALTER TABLE `email_setting_table`
  MODIFY `email_setting_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images_gallery_table`
--
ALTER TABLE `images_gallery_table`
  MODIFY `images_gallery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_table`
--
ALTER TABLE `page_table`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `player_type_table`
--
ALTER TABLE `player_type_table`
  MODIFY `player_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reward_coin_table`
--
ALTER TABLE `reward_coin_table`
  MODIFY `reward_coin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seo_table`
--
ALTER TABLE `seo_table`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_table`
--
ALTER TABLE `setting_table`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider_table`
--
ALTER TABLE `slider_table`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `update_coin_table`
--
ALTER TABLE `update_coin_table`
  MODIFY `update_coin_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role_table`
--
ALTER TABLE `user_role_table`
  MODIFY `user_role_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_type_table`
--
ALTER TABLE `user_type_table`
  MODIFY `user_type_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '1: Staff | 2: User | 3: Guest', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawal_account_type_table`
--
ALTER TABLE `withdrawal_account_type_table`
  MODIFY `withdrawal_account_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdrawal_table`
--
ALTER TABLE `withdrawal_table`
  MODIFY `withdrawal_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
