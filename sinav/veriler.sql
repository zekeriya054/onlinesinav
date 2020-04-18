-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 01 Tem 2014, 12:52:29
-- Sunucu sürümü: 5.1.73-cll
-- PHP Sürümü: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `eahmehm_dbveri`
--
CREATE DATABASE IF NOT EXISTS `eahmehm_dbveri` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `eahmehm_dbveri`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cevaplar`
--

CREATE TABLE IF NOT EXISTS `cevaplar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soru_id` int(11) NOT NULL,
  `cevap_metni` varchar(800) DEFAULT NULL,
  `dogru_cevap` int(11) NOT NULL,
  `dogru_cevap_metni` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `soru_id` (`soru_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=176028 ;

--
-- Tablo döküm verisi `cevaplar`
--

INSERT INTO `cevaplar` (`id`, `soru_id`, `cevap_metni`, `dogru_cevap`, `dogru_cevap_metni`) VALUES
(175830, 211, '2 + 2 = 4', 1, NULL),
(175831, 211, '2 + 3 = 4', 0, NULL),
(175832, 211, '2 * 2 = 4', 1, NULL),
(175833, 211, '2 * 3 = 4', 0, NULL),
(175834, 212, '1 + 1 =', 0, '2'),
(175835, 212, '2 + 1 =', 0, '3'),
(175836, 212, '3 + 1 =', 0, '4'),
(175837, 212, '4 + 1 =', 0, '5'),
(175838, 212, '5+6=', 0, '11'),
(175920, 213, NULL, 0, 'Microsoft'),
(175941, 210, 'Bill Gates', 1, NULL),
(175942, 210, 'Michael Dell ', 0, NULL),
(175943, 210, 'Steve Job', 0, NULL),
(175944, 210, 'Bruce Lee ', 0, NULL),
(175953, 219, 'Hoparlör', 0, NULL),
(175954, 219, 'Mönitor', 0, NULL),
(175955, 219, 'Yazıcı', 0, NULL),
(175956, 219, 'Klavye', 1, NULL),
(175965, 222, 'int x=10', 0, NULL),
(175966, 222, 'int x1=20', 0, NULL),
(175967, 222, 'int x_1=20', 0, NULL),
(175968, 222, 'int 1x=30', 1, NULL),
(175969, 223, 'Java', 0, NULL),
(175970, 223, 'C#', 0, NULL),
(175971, 223, 'Visual Basic', 0, NULL),
(175972, 223, 'C', 1, NULL),
(175973, 224, 'continue', 0, NULL),
(175974, 224, 'if', 0, NULL),
(175975, 224, 'break', 1, NULL),
(175976, 224, 'goto', 0, NULL),
(175981, 220, 'PHP', 1, NULL),
(175982, 220, 'Java', 0, NULL),
(175983, 220, 'C++', 0, NULL),
(175984, 220, 'Fortran', 0, NULL),
(175985, 221, 'Apache', 0, NULL),
(175986, 221, 'MsSQL', 0, NULL),
(175987, 221, 'MySQL', 1, NULL),
(175988, 221, 'Oracle', 0, NULL),
(175989, 225, 'Bu', 0, NULL),
(175990, 225, 'Şu', 0, NULL),
(175991, 225, 'O', 1, NULL),
(175992, 225, 'Biz', 0, NULL),
(175993, 226, '1', 0, NULL),
(175994, 226, '2', 0, NULL),
(175995, 226, '3', 1, NULL),
(175996, 226, '4', 0, NULL),
(176007, 227, 'Linux', 1, NULL),
(176008, 227, 'Unix', 1, NULL),
(176009, 227, 'MySQL', 0, NULL),
(176010, 227, 'Windows', 1, NULL),
(176011, 227, 'MAC OS', 1, NULL),
(176012, 228, 'Windows', 0, NULL),
(176013, 228, 'MAC OS', 0, NULL),
(176014, 228, 'Linux', 1, NULL),
(176015, 228, 'Unix', 0, NULL),
(176020, 229, 'debian', 1, NULL),
(176021, 229, 'delphi', 0, NULL),
(176022, 229, 'c', 0, NULL),
(176023, 229, 'java', 0, NULL),
(176024, 230, 'deneme1', 0, NULL),
(176025, 230, 'deneme2', 0, NULL),
(176026, 230, 'deneme3', 0, NULL),
(176027, 230, 'deneme4', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorevler`
--

CREATE TABLE IF NOT EXISTS `gorevler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sinav_id` int(11) NOT NULL,
  `baslama_tarihi` datetime NOT NULL,
  `sinav_suresi` int(11) NOT NULL,
  `basari_puani` decimal(10,2) NOT NULL,
  `bitis_tarihi` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Tablo döküm verisi `gorevler`
--

INSERT INTO `gorevler` (`id`, `sinav_id`, `baslama_tarihi`, `sinav_suresi`, `basari_puani`, `bitis_tarihi`) VALUES
(2, 41, '2014-05-12 00:00:00', 1000, '100.00', '2014-06-30 00:00:00'),
(4, 43, '2014-05-12 00:00:00', 100, '100.00', '2014-06-30 00:00:00'),
(24, 47, '2014-05-12 00:00:00', 40, '100.00', '2014-06-30 00:00:00'),
(25, 46, '2014-05-06 00:00:00', 40, '60.00', '2014-06-30 00:00:00'),
(26, 49, '2014-06-24 00:00:00', 10, '100.00', '2014-06-25 00:00:00'),
(27, 50, '2014-06-23 00:00:00', 40, '100.00', '2014-07-30 00:00:00'),
(28, 51, '2014-07-01 00:00:00', 60, '100.00', '2014-07-05 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `imported_users`
--

CREATE TABLE IF NOT EXISTS `imported_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `surname` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `user_name` varchar(150) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `password` varchar(150) CHARACTER SET latin1 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `imported_users`
--

INSERT INTO `imported_users` (`id`, `name`, `surname`, `user_name`, `password`) VALUES
(1, 'test1', 'test2', 'user1', 'ee11cbb19052e40b07aac0ca060c23ee'),
(2, 'test2', 'test2', 'user2', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_adi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kat_adi`) VALUES
(61, 'IT tests'),
(65, 'Bilişim'),
(66, 'Eğitim');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `KullaniciID` int(11) NOT NULL AUTO_INCREMENT,
  `KullaniciAdi` varchar(50) NOT NULL,
  `Sifre` varchar(50) NOT NULL,
  `Ad` varchar(150) NOT NULL,
  `Soyad` varchar(150) NOT NULL,
  `EklemeTarihi` datetime NOT NULL,
  `KullaniciTipi` tinyint(4) DEFAULT NULL,
  `eposta` varchar(200) DEFAULT NULL,
  `sinif` varchar(5) NOT NULL,
  `sube` varchar(10) NOT NULL,
  `cinsiyet` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`KullaniciID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`KullaniciID`, `KullaniciAdi`, `Sifre`, `Ad`, `Soyad`, `EklemeTarihi`, `KullaniciTipi`, `eposta`, `sinif`, `sube`, `cinsiyet`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '2011-10-27 12:02:06', 1, 'admin', '', '', 0),
(14, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Yusuf', 'Kara', '0000-00-00 00:00:00', 2, 'user', '7', 'C', 0),
(15, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'Erdem', 'Kahraman', '0000-00-00 00:00:00', 2, 'user2', '7', 'B', 0),
(16, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'Mustafa', 'Kaplan', '0000-00-00 00:00:00', 2, 'user3', '7', 'A', 0),
(17, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'Abdussamet', 'Uysal', '0000-00-00 00:00:00', 2, 'user4', '8', 'B', 1),
(18, 'user5', '0a791842f52a0acfbb3a783378c066b8', 'user5', 'user5', '2011-10-27 14:11:11', 2, 'user5', '', '', 0),
(19, 'user6', 'affec3b64cf90492377a8114c86fc093', 'user6', 'user6', '2011-10-27 14:11:19', 2, 'user6', '', '', 0),
(20, 'user7', '3e0469fb134991f8f75a2760e409c6ed', 'user7', 'user7', '2011-10-27 14:11:32', 2, 'user7', '', '', 0),
(21, 'user8', '7668f673d5669995175ef91b5d171945', 'user8', 'user8', '2011-10-27 14:11:39', 2, 'user8', '', '', 0),
(22, 'user9', '8808a13b854c2563da1a5f6cb2130868', 'user9', 'user9', '2011-10-27 14:12:01', 1, 'user9', '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_cevaplari`
--

CREATE TABLE IF NOT EXISTS `kullanici_cevaplari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_id` int(11) NOT NULL,
  `soru_id` int(11) DEFAULT NULL,
  `cevap_id` int(11) DEFAULT NULL,
  `cevap_metni` varchar(800) DEFAULT NULL,
  `ekleme_tarihi` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3208 ;

--
-- Tablo döküm verisi `kullanici_cevaplari`
--

INSERT INTO `kullanici_cevaplari` (`id`, `kullanici_id`, `soru_id`, `cevap_id`, `cevap_metni`, `ekleme_tarihi`) VALUES
(3075, 17, 211, 175830, NULL, '2014-06-17 20:36:42'),
(3076, 17, 211, 175832, NULL, '2014-06-17 20:36:42'),
(3077, 17, 212, 175834, '2', '2014-06-17 20:36:49'),
(3078, 17, 212, 175835, '3', '2014-06-17 20:36:49'),
(3079, 17, 212, 175836, '4', '2014-06-17 20:36:49'),
(3080, 17, 212, 175837, '34', '2014-06-17 20:36:49'),
(3081, 17, 212, 175838, '213', '2014-06-17 20:36:49'),
(3082, 17, 213, 175920, 'asdasd', '2014-06-17 20:36:50'),
(3083, 17, 219, 175954, NULL, '2014-06-18 23:21:39'),
(3099, 17, 220, 175981, NULL, '2014-06-20 02:47:25'),
(3100, 17, 221, 175985, NULL, '2014-06-20 02:47:29'),
(3113, 17, 222, 175968, NULL, '2014-06-22 14:17:47'),
(3114, 17, 223, 175970, NULL, '2014-06-22 14:17:50'),
(3115, 17, 224, 175975, NULL, '2014-06-22 14:17:52'),
(3124, 14, 210, 175941, NULL, '2014-06-24 20:28:53'),
(3125, 14, 211, 175830, NULL, '2014-06-24 20:28:56'),
(3126, 14, 211, 175832, NULL, '2014-06-24 20:28:56'),
(3127, 14, 212, 175834, '2', '2014-06-24 20:29:03'),
(3128, 14, 212, 175835, '3', '2014-06-24 20:29:03'),
(3129, 14, 212, 175836, '4', '2014-06-24 20:29:03'),
(3130, 14, 212, 175837, '5', '2014-06-24 20:29:03'),
(3131, 14, 212, 175838, '11', '2014-06-24 20:29:04'),
(3132, 14, 213, 175920, 'Microsoft', '2014-06-24 20:29:16'),
(3133, 14, 219, 175954, NULL, '2014-06-24 20:29:30'),
(3136, 14, 222, 175968, NULL, '2014-06-24 20:30:30'),
(3137, 14, 223, 175972, NULL, '2014-06-24 20:30:33'),
(3138, 14, 224, 175976, NULL, '2014-06-24 20:30:36'),
(3147, 15, 219, 175956, NULL, '2014-06-24 20:44:34'),
(3148, 15, 222, 175968, NULL, '2014-06-24 20:45:26'),
(3149, 15, 223, 175970, NULL, '2014-06-24 20:45:28'),
(3150, 15, 224, 175975, NULL, '2014-06-24 20:45:30'),
(3151, 15, 220, 175981, NULL, '2014-06-24 20:54:30'),
(3152, 15, 221, 175987, NULL, '2014-06-24 20:54:33'),
(3154, 16, 222, 175968, NULL, '2014-06-24 20:56:26'),
(3155, 16, 223, 175971, NULL, '2014-06-24 20:56:28'),
(3156, 16, 224, 175976, NULL, '2014-06-24 20:56:30'),
(3157, 16, 220, 175981, NULL, '2014-06-24 20:59:55'),
(3158, 16, 221, 175988, NULL, '2014-06-24 20:59:57'),
(3168, 14, 220, 175981, NULL, '2014-06-24 21:11:20'),
(3169, 14, 221, 175986, NULL, '2014-06-24 21:11:22'),
(3170, 16, 219, 175954, NULL, '2014-06-24 21:30:32'),
(3171, 16, 225, 175989, NULL, '2014-06-24 21:42:39'),
(3172, 16, 226, 175995, NULL, '2014-06-24 21:42:47'),
(3173, 16, 210, 175941, NULL, '2014-06-25 00:29:50'),
(3174, 16, 211, 175830, NULL, '2014-06-25 00:30:03'),
(3175, 16, 211, 175832, NULL, '2014-06-25 00:30:03'),
(3176, 16, 212, 175834, '2', '2014-06-25 00:30:17'),
(3177, 16, 212, 175835, '3', '2014-06-25 00:30:17'),
(3178, 16, 212, 175836, '4', '2014-06-25 00:30:17'),
(3179, 16, 212, 175837, '5', '2014-06-25 00:30:17'),
(3180, 16, 212, 175838, '10', '2014-06-25 00:30:17'),
(3181, 16, 213, 175920, 'Mikrosoft', '2014-06-25 00:30:50'),
(3182, 15, 210, 175941, NULL, '2014-06-25 00:41:06'),
(3183, 15, 211, 175833, NULL, '2014-06-25 00:41:20'),
(3184, 15, 212, 175834, '2', '2014-06-25 00:42:16'),
(3185, 15, 212, 175835, '3', '2014-06-25 00:42:16'),
(3186, 15, 212, 175836, '4', '2014-06-25 00:42:16'),
(3187, 15, 212, 175837, '5', '2014-06-25 00:42:16'),
(3188, 15, 212, 175838, '11', '2014-06-25 00:42:16'),
(3189, 15, 213, 175920, 'Microsoft', '2014-06-25 00:42:27'),
(3190, 17, 210, 175942, NULL, '2014-06-25 09:57:56'),
(3191, 14, 227, 176007, NULL, '2014-06-30 14:47:47'),
(3192, 14, 227, 176008, NULL, '2014-06-30 14:47:47'),
(3193, 14, 227, 176010, NULL, '2014-06-30 14:47:47'),
(3194, 14, 227, 176011, NULL, '2014-06-30 14:47:47'),
(3195, 14, 228, 176014, NULL, '2014-06-30 14:47:52'),
(3196, 17, 227, 176007, NULL, '2014-07-01 02:08:54'),
(3197, 17, 227, 176008, NULL, '2014-07-01 02:08:54'),
(3198, 17, 227, 176010, NULL, '2014-07-01 02:08:54'),
(3199, 17, 227, 176011, NULL, '2014-07-01 02:08:54'),
(3200, 17, 228, 176014, NULL, '2014-07-01 02:09:04'),
(3201, 16, 227, 176007, NULL, '2014-07-01 02:11:38'),
(3202, 16, 227, 176010, NULL, '2014-07-01 02:11:39'),
(3203, 16, 227, 176011, NULL, '2014-07-01 02:11:40'),
(3205, 16, 228, 176014, NULL, '2014-07-01 02:12:47'),
(3206, 14, 229, 176020, NULL, '2014-07-01 02:19:37'),
(3207, 14, 230, 176026, NULL, '2014-07-01 02:19:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_gorevleri`
--

CREATE TABLE IF NOT EXISTS `kullanici_gorevleri` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gorev_id` int(11) NOT NULL,
  `kullanici_tipi` int(11) NOT NULL DEFAULT '0',
  `kullanici_id` int(11) NOT NULL,
  `kat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=231 ;

--
-- Tablo döküm verisi `kullanici_gorevleri`
--

INSERT INTO `kullanici_gorevleri` (`id`, `gorev_id`, `kullanici_tipi`, `kullanici_id`, `kat_id`) VALUES
(188, 2, 1, 19, 61),
(187, 2, 1, 18, 61),
(186, 2, 1, 17, 61),
(185, 2, 1, 16, 61),
(184, 2, 1, 15, 61),
(183, 2, 1, 14, 61),
(195, 4, 1, 19, 65),
(194, 4, 1, 18, 65),
(193, 4, 1, 17, 65),
(192, 4, 1, 16, 65),
(191, 4, 1, 15, 65),
(190, 4, 1, 14, 65),
(202, 24, 1, 20, 61),
(201, 24, 1, 19, 61),
(200, 24, 1, 18, 61),
(199, 24, 1, 17, 61),
(198, 24, 1, 16, 61),
(197, 24, 1, 15, 61),
(196, 24, 1, 14, 61),
(209, 25, 1, 20, 65),
(208, 25, 1, 19, 65),
(207, 25, 1, 18, 65),
(206, 25, 1, 17, 65),
(205, 25, 1, 16, 65),
(204, 25, 1, 15, 65),
(203, 25, 1, 14, 65),
(175, 29, 1, 15, 0),
(174, 29, 1, 14, 0),
(189, 2, 1, 20, 61),
(210, 26, 1, 14, 65),
(211, 26, 1, 15, 65),
(212, 26, 1, 16, 65),
(213, 27, 1, 14, 61),
(214, 27, 1, 15, 61),
(215, 27, 1, 16, 61),
(216, 27, 1, 17, 61),
(217, 27, 1, 18, 61),
(218, 27, 1, 19, 61),
(219, 27, 1, 20, 61),
(220, 27, 1, 21, 61),
(221, 27, 1, 22, 61),
(222, 28, 1, 14, 66),
(223, 28, 1, 15, 66),
(224, 28, 1, 16, 66),
(225, 28, 1, 17, 66),
(226, 28, 1, 18, 66),
(227, 28, 1, 19, 66),
(228, 28, 1, 20, 66),
(229, 28, 1, 21, 66),
(230, 28, 1, 22, 66);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici_sinavlari`
--

CREATE TABLE IF NOT EXISTS `kullanici_sinavlari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gorev_id` int(11) DEFAULT NULL,
  `kullanici_id` int(11) DEFAULT NULL,
  `durum` int(11) DEFAULT '0',
  `baslama_tarihi` datetime DEFAULT NULL,
  `basari` int(11) DEFAULT NULL,
  `bitis_tarihi` datetime DEFAULT NULL,
  `puan` decimal(10,2) DEFAULT NULL,
  `dogru_sayisi` int(11) NOT NULL,
  `yanlis_sayisi` int(11) NOT NULL,
  `soru_sayisi` int(11) NOT NULL,
  `kat_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `assignment_id` (`gorev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Tablo döküm verisi `kullanici_sinavlari`
--

INSERT INTO `kullanici_sinavlari` (`id`, `gorev_id`, `kullanici_id`, `durum`, `baslama_tarihi`, `basari`, `bitis_tarihi`, `puan`, `dogru_sayisi`, `yanlis_sayisi`, `soru_sayisi`, `kat_id`) VALUES
(176, 4, 14, 1, '2014-06-24 20:29:25', NULL, '2014-06-24 20:29:30', '0.00', 0, 1, 1, 65),
(178, 25, 14, 1, '2014-06-24 20:30:26', NULL, '2014-06-24 20:30:36', '20.00', 2, 1, 3, 65),
(180, 4, 15, 1, '2014-06-24 20:44:32', NULL, '2014-06-24 20:44:34', '10.00', 1, 0, 1, 65),
(182, 24, 15, 1, '2014-06-24 20:54:27', NULL, '2014-06-24 20:54:33', '20.00', 2, 0, 2, 61),
(184, 25, 16, 1, '2014-06-24 20:56:24', NULL, '2014-06-24 20:56:30', '10.00', 1, 2, 3, 65),
(185, 24, 16, 1, '2014-06-24 20:59:52', NULL, '2014-06-24 20:59:57', '10.00', 1, 1, 2, 61),
(187, 24, 14, 1, '2014-06-24 21:11:17', NULL, '2014-06-24 21:11:22', '10.00', 1, 1, 2, 61),
(188, 4, 16, 1, '2014-06-24 21:30:29', NULL, '2014-06-24 21:30:32', '0.00', 0, 1, 1, 65),
(189, 26, 16, 1, '2014-06-24 21:42:34', NULL, '2014-06-24 21:42:47', '10.00', 1, 1, 2, 65),
(190, 2, 16, 1, '2014-06-25 00:29:45', NULL, '2014-06-25 00:30:50', '20.00', 2, 2, 4, 61),
(191, 2, 15, 1, '2014-06-25 00:41:03', NULL, '2014-06-25 00:42:27', '25.00', 3, 1, 4, 61),
(192, 2, 17, 0, '2014-06-25 09:57:53', NULL, NULL, NULL, 0, 0, 0, 61),
(193, 27, 14, 1, '2014-06-30 14:47:39', NULL, '2014-06-30 14:47:52', '20.00', 2, 0, 2, 61),
(194, 27, 17, 1, '2014-07-01 02:08:23', NULL, '2014-07-01 02:09:04', '20.00', 2, 0, 2, 61),
(195, 27, 16, 1, '2014-07-01 02:11:32', NULL, '2014-07-01 02:12:47', '10.00', 1, 1, 2, 61),
(196, 28, 14, 1, '2014-07-01 02:19:17', NULL, '2014-07-01 02:19:43', '5.00', 1, 1, 2, 66);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `priority` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `file_name`, `parent_id`, `priority`) VALUES
(1, 'Test Managment', NULL, 0, '1'),
(2, 'Categories', 'cats', 1, '1'),
(3, 'Quizzes', 'quizzes', 1, '2'),
(4, 'Local users', 'local_users', 1, '4'),
(5, 'Test Assignments', NULL, 0, '2'),
(6, 'Assignments', 'assignments', 5, '6'),
(7, 'New Assignment', 'add_assignment', 5, '7'),
(8, 'Assignments', NULL, 0, '3'),
(9, 'Active Assignments', 'active_assignments', 8, '1'),
(10, 'My old assigments', 'old_assignments', 8, '2'),
(11, 'New user', 'add_edit_user', 1, '5'),
(12, 'New Quiz', 'add_edit_quiz', 1, '3');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `question_groups`
--

CREATE TABLE IF NOT EXISTS `question_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(450) CHARACTER SET latin1 NOT NULL,
  `show_header` int(11) NOT NULL,
  `group_total` decimal(18,0) NOT NULL,
  `show_footer` int(11) DEFAULT NULL,
  `check_total` decimal(18,0) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `group_name_eng` varchar(450) CHARACTER SET latin1 DEFAULT NULL,
  `added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=290 ;

--
-- Tablo döküm verisi `question_groups`
--

INSERT INTO `question_groups` (`id`, `group_name`, `show_header`, `group_total`, `show_footer`, `check_total`, `question_id`, `parent_id`, `group_name_eng`, `added_date`) VALUES
(210, '', 0, '0', NULL, NULL, 192, 0, NULL, '2011-10-27 11:44:52'),
(211, '', 0, '0', NULL, NULL, 193, 0, NULL, '2011-10-27 11:48:31'),
(212, '', 0, '0', NULL, NULL, 194, 0, NULL, '2011-10-27 11:49:32'),
(213, '', 0, '0', NULL, NULL, 195, 0, NULL, '2011-10-27 11:50:13'),
(276, 'AÅŸaÄŸÄ±dakilerden hangisi doÄŸrudur', 1, '0', NULL, NULL, 257, 275, NULL, '2014-04-10 22:31:07'),
(277, '', 0, '0', NULL, NULL, 59, 210, NULL, '2014-04-10 22:41:06'),
(278, '', 0, '0', NULL, NULL, 258, 211, NULL, '2014-04-10 22:41:06'),
(279, '', 0, '0', NULL, NULL, 259, 212, NULL, '2014-04-10 22:41:06'),
(280, '', 0, '0', NULL, NULL, 260, 213, NULL, '2014-04-10 22:41:06'),
(281, 'AÅŸaÄŸÄ±dakilerden hangisi doÄŸrudur', 1, '0', NULL, NULL, 256, 0, NULL, '2014-04-10 22:45:34'),
(282, 'AÅŸaÄŸÄ±dakilerden hangisi doÄŸrudur', 1, '0', NULL, NULL, 261, 281, NULL, '2014-04-10 22:46:08'),
(283, 'araba markasÄ±', 1, '0', NULL, NULL, 262, 0, NULL, '2014-04-10 22:56:03'),
(284, 'AÅŸaÄŸÄ±dakilerden hangisi doÄŸrudur', 1, '0', NULL, NULL, 263, 281, NULL, '2014-04-10 22:57:20'),
(285, 'araba markasÄ±', 1, '0', NULL, NULL, 264, 283, NULL, '2014-04-10 22:57:20'),
(286, '', 0, '0', NULL, NULL, 265, 0, NULL, '2014-04-10 23:09:37'),
(287, '', 0, '0', NULL, NULL, 266, 0, NULL, '2014-04-10 23:10:42'),
(288, '', 0, '0', NULL, NULL, 267, 286, NULL, '2014-04-10 23:11:31'),
(289, '', 0, '0', NULL, NULL, 268, 287, NULL, '2014-04-10 23:11:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles_rights`
--

CREATE TABLE IF NOT EXISTS `roles_rights` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `roles_rights`
--

INSERT INTO `roles_rights` (`Id`, `role_id`, `module_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 6),
(5, 1, 7),
(12, 1, 12),
(11, 1, 11),
(9, 2, 9),
(10, 2, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinavlar`
--

CREATE TABLE IF NOT EXISTS `sinavlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_id` int(11) NOT NULL,
  `sinav_adi` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sinav_tanimi` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ekleme_tarihi` datetime NOT NULL,
  `parent_id` int(11) NOT NULL,
  `acilis_mesaji_g` int(11) NOT NULL,
  `acilis_mesaji` varchar(3850) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Tablo döküm verisi `sinavlar`
--

INSERT INTO `sinavlar` (`id`, `kat_id`, `sinav_adi`, `sinav_tanimi`, `ekleme_tarihi`, `parent_id`, `acilis_mesaji_g`, `acilis_mesaji`) VALUES
(41, 61, 'Test quiz', 'This is test quiz ', '2030-11-01 00:00:00', 0, 1, '<p>\r\n	This is an example quiz&nbsp; . This is an open source quiz software written in <span style="color: #ff0000">PHP</span>.</p>\r\n<p>\r\n	You can change design or source code .</p>\r\n<p>\r\n	Please , contact if you will have any questions .</p>\r\n<p>\r\n	<a href="mailto:support@aspnetpower.com">support@aspnetpower.com</a></p>\r\n'),
(43, 65, 'BTT', 'Bilişim Teknolojilerinin Temelleri 1.sınav', '2014-05-08 23:34:36', 0, 0, '<p>\r\n	Bu sınav donanım birimlerini kapsamaktadır</p>\r\n'),
(46, 65, 'Programlama Temelleri', 'Döngüler', '2014-05-10 00:07:34', 0, 0, '<p>\r\n	Bu sınav for while do-whie d&ouml;ng&uuml;leri hakkındadır</p>\r\n'),
(47, 61, 'Web tasarımı ve Programlama', 'Web Tasarımı', '2030-11-01 00:00:00', 0, 0, ''),
(48, 65, 'Veritabanı', 'veritabanı sql', '0000-00-00 00:00:00', 0, 0, ''),
(49, 65, 'Dil Bilgisi', 'Türkçe Deneme Sınavıdır', '2014-06-24 21:39:09', 0, 1, '<p>\r\n	Hoş geldin. </p>\r\n<p>\r\n	T&uuml;rk&ccedil;e deneme sınavında başarılar dilerim.</p>\r\n'),
(50, 61, 'sunucu işletim sistemi', 'deneme sınavı', '2014-06-30 14:38:17', 0, 1, '<p>\r\n	deneme mesajı</p>\r\n'),
(51, 66, 'Deneme Sınavı', 'Deneme sınavı', '2014-07-01 02:15:05', 0, 1, '<p>\r\n	Hoş geldin,</p>\r\n<p>\r\n	Sınavda başarılar..</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE IF NOT EXISTS `sorular` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soru` varchar(3800) CHARACTER SET utf8 DEFAULT NULL,
  `soru_tipi` int(11) NOT NULL,
  `oncelik` int(11) NOT NULL,
  `sinav_id` int(11) NOT NULL,
  `puan` decimal(18,0) NOT NULL,
  `ekleme_tarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_id` int(11) NOT NULL,
  `question_total` decimal(18,0) DEFAULT NULL,
  `check_total` int(11) DEFAULT NULL,
  `ust_metin` varchar(1500) CHARACTER SET utf8 DEFAULT NULL,
  `alt_metin` varchar(1500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_text_eng` varchar(1800) CHARACTER SET utf8 DEFAULT NULL,
  `help_image` varchar(550) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sinav_id` (`sinav_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=231 ;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `soru`, `soru_tipi`, `oncelik`, `sinav_id`, `puan`, `ekleme_tarihi`, `parent_id`, `question_total`, `check_total`, `ust_metin`, `alt_metin`, `question_text_eng`, `help_image`) VALUES
(210, '<p>\r\n	Who is in photo ?<br />\r\n	<img alt="" height="200" src="editor_images/1.jpg" width="200" /></p>\r\n', 1, 1, 41, '10', '2011-10-27 11:33:15', 0, '0', NULL, 'First question is linked to image .', 'Please, click Next button if you don''t know answer', '', ''),
(211, '<p>\r\n	Which is the correct ?</p>\r\n', 0, 2, 41, '10', '2011-10-27 11:48:31', 0, NULL, NULL, '', '', NULL, NULL),
(212, '<p>\r\n	Please, answer below listed questions .</p>\r\n', 3, 3, 41, '10', '2011-10-27 11:49:32', 0, NULL, NULL, '', '', NULL, NULL),
(213, '<p>\r\n	Enter the name of the biggest software company in the worlddd</p>\r\n', 2, 4, 41, '5', '2011-10-27 11:50:13', 0, NULL, NULL, '', '', NULL, NULL),
(219, '<p>\r\n	Aşağıdakilerden hangisi giriş birimidir ?</p>\r\n', 1, 0, 43, '10', '2014-05-13 22:46:48', 0, NULL, NULL, '', '', NULL, NULL),
(220, '<p>\r\n	Aşağıdakilerden hangisi bir Web programlama dilidir.</p>\r\n', 1, 0, 47, '10', '2014-06-17 12:33:07', 0, NULL, NULL, '', '', NULL, NULL),
(221, '<p>\r\n	PHP ile birlikte en sık kullanılan veritabanı hangisidir ?</p>\r\n', 1, 0, 47, '10', '2014-06-17 12:34:06', 0, NULL, NULL, '', '', NULL, NULL),
(222, '<p>\r\n	Aşağıdakilerden hangisi yanlış bir değişken tanımlamasıdır ?</p>\r\n', 1, 0, 46, '10', '2014-06-17 12:36:47', 0, NULL, NULL, '', '', NULL, NULL),
(223, '<p>\r\n	Aşağıdaki programlama dillerinden hangisi makina diline en yakın olandır ?</p>\r\n', 1, 0, 46, '10', '2014-06-17 12:37:40', 0, NULL, NULL, '', '', NULL, NULL),
(224, '<p>\r\n	Bir d&ouml;ng&uuml;y&uuml; kırmak i&ccedil;in aşağıdaki komutlardan hangisini kullanırız.</p>\r\n', 1, 0, 46, '10', '2014-06-17 12:38:38', 0, NULL, NULL, '', '', NULL, NULL),
(225, '<p>\r\n	Aşağıdakilerden hangisi doğrudur?</p>\r\n', 1, 0, 49, '10', '2014-06-24 18:40:25', 0, NULL, NULL, 'Üst metin ?', 'Alt metin ?', NULL, NULL),
(226, '<p>\r\n	Deneme ikinci soru i&ccedil;in hangi madde yanlıştır?</p>\r\n', 1, 0, 49, '10', '2014-06-24 18:41:11', 0, NULL, NULL, 'Üst metin ?', 'Alt metin ?', NULL, NULL),
(227, '<p>\r\n	Aşağıdakilerden hangileri işletim sistemidir</p>\r\n', 0, 0, 50, '10', '2014-06-30 11:41:00', 0, NULL, NULL, '', '', NULL, NULL),
(228, '<p>\r\n	Linus Torvalds tarafından &ccedil;ekirdek kodları yazılan<br />\r\n	işetim sistemi aşağıdakilerden hangisidir</p>\r\n', 1, 0, 50, '10', '2014-06-30 11:43:12', 0, NULL, NULL, '', '', NULL, NULL),
(229, '<p>\r\n	Aşağıdakilerden hangisi prog. dili değildir?</p>\r\n', 1, 0, 51, '5', '2014-06-30 23:16:49', 0, NULL, NULL, '<p>\r\n	Bu bir sorunun &uuml;st metnidir.</p>\r\n', '<p>\r\n	Bu bir sorunun alt metnidir.</p>\r\n', NULL, NULL),
(230, '<p>\r\n	Deneme soru 2.</p>\r\n', 1, 0, 51, '5', '2014-06-30 23:17:53', 0, NULL, NULL, '<p>\r\n	&uuml;st metin</p>\r\n', '<p>\r\n	alt metin</p>\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `soru_tipleri`
--

CREATE TABLE IF NOT EXISTS `soru_tipleri` (
  `id` int(11) NOT NULL,
  `soru_tipi` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `soru_tipleri`
--

INSERT INTO `soru_tipleri` (`id`, `soru_tipi`) VALUES
(0, 'Çoklu cevap (checkbox)'),
(2, 'Serbest metin(textarea)'),
(3, 'Çoklu metin'),
(1, 'Tek cevap (radio button)');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_types`
--

INSERT INTO `user_types` (`id`, `type_name`) VALUES
(1, 'Admin'),
(2, 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
