-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 May 2022, 15:23:44
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `webtam`
--
CREATE DATABASE IF NOT EXISTS `webtam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webtam`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kampanya`
--

CREATE TABLE `kampanya` (
  `kimlik` int(11) NOT NULL,
  `resim` varchar(100) NOT NULL,
  `aciklama` text NOT NULL,
  `aktif` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kampanya`
--

INSERT INTO `kampanya` (`kimlik`, `resim`, `aciklama`, `aktif`) VALUES
(1, '1-1080x300.jpg', 'Anneler Günü', b'1'),
(2, '2-1080x300.jpg', 'Babalar Günü', b'1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kimlik` int(11) NOT NULL,
  `kategoriAdi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kimlik`, `kategoriAdi`) VALUES
(1, 'İşlemci'),
(2, 'RAM'),
(3, 'Anakart'),
(4, 'SSD'),
(5, 'Kasa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `parola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `ad`, `parola`) VALUES
(1, 'admin', '123123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `kimlik` int(11) NOT NULL,
  `gonderenMail` varchar(200) NOT NULL,
  `mesaj` text NOT NULL,
  `okunduMu` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `kimlik` int(11) NOT NULL,
  `urunAdi` varchar(50) NOT NULL,
  `fiyat` float NOT NULL,
  `resmi` varchar(50) NOT NULL,
  `detay` text NOT NULL,
  `kategoriKimlik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`kimlik`, `urunAdi`, `fiyat`, `resmi`, `detay`, `kategoriKimlik`) VALUES
(1, 'Core i5', 3000, 'i5core.jpg', '4 çekirdek\r\n6 sanal ...', 1),
(2, 'Gskill 8GB RAM', 900, 'gskillRAM.jpg', '3200 MHz', 2),
(3, 'Cooler Master Kasa', 2500, 'coolerMasterKasa.jpg', 'PSU yok\r\nRGB...', 5);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kampanya`
--
ALTER TABLE `kampanya`
  ADD PRIMARY KEY (`kimlik`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kimlik`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`kimlik`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`kimlik`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kampanya`
--
ALTER TABLE `kampanya`
  MODIFY `kimlik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kimlik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `kimlik` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `kimlik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
