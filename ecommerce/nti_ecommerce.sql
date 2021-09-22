-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 03:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nti_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(500) NOT NULL,
  `building` varchar(500) NOT NULL,
  `floor` varchar(100) NOT NULL,
  `flat` varchar(100) NOT NULL,
  `notes` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(200) NOT NULL,
  `name_ar` varchar(200) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `name_ar`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'سامسونج', 'default.jpg', 1, '2021-09-22 08:01:40', '2021-09-22 08:01:40'),
(2, 'Apple', 'ابل', 'default.jpg', 1, '2021-09-22 08:01:40', '2021-09-22 08:01:40'),
(3, 'lg', 'lg', 'default.jpg', 1, '2021-09-22 08:01:40', '2021-09-22 08:01:40'),
(4, 'lenovo', 'لينوفو', 'default.jpg', 1, '2021-09-22 08:01:40', '2021-09-22 08:01:40'),
(5, 'DELL', 'ديل', 'default.jpg', 1, '2021-09-22 08:01:40', '2021-09-22 08:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(200) NOT NULL,
  `name_ar` varchar(200) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `name_ar`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'الكترونيات', 'default.jpg', 1, '2021-09-22 07:14:27', '2021-09-22 07:14:27'),
(2, 'kitchen', 'مطبخ', 'default.jpg', 1, '2021-09-22 07:14:27', '2021-09-22 07:14:27'),
(3, 'office', 'مكتب', 'default.jpg', 1, '2021-09-22 07:14:27', '2021-09-22 07:47:06'),
(4, 'supermarket', 'سوبرماركت', 'default.jpg', 1, '2021-09-22 07:14:27', '2021-09-22 07:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(500) NOT NULL,
  `name_ar` varchar(500) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` mediumint(5) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `value` int(5) NOT NULL,
  `max_usage_value` varchar(100) NOT NULL,
  `max_usage_count` varchar(100) NOT NULL,
  `mini_order_value` varchar(100) NOT NULL,
  `start_time` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `max_usage_user` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_products`
--

CREATE TABLE `coupons_products` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `coupons_users`
--

CREATE TABLE `coupons_users` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `photo` varchar(100) DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `start_date_time` varchar(100) NOT NULL,
  `end_date_time` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `offers_products`
--

CREATE TABLE `offers_products` (
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_discount` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active,0=>not active',
  `order_code` mediumint(5) DEFAULT NULL,
  `deliver_date` varchar(100) NOT NULL,
  `total` decimal(7,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price_after_order` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(1000) NOT NULL,
  `name_ar` varchar(1000) NOT NULL,
  `details_en` text NOT NULL,
  `details_ar` text NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `quantity` int(3) DEFAULT 1,
  `photo` varchar(100) DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `name_ar`, `details_en`, `details_ar`, `price`, `quantity`, `photo`, `status`, `subcategory_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(1, 's21', 's21', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '15000.00', 10, 's21.jpg', 1, 1, 1, '2021-09-22 08:07:40', '2021-09-22 09:33:58'),
(2, 'iphone 13', 'iphone 13', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '25000.00', 20, 'iphone13.jpg', 1, 1, 2, '2021-09-22 08:07:40', '2021-09-22 09:34:01'),
(3, 'Reno 6', 'Reno 6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '10000.00', 5, 'reno.jpg', 1, 1, 4, '2021-09-22 08:07:40', '2021-09-22 09:34:04'),
(4, 'MacBook PRo', 'MacBook PRo', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '40000.00', 2, 'mac.jpg', 1, 2, 2, '2021-09-22 08:07:40', '2021-09-22 09:34:07'),
(5, 'Lenovo Lapttop', 'Lenovo Lapttop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\nهناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '17000.00', 1, 'lenovo.jpg', 1, 2, 4, '2021-09-22 08:07:40', '2021-09-22 08:15:01'),
(6, 'Dell Laptop', 'Dell Laptop', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '20000.00', 0, 'dell.jpg', 1, 2, 5, '2021-09-22 08:07:40', '2021-09-22 09:34:11'),
(7, 'Lg TV', 'Lg TV', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '12000.00', 3, 'lg.jpg', 1, 3, 3, '2021-09-22 08:07:40', '2021-09-22 09:34:16'),
(8, 'Samsung Tv', 'Samsung Tv', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '15000.00', 7, 'samsung.jpg', 1, 3, 1, '2021-09-22 08:07:40', '2021-09-22 09:34:19'),
(9, 'Chepsi', 'Chepsi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\n', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هنا يوجد محتوى نصي، هنا يوجد محتوى نصي\" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي وبرامح تحرير صفحات الويب تستخدم لوريم إيبسوم بشكل إفتراضي كنموذج عن النص، وإذا قمت بإدخال \"lorem ipsum\" في أي محرك بحث ستظهر العديد من المواقع الحديثة العهد في نتائج البحث. على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم، أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.\r\n\r\n', '10.00', 200, 'chepsi.jpg', 1, 5, NULL, '2021-09-22 08:07:40', '2021-09-22 09:34:22');

-- --------------------------------------------------------

--
-- Stand-in structure for view `products_reviews`
-- (See below for the actual view)
--
CREATE TABLE `products_reviews` (
`id` bigint(20) unsigned
,`name_en` varchar(1000)
,`name_ar` varchar(1000)
,`details_en` text
,`details_ar` text
,`price` decimal(7,2)
,`quantity` int(3)
,`photo` varchar(100)
,`status` tinyint(1)
,`subcategory_id` bigint(20) unsigned
,`brand_id` bigint(20) unsigned
,`created_at` timestamp
,`updated_at` timestamp
,`category_name_en` varchar(200)
,`category_id` bigint(20) unsigned
,`subcategory_name_en` varchar(200)
,`brand_name_en` varchar(200)
,`reviews_count` bigint(21)
,`reviews_avg` decimal(4,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(500) NOT NULL,
  `name_ar` varchar(500) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `value` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `product_id`, `comment`, `value`, `created_at`, `updated_at`) VALUES
(10, 1, 'gamed', 5, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(10, 2, '7lw', 5, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(10, 4, 'fager', 4, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(10, 6, 'zft', 2, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(10, 9, 'w7sh', 4, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(11, 2, 'w7sh', 3, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(11, 4, 'gamed', 2, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(11, 6, 'gamed', 2, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(11, 9, NULL, 1, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(13, 2, NULL, 4, '2021-09-22 12:20:39', '2021-09-22 12:20:39'),
(13, 4, NULL, 2, '2021-09-22 12:20:39', '2021-09-22 12:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(200) NOT NULL,
  `name_ar` varchar(200) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'default.jpg',
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>active, 0=>not active',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name_en`, `name_ar`, `photo`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'mobiles', 'موبايلات', 'default.jpg', 1, 1, '2021-09-22 07:17:23', '2021-09-22 07:17:23'),
(2, 'laptop', 'لابتوب', 'default.jpg', 1, 1, '2021-09-22 07:17:23', '2021-09-22 07:17:23'),
(3, 'tv', 'تلفزيونات', 'default.jpg', 1, 1, '2021-09-22 07:17:23', '2021-09-22 07:17:23'),
(4, 'cheese', 'جبن', 'default.jpg', 1, 4, '2021-09-22 07:17:23', '2021-09-22 07:17:23'),
(5, 'chepsi', 'شيبسي', 'default.jpg', 1, 4, '2021-09-22 07:17:23', '2021-09-22 07:17:23'),
(6, 'kitchen tools', 'ادوات مطبخ', 'default.jpg', 1, 2, '2021-09-22 07:17:23', '2021-09-22 08:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `code` mediumint(5) DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'default.png',
  `gender` enum('f','m') NOT NULL COMMENT 'f=>femail,m=>mail',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `email`, `password`, `remember_token`, `code`, `image`, `gender`, `email_verified_at`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 'mohamed', '01144895434', 'ahmed@gmail.com', 'Ahmed@123456', NULL, 19981, 'default.png', 'm', NULL, '2021-03-06', '2021-09-19 13:24:16', '2021-09-20 09:11:16'),
(10, 'Galal', 'Husseny', '01000498488', 'galal.husseny@gmail.com', '088ea4ac92f2f1114f15e615f97b9db9bfc90ad0', NULL, 45587, 'default.png', 'm', '2021-09-21 14:24:45', '2021-09-15', '2021-09-20 09:46:16', '2021-09-21 14:24:45'),
(11, 'saradddddd', 'ghareeb', '25252525', 'sarah.a.ghareeb@gmail.com', '5db1c2601ba7aa3c6ebbfe84f070f0d68f45eafd', NULL, 71673, '1632227206.png', 'm', '2021-09-21 11:29:44', '2021-09-01', '2021-09-20 11:37:19', '2021-09-21 13:13:31'),
(12, 'ahmed', 'ahmed', '12345678922', 'ahmed@ahmed.com', '4ac100e28b77f78971c3b7f0a58e3e8e6c0ff29f', NULL, 97574, 'default.png', 'm', '2021-09-21 07:52:49', '2021-09-15', '2021-09-21 07:22:22', '2021-09-21 07:52:49'),
(13, 'ahmed', 'ghareeb', '56265665412', 'ahmed@ghareeb.com', '4ac100e28b77f78971c3b7f0a58e3e8e6c0ff29f', NULL, 52264, 'default.png', 'm', '2021-09-21 07:53:47', '2021-09-15', '2021-09-21 07:53:35', '2021-09-21 07:53:47'),
(14, 'ff', 'fff', 'fdfgfgjh', '', '07dcd371560bc43c48f56a2f55739ac66741d59d', NULL, 19535, 'default.png', 'm', NULL, '0000-00-00', '2021-09-21 13:25:28', '2021-09-21 13:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure for view `products_reviews`
--
DROP TABLE IF EXISTS `products_reviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `products_reviews`  AS   (select `products`.`id` AS `id`,`products`.`name_en` AS `name_en`,`products`.`name_ar` AS `name_ar`,`products`.`details_en` AS `details_en`,`products`.`details_ar` AS `details_ar`,`products`.`price` AS `price`,`products`.`quantity` AS `quantity`,`products`.`photo` AS `photo`,`products`.`status` AS `status`,`products`.`subcategory_id` AS `subcategory_id`,`products`.`brand_id` AS `brand_id`,`products`.`created_at` AS `created_at`,`products`.`updated_at` AS `updated_at`,`categories`.`name_en` AS `category_name_en`,`categories`.`id` AS `category_id`,`subcategories`.`name_en` AS `subcategory_name_en`,`brands`.`name_en` AS `brand_name_en`,count(`reviews`.`product_id`) AS `reviews_count`,if(round(avg(`reviews`.`value`),0) is null,0,round(avg(`reviews`.`value`),0)) AS `reviews_avg` from ((((`products` join `subcategories` on(`products`.`subcategory_id` = `subcategories`.`id`)) left join `brands` on(`products`.`brand_id` = `brands`.`id`)) join `categories` on(`subcategories`.`category_id` = `categories`.`id`)) left join `reviews` on(`products`.`id` = `reviews`.`product_id`)) group by `products`.`id`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_addresses_fk` (`user_id`),
  ADD KEY `regions_addresses_fk` (`region_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_carts_fk` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD PRIMARY KEY (`coupon_id`,`product_id`),
  ADD KEY `product_fk` (`product_id`);

--
-- Indexes for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD PRIMARY KEY (`coupon_id`,`user_id`),
  ADD KEY `user_fk` (`user_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD PRIMARY KEY (`offer_id`,`product_id`),
  ADD KEY `products_fk` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_coupons_fk` (`coupon_id`),
  ADD KEY `orders_users_fk` (`user_id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `products_order_fk` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_products_fk` (`subcategory_id`),
  ADD KEY `brands_products_fk` (`brand_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_regions_fk` (`city_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_reviews_fk` (`product_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_subcategories_fk` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `products_wishlists_fk` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `regions_addresses_fk` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_addresses_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `products_carts_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_carts_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons_products`
--
ALTER TABLE `coupons_products`
  ADD CONSTRAINT `coupons_id` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `coupons_users`
--
ALTER TABLE `coupons_users`
  ADD CONSTRAINT `coupon_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers_products`
--
ALTER TABLE `offers_products`
  ADD CONSTRAINT `offers_fk` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_coupons_fk` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `orders_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_order_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brands_products_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subcategories_products_fk` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `cities_regions_fk` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `products_reviews_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_reviews_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `categories_subcategories_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `products_wishlists_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_wishlists_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
