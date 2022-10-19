-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Paź 2022, 14:21
-- Wersja serwera: 10.4.13-MariaDB
-- Wersja PHP: 7.4.8

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
  `zleceniodawca_id` int(11) NOT NULL,
  `nazwa_pracy` text COLLATE utf8_polish_ci NOT NULL,
  `kwota` int(11) NOT NULL,
  `adres` text COLLATE utf8_polish_ci NOT NULL,
  `lng` float NOT NULL,
  `lat` float NOT NULL,
  `nazwa` int(11) NOT NULL,
  `odbiorca` int(11) DEFAULT NULL,
  `odebrana` int(11) NOT NULL COMMENT '0 - dostępne\r\n1 - odebrane'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oferta`
--

INSERT INTO `oferta` (`zleceniodawca_id`, `nazwa_pracy`, `kwota`, `adres`, `lng`, `lat`, `nazwa`, `odbiorca`, `odebrana`) VALUES
(1, 'Inne', 123, '', 50.062, 20, 0, NULL, 0),
(1, 'Opieka nad zwierzątkiem', 123, 'Loretańska, Kraków, Polska', 50.062, 20, 0, NULL, 0),
(1, 'Opieka nad zwierzątkiem', 123, 'Loretańska, Kraków, Polska', 50.062, 20, 0, NULL, 0),
(1, 'Opieka nad zwierzątkiem', 123, 'Krakowskie Przedmieście, Warszawa, Polska', 52.2426, 21.015, 0, NULL, 0),
(1, 'Opieka nad zwierzątkiem', 500, 'Kaszów 230A, Polska', 50.0392, 19.7338, 0, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
