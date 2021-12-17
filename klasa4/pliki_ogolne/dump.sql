-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Lis 2021, 06:45
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

DROP TABLE IF EXISTS `pprog_lekcja`.`users`;
CREATE TABLE IF NOT EXISTS `pprog_lekcja`.`users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `birthday` date NOT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `pprog_lekcja`.`users` (`name`, `surname`, `birthday`, `height`) VALUES
('Marta', 'Grześkuwska', '1999-12-06', '160.00'),
('Benigna', 'Jaskulska', '1800-12-24', '100.00'),
('Romuald', 'Jędraszewski', '1969-09-15', '178.00'),
('Ewa', 'Gurska', '2003-10-12', '112.00'),
('Paulina', 'Fręsiwąs', '1212-12-12', '170.00'),
('Barbara', 'Kozikowska-NieGach-Kaczkowiak', '1500-02-15', '150.00'),
('Krystian', 'Kuleczkowski', '2005-10-15', '100.00'),
('Joanna', 'Ciężka-Wąsko', '2003-10-15', '120.00');
COMMIT;