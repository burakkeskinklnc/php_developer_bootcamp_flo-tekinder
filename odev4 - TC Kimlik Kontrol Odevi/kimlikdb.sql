-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Kas 2022, 22:33:14
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kimlikdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayitlar`
--

CREATE TABLE `kayitlar` (
  `id` int(20) NOT NULL,
  `adsoyad` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `tckimlik` varchar(11) COLLATE utf8mb4_turkish_ci NOT NULL,
  `durum` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kayitlar`
--

INSERT INTO `kayitlar` (`id`, `adsoyad`, `tckimlik`, `durum`) VALUES
(1, 'burak', '47614527264', 'T.C. No Geçerli');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kayitlar`
--
ALTER TABLE `kayitlar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kayitlar`
--
ALTER TABLE `kayitlar`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
