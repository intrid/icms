-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2021 at 12:56 PM
-- Server version: 10.3.13-MariaDB-log
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optika`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('createArticles', '1', 1562933653),
('createArticles', '12', 1603961242),
('createArticles', '2', 1562934307),
('createCatalog', '1', 1562933603),
('createCatalog', '12', 1603961242),
('createCatalog', '2', 1562934307),
('createCategory', '1', 1562933829),
('createCategory', '12', 1603961242),
('createCategory', '2', 1562934307),
('createPage', '1', 1566539056),
('createPage', '12', 1603961242),
('createReviews', '1', 1566539056),
('createReviews', '12', 1603961242),
('createSeo', '1', 1562933685),
('createSeo', '12', 1603961242),
('createSettings', '12', 1603961242),
('createSlider', '1', 1562933671),
('createSlider', '12', 1603961242),
('createSlider', '2', 1562934307),
('createStock', '1', 1563364758),
('createStock', '12', 1603961242),
('createUserdata', '1', 1565174861),
('createUserdata', '12', 1603961242),
('createUserdata', '2', 1566213863),
('createUsers', '1', 1562933692),
('createUsers', '12', 1603961242),
('createUsers', '2', 1566276751),
('createVideo', '1', 1562933662),
('createVideo', '12', 1603961242),
('createVideo', '2', 1562934307),
('deleteArticles', '1', 1562933653),
('deleteArticles', '12', 1603961242),
('deleteArticles', '2', 1562934307),
('deleteCatalog', '1', 1562933603),
('deleteCatalog', '12', 1603961242),
('deleteCatalog', '2', 1562934307),
('deleteCategory', '1', 1562933829),
('deleteCategory', '12', 1603961242),
('deleteCategory', '2', 1562934307),
('deletePage', '1', 1566539056),
('deletePage', '12', 1603961242),
('deleteReviews', '1', 1566539056),
('deleteReviews', '12', 1603961242),
('deleteSeo', '1', 1566539056),
('deleteSeo', '12', 1603961242),
('deleteSettings', '12', 1603961242),
('deleteSlider', '1', 1562933671),
('deleteSlider', '12', 1603961242),
('deleteSlider', '2', 1562934307),
('deleteStock', '1', 1563364758),
('deleteStock', '12', 1603961242),
('deleteUserdata', '12', 1603961242),
('deleteUserdata', '2', 1566213863),
('deleteUsers', '1', 1566276751),
('deleteUsers', '12', 1603961242),
('deleteVideo', '1', 1562933662),
('deleteVideo', '12', 1603961242),
('deleteVideo', '2', 1562934307),
('updateArticles', '1', 1562933653),
('updateArticles', '12', 1603961242),
('updateArticles', '2', 1562934307),
('updateCatalog', '1', 1562933603),
('updateCatalog', '12', 1603961242),
('updateCatalog', '2', 1562934307),
('updateCategory', '1', 1562933829),
('updateCategory', '12', 1603961242),
('updateCategory', '2', 1562934307),
('updatePage', '1', 1562933643),
('updatePage', '12', 1603961242),
('updatePage', '2', 1562934307),
('updateReviews', '1', 1562933633),
('updateReviews', '12', 1603961242),
('updateReviews', '2', 1562934307),
('updateSeo', '1', 1562933685),
('updateSeo', '12', 1603961242),
('updateSeo', '2', 1562934307),
('updateSettings', '1', 1562933680),
('updateSettings', '12', 1603961242),
('updateSettings', '2', 1562934307),
('updateSlider', '1', 1563353700),
('updateSlider', '12', 1603961242),
('updateSlider', '2', 1562934307),
('updateStock', '1', 1563364758),
('updateStock', '12', 1603961242),
('updateUserdata', '1', 1563343259),
('updateUserdata', '12', 1603961242),
('updateUserdata', '2', 1563343318),
('updateUsers', '1', 1562933692),
('updateUsers', '12', 1603961242),
('updateUsers', '2', 1566276751),
('updateVideo', '1', 1562933662),
('updateVideo', '12', 1603961242),
('updateVideo', '2', 1562934307),
('viewArticles', '1', 1562933653),
('viewArticles', '12', 1603961241),
('viewArticles', '2', 1562933886),
('viewCatalog', '1', 1562933603),
('viewCatalog', '12', 1603961241),
('viewCatalog', '2', 1562933886),
('viewCategory', '1', 1562933829),
('viewCategory', '12', 1603961241),
('viewCategory', '2', 1562933886),
('viewPage', '1', 1562933643),
('viewPage', '12', 1603961241),
('viewPage', '2', 1562933886),
('viewReviews', '1', 1562933633),
('viewReviews', '12', 1603961241),
('viewReviews', '2', 1562933886),
('viewSeo', '1', 1562933685),
('viewSeo', '12', 1603961241),
('viewSeo', '2', 1562933886),
('viewSettings', '1', 1562933680),
('viewSettings', '12', 1603961241),
('viewSettings', '2', 1562933886),
('viewSlider', '1', 1562933671),
('viewSlider', '12', 1603961241),
('viewSlider', '2', 1562933886),
('viewStock', '1', 1563364758),
('viewStock', '12', 1603961241),
('viewUserdata', '1', 1563343259),
('viewUserdata', '12', 1603961241),
('viewUserdata', '2', 1563343318),
('viewUsers', '1', 1562933692),
('viewUsers', '12', 1603961241),
('viewUsers', '2', 1566276751),
('viewVideo', '1', 1562933662),
('viewVideo', '12', 1603961241),
('viewVideo', '2', 1562933886);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('createArticles', 1, 'добавлять Articles', NULL, NULL, 1562933653, 1562933653),
('createCatalog', 1, 'добавлять Catalog', NULL, NULL, 1562933603, 1562933603),
('createCategory', 1, 'добавлять Category', NULL, NULL, 1562933829, 1562933829),
('createPage', 1, 'добавлять Page', NULL, NULL, 1562933643, 1562933643),
('createReviews', 1, 'добавлять Reviews', NULL, NULL, 1562933633, 1562933633),
('createSeo', 1, 'добавлять Seo', NULL, NULL, 1562933685, 1562933685),
('createSettings', 1, 'добавлять Settings', NULL, NULL, 1562933680, 1562933680),
('createSlider', 1, 'добавлять Slider', NULL, NULL, 1562933671, 1562933671),
('createStock', 1, 'добавлять Stock', NULL, NULL, 1563364758, 1563364758),
('createUserdata', 1, 'добавлять Userdata', NULL, NULL, 1563343259, 1563343259),
('createUsers', 1, 'добавлять Users', NULL, NULL, 1562933692, 1562933692),
('createVideo', 1, 'добавлять Video', NULL, NULL, 1562933662, 1562933662),
('deleteArticles', 1, 'удалять Articles', NULL, NULL, 1562933653, 1562933653),
('deleteCatalog', 1, 'удалять Catalog', NULL, NULL, 1562933603, 1562933603),
('deleteCategory', 1, 'удалять Category', NULL, NULL, 1562933829, 1562933829),
('deletePage', 1, 'удалять Page', NULL, NULL, 1562933643, 1562933643),
('deleteReviews', 1, 'удалять Reviews', NULL, NULL, 1562933633, 1562933633),
('deleteSeo', 1, 'удалять Seo', NULL, NULL, 1562933685, 1562933685),
('deleteSettings', 1, 'удалять Settings', NULL, NULL, 1562933680, 1562933680),
('deleteSlider', 1, 'удалять Slider', NULL, NULL, 1562933671, 1562933671),
('deleteStock', 1, 'удалять Stock', NULL, NULL, 1563364758, 1563364758),
('deleteUserdata', 1, 'удалять Userdata', NULL, NULL, 1563343259, 1563343259),
('deleteUsers', 1, 'удалять Users', NULL, NULL, 1562933692, 1562933692),
('deleteVideo', 1, 'удалять Video', NULL, NULL, 1562933662, 1562933662),
('updateArticles', 1, 'редактировать Articles', NULL, NULL, 1562933653, 1562933653),
('updateCatalog', 1, 'редактировать Catalog', NULL, NULL, 1562933603, 1562933603),
('updateCategory', 1, 'редактировать Category', NULL, NULL, 1562933829, 1562933829),
('updatePage', 1, 'редактировать Page', NULL, NULL, 1562933643, 1562933643),
('updateReviews', 1, 'редактировать Reviews', NULL, NULL, 1562933633, 1562933633),
('updateSeo', 1, 'редактировать Seo', NULL, NULL, 1562933685, 1562933685),
('updateSettings', 1, 'редактировать Settings', NULL, NULL, 1562933680, 1562933680),
('updateSlider', 1, 'редактировать Slider', NULL, NULL, 1562933671, 1562933671),
('updateStock', 1, 'редактировать Stock', NULL, NULL, 1563364758, 1563364758),
('updateUserdata', 1, 'редактировать Userdata', NULL, NULL, 1563343259, 1563343259),
('updateUsers', 1, 'редактировать Users', NULL, NULL, 1562933692, 1562933692),
('updateVideo', 1, 'редактировать Video', NULL, NULL, 1562933662, 1562933662),
('viewArticles', 1, 'просматривать Articles', NULL, NULL, 1562933653, 1562933653),
('viewCatalog', 1, 'просматривать Catalog', NULL, NULL, 1562933603, 1562933603),
('viewCategory', 1, 'просматривать Category', NULL, NULL, 1562933829, 1562933829),
('viewPage', 1, 'просматривать Page', NULL, NULL, 1562933643, 1562933643),
('viewReviews', 1, 'просматривать Reviews', NULL, NULL, 1562933633, 1562933633),
('viewSeo', 1, 'просматривать Seo', NULL, NULL, 1562933685, 1562933685),
('viewSettings', 1, 'просматривать Settings', NULL, NULL, 1562933680, 1562933680),
('viewSlider', 1, 'просматривать Slider', NULL, NULL, 1562933671, 1562933671),
('viewStock', 1, 'просматривать Stock', NULL, NULL, 1563364758, 1563364758),
('viewUserdata', 1, 'просматривать Userdata', NULL, NULL, 1563343259, 1563343259),
('viewUsers', 1, 'просматривать Users', NULL, NULL, 1562933692, 1562933692),
('viewVideo', 1, 'просматривать Video', NULL, NULL, 1562933662, 1562933662);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `visibility`) VALUES
(1, 'Dita', 1),
(2, 'Givenchy', 1),
(3, 'Название', 1),
(4, 'BMW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `visibility`) VALUES
(1, 'Помещение', 1),
(2, 'Специальная аппаратура ', 1),
(3, 'Вход с улицы', 1),
(4, 'Большой ассортимент', 1);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(400) NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `isMain` tinyint(1) DEFAULT NULL,
  `modelName` varchar(150) NOT NULL,
  `urlAlias` varchar(400) NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filePath`, `itemId`, `isMain`, `modelName`, `urlAlias`, `name`) VALUES
(4, 'Brands/Brands2/e146fc.jpg', 2, 1, 'Brands', 'bed2b46345-1', 'slider_prev_1638452471'),
(5, 'Specialists/Specialists1/9a7f23.png', 1, 1, 'Specialists', '8b13a97ad8-1', 'spec_desktop'),
(7, 'Galleries/Gallery1/8c8902.jpg', 1, 1, 'Gallery', '7b30e11aec-1', 'gallery_desktop'),
(8, 'Sliders/Slider4/812bc6.jpg', 4, 0, 'Slider', '5835ee82b1-3', 'slider_desktop'),
(9, 'Sliders/Slider4/230220.jpg', 4, 0, 'Slider', '83fd745a2e-2', 'slider_tablet'),
(10, 'Sliders/Slider4/f7f596.jpg', 4, 1, 'Slider', '4fa798832d-1', 'slider_mobile'),
(16, 'Galleries/Gallery2/f77a95.jpg', 2, 1, 'Gallery', 'c3804d4cf6-1', 'gallery_desktop'),
(17, 'Galleries/Gallery3/43fe4f.jpg', 3, 1, 'Gallery', '17737fcdc4-1', 'gallery_desktop'),
(18, 'Galleries/Gallery4/97f7db.jpg', 4, 1, 'Gallery', 'e1c9d7e53a-1', 'gallery_desktop'),
(19, 'Brands/Brands1/9594e8.jpg', 1, 1, 'Brands', '10ae3524f6-1', 'brands_desktop'),
(20, 'Brands/Brands3/abd474.jpg', 3, 1, 'Brands', '3b0cbdd1d0-1', 'brands_desktop'),
(21, 'Sliders/Slider8/93e05d.jpg', 8, 0, 'Slider', '802dc7553d-3', 'slider_desktop'),
(22, 'Sliders/Slider8/9ce300.jpg', 8, 0, 'Slider', 'c55d5462df-2', 'slider_tablet'),
(23, 'Sliders/Slider8/078b9c.jpg', 8, 1, 'Slider', 'd59bed5348-1', 'slider_mobile'),
(24, 'Sliders/Slider9/0599cd.jpg', 9, 0, 'Slider', '3bc1344e57-3', 'slider_desktop'),
(25, 'Sliders/Slider9/15f0d2.jpg', 9, 0, 'Slider', 'e718258b34-2', 'slider_tablet'),
(26, 'Sliders/Slider9/376dd7.jpg', 9, 1, 'Slider', '53f583ce3e-1', 'slider_mobile'),
(27, 'Sliders/Slider10/287ef4.jpg', 10, 0, 'Slider', '30abb4b66f-3', 'slider_desktop'),
(28, 'Sliders/Slider10/2adb73.jpg', 10, 0, 'Slider', '7720695b07-2', 'slider_tablet'),
(29, 'Sliders/Slider10/cb2ade.jpg', 10, 1, 'Slider', 'c2c247b7e5-1', 'slider_mobile'),
(30, 'Brands/Brands4/e28c43.png', 4, 1, 'Brands', 'f64afbe4e5-1', 'brands_desktop');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_status` tinyint(2) DEFAULT 0,
  `user_name` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `user_phone` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int(11) NOT NULL COMMENT 'Город заказа',
  `store_id` int(11) DEFAULT NULL,
  `delivery_address` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `date_delivery` int(11) DEFAULT NULL,
  `time_delivery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `json_data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `sum_price_items` decimal(13,2) DEFAULT NULL COMMENT 'Сумма стоимости товарных позиций',
  `price_discount` decimal(11,2) DEFAULT NULL COMMENT 'Сумма размера скидки',
  `price_delivery` decimal(11,2) DEFAULT NULL COMMENT 'Стоимость доставки',
  `sum_price_total` decimal(13,2) DEFAULT NULL COMMENT 'Сумма стоимости заказа',
  `transport_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcard` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `person_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `person_phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `on_photo` int(11) DEFAULT NULL,
  `anonim` int(11) DEFAULT NULL,
  `self_get` int(11) DEFAULT NULL,
  `number` int(11) NOT NULL DEFAULT 1,
  `executed` tinyint(1) NOT NULL DEFAULT 0,
  `executed_at` int(11) DEFAULT NULL,
  `order_hash_payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_goods`
--

CREATE TABLE `order_goods` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `goods_id` int(11) UNSIGNED NOT NULL,
  `good_pricelist_id` int(11) DEFAULT 0,
  `count` int(11) UNSIGNED NOT NULL,
  `price` decimal(18,2) DEFAULT 0.00 COMMENT 'Цена за единицу',
  `sum_price` decimal(18,2) DEFAULT 0.00 COMMENT 'Цена позиции(кол-во * цена за ед.)',
  `is_sale` tinyint(1) DEFAULT 0,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `json_info` longtext DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `price_discount` decimal(10,2) DEFAULT 0.00 COMMENT 'Скидка за позицию',
  `quantity_bouquet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `name` varchar(254) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_one` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_two` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `text_three` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  `h1` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `name`, `slug`, `short_text`, `text_one`, `text_two`, `text_three`, `title`, `keywords`, `description`, `created_at`, `updated_at`, `visibility`, `sort`, `is_delete`, `h1`, `date`) VALUES
(1, 'Контакты', 'kontakty', NULL, '', NULL, NULL, '', '', '', 1638452005, 1638452005, 1, NULL, 0, '', 1638452005),
(2, 'Об оптике', 'ob-optike', NULL, '', NULL, NULL, '', '', '', 1638456228, 1638456248, 1, NULL, 0, '', 1638456228),
(3, 'Контактные линзы', 'kontaktnye-linzy', NULL, '', NULL, NULL, '', '', '', 1638456243, 1638456251, 1, NULL, 0, '', 1638456243),
(4, 'Производство очков', 'proizvodstvo-ockov', NULL, '		<section class=\"products\">\r\n			<div class=\"content products__content\">\r\n				<h1 class=\"products__title products__title--main\">Изготовление очков</h1>\r\n				<div class=\"products__wrapper\">\r\n					<div class=\"products__item product\"><img class=\"product__img\" src=\"/img/product-1.jpg\"\r\n							alt=\"Очки с ободковой оправой\">\r\n						<div class=\"product__content\">\r\n							<p class=\"product__title\">Очки с ободковой оправой</p>\r\n							<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n									aria-label=\"иконка часов\">&#xe909;</abbr> от 20 минут</p>\r\n							<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n									aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n									aria-label=\"цена за наши материалы\">500 ₽</span> <span\r\n									aria-label=\"цена за материалы заказчика\">1000 ₽</span>\r\n								<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n										aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n									<p class=\"tooltip__text tooltip__text--l-170\"><span class=\"product__blue\">наши\r\n											материалы</span> <span>материалы заказчика</span></p>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<div class=\"products__item product\"><img class=\"product__img\" src=\"/img/product-2.jpg\"\r\n							alt=\"Очки с ободковой оправой\">\r\n						<div class=\"product__content\">\r\n							<p class=\"product__title\">Очки с полуободковой<br>оправой (на леске)</p>\r\n							<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n									aria-label=\"иконка часов\">&#xe909;</abbr> от 30 минут</p>\r\n							<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n									aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n									aria-label=\"цена за наши материалы\">600 ₽</span> <span\r\n									aria-label=\"цена за материалы заказчика\">1200 ₽</span>\r\n								<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n										aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n									<p class=\"tooltip__text tooltip__text--l-170\"><span class=\"product__blue\">наши\r\n											материалы</span> <span>материалы заказчика</span></p>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<div class=\"products__item product\"><img class=\"product__img\" src=\"/img/product-1.jpg\"\r\n							alt=\"Очки с ободковой оправой\">\r\n						<div class=\"product__content\">\r\n							<p class=\"product__title\">Очки с безободковой<br>оправой (на винтах, на втулках)</p>\r\n							<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n									aria-label=\"иконка часов\">&#xe909;</abbr> от 90 минут</p>\r\n							<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n									aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n									aria-label=\"цена за наши материалы\">900 ₽</span> <span\r\n									aria-label=\"цена за материалы заказчика\">1800 ₽</span>\r\n								<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n										aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n									<p class=\"tooltip__text tooltip__text--l-170\"><span class=\"product__blue\">наши\r\n											материалы</span> <span>материалы заказчика</span></p>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"products__description product-description\">\r\n					<p class=\"product-description__text\">Услуга по изготовлению очков производится по ГОСТ Р 51193-2009\r\n						и включает в себя:</p>\r\n					<ul class=\"product-description__list\">\r\n						<li>входной контроль очковых линз и оправы;</li>\r\n						<li>обработка очковых линз и установка в оправу;</li>\r\n						<li>проверка соответствия расположения; оптических центров очковых линз положениям, указанным в\r\n							бланке заказа;</li>\r\n						<li>проверка правильности прилегания носовых упоров и соответствие длин заушников до их\r\n							изогнутой части антропометрическим данным пациента.</li>\r\n					</ul>\r\n				</div>\r\n				<h2 class=\"products__title products__title--second\">Окраска очковых линз</h2>\r\n				<div class=\"products__wrapper products__wrapper--short\">\r\n					<div class=\"products__item product\">\r\n						<div class=\"product__wrapper\"><img class=\"product__img\" src=\"/img/product-color-1.jpg\"\r\n								alt=\"Очки с ободковой оправой\">\r\n							<div class=\"product__colors color\"><img class=\"color__item\" src=\"/img/color-1.jpg\"\r\n									alt=\"Возможный цвет линз\"> <img class=\"color__item\" src=\"/img/color-2.jpg\"\r\n									alt=\"Возможный цвет линз\"> <img class=\"color__item\" src=\"/img/color-3.jpg\"\r\n									alt=\"Возможный цвет линз\"></div>\r\n						</div>\r\n						<div class=\"product__content\">\r\n							<p class=\"product__title\">Очки с безободковой оправой<br>(на винтах, на втулках)</p>\r\n							<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n									aria-label=\"иконка часов\">&#xe909;</abbr> от 90 минут</p>\r\n							<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n									aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n									aria-label=\"цена за наши материалы\">900 ₽</span> <span\r\n									aria-label=\"цена за материалы заказчика\">1800 ₽</span>\r\n								<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n										aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n									<p class=\"tooltip__text tooltip__text--l-170\"><span class=\"product__blue\">наши\r\n											материалы</span> <span>материалы заказчика</span></p>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<div class=\"products__item product\">\r\n						<div class=\"product__wrapper\"><img class=\"product__img\" src=\"/img/product-color-2.jpg\"\r\n								alt=\"Очки с ободковой оправой\">\r\n							<div class=\"product__colors color\"><img class=\"color__item\" src=\"/img/color-4.jpg\"\r\n									alt=\"Возможный цвет линз\"> <img class=\"color__item\" src=\"/img/colo-5.jpg\"\r\n									alt=\"Возможный цвет линз\"> <img class=\"color__item\" src=\"/img/color-6.jpg\"\r\n									alt=\"Возможный цвет линз\"></div>\r\n						</div>\r\n						<div class=\"product__content\">\r\n							<p class=\"product__title\">Очки с безободковой оправой<br>(на винтах, на втулках)</p>\r\n							<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n									aria-label=\"иконка часов\">&#xe909;</abbr> от 90 минут</p>\r\n							<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n									aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n									aria-label=\"цена за наши материалы\">900 ₽</span> <span\r\n									aria-label=\"цена за материалы заказчика\">1800 ₽</span>\r\n								<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n										aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n									<p class=\"tooltip__text tooltip__text--l-170\"><span class=\"product__blue\">наши\r\n											материалы</span> <span>материалы заказчика</span></p>\r\n								</div>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"products__description product-description\">\r\n					<p class=\"product-description__text\">Услуга по сплошной и градиентной окраске полимерных очковых\r\n						линз без покрытия. Выбор интенсивности окраски и цвета по образцам.</p>\r\n				</div><a href=\"/\" class=\"products__link\">Смотреть также подбор очков</a>\r\n			</div>\r\n		</section>\r\n		<article class=\"attention\">\r\n			<p class=\"attention__text\">При заказе работ с материалами и оправами, приобретёнными в <span\r\n					class=\"green\">ООО “ОПТИЧЕСКИЕ ТОВАРЫ”</span>, вы получите <span class=\"green\">скидку 50%</span>\r\n				<span class=\"attention__img\"><svg class=\"attention__glasses\" xmlns=\"http://www.w3.org/2000/svg\"\r\n						width=\"193\" height=\"106\" viewBox=\"0 0 1280 640\" role=\"/img\" aria-label=\"Очки\">\r\n						<path fill=\"#0B84CD\"\r\n							d=\"M996 62.6c-2.5.2-10.6.8-18 1.4-35.2 2.9-76.7 10.3-145 26-106 24.4-139.5 29.5-193 29.5-47.9-.1-66.9-3.1-147.5-23.5-21.4-5.4-43.6-10.8-49.2-11.9-26.3-5.4-93.9-15.6-124.8-18.8-24.3-2.5-81.1-2.5-101.5 0-34.1 4.2-64 10.3-127 25.9-22.3 5.5-51.2 12.4-64.3 15.3-13.1 2.9-24.1 5.5-24.3 5.8-.3.3-.6 14.8-.7 32.3-.3 49.6.1 50.9 27 86 10.9 14.2 17.7 25.7 20.7 34.8.9 2.7 3 11.2 4.6 18.8 12.6 58.8 30.5 119.2 52.1 175.6 10.7 27.9 19.9 42.5 37.4 59 27.4 25.9 73 46.4 120.5 54.1 21.6 3.5 36.5 4.4 62.8 3.8 62.6-1.5 100.9-12.9 139-41.4 10.3-7.7 30.4-27.3 39.6-38.7 22.2-27.4 43.4-63.5 62.1-105.8 10.9-24.8 13.3-32.1 22.5-71.3 7-29.4 12-45.6 17.5-56.5 5.5-10.9 7.2-13 13.3-15.8 5.5-2.5 5.8-2.5 23.6-1.9 25.5 1 24.9.8 32.8 8.7 5.5 5.5 7.6 8.6 12.6 19 6.4 13.2 9.1 21.4 16.7 50.5 16.8 63.8 40.6 117.4 69.6 157 9.8 13.3 35.7 39.1 47.9 47.7 70.5 49.7 169.3 61.6 248.8 29.9 61.4-24.5 104.3-70.9 126.7-137.1 7-20.6 11.3-37.4 21-81.1 13.7-62 19.7-83.3 27.6-99.3 6.3-12.6 10.7-18 23.9-28.5 7.9-6.4 9.8-15.1 8.1-38.6-.7-9.6-.6-17.7.1-25.8 1.8-19.7-1-28.6-10.9-33.9-3.2-1.8-10.2-3.8-19.4-5.8-15.1-3.1-26.9-6.4-59.9-16.9-27.1-8.6-42.5-12.2-80-18.6-48-8.1-60.1-9.5-86-9.9-12.4-.2-24.5-.2-27 0zm-618.5 43.5c22.6 2 49.6 7.8 76.1 16.3 56.6 18.3 88.4 41.9 101.7 75.6 4.9 12.5 6.7 23.4 6.8 41.5 0 21.3-3.6 42.8-12.1 72-7.3 24.9-24.9 70.8-36 94.2-31 65.1-79.3 107.2-141.4 123.4-41.5 10.8-91.3 9.4-138.6-3.8-44.9-12.5-79-44.8-98.5-93.3-8.8-21.9-21.7-70.7-28.4-107.5-9.5-51.9-11.7-106.9-5.3-131 11.3-42.2 45-65.5 112.2-77.4 12.9-2.3 52.3-7.4 70.5-9.1 31.5-3 65.8-3.3 93-.9zm621.5.5c21.5 1.8 45.5 4.7 66.2 7.9 58.6 9.1 92.4 25 110.3 51.9 11.6 17.6 14.5 29.2 15.2 62.1 1.1 49.2-6.2 98.7-24.3 164.5-6.9 25.5-10.2 34.7-17.8 50.5-10.3 21.4-20.8 36-35.9 50-17.7 16.5-37.5 26.9-63.7 33.5-78.3 19.6-148.9 8.5-203.3-32.1-33.9-25.3-59.7-61.4-80.7-113-27.7-68-39-111.9-37.7-146.9.3-7.4 1.2-17.1 2.2-21.5 9.1-43.8 47.2-74.4 117.3-94.4 32.7-9.3 51.5-12.5 86.7-14.5 11-.6 47.8.5 65.5 2z\" />\r\n					</svg> <span class=\"green attention__img-caption\">-50%</span></span></p>\r\n		</article>\r\n        [%brands%]\r\n		<article class=\"appointment\">\r\n			<div class=\"content appointment__content\">\r\n				<p class=\"appointment__title\">Записаться на изготовление очков</p>\r\n				<p class=\"appointment__subtitle\">по телефону <a href=\"tel:+7(473)3006677\">+7 (473) 300-66-77</a> или\r\n					<button class=\"appointment__button button button--second\" aria-haspopup=\"true\">онлайн</button></p>\r\n				<div class=\"appointment__form\">\r\n					<form action=\"/\" class=\"form form--appointment\">\r\n						<fieldset class=\"form__wrapper\">\r\n							<legend class=\"form__legend visually-hidden\">Записаться на прием</legend><input\r\n								class=\"input form__item\" placeholder=\"Имя\" aria-label=\"Имя\"> <input type=\"tel\"\r\n								class=\"input form__item\" placeholder=\"Телефон\" aria-label=\"Телефон\"> <input\r\n								class=\"input-date form__item\" placeholder=\"дд.мм.гггг\" aria-label=\"Дата приема\">\r\n							<p class=\"form__attention\">Нажимая кнопку “Записаться”<br>Вы даете свое согласие на <a\r\n									href=\"/\" target=\"_blank\">обработку персональных данных.</a></p><button type=\"submit\"\r\n								class=\"button button--main form__submit\">Записаться</button>\r\n						</fieldset><button class=\"cross cross--white form__close\" type=\"button\"\r\n							aria-label=\"Кнопка закрыть\"></button>\r\n					</form>\r\n				</div>\r\n				<p class=\"appointment__info\">Оптика находится по адресу<br><b>ул. Кольцовская, д. 38</b> <a\r\n						href=\"#map\">Смотреть на карте</a><br><b>Режим работы:</b> Пн-Пт: <time>10:00</time> &mdash;\r\n					<time>19:00</time> ,<br>Сб: <time>10:00</time> &mdash; <time>16:00</time></p>\r\n			</div>\r\n		</article>\r\n		<section class=\"advantages\">\r\n			<div class=\"content advantages__content\">\r\n				<h2 class=\"advantages__title\">Умная оптика это</h2>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/doc.png\" media=\"(min-width: 768px)\"><img src=\"/img/doc_mb.png\"\r\n							alt=\"Фотография доктора\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Медицинские оправы и солнцезащитные очки мировых брендов TitanFlex,\r\n						Silhouette, Ray-Ban - в наличии и на заказ (можем привозить по каталогам производителей) от\r\n						официальных поставщиков.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/lenses.png\" media=\"(min-width: 768px)\"><img src=\"/img/lenses_mb.png\"\r\n							alt=\"Контактные линзы\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Современное автоматическое оборудование HUVITZ Kaizer для изготовления\r\n						всех типов очков.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/glass.png\" media=\"(min-width: 768px)\"><img src=\"/img/glass_mb.png\"\r\n							alt=\"Фотография очков\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Линзы для очков ведущих мировых проиpводителей (Zeiss, Rodensrock,\r\n						Essilor, Hoya) от официальных поставщиков, в наличии и на заказ. Есть возможность прямого заказа\r\n						любых очковых линз данных производителей.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/doc2.png\" media=\"(min-width: 768px)\"><img src=\"/img/doc2_mb.png\"\r\n							alt=\"Фотография доктора с рентген снимками\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Постоянные скидки на TitanFlex Selection, TitanFlex, Silhoette (м.б.\r\n						другие бренды) - 10-20% от рекомендованной розничной цены.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/baloon.png\" media=\"(min-width: 768px)\"><img src=\"/img/baloon_mb.png\"\r\n							alt=\"Фотография воздушного шара\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Ремонт очков различной сложности, в т.ч. лазерная сварка дефектов оправ.\r\n					</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/girl.png\" media=\"(min-width: 768px)\"><img src=\"/img/girl_mb.png\"\r\n							alt=\"Фотография девушки в очках\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Установка линз в оправу заказчика.</p>\r\n				</div>\r\n			</div>\r\n		</section>\r\n[%map%]', NULL, NULL, '', '', '', 1638456263, 1638870006, 1, NULL, 0, '', 1638456263),
(5, 'Ремонт очков', 'remont-ockov', NULL, '		<section class=\"repair\">\r\n			<div class=\"content repair__content\">\r\n				<h1 class=\"repair__title repair__title--main\">Ремонт очков</h1>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Замена элемента крепления</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 10 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">100 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">200 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">С учетом стоимости материалов (винт, гайка, шайба\r\n						в ассортименте)</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Замена лески</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 20 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">200 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">400 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">С учетом стоимости материалов (леска)</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Замена втулки</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 20 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">200 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">400 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">С учетом стоимости материалов (втулки в\r\n						ассортименте)</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Замена носоупоров</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 10 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">100 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">200 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">Без учета стоимости носоупоров</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Замена заушников</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 40 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">300 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">600 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">Без учета стоимости заушников</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Замена петли (флекса)</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 60 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">400 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">800 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Восстановление/нарезка резьбы</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 60 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">200 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">400 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Ремонт оправы (пайка, склейка)</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ от 2 до 3 дней</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> 1500 ₽</div>\r\n					</div>\r\n				</div>\r\n				<h2 class=\"repair__title repair__title--second\">Дополнительные услуги</h2>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Выправка оправы</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 10 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">200 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">400 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">Обеспечение правильности прилегания носовых упоров\r\n						и соответствие длин заушников до их изогнутой части антропометрическим данным пациента.</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Определение параметров монофокальных очков.</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 10 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">200 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">400 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">Проверка оптической силы линз в оправе и\r\n						расположения оптических центров, расстояния между оптическими центрами</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Определение параметров астигматических очков.</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 10 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">400 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">800 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n					<p class=\"product-description repair__item-descr\">Проверка оптической силы линз в оправе, силы и\r\n						направления оси астигматической коррекции, расположения оптических центров, расстояния между\r\n						оптическими центрами</p>\r\n				</div>\r\n				<div class=\"repair__item product\">\r\n					<div class=\"product__content repair__item-content\">\r\n						<p class=\"product__title\">Ультразвуковая очистка оправы</p>\r\n						<p class=\"product__time\"><abbr class=\"product__time-icon\"\r\n								aria-label=\"иконка часов\">&#xe909;</abbr> ~ 10 минут</p>\r\n						<div class=\"product__cash\"><abbr class=\"product__cash-icon\"\r\n								aria-label=\"иконка кошелька\">&#xe908;</abbr> <span class=\"product__blue\"\r\n								aria-label=\"цена за наши материалы\">200 ₽</span> <span\r\n								aria-label=\"цена за материалы заказчика\">400 ₽</span>\r\n							<div class=\"product__tooltip tooltip\"><abbr class=\"tooltip__button\"\r\n									aria-label=\"икона вопрос\" tabindex=\"0\">&#xe907;</abbr>\r\n								<p class=\"tooltip__text tooltip__text--l-100\"><span class=\"product__blue\">наши\r\n										материалы</span> <span>материалы заказчика</span></p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</section>\r\n		<article class=\"attention\">\r\n			<p class=\"attention__text\">При заказе работ с материалами и оправами, приобретёнными в <span\r\n					class=\"green\">ООО “ОПТИЧЕСКИЕ ТОВАРЫ”</span>, вы получите <span class=\"green\">скидку 50%</span>\r\n				<span class=\"attention__img\"><svg class=\"attention__glasses\" xmlns=\"http://www.w3.org/2000/svg\"\r\n						width=\"193\" height=\"106\" viewBox=\"0 0 1280 640\" role=\"/img\" aria-label=\"Очки\">\r\n						<path fill=\"#0B84CD\"\r\n							d=\"M996 62.6c-2.5.2-10.6.8-18 1.4-35.2 2.9-76.7 10.3-145 26-106 24.4-139.5 29.5-193 29.5-47.9-.1-66.9-3.1-147.5-23.5-21.4-5.4-43.6-10.8-49.2-11.9-26.3-5.4-93.9-15.6-124.8-18.8-24.3-2.5-81.1-2.5-101.5 0-34.1 4.2-64 10.3-127 25.9-22.3 5.5-51.2 12.4-64.3 15.3-13.1 2.9-24.1 5.5-24.3 5.8-.3.3-.6 14.8-.7 32.3-.3 49.6.1 50.9 27 86 10.9 14.2 17.7 25.7 20.7 34.8.9 2.7 3 11.2 4.6 18.8 12.6 58.8 30.5 119.2 52.1 175.6 10.7 27.9 19.9 42.5 37.4 59 27.4 25.9 73 46.4 120.5 54.1 21.6 3.5 36.5 4.4 62.8 3.8 62.6-1.5 100.9-12.9 139-41.4 10.3-7.7 30.4-27.3 39.6-38.7 22.2-27.4 43.4-63.5 62.1-105.8 10.9-24.8 13.3-32.1 22.5-71.3 7-29.4 12-45.6 17.5-56.5 5.5-10.9 7.2-13 13.3-15.8 5.5-2.5 5.8-2.5 23.6-1.9 25.5 1 24.9.8 32.8 8.7 5.5 5.5 7.6 8.6 12.6 19 6.4 13.2 9.1 21.4 16.7 50.5 16.8 63.8 40.6 117.4 69.6 157 9.8 13.3 35.7 39.1 47.9 47.7 70.5 49.7 169.3 61.6 248.8 29.9 61.4-24.5 104.3-70.9 126.7-137.1 7-20.6 11.3-37.4 21-81.1 13.7-62 19.7-83.3 27.6-99.3 6.3-12.6 10.7-18 23.9-28.5 7.9-6.4 9.8-15.1 8.1-38.6-.7-9.6-.6-17.7.1-25.8 1.8-19.7-1-28.6-10.9-33.9-3.2-1.8-10.2-3.8-19.4-5.8-15.1-3.1-26.9-6.4-59.9-16.9-27.1-8.6-42.5-12.2-80-18.6-48-8.1-60.1-9.5-86-9.9-12.4-.2-24.5-.2-27 0zm-618.5 43.5c22.6 2 49.6 7.8 76.1 16.3 56.6 18.3 88.4 41.9 101.7 75.6 4.9 12.5 6.7 23.4 6.8 41.5 0 21.3-3.6 42.8-12.1 72-7.3 24.9-24.9 70.8-36 94.2-31 65.1-79.3 107.2-141.4 123.4-41.5 10.8-91.3 9.4-138.6-3.8-44.9-12.5-79-44.8-98.5-93.3-8.8-21.9-21.7-70.7-28.4-107.5-9.5-51.9-11.7-106.9-5.3-131 11.3-42.2 45-65.5 112.2-77.4 12.9-2.3 52.3-7.4 70.5-9.1 31.5-3 65.8-3.3 93-.9zm621.5.5c21.5 1.8 45.5 4.7 66.2 7.9 58.6 9.1 92.4 25 110.3 51.9 11.6 17.6 14.5 29.2 15.2 62.1 1.1 49.2-6.2 98.7-24.3 164.5-6.9 25.5-10.2 34.7-17.8 50.5-10.3 21.4-20.8 36-35.9 50-17.7 16.5-37.5 26.9-63.7 33.5-78.3 19.6-148.9 8.5-203.3-32.1-33.9-25.3-59.7-61.4-80.7-113-27.7-68-39-111.9-37.7-146.9.3-7.4 1.2-17.1 2.2-21.5 9.1-43.8 47.2-74.4 117.3-94.4 32.7-9.3 51.5-12.5 86.7-14.5 11-.6 47.8.5 65.5 2z\" />\r\n					</svg> <span class=\"green attention__img-caption\">-50%</span></span></p>\r\n		</article>\r\n		[%brands%]\r\n		<article class=\"appointment\">\r\n			<div class=\"content appointment__content\">\r\n				<p class=\"appointment__title\">Записаться на изготовление очков</p>\r\n				<p class=\"appointment__subtitle\">по телефону <a href=\"tel:+7(473)3006677\">+7 (473) 300-66-77</a> или\r\n					<button class=\"appointment__button button button--second\" aria-haspopup=\"true\">онлайн</button></p>\r\n				<div class=\"appointment__form\">\r\n					<form action=\"/\" class=\"form form--appointment\">\r\n						<fieldset class=\"form__wrapper\">\r\n							<legend class=\"form__legend visually-hidden\">Записаться на прием</legend><input\r\n								class=\"input form__item\" placeholder=\"Имя\" aria-label=\"Имя\"> <input type=\"tel\"\r\n								class=\"input form__item\" placeholder=\"Телефон\" aria-label=\"Телефон\"> <input\r\n								class=\"input-date form__item\" placeholder=\"дд.мм.гггг\" aria-label=\"Дата приема\">\r\n							<p class=\"form__attention\">Нажимая кнопку “Записаться”<br>Вы даете свое согласие на <a\r\n									href=\"/\" target=\"_blank\">обработку персональных данных.</a></p><button type=\"submit\"\r\n								class=\"button button--main form__submit\">Записаться</button>\r\n						</fieldset><button class=\"cross cross--white form__close\" type=\"button\"\r\n							aria-label=\"Кнопка закрыть\"></button>\r\n					</form>\r\n				</div>\r\n				<p class=\"appointment__info\">Оптика находится по адресу<br><b>ул. Кольцовская, д. 38</b> <a\r\n						href=\"#map\">Смотреть на карте</a><br><b>Режим работы:</b> Пн-Пт: <time>10:00</time> &mdash;\r\n					<time>19:00</time> ,<br>Сб: <time>10:00</time> &mdash; <time>16:00</time></p>\r\n			</div>\r\n		</article>\r\n		<section class=\"advantages\">\r\n			<div class=\"content advantages__content\">\r\n				<h2 class=\"advantages__title\">Умная оптика это</h2>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/doc.png\" media=\"(min-width: 768px)\"><img src=\"/img/doc_mb.png\"\r\n							alt=\"Фотография доктора\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Медицинские оправы и солнцезащитные очки мировых брендов TitanFlex,\r\n						Silhouette, Ray-Ban - в наличии и на заказ (можем привозить по каталогам производителей) от\r\n						официальных поставщиков.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/lenses.png\" media=\"(min-width: 768px)\"><img src=\"/img/lenses_mb.png\"\r\n							alt=\"Контактные линзы\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Современное автоматическое оборудование HUVITZ Kaizer для изготовления\r\n						всех типов очков.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/glass.png\" media=\"(min-width: 768px)\"><img src=\"/img/glass_mb.png\"\r\n							alt=\"Фотография очков\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Линзы для очков ведущих мировых проиpводителей (Zeiss, Rodensrock,\r\n						Essilor, Hoya) от официальных поставщиков, в наличии и на заказ. Есть возможность прямого заказа\r\n						любых очковых линз данных производителей.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/doc2.png\" media=\"(min-width: 768px)\"><img src=\"/img/doc2_mb.png\"\r\n							alt=\"Фотография доктора с рентген снимками\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Постоянные скидки на TitanFlex Selection, TitanFlex, Silhoette (м.б.\r\n						другие бренды) - 10-20% от рекомендованной розничной цены.</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/baloon.png\" media=\"(min-width: 768px)\"><img src=\"/img/baloon_mb.png\"\r\n							alt=\"Фотография воздушного шара\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Ремонт очков различной сложности, в т.ч. лазерная сварка дефектов оправ.\r\n					</p>\r\n				</div>\r\n				<div class=\"advantages__item\">\r\n					<picture class=\"advantages__img\">\r\n						<source srcset=\"/img/girl.png\" media=\"(min-width: 768px)\"><img src=\"/img/girl_mb.png\"\r\n							alt=\"Фотография девушки в очках\">\r\n					</picture>\r\n					<p class=\"advantages__text\">Установка линз в оправу заказчика.</p>\r\n				</div>\r\n			</div>\r\n		</section>\r\n[%map%]', NULL, NULL, '', '', '', 1638456274, 1638870864, 1, NULL, 0, '', 1638456274),
(6, 'Подбор очков', 'podbor-ockov', NULL, '<section class=\"products\">\r\n<div class=\"content products__content\">\r\n<h1 class=\"products__title\">Подбор очков &mdash; очковая коррекция</h1>\r\n\r\n<div class=\"products__wrapper\">\r\n<div class=\"products__item product product--wrap\"><img alt=\"Фотография девушки в очках\" class=\"product__img\" src=\"/img/cor-girl.jpg\" />\r\n<div class=\"product__content\">\r\n<p class=\"product__title\">Подбор очков</p>\r\n\r\n<p class=\"product__time\"><abbr aria-label=\"иконка часов\" class=\"product__time-icon\"></abbr> от 30 до 60 минут</p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом, к.м.н &mdash; <span class=\"product__blue\">1200 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом &mdash; <span class=\"product__blue\">800 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Оптометристом &mdash; <span class=\"product__blue\">600 ₽</span></p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"products__item product product--wrap\"><img alt=\"Фотография мужчины с прибором для подбора очков\" class=\"product__img\" src=\"/img/cor-man.jpg\" />\r\n<div class=\"product__content\">\r\n<p class=\"product__title\">Подбор сложных очков</p>\r\n\r\n<p class=\"product__time\"><abbr aria-label=\"иконка часов\" class=\"product__time-icon\"></abbr> от 60 до 90 минут</p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом, к.м.н &mdash; <span class=\"product__blue\">1900 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом &mdash; <span class=\"product__blue\">1200 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Оптометристом &mdash; <span class=\"product__blue\">800 ₽</span></p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"products__item product product--wrap\"><img alt=\"Фотография девушки с закрытым глазом\" class=\"product__img\" src=\"/img/cor-pirat.jpg\" />\r\n<div class=\"product__content\">\r\n<p class=\"product__title\">Подбор сложных очков</p>\r\n\r\n<p class=\"product__time\"><abbr aria-label=\"иконка часов\" class=\"product__time-icon\"></abbr> от 30 до 60 минут</p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом &mdash; <span class=\"product__blue\">400 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Оптометристом &mdash; <span class=\"product__blue\">800 ₽</span></p>\r\n\r\n<p class=\"product__alert\"><abbr aria-label=\"внимание\" class=\"product__alert-icon\"></abbr> Считается повторной в течение 1 месяца со дня оказания услуги &ldquo;подбор очков&rdquo;.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"product-description products__description\">\r\n<p class=\"product-description__text\">Подбор очко включает в себя: сбор анамнеза, осмотр, визометрия, биомикроскопия, рефрактометрия, офтальмоскопия (по показаниям), проведение функциональных тестов для объективного исследования рефракции, определение характера зрения, состояния аккомодации, определение переносимой очковой коррекции.</p>\r\n\r\n<p class=\"product-description__text\"><b><span class=\"blue\">Результат:</span></b> Пациент получает на руки рецепт утвержденной формы на очки (форма №2-МИ), рекомендации по использованию коррекции и адаптации к очкам. Дополнительно по запросу &mdash; выписку с результатами проведенных обследований.</p>\r\n\r\n<p class=\"product-description__text product-description__text--alert\">В повторную консультацию и подбор сложных очков входит проведение функциональных тестов для фузионных резервов. Также повторная консультация не предусматривает осмотр и биомикроскопию.</p>\r\n</div>\r\n\r\n<p class=\"products__link\">Смотреть также <a href=\"/\">подбор очков</a></p>\r\n</div>\r\n</section>\r\n\r\n<article class=\"appointment\">\r\n<div class=\"content appointment__content\">\r\n<p class=\"appointment__title\">Записаться на изготовление очков</p>\r\n\r\n<p class=\"appointment__subtitle\">по телефону <a href=\"tel:+7(473)3006677\">+7 (473) 300-66-77</a> или<button aria-haspopup=\"true\" class=\"appointment__button button button--second\">онлайн</button></p>\r\n\r\n<div class=\"appointment__form\">\r\n<form action=\"/\" class=\"form form--appointment\">\r\n<fieldset class=\"form__wrapper\"><legend class=\"form__legend visually-hidden\">Записаться на прием</legend><input aria-label=\"Имя\" class=\"input form__item\" placeholder=\"Имя\" /> <input aria-label=\"Телефон\" class=\"input form__item\" placeholder=\"Телефон\" type=\"tel\" /> <input aria-label=\"Дата приема\" class=\"input-date form__item\" placeholder=\"дд.мм.гггг\" />\r\n<p class=\"form__attention\">Нажимая кнопку &ldquo;Записаться&rdquo;<br />\r\nВы даете свое согласие на <a href=\"/\" target=\"_blank\">обработку персональных данных.</a></p>\r\n<button class=\"button button--main form__submit\" type=\"submit\">Записаться</button></fieldset>\r\n<button aria-label=\"Кнопка закрыть\" class=\"cross cross--white form__close\" type=\"button\"></button></form>\r\n</div>\r\n\r\n<p class=\"appointment__info\">Оптика находится по адресу<br />\r\n<b>ул. Кольцовская, д. 38</b> <a href=\"#map\">Смотреть на карте</a><br />\r\n<b>Режим работы:</b> Пн-Пт: <time>10:00</time> &mdash; <time>19:00</time> ,<br />\r\nСб: <time>10:00</time> &mdash; <time>16:00</time></p>\r\n</div>\r\n</article>\r\n\r\n<section class=\"experts\">\r\n<div class=\"content experts__content\">\r\n<h2 class=\"experts__title\">Наши специалисты</h2>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Нистратов Дмитрий Михайлович\" class=\"expert__photo\" src=\"/img/nistratov.jpg\" />\r\n<h3 class=\"expert__name\">Нистратов Дмитрий Михайлович</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог высшей квалификационной категории</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">19 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--diploma\">Диплом ВГМА им. Н.Н.Бурденко серия ДВС №1344535 от 28.06.2002 г. по специальности &quot;Лечебное дело&quot;</li>\r\n	<li class=\"education__item education__item--medal\">Приказ ДЗ ВО о присвоении квалификационной категории от 23.11.2015 г. № 454-Л.</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 1177242846263 от 21.12.2020 г. по специальности &quot;Организация здравоохранения и общественное здоровье&quot;</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 1177242846794 от 29.12.2020 г. по специальности &quot;Офтальмология&quot;</li>\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Черных Евгения Николаевна\" class=\"expert__photo\" src=\"/img/chernikh.jpg\" />\r\n<h3 class=\"expert__name\">Черных Евгения Николаевна</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог, к.м.н.</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">14 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--diploma\">Диплом с отличием ВГМА им. Н.Н.Бурденко ВСА 0649932 22.06.2007 по специальности &quot;Лечебное дело&quot;</li>\r\n	<li class=\"education__item education__item--diploma\">Диплом ДКН 141766 от 01.07.2011 о присуждении ученой степени кандидата медицинских наук</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 0136310068410 от 08.06.2018 г по специальности &quot;Офтальмология&quot;</li>\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Мальцева Дарья Геннадиевна\" class=\"expert__photo\" src=\"/img/maltseva.jpg\" />\r\n<h3 class=\"expert__name\">Мальцева Дарья Геннадиевна</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">6 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--diploma\">Диплом ВГМУ им. Н.Н.Бурденко 103618 0612769 от 26.06.2015 г. по специальности &quot;Педиатрия&quot;</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 0136310064485 от 28.08.2017 г по специальности &quot;офтальмология&quot;</li>\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Алёшина Ольга Александровна\" class=\"expert__photo\" src=\"/img/aleshina.jpg\" />\r\n<h3 class=\"expert__name\">Алёшина Ольга Александровна</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">9 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n</div>\r\n</section>\r\n\r\n[%map%]\r\n', NULL, NULL, '', '', '', 1638456289, 1638867201, 1, NULL, 0, '', 1638456289);
INSERT INTO `page` (`id`, `name`, `slug`, `short_text`, `text_one`, `text_two`, `text_three`, `title`, `keywords`, `description`, `created_at`, `updated_at`, `visibility`, `sort`, `is_delete`, `h1`, `date`) VALUES
(7, 'Подбор контактных линз', 'podbor-kontaktnyh-linz', NULL, '<section class=\"products\">\r\n<div class=\"content products__content\">\r\n<h1 class=\"products__title\">Подбор контактных линз &mdash;<br />\r\nконтактная коррекция</h1>\r\n\r\n<div class=\"products__wrapper\">\r\n<div class=\"products__item product product--wrap\"><img alt=\"Фотография контактных линз\" class=\"product__img\" src=\"/img/lenses-1.jpg\" />\r\n<div class=\"product__content\">\r\n<p class=\"product__title\">Подбор контактных линз</p>\r\n\r\n<p class=\"product__time\"><abbr aria-label=\"иконка часов\" class=\"product__time-icon\"></abbr> от 60 до 90 минут</p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом, к.м.н &mdash; <span class=\"product__blue\">1500 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом &mdash; <span class=\"product__blue\">1000 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Оптометристом &mdash; <span class=\"product__blue\">800 ₽</span></p>\r\n</div>\r\n</div>\r\n\r\n<div class=\"products__item product product--wrap\"><img alt=\"Фотография контактных линз\" class=\"product__img\" src=\"/img/lenses-2.jpg\" />\r\n<div class=\"product__content\">\r\n<div class=\"product__title\">Подбор сложных контактных линз\r\n<div class=\"product__tooltip tooltip\"><abbr aria-labelledby=\"warning\" class=\"tooltip__button\" tabindex=\"0\"></abbr>\r\n\r\n<p class=\"tooltip__text tooltip__text--l-170\" id=\"warning\" role=\"tooltip\">астигматические, мультифокальные, индивидуальные контактные линзы; контактные линзы для контроля миопии</p>\r\n</div>\r\n</div>\r\n\r\n<p class=\"product__time\"><abbr aria-label=\"иконка часов\" class=\"product__time-icon\"></abbr> от 60 до 120 минут</p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом, к.м.н &mdash; <span class=\"product__blue\">2000 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом &mdash; <span class=\"product__blue\">1500 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Оптометристом &mdash; <span class=\"product__blue\">1000 ₽</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"product-description products__description\">\r\n<p class=\"product-description__text\">Сбор анамнеза, осмотр, визометрия, биомикроскопия, рефрактометрия, циклоплегия (по показаниям), кератометрия, офтальмоскопия, проведение функциональных тестов для объективного исследования рефракции, определение характера зрения, фузионных резервов, состояния аккомодации, расчет индивидуальных параметров контактных линз, оценка посадки контактных линз.</p>\r\n\r\n<p class=\"product-description__text\"><b><span class=\"blue\">Результат:</span></b> Пациент получает на руки рецепт утвержденной формы на контактные линзы (форма №3-МИ), памятку по обращению с контактными линзами, по запросу - выписку с результатами проведенных обследований.</p>\r\n</div>\r\n\r\n<p class=\"products__alert product-alert\">В некоторых случаях, при подборе контактных линз требуется предварительный заказ редких линз, по индивидуальным параметрам. Срок ожидания заказа может варьироваться от 1-2 дней до 3-х месяцев.</p>\r\n\r\n<div class=\"products__wrapper\">\r\n<div class=\"products__item product product--wrap\"><img alt=\"Фотография девушки, которая надевает контактные линзы\" class=\"product__img\" src=\"/img/lenses-3.jpg\" />\r\n<div class=\"product__content\">\r\n<p class=\"product__title\">Подбор сложных очков</p>\r\n\r\n<p class=\"product__time\"><abbr aria-label=\"иконка часов\" class=\"product__time-icon\"></abbr> от 20 до 40 минут</p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Врачом-офтальмологом &mdash; <span class=\"product__blue\">800 ₽</span></p>\r\n\r\n<p class=\"product__cash\"><abbr aria-label=\"иконка кошелька\" class=\"product__cash-icon\"></abbr> Оптометристом &mdash; <span class=\"product__blue\">500 ₽</span></p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"product-description products__description\">\r\n<p class=\"product-description__text\">Обучение пациента правилам гигиены, первичным навыкам надевания и снятия контактных линз и их обработки.</p>\r\n\r\n<p class=\"product-description__text\"><b><span class=\"blue\">Результат:</span></b> Пациент получает на руки памятку по обращению с контактными линзами.</p>\r\n</div>\r\n\r\n<p class=\"products__link\">Смотреть также <a href=\"/\">подбор очков</a></p>\r\n</div>\r\n</section>\r\n\r\n<article class=\"appointment\">\r\n<div class=\"content appointment__content\">\r\n<p class=\"appointment__title\">Записаться на изготовление очков</p>\r\n\r\n<p class=\"appointment__subtitle\">по телефону <a href=\"tel:+7(473)3006677\">+7 (473) 300-66-77</a> или<button aria-haspopup=\"true\" class=\"appointment__button button button--second\">онлайн</button></p>\r\n\r\n<div class=\"appointment__form\">\r\n<form action=\"/\" class=\"form form--appointment\">\r\n<fieldset class=\"form__wrapper\"><legend class=\"form__legend visually-hidden\">Записаться на прием</legend><input aria-label=\"Имя\" class=\"input form__item\" placeholder=\"Имя\" /> <input aria-label=\"Телефон\" class=\"input form__item\" placeholder=\"Телефон\" type=\"tel\" /> <input aria-label=\"Дата приема\" class=\"input-date form__item\" placeholder=\"дд.мм.гггг\" />\r\n<p class=\"form__attention\">Нажимая кнопку &ldquo;Записаться&rdquo;<br />\r\nВы даете свое согласие на <a href=\"/\" target=\"_blank\">обработку персональных данных.</a></p>\r\n<button class=\"button button--main form__submit\" type=\"submit\">Записаться</button></fieldset>\r\n<button aria-label=\"Кнопка закрыть\" class=\"cross cross--white form__close\" type=\"button\"></button></form>\r\n</div>\r\n\r\n<p class=\"appointment__info\">Оптика находится по адресу<br />\r\n<b>ул. Кольцовская, д. 38</b> <a href=\"#map\">Смотреть на карте</a><br />\r\n<b>Режим работы:</b> Пн-Пт: <time>10:00</time> &mdash; <time>19:00</time> ,<br />\r\nСб: <time>10:00</time> &mdash; <time>16:00</time></p>\r\n</div>\r\n</article>\r\n\r\n<section class=\"experts\">\r\n<div class=\"content experts__content\">\r\n<h2 class=\"experts__title\">Наши специалисты</h2>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Нистратов Дмитрий Михайлович\" class=\"expert__photo\" src=\"/img/nistratov.jpg\" />\r\n<h3 class=\"expert__name\">Нистратов Дмитрий Михайлович</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог высшей квалификационной категории</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">19 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--diploma\">Диплом ВГМА им. Н.Н.Бурденко серия ДВС №1344535 от 28.06.2002 г. по специальности &quot;Лечебное дело&quot;</li>\r\n	<li class=\"education__item education__item--medal\">Приказ ДЗ ВО о присвоении квалификационной категории от 23.11.2015 г. № 454-Л.</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 1177242846263 от 21.12.2020 г. по специальности &quot;Организация здравоохранения и общественное здоровье&quot;</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 1177242846794 от 29.12.2020 г. по специальности &quot;Офтальмология&quot;</li>\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Черных Евгения Николаевна\" class=\"expert__photo\" src=\"/img/chernikh.jpg\" />\r\n<h3 class=\"expert__name\">Черных Евгения Николаевна</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог, к.м.н.</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">14 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--diploma\">Диплом с отличием ВГМА им. Н.Н.Бурденко ВСА 0649932 22.06.2007 по специальности &quot;Лечебное дело&quot;</li>\r\n	<li class=\"education__item education__item--diploma\">Диплом ДКН 141766 от 01.07.2011 о присуждении ученой степени кандидата медицинских наук</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 0136310068410 от 08.06.2018 г по специальности &quot;Офтальмология&quot;</li>\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Мальцева Дарья Геннадиевна\" class=\"expert__photo\" src=\"/img/maltseva.jpg\" />\r\n<h3 class=\"expert__name\">Мальцева Дарья Геннадиевна</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">6 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--diploma\">Диплом ВГМУ им. Н.Н.Бурденко 103618 0612769 от 26.06.2015 г. по специальности &quot;Педиатрия&quot;</li>\r\n	<li class=\"education__item education__item--certificate\">Сертификат специалиста 0136310064485 от 28.08.2017 г по специальности &quot;офтальмология&quot;</li>\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n\r\n<article class=\"expert experts__item\"><img alt=\"Алёшина Ольга Александровна\" class=\"expert__photo\" src=\"/img/aleshina.jpg\" />\r\n<h3 class=\"expert__name\">Алёшина Ольга Александровна</h3>\r\n\r\n<p class=\"expert__qualify\">Врач-офтальмолог</p>\r\n\r\n<p class=\"expert__year\">Врачебный стаж <span class=\"blue\">9 лет</span></p>\r\n\r\n<ul class=\"expert__list education\">\r\n	<li class=\"education__item education__item--phone\">Прием по предварительной записи по тел. <a class=\"education__link\" href=\"tel:+7(473)300-36-77\">+7(473) 300-36-77</a></li>\r\n</ul>\r\n</article>\r\n</div>\r\n</section>\r\n\r\n[%map%]\r\n', NULL, NULL, '', '', '', 1638456302, 1638869458, 1, NULL, 0, '', 1638456301);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `is_published` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `link`, `text`, `is_delete`, `created_at`, `updated_at`, `is_published`) VALUES
(1, 'Дмитрий Никонорович Мельников', 'https://ya.ru/', 'Осуществляется подбор и изготовление средств коррекции всех типов зрительных нарушений. В зависимости от сложности подбор может осуществляться как врачом-офтальмологом, так и медицинским оптиком-оптометристом.', 0, 1639182600, 1639182600, 1),
(3, 'Алевтина Павловна Непомнящая', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, nesciunt.', 0, 1638781384, 1638781384, 1),
(4, 'Серафим Петрович Маркин', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequuntur laudantium nam officia quod rem suscipit veritatis. Accusantium adipisci architecto aut consectetur consequuntur distinctio ducimus enim eum facilis laborum libero molestias nihil obcaecati, odit omnis placeat provident quae quaerat quam quasi recusandae rem, suscipit vitae. Earum et in velit voluptatibus?', 0, 1638781408, 1638781408, 1),
(5, 'Петров Николай Павлович', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At consequuntur laudantium nam officia quod rem suscipit veritatis. Accusantium adipisci architecto aut consectetur consequuntur distinctio ducimus enim eum facilis laborum libero molestias nihil obcaecati, odit omnis placeat provident quae quaerat quam quasi recusandae rem, suscipit vitae.', 0, 1638781436, 1638781436, 1),
(6, 'Сулейманов Тимур', '', 'Отличная оптика. Крутой персонал! ', 0, 1638802504, 1638802504, 1);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` int(11) NOT NULL,
  `entity_name` varchar(255) NOT NULL COMMENT 'Имя класса( без namespace )',
  `entity_id` int(11) DEFAULT 0 COMMENT 'ID сущности',
  `h1` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Таблица seo-параметров для сущностей';

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `entity_name`, `entity_id`, `h1`, `title`, `keywords`, `description`) VALUES
(1, 'Good', 1, 'Котел настенный Vaillant atmoTEC plus VUW INT 280-5 H (10003972)                                    ', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(2, 'Good', 2, 'Котел напол. atmoVIT VK INT 414/1-5 (309229) Vaillant                                               ', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(3, 'Good', 3, 'Котел напол.atmoVIT exclusiv VK INT 424/8-E (309217) Vaillant                                       ', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(4, 'Article', 18, '', '', '', ''),
(5, 'Article', 13, '', '', '', ''),
(6, 'Article', 16, '', '', '', ''),
(7, 'Article', 11, '', '', '', ''),
(8, 'Good', 61, 'Виниловая плитка Aberhof Alfa Apfel 1516', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(9, 'Good', 4, NULL, NULL, NULL, NULL),
(10, 'Good', 5, NULL, NULL, NULL, NULL),
(11, 'Good', 6, NULL, NULL, NULL, NULL),
(12, 'Good', 7, NULL, NULL, NULL, NULL),
(13, 'Good', 8, NULL, NULL, NULL, NULL),
(14, 'Good', 9, NULL, NULL, NULL, NULL),
(15, 'Good', 10, NULL, NULL, NULL, NULL),
(16, 'Good', 11, NULL, NULL, NULL, NULL),
(17, 'Good', 12, NULL, NULL, NULL, NULL),
(18, 'Good', 13, NULL, NULL, NULL, NULL),
(19, 'Good', 14, NULL, NULL, NULL, NULL),
(20, 'Good', 15, NULL, NULL, NULL, NULL),
(21, 'Good', 16, NULL, NULL, NULL, NULL),
(22, 'Good', 17, NULL, NULL, NULL, NULL),
(23, 'Good', 18, NULL, NULL, NULL, NULL),
(24, 'Good', 19, NULL, NULL, NULL, NULL),
(25, 'Good', 20, NULL, NULL, NULL, NULL),
(26, 'Good', 21, NULL, NULL, NULL, NULL),
(27, 'Good', 22, NULL, NULL, NULL, NULL),
(28, 'Good', 23, NULL, NULL, NULL, NULL),
(29, 'Good', 24, NULL, NULL, NULL, NULL),
(30, 'Good', 25, NULL, NULL, NULL, NULL),
(31, 'Good', 26, NULL, NULL, NULL, NULL),
(32, 'Good', 27, NULL, NULL, NULL, NULL),
(33, 'Good', 28, NULL, NULL, NULL, NULL),
(34, 'Good', 29, NULL, NULL, NULL, NULL),
(35, 'Good', 30, NULL, NULL, NULL, NULL),
(36, 'Good', 31, NULL, NULL, NULL, NULL),
(37, 'Good', 32, NULL, NULL, NULL, NULL),
(38, 'Good', 33, NULL, NULL, NULL, NULL),
(39, 'Good', 34, NULL, NULL, NULL, NULL),
(40, 'Good', 35, NULL, NULL, NULL, NULL),
(41, 'Good', 36, NULL, NULL, NULL, NULL),
(42, 'Good', 37, NULL, NULL, NULL, NULL),
(43, 'Good', 38, NULL, NULL, NULL, NULL),
(44, 'Good', 39, NULL, NULL, NULL, NULL),
(45, 'Good', 40, NULL, NULL, NULL, NULL),
(46, 'Good', 41, NULL, NULL, NULL, NULL),
(47, 'Good', 42, NULL, NULL, NULL, NULL),
(48, 'Good', 43, NULL, NULL, NULL, NULL),
(49, 'Good', 44, NULL, NULL, NULL, NULL),
(50, 'Good', 45, NULL, NULL, NULL, NULL),
(51, 'Good', 46, NULL, NULL, NULL, NULL),
(52, 'Good', 47, NULL, NULL, NULL, NULL),
(53, 'Good', 48, NULL, NULL, NULL, NULL),
(54, 'Good', 49, NULL, NULL, NULL, NULL),
(55, 'Good', 50, NULL, NULL, NULL, NULL),
(56, 'Good', 51, NULL, NULL, NULL, NULL),
(57, 'Good', 52, NULL, NULL, NULL, NULL),
(58, 'Good', 53, 'Виниловая плитка Aberhof Carmelita 0420', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(59, 'Good', 54, 'Виниловая плитка Aberhof Carmelita 0532', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(60, 'Good', 55, 'Виниловая плитка Aberhof Carmelita 0701', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(61, 'Good', 56, 'Виниловая плитка Aberhof Carmelita 1682', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(62, 'Good', 57, 'Виниловая плитка Aberhof Carmelita 1687', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(63, 'Good', 58, 'Виниловая плитка Aberhof Carmelita 1862', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(64, 'Good', 59, 'Виниловая плитка Aberhof Carmelita 2626', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(65, 'Good', 60, 'Виниловая плитка Aberhof Carmelita 5218', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(66, 'Good', 62, NULL, NULL, NULL, NULL),
(67, 'Good', 63, 'Виниловая плитка Aberhof Alfa Birne 206', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(68, 'Good', 64, NULL, NULL, NULL, NULL),
(69, 'Good', 65, NULL, NULL, NULL, NULL),
(70, 'Good', 66, 'Виниловая плитка Aberhof Alfa Kirsche 1686', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(71, 'Good', 67, NULL, NULL, NULL, NULL),
(72, 'Good', 68, 'Виниловая плитка Aberhof Alfa Pflaume 2000', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(73, 'Good', 69, NULL, NULL, NULL, NULL),
(74, 'Good', 70, 'Виниловая плитка Aberhof Alfa Zitrone 2631B', 'Купить {$name}', '', 'Купить {$name} по цене {$price} руб.'),
(75, 'Article', 14, '', '', '', ''),
(76, 'Article', 15, '', '', '', ''),
(77, 'Article', 1, '', '', '', ''),
(78, 'Article', 2, '', '', '', ''),
(79, 'Article', 3, '', '', '', ''),
(80, 'Article', 4, '', '', '', ''),
(81, 'Article', 5, 'H1 test article', '', '', ''),
(82, 'Article', 6, '', '', '', ''),
(83, 'Article', 7, '', '', '', ''),
(84, 'Article', 8, '', '', '', ''),
(85, 'Article', 9, '', '', '', ''),
(86, 'Article', 10, '', '', '', ''),
(87, 'Article', 12, '', '', '', ''),
(88, 'Article', 17, '', '', '', ''),
(89, 'Article', 19, '', '', '', ''),
(90, 'Article', 20, '', '', '', ''),
(91, 'Article', 21, '', '', '', ''),
(92, 'Article', 22, '', '', '', ''),
(93, 'Article', 23, '', '', '', ''),
(94, 'Article', 24, '', '', '', ''),
(95, 'Article', 25, '', '', '', ''),
(96, 'Article', 26, '', '', '', ''),
(97, 'Article', 27, '', '', '', ''),
(98, 'Article', 28, '', '', '', ''),
(99, 'Article', 29, '', '', '', ''),
(100, 'Article', 30, '', '', '', ''),
(101, 'Article', 31, '', '', '', ''),
(102, 'Article', 32, '', '', '', ''),
(103, 'Article', 33, '', '', '', ''),
(104, 'Article', 34, '', '', '', ''),
(105, 'Article', 35, '', '', '', ''),
(106, 'Article', 36, '', '', '', ''),
(107, 'Article', 37, '', '', '', ''),
(108, 'Article', 38, '', '', '', ''),
(109, 'Article', 39, '', '', '', ''),
(110, 'Article', 40, '', '', '', ''),
(111, 'Article', 41, '', '', '', ''),
(112, 'Article', 42, '', '', '', ''),
(113, 'Article', 43, '', '', '', ''),
(114, 'Article', 44, '', '', '', ''),
(115, 'Article', 45, '', '', '', ''),
(116, 'Article', 46, '', '', '', ''),
(117, 'Article', 47, '', '', '', ''),
(118, 'Category', 1, 'Фитинги', '', '', ''),
(119, 'CategoryTwo', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `seos_sections`
--

CREATE TABLE `seos_sections` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `section`, `key`, `value`, `active`, `created`, `modified`) VALUES
(23, 'string', 'Settings', 'phone', '+7 906 680 90 75', 1, '2019-08-23 14:11:32', '2021-04-09 12:56:48'),
(24, 'string', 'Settings', 'email', 'maksimum.99@mail.ru', 1, '2019-08-23 14:11:32', '2021-09-28 11:16:02'),
(25, 'string', 'Settings', 'the_text_about_the_company', '<div class=\"about__content-part about__content-part--left\">\r\n<p>&nbsp;</p>\r\n</div>\r\n', 1, '2019-08-23 14:11:32', '2021-04-08 17:40:54'),
(26, 'string', 'Settings', 'header_advantage_1', '', 1, '2019-08-23 14:11:32', '2020-10-23 10:47:28'),
(27, 'string', 'Settings', 'text_advantage_1', '', 1, '2019-08-23 14:11:32', '2020-10-23 10:47:28'),
(28, 'string', 'Settings', 'header_advantage_2', '', 1, '2019-08-23 14:11:33', '2020-10-11 15:24:31'),
(29, 'string', 'Settings', 'text_advantage_2', '', 1, '2019-08-23 14:11:33', '2020-10-11 15:24:31'),
(30, 'string', 'Settings', 'header_advantage_3', '', 1, '2019-08-23 14:11:33', '2020-10-11 15:24:31'),
(31, 'string', 'Settings', 'text_advantage_3', '', 1, '2019-08-23 14:11:33', '2020-10-11 15:24:31'),
(32, 'string', 'Settings', 'header_advantage_4', '', 1, '2019-08-23 14:11:33', '2020-10-11 15:24:31'),
(33, 'string', 'Settings', 'text_advantage_4', '', 1, '2019-08-23 14:11:33', '2020-10-11 15:24:31'),
(34, 'string', 'Settings', 'h1', 'Оптика и офтальмология<br>в Воронеже', 1, '2019-08-23 14:11:33', '2021-12-06 11:01:14'),
(35, 'string', 'Settings', 'title', 'Оптика и офтальмология в Воронеже | Умная оптика', 1, '2019-08-23 14:11:33', '2021-12-06 17:48:52'),
(36, 'string', 'Settings', 'keywords', 'Оптика, офтальмология в Воронеже, Умная оптика', 1, '2019-08-23 14:11:33', '2021-12-06 17:48:52'),
(37, 'string', 'Settings', 'description', 'Оптика и офтальмология в Воронеже. Умная оптика записаться на прием к специалистам', 1, '2019-08-23 14:11:33', '2021-12-06 17:48:52'),
(38, 'string', 'Settings', 'priceDeliveryVrn', '', 1, '2019-09-04 10:10:39', '2021-04-13 11:58:24'),
(39, 'string', 'Settings', 'minPriceTotalFreeDeliveryVrn', '', 1, '2019-09-05 09:40:44', '2021-03-29 14:24:42'),
(40, 'string', 'Settings', 'sale', '', 1, '2020-10-11 00:00:00', '2020-11-09 17:09:42'),
(41, 'string', 'Settings', 'domain', 'cleveroptic.ru', 1, NULL, '2021-12-06 17:49:54'),
(42, 'string', 'Settings', 'org_name', 'ООО \"Умная оптика\"', 1, NULL, '2021-12-06 17:49:55'),
(43, 'string', 'Settings', 'org_address', ' Воронеж, Кольцовская улица, 38', 1, '2020-10-19 00:00:00', '2021-12-06 17:49:55'),
(44, 'string', 'Settings', 'h1_under', '', 1, '2020-10-19 00:00:00', '2021-09-28 11:09:04'),
(45, 'string', 'Settings', 'the_title_of_the_text_about_the_company', '', 1, '2020-10-22 17:35:25', '2021-12-02 11:59:29'),
(46, 'string', 'Settings', 'count_on_page', '', 1, NULL, '2021-03-29 14:15:18'),
(47, 'string', 'Settings', 'socials_network', '', 1, '2021-02-05 10:35:55', NULL),
(48, 'string', 'Settings', 'delivery_cost_per_distance', '', 1, NULL, '2021-04-13 11:58:24'),
(49, 'string', 'Settings', 'work_time', 'Пн - Вс с 10:00 до 19:00', 1, '2021-04-05 18:10:02', '2021-04-09 12:56:48'),
(50, 'string', 'Settings', 'phone_one', '+ 7 (473) 300 36 77', 1, '2021-05-05 10:01:31', '2021-12-06 10:01:04'),
(51, 'string', 'Settings', 'phone_two', '', 1, '2021-05-05 10:01:31', '2021-12-02 11:59:29'),
(52, 'string', 'Settings', 'phone_three', '', 1, '2021-05-05 10:01:31', '2021-12-02 11:59:29'),
(53, 'string', 'Settings', 'the_text_about_the_company_one', '<p class=\"about__text\">Прием врача-офтальмолога для подбора сложной и индивидуальной коррекции:</p>\r\n\r\n<ul>\r\n	<li>ортокератология</li>\r\n	<li>призматическая коррекция</li>\r\n	<li>иррегулярный астигматизм (при кератоконусе, рубцах роговицы, после травм и оперативных вмешательств).</li>\r\n</ul>\r\n\r\n<p class=\"about__text\">Приём офтальмолога осуществляется по предварительной записи по тел. <a href=\"tel:+7(473)3003677\">+7 (473) 300-36-77</a></p>\r\n\r\n<p class=\"about__text\">Подбор и изготовление средств коррекции всех типов зрительных нарушений. В зависимости от сложности подбор может осуществляться как врачом-офтальмологом, так и медицинским оптиком-оптометристом.</p>\r\n\r\n<p class=\"about__text\">Подбор очков и контактных линз при миопии, гиперметропии, пресбиопии, астигматизме может осуществляться без предварительной записи, при наличии свободных специалистов.</p>\r\n', 1, '2021-05-05 10:01:31', '2021-12-06 11:01:14'),
(54, 'string', 'Settings', 'the_text_about_the_company_two', '', 1, '2021-05-05 10:01:31', '2021-09-28 11:09:03'),
(55, 'string', 'Settings', 'the_text_about_the_company_three', '', 1, '2021-05-05 10:01:32', '2021-09-28 11:09:03'),
(56, 'string', 'Settings', 'work_time_one', 'Пн - Вс с 9:00 до 18:00', 1, '2021-05-05 10:01:32', '2021-06-28 14:49:23'),
(57, 'string', 'Settings', 'work_time_two', 'Пн - Вс с 9:00 до 18:00', 1, '2021-05-05 10:01:32', '2021-07-23 15:09:24'),
(58, 'string', 'Settings', 'work_time_three', 'Пн - Вс с 9:00 до 18:00', 1, '2021-05-05 10:01:32', '2021-07-23 15:10:12'),
(59, 'string', 'Settings', 'org_address_one', 'Холмистая 68, к.1, п.250', 1, '2021-05-12 14:49:33', '2021-06-28 14:49:23'),
(60, 'string', 'Settings', 'org_address_two', 'Свердлова 39 ', 1, '2021-05-12 14:49:33', '2021-07-23 15:09:24'),
(61, 'string', 'Settings', 'org_address_three', 'Парковая 4А', 1, '2021-05-12 14:49:33', '2021-07-23 15:10:12'),
(62, 'string', 'Settings', 'smtp_username', 'no-reply@vinlam.ru', 1, '2021-05-12 14:49:33', '2021-05-12 18:46:43'),
(63, 'string', 'Settings', 'smtp_password', 'no-reply1', 1, '2021-05-12 14:49:33', '2021-05-12 18:46:43'),
(64, 'string', 'Settings', 'smtp_host', 'smtp.yandex.ru', 1, '2021-05-12 14:49:33', NULL),
(65, 'string', 'Settings', 'smtp_port', '465', 1, '2021-05-12 14:49:33', NULL),
(66, 'string', 'Settings', 'smtp_encrypt', 'ssl', 1, '2021-05-12 14:49:33', NULL),
(67, 'string', 'Settings', 'delivery_cost_one', '0', 1, '2021-05-12 16:55:35', '2021-07-23 15:10:12'),
(68, 'string', 'Settings', 'delivery_cost_two', '0', 1, '2021-05-12 16:55:35', '2021-07-23 15:10:12'),
(69, 'string', 'Settings', 'delivery_cost_three', '0', 1, '2021-05-12 16:55:35', '2021-07-23 15:10:12'),
(70, 'string', 'Settings', 'map_city_one', 'https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Accbcf44b282cefe9bfef0dcb66d57c99c01f8698fc154fb4c815764f13c4cb3b&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true', 1, '2021-05-17 09:58:04', '2021-12-02 11:59:29'),
(71, 'string', 'Settings', 'map_city_two', '', 1, '2021-05-17 09:58:04', '2021-09-28 11:09:03'),
(72, 'string', 'Settings', 'map_city_three', '', 1, '2021-05-17 09:58:04', '2021-09-28 11:09:04'),
(73, 'string', 'Settings', 'catalog_description_common', '<p>{$city} &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; {$city}</p>\r\n', 1, '2021-05-18 12:42:04', NULL),
(74, 'string', 'Settings', 'catalog_description_one', '<p>{$city} &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; {$city}</p>\r\n', 1, '2021-05-18 12:42:04', NULL),
(75, 'string', 'Settings', 'catalog_description_two', '<p>{$city} &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; {$city}</p>\r\n', 1, '2021-05-18 12:42:04', NULL),
(76, 'string', 'Settings', 'catalog_description_three', '<p>{$city} &quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot; {$city}</p>\r\n', 1, '2021-05-18 12:42:04', NULL),
(77, 'string', 'Settings', 'phone_four', '', 1, '2021-09-28 11:15:28', '2021-12-02 11:59:29'),
(78, 'string', 'Settings', 'social_one', '', 1, '2021-09-29 13:02:48', '2021-12-02 11:59:29'),
(79, 'string', 'Settings', 'social_two', '', 1, '2021-09-29 13:02:48', '2021-12-02 11:59:29'),
(80, 'string', 'Settings', 'social_three', '', 1, '2021-09-29 13:02:48', '2021-12-02 11:59:29'),
(81, 'string', 'Settings', 'social_four', '', 1, '2021-09-29 13:02:48', '2021-12-02 11:59:29'),
(82, 'string', 'Settings', 'address_place', 'г. Воронеж, ул. Кольцовская, д. 38', 1, '2021-12-02 11:59:29', NULL),
(83, 'string', 'Settings', 'yandex_score', '4.5', 1, '2021-12-06 12:18:10', NULL),
(84, 'string', 'Settings', 'yandex_link', 'https://yandex.ru/maps/org/umnaya_optika/1299503637/?ll=39.209279%2C51.676242&z=14', 1, '2021-12-06 12:18:10', '2021-12-06 17:40:36'),
(85, 'string', 'Settings', 'advantages', '<div class=\"content advantages__content\">\r\n<h2 class=\"advantages__title\">СоврЕменная офтальМология</h2>\r\n\r\n<div class=\"advantages__item\"><picture class=\"advantages__img\"> <source media=\"(min-width: 768px)\" srcset=\"/img/doc.png\" /><img alt=\"Фотография доктора\" src=\"/img/doc_mb.png\" /> </picture>\r\n\r\n<p class=\"advantages__text\">Работаем в формате &quot;ОПТИКА+&quot;, наши возможности в сферах подбора коррекции, диагностики нарушений и изготовления средств коррекции превосходят возможности обычной оптики.</p>\r\n</div>\r\n\r\n<div class=\"advantages__item\"><picture class=\"advantages__img\"> <source media=\"(min-width: 768px)\" srcset=\"/img/lenses.png\" /><img alt=\"Контактные линзы\" src=\"/img/lenses_mb.png\" /> </picture>\r\n\r\n<p class=\"advantages__text\">Подбор жестких склеральных контактных линз с использованием оптической когерентной томографии (OCT) переднего отрезка для определения оптимальных параметров линз.</p>\r\n</div>\r\n\r\n<div class=\"advantages__item\"><picture class=\"advantages__img\"> <source media=\"(min-width: 768px)\" srcset=\"/img/glass.png\" /><img alt=\"Фотография очков\" src=\"/img/glass_mb.png\" /> </picture>\r\n\r\n<p class=\"advantages__text\">Линзы для очков ведущих мировых проиpводителей: Zeiss, Rodensrock, Essilor, Hoya от официальных поставщиков, в наличии и на заказ. Также есть возможность прямого заказа любых очковых линз данных производителей.</p>\r\n</div>\r\n\r\n<div class=\"advantages__item\"><picture class=\"advantages__img\"> <source media=\"(min-width: 768px)\" srcset=\"/img/doc2.png\" /><img alt=\"Фотография доктора с рентген снимками\" src=\"/img/doc2_mb.png\" /> </picture>\r\n\r\n<p class=\"advantages__text\">Контроль миопии - подбор специализированных мягких контактных линз или ночных (ортокератологических) линз для замедления развития близорукости. Прием ведут детские врачи-офтальмологи, прошедшие специализированные курсы обучения по подбору данных видов коррекции.</p>\r\n</div>\r\n\r\n<div class=\"advantages__item\"><picture class=\"advantages__img\"> <source media=\"(min-width: 768px)\" srcset=\"/img/baloon.png\" /><img alt=\"Фотография воздушного шара\" src=\"/img/baloon_mb.png\" /> </picture>\r\n\r\n<p class=\"advantages__text\">Подбор как стандартных (серийных) очков и контактных линз, так и сложной и специальной коррекции (офисная, прогрессивная, призматическая очковая коррекция; контактные линзы для контроля миопии (с периферическим дефокусом), астигматические, мультифокальные, индивидуального изготовления)</p>\r\n</div>\r\n\r\n<div class=\"advantages__item\"><picture class=\"advantages__img\"> <source media=\"(min-width: 768px)\" srcset=\"/img/girl.png\" /><img alt=\"Фотография девушки в очках\" src=\"/img/girl_mb.png\" /> </picture>\r\n\r\n<p class=\"advantages__text\">Подбор и изготовление очков и контактных линз для спортивных занятий: цветофильтры, ортокератология, изготовление спортивных очков и оправ, а также очки для плавания с диоптриями.</p>\r\n</div>\r\n</div>\r\n', 1, '2021-12-06 17:12:25', '2021-12-06 17:17:09'),
(86, 'string', 'Settings', 'services', '', 1, '2021-12-06 17:29:10', '2021-12-06 17:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `class`, `visibility`) VALUES
(4, '<p class=\"open-banner__title\">Скидки по промокоду <span class=\"green\">&quot;С открытием!&quot;</span></p>\r\n\r\n<div class=\"open-banner__content sales\">\r\n<div class=\"sales__item\">\r\n<p class=\"sales__title\">На медицинские услуги</p>\r\n\r\n<p class=\"sales__percent\">30%</p>\r\n</div>\r\n\r\n<div class=\"sales__item\">\r\n<p class=\"sales__title\">На услуги по изготовлению очков</p>\r\n\r\n<p class=\"sales__percent\">20%</p>\r\n</div>\r\n\r\n<div class=\"sales__item\">\r\n<p class=\"sales__title\">На услуги по изготовлению оправ</p>\r\n\r\n<p class=\"sales__percent\">20%</p>\r\n</div>\r\n\r\n<p class=\"sales__date\">До <time>01.01.2022</time> г.</p>\r\n</div>\r\n', 'banner__slide open-banner', 1),
(8, '<p class=\"open-banner__caption\">Инновационное оборудование</p>\r\n				<p class=\"open-banner__title\">Корнеотопограф<br>medmnt e300</p>\r\n				<p class=\"open-banner__text\">Многофункциональное устройство для здоровья глаз</p>\r\n				<p class=\"open-banner__slogan\">Когда точность имеет значение!</p>', 'open-banner open-banner--topo', 1),
(9, '<p class=\"open-banner__caption\">Инновационное оборудование</p>\r\n				<p class=\"open-banner__title\">когерентный томограф<br>3D OCT 2000</p>\r\n				<p class=\"open-banner__slogan\">Сокращаем время проведения процедуры!</p>', 'open-banner open-banner--tomo', 1),
(10, '				<p class=\"open-banner__title\"><span>Бесплатный</span><br>подбор линз</p>\r\n				<p class=\"open-banner__text\">Для контроля миопии</p>\r\n				<p class=\"open-banner__slogan\">COOPER VISION MISIGHT</p>', ' open-banner open-banner--lens', 1);

-- --------------------------------------------------------

--
-- Table structure for table `specialists`
--

CREATE TABLE `specialists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialists`
--

INSERT INTO `specialists` (`id`, `name`, `position`, `work_date`, `description`, `visibility`) VALUES
(1, 'Петров Николай Фёдорович', 'Врач - офтальмолог', '10 лет', '<p>Описание</p>\r\n', 1),
(2, 'Иванов Семён Семёнович', 'Врач - офтальмолог, к.м.н', '1 год', '<p>Описание</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `text` varchar(255) NOT NULL,
  `new` varchar(150) DEFAULT NULL,
  `newint` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `text`, `new`, `newint`) VALUES
(1, '', 'FV-Plast                 ', 0),
(2, '', 'FV-Plast                 ', 0),
(3, '', 'FV-Plast                 ', 0),
(4, '', '                         ', 0),
(5, '', 'POLYTRON                 ', 48),
(6, '', 'POLYTRON                 ', 26),
(7, '', 'Itap                     ', 0),
(8, '', 'POLYTRON                 ', 40),
(9, '', 'POLYTRON                 ', 121),
(10, '', 'No name                  ', 5),
(11, '', 'FV-Plast                 ', 17),
(12, '', 'FV-Plast                 ', 2),
(13, '', 'FV-Plast                 ', 2),
(14, '', 'FV-Plast                 ', 48),
(15, '', 'FV-Plast                 ', 0),
(16, '', 'FV-Plast                 ', 0),
(17, '', 'FV-Plast                 ', 11),
(18, '', 'POLYTRON                 ', 88),
(19, '', 'POLYTRON                 ', 28),
(20, '', 'FV-Plast                 ', 10),
(21, '', 'FV-Plast                 ', 0),
(22, '', 'FV-Plast                 ', 27),
(23, '', 'FV-Plast                 ', 43),
(24, '', 'FV-Plast                 ', 56),
(25, '', 'PRO AQUA                 ', 33),
(26, '', 'PRO AQUA                 ', 43),
(27, '', 'PRO AQUA                 ', 18),
(28, '', 'PRO AQUA                 ', 21),
(29, '', 'PRO AQUA                 ', 26),
(30, '', 'PRO AQUA                 ', 6),
(31, '', 'FV-Plast                 ', 134),
(32, '', 'FV-Plast                 ', 136),
(33, '', 'FV-Plast                 ', 65),
(34, '', 'FV-Plast                 ', 26),
(35, '', 'FV-Plast                 ', 50),
(36, '', 'FV-Plast                 ', 44),
(37, '', 'FV-Plast                 ', 71),
(38, '', 'FV-Plast                 ', 291),
(39, '', 'FV-Plast                 ', 36),
(40, '', 'FV-Plast                 ', 29),
(41, '', 'FV-Plast                 ', 0),
(42, '', 'Itap                     ', 2),
(43, '', 'Itap                     ', 25),
(44, '', 'Itap                     ', 2),
(45, '', 'FV-Plast                 ', 59),
(46, '', 'FV-Plast                 ', 2),
(47, '', 'FV-Plast                 ', 5),
(48, '', 'POLYTRON                 ', 23),
(49, '', 'POLYTRON                 ', 40),
(50, '', 'POLYTRON                 ', 158),
(51, '', 'POLYTRON                 ', 100),
(52, '', 'POLYTRON                 ', 18),
(53, '', 'POLYTRON                 ', 156),
(54, '', 'POLYTRON                 ', 105),
(55, '', 'POLYTRON                 ', 147),
(56, '', 'POLYTRON                 ', 47),
(57, '', 'POLYTRON                 ', 15),
(58, '', 'ALTStream                ', 22),
(59, '', 'FV-Plast                 ', 38),
(60, '', 'FV-Plast                 ', 21),
(61, '', 'FV-Plast                 ', 18),
(62, '', 'FV-Plast                 ', 12),
(63, '', 'No name                  ', 20),
(64, '', 'FV-Plast                 ', 26),
(65, '', 'No name                  ', 34),
(66, '', 'POLYTRON                 ', 24),
(67, '', 'POLYTRON                 ', 25),
(68, '', 'FV-Plast                 ', 13),
(69, '', 'FV-Plast                 ', 40),
(70, '', 'FV-Plast                 ', 73),
(71, '', 'FV-Plast                 ', 14),
(72, '', 'FV-Plast                 ', 53),
(73, '', 'FV-Plast                 ', 26),
(74, '', 'FV-Plast                 ', 3),
(75, '', 'FV-Plast                 ', 6),
(76, '', 'POLYTRON                 ', 80),
(77, '', 'POLYTRON                 ', 81),
(78, '', 'POLYTRON                 ', 68),
(79, '', 'POLYTRON                 ', 77),
(80, '', 'POLYTRON                 ', 66),
(81, '', 'POLYTRON                 ', 80),
(82, '', 'FV-Plast                 ', 4),
(83, '', 'FV-Plast                 ', 17),
(84, '', 'FV-Plast                 ', 53),
(85, '', 'FV-Plast                 ', 10),
(86, '', 'FV-Plast                 ', 12),
(87, '', 'FV-Plast                 ', 10),
(88, '', 'FV-Plast                 ', 204),
(89, '', 'FV-Plast                 ', 0),
(90, '', 'FV-Plast                 ', 0),
(91, '', 'FV-Plast                 ', 7),
(92, '', 'FV-Plast                 ', 50),
(93, '', 'FV-Plast                 ', 53),
(94, '', 'FV-Plast                 ', 141),
(95, '', 'FV-Plast                 ', 25),
(96, '', 'FV-Plast                 ', 91),
(97, '', 'POLYTRON                 ', 25),
(98, '', 'POLYTRON                 ', 14),
(99, '', 'POLYTRON                 ', 28),
(100, '', 'POLYTRON                 ', 0),
(101, '', 'POLYTRON                 ', 0),
(102, '', 'POLYTRON                 ', 9),
(103, '', 'POLYTRON                 ', 17),
(104, '', 'POLYTRON                 ', 3),
(105, '', 'POLYTRON                 ', 37),
(106, '', 'POLYTRON                 ', 75),
(107, '', 'POLYTRON                 ', 52),
(108, '', 'POLYTRON                 ', 33),
(109, '', 'POLYTRON                 ', 51),
(110, '', 'POLYTRON                 ', 46),
(111, '', 'FV-Plast                 ', 1),
(112, '', 'FV-Plast                 ', 1),
(113, '', 'FV-Plast                 ', 0),
(114, '', 'FV-Plast                 ', 26),
(115, '', 'FV-Plast                 ', 235),
(116, '', 'FV-Plast                 ', 160),
(117, '', 'FV-Plast                 ', 138),
(118, '', 'FV-Plast                 ', 47),
(119, '', 'FV-Plast                 ', 301),
(120, '', 'FV-Plast                 ', 150),
(121, '', 'FV-Plast                 ', 101),
(122, '', 'FV-Plast                 ', 22),
(123, '', 'FV-Plast                 ', 0),
(124, '', 'FV-Plast                 ', 0),
(125, '', 'FV-Plast                 ', 51),
(126, '', 'FV-Plast                 ', 11),
(127, '', 'FV-Plast                 ', 3),
(128, '', 'FV-Plast                 ', 11),
(129, '', 'FV-Plast                 ', 29),
(130, '', 'FV-Plast                 ', 33),
(131, '', 'FV-Plast                 ', 24),
(132, '', 'FV-Plast                 ', 20),
(133, '', 'Itap                     ', 13),
(134, '', 'Itap                     ', 41),
(135, '', 'Itap                     ', 45),
(136, '', 'FV-Plast                 ', 11),
(137, '', 'FV-Plast                 ', 14),
(138, '', 'FV-Plast                 ', 0),
(139, '', 'FV-Plast                 ', 3),
(140, '', 'ALTStream                ', 23),
(141, '', 'ALTStream                ', 5),
(142, '', 'ALTStream                ', 3),
(143, '', 'ALTStream                ', 5),
(144, '', 'ALTStream                ', 21),
(145, '', 'ALTStream                ', 9),
(146, '', 'ALTStream                ', 4),
(147, '', 'ALTStream                ', 0),
(148, '', 'ALTStream                ', 0),
(149, '', 'ALTStream                ', 6),
(150, '', 'ALTStream                ', 15),
(151, '', 'ALTStream                ', 10),
(152, '', 'ALTStream                ', 14),
(153, '', 'ALTStream                ', 2),
(154, '', 'ALTStream                ', 1),
(155, '', 'ALTStream                ', 2),
(156, '', 'ALTStream                ', 17),
(157, '', 'ALTStream                ', 0),
(158, '', 'ALTStream                ', 4),
(159, '', 'ALTStream                ', 3),
(160, '', 'ALTStream                ', 1),
(161, '', 'ALTStream                ', 5),
(162, '', 'ALTStream                ', 15),
(163, '', 'ALTStream                ', 0),
(164, '', 'ALTStream                ', 30),
(165, '', '                         ', 0),
(166, '', 'ALTStream                ', 24),
(167, '', 'ALTStream                ', 16),
(168, '', 'ALTStream                ', 1),
(169, '', 'ALTStream                ', 58),
(170, '', 'ALTStream                ', 19),
(171, '', 'ALTStream                ', 3),
(172, '', 'ALTStream                ', 7),
(173, '', 'ALTStream                ', 6),
(174, '', 'ALTStream                ', 1),
(175, '', 'ALTStream                ', 44),
(176, '', 'ALTStream                ', 6),
(177, '', 'ALTStream                ', 10),
(178, '', 'ALTStream                ', 12),
(179, '', 'ALTStream                ', 2),
(180, '', 'ALTStream                ', 6),
(181, '', 'ALTStream                ', 0),
(182, '', 'ALTStream                ', 0),
(183, '', 'FV-Plast                 ', 59),
(184, '', 'FV-Plast                 ', 6),
(185, '', 'FV-Plast                 ', 2),
(186, '', 'FV-Plast                 ', 0),
(187, '', 'FV-Plast                 ', 24),
(188, '', 'FV-Plast                 ', 21),
(189, '', 'FV-Plast                 ', 73),
(190, '', 'FV-Plast                 ', 29),
(191, '', 'FV-Plast                 ', 45),
(192, '', 'Itap                     ', 6),
(193, '', 'Luxor                    ', 35),
(194, '', 'Luxor                    ', 14),
(195, '', 'TIEMME                   ', 0),
(196, '', 'ALTStream                ', 103),
(197, '', 'GLOBAL                   ', 0),
(198, '', 'No name                  ', 14),
(199, '', 'No name                  ', 0),
(200, '', 'Luxor                    ', 10),
(201, '', 'FV-Plast                 ', 7),
(202, '', 'Luxor                    ', 16),
(203, '', 'Luxor                    ', 0),
(204, '', 'FV-Plast                 ', 24),
(205, '', 'Candan                   ', 1),
(206, '', '                         ', 0),
(207, '', '                         ', 0),
(208, '', '                         ', 0),
(209, '', '                         ', 0),
(210, '', 'No name                  ', 48),
(211, '', 'ALTStream                ', 227),
(212, '', 'ALTStream                ', 29),
(213, '', 'ALTStream                ', 60),
(214, '', 'ALTStream                ', 261),
(215, '', 'ALTStream                ', 82),
(216, '', 'ALTStream                ', 126),
(217, '', 'ALTStream                ', 188),
(218, '', 'ALTStream                ', 88),
(219, '', 'POLYTRON                 ', 11),
(220, '', 'POLYTRON                 ', 19),
(221, '', '', 146),
(222, '', '', 186),
(223, '', '', 56),
(224, '', '', 62),
(225, '', 'POLYTRON                 ', 0),
(226, '', 'No name                  ', 63),
(227, '', 'No name                  ', 55),
(228, '', 'PRO AQUA                 ', 16),
(229, '', 'FV-Plast                 ', 52),
(230, '', 'FV-Plast                 ', 4),
(231, '', 'FV-Plast                 ', 0),
(232, '', 'FV-Plast                 ', 7),
(233, '', 'FV-Plast                 ', 0),
(234, '', 'FV-Plast                 ', 4),
(235, '', 'FV-Plast                 ', 9),
(236, '', 'FV-Plast                 ', 0),
(237, '', 'Luxor                    ', 28),
(238, '', 'POLYTRON                 ', 11),
(239, '', 'ALTStream                ', 114),
(240, '', 'POLYTRON                 ', 44),
(241, '', 'No name                  ', 0),
(242, '', 'No name                  ', 0),
(243, '', 'No name                  ', 0),
(244, '', 'No name                  ', 0),
(245, '', 'No name                  ', 0),
(246, '', 'No name                  ', 0),
(247, '', 'No name                  ', 1015),
(248, '', 'FV-Plast                 ', 5),
(249, '', 'Luxor                    ', 1),
(250, '', 'FV-Plast                 ', 61),
(251, '', 'POLYTRON                 ', 0),
(252, '', 'PRO AQUA                 ', 6),
(253, '', 'ALTStream                ', 16),
(254, '', 'ALTStream                ', 17),
(255, '', 'ALTStream                ', 20),
(256, '', 'ALTStream                ', 16),
(257, '', 'Grundfos                 ', 1),
(258, '', 'No name                  ', 0),
(259, '', 'FV-Plast                 ', 5),
(260, '', 'FV-Plast                 ', 5),
(261, '', 'FV-Plast                 ', 10),
(262, '', 'FV-Plast                 ', 2),
(263, '', 'FV-Plast                 ', 3),
(264, '', 'FV-Plast                 ', 7),
(265, '', 'FV-Plast                 ', 1),
(266, '', 'ALTStream                ', 7),
(267, '', 'FV-Plast                 ', 8),
(268, '', 'POLYTRON                 ', 20),
(269, '', 'No name                  ', 19),
(270, '', 'DAB                      ', 4),
(271, '', 'DAB                      ', 2),
(272, '', 'No name                  ', 14),
(273, '', 'FV-Plast                 ', 0),
(274, '', 'Grundfos                 ', 3),
(275, '', 'Grundfos                 ', 2),
(276, '', 'No name                  ', 1238),
(277, '', 'POLYTRON                 ', 40),
(278, '', 'POLYTRON                 ', 43),
(279, '', 'POLYTRON                 ', 22),
(280, '', 'ALTStream                ', 22),
(281, '', 'ALTStream                ', 82),
(282, '', 'ALTStream                ', 175),
(283, '', 'No name                  ', 14),
(284, '', '                         ', 0),
(285, '', 'ALTStream                ', 266),
(286, '', 'ALTStream                ', 111),
(287, '', 'ALTStream                ', 13),
(288, '', 'ALTStream                ', 7),
(289, '', 'ALTStream                ', 2),
(290, '', 'Icma                     ', 82),
(291, '', 'Vaillant                 ', 0),
(292, '', 'Grundfos                 ', 0),
(293, '', 'No name                  ', 0),
(294, '', 'Luxor                    ', 24),
(295, '', '                         ', 0),
(296, '', 'ALTStream                ', 43),
(297, '', 'ALTStream                ', 2),
(298, '', 'PRO AQUA                 ', 5),
(299, '', 'FV-Plast                 ', 10),
(300, '', 'FV-Plast                 ', 59),
(301, '', 'ALTStream                ', 6),
(302, '', 'No name                  ', 13),
(303, '', 'ALTStream                ', 77),
(304, '', 'Vaillant                 ', 0),
(305, '', 'Luxor                    ', 35),
(306, '', 'Luxor                    ', 39),
(307, '', 'FV-Plast                 ', 2),
(308, '', 'ALTStream                ', 145),
(309, '', 'ALTStream                ', 135),
(310, '', 'ALTStream                ', 40),
(311, '', 'ALTStream                ', 39),
(312, '', 'ALTStream                ', 34),
(313, '', 'ALTStream                ', 102),
(314, '', 'ALTStream                ', 53),
(315, '', 'POLYTRON                 ', 7),
(316, '', 'POLYTRON                 ', 12),
(317, '', 'GLOBAL                   ', 0),
(318, '', 'Vaillant                 ', 0),
(319, '', 'Aquatechnica             ', 7),
(320, '', 'Dytron                   ', 1),
(321, '', 'KITLINE                  ', 0),
(322, '', 'ALTStream                ', 134),
(323, '', 'No name                  ', 29),
(324, '', 'Protherm                 ', 1),
(325, '', '', 476),
(326, '', 'Itap                     ', 2),
(327, '', 'FV-Plast                 ', 3),
(328, '', 'ALTStream                ', 17),
(329, '', 'FV-Plast                 ', 13),
(330, '', 'FV-Plast                 ', 3),
(331, '', 'FV-Plast                 ', 8),
(332, '', 'FV-Plast                 ', 0),
(333, '', 'Dytron                   ', 0),
(334, '', '                         ', 0),
(335, '', '', 0),
(336, '', 'ALTStream                ', 23),
(337, '', 'ALTStream                ', 58),
(338, '', 'No name                  ', 0),
(339, '', 'FV-Plast                 ', 0),
(340, '', 'Vaillant                 ', 0),
(341, '', 'No name                  ', 115),
(342, '', 'No name                  ', 0),
(343, '', 'ALTStream                ', 5),
(344, '', 'ALTStream                ', 8),
(345, '', 'FV-Plast                 ', 1),
(346, '', 'Itap                     ', 3),
(347, '', 'POLYTRON                 ', 48),
(348, '', 'Wester                   ', 1),
(349, '', 'Aquatechnica             ', 0),
(350, '', '                         ', 0),
(351, '', '                         ', 0),
(352, '', 'Aquatechnica             ', 4),
(353, '', 'ALTStream                ', 3),
(354, '', 'ALTStream                ', 148),
(355, '', 'POLYTRON                 ', 20),
(356, '', 'POLYTRON                 ', 20),
(357, '', 'POLYTRON                 ', 16),
(358, '', 'POLYTRON                 ', 18),
(359, '', 'POLYTRON                 ', 10),
(360, '', 'POLYTRON                 ', 15),
(361, '', 'POLYTRON                 ', 18),
(362, '', 'PO-EL SAN                ', 0),
(363, '', 'No name                  ', 0),
(364, '', 'No name                  ', 15),
(365, '', 'No name                  ', 18),
(366, '', 'No name                  ', 8),
(367, '', 'No name                  ', 35),
(368, '', 'No name                  ', 31),
(369, '', 'No name                  ', 20),
(370, '', 'No name                  ', 33),
(371, '', 'No name                  ', 35),
(372, '', 'No name                  ', 33),
(373, '', 'No name                  ', 49),
(374, '', 'No name                  ', 24),
(375, '', 'No name                  ', 37),
(376, '', 'No name                  ', 0),
(377, '', 'No name                  ', 160),
(378, '', 'No name                  ', 7),
(379, '', 'No name                  ', 14),
(380, '', 'No name                  ', 25),
(381, '', 'No name                  ', 6),
(382, '', 'Itap                     ', 5),
(383, '', 'Itap                     ', 0),
(384, '', 'Grundfos                 ', 0),
(385, '', 'Grundfos                 ', 0),
(386, '', 'Grundfos                 ', 0),
(387, '', 'Aquatechnica             ', 14),
(388, '', 'OLDRATI                  ', 0),
(389, '', 'No name                  ', 34),
(390, '', 'POLYTRON                 ', 14),
(391, '', 'No name                  ', 0),
(392, '', 'Aquatechnica             ', 5),
(393, '', 'No name                  ', 0),
(394, '', 'Grundfos                 ', 0),
(395, '', 'KITLINE                  ', 0),
(396, '', 'KITLINE                  ', 0),
(397, '', 'POLYTRON                 ', 24),
(398, '', 'Itap                     ', 1),
(399, '', 'No name                  ', 0),
(400, '', 'No name                  ', 0),
(401, '', 'Unitherm                 ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favorit` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` int(11) UNSIGNED DEFAULT NULL,
  `shop_id` int(11) UNSIGNED DEFAULT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `chat_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `offset_goods` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `name`, `verification_token`, `favorit`, `city`, `shop_id`, `token`, `chat_id`, `offset_goods`) VALUES
(1, 'superuser', 'qKraC0ZRW1GYH7WtaJn7qEnUAvK2l-QS', '$2y$13$JrvmgbUAQJYFweop/Ij9WOBuP/fxIDnaDP9WU5.5w4QoxHx8/9iOy', NULL, 'superuser@bk.ru', 10, 1601293859, 1602580832, 'Админ Intrid', 'Q_WrGE67-KQ8EVAt2H7vEAV7iIcVTQgS_1555867864', NULL, NULL, NULL, NULL, NULL, 0),
(11, 'program@intrid.ru', 'gSTHWqF6BtxPis3kvjfqNH24GAiumSkI', '$2y$13$R7bvSBikwvK5QFiva/So3e8PKmT69qoJSDNnvwZ49rf1UOQHIhFr2', 'MInvnNig75MW1xPrb_2RFn7hOaoI2Asd_1605172813', 'program@intrid.ru', 10, 1603915721, 1605172813, NULL, 'PlM_QdtKfkuiPgORgft44pRjWc6Va5Iy_1603915721', NULL, NULL, NULL, NULL, NULL, 0),
(12, 'admin', 'Bamz1YbUWjyRLSogu3j62Vuaj62T_wLd', '$2y$13$ZsaCSfPN6wHpedQ9h2Md2.E3YYAlEjzBq.a5ntoG.rrxPTsZ869VC', NULL, 'laminator36@mail.ru', 10, 1603961241, 1624872008, 'admin', NULL, NULL, NULL, NULL, NULL, NULL, 0),
(49, 'maksimum.99@mail.ru', 'fif_cXYKlmA0gJDriLqbGdVldBtG3R_t', '$2y$13$whoHApXZV3J6/aIwl4xmtuKYxHwWjcKT1RdAfg.cyDagulmiUL.n.', 'ffPBuO_9EDLMe8aMfLoHclLhJ39F5M-D_1638279513', 'maksimum.99@mail.ru', 5, 1620917609, 1638279513, NULL, NULL, NULL, NULL, NULL, '49123', '302573586', 0),
(51, 'zernova@mail.ru', '26oUUO8lm4KeGzZMb1RPmUYdFmW06ClD', '$2y$13$yMmzwkF8s5G3GUd74vbiouq.7kxTcmetzGszduTyLf8COUyxPPpD6', NULL, 'zernova@mail.ru', 5, 1626705966, 1626964223, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(52, 'mail@intrid.ru', '49zaRajeO0peRCtNTrQ4Dy4Xvn__BVDB', '$2y$13$f5szvy7PLCDhgASq3.Sa2uXHF/3Bnh2R0JNo05J1Ar43uyqtiqWWu', NULL, 'mail@intrid.ru', 5, 1626706493, 1626706493, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(53, 'qweqwemum.99@mail.ru', 'XAVoBp08xMQ1soKYfe3yqR9huxmYTOaN', '$2y$13$n0Yq01x2bwQt9.Xt1Dn9KOrlfcq./OC/Wlg5KRe0Cd/JgI1D5Rjci', NULL, 'qweqwemum.99@mail.ru', 5, 1637674536, 1637674536, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(54, 'ryazancev.e@gmail.com', 'MhZOJyR8vl3OUTg8Oid7Pbuuu53k2IEa', '$2y$13$q6Uxa3d3wPLUzTORdCF3zOcjmxMD8bylybIHanVD.VVin9hU7XEI2', NULL, 'ryazancev.e@gmail.com', 5, 1637674603, 1637674603, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_fio` varchar(254) DEFAULT NULL,
  `organization` varchar(254) DEFAULT NULL,
  `address` varchar(254) DEFAULT NULL,
  `type_user` int(11) DEFAULT NULL COMMENT '1 - покупатель',
  `phone` varchar(254) DEFAULT NULL,
  `subscribe` varchar(254) DEFAULT NULL,
  `unsubscribe` varchar(254) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `is_delete` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `user_id`, `user_fio`, `organization`, `address`, `type_user`, `phone`, `subscribe`, `unsubscribe`, `email`, `is_delete`) VALUES
(1, 49, 'Test', NULL, NULL, 1, '+7   333-333-33-33', NULL, NULL, 'maksimum.99@mail.ru', 0),
(2, 51, 'алина', NULL, NULL, 1, '+7   891-074-98-98', NULL, NULL, 'zernova@mail.ru', 0),
(3, 52, 'Тимур ', NULL, NULL, 1, '+7   961-181-37-37', NULL, NULL, 'mail@intrid.ru', 0),
(4, 53, 'Иванов Иван Иванович', NULL, NULL, 1, '+7 122 111-11-11', NULL, NULL, 'qweqwemum.99@mail.ru', 0),
(5, 54, 'тест тестович', NULL, NULL, 1, '+7 892 051-41-24', NULL, NULL, 'ryazancev.e@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `warning`
--

CREATE TABLE `warning` (
  `id` int(11) NOT NULL,
  `warning` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Bitcoin_Address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `warning`
--

INSERT INTO `warning` (`id`, `warning`, `Bitcoin_Address`, `Email`) VALUES
(1, 'To recover your lost Database and avoid leaking it: Send us 0.08 Bitcoin (BTC) to our Bitcoin address 1Mo24VYuZfZrDHw7GaGr8B6iZTMe8JbWw8 and contact us by Email with your Server IP or Domain name and a Proof of Payment. If you are unsure if we have your data, contact us and we will send you a proof. Your Database is downloaded and backed up on our servers. Backups that we have right now: test, mir . If we dont receive your payment in the next 10 Days, we will make your database public or use them otherwise.', '1Mo24VYuZfZrDHw7GaGr8B6iZTMe8JbWw8', 'help@sqldb.to');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_executed_id` (`executed`),
  ADD KEY `ix_order_status` (`order_status`),
  ADD KEY `ix_executed_at` (`executed_at`);

--
-- Indexes for table `order_goods`
--
ALTER TABLE `order_goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ix_good_price_id` (`good_pricelist_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ix_unique_entity_name_entity_id` (`entity_name`,`entity_id`),
  ADD KEY `ix_entity_name` (`entity_name`),
  ADD KEY `ix_entity_id` (`entity_id`);

--
-- Indexes for table `seos_sections`
--
ALTER TABLE `seos_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_unique_key_section` (`section`,`key`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialists`
--
ALTER TABLE `specialists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning`
--
ALTER TABLE `warning`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_goods`
--
ALTER TABLE `order_goods`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `seos_sections`
--
ALTER TABLE `seos_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `specialists`
--
ALTER TABLE `specialists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=402;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
