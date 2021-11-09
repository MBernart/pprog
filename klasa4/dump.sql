-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lis 2021, 07:46
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Baza danych: `pprog_lekcja`
--
-- --------------------------------------------------------
--
-- Struktura tabeli dla tabeli `users`
--
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `birthday` date NOT NULL,
  `height` decimal(5, 2) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
--
-- Zrzut danych tabeli `users`
--
INSERT INTO `users` (`id`, `name`, `surname`, `birthday`, `height`)
VALUES (NULL, 'Janusz', 'Nowak', '2021-10-09', '170.23'),
  (NULL, 'Paweł', 'Kloc', '2021-10-04', '150.00'),
  (NULL, 'Patryk', 'Janiak', '2002-04-24', '120.00'),
  (
    NULL,
    'Jędrzej',
    'Dozimy',
    '2003-12-05',
    '180.00'
  ),
  (
    NULL,
    'Jarosław',
    'Szyper',
    '1564-10-11',
    '150.00'
  ) (
    NULL,
    'Wojciech',
    'Kowalewski',
    '1969-12-06',
    '170'
  );
--
-- Indeksy dla zrzutów tabel
--
--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT dla zrzuconych tabel
--
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
COMMIT;