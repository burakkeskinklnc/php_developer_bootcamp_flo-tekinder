-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 26 Kas 2022, 13:30:55
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
-- Veritabanı: `urunler`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunlerliste`
--

CREATE TABLE `urunlerliste` (
  `id` tinyint(30) NOT NULL,
  `urunadi` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `fiyat` int(255) NOT NULL,
  `adet` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunlerliste`
--

INSERT INTO `urunlerliste` (`id`, `urunadi`, `fiyat`, `adet`) VALUES
(1, 'Ülker Çikolatalı Gofret 40 gr', 10, 0),
(2, 'Eti Damak Kare Çikolata 60 gr', 20, 0),
(3, 'Nestle Bitter Çikolata 50 gr', 20, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `urunlerliste`
--
ALTER TABLE `urunlerliste`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `urunlerliste`
--
ALTER TABLE `urunlerliste`
  MODIFY `id` tinyint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
