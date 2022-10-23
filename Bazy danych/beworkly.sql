-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 23 Paź 2022, 15:47
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `beworkly`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferta`
--

CREATE TABLE `oferta` (
  `id` int(11) NOT NULL,
  `zleceniodawca_id` int(11) NOT NULL,
  `nazwa_pracy` text COLLATE utf8_polish_ci NOT NULL,
  `kwota` int(11) NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `lng` float NOT NULL,
  `lat` float NOT NULL,
  `nazwa` text COLLATE utf8_polish_ci NOT NULL,
  `odbiorca` int(11) DEFAULT NULL,
  `odebrana` int(11) NOT NULL COMMENT '0 - dostępne\r\n1 - odebrane'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `fname` text COLLATE utf8_polish_ci NOT NULL,
  `sname` text COLLATE utf8_polish_ci NOT NULL,
  `tel` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `token` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users_data`
--

CREATE TABLE `users_data` (
  `id` int(11) NOT NULL,
  `fname` text COLLATE utf8_polish_ci NOT NULL,
  `sname` text COLLATE utf8_polish_ci NOT NULL,
  `tel` text COLLATE utf8_polish_ci NOT NULL,
  `date` text COLLATE utf8_polish_ci NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `about` text COLLATE utf8_polish_ci DEFAULT 'Nie ustawiono'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
