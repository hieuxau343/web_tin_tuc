-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 03:21 AM
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
-- Database: `web_tin_tuc`
--
CREATE DATABASE IF NOT EXISTS `web_tin_tuc` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `web_tin_tuc`;

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'PUBLIC'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `image`, `link`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Dầu gội Th&aacute;i Dương', 'dau-goi.webp', 'https://saothaiduong.com.vn', '2021-12-15 15:48:59', '2024-11-22 01:51:01', 'ACTIVE'),
(3, ' Dạ hương ', 'dung-dich.jpg', 'https://daotao.humg.edu.vn/', '2021-12-15 16:23:19', '2024-11-20 01:06:18', 'ACTIVE'),
(4, 'Bột giặt OMO', 'bot-giac.jpg', 'https://www.unilever.com.vn/brands/home-care/omo/', '2021-12-16 15:34:13', '2024-11-23 11:21:29', 'ACTIVE');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(191) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(191) NOT NULL,
  `owner` varchar(191) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Thể thao', 'Thethao', '2021-12-19 13:39:21', '2024-11-25 01:49:57'),
(2, 'Khoa học', 'khoahoc', '2021-12-15 13:52:16', '2024-11-25 01:49:59'),
(3, 'Xe ++', 'xe++', '2021-12-15 13:52:16', '2021-12-12 07:52:16'),
(4, 'Thời trang', 'thoitrang', '2021-12-24 06:02:10', '2024-11-25 01:50:01'),
(5, 'Xã hội', 'xahoi', '2021-12-24 06:02:10', '2024-11-24 16:46:23'),
(6, 'Kinh doanh', 'kinhdoanh', '2021-12-24 06:02:10', '2024-11-24 16:46:26'),
(7, 'Sức khỏe', 'suckhoe', '2021-12-24 06:02:10', '2024-11-24 16:46:32'),
(8, 'Giáo dục', 'giaoduc', '2021-12-24 06:02:10', '2024-11-24 16:46:35'),
(9, 'Văn hóa', 'vanhoa', '2021-12-24 06:02:10', '2024-11-24 16:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(191) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(9, '2024_11_10_145218_update_status_column_in_categories_table', 2),
(48, '0001_01_01_000000_create_users_table', 3),
(49, '0001_01_01_000001_create_cache_table', 3),
(50, '0001_01_01_000002_create_jobs_table', 3),
(51, '2024_11_09_142227_create_categories_table', 3),
(52, '2024_11_13_062943_create_accounts_table', 3),
(53, '2024_11_14_112325_create_advertisements_table', 4),
(54, '2024_11_19_214345_create_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image`, `content`, `status`, `created_at`, `updated_at`, `category_id`, `user_id`) VALUES
(5, 'Vì sao hàng ngàn người tập trung trước Nhà hát lớn Hà Nội khiến đường tắc từ sáng tới chiều?', 'vi-sao-hang-ngan-nguoi-tep-trung-truoc-nha-hat-lon-ha-noi-khien-auong-tac-tu-sang-toi-chieu', 'jjwjv-1732441142797930947806.jpg', '<h2 class=\"detail-sapo\" data-role=\"sapo\">Từ s&aacute;ng tới chiều 24-11, tại trước khu vực Nh&agrave; h&aacute;t lớn H&agrave; Nội h&agrave;ng ng&agrave;n bạn trẻ tập trung g&acirc;y &ugrave;n tắc giao th&ocirc;ng nghi&ecirc;m trọng, v&igrave; sao?<img src=\"/storage/photos/19/post/jjwjv-1732441142797930947806.jpg\" alt=\"\" width=\"1200\" height=\"900\" /></h2>\r\n<p class=\"\">Chiều 24-11, mạng x&atilde; hội xuất hiện h&igrave;nh ảnh trước khu vực&nbsp;<a class=\"link-inline-content\" title=\"Nh&agrave; h&aacute;t lớn H&agrave; Nội\" href=\"https://tuoitre.vn/nha-hat-lon-ha-noi.html\" data-rel=\"follow\">Nh&agrave; h&aacute;t lớn H&agrave; Nội</a>&nbsp;(quận Ho&agrave;n Kiếm, H&agrave; Nội) c&oacute; h&agrave;ng ng&agrave;n bạn trẻ tập trung g&acirc;y &ugrave;n tắc giao th&ocirc;ng nghi&ecirc;m trọng. Nhiều người đặt c&acirc;u hỏi tại khu vực n&agrave;y c&oacute; sự kiện g&igrave; m&agrave; lại nhiều người tập trung đến như vậy?</p>\r\n<p class=\"\">Trao đổi với&nbsp;<em>Tuổi Trẻ Online&nbsp;</em>chiều c&ugrave;ng ng&agrave;y, một l&atilde;nh đạo UBND quận Ho&agrave;n Kiếm cho biết trong tối 24-11, tại trước khu vực Nh&agrave; h&aacute;t lớn, một tập đo&agrave;n lớn của Việt Nam tổ chức sự kiện tri &acirc;n kh&aacute;ch h&agrave;ng dịp 20 năm th&agrave;nh lập.</p>\r\n<div class=\"VCSortableInPreviewMode  alignRight\" data-style=\"align-right\">\r\n<div class=\"kbwscwl-relatedbox type-2 tuoitre\">\r\n<ul class=\"kbwscwlr-list\">\r\n<li class=\"kbwscwlrl\" data-date=\"18/04/2023 14:16\" data-id=\"20230418140120731\" data-avatar=\"https://cdn.tuoitre.vn/471584752817336320/2023/4/18/img3310-16818000866882136285186-71-0-874-1284-crop-16818003762981782862724.jpg\" data-url=\"/bat-tai-xe-o-to-bieu-dien-drift-gay-nao-loan-truoc-nha-hat-lon-ha-noi-20230418140120731.htm\" data-title=\"Bắt t&agrave;i xế &ocirc; t&ocirc; \'biểu diễn\' drift g&acirc;y n&aacute;o loạn trước Nh&agrave; h&aacute;t lớn H&agrave; Nội\">\r\n<h4 class=\"kbwscwlrl-title\"><a class=\"title link-callout\" href=\"https://tuoitre.vn/bat-tai-xe-o-to-bieu-dien-drift-gay-nao-loan-truoc-nha-hat-lon-ha-noi-20230418140120731.htm\" target=\"_blank\" rel=\"noopener\">Bắt t&agrave;i xế &ocirc; t&ocirc; \'biểu diễn\' drift g&acirc;y n&aacute;o loạn trước Nh&agrave; h&aacute;t lớn H&agrave; Nội</a></h4>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n<div id=\"InreadPc\"></div>\r\n<p class=\"\">Theo vị n&agrave;y, sự kiện tr&ecirc;n mời nhiều ca sĩ nổi tiếng n&ecirc;n thu h&uacute;t nhiều bạn trẻ tập trung ở đ&acirc;y từ s&aacute;ng sớm, khiến đường phố &ugrave;n tắc nghi&ecirc;m trọng.</p>\r\n<p class=\"\">\"Đường đ&ocirc;ng đ&uacute;c từ s&aacute;ng tới giờ, hiện quận đang cấm xe đi v&agrave;o khu vực tr&ecirc;n để đảm bảo an ninh trật tự. Mấy ng&agrave;n người k&eacute;o đến đ&acirc;y từ s&aacute;ng tới giờ, c&agrave;ng về chiều tối c&agrave;ng đ&ocirc;ng hơn\" - vị l&atilde;nh đạo UBND quận Ho&agrave;n Kiếm cho biết.</p>\r\n<p class=\"\">Theo t&igrave;m hiểu của&nbsp;<em>Tuổi Trẻ Online</em>, sự kiện diễn ra trước khu vực Nh&agrave; h&aacute;t lớn tối 24-11 sẽ c&oacute; sự g&oacute;p mặt của c&aacute;c ng&ocirc;i sao đ&igrave;nh đ&aacute;m h&agrave;ng đầu showbiz Việt như Sơn T&ugrave;ng M-TP, Isaac, Soobin Ho&agrave;ng Sơn, HIEUTHUHAI, H&ograve;a Minzy, Orange, Dương Domic&hellip;</p>', 'ACTIVE', '2024-11-24 11:37:31', '2024-11-28 07:24:31', 5, 19),
(6, 'Biết nghề nghiệp của chú rể, cô dâu lập tức hủy hôn', 'biet-nghe-nghiep-cua-chu-re-co-dau-lap-tuc-huy-hon', 'anh1.png', '<h2 class=\"content-detail-sapo sm-sapo-mb-0\">ẤN ĐỘ - C&ocirc; d&acirc;u hủy h&ocirc;n khi biết nghề nghiệp của ch&uacute; rể trước ng&agrave;y đ&aacute;m cưới ch&iacute;nh thức diễn ra. Mặc d&ugrave;, thu nhập của anh mỗi th&aacute;ng hơn 36 triệu đồng nhưng vẫn kh&ocirc;ng l&agrave;m c&ocirc; h&agrave;i l&ograve;ng.<img src=\"/storage/photos/19/post/anh1.png\" alt=\"\" width=\"682\" height=\"384\" /></h2>', 'ACTIVE', '2024-11-28 07:21:09', '2024-11-28 07:21:09', 5, 19),
(7, 'Nga nã tên lửa hành trình vào các thành phố khắp Ukraine', 'nga-na-ten-lua-hanh-trinh-vao-cac-thanh-pho-khap-ukraine', 'kiev-17327706053591808609966.png', '<h2 class=\"detail-sapo\" data-role=\"sapo\">Ng&agrave;y 28-11, qu&acirc;n đội Ukraine cho biết cảnh b&aacute;o kh&ocirc;ng k&iacute;ch đ&atilde; được ph&aacute;t tr&ecirc;n khắp nước n&agrave;y khi Nga ph&oacute;ng t&ecirc;n lửa v&agrave;o nhiều v&ugrave;ng.</h2>\r\n<figure class=\"image\"><img src=\"/storage/photos/19/post/kiev-17327706053591808609966.png\" alt=\"\" width=\"1200\" height=\"800\" />\r\n<figcaption>\r\n<figure class=\"VCSortableInPreviewMode\">\r\n<figcaption class=\"PhotoCMS_Caption\">\r\n<p data-placeholder=\"Nhập ch&uacute; th&iacute;ch ảnh\">Mọi người tr&uacute; ẩn b&ecirc;n trong một nh&agrave; ga t&agrave;u điện ngầm giữa l&uacute;c Nga tấn c&ocirc;ng Ukraine. Ảnh chụp tại thủ đ&ocirc; Kiev, Ukraine ng&agrave;y 28-11 - Ảnh: REUTERS</p>\r\n</figcaption>\r\n</figure>\r\n</figcaption>\r\n</figure>\r\n<p class=\"\">\"Cảnh b&aacute;o kh&ocirc;ng k&iacute;ch đ&atilde; được đưa ra tr&ecirc;n to&agrave;n l&atilde;nh thổ&nbsp;<a class=\"link-inline-content\" title=\"Ukraine\" href=\"https://tuoitre.vn/ukraine.html\" data-rel=\"follow\">Ukraine</a>&nbsp;do mối đe dọa t&ecirc;n lửa\" - kh&ocirc;ng qu&acirc;n Ukraine th&ocirc;ng b&aacute;o tr&ecirc;n ứng dụng Telegram ng&agrave;y 28-11, đồng thời cho biết họ ph&aacute;t hiện c&aacute;c t&ecirc;n lửa đang bay đến Kharkov, Odessa v&agrave; 8 v&ugrave;ng kh&aacute;c, theo H&atilde;ng tin AFP.</p>\r\n<p class=\"\">\"Kharkov, h&atilde;y v&agrave;o địa điểm tr&uacute; ẩn!\" - kh&ocirc;ng qu&acirc;n Ukraine cảnh b&aacute;o.</p>\r\n<p class=\"\">H&atilde;ng Reuters cũng đưa tin Nga tấn c&ocirc;ng c&aacute;c th&agrave;nh phố tr&ecirc;n khắp Ukraine bằng t&ecirc;n lửa h&agrave;nh tr&igrave;nh.</p>\r\n<p class=\"\">B&aacute;o<em>&nbsp;Zerkalo Tyzhnya</em>&nbsp;v&agrave; Đ&agrave;i Suspilne của Ukraine tường thuật người ta nghe thấy tiếng nổ ở c&aacute;c th&agrave;nh phố Odessa, Kropyvnytskyi, Kharkov, Rivne v&agrave; Lutsk của Ukraine v&agrave;o s&aacute;ng 28-11, trong bối cảnh c&oacute; tin Nga tấn c&ocirc;ng bằng&nbsp;<a class=\"file-download-link\" title=\"t&ecirc;n lửa\" href=\"https://tuoitre.vn/thu-do-ukraine-rung-chuyen-vi-nga-tan-cong-ten-lua-20241113142957917.htm\" target=\"_blank\" rel=\"noopener\">t&ecirc;n lửa</a>&nbsp;h&agrave;nh tr&igrave;nh.</p>\r\n<p class=\"\">\"Gần s&aacute;ng, Nga đ&atilde; triển khai 7 m&aacute;y bay n&eacute;m bom chiến lược Tu-95MS l&ecirc;n kh&ocirc;ng trung. Sau đ&oacute; v&agrave;o l&uacute;c 5h03 s&aacute;ng (theo giờ Kiev), họ đ&atilde; ph&oacute;ng t&ecirc;n lửa h&agrave;nh tr&igrave;nh Kalibr từ biển Đen\" - H&atilde;ng RBC, Ukraine đăng th&ocirc;ng tin.</p>\r\n<p class=\"\">Tr&ecirc;n Facebook, Bộ trưởng Năng lượng Ukraine Herman Halushchenko cho biết cơ sở hạ tầng năng lượng nước n&agrave;y \"một lần nữa trở th&agrave;nh mục ti&ecirc;u trong cuộc tấn c&ocirc;ng quy m&ocirc; lớn của đối phương\".</p>\r\n<p class=\"\">C&ograve;n thị trưởng Kharkov Ihor Terekhov viết tr&ecirc;n Telegram: \"Đối phương tiếp tục tấn c&ocirc;ng Kharkov bằng t&ecirc;n lửa\".</p>\r\n<p class=\"\">Thống đốc v&ugrave;ng Odessa Oleh Kiper đ&atilde; k&ecirc;u gọi người d&acirc;n ở tại nơi tr&uacute; ẩn.</p>\r\n<p class=\"\">Đợt tấn c&ocirc;ng t&ecirc;n lửa mới nhất của Nga diễn ra một ng&agrave;y sau khi Tổng thống đắc cử Mỹ Donald Trump chọn tướng về hưu Keith Kellogg l&agrave;m \"đặc ph&aacute;i vi&ecirc;n về Ukraine v&agrave; Nga\" trong ch&iacute;nh quyền sắp tới, với nhiệm vụ chấm dứt cuộc xung đột n&agrave;y.</p>\r\n<p class=\"\">Xung đột Nga - Ukraine đang tiếp tục tăng nhiệt. H&ocirc;m 21-11, Nga ph&oacute;ng t&ecirc;n lửa đạn đạo si&ecirc;u vượt &acirc;m tầm trung mới c&oacute; t&ecirc;n&nbsp;<a class=\"file-download-link\" title=\"Oreshnik\" href=\"https://tuoitre.vn/can-canh-manh-vo-ten-lua-sieu-vuot-am-oreshnik-20241125063417059.htm\" target=\"_blank\" rel=\"noopener\">Oreshnik</a>&nbsp;v&agrave;o một cơ sở quốc ph&ograve;ng của Ukraine tại th&agrave;nh phố Dnipro.</p>\r\n<p class=\"\">Tổng thống Nga Vladimir Putin giải th&iacute;ch việc sử dụng t&ecirc;n lửa n&agrave;y l&agrave; để đ&aacute;p trả c&aacute;c cuộc tấn c&ocirc;ng của Ukraine v&agrave;o l&atilde;nh thổ Nga bằng vũ kh&iacute; tầm xa do phương T&acirc;y cung cấp như t&ecirc;n lửa ATACMS của Mỹ v&agrave; t&ecirc;n lửa Storm Shadow của Anh.</p>', 'ACTIVE', '2024-11-28 07:42:56', '2024-11-28 07:43:52', 5, 19);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dzkvek8dvAQ4GXLGmSk6M8ppkpLWFNUUr24iC0fJ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTEF1TExHNk5iQzhGaG5HdEVUcmJpZ3VwQlpNNVNFYU9lOXhVMkFtaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0LzUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fX0=', 1732876444);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `image` varchar(191) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role` varchar(20) DEFAULT 'USER',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `address`, `birthday`, `image`, `gender`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Trần Minh Hiếu', '0364960577', '123 Lê Kiệt', '2000-11-21 00:00:00', NULL, 'Nam', 'hieubodoi@gmail.com', NULL, '$2y$12$1fLpJu1cVn7qNyj4ok1tPeFc7UX95bc0pcVRZA2oXCa.ZSsE0DHNq', 'ADMIN', NULL, NULL, '2024-11-20 01:01:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
