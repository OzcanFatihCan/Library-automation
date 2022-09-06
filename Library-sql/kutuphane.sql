-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Ağu 2022, 23:29:41
-- Sunucu sürümü: 10.4.24-MariaDB
-- PHP Sürümü: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `actions`
--

CREATE TABLE `actions` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kitap_id` bigint(20) UNSIGNED NOT NULL,
  `k_verilis_tarih` date NOT NULL,
  `k_teslim_tarih` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `actions`
--

INSERT INTO `actions` (`id`, `user_id`, `kitap_id`, `k_verilis_tarih`, `k_teslim_tarih`, `created_at`, `updated_at`) VALUES
(6, 10, 38, '2022-08-15', '2022-08-30', '2022-08-15 09:10:04', '2022-08-15 09:10:04'),
(7, 8, 40, '2022-08-15', '2022-08-26', '2022-08-15 09:10:22', '2022-08-15 09:10:22'),
(8, 4, 42, '2022-08-12', '2022-08-24', '2022-08-15 09:16:05', '2022-08-15 09:16:05'),
(9, 5, 47, '2022-08-17', '2022-09-01', '2022-08-17 03:47:42', '2022-08-17 03:47:42'),
(10, 4, 54, '2022-08-03', '2022-08-25', '2022-08-23 10:17:15', '2022-08-23 10:17:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kitap_adi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `yayinevi_id` int(11) NOT NULL,
  `basim_yili` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `books`
--

INSERT INTO `books` (`id`, `kitap_adi`, `image`, `kategori_id`, `yayinevi_id`, `basim_yili`, `created_at`, `updated_at`) VALUES
(37, '1984', 'public/product_img/yVcQxn3FUvt2Orx9O8oPBimMHKszHgKKl1KMvqF7.jpg', 7, 6, '2022-08-03', '2022-08-15 08:47:59', '2022-08-17 09:38:27'),
(38, 'Hayvan Mezarlığı', 'public/product_img/QIwZvb2Y2xqzgw9fuC8Nu2M8XaxY2DmFYnR6eqzj.jpg', 13, 3, '2022-08-11', '2022-08-15 08:59:15', '2022-08-17 09:35:34'),
(39, 'Dokuz dünya devi', 'public/product_img/k18QtjzZRYa8qDNYHPXUTRdzSakm3HvobeADHXnU.jpg', 4, 4, '2022-08-26', '2022-08-15 09:05:00', '2022-08-18 10:29:11'),
(40, 'Veronika ölmek istiyor', 'public/product_img/VV41XFLyT5E4R3D2lohdGL8wpxL6QzBaFqZgtA0s.jpg', 7, 6, '2020-02-18', '2022-08-15 09:06:15', '2022-08-18 09:43:13'),
(41, 'Araba Sevdası', 'public/product_img/5fp9ZixQ7Q0kyaWpQCX5tEVHbV9WEXF6FNmKM61x.jpg', 14, 6, '2015-10-17', '2022-08-15 09:09:18', '2022-08-17 09:41:25'),
(42, 'Timurlenk', 'public/product_img/QqZ3ILsVE31XEa84Gu7wv8VQqXYrAGRzGDWNyGiQ.jpg', 6, 4, '2021-06-18', '2022-08-15 09:11:47', '2022-08-18 10:14:50'),
(43, 'Witcher son dilek', 'public/product_img/MChOtOiKNjSRBBmrkARnANME5wkqVhgTtiyDybjX.jpg', 9, 5, '2017-06-19', '2022-08-15 09:15:29', '2022-08-19 07:52:10'),
(44, 'Sherlock Holmes', 'public/product_img/JN76yxuL7DjwnKGfdi6Z6L3ykIZHWzJeKWaxaVaO.jpg', 1, 18, '2021-06-18', '2022-08-15 09:17:51', '2022-08-18 10:16:51'),
(45, 'İnsanlığımı Yitirirken', 'public/product_img/19i7sPqSgFdu8TtxPtFIZpr2fz4iHpvNpAcHCqdo.jpg', 19, 17, '2022-08-10', '2022-08-16 07:45:58', '2022-08-18 07:38:20'),
(46, 'Şeytanın Çırağı', 'public/product_img/gV2BCYYnsjKmn5oxYZxQ07Lm7AXxovBP2uNJC5p2.jpg', 19, 17, '2019-06-18', '2022-08-16 07:48:48', '2022-08-18 10:25:12'),
(47, 'Sevme Sanatı', 'public/product_img/gCXRgNq6luQjC5fnVNjFaUV29BpKp0GhzeOLTsc7.jpg', 14, 18, '2020-10-17', '2022-08-16 07:50:43', '2022-08-17 09:50:48'),
(51, 'Da Vinci Şifresi', 'public/product_img/uTCNFbcJD1f4WECy4xlePBK8qexTJn9H58XxGXdZ.jpg', 19, 3, '2019-01-17', '2022-08-17 10:16:29', '2022-08-17 10:17:08'),
(52, 'Bir Ömür Nasıl Yaşanır?', 'public/product_img/nkCT3tyJCbwaEtaU33NUgrgGek61284E7TRditdV.jpg', 10, 4, '2020-06-22', '2022-08-17 10:22:38', '2022-08-22 03:18:06'),
(53, 'Mutlu Olma İhtimalimiz', 'public/product_img/5RrWupc7MxJ4AdHVMjSaIALm48gjE7eumKFQ8q6k.jpg', 10, 19, '2013-02-22', '2022-08-22 03:10:32', '2022-08-22 03:10:32'),
(54, 'Witcher Kader Kılıcı', 'public/product_img/A67yz3VXd1iHfDxRgVeePNfaNaV8QFHtKM4TB0bY.jpg', 9, 5, '2018-05-22', '2022-08-22 03:17:28', '2022-08-22 03:17:28'),
(55, 'Witcher Elflerin Kanı', 'public/product_img/dRgoNVbKDJOTp4uOb3kQheDnpKYXBBjRVzXvndR1.jpg', 9, 5, '2022-10-22', '2022-08-22 03:20:38', '2022-08-22 03:20:38'),
(56, 'Okçu\'nun Yolu', 'public/product_img/WBT2TkCYW1p607sCBZ1Z7GuRd45JVRNxn4CNMwnF.jpg', 14, 6, '2018-06-23', '2022-08-23 07:28:34', '2022-08-23 07:28:34'),
(57, 'Dinleme Sanatı', 'public/product_img/YfViiF80CbN2CpyysbhRaZxPOzs4rN3buylss04D.jpg', 10, 18, '2019-05-23', '2022-08-23 09:06:15', '2022-08-23 09:06:15'),
(58, 'Zaman Kaybolmaz', 'public/product_img/XkfjlO4AtBRrOMfKZ4yLB3UFPBYb9u4RwKmutIPR.jpg', 6, 4, '2019-02-24', '2022-08-24 16:38:31', '2022-08-24 16:38:31'),
(59, 'Türklerin Altın Çağı', 'public/product_img/G7jiEQyydJte6x6qcPgwz6W4UWsAvf4JrVK8EqvC.jpg', 6, 4, '2019-02-24', '2022-08-24 16:51:17', '2022-08-24 16:51:17'),
(60, 'İnsan Geleceğini Nasıl Kurar?', 'public/product_img/CiwGaIXpRmsCPFqBOaZFIMhM1zoDFmd7cbC6Tgrs.jpg', 10, 4, '2020-03-24', '2022-08-24 16:51:58', '2022-08-24 16:51:58'),
(61, 'Türklerin Büyükleri', 'public/product_img/qr9JgV7rfEPpx6UQvR6W0wMHP7oHUQgF8O2clb8X.jpg', 6, 4, '2017-02-24', '2022-08-24 16:52:24', '2022-08-24 16:52:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Polisiye', '2022-07-27 10:23:14', '2022-07-27 10:23:14'),
(2, 'Bilim Kurgu', '2022-08-02 10:22:10', '2022-08-02 10:22:10'),
(4, 'Teknoloji', '2022-08-03 05:22:49', '2022-08-03 05:24:55'),
(5, 'Eğitim', '2022-08-04 07:38:05', '2022-08-04 07:38:05'),
(6, 'Tarih', '2022-08-08 03:03:38', '2022-08-08 03:03:38'),
(7, 'Dram', '2022-08-08 09:01:01', '2022-08-08 09:01:01'),
(9, 'Macera', '2022-08-08 09:01:01', '2022-08-10 03:44:12'),
(10, 'Kişisel Gelişim', '2022-08-08 09:01:01', '2022-08-10 03:44:12'),
(11, 'Aksiyon', '2022-08-08 09:01:01', '2022-08-10 03:44:12'),
(12, 'Manga', '2022-08-10 06:04:37', '2022-08-10 06:04:37'),
(13, 'Korku', '2022-08-15 06:20:07', '2022-08-15 06:20:07'),
(14, 'Roman', '2022-08-16 07:23:47', '2022-08-16 07:23:47'),
(15, 'Öykü', '2022-08-16 07:23:52', '2022-08-16 07:23:52'),
(16, 'Çizgi Roman', '2022-08-16 07:24:17', '2022-08-16 07:24:17'),
(17, 'Masal', '2022-08-16 07:24:34', '2022-08-16 07:24:34'),
(18, 'Türk Klasikleri', '2022-08-16 07:24:43', '2022-08-16 07:24:43'),
(19, 'Dünya Klasikleri', '2022-08-16 07:26:02', '2022-08-16 07:26:02'),
(20, 'Matematik', '2022-08-16 07:26:21', '2022-08-16 07:26:21'),
(21, 'Spor', '2022-08-16 07:26:25', '2022-08-16 07:26:25'),
(22, 'Deneme', '2022-08-16 07:27:11', '2022-08-16 07:27:11'),
(23, 'Politik', '2022-08-16 07:27:19', '2022-08-16 07:27:19'),
(24, 'Şiir', '2022-08-16 07:27:27', '2022-08-16 07:27:27'),
(25, 'Edebiyat', '2022-08-17 10:07:41', '2022-08-17 10:07:41');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_27_131304_create_categories_table', 2),
(6, '2022_07_27_132514_create_books_table', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `yayinevi_adi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `yayinevi_adres` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `yayinevi_tel` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `publishers`
--

INSERT INTO `publishers` (`id`, `yayinevi_adi`, `yayinevi_adres`, `yayinevi_tel`, `created_at`, `updated_at`) VALUES
(1, 'Yapikredi yayinlari', 'Türkiye/istanbul', '2125456732', '2022-08-10 08:19:13', '2022-08-10 08:19:13'),
(3, 'Altin kitaplar', 'Türkiye/ankara', '2125974826', '2022-08-10 09:14:51', '2022-08-10 09:14:51'),
(4, 'Kronik Kitapevi', 'Türkiye/istanbul', '2125497812', '2022-08-15 09:03:38', '2022-08-15 09:03:38'),
(5, 'pegasus yayinlari', 'Türkiye/ankara', '2125476138', '2022-08-15 09:03:55', '2022-08-15 09:03:55'),
(6, 'can yayinlari', 'Türkiye/izmir', '2125974851', '2022-08-15 09:08:09', '2022-08-15 09:08:09'),
(8, 'is bankasi', 'Türkiye/ankara', '2125984962', '2022-08-16 05:12:46', '2022-08-16 05:12:46'),
(9, 'Benim Hocam yayınları', 'Türkiye/ankara', '2125974914', '2022-08-16 05:41:15', '2022-08-16 05:41:15'),
(10, 'Kırmızı Kedi yayınevi', 'Türkiye/Antalya', '2124758497', '2022-08-16 05:42:02', '2022-08-16 05:42:02'),
(11, 'Bilgi yayınevi', 'Türkiye/Bursa', '2125496724', '2022-08-16 05:42:56', '2022-08-16 05:42:56'),
(12, 'Karekök yayınları', 'Türkiye/Sakarya', '2123546879', '2022-08-16 05:43:43', '2022-08-16 05:43:43'),
(13, 'Yargı yayınları', 'Türkiye/Edirne', '2123544978', '2022-08-16 05:44:29', '2022-08-16 05:44:29'),
(14, 'Palme yayınevi', 'Türkiye/Düzce', '2125468729', '2022-08-16 05:45:23', '2022-08-16 05:45:23'),
(15, 'Birey yayınları', 'Türkiye/Muğla', '2125436482', '2022-08-16 05:46:03', '2022-08-16 05:46:03'),
(16, 'Destek yayınları', 'Türkiye/ankara', '2124896715', '2022-08-16 07:22:23', '2022-08-16 07:22:23'),
(17, 'ithaki yayınevi', 'Türkiye/istanbul', '2124875934', '2022-08-16 07:44:47', '2022-08-16 07:44:47'),
(18, 'Say yayınları', 'Türkiye/Antalya', '2126497826', '2022-08-16 07:50:21', '2022-08-16 07:50:21'),
(19, 'Zeplin yayınevi', 'Türkiye/Bursa', '2126485794', '2022-08-22 03:09:47', '2022-08-22 03:09:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(4, 'Özcan Fatih', 'Can', 'fatihbuzac@gmail.com', NULL, '', '2022-07-28 10:00:03', '$2y$10$85KRrHoTx0NAifVuqCcoXO8hhBqF6h3P2aIk4KqCczZeUWCcC1feW', NULL, '2022-07-28 09:59:42', '2022-07-28 10:00:03', 1),
(5, 'Yunus', 'Bakış', 'fatih--can1903@hotmail.com', '5377343707', 'istanbul/arnavutköy', '2022-07-29 08:02:15', '$2y$10$8vlL6tGNWNgg9Fxepui5uukA1Zqs8RBFULRo8D8FXWIFVB9CfMkDm', NULL, '2022-07-29 08:01:24', '2022-08-01 10:33:15', 3),
(8, 'pervin', 'ürün', 'pervin@gmail.com', NULL, 'istanbul/gaziosmanpaşa', '2022-08-02 03:32:08', '$2y$10$zHXvXiyNJRkG43alk.aybe7m.lMJQX.fwiWcBvHAnJk8oOXsXQoaa', NULL, '2022-08-02 03:32:08', '2022-08-02 03:32:08', 1),
(10, 'Arif', 'Golgeci', 'kayit_msn_74@hotmail.com', '5397397862', 'istanbul/gop', '2022-08-08 07:07:35', '$2y$10$oSX6H..42ukBk0kjbhceHOG1cj/49qUgd9a.llEABV2wrplK5UmBu', NULL, '2022-08-08 07:07:13', '2022-08-08 07:09:43', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writers`
--

CREATE TABLE `writers` (
  `id` bigint(20) NOT NULL,
  `writer_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `writers`
--

INSERT INTO `writers` (`id`, `writer_name`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(15, 'Erich Fromm', 'efromm@gmail.com', '5352648597', '2022-08-08 03:32:36', '2022-08-17 09:24:58'),
(16, 'Andrzej Sapkowski', 'andrzej@gmail.com', '5896473519', '2022-08-08 03:33:56', '2022-08-08 03:33:56'),
(17, 'İlber Ortaylı', 'iortayli@gmail.com', '5498236149', '2022-08-08 03:35:05', '2022-08-10 09:59:17'),
(18, 'George Orwell', 'Geogeo@gmail.com', '5214972601', '2022-08-08 03:35:40', '2022-08-08 03:35:40'),
(19, 'Jean Paul Roux', 'jpaul@gmail.com', '5147512498', '2022-08-08 04:27:52', '2022-08-08 04:27:52'),
(20, 'Amy Webb', 'aweb@gmail.com', '5148942549', '2022-08-08 04:33:51', '2022-08-08 04:33:51'),
(21, 'Agatha Christie', 'Achris@gmail.com', '5487614937', '2022-08-08 04:38:04', '2022-08-08 04:38:04'),
(22, 'Paulo Coelho', 'paulc@gmail.com', '5421974682', '2022-08-08 04:39:46', '2022-08-08 04:39:46'),
(23, 'Oğuz Atay', 'oatay@gmail.com', '5248943519', '2022-08-10 09:45:45', '2022-08-10 09:45:45'),
(24, 'Sigmund Freud', 'Sfreud@gmail.com', '5249853468', '2022-08-16 07:42:42', '2022-08-16 07:42:42'),
(25, 'Osamu Dazai', 'odaza@gmail.com', '5142873416', '2022-08-16 07:43:39', '2022-08-16 07:43:39'),
(26, 'Stephan King', 'stephank@gmail.com', '5142976419', '2022-08-17 05:30:06', '2022-08-17 05:30:06'),
(28, 'Conan Doyle', 'conand@gmail.com', '5074865933', '2022-08-17 09:24:45', '2022-08-17 09:24:45'),
(29, 'Recaizade Mahmut Ekrem', 'rmahmut@gmail.com', '5248756498', '2022-08-17 09:40:49', '2022-08-17 09:40:49'),
(30, 'Beatrice Forbes Manz', 'bmanz@gmail.com', '5341892567', '2022-08-17 09:42:52', '2022-08-17 09:42:52'),
(31, 'Şiro Hamao', 'shama@gmail.com', '5496841358', '2022-08-17 09:49:48', '2022-08-17 09:49:48'),
(32, 'Dan Brown', 'danb@gmail.com', '5436598724', '2022-08-17 10:06:21', '2022-08-17 10:06:21'),
(33, 'Kolektif', 'kolektif@gmail.com', NULL, '2022-08-18 09:31:59', '2022-08-18 09:31:59'),
(34, 'Stephan Hawking', 'shawking@gmail.com', '5123465894', '2022-08-23 10:16:25', '2022-08-23 10:16:25'),
(35, 'Cihan Piyadeoğlu', 'cpiyade@gmail.com', '5124785468', '2022-08-24 18:07:40', '2022-08-24 18:07:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `writer_books`
--

CREATE TABLE `writer_books` (
  `id` int(11) NOT NULL,
  `kitap_id` bigint(20) UNSIGNED DEFAULT NULL,
  `yazar_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `writer_books`
--

INSERT INTO `writer_books` (`id`, `kitap_id`, `yazar_id`, `created_at`, `updated_at`) VALUES
(32, 38, 26, '2022-08-19 09:42:14', '2022-08-19 09:42:14'),
(33, 37, 18, '2022-08-19 09:47:55', '2022-08-19 09:47:55'),
(34, 39, 20, '2022-08-19 09:48:09', '2022-08-19 09:48:09'),
(35, 40, 22, '2022-08-19 09:48:18', '2022-08-19 09:48:18'),
(36, 41, 29, '2022-08-19 09:48:28', '2022-08-19 09:48:28'),
(37, 42, 30, '2022-08-19 09:48:38', '2022-08-19 09:48:38'),
(38, 43, 16, '2022-08-19 09:48:48', '2022-08-19 09:48:48'),
(39, 44, 28, '2022-08-19 09:49:01', '2022-08-19 09:49:01'),
(40, 45, 25, '2022-08-19 09:49:14', '2022-08-19 09:49:14'),
(41, 46, 31, '2022-08-19 09:49:23', '2022-08-19 09:49:23'),
(42, 47, 15, '2022-08-19 09:49:35', '2022-08-19 09:49:35'),
(43, 51, 32, '2022-08-19 09:49:47', '2022-08-19 09:49:47'),
(46, 52, 17, '2022-08-19 10:36:38', '2022-08-19 10:36:38'),
(47, 53, 24, '2022-08-22 03:10:44', '2022-08-22 03:10:44'),
(48, 54, 16, '2022-08-22 03:18:45', '2022-08-22 03:18:45'),
(49, 55, 16, '2022-08-22 03:20:49', '2022-08-22 03:20:49'),
(50, 56, 22, '2022-08-23 07:28:46', '2022-08-23 07:28:46'),
(51, 57, 15, '2022-08-23 09:06:28', '2022-08-23 09:06:28'),
(52, 58, 17, '2022-08-24 16:38:43', '2022-08-24 16:38:43'),
(53, 61, 17, '2022-08-24 16:52:55', '2022-08-24 16:52:55'),
(54, 59, 17, '2022-08-24 16:53:25', '2022-08-24 16:53:25'),
(55, 60, 17, '2022-08-24 16:53:38', '2022-08-24 16:53:38'),
(56, 61, 35, '2022-08-24 18:08:01', '2022-08-24 18:08:01');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `actions`
--
ALTER TABLE `actions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kitap_id` (`kitap_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `yayinevi_id` (`yayinevi_id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Tablo için indeksler `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `writer_books`
--
ALTER TABLE `writer_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kitap_id` (`kitap_id`),
  ADD KEY `yazar_id` (`yazar_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `writers`
--
ALTER TABLE `writers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Tablo için AUTO_INCREMENT değeri `writer_books`
--
ALTER TABLE `writer_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `actions`
--
ALTER TABLE `actions`
  ADD CONSTRAINT `actions_ibfk_1` FOREIGN KEY (`kitap_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`yayinevi_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `writer_books`
--
ALTER TABLE `writer_books`
  ADD CONSTRAINT `writer_books_ibfk_1` FOREIGN KEY (`yazar_id`) REFERENCES `writers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `writer_books_ibfk_2` FOREIGN KEY (`kitap_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
