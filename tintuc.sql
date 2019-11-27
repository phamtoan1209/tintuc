-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 02:34 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tintuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_block` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `username`, `email`, `password`, `avatar`, `remember_token`, `is_active`, `is_block`, `created_at`, `updated_at`) VALUES
(4, 'Phạm Văn Toàn', 'admin', 'admin@gmail.com', '$2y$10$rFzWZ3AiCGeXhVJBC9pgFuOfz82btp2uZUzoMDY9XswT.CkBuvYSu', 'uploads/admins/1573224446_MTgzMDM3Nz.jpg', 'zDCEJ0RG2o71k3Nscyzy6c7z2rkyLWmcqmUwr516zwarDZd1kzKGXtAN4Qrw', 1, 0, NULL, '2019-11-08 14:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `slug`, `type`, `created_at`, `updated_at`, `large`, `thumb`, `hot`, `parent_id`, `description`, `title_seo`, `description_seo`, `keyword_seo`, `content`) VALUES
(1, 'Ván 1', 'van-1', 0, '2019-11-08 14:05:09', '2019-11-16 17:27:01', NULL, NULL, 1, 0, 'Danh mục ván', NULL, NULL, NULL, '<p>549</p>'),
(3, 'Ván 2', 'van-2', 0, '2019-11-08 14:26:27', '2019-11-16 07:37:33', NULL, NULL, 0, 1, 'Ván chống ẩm', NULL, NULL, NULL, ''),
(4, 'Phòng khách', 'phong-khach', 1, '2019-11-09 14:53:49', '2019-11-10 13:30:10', NULL, NULL, 0, 0, 'Các bài thi công phòng khách', NULL, NULL, NULL, ''),
(5, 'Phòng ngủ', 'phong-ngu', 1, '2019-11-10 13:29:59', '2019-11-10 13:43:26', NULL, NULL, 0, 0, 'Phòng ngủ', NULL, NULL, NULL, ''),
(11, 'Ván 3', 'van-3', 0, '2019-11-16 07:37:55', '2019-11-16 07:37:55', NULL, NULL, 0, 3, 'Mô tả ván 3', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `email`, `content`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Phạm Văn Toàn', '0855212356', 'toanpv@unica.vn', 'Tôi cần tư vấn loại ván sàn chống nước tốt để lát ngoài hè', 1, '2019-11-09 15:52:52', '2019-11-09 15:53:32'),
(8, 'Không xác định', '0855212356', 'Không xác định', 'Không xác định', 0, '2019-11-09 15:54:01', '2019-11-09 15:54:01'),
(9, 'zc', 'zczx', 'zxcxc@sda', 'zxc', 0, '2019-11-09 16:02:47', '2019-11-09 16:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `informations`
--

CREATE TABLE `informations` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informations`
--

INSERT INTO `informations` (`id`, `key`, `created_at`, `updated_at`, `name`, `value`) VALUES
(1, 'domain', '2018-10-01 14:21:31', '2019-11-11 13:04:10', 'Tên miền', 'https://tuanhungphat.vn/'),
(2, 'email', '2018-10-01 14:23:28', '2019-11-11 13:04:31', 'Email', 'tuanceo@tuanhungphat.vn'),
(3, 'phone', '2018-10-01 14:23:42', '2019-11-11 13:03:51', 'Số điện thoại', '0397522222'),
(4, 'address', '2018-10-01 14:24:19', '2019-11-20 01:22:51', 'Địa chỉ', 'Số 25 - Liền kề 13 - Khu đô thị Xa La - Phường Phúc La - Hà Đông - Hà Nội'),
(5, 'fanpage', '2018-10-01 14:26:34', '2019-11-19 04:24:21', 'Fanpage facebook', 'https://www.facebook.com/Vantuanhungphat'),
(6, 'slogan', '2018-10-01 14:28:16', '2019-11-20 01:24:40', 'Khẩu hiệu', 'CÔNG TY TNHH THƯƠNG MẠI TUẤN HƯNG PHÁT\r\nCHẤT LƯỢNG - DỊCH VỤ TẠO NÊN THƯƠNG HIỆU'),
(8, 'logo', '2018-10-04 17:00:00', '2019-11-14 01:20:46', 'Logo', 'uploads/logo/1573694446_NzI3OTY5Mz_van-cong-nghiep-tuan-hung-phat.png'),
(9, 'favicon', '2018-10-10 17:00:00', '2019-11-14 01:21:26', 'Favicon', 'uploads/favicon/thumb/1573694486_MjA3NTQ3Nz_van-cong-nghiep-tuan-hung-phat.png'),
(10, 'youtube', '2019-11-06 17:00:00', '2019-11-10 13:38:00', 'Kênh youtube', 'Đang được cập nhật ...'),
(11, 'google', '2019-11-05 17:00:00', '2019-11-10 13:38:05', 'Link google', 'Đang được cập nhật ...'),
(12, 'why_me', '2019-11-07 17:00:00', '2019-11-18 01:12:03', 'Tại sao chọn chúng tôi', 'Tuấn Hưng Phát đã có hơn 10 năm kinh nghiệm hoạt động trong lĩnh vực van công nghiệp, đồng hồ đo nước đạt chất lượng cao. Tuấn Hưng Phát hân hạnh đại diện phân phối độc quyền cho 3 thương hiệu: van công nghiệp Wonil Hàn Quốc; Van điều khiển KosaPlus Hàn Quốc; Van điều khiển Haitima Đài Loan. Ngoài ra, Đơn vị còn phân phối rất đa dạng sản phẩm van công nghiệp, vật tư - phụ kiện ngành nước được sản xuất theo tiêu chuẩn ISO 9001: 2000, đạt chuẩn DIN, BS, JIS v.v. Sản phẩm của chúng tôi đã và đang được sử dụng cho các dự án xây dựng và các công ty cấp nước, trong các hệ thống sản xuất, xử lý nước thải trên toàn quốc. Với kho hàng rộng 1.200m2, Tuấn Hưng Phát đã nhập khẩu lưu kho số lượng lớn các sản phẩm van công nghiệp, phụ kiện ngành nước,..., luôn sẵn sàng phục vụ quý khách.'),
(13, 'trademark', '2019-11-06 17:00:00', '2019-11-11 13:02:06', 'Mô tả thương hiệu', 'Đang là nhà phân phối sản phẩm van công nghiệp Hàn Quốc hàng đầu Việt Nam, sản phẩm chất lượng, chế độ bảo hành dài hạn, giấy tờ nhập khẩu đầy đủ, bao gồm các hãng van:  Van WONIL - Van KOSA PLUS - Van HAITIMA'),
(14, 'name_company', NULL, '2019-11-11 12:59:46', 'Tên công ty', 'CÔNG TY TNHH THƯƠNG MẠI TUẤN HƯNG PHÁT'),
(15, 'intro_company', '2019-11-03 17:00:00', '2019-11-18 01:17:51', 'Giới thiệu công ty', 'Tuấn Hưng Phát đã có hơn 10 năm kinh nghiệm hoạt động trong lĩnh vực van công nghiệp, đồng hồ đo nước đạt chất lượng cao. Tuấn Hưng Phát hân hạnh đại diện phân phối độc quyền cho 3 thương hiệu: van công nghiệp Wonil Hàn Quốc; Van điều khiển KosaPlus Hàn Quốc; Van điều khiển Haitima Đài Loan. Ngoài ra, Đơn vị còn phân phối rất đa dạng sản phẩm van công nghiệp, vật tư - phụ kiện ngành nước được sản xuất theo tiêu chuẩn ISO 9001: 2000, đạt chuẩn DIN, BS, JIS v.v. Sản phẩm của chúng tôi đã và đang được sử dụng cho các dự án xây dựng và các công ty cấp nước, trong các hệ thống sản xuất, xử lý nước thải trên toàn quốc. Với kho hàng rộng 1.200m2, Tuấn Hưng Phát đã nhập khẩu lưu kho số lượng lớn các sản phẩm van công nghiệp, phụ kiện ngành nước,..., luôn sẵn sàng phục vụ quý khách.'),
(18, 'title_seo', '2019-11-03 17:00:00', '2019-11-20 01:28:20', 'Tiêu đề seo mặc định', 'Tuấn Hưng Phát - đơn vị  cung cấp van công nghiệp độc quyền hàng đầu tại Việt Nam'),
(19, 'description_seo', NULL, '2019-11-18 01:45:27', 'Mô tả seo mặc định', 'Tuấn Hưng Phát - đơn vị hàng đầu cung cấp van công nghiệp'),
(20, 'keyword_seo', '2019-11-04 17:00:00', '2019-11-18 01:45:38', 'Keyword seo mặc định', 'van công nghiệp'),
(21, 'background', '2019-11-04 17:00:00', '2019-11-19 01:53:05', 'Màu chủ đạo của website', '#2F6179'),
(22, 'style', '2019-11-03 17:00:00', '2019-11-18 01:14:07', 'Phong cách', 'Tuấn Hưng Phát đã có hơn 10 năm kinh nghiệm hoạt động trong lĩnh vực van công nghiệp, đồng hồ đo nước đạt chất lượng cao'),
(23, 'procedure', NULL, '2019-11-18 01:14:56', 'Quy trình', 'Tuấn Hưng Phát đã có hơn 10 năm kinh nghiệm hoạt động trong lĩnh vực van công nghiệp, đồng hồ đo nước đạt chất lượng cao.'),
(24, 'progress', NULL, '2019-11-18 01:15:04', 'Tiến độ', 'Tuấn Hưng Phát đã có hơn 10 năm kinh nghiệm hoạt động trong lĩnh vực van công nghiệp, đồng hồ đo nước đạt chất lượng cao.'),
(25, 'situation', '2019-11-03 17:00:00', '2019-11-18 01:14:30', 'Hoàn cảnh', 'Tuấn Hưng Phát đã có hơn 10 năm kinh nghiệm hoạt động trong lĩnh vực van công nghiệp, đồng hồ đo nước đạt chất lượng cao.'),
(26, 'label_one', NULL, '2019-11-19 04:22:40', 'Text 1', 'CÔNG TY TNHH THƯƠNG MẠI TUẤN HƯNG PHÁT'),
(27, 'label_two', NULL, '2019-11-19 04:23:30', 'Text 2', 'TUẤN HƯNG PHÁT - SẢN PHẨM ĐỘC QUYỀN'),
(28, 'label_three', NULL, '2019-11-19 04:26:41', 'Text 3', 'TUẤN HƯNG PHÁT - TIN TỨC CHUYÊN NGÀNH'),
(29, 'label_four', NULL, NULL, 'Label Tại sap chọn', 'TẠI SAO CHỌN TUẤN HƯNG PHÁT?'),
(30, 'label_five', NULL, '2019-11-19 04:44:17', 'Text 4', 'Sản phẩm độc quyền'),
(31, 'label_six', NULL, NULL, 'Text 5', 'Quy trình chặt chẽ'),
(32, 'label_seven', NULL, '2019-11-19 04:31:20', 'Text 6', 'Đa dạng sản phẩm'),
(33, 'label_eight', NULL, '2019-11-19 04:28:36', 'Text 7', 'Cam kết chất lượng');

-- --------------------------------------------------------

--
-- Table structure for table `intros`
--

CREATE TABLE `intros` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `intros`
--

INSERT INTO `intros` (`id`, `content`, `created_at`, `updated_at`, `name`, `link`) VALUES
(7, '<p>Đang cập nhật ...</p>', '2019-11-08 13:59:57', '2019-11-14 13:08:58', 'Giới thiệu', 'gioi-thieu'),
(8, '<p>Đang được cập nhật</p>', '2019-11-08 14:01:29', '2019-11-11 13:07:05', 'Liên hệ', 'lien-he');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_01_180543_create_slides_table', 1),
(4, '2018_08_23_093135_create_admins_table', 1),
(5, '2018_08_24_083638_create_roles_table', 1),
(6, '2018_08_24_092315_create_role_admins_table', 1),
(7, '2018_09_28_205031_create_categorys_table', 1),
(8, '2018_09_28_210619_create_products_table', 1),
(9, '2018_09_28_210632_create_product_detail_table', 1),
(10, '2018_09_28_210650_create_posts_table', 1),
(11, '2018_09_30_095112_update_posts_table', 1),
(12, '2018_09_30_095441_create_informations_table', 1),
(13, '2018_10_01_211436_update_informations_table', 1),
(14, '2018_10_04_221409_create_contacts_table', 1),
(15, '2018_10_05_203118_create_intros_table', 1),
(16, '2019_06_15_180717_create_support_table', 1),
(17, '2019_06_15_181049_create_store_table', 1),
(18, '2019_07_05_235732_update_products_table', 1),
(19, '2019_07_07_180647_create_product_images_table', 1),
(20, '2019_07_07_191826_update_categorys_table', 1),
(21, '2019_07_07_192657_add_description_categorys_table', 1),
(22, '2019_07_09_203848_add_seos_table', 1),
(23, '2019_07_09_213005_add_large_posts_table', 1),
(24, '2019_11_08_204238_update_table_intros', 2),
(27, '2019_11_08_210247_update_table_products', 3),
(28, '2019_11_09_202136_update_value_informations', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `content` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci,
  `title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `name`, `thumb`, `slug`, `status`, `content`, `category_id`, `created_at`, `updated_at`, `views`, `description`, `title_seo`, `description_seo`, `keyword_seo`, `large`) VALUES
(1, 4, 'Thiết kế không gian mở – Giải pháp hiệu quả cho ngôi nhà hiện đại', 'uploads/posts/thumb/1573399016_MTc5NzU5OT_2-1-1024x576.jpg', 'thiet-ke-khong-gian-mo-giai-phap-hieu-qua-cho-ngoi-nha-hien-dai', 1, '<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/3-2-1024x576.jpg\" /></p>\r\n\r\n<p>Tương phản ho&agrave;n to&agrave;n với t&ocirc;ng trắng l&agrave; c&aacute;c chi tiết m&agrave;u gỗ v&agrave; cũng l&agrave; c&aacute;ch kiến tr&uacute;c lồng gh&eacute;p sắc th&aacute;i ri&ecirc;ng v&agrave;o căn hộ một c&aacute;ch tinh tế. C&aacute;c khu vực c&ograve;n lại đều được sử dụng bảng m&agrave;u trung t&iacute;nh theo t&ocirc;ng x&aacute;m ghi bổ trợ cho c&aacute;c mảng trắng theo giải ph&aacute;p đơn sắc. Ngo&agrave;i ra những khung cửa k&iacute;nh lớn gi&uacute;p tối ưu h&oacute;a nguồn s&aacute;ng tự nhi&ecirc;n cũng l&agrave; một c&aacute;ch bổ trợ hiệu quả cho kh&ocirc;ng gian thiết kế đơn sắc, thi&ecirc;n về h&igrave;nh khối v&agrave; sự tự do, hiện đại của nh&oacute;m thiết kế. Điểm đặc biệt trong thiết kế sử dụng diện t&iacute;ch lớn nan gỗ mang m&agrave;u sắc mới lạ v&agrave; rất tinh tế.</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/4-1024x576.jpg\" /></p>\r\n\r\n<p>Tiếp nối đường n&eacute;t thẳng của kiến tr&uacute;c l&agrave; phom d&aacute;ng đồ nội thất đơn giản. Hầu hết c&aacute;c sản phẩm sử dụng trong căn hộ đều được xử l&yacute; trơn nhẵn bề mặt, tr&aacute;nh đi c&aacute;c đường cong cầu kỳ v&agrave; thi&ecirc;n về khối h&igrave;nh học mạnh, chắc.</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/5-1-1024x576.jpg\" /></p>\r\n\r\n<p>Ở Ph&ograve;ng Kh&aacute;ch, ốp tường sau sofa d&ugrave;ng vật liệu gỗ MDF xanh, phủ melamine nỉ, ốp tường sau tivi l&agrave; nan gỗ. Vật liệu chủ đạo n&agrave;y c&oacute; khả năng chịu nhiệt, chịu nước v&agrave; chịu lực tương đối tốt, vệ sinh, lau ch&ugrave;i dễ d&agrave;ng v&agrave; nhanh ch&oacute;ng. Kệ tivi được kết hợp gỗ v&agrave; sắt sơn tĩnh điện c&oacute; độ bền cao.&nbsp;</p>\r\n\r\n<p>Ở Ph&ograve;ng bếp, mặt bếp v&agrave; ốp tường d&ugrave;ng đ&aacute; Viscoton, mặt tủ bếp l&agrave;m từ&nbsp;<a href=\"https://www.facebook.com/Byzannoithathiendai/\">Acrylic Mirror</a>.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/6-1-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/7-2-768x1024.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/18-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/17-768x1024.jpg\" /></p>\r\n\r\n<p>Ở Ph&ograve;ng ngủ, to&agrave;n bộ giường được bọc da v&agrave; sử dụng giấy d&aacute;n tường.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/16-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/15-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/14-1-768x1024.jpg\" /></p>\r\n\r\n<p>Nội thất ph&ograve;ng ngủ Master D&rsquo;Capital</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/8-1-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/9-1-1024x819.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/10-1-768x1024.jpg\" /></p>\r\n\r\n<p>Kết hợp giường ngủ v&agrave; tủ quần &aacute;o &ndash; Giải ph&aacute;p hiệu quả tối ưu diện t&iacute;ch ph&ograve;ng ngủ</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/11-1-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/12-1024x576.jpg\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/11/13-1-1024x576.jpg\" /></p>\r\n\r\n<p><a href=\"https://byzan.vn/\">Kiến tr&uacute;c sư Byzan tận dụng tối đa &aacute;nh s&aacute;ng v&agrave; c&aacute;c yếu tố tự nhi&ecirc;n mang tới nguồn năng lượng t&iacute;ch cực mỗi ng&agrave;y</a></p>\r\n\r\n<p>Sự đồng nhất n&agrave;y tạo n&ecirc;n một kh&ocirc;ng gian gắn kết nhưng vẫn tạo điều kiện để nh&oacute;m thiết kế lồng gh&eacute;p nhiều h&igrave;nh thức đa dạng h&oacute;a th&ocirc;ng qua vật liệu, c&aacute;ch đặt để h&igrave;nh khối theo tỷ lệ ph&ugrave; hợp.</p>', 5, '2019-11-10 15:16:56', '2019-11-11 15:11:12', 18, 'Căn hộ có diện tích 90 mét vuông tại D’Capital được thiết kế đặc trưng bởi tông màu sáng xuyên suốt và gần như không sở hữu một vách ngăn chính thức nào nhằm bảo toàn tinh thần không gian mở của phong cách. Mọi yếu tố ngăn cách đều mang tính ước lệ và được thay thế bằng các đối tượng khác có cùng công năng, nhưng không phải vách ngăn.', 'Thiết kế không gian mở – Giải pháp hiệu quả cho ngôi nhà hiện đại', 'Thiết kế không gian mở – Giải pháp hiệu quả cho ngôi nhà hiện đại', 'Thiết kế không gian mở – Giải pháp hiệu quả cho ngôi nhà hiện đại', 'uploads/posts/1573399016_MTc5NzU5OT_2-1-1024x576.jpg'),
(2, 4, 'Thiết kế Nội thất Chung cư Vinhomes Metropolis Liễu Giai', 'uploads/posts/thumb/1573399395_MTgwMTU1NT_36578399_2036084856425294_6521789993663332352_n.jpg', 'thiet-ke-noi-that-chung-cu-vinhomes-metropolis-lieu-giai', 1, '<p><strong>Thiết kế nội thất 2 ph&ograve;ng ngủ</strong>&nbsp;Vinhome Metropolis Liễu Giai được thiết kế đơn giản, tối ưu c&ocirc;ng năng sử dụng nhưng kh&ocirc;ng bỏ qua t&iacute;nh thẩm mỹ của ng&ocirc;i nh&agrave;. Tại ph&ograve;ng kh&aacute;ch được đặt bộ ghế sofa bằng nỉ đơn giản với tone m&agrave;u kem trung t&iacute;nh mang tới sự thanh tao v&agrave; sang trọng cho kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch. Bộ ghế sofa được bố tr&iacute; đặt s&aacute;t tường v&agrave; cạnh cửa sổ lớn l&agrave; dụng &yacute; của gia chủ v&agrave; kiến tr&uacute;c sư gi&uacute;p tối ưu diện t&iacute;ch sinh hoạt cho cả gia đ&igrave;nh; kết hợp c&ugrave;ng chiếc b&agrave;n tr&agrave; 2 tầng đen trắng thanh lịch tạo điểm nhấn nổi bật cho kh&ocirc;ng gian ph&ograve;ng kh&aacute;ch. Cửa sổ ph&ograve;ng kh&aacute;ch được mở rộng gi&uacute;p căn ph&ograve;ng dễ d&agrave;ng đ&oacute;n &aacute;nh s&aacute;ng tự nhi&ecirc;n, đồng thời tăng tầm nh&igrave;n ph&iacute;a b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36566539_2036084846425295_335969401503219712_n.jpg\" style=\"height:540px; width:960px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36578399_2036084856425294_6521789993663332352_n.jpg\" style=\"height:540px; width:960px\" /></p>\r\n\r\n<p>Trần thạch cao được thiết kế đơn giản với khe &aacute;nh s&aacute;ng trắng kết hợp c&ugrave;ng chiếc đ&egrave;n ch&ugrave;m hiện đại, ph&aacute; c&aacute;ch tạo điểm thu h&uacute;t nổi bật cho phong kh&aacute;ch. Kệ tivi được thiết kế đơn giản, tinh tế kết hợp c&ugrave;ng ốp tường giả đ&aacute; l&agrave;m từ Acrylic b&oacute;ng gương hiện đại v&agrave; sang trọng. Kh&ocirc;ng gian nội thất ph&ograve;ng kh&aacute;ch được bố tr&iacute; b&agrave;n ăn hiện đại với 6 ghế bằng da được xếp ngay ngắn mang tới kh&ocirc;ng gian mở, rộng r&atilde;i; ph&iacute;a tr&ecirc;n b&agrave;n ăn được thiết kế chiếc đ&egrave;n ch&ugrave;m s&aacute;ng tạo vừa để trang tr&iacute; vừa mang tới &aacute;nh s&aacute;ng ấm &aacute;p cho mỗi bữa ăn của gia đ&igrave;nh. Tại khu vực b&agrave;n ăn được trang tr&iacute; ấn tượng với mảng tường đỏ n&acirc;u kết hợp c&ugrave;ng c&aacute;c decor tinh tế thu h&uacute;t mọi c&aacute;i nh&igrave;n khi bước tới khu vực n&agrave;y.</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36668753_2036084849758628_5049827078380191744_n.jpg\" style=\"height:540px; width:960px\" /></p>\r\n\r\n<h2><strong>Thiết kế nội thất ph&ograve;ng bếp Vinhome Metropolis Liễu Giai</strong></h2>\r\n\r\n<p>Kh&ocirc;ng gian ph&ograve;ng bếp lu&ocirc;n được c&aacute;c gia chủ ch&uacute; trọng rất nhiều trong mỗi kh&ocirc;ng gian nội thất. Đặc biệt đối với c&aacute;c căn hộ c&oacute; diện t&iacute;ch nhỏ th&igrave; việc tối ưu c&ocirc;ng năng ph&ograve;ng bếp lu&ocirc;n được quan t&acirc;m đặc biệt. Thiết kế nội thất ph&ograve;ng bếp được thiết kế kh&aacute; đơn giản nhưng vẫn đ&aacute;p ứng đầy đủ c&ocirc;ng năng v&agrave; tiện &iacute;ch sử dụng. Tủ bếp tr&ecirc;n được l&agrave;m từ vật liệu Acrylic b&oacute;ng gương với tone m&agrave;u trắng sang trọng, tủ bếp dưới được ốp Veneer m&agrave;u n&acirc;u với c&aacute;c v&acirc;n gỗ tinh tế. Do kh&ocirc;ng gian ph&ograve;ng bếp hơi bị giới hạn, v&igrave; vậy c&aacute;c kiến tr&uacute;c sư đ&atilde; thiết kế tủ bếp s&aacute;t trần gi&uacute;p tăng diện t&iacute;ch lưu trữ đồ d&ugrave;ng cho gia đ&igrave;nh, mang tới sự gọn g&agrave;ng, ngăn nắp cho khu vực bếp.</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36570949_2036084959758617_2516631573080571904_n.jpg\" style=\"height:639px; width:960px\" />&nbsp;<img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36598398_2036085059758607_2414468697839108096_n.jpg\" style=\"height:639px; width:960px\" /></p>\r\n\r\n<h2><strong>Thiết kế nội thất ph&ograve;ng ngủ Vinhome Metropolis Liễu Giai</strong></h2>\r\n\r\n<p>Gia chủ căn hộ Vinhome Metropolis Liễu Giai l&agrave; cặp vợ chồng trẻ n&ecirc;n rất th&iacute;ch c&aacute;c tone m&agrave;u s&aacute;ng, m&aacute;t mắt. V&igrave; vậy sau khi thống nhất với gia chủ, kiến tr&uacute;c sư đ&atilde; sử dụng m&agrave;u trắng v&agrave; ghi xanh l&agrave;m tone m&agrave;u chủ đạo cho kh&ocirc;ng gian ph&ograve;ng ngủ. Với phong c&aacute;ch nội thất hiện đại, kh&ocirc;ng gian ph&ograve;ng ngủ trở n&ecirc;n rộng r&atilde;i m&agrave; vẫn đ&aacute;p ứng được nhu cầu của gia chủ. Mảng tường ph&iacute;a đầu giường với m&agrave;u tone m&agrave;u xanh ghi nổi bật được trang tr&iacute; tranh canvas mang tới điểm nhấn cho kh&ocirc;ng gian ph&ograve;ng ngủ. Chiếc giường cao cấp, &ecirc;m &aacute;i với gam m&agrave;u trắng tinh tế sẽ nu&ocirc;i dưỡng giấc ngủ ngon cho gia chủ sau một ng&agrave;y l&agrave;m việc mệt nhọc. Tủ quần &aacute;o được thiết kế s&aacute;t trần với c&aacute;nh l&agrave;m bằng Acrylic v&agrave; sử dụng tone m&agrave;u trắng thanh tao. Kế tiếp tủ quần &aacute;o l&agrave; b&agrave;n trang điểm hiện đại, đơn giản c&ugrave;ng với tivi được treo tr&ecirc;n tường gi&uacute;p tiết kiệm tối đa kh&ocirc;ng gian sinh hoạt.</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36614421_2036085209758592_3857305464203116544_n.jpg\" style=\"height:540px; width:960px\" /><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36702496_2036085196425260_8647889575022166016_n.jpg\" style=\"height:540px; width:960px\" /><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36585203_2036085263091920_1287568256890044416_n.jpg\" style=\"height:639px; width:960px\" /><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2018/11/36527032_2036085306425249_7811585234046025728_n.jpg\" style=\"height:639px; width:960px\" /></p>', 4, '2019-11-10 15:23:15', '2019-11-11 15:14:56', 8, 'Chung cư Vinhome Metropolis Liễu Giai tổ hợp căn hộ cao cấp, trung tâm thương mại với không gian sống sang trọng, đẳng cấp. Thiết kế nội thất chung cư Vinhome Metropolis Liễu Giai được gia chủ lựa chọn theo phong cách nội thất hiện đại, bỏ qua các điểm thừa và rườm rà, chú trọng vào mảng nội thất lớn và cách bố trí không gian mang tới cho gia chủ không gian đầy đủ tiện ích và bình yên giữa chốn nội đô sầm uất.', 'Thiết kế Nội thất Chung cư Vinhomes Metropolis Liễu Giai', 'Thiết kế Nội thất Chung cư Vinhomes Metropolis Liễu Giai', 'Thiết kế Nội thất Chung cư Vinhomes Metropolis Liễu Giai', 'uploads/posts/1573399395_MTgwMTU1NT_36578399_2036084856425294_6521789993663332352_n.jpg'),
(3, 4, 'Thiết kế nội thất phòng ngủ trẻ em – Chung cư Goldmark', 'uploads/posts/thumb/1573399511_MTcyOTE0MT_thiet-ke-noi-that-phong-ngu-be-trai-goldmark-1.jpg', 'thiet-ke-noi-that-phong-ngu-tre-em-chung-cu-goldmark', 1, '<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/01/thiet-ke-noi-that-phong-ngu-be-trai-goldmark-1.jpg\" style=\"height:1400px; width:2000px\" />&nbsp;<img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/01/thiet-ke-noi-that-phong-ngu-be-trai-goldmark-2.jpg\" style=\"height:1400px; width:2000px\" />&nbsp;<img alt=\"\" src=\"https://byzan.vn/wp-content/uploads/2019/01/thiet-ke-noi-that-phong-ngu-be-trai-goldmark-3.jpg\" style=\"height:1400px; width:2000px\" /></p>', 5, '2019-11-10 15:24:59', '2019-11-10 15:25:11', 0, 'Trong một thị trường nội thất ngày càng sôi động và đa dạng như ở Việt Nam, Byzan luôn tự hào là đơn vị dẫn đầu và tạo ra xu hướng trong phong cách thiết kế Hiện Đại ( Theo tạp chí kiến trúc Việt Nam bình chọn ) các thiết kế của chúng tôi luôn hướng đến sự hài hoà giữa công năng sử dụng và thẩm mỹ, với ngôn ngữ thiết kế đồng nhất từ mảng khối cho đến màu sắc sao cho mỗi không gian sống luôn là đứa con tinh thần, là nơi mà bạn muốn trở về sau cuối ngày làm việc mệt mỏi.', 'Thiết kế nội thất phòng ngủ 42m2 sang trọng đẳng cấp', 'Thiết kế nội thất phòng ngủ 42m2 sang trọng đẳng cấp', 'Thiết kế nội thất phòng ngủ 42m2 sang trọng đẳng cấp', 'uploads/posts/1573399511_MTcyOTE0MT_thiet-ke-noi-that-phong-ngu-be-trai-goldmark-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot` int(11) NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `admin_id`, `thumb`, `name`, `slug`, `content`, `status`, `category_id`, `created_at`, `updated_at`, `large`, `title_seo`, `description_seo`, `keyword_seo`, `hot`, `description`, `views`) VALUES
(2, 4, 'uploads/products/thumb/1573222018_NTMwNDYxNj_screen-0.png', 'Sản phẩm test', 'san-pham-test', '<p>Sản phẩm test</p>', 1, 1, '2019-11-08 14:06:58', '2019-11-10 17:17:38', 'uploads/products/1573222018_NTMwNDYxNj_screen-0.png', 'Sản phẩm test', 'Sản phẩm test', 'Sản phẩm test', 1, 'Sản phẩm test', 3),
(3, 4, 'uploads/products/thumb/1573222824_OTk5MzQzMD_bmx-hd-wallpaper_1024x1024.jpg', 'Sản phẩm 2', 'san-pham-2', '<p>Sản phẩm 2</p>', 1, 1, '2019-11-08 14:20:24', '2019-11-11 15:02:01', 'uploads/products/1573222824_OTk5MzQzMD_bmx-hd-wallpaper_1024x1024.jpg', 'Sản phẩm 2', 'Sản phẩm 2', 'Sản phẩm 2', 1, 'Sản phẩm 2', 3),
(4, 4, 'uploads/products/thumb/1573398626_MTIxMjA5NT_mahadev-hd-wallpaper-download.jpg', 'Sản phẩm 3', 'san-pham-3', '<p>Sản phẩm 3</p>', 1, 3, '2019-11-10 15:10:26', '2019-11-16 07:54:19', 'uploads/products/1573398626_MTIxMjA5NT_mahadev-hd-wallpaper-download.jpg', 'Sản phẩm 3', 'Sản phẩm 3', 'Sản phẩm 3', 1, 'Sản phẩm 3', 5),
(5, 4, 'uploads/products/thumb/1573398686_MTQ1NTI1Nz_HD-Wallpapers-Of-Spiderman-4-026.jpg', 'Sản phẩm 4', 'san-pham-4', '<p>Sản phẩm 4</p>', 1, 1, '2019-11-10 15:11:26', '2019-11-11 14:46:19', 'uploads/products/1573398686_MTQ1NTI1Nz_HD-Wallpapers-Of-Spiderman-4-026.jpg', 'Sản phẩm 4', 'Sản phẩm 4', 'Sản phẩm 4', 0, 'Sản phẩm 4', 5),
(6, 4, 'uploads/products/thumb/1573398736_OTM5NjEyMz_the-waterlily-pond-with-the-japanese-bridge-1899_u-l-q1g8dgg0.jpg', 'Sản phẩm 5', 'san-pham-5', '<p>Căn hộ với sự bố tr&iacute; h&agrave;i h&ograve;a v&agrave; tiện nghi thể hiện chất lượng cuộc sống được n&acirc;ng cao, l&agrave; điểm nhấn trong thiết kế nội thất Vinhomes Gardenia Mỹ Đ&igrave;nh</p>\r\n\r\n<p><strong>Căn hộ với sự bố tr&iacute; h&agrave;i h&ograve;a v&agrave; tiện nghi thể hiện chất lượng cuộc sống được n&acirc;ng cao, l&agrave; điểm nhấn trong thiết kế nội thất Vinhomes Gardenia Mỹ Đ&igrave;nh</strong></p>\r\n\r\n<p><a href=\"#\">Link sản phẩm</a></p>\r\n\r\n<p><img alt=\"\" src=\"img/test.jpg\" /></p>\r\n\r\n<p>Ảnh căn hộ mẫu</p>\r\n\r\n<p>Căn hộ với sự bố tr&iacute; h&agrave;i h&ograve;a v&agrave; tiện nghi thể hiện chất lượng cuộc sống được n&acirc;ng cao, l&agrave; điểm nhấn trong thiết kế nội thất Vinhomes Gardenia Mỹ Đ&igrave;nh</p>\r\n\r\n<p><strong>Căn hộ với sự bố tr&iacute; h&agrave;i h&ograve;a v&agrave; tiện nghi thể hiện chất lượng cuộc sống được n&acirc;ng cao, l&agrave; điểm nhấn trong thiết kế nội thất Vinhomes Gardenia Mỹ Đ&igrave;nh</strong></p>\r\n\r\n<p><a href=\"#\">Link sản phẩm</a></p>\r\n\r\n<p><img alt=\"\" src=\"img/test.jpg\" /></p>\r\n\r\n<p>Ảnh căn hộ mẫu</p>\r\n\r\n<p>Căn hộ với sự bố tr&iacute; h&agrave;i h&ograve;a v&agrave; tiện nghi thể hiện chất lượng cuộc sống được n&acirc;ng cao, l&agrave; điểm nhấn trong thiết kế nội thất Vinhomes Gardenia Mỹ Đ&igrave;nh</p>\r\n\r\n<p><strong>Căn hộ với sự bố tr&iacute; h&agrave;i h&ograve;a v&agrave; tiện nghi thể hiện chất lượng cuộc sống được n&acirc;ng cao, l&agrave; điểm nhấn trong thiết kế nội thất Vinhomes Gardenia Mỹ Đ&igrave;nh</strong></p>\r\n\r\n<p><a href=\"#\">Link sản phẩm</a></p>\r\n\r\n<p><img alt=\"\" src=\"img/test.jpg\" /></p>\r\n\r\n<p>Ảnh căn hộ mẫu</p>', 1, 3, '2019-11-10 15:11:57', '2019-11-14 13:06:57', 'uploads/products/1573398736_OTM5NjEyMz_the-waterlily-pond-with-the-japanese-bridge-1899_u-l-q1g8dgg0.jpg', 'Sản phẩm 5', 'Sản phẩm 5', 'Sản phẩm 5', 1, 'Mô tả sản phẩm', 151);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`id`, `name`, `value`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 'Chất liệu', 'Gỗ đàn hương', 6, NULL, NULL),
(3, 'Kích thước', '1m - 2m', 6, NULL, NULL),
(4, 'Mùi hương', 'Mùi gỗ nhẹ nhàng, sang trọng', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `large` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `thumb`, `large`, `product_id`, `created_at`, `updated_at`) VALUES
(6, 'uploads/product_images/thumb/1573480088_MTI1Njc0Mz_5-10-e1553507973866.jpg', 'uploads/product_images/1573480088_MTI1Njc0Mz_5-10-e1553507973866.jpg', 6, NULL, NULL),
(7, 'uploads/product_images/thumb/1573480102_MzA2ODU5ND_36578399_2036084856425294_6521789993663332352_n.jpg', 'uploads/product_images/1573480102_MzA2ODU5ND_36578399_2036084856425294_6521789993663332352_n.jpg', 6, NULL, NULL),
(8, 'uploads/product_images/thumb/1573480103_MzE2MDQ3NT_36580650_2036085106425269_5980569319174569984_n.jpg', 'uploads/product_images/1573480103_MzE2MDQ3NT_36580650_2036085106425269_5980569319174569984_n.jpg', 6, NULL, NULL),
(9, 'uploads/product_images/thumb/1573480103_MTE2NDExNz_36585203_2036085263091920_1287568256890044416_n.jpg', 'uploads/product_images/1573480103_MTE2NDExNz_36585203_2036085263091920_1287568256890044416_n.jpg', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `provinceid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`provinceid`, `name`, `type`, `slug`) VALUES
(1, 'Hà Nội', 'Thành Phố', 'ha-noi'),
(2, 'Hà Giang', 'Tỉnh', 'ha-giang'),
(4, 'Cao Bằng', 'Tỉnh', 'cao-bang'),
(6, 'Bắc Kạn', 'Tỉnh', 'bac-kan'),
(8, 'Tuyên Quang', 'Tỉnh', 'tuyen-quang'),
(10, 'Lào Cai', 'Tỉnh', 'lao-cai'),
(11, 'Điện Biên', 'Tỉnh', 'dien-bien'),
(12, 'Lai Châu', 'Tỉnh', 'lai-chau'),
(14, 'Sơn La', 'Tỉnh', 'son-la'),
(15, 'Yên Bái', 'Tỉnh', 'yen-bai'),
(17, 'Hòa Bình', 'Tỉnh', 'hoa-binh'),
(19, 'Thái Nguyên', 'Tỉnh', 'thai-nguyen'),
(20, 'Lạng Sơn', 'Tỉnh', 'lang-son'),
(22, 'Quảng Ninh', 'Tỉnh', 'quang-ninh'),
(24, 'Bắc Giang', 'Tỉnh', 'bac-giang'),
(25, 'Phú Thọ', 'Tỉnh', 'phu-tho'),
(26, 'Vĩnh Phúc', 'Tỉnh', 'vinh-phuc'),
(27, 'Bắc Ninh', 'Tỉnh', 'bac-ninh'),
(30, 'Hải Dương', 'Tỉnh', 'hai-duong'),
(31, 'Hải Phòng', 'Thành Phố', 'hai-phong'),
(33, 'Hưng Yên', 'Tỉnh', 'hung-yen'),
(34, 'Thái Bình', 'Tỉnh', 'thai-binh'),
(35, 'Hà Nam', 'Tỉnh', 'ha-nam'),
(36, 'Nam Định', 'Tỉnh', 'nam-dinh'),
(37, 'Ninh Bình', 'Tỉnh', 'ninh-binh'),
(38, 'Thanh Hóa', 'Tỉnh', 'thanh-hoa'),
(40, 'Nghệ An', 'Tỉnh', 'nghe-an'),
(42, 'Hà Tĩnh', 'Tỉnh', 'ha-tinh'),
(44, 'Quảng Bình', 'Tỉnh', 'quang-binh'),
(45, 'Quảng Trị', 'Tỉnh', 'quang-tri'),
(46, 'Thừa Thiên Huế', 'Tỉnh', 'thua-thien-hue'),
(48, 'Đà Nẵng', 'Thành Phố', 'da-nang'),
(49, 'Quảng Nam', 'Tỉnh', 'quang-nam'),
(51, 'Quảng Ngãi', 'Tỉnh', 'quang-ngai'),
(52, 'Bình Định', 'Tỉnh', 'binh-dinh'),
(54, 'Phú Yên', 'Tỉnh', 'phu-yen'),
(56, 'Khánh Hòa', 'Tỉnh', 'khanh-hoa'),
(58, 'Ninh Thuận', 'Tỉnh', 'ninh-thuan'),
(60, 'Bình Thuận', 'Tỉnh', 'binh-thuan'),
(62, 'Kon Tum', 'Tỉnh', 'kon-tum'),
(64, 'Gia Lai', 'Tỉnh', 'gia-lai'),
(66, 'Đắk Lắk', 'Tỉnh', 'dak-lak'),
(67, 'Đắk Nông', 'Tỉnh', 'dak-nong'),
(68, 'Lâm Đồng', 'Tỉnh', 'lam-dong'),
(70, 'Bình Phước', 'Tỉnh', 'binh-phuoc'),
(72, 'Tây Ninh', 'Tỉnh', 'tay-ninh'),
(74, 'Bình Dương', 'Tỉnh', 'binh-duong'),
(75, 'Đồng Nai', 'Tỉnh', 'dong-nai'),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh', 'ba-ria-vung-tau'),
(79, 'Hồ Chí Minh', 'Thành Phố', 'ho-chi-minh'),
(80, 'Long An', 'Tỉnh', 'long-an'),
(82, 'Tiền Giang', 'Tỉnh', 'tien-giang'),
(83, 'Bến Tre', 'Tỉnh', 'ben-tre'),
(84, 'Trà Vinh', 'Tỉnh', 'tra-vinh'),
(86, 'Vĩnh Long', 'Tỉnh', 'vinh-long'),
(87, 'Đồng Tháp', 'Tỉnh', 'dong-thap'),
(89, 'An Giang', 'Tỉnh', 'an-giang'),
(91, 'Kiên Giang', 'Tỉnh', 'kien-giang'),
(92, 'Cần Thơ', 'Thành Phố', 'can-tho'),
(93, 'Hậu Giang', 'Tỉnh', 'hau-giang'),
(94, 'Sóc Trăng', 'Tỉnh', 'soc-trang'),
(95, 'Bạc Liêu', 'Tỉnh', 'bac-lieu'),
(96, 'Cà Mau', 'Tỉnh', 'ca-mau');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `access`, `created_at`, `updated_at`) VALUES
(3, 'Super Admin', 'superadmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_admins`
--

CREATE TABLE `role_admins` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admins`
--

INSERT INTO `role_admins` (`role_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(3, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `thumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `thumb`, `status`, `created_at`, `updated_at`) VALUES
(5, 'uploads/slides/1573317089_MTk0NjE4MT_slide-trau-ngon-quan-tuan-1-thang-1-2018.jpg', 1, '2019-11-09 16:31:30', '2019-11-09 16:31:41'),
(6, 'uploads/slides/1573318351_MTE3ODgzMj_191810A-1367x550.jpg', 1, '2019-11-09 16:52:32', '2019-11-09 16:52:39'),
(7, 'uploads/slides/1573318393_MTc3MjEwNz_Tower-1920x550.jpg', 1, '2019-11-09 16:53:14', '2019-11-09 16:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` int(11) NOT NULL DEFAULT '18',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supports`
--

CREATE TABLE `supports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categorys_name_unique` (`name`),
  ADD UNIQUE KEY `categorys_slug_unique` (`slug`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informations`
--
ALTER TABLE `informations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `informations_key_unique` (`key`);

--
-- Indexes for table `intros`
--
ALTER TABLE `intros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_name_unique` (`name`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`provinceid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_access_unique` (`access`);

--
-- Indexes for table `role_admins`
--
ALTER TABLE `role_admins`
  ADD KEY `role_admins_role_id_foreign` (`role_id`),
  ADD KEY `role_admins_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supports`
--
ALTER TABLE `supports`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `informations`
--
ALTER TABLE `informations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `intros`
--
ALTER TABLE `intros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `provinceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_admins`
--
ALTER TABLE `role_admins`
  ADD CONSTRAINT `role_admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_admins_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
