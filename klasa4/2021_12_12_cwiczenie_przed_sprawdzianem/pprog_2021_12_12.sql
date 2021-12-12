-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Gru 2021, 16:47
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pprog_2021_12_12`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jedzenie`
--

CREATE TABLE `jedzenie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(64) NOT NULL,
  `id_rodzaj` int(11) NOT NULL,
  `data_utworzenia` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `jedzenie`
--

INSERT INTO `jedzenie` (`id`, `nazwa`, `id_rodzaj`, `data_utworzenia`) VALUES
(1, 'marchewka', 2, '2021-12-12'),
(2, 'hot-dog', 1, '2021-12-12'),
(3, 'pomidor', 2, '2021-12-12'),
(4, 'hamburger', 1, '2021-12-12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj`
--

CREATE TABLE `rodzaj` (
  `id_rodzaj` int(11) NOT NULL,
  `rodzaj` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `rodzaj`
--

INSERT INTO `rodzaj` (`id_rodzaj`, `rodzaj`) VALUES
(1, 'fast-food'),
(2, 'warzywo');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `jedzenie`
--
ALTER TABLE `jedzenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rodzaj` (`id_rodzaj`);

--
-- Indeksy dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  ADD PRIMARY KEY (`id_rodzaj`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `jedzenie`
--
ALTER TABLE `jedzenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  MODIFY `id_rodzaj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `jedzenie`
--
ALTER TABLE `jedzenie`
  ADD CONSTRAINT `jedzenie_ibfk_1` FOREIGN KEY (`id_rodzaj`) REFERENCES `rodzaj` (`id_rodzaj`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
