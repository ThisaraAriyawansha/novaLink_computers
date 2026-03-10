-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2026 at 04:05 PM
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
(6, '3gMfiVI6ElL9Bc8YY6apOjPYYlUmZgD9LKzmCPxm', 'New Conversation', 0, '2025-09-25 09:42:02', '2025-09-25 09:42:02'),
(7, 'B7t6gbWcbwKivCeJMEnMT0vZWpe1JAPKV6G5e3x4', 'New Conversation', 20, '2026-03-02 10:30:31', '2026-03-02 10:43:53'),
(8, 'TrRucmj33INnn2VqnYTJRHzkXb7LJHHIpLMwnau3', 'New Conversation', 0, '2026-03-02 10:34:05', '2026-03-02 10:34:05');

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
(73, 6, 'assistant', 'Hello! I\'m your NovaLink AI assistant. How can I help you with PC building today?', NULL, 0, '2025-09-25 09:42:02', '2025-09-25 09:42:02'),
(74, 7, 'assistant', 'Hello! I\'m your NovaLink AI assistant. How can I help you with PC building today?', NULL, 0, '2026-03-02 10:30:31', '2026-03-02 10:30:31'),
(75, 7, 'user', 'How can I contact you?', NULL, 0, '2026-03-02 10:30:31', '2026-03-02 10:30:31'),
(76, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:30:34', '2026-03-02 10:30:34'),
(77, 7, 'user', 'lap', NULL, 0, '2026-03-02 10:30:52', '2026-03-02 10:30:52'),
(78, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:30:55', '2026-03-02 10:30:55'),
(79, 7, 'user', 'iphon', NULL, 0, '2026-03-02 10:32:44', '2026-03-02 10:32:44'),
(80, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:32:47', '2026-03-02 10:32:47'),
(81, 7, 'user', 'product', NULL, 0, '2026-03-02 10:33:49', '2026-03-02 10:33:49'),
(82, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:33:51', '2026-03-02 10:33:51'),
(83, 7, 'user', 'Custom PC builds for any budget', NULL, 0, '2026-03-02 10:34:03', '2026-03-02 10:34:03'),
(84, 7, 'assistant', 'I\'d love to help you find the best value build! Please share your **budget in LKR** and your **primary use case** (gaming, office work, video editing, etc.) and I\'ll put together the perfect component list.', NULL, 0, '2026-03-02 10:34:05', '2026-03-02 10:34:05'),
(85, 8, 'assistant', 'Hello! I\'m your NovaLink AI assistant. How can I help you with PC building today?', NULL, 0, '2026-03-02 10:34:05', '2026-03-02 10:34:05'),
(86, 7, 'user', '30000', NULL, 0, '2026-03-02 10:34:20', '2026-03-02 10:34:20'),
(87, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:34:23', '2026-03-02 10:34:23'),
(88, 7, 'user', 'whats up', NULL, 0, '2026-03-02 10:34:52', '2026-03-02 10:34:52'),
(89, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:34:55', '2026-03-02 10:34:55'),
(90, 7, 'user', 'Laptops', NULL, 0, '2026-03-02 10:43:24', '2026-03-02 10:43:24'),
(91, 7, 'assistant', 'Here are our available laptops:\n\n• **Lenovo Legion 5 15AKP10 Gaming – Ryzen AI 7** — 600,000 LKR\n• **Dell Latitude 3340 – i3** — 145,000 LKR\n• **Asus VivoBook 15 Laptop** — 189,000 LKR\n\nWhat\'s your intended use and budget?', NULL, 0, '2026-03-02 10:43:27', '2026-03-02 10:43:27'),
(92, 7, 'user', '145000', NULL, 0, '2026-03-02 10:43:43', '2026-03-02 10:43:43'),
(93, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:43:45', '2026-03-02 10:43:45'),
(94, 7, 'user', 'Pc', NULL, 0, '2026-03-02 10:43:50', '2026-03-02 10:43:50'),
(95, 7, 'assistant', 'I\'m your **NovaLink AI** assistant — happy to help! I can assist with:\n\n• Custom PC builds for any budget\n• Component recommendations from our store\n• Gaming, workstation, and office setups\n• Upgrade advice for your existing PC\n• Product comparisons and spec breakdowns\n• Store info (location, hours, contact)\n\nWhat would you like help with today?', NULL, 0, '2026-03-02 10:43:53', '2026-03-02 10:43:53');

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
(10, 22, 225000.00, 96, 2, '2025-07-28 08:38:44', '2026-02-19 07:50:26'),
(11, 22, 226000.00, 96, 2, '2025-08-02 10:26:58', '2026-02-19 07:50:26'),
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
(12, 96, 'jhgjgujydedwed', 'wddwwewe', 'dwedewwd', 'we', 'wee', 1, 'ASUS VIVOBOOK E1504G', 125000.00, 1, '2025-08-06 13:08:02', '2025-08-06 13:08:02'),
(13, 96, 'No 12', 'Sumanasara Road', 'Matara', '81000', NULL, 22, 'HP Pavilion 15', 226000.00, 2, '2026-02-19 07:50:26', '2026-02-19 07:52:15');

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
(98, 'Thisara', '$2y$10$T06625ycf8vdHEKTSP77C.Csuxm4r6Pqkbqr5uwG//AzeuKb5NWYK', 'Thisara', 'Ariyawansha', '0768877656', 'thisaraariyawansha2001@gmail.com', '2025-08-05 09:27:16', '2025-08-05 09:27:16'),
(103, 'thisaraariyawansha2001@gmail.com', '$2y$10$dBwysXBJHfpCs5YFveu2KubP4hv/i.MILXYMsz2RkL8m4fS.mP9Je', 'Thisara', 'Ariyawansha', '0765566783', 'thisaraariyawansha2001@gmail.com', '2026-02-19 06:52:03', '2026-02-19 06:52:03'),
(104, 'thisaraariyawansha2001@gmail.com', '$2y$10$te6GtJAQC44yjwulLjI1f.oHG50d9HOs1npThMT3MpDa6Feo/Lht.', 'Thisara', 'Ariyawansha', '0765566789', 'thisaraariyawansha2001@gmail.com', '2026-03-08 08:35:45', '2026-03-08 08:35:45'),
(105, 'thisaraariyawansha2001@gmail.com', '$2y$10$drIMBZtagIjuGR0iA54S7eU/nq3MJk.ZLwGWWf1ZeMl1YdFp6HDaq', 'Thisara', 'Ariyawansha', '0765566789', 'thisaraariyawansha2001@gmail.com', '2026-03-08 08:40:24', '2026-03-08 08:40:24'),
(106, 'thisaraariyawansha2001@gmail.com', '$2y$10$thzi5O2VC.ArbxRMpTJ/2.A/YMTfQ2XXJcc539BZnq/mXFyy6zZBS', 'Thisara', 'Ariyawansha', '0765566789', 'thisaraariyawansha2001@gmail.com', '2026-03-08 08:45:40', '2026-03-08 08:45:40');

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
(26, '2025_02_13_050538_create_listings_table', 10),
(27, '2025_02_19_074046_create_product_images_table', 11),
(28, '2026_02_18_185419_add_role_to_users_table', 11),
(29, '2026_02_18_185419_create_shops_table', 11),
(30, '2026_02_18_185420_add_user_id_to_products_table', 11),
(31, '2026_02_19_122734_add_shop_order_status_to_orders_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `shop_order_status` varchar(255) NOT NULL DEFAULT 'pending',
  `qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `payment_id`, `shop_order_status`, `qty`, `created_at`, `updated_at`) VALUES
(129, 5, 96, 'pending', 1, '2025-07-28 07:38:53', '2025-07-28 07:38:53'),
(130, 12, 96, 'pending', 1, '2025-07-28 07:38:53', '2025-07-28 07:38:53'),
(131, 5, 97, 'pending', 1, '2025-07-28 08:41:44', '2025-07-28 08:41:44'),
(132, 1, 97, 'pending', 1, '2025-07-28 08:41:44', '2025-07-28 08:41:44'),
(133, 14, 98, 'pending', 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(134, 22, 98, 'pending', 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(135, 4, 98, 'pending', 3, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(136, 17, 98, 'pending', 1, '2025-08-05 14:50:48', '2025-08-05 14:50:48'),
(137, 14, 99, 'pending', 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(138, 22, 99, 'pending', 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(139, 4, 99, 'pending', 3, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(140, 17, 99, 'pending', 1, '2025-08-05 14:57:16', '2025-08-05 14:57:16'),
(141, 14, 100, 'pending', 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(142, 22, 100, 'pending', 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(143, 4, 100, 'pending', 3, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(144, 17, 100, 'pending', 1, '2025-08-05 14:58:17', '2025-08-05 14:58:17'),
(145, 14, 101, 'pending', 1, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(146, 22, 101, 'pending', 1, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(147, 4, 101, 'pending', 3, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(148, 17, 101, 'pending', 1, '2025-08-06 03:48:50', '2025-08-06 03:48:50'),
(155, 14, 105, 'pending', 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(156, 22, 105, 'pending', 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(157, 4, 105, 'pending', 3, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(158, 17, 105, 'pending', 1, '2025-08-06 03:56:04', '2025-08-06 03:56:04'),
(159, 14, 106, 'pending', 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(160, 22, 106, 'pending', 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(161, 4, 106, 'pending', 3, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(162, 17, 106, 'pending', 1, '2025-08-06 03:56:50', '2025-08-06 03:56:50'),
(163, 14, 107, 'pending', 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(164, 22, 107, 'pending', 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(165, 4, 107, 'pending', 3, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(166, 17, 107, 'pending', 1, '2025-08-06 03:58:41', '2025-08-06 03:58:41'),
(167, 14, 108, 'pending', 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(168, 22, 108, 'pending', 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(169, 4, 108, 'pending', 3, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(170, 17, 108, 'pending', 1, '2025-08-06 03:59:42', '2025-08-06 03:59:42'),
(171, 14, 109, 'pending', 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(172, 22, 109, 'pending', 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(173, 4, 109, 'pending', 3, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(174, 17, 109, 'pending', 1, '2025-08-06 04:00:24', '2025-08-06 04:00:24'),
(175, 14, 110, 'pending', 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(176, 22, 110, 'pending', 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(177, 4, 110, 'pending', 3, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(178, 17, 110, 'pending', 1, '2025-08-06 04:03:20', '2025-08-06 04:03:20'),
(179, 14, 111, 'pending', 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(180, 22, 111, 'pending', 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(181, 4, 111, 'pending', 3, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(182, 17, 111, 'pending', 1, '2025-08-06 04:03:55', '2025-08-06 04:03:55'),
(183, 4, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(184, 6, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(185, 17, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(186, 11, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(187, 27, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(188, 14, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(189, 23, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(190, 13, 112, 'pending', 2, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(191, 25, 112, 'pending', 2, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(192, 3, 112, 'pending', 1, '2025-09-11 14:02:37', '2025-09-11 14:02:37'),
(193, 4, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(194, 6, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(195, 17, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(196, 11, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(197, 27, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(198, 14, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(199, 23, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(200, 13, 113, 'pending', 2, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(201, 25, 113, 'pending', 2, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(202, 3, 113, 'pending', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(203, 161, 114, 'processing', 1, '2026-02-19 06:52:03', '2026-02-19 07:03:32'),
(204, 162, 114, 'processing', 1, '2026-02-19 06:52:03', '2026-02-19 07:04:49'),
(205, 161, 115, 'shipped', 1, '2026-02-19 06:59:52', '2026-02-19 07:03:57'),
(206, 162, 115, 'pending', 1, '2026-02-19 06:59:52', '2026-02-19 06:59:52'),
(207, 161, 116, 'processing', 1, '2026-02-19 07:13:15', '2026-02-19 10:02:20'),
(208, 162, 116, 'pending', 1, '2026-02-19 07:13:15', '2026-02-19 07:13:15'),
(209, 159, 116, 'pending', 1, '2026-02-19 07:13:15', '2026-02-19 07:13:15'),
(210, 5, 117, 'pending', 1, '2026-03-08 08:35:45', '2026-03-08 08:35:45'),
(211, 137, 117, 'pending', 1, '2026-03-08 08:35:45', '2026-03-08 08:35:45'),
(212, 5, 118, 'pending', 1, '2026-03-08 08:40:24', '2026-03-08 08:40:24'),
(213, 137, 118, 'pending', 1, '2026-03-08 08:40:24', '2026-03-08 08:40:24'),
(214, 5, 119, 'pending', 1, '2026-03-08 08:45:40', '2026-03-08 08:45:40'),
(215, 137, 119, 'pending', 1, '2026-03-08 08:45:40', '2026-03-08 08:45:40');

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
(113, 96, 2452000.00, 'ABC', '12/12B', 'Welegoda', 'Matara', '81000', 1, '2025-09-11 14:30:00', '2025-09-11 14:30:00'),
(114, 103, 5000.00, 'Nothing', 'No 12', 'Walgama', 'Matara', '81000', 1, '2026-02-19 06:52:03', '2026-02-19 06:52:03'),
(115, 98, 5000.00, NULL, 'Abcde', 'ABCD', 'MTR', '81000', 1, '2026-02-19 06:59:52', '2026-02-19 06:59:52'),
(116, 98, 194000.00, 'abcde', 'abcd', 'abcd', 'mtr', '81000', 2, '2026-02-19 07:13:15', '2026-02-19 07:32:13'),
(117, 104, 172900.00, 'Test', 'Test 1', 'test 1', 'MTR', '81000', 1, '2026-03-08 08:35:45', '2026-03-08 08:35:45'),
(118, 105, 172900.00, 'Test', 'Test 1', 'test 1', 'MTR', '81000', 1, '2026-03-08 08:40:24', '2026-03-08 08:40:24'),
(119, 106, 172900.00, 'Test', 'Test 1', 'test 1', 'MTR', '81000', 1, '2026-03-08 08:45:40', '2026-03-08 08:45:40');

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
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `products` (`id`, `user_id`, `name`, `brand`, `type`, `tags`, `description`, `discounted_price`, `retail_price`, `warranty`, `in_stock`, `qty`, `status_id`, `image`, `created_at`, `updated_at`, `deal_start`, `deal_end`) VALUES
(1, 4, 'ASUS VIVOBOOK E1504G', 'ASUS', 'LAPTOPS', 'DEAL OF THE DAYS', '<p>Stamp your style on the world with Vivobook 15, the feature-packed laptop that makes it easy to get things done, anywhere. Everything about Vivobook 15 is bold and improved, from its powerful 13th Gen Intel® Core™ processor to its crisp and clear display, 180° lay-flat hinge, modern colors and sleek geometric design. Make a fresh start today with Vivobook 15!</p>', 120000.00, 150000.00, '1 year Warranty', 'In Stock', 8, 1, 'ProductImages/pWCa69tf2wLxNzDgqtXA.png', '2025-02-16 23:08:19', '2026-02-19 10:52:45', '2025-09-10', '2027-12-26'),
(2, 5, 'ASUS TUF GAMING F15', 'ASUS', 'LAPTOPS', 'DEAL OF THE DAYS', '<p>Geared for serious gaming and rocking a slick new style, TUF Gaming F15 is a feature-packed Windows 11 Home gaming laptop with the power to carry you to victory. The new GeForce RTX 2050 GPU delivers fluid gameplay on, while the potent Intel Core i5 11th gen H-Series CPU is bolstered by improved cooling that amps CPU performance and keeps acoustics stealthy. A TUF’s military-grade durability keeps you on your best game anywhere.</p>', 255000.00, 265000.00, '1 year Warranty', 'Out of Stock', 199, 1, 'ProductImages/iVGzTGVs2NAUbVMXOWWE.png', '2025-02-17 00:31:31', '2026-02-19 10:54:47', '2025-04-18', '2027-04-30'),
(3, 6, 'MSI STEALTH 16 MERCEDES-AMG', 'MSI', 'LAPTOPS', 'Top Rated', 'MSI Stealth series x Mercedes-AMG Motorsport BUILT TO PERFORM. The cornerstone of the AMG experience paired with MSI cooling technology paves the road to success in gaming. LUXURIOUS TOUCH The collaborative design seamlessly blends the subtle elegance of Mercedes-Benz with striking red accents that symbolize both the AMG performance and the spirited essence of MSI.', 1225000.00, 1225000.00, '1 year Warranty', 'In Stock', 29, 1, 'ProductImages/QsFQdNTbG7At3IioapsV.png', '2025-02-17 00:38:49', '2026-02-19 10:54:47', NULL, NULL),
(4, 7, 'ASUS ZENBOOK 14X OLED', 'ASUS', 'LAPTOPS', 'DEAL OF THE DAYS', 'Operating System: Windows 11 Home - ASUS recommends Windows 11 Pro for business.', 255000.00, 255000.00, '2 year Warranty', 'In Stock', 177, 1, 'ProductImages/a8pCqXYoWjvZ7vECbCW8.png', '2025-02-19 01:01:39', '2026-02-19 10:54:47', '2025-08-02', '2025-08-26'),
(5, 4, 'ACER ASPIRE 3', 'ACER', 'LAPTOPS', 'DEAL OF THE DAYS', 'Processor &amp; Chipset: Processor Type: Ryzen™ 5, Processor Model: AMD Ryzen™ 5 7520U quad-core processor (up to 2 MB L2 cache, up to 4MB L3 cache, 2.8 GHz with boost up to 4.3 GHz)', 155000.00, 155000.00, '6 months warranty', 'In Stock', 97, 1, 'ProductImages/sbowJlIg9gBnhSlKWKyw.webp', '2025-02-19 01:03:35', '2026-03-08 08:45:40', '2025-04-07', '2025-04-25'),
(6, 5, 'ARRIVAL MSI THIN GF63 12UCX I5 12TH GEN', 'MSI', 'LAPTOPS', 'DEAL OF THE DAYS', 'Intel Core i5-12450H Processor', 252500.00, 252500.00, '1 year warrenty', 'In Stock', 92, 1, 'ProductImages/pXUdj3i6pB0MiVRE9VHN.webp', '2025-02-19 01:05:01', '2026-02-19 10:54:47', '2025-04-18', '2025-05-15'),
(7, 6, 'ASUS ROG STRIX HELIOS RGB GAMING CASE', 'ASUS', 'CASINGS', 'New Arrivals', 'Premium mid-tower gaming case with aluminum frame, tempered glass panels, and versatile cooling options.', 106000.00, 106000.00, '3 year warrenty', 'In Stock', 96, 1, 'ProductImages/mUmCYPEpnBwwxmrPs55l.webp', '2025-02-19 01:06:08', '2026-02-19 10:54:47', NULL, NULL),
(8, 7, 'IPHONE 16 PRO MAX', 'APPLE', 'APPLE PRODUCTS', 'Top Rated', 'Apple\'s latest flagship smartphone featuring an advanced camera system, A18 Pro chip, and Super Retina XDR display.', 520000.00, 520000.00, '1 year warrenty', 'Out of Stock', 99, 1, 'ProductImages/KbC0NCKd7SA0WLMO3T8b.webp', '2025-02-19 01:19:35', '2026-02-19 10:54:47', NULL, NULL),
(9, 4, 'REDRAGON JUNO G818 WIRELESS GAMEPAD', 'REDRAGON', 'GAMING CONSOLE', 'Top Rated', 'A high-performance wireless gamepad with Bluetooth and wired connectivity, featuring a 6-axis sensor, high-precision 3D joystick, and backlit buttons for an immersive gaming experience.', 10400.00, 10400.00, '1 year warrenty', 'In Stock', 200, 1, 'ProductImages/e7Ou5i9na1agPxbD6xOO.webp', '2025-02-24 22:04:58', '2026-02-19 10:54:47', NULL, NULL),
(10, 5, 'G.SKILL TRIDENT Z NEO RGB 16GB (8X2) 3200MHZ MEMORY', 'TRIDENT', 'RAM', 'Featured', 'High-performance DDR4 memory kit with RGB lighting, optimized for gaming and overclocking.', 18000.00, 18000.00, '1 year warrenty', 'In Stock', 20, 1, 'ProductImages/yg1ipxEcgRqQqn1n6wuK.webp', '2025-02-24 22:07:46', '2026-02-19 10:54:47', NULL, NULL),
(11, 6, 'MSI PRO B760M-P DDR5 MOTHERBOARD', 'MSI', 'MOTHERBOARD', 'New Arrivals', 'MSI PRO B760M-P DDR5 motherboard supports Intel® Core™ 14th/13th/12th Gen processors with DDR5 memory, offering features like PCIe 4.0, dual-channel memory, multiple USB ports, HDMI, DisplayPort, and RAID support for an efficient system.', 50000.00, 50000.00, '2 year warrenty', 'In Stock', 193, 1, 'ProductImages/F3m0jBZWjauOUuhcw9lN.webp', '2025-02-25 07:55:58', '2026-02-19 10:54:47', NULL, NULL),
(12, 7, 'AMD RYZEN 5 3600 PROCESSOR', 'AMD', 'PROCESSOR', 'New Arrivals', '<p>A 6-core, 12-thread processor with a base clock of 3.6GHz and a max boost clock of 4.2GHz. Built on 7nm technology, it supports PCIe 4.0 and offers excellent performance for gaming and productivity.</p>', 39000.00, 39000.00, '1 year Warranty', 'In Stock', 199, 2, 'ProductImages/gHKhV8KpbV47HolMwByD.webp', '2025-02-25 07:56:52', '2026-02-19 10:54:47', NULL, NULL),
(13, 4, 'CORSAIR CV550 — 550 WATT 80 PLUS® BRONZE CERTIFIED PSU', 'CORSAIR', 'POWER SUPPLY', 'DEAL OF THE DAYS', '<p>The CORSAIR CV550 is a reliable 550W power supply with 80 PLUS Bronze certification, ensuring energy efficiency and stable power delivery. It features multiple protection mechanisms and a compact ATX form factor for seamless compatibility.</p>', 211000.00, 211000.00, '6 months warranty', 'In Stock', 196, 1, 'ProductImages/OdESwmk59iljdrVPqhEc.webp', '2025-02-25 07:57:51', '2026-02-19 10:54:47', '2025-08-07', '2025-11-13'),
(14, 5, 'GTX 1050TI 4GB Graphics Card - USED', 'GTX', 'GRAPHIC CARDS', 'DEAL OF THE DAYS', '<p>The GeForce® GTX 1050 Ti 4GB Graphics Card offers impressive performance with a memory clock of 7008 MHz, 768 CUDA® cores, and support for high resolutions up to 7680x4320. Ideal for gaming and multimedia applications.</p>', 30000.00, 30000.00, '1 year Warranty', 'Used', 187, 1, 'ProductImages/cvyBvqyzSRlvYQxr5kf1.webp', '2025-02-25 07:58:39', '2026-02-19 10:54:47', '2025-08-07', '2025-10-16'),
(15, 6, 'Iphone 11', 'Apple', 'APPLE PRODUCTS', 'Top Rated', '<p>Apple Intelligence is the personal intelligence system that helps you write, express yourself, and get things done effortlessly. With groundbreaking privacy protections, it gives you peace of mind that no one else can access your data — not even Apple.</p>', 75000.00, 85000.00, '1 year Warranty', 'In Stock', 199, 1, 'ProductImages/uzTIGYHODxylZLtYV6bF.png', '2025-02-26 10:13:05', '2026-02-19 10:54:47', NULL, NULL),
(16, 7, 'MSI MAG CORELIQUID 240R V2 COOLER', 'MSI', 'COOLING & LIGHTING', 'DEAL OF THE DAYS', '<p>The MSI MAG CORELIQUID 240R V2 is an all-in-one liquid CPU cooler featuring a 240mm radiator, dual ARGB fans, and a rotatable pump head. Designed for efficient cooling and compatibility with the latest Intel and AMD sockets.</p>', 38000.00, 37000.00, '2 year Warranty', 'In Stock', 997, 1, 'ProductImages/jQ55YycLtL8rcVHkxfX8.jpg', '2025-04-10 14:22:09', '2026-02-19 10:54:47', '2025-04-09', '2025-04-14'),
(17, 4, 'Intel Core i9', 'Intel', 'PROCESSOR', 'New Arrivals', 'The fastest Intel processor is the i9--12900K. It&#039;s faster than the Ryzen 9 5950X in most games, and has similar performance in most productivity tasks. The best high-end Intel processor for gaming is the i5--12600K.', 85000.00, 89000.00, '1 year Warranty', 'In Stock', 87, 1, 'ProductImages/VZnplUs1wjVP6rUlVtpQ.png', '2025-04-16 03:02:22', '2026-02-19 10:54:47', NULL, NULL),
(18, 5, 'LapTop', 'MSI', 'LAPTOPS', 'New Arrivals', '<p><strong>Display</strong>    <em>Full Hd</em><strong><br /></strong></p>\n<p><strong>Ram </strong><em>   8GB</em></p>\n<p><strong>Hard </strong><em>  SSD256</em></p>', 250000.00, 300000.00, '1 year warrenty', 'In Stock', 2, 2, 'ProductImages/CbayAcsckOsFc2jYLKjB.jpeg', '2025-04-29 08:06:38', '2026-02-19 10:54:47', NULL, NULL),
(19, 6, 'MSI Lap', 'MSI', 'LAPTOPS', 'New Arrivals', '<p><strong>Ram </strong>            6GB</p>\n<p><strong>Fan  </strong>             Double Fan</p>', 400000.00, 420000.00, '1 year warrenty', 'In Stock', 4000, 2, 'ProductImages/lipoMe7LIVEYZrQXZHOb.jpeg', '2025-04-29 08:21:42', '2026-02-19 10:54:47', NULL, NULL),
(20, 7, 'Test 4', 'MSI', 'LAPTOPS', 'New Arrivals', '<p><em><strong>FFF</strong></em>  908</p>\n<p><em><strong>HHH</strong></em> 8989</p>\n<p><strong>Ram </strong>            6GB</p>\n<p><strong>Fan  </strong>             Double Fan</p>\n<p><strong>Ram </strong>            6GB</p>\n<p><strong>Fan  </strong>             Double Fan</p>', 300.00, 250.00, '1 year warrenty', 'In Stock', 500, 2, 'ProductImages/IEqUqa69u6eXD1BrQMIE.jpeg', '2025-04-29 08:24:13', '2026-02-19 10:54:47', NULL, NULL),
(21, 4, 'AAAA', 'aaaa', 'LAPTOPS', 'New Arrivals', '<ol><li><span></span><strong>ABCDE</strong> : BCDE</li><li><span></span>hfhffjhfejke : jkuuuhui</li></ol>', 2.00, 2.00, '1 year warrenty', 'In Stock', 200, 2, 'ProductImages/TPJ0vvvCTuRR3yNImJhS.jpeg', '2025-04-30 10:12:04', '2026-02-19 10:54:47', NULL, NULL),
(22, 4, 'HP Pavilion 15', 'Hp', 'LAPTOPS', 'DEAL OF THE DAYS', 'The HP Pavilion 15 is a well-balanced everyday laptop designed for smooth multitasking and productivity. It features a 13th Gen Intel Core i5 processor, delivering fast and efficient performance for work, study, or entertainment. With 16GB of RAM and a 512GB SSD, it ensures quick boot times, seamless app switching, and ample storage space. The 15.6-inch Full HD display offers vibrant visuals, while Intel Iris Xe Graphics provide crisp rendering for casual gaming and media editing. Ideal for students, professionals, or home users who need reliability with style.', 215000.00, 24000.00, '1 year Warranty', 'In Stock', 188, 1, 'ProductImages/btMRdg6gFAwZPNNwoqMc.png', '2025-07-28 08:37:12', '2026-02-19 08:40:15', '2025-07-28', '2025-08-14'),
(23, 6, '1 TB HDD - SpinTech', 'MaxStorage HDD', 'STORAGE & NAS', 'New Arrivals', '<p>1 TB Hard Disk Drive offering large storage capacity with stable performance and quiet operation.</p>', 20000.00, 15000.00, '6 months warranty', 'In Stock', 198, 1, 'ProductImages/wJhRtAuNPE8LIzbLaPjf.png', '2025-08-08 07:03:37', '2026-02-19 10:54:47', NULL, NULL),
(24, 7, 'Arctic Breeze Pro', 'CoolMaster', 'COOLING & LIGHTING', 'New Arrivals', '<p>High-performance 120mm cooling fan with RGB lighting, ultra-quiet operation, and optimized airflow for effective heat dissipation. Perfect for gaming PCs and workstations.</p>', 8000.00, 10000.00, '3 year Warranty', 'In Stock', 2000, 1, 'ProductImages/VTzJY6DUm90eJrd86kyJ.png', '2025-08-08 07:27:52', '2026-02-19 10:54:47', NULL, NULL),
(25, 4, 'VisionX 27Q', 'ScreenTech', 'MONITORS & ACCESSORIES', 'New Arrivals', '<p>27-inch QHD monitor with 2560x1440 resolution, 144Hz refresh rate, and AMD FreeSync support for smooth gaming and vibrant visuals. Sleek design with adjustable stand.</p>', 50000.00, 55000.00, '3 year Warranty', 'In Stock', 296, 1, 'ProductImages/lm4hZ8sirlJwDg9bWurI.png', '2025-08-08 07:34:00', '2026-02-19 10:54:47', NULL, NULL),
(26, 5, 'MSI B450 Tomahawk MAX II', 'MSI', 'MOTHERBOARD', 'New Arrivals', '<p>Reliable ATX motherboard with AMD AM4 socket, DDR4 support, enhanced VRM cooling, and RGB lighting — ideal for gaming and productivity builds.</p>', 17500.00, 19990.00, '3 year Warranty', 'In Stock', 300, 1, 'ProductImages/nIBuOJvasUDbpmqzXQJy.png', '2025-08-10 10:01:49', '2026-02-19 10:54:47', NULL, NULL),
(27, 6, 'Corsair Vengeance LPX 16GB (2x8GB) DDR4 3200MHz', 'Corsair', 'RAM', 'New Arrivals', '<p>High-performance DDR4 memory designed for gamers and PC enthusiasts, featuring aluminum heat spreaders and optimized compatibility for Intel and AMD platforms.</p>', 12500.00, 14500.00, '1 year Warranty', 'In Stock', 98, 1, 'ProductImages/71djBohn8o6D6cNXK2Jy.png', '2025-08-10 10:09:15', '2026-02-19 10:54:47', NULL, NULL),
(28, 7, 'abcde', 'msi', 'LAPTOPS', 'New Arrivals', '<p>abcde</p>', 2000.00, 4000.00, '1 year Warranty', 'In Stock', 200, 2, 'ProductImages/aZaHdmkUuiujKDNEElxA.jpg', '2026-02-18 12:43:50', '2026-02-19 12:10:40', NULL, NULL),
(29, 4, 'Intel Core i9-13900K', 'Intel', 'PROCESSOR', 'Top Rated', '<p>The Intel Core i9-13900K is Intel&#039;s flagship 13th Gen Raptor Lake processor featuring 24 cores (8P&#43;16E) and 32 threads. Ideal for gaming, content creation, and workstation workloads.</p>', 189900.00, 199900.00, '3 year Warranty', 'In Stock', 15, 1, 'ProductImages/hQHbAG4b9QywrTIjkILC.jpg', '2026-02-18 12:47:25', '2026-02-19 10:54:47', NULL, NULL),
(30, 5, 'Intel Core i5-13600K', 'Intel', 'PROCESSOR', 'Featured', '<p>The i5-13600K delivers outstanding mid-range performance with 14 cores and 20 threads. Excellent value for gaming and productivity.</p>', 79900.00, 89900.00, '3 year Warranty', 'In Stock', 25, 1, 'ProductImages/L3QGOaMcD9tki2OXAuGi.jpg', '2026-02-18 12:47:25', '2026-02-19 10:59:15', NULL, NULL),
(31, 6, 'AMD Ryzen 9 7950X', 'AMD', 'PROCESSOR', 'Top Rated', '<p>AMD&#039;s top-tier Zen 4 processor with 16 cores and 32 threads. Best-in-class multi-core performance for professional workloads.</p>', 195000.00, 210000.00, '3 year Warranty', 'In Stock', 10, 1, 'ProductImages/m8bGWOO7aIqHE6jcNXcE.webp', '2026-02-18 12:47:25', '2026-02-19 10:59:51', NULL, NULL),
(32, 7, 'AMD Ryzen 5 7600X', 'AMD', 'PROCESSOR', 'New Arrivals', '<p>The Ryzen 5 7600X offers excellent gaming performance with 6 cores and 12 threads on the AM5 platform with DDR5 support.</p>', 59900.00, 65000.00, '3 year Warranty', 'In Stock', 30, 1, 'ProductImages/k9v96qfBDafUCHZ4Ktzn.png', '2026-02-18 12:47:25', '2026-02-19 11:00:22', NULL, NULL),
(33, 4, 'ASUS ROG STRIX Z790-E Gaming WiFi', 'ASUS', 'MOTHERBOARD', 'Top Rated', '<p>Premium Z790 ATX motherboard for Intel 12th/13th/14th Gen. Features PCIe 5.0, DDR5, Wi-Fi 6E, and extensive thermal management.</p>', 149900.00, 165000.00, '3 year Warranty', 'In Stock', 8, 1, 'ProductImages/VIMmUjA8e1gc0yBRVvce.png', '2026-02-18 12:47:25', '2026-02-19 11:00:54', NULL, NULL),
(34, 5, 'MSI MAG B650 TOMAHAWK WiFi', 'MSI', 'MOTHERBOARD', 'Featured', '<p>AMD B650 ATX board for Ryzen 7000 series. Excellent power delivery, 4x DDR5 slots, and Wi-Fi 6E included.</p>', 89900.00, 98000.00, '3 year Warranty', 'In Stock', 12, 1, 'ProductImages/uOidka2bdLBNtCURK0NT.png', '2026-02-18 12:47:25', '2026-02-19 11:01:24', NULL, NULL),
(35, 6, 'Gigabyte B760M DS3H DDR4', 'Gigabyte', 'MOTHERBOARD', 'None', '<p>Budget-friendly Micro-ATX Intel B760 board supporting DDR4 RAM. Great entry point for 12th/13th Gen Intel builds.</p>', 34900.00, 38000.00, '3 year Warranty', 'In Stock', 20, 1, 'ProductImages/KZtU2JxctXuL4G8JGWUz.png', '2026-02-18 12:47:25', '2026-02-19 11:02:02', NULL, NULL),
(36, 7, 'Corsair Vengeance DDR5-5600 32GB (2x16GB)', 'Corsair', 'RAM', 'Featured', '<p>High-speed DDR5 dual-channel kit optimized for Intel and AMD DDR5 platforms. XMP 3.0 ready.</p>', 34900.00, 39900.00, '3 year Warranty', 'In Stock', 40, 1, 'ProductImages/7hA08T0UuhAYA5f3z9zh.webp', '2026-02-18 12:47:25', '2026-02-19 11:02:39', NULL, NULL),
(37, 4, 'Kingston FURY Beast DDR4-3200 16GB (2x8GB)', 'Kingston', 'RAM', 'None', '<p>Entry-level yet reliable DDR4 dual-channel kit at 3200MHz with XMP 2.0 profile support.</p>', 14900.00, 17000.00, '3 year Warranty', 'In Stock', 60, 1, 'ProductImages/YrkuXYlS8Z0OQbwx6Bsq.jpg', '2026-02-18 12:47:25', '2026-02-19 11:03:09', NULL, NULL),
(38, 5, 'G.Skill Trident Z5 DDR5-6000 64GB (2x32GB)', 'G.Skill', 'RAM', 'Top Rated', '<p>Enthusiast DDR5 kit running at 6000MHz for workstations and high-performance gaming rigs. RGB lighting included.</p>', 74900.00, 82000.00, '3 year Warranty', 'In Stock', 18, 1, 'ProductImages/geAIn0h5bfmcIjOqeZ63.webp', '2026-02-18 12:47:25', '2026-02-19 11:03:52', NULL, NULL),
(39, 6, 'NVIDIA RTX 4090 24GB GDDR6X', 'NVIDIA', 'GRAPHIC CARDS', 'Top Rated', '<p>NVIDIA&#039;s flagship Ada Lovelace GPU. Unmatched 4K gaming performance, ray tracing, and DLSS 3.0. 24GB GDDR6X VRAM for extreme workloads.</p>', 485000.00, 520000.00, '3 year Warranty', 'In Stock', 5, 1, 'ProductImages/r1ZjJhnRs2fbJDuz7sdi.webp', '2026-02-18 12:47:25', '2026-02-19 11:05:55', NULL, NULL),
(40, 7, 'NVIDIA RTX 4070 12GB GDDR6X', 'NVIDIA', 'GRAPHIC CARDS', 'Featured', '<p>Excellent 1440p gaming GPU with Ada Lovelace architecture, DLSS 3.0, and 12GB GDDR6X VRAM. Great price-to-performance ratio.</p>', 189900.00, 205000.00, '3 year Warranty', 'In Stock', 12, 1, 'ProductImages/AhvBVGXsjZbTorIKxYQv.png', '2026-02-18 12:47:25', '2026-02-19 11:06:24', NULL, NULL),
(41, 4, 'AMD Radeon RX 7900 XTX 24GB', 'AMD', 'GRAPHIC CARDS', 'Top Rated', '<p>AMD&#039;s flagship RDNA 3 GPU with 24GB GDDR6 and exceptional rasterization performance for 4K gaming.</p>', 349000.00, 375000.00, '3 year Warranty', 'In Stock', 7, 1, 'ProductImages/etpcxIrftZnwRF7yTLW4.png', '2026-02-18 12:47:25', '2026-02-19 11:07:14', NULL, NULL),
(42, 5, 'NVIDIA RTX 4060 8GB GDDR6', 'NVIDIA', 'GRAPHIC CARDS', 'New Arrivals', '<p>Budget-friendly 1080p/1440p GPU for mainstream gaming. Low 115W TDP makes it ideal for small form-factor builds.</p>', 99900.00, 109000.00, '3 year Warranty', 'In Stock', 22, 1, 'ProductImages/qKgCNncJVpT0freHDgjj.png', '2026-02-18 12:47:25', '2026-02-19 11:08:31', NULL, NULL),
(43, 6, 'Corsair RM1000x 1000W 80+ Gold Fully Modular', 'Corsair', 'POWER SUPPLY', 'Featured', '<p>Fully modular 1000W ATX PSU with 80&#43; Gold efficiency. Zero RPM fan mode for silent operation under light loads. 10-year warranty.</p>', 59900.00, 67000.00, '3 year Warranty', 'In Stock', 15, 1, 'ProductImages/NXVk4bNOhvyz50CPcGBz.png', '2026-02-18 12:47:25', '2026-02-19 11:08:52', NULL, NULL),
(44, 7, 'Seasonic FOCUS GX-750 750W 80+ Gold', 'Seasonic', 'POWER SUPPLY', 'Top Rated', '<p>High-quality 750W fully modular PSU from Seasonic. 80&#43; Gold certified with a 10-year warranty. Ideal for mid to high-end builds.</p>', 42900.00, 47900.00, '3 year Warranty', 'In Stock', 20, 1, 'ProductImages/Ci5dAbVRpx3ZlJdsr7S1.webp', '2026-02-18 12:47:25', '2026-02-19 11:09:16', NULL, NULL),
(45, 4, 'Cooler Master MWE 550W 80+ Bronze', 'Cooler Master', 'POWER SUPPLY', 'None', '<p>Entry-level 550W PSU with 80&#43; Bronze certification. Semi-modular design keeps cables tidy. Good value for budget builds.</p>', 17900.00, 21000.00, '3 year Warranty', 'In Stock', 35, 1, 'ProductImages/7mPGJurHhm1wc1PFXxes.png', '2026-02-18 12:47:25', '2026-02-19 11:09:43', NULL, NULL),
(46, 5, 'Samsung 990 Pro 2TB PCIe 4.0 NVMe', 'Samsung', 'STORAGE & NAS', 'Top Rated', '<p>Flagship PCIe 4.0 NVMe SSD with sequential read speeds up to 7450 MB/s. 2TB capacity for demanding workloads.</p>', 39900.00, 44900.00, '3 year Warranty', 'In Stock', 25, 1, 'ProductImages/Edat7u5gx8yxrLCM45kP.png', '2026-02-18 12:47:25', '2026-03-02 14:43:42', NULL, NULL),
(47, 6, 'WD Black SN850X 1TB PCIe 4.0 NVMe', 'Western Digital', 'STORAGE & NAS', 'Featured', '<p>Gaming-optimized NVMe SSD with 7300 MB/s read speeds. Includes optional heatsink. PlayStation 5 compatible.</p>', 22900.00, 26900.00, '2 year Warranty', 'In Stock', 30, 1, 'ProductImages/lVO22lLobMcV5vT5iUmd.webp', '2026-02-18 12:47:25', '2026-03-02 14:44:11', NULL, NULL),
(48, 7, 'Kingston NV2 500GB PCIe 3.0 NVMe', 'Kingston', 'STORAGE & NAS', 'None', '<p>Budget-friendly NVMe SSD with 3500 MB/s read speeds. Perfect as a boot drive for budget and mid-range builds.</p>', 8900.00, 10500.00, '3 year Warranty', 'In Stock', 50, 1, 'ProductImages/BbFPyTELUk2sjPfJ8QGl.jpg', '2026-02-18 12:47:25', '2026-03-02 14:44:22', NULL, NULL),
(49, 4, 'Seagate Barracuda 2TB 3.5\" SATA HDD', 'Seagate', 'STORAGE & NAS', 'None', '<p>Reliable 2TB 3.5&#34; SATA hard drive at 7200 RPM. Ideal for bulk storage alongside an SSD in desktop builds.</p>', 12900.00, 14500.00, '2 year Warranty', 'In Stock', 40, 1, 'ProductImages/3j0KCcE8NVseGnO9Cfam.jpg', '2026-02-18 12:47:25', '2026-03-02 14:44:36', NULL, NULL),
(50, 5, 'WD Blue 4TB 3.5\" SATA HDD', 'Western Digital', 'STORAGE & NAS', 'None', '<p>4TB desktop HDD at 5400 RPM. Low noise, reliable, and great for media storage or NAS setups.</p>', 18900.00, 21000.00, '2 year Warranty', 'In Stock', 30, 1, 'ProductImages/DNsEuKor9Jk7qJgQSg97.jpg', '2026-02-18 12:47:25', '2026-03-02 14:44:49', NULL, NULL),
(51, 6, 'Synology DS923+ 4-Bay NAS', 'Synology', 'STORAGE & NAS', 'Featured', '<p>4-bay NAS for home and business with AMD Ryzen R1600 dual-core, 4GB ECC RAM, and 2x 1GbE &#43; optional 10GbE support.</p>', 109000.00, 120000.00, '3 year Warranty', 'In Stock', 6, 1, 'ProductImages/4VAn5GdcXnqSgMjRAXzg.jpg', '2026-02-18 12:47:25', '2026-02-19 11:16:03', NULL, NULL),
(52, 7, 'Lian Li PC-O11 Dynamic EVO ATX Mid Tower', 'Lian Li', 'CASINGS', 'Top Rated', '<p>Premium dual-chamber ATX case with tempered glass panels. Excellent airflow and radiator support. Supports E-ATX, ATX, mATX and ITX boards.</p>', 34900.00, 39000.00, '1 year Warranty', 'In Stock', 15, 1, 'ProductImages/rsmdlPpM16HlCP7WC2C6.jpg', '2026-02-18 12:47:25', '2026-02-19 11:16:46', NULL, NULL),
(53, 4, 'NZXT H510 Flow ATX Mid Tower', 'NZXT', 'CASINGS', 'Featured', '<p>Clean, minimalist ATX mid-tower with perforated front panel for improved airflow. Tempered glass side panel included.</p>', 24900.00, 28000.00, '2 year Warranty', 'In Stock', 20, 1, 'ProductImages/ZiNOd3TiqvslK980p8Eq.webp', '2026-02-18 12:47:25', '2026-02-19 11:17:07', NULL, NULL),
(54, 5, 'Cooler Master MasterBox Q300L mATX Mini Tower', 'Cooler Master', 'CASINGS', 'None', '<p>Compact mATX case with magnetic dust filter and modular design. Ideal for budget micro-ATX builds.</p>', 11900.00, 13500.00, '1 year Warranty', 'In Stock', 25, 1, 'ProductImages/NCrYHvN6sH1RRtCs3ozr.png', '2026-02-18 12:47:25', '2026-02-19 11:17:31', NULL, NULL),
(55, 6, 'NZXT Kraken X73 360mm AIO Liquid Cooler', 'NZXT', 'COOLING & LIGHTING', 'Top Rated', '<p>360mm AIO CPU cooler with three 120mm Aer RGB fans and an LCD pump head display. Exceptional thermal performance.</p>', 39900.00, 45000.00, '6 months warranty', 'In Stock', 12, 1, 'ProductImages/GVNUqq8S8cnGeD3BKnN9.png', '2026-02-18 12:47:25', '2026-02-19 11:17:57', NULL, NULL),
(56, 7, 'Noctua NH-D15 Dual Tower Air Cooler', 'Noctua', 'COOLING & LIGHTING', 'Featured', '<p>Industry-leading dual tower air cooler with dual 140mm NF-A15 fans. Remarkably quiet and capable of handling 250W TDP CPUs.</p>', 29900.00, 33000.00, '2 year Warranty', 'In Stock', 10, 1, 'ProductImages/ErBBNHDrhScsTDSOyu0n.webp', '2026-02-18 12:47:25', '2026-02-19 11:18:34', NULL, NULL),
(57, 4, 'Lian Li UNI FAN SL120 RGB 3-Pack 120mm', 'Lian Li', 'COOLING & LIGHTING', 'New Arrivals', '<p>Daisy-chain RGB case fans with infinity mirror effect. 3-pack with controller included. Perfect for airflow and aesthetics.</p>', 14900.00, 17000.00, '1 year Warranty', 'In Stock', 20, 1, 'ProductImages/bik35yk2mfTBcQ2zJqBS.jpg', '2026-02-18 12:47:25', '2026-02-19 11:18:59', NULL, NULL),
(58, 5, 'be quiet! Silent Wings 4 140mm Case Fan', 'be quiet!', 'FANS', 'None', '<p>Ultra-silent 140mm case fan with optimized blade design. Ideal for noise-sensitive builds and home office setups.</p>', 3900.00, 4500.00, '3 year Warranty', 'In Stock', 50, 1, 'ProductImages/YhSWWsXck7DEX5wJ95Lv.jpg', '2026-02-18 12:47:25', '2026-02-19 11:19:24', NULL, NULL),
(59, 6, 'LG 27GP850-B 27\" QHD 165Hz IPS Gaming Monitor', 'LG', 'MONITORS & ACCESSORIES', 'Top Rated', '<p>27-inch QHD (2560x1440) IPS panel at 165Hz with 1ms response time. AMD FreeSync Premium and NVIDIA G-Sync Compatible.</p>', 74900.00, 82000.00, '3 year Warranty', 'In Stock', 10, 1, 'ProductImages/4Vt4OVZnKbrCiw1jWWYW.jpg', '2026-02-18 12:47:25', '2026-02-19 11:19:51', NULL, NULL),
(60, 7, 'Samsung Odyssey G9 49\" Ultra-Wide DQHD 240Hz', 'Samsung', 'MONITORS & ACCESSORIES', 'Featured', '<p>Massive 49-inch curved ultra-wide gaming monitor at 240Hz with G-Sync Ultimate and DisplayHDR 1000. The ultimate immersive gaming experience.</p>', 285000.00, 310000.00, '3 year Warranty', 'In Stock', 3, 1, 'ProductImages/GJleoWJcND1cgtEcJRvR.jpg', '2026-02-18 12:47:25', '2026-02-19 11:20:14', NULL, NULL),
(61, 4, 'Dell P2423D 24\" QHD IPS Professional Monitor', 'Dell', 'MONITORS', 'None', '<p>Business-grade 24&#34; QHD IPS monitor with USB-C 90W power delivery, excellent colour accuracy, and ergonomic stand.</p>', 59900.00, 65000.00, '3 year Warranty', 'In Stock', 10, 1, 'ProductImages/f0kft1mqTw3rL3r9S8cB.jpg', '2026-02-18 12:47:25', '2026-02-19 11:21:05', NULL, NULL),
(62, 5, 'Lenovo ThinkPad X1 Carbon Gen 11', 'Lenovo', 'LAPTOPS', 'Featured', '<p>Ultra-light business laptop at just 1.12kg. Intel Core i7-1365U, 32GB LPDDR5, 1TB NVMe SSD, 14&#34; 2.8K OLED display, and Thunderbolt 4.</p>', 349000.00, 385000.00, '1 year Warranty', 'In Stock', 6, 1, 'ProductImages/btMgZ7QkJsk8jWfbwcfT.jpg', '2026-02-18 12:47:25', '2026-02-19 11:22:11', NULL, NULL),
(63, 6, 'HP OMEN 16 Gaming Laptop RTX 4070', 'HP', 'LAPTOPS', 'Top Rated', '<p>High-performance gaming laptop with Intel i9-13900HX, RTX 4070 8GB, 32GB DDR5, 1TB SSD, and a 165Hz QHD IPS display.</p>', 419000.00, 449000.00, '1 year Warranty', 'In Stock', 5, 1, 'ProductImages/4uJxUaxpW18YbPcbFIUx.jpg', '2026-02-18 12:47:25', '2026-02-19 11:22:32', NULL, NULL),
(64, 7, 'ASUS ROG Strix SCAR 18 G834JYR', 'ASUS', 'ASUS ROG', 'Top Rated', '<p>Extreme gaming laptop featuring Intel i9-14900HX, NVIDIA RTX 4090 16GB, 64GB DDR5, 2TB NVMe RAID, and an 18&#34; QHD&#43; 240Hz mini-LED display.</p>', 689000.00, 750000.00, '2 year Warranty', 'In Stock', 3, 1, 'ProductImages/pTEjQcch6tQBRmWbWoGD.jpg', '2026-02-18 12:47:25', '2026-02-19 11:22:51', NULL, NULL),
(65, 4, 'Apple MacBook Pro 16\" M3 Max 48GB', 'Apple', 'APPLE PRODUCTS', 'Top Rated', '<p>The most powerful MacBook ever with Apple M3 Max chip, 48GB unified memory, 1TB SSD, and a Liquid Retina XDR 16.2&#34; display.</p>', 649000.00, 699000.00, '1 year Warranty', 'In Stock', 4, 1, 'ProductImages/7gqYA4F1Zl8qgCgjkWqY.webp', '2026-02-18 12:47:25', '2026-02-19 11:23:18', NULL, NULL),
(66, 5, 'Apple iPad Pro 12.9\" M2 Wi-Fi 256GB', 'Apple', 'APPLE PRODUCTS', 'Featured', '<p>iPad Pro with M2 chip, Liquid Retina XDR display, USB-C Thunderbolt, and Apple Pencil hover support.</p>', 195000.00, 215000.00, '1 year Warranty', 'In Stock', 8, 1, 'ProductImages/Bi6OhhCRDD31QbMw7jKE.jpg', '2026-02-18 12:47:25', '2026-02-19 11:23:41', NULL, NULL),
(67, 6, 'Sony PlayStation 5 Disc Edition', 'Sony', 'GAMING CONSOLE', 'Featured', '<p>Sony&#039;s flagship gaming console with AMD Zen 2 CPU, custom RDNA 2 GPU, 16GB GDDR6, and 825GB NVMe SSD. 4K gaming at up to 120fps.</p>', 139900.00, 155000.00, '1 year Warranty', 'In Stock', 20, 1, 'ProductImages/bgZxCZ71NVk6DGxZBIty.webp', '2026-02-18 12:47:25', '2026-02-19 11:24:14', NULL, NULL),
(68, 7, 'Microsoft Xbox Series X 1TB', 'Microsoft', 'GAMING CONSOLE', 'Top Rated', '<p>Xbox Series X delivers true 4K gaming at 60fps (up to 120fps), 1TB custom NVMe SSD, and Xbox Game Pass ready.</p>', 129900.00, 145000.00, '1 year Warranty', 'In Stock', 18, 1, 'ProductImages/OhLiaZYpJzLyqalC7xAb.webp', '2026-02-18 12:47:25', '2026-02-19 11:24:33', NULL, NULL),
(69, 4, 'Keychron Q3 Pro QMK/VIA Wireless Mechanical Keyboard', 'Keychron', 'KEYBOARDS', 'Top Rated', '<p>Compact TKL wireless mechanical keyboard with hot-swap PCB, gasket mount, and full QMK/VIA programmability. Available in Red/Brown/Blue switches.</p>', 24900.00, 28000.00, '1 year Warranty', 'In Stock', 20, 1, 'ProductImages/yVFp9O2eZLAx43LKv6C8.webp', '2026-02-18 12:47:25', '2026-02-19 11:24:58', NULL, NULL),
(70, 5, 'Logitech G Pro X TKL Gaming Keyboard', 'Logitech', 'KEYBOARDS', 'Featured', '<p>Tournament-grade TKL keyboard with GX Blue/Red switches, detachable USB cable, and programmable via Logitech G HUB.</p>', 19900.00, 22000.00, '2 year Warranty', 'In Stock', 25, 1, 'ProductImages/QTb0MhmaTygB8KHpgoQn.png', '2026-02-18 12:47:25', '2026-02-19 11:25:23', NULL, NULL),
(71, 6, 'Logitech G502 X Plus Wireless Gaming Mouse', 'Logitech', 'MOUSE', 'Top Rated', '<p>Flagship wireless gaming mouse with 25,600 DPI HERO 25K sensor, LIGHTFORCE hybrid switches, and up to 130-hour battery life.</p>', 22900.00, 26000.00, '2 year Warranty', 'In Stock', 30, 1, 'ProductImages/NGbwPqQz1O6C3mTR8l90.webp', '2026-02-18 12:47:25', '2026-02-19 11:26:21', NULL, NULL),
(72, 7, 'Razer DeathAdder V3 HyperSpeed', 'Razer', 'MOUSE', 'Featured', '<p>Ultra-lightweight wireless ergonomic gaming mouse at 64g. Features Razer Focus Pro 30K sensor and 90-hour battery life.</p>', 14900.00, 17000.00, '2 year Warranty', 'In Stock', 25, 1, 'ProductImages/jIjNVPV4z7KpEKrjulou.webp', '2026-02-18 12:47:25', '2026-02-19 11:26:40', NULL, NULL),
(73, 4, 'SteelSeries QcK Edge XL Gaming Mouse Pad', 'SteelSeries', 'MOUSE PAD', 'None', '<p>Extra-large cloth gaming mouse pad (900x300mm) with micro-woven surface for precision tracking. Non-slip rubber base.</p>', 4900.00, 5900.00, '1 months warranty', 'In Stock', 60, 1, 'ProductImages/uZBmWpjjphoWjR1EU9Pv.png', '2026-02-18 12:47:25', '2026-02-19 11:27:02', NULL, NULL),
(74, 5, 'Sony WH-1000XM5 Wireless Noise Cancelling Headphones', 'Sony', 'HEADSET', 'Top Rated', '<p>Industry-leading noise cancellation with 30-hour battery life, quick-charge support, and Hi-Res Audio certification.</p>', 69900.00, 78000.00, '1 year Warranty', 'In Stock', 15, 1, 'ProductImages/GRSgjQIsWYalaG6JBpGk.webp', '2026-02-18 12:47:25', '2026-02-19 11:27:28', NULL, NULL),
(75, 6, 'HyperX Cloud Alpha Wireless Gaming Headset', 'HyperX', 'HEADSET', 'Featured', '<p>300-hour battery wireless gaming headset with dual chamber drivers, detachable noise-cancelling microphone, and DTS Headphone:X Spatial Audio.</p>', 34900.00, 39000.00, '2 year Warranty', 'In Stock', 20, 1, 'ProductImages/DJouYP4jRasF9KiCEXfg.webp', '2026-02-18 12:47:25', '2026-02-19 11:27:48', NULL, NULL),
(76, 7, 'Logitech Z623 2.1 THX-Certified Speaker System', 'Logitech', 'SPEAKERS', 'None', '<p>400W peak power 2.1 speaker system with THX certification. Deep bass from the 8&#34; subwoofer and rich highs from the satellites.</p>', 24900.00, 28000.00, '2 year Warranty', 'In Stock', 12, 1, 'ProductImages/xz8sNyCaw5hYH0qALlj5.jpg', '2026-02-18 12:47:25', '2026-02-19 11:28:37', NULL, NULL),
(77, 4, 'APC Smart-UPS 1500VA LCD 900W 230V', 'APC', 'UPS', 'Featured', '<p>1500VA / 900W line-interactive UPS with LCD panel, automatic voltage regulation, and USB/serial connectivity. Ideal for desktop workstations in Sri Lanka.</p>', 64900.00, 72000.00, '2 year Warranty', 'In Stock', 10, 1, 'ProductImages/fs04bmtXWAzpiDLC7DCL.jpg', '2026-02-18 12:47:25', '2026-02-19 11:28:57', NULL, NULL),
(78, 5, 'APC Back-UPS 600VA 360W 230V', 'APC', 'UPS', 'None', '<p>Entry-level 600VA / 360W UPS for home office and basic desktop systems. Protects against power surges and blackouts.</p>', 18900.00, 22000.00, '2 year Warranty', 'In Stock', 25, 1, 'ProductImages/RjRD99iQpF3D7cJVSBFh.jpg', '2026-02-18 12:47:25', '2026-02-19 11:29:16', NULL, NULL),
(79, 6, 'Thermal Grizzly Kryonaut 1g High Performance', 'Thermal Grizzly', 'THERMAL PASTE', 'Top Rated', '<p>Premium non-conductive thermal compound with 12.5 W/mK thermal conductivity. Best choice for high-end CPU/GPU thermal management.</p>', 1900.00, 2400.00, '1 months warranty', 'In Stock', 80, 1, 'ProductImages/OZs2LDxM36j32gWuKjLE.webp', '2026-02-18 12:47:25', '2026-02-19 11:29:38', NULL, NULL),
(80, 7, 'Arctic MX-6 4g Thermal Compound', 'Arctic', 'THERMAL PASTE', 'None', '<p>Reliable, non-electrically conductive thermal paste with 12.6 W/mK rating. Easy to apply and clean. Great for mainstream builds.</p>', 1400.00, 1800.00, '1 months warranty', 'In Stock', 100, 1, 'ProductImages/hVdfuQPcAEFxpQkJHSxq.png', '2026-02-18 12:47:25', '2026-02-19 11:29:56', NULL, NULL),
(81, 4, 'NovaLink Vortex X Gaming Desktop (RTX 4080)', 'NovaLink', 'GAMING DESKTOPS', 'Featured', '<ol><li><span></span>Intel Core i9-13900K</li><li><span></span>NVIDIA RTX 4080 16GB</li><li><span></span>32GB DDR5 5600MHz</li><li><span></span>2TB PCIe 4.0 NVMe &#43; 4TB HDD</li><li><span></span>850W 80&#43; Gold PSU</li><li><span></span>360mm AIO Cooler</li></ol>', 579000.00, 629000.00, '1 year Warranty', 'In Stock', 3, 1, 'ProductImages/dcGmGk2at7xCmUgiOd3a.jpg', '2026-02-18 12:47:25', '2026-02-19 11:31:25', NULL, NULL),
(82, 5, 'NovaLink StartUp Budget Desktop (Ryzen 5)', 'NovaLink', 'BUDGET DESKTOP COMPUTERS', 'None', '<ol><li><span></span>AMD Ryzen 5 5600G (Integrated Graphics)</li><li><span></span>16GB DDR4 3200MHz</li><li><span></span>500GB NVMe SSD</li><li><span></span>550W 80&#43; Bronze PSU</li><li><span></span>mATX Case</li></ol>', 89000.00, 98000.00, '1 year Warranty', 'In Stock', 8, 1, 'ProductImages/HoaQ9uj7xUcmrTqSZd4L.jpg', '2026-02-18 12:47:25', '2026-02-19 11:31:55', NULL, NULL),
(83, 6, 'NovaLink ProStation W1 Workstation (Ryzen 9)', 'NovaLink', 'DESKTOP WORKSTATIONS', 'Featured', '<ol><li><span></span>AMD Ryzen 9 7950X (16 Cores)</li><li><span></span>NVIDIA RTX A4000 16GB</li><li><span></span>128GB DDR5 ECC</li><li><span></span>4TB NVMe SSD RAID</li><li><span></span>1000W Platinum PSU</li></ol>', 895000.00, 980000.00, '3 year Warranty', 'In Stock', 2, 1, 'ProductImages/yGpTF2qkyBCpI5GOS8CZ.jpg', '2026-02-18 12:47:25', '2026-02-19 11:32:21', NULL, NULL),
(84, 7, 'Cable Matters Active 8K DisplayPort 1.4 Cable 3m', 'Cable Matters', 'CABLES', 'None', '<p>8K&#64;60Hz and 4K&#64;144Hz DisplayPort 1.4 cable. Supports HBR3, HDR, and DSC. 3-meter length for desktop setups.</p>', 3900.00, 4500.00, '1 months warranty', 'In Stock', 40, 1, 'ProductImages/nIpJ2XFt90VSdhovQZSw.jpg', '2026-02-18 12:47:25', '2026-02-19 11:32:55', NULL, NULL),
(85, 4, 'Anker 100W USB-C to USB-C Braided Cable 1.8m', 'Anker', 'CABLES', 'None', '<p>100W fast charging USB-C cable with 10Gbps data transfer. Nylon braided for durability. Works with laptops, phones, and tablets.</p>', 2400.00, 2900.00, '1 months warranty', 'In Stock', 60, 1, 'ProductImages/z8AivZF9nfGZbrJclcq6.webp', '2026-02-18 12:47:25', '2026-02-19 11:33:16', NULL, NULL),
(86, 5, 'ASUS PCE-AXE59BT WiFi 6E PCIe Adapter', 'ASUS', 'EXPANSION CARDS & NETWORKING', 'None', '<p>PCIe Wi-Fi 6E &#43; Bluetooth 5.2 adapter. Tri-band 6GHz/5GHz/2.4GHz support for blazing-fast wireless connectivity for desktop PCs.</p>', 14900.00, 17000.00, '3 year Warranty', 'In Stock', 15, 1, 'ProductImages/NTwweKVcPoVqjoih8rt6.png', '2026-02-18 12:47:25', '2026-02-19 11:33:35', NULL, NULL),
(87, 6, 'Razer Huntsman V3 Pro Keyboard + DeathAdder V3 Bundle', 'Razer', 'KEYBOARDS, MOUSE & GAMEPADS', 'Featured', '<p>Complete gaming peripheral bundle including the Razer Huntsman V3 Pro full-size keyboard with analog optical switches and the DeathAdder V3 wired gaming mouse.</p>', 54900.00, 62000.00, '2 year Warranty', 'In Stock', 8, 1, 'ProductImages/zivNIb7Ns5GwkE4S7qNb.png', '2026-02-18 12:47:25', '2026-02-19 11:33:58', NULL, NULL),
(88, 7, 'Bose QuietComfort 45 Wireless Headphones', 'Bose', 'SPEAKERS & HEADPHONES', 'Top Rated', '<p>World-class noise cancellation in a lightweight design. 24-hour battery, Aware Mode for ambient sound, and plush ear cushions.</p>', 69900.00, 78000.00, '1 year Warranty', 'In Stock', 10, 1, 'ProductImages/LLc1ttvZmsZYcwgYoxgh.jpg', '2026-02-18 12:47:25', '2026-02-19 11:34:16', NULL, NULL),
(89, 4, 'Wacom Intuos Pro Large Creative Pen Tablet', 'Wacom', 'GRAPHICS TABLET / TAB', 'Featured', '<p>Professional pen tablet with 8192 levels of pressure, tilt recognition, multi-touch surface, and Bluetooth connectivity. Ideal for illustrators and designers.</p>', 89900.00, 98000.00, '1 year Warranty', 'In Stock', 6, 1, 'ProductImages/QleKbVZ4ydf8PZiKyXzE.jpg', '2026-02-18 12:47:25', '2026-02-19 11:35:39', NULL, NULL),
(90, 5, 'Elgato Stream Deck MK.2 15-Key', 'Elgato', 'LIVE STREAMING & RECORDING', 'Featured', '<p>15 customizable LCD keys for scene switching, media control, and app launching. The essential streaming control panel for OBS and Streamlabs.</p>', 29900.00, 34000.00, '2 year Warranty', 'In Stock', 10, 1, 'ProductImages/4Lba5YW6KchNKjarY4jJ.jpg', '2026-02-18 12:47:25', '2026-02-19 11:35:58', NULL, NULL),
(91, 6, 'Blue Yeti USB Condenser Microphone', 'Logitech', 'LIVE STREAMING & RECORDING', 'Top Rated', '<p>Professional USB condenser microphone with four polar patterns (cardioid, bidirectional, omnidirectional, stereo). Plug-and-play for streaming and podcasting.</p>', 22900.00, 26000.00, '2 year Warranty', 'In Stock', 12, 1, 'ProductImages/RTWtmwwxUs4Z0Uzh6BH9.jpg', '2026-02-18 12:47:25', '2026-02-19 11:37:20', NULL, NULL),
(92, 7, 'ASUS BW-16D1HT Internal Blu-ray Drive', 'ASUS', 'OPTICAL DRIVERS & PRINTERS', 'None', '<p>Internal 16x Blu-ray burner with M-DISC support for archival quality disc burning. SATA interface.</p>', 14900.00, 17000.00, '2 year Warranty', 'In Stock', 10, 1, 'ProductImages/290HGBgpC8Ibj232DZw8.png', '2026-02-18 12:47:25', '2026-02-19 11:37:37', NULL, NULL),
(93, 4, 'HP LaserJet Pro MFP M428fdw', 'HP', 'OPTICAL DRIVERS & PRINTERS', 'Featured', '<p>Multifunction laser printer/scanner/copier/fax with Wi-Fi, Ethernet, duplex printing, and 40 ppm print speed. Ideal for home offices.</p>', 84900.00, 93000.00, '1 year Warranty', 'In Stock', 6, 1, 'ProductImages/6m50gkrlSk7XuXCxPnFv.png', '2026-02-18 12:47:25', '2026-02-19 11:37:55', NULL, NULL),
(94, 5, 'Secretlab TITAN Evo 2022 Gaming Chair XL', 'Secretlab', 'CHAIRS', 'Top Rated', '<p>Premium gaming chair with patented 4-way L-ADAPT lumbar support, magnetic memory foam head pillow, and NEO Hybrid Leatherette upholstery.</p>', 119000.00, 135000.00, '3 year Warranty', 'In Stock', 6, 1, 'ProductImages/SGJFiQqUoJZnW7fCqIiS.webp', '2026-02-18 12:47:25', '2026-02-19 11:38:13', NULL, NULL),
(95, 6, 'FlexiSpot E7 Pro Electric Height-Adjustable Standing Desk 160x80cm', 'FlexiSpot', 'TABLES', 'Featured', '<p>Dual-motor electric standing desk with 125kg load capacity, programmable height memory, and anti-collision technology. 160x80cm bamboo surface.</p>', 89000.00, 98000.00, '3 year Warranty', 'In Stock', 4, 1, 'ProductImages/yETI1t5Urmg5OoKYVlQs.jpg', '2026-02-18 12:47:25', '2026-02-19 11:39:39', NULL, NULL),
(96, 7, 'Kaspersky Total Security 3 Devices 1 Year', 'Kaspersky', 'ANTIVIRUS SOFTWARE', 'None', '<p>Comprehensive security suite covering antivirus, firewall, VPN, parental controls, and password manager. Covers 3 devices for 1 year.</p>', 6900.00, 8500.00, '1 year Warranty', 'In Stock', 100, 1, 'ProductImages/3LUmoPT2ACdH2qDaTiDm.jpg', '2026-02-18 12:47:25', '2026-02-19 11:40:02', NULL, NULL),
(97, 4, 'Cisco Catalyst 2960-X 48-Port Managed Switch', 'Cisco', 'COMMERCIAL SOLUTIONS', 'None', '<p>Enterprise-grade 48-port Gigabit managed switch with 4x 10G SFP&#43; uplinks, full Layer 2 management, and Cisco IOS support.</p>', 189000.00, 210000.00, '1 year Warranty', 'In Stock', 3, 1, 'ProductImages/iIArr7DFbNMOGW61OmWQ.jpg', '2026-02-18 12:47:25', '2026-02-19 11:40:30', NULL, NULL),
(98, 5, 'NovaLink Gift Voucher — LKR 5,000', 'NovaLink', 'GIFT VOUCHER', 'None', '<p>A LKR 5,000 NovaLink Computers gift voucher redeemable on any in-store or online purchase. Perfect gift for tech enthusiasts.</p>', 5000.00, 5000.00, '6 months warranty', 'In Stock', 999, 1, 'ProductImages/M7cTl8vGI1Ryf9FQ7hAR.webp', '2026-02-18 12:47:25', '2026-02-19 11:40:56', NULL, NULL),
(99, 6, 'NovaLink Gift Voucher — LKR 10,000', 'NovaLink', 'GIFT VOUCHER', 'Featured', '<p>A LKR 10,000 NovaLink Computers gift voucher. Valid for 6 months from purchase date.</p>', 10000.00, 10000.00, '6 months warranty', 'In Stock', 999, 1, 'ProductImages/qR9YjspGrP01Sea5BK8v.webp', '2026-02-18 12:47:25', '2026-02-19 11:41:04', NULL, NULL),
(100, 7, 'Intel Core i3-12100F', 'Intel', 'PROCESSOR', 'None', '<p>Budget-friendly 4-core / 8-thread Alder Lake processor for entry-level gaming builds. No integrated graphics — pairs perfectly with a dedicated GPU.</p>', 21900.00, 24900.00, '3 year Warranty', 'In Stock', 35, 1, 'ProductImages/uwbDPKwaYJ2W2ZywzDrX.jpg', '2026-02-18 12:55:00', '2026-02-19 11:41:28', NULL, NULL),
(101, 4, 'Intel Core i5-12400F', 'Intel', 'PROCESSOR', 'None', '<p>6-core / 12-thread mid-range gaming CPU on the LGA1700 platform. Exceptional value — no integrated graphics, pairs best with a GPU.</p>', 38900.00, 43000.00, '3 year Warranty', 'In Stock', 28, 1, 'ProductImages/qC21X8yhHkL9WQJ6XAhd.jpg', '2026-02-18 12:55:00', '2026-02-19 11:42:12', NULL, NULL),
(102, 5, 'Intel Core i7-13700K', 'Intel', 'PROCESSOR', 'Featured', '<p>16-core (8P&#43;8E) / 24-thread enthusiast CPU. Excellent multi-core and gaming performance. Unlocked for overclocking on Z790/Z690 boards.</p>', 119000.00, 130000.00, '3 year Warranty', 'In Stock', 18, 1, 'ProductImages/85IZTaMGO4G9B0sP8J4q.jpg', '2026-02-18 12:55:00', '2026-02-19 11:42:26', NULL, NULL),
(103, 6, 'AMD Ryzen 3 4100', 'AMD', 'PROCESSOR', 'None', '<p>Entry-level 4-core / 8-thread AM4 processor for tight budget builds. Works with existing AM4 motherboards and DDR4 memory.</p>', 16900.00, 19000.00, '3 year Warranty', 'In Stock', 40, 1, 'ProductImages/rrxdZ9TrKyZkKIj4Q9zX.jpg', '2026-02-18 12:55:00', '2026-02-19 11:42:43', NULL, NULL),
(104, 7, 'AMD Ryzen 5 5600X', 'AMD', 'PROCESSOR', 'Top Rated', '<p>6-core / 12-thread Zen 3 AM4 CPU with excellent single-core IPC. Best-in-class 1080p gaming performance on the AM4 platform.</p>', 44900.00, 49900.00, '3 year Warranty', 'In Stock', 30, 1, 'ProductImages/4xqDbJpeVNv9luXxPErT.jpg', '2026-02-18 12:55:00', '2026-02-19 11:42:59', NULL, NULL),
(105, 4, 'AMD Ryzen 7 5800X3D', 'AMD', 'PROCESSOR', 'Top Rated', '<p>AMD&#039;s legendary 3D V-Cache gaming CPU. 8-core / 16-thread with 96MB L3 cache — the best gaming processor for the AM4 platform.</p>', 84900.00, 93000.00, '3 year Warranty', 'In Stock', 14, 1, 'ProductImages/YaPCtWKUCyviSDfIbvLw.jpg', '2026-02-18 12:55:00', '2026-02-19 11:43:19', NULL, NULL),
(106, 5, 'AMD Ryzen 7 7700X', 'AMD', 'PROCESSOR', 'Featured', '<p>8-core / 16-thread Zen 4 processor on AM5 platform. Excellent all-round performance for gaming and content creation with DDR5.</p>', 79900.00, 88000.00, '3 year Warranty', 'In Stock', 16, 1, 'ProductImages/2ZWoUXbabqtdZc3eYhD0.jpg', '2026-02-18 12:55:00', '2026-02-19 11:43:30', NULL, NULL),
(107, 6, 'AMD Ryzen 9 7900X', 'AMD', 'PROCESSOR', 'None', '<p>12-core / 24-thread Zen 4 processor on AM5. Exceptional multi-threaded performance for 3D rendering, video editing, and high-end gaming.</p>', 134900.00, 148000.00, '3 year Warranty', 'In Stock', 10, 1, 'ProductImages/hOPFqXCAVe645RU0CQUJ.jpg', '2026-02-18 12:55:00', '2026-02-19 11:43:51', NULL, NULL),
(108, 7, 'MSI PRO B760M-A DDR4 Micro-ATX', 'MSI', 'MOTHERBOARD', 'None', '<p>Entry-level Intel B760 mATX board with DDR4 support. Supports 12th/13th/14th Gen Intel CPUs. Great budget choice for office and gaming builds.</p>', 28900.00, 32000.00, '3 year Warranty', 'In Stock', 22, 1, 'ProductImages/WkGMimuJNe7WpsHOL3wo.png', '2026-02-18 12:55:00', '2026-02-19 11:44:16', NULL, NULL),
(109, 4, 'ASUS PRIME Z790-P DDR5 ATX', 'ASUS', 'MOTHERBOARD', 'Featured', '<p>Mid-range Intel Z790 ATX board with DDR5, PCIe 5.0 x16, 3x M.2 slots, and USB 3.2 Gen 2x2. Supports overclocking on 12th/13th/14th Gen Intel CPUs.</p>', 72900.00, 80000.00, '3 year Warranty', 'In Stock', 14, 1, 'ProductImages/tB8xQ5U12NIyjsiT0iRt.jpg', '2026-02-18 12:55:00', '2026-02-19 11:44:47', NULL, NULL),
(110, 5, 'Gigabyte Z790 AORUS Elite AX DDR5', 'Gigabyte', 'MOTHERBOARD', 'Top Rated', '<p>High-end Intel Z790 ATX board with Wi-Fi 6E, DDR5, PCIe 5.0 M.2, 20&#43;1&#43;2 VRM phases. Excellent for i9 overclocking builds.</p>', 109000.00, 120000.00, '3 year Warranty', 'In Stock', 8, 1, 'ProductImages/OQlnmfkZYSqeSfYu5b9L.jpg', '2026-02-18 12:55:00', '2026-02-19 11:45:04', NULL, NULL),
(111, 6, 'MSI A520M-A PRO Micro-ATX (AM4)', 'MSI', 'MOTHERBOARD', 'None', '<p>Budget AM4 mATX board for Ryzen 3000/4000/5000 series. DDR4 support, 1x M.2 NVMe, and solid VRM for everyday builds.</p>', 19900.00, 22500.00, '3 year Warranty', 'In Stock', 30, 1, 'ProductImages/5FX3E2WYtOLio7431XCp.png', '2026-02-18 12:55:00', '2026-02-19 11:45:53', NULL, NULL),
(112, 7, 'ASUS TUF Gaming B550-PLUS WiFi II ATX', 'ASUS', 'MOTHERBOARD', 'Featured', '<p>Reliable B550 ATX board for AMD Ryzen 5000/3000. Wi-Fi 6, 2x M.2, PCIe 4.0, and robust power delivery for mid-range builds.</p>', 54900.00, 61000.00, '3 year Warranty', 'In Stock', 16, 1, 'ProductImages/ivV3gRoyO4x3av7RetoJ.png', '2026-02-18 12:55:00', '2026-02-19 11:46:19', NULL, NULL),
(113, 4, 'Gigabyte X670 AORUS Elite AX (AM5)', 'Gigabyte', 'MOTHERBOARD', 'Top Rated', '<p>Feature-rich AMD X670 ATX board for Ryzen 7000 series. PCIe 5.0 x16, 4x M.2 (PCIe 5.0/4.0), Wi-Fi 6E, and USB4 40Gbps.</p>', 119000.00, 132000.00, '3 year Warranty', 'In Stock', 7, 1, 'ProductImages/o215vDNFJcwYHhOl6ynD.png', '2026-02-18 12:55:00', '2026-02-19 11:46:41', NULL, NULL),
(114, 5, 'ASRock B650M Pro RS WiFi mATX (AM5)', 'ASRock', 'MOTHERBOARD', 'None', '<p>Compact mATX AM5 board at a great price. Supports Ryzen 7000 series DDR5, 2x M.2, Wi-Fi 6E. Perfect for budget AM5 small-form-factor builds.</p>', 49900.00, 55000.00, '3 year Warranty', 'In Stock', 18, 1, 'ProductImages/oGu40FOMLuXfJwnIPcW9.png', '2026-02-18 12:55:00', '2026-02-19 11:46:59', NULL, NULL),
(115, 6, 'Crucial 8GB DDR4-3200 Single Stick', 'Crucial', 'RAM', 'None', '<p>Reliable single 8GB DDR4 stick at 3200MHz. Good starter option — can be paired with a second stick later for dual-channel.</p>', 6900.00, 7900.00, '3 year Warranty', 'In Stock', 70, 1, 'ProductImages/eoNhC3l8pjex3ew3aYm8.jpg', '2026-02-18 12:55:00', '2026-02-19 11:47:20', NULL, NULL),
(116, 7, 'Corsair Vengeance LPX DDR4-3600 32GB (2x16GB)', 'Corsair', 'RAM', 'Featured', '<p>Dual-channel 32GB DDR4 kit at 3600MHz, the sweet spot for AMD Ryzen performance. Low-profile design clears most CPU coolers.</p>', 22900.00, 26000.00, '3 year Warranty', 'In Stock', 45, 1, 'ProductImages/lXpmillypEUCfP1axEd8.jpg', '2026-02-18 12:55:00', '2026-02-19 11:47:39', NULL, NULL),
(117, 4, 'Kingston FURY Beast DDR4-3200 32GB (2x16GB)', 'Kingston', 'RAM', 'None', '<p>32GB dual-channel DDR4 kit for gaming and content creation. Aggressive heat spreader design with XMP 2.0 support.</p>', 18900.00, 22000.00, '3 year Warranty', 'In Stock', 35, 1, 'ProductImages/0UZKE8Jn9dUXFgyeL8k5.jpg', '2026-02-18 12:55:00', '2026-02-19 11:48:00', NULL, NULL),
(118, 5, 'Teamgroup T-Force Delta RGB DDR5-6000 32GB (2x16GB)', 'Teamgroup', 'RAM', 'New Arrivals', '<p>High-speed DDR5-6000 RGB kit optimised for Intel XMP 3.0 and AMD EXPO profiles. 32GB dual-channel for enthusiast gaming builds.</p>', 36900.00, 42000.00, '3 year Warranty', 'In Stock', 22, 1, 'ProductImages/FjsyLLAiHdJouim0chSw.jpg', '2026-02-18 12:55:00', '2026-02-19 11:48:24', NULL, NULL),
(119, 6, 'Corsair Dominator Platinum DDR5-5600 64GB (2x32GB)', 'Corsair', 'RAM', 'Featured', '<p>64GB flagship DDR5 kit at 5600MHz with premium aluminium DHX heatspreader. For workstations, content creation, and high-memory workloads.</p>', 62900.00, 72000.00, '3 year Warranty', 'In Stock', 10, 1, 'ProductImages/VdUgVtfraEy67m3REyVP.jpg', '2026-02-18 12:55:00', '2026-02-19 11:48:46', NULL, NULL),
(120, 7, 'Crucial Pro DDR5-5600 16GB (2x8GB)', 'Crucial', 'RAM', 'None', '<p>Entry-level DDR5 dual-channel kit. Budget-friendly option for first-time DDR5 builds on Intel or AMD AM5 platforms.</p>', 16900.00, 19500.00, '3 year Warranty', 'In Stock', 50, 1, 'ProductImages/p6oVy6A0HGFmTqUlMymm.webp', '2026-02-18 12:55:00', '2026-02-19 11:49:06', NULL, NULL),
(121, 4, 'NVIDIA GTX 1650 4GB GDDR6', 'NVIDIA', 'GRAPHIC CARDS', 'None', '<p>Entry-level 1080p GPU with 4GB GDDR6. No external power connector needed. Ideal for budget gaming and multimedia PCs.</p>', 34900.00, 39000.00, '3 year Warranty', 'In Stock', 20, 1, 'ProductImages/2rE8SFRDzPZPqPSN1n7j.jpg', '2026-02-18 12:55:00', '2026-02-19 11:49:50', NULL, NULL),
(122, 5, 'NVIDIA RTX 3060 12GB GDDR6', 'NVIDIA', 'GRAPHIC CARDS', 'None', '<p>Popular 1080p and 1440p gaming GPU with 12GB GDDR6 and hardware ray tracing. Great for gaming and light creative work.</p>', 79900.00, 88000.00, '3 year Warranty', 'In Stock', 18, 1, 'ProductImages/0M1K621llexIjOoNhkxw.webp', '2026-02-18 12:55:00', '2026-02-19 11:50:09', NULL, NULL),
(123, 6, 'AMD Radeon RX 6600 8GB GDDR6', 'AMD', 'GRAPHIC CARDS', 'None', '<p>AMD RDNA 2 GPU for excellent 1080p gaming. 8GB GDDR6, low 132W TDP, and great rasterization performance for the price.</p>', 54900.00, 62000.00, '3 year Warranty', 'In Stock', 16, 1, 'ProductImages/MuXykQDMVxVzjUWrntNm.jpg', '2026-02-18 12:55:00', '2026-02-19 11:50:29', NULL, NULL),
(124, 7, 'AMD Radeon RX 7600 8GB GDDR6', 'AMD', 'GRAPHIC CARDS', 'New Arrivals', '<p>Latest RDNA 3 GPU for 1080p gaming at excellent value. Features DisplayPort 2.1, AV1 encode/decode, and 165W TDP.</p>', 74900.00, 83000.00, '3 year Warranty', 'In Stock', 15, 1, 'ProductImages/8eO6cRpgmq1qDSxOx2RR.png', '2026-02-18 12:55:00', '2026-02-19 11:50:50', NULL, NULL),
(125, 4, 'NVIDIA RTX 4070 Ti Super 16GB GDDR6X', 'NVIDIA', 'GRAPHIC CARDS', 'Top Rated', '<p>Powerful 4K-capable GPU with 16GB GDDR6X, DLSS 3.5, and Ada Lovelace architecture. Excellent for 1440p high refresh rate gaming.</p>', 249000.00, 275000.00, '3 year Warranty', 'In Stock', 8, 1, 'ProductImages/HyN0pzzTOzzsbpDAYHnb.jpg', '2026-02-18 12:55:00', '2026-02-19 11:51:13', NULL, NULL),
(126, 5, 'AMD Radeon RX 7800 XT 16GB GDDR6', 'AMD', 'GRAPHIC CARDS', 'Featured', '<p>High-end 1440p RDNA 3 GPU with 16GB GDDR6. Excellent rasterization and a great alternative to the RTX 4070.</p>', 154900.00, 172000.00, '3 year Warranty', 'In Stock', 10, 1, 'ProductImages/Fm2uk0Xa2CrEwjlx2Ta6.png', '2026-02-18 12:55:00', '2026-02-19 11:51:35', NULL, NULL);
INSERT INTO `products` (`id`, `user_id`, `name`, `brand`, `type`, `tags`, `description`, `discounted_price`, `retail_price`, `warranty`, `in_stock`, `qty`, `status_id`, `image`, `created_at`, `updated_at`, `deal_start`, `deal_end`) VALUES
(127, 6, 'NVIDIA RTX 4080 Super 16GB GDDR6X', 'NVIDIA', 'GRAPHIC CARDS', 'Featured', '<p>Near-flagship Ada Lovelace GPU with 16GB GDDR6X. Exceptional 4K gaming, AI workloads, and content creation performance.</p>', 379000.00, 415000.00, '3 year Warranty', 'In Stock', 5, 1, 'ProductImages/4DNVoHIdk4eeTIyXCrTQ.png', '2026-02-18 12:55:00', '2026-02-19 11:51:54', NULL, NULL),
(128, 7, 'Cooler Master MWE 450W 80+ White', 'Cooler Master', 'POWER SUPPLY', 'None', '<p>450W non-modular ATX PSU with 80&#43; White certification. Reliable choice for budget builds with integrated graphics or low-TDP GPUs.</p>', 9900.00, 12000.00, '3 year Warranty', 'In Stock', 45, 1, 'ProductImages/BYPRAUChQsoCc4vJoYle.webp', '2026-02-18 12:55:00', '2026-02-19 11:52:29', NULL, NULL),
(129, 4, 'Corsair CV 650W 80+ Bronze', 'Corsair', 'POWER SUPPLY', 'None', '<p>650W non-modular 80&#43; Bronze PSU with Japanese capacitors and a quiet 120mm fan. Good value for mid-range gaming builds.</p>', 19900.00, 23000.00, '3 year Warranty', 'In Stock', 30, 1, 'ProductImages/cxz4nsZDuQI9hhJ1uEHo.png', '2026-02-18 12:55:00', '2026-02-19 11:52:48', NULL, NULL),
(130, 5, 'be quiet! Pure Power 12 M 750W 80+ Gold', 'be quiet!', 'POWER SUPPLY', 'Featured', '<p>750W semi-modular 80&#43; Gold PSU with a silent 120mm fan. Japanese capacitors and ATX 3.0 / PCIe 5.0 native 16-pin connector support.</p>', 34900.00, 39000.00, '3 year Warranty', 'In Stock', 20, 1, 'ProductImages/DIzoir7xzLmuSAoo0rK7.jpg', '2026-02-18 12:55:00', '2026-02-19 11:53:07', NULL, NULL),
(131, 6, 'EVGA SuperNOVA 850W G6 80+ Gold Fully Modular', 'EVGA', 'POWER SUPPLY', 'Top Rated', '<p>850W fully modular 80&#43; Gold PSU with a compact 140mm design. Eco mode fan, 10-year warranty, and native PCIe 5.0 connector.</p>', 49900.00, 56000.00, '3 year Warranty', 'In Stock', 14, 1, 'ProductImages/dCfZarTJ7qaBsdWNLCnG.jpg', '2026-02-18 12:55:00', '2026-02-19 11:53:43', NULL, NULL),
(132, 7, 'Corsair HX1200 1200W 80+ Platinum', 'Corsair', 'POWER SUPPLY', 'None', '<p>1200W fully modular 80&#43; Platinum PSU for extreme builds with dual GPUs or high-end RTX 4090 workstations. Zero RPM mode below 40% load.</p>', 84900.00, 94000.00, '3 year Warranty', 'In Stock', 8, 1, 'ProductImages/VuKEEnDMajMsenEXHjRM.png', '2026-02-18 12:55:00', '2026-02-19 11:54:01', NULL, NULL),
(133, 4, 'Seasonic Prime TX-1000 80+ Titanium', 'Seasonic', 'POWER SUPPLY', 'Featured', '<p>Premium 1000W fully modular 80&#43; Titanium PSU — the most efficient ATX rating. 12-year warranty and fanless operation below 30% load.</p>', 79900.00, 89000.00, '3 year Warranty', 'In Stock', 6, 1, 'ProductImages/3HrxheLbbOH7f9UYKF02.jpg', '2026-02-18 12:55:00', '2026-02-19 11:54:17', NULL, NULL),
(134, 5, 'Crucial P3 1TB PCIe 3.0 NVMe', 'Crucial', 'STORAGE & NAS', 'None', '<p>Budget-friendly 1TB NVMe SSD with 3500 MB/s reads. Great boot drive upgrade for any PCIe 3.0 or 4.0 motherboard.</p>', 11900.00, 13500.00, '3 year Warranty', 'In Stock', 45, 1, 'ProductImages/8ACn1fapHQDTaWPnoj6h.png', '2026-02-18 12:55:00', '2026-03-02 14:45:26', NULL, NULL),
(135, 6, 'Seagate FireCuda 530 2TB PCIe 4.0 NVMe', 'Seagate', 'STORAGE & NAS', 'Top Rated', '<p>2TB high-performance NVMe SSD with 7300 MB/s reads and 6900 MB/s writes. Ideal for PS5 expansion, gaming rigs, and workstations.</p>', 44900.00, 50000.00, '6 months warranty', 'In Stock', 18, 1, 'ProductImages/9y1GH9gk9xZhqKx0ghLT.png', '2026-02-18 12:55:00', '2026-03-02 14:49:11', NULL, NULL),
(136, 7, 'Corsair MP600 Pro NH 4TB PCIe 4.0 NVMe', 'Corsair', 'STORAGE & NAS', 'Featured', '<p>4TB high-capacity NVMe SSD with 7100 MB/s sequential reads. No heatsink — fits motherboard M.2 slots with built-in cooling.</p>', 79900.00, 90000.00, '2 year Warranty', 'In Stock', 10, 1, 'ProductImages/mpDbeK5Mq8UzEMmLliHs.webp', '2026-02-18 12:55:00', '2026-03-02 14:49:11', NULL, NULL),
(137, 4, 'Adata Legend 960 Max 1TB PCIe 4.0 NVMe', 'Adata', 'STORAGE & NAS', 'None', '<p>Mid-range PCIe 4.0 NVMe SSD with 7400 MB/s reads at an affordable price. Good balance of performance and value for gaming builds.</p>', 17900.00, 20500.00, '3 year Warranty', 'In Stock', 27, 1, 'ProductImages/rvQErxiEKXBPu32QUtJr.png', '2026-02-18 12:55:00', '2026-03-08 08:45:40', NULL, NULL),
(138, 5, 'Samsung 970 EVO Plus 500GB PCIe 3.0 NVMe', 'Samsung', 'STORAGE & NAS', 'None', '<p>Reliable 500GB NVMe SSD with 3500 MB/s reads and Samsung V-NAND technology. Trusted long-life SSD for OS installs.</p>', 10900.00, 12500.00, '2 year Warranty', 'In Stock', 35, 1, 'ProductImages/456m6HFHo61yisHEQxW1.jpg', '2026-02-18 12:55:00', '2026-03-02 14:49:11', NULL, NULL),
(139, 6, 'WD Purple 3TB Surveillance HDD', 'Western Digital', 'STORAGE & NAS', 'None', '<p>3TB 5400 RPM HDD optimised for 24/7 NVR and DVR workloads. AllFrame technology reduces frame loss in CCTV storage systems.</p>', 16900.00, 19000.00, '3 year Warranty', 'In Stock', 25, 1, 'ProductImages/JN9dAlTAc5TYPSJau0pw.jpg', '2026-02-18 12:55:00', '2026-03-02 14:50:19', NULL, NULL),
(140, 7, 'Seagate IronWolf 6TB NAS HDD', 'Seagate', 'STORAGE & NAS', 'None', '<p>6TB NAS-optimised CMR HDD at 5400 RPM with AgileArray technology. 24/7 rated for up to 8-bay NAS enclosures.</p>', 28900.00, 33000.00, '3 year Warranty', 'In Stock', 15, 1, 'ProductImages/V9uuznv0Tzf96QMrL1nc.jpg', '2026-02-18 12:55:00', '2026-03-02 14:50:19', NULL, NULL),
(141, 4, 'WD Black 2TB Performance HDD 7200 RPM', 'Western Digital', 'STORAGE & NAS', 'None', '<p>High-performance 2TB desktop HDD at 7200 RPM with a 64MB cache. Designed for gaming and creative workloads needing fast hard drive access.</p>', 17900.00, 20000.00, '3 year Warranty', 'In Stock', 22, 1, 'ProductImages/LOBneYUOgmDD2RqYEEJ1.jpg', '2026-02-18 12:55:00', '2026-03-02 14:50:19', NULL, NULL),
(142, 5, 'Fractal Design Pop Air ATX Mid Tower', 'Fractal Design', 'CASINGS', 'Featured', '<p>Clean, airflow-focused ATX mid-tower with mesh front panel and two 140mm fans pre-installed. Supports ATX / mATX / Mini-ITX motherboards.</p>', 19900.00, 23000.00, '2 year Warranty', 'In Stock', 18, 1, 'ProductImages/jEDZ5d2BoEQXDtpD5pFN.jpg', '2026-02-18 12:55:00', '2026-02-19 11:58:48', NULL, NULL),
(143, 6, 'Phanteks Eclipse G360A ATX Mid Tower', 'Phanteks', 'CASINGS', 'Top Rated', '<p>Stylish ATX mid-tower with mesh front, tempered glass side, and 3x pre-installed D30 fans for excellent airflow. Includes GPU anti-sag bracket.</p>', 22900.00, 26500.00, '2 year Warranty', 'In Stock', 14, 1, 'ProductImages/R8xOUj3525NAUNWHRXtS.webp', '2026-02-18 12:55:00', '2026-02-19 11:59:12', NULL, NULL),
(144, 7, 'Deepcool CH560 Digital ATX Mid Tower', 'Deepcool', 'CASINGS', 'New Arrivals', '<p>Striking ATX mid-tower with a built-in front LCD display showing temp/usage stats. Comes with 4x pre-installed 140mm fans and tempered glass.</p>', 28900.00, 34000.00, '1 year Warranty', 'In Stock', 10, 1, 'ProductImages/LhyXBWYWNNqXMXzo0Knn.webp', '2026-02-18 12:55:00', '2026-02-19 11:59:34', NULL, NULL),
(145, 4, 'Fractal Design Define 7 XL Full Tower', 'Fractal Design', 'CASINGS', 'None', '<p>Premium full-tower case with sound-damping panels, modular interior, and support for E-ATX workstation motherboards. Fits up to 420mm radiators.</p>', 44900.00, 51000.00, '2 year Warranty', 'In Stock', 6, 1, 'ProductImages/V0anodTDHsljncsaCnJf.webp', '2026-02-18 12:55:00', '2026-02-19 11:59:54', NULL, NULL),
(146, 5, 'Corsair 4000D Airflow ATX Mid Tower', 'Corsair', 'CASINGS', 'Featured', '<p>Popular Corsair ATX mid-tower with a high-airflow front mesh panel. Two 120mm fans included. Spacious interior for 360mm radiators and long GPUs.</p>', 24900.00, 28000.00, '2 year Warranty', 'In Stock', 16, 1, 'ProductImages/fiEKyOflCfozYTZ3bnM1.png', '2026-02-18 12:55:00', '2026-02-19 12:00:12', NULL, NULL),
(147, 6, 'Cooler Master Hyper 212 Black Edition Air Cooler', 'Cooler Master', 'COOLING & LIGHTING', 'None', '<p>Classic budget-friendly 120mm tower air cooler with 4 heatpipes and a direct-contact base. Wide socket compatibility. Handles up to 150W TDP.</p>', 6900.00, 8200.00, '2 year Warranty', 'In Stock', 35, 1, 'ProductImages/MwN58X775QMmzYWV3aeg.jpg', '2026-02-18 12:55:00', '2026-02-19 12:00:31', NULL, NULL),
(148, 7, 'DeepCool AK620 Dual Tower Air Cooler', 'DeepCool', 'COOLING & LIGHTING', 'Top Rated', '<p>High-performance dual tower cooler with two 120mm fans and 6 heatpipes. Handles 260W TDP at a fraction of AIO pricing. Compatible with LGA1700 and AM5.</p>', 14900.00, 17500.00, '3 year Warranty', 'In Stock', 22, 1, 'ProductImages/bt7y02O8XQprC9r97zA2.jpg', '2026-02-18 12:55:00', '2026-02-19 12:00:52', NULL, NULL),
(149, 4, 'Arctic Liquid Freezer III 240mm AIO', 'Arctic', 'COOLING & LIGHTING', 'Featured', '<p>High-performance 240mm AIO with an integrated VRM fan on the pump head. Outstanding thermal performance and whisper-quiet 2000 RPM fans.</p>', 24900.00, 28500.00, '6 months warranty', 'In Stock', 15, 1, 'ProductImages/0VHElY2xdTdjEyj6Nac9.png', '2026-02-18 12:55:00', '2026-02-19 12:01:15', NULL, NULL),
(150, 5, 'Corsair iCUE H100i Elite Capellix XT 240mm AIO', 'Corsair', 'COOLING & LIGHTING', 'Featured', '<p>240mm AIO with ARGB Capellix LEDs on the pump head and two AF120 RGB fans. Controlled via Corsair iCUE software.</p>', 32900.00, 37000.00, '6 months warranty', 'In Stock', 12, 1, 'ProductImages/IBIBSm8qhPqNpNyRswzf.jpg', '2026-02-18 12:55:00', '2026-02-19 12:01:37', NULL, NULL),
(151, 6, 'be quiet! Silent Loop 2 360mm AIO', 'be quiet!', 'COOLING & LIGHTING', 'Top Rated', '<p>360mm silent AIO with three 120mm Pure Wings 3 fans running as low as 7 dB(A). Exceptional for i9/Ryzen 9 builds that demand silence.</p>', 49900.00, 56000.00, '3 year Warranty', 'In Stock', 8, 1, 'ProductImages/UYszKuXJIJyQtRIc0rmx.webp', '2026-02-18 12:55:00', '2026-02-19 12:02:19', NULL, NULL),
(152, 7, 'Noctua NF-A12x25 PWM 120mm Fan', 'Noctua', 'FANS', 'Top Rated', '<p>Noctua&#039;s reference-class 120mm fan with outstanding static pressure and airflow. SSO2 magnetic bearing, 6-year warranty, and near-silent at 23 dB(A).</p>', 5900.00, 6900.00, '6 months warranty', 'In Stock', 40, 1, 'ProductImages/Re5Dy1LhQzoIjCv6UpKz.jpg', '2026-02-18 12:55:00', '2026-02-19 12:02:53', NULL, NULL),
(153, 4, 'Lian Li UNI FAN SL140 RGB 2-Pack 140mm', 'Lian Li', 'FANS', 'Featured', '<p>Daisy-chain 140mm RGB case fans with infinity mirror design. 2-pack with controller included. High airflow at low noise levels.</p>', 12900.00, 14900.00, '1 year Warranty', 'In Stock', 25, 1, 'ProductImages/3vIONdzXNOzQzuYbvdMM.jpg', '2026-02-18 12:55:00', '2026-02-19 12:03:12', NULL, NULL),
(154, 5, 'Corsair LL120 RGB 3-Pack 120mm Fans', 'Corsair', 'FANS', 'None', '<p>3-pack of 120mm RGB fans with dual light loops (16 LEDs each). Includes Lighting Node Core for iCUE control. Great for RGB builds.</p>', 11900.00, 13900.00, '2 year Warranty', 'In Stock', 20, 1, 'ProductImages/dWrjCqgbVHCsQGsSvpO6.png', '2026-02-18 12:55:00', '2026-02-19 12:03:35', NULL, NULL),
(155, 6, 'AOC 24G2SP 24\" FHD 165Hz IPS Gaming Monitor', 'AOC', 'MONITORS & ACCESSORIES', 'None', '<p>24-inch Full HD IPS gaming monitor at 165Hz with 1ms MPRT. FreeSync Premium and G-Sync Compatible. Great budget 1080p gaming monitor.</p>', 34900.00, 39500.00, '3 year Warranty', 'In Stock', 20, 1, 'ProductImages/jNiKWSr8bh2gYMGYEsQE.png', '2026-02-18 12:55:00', '2026-02-19 12:03:54', NULL, NULL),
(156, 7, 'BenQ MOBIUZ EX2710Q 27\" QHD 165Hz IPS', 'BenQ', 'MONITORS & ACCESSORIES', 'Featured', '<p>27-inch QHD (2560x1440) IPS gaming monitor at 165Hz with HDR10, FreeSync Premium Pro, and built-in 2.1 channel speakers.</p>', 64900.00, 72000.00, '3 year Warranty', 'In Stock', 12, 1, 'ProductImages/9EQPXKIaVazhg8ZtWnah.png', '2026-02-18 12:55:00', '2026-02-19 12:04:19', NULL, NULL),
(157, 4, 'ASUS ROG Swift OLED PG27AQDM 27\" QHD 240Hz', 'ASUS', 'MONITORS & ACCESSORIES', 'Top Rated', '<p>27-inch QHD OLED gaming monitor with 240Hz, 0.03ms response time, true HDR1000 brightness, and vivid 1.07 billion colours. Near-instant pixel response.</p>', 189000.00, 210000.00, '3 year Warranty', 'In Stock', 4, 1, 'ProductImages/6kkEhI1KTnNeW7DaUWtl.webp', '2026-02-18 12:55:00', '2026-02-19 12:04:41', NULL, NULL),
(158, 5, 'LG UltraGear 32GQ950-B 32\" 4K 144Hz UHD IPS', 'LG', 'MONITORS & ACCESSORIES', 'Featured', '<p>32-inch 4K (3840x2160) IPS gaming monitor at 144Hz with NVIDIA G-Sync, VESA DisplayHDR 1000, and Nano IPS wide colour gamut technology.</p>', 149000.00, 168000.00, '3 year Warranty', 'In Stock', 5, 1, 'ProductImages/qP2QB1fvHg969tHPcG5X.jpg', '2026-02-18 12:55:00', '2026-02-19 12:05:10', NULL, NULL),
(159, 4, 'Asus VivoBook 15 Laptop', 'Asus', 'LAPTOPS', 'New Arrivals', '<p>Slim and lightweight 15.6&#34; laptop for everyday computing.</p>', 189000.00, 210000.00, '1 year Warranty', 'In Stock', 4, 1, 'ProductImages/OP8zMi9Wpk6c9CX1yX9g.jpg', '2026-02-18 14:28:23', '2026-02-19 12:05:44', NULL, NULL),
(160, 4, 'Logitech G502 Gaming Mouse', 'Logitech', 'MOUSE', 'New Arrivals', '<p>High-performance gaming mouse with 11 programmable buttons.</p>', 12500.00, 14000.00, '3 year Warranty', 'In Stock', 20, 1, 'ProductImages/skC8qh78dPuqQnTOtgYZ.jpg', '2026-02-18 14:28:23', '2026-02-19 12:06:19', NULL, NULL),
(161, 4, 'Dell Latitude 3340 – i3', 'Dell', 'LAPTOPS', 'DEAL OF THE DAYS', '<p><span>The Dell Latitude 3340 combines laptop performance with tablet</span></p><p><span>flexibility, making it ideal for students and business users.</span></p>', 145000.00, 147000.00, '3 year Warranty', 'In Stock', 170, 1, 'ProductImages/8XbFedu9vnJVckiKUZXr.jpg', '2026-02-19 06:49:34', '2026-02-19 12:08:46', '2026-02-19', '2027-02-01'),
(162, 5, 'Lenovo Legion 5 15AKP10 Gaming – Ryzen AI 7', 'Lenovo', 'LAPTOPS', 'New Arrivals', '<p><span>elite performance with the Lenovo Legion 5 15AKP10, powered by the AMD Ryzen AI 7 350 processor.</span></p><p><span>Built for next-gen gaming, this machine blends raw power with AI intelligence for unmatched responsiveness.</span></p>', 600000.00, 615000.00, '3 year Warranty', 'In Stock', 70, 1, 'ProductImages/5dp194w3OKQzwTIaVI2w.jpg', '2026-02-19 06:50:48', '2026-02-19 12:09:55', NULL, NULL),
(163, 4, 'NVIDIA GT 710 2GB DDR3', 'NVIDIA', 'GRAPHIC CARDS', 'New Arrivals', 'The NVIDIA GT 710 2GB is an ultra-budget graphics card designed for basic computing needs. It is ideal for students, office workers, and home users who need simple display output for everyday tasks.\r\nPerfect for Microsoft Office, Zoom classes, web browsing, YouTube streaming, and basic applications. This card is NOT designed for gaming but provides stable performance for normal usage at a very affordable price.', 12500.00, 14500.00, '3 Years', 'In Stock', 100, 1, 'ProductImages/1772464596_714HhW0UcUS._AC_UF894,1000_QL80_.jpg', '2026-03-02 15:16:36', '2026-03-02 15:16:36', NULL, NULL);

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
(20, 1, 'Processor', 'Ryzen 7', '2025-08-10 11:34:26', '2025-08-10 11:34:26'),
(180, 59, 'resolution', '2560x1440 QHD', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(181, 59, 'refresh_rate_hz', '165', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(182, 59, 'panel_type', 'IPS', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(183, 59, 'response_time_ms', '1', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(184, 59, 'hdr', 'HDR10', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(185, 60, 'resolution', '5120x1440 DQHD', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(186, 60, 'refresh_rate_hz', '240', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(187, 60, 'panel_type', 'VA', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(188, 60, 'response_time_ms', '1', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(189, 60, 'hdr', 'DisplayHDR 1000', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(190, 61, 'resolution', '2560x1440 QHD', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(191, 61, 'panel_type', 'IPS', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(192, 61, 'refresh_rate_hz', '60', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(193, 69, 'switch_type', 'Gateron G Pro Red', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(194, 69, 'connectivity', 'Bluetooth 5.1 / USB-C', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(196, 69, 'backlighting', 'RGB', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(197, 71, 'dpi', '100-25600', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(198, 71, 'connectivity', 'LIGHTSPEED Wireless / USB-C', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(199, 71, 'weight_g', '106', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(200, 77, 'capacity_va', '1500', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(201, 77, 'capacity_w', '900', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(202, 77, 'outlets', '8', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(203, 77, 'runtime_full', '~6 min at full load', '2026-02-18 12:47:25', '2026-02-18 12:47:25'),
(509, 155, 'resolution', '1920x1080 FHD', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(510, 155, 'refresh_rate_hz', '165', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(511, 155, 'panel_type', 'IPS', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(512, 155, 'response_time_ms', '1', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(513, 156, 'resolution', '2560x1440 QHD', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(514, 156, 'refresh_rate_hz', '165', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(515, 156, 'panel_type', 'IPS', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(516, 156, 'response_time_ms', '1', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(517, 156, 'hdr', 'HDR10', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(518, 157, 'resolution', '2560x1440 QHD', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(519, 157, 'refresh_rate_hz', '240', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(520, 157, 'panel_type', 'OLED', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(521, 157, 'response_time_ms', '0.03', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(522, 157, 'hdr', 'OLED HDR1000', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(523, 158, 'resolution', '3840x2160 4K UHD', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(524, 158, 'refresh_rate_hz', '144', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(525, 158, 'panel_type', 'Nano IPS', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(526, 158, 'response_time_ms', '1', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(527, 158, 'hdr', 'DisplayHDR 1000', '2026-02-18 12:55:00', '2026-02-18 12:55:00'),
(528, 29, 'socket_type', 'LGA1700', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(529, 29, 'compatible_ram_type', 'DDR4/DDR5', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(530, 29, 'cores', '24', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(531, 29, 'threads', '32', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(532, 29, 'base_clock_ghz', '3.0', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(533, 29, 'boost_clock_ghz', '5.8', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(534, 29, 'power_consumption', '125', '2026-02-18 13:12:01', '2026-02-18 13:12:01'),
(535, 159, 'RAM', '4GB', '2026-02-19 08:33:44', '2026-02-19 08:33:44'),
(536, 30, 'socket_type', 'LGA1700', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(537, 30, 'compatible_ram_type', 'DDR4/DDR5', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(538, 30, 'cores', '14', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(539, 30, 'threads', '20', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(540, 30, 'base_clock_ghz', '3.5', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(541, 30, 'boost_clock_ghz', '5.1', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(542, 30, 'power_consumption', '125', '2026-02-19 10:59:15', '2026-02-19 10:59:15'),
(543, 31, 'socket_type', 'AM5', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(544, 31, 'compatible_ram_type', 'DDR5', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(545, 31, 'cores', '16', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(546, 31, 'threads', '32', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(547, 31, 'base_clock_ghz', '4.5', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(548, 31, 'boost_clock_ghz', '5.7', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(549, 31, 'power_consumption', '170', '2026-02-19 10:59:51', '2026-02-19 10:59:51'),
(550, 32, 'socket_type', 'AM5', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(551, 32, 'compatible_ram_type', 'DDR5', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(552, 32, 'cores', '6', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(553, 32, 'threads', '12', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(554, 32, 'base_clock_ghz', '4.7', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(555, 32, 'boost_clock_ghz', '5.3', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(556, 32, 'power_consumption', '105', '2026-02-19 11:00:22', '2026-02-19 11:00:22'),
(557, 33, 'socket_type', 'LGA1700', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(558, 33, 'form_factor', 'ATX', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(559, 33, 'supported_ram_type', 'DDR5', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(560, 33, 'ram_slots', '4', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(561, 33, 'max_ram_gb', '192', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(562, 33, 'supported_ram_speed', '4800, 5200, 5600, 6400', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(563, 33, 'm2_slots', '5', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(564, 33, 'sata_ports', '4', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(565, 33, 'usb_a_ports', '8', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(566, 33, 'usb_c_ports', '2', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(567, 33, 'pcie_x16_slots', '2', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(568, 33, 'wifi', 'Yes', '2026-02-19 11:00:54', '2026-02-19 11:00:54'),
(569, 34, 'socket_type', 'AM5', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(570, 34, 'form_factor', 'ATX', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(571, 34, 'supported_ram_type', 'DDR5', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(572, 34, 'ram_slots', '4', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(573, 34, 'max_ram_gb', '128', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(574, 34, 'supported_ram_speed', '4800, 5200, 5600', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(575, 34, 'm2_slots', '3', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(576, 34, 'sata_ports', '6', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(577, 34, 'usb_a_ports', '6', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(578, 34, 'usb_c_ports', '1', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(579, 34, 'pcie_x16_slots', '1', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(580, 34, 'wifi', 'Yes', '2026-02-19 11:01:24', '2026-02-19 11:01:24'),
(581, 35, 'socket_type', 'LGA1700', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(582, 35, 'form_factor', 'mATX', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(583, 35, 'supported_ram_type', 'DDR4', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(584, 35, 'ram_slots', '2', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(585, 35, 'max_ram_gb', '64', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(586, 35, 'supported_ram_speed', '3200, 3600, 4400', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(587, 35, 'm2_slots', '2', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(588, 35, 'sata_ports', '4', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(589, 35, 'usb_a_ports', '4', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(590, 35, 'usb_c_ports', '1', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(591, 35, 'pcie_x16_slots', '1', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(592, 35, 'wifi', 'No', '2026-02-19 11:02:02', '2026-02-19 11:02:02'),
(593, 36, 'power_consumption', '6', '2026-02-19 11:02:39', '2026-02-19 11:02:39'),
(594, 36, 'ram_type', 'DDR5', '2026-02-19 11:02:39', '2026-02-19 11:02:39'),
(595, 36, 'speed_mhz', '5600', '2026-02-19 11:02:39', '2026-02-19 11:02:39'),
(596, 36, 'capacity_gb', '16', '2026-02-19 11:02:39', '2026-02-19 11:02:39'),
(597, 36, 'sticks_count', '2', '2026-02-19 11:02:39', '2026-02-19 11:02:39'),
(598, 37, 'power_consumption', '4', '2026-02-19 11:03:09', '2026-02-19 11:03:09'),
(599, 37, 'ram_type', 'DDR4', '2026-02-19 11:03:09', '2026-02-19 11:03:09'),
(600, 37, 'speed_mhz', '3200', '2026-02-19 11:03:09', '2026-02-19 11:03:09'),
(601, 37, 'capacity_gb', '8', '2026-02-19 11:03:09', '2026-02-19 11:03:09'),
(602, 37, 'sticks_count', '2', '2026-02-19 11:03:09', '2026-02-19 11:03:09'),
(603, 38, 'power_consumption', '8', '2026-02-19 11:03:52', '2026-02-19 11:03:52'),
(604, 38, 'ram_type', 'DDR5', '2026-02-19 11:03:52', '2026-02-19 11:03:52'),
(605, 38, 'speed_mhz', '6000', '2026-02-19 11:03:52', '2026-02-19 11:03:52'),
(606, 38, 'capacity_gb', '32', '2026-02-19 11:03:52', '2026-02-19 11:03:52'),
(607, 38, 'sticks_count', '2', '2026-02-19 11:03:52', '2026-02-19 11:03:52'),
(608, 39, 'power_consumption', '450', '2026-02-19 11:05:55', '2026-02-19 11:05:55'),
(609, 39, 'vram_gb', '24', '2026-02-19 11:05:55', '2026-02-19 11:05:55'),
(610, 39, 'power_connector', '1x 16-pin', '2026-02-19 11:05:55', '2026-02-19 11:05:55'),
(611, 39, 'hdmi_ports', '1', '2026-02-19 11:05:55', '2026-02-19 11:05:55'),
(612, 39, 'displayport_ports', '3', '2026-02-19 11:05:55', '2026-02-19 11:05:55'),
(613, 40, 'power_consumption', '200', '2026-02-19 11:06:24', '2026-02-19 11:06:24'),
(614, 40, 'vram_gb', '12', '2026-02-19 11:06:24', '2026-02-19 11:06:24'),
(615, 40, 'power_connector', '1x 16-pin', '2026-02-19 11:06:24', '2026-02-19 11:06:24'),
(616, 40, 'hdmi_ports', '1', '2026-02-19 11:06:24', '2026-02-19 11:06:24'),
(617, 40, 'displayport_ports', '3', '2026-02-19 11:06:24', '2026-02-19 11:06:24'),
(618, 41, 'power_consumption', '355', '2026-02-19 11:07:14', '2026-02-19 11:07:14'),
(619, 41, 'vram_gb', '24', '2026-02-19 11:07:14', '2026-02-19 11:07:14'),
(620, 41, 'power_connector', '2x 8-pin', '2026-02-19 11:07:14', '2026-02-19 11:07:14'),
(621, 41, 'hdmi_ports', '1', '2026-02-19 11:07:14', '2026-02-19 11:07:14'),
(622, 41, 'displayport_ports', '2', '2026-02-19 11:07:14', '2026-02-19 11:07:14'),
(623, 42, 'power_consumption', '115', '2026-02-19 11:08:31', '2026-02-19 11:08:31'),
(624, 42, 'vram_gb', '8', '2026-02-19 11:08:31', '2026-02-19 11:08:31'),
(625, 42, 'power_connector', '1x 8-pin', '2026-02-19 11:08:31', '2026-02-19 11:08:31'),
(626, 42, 'hdmi_ports', '1', '2026-02-19 11:08:31', '2026-02-19 11:08:31'),
(627, 42, 'displayport_ports', '3', '2026-02-19 11:08:31', '2026-02-19 11:08:31'),
(628, 43, 'wattage_w', '1000', '2026-02-19 11:08:52', '2026-02-19 11:08:52'),
(629, 43, 'efficiency_rating', '80+ Gold', '2026-02-19 11:08:52', '2026-02-19 11:08:52'),
(630, 43, 'psu_form_factor', 'ATX', '2026-02-19 11:08:52', '2026-02-19 11:08:52'),
(631, 43, 'modular', 'Fully Modular', '2026-02-19 11:08:52', '2026-02-19 11:08:52'),
(632, 44, 'wattage_w', '750', '2026-02-19 11:09:16', '2026-02-19 11:09:16'),
(633, 44, 'efficiency_rating', '80+ Gold', '2026-02-19 11:09:16', '2026-02-19 11:09:16'),
(634, 44, 'psu_form_factor', 'ATX', '2026-02-19 11:09:16', '2026-02-19 11:09:16'),
(635, 44, 'modular', 'Fully Modular', '2026-02-19 11:09:16', '2026-02-19 11:09:16'),
(636, 45, 'wattage_w', '550', '2026-02-19 11:09:43', '2026-02-19 11:09:43'),
(637, 45, 'efficiency_rating', '80+ Bronze', '2026-02-19 11:09:43', '2026-02-19 11:09:43'),
(638, 45, 'psu_form_factor', 'ATX', '2026-02-19 11:09:43', '2026-02-19 11:09:43'),
(639, 45, 'modular', 'Semi-Modular', '2026-02-19 11:09:43', '2026-02-19 11:09:43'),
(640, 46, 'power_consumption', '7', '2026-02-19 11:10:21', '2026-02-19 11:10:21'),
(641, 46, 'storage_type', 'NVMe PCIe 4.0', '2026-02-19 11:10:21', '2026-02-19 11:10:21'),
(642, 46, 'capacity', '2TB', '2026-02-19 11:10:21', '2026-02-19 11:10:21'),
(643, 46, 'interface', 'M.2 NVMe', '2026-02-19 11:10:21', '2026-02-19 11:10:21'),
(644, 47, 'power_consumption', '6', '2026-02-19 11:10:54', '2026-02-19 11:10:54'),
(645, 47, 'storage_type', 'NVMe PCIe 4.0', '2026-02-19 11:10:54', '2026-02-19 11:10:54'),
(646, 47, 'capacity', '1TB', '2026-02-19 11:10:54', '2026-02-19 11:10:54'),
(647, 47, 'interface', 'M.2 NVMe', '2026-02-19 11:10:54', '2026-02-19 11:10:54'),
(648, 48, 'power_consumption', '4', '2026-02-19 11:14:06', '2026-02-19 11:14:06'),
(649, 48, 'storage_type', 'NVMe PCIe 3.0', '2026-02-19 11:14:06', '2026-02-19 11:14:06'),
(650, 48, 'capacity', '500GB', '2026-02-19 11:14:06', '2026-02-19 11:14:06'),
(651, 48, 'interface', 'M.2 NVMe', '2026-02-19 11:14:06', '2026-02-19 11:14:06'),
(652, 49, 'power_consumption', '9', '2026-02-19 11:14:28', '2026-02-19 11:14:28'),
(653, 49, 'storage_type', 'HDD 7200 RPM', '2026-02-19 11:14:28', '2026-02-19 11:14:28'),
(654, 49, 'capacity', '2TB', '2026-02-19 11:14:28', '2026-02-19 11:14:28'),
(655, 49, 'interface', '3.5 SATA', '2026-02-19 11:14:28', '2026-02-19 11:14:28'),
(656, 50, 'power_consumption', '8', '2026-02-19 11:14:47', '2026-02-19 11:14:47'),
(657, 50, 'storage_type', 'HDD 5400 RPM', '2026-02-19 11:14:47', '2026-02-19 11:14:47'),
(658, 50, 'capacity', '4TB', '2026-02-19 11:14:47', '2026-02-19 11:14:47'),
(659, 50, 'interface', '3.5 SATA', '2026-02-19 11:14:47', '2026-02-19 11:14:47'),
(660, 51, 'power_consumption', '40', '2026-02-19 11:16:03', '2026-02-19 11:16:03'),
(661, 51, 'storage_type', 'NAS Drive', '2026-02-19 11:16:03', '2026-02-19 11:16:03'),
(662, 51, 'capacity', 'Diskless (4 bays)', '2026-02-19 11:16:03', '2026-02-19 11:16:03'),
(663, 51, 'interface', '3.5 SATA', '2026-02-19 11:16:03', '2026-02-19 11:16:03'),
(664, 52, 'form_factor_support', 'E-ATX', '2026-02-19 11:16:46', '2026-02-19 11:16:46'),
(665, 52, 'drive_bays', '2x 3.5\", 4x 2.5\"', '2026-02-19 11:16:46', '2026-02-19 11:16:46'),
(666, 53, 'form_factor_support', 'ATX', '2026-02-19 11:17:07', '2026-02-19 11:17:07'),
(667, 53, 'drive_bays', '2x 3.5\", 2x 2.5\"', '2026-02-19 11:17:07', '2026-02-19 11:17:07'),
(668, 54, 'form_factor_support', 'mATX', '2026-02-19 11:17:31', '2026-02-19 11:17:31'),
(669, 54, 'drive_bays', '2x 3.5\", 2x 2.5\"', '2026-02-19 11:17:31', '2026-02-19 11:17:31'),
(670, 55, 'power_consumption', '18', '2026-02-19 11:17:57', '2026-02-19 11:17:57'),
(671, 55, 'cooler_type', 'AIO 360mm', '2026-02-19 11:17:57', '2026-02-19 11:17:57'),
(672, 55, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4', '2026-02-19 11:17:57', '2026-02-19 11:17:57'),
(673, 55, 'max_tdp_support', '300', '2026-02-19 11:17:57', '2026-02-19 11:17:57'),
(674, 55, 'fan_count', '3', '2026-02-19 11:17:57', '2026-02-19 11:17:57'),
(675, 56, 'power_consumption', '5', '2026-02-19 11:18:34', '2026-02-19 11:18:34'),
(676, 56, 'cooler_type', 'Air Tower', '2026-02-19 11:18:34', '2026-02-19 11:18:34'),
(677, 56, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4, TR4', '2026-02-19 11:18:34', '2026-02-19 11:18:34'),
(678, 56, 'max_tdp_support', '250', '2026-02-19 11:18:34', '2026-02-19 11:18:34'),
(679, 56, 'fan_count', '2', '2026-02-19 11:18:34', '2026-02-19 11:18:34'),
(680, 57, 'power_consumption', '6', '2026-02-19 11:18:59', '2026-02-19 11:18:59'),
(681, 57, 'cooler_type', 'Case Fan', '2026-02-19 11:18:59', '2026-02-19 11:18:59'),
(682, 57, 'max_tdp_support', '0', '2026-02-19 11:18:59', '2026-02-19 11:18:59'),
(683, 57, 'fan_count', '3', '2026-02-19 11:18:59', '2026-02-19 11:18:59'),
(684, 58, 'power_consumption', '1', '2026-02-19 11:19:24', '2026-02-19 11:19:24'),
(685, 58, 'cooler_type', 'Case Fan', '2026-02-19 11:19:24', '2026-02-19 11:19:24'),
(686, 58, 'fan_count', '1', '2026-02-19 11:19:24', '2026-02-19 11:19:24'),
(687, 100, 'socket_type', 'LGA1700', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(688, 100, 'compatible_ram_type', 'DDR4/DDR5', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(689, 100, 'cores', '4', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(690, 100, 'threads', '8', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(691, 100, 'base_clock_ghz', '3.3', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(692, 100, 'boost_clock_ghz', '4.3', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(693, 100, 'power_consumption', '58', '2026-02-19 11:41:28', '2026-02-19 11:41:28'),
(694, 101, 'socket_type', 'LGA1700', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(695, 101, 'compatible_ram_type', 'DDR4/DDR5', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(696, 101, 'cores', '6', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(697, 101, 'threads', '12', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(698, 101, 'base_clock_ghz', '2.5', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(699, 101, 'boost_clock_ghz', '4.4', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(700, 101, 'power_consumption', '65', '2026-02-19 11:42:12', '2026-02-19 11:42:12'),
(701, 102, 'socket_type', 'LGA1700', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(702, 102, 'compatible_ram_type', 'DDR4/DDR5', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(703, 102, 'cores', '16', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(704, 102, 'threads', '24', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(705, 102, 'base_clock_ghz', '3.4', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(706, 102, 'boost_clock_ghz', '5.4', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(707, 102, 'power_consumption', '125', '2026-02-19 11:42:26', '2026-02-19 11:42:26'),
(708, 103, 'socket_type', 'AM4', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(709, 103, 'compatible_ram_type', 'DDR4', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(710, 103, 'cores', '4', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(711, 103, 'threads', '8', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(712, 103, 'base_clock_ghz', '3.8', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(713, 103, 'boost_clock_ghz', '4.0', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(714, 103, 'power_consumption', '65', '2026-02-19 11:42:43', '2026-02-19 11:42:43'),
(715, 104, 'socket_type', 'AM4', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(716, 104, 'compatible_ram_type', 'DDR4', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(717, 104, 'cores', '6', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(718, 104, 'threads', '12', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(719, 104, 'base_clock_ghz', '3.7', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(720, 104, 'boost_clock_ghz', '4.6', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(721, 104, 'power_consumption', '65', '2026-02-19 11:42:59', '2026-02-19 11:42:59'),
(722, 105, 'socket_type', 'AM4', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(723, 105, 'compatible_ram_type', 'DDR4', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(724, 105, 'cores', '8', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(725, 105, 'threads', '16', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(726, 105, 'base_clock_ghz', '3.4', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(727, 105, 'boost_clock_ghz', '4.5', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(728, 105, 'power_consumption', '105', '2026-02-19 11:43:19', '2026-02-19 11:43:19'),
(729, 106, 'socket_type', 'AM5', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(730, 106, 'compatible_ram_type', 'DDR5', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(731, 106, 'cores', '8', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(732, 106, 'threads', '16', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(733, 106, 'base_clock_ghz', '4.5', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(734, 106, 'boost_clock_ghz', '5.4', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(735, 106, 'power_consumption', '105', '2026-02-19 11:43:30', '2026-02-19 11:43:30'),
(736, 107, 'socket_type', 'AM5', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(737, 107, 'compatible_ram_type', 'DDR5', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(738, 107, 'cores', '12', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(739, 107, 'threads', '24', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(740, 107, 'base_clock_ghz', '4.7', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(741, 107, 'boost_clock_ghz', '5.6', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(742, 107, 'power_consumption', '170', '2026-02-19 11:43:51', '2026-02-19 11:43:51'),
(743, 108, 'socket_type', 'LGA1700', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(744, 108, 'form_factor', 'mATX', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(745, 108, 'supported_ram_type', 'DDR4', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(746, 108, 'ram_slots', '4', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(747, 108, 'max_ram_gb', '128', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(748, 108, 'supported_ram_speed', '3200, 3600, 4400', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(749, 108, 'm2_slots', '2', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(750, 108, 'sata_ports', '4', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(751, 108, 'usb_a_ports', '4', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(752, 108, 'usb_c_ports', '1', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(753, 108, 'pcie_x16_slots', '1', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(754, 108, 'wifi', 'No', '2026-02-19 11:44:16', '2026-02-19 11:44:16'),
(755, 109, 'socket_type', 'LGA1700', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(756, 109, 'form_factor', 'ATX', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(757, 109, 'supported_ram_type', 'DDR5', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(758, 109, 'ram_slots', '4', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(759, 109, 'max_ram_gb', '192', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(760, 109, 'supported_ram_speed', '4800, 5200, 5600, 6400', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(761, 109, 'm2_slots', '3', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(762, 109, 'sata_ports', '4', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(763, 109, 'usb_a_ports', '6', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(764, 109, 'usb_c_ports', '2', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(765, 109, 'pcie_x16_slots', '2', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(766, 109, 'wifi', 'No', '2026-02-19 11:44:47', '2026-02-19 11:44:47'),
(767, 110, 'socket_type', 'LGA1700', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(768, 110, 'form_factor', 'ATX', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(769, 110, 'supported_ram_type', 'DDR5', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(770, 110, 'ram_slots', '4', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(771, 110, 'max_ram_gb', '192', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(772, 110, 'supported_ram_speed', '4800, 5600, 6400, 7200', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(773, 110, 'm2_slots', '4', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(774, 110, 'sata_ports', '6', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(775, 110, 'usb_a_ports', '8', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(776, 110, 'usb_c_ports', '2', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(777, 110, 'pcie_x16_slots', '2', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(778, 110, 'wifi', 'Yes', '2026-02-19 11:45:04', '2026-02-19 11:45:04'),
(779, 111, 'socket_type', 'AM4', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(780, 111, 'form_factor', 'mATX', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(781, 111, 'supported_ram_type', 'DDR4', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(782, 111, 'ram_slots', '2', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(783, 111, 'max_ram_gb', '64', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(784, 111, 'supported_ram_speed', '2933, 3200, 3600', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(785, 111, 'm2_slots', '1', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(786, 111, 'sata_ports', '4', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(787, 111, 'usb_a_ports', '4', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(788, 111, 'usb_c_ports', '0', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(789, 111, 'pcie_x16_slots', '1', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(790, 111, 'wifi', 'No', '2026-02-19 11:45:53', '2026-02-19 11:45:53'),
(791, 112, 'socket_type', 'AM4', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(792, 112, 'form_factor', 'ATX', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(793, 112, 'supported_ram_type', 'DDR4', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(794, 112, 'ram_slots', '4', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(795, 112, 'max_ram_gb', '128', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(796, 112, 'supported_ram_speed', '3200, 3600, 4400', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(797, 112, 'm2_slots', '2', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(798, 112, 'sata_ports', '6', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(799, 112, 'usb_a_ports', '6', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(800, 112, 'usb_c_ports', '1', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(801, 112, 'pcie_x16_slots', '2', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(802, 112, 'wifi', 'Yes', '2026-02-19 11:46:19', '2026-02-19 11:46:19'),
(803, 113, 'socket_type', 'AM5', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(804, 113, 'form_factor', 'ATX', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(805, 113, 'supported_ram_type', 'DDR5', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(806, 113, 'ram_slots', '4', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(807, 113, 'max_ram_gb', '192', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(808, 113, 'supported_ram_speed', '4800, 5600, 6000, 6400', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(809, 113, 'm2_slots', '4', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(810, 113, 'sata_ports', '4', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(811, 113, 'usb_a_ports', '6', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(812, 113, 'usb_c_ports', '2', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(813, 113, 'pcie_x16_slots', '2', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(814, 113, 'wifi', 'Yes', '2026-02-19 11:46:41', '2026-02-19 11:46:41'),
(815, 114, 'socket_type', 'AM5', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(816, 114, 'form_factor', 'mATX', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(817, 114, 'supported_ram_type', 'DDR5', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(818, 114, 'ram_slots', '2', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(819, 114, 'max_ram_gb', '96', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(820, 114, 'supported_ram_speed', '4800, 5200, 5600', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(821, 114, 'm2_slots', '2', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(822, 114, 'sata_ports', '4', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(823, 114, 'usb_a_ports', '4', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(824, 114, 'usb_c_ports', '1', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(825, 114, 'pcie_x16_slots', '1', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(826, 114, 'wifi', 'Yes', '2026-02-19 11:46:59', '2026-02-19 11:46:59'),
(827, 115, 'power_consumption', '3', '2026-02-19 11:47:20', '2026-02-19 11:47:20'),
(828, 115, 'ram_type', 'DDR4', '2026-02-19 11:47:20', '2026-02-19 11:47:20'),
(829, 115, 'speed_mhz', '3200', '2026-02-19 11:47:20', '2026-02-19 11:47:20'),
(830, 115, 'capacity_gb', '8', '2026-02-19 11:47:20', '2026-02-19 11:47:20'),
(831, 115, 'sticks_count', '1', '2026-02-19 11:47:20', '2026-02-19 11:47:20'),
(832, 116, 'power_consumption', '5', '2026-02-19 11:47:39', '2026-02-19 11:47:39'),
(833, 116, 'ram_type', 'DDR4', '2026-02-19 11:47:39', '2026-02-19 11:47:39'),
(834, 116, 'speed_mhz', '3600', '2026-02-19 11:47:39', '2026-02-19 11:47:39'),
(835, 116, 'capacity_gb', '16', '2026-02-19 11:47:39', '2026-02-19 11:47:39'),
(836, 116, 'sticks_count', '2', '2026-02-19 11:47:39', '2026-02-19 11:47:39'),
(837, 117, 'power_consumption', '5', '2026-02-19 11:48:00', '2026-02-19 11:48:00'),
(838, 117, 'ram_type', 'DDR4', '2026-02-19 11:48:00', '2026-02-19 11:48:00'),
(839, 117, 'speed_mhz', '3200', '2026-02-19 11:48:00', '2026-02-19 11:48:00'),
(840, 117, 'capacity_gb', '16', '2026-02-19 11:48:00', '2026-02-19 11:48:00'),
(841, 117, 'sticks_count', '2', '2026-02-19 11:48:00', '2026-02-19 11:48:00'),
(842, 118, 'power_consumption', '7', '2026-02-19 11:48:24', '2026-02-19 11:48:24'),
(843, 118, 'ram_type', 'DDR5', '2026-02-19 11:48:24', '2026-02-19 11:48:24'),
(844, 118, 'speed_mhz', '6000', '2026-02-19 11:48:24', '2026-02-19 11:48:24'),
(845, 118, 'capacity_gb', '16', '2026-02-19 11:48:24', '2026-02-19 11:48:24'),
(846, 118, 'sticks_count', '2', '2026-02-19 11:48:24', '2026-02-19 11:48:24'),
(847, 119, 'power_consumption', '8', '2026-02-19 11:48:46', '2026-02-19 11:48:46'),
(848, 119, 'ram_type', 'DDR5', '2026-02-19 11:48:46', '2026-02-19 11:48:46'),
(849, 119, 'speed_mhz', '5600', '2026-02-19 11:48:46', '2026-02-19 11:48:46'),
(850, 119, 'capacity_gb', '32', '2026-02-19 11:48:46', '2026-02-19 11:48:46'),
(851, 119, 'sticks_count', '2', '2026-02-19 11:48:46', '2026-02-19 11:48:46'),
(852, 120, 'power_consumption', '5', '2026-02-19 11:49:06', '2026-02-19 11:49:06'),
(853, 120, 'ram_type', 'DDR5', '2026-02-19 11:49:06', '2026-02-19 11:49:06'),
(854, 120, 'speed_mhz', '5600', '2026-02-19 11:49:06', '2026-02-19 11:49:06'),
(855, 120, 'capacity_gb', '8', '2026-02-19 11:49:06', '2026-02-19 11:49:06'),
(856, 120, 'sticks_count', '2', '2026-02-19 11:49:06', '2026-02-19 11:49:06'),
(857, 121, 'power_consumption', '75', '2026-02-19 11:49:50', '2026-02-19 11:49:50'),
(858, 121, 'vram_gb', '4', '2026-02-19 11:49:50', '2026-02-19 11:49:50'),
(859, 121, 'power_connector', 'No external', '2026-02-19 11:49:51', '2026-02-19 11:49:51'),
(860, 121, 'hdmi_ports', '1', '2026-02-19 11:49:51', '2026-02-19 11:49:51'),
(861, 121, 'displayport_ports', '1', '2026-02-19 11:49:51', '2026-02-19 11:49:51'),
(862, 122, 'power_consumption', '170', '2026-02-19 11:50:09', '2026-02-19 11:50:09'),
(863, 122, 'vram_gb', '12', '2026-02-19 11:50:09', '2026-02-19 11:50:09'),
(864, 122, 'power_connector', '1x 8-pin', '2026-02-19 11:50:09', '2026-02-19 11:50:09'),
(865, 122, 'hdmi_ports', '1', '2026-02-19 11:50:09', '2026-02-19 11:50:09'),
(866, 122, 'displayport_ports', '3', '2026-02-19 11:50:09', '2026-02-19 11:50:09'),
(867, 123, 'power_consumption', '132', '2026-02-19 11:50:29', '2026-02-19 11:50:29'),
(868, 123, 'vram_gb', '8', '2026-02-19 11:50:29', '2026-02-19 11:50:29'),
(869, 123, 'power_connector', '1x 8-pin', '2026-02-19 11:50:29', '2026-02-19 11:50:29'),
(870, 123, 'hdmi_ports', '1', '2026-02-19 11:50:29', '2026-02-19 11:50:29'),
(871, 123, 'displayport_ports', '3', '2026-02-19 11:50:29', '2026-02-19 11:50:29'),
(872, 124, 'power_consumption', '165', '2026-02-19 11:50:50', '2026-02-19 11:50:50'),
(873, 124, 'vram_gb', '8', '2026-02-19 11:50:50', '2026-02-19 11:50:50'),
(874, 124, 'power_connector', '1x 8-pin', '2026-02-19 11:50:50', '2026-02-19 11:50:50'),
(875, 124, 'hdmi_ports', '1', '2026-02-19 11:50:50', '2026-02-19 11:50:50'),
(876, 124, 'displayport_ports', '3', '2026-02-19 11:50:50', '2026-02-19 11:50:50'),
(877, 125, 'power_consumption', '285', '2026-02-19 11:51:13', '2026-02-19 11:51:13'),
(878, 125, 'vram_gb', '16', '2026-02-19 11:51:13', '2026-02-19 11:51:13'),
(879, 125, 'power_connector', '1x 16-pin', '2026-02-19 11:51:13', '2026-02-19 11:51:13'),
(880, 125, 'hdmi_ports', '1', '2026-02-19 11:51:13', '2026-02-19 11:51:13'),
(881, 125, 'displayport_ports', '3', '2026-02-19 11:51:13', '2026-02-19 11:51:13'),
(882, 126, 'power_consumption', '263', '2026-02-19 11:51:35', '2026-02-19 11:51:35'),
(883, 126, 'vram_gb', '16', '2026-02-19 11:51:35', '2026-02-19 11:51:35'),
(884, 126, 'power_connector', '2x 8-pin', '2026-02-19 11:51:35', '2026-02-19 11:51:35'),
(885, 126, 'hdmi_ports', '1', '2026-02-19 11:51:35', '2026-02-19 11:51:35'),
(886, 126, 'displayport_ports', '3', '2026-02-19 11:51:35', '2026-02-19 11:51:35'),
(887, 127, 'power_consumption', '320', '2026-02-19 11:51:54', '2026-02-19 11:51:54'),
(888, 127, 'vram_gb', '16', '2026-02-19 11:51:54', '2026-02-19 11:51:54'),
(889, 127, 'power_connector', '1x 16-pin', '2026-02-19 11:51:54', '2026-02-19 11:51:54'),
(890, 127, 'hdmi_ports', '1', '2026-02-19 11:51:54', '2026-02-19 11:51:54'),
(891, 127, 'displayport_ports', '3', '2026-02-19 11:51:54', '2026-02-19 11:51:54'),
(892, 128, 'wattage_w', '450', '2026-02-19 11:52:29', '2026-02-19 11:52:29'),
(893, 128, 'efficiency_rating', '80+ White', '2026-02-19 11:52:29', '2026-02-19 11:52:29'),
(894, 128, 'psu_form_factor', 'ATX', '2026-02-19 11:52:29', '2026-02-19 11:52:29'),
(895, 128, 'modular', 'Non-Modular', '2026-02-19 11:52:29', '2026-02-19 11:52:29'),
(896, 129, 'wattage_w', '650', '2026-02-19 11:52:48', '2026-02-19 11:52:48'),
(897, 129, 'efficiency_rating', '80+ Bronze', '2026-02-19 11:52:48', '2026-02-19 11:52:48'),
(898, 129, 'psu_form_factor', 'ATX', '2026-02-19 11:52:48', '2026-02-19 11:52:48'),
(899, 129, 'modular', 'Non-Modular', '2026-02-19 11:52:48', '2026-02-19 11:52:48'),
(900, 130, 'wattage_w', '750', '2026-02-19 11:53:07', '2026-02-19 11:53:07'),
(901, 130, 'efficiency_rating', '80+ Gold', '2026-02-19 11:53:07', '2026-02-19 11:53:07'),
(902, 130, 'psu_form_factor', 'ATX', '2026-02-19 11:53:07', '2026-02-19 11:53:07'),
(903, 130, 'modular', 'Semi-Modular', '2026-02-19 11:53:07', '2026-02-19 11:53:07'),
(904, 131, 'wattage_w', '850', '2026-02-19 11:53:43', '2026-02-19 11:53:43'),
(905, 131, 'efficiency_rating', '80+ Gold', '2026-02-19 11:53:43', '2026-02-19 11:53:43'),
(906, 131, 'psu_form_factor', 'ATX', '2026-02-19 11:53:43', '2026-02-19 11:53:43'),
(907, 131, 'modular', 'Fully Modular', '2026-02-19 11:53:43', '2026-02-19 11:53:43'),
(908, 132, 'wattage_w', '1200', '2026-02-19 11:54:01', '2026-02-19 11:54:01'),
(909, 132, 'efficiency_rating', '80+ Platinum', '2026-02-19 11:54:01', '2026-02-19 11:54:01'),
(910, 132, 'psu_form_factor', 'ATX', '2026-02-19 11:54:01', '2026-02-19 11:54:01'),
(911, 132, 'modular', 'Fully Modular', '2026-02-19 11:54:01', '2026-02-19 11:54:01'),
(912, 133, 'wattage_w', '1000', '2026-02-19 11:54:17', '2026-02-19 11:54:17'),
(913, 133, 'efficiency_rating', '80+ Titanium', '2026-02-19 11:54:17', '2026-02-19 11:54:17'),
(914, 133, 'psu_form_factor', 'ATX', '2026-02-19 11:54:17', '2026-02-19 11:54:17'),
(915, 133, 'modular', 'Fully Modular', '2026-02-19 11:54:17', '2026-02-19 11:54:17'),
(916, 134, 'power_consumption', '5', '2026-02-19 11:54:44', '2026-02-19 11:54:44'),
(917, 134, 'storage_type', 'NVMe PCIe 3.0', '2026-02-19 11:54:44', '2026-02-19 11:54:44'),
(918, 134, 'capacity', '1TB', '2026-02-19 11:54:44', '2026-02-19 11:54:44'),
(919, 134, 'interface', 'M.2 NVMe', '2026-02-19 11:54:44', '2026-02-19 11:54:44'),
(920, 135, 'power_consumption', '8', '2026-02-19 11:55:14', '2026-02-19 11:55:14'),
(921, 135, 'storage_type', 'NVMe PCIe 4.0', '2026-02-19 11:55:14', '2026-02-19 11:55:14'),
(922, 135, 'capacity', '2TB', '2026-02-19 11:55:14', '2026-02-19 11:55:14'),
(923, 135, 'interface', 'M.2 NVMe', '2026-02-19 11:55:14', '2026-02-19 11:55:14'),
(924, 136, 'power_consumption', '10', '2026-02-19 11:55:43', '2026-02-19 11:55:43'),
(925, 136, 'storage_type', 'NVMe PCIe 4.0', '2026-02-19 11:55:43', '2026-02-19 11:55:43'),
(926, 136, 'capacity', '4TB', '2026-02-19 11:55:43', '2026-02-19 11:55:43'),
(927, 136, 'interface', 'M.2 NVMe', '2026-02-19 11:55:43', '2026-02-19 11:55:43'),
(928, 137, 'power_consumption', '6', '2026-02-19 11:56:14', '2026-02-19 11:56:14'),
(929, 137, 'storage_type', 'NVMe PCIe 4.0', '2026-02-19 11:56:14', '2026-02-19 11:56:14'),
(930, 137, 'capacity', '1TB', '2026-02-19 11:56:14', '2026-02-19 11:56:14'),
(931, 137, 'interface', 'M.2 NVMe', '2026-02-19 11:56:14', '2026-02-19 11:56:14'),
(932, 138, 'power_consumption', '4', '2026-02-19 11:56:43', '2026-02-19 11:56:43'),
(933, 138, 'storage_type', 'NVMe PCIe 3.0', '2026-02-19 11:56:43', '2026-02-19 11:56:43'),
(934, 138, 'capacity', '500GB', '2026-02-19 11:56:43', '2026-02-19 11:56:43'),
(935, 138, 'interface', 'M.2 NVMe', '2026-02-19 11:56:43', '2026-02-19 11:56:43'),
(936, 139, 'power_consumption', '8', '2026-02-19 11:57:05', '2026-02-19 11:57:05'),
(937, 139, 'storage_type', 'HDD 5400 RPM', '2026-02-19 11:57:05', '2026-02-19 11:57:05'),
(938, 139, 'capacity', '3TB', '2026-02-19 11:57:05', '2026-02-19 11:57:05'),
(939, 139, 'interface', '3.5 SATA', '2026-02-19 11:57:05', '2026-02-19 11:57:05'),
(940, 140, 'power_consumption', '10', '2026-02-19 11:57:25', '2026-02-19 11:57:25'),
(941, 140, 'storage_type', 'NAS Drive', '2026-02-19 11:57:25', '2026-02-19 11:57:25'),
(942, 140, 'capacity', '6TB', '2026-02-19 11:57:25', '2026-02-19 11:57:25'),
(943, 140, 'interface', '3.5 SATA', '2026-02-19 11:57:25', '2026-02-19 11:57:25'),
(944, 141, 'power_consumption', '9', '2026-02-19 11:58:28', '2026-02-19 11:58:28'),
(945, 141, 'storage_type', 'HDD 7200 RPM', '2026-02-19 11:58:28', '2026-02-19 11:58:28'),
(946, 141, 'capacity', '2TB', '2026-02-19 11:58:28', '2026-02-19 11:58:28'),
(947, 141, 'interface', '3.5 SATA', '2026-02-19 11:58:28', '2026-02-19 11:58:28'),
(948, 142, 'form_factor_support', 'ATX', '2026-02-19 11:58:48', '2026-02-19 11:58:48'),
(949, 142, 'drive_bays', '2x 3.5\", 2x 2.5\"', '2026-02-19 11:58:48', '2026-02-19 11:58:48'),
(950, 143, 'form_factor_support', 'ATX', '2026-02-19 11:59:12', '2026-02-19 11:59:12'),
(951, 143, 'drive_bays', '2x 3.5\", 3x 2.5\"', '2026-02-19 11:59:13', '2026-02-19 11:59:13'),
(952, 144, 'form_factor_support', 'E-ATX', '2026-02-19 11:59:34', '2026-02-19 11:59:34'),
(953, 144, 'drive_bays', '2x 3.5\", 4x 2.5\"', '2026-02-19 11:59:34', '2026-02-19 11:59:34'),
(954, 145, 'form_factor_support', 'E-ATX', '2026-02-19 11:59:54', '2026-02-19 11:59:54'),
(955, 145, 'drive_bays', '4x 3.5\", 6x 2.5\"', '2026-02-19 11:59:54', '2026-02-19 11:59:54'),
(956, 146, 'form_factor_support', 'ATX', '2026-02-19 12:00:12', '2026-02-19 12:00:12'),
(957, 146, 'drive_bays', '2x 3.5\", 2x 2.5\"', '2026-02-19 12:00:12', '2026-02-19 12:00:12'),
(958, 147, 'power_consumption', '3', '2026-02-19 12:00:31', '2026-02-19 12:00:31'),
(959, 147, 'cooler_type', 'Air Tower', '2026-02-19 12:00:31', '2026-02-19 12:00:31'),
(960, 147, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4, AM3+', '2026-02-19 12:00:31', '2026-02-19 12:00:31'),
(961, 147, 'max_tdp_support', '150', '2026-02-19 12:00:31', '2026-02-19 12:00:31'),
(962, 147, 'fan_count', '1', '2026-02-19 12:00:31', '2026-02-19 12:00:31'),
(963, 148, 'power_consumption', '4', '2026-02-19 12:00:52', '2026-02-19 12:00:52'),
(964, 148, 'cooler_type', 'Air Tower', '2026-02-19 12:00:52', '2026-02-19 12:00:52'),
(965, 148, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4', '2026-02-19 12:00:52', '2026-02-19 12:00:52'),
(966, 148, 'max_tdp_support', '260', '2026-02-19 12:00:52', '2026-02-19 12:00:52'),
(967, 148, 'fan_count', '2', '2026-02-19 12:00:52', '2026-02-19 12:00:52'),
(968, 149, 'power_consumption', '12', '2026-02-19 12:01:15', '2026-02-19 12:01:15'),
(969, 149, 'cooler_type', 'AIO 240mm', '2026-02-19 12:01:15', '2026-02-19 12:01:15'),
(970, 149, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4', '2026-02-19 12:01:15', '2026-02-19 12:01:15'),
(971, 149, 'max_tdp_support', '300', '2026-02-19 12:01:15', '2026-02-19 12:01:15'),
(972, 149, 'fan_count', '2', '2026-02-19 12:01:15', '2026-02-19 12:01:15'),
(973, 150, 'power_consumption', '14', '2026-02-19 12:01:37', '2026-02-19 12:01:37'),
(974, 150, 'cooler_type', 'AIO 240mm', '2026-02-19 12:01:37', '2026-02-19 12:01:37'),
(975, 150, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4', '2026-02-19 12:01:37', '2026-02-19 12:01:37'),
(976, 150, 'max_tdp_support', '250', '2026-02-19 12:01:37', '2026-02-19 12:01:37'),
(977, 150, 'fan_count', '2', '2026-02-19 12:01:37', '2026-02-19 12:01:37'),
(978, 151, 'power_consumption', '16', '2026-02-19 12:02:19', '2026-02-19 12:02:19'),
(979, 151, 'cooler_type', 'AIO 360mm', '2026-02-19 12:02:19', '2026-02-19 12:02:19'),
(980, 151, 'socket_compatibility', 'LGA1700, LGA1200, AM5, AM4, TR5', '2026-02-19 12:02:19', '2026-02-19 12:02:19'),
(981, 151, 'max_tdp_support', '350', '2026-02-19 12:02:19', '2026-02-19 12:02:19'),
(982, 151, 'fan_count', '3', '2026-02-19 12:02:19', '2026-02-19 12:02:19'),
(983, 152, 'power_consumption', '1', '2026-02-19 12:02:53', '2026-02-19 12:02:53'),
(984, 152, 'cooler_type', 'Case Fan', '2026-02-19 12:02:53', '2026-02-19 12:02:53'),
(985, 152, 'fan_count', '1', '2026-02-19 12:02:53', '2026-02-19 12:02:53'),
(986, 153, 'power_consumption', '4', '2026-02-19 12:03:12', '2026-02-19 12:03:12'),
(987, 153, 'cooler_type', 'Case Fan', '2026-02-19 12:03:12', '2026-02-19 12:03:12'),
(988, 153, 'fan_count', '2', '2026-02-19 12:03:12', '2026-02-19 12:03:12'),
(989, 154, 'power_consumption', '5', '2026-02-19 12:03:35', '2026-02-19 12:03:35'),
(990, 154, 'cooler_type', 'Case Fan', '2026-02-19 12:03:35', '2026-02-19 12:03:35'),
(991, 154, 'fan_count', '3', '2026-02-19 12:03:35', '2026-02-19 12:03:35'),
(992, 163, 'vram_gb', '2', '2026-03-02 15:16:36', '2026-03-02 15:16:36'),
(993, 163, 'bus_width', 'No External Power Required', '2026-03-02 15:16:36', '2026-03-02 15:16:36'),
(994, 163, 'hdmi_ports', '1', '2026-03-02 15:16:36', '2026-03-02 15:16:36'),
(995, 163, 'displayport_ports', '1', '2026-03-02 15:16:36', '2026-03-02 15:16:36');

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
(24, 2, 'OtherImage/MLySdDFrIrk3MrOc6sbh.webp', '2025-08-10 11:03:21', '2025-08-10 11:03:21'),
(25, 159, 'OtherImage/tsFxpFdWNicucMaGKins.jpg', '2026-02-19 08:30:42', '2026-02-19 08:30:42'),
(26, 23, 'OtherImage/ziXj8t36u1T3gZiNBK1p.jpg', '2026-03-10 11:05:37', '2026-03-10 11:05:37'),
(28, 23, 'OtherImage/1uqgmPxvtLpg3fGqAbl2.jpg', '2026-03-10 11:05:50', '2026-03-10 11:05:50'),
(29, 23, 'OtherImage/hpcLwaQzRFF9PqgJrMVn.jpg', '2026-03-10 11:05:56', '2026-03-10 11:05:56'),
(30, 23, 'OtherImage/niTbEQMaesL7v2KC4mFb.jpg', '2026-03-10 11:06:27', '2026-03-10 11:06:27');

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
(2, 'Inactive'),
(4, 'Active');

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
(19, 1, 'Thisara Ariyawansha', 'thisara@gmail.com', 5, 'Good product', 1, '2025-09-11 14:00:16', '2025-09-11 14:06:11'),
(20, 161, 'Thisara Ariyawansha', 'thisaraariyawansha2001@gmail.com', 5, 'Good Product', 2, '2026-02-19 07:01:42', '2026-02-19 08:45:19'),
(21, 23, 'Thisara Ariyawansha', 'thisara@gmail.com', 4, 'Good', 2, '2026-03-10 11:07:34', '2026-03-10 11:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `contact_phone` varchar(255) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `user_id`, `shop_name`, `logo`, `cover_image`, `location`, `contact_phone`, `contact_email`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 4, 'TechZone Store', 'storage/ShopImages/logos/AIXU1pZjgq3HvAe3b28NuOXCckSoCdBRVvzO6ee5.png', 'storage/ShopImages/covers/a9KFIdOBCzr7mOWzo4itYYl0235XBfI3RtfJsSL2.jpg', '45 Galle Road, Colombo 03', '+94 77 123 4566', 'kasun@techzone.lk', 'Your one-stop shop for the latest laptops, PCs and accessories.', 1, '2026-02-18 14:28:23', '2026-02-19 10:39:11'),
(2, 5, 'GamersHub LK', NULL, NULL, '12 Duplication Road, Colombo 04', '+94 76 234 5678', 'nimali@gamershub.lk', 'Gaming PCs, peripherals, consoles and everything a gamer needs.', 1, '2026-02-18 14:28:23', '2026-02-18 14:28:23'),
(3, 6, 'ComponentKing', NULL, NULL, '78 Kandy Road, Kadawatha', '+94 71 345 6789', 'thilak@componentking.lk', 'Specialist in PC components — CPUs, motherboards, RAM, GPUs and more.', 1, '2026-02-18 14:28:23', '2026-02-18 14:28:23'),
(4, 7, 'Tech', NULL, NULL, '21 B Sumanasara Road Matara', '0765566753', 'tech@gmail.com', 'ABCDE', 1, '2026-02-19 10:45:48', '2026-02-19 10:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$0ZG3JmaRL/5sPXLxlFpOB.84KchNinsLeHgr6TRoVPs.1Vq8cRns.', 's4Q62vr81zeXiByF4rZ0yR5mPZ2T41S3v0bfhbTUxUL1FVTc2kSRSTfVcChd', '2025-01-23 05:27:35', '2025-08-10 14:09:17'),
(2, 'admin', 'admin1@gmail.com', 'admin', NULL, '$2y$10$KYqhM5R/rmpnoMzbup7tU./97Nmre2xlLfmIbekVC4IHVHHJ2jgHW', NULL, '2025-02-12 20:32:26', '2025-02-12 20:32:26'),
(3, 'admin', 'admin2@gmail.com', 'admin', NULL, '$2y$10$UmNm07/.QVkgPsesc9Oa1uqm/sbyBiwlTce09.HmyiY3FP6j6zZwm', NULL, '2025-02-13 02:49:11', '2025-02-13 02:49:11'),
(4, 'Kasun Perera', 'kasun@techzone.lk', 'shop_owner', NULL, '$2y$10$0ZG3JmaRL/5sPXLxlFpOB.84KchNinsLeHgr6TRoVPs.1Vq8cRns.', NULL, '2026-02-18 14:28:23', '2026-02-19 10:10:41'),
(5, 'Nimali Silva', 'nimali@gamershub.lk', 'shop_owner', NULL, '$2y$10$0ZG3JmaRL/5sPXLxlFpOB.84KchNinsLeHgr6TRoVPs.1Vq8cRns.', NULL, '2026-02-18 14:28:23', '2026-02-18 14:28:23'),
(6, 'Thilak Fernando', 'thilak@componentking.lk', 'shop_owner', NULL, '$2y$10$3zX79OV8VO5DaBv5.kuoEOpqHIWPtXH2o2Ef8S4il58YcLMmTgirO', NULL, '2026-02-18 14:28:23', '2026-02-18 14:28:23'),
(7, 'Kamal', 'kamal@gmail.com', 'shop_owner', NULL, '$2y$10$XnLYpq83wExHrr1ptmZxjesnQnQcBPdvLFRArUjxEU8fZt/DUJQnq', NULL, '2026-02-19 10:45:48', '2026-02-19 10:45:48');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

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
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shops_user_id_unique` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ai_messages`
--
ALTER TABLE `ai_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bitorders`
--
ALTER TABLE `bitorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `product_features`
--
ALTER TABLE `product_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=996;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

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

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
