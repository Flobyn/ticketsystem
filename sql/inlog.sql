-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.epizy.com
-- Gegenereerd op: 03 dec 2022 om 15:09
-- Serverversie: 10.3.27-MariaDB
-- PHP-versie: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30865082_school`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inlog`
--

CREATE TABLE `inlog` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `password` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `inlog`
--

INSERT INTO `inlog` (`id`, `user`, `password`) VALUES
(1, 'Floor', '1234Flobyn'),
(2, 'ErikT', '11Bolletjes'),
(3, 'KevinS', '12Bolletjes!');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `inlog`
--
ALTER TABLE `inlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `inlog`
--
ALTER TABLE `inlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
