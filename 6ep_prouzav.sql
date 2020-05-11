-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Počítač: localhost:3306
-- Vytvořeno: Pon 11. kvě 2020, 09:48
-- Verze serveru: 10.1.41-MariaDB-0+deb9u1
-- Verze PHP: 7.3.10-1+0~20191008.45+debian9~1.gbp365209

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `6ep_prouzav`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `maturita01_poznamky`
--

CREATE TABLE `maturita01_poznamky` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `text` text COLLATE utf8_czech_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mark` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `maturita01_poznamky`
--

INSERT INTO `maturita01_poznamky` (`id`, `user_id`, `title`, `text`, `datetime`, `mark`) VALUES
(10, 5, 'asdsadsadsadsa', 'asdsadsadsadsa', '2020-03-24 13:15:03', 0),
(11, 6, 'asd', 'asd', '2020-03-24 13:15:41', 0),
(13, 8, 'asd', 'sadas', '2020-03-27 15:48:51', 0);

-- --------------------------------------------------------

--
-- Struktura tabulky `maturita01_uzivatele`
--

CREATE TABLE `maturita01_uzivatele` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `maturita01_uzivatele`
--

INSERT INTO `maturita01_uzivatele` (`id`, `username`, `email`, `password`) VALUES
(3, 'user', 'a@a', '$2y$10$LGWMhd23SMrNLjt5FSHih.6ukFXkcmZ8Ev0MdrpmdqMP2TGSLLo2a'),
(5, 'asd', 'asd@asd', '$2y$10$3GDVaKIyZGdCGRaMk5SNvOKtYMbMYvC3BuAxaWh7MeNyYubmfL3cW'),
(6, 'asd2', 'asd@asd', '$2y$10$XvgysQfHYtlDOgrzhZHCce4NVabKd9VcP4vCGQnxDEUf5FYAY29L.'),
(8, 'dra', 'dra@dra', '$2y$10$do1Lq1xOLTFGZAHy5FifzOKL4xKVezgnxpwpvPnvs0Yg6CUgv4ewa');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `maturita01_poznamky`
--
ALTER TABLE `maturita01_poznamky`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `maturita01_uzivatele`
--
ALTER TABLE `maturita01_uzivatele`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `maturita01_poznamky`
--
ALTER TABLE `maturita01_poznamky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `maturita01_uzivatele`
--
ALTER TABLE `maturita01_uzivatele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
