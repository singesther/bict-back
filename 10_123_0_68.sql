-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.123.0.68:3309
-- Generation Time: Jan 23, 2020 at 11:25 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bictrwanda_bict`
--
CREATE DATABASE IF NOT EXISTS `bictrwanda_bict` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `user_id`, `title`, `content`, `slug`, `file_name`, `youtube_video`, `is_published`, `lang`, `created_at`, `updated_at`) VALUES
(1, 17, 'Who We are', '<p style=\"text-align:justify;\"><strong>Broadcasters of Information Communication and Technology (BICT) </strong>is a Non-Profit, Developer community of youths founded in 2016 by the University of Rwanda students in College Science and Technology to discover community challenges by providing ICT solutions toward the development of society through career opportunities and community services. Its main aim is empowering youths in digital world services and building citizens centered on technology.</p>\n<p style=\"text-align:justify;\">BICT provides digital competence skills and nurturing innovation in Rwanda, we have a wide range of skills on new emerging technologies. This makes it critical for the Rwandan economies to have a knowledge-based economy with relevant digital skills. BICT also equips its members with what they need to cope with challenging work environment and gain new practical knowledge and working customs while developing professionally and personally and thus making it possible for them to be able to experience a profession in an area of interest to be used to create solutions for social problems.</p>', 'about-us', '1566806263-aw.jpg', NULL, 1, NULL, '2019-04-22 09:25:54', '2019-10-30 15:27:41'),
(2, 17, 'Broadcasters Of ICT', '<p><strong>Broadcasters of Information Communication and Technology (BICT) </strong>is a Non-Profit, Developer community of youths founded in 2016 by the University of Rwanda students in College Science and Technology to discover community challenges by providing ICT solutions toward the development of society through career opportunities and community services. Its main aim is empowering youths in digital world services and building citizens centered on technology.</p>', 'broadcasters-of-ict', NULL, NULL, 1, NULL, '2019-04-25 14:58:37', '2019-10-17 05:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `adverts`
--

CREATE TABLE `adverts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `slug`, `lang`, `created_at`, `updated_at`) VALUES
(1, 17, 'CyberSecurity', 'cybersecurity', NULL, '2019-04-28 19:48:40', '2019-04-28 19:48:40'),
(2, 17, 'Community Learning', 'community-learning', NULL, '2019-05-01 14:48:59', '2019-05-01 14:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `name`, `email`, `comment`, `is_published`, `created_at`, `updated_at`) VALUES
(2, 4, 'Bosco', 'jboscom1@yahoo.com', '<p>ooh! excellently for your participation for creating the rich learning environment for youths especially women for solving critical community problems through ICT, so keep goal.</p>', 1, '2019-04-27 18:16:46', '2019-04-27 18:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `tel`, `subject`, `message`, `read`, `created_at`, `updated_at`) VALUES
(5, 'Marc uzaruharanira', 'uzarwanda@gmail.com', NULL, '<p>igitekerzo</p>', '<p>Hello BICT</p>', NULL, '2019-04-25 09:28:59', '2019-04-25 09:28:59'),
(9, 'robert ngabo', 'robbingabo9@gmail.com', NULL, '<p>join a fellowship</p>', '<p>willing to mentor and support in node.js,js,vue.js,php,laravel,ui design</p>', NULL, '2019-07-13 22:37:27', '2019-07-13 22:37:27'),
(10, 'Aneze Lyse A.', 'lyseaaneze@gmail.com', NULL, '<p>Computer programming internship</p>', '<p>Hello BICT,</p>\n\n<p>I applied for the computer programming internship some days ago with no response. I\'m a 2018 high school graduate. Please let me know if I am eligible for this internship.</p>\n\n<p>Regards,\nLyse.</p>', NULL, '2019-07-15 16:07:55', '2019-07-15 16:07:55'),
(11, 'Gikundiro chaste', 'gikundirochacha2002@gmail.com', NULL, '<p>Your location</p>', '<p>I recently became an intern and searched for you location and i was lost, can you please send me your specific location? Thanks.</p>', NULL, '2019-07-16 14:49:01', '2019-07-16 14:49:01'),
(12, 'N.mbarushimana Francoise', 'petitefunny@gmail.com', NULL, '<p>Computer networking and, hardware and maintenance</p>', '<p>I will be glade to part of class,...\nAnd i would like ask the starting period.thanks.</p>', NULL, '2019-07-26 19:14:17', '2019-07-26 19:14:17'),
(13, 'Muhirwa', 'prossymuhirwa@gmail.com', NULL, '<p>Internship</p>', '<p>Hello how can I get internship in bict</p>', NULL, '2019-09-02 09:43:51', '2019-09-02 09:43:51'),
(14, 'Niyonkuru abdoulhakim', 'abdoulhakimniyonkuru56@gmail.com', NULL, '<p>appliey for internship</p>', '<p>mwiriwe neza ndasaba niba mwanfasha gukorera iwanyu intership</p>', NULL, '2019-09-03 08:37:07', '2019-09-03 08:37:07'),
(15, 'klain pro', 'klainpro0@gmail.com', NULL, '<p>error 404</p>', '<p>why? we cant view the confirmation message on email</p>', NULL, '2019-09-04 09:45:37', '2019-09-04 09:45:37'),
(16, 'NDIMUBAKUNZI Bonfils', 'Kunzibonfils@gmail.com', NULL, '<p>Network Fundamentals</p>', '<p>Model Questions Of Network Fundamentals</p>', NULL, '2019-09-04 14:50:23', '2019-09-04 14:50:23'),
(17, 'Kayonga Uwingeneye Regine', 'pedrau2003@yahoo.fr', NULL, '<p>Internship</p>', '<p>I\'m so interested .I need learning coding.Thanks</p>', NULL, '2019-11-13 08:32:52', '2019-11-13 08:32:52');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live` tinyint(1) NOT NULL DEFAULT '1',
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hosted_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_guests` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('past','current','upcoming') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `file_name`, `slug`, `external_link`, `text_link`, `live`, `date`, `location`, `hosted_by`, `special_guests`, `status`, `lang`, `created_at`, `updated_at`) VALUES
(1, 17, 'FrontEnd Re-United Kigali-Rwanda 17-18 May 2019', '<p>Frontend United is a yearly European conference that moves from country to country. Its aim is to bring frontend developers, designers and Drupal themes from all kinds of backgrounds closer together and share knowledge, experiences and ideas face-to-face.</p>\n<p>This year agenda will merge live stream talks and local speakers! The idea is to present the most interesting speakers of today and also add local themes and workshops so to keep the community involved and updated.</p>\n<p> <span style=\"color:#000080;\"><strong>Venue:UR-College of Science and Technology-CMHS HALL</strong></span></p>\n<p><span style=\"color:#000080;\"><strong>KIGALI KN 7 AVE</strong></span></p>\n<p><strong>Kigali Rwanda 17-18 May 2019 Second Time!</strong></p>\n<p><strong>Who is Behind of This Conference</strong></p>\n<ul>\n<li><strong>Broadcasters of ICT </strong></li>\n<li><strong>University of Rwanda/College of Science and Technology</strong></li>\n<li><strong>DOTRWANDA</strong></li>\n<li><strong>ICT CHAMBER</strong></li>\n</ul>\n<p><strong><em>Day one Program –17 May 2019</em></strong></p>\n<ul>\n<li>Topic 1: Website vs web application and web standards</li>\n<li>Topic 2: Contribution of UX/UI in frontend</li>\n<li>Workshop sessions to standardize local websites</li>\n</ul>\n<p><strong><em>Day Two Program –18 May 2019</em></strong></p>\n<ul>\n<li>Topic 3: Trending front-end technologies, a deep comparison.</li>\n<li>Topic 4: Thinking Mobile</li>\n<li>Workshop sessions to standardize local websites</li>\n</ul>\n<p><strong>For More Information Contact Organzing Team:</strong></p>\n<p><strong>Email:admin@bict.rw</strong></p>\n<p><strong>Tel:+250788358753/+250784216774</strong></p>', '1556315519-Kigali Logotype.png', 'frontend-re-united-kigali-2019', 'http://bit.ly/2PrGYlr', 'Finished', 1, '2019/05/17 08:00', 'Kigali Rwanda', 'BICT', NULL, 'past', NULL, '2019-03-01 08:27:24', '2019-05-30 13:26:32'),
(2, 17, 'Cyber Security Event Kigali-Rwanda 08 May 2019', '<p><span style=\"font-weight:400;\">Broadcasters of ICT (BICT), implements Cyber Security Awareness program. The main purpose of the program is to create awareness and educate Rwandans about Protection of Electronic Gadget, and data against hackers, Internet security threats, cyber-attacks, and risks associated to exposure to harmful and illegal content and measures to protect against all those.</span></p>\n<p><strong>For More Information Contact Organzing Team:</strong></p>\n<p><strong>Email:admin@bict.rw</strong></p>\n<p><strong>Tel:+250788358753/+25071605853</strong></p>', '1557066100-download.jpg', 'cyber-security-event-kigali', 'https://docs.google.com/forms/d/e/1FAIpQLSeBk85XVLell_yWCn9mi0Hux2IKNmFdCG20GjMBGYhVn0DKOA/viewform', 'Finished', 1, '2019/05/08 14:00', 'Kigali Rwanda', 'BICT', NULL, 'past', NULL, '2019-04-21 06:07:02', '2019-05-30 13:26:52'),
(3, 17, 'Game Development Training-Kigali Rwanda 2019', '<p style=\"text-align:justify;\">Coding is becoming the most in-demand skill in the professional position across industries.Apart from companies in the technology sector, there is an increasing number of businesses relying on computer code. BICT (Broadcasters of Information , communication and technology) in Partnership with NITOMANI School is pleased to release the application Form to apply . In this program , The sessions will target to leverage the ICT competence of Rwanda youth, putting emphasis on the female, handicapped or otherwise students, who, in general, cannot otherwise afford to participate the similar courses. the deadline of application is 24th ,April , 2019.</p>', '1556316862-images.png', 'game-development-training', 'https://docs.google.com/forms/d/e/1FAIpQLScfVn1CU862qfoMY3kDSgawbmPg6ISve8bvbDYdOcgh0ykMxw/viewform', 'Finished', 1, '2019/04/26 10:07', 'Kigali Rwanda', 'BICT', NULL, 'past', NULL, '2019-04-21 06:07:44', '2019-05-30 13:27:08'),
(7, 17, 'Call for Young Women in Cyber Security in Rwanda', '<p style=\"text-align:justify;\">Broadcasters of ICT Calls for Young Women who are interested in cyber security career to Register in \"<strong>ShecanHack\"</strong> Initiative.The initiative aims to engage young women in 6 weeks on<strong> Introduction to cyber security,System vulnerabilities scanning,Ethical Hacking and Penetration testing,System vulnerabilities fixing,Reports and System recovery and Countermeasures. </strong></p>\n<p><strong>Registration is Open From 03-10  July 2019 . </strong></p>\n<p><strong>More info Please Contact Broadcasters of ICT</strong><br><strong>Tel:+250788358753/0785145118</strong></p>', '1558608792.png', 'call-for-young-women-in-cyber-security-in-rwanda', 'https://docs.google.com/forms/d/e/1FAIpQLScfzX3WcINdycYZMPlbir0seRTMbZPZP4IK-G2V-xW74oMo2A/viewform', 'Finished', 1, '2019/07/10 00:00', 'Kigali Rwanda', 'BICT', NULL, 'past', NULL, '2019-05-23 10:53:12', '2019-07-29 16:10:27'),
(8, 17, 'Computer Programming Internship', '', '1561552382-images (2).jpg', 'computer-programming-internship-56700', 'http://bit.ly/2JkQJ2r', 'Apply Here', 0, '2019/07/15 12:48', 'Kigali,Nyarugenge', NULL, NULL, 'upcoming', NULL, '2019-06-26 10:50:21', '2019-07-19 01:36:07'),
(9, 17, 'Internship in Computer Networking', '', '1561548859.jpg', 'internship-in-computer-networking-96723', 'http://bit.ly/2J0QYPG', 'Apply Here', 0, '2019/07/15 13:33', 'Kigali,Nyarugenge', NULL, NULL, 'upcoming', NULL, '2019-06-26 11:34:19', '2019-07-19 01:36:03'),
(10, 17, 'Internship in Computer Graphic Design', '', '1561550777.jpg', 'internship-in-computer-graphic-design-87326', 'http://bit.ly/2IOFAYE', 'Apply Here', 0, '2019/07/15 14:05', 'Kigali,Nyarugenge', NULL, NULL, 'upcoming', NULL, '2019-06-26 12:06:17', '2019-07-19 01:36:02'),
(11, 17, 'Internship in Computer Hardware & Maintenance', '', '1561552038.jpg', 'internship-in-computer-hardware-maintenance-91382', 'http://bit.ly/2WZmG52', 'Apply Here', 0, '2019/07/15 14:26', 'Kigali,Nyarugenge', NULL, NULL, 'upcoming', NULL, '2019-06-26 12:27:18', '2019-07-19 01:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `user_id`, `question`, `answer`, `is_published`, `order`, `lang`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 17, 'Who is a member of BICT Community?', '<p>Individuals or team working on bright Digital &amp; Social Innovation Project, business idea, research and Development,We admit person who wish to impact the community through Technology.</p>', 1, 1, NULL, '2019-01-18 13:54:14', '2019-05-01 18:34:47', NULL),
(3, 17, 'Who is an Intern in our community?', '<p>Students and young professionals who want to use what they have learned in school, expand their knowledge/skills and gain the job experience to help them fast their career.</p>', 1, 2, NULL, '2019-05-01 13:59:45', '2019-05-01 14:04:59', NULL),
(4, 17, 'Who is a Volunteer in our community?', 'Experienced professional who can make available time to contribute their knowledge and skills in growing our community.', 1, 3, NULL, '2019-05-01 14:09:10', '2019-05-01 14:09:10', NULL),
(5, 17, 'Who is a Facilitator in our Community?', 'Experienced person who helping a community member work on business idea,research and Development and assists them to plan how to achieve their objectives', 1, 4, NULL, '2019-05-01 14:24:31', '2019-05-01 14:24:31', NULL),
(6, 17, 'Who is a Mentor in our Community?', 'Expert who guide a less experienced person by building Tech Solutions,Research and Development', 1, 5, NULL, '2019-05-01 14:29:14', '2019-05-01 14:29:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `maillist`
--

CREATE TABLE `maillist` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `maillist`
--

INSERT INTO `maillist` (`id`, `name`, `email`, `subscribed`, `lang`, `created_at`, `updated_at`) VALUES
(1, NULL, 'nkuliherve@gmail.com', 1, NULL, '2019-01-23 07:09:13', '2019-01-23 07:16:46'),
(2, NULL, 'herveralive@gmail.com', 1, NULL, '2019-04-24 02:40:31', '2019-04-24 02:40:31'),
(3, NULL, 'uzarwanda@gmail.com', 1, NULL, '2019-04-25 09:03:58', '2019-04-25 09:03:58'),
(4, NULL, 'claudekwizera003@gmail.com', 1, NULL, '2019-04-29 16:00:46', '2019-04-29 16:00:46'),
(5, NULL, 'ntwalinj@yahoo.com', 1, NULL, '2019-04-30 13:04:34', '2019-04-30 13:04:34'),
(6, NULL, 'jniyivugukuri28@gmail.com', 1, NULL, '2019-04-30 13:44:07', '2019-04-30 13:44:07'),
(7, NULL, 'Aimeanathole@gmail.com', 1, NULL, '2019-05-01 14:40:37', '2019-05-01 14:40:37'),
(8, NULL, 'donatnshimiyimana@gmail.com', 1, NULL, '2019-05-02 14:08:54', '2019-05-02 14:08:54'),
(9, NULL, 'alinenshuti7@gmail.com', 1, NULL, '2019-05-05 17:41:13', '2019-05-05 17:41:13'),
(10, NULL, 'bampireflori@gmail.com', 1, NULL, '2019-05-05 17:51:50', '2019-05-05 17:51:50'),
(11, NULL, 'aaronrutinduk@gmail.com', 1, NULL, '2019-05-05 18:16:50', '2019-05-05 18:16:50'),
(12, NULL, 'jacksonkaj19@gmail.com', 1, NULL, '2019-05-08 13:03:20', '2019-05-08 13:03:20'),
(13, NULL, 'emmyvosco@gmail.ccom', 1, NULL, '2019-05-08 14:35:38', '2019-05-08 14:35:38'),
(14, NULL, 'emmynet2020@yahoo.fr', 1, NULL, '2019-05-08 18:24:07', '2019-05-08 18:24:07'),
(15, NULL, 'nkurumauri@gmail.com', 1, NULL, '2019-05-10 11:05:34', '2019-05-10 11:05:34'),
(16, NULL, 'jeanclaudenshimiyingabire@gmail.com', 1, NULL, '2019-05-11 14:46:27', '2019-05-11 14:46:27'),
(17, NULL, 'selectquality.internationalltd@gmail.com', 1, NULL, '2019-05-11 17:27:16', '2019-05-11 17:27:16'),
(18, NULL, 'iradukunda250rwanda@gmail.com', 1, NULL, '2019-05-12 10:48:25', '2019-05-12 10:48:25'),
(19, NULL, 'mugobokismail@gmail.com', 1, NULL, '2019-05-14 08:24:32', '2019-05-14 08:24:32'),
(20, NULL, 'narcissebizimana@gmail.com', 1, NULL, '2019-05-14 11:18:19', '2019-05-14 11:18:19'),
(21, NULL, 'jeanmarcdusingize@gmail.com', 1, NULL, '2019-05-14 12:08:55', '2019-05-14 12:08:55'),
(22, NULL, 'emmabikorimana035@gmail.com', 1, NULL, '2019-05-14 15:18:49', '2019-05-14 15:18:49'),
(23, NULL, 'ericuskhedirah222@gmail.com', 1, NULL, '2019-05-14 17:15:38', '2019-05-14 17:15:38'),
(24, NULL, 'djntivuguruzwaemmanuel@gmail.com', 1, NULL, '2019-05-15 05:51:54', '2019-05-15 05:51:54'),
(25, NULL, 'fgudway@gmail.com', 1, NULL, '2019-05-15 09:16:27', '2019-05-15 09:16:27'),
(26, NULL, 'dellamis11@gmail.com', 1, NULL, '2019-05-15 19:13:31', '2019-05-15 19:13:31'),
(27, NULL, 'ingiriyibangabenjamin@gmail.com', 1, NULL, '2019-05-15 19:23:06', '2019-05-15 19:23:06'),
(28, NULL, 'pacisirakoze@gmail.com', 1, NULL, '2019-05-15 19:38:46', '2019-05-15 19:38:46'),
(29, NULL, 'mhmaurice1@gmail.com', 1, NULL, '2019-05-15 22:30:05', '2019-05-15 22:30:05'),
(30, NULL, 'musonifiston77@gmail.com', 1, NULL, '2019-05-16 12:38:34', '2019-05-16 12:38:34'),
(31, NULL, 'Mukarukundodile1@gmail.com', 1, NULL, '2019-05-16 14:18:20', '2019-05-16 14:18:20'),
(32, NULL, 'ntakirutimana1346@gmail.Com', 1, NULL, '2019-05-16 20:11:03', '2019-05-16 20:11:03'),
(33, NULL, 'kubwimanabonaventure@gmail.com', 1, NULL, '2019-05-17 10:45:56', '2019-05-17 10:45:56'),
(34, NULL, 'joan.agisha@gmail.com', 1, NULL, '2019-05-17 13:33:34', '2019-05-17 13:33:34'),
(35, NULL, 'thierryprince84@gmail.com', 1, NULL, '2019-05-17 19:33:41', '2019-05-17 19:33:41'),
(36, NULL, 'iradujdd4@gmail.com', 1, NULL, '2019-05-18 02:22:35', '2019-05-18 02:22:35'),
(37, NULL, 'robbingabo9@gmail.com', 1, NULL, '2019-05-20 10:57:32', '2019-05-20 10:57:32'),
(41, NULL, 'bampireflori@gmail.com1', 1, NULL, '2019-05-22 09:48:52', '2019-05-22 09:48:52'),
(42, NULL, 'tademmy@gmail.com', 1, NULL, '2019-05-23 11:12:09', '2019-05-23 11:12:09'),
(43, NULL, 'kanamurire.joieaimee@gmail.com', 1, NULL, '2019-05-23 11:56:24', '2019-05-23 11:56:24'),
(44, NULL, 'nadineu840@gmail.com', 1, NULL, '2019-05-24 09:47:56', '2019-05-24 09:47:56'),
(45, NULL, 'leoncie4.nyiramana@gmail.com', 1, NULL, '2019-05-24 10:02:17', '2019-05-24 10:02:17'),
(46, NULL, 'herbixbix@gmail.com', 1, NULL, '2019-05-24 10:33:58', '2019-05-24 10:33:58'),
(47, NULL, 'souleymaneyconde@gmail.com', 1, NULL, '2019-06-07 01:37:01', '2019-06-07 01:37:01'),
(48, NULL, 'tumugide@gmail.com', 1, NULL, '2019-06-08 11:28:09', '2019-06-08 11:28:09'),
(49, NULL, 'emmyvosco@gmail.com', 1, NULL, '2019-06-26 22:33:13', '2019-06-26 22:33:13'),
(50, NULL, 'sosthenty@gmail.com', 1, NULL, '2019-06-28 21:40:31', '2019-06-28 21:40:31'),
(51, NULL, 'nishimwe.valens1990@gmail.com', 1, NULL, '2019-06-28 21:50:01', '2019-06-28 21:50:01'),
(52, NULL, 'angeliqueniyomugabo44@gmail.com', 1, NULL, '2019-06-29 09:26:33', '2019-06-29 09:26:33'),
(53, NULL, 'jpaul.niyonsaba@uok.ac.rw', 1, NULL, '2019-06-30 02:45:37', '2019-06-30 02:45:37'),
(54, NULL, 'kalimbagad@gmail.com', 1, NULL, '2019-06-30 12:51:53', '2019-06-30 12:51:53'),
(55, NULL, 'uwarobertoaimable@gmail.com', 1, NULL, '2019-06-30 19:41:43', '2019-06-30 19:41:43'),
(56, NULL, 'twizeyimanajudith@gmail.com', 1, NULL, '2019-06-30 21:02:32', '2019-06-30 21:02:32'),
(57, NULL, 'jkomayombi2@gmail.com', 1, NULL, '2019-07-01 10:29:33', '2019-07-01 10:29:33'),
(58, NULL, 'neilla2020@gmail.com', 1, NULL, '2019-07-02 12:59:46', '2019-07-02 12:59:46'),
(59, NULL, 'nsimplice0@gmail.com', 1, NULL, '2019-07-02 22:54:26', '2019-07-02 22:54:26'),
(60, NULL, 'mikelamar8@gmail.com', 1, NULL, '2019-07-03 10:09:49', '2019-07-03 10:09:49'),
(61, NULL, 'mugwaremy@gmail.com', 1, NULL, '2019-07-03 21:04:30', '2019-07-03 21:04:30'),
(63, NULL, 'byukusengejoseline@gmail.com', 1, NULL, '2019-07-04 08:22:54', '2019-07-04 08:22:54'),
(64, NULL, 'odille1998@gmail.com', 1, NULL, '2019-07-04 08:26:42', '2019-07-04 08:26:42'),
(65, NULL, 'umwizasolange408@gmail.com', 1, NULL, '2019-07-06 02:58:18', '2019-07-06 02:58:18'),
(67, NULL, 'kamikazihafsa2@gmail.com', 1, NULL, '2019-07-06 06:49:15', '2019-07-06 06:49:15'),
(68, NULL, 'Chist.ouass@gmail.com', 1, NULL, '2019-07-09 04:39:17', '2019-07-09 04:39:17'),
(69, NULL, 'christouass@gmail.com', 1, NULL, '2019-07-09 04:39:50', '2019-07-09 04:39:50'),
(70, NULL, 'irangirabelyse@gmail.com', 1, NULL, '2019-07-10 03:40:15', '2019-07-10 03:40:15'),
(71, NULL, 'ahisha3000@yahoo.fr', 1, NULL, '2019-07-10 20:01:20', '2019-07-10 20:01:20'),
(72, NULL, 'manzipatrick14@gmail.com', 1, NULL, '2019-07-10 23:13:50', '2019-07-10 23:13:50'),
(73, NULL, 'jeandamadu@gmail.com', 1, NULL, '2019-07-13 15:08:14', '2019-07-13 15:08:14'),
(75, NULL, 'iradukundaasher@gmail.com', 1, NULL, '2019-07-13 23:03:56', '2019-07-13 23:03:56'),
(76, NULL, 'gikundirochacha2002@gmail.com', 1, NULL, '2019-07-16 14:31:23', '2019-07-16 14:31:23'),
(77, NULL, 'zmajune@gmail.com', 1, NULL, '2019-07-16 15:06:15', '2019-07-16 15:06:15'),
(78, NULL, 'wakhalifa2018@gmail.com', 1, NULL, '2019-07-17 10:15:06', '2019-07-17 10:15:06'),
(79, NULL, 'mihigonshutiherve8cncn@gmail.com', 1, NULL, '2019-07-19 16:29:44', '2019-07-19 16:29:44'),
(80, NULL, 'igiraprudence3991993@gmail.com', 1, NULL, '2019-07-26 18:10:14', '2019-07-26 18:10:14'),
(81, NULL, 'bazizanea03@gmail.com', 1, NULL, '2019-07-26 23:17:45', '2019-07-26 23:17:45'),
(82, NULL, 'mushafeli1990@yahoo.fr', 1, NULL, '2019-07-27 13:01:34', '2019-07-27 13:01:34'),
(83, NULL, 'umutonidivine2000@gmail.com', 1, NULL, '2019-07-27 21:13:02', '2019-07-27 21:13:02'),
(84, NULL, 'olibanje@gmail.com', 1, NULL, '2019-07-30 12:20:56', '2019-07-30 12:20:56'),
(85, NULL, 'sebalexis67@gmail.com', 1, NULL, '2019-08-06 19:36:49', '2019-08-06 19:36:49'),
(86, NULL, 'Nelsonshyaka788235342@gmail.com', 1, NULL, '2019-08-12 19:50:04', '2019-08-12 19:50:04'),
(87, NULL, 'umuhozamart@gmail.com', 1, NULL, '2019-08-17 05:42:36', '2019-08-17 05:42:36'),
(88, NULL, 'hakuziyaremyealexandre1@gmail.com', 1, NULL, '2019-09-02 04:54:19', '2019-09-02 04:54:19'),
(89, NULL, 'abdoulhakimniyonkuru56@gmail.com', 1, NULL, '2019-09-03 08:33:41', '2019-09-03 08:33:41'),
(90, NULL, 'emerymurenzi@gmail.com', 1, NULL, '2019-09-04 10:17:39', '2019-09-04 10:17:39'),
(91, NULL, 'klainpro0@gmail.com', 1, NULL, '2019-09-04 10:17:59', '2019-09-04 10:17:59'),
(92, NULL, 'kabatesipeace0@gmail.com', 1, NULL, '2019-09-11 09:02:22', '2019-09-11 09:02:22'),
(93, NULL, 'njiniyo35@gmail.com', 1, NULL, '2019-09-22 03:28:47', '2019-09-22 03:28:47'),
(94, NULL, 'izaparfait60@gmail.com', 1, NULL, '2019-09-25 03:19:49', '2019-09-25 03:19:49'),
(95, NULL, 'kamanzimico.chriss@gmail.com', 1, NULL, '2019-09-26 14:08:39', '2019-09-26 14:08:39'),
(96, NULL, 'manziberry13@gmail.com', 1, NULL, '2019-09-27 05:47:52', '2019-09-27 05:47:52'),
(97, NULL, 'manziberry250@gmail.com', 1, NULL, '2019-10-10 07:26:11', '2019-10-10 07:26:11'),
(98, NULL, 'jeanishimwe653@gmail.com', 1, NULL, '2019-11-01 17:02:00', '2019-11-01 17:02:00'),
(100, NULL, 'shmwaron@gmail.com', 1, NULL, '2019-11-07 13:27:02', '2019-11-07 13:27:02'),
(101, NULL, 'gihanainnocent2@gmail.com', 1, NULL, '2019-11-25 00:12:08', '2019-11-25 00:12:08'),
(102, NULL, 'rugemadidier789@gmail.com', 1, NULL, '2019-11-26 06:49:41', '2019-11-26 06:49:41'),
(103, NULL, 'dusingizejeanmarc@yahoo.fr', 1, NULL, '2019-12-31 04:30:08', '2019-12-31 04:30:08'),
(104, NULL, 'nindenkimanablaskus@gmail.com', 1, NULL, '2020-01-16 16:40:26', '2020-01-16 16:40:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_02_25_201728_create_portfolios_table', 1),
(4, '2018_02_25_201845_laratrust_setup_tables', 1),
(5, '2018_02_25_202218_create_gallery_table', 1),
(6, '2018_02_25_202432_create_adverts_table', 1),
(7, '2018_02_25_202733_create_partners_table', 1),
(8, '2018_02_25_204457_create_contacts_table', 1),
(9, '2018_03_04_191801_create_team_table', 1),
(10, '2018_08_17_055859_create_maillists_table', 1),
(11, '2018_08_19_075700_create_pages_table', 1),
(12, '2018_08_20_094612_create_faqs_table', 1),
(13, '2018_08_20_114132_create_tags_table', 1),
(14, '2018_11_07_072429_create_abouts_table', 1),
(15, '2018_12_08_181315_create_services_table', 1),
(16, '2019_01_16_115129_create_slides_table', 2),
(17, '2018_12_31_083932_create_testimonials_table', 3),
(18, '2018_03_10_145124_create_posts_table', 4),
(19, '2018_08_17_054740_create_categories_table', 4),
(20, '2018_08_17_054902_create_comments_table', 4),
(21, '2018_09_30_095755_create_comment_replies_table', 4),
(22, '2018_11_12_044735_create_post_tag_table', 4),
(23, '2018_12_08_161853_create_events_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `user_id`, `name`, `description`, `email`, `logo`, `address`, `website`, `is_published`, `created_at`, `updated_at`) VALUES
(1, 17, 'University of Rwanda', NULL, NULL, '1556184406-download (2).jpg', NULL, 'https://ur.ac.rw/', 1, '2019-01-17 08:43:36', '2019-04-27 21:14:33'),
(7, 17, 'ICT Chamber', NULL, NULL, '1569392786.jpg', NULL, 'http://www.ict.rw', 0, '2019-09-25 06:26:26', '2020-01-10 05:47:42'),
(8, 17, 'Progate', NULL, NULL, '1569392919.jpg', NULL, 'https://progate.com/', 1, '2019-09-25 06:28:39', '2019-11-01 08:51:45'),
(9, 17, 'MINICT', NULL, NULL, '1572279972.png', NULL, NULL, 0, '2019-10-28 16:26:12', '2019-11-01 08:51:50'),
(10, 17, 'RISA', NULL, NULL, '1572280020.png', NULL, NULL, 0, '2019-10-28 16:27:00', '2019-11-01 08:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mnanibosco@gmail.com', '$2y$10$o3gml/Xb/IDD5X5RCsUNW.kbYK2oCMD3LUJXlNd69PE7ulahbRaMS', '2019-04-27 17:15:11'),
('jniyivugukuri28@gmail.com', '$2y$10$FfnoOfNeDL8eONKLfI1pEeB8OjmfXoRN5NmKbELYtG9yvbQg9yiVC', '2019-04-30 13:43:31'),
('honorettetwag123@gmail.com', '$2y$10$jIrtuf8klacTMaCRG9osvu4wHodfjQswc5eJmCGoPaW4vj4VDFE/i', '2019-04-30 19:22:37'),
('angelrwabu@gmail.com', '$2y$10$Sp9uyRXqXAD7ei3OsDiFxejyX3HZ3.IlAqg15uiyUSPndmOD5ShVm', '2019-05-01 18:51:30'),
('bampireflori@gmail.com', '$2y$10$GmiuhJjPJmWu8IjoVWnWp.Jxe.B/IiI85gtfgejMRpqAcMamq8VaC', '2019-05-05 20:18:17'),
('bahireur.ac.rw@gmail.com', '$2y$10$oYQi4jeeZ5fmQMIUf8U9RuxRLbSL9x0KK4gk9L01WiYDvh7EM140G', '2019-05-10 08:59:13'),
('ntabanarachel@gmail.com', '$2y$10$PQGfloS5kTQyqDOlCbtQKelDvwoUpz2e.6yEzMTWlVLjbqnMmsWXa', '2019-05-10 10:11:22'),
('nirelian2@gmail.com', '$2y$10$3tli/6USNrE7SpQYdXy5nOOsV2hYktnd8bHtdgef6ZuRCRfGh7.ZS', '2019-05-13 07:34:38'),
('karurangajames@gmail.com', '$2y$10$Ymyc1yL3jaz9lEKKCvfvR.VSJZMqMxdhnVnENdnv2gX7pHBfE5q2S', '2019-05-13 16:46:24'),
('byagutangaza@gmail.com', '$2y$10$.LLJ.UKlX2H1hw0nW/rM9uWhhkQ6Opg5yLX8iIWyYgv3GlPLXhrcS', '2019-05-14 09:22:14'),
('uritha3@gmail.com', '$2y$10$yItUxMHxAgkHeWLz0f93Nex3pwebJU5RjL6vk9BjpvBKypEkpVD5G', '2019-05-14 09:53:36'),
('machris2020@gmail.com', '$2y$10$5b6iYqbGrmOrSrurXxyB4e4YH0bn3yEFTJO3TqqTMrfOTfUt9A9ha', '2019-05-14 10:03:17'),
('nizeyeclau@gmail.com', '$2y$10$3R1FsNfm/8Td/GgfHUa3mug1jquiRhmBf4Ce5XGsvqU9kq.BvmUii', '2019-05-14 10:09:28'),
('faustinmugabress@gmail.com', '$2y$10$tkrlAMXqyZYBtMc0054Te.PPCq/3tvM6Be.oMm/9zc5uPNQp63z/.', '2019-05-14 10:14:01'),
('noauwimana@gmail.com', '$2y$10$9CAJEIWcEJOKhwI2KoitiOc7fAC/dWMhE5bJOlvFadQmcLc8IdNTK', '2019-05-14 10:39:32'),
('narcissebizimana@gmail.com', '$2y$10$6QfEmKR91NLzweAV5jILhOVAWej1iv3JDRqzIqAawM6DyjzhGYYA2', '2019-05-14 11:09:39'),
('lewismugabo84@gmail.com', '$2y$10$Jt4rZww7YimEGAZjUm.5de3TsloamNmCEtQfD4vRxWFR41iB5DeM.', '2019-05-14 11:14:19'),
('diddynu2000@gmail.com', '$2y$10$qo8dXyQPpD8rg.pIdmFHpuaSgfH.vbGPNJevRrsEbo1aMThQwstM6', '2019-05-14 12:34:18'),
('pacisirakoze@gmail.com', '$2y$10$WAAh61ROKa6.81k.pps2R..NDWA66Pj5Hsp4ZJv9LqCzF26wZt30K', '2019-05-14 17:17:40'),
('cyubrande2020@gmail.com', '$2y$10$TErDwXZqTakxp6.0pF2mM.olMl2OuOuWwR.Hd0pF2zlKB7gCoMZ1.', '2019-05-14 18:49:04'),
('inshunguspes9@gmail.com', '$2y$10$U7lIGTqdpHbKWxQuzLev8uPrVE7cRTk9KT7Wp0XSkNmYF/C4ml1pW', '2019-05-14 19:23:25'),
('jyaprotais@gmail.com', '$2y$10$c0oHeIGk6iiM/TD4nQcy3.sN0vur2oRaeChVSJE/41dUwn8bvlPOi', '2019-05-15 09:02:43'),
('princessemunyaneza@akilahinstitute.org', '$2y$10$Kpr4toIr/bq36cGarp1QqODu82taUzUUjbpWsxwncMqqOPX6GEAG.', '2019-05-15 13:35:23'),
('umerance@gmail.com', '$2y$10$/tqJRdCsNiYEDf18Mvsgx./sBdE/RPs89g6m4Q3jYKFW7cNv1XywC', '2019-05-15 21:42:26'),
('Mukarukundodile1@gmail.com', '$2y$10$UV2O3BHCRw66/hutE9vA2ujVP1NLYCtT0S0aUa5oUdF7E1WrKcHpu', '2019-05-16 14:39:05'),
('claudinen202@gmail.com', '$2y$10$6FZpPd5yoIufTCJESTq7De4RY3A9KEIa6n0FMmMRgmOYur.Kip08u', '2019-05-16 20:37:14'),
('ingiriyibangabenjamin@gmail.com', '$2y$10$KL47l9xZ64wQeq5QV9DE/OEU4uPHk4MumPtDYFBfH7eVIqnFgy98O', '2019-05-17 07:33:03'),
('nadineu840@gmail.com', '$2y$10$d4JQrmx0vM5L2lGW1FIHKuQZxK/5Z6oy0hGdblXLA7jEubJrahqhu', '2019-05-24 09:56:36'),
('assoumptabyksng@gmail.com', '$2y$10$vmFEDkiaNr4b8N5lkTdJbOwIgrwI6R.UkRUtTWHaJKn7OnGiq7cCK', '2019-05-24 23:09:17'),
('sosthenty@gmail.com', '$2y$10$11wLsfb6UErqIw2ee2QkXOs82W0/mLpGM6H9jdAE0OC/GyN0OCfgC', '2019-06-28 21:30:11'),
('manzidiggyfabrice@gmail.com', '$2y$10$FhQfkuF9yrBIa02pBt6twO1nNPFTJYW7odxJKfEsRLvHLU68HfHny', '2019-06-30 07:33:18'),
('uwarobertoaimable@gmail.com', '$2y$10$YPh6tXp6k3l0TUA0KiElBuYjepgy6jbgTaFH98QtailjNQT7aYQwe', '2019-06-30 21:02:44'),
('ngabojck@gmail.com', '$2y$10$zanp1WCU/Twf94I78WiZN.5Syd.xWFbUmyknS3E.p0EcInV85n6ny', '2019-07-02 19:17:42'),
('nkuliherve@gmail.com', '$2y$10$41nn.yyUKlfehEuOO4LmFu1IYQN2692aboWvSDawAxrrMJDUVuiUe', '2019-07-09 10:36:33'),
('ihimbazwep@gmail.com', '$2y$10$WR4p5LKUDkqfIPWr3tGU9.If.EPXN0TVbiKm4vjsnsRTYEwt7RL9G', '2019-07-15 19:48:14'),
('derrickmuhizi@gmail.com', '$2y$10$ZrPUIBChfDq81EbA3L6fButvKaqgqNhiAzulVMV9Ix5EsVoSZP456', '2019-07-16 14:49:13'),
('zmajune@gmail.com', '$2y$10$Vr95qLPvOlypMpXJpGvszOHxIjscuUylb.I6UiBiP9Sa6ovW9WFK6', '2019-07-16 15:05:55'),
('kinggiddy@gmail.com', '$2y$10$/Gxh7p.7GKDNZz2xeZT8rOWBN5DvdzoU2wTwFt3Yok91bLVg/vN7e', '2019-07-16 19:11:55'),
('mutegaraba03@gmail.com', '$2y$10$.zWbsAtRk4MpE.bVrR916epqoxXODsG01z3WXu5gCPGKUj7dByqau', '2019-07-17 17:38:28'),
('abayisengabora@gmail.com', '$2y$10$7MGffcNWmkMMR9nXMT01yukgV8kwjr.3UTw0OvMqzZLmRXk0rS5FG', '2019-07-19 12:03:32'),
('cyuzuzoremypatrick@gmail.com', '$2y$10$ccco8udH/pOga6yRGGQYgO5zKl..EBhyvBWD7qtsug091SUx8rUHW', '2019-07-22 00:03:57'),
('elieboramungu1@gmail.com', '$2y$10$38fMq4LNRQ0nNAXXBTdHMuIxsUqnvrLUQK0K97cohyUzt.IDqeiWq', '2019-07-26 19:05:34'),
('uwerasandra123@gmail.com', '$2y$10$.T6F8cHUS2E5VLXkG022gOak.YlobzJgrWkns2S8GywUAURVA5.56', '2019-07-26 22:10:47'),
('specioseniyobuhungiro@gmail.com', '$2y$10$HlD9d5SDG4wtcK5z7uZGdOq.FJSATBCwaV75eRsJof1fB.VD1dsma', '2019-07-26 22:20:18'),
('bazizanea03@gmail.com', '$2y$10$tA4wgyoYnlVJNI2fUxWjgemLFuoBg6KnAyPsdMu4n1prrCAWJMCXK', '2019-07-26 23:16:57'),
('claudejohn334@gmail.com', '$2y$10$BW8spdmcw.ssgkObRDFqtu727R78Mwj/RxwdDeY4A0n1QVy13crlW', '2019-07-27 22:21:41'),
('davmanishimwe2018@gmail.com', '$2y$10$a/NtKRIMPrBvVOyT32smzeDdVhPUubt0oz2Dq.eB8pJ4RM9m7hKve', '2019-07-28 12:09:42'),
('jeadehab@gmail.com', '$2y$10$jqHdHlHX7tNcL2dU.D4QiePuR.OmzzIcm9XQeEM3hK6SGdV8x4N06', '2019-08-03 16:11:42'),
('tomrwaka@gmail.com', '$2y$10$Q4GQGVIGrRLSJdgbjarBm.VJJoQyARAXKhG5.oijaNbkjTG6VgNdC', '2019-08-04 13:57:08'),
('pacifnk@yahoo.fr', '$2y$10$1OtMDRU/Dh2mPujd1hdt/ucoYo4DeL22xY8m0RzTE.//HBFSy35R.', '2019-08-05 07:11:43'),
('Nelsonshyaka788235342@gmail.com', '$2y$10$DfJmm0JSEK/PFibgYxUiyOD766uluOeEgZz/Rwj4NBOM24V.7tWze', '2019-08-13 04:58:50'),
('davidrukundo20@gmail.com', '$2y$10$oMNk2KVy5ObWwECqJOlLf.k6JriRY.Sid92GvK7D1i5D8JCxWTRqy', '2019-08-21 05:52:35'),
('klainpro0@gmail.com', '$2y$10$tC0oordtJttjxXj1IG3Si.g3CwX7WvFnm5JmjzLUpq72ydRzxhoja', '2019-09-04 10:18:24'),
('ulrichskyler7@gmail.com', '$2y$10$nmtcTNBa09fk7HUG9cDn3.euehG6RBgJKq.nCl.xBmS9wnj9.s1ju', '2019-09-04 10:34:51'),
('gadbigirimana93@gmail.com', '$2y$10$1hg35BgtoEUANW6px6AeT.4K4bfqUH5bv7dQ47ACw1gj6Q7Si0ATu', '2019-09-05 02:42:55'),
('amanishema90@gmail.com', '$2y$10$elRsFHFD.S9HohTU9zlpZO5n050As3PwKNJM/SUfOukuHXX2AgL.2', '2019-09-05 14:39:44'),
('aimevoltaire2001@gmail.com', '$2y$10$K5QyWpEiN08CNKVHpQV9OeJorIkBTVrghBitG6Ogzs3gHHpGDr00u', '2019-09-06 08:54:30'),
('tuyizeclaire@gmail.com', '$2y$10$r.1PSduBxZElLHXH3rnU1ufdlJXmwNYSpFzFjiyCIy3XyFvsU9YEa', '2019-10-02 07:29:51'),
('jeanishimwe653@gmail.com', '$2y$10$IcuCrrhyLN3JYzWAEUVAzempKPASMWUqwoGBo.l6Vjty5bXWVG9Cq', '2019-11-01 16:59:15'),
('nezawinnie@gmail.com', '$2y$10$XOyAx8Let0Wy93ftBe1vaujVG/cAOt3ypr1edcqKa2X5QJCKBXBQu', '2019-12-05 10:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `user_id`, `file_name`, `title`, `program_id`, `description`, `location`, `slug`, `live`, `lang`, `created_at`, `updated_at`) VALUES
(2, 1, '1556183707-FB_IMG_1552722567554.jpg', 'Tour Study at FabLab', 2, '', NULL, 'portifo-2-26325', 1, NULL, '2019-01-17 12:01:55', '2019-04-26 21:11:23'),
(3, 1, '1556184247-IMG_8694.JPG', 'Digital Skills Training', 4, '', NULL, 'portifo-3-17685', 1, NULL, '2019-01-17 12:02:11', '2019-04-26 21:18:51'),
(4, 1, '1556183420-download.jpg', 'NURC Platform', 1, '', NULL, 'portifo-4-43117', 1, NULL, '2019-01-17 12:02:24', '2019-07-16 07:52:52'),
(5, 1, '1556313027-IMG_6658.JPG', 'CMS Workshop', 4, '', NULL, 'portifo-5-13419', 1, NULL, '2019-01-17 12:02:37', '2019-04-26 21:10:27'),
(6, 1, '1556313462-IMG-20180502-WA0009.jpg', 'UX MeetUp', 2, '', NULL, 'portifo-6-67789', 1, NULL, '2019-01-17 12:02:54', '2019-04-26 21:17:42'),
(7, 1, '1556313717-IMG_20180418_175916.jpg', 'Cyber Security Workshop', 4, '', NULL, 'portifo-7-98741', 1, NULL, '2019-01-17 12:57:52', '2019-04-26 21:21:57'),
(8, 1, '1556313266-IMG_4582.JPG', 'Computer Help Desk', 3, '', NULL, 'portifo-8-75817', 1, NULL, '2019-01-17 12:58:06', '2019-04-26 21:14:26'),
(9, 17, '1556738640.jpg', 'UX Training', 2, NULL, NULL, 'ux-training-18103', 0, NULL, '2019-05-01 19:24:00', '2019-10-30 09:58:09'),
(10, 17, '1561999228.JPG', 'FrontEnd Re-United Kigali Conference', 5, NULL, NULL, 'frontend-re-united-kigali-conference-22888', 1, NULL, '2019-07-01 16:40:28', '2019-10-30 09:53:38'),
(11, 17, '1561999335.jpg', 'Cyber Security Conference', 5, NULL, NULL, 'cyber-security-conference-64216', 1, NULL, '2019-07-01 16:42:15', '2019-07-01 16:42:15'),
(12, 17, '1562002302.jpg', 'Girls Coding Bootcamp', 2, NULL, NULL, 'girls-coding-bootcamp-42959', 1, NULL, '2019-07-01 17:31:42', '2019-07-01 17:31:42'),
(14, 17, '1562002482.jpg', 'Cyber Security Trends', 5, '', NULL, 'cyber-security-trends-11135', 1, NULL, '2019-07-01 17:34:42', '2019-07-01 19:04:31'),
(15, 17, '1566203619-download (1).jpg', 'NURC Platform', 1, '', NULL, 'abahuza-platform-52719', 1, NULL, '2019-07-16 07:53:41', '2019-08-19 08:34:22'),
(16, 17, '1563820063.jpg', 'SheCanHack Initiative', 2, NULL, NULL, 'shecanhack-initiative-67941', 1, NULL, '2019-07-22 18:27:43', '2019-07-22 18:27:43'),
(17, 17, '1566203955.jpg', 'World Environment Award', 1, NULL, NULL, 'world-environment-award-76417', 1, NULL, '2019-08-19 08:39:15', '2019-08-19 08:39:15'),
(18, 17, '1566204695.JPG', 'Zero Day Attack Workshop', 4, NULL, NULL, 'zero-day-attack-workshop-16269', 1, NULL, '2019-08-19 08:51:35', '2019-08-19 08:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `views` int(10) UNSIGNED DEFAULT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `content`, `slug`, `thumbnail`, `is_published`, `views`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Transform Africa 2017 yasigiye isomo abanyeshuri b’ikoranabuhanga muri Kaminuza y’u Rwanda', '<p>Abanyeshuri biga mu Ishuri ry’Ikoranabuhanga muri Kaminuza y’u Rwanda bishimiye umusaruro bakuye mu nama Mpuzamahanga yiga ku buryo rikoreshwa mu kwihutisha iterambere n’ubukungu bwa Afurika ‘Transform Africa 2017’ yitabiriwe n’abasaga 4000 baturutse mu bihugu 81.</p>\n<p>Aba banyeshuri bibumbiye mu Muryango uhuza abiga ikoranabuhanga witwa ’Broadcasters of Information, Communication and Technology (BICT). Bafite intego yo gukwirakwiza ikoranabuhanga ku bantu bose, watangijwe na Uzaruharanira Marc muri Nzeri 2016.</p>\n<p>Nyuma waje kwaguka ugezwa ku banyeshuri bose biga ikoranabuhanga ndetse batangira gutegura imishinga itandukanye igamije impinduka za rusange.</p>\n<p>Abitabiriye Transform Africa yabereye i Kigali kuva ku wa 10 kugeza ku wa 12 Gicurasi 2017, barimo Umuyobozi wa BICT, Uzaruharanira Marc n’abandi bagize komite barimo Byiringiro Consolatrice, Mutabazi Patrick, Uwayo Magnifique Odille na Dieudonné Dusabimana. Aba bose banyuzwe n’uko ikoranabuhanga ryahawe intebe ndetse ryitezweho kongera ubukungu bw’u Rwanda na Afurika yose.</p>\n<p>Uyu Muryango watangiye ibikorwa birimo gufasha abanyeshuri bafite ibibazo bya mudasobwa ku buntu no kwigisha urubyiruko kuribyaza umusaruro mu iterambere rusange ry’igihugu.</p>\n<p>Uzaruharanira yatangaje ko bagiye gushyira imbaraga mu mishinga mito n‘iminini bafite irimo imurikabikorwa rizahuza abanyeshuri biga ikoranabuhanga ndetse no gutegura imishinga itatu izafasha abantu bose kwibona mu ikoranabuhanga. Iyi izamurikwa muri Transform Africa y’umwaka utaha.</p>\n<p>BICT imaze amezi asaga umunani itangiye ibikorwa byayo yatangiye gushimirwa intambwe imaze gutera. Abashoramari n’inararibonye mu ikoranabuhanga barimo Umuyobozi Ushinzwe Iterambere rya Afurika mu Kigega cy’Imari ku Isi (IMF), Monique Newiak; Umuyobozi muri Microsoft, Frank McCosker na Regis Rugemanshuro uyobora Ikigo cy’Ikoranabuhanga ‘BK TecHouse’, bashyigikiye imishinga abo banyeshuri ba BICT bafite, iteza imbere Afurika.</p>\n<p>Abibumbiye mu Muryango BICT bagaragaza ko bagihura n’imbogamizi zirimo kutagira ibikoresho bihagije, n’ibihari birimo za mudasobwa zifite ubushobozi budahagije ugereranyije n’ibikeneye gukorwa.</p>\n<p>Indi nzitizi ni ijyanye no kutagira inzu ibafasha gukora ubushakashatsi, binatuma ikoranabuhanga ryabo ridasakazwa mu Banyarwanda bose.</p>', 'transform-africa-2017-yasigiye-isomo-abanyeshuri-bikoranabuhanga-muri-kaminuza-yu-rwanda', '1556314165-DSC_0085_Old1.JPG', 0, NULL, NULL, '2019-03-01 05:31:03', '2019-06-08 18:59:22'),
(4, 1, NULL, 'Girls Coding Boot Camp Kigali Rwanda-College of Science and Technology', '<p>Women are vastly underrepresented in technical fields. While women are the leading adopters of technology, the software development industry is made up of 12% women. Where the remaining 82% is for boys. It seems to be a problem because of the gap between girls and boys in programming field. Girl’s boot camp will provide young women with unhindered access to computers in order to develop skills and creativity in using technology and to inspire them to join the next generation of Rwandan technology entrepreneurs. The camp will encourage young women to become active citizens by building their self-esteem, confidence, and skills. These have been the main reason for the conception of this project. We are convinced that this project will solve the gap between girls and boys in the field of programming.</p>\n<p><br>On 14th December, stakeholders gathered to participate in Girl’s Coding Boot Camp, located in Design Thinking hub located UR CST- Nyarugenge campus to discuss how potential changes in extreme events related to young women empowerment in STEM may impact our utility and community.</p>\n<p><br>Boot Camp participants included all female students in School of ICT. Throughout the workshop, participants were asked to develop a small mock-up of a website so as to exercise practically their courses. In particular, the boot camp focused on how to relate programming languages to our daily life applications.</p>\n<p>The aim of the boot camp is to encourage more girls to pursue technology careers by empowering them with vital knowledge to facilitate their success.</p>', 'girls-coding-boot-camp', '1556319221.jpg', 1, NULL, NULL, '2019-04-26 22:53:41', '2019-04-26 22:55:19'),
(5, 17, 2, 'BICT Members Was awarded as 1st Winner in World Environment Day', '<p style=\"text-align:justify;\">Menya App &amp; USSD CODE; it’s an mobile application which can be used on both Smartphone androids, IOS and cellular telephones which was developed by <strong>Gloria KAMWEZI,Fred MUCYO , MANZI Patrick, RWEMA Dominique and BYAGUTANGAZA Theoneste </strong> to provide information about climate change, environment, disasters, air pollution and natural resources  to the population. </p>\n<p style=\"text-align:justify;\"> It was awarded as the first innovative project to wards climate change, environment and air pollution by REMA at world environment day celebration on 5th June 2019 at Kigali Convention Center. This award includes <strong>Certificates, Computer Laptops and Prize of Fully sponsored trip to AKAGERA, NYUNGWE and VOLCANOES National Parks</strong>.</p>\n<p style=\"text-align:justify;\">Rwanda faces significant environmental challenges. The main challenges facing the environment in Rwanda are pressure from the growing population on natural resources.</p>\n<p style=\"text-align:justify;\">MENYA is going to help Rwandans as well as visitors, investors to have all need information about climate change, air pollution, environment and natural resources.</p>', 'bict-team-was-awarded-as-1st-winner-in-world-environment-day-for-developing-menya-mobile-app-and-ussd-code', '1560019921.jpg', 1, NULL, NULL, '2019-06-08 18:52:01', '2019-08-19 08:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `user_id`, `name`, `slug`, `live`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Digital Platform', 'digital-platform', 1, NULL, '2019-04-30 11:35:39', '2019-04-30 12:16:08'),
(2, 1, 'Community Learning', 'community-learning', 1, NULL, '2019-04-30 11:37:52', '2019-04-30 12:16:09'),
(3, 1, 'Consultancy', 'consultancy', 1, NULL, '2019-04-30 11:38:09', '2019-04-30 12:16:10'),
(4, 1, 'Workshop & Training', 'workshop-and-training', 1, NULL, '2019-04-30 11:38:24', '2019-04-30 12:16:11'),
(5, 17, 'Conference', 'conference', 1, NULL, '2019-07-01 16:39:13', '2019-07-01 16:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'admin', '2019-01-15 12:23:06', '2019-01-15 12:23:06'),
(2, 'member', 'Member', 'Member', '2019-04-22 15:21:56', '2019-04-22 15:21:56'),
(3, 'not-a-member', 'Not A Member', 'Remove from membership', '2019-05-04 12:13:35', '2019-05-04 12:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\User'),
(1, 17, 'App\\User'),
(1, 48, 'App\\User'),
(2, 18, 'App\\User'),
(2, 25, 'App\\User'),
(2, 26, 'App\\User'),
(2, 27, 'App\\User'),
(2, 28, 'App\\User'),
(2, 29, 'App\\User'),
(2, 30, 'App\\User'),
(2, 31, 'App\\User'),
(2, 32, 'App\\User'),
(2, 33, 'App\\User'),
(2, 34, 'App\\User'),
(2, 35, 'App\\User'),
(2, 36, 'App\\User'),
(2, 37, 'App\\User'),
(2, 38, 'App\\User'),
(2, 39, 'App\\User'),
(2, 40, 'App\\User'),
(2, 41, 'App\\User'),
(2, 42, 'App\\User'),
(2, 43, 'App\\User'),
(2, 44, 'App\\User'),
(2, 46, 'App\\User'),
(2, 47, 'App\\User'),
(2, 49, 'App\\User'),
(2, 50, 'App\\User'),
(2, 51, 'App\\User'),
(2, 52, 'App\\User'),
(2, 53, 'App\\User'),
(2, 54, 'App\\User'),
(2, 55, 'App\\User'),
(2, 56, 'App\\User'),
(2, 57, 'App\\User'),
(2, 58, 'App\\User'),
(2, 59, 'App\\User'),
(2, 60, 'App\\User'),
(2, 61, 'App\\User'),
(2, 62, 'App\\User'),
(2, 63, 'App\\User'),
(2, 64, 'App\\User'),
(2, 65, 'App\\User'),
(2, 66, 'App\\User'),
(2, 67, 'App\\User'),
(2, 68, 'App\\User'),
(2, 69, 'App\\User'),
(2, 70, 'App\\User'),
(2, 71, 'App\\User'),
(2, 72, 'App\\User'),
(2, 73, 'App\\User'),
(2, 74, 'App\\User'),
(2, 75, 'App\\User'),
(2, 76, 'App\\User'),
(2, 77, 'App\\User'),
(2, 78, 'App\\User'),
(2, 79, 'App\\User'),
(2, 80, 'App\\User'),
(2, 81, 'App\\User'),
(2, 82, 'App\\User'),
(2, 83, 'App\\User'),
(2, 84, 'App\\User'),
(2, 85, 'App\\User'),
(2, 86, 'App\\User'),
(2, 87, 'App\\User'),
(2, 88, 'App\\User'),
(2, 89, 'App\\User'),
(2, 90, 'App\\User'),
(2, 91, 'App\\User'),
(2, 92, 'App\\User'),
(2, 93, 'App\\User'),
(2, 94, 'App\\User'),
(2, 95, 'App\\User'),
(2, 96, 'App\\User'),
(2, 97, 'App\\User'),
(2, 98, 'App\\User'),
(2, 99, 'App\\User'),
(2, 100, 'App\\User'),
(2, 101, 'App\\User'),
(2, 102, 'App\\User'),
(2, 103, 'App\\User'),
(2, 104, 'App\\User'),
(2, 105, 'App\\User'),
(2, 106, 'App\\User'),
(2, 107, 'App\\User'),
(2, 108, 'App\\User'),
(2, 109, 'App\\User'),
(2, 110, 'App\\User'),
(2, 111, 'App\\User'),
(2, 112, 'App\\User'),
(2, 113, 'App\\User'),
(2, 114, 'App\\User'),
(2, 115, 'App\\User'),
(2, 116, 'App\\User'),
(2, 117, 'App\\User'),
(2, 118, 'App\\User'),
(2, 119, 'App\\User'),
(2, 120, 'App\\User'),
(2, 121, 'App\\User'),
(2, 122, 'App\\User'),
(2, 123, 'App\\User'),
(2, 124, 'App\\User'),
(2, 125, 'App\\User'),
(2, 126, 'App\\User'),
(2, 127, 'App\\User'),
(2, 128, 'App\\User'),
(2, 129, 'App\\User'),
(2, 130, 'App\\User'),
(2, 131, 'App\\User'),
(2, 132, 'App\\User'),
(2, 133, 'App\\User'),
(2, 134, 'App\\User'),
(2, 135, 'App\\User'),
(2, 136, 'App\\User'),
(2, 137, 'App\\User'),
(2, 138, 'App\\User'),
(2, 139, 'App\\User'),
(2, 140, 'App\\User'),
(2, 141, 'App\\User'),
(2, 142, 'App\\User'),
(2, 143, 'App\\User'),
(2, 144, 'App\\User'),
(2, 145, 'App\\User'),
(2, 146, 'App\\User'),
(2, 147, 'App\\User'),
(2, 148, 'App\\User'),
(2, 149, 'App\\User'),
(2, 150, 'App\\User'),
(2, 151, 'App\\User'),
(2, 152, 'App\\User'),
(2, 153, 'App\\User'),
(2, 154, 'App\\User'),
(2, 155, 'App\\User'),
(2, 156, 'App\\User'),
(2, 157, 'App\\User'),
(2, 158, 'App\\User'),
(2, 159, 'App\\User'),
(2, 160, 'App\\User'),
(2, 161, 'App\\User'),
(2, 162, 'App\\User'),
(2, 163, 'App\\User'),
(2, 164, 'App\\User'),
(2, 165, 'App\\User'),
(2, 166, 'App\\User'),
(2, 167, 'App\\User'),
(2, 168, 'App\\User'),
(2, 169, 'App\\User'),
(2, 170, 'App\\User'),
(2, 171, 'App\\User'),
(2, 172, 'App\\User'),
(2, 173, 'App\\User'),
(2, 174, 'App\\User'),
(2, 175, 'App\\User'),
(2, 176, 'App\\User'),
(2, 177, 'App\\User'),
(2, 178, 'App\\User'),
(2, 179, 'App\\User'),
(2, 180, 'App\\User'),
(2, 181, 'App\\User'),
(2, 182, 'App\\User'),
(2, 183, 'App\\User'),
(2, 184, 'App\\User'),
(2, 185, 'App\\User'),
(2, 186, 'App\\User'),
(2, 187, 'App\\User'),
(2, 188, 'App\\User'),
(2, 189, 'App\\User'),
(2, 190, 'App\\User'),
(2, 191, 'App\\User'),
(2, 192, 'App\\User'),
(2, 193, 'App\\User'),
(2, 194, 'App\\User'),
(2, 195, 'App\\User'),
(2, 196, 'App\\User'),
(2, 197, 'App\\User'),
(2, 198, 'App\\User'),
(2, 199, 'App\\User'),
(2, 200, 'App\\User'),
(2, 201, 'App\\User'),
(2, 202, 'App\\User'),
(2, 203, 'App\\User'),
(2, 204, 'App\\User'),
(2, 205, 'App\\User'),
(2, 206, 'App\\User'),
(2, 207, 'App\\User'),
(2, 208, 'App\\User'),
(2, 209, 'App\\User'),
(2, 210, 'App\\User'),
(2, 211, 'App\\User'),
(2, 212, 'App\\User'),
(2, 213, 'App\\User'),
(2, 214, 'App\\User'),
(2, 215, 'App\\User'),
(2, 216, 'App\\User'),
(2, 217, 'App\\User'),
(2, 218, 'App\\User'),
(2, 219, 'App\\User'),
(2, 220, 'App\\User'),
(2, 221, 'App\\User'),
(2, 222, 'App\\User'),
(2, 223, 'App\\User'),
(2, 224, 'App\\User'),
(2, 225, 'App\\User'),
(2, 226, 'App\\User'),
(2, 227, 'App\\User'),
(2, 228, 'App\\User'),
(2, 229, 'App\\User'),
(2, 230, 'App\\User'),
(2, 231, 'App\\User'),
(2, 232, 'App\\User'),
(2, 233, 'App\\User'),
(2, 234, 'App\\User'),
(2, 235, 'App\\User'),
(2, 236, 'App\\User'),
(2, 237, 'App\\User'),
(2, 238, 'App\\User'),
(2, 239, 'App\\User'),
(2, 240, 'App\\User'),
(2, 241, 'App\\User'),
(2, 242, 'App\\User'),
(2, 243, 'App\\User'),
(2, 244, 'App\\User'),
(2, 245, 'App\\User'),
(2, 246, 'App\\User'),
(2, 247, 'App\\User'),
(2, 248, 'App\\User'),
(2, 249, 'App\\User'),
(2, 250, 'App\\User'),
(2, 251, 'App\\User'),
(2, 252, 'App\\User'),
(2, 253, 'App\\User'),
(2, 254, 'App\\User'),
(2, 255, 'App\\User'),
(2, 256, 'App\\User'),
(2, 257, 'App\\User'),
(2, 258, 'App\\User'),
(2, 259, 'App\\User'),
(2, 260, 'App\\User'),
(2, 261, 'App\\User'),
(2, 262, 'App\\User'),
(2, 263, 'App\\User'),
(2, 264, 'App\\User'),
(2, 265, 'App\\User'),
(2, 266, 'App\\User'),
(2, 267, 'App\\User'),
(2, 268, 'App\\User'),
(2, 269, 'App\\User'),
(2, 270, 'App\\User'),
(2, 271, 'App\\User'),
(2, 272, 'App\\User'),
(2, 273, 'App\\User'),
(2, 274, 'App\\User'),
(2, 275, 'App\\User'),
(2, 276, 'App\\User'),
(2, 277, 'App\\User'),
(2, 278, 'App\\User'),
(2, 279, 'App\\User'),
(2, 280, 'App\\User'),
(2, 281, 'App\\User'),
(2, 282, 'App\\User'),
(2, 283, 'App\\User'),
(3, 19, 'App\\User'),
(3, 23, 'App\\User'),
(3, 45, 'App\\User');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `title`, `description`, `slug`, `file_name`, `live`, `lang`, `created_at`, `updated_at`) VALUES
(1, 17, 'Digital Solutions', 'We develop innovative and viable business ideas to prepare business leaders for the startups in incubation.', 'web-development-38664', '1563487244-rema.jpg', 1, NULL, '2019-01-18 13:12:07', '2019-07-18 22:00:44'),
(2, 17, 'SheCanHack Initiative', 'We engage Girls in Cyber security as a way to increase more females into cyber security industry and help them pursue their future careers.', 'desktop-application-77645', '1566806174-_DSC1834.JPG', 1, NULL, '2019-01-18 13:17:51', '2019-08-26 07:56:15'),
(3, 17, 'Girls Coding Bootcamp', 'Boot camps happen to support young women by accelerating their career in Software Development.', 'service-3', '1563489934-20171219_182037.jpg', 1, NULL, '2019-01-18 11:12:07', '2019-07-18 22:56:55'),
(4, 17, 'Community Learning', 'We promote ICT members’ role and responsibilities by empowering community in ICT skills in different areas of its application.', 'service-4', '1563492710-vvv.jpg', 1, NULL, '2019-01-18 11:17:51', '2019-08-19 08:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `user_id`, `title`, `subtitle`, `content`, `slug`, `thumbnail`, `is_published`, `lang`, `created_at`, `updated_at`) VALUES
(1, 17, 'WELCOME TO', 'BROADCASTERS OF ICT', '', 'welcome-to-74927', '1566804702-as.jpg', 1, NULL, '2019-01-17 04:29:30', '2019-08-26 07:33:16'),
(2, 17, 'We Protect', 'Cyber Space', '', 'greate-this-is-the-best-place-to-be-welcome-to-69972', '1558119265-DSC_0157.jpg', 1, NULL, '2019-01-17 04:38:35', '2019-06-08 08:57:28'),
(3, 17, 'WE ARE', 'PASSIONATE IN WHAT WE DO', '', 'we-are-64898', '1566804811-aw.jpg', 1, NULL, '2019-01-17 04:39:12', '2019-08-26 07:33:37'),
(4, 17, 'World Environment Day Award', 'Climate Change Solution', '', 'world-environment-day-award-61713', '1559984653.png', 1, NULL, '2019-06-08 09:04:14', '2019-06-08 09:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `sort` int(11) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '1',
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `email`, `tel`, `image`, `position`, `department`, `facebook_link`, `twitter_link`, `linkedin_link`, `instagram_link`, `bio`, `sort`, `is_published`, `lang`, `created_at`, `updated_at`) VALUES
(1, 'Marc Uzaruharanira', 'uzarwanda@gmail.com', NULL, '1562941376-IMG-20190711-WA0004.jpg', 'Chief Executive Officer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 11:30:00', '2019-07-29 10:16:57'),
(2, 'IRADUKUNDA Mia Benitha', 'iramiabenitha@gmail.com', NULL, '1556616554-IMG_20190429_091339.jpg', 'Executive Assistant', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 11:30:35', '2019-07-29 10:16:57'),
(3, 'KUBWIMANA Jean Baptiste', NULL, NULL, '1563498846-IMG-20190718-WA0002.jpg', 'PR & Communication', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 11:31:15', '2019-07-29 10:16:58'),
(4, 'NYIRAMUHIRE Dancille', NULL, NULL, '1562941697-IMG-20190710-WA0009.jpg', 'Director of Finance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 11:31:40', '2019-07-29 10:16:58'),
(7, 'RUKIZANGABO Aimable', 'person1@gamail.com', NULL, '1563499289-IMG-20190718-WA0003.jpg', 'Operations Director', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:30:00', '2019-07-29 10:16:59'),
(8, 'NIYONSENGA Placide', 'person2@gamail.com', NULL, '1563556127-IMG-20190719-WA0001.jpg', 'Technical Director', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:30:35', '2019-07-29 10:17:00'),
(9, 'Noah', 'person3@gamail.com', NULL, '1556481826-Passport.jpg', 'Secretary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:31:15', '2019-05-01 18:30:33'),
(10, 'Desis', 'person4@gamail.com', NULL, '1547645500.png', 'Finance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:31:40', '2019-05-01 18:30:27'),
(11, 'Doan', 'person1@gamail.com', NULL, '1547645399.png', 'CEO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:30:00', '2019-05-01 16:48:52'),
(12, 'Kenny', 'person2@gamail.com', NULL, '1547645435.png', 'IT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:30:35', '2019-05-01 18:30:28'),
(13, 'Diane', 'person3@gamail.com', NULL, '1547645475.png', 'Secretary', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:31:15', '2019-05-01 18:30:28'),
(14, 'Desire', 'person4@gamail.com', NULL, '1547645500.png', 'Finance', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-01-16 09:31:40', '2019-05-01 18:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `live` tinyint(1) NOT NULL DEFAULT '1',
  `date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `file_name`, `title`, `creator_name`, `creator_position`, `creator_company`, `creator_link`, `description`, `location`, `live`, `date`, `lang`, `created_at`, `updated_at`) VALUES
(1, 48, '1556204449-reb.jpg', NULL, 'MUTUYUWERA Rebeca', 'Student', 'University of Rwanda', NULL, 'I  thank BICT for thinking problems of unbalanced gender in ICT activities and try to solve it in our campus using girl’s coding boot camp in order to make the equality among girls and boys in ICT. Through the boot camp I  knew how to create and accessing data in database and how to design interfaces.', NULL, 1, NULL, NULL, '2019-01-17 13:19:42', '2019-05-07 12:42:32'),
(2, 48, '1556224998-su.jpg', NULL, 'IRADUKUNDA Suavis', 'Community Member', 'BICT', NULL, 'BICT improves my hope as girl in ICT so that I can do anything related to programming activities as my career. According to What I have learned in boot camp, I agree that girls has the opportunities and the power to do anything in order to participate in economic development of the country and develop themselves.', NULL, 1, NULL, NULL, '2019-01-17 13:20:20', '2019-05-07 12:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applying_for` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_background` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci TABLESPACE `bictrwanda_bict`;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tel`, `gender`, `country`, `city`, `occupation`, `education`, `specialization`, `applying_for`, `profile_image`, `organization`, `education_background`, `experience`, `visible`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Herve Nkurikiyimfura', 'nkuliherve@gmail.com', '$2y$10$pr2E1FyMY/blooZfgqsm7ehfJH8XU0daVfr6.6VlWYn..SwcvCZzy', '+250 786007267', 'Male', 'Rwanda', 'Kigali', 'Employee', 'Bachelor\'s degree', 'Software Engineer', 'Facilitator', 'default-avatar.png', NULL, NULL, NULL, 0, 1, NULL, 'y2CkvSl7zv4S2ltbxtxwX1dzr1ddtDYZBvAcfeGRnmjFpO0uyluY9PlCMnrB', '2019-01-15 10:56:01', '2019-07-01 17:55:50'),
(17, 'UZARUHARANIRA Marc', 'uzarwanda@gmail.com', '$2y$10$7K2NQO0.8hLk9BCvHT1jZezo7I6nMN1.qkjhqV/4PQGCNYjxltndO', '+250 788358753', 'Male', 'RWANDA', 'Nyarugenge', 'Graduate', 'PhD', 'IT', 'Facilitator', '1556631130-Passport.jpg', NULL, NULL, NULL, 0, 1, NULL, 'b0bKhRHxt7JpiR6GpqChftBCHBRw9tfIEYSBPmE2yVx4Hw6F1XfWk29UAQAj', '2019-04-27 12:31:28', '2019-08-27 11:02:31'),
(18, 'Kalinganire Ishimwe Alpha Michelange', 'kalphamike@gmail.com', '$2y$10$DL.Guopzq3WXnt//5.61h.whQi0UCE2m6/acqyh85RG1afZ6fHVBi', '+250 781975565', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'I.T', 'Volunteer', '1556370683-FB_IMG_15545323923160577.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-04-27 13:11:24', '2019-04-28 19:38:20'),
(19, 'Herve Nkurikiyimfura', 'herveralive@gmail.com', '$2y$10$tB6xMoJQVPx6EXk.AL6wzO.KM6T/UnowX/GDdzOaTVJnVjxb76HB2', '+250 725484101', 'Male', 'RWANDA', 'KIGALI', 'Graduate', 'Bachelor\'s degree', 'IT', 'Facilitator', '1556372002-blessed sunday.jpg', NULL, NULL, NULL, 0, 1, NULL, NULL, '2019-04-27 13:33:22', '2019-04-28 19:38:07'),
(21, 'muhawenimana', 'jboscom1@yahoo.com', '$2y$10$xA3k5OtTx1ibD14MP/7YhO7oQnDmFx2Pi2zVo0j.gyKkMWufqVIUi', '+250 789556189', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Facilitator', '1556384523-sh1.jpg', NULL, NULL, NULL, 0, 0, '243YDPoyqvgbdahOK67YZ49YwJaqiUA1j2gzlzsL', NULL, '2019-04-27 17:02:03', '2019-04-27 17:02:03'),
(22, 'muhawenimana', 'mnanibosco@gmail.com', '$2y$10$7A6Ths1W9SCITXOIbBcsIOEb1jJKQwn3.tc0HNMLVwfIxyOo2JonG', '+250 728678969', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Facilitator', '1556385055-index1.jpg', NULL, NULL, NULL, 0, 1, NULL, NULL, '2019-04-27 17:10:55', '2019-04-27 17:11:28'),
(23, 'yves', 'mugiranezahimbazayves@gmail.com', '$2y$10$xYAGlqYPDkOLMbkoSgkOVeY.0ucBWqhbQIblE6qdDG3eB5aY3L8nq', '+250 784436600', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'info tech', 'Volunteer', '1556385088-DSC_0634[1].jpg', NULL, NULL, NULL, 0, 1, NULL, 'f5IOda4U6Mdikhsg8JysgLidCdkgS062xw3vVcSRYvtPLI3Rzz6EdZiO0ZY0', '2019-04-27 17:11:29', '2019-04-27 17:16:14'),
(24, 'cjcjjcjcjcj', 'fggfgf@ghghg.bom', '$2y$10$eL2jZD.2s6FR9ScuB/RIG.YU1Zrd8wAOQ76WkDjX/XGLo7LS.XmZa', '+250 767676767', 'Female', 'Antarctica', 'kigalll', 'Student', 'Secondary level', 'mjfjfj', 'Fellowship', '1556396873-IMG-20181212-WA0000.jpg', NULL, NULL, NULL, 0, 0, 'SsK56qgsH0nfOcCumJFooTDu1MUdoyx3bRcnkFvV', NULL, '2019-04-27 20:27:54', '2019-04-27 20:27:54'),
(25, 'Naome Iradukunda', 'iradunaome16@gmail.com', '$2y$10$rDlkOPUpKo4AJGdeghH04egIy3mIqVwxQ0RQburLsgX3RFZOQwieu', '+250 783536190', 'Female', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1556402235-IMG-20180510-WA0011 (1).jpg', NULL, NULL, NULL, 1, 1, NULL, 'cu99vTC79SYbl5HLGha1aLwr1nbUtdm9dhpjC89T2kuM1k4R0u8VqKrpThQF', '2019-04-27 21:57:15', '2019-04-27 22:08:55'),
(26, 'Javis HAKIZIMANA', 'hakizimana.javis@gmail.com', '$2y$10$EYNesZvMN.wryAcm/8i8Suev2nGpct53SKJ5Lhro2XiGtePGbJhf.', '+250783809447', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information system', 'Fellowship', '1556533991-30923420_2100059163342500_8994468774107152384_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'YNO4NYy2qLhPQVA5QcGTRKFHocTch9XdGWjYglCqsqjsKt9xAS35NJqrNtCw', '2019-04-29 10:33:12', '2019-04-29 11:48:55'),
(27, 'IRADUKUNDA Allelua Fiacre', 'firaduk@gmail.com', '$2y$10$ilI8kAsqjyx6OQ70prrH6.k7NWx.0zPysjq6EpQDKD.9Uo3ZwWuBu', '+250 786585608', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer and software engineering', 'Volunteer', '1556881076-_DSC0551.JPG', NULL, NULL, NULL, 1, 0, 'NEb0NEvQoQbeGfgsBktwd9onU6JPXJs6VlWSloR1', 'ETg6K4K1HAHzOlAnUeeFAffEJBKhQMjP7zjRsOqTL1O1ojEGLshieS2aO6tZ', '2019-04-29 10:46:30', '2019-05-03 10:57:57'),
(28, 'NIYODUKUNDA Israel', 'israel.niyoduk@gmail.com', '$2y$10$zEpVXfuUXLk6AaDgvnJz5u7VL7vTYkO9skkImtr1LywTtoOMmR4su', '+250 789696097', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'electronics and telecommunication', 'Volunteer', '1556557494-IMG_20190429_185925_090.jpg', NULL, NULL, NULL, 1, 1, NULL, 'peHM7BaN9UCMwk9O5dXJEEeAiKOtLckEmbBXEaFlg5919mRI7IGa6xjUYB79', '2019-04-29 17:04:55', '2019-04-30 09:03:38'),
(29, 'Dushime Yvonne', 'dushyvonne63@gmail.com', '$2y$10$90ZQy9e4pdP05yEXVzcx7uluQq.ZIBzja8yvJzNxByVLrd8Jl7c.i', '+250 783577882', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Fellowship', '1556577829-IMG-20190411-WA0004.jpg', NULL, NULL, NULL, 1, 0, 'Amo6mpNcewtZ5BbAm3LTPoTIXMAerc0Y8cdEBqPu', NULL, '2019-04-29 22:43:49', '2019-04-30 06:03:10'),
(30, 'Joseph NIYITANGA', 'josephatniyitanga@gmail.com', '$2y$10$8GWEblKDNeU/7myZP5hb3.qdkqfGogu6VQYGh/ZrxwrOh5K.f969q', '+250788239930', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor\'s degree', 'information system', 'Volunteer', '1556603178-IMG-20190428-WA0046 (2).jpg', NULL, NULL, NULL, 1, 1, NULL, 'U2Wc5cfRBtv32tvFrHpqZaDW3ewHz7NVNjqUzW3ul2sYelxBFA7S2J6egWdo', '2019-04-30 05:46:18', '2019-04-30 06:05:20'),
(31, 'Nzayisenga syliaque', 'nzayisengasyliaque2@gmail.com', '$2y$10$PmrpDy2JeiFqR8crFgIAjOg8WOZaxOf.msyPMx20OsyFOIwBf/vqS', '+250 783846961', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Mining', 'Volunteer', '1556611947-IMG_20190324_080258.jpg', NULL, NULL, NULL, 1, 1, NULL, 'b3fVDVwUelG8n34R1CCnHYRgMJOSVuftGniBuW0bOFeWNPvKLqYMGLUVEpMW', '2019-04-30 08:12:27', '2019-04-30 08:16:43'),
(32, 'patrick ishimwe', 'patrickishimwe16@gmail.com', '$2y$10$IKFFlPNvQDDakSUl87Ndz.jsr9gbr4TSQ2ryCmz9S7C.2U7sWFaO2', '+250 782214140', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Intern', '1556612103-IMG_20171226_200245_574.jpg', NULL, NULL, NULL, 1, 1, NULL, 'QAVBrZ05ZEW3VtJukzBgvYwPbwWaxFUxVFNqztDa0BoBomUO1qFnF8zuUjyt', '2019-04-30 08:15:03', '2019-04-30 08:18:53'),
(33, 'NIYOMUGABO Obed', 'obedzoniyo@gmail.com', '$2y$10$/nPidQos96fUq74kOTQzN.eQbaUX1ybDdkbctvHfRh.x2siB0vcay', '+250 782038267', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'electronics and telecommunication', 'Volunteer', '1556612646-IMG-20181129-WA0027.jpg', NULL, NULL, NULL, 1, 1, NULL, 'K593CBjrodZxKYm0cSH881ydpZQzsByrJvHAI2omiOuI5tquPRnRWorcDwa2', '2019-04-30 08:24:06', '2019-04-30 08:31:13'),
(34, 'NISHIMIRWE Jean Paul', 'nishimirwepaul2105@gmail.com', '$2y$10$BYnFRlS/BGuLmslENwtRCOy2T8rGjZ9AACoVtJ5ic0UYcyH/erzOO', '+250 789336678', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology and Computer Science', 'Volunteer', '1556613067-217122752.jpg', NULL, NULL, NULL, 1, 0, 'lYF2guB4ISX12E0cUdiwQFujInEFcdl2IRW4Jz8v', NULL, '2019-04-30 08:31:09', '2019-04-30 08:38:43'),
(35, 'Joshua NIYIVUGUKURI', 'jniyivugukuri28@gmail.com', '$2y$10$tILZAl.g5EEGAJix96ISQuMK1nYjgHmcZpPEGziy5XCPiLCdqmHoG', '+250 787581824', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Volunteer', '1556631672-IMG_20190214_004549_020.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-04-30 13:41:12', '2019-04-30 13:42:36'),
(36, 'GIRIMPUHWE TWAGIRA Honorette', 'honorettetwag123@gmail.com', '$2y$10$pTPkNYy5GHwvBsj9rna4b.rmufLwa0Au5fMwPaI2sBEdPS11tPgde', '+250 780517781', 'Female', 'RWANDA', 'GISENYI', 'Student', 'Bachelor ongoing', 'Computer and Software engineering', 'Volunteer', '1556633412-20190430_155338.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-04-30 14:10:13', '2019-04-30 19:21:00'),
(37, 'NSENGIYUMVA Emmanuel', 'nsengemmy5@gmail.com', '$2y$10$FuLVjR5GpEHg4xo9PMAx1.hHA6Y10vrqOXtuwvrrs/QjF5kJ/0bCi', '+250782434068', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Communication and Technology', 'Facilitator', '1556640517-27459017_2488669661357674_2824334614390022460_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'seliSlIslEkrRlH4kviHSFQhQUyD2G86J1haZSHCSnW6AKq5dzmRqFDG68Qy', '2019-04-30 16:08:38', '2019-04-30 17:33:50'),
(38, 'Mugisha Emmanuel', 'mugisha134emmy@gmail.com', '$2y$10$r/Tug2Z6xGiAAb/9uIrLUOOfFLuP/L3eqiCs8dNw8lLgHUKSBs6Ka', '0 789555367', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1556675067-IMG_20190428_063638.jpg', NULL, NULL, NULL, 1, 0, 'ssmhvCOr5n7oSsdLlBK1DVeAKHPVRvkCab7v9X01', NULL, '2019-05-01 01:44:27', '2019-05-01 10:42:52'),
(39, 'KARINGANIRE Anathole', 'Aimeanathole@gmail.com', '$2y$10$apIyVXIsbnZsHdLnUgGeKeV2knkodjq1UGSpC5kfOKIbn.SE0Hv8O', '+250 783544533', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Secondary level', 'computer science', 'Volunteer', '1556721489-2019-03-11-193624.jpg', NULL, NULL, NULL, 1, 1, NULL, 'WsVCEegkqteTyXYIPGzX1gtjTvCoIaYWqhzrqfKw8o4oGpSpYsNXlj4nu2FV', '2019-05-01 14:38:09', '2019-05-01 14:56:33'),
(40, 'Jean Bosco NIYOMUGABO', 'nibosco11@gmail.com', '$2y$10$cWsXfOcDdZQ2Mqf70h9o8.DfX8V5HYJ3sEF2AixXnPzn2.CvNRqsS', '+250788775582', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer Science', 'Fellowship', '1556735112-SAL_9543.JPG', NULL, NULL, NULL, 1, 1, NULL, 'U9B7mGZGE5kFwob46U9xf0XwHU4VPyGfyMLLLzbgVcEEy7o6oPF50jxBE1dP', '2019-05-01 18:25:12', '2019-05-01 18:41:29'),
(41, 'Uwamahoro Angelique', 'angelrwabu@gmail.com', '$2y$10$tsTk6GV2P0bXvMmOhHDOqOMd4nFtuxBqyE8ywZPPHVIWgK6xZB4U.', '+250 785096421', 'Female', 'RWANDA', 'Kigali city', 'Student', 'Bachelor ongoing', 'Mathematics,economics and computerscience', 'Volunteer', '1556736579-IMG-20190406-WA0017.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-01 18:49:39', '2019-05-01 19:17:34'),
(42, 'Dushimimana claude', 'dushimimanaclaude6@gmail.com', '$2y$10$cT4eZyrIbaIyt23F6QTkx.Ps4EYsNUKNmAwWk1WI/A1RpPiyzJ1..', '+250 780629340', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1556773675-53327543_258645281709785_7299967123428737024_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'F85dJjBzkXwACSlI4FnxFyDfQrBjrGhkam6C81wA2t4KP4bV3MZR8AefE8IB', '2019-05-02 05:07:56', '2019-05-02 07:12:50'),
(43, 'umuhoza blandine', 'brandineumuhoza@gmail.com', '$2y$10$Jg8W/j6AHUI7XK.wQPZhJevDjAYeU5SLp59o2yMPR1AgIbgCNzzly', '+250 789740638', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1556774713-IMG_20190428_122152[1].jpg', NULL, NULL, NULL, 1, 1, NULL, 'GALgWhgVTY7GD4AVJmFfRmxGpqLFKTbsuhZkBiXmCpIkl30LGTE4p9PSuAfe', '2019-05-02 05:25:14', '2019-05-02 07:12:51'),
(44, 'Ndayizigiye Emmanuel', 'emmyvosco@gmail.com', '$2y$10$vda0RAWXH.9vQS1fJ2u7duHC7Yb8c4IIvViKy47hnlXEQLypydyHO', '+250 780605516', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'IT', 'Facilitator', '1556811487-+250 780 605 516 20190502_173621.jpg', NULL, NULL, NULL, 1, 0, 'ajYM16NKUw9FyLCcNLf1UqT8dTpSfbjtzruNIPVN', NULL, '2019-05-02 15:38:07', '2019-05-02 16:58:10'),
(45, 'Janet', 'janetkajuja@gmail.com', '$2y$10$ECJz5fpHE/oSsIlvva1TK.UzXxyC/tvSkyZUQhJ7ors/BbrLCS8pi', '+250 788442880', 'Male', 'RWANDA', 'ki', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1556869886-TESTER.png', NULL, NULL, NULL, 0, 1, NULL, 'cwkbeCqg0kgTaIVZidOBwGcVacodCD3adVhpwz46kPLM2w3OTOc9cYreTbqW', '2019-05-03 07:51:27', '2019-05-04 12:26:56'),
(46, 'HABUMUGISHA  jean claude', 'jeanclaudehabumugisha81@gmail.com', '$2y$10$doNLEOnAv3d6f0oEcC5j0uUaPo25uvxPDe/t1lePiVfFlivKnYhBu', '+250 784643608', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1556881680-20190503_124816.jpg', NULL, NULL, NULL, 1, 0, 'XuWQefYjO9wV4kCzyA50rSFNtJCSSuujRRZnQ5dW', NULL, '2019-05-03 11:08:00', '2019-05-03 15:33:49'),
(47, 'Manzi Patrick', 'manzipatrick14@gmail.com', '$2y$10$QeCA9h92JZY8wXnaagd7ge/InrTReGD9vwjZXI2tQXq3Ylf1inkpS', '+250 789638320', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Facilitator', '1556883676-manzipassport111111.jpg', NULL, NULL, NULL, 1, 0, 'ZOiUOsAj8FRSndvOj1kNl3wllnJaF0lMYYSlP85v', '6q2wWCdBkqFViOooDt5ogBSapUIbZSFl3I5uOQPzR24mb7Q2DIVQZRSivQPr', '2019-05-03 11:41:16', '2019-05-05 18:11:23'),
(48, 'Nyinawabasinga Esther', 'singesther2000@gmail.com', '$2y$10$Tr8Jv3bc7EixTmb8Z04u..EXRKTeMbP3pbXuR9OmG24TkkpYO3L2C', '+250 785675637', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information Technology', 'Volunteer', '1556986677-IMG_20180706_190720_496.jpg', NULL, NULL, NULL, 1, 1, NULL, 'FKum3uT2mY5XlW39TYzXS1YmHQtSajdSKyfDOTklnulPXYeZSAk0vBLcDe8q', '2019-05-04 16:17:58', '2019-10-29 13:52:28'),
(49, 'Nahimana Rosine', 'narosine05@gmail.com', '$2y$10$4VRgAztophJeGo/cbHZVM.XFrNTXaHAU4hpTk308PZIYlr4JRGtMa', '+250 787725991', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information system', 'Volunteer', '1557076077-2019-01-28-09-21-28-044.jpg', NULL, NULL, NULL, 1, 0, '0LI67F7J4GnYcKWOzygCLHvDWZcFnn9xyByyyXps', NULL, '2019-05-05 17:07:58', '2019-05-05 17:08:39'),
(50, 'BAMPIRE Floride', 'bampireflori@gmail.com', '$2y$10$sZpscqo/WHCbJuySRVPOQOycfD2uc3bh2f22KuCY5xGvG/.L0eALu', '+250 786465804', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Intern', '1557086616-FOFO.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-05 20:03:36', '2019-05-05 20:05:37'),
(51, 'Ashimirwe Joseph Marie', 'ashimirwejoseph@gmail.com', '$2y$10$PJHsNVxC5IaAZmkbUs0rI.zsClBYbqdpmfv/OaDyRbxISeDDmFI/O', '+250 783309973', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Intern', '1557136204-josef_marie_ashi-20190501-0007.jpg', NULL, NULL, NULL, 1, 1, NULL, 'whW0nbxViu4KcGu2tlXRDZomkSA8hbxexJuGUHDx5mWoc1mBHh14EO0jc1ER', '2019-05-06 09:50:05', '2019-05-06 10:13:50'),
(52, 'HAHIRWABASENGA', 'mjhahirwa@gmail.com', '$2y$10$.EKs94OP0/RzgVTsFmf9Ae/ZoqE0hT2mTKrSzysKGY0fHOckdjVgm', '+250 788328741', 'Male', 'RWANDA', 'Gatsibo', 'Graduate', 'Bachelor ongoing', 'Computer Analyst', 'Facilitator', '1557147001-WhatsApp Image 2019-05-01 at 17.32.43.jpeg', NULL, NULL, NULL, 1, 1, NULL, 'Vts6t3nLQWaSgXF4vADuFUp0vTasRS7UKcEZ4SIj40IRlRRTTp2wD2Rm6ps7', '2019-05-06 12:50:01', '2019-05-06 16:57:21'),
(53, 'Mugenzi Napoleon', 'Mugenaps@gmail.com', '$2y$10$b4IW4vxXAozC32T6L5XC6.RT.vzKIqArUMPKkgW/NDmu32AxV1S7u', '+250 782163537', 'Male', 'RWANDA', 'kigali', 'Employee', 'Bachelor\'s degree', 'BIT( Business information and Technology', 'Volunteer', '1557298732-IMG-20190218-WA0020.jpg', NULL, NULL, NULL, 1, 1, NULL, 'aDtQGeAH0WySYZq5abSBwXGiKbz7uGb9FmvoOUGD8sCXOxCo9MF1Yk4wUO6H', '2019-05-08 06:58:52', '2019-05-08 10:21:46'),
(54, 'Umwali aime eudoxie', 'eudoxieumwali@gmail.com', '$2y$10$NfpuOHi9pnj57xZh4h2mz.a2pi9HKv1Ub1R4V.5q5c05AIF8N4Htu', '+250 780527954', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Computer science', 'Intern', '1557303025-Image_1949~2.png', NULL, NULL, NULL, 1, 1, NULL, 'VX0A4wHuX2NveAy3GPRiSOcTht27AIaiJIsa3c2YEniEzmcTXejru1S9Y7xS', '2019-05-08 08:10:26', '2019-05-08 10:21:47'),
(55, 'BAHIRE Anastase', 'bahireur.ac.rw@gmail.com', '$2y$10$vNDpYdBVeSSVjChUXqvldeMlLssBQJm8CInATEr5DixFs6BG3mLce', '+250 788458907', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information systems', 'Volunteer', '1557478637-passport.JPG', NULL, NULL, NULL, 1, 0, '9pndUh0mWifjp9KD0iVARxtaTmPdifvUbCdJQJiQ', NULL, '2019-05-10 08:57:18', '2019-05-10 13:22:35'),
(56, 'UWERA RACHEL', 'ntabanarachel@gmail.com', '$2y$10$8lxR4CwA9dcvnMEVt2gfpuaWWNvdWeTz4IKSURCk9D3sFzNCyMAma', '+250 780273479', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'INFORMATION TECHNOLOGY', 'Fellowship', '1557482960-Best O 20180810_185416.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-10 10:09:20', '2019-05-10 13:22:41'),
(57, 'NSHIMIYINGABIRE jean Claude', 'jeanclaudenshimiyingabire@gmail.com', '$2y$10$vw/6d8AhNBhZoZHu3/CXZezzkr9QWs4YUe/LSmoG/SOsMmYpXMmWa', '+250 783941858/+250725482092', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'Electronics andtelecommunication engineering (ETE)', 'Volunteer', '1557585826-IMG_20190331_102023.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-11 14:43:46', '2019-05-11 19:23:07'),
(58, 'Adrien Nzaramyimana', 'liladriano10@gmail.com', '$2y$10$zTZMJDaRy6..Pzq2141fXuAI5eeb0LgefuGiFTiThQ4IIOqlq.Crq', '+250 788730509', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Business and Information technology', 'Fellowship', '1557646163-‪+250 788 730 509‬ 20180807_133230.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ZC7dO1g1gbcr78bHUysN6qIyIlGxrS1Jf6sSPMMytcZCEeIbI2qCoTbKcvzR', '2019-05-12 07:29:23', '2019-05-12 13:25:22'),
(59, 'HARERIMANA Aime', 'hareaime@gmaik.com', '$2y$10$Sy7CscTHevQ.Pzd3xRA6y.6VwQO1Xg6x/A5U7iJ6rwrNl8BSBPWGK', '+250 722803027', 'Male', 'RWANDA', 'Kigali City', 'Student', 'Bachelor ongoing', 'Information Systems', 'Fellowship', '1557698204-C3506D74-4C20-4919-8DC3-B84C68AE2978.jpeg', NULL, NULL, NULL, 1, 0, '3gHyw8OTNDFLHBPrydl73PJkTDgRGRk5Oz4BoSSA', NULL, '2019-05-12 21:56:45', '2019-05-13 06:27:41'),
(60, 'HIRWA JANVIER', 'janvierhirwa@gmail.com', '$2y$10$Xl06NqCXjw/oAGmWoW8E0.sgwbHTW5jUM3QP72A8eURabTJ/6odB.', '+250 783726675', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor\'s degree', 'Information Systems', 'Facilitator', '1557728888-IMG-20190402-WA0007.jpg', NULL, NULL, NULL, 1, 1, NULL, 'DPNzuOEHAZ2UFgt1sjNbmK208V4lw7yDA3URkKmZUx5TWgpZTa1DNjnHgHAR', '2019-05-13 06:28:08', '2019-05-13 06:38:52'),
(61, 'MUNYAMPIRWA Fabien', 'fabienmunyampirwa@yahoo.com', '$2y$10$vpwpmnWrhnoj8YPKfmPHf.WSq2e1rl8TPnD8w2At3yxWUFjV.YoHG', '+250 787721351', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor\'s degree', 'information system', 'Intern', '1557728895-IMG_20190221_182928_240.jpg', NULL, NULL, NULL, 1, 0, 'Fr2fc6QdDPYjvxEgaEOPL0JHRo3ORim0geqfdpWV', NULL, '2019-05-13 06:28:15', '2019-05-13 06:38:55'),
(62, 'Eliane NIRERE', 'nirelian2@gmail.com', '$2y$10$15mFmh2XDsVzEUbuzkfkNufjdNltnbfeU51IoDNwGd1KsPTLqap8a', '+250 788748051', 'Female', 'RWANDA', 'Kigali', 'Employee', 'Bachelor\'s degree', 'Information Technology', 'Fellowship', '1557732807-Eliane1.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-13 07:33:27', '2019-05-13 18:12:25'),
(63, 'Charles NDAYISABA', 'nccharles1@gmail.com', '$2y$10$BK.tfQGyry4ysL8XBbl0Zer5JiZSA.K9AB3GPjvyRAMzlwyvZU4Bq', '+250 784603404', 'Male', 'RWANDA', 'Kigali', 'Employee', 'Bachelor\'s degree', 'Information Technology', 'Fellowship', '1557737273-dsc_0535.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ItDTKAJWRUlc44U2r8qvINBcTa1SPCIFTPpNbu7BNx3xWxThEVAFKcCdOSb0', '2019-05-13 08:47:54', '2019-05-13 18:11:56'),
(64, 'Karuranga James', 'karurangajames@gmail.com', '$2y$10$mvvkqhaDzbdsnO4haT//TuIcHIrhHEtUzj07NbQJO0vraH81OlJey', '+250 780433176', 'Male', 'RWANDA', 'Kigali', 'Employee', 'Bachelor\'s degree', 'Information Technology', 'Volunteer', '1557764969-JAMES2.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-13 16:29:30', '2019-05-13 18:11:54'),
(65, 'Gloria', 'floribertgloria@gmail.com', '$2y$10$B7SdQjsCtzGPYOFnNB79kuhlizi.g75C.tN/0U/Y/TMGcQfIt.09O', '+250 789533413', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information technology', 'Intern', '1557769028-IMG_20190505_180033_8_1557768755758.jpg', NULL, NULL, NULL, 1, 1, NULL, '8iFatOd0fRnaGdllnH98BOIiMvHGrIb4HwsRfAcFHprg7lcFH2tNKPtV8jRj', '2019-05-13 17:37:09', '2019-05-13 18:11:48'),
(66, 'Hakizimana Jean Jacques', 'jacqueshakizimana26@gmail.com', '$2y$10$5wYieHtzB4Gz6WDFMgNZteJ1ppnxzwdAB/NAt6bL2Sr4wBU9Rdmh.', '+250 784115561', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Biotechnology, cryptocurrency and digital marketing', 'Volunteer', '1557771627-DSC_1212.JPG', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-13 18:20:28', '2019-05-13 18:27:03'),
(67, 'eric mugobuka', 'mugobokismail@gmail.com', '$2y$10$F.o3UIEDsrG3fBl58kjTyOy8MTqwT/oBLqbDniR0CYuoDAp.dmMmG', '+250 787119653', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Fellowship', '1557822052-eric mugobuka.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ufx4xVQDByADFz499QY6ghRd77mhEVzlqzRWapQEtPr6FgW2XBYd4ADE9t5K', '2019-05-14 08:20:53', '2019-05-14 09:29:23'),
(68, 'HAKIZIMANA Jackson', 'jackhanjackson@gmail.com', '$2y$10$.8ARb9J3RBLYnEzCt1mEl.luAA2I2M.PW3H47rExRe7911xgFcXBe', '+250 786935504', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'INFORMATION TECHNOLOGY', 'Facilitator', '1557823202-Jackson.JPG', NULL, NULL, NULL, 1, 1, NULL, 'WEf2Yn7LFopo2DZWYnn76WXsiAqDJRMeNK6ny8FnB3PF2OEiQiB7JhD7ciGp', '2019-05-14 08:40:02', '2019-05-14 09:29:22'),
(69, 'byagutangaza theoneste', 'byagutangaza@gmail.com', '$2y$10$Pza1D3yXvhZUzc7/x3C/N.AUBvYvqGnXC.wnaat4WtjmrkvaDKc/y', '0722783947', 'Male', 'RWANDA', 'huye', 'Student', 'Secondary level', 'it', 'Volunteer', '1557825571-IMG_20180123_054352.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 09:19:31', '2019-05-14 09:29:23'),
(70, 'MUGABO Justin', 'Princemugabojustin@gmail.com', '$2y$10$Q3/OLfhC/yjwpn6cg/vIcOp4y2fEA0sAZPqoI6.q1SVqBc9HZ3PU.', '+250 781861351', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'information systems', 'Volunteer', '1557826574-Justin M.jpg', NULL, NULL, NULL, 1, 1, NULL, 'EEzln1aMchN5jpxIPFBzCTuQqEOrOVt5yCLREKxJqrYB0i6iQao2KKEqJLlQ', '2019-05-14 09:36:14', '2019-05-14 10:20:29'),
(71, 'Akimana Eric', 'ericakimana1@gmail.com', '$2y$10$jP00a37Q9eNHSSWWg5blm.FWy1douEoNngeGa6J41dxageeLv3hvi', '+250 783822145', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information system', 'Volunteer', '1557827382-IMG_20190514_114214_4.jpg', NULL, NULL, NULL, 1, 0, 'h535dzIr8RyTbyIfZuY7dAMcnoHvEdZ5YGrzTwRS', NULL, '2019-05-14 09:49:42', '2019-05-14 10:20:30'),
(72, 'umutoni marie ritha', 'uritha3@gmail.com', '$2y$10$N1Hn46cVTEtdOf8hy9goJ.nO5JXhb5T8z6uNsXi1Wk4/o1wsCIs1W', '+250 783879009', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1557827543-IMG_20181027_105427.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 09:52:24', '2019-05-14 10:20:30'),
(73, 'MASENGESHO Christine', 'machris2020@gmail.com', '$2y$10$ZOGMqkeHZBP6aaZm/PsQJ.NpVjGdp9PPrPXB1DGq8Bw.yLkp9fQw6', '+250 781107841', 'Female', 'RWANDA', 'KIGALI', 'Student', 'Bachelor\'s degree', 'Information Systems', 'Volunteer', '1557827991-IMG-20190514-WA0002[1].jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 09:59:51', '2019-05-14 10:20:32'),
(74, 'Mugabo Faustin', 'faustinmugabress@gmail.com', '$2y$10$SEqf2t6tSc6pke3CC4Y.NOeZVfXMha./YQYEvs9VT3xui5WjmiuS.', '+250 787045200', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information system', 'Volunteer', '1557828452-mugabo.jpg', NULL, NULL, NULL, 1, 0, 'u6VljtbicrCGr6UsmKHRqV2NUrti4CxtPtwEpUxO', NULL, '2019-05-14 10:07:32', '2019-05-14 10:20:33'),
(75, 'nizeyimana claudette', 'nizeyeclau@gmail.com', '$2y$10$3pLW.H0st8m1Bxt4lUonD.ZFHBLWDqLFRBYsIqxiSgDWpA/P6fdjK', '+250 787707070', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'Information Systems', 'Volunteer', '1557828468-IMG_20190329_152716.jpg', NULL, NULL, NULL, 1, 0, 'eGXL3d2igN3xH0NF4ZYioX9GGaQOV7RcfWIOtjOe', NULL, '2019-05-14 10:07:49', '2019-05-14 10:20:36'),
(76, 'Ndagijimana saad', 'sadarusha@gmail.com', '$2y$10$jWDV4f3AQN4SMwa4x/srROHO42Gi0PyU4Hhei/zdafRQnwHliPnkW', '+250 781276077', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Intern', '1557828586-EF44701A-0378-40FB-8C2D-BFD6C6482D8D.jpeg', NULL, NULL, NULL, 1, 1, NULL, 'mMovZRw2BWp8xU2u21Y9sZdnXLjQxwpbtPbeZSOlpZLtOKWAy2Z9oXWZsXV0', '2019-05-14 10:09:46', '2019-05-14 10:20:37'),
(77, 'Niyonshima leoncie', 'nshimaleo807@gmail.com', '$2y$10$3eo0r5BPJbggPNV8OJMB0eigieoLWyIdxIbgN9RkIx5M5XZ05Bm4.', '+250 782714536', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information systems', 'Volunteer', '1557829002-IMAG3844.jpg', NULL, NULL, NULL, 1, 0, 'mEvlnDXr9G5ACj7pIHaZW5tr2lybsd4eGMJ5NGIH', NULL, '2019-05-14 10:16:42', '2019-05-14 10:20:38'),
(78, 'Noa UWIMANA', 'noauwimana@gmail.com', '$2y$10$yAoZ7JXKPvEpUI5eRkFcq.FMRe.MNWSWa2gJAlveDz4wMmOs7sQZK', '0783772254', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1557830261-noahh.jpg', NULL, NULL, NULL, 0, 1, NULL, NULL, '2019-05-14 10:37:41', '2019-08-28 16:05:17'),
(79, 'Narcisse BIZIMANA', 'narcissebizimana@gmail.com', '$2y$10$gvTIXLK7VbxOcoJB96YXa.jfZQhXbH59KRUXfSLeyRdOWaEHc2lTq', '+250 81495777', 'Male', 'RWANDA', 'Kigali', 'Employee', 'Secondary level', 'information  technology', 'Intern', '1557831673-IMG_20181225_190803_409.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 11:01:14', '2019-05-15 05:34:56'),
(80, 'Noa uwimana', 'noahuwimana@gmail.com', '$2y$10$X772aoqM6p7R.jB9vHzzc.AZp3Mr1u3jJe6rC5rwTHiuuAu5VV4DO', '+250 783772254', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'Information Systems', 'Volunteer', '1557832021-noahh.jpg', NULL, NULL, NULL, 1, 1, NULL, 'omXc7GYoeTd0KGAGGZMxLFkgeLgeO6OSW9ZbSiFjykVNcfLRd2RhYmxBwKYa', '2019-05-14 11:07:02', '2019-05-15 05:34:57'),
(81, 'Louis Mugabo', 'lewismugabo84@gmail.com', '$2y$10$yIlskbbvGVvIfD834cOX4uv8iK9RJiE5heOAzNPOvh3.pIoChsehi', '+250 788745836', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1557832372-FB_IMG_1555676231644.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 11:12:52', '2019-05-15 05:34:58'),
(82, 'ishimwe kwizera leontine', 'ishimwekwizera@gmail.com', '$2y$10$bcT2NmbhgRx9CF/vKIC.beSBpkcqvkN4XoWJ9J/SA.YKKOm1VUMES', '+250 789770868', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer science', 'Intern', '1557833985-IMG-20190403-WA0012.jpg', NULL, NULL, NULL, 1, 0, 'FdqAv5WI8uZSbaRHSaGBOWAt1UlE2JOsCWW35dv1', NULL, '2019-05-14 11:39:45', '2019-05-15 05:35:00'),
(83, 'Rusekeza Simon Pierre', 'rusekezasp@gmail.com', '$2y$10$km25NpnTe03tYj0KLA4MmuE4VMWlc1fuqrzGuxJ7JkqZoMR/kEEDy', '+250 781269507', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information system', 'Volunteer', '1557835116-Screenshot_20190514-140558_Instagram.jpg', NULL, NULL, NULL, 1, 1, NULL, 'EuCIJMsTlldMqMzIy284mgVTh7RFas3SandzoMacLo1npA8LdpCKFjMtDhXB', '2019-05-14 11:58:37', '2019-05-15 05:35:01'),
(84, 'NIYUKURI CLEMENT', 'niyukuriclement@gmail.com', '$2y$10$j1jUAiTVjHQNoBgfji4Exuu4KPV4aL3JnDGXwC0tJDdogGM/9H82.', '+250 781469805', 'Male', 'Burundi', 'BUJUMBURA', 'Student', 'Master\'s ongoing', 'Project management', 'Intern', '1557836389-Pictuuure.jpg', NULL, NULL, NULL, 1, 1, NULL, 'opxb0Rpd8wnHJHZGXvp7Drqz5jKMOTgUTJeINXLl6S284LxGx1j7P66U0jph', '2019-05-14 12:19:49', '2019-05-15 05:35:02'),
(85, 'Kipketer Daniel', 'koechdkip@gmail.com', '$2y$10$zlBIqXUxuxXQ1VXdu73ufe.oTcMHwJFUI.DzTOAQ4ue9rovr3NHcK', '+250 788443625', 'Male', 'Kenya', 'Eldoret', 'Employee', 'Master\'s ongoing', 'Geospatial and Geoinformatics', 'Fellowship', '1557836620-IMG-20190415-WA0005.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 12:23:41', '2019-05-15 05:35:02'),
(86, 'DUSINGIZE JEAN MARC', 'jeanmarcdusingize@gmail.com', '$2y$10$nL6nt12pabgFRkDeFESw..olH0brmwS0MtjbDuHpABxb3TAxehQ1S', '+250 780850889', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Master\'s ongoing', 'Information Technology', 'Intern', '1557836754-photo.jpg', NULL, NULL, NULL, 1, 1, NULL, 's8YygTxzs93QfU1ZQDMxBogjkZj68QHqaQtXkrvErj2LkyihK2oL6yzcP4Hv', '2019-05-14 12:25:54', '2019-05-15 05:34:40'),
(87, 'Brigitte bantegeye', 'brigittebantegete960@gmail.com', '$2y$10$JhT9Z1Ifr0Ym6W9iYV4aZOPeWz2aJ5iW0KRplMuxNoP8pRmUmKnxC', '+250 786480775', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Computer sience', 'Intern', '1557836908-IMG_20190514_142522_584.jpg', NULL, NULL, NULL, 1, 0, 'Az1FPJ7FRytezJQvpaxEZT41S3dIpJL2qMU52Fch', NULL, '2019-05-14 12:28:28', '2019-05-15 05:34:41'),
(88, 'Didier Ngabo Uwayo', 'diddynu2000@gmail.com', '$2y$10$sKzXhzc.vphk9DWHFzne2.53JGNb0z.xJ5jKorhevaM6KdUJYx2pW', '+250 787524967', 'Male', 'RWANDA', 'Kigalu', 'Student', 'Bachelor ongoing', 'Information technology', 'Intern', '1557837217-IMG-20180403-WA0009.jpg', NULL, NULL, NULL, 0, 1, NULL, NULL, '2019-05-14 12:33:38', '2019-10-30 09:42:49'),
(89, 'Laetitia uwizeyimana', 'uwizelaetitia@gnail.com', '$2y$10$JaN51TA6eija9kYjE9hvcecknekuRMD/97iW2GeDHDIorJHvJUdbe', '+250 781879136', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information technology', 'Intern', '1557838305-190F1249-6939-4CC3-9342-FD8F78948592.jpeg', NULL, NULL, NULL, 1, 0, 'MfhHcnKImbxRGKHz73zbIeSpafjE2TKxBLsVQiSk', NULL, '2019-05-14 12:51:46', '2019-05-15 05:34:44'),
(90, 'Elyse Nadia Uwizeyimana', 'elysenadiau@gmail.com', '$2y$10$ibnluL6ONsM2ARI2MKFuFulhD.o60yRCbpYLxILxytobDHlzJzKVG', '+250 786903004', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Business Information Communication Technology', 'Intern', '1557838424-3ADCCFAE-05AA-41FB-BF3E-65750D97C80B.jpeg', NULL, NULL, NULL, 1, 0, 'kELDdwhY7GppbAYZhg0DwHmdlAx8XrF1msaMqbB3', 'ctqMgE2t6BmU0fCRItXbYDbsfEgsN2UjhnKAqdqXqemEFc9NtG5bCRAGtCRh', '2019-05-14 12:53:44', '2019-05-15 05:34:44'),
(91, 'annoncee', 'annonceet@gmail.com', '$2y$10$wKVkCOFnEiJnJET3I4bm.Oi7r86YTUt/68jSxyXCA/DuogaQa0kGe', '+250 782241311', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1557840907-IMG-20181011-WA0002.jpg', NULL, NULL, NULL, 1, 1, NULL, 'zeZ6M9eb0YixVVpe41h0SOwHVUP8uT9BuH5ecIta90YQkqK9idPMl58yonHl', '2019-05-14 13:29:21', '2019-05-15 05:34:45'),
(92, 'Bazimya', 'bazimyas@gmail.com', '$2y$10$w.erX/H/SFxYSiTM6oXxw.G8H/Bgsob/aflDI2rbPw/ugDkeuc6Um', '+250 788522501', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Technology', 'Volunteer', '1557841236-saphani.jpg', NULL, NULL, NULL, 1, 0, 'ARXliQnAPRAfyBEp9VCS4HYnjS5vj6PpP4BEpK0L', NULL, '2019-05-14 13:40:36', '2019-05-15 05:34:47'),
(93, 'patrick mutabazi', 'patrickmutabazi104@gmail.com', '$2y$10$g4EJh8kGcNrcmL2xezuHo.lm27HHlnVMvP6iFctpC9hVE6P/uBf4W', '+250786089262', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1557843754-patrick.JPG', NULL, NULL, NULL, 1, 0, 'xT5oMvzKz5CDWCdLglIY42Z7ZduGLm1nh6VYiMZq', NULL, '2019-05-14 14:22:35', '2019-05-15 05:34:49'),
(94, 'Hakuzweyezu', 'placidelunis@gmail.com', '$2y$10$R39ot6mmNPf0E9RC7QUwV.4hCQud3UBgZvhoxzkDZ9jxapju9RgJa', '+250 784762982', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Technology', 'Mentor', '1557846165-placide.jpg', NULL, NULL, NULL, 1, 0, 's5PeEibq9P1YXPUk5lgK0h58SNTIL9foldAckB8D', NULL, '2019-05-14 15:02:45', '2019-05-15 05:34:50'),
(95, 'Bikorimana Emmanuel', 'emmabikorimana035@gmail.com', '$2y$10$MtU6b9eWY1hV6pI/NboxROBSkgNnm4VqXRM2Skhl/NrYZWsu7Vgpq', '+250 781898827', 'Male', 'RWANDA', 'kigali', 'Graduate', 'Bachelor\'s degree', 'electronics and telecommunication engineering', 'Facilitator', '1557846980-tmp-cam-1630855441.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 15:16:21', '2019-05-15 05:34:50'),
(96, 'IRAGUHA Emmanuel', 'iraguhaemmanuel1994@gmail.com', '$2y$10$lLnDGE.Wfh75JxpahC9nw.RlfsmhlkvzS26zLrAM6U8mtGmIyGEeK', '+250 784281076', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'ElectricalEngineering', 'Intern', '1557848277-jpg.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ykNtyLJppQL9ncCpej5E3NDuxrevbDZ6spA6L8PwmJHxi1t5ArmnDy9sZFpN', '2019-05-14 15:37:58', '2019-05-15 05:34:27'),
(97, 'IGIRANEZA Prudence', 'igiraprudence3991993@gmail.com', '$2y$10$QMjS.RMEsRY8H/9uzHFq6Ovf6WmpAAmdNR3a.PZjINb7kg4mqg8qe', '+250 783600159', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology, Software/Application Development and Multimedia Technology..', 'Volunteer', '1557852261-Prudence.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 16:44:21', '2019-05-15 05:34:26'),
(98, 'Irakoze Aimee Pacis', 'pacisirakoze@gmail.com', '$2y$10$IWWeS/908kCKnGaDTxRjYeLZgQGhCV0CegCRVWc2bZ0Vl9XcJgEma', '+250 782089926', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'urban planning', 'Fellowship', '1557853594-IMG_20190223_231603664.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 17:06:34', '2019-05-15 05:34:25'),
(99, 'Eric NIYITANGA', 'eriicuskhedirah222@gmail.com', '$2y$10$W/TKhugllSzx.VHtnjiRH.2Xs0Owt5j9ZwqAEzFD1HoDc8k8d5BGS', '+250 787539625', 'Male', 'RWANDA', 'KIBUNGO', 'Student', 'Bachelor\'s degree', 'Information Technology', 'Volunteer', '1557853613-PASSPORT.jpg', NULL, NULL, NULL, 1, 1, NULL, 'Ng9czZoAHAjgfjfRsHg3GaGZQhe9R0uHhmI3Ng72VPFtnDDraBwEblP1whin', '2019-05-14 17:06:53', '2019-05-15 05:34:24'),
(100, 'NIYITNGA Festus', 'niyitangafestus4@gmail.com', '$2y$10$88KQ.Amm8ECd5wyNKGt/ledpoOWvrws/2xjDwyJkaYLHmjLqqtlBe', '+250 728474379', 'Male', 'RWANDA', 'NYAGATARE', 'Student', 'Bachelor ongoing', 'INFORMATION TECHNOLOGY', 'Intern', '1557853617-_+250 728 474 379_ 20180601_181042.jpg', NULL, NULL, NULL, 1, 1, NULL, 'EepKmzCiMS8m9IVq6eLgNkq6w6dIOv4gzekKbbASIk33vpvKpXpDYRobOkkO', '2019-05-14 17:06:57', '2019-05-15 05:34:23'),
(101, 'Eric NIYITANGA', 'ericuskhedirah222@gmail.com', '$2y$10$rASC9zEcz8g3/XjXWpZ8k.aBnvC.1eVaFLekW8kAJKtFQDI/TgMFi', '+250 728846087', 'Male', 'RWANDA', 'KIBUNGO', 'Student', 'Bachelor ongoing', 'Information Technology', 'Volunteer', '1557855407-PASSPORT.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 17:36:48', '2019-05-15 05:34:21'),
(102, 'CYUBAHIRO ILDEBRANDE', 'cyubrande2020@gmail.com', '$2y$10$URbbANjPXZm1qF/MS4XbWObfSQRjWpTgd/JhomelokGGVQfsM9JaW', '+250 783096068', 'Male', 'RWANDA', 'kigali', 'Graduate', 'Bachelor\'s degree', 'information technology', 'Volunteer', '1557857848-tom.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 18:17:28', '2019-05-15 05:34:19'),
(103, 'INSHUNGU Spes', 'inshunguspes9@gmail.com', '$2y$10$0LYSZjn6E2x6zq8qXVmZl.p3QMJooFQ0Fw9C/Zs.GE3ublDnZ8I6W', '+250 787001435', 'Male', 'RWANDA', 'Gisenyi', 'Student', 'Bachelor ongoing', 'Information Communication Technology', 'Volunteer', '1557861208-PassPort print compress.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-14 19:13:28', '2019-05-15 05:34:17'),
(104, 'Twahirwa Samuel', 'samihypax@gmail.com', '$2y$10$PRD1A7jRpjQKogmQF1o.z.o/az5Pt6pWPOj8u.Ozb5/1nKyrtqnfm', '+250 781819251', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Fellowship', '1557877433-IMG_20190310_124436_346.jpg', NULL, NULL, NULL, 1, 1, NULL, 'FEafQpWnfUKQrj3aZzd0RdC03iIOIqQnQ7hZRZ4jxiEZn1Tv6FXTEnYDxvHI', '2019-05-14 23:43:54', '2019-05-15 05:34:16'),
(105, 'NTIVUGURUZWA Emmanuel', 'djntivuguruzwaemmanuel@gmail.com', '$2y$10$64bLiBxnT8crzfE7udSDGOXyb5sjc2HKhhX4yhuoeg0Dx2dVunioG', '+250 788596281', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Volunteer', '1557898296-EMMY D.jpg', NULL, NULL, NULL, 1, 1, NULL, 'RcZl4jlEDDAeurpuI01SmHyPIxXOjA4WBeeDS3SVt9b1ap19NIQ5hIPyViHj', '2019-05-15 05:31:36', '2019-05-15 05:45:41'),
(106, 'Ndagijimana Princess Isabel', 'princessndagijimana@akilahinstitute.org', '$2y$10$jHNYTIvBhpQlkGkBMhhJi.zb4DeRUTOSTAbITG3jOZ4..Em.ve0qG', '+250 784836812', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'Information System', 'Fellowship', '1557902097-Snapchat-553077833.jpg', NULL, NULL, NULL, 1, 1, NULL, 'EX9HyttG5kxu4U6XmOzNdbFZ91Jxq9WnEwzIrXgYkTRIEbJR4nag9t7Ik2P0', '2019-05-15 06:34:57', '2019-05-15 11:15:21'),
(107, 'Diane NGOGA NIYODUKORERA', 'dianeniyodukorera@akilahinstitute.org', '$2y$10$CjV24gmjyLRSnEDSOWJYN.tBFxIpKoeRtsqgeC37eqgPLdSJW0ole', '+250 787057826', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information System, Leadership and Public speaking', 'Fellowship', '1557909637-IMG_20190515_103407.JPG', NULL, NULL, NULL, 1, 1, NULL, '9ql11uDY1dFE22NPo1iIfH3I5T8IQGGi2M0ZHg488vRXtbP8b5tjlbt6FpQ0', '2019-05-15 08:40:38', '2019-05-15 11:15:21'),
(108, 'Nsengiyaremye shyaka pascal', 'nsengiyashyaka2020@gmail.com', '$2y$10$c12uCzj1enrF7.OWR4udDuVVepmmbAvosHjLPGz.ICVERgY6cDD2K', '+250 789718147', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information system', 'Volunteer', '1557910029-DSC07008.JPG', NULL, NULL, NULL, 1, 0, 'NOW24GVGygzs3bKMR0b8cYHnZuBNwIzzjZqdSD0T', NULL, '2019-05-15 08:47:09', '2019-05-15 11:15:20'),
(109, 'PROTAIS JYAMUBANDI', 'jyaprotais@gmail.com', '$2y$10$ZKSUZMu6MMtraJD6IpXmvurOpypEwO0mDCzUp.RhrU7OH0PC2rOi2', '+250 784919075', 'Male', 'RWANDA', 'KIBUNGO CITY', 'Employee', 'Bachelor\'s degree', 'Education', 'Volunteer', '1557910632-Cropped_20181018_220933.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-15 08:57:12', '2019-05-15 11:15:18'),
(110, 'boris otto ishimwe', 'borisottoishimwe@gmail.com', '$2y$10$Iw4jmsESP7nUb0Fb/bauUeRywXDdGcRGpvi0if0bOv6164HJgUHDG', '+250 786824522', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'electronics and telecommunication eng', 'Volunteer', '1557916075-Boris.JPG', NULL, NULL, NULL, 1, 1, NULL, 'C6rkIuiLOWkX8F8Jea0syp9kXEUOHdzAOuPwcdagK7sHpoejvysMpmOxggwG', '2019-05-15 10:27:55', '2019-05-15 11:15:18'),
(111, 'turatsinze junior', 'turatsinzejunior83@gmail.com', '$2y$10$wtxa/uSlTmiwf8HrQ76DHeark1q.QolkgqKmkzcQaPq5D2nzfzcCy', '+250 785587915', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1557916939-IMG_9486.JPG', NULL, NULL, NULL, 1, 0, 'L11EuTIiSNGq1263Zev9JHxLWoAHTbIApM2lzcXN', NULL, '2019-05-15 10:42:19', '2019-05-15 11:15:17'),
(112, 'NDUWIMANA Clement', 'dexypro7@gmail.com', '$2y$10$qlxGhhsK7v.0Zi42lvCZGeuZuSTISC9clPjP6M/cpTudoj2G3qLMe', '+250 788992169', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'Information Technology', 'Volunteer', '1557920322-IMG_20180508_121721.jpg', NULL, NULL, NULL, 1, 1, NULL, 'dm5ZNOyIJmExFVB6wCYAvAFTpKYY8LiphRZhFlWZ6GVg1tAz5useCgRAuGL5', '2019-05-15 11:38:42', '2019-05-16 08:30:19'),
(113, 'NESTOR NGABONZIZA', 'ngabonest@gmail.com', '$2y$10$oyh2VWF/XiJUF/hptoW50uZoNAcuauCKSjcDOmC9.DCtnACbiG9MG', '+250 787893097', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Electronics and Telecommunication Engineer', 'Volunteer', '1557920535-passport.jpg', NULL, NULL, NULL, 1, 1, NULL, 'kM9HmOv3xJ3flkAHu0S0pGthxlB0kJrR6wFStVGHE10v70LiWOtaEkxbSGTY', '2019-05-15 11:42:15', '2019-05-15 20:05:56'),
(114, 'olivier   Rukundo', 'rukundoolivier725@gmail.com', '$2y$10$vJpg86Inro9koeGfiFcbt.JrUjE4YSl1YUzQqMajxbDRinLRJ/Pn6', '+250785189635', 'Male', 'RWANDA', 'kigali', 'Employee', 'Bachelor\'s degree', 'marketing', 'Volunteer', '1557920832-ol.jpg', NULL, NULL, NULL, 1, 1, NULL, 's8P5NYsY3UYlxlSLgv3sFIXpjLCBk7FJgo7QFKrRGv98RVthkng7hIhKZHxV', '2019-05-15 11:47:12', '2019-05-15 20:05:54'),
(115, 'Princesse Munyaneza', 'princessemunyaneza@akilahinstitute.org', '$2y$10$.zaRBdqEKwrnP2jMXBy0wOViHzDjTaofo72fBBK8fp58CUVy/w30q', '+250 780489155', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information System', 'Intern', '1557927234-Princesse (2).jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-15 13:33:55', '2019-05-15 20:05:53'),
(116, 'nkunzingoma thierry', 'boyspy608@gmail.com', '$2y$10$Q9Ncl1O3IqMM6HxhthKe8um6xvHsZEhSsLa7tyHe8GXbprc3AYeuS', '+250 787828103', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'Information technology', 'Volunteer', '1557927290-vlcsnap-2019-04-11-12h28m14s285.png', NULL, NULL, NULL, 0, 1, NULL, 'pYXPHKqJsaiQMeQvA3gEdv3ILHhR83LiQl8s97ZvxiQVpVO8MdWoVjykx2HO', '2019-05-15 13:34:50', '2019-05-16 10:17:55'),
(117, 'Jean Claude HAKIZIMANA', 'jeanclaudeladen@gmail.com', '$2y$10$HRDJlvFl5fx3LbPtk5jmje6bVfSvdWKnekfrB4Oj1ILFhiRyaUmSe', '+250 782331296', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor ongoing', 'Information communication technology', 'Intern', '1557938479-DRG_9922 (1).JPG', NULL, NULL, NULL, 1, 1, NULL, 'AfJjsSDFLA63Mlhb3XnzNJK7gG9FYtSlfZtgcOOnJ12cJFl95TASWh6h0kue', '2019-05-15 16:41:20', '2019-05-15 20:05:50'),
(118, 'KUBWIMANA Bonaventure', 'kubwimanabonaventure@gmail.com', '$2y$10$awb3oScJ/2rwnWXX9KPD4uRgY8czRS2HZK/jIBUy3dqAMkgVWLRVG', '+250 788621276', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Electronics and telecommunications engineering', 'Volunteer', '1557940927-IMG_20190515_191625.jpg', NULL, NULL, NULL, 1, 1, NULL, 'cIT81eSf4J48YqeTBqEsB08XRgla6C2rtXyanKMshAxAczkW2P6nGnATEhMs', '2019-05-15 17:22:07', '2019-05-15 20:05:49'),
(119, 'INGIRIYIBANGA Benjamin', 'ingiriyibangabenjamin@gmail.com', '$2y$10$qsFB5woVOERmIwBGAqrJR.UOCRAaCdohh0nmK6rD/RSze0c0POt6q', '+250 782540790', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Chemistry', 'Volunteer', '1557948137-CEP PHOT.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-15 19:22:18', '2019-05-17 07:32:29'),
(120, 'Ugiribambe Emerance', 'umerance@gmail.com', '$2y$10$3./r5oAsSMyjq5Z7fIgB0evnWBw32aTS6yUxe1.eDaCA9KiyRwvBW', '+250 784781314', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information and technology', 'Volunteer', '1557955714-1557955682396462711097.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-15 21:28:35', '2019-05-16 18:05:02'),
(121, 'George Elokobi', 'elokobigeorge@yahoo.com', '$2y$10$EmXfWerMGc1OpUDLh3Oi7e/lv72P8Qgo4VZNM8b8oDyS.MFjCD/r.', '+250 786088248', 'Male', 'Cameroon', 'Yaounde', 'Student', 'Master\'s ongoing', 'Law', 'Volunteer', '1558003848-IMG-20190515-WA0005.jpg', NULL, NULL, NULL, 1, 0, '6VVuo35CBJXyZRz84EO6j74RD9UUxObAZWy30duP', NULL, '2019-05-16 10:50:49', '2019-05-16 18:05:00'),
(122, 'Kamariza Sandra', 'kamsandra07@gmail.com', '$2y$10$1GA.EkIgc335S/dwV2NdhuNlJmHc2RcwJhihSVJxozIZchIqqMgmq', '+250 780691765', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1558005103-Snapchat-1782962591.jpg', NULL, NULL, NULL, 1, 1, NULL, 'uUTjreiO6aj5Q5wzN6CpfqTqLlE4uN8MN8Dj76771Yp6XPh9semS53B9e69u', '2019-05-16 11:11:44', '2019-05-16 18:04:58'),
(123, 'Muhorakeye Alice', 'alicemuhorakeye@gmail.com', '$2y$10$DbRJ6S5sUU3kMwlmdnP53umwoPfCp/fR1ZDmu0pyP7LZcslGF44sq', '+250 783686294', 'Female', 'RWANDA', 'Kigali city', 'Student', 'Secondary level', 'Information technology', 'Facilitator', '1558005255-IMG_20190226_143107.jpg', NULL, NULL, NULL, 1, 0, '7d9Qrr8ayeVsTTXNO6jmuDKNckwIlqQx9D9KpERR', NULL, '2019-05-16 11:14:16', '2019-05-16 18:04:57'),
(124, 'Ineza alida rolande', 'ineza.rolande@gmail.com', '$2y$10$fWnC0mXAJkzPdtdfrS74JueaHyw6ojAbs8SWduV08yfV..WmeNZAq', '+250 780494136', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1558005346-IMG_20190405_090151_124.jpg', NULL, NULL, NULL, 1, 0, '25sBcfmXjN0w6IrECjHsurXY1hvWjl2pmRrqJFfS', NULL, '2019-05-16 11:15:46', '2019-05-16 18:04:47'),
(125, 'Umuhire Anuarithe', 'anuarithemuhire@gmail.com', '$2y$10$vTs9xqeRmeTANWuOJzk56.kwP0lrHVERT.2rdRSwc./kk5ccFCKV.', '0785460271', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'imformation tehcnology', 'Volunteer', '1558005643-IMG-20181115-WA0004.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 11:20:43', '2019-05-16 18:04:47'),
(126, 'MUKASHEMA Jeannine', 'meniajanicer@gmail.com', '$2y$10$aNnVY1FjTPnZ0Q8UelNq7upyZ4Xu/ypiEMNKxuM813E4YKBEynynW', '+250 480431874', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Facilitator', '1558005764-IMG_20190516_131603.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 11:22:45', '2019-05-16 18:04:45'),
(127, 'Tuyizere Devotha', 'tuyizeredevotha404@gmail.com', '$2y$10$T7CfNR.1Im.L3tRCYfWtfeodd0SwByeSWXj4rozEIBo05I7QhyvJS', '+250 780860777', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Volunteer', '1558005855-IMG_20190406_113258.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 11:24:15', '2019-05-16 18:04:45'),
(128, 'Twizerimana Clenia', 'cleniatwizerimana@gmail.com', '$2y$10$Os8CycQMZtkj8xkTWILfruJT91o0ticDqKvtyZuEibS.YvY8d9qIu', '+250 787902553', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Information technology', 'Facilitator', '1558006175-IMG-20190516-WA0022.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 11:29:36', '2019-05-16 18:04:36'),
(129, 'Mukesharugo Karekezi Veronique', 'vekaremu@gmail.com', '$2y$10$VCRX31tTuhyc2jhEHMvOjOcNpPhVZt/bmnqHUrzOH/6Xa2pHiqpji', '+250 788474079', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information Systems and Management', 'Intern', '1558006875-6719B886-3ED6-4B26-B25E-16E1A1B6769E.jpeg', NULL, NULL, NULL, 1, 1, NULL, 'f50O4zfUw8rPZMSKJcqR4LqfOboC9XbYHgqSEq3jyzwIL3N2RxemPDgmdFn2', '2019-05-16 11:41:15', '2019-05-18 09:02:25'),
(130, 'Muhayimana Fiston', 'musonifiston77@gmail.com', '$2y$10$JtFL7Q3y6ONE07ovi9G8S.AkpmfQ8qp4OOnPSozGqNX1bnm3zYezW', '+250 785539345', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Secondary level', 'Student and Farmer', 'Volunteer', '1558010205-IMG_20190501_104134_7~3.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 12:36:45', '2019-05-16 18:04:36'),
(131, 'turatsinze eugene', 'turatsinzeeugene@yahoo.fr', '$2y$10$0t.hWGQ8Sa36zRmfzgf5IeTyBBkQuWF/KjQcYL6BFXCjopAnNSEO.', '+250786839119', 'Male', 'RWANDA', 'KIGALI', 'Graduate', 'Bachelor\'s degree', 'IT', 'Fellowship', '1558011026-room_2.jpg', NULL, NULL, NULL, 1, 0, '6m6a4JFPQE8M2m2v5s6V5mo9n0xJoryQTniNktMZ', NULL, '2019-05-16 12:50:26', '2019-05-16 18:04:32'),
(132, 'Mukarukundo odile', 'Mukarukundodile1@gmail.com', '$2y$10$CpFZyV3TTxlLcQPMygx1TekASH731OEXHo3emYVW5D0ZFsE1r82Cm', '+250 786057706', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Electronics and telecommunication engineering', 'Volunteer', '1558016214-1558016084238322101826.jpg', NULL, NULL, NULL, 1, 0, 'MqQiqYTCaCXlYlQWaMGa4aBnfPzAaEVi90NqApF0', NULL, '2019-05-16 14:16:54', '2019-05-16 18:04:31'),
(133, 'TUYIZERE MANZI Adeodatus', 'manziadeo@gmail.com', '$2y$10$jETmbCDaXknFxTnSiwcpxu4V3.U1G1IYWvNT2vIP5Y683ch/xerRe', '+250 781889396', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'Information Technology', 'Fellowship', '1558028871-white.jpg', NULL, NULL, NULL, 1, 1, NULL, 'r0LYF1rx8EhbJlHwbGYSP3DduphzrWqD7U6jy2cqqlLZGzLKhfGCvwtFNTgF', '2019-05-16 17:47:52', '2019-05-21 17:33:18'),
(134, 'claudine NIYONZIMA', 'claudinen202@gmail.com', '$2y$10$ZNYO23AanJRDvVduEgKZN.Qe.hX1gkxk6l6EPx83Z7vxuk4SSKeg.', '+250 780309833', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Volunteer', '1558031861-IMG-20190327-WA0013.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 18:37:41', '2019-05-17 16:02:21'),
(135, 'UWAJENEZA Nadine', 'nadineu840@gmail.com', '$2y$10$PmIz4eqKQ4dZekvRgZN8CuWho.HJPPfpKl0g.c/X2zZrl5yDGo2CC', '+250 786774605', 'Female', 'RWANDA', 'Musanze', 'Student', 'Bachelor\'s degree', 'Microsoft office', 'Mentor', '1558032997-‪+250 780 599 279‬ 20190117_232558.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-16 18:56:37', '2019-05-17 16:02:19'),
(136, 'Réné MUCYO TUYISENGE', 'renemucyomucici@gmail.com', '$2y$10$qrigXklHpEZGySQb8GudUuWUOV3KHDWd3fsLgoMdO38xW4szn1pT6', '+250 784494820', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'Information Technology', 'Fellowship', '1558033503-mucyo.jpg', NULL, NULL, NULL, 1, 1, NULL, 'OqjjvFdQbFCWl3Q7qr9hzRAzJn4gRSC3sCR2qlHMt7pX127EjROXgaosQ7W8', '2019-05-16 19:05:04', '2019-05-17 16:02:18'),
(137, 'Protogene', 'inezaprotogene@gmail.com', '$2y$10$/pnKXkjzeSIP7Wwj8YL2e.83Z1D6hPoEAgGYFo2ZS1DROlH4vItE.', '+250 785897702', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer and software engineering', 'Volunteer', '1558038564-IMG_20190516_222020_010.jpg', NULL, NULL, NULL, 1, 0, '0gQYG9F3O7cWrQSmX6ltXtYPSWyqlo4Fppx01MvJ', '3kDjCTh9fpzEaiIKuiof7D3Km7RmoroqcXJQizShKACqNVm7yYIPOwDhUP50', '2019-05-16 20:29:24', '2019-08-05 12:48:00'),
(138, 'UMUTONIWASE AIMÉE NATACHA', 'uaimeenatacha@gmail.com', '$2y$10$UFuSPetUeTRAXKIkssrdmuTRt259InCYF0GdVvxuY62Z5TGxjHj1K', '+250 786867072', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Electronics and telecommunication engineering', 'Volunteer', '1558044767-IMG_20180710_120853_385.jpg', NULL, NULL, NULL, 1, 0, 'EfAPXtzd2RBjJKmgBfIV72mj1NxoReWWK2Zt2Q4R', NULL, '2019-05-16 22:12:47', '2019-05-17 16:02:14'),
(139, 'Twagirimana Ephron', 'twagirimanaephron1@gmail.com', '$2y$10$5j3Tdpp1v1rczAhBRb2NquJ.ZSiZrsgiFzuB0iGz40LExnyDXtoEO', '+250785247164', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'computer programing', 'Volunteer', '1558077950-219000099 (Twagirimana Ephron).jpg', NULL, NULL, NULL, 1, 0, 'HN5PzlR8A8usB9QBWA1EchJ34E5L1Sf6gN5ykLJr', NULL, '2019-05-17 07:25:52', '2019-05-17 16:02:14'),
(140, 'Jean Aime MANISHIMWE', 'jaimemanishimwe2@gmail.com', '$2y$10$Cf6qpGBaD/B.D.9u9IcShumL.8rnEZjhbsFnPCa.lPSotc7ko..j6', '+250 784800144', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information and Communication technology', 'Mentor', '1558513815-3.jpg', NULL, NULL, NULL, 1, 1, NULL, 'TAavY3unmeoP5CmiSDNKbnicOOStzonupCmLKuzDYzu891rUjOx3Tuvg7032', '2019-05-17 07:37:34', '2019-05-22 08:30:17'),
(141, 'Uwamahoro prince thierry', 'thierryprince84@gmail.com', '$2y$10$heK/muicuX50vT22ZkgVwe20lpkxx6Ll8cef5QqfHbedcRKjg4X72', '+250 789312195', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Intern', '1558121440-IMG_20181031_134551.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ItdAtjwYgt4XuRuNqJ4VNyTPuGmY15rC1uepjHeAYv8WxdZskTiwY0XJUdpn', '2019-05-17 19:30:40', '2019-05-20 18:37:47'),
(142, 'iradukunda jean de dieu', 'iradujdd4@gmail.com', '$2y$10$ssrZyXJxTc6QaDOt.d5iae4sQD4YACC8Jg3DAMWuBSx1IkeVOHLd2', '+250 780633340', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'information technology', 'Fellowship', '1558146828-jado.PNG', NULL, NULL, NULL, 1, 1, NULL, 'fisaMo1RNcaGyJaeFvC29FfQeTAoS6RdTw99Pjp3YAcWkRuBHVOhSQNvOTeh', '2019-05-18 02:33:48', '2019-05-20 18:37:48');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `tel`, `gender`, `country`, `city`, `occupation`, `education`, `specialization`, `applying_for`, `profile_image`, `organization`, `education_background`, `experience`, `visible`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(143, 'Marie Grace Mukabaruta', 'mariegrace100@gmail.com', '$2y$10$TJSfMqkXn59z5EfWVW2l1u/0gx55ikMn7BI2jS5PZpa5xWpFI0jUy', '+250 785806691', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information Technology', 'Volunteer', '1558431996-2018-11-08-19-54-03-271.jpg', NULL, NULL, NULL, 1, 1, NULL, '3c3jQPRpoW6xslY523zIJZZgnDeN0QCPm6TMft36J0ilS6E235rN2tzXBPeq', '2019-05-21 09:46:37', '2019-05-23 09:47:33'),
(144, 'Fabrice IRADUKUNDA', 'irfabrice2@gmail.com', '$2y$10$CTf/nmreid51iP8LXaQD7OTXV9Xt5bxR6pljHcfm8dhqMmByTaOc.', '+250 788432137', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'Computer and Software Engineering', 'Fellowship', '1558437070-1090.jpg', NULL, NULL, NULL, 1, 1, NULL, 'IfCMoyRsjKQjiWV2pWRuv2cYiFEDtrqiWnjOLU0F9erGT6Wz5v7xKYy1t3Vh', '2019-05-21 11:11:11', '2019-05-23 09:47:32'),
(145, 'NINDENKIMANA BLAISE', 'nindenkimanablaskus@gmail.com', '$2y$10$8mOrlOQdXp6DLxqqsQBeq.ke0fQDsUMTlgIN8P1A55PbQDrre9aZu', '+250 783530924', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'computer science', 'Volunteer', '1558552695-IMG-20190520-WA0007.jpg', NULL, NULL, NULL, 1, 0, 'WryLEinPS6XMot7M2xUopeB1UKGVJppbAQwSIIVV', 'Yk1ALqPNQc3BMwfF0STPPnj1CfPgZ8YFMlbQRNng3M5sm16N9q1VnwGBZEpv', '2019-05-22 19:18:15', '2019-07-02 22:13:02'),
(146, 'BYUKUSENGE Assoumpta', 'assoumptabyksng@gmail.com', '$2y$10$3/3b8ctbv42bEDhNkMtHh.BzWOUiRt0f7Z/EL7VaJl7peqv0iEIGe', '+250783940825', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer Science', 'Volunteer', '1558691594-Nags8.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-24 09:53:14', '2019-05-24 23:04:43'),
(147, 'Niwemugeni fabiola', 'niwemugenifabiola@yahoo.com', '$2y$10$seo6jjg.MDSgRzeqKgbsxO5/doiJbuJotDvfjZ14K991PjNsP7Giq', '+250 782199964', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Computer science', 'Volunteer', '1558691651-15586915508789131180215555005105.jpg', NULL, NULL, NULL, 1, 0, 'BGLTrYLVuiJ9XvQWSFeRqiOCGhZWDypmGsFfqkw8', NULL, '2019-05-24 09:54:12', '2019-05-24 14:57:08'),
(148, 'Leoncie Nyiramana', 'leoncie4.nyiramana@gmail.com', '$2y$10$KtFzgMJHhXhgGgzSXC/P0.SgOU7uhIWK03iKWD/Bz6Com8EJ/cvHS', '+250 788709079', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer science', 'Volunteer', '1558691863-15586917962764611255880647755504.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-05-24 09:57:43', '2019-05-24 14:57:07'),
(149, 'RUKUNDO Agnes', 'agnesrukundo1998@gmail.com', '$2y$10$JiF.wShbnV6HLPNH29guCeh58GTeZcWqwAIdPM8/ASaHH2tcDRnXC', '+250 780591875', 'Female', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'COMPUTER SCIENCE', 'Volunteer', '1558692450-BICT.PNG', NULL, NULL, NULL, 1, 0, '85f0xuGj2DXneXsyeMDDUdLbZpvBOa9kuH2yvT2X', NULL, '2019-05-24 10:07:30', '2019-05-24 14:57:06'),
(150, 'Uwineza Marie Rose', 'Uwinezamarierose309@gmail.com', '$2y$10$hn/SWiFKC9qalt24K.gyjehxTQT7U10QXdYKsnvNejVmcodnCx9.e', '+250 785215936', 'Female', 'RWANDA', 'Huye', 'Graduate', 'Bachelor\'s degree', 'Information communication and technology', 'Volunteer', '1559113700-1559113308281-1780604634.jpg', NULL, NULL, NULL, 1, 1, NULL, '974lmqaZuOWBVwwcI1OoHnSAWXUGNoV69zBQ9hdHuXwHRkK7phKtRqwYKc5C', '2019-05-29 07:08:21', '2019-05-30 13:25:11'),
(151, 'Alphonsine Vumiriya', 'alphonsinevumiriya@akilahinstitute.org', '$2y$10$PSFBzk8CtLXcBWMQs/9ep.KIeE0iHhFC.CQOVyArmH5bENRTbesYS', '+250 780282802', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Systems', 'Intern', '1559203215-1540388534884.jpg', NULL, NULL, NULL, 1, 1, NULL, 'In7HtQV7SFWQ1fn5MvtCXiOnk8wX1uffn0wWFrgOLvXcqNS8fde4JN5LqDTa', '2019-05-30 08:00:16', '2019-05-30 13:25:12'),
(152, 'NTAKIRUTIMANA Pierre', 'ntakirpetero@gmail.com', '$2y$10$P9bJ1MaQxGr/TVrZA27/leuyEi.BStXkEfzaH6Z7i.WA/5JG7nbyu', '+250 781712615', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'physicist', 'Fellowship', '1559774785-IMG_20190419_231607_8.jpg', NULL, NULL, NULL, 1, 1, NULL, '9ujIGQZ4w2JMqVv26BUQ5Enb3tghRL7uVYyJYtwHdGJxsLQg60VLpc3XtfXH', '2019-06-05 22:46:26', '2019-06-06 09:25:58'),
(153, 'JEAN PIERRE NDEKEZI NDAYAMBAJE', 'petersomin@gmail.com', '$2y$10$L0GQAX4nVxSZSyh8yZUu8eHocWPYD./yo4vOxWZY1y/BrMxEZNRUq', '+250 788419131', 'Male', 'RWANDA', 'KIGALI', 'Graduate', 'Master\'s ongoing', 'Internet Systems', 'Intern', '1560777567-Jean Pierre Photo.JPG', NULL, '2016-2018	MASTER\'S EDUCATION\r\nINSTITUTION 	KIGALI INDEPENDENT UNIVERSITY\r\nKIGALI CAMPUS\r\nDEGREE: MASTER’S DEGREE IN INTERNET SYSTEMS\r\nObtained Grade: First Class Honors.\r\n2009-2013	BACHELOR\'S EDUCATION\r\nINSTITUTION: KIGALI INDEPENDENT UNIVERSITY\r\nKIGALI CAMPUS\r\nBACHELOR’S DEGREE IN COMPUTER SCIENCE\r\nObtained Grade: Second Class Lower Division.\r\n1999-2002	SECONDARY EDUCATION (Advanced level)\r\n	ECOLE SECONDAIRE ISLAMIQUE DE GISENYI(ESIG)\r\nADVANCED LEVEL IN COMMERCE ET COMPTABILITE\r\nObtained Grade: Satisfaction\r\n1996-1999	SECONDARY EDUCATION (Ordinary level)\r\n	ECOLE DE SCIENCE DE LA SANTE DE GISENYI (ESSA GISENYI)\r\nGeneral Courses\r\n1987-1993	PRIMARY EDUCATION\r\n	ECOLE PRIMAIRE KARIBU (GOMA/DRC)\r\nGeneral Courses\r\n2012-2013	CISCO CERTIFIED ACADEMY	\r\nTraining in IT Essentials, CCNA1, CCNA2, CCNA3 and CCNA4.', '09 January 2019 up to date	KIGALI	FARG(Fund for support and Assistance to Needy Genocide Survivors)	Professional internship as IT Officer\r\n•	Management of FARG MIS \r\n•	Data entry of FARG Beneficiaries.\r\n•	User Support\r\nJanuary 2014-December 2018 GAD House Ltd 	Driver	\r\n•	DrIving Cars of the company\r\n•	Basic maintenance of company’s vehicles \r\n•	Keep vehicles of the company clean\r\n\r\nFebruary 2012- December 2013	KIGALI	KIGALI INDEPENDENT UNIVERSITY(ULK)	Administrative agent as ICT Officer	\r\n•	Following ULK MIS Development \r\n•	Maintenance and troubleshoot All ULK ICT Equipments. \r\n•	Troubleshoot ULK Network\r\n•	Support in Academic Directorate especially in the database of registered students. \r\n•	Teaching all lecturers the use of E-Library.\r\n2010-2012	\r\n2009-2010	RUSIZI	SOCOGEDI SA	Dealer of TIGO Products in RUSIZI Districts.\r\n	•	Sell all TIGO Products in all the district especially where the TIGO Network covered.\r\n•	Making daily report.', 1, 1, NULL, 'kV1KRzmLQu0U71Vf62F0JTCmY6FV0Zc1l1sosxCo4M8YnxNSR8YpBntUkhGV', '2019-06-17 13:19:27', '2019-06-21 20:41:58'),
(154, 'nibarore sandrine', 'sandrinenibarore@gmail.com', '$2y$10$fsKNqi8T5T7HMv/0eXSD7OWBj.261mSWu4W9Tq15q/AGFqIhvd23i', '+250 788667330', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Intern', '1561392772-IMG-20180602-WA0033.jpg', NULL, NULL, NULL, 1, 1, NULL, 'lwJkGtRzycnBkPtn2hEYZitmah2tCkwBIOfctGYtlvBcHdy8MQGmPdlDkLfl', '2019-06-24 16:12:53', '2019-06-25 12:21:27'),
(155, 'Tuyishime sosthene', 'sosthenty@gmail.com', '$2y$10$hLtZErkyAFb0a7H3WAPL0.2auIvGT.Vt5okux1v41p6DZJg7BjlR6', '+250 780444609', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Information technology', 'Volunteer', '1561757221-64454704_1091204911071542_1033416410417594368_n.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-06-28 21:27:02', '2019-07-01 15:50:55'),
(156, 'Nishimwe Valens', 'nishimwe.valens1990@gmail.com', '$2y$10$aKVVKJnXseuRmQsGHgqGoOpXNwBQvq9gilYeWvklC2MBcqZml8sZm', '+250 788629324', 'Male', 'RWANDA', 'Gasabo', 'Graduate', 'Bachelor\'s degree', 'Geography /environmental management', 'Intern', '1561758554-IMG_20190604_124138_463.jpg', NULL, NULL, NULL, 1, 1, NULL, '4TAjQ8BJ4IDEfzVkYiftIHexPPCI7jz16qJu9s7jNLfXkMx93JRmJ3a3vCAj', '2019-06-28 21:49:15', '2019-07-01 15:50:54'),
(157, 'NIYOMUGABO Angelique', 'angeliqueniyomugabo44@gmail.com', '$2y$10$kJ/ukzazhOBMA007ynzEkOcQtaUPh2tRX4IV60CNcuVMpl.95cXk.', '+250 788373373', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Civil engineering and water resources', 'Intern', '1561799589-IMG_20190620_104828~3.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-06-29 09:13:09', '2019-07-01 15:50:54'),
(158, 'NSHIMIYIMANA Patrick', 'patrick2020.p@gmail.com', '$2y$10$vH3SLMuiLuLaZSjdNZ7ed.r/4JV8BGYWdF8za7Job.vS1UpGNroHa', '+250 783578008', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor ongoing', 'Information Technology(IT)', 'Mentor', '1561842853-51028514_2435965709810905_8345571023239774208_n.jpg', NULL, '- Computer electronic in Secondary school\r\n\r\n- Information Technology at Tumba college of Technology', '-I have four years of teaching experience,\r\n i have been teaching DATABASE, WEB DESIGN, COMPUTER \r\n MAINTENANCE And ICT skills  since 2015 up 2019.\r\n\r\n-I have four certificate of Cisco Networking Academy\r\n\r\n-I have certificate of RTTI\r\n\r\n-I have done training of Edfy', 1, 1, NULL, 'HQR5wSeifIKsKRfs2idcpd7zGYzRG3sinEoCxqZVOCI8WutNAz5UOGAEr7dy', '2019-06-29 21:14:13', '2019-07-01 15:50:53'),
(159, 'Izabayo Manzi Fabrice', 'manzidiggyfabrice@gmail.com', '$2y$10$0tpDUs36Iubv/U8Q.p9YUOvl4P8TNXNwz7OgPxd8jLq3gdcW7CQFS', '+250 781946759', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Telecommunication', 'Intern', '1561879805-DSC_0284 copy copy.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-06-30 07:30:06', '2019-07-01 15:50:52'),
(160, 'SEBANANI THEONESTE', 'sebananitheoneste@gmail.com', '$2y$10$dmL1jaO4Z.6DTlQVVgr8lulUpChIqm/N6N7kdWgDnIREzXPw5lM42', '+250 786082527', 'Male', 'RWANDA', 'KIGALI', 'Employee', 'Bachelor\'s degree', 'ICT', 'Facilitator', '1561885505-42448557_746106859075278_2491222774190702592_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ZsC80xyqTCLMvx2HeldymxWluchlBlmeynNqjvobNj6SI3PxFJK93hYvlwIJ', '2019-06-30 09:05:05', '2019-07-01 15:50:51'),
(161, 'Karikunzira hamuza', 'karikunzira.hamuza1@gmail.com', '$2y$10$TBiwKzh9GB3lumrnRl0DrOTCZUn21XSlg/3zg.yr2vV0WeUk/IdGe', '+250 788980706', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Graphics designs', 'Volunteer', '1561894182-IMG_20190518_221711_856.jpg', NULL, NULL, NULL, 1, 1, NULL, 'hsEzGTdwUZDVQu3pxTyFMbqJcyqZU1tXuCMNUV1DLQvyKFTfjX4aoru0fbiz', '2019-06-30 11:29:42', '2019-07-05 14:20:20'),
(162, 'Karikunzira hamuza', 'braveryhamuza2@gmail.com', '$2y$10$25bCpnGnREotLsaP3l.U2.W7PxELWBLvoWz3Uc7KtX7Zz9O.KLpnq', '+250 728980706', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Information technology', 'Volunteer', '1561894609-IMG_20190619_172719_301.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-06-30 11:36:49', '2019-07-04 06:53:55'),
(163, 'Uwabakurikiza Roberto Aimable', 'uwarobertoaimable@gmail.com', '$2y$10$/OlgGeQRmTsGKX5ffy5uO.WLRv9Te.tys5vtMrt8LvimiNhYMr0Wi', '+250788604164', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Agricultural Economic', 'Volunteer', '1561923656-IMG_20190609_071520_842.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-06-30 19:40:56', '2019-07-01 15:50:45'),
(164, 'Irera promis', 'promis.irera@gmail.com', '$2y$10$G835asE.Uyubb56zi4h.2Ona54.EmcUJCZItk1rPhepMioQ9VYti2', '+250 789162154', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Hardware mentenance', 'Volunteer', '1561932070-received_342844406516915.jpeg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-06-30 22:01:10', '2019-12-16 22:57:23'),
(165, 'Minani Olivier', 'minaniolivier@gmail.com', '$2y$10$ShLPSCwE.SJ0K.QVX1uIeOCQDUTlf3/Dxj9rPwUWhmPKHVnc0PmFe', '+250 789795421', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Cyber security', 'Volunteer', '1562056816-2019-07-02-10-31-37.jpg', NULL, NULL, NULL, 1, 1, NULL, 'VCdM7XaTi6jDO9s8tF5SjUrm6SakIjyzjb5xEOBSoxkN5bMBNk16sLpFuSBe', '2019-07-02 08:40:16', '2019-07-04 06:37:32'),
(166, 'Ntitetereza Leo Norbert', 'leontitetereza@gmail.com', '$2y$10$cvj.i0txUTmipqBWJv6df.hmhvpY/5.pGXwapgGbQg541H0bJvnLq', '+250 788597905', 'Male', 'RWANDA', 'Musanze city', 'Student', 'Secondary level', 'Electronics & telecommunication engineering', 'Volunteer', '1562074932-20231f97d3734a87aab9f0170ef1335b.jpg', NULL, NULL, NULL, 0, 1, NULL, NULL, '2019-07-02 13:42:13', '2019-07-03 13:44:04'),
(167, 'NIYONKURU abdoulhakim', 'abdoulhakimniyonkuru56@gmail.com', '$2y$10$luD2W3nB4vnY5OhXa4s2C.iw7gvnVuR9DZB7P6tlBLvo9pPx8Zwu2', '+250 789600241', 'Male', 'RWANDA', 'KIGAL', 'Student', 'Secondary level', 'information technology', 'Intern', '1562078143-29570813_273467409858701_4808586818980369740_n.jpg', NULL, NULL, NULL, 1, 0, 'S4vGvFsUhXMgMnl0liYMQ897vpPurRvxR1YsVET5', NULL, '2019-07-02 14:35:43', '2019-07-03 13:43:57'),
(168, 'Jackson Ngabonziza', 'ngabojck@gmail.com', '$2y$10$bvWaZUzGK83kcHSKprUeuOPPHyKU4Eh7uhNJak1hXdp7cu/l40V3m', '+250 788445849', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer engineering', 'Volunteer', '1562094270-Screenshot_2019-07-02-20-59-47.png', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-02 19:04:30', '2019-07-03 13:43:57'),
(169, 'Habyarimana Gilbert', 'gilbert.habyarimana96@gmail.com', '$2y$10$gkNETbWCwuwW9Yv5CS3HHe0PomRszPz2yuxEeBIu51NXP3h9TT8Ma', '+250 789979510', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'computer networking', 'Intern', '1562154392-IMG_20180719_183015_875.JPG', NULL, NULL, NULL, 1, 1, NULL, '3jAK6FbC889nRVAwC67YCWZw70QTuffYy8P5kxj9gUEtvOJ4JAlvvLpn3ra9', '2019-07-03 11:46:33', '2019-07-03 13:43:56'),
(170, 'Ngwije Fontaine', 'ngwijefontaine@gmail.com', '$2y$10$ZxlZq0GhBqxeLxsUJPE7CeVSPcsxwS6vdJzWt1L.22d24p68n5qvm', '+250 75660555', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Math, Economics and Geography', 'Volunteer', '1562232221-9F6990F4-C295-47A8-B5CA-559C38C26D8A.jpeg', NULL, NULL, NULL, 1, 1, NULL, 'USS8mXWczH2X60tlJFsZYuFDpWEBCUDQRKrHHYWsiN9hmHvJkVIJcgGkyhmC', '2019-07-04 09:23:41', '2019-07-04 13:41:52'),
(171, 'Niyonagize Rachel', 'Niyonagizerachel10@gmail.com', '$2y$10$o.4tjWki9MTECDmrfycZk.6QJIIuUjKRgDqEDC/AsLErKWPvIEdUK', '+250 0783350275', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Inforamation Technology', 'Intern', '1562279304-Rachel.jpg', NULL, NULL, NULL, 1, 0, 'SUQZH1BVsUGjKHdkhCENExPjgW1FIRbfA2VzdUex', NULL, '2019-07-04 22:28:25', '2019-07-05 13:57:07'),
(172, 'Murangwa ramadhan', 'Murangwa.Montana@gmail.com', '$2y$10$NIj1Go45CtVnTSWKx16czuN6Tfg45TFpUHZ9cSp7kuVIqA1Mb4J/2', '+250 783986279', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Hardware and maintenance', 'Intern', '1562304640-IMG-20190319-WA0015.jpg', NULL, NULL, NULL, 1, 1, NULL, '3nVGup8J95dPnQHPmmYOn5GGZxqzLNwgPoGw54P0NC9LOxwyrqFidGLDqChs', '2019-07-05 05:30:40', '2019-07-05 13:57:07'),
(173, 'MUHIRWA Derrick', 'dericmuhirwa@gmail.com', '$2y$10$P5s5MtdC/o6utLi1.5yFXOHIUE7cgEPArHxrIMXzMo4fbGKRccexi', '+250788483586', 'Male', 'RWANDA', 'Rwamagana', 'Student', 'Secondary level', 'Computer system technology', 'Volunteer', '1562314236-received_340165370095703.jpeg', NULL, NULL, NULL, 1, 1, NULL, 'JuakBO0nRf7wqQsXin1q6jFHaj3v1FugnaOEYZ5vJxrHmZo88RqOpHrfzQx7', '2019-07-05 08:10:36', '2019-07-05 13:57:07'),
(174, 'Diane Tuyisenge', 'dianetuyisenge18@gmail.com', '$2y$10$5yRJ5fZV0azBl6OSgLmvluz.QQM1ELK2EwTH8YVINSfYpKEx7dXk2', '+250 786909043', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Intern', '1562588228-diane 1.jpg', NULL, NULL, NULL, 1, 1, NULL, 'fD4DJwhwDMQeZyoLjza8Y4Ivvdjz1AlWR2uzY7U4RV6ryLkVuhglGEMglSEv', '2019-07-08 12:17:08', '2019-07-09 09:56:38'),
(175, 'Gnifene oussalet christian', 'Chist.ouass@gmail.com', '$2y$10$aSRFxD8crXHpF9Pn1w7Xo.r4l6ckx1iDuiY1kdDmrmUBBlFeTqCOW', '+250 738782547', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1562646885-IMG_20190709_063120.jpg', NULL, NULL, NULL, 1, 0, '3nhR7F0oEjjlAWO1E0wDs4w3V1xjmehxG4O93ZF1', NULL, '2019-07-09 04:34:45', '2019-07-09 09:56:40'),
(176, 'MURAGIJEMARIYA Joselyne', 'muragijemariyajose@gmail.com', '$2y$10$4rmf73Q4j7CM5BspoVgkr.ALu0jhs7FvIUukNrqLyU3KEEHg0bJAa', '+250 786643907', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Computer science', 'Mentor', '1562669905-Screenshot_20190709-125315~2.png', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-09 10:58:25', '2019-07-09 17:08:53'),
(177, 'Joyeuse Kubwubuntu', 'neemajoyeuse@gmail.com', '$2y$10$HZLIMjAIisTe.7p6VWpJhOV8UDylBQVe/5yGGINpxeBFuRW/YikYO', '+250 780293840', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer and software engineering', 'Intern', '1562679648-IMG-20190516-WA0012.jpg', 'College of science and technology', NULL, NULL, 1, 1, NULL, 'u4mIGWx2nb88tOhskeDoaMD5ZAjQvfcCa7yJH13OxRS9wcMkd1nq38mJiEJT', '2019-07-09 13:40:48', '2019-07-09 17:08:54'),
(178, 'NDANYUZWE Zachee', 'zacheendanyuzwe@yahoo.com', '$2y$10$/UvtCpLglS6NrOnKnnn88utHvhB/eICdcDNcX/cenpbz4uQPzjFPK', '+250 789564292', 'Male', 'RWANDA', 'Kigali City', 'Student', 'Secondary level', 'Information Technology', 'Volunteer', '1562719211-zaa.jpg', NULL, NULL, NULL, 1, 1, NULL, 'iy2boII09s199DQ9ZMH3YmR4MgDZsPAURHcu9xRYg0HM3GSnd7Dn8RzWX58J', '2019-07-10 00:40:11', '2019-07-10 22:55:06'),
(179, 'emmy', 'niyoemmy1996@gmail.com', '$2y$10$2DIikMM/YP3VdjZWy0c4beoebGa4eo6ycN5PEXNuG2rzuJFl/DuLe', '+250 781964023', 'Male', 'RWANDA', 'butare', 'Student', 'Bachelor ongoing', 'ict', 'Intern', '1562741543-20181108_103815-1.jpg', NULL, NULL, NULL, 1, 0, 'OYlpUDDP8gh5W3L4taXRkTDh36EThFgxQE0VuLNw', NULL, '2019-07-10 06:52:24', '2019-07-10 14:30:41'),
(180, 'robert ngabo', 'robbingabo9@gmail.com', '$2y$10$IPOHcweb.TFpAk4WwAWDk.vXIxYSVlUult.B9N9jo7vBbRDDalZ5q', '+250 784654859', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Fellowship', '1563057804-377c35ea75c084271628b4d409ee22aa.jpg', NULL, NULL, NULL, 1, 1, NULL, 'SjbQAZjvPCiwpJUHkcdVNiZYN7wHmhMaugAZQfyD0w8W8vzLEOucIDYtGW8W', '2019-07-13 22:43:24', '2019-07-14 14:08:16'),
(181, 'IHIMBAZWE Paul', 'ihimbazwep@gmail.com', '$2y$10$W0/5qrbao/Nn04NU9q/Utu3mc9k1kdqNKfZt7XnIB3pYR03gW/OFe', '+250782720135', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information Technology', 'Facilitator', '1563217527-photo.JPG', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-15 19:05:27', '2019-07-16 07:51:30'),
(182, 'Jean De Dieu Komayombi', 'jkomayombi2@gmail.com', '$2y$10$bhjjR/SAAbM0ySM7yPp/Ke4ncjqH7.1kn.bCQlZBYuLrjGrJhEAwW', '+250 785455755', 'Male', 'RWANDA', 'Kigali City', 'Graduate', 'Bachelor\'s degree', 'Electronics and telecommunication engineering', 'Intern', '1563278806-20190713_130058.jpg', NULL, 'I have graduated from University of Rwanda, College of Science and Technology, Department of Electrical and Electronics Engineering in program of Electronics and Telecommunication Engineering.', '1. Working experience\r\n\r\nJune – August in 2016: Internship conducted within biomedical maintenance department at\r\nUNIVERSITY TEACHING HOSPITAL OF KIGALI (UTHK).\r\n\r\nDuties:\r\n\r\n	o	Install, adjust, maintain, repair, or provide technical support for biomedical equipment.\r\n	o	Installation of electrical equipment\r\n\r\nDecember 2017- up to June 2019: Assistance Technical Director & TriCaster Operator at TV10 \r\nDuties:\r\n	➢	Coordinates broadcast activity from control room and prepare, sets up and tests all studio equipment prior to broadcast.\r\n	➢	set up, operate, and maintain communication equipment used in transmission for Radio and Television.\r\n	➢	Consults with superiors, crew members, and performs prior to broadcast regarding program plan, schedule, set arrangements, studio lighting, and camera placement; checks slides, film, tapes, visuals, and cameras prior to broadcast.\r\n	➢	Knowledge of the principles of technical operations.\r\n\r\n2. Training\r\n\r\nOctober – November in 2017: Training on “Fiber Optics and\r\n\r\nMobile Communication by Korean Telecom Rwanda Network (KTRN), Liquid Telecom and Rwanda Utilities and Regulatory Agency (RURA), sponsored by IEEE via University of Rwanda.\r\n\r\n1.KT Rwanda network:\r\n	•	Basic fiber optic communication\r\n	•	Point to point fiber optic communication link (installation and testing)\r\n	•	Optic power budget and optical loss measurement \r\n	•	OTDR and basic fiber optic metrology, including optical spectrum analysis\r\n\r\n2. Liquid telecom:\r\n	•	Fiber optic communication basis and Fiber optic tools Introduction to GPON\r\n	•	Comparison of GPON with other broad band access technologies \r\n	•	GPON Network architecture\r\n3. RURA:\r\n	•	Electromagnetic field measurement and scarce resources management and monitoring.\r\n         .  Drive Test KPIs and analysis', 1, 1, NULL, 'c7CMGGZXGDkVgsprVwK08XoooQpSmIgSqPq8xroEWCO6e7SkLlTgBdasNbnQ', '2019-07-16 12:06:46', '2019-07-16 15:26:13'),
(183, 'Enock Murindangabo', 'enomurinda1990@gmail.com', '$2y$10$ueHPVsfnZ1LADI9Dd6QdUuq.FVD1OlulzPZUZJQnC0f0oxalksHvG', '+250 787668217', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Electronics and telecommunication engineering', 'Intern', '1563281039-IMG-20190716-WA0009.jpg', NULL, NULL, NULL, 1, 1, NULL, 'oxSUFLetW4gUUsapKnPgEm19TO6NcOSSZHxxaCgAXNNGLkbEb5MY9RE2RmAf', '2019-07-16 12:43:59', '2019-07-17 20:59:59'),
(184, 'DERRICK Muhizi', 'derrickmuhizi@gmail.com', '$2y$10$KGNjKVVcGHZILaxC7HtAXer3e.xPxIFZzwRX.NXFD7hhzE/bTGdeG', '+250 781962261', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'Agriculture', 'Volunteer', '1563283259-1550327591463.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-16 13:20:59', '2019-07-17 20:59:57'),
(185, 'BISIMWA SHAMAMBA destin', 'bisimwadestin@gmail.com', '$2y$10$sGwhmNj10L5NA9W4g4StFOTkcDU8XhvgnBtKpMomz3CvmcnR9cZgu', '+250 784648806', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'information technology', 'Fellowship', '1563286438-1.jpg', NULL, NULL, NULL, 1, 1, NULL, 'y7iVfIE8VP05GR1PHprxYvGxGpiMLOpC20wxXOoGnl4KSjygjiQd1U20vPDT', '2019-07-16 14:13:59', '2019-07-17 20:59:56'),
(186, 'Gikuindiro Chaste', 'gikundirochacha2002@gmail.com', '$2y$10$uErsgNx6mYqg7WxTJ.HYcOgunk5UfC.hQ6kQu6hhDYNnNM7dme/xm', '+250 783469528', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Technology', 'Intern', '1563287876-IMG-20190710-WA0006.jpg', NULL, NULL, NULL, 1, 1, NULL, 'MELcvuTM6dzeIZoGpOIBjmMWUDueAPXXnIrRKUnm2Oj9IM9SMpzy15Zk8gVy', '2019-07-16 14:37:56', '2019-07-17 20:59:55'),
(187, 'olly', 'imanishimweolyy@gmail.com', '$2y$10$tJ8T1pKk.FACfE3lDe3e7.F3ssAXwyYMimhIw8Rx.uhvfCBD7kjzy', '+250 783725982', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor ongoing', 'Information Technology', 'Facilitator', '1563287979-DSC_0607.JPG', NULL, 'studied COMPUTER SCIENCE BOTH IN HIGH SCHOOL and in Universty.', 'software dev since 2017.\r\n\r\nuses LARAVEL, Js (node) and android.', 1, 1, NULL, 'fT942mlHn9LLTKCDpdrt840FUfk9PRLWlgZ9FecjfsoYia2VG2MJfkBnXvAG', '2019-07-16 14:39:40', '2019-07-17 20:59:55'),
(188, 'Zulea MAJUNE', 'zmajune@gmail.com', '$2y$10$gPCM1YDk8sQtoLFTp8BQyuIjd8aN8WpDimnxQYIwAbYRhU3ypnpSC', '+250 784 608 018', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Technology', 'Intern', '1563289340-WhatsApp Image 2019-07-16 at 17.01.07.jpeg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-16 15:02:20', '2019-07-17 20:59:39'),
(189, 'Basare alexis', 'absr923@gmail.com', '$2y$10$mm9uBA0QbTqLthHTGuZqBelLQT5rF2cAVuYpQWy7m0Fc1rSBx1Tve', '+250 780480300', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Architecture and built envirnoment', 'Volunteer', '1563289846-‪+250 780 480 300‬ 20190708_170519.jpg', NULL, NULL, NULL, 1, 1, NULL, 'bKCqEWXL9qMY5HxoIoY9nF59gme9veNUnNzcO3BhB1uHjuwks2AKxOaplsZb', '2019-07-16 15:10:46', '2019-07-17 20:59:38'),
(190, 'Alex SHEMA', 'alexshema30@gmil.com', '$2y$10$IbBEn4xuwt9q2DWBy2dJtu4tiRaW9JPdJYNm70agbNbLbsh/Qy9Tu', '+250 788619892', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Crop Sciences', 'Volunteer', '1563296916-Screenshot_20190525-130150.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-16 17:08:36', '2019-07-17 20:59:37'),
(191, 'Muziranenge Rachel', 'rachelmuziranenge04@gmail.com', '$2y$10$bnc5.1javAKlBPjgxKLrw.n2D5pcV89VxdPPTOxE5P68C2Tut0aRK', '+250 785780664', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Business information technology', 'Intern', '1563301779-Screenshot_2019-05-26-00-46-23(0).png', NULL, NULL, NULL, 1, 1, NULL, 'to3XXaICdOH2kbdtcgLP5S9cYqXMHUHD2I7TmXHGENOm1BBI8HsHxNpnzSsk', '2019-07-16 18:29:39', '2019-07-17 20:59:33'),
(192, 'TUYIZERE Egide', 'kinggiddy@gmail.com', '$2y$10$TUgAPv6VPhu76xWEC2WpmufGP.r.W7XpACg1zfukEz/HRUZICrvxi', '+250782373694', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'IT', 'Volunteer', '1563303332-_DSC0581.JPG', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-16 18:55:32', '2019-07-17 20:59:31'),
(193, 'cyprien', 'cypriengp@gmail.com', '$2y$10$15guFyKe5aS4RWfqcFoHB.FfhP409hp1DVCNK0ElbP1DdPJhjY4Y2', '+250 788367320', 'Male', 'RWANDA', 'kigali', 'Graduate', 'Bachelor ongoing', 'Information Technology', 'Intern', '1563304034-IMG-20180323-WA0010.jpg', NULL, NULL, NULL, 1, 1, NULL, 'g1XbeQnrVbn97ujmwQRpkczEBqgBZSNNkce5nDhDE70ybMjAdjQ3VPUaac2f', '2019-07-16 19:07:15', '2019-07-17 20:59:30'),
(194, 'doka olowa benoit', 'gracedoka1049@gmail.com', '$2y$10$TDSfpGnfrjP57JXygG7uu.VFFYFvPH3Y27jrdozg35mjGR8cnffPi', '+250781849768', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'computer science', 'Fellowship', '1563312813-18838938_1320036108112616_2846147339829739406_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'LweTYceUDcXtUafb5U5nb9Xs6bhce7InmIyEYVPghXFzssQiygREvu0WJqiS', '2019-07-16 21:33:33', '2019-07-17 20:59:08'),
(195, 'florent makuza', 'makuzaflorent@gmail.com', '$2y$10$uce0NdF9zZfXoAxdJk63TupNrQx9znfPdT0x.YF9GFO6uS/cGJThS', '+250 781500085', 'Male', 'RWANDA', 'muhanga', 'Student', 'Bachelor ongoing', 'electronic and telecommunication engineering', 'Intern', '1563316283-tmp-cam-2118762906.jpg', NULL, NULL, NULL, 1, 1, NULL, 'fhIGaTnIl0V4mtZZXfT7H8YWGCM6EN8iNDPYwW18U8eXCoViSjzEr7y5HM5E', '2019-07-16 22:31:23', '2019-07-17 20:59:09'),
(196, 'Cesarie MUKANTAMBARA', 'mukacesarie@yahoo.com', '$2y$10$B/g5.FI7iHsUq4W4CwJBxOBjfFYQS1oqoveHqchoWJtnPaLQfBCWG', '+250 782126428', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information technology', 'Intern', '1563344889-IMG_20190717_081712.jpg', NULL, NULL, NULL, 1, 1, NULL, 'vKR12muN2m50YVirD7NrQZjBcU0WFjxRRbrgpS0PTGFcLNCHQk0X0uYPRC4B', '2019-07-17 06:28:09', '2019-07-17 20:58:58'),
(197, 'Mutegaraba Ilana', 'mutegaraba03@gmail.com', '$2y$10$hf7VxriFt3rvYGEAxIjnl.HO0AOWUn4rFS5KhQdcIQFh/DxL6af.2', '+250 781883299', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Secondary level', 'Computer science and management', 'Facilitator', '1563384945-IMG-20190611-WA0023.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-17 17:35:45', '2019-07-17 20:58:38'),
(198, 'TUYIZERE Védaste', 'vedaze02@gmail.com', '$2y$10$r.pdueaQyYgVI3Lg9i2Uo.W2OGEWMKKPH1j2JFU6QpvJ3DUCGmVHC', '+250 786116551', 'Male', 'RWANDA', 'Musanze', 'Graduate', 'Bachelor\'s degree', 'Electronics and Telecommunication Engineering', 'Intern', '1563462955-vedd.jpeg', NULL, NULL, NULL, 1, 1, NULL, '75crWPVXCFAfPeCv0osV20tkqPOdjHPLzrPi5NOMv98aWGnrIi7pBOq6w8uI', '2019-07-18 15:15:56', '2019-07-18 19:28:04'),
(199, 'Bora Abayisenga', 'abayisengabora@gmail.com', '$2y$10$Hq4ZlKtcVmbKJTrtbKOtnuVlcGBo1VDdoTLXUgSF0t9Heb7eFbjw6', '+250 780409402', 'Female', 'RWANDA', 'Kigali City', 'Student', 'Bachelor ongoing', 'Business Management', 'Fellowship', '1563537763-b.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-19 12:02:43', '2019-07-19 13:12:39'),
(200, 'RUKUNDO David', 'davidrukundo20@gmail.com', '$2y$10$Vlyjk/CEu3FZG4XIsMQwqu3eTlkTnkpOdhWLa1Xn2a/U3vFPZ/QrK', '+250 782364860', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Electronics and Telecommunication Engineering', 'Intern', '1563601480-David passport .jpg', NULL, NULL, NULL, 1, 1, NULL, 'QKlieWuZBVW6DHVgU4a0T8HPI0BxhfPNLixz8VtU4sNfVEQFnT6DW78OqLJG', '2019-07-20 05:44:41', '2019-07-21 16:50:21'),
(201, 'shimwa gad', 'shimwagad@gmail.com', '$2y$10$7brp8lpDfaVETRaLc.n/fO/YGrmktrnMNFIubK/EBmnOzBwikLesa', '+250782802812', 'Male', 'RWANDA', 'kigali city', 'Student', 'Secondary level', 'information technology', 'Fellowship', '1563721604-39095625_438885516598184_5346434848372293632_n.jpg', NULL, NULL, NULL, 1, 0, 'CZ55HVODS0g8offthwlbJmNyu10QlQ1LwZ8yGaiA', NULL, '2019-07-21 15:06:44', '2019-07-21 16:50:22'),
(202, 'cyuzuzo remy patrick', 'cyuzuzoremypatrick@gmail.com', '$2y$10$DSgEKuIIvVKF8A5PFmNose7yIVIpy8zTU7fh7nPSPgG1I3hIvIzcu', '+250 783139746', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'webdesign,graphic design,programming', 'Intern', '1563753293-hj.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-21 23:54:54', '2019-07-22 10:41:16'),
(203, 'DIDIER TURIKUMWE', 'didikkoff@gmail.com', '$2y$10$Rs8LeBV1ytShmJJ7zeyV..ywmgwqpq2cjGb/tXAlRiq37zgeafuZ2', '+250 788811459', 'Male', 'RWANDA', 'Musanze', 'Employee', 'Bachelor\'s degree', 'Computer Science with Education', 'Volunteer', '1563953148-1563341460768.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-24 07:25:48', '2019-07-24 12:10:17'),
(204, 'TUYIZERE Andre', 'tuyandre2018@gmail.com', '$2y$10$mwWJ7pHQVFr1Ubc7LSIuE.dDTRNu/TQ6JzsdNkzbVYP5lMYDZEeQ.', '+250 789216483', 'Male', 'RWANDA', 'Nyarugenge', 'Graduate', 'Bachelor\'s degree', 'Computer Engineering', 'Volunteer', '1563957074-andre.png', 'unemployed', '2015-2019 : computer and Software Engineering in College of Science and Technology.\r\n2012-2014: MPC(Maths-Physic-Computer_Science) at E.S.Kanombe/EFOTEC.\r\n209-2011: O_level at E.S.Rangiro', 'I\'m graduate in computer Engineering , I\'m developer in PHP ,Js and other programming language .\r\nI build on more than two projects, which was built in Laravel and js.', 1, 1, NULL, 'FTdv1Wz9PXDMIsffBGLvMQWfOaVAQgUCt4Q2numGi0XNc0NJqEULlm31Rfxk', '2019-07-24 08:31:14', '2019-07-24 12:10:18'),
(205, 'Emmanuel BAKUNDA', 'Emmybakunda@gmail.com', '$2y$10$CFaN06AtAwAfK7CSZsmUPeZ8EIwAmpWi1iOWA15xFoCyVGtVizzem', '+250 726618417', 'Male', 'RWANDA', 'Huye', 'Graduate', 'Bachelor\'s degree', 'MD', 'Volunteer', '1564164567-My Tigo 20190726_200523.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ZtdVcGBdASbc8T4mUbD53QzvEWY7IX51VoHc6FM4XFT8P1kRJICB45UMXODk', '2019-07-26 18:09:27', '2019-07-27 12:52:38'),
(206, 'Boramungu elie', 'elieboramungu1@gmail.com', '$2y$10$alcpKgS2kpw.3lb8FGOF/ucWAfgzLMqWLWTJlsSUSU3/2Y54v/xGC', '+250 780319528', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'Nursing faculty /midwifery departement', 'Volunteer', '1564167739-IMG_20190628_124006.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-26 19:02:20', '2019-07-27 12:52:39'),
(207, 'uWERA SANDRA', 'uwerasandra123@gmail.com', '$2y$10$Nm.pwW4kAI5m2grmKNVeqOEJJi3Wn4wzfsjSLK1vSWqGa10FhQqXK', '+250 727558375/781470411', 'Female', 'RWANDA', 'kigali', 'Graduate', 'Bachelor ongoing', 'information technology', 'Intern', '1564178739-TO USE.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-26 22:05:39', '2019-07-27 12:52:40'),
(208, 'NIYOBUHUNGIRO Speciose', 'specioseniyobuhungiro@gmail.com', '$2y$10$hRApeOaws.1t67u114J.rOQqx73qat.RI3TopgoaR8IWUYJHK1UPm', '+250 781019651/728339353', 'Female', 'RWANDA', 'GISENYI', 'Graduate', 'Bachelor ongoing', 'INFORMATION TECHNOLOGY', 'Intern', '1564179503-TO.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-26 22:18:23', '2019-07-27 12:53:45'),
(209, 'Bazizane Angelique', 'bazizanea03@gmail.com', '$2y$10$vqmR0ZXk5y7zq.m/v9qumOr0w6963WmBy3PlZhbKB/hJ6kqjMlnvO', '+250 784462686', 'Female', 'RWANDA', 'Kigali city', 'Student', 'Bachelor ongoing', 'Finance', 'Intern', '1564182917-8f0f02b15aa7409cb7c8a585a139a2fd.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-26 23:15:17', '2019-07-27 12:53:46'),
(210, 'Ahishakiye hertier', 'ahishakiyeh@gmail.com', '$2y$10$Y.Oi283x891saM0pefreOecBOZWJZnZ7louGLMHJSN1BNni5qjAZG', '+250 780848868', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Computer science', 'Intern', '1564228854-image.jpeg', NULL, NULL, NULL, 1, 0, 'RaUtSDPR5Fz4b1QrzUW06NlzDbqeFSUpks62ZEqG', NULL, '2019-07-27 12:00:55', '2019-07-27 12:53:49'),
(211, 'Jean Claude Dukuzumuremyi', 'claudejohn334@gmail.com', '$2y$10$LSIs6HUUdVyQG9VRe02qQuHMqyLKSq3AGgmf4O8oX5GWoAkBL0n4S', '+250 787389450', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Secondary level', 'IT', 'Intern', '1564265909-MUM1.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-27 22:18:31', '2019-07-30 07:10:03'),
(212, 'Halleluya Yannick', 'halleyyannick@gmail.com', '$2y$10$6CLP82tkobwvP4FLa3Hg5.YVLvHPMquYBRNLPFdV8L8Flq8fHcsqy', '+250 789363845', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Volunteer', '1564312147-leti.jpg', NULL, NULL, NULL, 1, 1, NULL, 'RfqD52cwbOO5KC6t8AQHwzusj7aU1Z01qL5HJrQmQ0aTQsrT5xjPAMPtrq1l', '2019-07-28 11:09:07', '2019-07-30 07:10:04'),
(213, 'David Manishimwe', 'davmanishimwe2018@gmail.com', '$2y$10$68EZhGFMvP9GWIzH6Be/z.b9GDvNeKUK.iITiKaPElo.cvvrTSbO.', '+250 788320747', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Agriculture', 'Intern', '1564312755-IMG_20190615_215942_501.JPG', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-07-28 11:19:16', '2019-07-30 07:10:08'),
(214, 'Nzayisenga jean claude', 'nzayisengajeanclaude2017@gmail.com', '$2y$10$8zV8kWEgRLXHAvYkItg8fuuNr/u.ajPh4jmqZVgWQ2ENqHY3nfuyK', '+250 787999729', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Agriculture', 'Intern', '1564386240-Screenshot_20190522-112110.png', NULL, NULL, NULL, 1, 1, NULL, '8rtnK20TClue1VKpZEJs2QrqntvVscso4TREpWrIufbDnUsZRWHMmXUQvKxF', '2019-07-29 07:44:00', '2019-07-30 07:10:09'),
(215, 'Serwadda yasin', 'serwaddayasin50@gmail.com', '$2y$10$x8Nl5EzKSf1XwpZKelZCTeqkGIOPkn8C8RdxTZTctf4FytY8/M2Te', '+256 701898401', 'Male', 'Uganda', 'Kampala', 'Graduate', 'Bachelor\'s degree', 'Economics', 'Fellowship', '1564577581-Screenshot (3).png', NULL, NULL, NULL, 1, 0, '6fPYjm0rbenHrDgOWiVqo2DhItl2LoVKzDEPah4K', NULL, '2019-07-31 12:53:01', '2019-08-02 06:50:17'),
(216, 'Nkurunziza Philbert', 'philbertpyfo1000@gmail.com', '$2y$10$wLALXkjpmDwIUL/oeW6rfOjt4OfZ/a1zTdKq7yByoACI1hPCoJ2lu', '+250780630939', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information technology', 'Facilitator', '1564671410-FB_IMG_15417047709133691.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-08-01 14:56:51', '2019-08-02 06:50:17'),
(217, 'Salama Iradukunda', 'iladusalh@gmail.com', '$2y$10$W5YVyCa/Nx8VTO40Q1RbheuB58gAXG0jF/S1QMnK7j3vZpnJvff8.', '+250 786073236', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor ongoing', 'Information Systems', 'Fellowship', '1564761103-salha.png', NULL, NULL, NULL, 1, 0, 'PwMYGR42iWfMK4zP4FOzfmGnOvOozw4gHWVKaHs7', 'QQuCjiJBeiHjpp5881vgHOBdTfuRHQ9zKZFYuTKVNDYZIlhxldhwokChLNuQ', '2019-08-02 15:51:43', '2019-08-02 20:49:46'),
(218, 'Thomas Habanabakize', 'tomrwaka@gmail.com', '$2y$10$td86OZvx.RHOnxdggunNUePwvqI9ja2eXqeyZkha2zomWqNaHIZSS', '+250 785119849', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Biotechnology', 'Intern', '1564781507-Tom.JPG', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-08-02 21:31:48', '2019-08-06 09:05:56'),
(219, 'Joseph Habiyaremye', 'josephu2020@ieee.org', '$2y$10$Qjo6CYtnikvv3h9pWLh/4uYrpi9r85jimUGDtGrgmJgM2IYGPw/9.', '+250 788521335', 'Male', 'RWANDA', 'Kigali', 'Employee', 'PhD student', 'Embedded Computing system', 'Mentor', '1564809759-DSC_8846.JPG', NULL, NULL, NULL, 1, 1, NULL, 'mO3BQ9sKGtbYEWXxdMXkAXicW54mqLIOYI7qKfLck1rOY6t84O9R3GD07iQs', '2019-08-03 05:22:40', '2019-08-06 09:05:54'),
(220, 'Kirezi Cyisa Fidele', 'fihacker000@gmail.com', '$2y$10$vuzZhseAPx2GjnLP8opaw.Wq.lrtEJwuLIA4yoS/nW8kebEd9yjs6', '+250 785263355', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Information Rechnology,Front End Programmer', 'Volunteer', '1564844655-67293808_451588815395244_4880045187218276352_n.jpg', NULL, NULL, NULL, 1, 0, 'sTZ7pZrMOwH70HtANleFa88LBRyiR4oHCF1r8L6H', NULL, '2019-08-03 15:04:16', '2019-08-06 09:05:52'),
(221, 'jean de Dieu HABIMANA', 'jeadehab@gmail.com', '$2y$10$MGcXHckRHpvZHDbARJ02QuYPqFYyXDC/LShjpUQqaI2pKsSfwgK3i', '+250 786370705', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'General nursing', 'Fellowship', '1564848225-IMG-20190711-WA0003.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-08-03 16:03:46', '2019-08-06 09:05:51'),
(222, 'Nkundabanzi Pacifique', 'pacifnk@yahoo.fr', '$2y$10$p..QWrR0VFKYHMNwjb4k4uP1EVWTV/XmfBbfX8Ssj34Vg4VOPkkaK', '+250 783598504', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Master\'s ongoing', 'computer applications', 'Fellowship', '1564988922-IMG-20190122-WA0009.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-08-05 07:08:42', '2019-08-06 09:05:50'),
(223, 'SIBOBUGINGO Annanie', 'bugingoa2@gmail.com', '$2y$10$CKaCew7wImm/uuuTSKo7F.ySdGS8ItRU49Seuy30RpEWegwo//vUG', '+250 788933054', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Environment management', 'Volunteer', '1565007947-bugingo.jpg', NULL, NULL, NULL, 1, 1, NULL, 'C8AT7bCc3RQPShLUSyNi46oKqL39rTyjCE60hvTvykE1CmxTt6bQBcwv3ZoU', '2019-08-05 12:25:47', '2019-08-06 09:05:49'),
(224, 'Elysee TWIZERIMANA', 'elygsol@gmail.com', '$2y$10$sQFnfzkH.jYG4p9VzfihDugkOxQpmAbt6NyEzLEQs9PoUJ.oU9Bq6', '+250 782792321/725578104', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Agriculture,Environmental protections and ICT for sustainable development', 'Volunteer', '1565009048-elysssssssssssss.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ozCmJ3o4xpenJWNMvLdCzVP9OEoAPyIoDwACcHbSwqJsq7C8lzFeuXG8fY3G', '2019-08-05 12:44:08', '2019-08-06 09:05:48'),
(225, 'ISHIMWE Bruno', 'ishbruno4@gmail.com', '$2y$10$78RJ0KX2hLA4LKXgAfxAJuOfTCMQ5gsVjxtvT8Dab7fQDXL6/TGPm', '+250 787724255', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Software Development', 'Intern', '1565095541-a1.jpg', NULL, NULL, NULL, 1, 1, NULL, 's71ulD9cxsdonmMNUTTLF1bTP5So2P2vSBMjIMMW8fU5mUmMMbH8j1GYJjKu', '2019-08-06 12:45:41', '2019-09-23 13:51:25'),
(226, 'NIYITEGEKA Honore', 'niyitegekah@gmail.com', '$2y$10$cfzPSdl0fIFfXlU2amDbI.xwJ3QZGq3JxqBLfzvToblHB8lt/.0Fq', '+250 780455791', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'software development', 'Intern', '1565361228-1533060188914.jpg', NULL, NULL, NULL, 1, 1, NULL, 'aQrfG0lVnIPDStiHjmnxN8htPlVsQNwEMIJ44Hhsob7VIpUzSNR6k7mPlzVt', '2019-08-09 14:33:49', '2019-08-13 12:52:37'),
(227, 'Nelson shyaka', 'Nelsonshyaka788235342@gmail.com', '$2y$10$kJp1IGmcD.uoFBJnG8iC..nPqibhp9DaCX3L9.Pt/xrbyh8oXSHvm', '+250 788235342', 'Male', 'RWANDA', 'kigali', 'Graduate', 'Bachelor\'s degree', 'civil engineering', 'Volunteer', '1565639380-2019-03-12 13.55.36.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-08-12 19:49:40', '2019-08-13 12:52:38'),
(228, 'MVURIYINKA  Richard', 'mvuriynkarichard825@gmail.com', '$2y$10$ulO1oZz9HW2JLk7R7VarT.fi.reydfO0.EQKAffOaNi8B4hOr4LQG', '+250 784023975', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'web design', 'Intern', '1565943236-mv richo.jpg', NULL, NULL, NULL, 1, 0, 'kt5muwRhkvVY5Fd2VRMpYJqa3xDHC6lwVsYyGjld', NULL, '2019-08-16 08:13:56', '2019-08-19 06:26:07'),
(229, 'Gad Tuyisenge', 'gady500tuyisenge@gmail.com', '$2y$10$74kYXXTHalu9eQ/Uke0GleZdDwv38XuQe3qqWkloSSIwiCvrr7ue2', '+250 726798789', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Environmental planning', 'Intern', '1566645558-TUYISENGE Gadi.jpg', NULL, NULL, NULL, 1, 1, NULL, '8i1XfoA6iURFUcY9cUEBYnp7BOYiNrX3egDcj07uzXkwQAwqzHoPGSNBZxiE', '2019-08-24 11:19:19', '2019-08-26 06:55:55'),
(230, 'Jules Ntare', 'julesntare@gmail.com', '$2y$10$a9BRVeEHGnpZ287RAZ39pO6LUyzcYpQtFLqQLVwlkysa0OPES7m2y', '+250 780674459', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'IT', 'Volunteer', '1566766585-pass.JPG', NULL, NULL, NULL, 1, 1, NULL, 'gLbRdv2kNuDi0SSomXDdXPhw3DqbmhMegBuSVSHnkKvYX9wvL27yms8MhlJp', '2019-08-25 20:56:26', '2019-10-30 09:42:17'),
(231, 'Charles Karemera', 'charleskaremera8@gmail.com', '$2y$10$RO8ol7Ni5wQWftJVBAScluhkf7m70cUxWdL0N7XjIQA/2G/Gz2UZe', '+250 781913119', 'Male', 'RWANDA', 'Nyamata', 'Student', 'Secondary level', 'Information Technology', 'Intern', '1567420339-14516497_931400033670375_6346667708926744524_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'RB5pJ4LAvTyd2KsfXaTbvmyhkJWBXgqw6SesoBZ3tmaku3Qg1ApI1cyC1xwt', '2019-09-02 10:32:19', '2019-09-02 13:19:02'),
(232, 'Derrick Mugenga', 'mugengad@gmail.com', '$2y$10$3kSXKziXOKyim1zkUJoiruVsk8xiR4IFwQvqTxOU5DpMAoa22ocrm', '+250 784716101', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'software developer', 'Volunteer', '1567439043-FB_IMG_15403161201255693.jpg', NULL, NULL, NULL, 1, 1, NULL, 'gYMCUjydcLKOUCSNWPoXbcTVsyYZeaq348d4QjD2aWLjbvYG4iQ3uXAoxjdf', '2019-09-02 15:44:04', '2019-09-03 06:35:22'),
(233, 'Niyonzima egide', 'egidelibron123@gmail.com', '$2y$10$NvezuLkdSvbJMMoLr6/.3.396QbKLfhZPiFLEMmH8538k.DYkU7G6', '+250 780602088', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'website design', 'Volunteer', '1567528688-1.jpg', NULL, NULL, NULL, 1, 0, 'ZRiUvC1H3CDRetVH0KfQN9m7X6Ng3qOo5rC47FlV', NULL, '2019-09-03 16:38:09', '2019-09-07 14:38:29'),
(234, 'irakoze kwizera sabin', 'kwizerasabin01@gmail.com', '$2y$10$ky7YwkiU48rAq4tZjKVNHeIhrccQyPxpQ7auv3tJWhBWboVWtA3zi', '+250 788782078', 'Male', 'RWANDA', 'MUSANZE', 'Student', 'Secondary level', 'information technology', 'Intern', '1567587491-SABIN.jpg', NULL, NULL, NULL, 1, 0, '4KcD3yFKcBRRYQXenpIJMaxGbCuiss2Efuwq4Alj', NULL, '2019-09-04 08:58:11', '2019-09-07 14:38:28'),
(235, 'uwase salwa', 'uwasesalwa@gmail.com', '$2y$10$QY2r.PrC3iEY2HAfcm7Iaek191I766o.sUKXjuDTimHkgEoztWI76', '0785325386', 'Female', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'ict tecnology', 'Volunteer', '1567587595-45882046_519425955202099_2108344671888474112_n.jpg', NULL, NULL, NULL, 1, 0, 'xgjVuihIhwDA5dxne4inoEaf7yGVLWjv1ZjPQmEr', NULL, '2019-09-04 08:59:55', '2019-09-07 14:38:27'),
(236, 'murenzi emery', 'murenziemery@gmail.com', '$2y$10$Ds05CudL9YsSqq3nWLg21.Wx2uPqZCehfyZUVhw2mM2D5G1i81wgq', '+250 780055287', 'Male', 'RWANDA', 'Musanze', 'Student', 'Secondary level', 'information and technology, software and website designing', 'Intern', '1567587753-min.jpg', NULL, NULL, NULL, 1, 0, 'OZvo9JwCHyUnT0iSLkQjWubxkjqdac7ITX2oaeX0', NULL, '2019-09-04 09:02:33', '2019-09-07 14:38:26'),
(237, 'Kwizera Biruta Alain', 'klainpro0@gmail.com', '$2y$10$YAsMhY9KRj5TdZfqTwOb7.j3BjjoJF3f7s/M/pyBK8Rb.mpY0luA2', '+250 786833954', 'Male', 'RWANDA', 'MUSANZE', 'Student', 'Secondary level', 'information technology', 'Intern', '1567588300-klain.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-04 09:11:40', '2019-09-07 14:38:25'),
(238, 'Irakoze Kwizera Sabin', 'kwizerasabin1@gmail.com', '$2y$10$k2de.FRh0WuKxryIZbKifeCZ87AMxdabW2jZpqAcRX59hfRQPxH9C', '+250 726580702', 'Male', 'RWANDA', 'MUSANZE', 'Student', 'Secondary level', 'information technology', 'Intern', '1567588398-SABIN.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-04 09:13:18', '2019-09-07 14:38:24'),
(239, 'murenzi emery', 'emerymurenzi@gmail.com', '$2y$10$CI73mD83dj6Jgi97UO3Pmu/zyGBpIS3LtarNU/imv/TTHVzmMdCiu', '+250 787150059', 'Male', 'RWANDA', 'Musanze', 'Student', 'Secondary level', 'information and technology, software and website designing', 'Intern', '1567588606-min.jpg', NULL, NULL, NULL, 1, 1, NULL, 'jbkeNEtDjFDnUW0BR4qns0OXOacoAWZCx8Ms5QFhuNIa9Y5rL5SXHEhwfLu0', '2019-09-04 09:16:46', '2019-09-07 14:38:23'),
(240, 'promesse uwamahoro', 'promesseuwamahoro@gmail.com', '$2y$10$02Ag2VOevykAYlRkLudRPuyXnCQNQQ2AMBFkyDnxECXOsKrxdDwlK', '+250 789616552', 'Female', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Intern', '1567589628-IMG-20190504-WA0051.jpg', NULL, NULL, NULL, 1, 1, NULL, 'a5sXb8uyalT1JMf5XAAbwrKg3t4qyGv5XA0Z9pyDeJO1eV4yYsSqrERmK5tj', '2019-09-04 09:33:49', '2019-09-07 14:38:22'),
(241, 'EMERY MUCYO', 'emerymucyo7@gmail.com', '$2y$10$c7R5fVVeFDidCxPKoRP4ZeX3M6QN1LVZ7kS0OV.B2X09T6rtA./Fy', '+250 784504739', 'Male', 'RWANDA', 'musanze', 'Student', 'Secondary level', 'information technology', 'Intern', '1567592099-WIN_20190304_09_36_58_Pro.jpg', NULL, NULL, NULL, 1, 1, NULL, 'BbN6nu2ySlbZs1CrnZdgglgqWfI1VBPJ4QnkGUaVl1kZevF39tpuPEjD6eYF', '2019-09-04 10:15:00', '2019-09-07 14:38:22'),
(242, 'ulrich Rukazambuga', 'ulrichskyler7@gmail.com', '$2y$10$nNVqFcKNoqONPUSOm/gFJ.cw/DECNwbqrdyNrEgvATvf0I8FDRQ2e', '+250 733713718', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Intern', '1567593081-WIN_20190904_06_52_33_Pro.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-04 10:31:21', '2019-09-07 14:37:57'),
(243, 'ulrich Rukazambuga', 'skylerulrich4@gmail.com', '$2y$10$dm81gZhRgU9ZhiwA115sXOGxugv7ofyJWalaZJH/ftQVmJp0x9sSq', '+250 788304954', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Intern', '1567593713-WIN_20190904_06_52_33_Pro.jpg', NULL, NULL, NULL, 1, 0, '5S7Cmhg6DDFC2qK5S6RM8EzLHCTWOxxZwic19Oo1', NULL, '2019-09-04 10:41:53', '2019-09-07 14:37:57'),
(244, 'NDIMUBAKUNZI Bonfils', 'Kunzibonfils@gmail.com', '$2y$10$TVyIZJ6K2KnBYh4ld/xAHeDwiTxhcBF7ZFVZnM9/agl84IEgyvU9m', '+250 784625983', 'Male', 'RWANDA', 'Kigali City', 'Student', 'Secondary level', 'Networking', 'Fellowship', '1567608135-SAM_8628.JPG', NULL, NULL, NULL, 1, 1, NULL, 'Ar5km7mfyqKEyfNXG4YDTpmXTgxO1SzAFoMLZAhnxWUkTtyHPtly9fR9uk8O', '2019-09-04 14:42:15', '2019-09-07 14:37:55'),
(245, 'irasubiza', 'irasubizagilbert92@gmail.com', '$2y$10$JF5IMy2n/GjxQxZeSO/RZeyoBm6/nE1q/n9gWsdGL0fGKsikcEMd.', '+250784122309', 'Male', 'RWANDA', 'gisenyi', 'Student', 'Secondary level', 'networking', 'Volunteer', '1567609861-suu 2.jpg', NULL, NULL, NULL, 1, 1, NULL, 'gkXq6ZnnFpcXGULvWkWqz8rJTJx2CH72I6gEnfD3zRggG0IB8W4sJU3zimgH', '2019-09-04 15:11:02', '2019-09-07 14:37:54'),
(246, 'Gatera Allan', 'allansani499@gmail.com', '$2y$10$lhk8g7oBTpOaHKrH8pRpR.4io3qPkWxU7HkUovFvI3WvyRPjPquMe', '+250783804518', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'Networking', 'Volunteer', '1567611125-65543378_427740001409855_8986804927617061987_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'lNpJaSySK4RqRfYVI9gVwphA5yqrHl273DBaWi6pZIPW6Zfc5XDVNDRfVurv', '2019-09-04 15:32:05', '2019-09-07 14:37:53'),
(247, 'Bigirimana gad', 'gadbigirimana93@gmail.com', '$2y$10$juiCZtfqD6gqIBFt7kts1.uXvXHYC8Jc7fLTTq0IdbKgulqatGh8S', '+250 780819190', 'Male', 'RWANDA', 'Kigali city', 'Student', 'Secondary level', 'Information technology', 'Intern', '1567616191-b8ff5cca3e3d4ae2be625427b610323f.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-04 16:56:31', '2019-09-07 14:37:52'),
(248, 'ulrich rukazambuga', 'skyerulrich4@gmail.com', '$2y$10$TYgOZMYYu1XtVuAKIKRx6OItT0iHd0RBLlMF.NDeQ3WokZDJ6kn72', '+250 788497526', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Intern', '1567679254-WIN_20190905_12_22_59_Pro.jpg', NULL, NULL, NULL, 1, 0, 'vqkb4fFsExK1kIY4Cm8LPbtaqpMDhdVTUBJp5mFb', NULL, '2019-09-05 10:27:35', '2019-09-07 14:37:52'),
(249, 'Nteziryayo athanase', 'Nteziryayoathanase02@gmail.com', '$2y$10$3LhqjF6gv095BBDn1zXEOuZxDHPGotgfyDJCLcjRhKm0NzIRvpELC', '+250 780553796', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Intern', '1567684271-WIN_20190905_13_50_31_Pro.jpg', NULL, NULL, NULL, 1, 1, NULL, 'helIsmTR6cwVCx29SO1IvCGWi2vS5a0jbMpLIV8O4sF23p56uFl4anRGjZSq', '2019-09-05 11:51:11', '2019-09-07 14:37:51'),
(250, 'Amani Shema', 'amanishema90@gmail.com', '$2y$10$D17nllWD8rQRtQxIiD2aeObXZW4OdbXq1pr/TdpwwWZc2Mwzz6aOm', '+250 783942126', 'Male', 'RWANDA', 'Musanze', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1567692643-18766098_1854776714739256_196395109114733006_n.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-05 14:10:43', '2019-09-07 14:37:51'),
(251, 'HABIMANA NGABO AIME VOTAIRE', 'aimevoltaire2001@gmail.com', '$2y$10$NsBO8f9mwRNjTgKVfhOdHeCBI2hPxGzcTxk6LIf9H4UjBusZD3ICK', '+250 787895188', 'Male', 'RWANDA', 'musanze', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1567759346-status.png', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-06 08:42:26', '2019-09-07 14:37:51'),
(252, 'Mutoni guy ghislain', 'mutoniguyghisain30@gmail.com', '$2y$10$OmVn6aCwyHl4/yGf8W9l8ejTFk/Fo4qrboscQ5YV8xob/CoV47jvS', '+250 781518185', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Ict', 'Fellowship', '1568099468-FB_IMG_15680108209414124.jpg', NULL, NULL, NULL, 1, 0, 'q6XMZ4c7UbV0RKyi3TfnYDjEJO2X6XYdQZZX3a6E', NULL, '2019-09-10 07:11:09', '2019-09-10 07:38:43'),
(253, 'Ishimwe Jean De Dieu', 'jeanishimwe653@gmail.com', '$2y$10$ZIhH4zqacrTScv13XdEpIekitGrTRlwys9V50o/sSI9.aDeEnueVu', '+250 782941237', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'networking', 'Intern', '1568185922-jado.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-11 07:12:02', '2019-11-01 16:52:21'),
(254, 'KABATESI PEACE', 'kabatesipeace0@gmail.com', '$2y$10$nJK7RmvfefVYqeiljL4SduYy7DFwPLxZXDxV.UBDBoDO7VeuJNiMy', '+250 789827138', 'Female', 'RWANDA', 'KIGALI CITY', 'Student', 'Secondary level', 'NETWORKING', 'Volunteer', '1568282209-47686261_193534808254187_4314393896936275968_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'VqIZN7gxrnEPDwrl0CMTvm3KF7V6MsyJuUxpq8Sj4IzizXS2HjXY3pCgT6zo', '2019-09-11 07:21:57', '2019-09-12 09:56:49'),
(255, 'MUGISHA Justin', 'mgshjustin@gmail.com', '$2y$10$iiPx9ZnMAMn3Dk1UY1xwcuN58qjrVp3mxC7DNWcV8Ue1cnDPC2vxi', '+250 787164618', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Computer networking', 'Intern', '1568280795-69812068_500246354043583_8023261679322136576_n.jpg', NULL, NULL, 'IT Technician(Networking)', 1, 1, NULL, 'uOYoaR805yOAwwK8CjDzm4klOxNfNjpNnAb8siq0e759y35rCoDmb4gfdc6C', '2019-09-12 09:33:15', '2019-09-12 13:00:17'),
(256, 'alikhankeshwani', 'alikhankeshwani13@gmail.com', '$2y$10$Y3iVNBDchk.AeZVPPPaa5OE7.41GpCQlYSLExk6b0Uq9eon1iuIuS', '+250 789875213', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'IT', 'Intern', '1568626838-44455201_496471764189210_7116125283161210880_n.jpg', NULL, NULL, NULL, 1, 1, NULL, 'ZRzK51RElTChphKSZXDoGPHLrwiJ0X110kZGUMF3D9ZuIFIGaBlYoExfHFfB', '2019-09-16 09:40:40', '2019-09-23 15:28:17');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `tel`, `gender`, `country`, `city`, `occupation`, `education`, `specialization`, `applying_for`, `profile_image`, `organization`, `education_background`, `experience`, `visible`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`) VALUES
(257, 'Deogratias MURERWA', 'ottomatik8@gmail.com', '$2y$10$OjF3RFLn5dyhmsnED6dTTeMtXyFctwOHR/0rrihSpYZZ2FBkBLGRS', '+250 788419532', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Secondary level', 'Information technology, media publishing, web design, agriculture', 'Volunteer', '1568990963-1568990771807.jpg', NULL, NULL, NULL, 1, 1, NULL, 'eZl7CrbYMTovCKAKCUuZMQOOustsavDZPyz4SXhO7bLiv8MLwYWGYdFpGaTd', '2019-09-20 14:49:23', '2019-09-23 15:28:18'),
(258, 'BIKORIMANA Jean De Dieu', 'jdedieu71@gmail.com', '$2y$10$KKcHiRexKWr1R6h7AM98.up3RuQ8UOiEqG/FZiG9xKN3VEon4livW', '+250 780621300', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Website Design', 'Intern', '1569249238-aaajado.jpg', NULL, NULL, NULL, 1, 1, NULL, '6gDVHiIKBTiiOhLiA9ITCPB3bsOen034LcJ0aG5aAjM024xufLCeHDcRhxzJ', '2019-09-23 14:33:58', '2019-09-23 15:28:18'),
(259, 'Habineza Frank', 'Frankhabineza53@gmail.com', '$2y$10$TLBANMkFajWtgAkgX0mJZeGUnDwx5OgQAfmoOVeI1S6Aa/ugipQ/u', '+250 786729568', 'Male', 'RWANDA', 'Kigali', 'Student', 'Bachelor ongoing', 'Chemistry', 'Volunteer', '1569320777-IMG_20190924_122459_459.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-24 10:26:18', '2019-09-25 06:21:47'),
(260, 'Izabayo parfait', 'izaparfait60@gmail.com', '$2y$10$bpgorvCMXHYT.1znx/23c.nEnDN7Qkk3agX5sz559NpookoG45MFa', '+250 783857658', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information technology', 'Intern', '1569380661-Screenshot_2019-09-25-05-00-18-1.png', NULL, NULL, NULL, 1, 1, NULL, '6tbNeqzMV0IwiC6UXJ491GCLWNYrfPyTX2wUEiVdDiv3WrDHYKrEjmfcAbt5', '2019-09-25 03:04:22', '2019-09-25 06:21:46'),
(261, 'Usabayezu  Bruce', 'brucebrown296@gmail.com', '$2y$10$twwydvGNkIZVSYhRy79yFOYyw7eEZySfckDnwPzOsn2cssX1Ygmje', '+250 781338505', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'technology', 'Intern', '1569489975-bbbb.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-09-26 09:26:16', '2019-09-30 07:56:43'),
(262, 'kamanzi mico christophe', 'kamanzimico.Chriss@gmail.com', '$2y$10$ngXlrmngbt4VPD0vSdXFH.p1QOx3yUXPi.B9igJE79XH51t1ypZC6', '+250 785201002', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'web based development', 'Intern', '1569506880-mico', NULL, NULL, NULL, 1, 0, 'xR12bAmOyGUhwiWM7d77xlLglSIEZ2tRUSY87xXJ', NULL, '2019-09-26 14:08:01', '2019-09-30 07:56:42'),
(263, 'NDAHIMANA Xavier', 'ndahimanaxavier@gmail.com', '$2y$10$5OWj8vOce5G2TcZkggQpEem9tv1lMURO0u698xu20ex7iGxONQ25e', '+250 786389274', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Software development', 'Intern', '1569507218-eac948181171244af7611b72a2eafd6e.jpg', NULL, NULL, NULL, 1, 0, 'MapdnTFrHpdXhsujcDViTwt890wM0NdfVJcqi6iy', NULL, '2019-09-26 14:13:38', '2019-09-30 07:56:40'),
(264, 'manzi berry', 'manziberry13@gmail.com', '$2y$10$oUabwpJhYxfBNqvxCY0IAuBeqpoo3lBDONw7dMk0MLbAsBPD6qOY.', '+250 786055142', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information and technology', 'Intern', '1569563176-1569244739395.jpg', NULL, NULL, NULL, 1, 0, 'XxWFMo6XbP1hmjzf8gSTURAZHr9GhYhVrcKyt7Pg', NULL, '2019-09-27 05:46:16', '2019-09-30 07:56:39'),
(265, 'Bizimana Eric', 'bizieric749@gmail.com', '$2y$10$/Yxe9KXrepu9/FqXCHppY.2xNZpRK7E9lCl92f.0B4iOpJ6gsZ8Ia', '+250 784147224', 'Male', 'RWANDA', 'nyamata', 'Student', 'Secondary level', 'software enginer', 'Intern', '1569570774-b,.jpg', NULL, NULL, NULL, 1, 1, NULL, '7Tz844VDomQP96GeTRwTb3Qo6tYHFK7U3EwbkxXoegQNOYH1k4l7ceE0Pd5Z', '2019-09-27 07:52:54', '2019-09-30 07:56:38'),
(266, 'Mutembe Muhirwa Serge', 'muhirwa.s47@gmail.com', '$2y$10$Zpl4JeGdRKSewNODcuBtq.KDlpMH.7zlMLGk67pVzvXhkDCc0KYnW', '+250 784395459', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1569614352-hqdefault.jpg', NULL, NULL, NULL, 1, 1, NULL, 'tJhElAIlasnoVAsIWozR1dnh8rdQnS9rpwTcQQvwKIzOR7Nu1Hikwf1YIrAj', '2019-09-27 19:59:12', '2019-09-30 07:56:37'),
(267, 'Tuyizere marie claire', 'tuyizeclaire@gmail.com', '$2y$10$GPp35hGREIrLThSH/UFy7OZ00GyO2VUgzkZFZNbKKF9sc27gP2/Ui', '+250 785149525', 'Female', 'RWANDA', 'Kigali', 'Student', 'Bachelor\'s degree', 'Business and information communication technology', 'Intern', '1570001278-BeautyPlus_20170721093729_fast(3).jpg', NULL, NULL, NULL, 1, 0, '2VNfQ2N9kzmyKSU7T8K0xYRGkSVTJ2SZd5itE8pf', NULL, '2019-10-02 07:27:59', '2019-10-26 21:20:49'),
(268, 'manzi', 'manziberry250@gmail.com', '$2y$10$j434XR1aYxVOIbFg7SFTLe5E7rH6LFGWyrLkWYk9vJRP5g..bCFyS', '+250 788603911', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'graphic design', 'Intern', '1570458033-FB_IMG_15692415672769283.jpg', NULL, NULL, NULL, 1, 1, NULL, 'bH0WBXDAATD6tJ7GBwZPiTThT4ZMSXBZCaIhAcAAlODzgZK8JqjXbRQj2YlT', '2019-10-07 14:20:33', '2019-10-26 21:20:50'),
(269, 'kwizera brave', 'kwizerabrave450@gmail.com', '$2y$10$huEOy8ZzbNOUU4JFD46Nvuqr1ajg8yy/HX6AAweRsp2/PZbydwm5a', '+250780718199', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1571998131-DSC_4031 copy-2.jpg', NULL, NULL, NULL, 1, 0, 'r1MRPRXqQPJ1viLf8o75e2JnQKCdW9TMLlDcf765', NULL, '2019-10-25 10:08:51', '2019-11-01 11:50:39'),
(270, 'kamikazi hafsa', 'kamikazihafsa2@gmail.com', '$2y$10$flXAhFx4byEbSirNN2remu6Basi4G/XFLQoirpqiNeZHMoy68zej.', '+250781948725', 'Female', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Fellowship', '1572609508-IMG-20190728-WA0006.jpg', NULL, NULL, NULL, 1, 0, 'kK4cPOcmpVUxyNZPNcT19EiTh7JF85oXM33Kzbj4', NULL, '2019-11-01 11:58:28', '2019-11-01 11:59:55'),
(271, 'Emmah', 'emalindahkimari@gmail.com', '$2y$10$QAOVZ7BoqDwCGDyrwlxMUeYMp.EbLsXEbjI1fN7asdTlMKjhJnwKC', '+254 723220536', 'Female', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor\'s degree', 'Information Technology', 'Fellowship', '1572734886-IMG-20190329-WA0058.jpg', NULL, NULL, NULL, 1, 1, NULL, '5gPMbwTgN7ud3gjgvjRLwU8z5vBBXDcHt5Y8pUEIzx31GYjPslimKLYG99Ej', '2019-11-02 22:48:06', '2019-11-07 14:13:07'),
(272, 'IKUZWE Agnes', 'ikuxaggy01@gmail.com', '$2y$10$EHTNHYOI97hXm1OK2Zs5J.Sh4ihqzuufbQA1Kh76RPk5FpNKP96kq', '+250 783312924', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information technology', 'Mentor', '1573034664-_20190303_101901.jpg', NULL, NULL, NULL, 1, 1, NULL, 'pzoig8XQVfraKYT1xkKwAz87wO1wSWG4mJiPviBNtM7Mhxqyz25aD6ASa2zf', '2019-11-06 10:04:24', '2019-11-07 14:13:01'),
(273, 'ishimwe aron', 'shmwaron@gmail.com', '$2y$10$JYefbysVDgFPTctItu7DrOhigbwSNV/v5IPEptrYM6h8MaYl3GSu2', '+250 787663552', 'Male', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'geolovy', 'Volunteer', '1573133098-IMG_20191107_151737.jpg', NULL, NULL, NULL, 1, 0, 'lNAc4NyG4garMugkQr8F0vIBv0DjKNmmF4i8nsu8', NULL, '2019-11-07 13:24:59', '2019-11-07 14:03:33'),
(274, 'shekinah Gloire Niyonshima', 'shekinahgloire1@gmail.com', '$2y$10$.pr/vX.6pWvLXvAfJ.Uov.VuO8dq8/3iGPlx9n/xFaITMk6dbKcwK', '+250 786618259', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information technology', 'Volunteer', '1573238418-4312E8E8-335F-4934-8493-C4917BDE587A.jpeg', NULL, NULL, NULL, 1, 0, 'aAd7V6WETeuYb2VkZ6lzipf9S9jpQbwTEgV0ZC3q', NULL, '2019-11-08 18:40:19', '2019-11-21 18:24:47'),
(275, 'Tuyizere olivier', 'Tuyizereolix123@gmail.com', '$2y$10$eZAOnlsW5ruiPlMCKgGZfuLe7XamsmqOWVCs3I0v9sva3VCsIEaFi', '+250780209655', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Ict software development', 'Volunteer', '1573574553-1573574503435249402018.jpg', NULL, NULL, NULL, 1, 0, 'gvZ1mdo0oM4Ha3Nst0uxHnpmg6T1VfKBgs7tsdO3', NULL, '2019-11-12 16:02:34', '2019-11-21 18:24:48'),
(276, 'UKUNDIWABO UWERA Jeanne Aline', 'anoclez@gmail.com', '$2y$10$CuftXDW32cKqArCY6oP9T.Jii8IrOo3OOuRqU9htsUx/xSB/Jo/hm', '+250 785081862', 'Female', 'RWANDA', 'kigali', 'Student', 'Bachelor ongoing', 'Computer Engineering', 'Intern', '1573590625-+250 785 081 862 20191105_182838.jpg', NULL, NULL, NULL, 1, 1, NULL, 'yFGKojYNJUwcBKHSVjlJvFG1jxnCTc0AzmkLOgwleDKiqcDOfvQWQjPj8EXO', '2019-11-12 20:30:25', '2019-11-21 18:24:51'),
(277, 'NSHIMIYIMANA Jean nepomuscene', 'nshimiyenepos@gmail.com', '$2y$10$R.cSUHmIcsLA2R9l.WM1C.6dbRJH1duKAc9nLYT3fKIHxbl8IZ7L.', '+250 787077899', 'Male', 'RWANDA', 'KIGALI', 'Student', 'Bachelor ongoing', 'INFORMATION TECHNOLOGY', 'Intern', '1574238181-NEPO.jpg', NULL, NULL, NULL, 1, 1, NULL, 'jw9tundlvdDY6SVjYOw1TTh38TBc65wwQcz4wNeTrM2qhNPqJHyG5km5UcdB', '2019-11-20 08:23:01', '2019-11-21 18:24:52'),
(278, 'Bizimana Bosco', 'usapamfile@gmail.com', '$2y$10$M26gC5CSpMDv92SSDzkHmOsorn9BH6FFUHQ1odwdHi.MYZHHJazIS', '+250 781898255', 'Male', 'RWANDA', 'Musanze', 'Student', 'Bachelor ongoing', 'Agriculture', 'Volunteer', '1574679147-bo.jpg', NULL, NULL, NULL, 1, 1, NULL, 'TdxvdNTdAVSqUtLEoYMFZCij2CNmDxQ7isnwiNwAJuyZGob9wxvWu3R2HOwY', '2019-11-25 10:52:27', '2019-11-29 19:29:31'),
(279, 'Rugema didierr', 'rugemadidier789@gmail.com', '$2y$10$z.sR7bMNaQ9vOPxvbmlyY.k6BMWS0XaEvj13fELcEGgc.0WinsS0q', '+250 788455428', 'Male', 'RWANDA', 'kigali', 'Student', 'Secondary level', 'information technology', 'Volunteer', '1574752790-m.jpg', NULL, NULL, NULL, 1, 1, NULL, 'LKg55434NxW2Qee6UpXOhrSH0i316SGyTPcJrWEZ11l186wrUs7wcw11WWJ8', '2019-11-26 07:19:50', '2019-11-29 19:29:29'),
(280, 'Sekabera Ibrahim', 'ibrahimsekabera@gmail.com', '$2y$10$M0xiW97TMtyOitXBlM7pzuDoQVBq98OOUkqKKpBC.LcYUPPM.ujei', '+250 788976842', 'Male', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Software development', 'Intern', '1575231964-IMG_20180828_193951_014.JPG', NULL, NULL, NULL, 1, 1, NULL, '1VVQmQCc8EYUUNvcpMpPKmOel6ZprIF28uQX5rBDPJgSd26MkTNo74vLGkyE', '2019-12-01 20:26:04', '2019-12-09 07:31:18'),
(281, 'Ineza Winny Didine', 'nezawinnie@gmail.com', '$2y$10$dHCwHufBQ0TOu5soL0Arnu8qJ/kipIZL2XHWjxSjBCT7Mdbuf0I0e', '+250 780528147', 'Female', 'RWANDA', 'Kigali', 'Student', 'Secondary level', 'Information technology', 'Intern', '1575287776-photo Didine.jpg', NULL, NULL, NULL, 1, 1, NULL, NULL, '2019-12-02 11:56:16', '2020-01-10 08:33:33'),
(282, 'Emmanuel Turikumana', 'turikumanaemmanuel96@gmail.com', '$2y$10$yCsbj1tt/tyO.9KOCmCMY.fZT2rEqi4jpShdXqe7UJBiZwCU8iwdG', '+250 784707580', 'Male', 'RWANDA', 'Kigali', 'Graduate', 'Bachelor ongoing', 'Education', 'Intern', '1576003346-+250 784 707 580 20191105_171023.jpg', NULL, NULL, NULL, 1, 1, NULL, 'JmrCIO2D9lCNKXs27mKwNcFi28Z26mVuEKLVJYg2fvnaHGb9hTJFjf0wmDuj', '2019-12-10 18:42:26', '2019-12-11 15:53:17'),
(283, 'Jeannine Tuyishimire', 'tuyishimirejeannine3@gmail.com', '$2y$10$v/RsX/OMC.CHKdykynUHS.gSgm3tBIrYAoc4zFbzhvG0UZ2OAELyu', '+250 780854430', 'Female', 'RWANDA', 'Rwamagana', 'Graduate', 'Secondary level', 'Networking', 'Volunteer', '1576080963-FB_IMG_15634368841832206.jpg', NULL, NULL, NULL, 1, 1, NULL, 'yPGQvCGGzRwAgFOYSpxY4AybItirWP4vTospn3XxQgeEdHWoDgdobHPhmChX', '2019-12-11 16:16:03', '2019-12-17 20:18:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `abouts_slug_unique` (`slug`),
  ADD KEY `abouts_user_id_foreign` (`user_id`);

--
-- Indexes for table `adverts`
--
ALTER TABLE `adverts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adverts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_user_id_foreign` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_slug_unique` (`slug`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_user_id_foreign` (`user_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gallery_file_name_unique` (`file_name`),
  ADD KEY `gallery_user_id_foreign` (`user_id`);

--
-- Indexes for table `maillist`
--
ALTER TABLE `maillist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maillists_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`),
  ADD UNIQUE KEY `pages_lang_unique` (`lang`),
  ADD KEY `pages_user_id_foreign` (`user_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `partners_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolios_slug_unique` (`slug`),
  ADD KEY `portfolios_user_id_foreign` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `programs_name_unique` (`name`),
  ADD UNIQUE KEY `programs_slug_unique` (`slug`),
  ADD KEY `programs_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slides_slug_unique` (`slug`),
  ADD KEY `slides_user_id_foreign` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`),
  ADD KEY `tags_user_id_foreign` (`user_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adverts`
--
ALTER TABLE `adverts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maillist`
--
ALTER TABLE `maillist`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abouts`
--
ALTER TABLE `abouts`
  ADD CONSTRAINT `abouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `adverts`
--
ALTER TABLE `adverts`
  ADD CONSTRAINT `adverts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD CONSTRAINT `comment_replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `pages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `partners`
--
ALTER TABLE `partners`
  ADD CONSTRAINT `partners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
