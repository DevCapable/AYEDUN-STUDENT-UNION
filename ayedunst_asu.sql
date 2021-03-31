-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 31, 2021 at 09:17 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ayedunst_asu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `AdminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `AdminName`, `password`, `user`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Administrator2', '$2y$10$NEvITXq6Deaz1dwWiOR5UujOlF8WcJv3cN3JqlqZBAHhQhD5mm3iC', NULL, NULL, NULL, NULL),
(2, 'Administrator1', '$2y$10$zH3Akvejg/f0sL.4tDOmJOUNKNRYYz/w.jZPT4.gj5F35l15XhMxS', NULL, NULL, '2021-03-26 12:00:25', '2021-03-26 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_iboxes`
--

CREATE TABLE `admin_iboxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_who` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_issue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'notRead',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_iboxes`
--

INSERT INTO `admin_iboxes` (`id`, `from_who`, `email`, `type_of_issue`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abdulorasaq', 'jrasa77@gmail.com', NULL, 'let seeeee', 'read', '2021-03-27 19:27:48', '2021-03-27 22:56:19'),
(2, 'Eric Jones', 'eric.jones.z.mail@gmail.com', NULL, 'Good day, \r\n\r\nMy name is Eric and unlike a lot of emails you might get, I wanted to instead provide you with a word of encouragement – Congratulations\r\n\r\nWhat for?  \r\n\r\nPart of my job is to check out websites and the work you’ve done with ayedunstudentsunion.com definitely stands out. \r\n\r\nIt’s clear you took building a website seriously and made a real investment of time and resources into making it top quality.\r\n\r\nThere is, however, a catch… more accurately, a question…\r\n\r\nSo when someone like me happens to find your site – maybe at the top of the search results (nice job BTW) or just through a random link, how do you know? \r\n\r\nMore importantly, how do you make a connection with that person?\r\n\r\nStudies show that 7 out of 10 visitors don’t stick around – they’re there one second and then gone with the wind.\r\n\r\nHere’s a way to create INSTANT engagement that you may not have known about… \r\n\r\nTalk With Web Visitor is a software widget that’s works on your site, ready to capture any visitor’s Name, Email address and Phone Number.  It lets you know INSTANTLY that they’re interested – so that you can talk to that lead while they’re literally checking out ayedunstudentsunion.com.\r\n\r\nCLICK HERE https://talkwithwebvisitors.com to try out a Live Demo with Talk With Web Visitor now to see exactly how it works.\r\n\r\nIt could be a game-changer for your business – and it gets even better… once you’ve captured their phone number, with our new SMS Text With Lead feature, you can automatically start a text (SMS) conversation – immediately (and there’s literally a 100X difference between contacting someone within 5 minutes versus 30 minutes.)\r\n\r\nPlus then, even if you don’t close a deal right away, you can connect later on with text messages for new offers, content links, even just follow up notes to build a relationship.\r\n\r\nEverything I’ve just described is simple, easy, and effective. \r\n\r\nCLICK HERE https://talkwithwebvisitors.com to discover what Talk With Web Visitor can do for your business.\r\n\r\nYou could be converting up to 100X more leads today!\r\n\r\nEric\r\nPS: Talk With Web Visitor offers a FREE 14 days trial – and it even includes International Long Distance Calling. \r\nYou have customers waiting to talk with you right now… don’t keep them waiting. \r\nCLICK HERE https://talkwithwebvisitors.com to try Talk With Web Visitor now.\r\n\r\nIf you\'d like to unsubscribe click here http://talkwithwebvisitors.com/unsubscribe.aspx?d=ayedunstudentsunion.com', 'read', '2021-03-28 06:48:50', '2021-03-28 12:48:42'),
(3, 'BANKOLE MICHAEL ABIDEMI', 'bankoleabidemimichael@gmail.com', NULL, 'Hi', 'read', '2021-03-30 22:09:45', '2021-03-30 23:37:30'),
(4, 'Ogundele kehinde', 'ogundelekehinde451@gmail.com', NULL, 'I love my city USA United State of Ayedun', 'read', '2021-03-31 01:38:41', '2021-03-31 01:52:28');

-- --------------------------------------------------------

--
-- Table structure for table `admin_likes`
--

CREATE TABLE `admin_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_likes`
--

INSERT INTO `admin_likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '2021-03-23 12:00:05', '2021-03-23 12:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `admin_posts`
--

CREATE TABLE `admin_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Administrator',
  `posting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ImageCaption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VideoCaption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_posts`
--

INSERT INTO `admin_posts` (`id`, `adminName`, `posting`, `image`, `ImageCaption`, `video`, `VideoCaption`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'GREATE AYEDUN STUDENT\'S  UNION, AS WE ARE FULLY BACK ONLINE', NULL, NULL, NULL, NULL, '2021-03-27 19:47:11', '2021-03-28 12:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `admin_sent_mails`
--

CREATE TABLE `admin_sent_mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_who` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_issue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'notRead',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_sent_mails`
--

INSERT INTO `admin_sent_mails` (`id`, `from_who`, `email`, `type_of_issue`, `details`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Abdulorasaq', 'jrasa77@gmail.com', NULL, 'let seeeee', 'read', '2021-03-27 19:27:48', '2021-03-27 22:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `chapter_presidents`
--

CREATE TABLE `chapter_presidents` (
  `id` bigint(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discepline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapter_presidents`
--

INSERT INTO `chapter_presidents` (`id`, `full_name`, `compound`, `gender`, `discepline`, `institution`, `date_of_birth`, `year_of_tenure_from`, `year_of_tenure_to`, `post`, `history`, `phone`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Cmr. Dada Abdulrasaq Olawale', 'IMOJO', 'Male', 'Computer science', 'Kwara State polytechnic', '1990-05-10', '2018-03-10', '2019-04-10', 'KWARAPOLY PRESIDENT', 'Was able to Mobilize AYEDUN student for the interest of weekly meeting and stimulate mutual understanding,  unity and progress, brought about cyber cafe but couldn\'t finish the project before the tenure year runs out,,..', '08162291993', 'public/images/1617129752_IMG_20200731_100831_6.jpg', '2021-03-31 00:39:29', '2021-03-31 00:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `postId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `postId`, `userId`, `username`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Honrable Capable', 'Great oooo', '2021-03-29 02:24:37', '2021-03-29 02:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `compounds`
--

CREATE TABLE `compounds` (
  `id` bigint(40) NOT NULL,
  `Name_of_Compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_of_compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history_of_compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `culture_of_compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compounds`
--

INSERT INTO `compounds` (`id`, `Name_of_Compound`, `head_of_compound`, `history_of_compound`, `origin`, `culture_of_compound`, `head_image`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'IMOJO', 'OLU-ODO', 'The first Compound to settled down in the whole twon', 'OFFA', 'Hepa', 'images/1615888546_download.jpg', '08167545434', '2021-03-05 21:18:51', '2021-03-16 21:55:46'),
(2, 'IWOYE', 'OBA-OYE', 'NULL', 'Not yet known', 'Hepa', NULL, '09043542343', '2021-03-07 11:13:34', '2021-03-07 11:13:34'),
(3, 'IMOJA', 'ALAAYE', 'NULL', 'Not yet known', 'Hepa', NULL, '08162291993', '2021-03-07 21:57:26', '2021-03-07 21:57:26'),
(4, 'EBIOHUN', 'OBAMILA', 'NULL', 'Not yet known', 'Equngun', NULL, '08167545434', '2021-03-07 21:58:15', '2021-03-07 21:58:15'),
(5, 'EMU', 'ELEMU', 'NULL', 'OFFA', 'Equngun', NULL, '08162291993', '2021-03-07 22:06:17', '2021-03-07 22:06:17'),
(6, 'EREGUN', 'OLU-EREGUN', 'NULL', 'Not yet known', 'Hepa', NULL, '09065653333', '2021-03-07 22:01:11', '2021-03-07 22:01:11'),
(7, 'ILE-ASABA', 'OJOMUN', 'NULL', 'Not yet known', 'Equngun', NULL, '08167545434', '2021-03-07 22:03:50', '2021-03-07 22:03:50'),
(8, 'IMONBA', 'ALAAYE', 'NULL', 'Not yet known', 'Equngun', NULL, '09065653333', '2021-03-07 22:11:39', '2021-03-07 22:11:39'),
(9, 'ILE-ALA', 'OBAMILA', 'NULL', 'Not yet known', 'Hepa', NULL, '09043542343', '2021-03-07 22:12:17', '2021-03-17 15:28:02'),
(10, 'ISOWU', 'OLU-ISOWU', 'NULL', 'Not yet known', 'Equngun', NULL, '08167545434', '2021-03-07 22:15:53', '2021-03-07 22:15:53'),
(11, 'ODO-EDE', 'OBA-EDE', 'NULL', 'Not yet known', 'Hepa', NULL, '09088876777', '2021-03-07 22:16:53', '2021-03-07 22:16:53'),
(12, 'IJOKO', 'OLUJOKO', 'NULL', 'Not yet known', 'Hepa', NULL, '09088876777', '2021-03-07 22:18:27', '2021-03-07 22:18:27'),
(13, 'ILE-AGBE', 'OBA-OYE', 'NULL', 'Not yet known', 'Hepa', NULL, '09065653333', '2021-03-16 21:06:38', '2021-03-16 21:06:38'),
(14, 'GUEST/NOT FROM AYEDUN', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `post_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(6, 1, 12, '2021-03-31 19:32:19', '2021-03-31 19:32:19'),
(5, 5, 1, '2021-03-31 02:18:13', '2021-03-31 02:18:13'),
(4, 1, 1, '2021-03-27 20:27:11', '2021-03-27 20:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `listofallschools`
--

CREATE TABLE `listofallschools` (
  `id` bigint(200) NOT NULL,
  `ListSchools` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listofallschools`
--

INSERT INTO `listofallschools` (`id`, `ListSchools`) VALUES
(1, 'University of Abuja '),
(2, ' University of Agriculture, Abeokuta '),
(3, 'University of Ado-Ekiti '),
(4, 'University of Benin '),
(5, 'University of Calabar '),
(6, 'University of Education, Ikere-Ekiti '),
(7, 'University of Ibadan '),
(8, 'University of Ilorin '),
(9, 'University of Jos '),
(10, 'University of Lagos '),
(11, 'University of Maiduguri '),
(12, 'University of Mkar, Mkar '),
(13, 'University of Nigeria '),
(14, 'University of port-harcourt '),
(15, 'University of Technology, Akwa-Ibom '),
(16, 'University Of Uyo '),
(17, ' Abia State University, Uturu '),
(18, 'ABTI-American University of Nigeria '),
(19, 'Abubakar Tafawa Balewa University '),
(20, 'Adamawa State University, Mubi '),
(21, 'Adekunle Ajasin University '),
(22, 'Ahmadu Bello University '),
(23, 'Ajayi Crowther University, Oyo '),
(24, 'Ambrose Alli University '),
(25, 'Bayero University, Kano '),
(26, 'Bells University '),
(27, 'Benson Idahosa University '),
(28, ' Bowen University, Iwo '),
(29, ' Cetep City University, Lagos '),
(30, 'Covenant University '),
(31, ' Crawford University,Oye Ekiti '),
(32, 'Cross River University of Technology '),
(33, ' Delta State University, Abraka '),
(34, ' Ebonyi State University '),
(35, ' Enugu State University of Science & Technology '),
(36, 'Federal University of Technology, Akure '),
(37, 'Federal University of Technology, Minna '),
(38, 'Federal University of Technology, Owerri '),
(39, 'Federal University Of Technology, Yola '),
(40, 'Gombe state University, '),
(41, 'Igbinedion University, Okada '),
(42, 'Imo State University '),
(43, 'Joseph Ayo Babalola University '),
(44, 'Katsina State University '),
(45, ' Kogi State University, Anyigba '),
(46, ' Ladoke Akintola University of Tech. '),
(47, ' Lagos State University '),
(48, ' Lead City University '),
(49, ' Michael Okpara University '),
(50, ' Nasarrawa State University '),
(51, 'National Open University '),
(52, 'Niger Delta University '),
(53, ' Nigerian Defence Academy '),
(54, 'Nnamdi Azikiwe University of Agriculture, Umudike '),
(55, ' Obafemi Awolowo University, ile-ife '),
(56, 'Olabisi Onabanjo University, Ago-Iwoye '),
(57, 'Osun State University '),
(58, 'pan African University, Lekki '),
(59, 'plateau State University '),
(60, 'Redeemer’s University '),
(61, 'Renaissance University, Enugu '),
(62, 'Rivers State University of Science and Technology '),
(63, 'Salem University, Lokoja '),
(64, 'St. paul’s University College, Awka '),
(65, 'Theological College of Northern Nigeria,Bukuru '),
(66, 'Tai Solarin University of Education, Ijebu-Ode '),
(67, ' Usmanu Danfodiyo University, Sokoto '),
(68, 'Wesley University, Ondo '),
(69, 'Anambra State University, Anambra '),
(70, 'Abia State polytechnic '),
(71, 'Adamawa State polytechnic, Yola '),
(72, ' Akanu Ibiam Federal polytechnic, Unwana '),
(73, ' Allover central polytechnic, Sango-Ota Ogun State '),
(74, ' Akwa Ibom State polytechnic '),
(75, ' Auchi polytechnic, Auchi '),
(76, ' Dorben polytechnic (formerly Abuja School of Accountancy and Computer Studies) '),
(77, ' Delta state polytechnic, Ozoro '),
(78, ' Federal polytechnic, Ado – Ekiti '),
(79, ' Federal polytechnic Offa '),
(80, ' Federal polytechnic Bida '),
(81, ' Federal polytechnic, Bauchi '),
(82, ' Federal polytechnic, Idah '),
(83, ' Federal polytechnic, Ilaro '),
(84, 'Federal polytechnic, Damaturu '),
(85, ' Federal polytechnic, Nassarawa '),
(86, 'Federal polytechnic, Mubi '),
(87, 'Federal polytechnic, Nekede '),
(88, ' Federal polytechnic, Oko '),
(89, ' Federal polytechnic, Ede '),
(90, ' Federal polytechnic, Birnin-Kebbi '),
(91, 'Federal coll. of Animal health & production Tech., Ibadan '),
(92, ' Gateway polytechnic Saapade '),
(93, 'Hussaini Adamu Federal polytechnic, kazaure '),
(94, ' Institute of Management Technology, Enugu '),
(95, 'Kaduna polytechnic '),
(96, ' Kano State polytechnic, Kano '),
(97, ' Kwara State polytechnic '),
(98, ' University of Agriculture, Abeokuta '),
(99, ' Rivers State College of Education '),
(100, 'Oyo State College Of Education, Oyo '),
(101, ' Osun State College of Education, Ila-Orangun '),
(102, ' Osun State College of Education, Ilesa '),
(103, ' Nwafor Orizu College of Education '),
(104, ' National Teachers Institute, kaduna '),
(105, 'Kwara State College of Education '),
(106, ' Kano State College of Education, Kano '),
(107, ' Federal College of Education, Yola '),
(108, ' Federal College of Education (Technical) Gusau '),
(109, ' Federal College of Education, (Technical) Bich '),
(110, 'University of Benin '),
(111, 'University of Calabar '),
(112, 'University of Education, Ikere-Ekiti '),
(113, 'University of Ibadan '),
(114, 'University of Ilorin '),
(115, 'University of Jos '),
(116, 'University of Lagos '),
(117, 'University of Maiduguri '),
(118, 'University of Mkar, Mkar '),
(119, 'University of Nigeria '),
(120, 'University of port-harcourt '),
(121, 'University of Technology, Akwa-Ibom '),
(122, 'University Of Uyo '),
(123, ' Abia State University, Uturu '),
(124, 'ABTI-American University of Nigeria '),
(125, 'Abubakar Tafawa Balewa University '),
(126, 'Adamawa State University, Mubi '),
(127, 'Adekunle Ajasin University '),
(128, 'Ahmadu Bello University '),
(129, 'Ajayi Crowther University, Oyo '),
(130, 'Ambrose Alli University '),
(131, 'Bayero University, Kano '),
(132, 'Bells University '),
(133, 'Benson Idahosa University '),
(134, ' Bowen University, Iwo '),
(135, ' Cetep City University, Lagos '),
(136, 'Covenant University '),
(137, ' Crawford University,Oye Ekiti '),
(138, 'Cross River University of Technology '),
(139, ' Delta State University, Abraka '),
(140, ' Ebonyi State University '),
(141, ' Enugu State University of Science & Technology '),
(142, 'Federal University of Technology, Akure '),
(143, 'Federal University of Technology, Minna '),
(144, 'Federal University of Technology, Owerri '),
(145, 'Federal University Of Technology, Yola '),
(146, 'Gombe state University, '),
(147, 'Igbinedion University, Okada '),
(148, 'Imo State University '),
(149, 'Joseph Ayo Babalola University '),
(150, 'Katsina State University '),
(151, ' Kogi State University, Anyigba '),
(152, ' Ladoke Akintola University of Tech. '),
(153, ' Lagos State University '),
(154, ' Lead City University '),
(155, ' Michael Okpara University '),
(156, ' Nasarrawa State University '),
(157, 'National Open University '),
(158, 'Niger Delta University '),
(159, ' Nigerian Defence Academy '),
(160, 'Nnamdi Azikiwe University of Agriculture, Umudike '),
(161, ' Obafemi Awolowo University, ile-ife '),
(162, 'Olabisi Onabanjo University, Ago-Iwoye '),
(163, 'Osun State University '),
(164, 'pan African University, Lekki '),
(165, 'plateau State University '),
(166, 'Redeemer’s University '),
(167, 'Renaissance University, Enugu '),
(168, 'Rivers State University of Science and Technology '),
(169, 'Salem University, Lokoja '),
(170, 'St. paul’s University College, Awka '),
(171, 'Theological College of Northern Nigeria,Bukuru '),
(172, 'Tai Solarin University of Education, Ijebu-Ode '),
(173, ' Usmanu Danfodiyo University, Sokoto '),
(174, 'Wesley University, Ondo '),
(175, 'Anambra State University, Anambra '),
(176, 'Abia State polytechnic '),
(177, 'Adamawa State polytechnic, Yola '),
(178, ' Akanu Ibiam Federal polytechnic, Unwana '),
(179, ' Allover central polytechnic, Sango-Ota Ogun State '),
(180, ' Akwa Ibom State polytechnic '),
(181, ' Auchi polytechnic, Auchi '),
(182, ' Dorben polytechnic (formerly Abuja School of Accountancy and Computer Studies) '),
(183, ' Delta state polytechnic, Ozoro '),
(184, ' Federal polytechnic, Ado – Ekiti '),
(185, ' Federal polytechnic Offa '),
(186, ' Federal polytechnic Bida '),
(187, ' Federal polytechnic, Bauchi '),
(188, ' Federal polytechnic, Idah '),
(189, ' Federal polytechnic, Ilaro '),
(190, 'Federal polytechnic, Damaturu '),
(191, ' Federal polytechnic, Nassarawa '),
(192, 'Federal polytechnic, Mubi '),
(193, 'Federal polytechnic, Nekede '),
(194, ' Federal polytechnic, Oko '),
(195, ' Federal polytechnic, Ede '),
(196, ' Federal polytechnic, Birnin-Kebbi '),
(197, 'Federal coll. of Animal health & production Tech., Ibadan '),
(198, ' Gateway polytechnic Saapade '),
(199, 'Hussaini Adamu Federal polytechnic, kazaure '),
(200, ' Institute of Management Technology, Enugu '),
(201, 'Kaduna polytechnic '),
(202, ' Kano State polytechnic, Kano '),
(203, ' Kwara State polytechnic '),
(204, 'University of Maiduguri '),
(205, 'University of Mkar, Mkar '),
(206, 'University of Nigeria '),
(207, 'University of port-harcourt '),
(208, 'University of Technology, Akwa-Ibom '),
(209, 'University Of Uyo '),
(210, ' Abia State University, Uturu '),
(211, 'ABTI-American University of Nigeria '),
(212, 'Abubakar Tafawa Balewa University '),
(213, 'Adamawa State University, Mubi '),
(214, 'Adekunle Ajasin University '),
(215, 'Ahmadu Bello University '),
(216, 'Ajayi Crowther University, Oyo '),
(217, 'Ambrose Alli University '),
(218, 'Bayero University, Kano '),
(219, 'Bells University '),
(220, 'Benson Idahosa University '),
(221, ' Bowen University, Iwo '),
(222, ' Cetep City University, Lagos '),
(223, 'Covenant University '),
(224, ' Crawford University,Oye Ekiti '),
(225, 'Cross River University of Technology '),
(226, ' Delta State University, Abraka '),
(227, ' Ebonyi State University '),
(228, ' Enugu State University of Science & Technology '),
(229, 'Federal University of Technology, Akure '),
(230, 'Federal University of Technology, Minna '),
(231, 'Federal University of Technology, Owerri '),
(232, 'Federal University Of Technology, Yola '),
(233, 'Gombe state University, '),
(234, 'Igbinedion University, Okada '),
(235, 'Imo State University '),
(236, 'Joseph Ayo Babalola University '),
(237, 'Katsina State University '),
(238, ' Kogi State University, Anyigba '),
(239, ' Ladoke Akintola University of Tech. '),
(240, ' Lagos State University '),
(241, ' Lead City University '),
(242, ' Michael Okpara University '),
(243, ' Nasarrawa State University '),
(244, 'National Open University '),
(245, 'Niger Delta University '),
(246, ' Nigerian Defence Academy '),
(247, 'Nnamdi Azikiwe University of Agriculture, Umudike '),
(248, ' Obafemi Awolowo University, ile-ife '),
(249, 'Olabisi Onabanjo University, Ago-Iwoye '),
(250, 'Osun State University '),
(251, 'pan African University, Lekki '),
(252, 'plateau State University '),
(253, 'Redeemer’s University '),
(254, 'Renaissance University, Enugu '),
(255, 'Rivers State University of Science and Technology '),
(256, 'Salem University, Lokoja '),
(257, 'St. paul’s University College, Awka '),
(258, 'Theological College of Northern Nigeria,Bukuru '),
(259, 'Tai Solarin University of Education, Ijebu-Ode '),
(260, ' Usmanu Danfodiyo University, Sokoto '),
(261, 'Wesley University, Ondo '),
(262, 'Anambra State University, Anambra '),
(263, 'Abia State polytechnic '),
(264, 'Adamawa State polytechnic, Yola '),
(265, ' Akanu Ibiam Federal polytechnic, Unwana '),
(266, ' Allover central polytechnic, Sango-Ota Ogun State '),
(267, ' Akwa Ibom State polytechnic '),
(268, ' Auchi polytechnic, Auchi '),
(269, ' Dorben polytechnic (formerly Abuja School of Accountancy and Computer Studies) '),
(270, ' Delta state polytechnic, Ozoro '),
(271, ' Federal polytechnic, Ado – Ekiti '),
(272, ' Federal polytechnic Offa '),
(273, ' Federal polytechnic Bida '),
(274, ' Federal polytechnic, Bauchi '),
(275, ' Federal polytechnic, Idah '),
(276, ' Federal polytechnic, Ilaro '),
(277, 'Federal polytechnic, Damaturu '),
(278, ' Federal polytechnic, Nassarawa '),
(279, 'Federal polytechnic, Mubi '),
(280, 'Federal polytechnic, Nekede '),
(281, ' Federal polytechnic, Oko '),
(282, ' Federal polytechnic, Ede '),
(283, ' Federal polytechnic, Birnin-Kebbi '),
(284, 'Federal coll. of Animal health & production Tech., Ibadan '),
(285, ' Gateway polytechnic Saapade '),
(286, 'Hussaini Adamu Federal polytechnic, kazaure '),
(287, ' Institute of Management Technology, Enugu '),
(288, 'Kaduna polytechnic '),
(289, ' Kano State polytechnic, Kano '),
(290, ' Kwara State polytechnic '),
(291, 'University of Maiduguri '),
(292, 'University of Mkar, Mkar '),
(293, 'University of Nigeria '),
(294, 'University of port-harcourt '),
(295, 'University of Technology, Akwa-Ibom '),
(296, 'University Of Uyo '),
(297, ' Abia State University, Uturu '),
(298, 'ABTI-American University of Nigeria '),
(299, 'Abubakar Tafawa Balewa University '),
(300, 'Adamawa State University, Mubi '),
(301, 'Adekunle Ajasin University '),
(302, 'Ahmadu Bello University '),
(303, 'Ajayi Crowther University, Oyo '),
(304, 'Ambrose Alli University '),
(305, 'Bayero University, Kano '),
(306, 'Bells University '),
(307, 'Benson Idahosa University '),
(308, ' Bowen University, Iwo '),
(309, ' Cetep City University, Lagos '),
(310, 'Covenant University '),
(311, ' Crawford University,Oye Ekiti '),
(312, 'Cross River University of Technology '),
(313, ' Delta State University, Abraka '),
(314, ' Ebonyi State University '),
(315, ' Enugu State University of Science & Technology '),
(316, 'Federal University of Technology, Akure '),
(317, 'Federal University of Technology, Minna '),
(318, 'Federal University of Technology, Owerri '),
(319, 'Federal University Of Technology, Yola '),
(320, 'Gombe state University, '),
(321, 'Igbinedion University, Okada '),
(322, 'Imo State University '),
(323, 'Joseph Ayo Babalola University '),
(324, 'Katsina State University '),
(325, ' Kogi State University, Anyigba '),
(326, ' Ladoke Akintola University of Tech. '),
(327, ' Lagos State University '),
(328, ' Lead City University '),
(329, ' Michael Okpara University '),
(330, ' Nasarrawa State University '),
(331, 'National Open University '),
(332, 'Niger Delta University '),
(333, ' Nigerian Defence Academy '),
(334, 'Nnamdi Azikiwe University of Agriculture, Umudike '),
(335, ' Obafemi Awolowo University, ile-ife '),
(336, 'Olabisi Onabanjo University, Ago-Iwoye '),
(337, 'Osun State University '),
(338, 'pan African University, Lekki '),
(339, 'plateau State University '),
(340, 'Redeemer’s University '),
(341, 'Renaissance University, Enugu '),
(342, 'Rivers State University of Science and Technology '),
(343, 'Salem University, Lokoja '),
(344, 'St. paul’s University College, Awka '),
(345, 'Theological College of Northern Nigeria,Bukuru '),
(346, 'Tai Solarin University of Education, Ijebu-Ode '),
(347, ' Usmanu Danfodiyo University, Sokoto '),
(348, 'Wesley University, Ondo '),
(349, 'Anambra State University, Anambra '),
(350, 'Abia State polytechnic '),
(351, 'Adamawa State polytechnic, Yola '),
(352, ' Akanu Ibiam Federal polytechnic, Unwana '),
(353, ' Allover central polytechnic, Sango-Ota Ogun State '),
(354, ' Akwa Ibom State polytechnic '),
(355, ' Auchi polytechnic, Auchi '),
(356, ' Dorben polytechnic (formerly Abuja School of Accountancy and Computer Studies) '),
(357, ' Delta state polytechnic, Ozoro '),
(358, ' Federal polytechnic, Ado – Ekiti '),
(359, ' Federal polytechnic Offa '),
(360, ' Federal polytechnic Bida '),
(361, ' Federal polytechnic, Bauchi '),
(362, ' Federal polytechnic, Idah '),
(363, ' Federal polytechnic, Ilaro '),
(364, 'Federal polytechnic, Damaturu '),
(365, ' Federal polytechnic, Nassarawa '),
(366, 'Federal polytechnic, Mubi '),
(367, 'Federal polytechnic, Nekede '),
(368, ' Federal polytechnic, Oko '),
(369, ' Federal polytechnic, Ede '),
(370, ' Federal polytechnic, Birnin-Kebbi '),
(371, 'Federal coll. of Animal health & production Tech., Ibadan '),
(372, ' Gateway polytechnic Saapade '),
(373, 'Hussaini Adamu Federal polytechnic, kazaure '),
(374, ' Institute of Management Technology, Enugu '),
(375, 'Kaduna polytechnic '),
(376, ' Kano State polytechnic, Kano '),
(377, ' Kwara State polytechnic '),
(378, 'Federal University of Technology, Akure '),
(379, 'Federal University of Technology, Minna '),
(380, 'Federal University of Technology, Owerri '),
(381, 'Federal University Of Technology, Yola '),
(382, 'Gombe state University, '),
(383, 'Igbinedion University, Okada '),
(384, 'Imo State University '),
(385, 'Joseph Ayo Babalola University '),
(386, 'Katsina State University '),
(387, ' Kogi State University, Anyigba '),
(388, ' Ladoke Akintola University of Tech. '),
(389, ' Lagos State University '),
(390, ' Lead City University '),
(391, ' Michael Okpara University '),
(392, ' Nasarrawa State University '),
(393, 'National Open University '),
(394, 'Niger Delta University '),
(395, ' Nigerian Defence Academy '),
(396, 'Nnamdi Azikiwe University of Agriculture, Umudike '),
(397, ' Obafemi Awolowo University, ile-ife '),
(398, 'Olabisi Onabanjo University, Ago-Iwoye '),
(399, 'Osun State University '),
(400, 'pan African University, Lekki '),
(401, 'plateau State University '),
(402, 'Redeemer’s University '),
(403, 'Renaissance University, Enugu '),
(404, 'Rivers State University of Science and Technology '),
(405, 'Salem University, Lokoja '),
(406, 'St. paul’s University College, Awka '),
(407, 'Theological College of Northern Nigeria,Bukuru '),
(408, 'Tai Solarin University of Education, Ijebu-Ode '),
(409, ' Usmanu Danfodiyo University, Sokoto '),
(410, 'Wesley University, Ondo '),
(411, 'Anambra State University, Anambra '),
(412, 'Abia State polytechnic '),
(413, 'Adamawa State polytechnic, Yola '),
(414, ' Akanu Ibiam Federal polytechnic, Unwana '),
(415, ' Allover central polytechnic, Sango-Ota Ogun State '),
(416, ' Akwa Ibom State polytechnic '),
(417, ' Auchi polytechnic, Auchi '),
(418, ' Dorben polytechnic (formerly Abuja School of Accountancy and Computer Studies) '),
(419, ' Delta state polytechnic, Ozoro '),
(420, ' Federal polytechnic, Ado – Ekiti '),
(421, ' Federal polytechnic Offa '),
(422, ' Federal polytechnic Bida '),
(423, ' Federal polytechnic, Bauchi '),
(424, ' Federal polytechnic, Idah '),
(425, ' Federal polytechnic, Ilaro '),
(426, 'Federal polytechnic, Damaturu '),
(427, ' Federal polytechnic, Nassarawa '),
(428, 'Federal polytechnic, Mubi '),
(429, 'Federal polytechnic, Nekede '),
(430, ' Federal polytechnic, Oko '),
(431, ' Federal polytechnic, Ede '),
(432, ' Federal polytechnic, Birnin-Kebbi '),
(433, 'Federal coll. of Animal health & production Tech., Ibadan '),
(434, ' Gateway polytechnic Saapade '),
(435, 'Hussaini Adamu Federal polytechnic, kazaure '),
(436, ' Institute of Management Technology, Enugu '),
(437, 'Kaduna polytechnic '),
(438, ' Kano State polytechnic, Kano '),
(439, ' Kwara State polytechnic '),
(440, 'Federal University of Technology, Akure '),
(441, 'Federal University of Technology, Minna '),
(442, 'Federal University of Technology, Owerri '),
(443, 'Federal University Of Technology, Yola '),
(444, 'Gombe state University, '),
(445, 'Igbinedion University, Okada '),
(446, 'Imo State University '),
(447, 'Joseph Ayo Babalola University '),
(448, 'Katsina State University '),
(449, ' Kogi State University, Anyigba '),
(450, ' Ladoke Akintola University of Tech. '),
(451, ' Lagos State University '),
(452, ' Lead City University '),
(453, ' Michael Okpara University '),
(454, ' Nasarrawa State University '),
(455, 'National Open University '),
(456, 'Niger Delta University '),
(457, ' Nigerian Defence Academy '),
(458, 'Nnamdi Azikiwe University of Agriculture, Umudike '),
(459, ' Obafemi Awolowo University, ile-ife '),
(460, 'Olabisi Onabanjo University, Ago-Iwoye '),
(461, 'Osun State University '),
(462, 'pan African University, Lekki '),
(463, 'plateau State University '),
(464, 'Redeemer’s University '),
(465, 'Renaissance University, Enugu '),
(466, 'Rivers State University of Science and Technology '),
(467, 'Salem University, Lokoja '),
(468, 'St. paul’s University College, Awka '),
(469, 'Theological College of Northern Nigeria,Bukuru '),
(470, 'Tai Solarin University of Education, Ijebu-Ode '),
(471, ' Usmanu Danfodiyo University, Sokoto '),
(472, 'Wesley University, Ondo '),
(473, 'Anambra State University, Anambra '),
(474, 'Abia State polytechnic '),
(475, 'Adamawa State polytechnic, Yola '),
(476, ' Akanu Ibiam Federal polytechnic, Unwana '),
(477, ' Allover central polytechnic, Sango-Ota Ogun State '),
(478, ' Akwa Ibom State polytechnic '),
(479, ' Auchi polytechnic, Auchi '),
(480, ' Dorben polytechnic (formerly Abuja School of Accountancy and Computer Studies) '),
(481, ' Delta state polytechnic, Ozoro '),
(482, ' Federal polytechnic, Ado – Ekiti '),
(483, ' Federal polytechnic Offa '),
(484, ' Federal polytechnic Bida '),
(485, ' Federal polytechnic, Bauchi '),
(486, ' Federal polytechnic, Idah '),
(487, ' Federal polytechnic, Ilaro '),
(488, 'Federal polytechnic, Damaturu '),
(489, ' Federal polytechnic, Nassarawa '),
(490, 'Federal polytechnic, Mubi '),
(491, 'Federal polytechnic, Nekede '),
(492, ' Federal polytechnic, Oko '),
(493, ' Federal polytechnic, Ede '),
(494, ' Federal polytechnic, Birnin-Kebbi '),
(495, 'Federal coll. of Animal health & production Tech., Ibadan '),
(496, ' Gateway polytechnic Saapade '),
(497, 'Hussaini Adamu Federal polytechnic, kazaure '),
(498, ' Institute of Management Technology, Enugu '),
(499, 'Kaduna polytechnic '),
(500, ' Kano State polytechnic, Kano '),
(501, ' Kwara State polytechnic '),
(502, ' Lagos City polytechnic'),
(503, 'Lagos City Computer College '),
(504, 'Lagos State polytechnic '),
(505, 'Niger State polytechnic, Zungeru '),
(506, ' Nigerian Coll. of Aviation Tech., Zaira '),
(507, 'Maritime Academy of Nigeria, Oron '),
(508, 'Moshood Abiola polytechnic, Abeokuta '),
(509, 'Nuhu Bamalli polytechnic, Zaria, Kaduna State '),
(510, ' Osun State College of Technology, Esa-Oke '),
(511, ' Osun State polytechnic, Iree '),
(512, 'Ramat polytechnic, Maiduguri '),
(513, 'River State polytechnic, Bori '),
(514, ' Rufus Giwa polytechnic, Owo '),
(515, ' Shaka polytechnic '),
(516, ' The polytechnic, Ibadan '),
(517, ' Yaba College of Tech. '),
(518, ' Adeniran Ogunsanya College of Education '),
(519, ' Adeyemi College of Education, Ondo '),
(520, ' College of Education, Agbor '),
(521, ' College of Education, Afaha-Nsit '),
(522, ' College of Education, Akwanga '),
(523, 'College of Education, Ekiadolor '),
(524, ' College of Education, Ikere Ekiti '),
(525, ' College of Education, Katsina Ala '),
(526, ' College of Education, Zuba '),
(527, ' College of Education, Oro, Kwara State '),
(528, ' College of Education, Azare '),
(529, 'College of Education, Warri '),
(530, 'College of Education, Agbor '),
(531, 'College of Education, Akwanga '),
(532, ' College of Education, Gindiri '),
(533, ' College of Education, Katsina-Ala '),
(534, ' FCT College of Education, Zuba '),
(535, ' Federal College of Education, Zaira '),
(536, ' Federal College of Education, Okene '),
(537, ' Federal College of Education, Akoka '),
(538, ' Federal College of Education, Omoku '),
(539, ' Federal College of Education (Special), Oyo '),
(540, ' Federal College of Education, Zaria '),
(541, ' Federal College of Education (Technical) Gombe '),
(542, 'Federal College of Education, Obudu '),
(543, ' Federal College of Education, pankshin '),
(544, 'Ayedun Muslim Communitys College'),
(545, 'Kwara State University Malete  Kwara'),
(546, 'University Of Ilorin, Kwara'),
(547, 'Ekan-Meje Grammar School Fatimah,  Ayedun');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_who` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to_who` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_who`, `message`, `to_who`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honrable Capable', 'Let keep test running', 'admin55', 'read', '2021-03-30 02:54:27', '2021-03-31 13:33:26'),
(3, 'Honrable Capable', 'Weldone o presi', 'admin55', 'read', '2021-03-31 01:57:48', '2021-03-31 13:33:26'),
(4, 'Honrable Capable', 'Weldone', 'Lollypop', 'read', '2021-03-31 03:00:39', '2021-03-31 13:33:26'),
(5, 'Honrable Capable', 'Are you still there', 'Lollypop', 'read', '2021-03-31 03:01:05', '2021-03-31 13:33:26'),
(6, 'Lollypop', 'Yes ...m here', 'Honrable Capable', 'read', '2021-03-31 03:07:08', '2021-03-31 19:25:22'),
(7, 'Honrable Capable', 'This is our new platform', 'Lollypop', 'read', '2021-03-31 03:08:50', '2021-03-31 13:33:26'),
(8, 'Lollypop', 'Ok..its fine....I love dat', 'Honrable Capable', 'read', '2021-03-31 03:10:33', '2021-03-31 19:25:22'),
(9, 'Lollypop', 'Ok..its fine....I love dat', 'Honrable Capable', 'read', '2021-03-31 03:10:35', '2021-03-31 19:25:22'),
(10, 'Honrable Capable', 'We hope to see u coming home', 'Lollypop', 'read', '2021-03-31 03:11:12', '2021-03-31 13:33:26'),
(11, 'Lollypop', 'Smile...', 'Honrable Capable', 'read', '2021-03-31 03:11:41', '2021-03-31 19:25:22'),
(12, 'Honrable Capable', 'Yes now', 'Lollypop', 'read', '2021-03-31 03:12:14', '2021-03-31 13:33:26'),
(13, 'Lollypop', 'Ok ...no problem..I will try to b coming home', 'Honrable Capable', 'read', '2021-03-31 03:13:08', '2021-03-31 19:25:22'),
(14, 'Honrable Capable', 'Don\'t let me forget, if u know anyone want a stunning website,, I\'m in charge o', 'Lollypop', 'read', '2021-03-31 03:14:07', '2021-03-31 13:33:26'),
(15, 'Lollypop', 'Ok', 'Honrable Capable', 'read', '2021-03-31 03:14:52', '2021-03-31 19:25:22'),
(16, 'Honrable Capable', 'Just shikini momey', 'Lollypop', 'read', '2021-03-31 03:14:52', '2021-03-31 13:33:26'),
(17, 'Lollypop', 'K.........', 'Honrable Capable', 'read', '2021-03-31 03:15:07', '2021-03-31 19:25:22'),
(18, 'Honrable Capable', 'Money i meant', 'Lollypop', 'read', '2021-03-31 03:15:17', '2021-03-31 13:33:26'),
(19, 'Lollypop', 'I understand u', 'Honrable Capable', 'read', '2021-03-31 03:16:00', '2021-03-31 19:25:22'),
(20, 'Honrable Capable', 'So at least I\'m with u tonight', 'Lollypop', 'read', '2021-03-31 03:16:59', '2021-03-31 13:33:26'),
(21, 'Lollypop', 'Good morning', 'Honrable Capable', 'read', '2021-03-31 13:33:25', '2021-03-31 19:25:22'),
(22, 'Honrable Capable', 'Sweetheart', 'Lollypop', 'unread', '2021-03-31 19:25:21', '2021-03-31 19:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_02_25_023240_create_admin_accounts_table', 1),
(2, '2021_02_25_023820_create_user_accounts_table', 1),
(3, '2021_02_25_030615_create_posts_table', 1),
(4, '2021_02_25_043651_create_admin_posts_table', 2),
(5, '2021_02_27_104821_create_compounds_table', 3),
(6, '2021_03_01_054405_create_compounds_table', 4),
(7, '2020_04_04_000000_create_user_follower_table', 5),
(8, '2021_03_04_040453_create_sports_table', 5),
(9, '2021_03_04_061014_create_miss_asus_table', 6),
(10, '2021_03_07_102712_create_national_presidents_table', 7),
(11, '2021_03_07_102852_create_chapter_presidents_table', 7),
(12, '2021_03_07_103500_create_chapter_presidents_table', 8),
(13, '2021_03_07_202725_create_national_presidents_table', 9),
(14, '2021_03_08_091403_create_admin_iboxes_table', 10),
(15, '2021_03_10_043559_create_likes_table', 11),
(16, '2021_03_16_044713_create_national_executives_table', 11),
(17, '2021_03_18_054513_create_comments_table', 12),
(18, '2021_03_19_220044_create_messages_table', 13),
(19, '2021_03_23_061329_create_admin_posts_table', 14),
(20, '2021_03_23_205345_create_admin_likes_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `miss_asus`
--

CREATE TABLE `miss_asus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discepline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `national_executives`
--

CREATE TABLE `national_executives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discepline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `national_executives`
--

INSERT INTO `national_executives` (`id`, `full_name`, `compound`, `gender`, `discepline`, `institution`, `date_of_birth`, `year_of_tenure_from`, `year_of_tenure_to`, `post`, `history`, `phone`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Babalola Kehinde James', 'ILE-ALA', 'Male', 'Mass communication', 'Kwara State University Malete  Kwara', '1997-05-05', '2021-01-01', '2022-01-01', 'PRESIDENT', 'na', '0', NULL, '2021-03-31 06:42:31', '2021-03-31 06:42:31'),
(2, 'Adebayo Blessing', 'IMOJO', 'Female', 'na', 'Kwara State polytechnic', '2021-03-31', '2021-01-01', '2022-12-31', 'VICE PRESIDENT', 'NA', '0', NULL, '2021-03-31 06:50:45', '2021-03-31 06:50:45'),
(3, 'Omotosho Justina Dupe', 'IMONBA', 'Female', 'Mass communication', 'Kwara State polytechnic', '2021-03-31', '2021-01-01', '2022-12-31', 'GENERAL SECRETARY', 'NA', '0', NULL, '2021-03-31 06:54:40', '2021-03-31 06:54:40');

-- --------------------------------------------------------

--
-- Table structure for table `national_presidents`
--

CREATE TABLE `national_presidents` (
  `id` bigint(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discepline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `userId` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posting` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ImageCaption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VideoCaption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `userId`, `username`, `posting`, `image`, `ImageCaption`, `video`, `VideoCaption`, `created_at`, `updated_at`) VALUES
(1, '1', 'Honrable Capable', '<p>Greate Asu!!!!!!!!!!!!!!</p>', NULL, NULL, NULL, NULL, '2021-03-27 20:24:22', '2021-03-27 20:24:22'),
(12, '1', 'Honrable Capable', NULL, 'public/ImagePost/1617051006.jpg', 'We move!!!!!!!!', NULL, NULL, '2021-03-30 02:50:06', '2021-03-30 02:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` bigint(20) NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compound` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discepline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_of_tenure_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `id` bigint(40) NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `compound` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_residence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stakeholder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenure_year_from` date DEFAULT NULL,
  `tenure_year_to` date DEFAULT NULL,
  `post_held` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `is_online` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`id`, `id_number`, `fullname`, `username`, `email`, `date_of_birth`, `compound`, `institution`, `place_of_residence`, `marital_status`, `security_question`, `answers`, `phone`, `gender`, `password`, `picture`, `stakeholder`, `guest`, `category`, `tenure_year_from`, `tenure_year_to`, `post_held`, `address`, `status`, `is_online`, `created_at`, `updated_at`) VALUES
(1, 'ASU1616646052@40', 'COMR. DADA ABDULRASAQ OLAWALE', 'Honrable Capable', 'jrasaq77@gmail.com', '1990-10-05', 'IMOJO', 'Kwara State polytechnic', 'Ilorin', 'Single', 'What is your mother\'s name', 'RAFAT DADA', '08162291993', 'Male', '$2y$10$zH3Akvejg/f0sL.4tDOmJOUNKNRYYz/w.jZPT4.gj5F35l15XhMxS', 'public/images/1616962723_IMG-20210325-WA0023.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, '2021-03-25 16:22:38', '2021-03-31 19:24:06'),
(2, 'ASU1616934492@40', 'Tiamiyu olorunfemi abraham', 'fizzybrown', 'tiamiyufemiabraham@gmail.com', '2000-04-01', 'EBIOHUN', 'University of Ilorin', 'ilorin', 'Single', 'What is your favorite food', 'yam', '08100626449', 'Male', '$2y$10$RSZGYmN5YyamwWxqbceSGuQLwjrQunBUd0emXD9Fl.1IXlgkbV.Rm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, '2021-03-28 18:31:03', '2021-03-28 18:31:03'),
(3, 'ASU1616886564@40', 'Babalola kehinde James', 'admin55', 'kbabs05@yahoo.com', '2021-05-05', 'ILE-ALA', 'University of Ilorin', 'Lagos', 'Can\'t Say', 'What is your favorite food', 'Plantain', '8134522741', 'Male', '$2y$10$EZWWyQDmQj8KgvOxjH0cX.B2FrKjG.s2MXnl0TfFMxQM1NAkxlWsu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, '2021-03-28 05:13:18', '2021-03-30 20:12:36'),
(4, 'ASU1617120649@40', 'BANKOLE MICHAEL ABIDEMI', 'Banky bee', 'bankoleabidemimichael@gmail.com', '1995-02-21', 'IMOJA', 'Kwara State polytechnic', 'Ilorin', 'Single', 'What is your favorite food', 'Pounded yam', '08107457427', 'Male', '$2y$10$FnAqxwydI2I4Y2hogohwZOOReA4RoYKp6Fltx8S3nJ8L2p7ymnkhK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, '2021-03-30 22:15:33', '2021-03-30 22:18:24'),
(5, 'ASU1617133430@40', 'Atolagbe Omolola Elizabeth', 'Lollypop', 'lizzymercy019@ g-mail.com', '1995-09-01', 'ILE-ALA', 'Kwara State polytechnic', 'Ado Ekiti', 'Married', 'What is your favorite food', 'Pounded yam', '09132685199', 'Female', '$2y$10$aP3H2cvDodXXdXp3Xm2FPeEKdnL449YtnVSFH7x6p4oGO36p2Uhze', 'public/images/1617138550_IMG_20210314_141801_650.JPG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 0, '2021-03-31 01:51:36', '2021-03-31 13:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_follower`
--

CREATE TABLE `user_follower` (
  `id` int(10) UNSIGNED NOT NULL,
  `following_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_iboxes`
--
ALTER TABLE `admin_iboxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_likes`
--
ALTER TABLE `admin_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_posts`
--
ALTER TABLE `admin_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sent_mails`
--
ALTER TABLE `admin_sent_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapter_presidents`
--
ALTER TABLE `chapter_presidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compounds`
--
ALTER TABLE `compounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listofallschools`
--
ALTER TABLE `listofallschools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miss_asus`
--
ALTER TABLE `miss_asus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_executives`
--
ALTER TABLE `national_executives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `national_presidents`
--
ALTER TABLE `national_presidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_accounts_username_unique` (`username`),
  ADD UNIQUE KEY `user_accounts_email_unique` (`email`);

--
-- Indexes for table `user_follower`
--
ALTER TABLE `user_follower`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_follower_following_id_index` (`following_id`),
  ADD KEY `user_follower_follower_id_index` (`follower_id`),
  ADD KEY `user_follower_accepted_at_index` (`accepted_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_iboxes`
--
ALTER TABLE `admin_iboxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_likes`
--
ALTER TABLE `admin_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_posts`
--
ALTER TABLE `admin_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_sent_mails`
--
ALTER TABLE `admin_sent_mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chapter_presidents`
--
ALTER TABLE `chapter_presidents`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `compounds`
--
ALTER TABLE `compounds`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `listofallschools`
--
ALTER TABLE `listofallschools`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `miss_asus`
--
ALTER TABLE `miss_asus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `national_executives`
--
ALTER TABLE `national_executives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `national_presidents`
--
ALTER TABLE `national_presidents`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_accounts`
--
ALTER TABLE `user_accounts`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_follower`
--
ALTER TABLE `user_follower`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
