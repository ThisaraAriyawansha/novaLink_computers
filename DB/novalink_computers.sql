-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 03:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novalink_computers`
--

-- --------------------------------------------------------

--
-- Table structure for table `ai_conversations`
--

CREATE TABLE `ai_conversations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ai_conversations`
--

INSERT INTO `ai_conversations` (`id`, `session_id`, `title`, `message_count`, `created_at`, `updated_at`) VALUES
(5, 'Kwi1DLi17JgOStLzengH0L6OzeyJf98npt8OW7XE', 'New Conversation', 6, '2025-09-25 07:00:17', '2025-09-25 07:01:02'),
(6, '3gMfiVI6ElL9Bc8YY6apOjPYYlUmZgD9LKzmCPxm', 'New Conversation', 0, '2025-09-25 09:42:02', '2025-09-25 09:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `ai_messages`
--

CREATE TABLE `ai_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conversation_id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('user','assistant','system') NOT NULL,
  `content` text NOT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`metadata`)),
  `tokens_used` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ai_messages`
--

INSERT INTO `ai_messages` (`id`, `conversation_id`, `role`, `content`, `metadata`, `tokens_used`, `created_at`, `updated_at`) VALUES
(66, 5, 'assistant', 'Hello! I\'m your NovaLink AI assistant. How can I help you with PC building today?', NULL, 0, '2025-09-25 07:00:17', '2025-09-25 07:00:17'),
(67, 5, 'user', 'laptop', NULL, 0, '2025-09-25 07:00:24', '2025-09-25 07:00:24'),
(68, 5, 'assistant', 'Here are our available laptops:\n\n• **ASUS VIVOBOOK E1504G** - $120000.00\n• **ASUS TUF GAMING F15** - $255000.00\n• **MSI STEALTH 16 MERCEDES-AMG** - $1225000.00\n\nWhat\'s your intended use and budget?', NULL, 0, '2025-09-25 07:00:27', '2025-09-25 07:00:27'),
(69, 5, 'user', 'i want to update my pc', NULL, 0, '2025-09-25 07:00:54', '2025-09-25 07:00:54'),
(70, 5, 'assistant', 'I\'d be happy to help you with PC building! I can assist with:\n\n• Custom PC builds and recommendations\n• Component compatibility and performance advice\n• Gaming, workstation, and productivity setups\n• Upgrade suggestions and comparisons\n• Technical troubleshooting\n\nWhat specific help do you need today?', NULL, 0, '2025-09-25 07:00:57', '2025-09-25 07:00:57'),
(71, 5, 'user', 'ram', NULL, 0, '2025-09-25 07:01:00', '2025-09-25 07:01:00'),
(72, 5, 'assistant', 'I\'d be happy to help you with PC building! I can assist with:\n\n• Custom PC builds and recommendations\n• Component compatibility and performance advice\n• Gaming, workstation, and productivity setups\n• Upgrade suggestions and comparisons\n• Technical troubleshooting\n\nWhat specific help do you need today?', NULL, 0, '2025-09-25 07:01:02', '2025-09-25 07:01:02'),
(73, 6, 'assistant', 'Hello! I\'m your NovaLink AI assistant. How can I help you with PC building today?', NULL, 0, '2025-09-25 09:42:02', '2025-09-25 09:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `product_id`, `bid_amount`, `customer_id`, `status`, `created_at`, `updated_at`) VALUES
(9, 2, 255000.00, 95, 1, '2025-04-29 09:51:24', '2025-04-29 09:51:24'),
(10, 22, 225000.00, 96, 1, '2025-07-28 08:38:44', '2025-07-28 08:38:44'),
(11, 22, 226000.00, 96, 1, '2025-08-02 10:26:58', '2025-08-02 10:26:58'),
(12, 1, 120000.00, 96, 2, '2025-08-04 08:00:58', '2025-08-06 13:08:02'),
(13, 1, 125000.00, 96, 2, '2025-08-04 08:01:29', '2025-08-06 13:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `bitorders`
--

CREATE TABLE `bitorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `additional_information` text DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `payment_status_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bitorders`
--

INSERT INTO `bitorders` (`id`, `customer_id`, `address_line1`, `address_line2`, `city`, `postal_code`, `additional_information`, `product_id`, `product_name`, `price`, `payment_status_id`, `created_at`, `updated_at`) VALUES
(8, 96, 'aaa', 'aaa', 'aaa', 'aaa', 'dwser', 1, 'ASUS VIVOBOOK E1504G', 125000.00, 1, '2025-08-06 11:36:14', '2025-08-06 11:36:14'),
(9, 96, 'aaa', 'aaa', 'aa', 'aa', 'aaa', 1, 'ASUS VIVOBOOK E1504G', 125000.00, 1, '2025-08-06 12:06:31', '2025-08-06 12:06:31'),
(10, 96, 'aaa', 'aa', 'aa', 'aa', 'aaa', 1, 'ASUS VIVOBOOK E1504G', 125000.00, 1, '2025-08-06 12:57:58', '2025-08-06 12:57:58'),
(11, 96, 'erte', 'rewr', 'wrrwe', 'errw', 'wrerew', 1, 'ASUS VIVOBOOK E1504G', 125000.00, 1, '2025-08-06 13:02:43', '2025-08-06 13:02:43'),
(12, 96, 'jhgjgujydedwed', 'wddwwewe', 'dwedewwd', 'we', 'wee', 1, 'ASUS VIVOBOOK E1504G', 125000.00, 1, '2025-08-06 13:08:02', '2025-08-06 13:08:02');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `image`, `date`, `title`, `description`, `tag`, `created_at`, `updated_at`) VALUES
(1, 'BlogImages/YQZLxc0dm1iiOA3PQ7Vx.webp', '2025-04-24', 'Should You Build or Buy a PC in 2025?', 'Thinking about getting a new PC? This blog compares building a custom PC vs. buying a pre-built one. We cover price, performance, warranty, and what’s best for gamers, students, and professionals.', 'Build vs Buy, Custom PC, PC Buying Guide, Computer Builds, Tech Tips', '2025-04-21 07:57:22', '2025-08-07 05:17:39'),
(2, 'BlogImages/Z05OfKqo9f5BEWv1pkSH.jpeg', '2025-04-16', 'Building the Ultimate Gaming PC: What You Need to Know', 'At NovaLink Computers, we help gamers build the ultimate battle station. From powerful GPUs to RGB-loaded cases, discover the key components and expert tips to assemble a high-performance gaming PC that crushes every frame.', 'Destop', '2025-04-21 08:20:55', '2025-08-02 09:17:39'),
(3, 'BlogImages/pnszYJ5KrmcBSeZfWrOD.jpg', '2025-04-23', 'Top Reasons to Choose NovaLink Computers for Your Tech Needs', 'Looking for the perfect place to upgrade your tech setup? NovaLink Computers offers high-performance desktops, the latest laptops, custom gaming rigs, and expert repair services—all under one roof. Explore our unbeatable prices, knowledgeable staff, and exclusive deals that make us the go-to computer shop for professionals, gamers, and everyday users alike.', 'LapTop', '2025-04-21 08:25:20', '2025-08-02 09:18:17'),
(4, 'BlogImages/dxFm9TMvLhMeWLC4M8pn.jpg', '2025-08-15', 'Why SSD Is Better Than HDD in 2025', 'Still using an old hard disk drive? Find out why SSDs are faster, more reliable, and the best upgrade for your PC or laptop today.', 'SSD, HDD vs SSD, PC Upgrade, Laptop Performance, Storage', '2025-08-07 05:10:00', '2025-08-07 05:10:00'),
(5, 'BlogImages/piN9lDYuqw96IhVAQOBL.jpg', '2025-08-04', 'How to Keep Your Laptop Battery Healthy', 'Many people ruin their laptop batteries without knowing. In this blog, we share easy tips to help you extend battery life, avoid overheating, and keep your device running longer — whether you use it for work, study, or gaming.', 'Laptop Battery, Battery Tips, PC Care, Tech Advice, Navalink', '2025-08-07 05:12:36', '2025-08-07 07:35:13'),
(6, 'BlogImages/y3rhlBfW7ibaBjLChhXt.jpg', '2025-08-08', 'Top Reasons Your PC Is Overheating', 'Is your computer getting hot or shutting down suddenly? This post explains the common causes of overheating and what you can do to fix it. Learn when it’s time to clean the fan or upgrade your cooling system.', 'PC Overheating, Cooling Tips, Computer Repair, Hardware Issues, Tech Help', '2025-08-07 05:14:05', '2025-08-07 05:14:05'),
(7, 'BlogImages/5PaF37UtI2N8ydUmIwTh.jpg', '2025-08-08', 'Best Free Software for Windows in 2025', 'Why pay when you can get powerful software for free? In this article, we list the top free tools for security, editing, browsing, and productivity that work great on Windows 10 and 11.', 'Free Software, Windows Tools, Productivity, Downloads, Navalink Picks', '2025-08-07 05:15:08', '2025-08-07 07:30:58'),
(8, 'BlogImages/NoQr6rRIkf1Zf89OcXGu.jpg', '2025-08-15', 'How Often Should You Service Your Computer?', 'Regular computer servicing helps avoid big problems and keeps things running fast. Find out how often you should clean your PC, check for viruses, and update software — especially if you’re using it daily.', 'Computer Service, PC Maintenance, Tech Tips, Performance, Navalink Care', '2025-08-07 05:16:05', '2025-08-07 05:16:05'),
(9, 'BlogImages/kq22NkgnyBd3Z1Ctc9qK.jpg', '2025-08-21', 'Why You Should Use a UPS for Your Computer', 'Power cuts and voltage drops can seriously damage your computer. This blog explains how a UPS (Uninterruptible Power Supply) protects your system, saves your work, and gives you peace of mind — especially in places with unstable electricity.', 'UPS, Power Protection, Computer Safety, Power Backup, Tech Advice, Navalink Tips', '2025-08-07 07:33:02', '2025-08-07 07:33:02'),
(10, 'BlogImages/jNNzoJdzI8Gs0QzIAKzH.webp', '2025-08-10', 'Top 5 Tips to Boost Your PC Performance in 2025', 'Looking to make your computer run faster and smoother? Check out our top tips to optimize your PC’s performance, from upgrading RAM to cleaning up your system and choosing the right software. Whether you’re a gamer, creator, or casual user, these easy steps can give your PC a noticeable boost...', 'PC Performance, Optimization, Gaming, Hardware Tips, Tech Guide', '2025-08-10 11:55:49', '2025-08-10 13:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(45) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `password`, `fname`, `lname`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(96, 'thisara.a2001@gmail.com', '$2y$10$ErZDlAmZqBEWBheo8GBjeumlpYxRbL4GjELmMc0EeGKVSahqw/rw6', 'Thisara', 'Ariyawansha', '0767788976', 'thisara.a2001@gmail.com', '2025-07-28 07:38:53', '2025-08-06 11:22:16'),
(98, 'Thisara', '$2y$10$T06625ycf8vdHEKTSP77C.Csuxm4r6Pqkbqr5uwG//AzeuKb5NWYK', 'Thisara', 'Ariyawansha', '0768877656', 'thisaraariyawansha2001@gmail.com', '2025-08-05 09:27:16', '2025-08-05 09:27:16');

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
-- Table structure for table `llm_cache`
--

CREATE TABLE `llm_cache` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prompt_hash` varchar(64) NOT NULL,
  `prompt_text` text NOT NULL,
  `response_text` text NOT NULL,
  `context_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`context_data`)),
  `tokens_used` int(11) NOT NULL DEFAULT 0,
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
(5, '2025_01_29_080424_create_agents_table', 2),
(6, '2025_01_30_082217_create_estimators_table', 2),
(7, '2025_01_30_082304_create_draftmens_table', 2),
(8, '2025_02_05_110509_create_agentlistings_table', 2),
(9, '2025_02_05_123232_create_draftmen_new_plans_table', 3),
(10, '2025_02_06_134225_create_draftmen_floors_table', 4),
(11, '2025_02_07_075416_create_draftmen_new_estimates_table', 5),
(12, '2025_02_07_075826_create_draftmen_rooms_table', 5),
(13, '2025_02_07_075851_create_draftmen_bathrooms_table', 5),
(14, '2025_02_07_075930_create_draftmen_living_rooms_table', 5),
(15, '2025_02_07_075955_create_draftmen_kitchens_table', 5),
(16, '2025_02_07_080017_create_draftmen_staircases_table', 5),
(17, '2025_02_10_094939_create_draftmen_rooms_table', 6),
(18, '2025_02_10_095212_create_draftmen_staircases_table', 6),
(19, '2025_02_10_095452_create_draftmen_kitchens_table', 6),
(20, '2025_02_10_095620_create_draftmen_living_rooms_table', 6),
(21, '2025_02_10_095828_create_draftmen_bathrooms_table', 6),
(22, '2025_02_10_111130_create_statuses_table', 7),
(23, '2025_02_11_052657_create_draftmen_new_plans_table', 8),
(24, '2025_02_11_052953_create_draftmen_floors_table', 8),
(25, '2025_02_13_031642_create_tv_types_table', 9),
(26, '2025_02_13_050538_create_listings_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `payment_id`, `qty`, `created_at`, `updated_at`) VALUES
(129, 5, 96, 1, '2025-07-28 07:38:53', '2025-07-28 07:38:53'),
(130, 12, 96, 1, '2025-07-28 07:38:53', '2025-07-28 07:38:53'),
(131, 5, 97, 1, '2025-07-28 08:41:44', '2025-07-28 08:41:44'),
(132, 1, 97, 1, '2025-07-28 08:41:44', '2025-07-28 08:41:44'),
(133, 14, 98, 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(134, 22, 98, 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(135, 4, 98, 3, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(136, 17, 98, 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(137, 14, 99, 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(138, 22, 99, 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(139, 4, 99, 3, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(140, 17, 99, 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(141, 14, 100, 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(142, 22, 100, 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(143, 4, 100, 3, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(144, 17, 100, 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(145, 14, 101, 1, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(146, 22, 101, 1, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(147, 4, 101, 3, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(148, 17, 101, 1, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(155, 14, 105, 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(156, 22, 105, 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(157, 4, 105, 3, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(158, 17, 105, 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(159, 14, 106, 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(160, 22, 106, 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(161, 4, 106, 3, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(162, 17, 106, 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(163, 14, 107, 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(164, 22, 107, 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(165, 4, 107, 3, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(166, 17, 107, 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(167, 14, 108, 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(168, 22, 108, 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(169, 4, 108, 3, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(170, 17, 108, 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(171, 14, 109, 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(172, 22, 109, 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(173, 4, 109, 3, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(174, 17, 109, 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(175, 14, 110, 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(176, 22, 110, 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(177, 4, 110, 3, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(178, 17, 110, 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(179, 14, 111, 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(180, 22, 111, 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(181, 4, 111, 3, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(182, 17, 111, 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(183, 4, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(184, 6, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(185, 17, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(186, 11, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(187, 27, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(188, 14, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(189, 23, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(190, 13, 112, 2, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(191, 25, 112, 2, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(192, 3, 112, 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(193, 4, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(194, 6, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(195, 17, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(196, 11, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(197, 27, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(198, 14, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(199, 23, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(200, 13, 113, 2, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(201, 25, 113, 2, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(202, 3, 113, 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` varchar(50) DEFAULT NULL,
  `payment_status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `customer_id`, `total`, `note`, `address1`, `address2`, `city`, `postal_code`, `payment_status_id`, `created_at`, `updated_at`) VALUES
(96, 96, 194000.00, 'ssdew', 'aaa', 'aaa', 'aaa', '111', 1, '2025-07-28 07:38:53', '2025-07-28 07:38:53'),
(97, 96, 255000.00, 'abc', 'abcde', 'bcde', 'Matara', '81000', 1, '2025-07-28 08:41:44', '2025-07-28 08:41:44'),
(98, 96, 1095000.00, 'jhguyguy', 'abcde', 'sddd', 'sss', 'sss', 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(99, 96, 1095000.00, 'jhguyguy', 'abcde', 'sddd', 'sss', 'sss', 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(100, 96, 1095000.00, 'jhguyguy', 'abcde', 'sddd', 'sss', 'sss', 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(105, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(106, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(107, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(108, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(109, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(110, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(111, 96, 1095000.00, 'fyfyug', 'jhvyjhv', 'hftyfty', 'gyhftyf', 'jhfuyf', 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(112, 96, 2452000.00, 'ABC', '12/12 B', 'Welegoda', 'Matara', '81000', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(113, 96, 2452000.00, 'ABC', '12/12B', 'Welegoda', 'Matara', '81000', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', '2025-02-21 07:54:47', '2025-02-21 07:54:47'),
(2, 'Paid', '2025-02-21 07:55:05', '2025-02-21 07:55:05'),
(3, 'Fail', '2025-02-21 07:55:20', '2025-02-21 07:55:20');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `tags` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `discounted_price` decimal(10,2) DEFAULT NULL,
  `retail_price` decimal(10,2) DEFAULT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `in_stock` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT 0,
  `status_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deal_start` date DEFAULT NULL,
  `deal_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `type`, `tags`, `description`, `discounted_price`, `retail_price`, `warranty`, `in_stock`, `qty`, `status_id`, `image`, `created_at`, `updated_at`, `deal_start`, `deal_end`) VALUES
(1, 'ASUS VIVOBOOK E1504G', 'ASUS', 'LAPTOPS', 'DEAL OF THE DAYS', '<p>Stamp your style on the world with Vivobook 15, the feature-packed laptop that makes it easy to get things done, anywhere. Everything about Vivobook 15 is bold and improved, from its powerful 13th Gen Intel® Core™ processor to its crisp and clear display, 180° lay-flat hinge, modern colors and sleek geometric design. Make a fresh start today with Vivobook 15!</p>', 120000.00, 150000.00, '1 year Warranty', 'In Stock', 8, 1, 'ProductImages/pWCa69tf2wLxNzDgqtXA.png', '2025-02-16 23:08:19', '2025-09-11 12:46:56', '2025-09-10', '2025-12-26'),
(2, 'ASUS TUF GAMING F15', 'ASUS', 'LAPTOPS', 'DEAL OF THE DAYS', 'Geared for serious gaming and rocking a slick new style, TUF Gaming F15 is a feature-packed Windows 11 Home gaming laptop with the power to carry you to victory. The new GeForce RTX 2050 GPU delivers fluid gameplay on, while the potent Intel Core i5 11th gen H-Series CPU is bolstered by improved cooling that amps CPU performance and keeps acoustics stealthy. A TUF’s military-grade durability keeps you on your best game anywhere.', 255000.00, 265000.00, '1 year Warranty', 'Out of Stock', 199, 1, 'ProductImages/iVGzTGVs2NAUbVMXOWWE.png', '2025-02-17 00:31:31', '2025-08-04 07:08:29', '2025-04-18', '2025-04-30'),
(3, 'MSI STEALTH 16 MERCEDES-AMG', 'MSI', 'LAPTOPS', 'Top Rated', 'MSI Stealth series x Mercedes-AMG Motorsport BUILT TO PERFORM. The cornerstone of the AMG experience paired with MSI cooling technology paves the road to success in gaming. LUXURIOUS TOUCH The collaborative design seamlessly blends the subtle elegance of Mercedes-Benz with striking red accents that symbolize both the AMG performance and the spirited essence of MSI.', 1225000.00, 1225000.00, '1 year Warranty', 'In Stock', 29, 1, 'ProductImages/QsFQdNTbG7At3IioapsV.png', '2025-02-17 00:38:49', '2025-09-11 14:30:00', NULL, NULL),
(4, 'ASUS ZENBOOK 14X OLED', 'ASUS', 'LAPTOPS', 'DEAL OF THE DAYS', 'Operating System: Windows 11 Home - ASUS recommends Windows 11 Pro for business.', 255000.00, 255000.00, '2 year Warranty', 'In Stock', 177, 1, 'ProductImages/a8pCqXYoWjvZ7vECbCW8.png', '2025-02-19 01:01:39', '2025-09-11 14:30:00', '2025-08-02', '2025-08-26'),
(5, 'ACER ASPIRE 3', 'ACER', 'LAPTOPS', 'DEAL OF THE DAYS', 'Processor &amp; Chipset: Processor Type: Ryzen™ 5, Processor Model: AMD Ryzen™ 5 7520U quad-core processor (up to 2 MB L2 cache, up to 4MB L3 cache, 2.8 GHz with boost up to 4.3 GHz)', 155000.00, 155000.00, '6 months warranty', 'In Stock', 100, 1, 'ProductImages/sbowJlIg9gBnhSlKWKyw.webp', '2025-02-19 01:03:35', '2025-08-06 03:53:25', '2025-04-07', '2025-04-25'),
(6, 'ARRIVAL MSI THIN GF63 12UCX I5 12TH GEN', 'MSI', 'LAPTOPS', 'DEAL OF THE DAYS', 'Intel Core i5-12450H Processor', 252500.00, 252500.00, '1 year warrenty', 'In Stock', 92, 1, 'ProductImages/pXUdj3i6pB0MiVRE9VHN.webp', '2025-02-19 01:05:01', '2025-09-11 14:30:00', '2025-04-18', '2025-05-15'),
(7, 'ASUS ROG STRIX HELIOS RGB GAMING CASE', 'ASUS', 'CASINGS', 'New Arrivals', 'Premium mid-tower gaming case with aluminum frame, tempered glass panels, and versatile cooling options.', 106000.00, 106000.00, '3 year warrenty', 'In Stock', 96, 1, 'ProductImages/mUmCYPEpnBwwxmrPs55l.webp', '2025-02-19 01:06:08', '2025-04-18 04:31:10', NULL, NULL),
(8, 'IPHONE 16 PRO MAX', 'APPLE', 'APPLE PRODUCTS', 'Top Rated', 'Apple\'s latest flagship smartphone featuring an advanced camera system, A18 Pro chip, and Super Retina XDR display.', 520000.00, 520000.00, '1 year warrenty', 'Out of Stock', 99, 1, 'ProductImages/KbC0NCKd7SA0WLMO3T8b.webp', '2025-02-19 01:19:35', '2025-02-24 03:33:15', NULL, NULL),
(9, 'REDRAGON JUNO G818 WIRELESS GAMEPAD', 'REDRAGON', 'GAMING CONSOLE', 'Top Rated', 'A high-performance wireless gamepad with Bluetooth and wired connectivity, featuring a 6-axis sensor, high-precision 3D joystick, and backlit buttons for an immersive gaming experience.', 10400.00, 10400.00, '1 year warrenty', 'In Stock', 200, 1, 'ProductImages/e7Ou5i9na1agPxbD6xOO.webp', '2025-02-24 22:04:58', '2025-02-24 22:04:58', NULL, NULL),
(10, 'G.SKILL TRIDENT Z NEO RGB 16GB (8X2) 3200MHZ MEMORY', 'TRIDENT', 'RAM', 'Featured', 'High-performance DDR4 memory kit with RGB lighting, optimized for gaming and overclocking.', 18000.00, 18000.00, '1 year warrenty', 'In Stock', 20, 1, 'ProductImages/yg1ipxEcgRqQqn1n6wuK.webp', '2025-02-24 22:07:46', '2025-02-24 22:07:46', NULL, NULL),
(11, 'MSI PRO B760M-P DDR5 MOTHERBOARD', 'MSI', 'MOTHERBOARD', 'New Arrivals', 'MSI PRO B760M-P DDR5 motherboard supports Intel® Core™ 14th/13th/12th Gen processors with DDR5 memory, offering features like PCIe 4.0, dual-channel memory, multiple USB ports, HDMI, DisplayPort, and RAID support for an efficient system.', 50000.00, 50000.00, '2 year warrenty', 'In Stock', 193, 1, 'ProductImages/F3m0jBZWjauOUuhcw9lN.webp', '2025-02-25 07:55:58', '2025-09-11 14:30:00', NULL, NULL),
(12, 'AMD RYZEN 5 3600 PROCESSOR', 'AMD', 'PROCESSOR', 'New Arrivals', '<p>A 6-core, 12-thread processor with a base clock of 3.6GHz and a max boost clock of 4.2GHz. Built on 7nm technology, it supports PCIe 4.0 and offers excellent performance for gaming and productivity.</p>', 39000.00, 39000.00, '1 year Warranty', 'In Stock', 199, 2, 'ProductImages/gHKhV8KpbV47HolMwByD.webp', '2025-02-25 07:56:52', '2025-08-10 10:44:01', NULL, NULL),
(13, 'CORSAIR CV550 — 550 WATT 80 PLUS® BRONZE CERTIFIED PSU', 'CORSAIR', 'POWER SUPPLY', 'DEAL OF THE DAYS', '<p>The CORSAIR CV550 is a reliable 550W power supply with 80 PLUS Bronze certification, ensuring energy efficiency and stable power delivery. It features multiple protection mechanisms and a compact ATX form factor for seamless compatibility.</p>', 211000.00, 211000.00, '6 months warranty', 'In Stock', 196, 1, 'ProductImages/OdESwmk59iljdrVPqhEc.webp', '2025-02-25 07:57:51', '2025-09-11 14:30:00', '2025-08-07', '2025-11-13'),
(14, 'GTX 1050TI 4GB Graphics Card - USED', 'GTX', 'GRAPHIC CARDS', 'DEAL OF THE DAYS', '<p>The GeForce® GTX 1050 Ti 4GB Graphics Card offers impressive performance with a memory clock of 7008 MHz, 768 CUDA® cores, and support for high resolutions up to 7680x4320. Ideal for gaming and multimedia applications.</p>', 30000.00, 30000.00, '1 year Warranty', 'Used', 187, 1, 'ProductImages/cvyBvqyzSRlvYQxr5kf1.webp', '2025-02-25 07:58:39', '2025-09-11 14:30:00', '2025-08-07', '2025-10-16'),
(15, 'Iphone 11', 'Apple', 'APPLE PRODUCTS', 'Top Rated', '<p>Apple Intelligence is the personal intelligence system that helps you write, express yourself, and get things done effortlessly. With groundbreaking privacy protections, it gives you peace of mind that no one else can access your data — not even Apple.</p>', 75000.00, 85000.00, '1 year Warranty', 'In Stock', 199, 1, 'ProductImages/uzTIGYHODxylZLtYV6bF.png', '2025-02-26 10:13:05', '2025-07-31 08:06:46', NULL, NULL),
(16, 'MSI MAG CORELIQUID 240R V2 COOLER', 'MSI', 'COOLING & LIGHTING', 'DEAL OF THE DAYS', '<p>The MSI MAG CORELIQUID 240R V2 is an all-in-one liquid CPU cooler featuring a 240mm radiator, dual ARGB fans, and a rotatable pump head. Designed for efficient cooling and compatibility with the latest Intel and AMD sockets.</p>', 38000.00, 37000.00, '2 year Warranty', 'In Stock', 997, 1, 'ProductImages/jQ55YycLtL8rcVHkxfX8.jpg', '2025-04-10 14:22:09', '2025-08-08 13:29:54', '2025-04-09', '2025-04-14'),
(17, 'Intel Core i9', 'Intel', 'PROCESSOR', 'New Arrivals', 'The fastest Intel processor is the i9--12900K. It&#039;s faster than the Ryzen 9 5950X in most games, and has similar performance in most productivity tasks. The best high-end Intel processor for gaming is the i5--12600K.', 85000.00, 89000.00, '1 year Warranty', 'In Stock', 87, 1, 'ProductImages/VZnplUs1wjVP6rUlVtpQ.png', '2025-04-16 03:02:22', '2025-09-11 14:30:00', NULL, NULL),
(18, 'LapTop', 'MSI', 'LAPTOPS', 'New Arrivals', '<p><strong>Display</strong>    <em>Full Hd</em><strong><br /></strong></p>\n<p><strong>Ram </strong><em>   8GB</em></p>\n<p><strong>Hard </strong><em>  SSD256</em></p>', 250000.00, 300000.00, '1 year warrenty', 'In Stock', 2, 2, 'ProductImages/CbayAcsckOsFc2jYLKjB.jpeg', '2025-04-29 08:06:38', '2025-07-28 06:39:52', NULL, NULL),
(19, 'MSI Lap', 'MSI', 'LAPTOPS', 'New Arrivals', '<p><strong>Ram </strong>            6GB</p>\n<p><strong>Fan  </strong>             Double Fan</p>', 400000.00, 420000.00, '1 year warrenty', 'In Stock', 4000, 2, 'ProductImages/lipoMe7LIVEYZrQXZHOb.jpeg', '2025-04-29 08:21:42', '2025-07-28 06:39:55', NULL, NULL),
(20, 'Test 4', 'MSI', 'LAPTOPS', 'New Arrivals', '<p><em><strong>FFF</strong></em>  908</p>\n<p><em><strong>HHH</strong></em> 8989</p>\n<p><strong>Ram </strong>            6GB</p>\n<p><strong>Fan  </strong>             Double Fan</p>\n<p><strong>Ram </strong>            6GB</p>\n<p><strong>Fan  </strong>             Double Fan</p>', 300.00, 250.00, '1 year warrenty', 'In Stock', 500, 2, 'ProductImages/IEqUqa69u6eXD1BrQMIE.jpeg', '2025-04-29 08:24:13', '2025-07-28 06:39:57', NULL, NULL),
(21, 'AAAA', 'aaaa', 'LAPTOPS', 'New Arrivals', '<ol><li><span></span><strong>ABCDE</strong> : BCDE</li><li><span></span>hfhffjhfejke : jkuuuhui</li></ol>', 2.00, 2.00, '1 year warrenty', 'In Stock', 200, 2, 'ProductImages/TPJ0vvvCTuRR3yNImJhS.jpeg', '2025-04-30 10:12:04', '2025-07-28 06:40:06', NULL, NULL),
(22, 'HP Pavilion 15', 'Hp', 'LAPTOPS', 'DEAL OF THE DAYS', 'The HP Pavilion 15 is a well-balanced everyday laptop designed for smooth multitasking and productivity. It features a 13th Gen Intel Core i5 processor, delivering fast and efficient performance for work, study, or entertainment. With 16GB of RAM and a 512GB SSD, it ensures quick boot times, seamless app switching, and ample storage space. The 15.6-inch Full HD display offers vibrant visuals, while Intel Iris Xe Graphics provide crisp rendering for casual gaming and media editing. Ideal for students, professionals, or home users who need reliability with style.', 215000.00, 24000.00, '1 year Warranty', 'In Stock', 189, 1, 'ProductImages/btMRdg6gFAwZPNNwoqMc.png', '2025-07-28 08:37:12', '2025-08-06 04:03:55', '2025-07-28', '2025-08-14'),
(23, '1 TB HDD - SpinTech', 'MaxStorage HDD', 'STORAGE & NAS', 'New Arrivals', '<p>1 TB Hard Disk Drive offering large storage capacity with stable performance and quiet operation.</p>', 20000.00, 15000.00, '6 months warranty', 'In Stock', 198, 1, 'ProductImages/wJhRtAuNPE8LIzbLaPjf.png', '2025-08-08 07:03:37', '2025-09-11 14:30:00', NULL, NULL),
(24, 'Arctic Breeze Pro', 'CoolMaster', 'COOLING & LIGHTING', 'New Arrivals', '<p>High-performance 120mm cooling fan with RGB lighting, ultra-quiet operation, and optimized airflow for effective heat dissipation. Perfect for gaming PCs and workstations.</p>', 8000.00, 10000.00, '3 year Warranty', 'In Stock', 2000, 1, 'ProductImages/VTzJY6DUm90eJrd86kyJ.png', '2025-08-08 07:27:52', '2025-08-08 07:27:52', NULL, NULL),
(25, 'VisionX 27Q', 'ScreenTech', 'MONITORS & ACCESSORIES', 'New Arrivals', '<p>27-inch QHD monitor with 2560x1440 resolution, 144Hz refresh rate, and AMD FreeSync support for smooth gaming and vibrant visuals. Sleek design with adjustable stand.</p>', 50000.00, 55000.00, '3 year Warranty', 'In Stock', 296, 1, 'ProductImages/lm4hZ8sirlJwDg9bWurI.png', '2025-08-08 07:34:00', '2025-09-11 14:30:00', NULL, NULL),
(26, 'MSI B450 Tomahawk MAX II', 'MSI', 'MOTHERBOARD', 'New Arrivals', '<p>Reliable ATX motherboard with AMD AM4 socket, DDR4 support, enhanced VRM cooling, and RGB lighting — ideal for gaming and productivity builds.</p>', 17500.00, 19990.00, '3 year Warranty', 'In Stock', 300, 1, 'ProductImages/nIBuOJvasUDbpmqzXQJy.png', '2025-08-10 10:01:49', '2025-08-10 10:01:49', NULL, NULL),
(27, 'Corsair Vengeance LPX 16GB (2x8GB) DDR4 3200MHz', 'Corsair', 'RAM', 'New Arrivals', '<p>High-performance DDR4 memory designed for gamers and PC enthusiasts, featuring aluminum heat spreaders and optimized compatibility for Intel and AMD platforms.</p>', 12500.00, 14500.00, '1 year Warranty', 'In Stock', 98, 1, 'ProductImages/71djBohn8o6D6cNXK2Jy.png', '2025-08-10 10:09:15', '2025-09-11 14:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_features`
--

CREATE TABLE `product_features` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `feature_name` varchar(255) NOT NULL,
  `feature_value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_features`
--

INSERT INTO `product_features` (`id`, `product_id`, `feature_name`, `feature_value`, `created_at`, `updated_at`) VALUES
(3, 8, 'Capacity', '256GB', '2025-02-20 02:02:19', '2025-02-20 02:02:19'),
(4, 9, 'Warranty', '1 year', '2025-02-24 22:05:41', '2025-02-24 22:05:41'),
(5, 9, 'Compatibility', 'PS4, PS3, iOS 13.0+, Android 10.0+', '2025-02-24 22:06:03', '2025-02-24 22:06:03'),
(6, 9, 'Connectivity', 'Bluetooth 4.2 & Wired', '2025-02-24 22:06:33', '2025-02-24 22:06:33'),
(7, 9, 'Motion Control', '6-Axis Sensor', '2025-02-24 22:06:49', '2025-02-24 22:06:49'),
(8, 15, 'abcde', 'abbb', '2025-02-26 10:14:19', '2025-02-26 10:14:19'),
(10, 1, 'Display', '15-inch OLED', '2025-03-14 05:11:18', '2025-08-03 14:51:08'),
(11, 15, 'Display', 'Super Retina XDR display', '2025-04-11 05:49:42', '2025-04-11 05:49:42'),
(12, 8, 'Display', 'Always-On display', '2025-04-11 05:50:35', '2025-04-11 05:50:35'),
(13, 22, 'Ram', '8GB', '2025-07-28 08:40:40', '2025-08-03 14:52:26'),
(14, 4, 'Ram', '8GB', '2025-08-02 10:33:46', '2025-08-03 14:52:33'),
(15, 4, 'VGA', '4GB', '2025-08-02 10:34:40', '2025-08-02 10:34:40'),
(16, 1, 'Storage', '500GB', '2025-08-03 14:51:22', '2025-08-03 14:51:22'),
(17, 1, 'Ram', '16GB', '2025-08-03 14:51:43', '2025-08-10 11:33:18'),
(18, 1, 'VGA', '4GB', '2025-08-03 14:51:55', '2025-08-03 14:51:55'),
(19, 2, 'Ram', '32GB', '2025-08-10 10:19:03', '2025-08-10 10:19:03'),
(20, 1, 'Processor', 'Ryzen 7', '2025-08-10 11:34:26', '2025-08-10 11:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `created_at`, `updated_at`) VALUES
(13, 1, 'OtherImage/MdR268rQ4BhvhxEd3ZPf.jpeg', '2025-07-28 06:41:41', '2025-07-28 06:41:41'),
(14, 1, 'OtherImage/dBwOkPZeuVsRZgMHLcSj.jpg', '2025-07-28 06:41:49', '2025-07-28 06:41:49'),
(15, 1, 'OtherImage/ZQxwdU1V7g7iwWi4y48V.webp', '2025-07-28 06:41:56', '2025-07-28 06:41:56'),
(16, 1, 'OtherImage/p4VvFYot34sF5YQfCxQ5.jpeg', '2025-07-28 06:42:05', '2025-07-28 06:42:05'),
(17, 22, 'OtherImage/goOWhbKMxZ42PvpS67JD.png', '2025-07-28 08:39:34', '2025-07-28 08:39:34'),
(18, 22, 'OtherImage/BLQjFuJr6XQcIbBswDbS.jpeg', '2025-07-28 08:39:40', '2025-07-28 08:39:40'),
(19, 22, 'OtherImage/iFVAj84RinzXwPeequ3h.png', '2025-07-28 08:40:00', '2025-07-28 08:40:00'),
(20, 4, 'OtherImage/MeJRUhZlcn3vpZXV6XWK.jpg', '2025-08-02 10:32:06', '2025-08-02 10:32:06'),
(21, 4, 'OtherImage/6nXb1l3k9ZkOiY3kG8lc.jpeg', '2025-08-02 10:32:12', '2025-08-02 10:32:12'),
(22, 4, 'OtherImage/brehXyCmVYctsqcqqivi.png', '2025-08-02 10:32:17', '2025-08-02 10:32:17'),
(23, 27, 'OtherImage/dECyllkd56vJprcbZ3rt.webp', '2025-08-10 10:15:22', '2025-08-10 10:15:22'),
(24, 2, 'OtherImage/MLySdDFrIrk3MrOc6sbh.webp', '2025-08-10 11:03:21', '2025-08-10 11:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_status`
--

CREATE TABLE `product_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_status`
--

INSERT INTO `product_status` (`id`, `status_name`) VALUES
(1, 'Active'),
(2, 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `tag_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_name`) VALUES
(1, 1, 'Top Rated');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL CHECK (`rating` between 1 and 5),
  `message` text NOT NULL,
  `status` int(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `rating`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ABC', 'abc@gmail.com', 1, 'Good', 1, '2025-04-29 08:58:24', '2025-09-11 13:05:49'),
(2, 1, 'BCD', 'bcd@gmail.com', 5, 'Nice product', 2, '2025-04-29 08:59:26', '2025-08-10 14:00:51'),
(3, 1, 'THISARA', 'thisara.a2001@gmail.com', 1, 'ABCDE', 1, '2025-04-29 09:02:54', '2025-09-11 13:05:54'),
(4, 3, 'Max', 'max@gmail.com', 1, 'Good Product', 2, '2025-04-29 09:08:00', '2025-07-28 06:43:40'),
(5, 2, 'Sunil', 'sunil@gmail.com', 4, 'Good Product', 2, '2025-04-29 09:08:58', '2025-04-29 10:01:29'),
(6, 2, 'Nimal', 'nimal@gmail.com', 1, 'Nice Product', 2, '2025-04-29 09:12:02', '2025-04-29 10:01:24'),
(7, 4, 'Nimaali', 'nimali@gmail.com', 5, 'Nice product', 2, '2025-04-29 09:15:12', '2025-04-29 10:01:19'),
(8, 2, 'Nimlka', 'abc@gmail.com', 4, 'Nice', 2, '2025-04-29 09:51:43', '2025-04-29 09:53:19'),
(9, 22, 'Abcd', 'thisara2001@gmail.com', 1, 'Nice', 2, '2025-07-28 08:39:00', '2025-08-10 14:00:44'),
(10, 22, 'Thisara', 'abc@gmail.com', 5, 'Good', 1, '2025-08-02 10:27:37', '2025-09-11 14:06:09'),
(11, 1, 'Nimal Rathnayaka', 'test@gmail.com', 1, 'Good Product', 1, '2025-08-03 15:01:14', '2025-09-11 13:05:58'),
(12, 1, 'Kasun Silva', 'test@gmail.com', 5, 'Nice Product', 2, '2025-08-04 03:19:29', '2025-08-04 03:19:33'),
(13, 13, 'Kamal', 'kamal@gmail.com', 5, 'Good Product', 2, '2025-08-04 03:35:51', '2025-08-04 03:46:50'),
(14, 4, 'Nimal', 'nimal@gmail.com', 3, 'Nice Product', 2, '2025-08-04 03:38:26', '2025-08-10 14:00:32'),
(15, 1, 'Sadun', 'sadun@gmail.com', 4, 'Good Product', 2, '2025-08-04 03:44:59', '2025-08-10 13:54:59'),
(16, 23, 'Kamal Jayasinhe', 'kamal@gmail.com', 5, 'Good Product', 2, '2025-08-09 03:20:39', '2025-08-09 03:20:39'),
(17, 3, 'Akee', 'abc@gmail.com', 5, 'good', 2, '2025-08-09 05:44:04', '2025-08-10 14:00:37'),
(18, 1, 'Thisara', 'thisara@gmail.com', 5, 'Good', 2, '2025-09-11 13:54:21', '2025-09-11 13:54:21'),
(19, 1, 'Thisara Ariyawansha', 'thisara@gmail.com', 5, 'Good product', 1, '2025-09-11 14:00:16', '2025-09-11 14:06:11');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$0ZG3JmaRL/5sPXLxlFpOB.84KchNinsLeHgr6TRoVPs.1Vq8cRns.', 'Qwf0mbuVnfUJL8DFmh9nnI3fRhsAn01CLii8wrGNhrmZM0H9dW9HLfKmG72q', '2025-01-23 05:27:35', '2025-08-10 14:09:17'),
(2, 'admin', 'admin1@gmail.com', NULL, '$2y$10$KYqhM5R/rmpnoMzbup7tU./97Nmre2xlLfmIbekVC4IHVHHJ2jgHW', NULL, '2025-02-12 20:32:26', '2025-02-12 20:32:26'),
(3, 'admin', 'admin2@gmail.com', NULL, '$2y$10$UmNm07/.QVkgPsesc9Oa1uqm/sbyBiwlTce09.HmyiY3FP6j6zZwm', NULL, '2025-02-13 02:49:11', '2025-02-13 02:49:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ai_conversations`
--
ALTER TABLE `ai_conversations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `session_id` (`session_id`),
  ADD KEY `ai_conversations_session_id_index` (`session_id`),
  ADD KEY `ai_conversations_created_at_index` (`created_at`);

--
-- Indexes for table `ai_messages`
--
ALTER TABLE `ai_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ai_messages_conversation_id_created_at_index` (`conversation_id`,`created_at`),
  ADD KEY `ai_messages_role_index` (`role`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bitorders`
--
ALTER TABLE `bitorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `llm_cache`
--
ALTER TABLE `llm_cache`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `llm_cache_prompt_hash_unique` (`prompt_hash`),
  ADD KEY `llm_cache_prompt_hash_index` (`prompt_hash`),
  ADD KEY `llm_cache_created_at_index` (`created_at`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `payment_status_id` (`payment_status_id`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_features`
--
ALTER TABLE `product_features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `ai_conversations`
--
ALTER TABLE `ai_conversations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ai_messages`
--
ALTER TABLE `ai_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bitorders`
--
ALTER TABLE `bitorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `llm_cache`
--
ALTER TABLE `llm_cache`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ai_messages`
--
ALTER TABLE `ai_messages`
  ADD CONSTRAINT `ai_messages_conversation_id_foreign` FOREIGN KEY (`conversation_id`) REFERENCES `ai_conversations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`payment_status_id`) REFERENCES `payment_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_features`
--
ALTER TABLE `product_features`
  ADD CONSTRAINT `product_features_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
