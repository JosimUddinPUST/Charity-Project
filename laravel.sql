-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2025 at 07:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2024-08-01 15:29:59', '$2y$10$LuPWeedpOPoJQUVZmNBPyejiuzLTC262NhUDjewkBkgU7gH1wTiuq', '1725017241.jpg', NULL, '2024-08-29 09:29:53', '2024-08-30 05:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `causes`
--

CREATE TABLE `causes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `featured_photo` varchar(255) NOT NULL,
  `goal` int(11) NOT NULL,
  `raised` int(11) DEFAULT NULL,
  `is_featured` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cause_donations`
--

CREATE TABLE `cause_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cause_faqs`
--

CREATE TABLE `cause_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cause_photos`
--

CREATE TABLE `cause_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cause_videos`
--

CREATE TABLE `cause_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_id` int(11) NOT NULL,
  `youtube_video_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `name`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'd', 2, 'd', 'd', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `counter1_number` varchar(255) NOT NULL,
  `counter1_name` varchar(255) NOT NULL,
  `counter2_number` varchar(255) NOT NULL,
  `counter2_name` varchar(255) NOT NULL,
  `counter3_number` varchar(255) NOT NULL,
  `counter3_name` varchar(255) NOT NULL,
  `counter4_number` varchar(255) NOT NULL,
  `counter4_name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `counter1_number`, `counter1_name`, `counter2_number`, `counter2_name`, `counter3_number`, `counter3_name`, `counter4_number`, `counter4_name`, `status`, `created_at`, `updated_at`) VALUES
(1, '1120', 'Donations', '300', 'Volunteers', '130', 'Projects', '160', 'Events Organized', 'show', NULL, '2024-08-29 10:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `featured_photo` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `map` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total_seat` int(11) DEFAULT NULL,
  `booked_seat` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `slug`, `short_description`, `description`, `featured_photo`, `date`, `time`, `location`, `map`, `price`, `total_seat`, `booked_seat`, `created_at`, `updated_at`) VALUES
(1, 'Abled Child Cancer', 'abled-child-cancer', 'To provide food, shelter, clothing, education and medical assistance to homeless children and their families.', '<p style=\"text-align: justify;\">The pain itself should be taken care of, no one feels that I shall appoint these, or shall I refuse them, the consequence of the pains to which. As for the ninth part of it, but for the eleifends, others from the top of the name. Let the attacks be carried out by the corporal, but it is better for the patriot\'s opinion, but he cannot attack it. But the better of the ancestors, the one or the other, never. For the benefit of football was pursued. I have chosen them for you and for discussing them, I have shown him my Euripides, the force of propaganda will judge them.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">We read it in the same way as choosing a honey and honey. I have this practice in the offices, that he should understand that you were defining pleasures, nor, with these, pleasure is usually a mistake. Nor was it seen in the labor of seeking. I fear them from here, lest, first dignissim\'s opinion is perceived, no, soft honey governs the rest</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">With all the top vulputate, I refuse to be ignored by ex. Whether it\'s easy to use or easy to use, the power of the game is proven to be ready. May the book be brought to him, may it not be easy by virtue. That\'s right, I say. They think that you are an easy animal.</p>', 'event_1724948107.jpg', '2024-09-01', '14:45', '937 Jamajo Blvd, Orlando FL 32803, USA', NULL, 10, 20, 9, '2023-12-20 14:04:49', '2024-08-30 06:14:15'),
(2, 'Contribute for Recovery', 'Contribute-for-Recovery', 'To help the mothers who are homeless & helpless, we provide them food, shelter & medical assistance.', '<p style=\"text-align: justify;\">The pain itself should be taken care of, no one feels that I shall appoint these, or shall I refuse them, the consequence of the pains to which. As for the ninth part of it, but for the eleifends, others from the top of the name. Let the attacks be carried out by the corporal, but it is better for the patriot\'s opinion, but he cannot attack it. But the better of the ancestors, the one or the other, never. For the benefit of football was pursued. I have chosen them for you and for discussing them, I have shown him my Euripides, the force of propaganda will judge them.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">We read it in the same way as choosing a honey and honey. I have this practice in the offices, that he should understand that you were defining pleasures, nor, with these, pleasure is usually a mistake. Nor was it seen in the labor of seeking. I fear them from here, lest, first dignissim\'s opinion is perceived, no, soft honey governs the rest</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">With all the top vulputate, I refuse to be ignored by ex. Whether it\'s easy to use or easy to use, the power of the game is proven to be ready. May the book be brought to him, may it not be easy by virtue. That\'s right, I say. They think that you are an easy animal.</p>', 'event_1724948146.jpg', '2024-08-31', '09:00', '937 Jamajo Blvd, Orlando FL 32803, USA', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3629.2542091435403!2d-97.90512175238419!3d38.06450160184029!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited%20States!5e0!3m2!1sen!2sbd!4v1671347381733!5m2!1sen!2sbd', 19, 20, 3, '2023-12-22 13:32:44', '2024-08-29 22:27:37'),
(4, 'Playing For World', 'Playing-For-World', 'To provide food, shelter, clothing, education and medical assistance to homeless children and their families.', '<p style=\"text-align: justify;\">The pain itself should be taken care of, no one feels that I shall appoint these, or shall I refuse them, the consequence of the pains to which. As for the ninth part of it, but for the eleifends, others from the top of the name. Let the attacks be carried out by the corporal, but it is better for the patriot\'s opinion, but he cannot attack it. But the better of the ancestors, the one or the other, never. For the benefit of football was pursued. I have chosen them for you and for discussing them, I have shown him my Euripides, the force of propaganda will judge them.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">We read it in the same way as choosing a honey and honey. I have this practice in the offices, that he should understand that you were defining pleasures, nor, with these, pleasure is usually a mistake. Nor was it seen in the labor of seeking. I fear them from here, lest, first dignissim\'s opinion is perceived, no, soft honey governs the rest</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">With all the top vulputate, I refuse to be ignored by ex. Whether it\'s easy to use or easy to use, the power of the game is proven to be ready. May the book be brought to him, may it not be easy by virtue. That\'s right, I say. They think that you are an easy animal.</p>', 'event_1724948175.jpg', '2024-09-08', '07:00', '937 Jamajo Blvd, Orlando FL 32803, USA', NULL, 0, 34, 12, '2023-12-22 13:39:24', '2024-08-30 06:29:24'),
(5, 'Attaining in a Special Ceremony', 'Attaining-Special-Ceremony', 'To provide food, shelter, clothing, education and medical assistance to homeless children and their families.', '<p style=\"text-align: justify;\">The pain itself should be taken care of, no one feels that I shall appoint these, or shall I refuse them, the consequence of the pains to which. As for the ninth part of it, but for the eleifends, others from the top of the name. Let the attacks be carried out by the corporal, but it is better for the patriot\'s opinion, but he cannot attack it. But the better of the ancestors, the one or the other, never. For the benefit of football was pursued. I have chosen them for you and for discussing them, I have shown him my Euripides, the force of propaganda will judge them.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">We read it in the same way as choosing a honey and honey. I have this practice in the offices, that he should understand that you were defining pleasures, nor, with these, pleasure is usually a mistake. Nor was it seen in the labor of seeking. I fear them from here, lest, first dignissim\'s opinion is perceived, no, soft honey governs the rest</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<p style=\"text-align: justify;\">With all the top vulputate, I refuse to be ignored by ex. Whether it\'s easy to use or easy to use, the power of the game is proven to be ready. May the book be brought to him, may it not be easy by virtue. That\'s right, I say. They think that you are an easy animal.</p>', 'event_1724948206.jpg', '2024-09-06', '11:00', '937 Jamajo Blvd, Orlando FL 32803, USA', NULL, 100, 5, 3, '2023-12-22 13:41:28', '2024-08-30 06:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `event_photos`
--

CREATE TABLE `event_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_photos`
--

INSERT INTO `event_photos` (`id`, `event_id`, `photo`, `created_at`, `updated_at`) VALUES
(13, 1, 'event_photo_1724948255.jpg', '2024-08-29 10:17:35', '2024-08-29 10:17:35'),
(14, 1, 'event_photo_1724948260.jpg', '2024-08-29 10:17:40', '2024-08-29 10:17:40'),
(15, 1, 'event_photo_1724948266.jpg', '2024-08-29 10:17:46', '2024-08-29 10:17:46'),
(16, 2, 'event_photo_1724948287.jpg', '2024-08-29 10:18:07', '2024-08-29 10:18:07'),
(17, 2, 'event_photo_1724948313.jpg', '2024-08-29 10:18:33', '2024-08-29 10:18:33'),
(18, 4, 'event_photo_1724948322.jpg', '2024-08-29 10:18:42', '2024-08-29 10:18:42'),
(19, 4, 'event_photo_1724948336.jpg', '2024-08-29 10:18:56', '2024-08-29 10:18:56'),
(20, 5, 'event_photo_1724948351.jpg', '2024-08-29 10:19:11', '2024-08-29 10:19:11'),
(21, 5, 'event_photo_1724948372.jpg', '2024-08-29 10:19:32', '2024-08-29 10:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `event_tickets`
--

CREATE TABLE `event_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `number_of_tickets` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `currency` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_videos`
--

CREATE TABLE `event_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_videos`
--

INSERT INTO `event_videos` (`id`, `event_id`, `video`, `created_at`, `updated_at`) VALUES
(1, 1, 'EGh1wY4CJl0', '2023-12-22 14:26:38', '2023-12-22 14:26:38'),
(2, 1, 'ruZ9HgozGUU', '2023-12-22 14:27:37', '2023-12-22 14:27:37'),
(3, 1, '5_kfZ7yEnPU', '2023-12-22 14:27:46', '2023-12-22 14:27:46'),
(4, 2, 'mPRXhNFPgwo', '2023-12-22 14:28:31', '2023-12-22 14:28:31'),
(5, 2, 'fxnd3O4YC6k', '2023-12-22 14:28:50', '2023-12-22 14:28:50'),
(6, 2, 'RQu7jpcNUWI', '2023-12-22 14:28:55', '2023-12-22 14:28:55'),
(7, 4, 'E1xkXZs0cAQ', '2023-12-22 14:29:25', '2023-12-22 14:29:25'),
(8, 4, 'eA_Xq7HGWos', '2023-12-22 14:29:36', '2023-12-22 14:29:36'),
(9, 4, 'nEFCxs7SZsM', '2023-12-22 14:29:42', '2023-12-22 14:29:42'),
(10, 5, 'bdBG5VO01e0', '2023-12-22 14:30:19', '2023-12-22 14:30:19'),
(11, 5, 'aYVsy1pv-mo', '2023-12-22 14:30:26', '2023-12-22 14:30:26'),
(12, 5, 'xHegpKx61eE', '2023-12-22 14:30:33', '2023-12-22 14:30:33'),
(13, 1, 'FIIWfOjJ3Ig', '2024-08-29 10:33:34', '2024-08-29 10:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'What is your charity\'s mission and focus?', 'Our charity\'s mission is to make a positive impact in the lives of those in need. We focus on providing support in areas such as education, healthcare, disaster relief, and addressing hunger and homelessness. We also raise awareness about critical social and environmental issues.', '2023-12-18 13:28:50', '2023-12-18 13:28:50'),
(2, 'How can I make a donation to support your charity?', 'Making a donation to support our charity is easy and greatly appreciated. You can donate online through our secure website by clicking on the \"Donate Now\" button. We also accept donations through various other methods, such as bank transfers, checks, or in-kind contributions. Visit our \"Donate\" page for more details on the various donation options.', '2023-12-18 13:29:17', '2023-12-18 13:29:17'),
(3, 'Is my donation tax-deductible, and will I receive a receipt for tax purposes?', 'Yes, your donation is tax-deductible to the extent allowed by law. After making a donation, you will receive a receipt via email or mail, depending on your preference. This receipt will contain all the necessary information you need for tax purposes, including our charity\'s tax ID number.', '2023-12-18 13:29:31', '2023-12-18 13:29:31'),
(4, 'How can I get involved as a volunteer or participate in your charity\'s programs?', 'We welcome volunteers and individuals interested in participating in our programs. To get involved, please visit our \"Volunteer Opportunities\" page for information on upcoming events, projects, and how to apply. You can also sign up for our newsletter to stay informed about volunteer opportunities and programs.', '2023-12-18 13:29:44', '2023-12-18 13:29:44'),
(5, 'Can I designate my donation to a specific program or project within your charity?', 'Yes, you can often designate your donation to a specific program, project, or cause that aligns with your passion and interests. During the donation process, you will have the option to specify where you\'d like your contribution to be directed. If you have questions about specific designations, please contact our support team for further assistance.', '2023-12-18 13:29:59', '2023-12-18 13:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `icon`, `heading`, `text`, `created_at`, `updated_at`) VALUES
(1, 'fas fa-briefcase', 'Become a Volunteer', 'In order to become a volunteer, you need to fill out the form and send us. We will review your form and contact you.', '2023-12-17 13:36:20', '2023-12-17 14:21:07'),
(2, 'fas fa-search', 'Foundation & Events', 'We organize many events for fund raising. You can also organize events and help us to raise fund for the poor people.', '2023-12-17 13:37:35', '2023-12-17 13:37:35'),
(3, 'fas fa-share-alt', 'Make a Donation', 'You can also donate us. We will use your donation to help the poor people. You can donate us by PayPal or Stripe.', '2023-12-17 13:37:59', '2023-12-17 13:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `feature_section_items`
--

CREATE TABLE `feature_section_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_section_items`
--

INSERT INTO `feature_section_items` (`id`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'feature_1724947060.jpg', 'show', NULL, '2024-08-29 09:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `home_page_items`
--

CREATE TABLE `home_page_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cause_heading` varchar(255) DEFAULT NULL,
  `cause_subheading` varchar(255) DEFAULT NULL,
  `cause_status` varchar(255) NOT NULL,
  `feature_background` varchar(255) NOT NULL,
  `feature_status` varchar(255) NOT NULL,
  `event_heading` varchar(255) DEFAULT NULL,
  `event_subheading` varchar(255) DEFAULT NULL,
  `event_status` varchar(255) NOT NULL,
  `testimonial_heading` varchar(255) DEFAULT NULL,
  `tesstimonial_background` varchar(255) NOT NULL,
  `testimonial_status` varchar(255) NOT NULL,
  `blog_heading` varchar(255) DEFAULT NULL,
  `blog_subheading` varchar(255) DEFAULT NULL,
  `blog_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_25_025642_create_admins_table', 1),
(6, '2024_08_12_102450_create_sliders_table', 1),
(7, '2024_08_16_051021_create_specials_table', 1),
(8, '2024_08_17_113635_create_features_table', 1),
(9, '2024_08_19_020139_create_feature_section_items_table', 1),
(10, '2024_08_19_114147_create_testimonials_table', 1),
(11, '2024_08_20_102241_create_testimonial_section_items_table', 1),
(12, '2024_08_20_120018_create_counters_table', 1),
(13, '2024_08_21_121816_create_faqs_table', 1),
(14, '2024_08_22_135313_create_volunteers_table', 1),
(15, '2024_08_24_053717_create_photo_categories_table', 1),
(16, '2024_08_24_163228_create_photos_table', 1),
(17, '2024_08_26_100703_create_video_categories_table', 1),
(18, '2024_08_26_104046_create_videos_table', 1),
(19, '2024_08_28_014021_create_post_categories_table', 1),
(20, '2024_08_28_101341_create_posts_table', 1),
(21, '2024_08_29_005310_create_comments_table', 1),
(22, '2024_08_29_005731_create_replies_table', 1),
(23, '2024_08_29_054201_create_events_table', 1),
(24, '2024_08_29_092331_create_event_photos_table', 1),
(25, '2024_08_29_114216_create_event_videos_table', 1),
(28, '2024_08_30_133514_create_causes_table', 4),
(29, '2024_08_30_135006_create_cause_photos_table', 4),
(30, '2024_08_30_135127_create_cause_donations_table', 4),
(31, '2024_08_30_135305_create_cause_faqs_table', 4),
(32, '2024_08_30_135357_create_cause_videos_table', 4),
(33, '2024_08_30_170054_create_home_page_items_table', 4),
(34, '2024_08_30_114616_create_event_tickets_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo_category_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `photo_category_id`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'photo_1724947831.jpg', '2023-12-18 22:10:13', '2024-08-29 10:10:31'),
(2, 2, 'photo_1724947839.jpg', '2023-12-18 22:28:35', '2024-08-29 10:10:39'),
(3, 2, 'photo_1724947846.jpg', '2023-12-19 02:38:05', '2024-08-29 10:10:46'),
(4, 1, 'photo_1724947863.jpg', '2023-12-19 02:39:13', '2024-08-29 10:11:03'),
(5, 1, 'photo_1724947875.jpg', '2023-12-19 02:39:27', '2024-08-29 10:11:15'),
(6, 1, 'photo_1724947884.jpg', '2023-12-19 02:39:34', '2024-08-29 10:11:24'),
(7, 2, 'photo_1724947895.jpg', '2023-12-19 02:39:50', '2024-08-29 10:11:35'),
(8, 2, 'photo_1724947911.jpg', '2023-12-19 02:40:02', '2024-08-29 10:11:51'),
(12, 1, 'photo_1724947921.jpg', '2023-12-19 03:06:21', '2024-08-29 10:12:01'),
(13, 1, 'photo_1724947930.jpg', '2023-12-19 03:06:49', '2024-08-29 10:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `photo_categories`
--

CREATE TABLE `photo_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo_categories`
--

INSERT INTO `photo_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'University Event', '2023-12-18 21:02:29', '2023-12-18 21:02:29'),
(2, 'School Event', '2023-12-18 21:02:49', '2023-12-18 21:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `tags` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Donation', 'donation', '2023-12-19 13:16:54', '2023-12-19 21:43:27'),
(2, 'Charity', 'charity', '2023-12-19 13:17:03', '2023-12-19 21:43:31'),
(3, 'Education', 'education', '2023-12-19 13:17:07', '2023-12-19 21:44:24'),
(4, 'Health', 'health', '2023-12-19 13:17:15', '2023-12-19 21:44:31'),
(5, 'Fundraising', 'fundraising', '2023-12-19 13:17:23', '2023-12-19 21:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `comment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `text`, `photo`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Help the Child in need', '<p>We should support kids who are having a tough time. It\'s about being kind and giving a hand to children facing problems like being poor, sick, or in trouble. When we help, we show them that they\'re not alone and that things can get better.</p>\r\n<p>&nbsp;</p>', '1724946834.jpg', 'Read More', '#', '2023-10-29 20:56:01', '2024-08-29 09:53:54'),
(2, 'Fight for right causes', '<p>We work hard to support and raise awareness for important issues that need attention and action. Our goal is to make the world a better place by advocating for justice, equality, and positive change. Your support and involvement can help a lot.</p>\r\n<p>&nbsp;</p>', '1724946849.jpg', 'Read More', '#', '2023-10-29 20:57:39', '2024-08-29 09:54:09');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) NOT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `text` text NOT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `video_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `heading`, `sub_heading`, `text`, `button_text`, `button_link`, `photo`, `video_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'What We Do', 'Our Mission', '<p style=\"text-align: justify;\">At our charity, we are committed to making a positive impact in the lives of those in need. We provide vital support in areas such as education, healthcare, disaster relief, and addressing hunger and homelessness. We collaborate with local partners and volunteers to directly help individuals and families.</p>\r\n<p style=\"text-align: justify;\">We also focus on raising awareness about critical social and environmental issues. Our efforts include campaigns, events, and partnerships with like-minded organizations to promote awareness and advocate for change. Join us in making the world a better place through fundraising, volunteering, or simply spreading the word. Together, we can be a force for good and contribute to a more compassionate and equitable society.</p>', 'Read More', '#', '1724946887.jpg', 'u7-lpyuo5ck', 'show', NULL, '2024-08-29 09:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `photo`, `name`, `designation`, `comment`, `created_at`, `updated_at`) VALUES
(1, 'testimonial_1724947338.jpg', 'Robert Krol', 'CEO, ABC Company', 'Volunteering with this charity has been a transformative experience. Their unwavering dedication to helping those in need is truly inspiring. I\'m proud to be part of their mission, witnessing the remarkable impact they make. I\'m grateful for the opportunity to contribute to their efforts.', '2023-12-17 21:35:53', '2024-08-29 10:02:18'),
(2, 'testimonial_1724947279.png', 'Patrick Henderson', 'Director, AHN Company', 'As a long-time donor, I\'m consistently impressed by this charity\'s transparency and life-changing impact. They provide real support to those in need, making a meaningful difference in various communities. I\'m proud to be a part of their mission and will continue to support their efforts.', '2023-12-17 21:36:58', '2024-08-29 10:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_section_items`
--

CREATE TABLE `testimonial_section_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_section_items`
--

INSERT INTO `testimonial_section_items` (`id`, `heading`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Our Happy Clients', 'testimonial_1724947228.jpg', 'show', NULL, '2024-08-29 10:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User1', 'user1@gmail.com', '2023-10-29 18:41:37', '$2y$10$H9KVl4KBdxd7PCrz4h2HbeBMYilQuHdX97.MmJjE8dqymonKbjSB.', '1725013982.jpg', NULL, '2023-10-29 18:38:16', '2024-08-30 04:33:02'),
(2, 'Milton E. Fessler', 'milton@gmail.com', '2023-12-31 14:59:01', '$2y$10$6jlHeeKOKFEqmO14R35KBuVL/zTANQxPKVLQEnPFed5b8K6Ntp5si', NULL, NULL, '2023-12-31 14:58:50', '2023-12-31 14:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_category_id` int(11) NOT NULL,
  `youtube_video_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_category_id`, `youtube_video_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'FIIWfOjJ3Ig', '2023-12-19 05:48:23', '2023-12-19 05:48:23'),
(2, 1, 'uemObN8_dcw', '2023-12-19 05:50:49', '2023-12-19 05:50:49'),
(3, 1, 'bfAzi6D5FpM', '2023-12-19 05:50:58', '2023-12-19 05:50:58'),
(4, 1, 'CE3LLDKXkz4', '2023-12-19 05:51:08', '2023-12-19 05:51:08'),
(5, 2, 'voF1plqqZJA', '2023-12-19 05:51:23', '2023-12-19 05:51:23'),
(6, 2, 'ky5vlOgfnQ8', '2023-12-19 05:51:35', '2023-12-19 05:51:35'),
(7, 2, 'BOJWRINtueQ', '2023-12-19 05:51:47', '2023-12-19 05:51:47'),
(8, 2, '9sPAkS7cHHw', '2023-12-19 05:51:56', '2023-12-19 05:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `video_categories`
--

CREATE TABLE `video_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_categories`
--

INSERT INTO `video_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Charity Event on University', '2023-12-19 03:27:35', '2023-12-19 03:27:35'),
(2, 'Charity Event on School', '2023-12-19 03:27:47', '2023-12-19 03:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`id`, `name`, `profession`, `photo`, `facebook`, `twitter`, `linkedin`, `instagram`, `address`, `email`, `phone`, `website`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Md. Josim Uddin', 'Student of PUST', 'volunteer_1724947479.png', 'https://www.facebook.com/Josim.CSE.PUST', 'https://www.twitter.com/in/josimcsepust/', 'https://www.linkedin.com/in/josimcsepust/', 'https://www.instagram.com/in/josimcsepust/', '932 Pine Tree Lane, Chevy Chase, MD 20815', 'patflynn@gmail.com', '111-222-3333', 'https://www.example.com', '<p style=\"text-align: justify;\">Passionate about making a difference in the world, Pat Flynn is a dedicated volunteer with a heart for animal welfare and environmental conservation. Born on January 15, 2000, in the vibrant city of Chevy Chase, Pat\'s journey into the world of volunteering began with his love for animals and his desire to protect our planet. With a background in marketing and social media management, Pat has leveraged his skills to amplify the voices of the organizations and causes she cares deeply about. She holds a Bachelor\'s degree in Marketing and has worked as a Marketing Coordinator at XYZ Company, where she honed his expertise in brand promotion. During 2021-2022, Pat devoted his weekends to volunteer work at a local animal shelter, providing care and support to shelter animals in need. His dedication, empathy, and relentless spirit for animal welfare left a lasting impact on the shelter and the furry friends she cared for. Pat is fluent in both English and Spanish, making his a versatile communicator with a wide range of potential collaborators. She has also undergone a background check, ensuring that she is a reliable and trustworthy addition to any volunteer team. In addition to his commitment to animals, Pat is a strong advocate for environmental conservation. his motivation to volunteer comes from his belief that every small effort counts in the grand scheme of protecting our environment and its inhabitants. With his own car and a willingness to travel within a 20-mile radius, Pat is ready to embark on his next volunteer adventure. You can connect with Pat through his LinkedIn profile to learn more about his professional background and achievements. Pat Smith is not just a volunteer; she\'s a passionate changemaker, driven to create a better world for all living creatures.</p>', '2023-12-18 18:06:04', '2024-08-29 10:09:12'),
(2, 'David Beckham', 'Volunteer', 'volunteer_1724947554.jpg', '#', '#', '#', '#', '932 Pine Tree Lane, Chevy Chase, MD 20815', 'david@gmail.com', '111-222-3333', 'www.example.com', '<p style=\"text-align: justify;\">The company should be very smart, to the power of the game wise bureau, and the least of it. Hardly any pain in the words of the opponent in football, but no stories anywhere. These fans a little bit, but to reject their own, it later invests in football. Let the apeirian find the youth no. Some of what you have said seems to be right, from the great selection of my desire. What prompt learning in mine, may all these be done with gentleness. To be the ninth adversary force from, with humor and patriotism but honey. He says he was rescued, they envy the born as he is. Mine would say that it appears from time to time. For he brings praise vulputate. Who takes up football with dignity. Pursued to make honey with, let it be the ninth majesty. For it would not have been usual. I would turn away the eloquence with hatred. The second consulship is perceived by cu, and it must be necessary and not. We work so hard for him, I don\'t even wear anything.</p>', '2023-12-18 18:18:50', '2024-08-29 10:05:54'),
(3, 'Josim', 'Professor', 'volunteer_1724947691.jpg', '#', '#', '#', '#', '932 Pine Tree Lane, Chevy Chase, MD 20815', 'peter@gmail.com', '111-222-3333', 'www.example.com', '<p>The attack of teaching Phaedra as it is, the error and reproaches of my country against him, you want to find at Homer. But I have a laughing albusius, when Theophrastus did not open the courtyard. For the first time, the novel will not be explained, let it be that the case has been delivered. And he often flew right. When he got rid of all the disagreements of football. I will appoint her to the main office, but the other one is hardly for her. That honey should be seen in both debts, and I will conclude it at When you just tell him better stories, he brings you more mucus. It must be a mistake, or a game argument. In them I dance with errors, all at the same time before him. I will determine who is not two, and what is wise. As he brings all the debts wherewith, these debts are hindered by football. He felt one thing and honey, let us send the sea in the menander. In the force of lying obliquely, my truths are softened to him, for I will tell the dangers from the truth.</p>', '2023-12-18 18:19:26', '2024-08-29 10:09:27'),
(4, 'Rakib', 'Volunteer', 'volunteer_1724947724.jpg', '#', '#', '#', '#', '932 Pine Tree Lane, Chevy Chase, MD 20815', 'brent@gmail.com', '111-222-3333', NULL, '<p style=\"text-align: justify;\">Quo ubique graece tacimates in, viderer voluptatum voluptatibus no has. Constituto interpretaris ut nec, eam te possim postulant. Idque eruditi labores quo id. At lucilius consequat constituam vix. Duo oblique urbanitas et, ex eum affert euismod delicatissimi. Ut cum discere verterem reformidans, eu mea hinc aliquam salutatus. Quodsi albucius salutatus cum ea, duo ea option deleniti. Ne eam luptatum neglegentur, ut liber quaestio tractatos pri. Ad his purto recusabo quaestio, ex per agam laboramus, ad mel saperet repudiare. Per idque legere utroque ut, ne ignota eruditi nominavi vis. Te eros porro evertitur nam, id aperiri persius dolorem nec, sed at nostro integre. Recteque voluptatum ad per, possim iuvaret laboramus cu vel.</p>', '2023-12-18 18:20:03', '2024-08-29 10:09:39');

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
-- Indexes for table `causes`
--
ALTER TABLE `causes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_donations`
--
ALTER TABLE `cause_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_faqs`
--
ALTER TABLE `cause_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_photos`
--
ALTER TABLE `cause_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cause_videos`
--
ALTER TABLE `cause_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_photos`
--
ALTER TABLE `event_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_tickets`
--
ALTER TABLE `event_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_videos`
--
ALTER TABLE `event_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_section_items`
--
ALTER TABLE `feature_section_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_page_items`
--
ALTER TABLE `home_page_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo_categories`
--
ALTER TABLE `photo_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_post_category_id_foreign` (`post_category_id`);

--
-- Indexes for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_section_items`
--
ALTER TABLE `testimonial_section_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_categories`
--
ALTER TABLE `video_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `causes`
--
ALTER TABLE `causes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cause_donations`
--
ALTER TABLE `cause_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cause_faqs`
--
ALTER TABLE `cause_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cause_photos`
--
ALTER TABLE `cause_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cause_videos`
--
ALTER TABLE `cause_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event_photos`
--
ALTER TABLE `event_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `event_tickets`
--
ALTER TABLE `event_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_videos`
--
ALTER TABLE `event_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feature_section_items`
--
ALTER TABLE `feature_section_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_page_items`
--
ALTER TABLE `home_page_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `photo_categories`
--
ALTER TABLE `photo_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_categories`
--
ALTER TABLE `post_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonial_section_items`
--
ALTER TABLE `testimonial_section_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video_categories`
--
ALTER TABLE `video_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
