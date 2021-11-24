-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Lis 2021, 15:42
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kalkulator`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kalkulator`
--

CREATE TABLE `kalkulator` (
  `id` int(10) UNSIGNED NOT NULL,
  `a` float NOT NULL,
  `b` float NOT NULL,
  `wynik` float NOT NULL,
  `dzialanie` text NOT NULL,
  `data_obliczenia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `kalkulator`
--

INSERT INTO `kalkulator` (`id`, `a`, `b`, `wynik`, `dzialanie`, `data_obliczenia`) VALUES
(1, 2, 3, 5, '+', '2021-11-22 14:16:39'),
(2, 5, 2, 10, '*', '2021-11-22 14:16:39'),
(3, 2, 1, 2, '/', '2021-11-22 14:17:01');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kalkulator`
--
ALTER TABLE `kalkulator`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kalkulator`
--
ALTER TABLE `kalkulator`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
