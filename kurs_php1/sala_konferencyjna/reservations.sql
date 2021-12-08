-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Wrz 2021, 13:34
-- Wersja serwera: 10.4.17-MariaDB
-- Wersja PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `reservationofrooms`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reservations`
--

CREATE TABLE `reservations` (
  `id_reservation` int(10) UNSIGNED NOT NULL,
  `dateOfReservation` date NOT NULL,
  `time_start` time NOT NULL,
  `time_stop` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `dateOfReservation`, `time_start`, `time_stop`) VALUES
(1, '2021-09-20', '20:46:00', '21:46:00'),
(2, '2021-09-20', '20:33:00', '21:33:00'),
(3, '2021-09-21', '10:45:00', '11:45:00'),
(4, '2021-09-21', '10:50:00', '11:40:00'),
(5, '2021-09-21', '10:52:00', '11:40:00'),
(6, '2021-09-21', '10:57:00', '11:36:00'),
(7, '2021-09-28', '14:00:00', '15:00:00'),
(8, '2021-09-21', '10:30:00', '11:37:00'),
(9, '2021-09-21', '10:11:00', '11:13:00'),
(10, '2021-09-21', '10:40:00', '11:37:00'),
(11, '2021-09-21', '10:30:00', '11:36:00'),
(18, '2021-09-25', '09:56:00', '11:56:00'),
(19, '2021-12-25', '13:23:00', '15:24:00'),
(20, '2021-09-22', '17:20:00', '19:20:00');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reservation`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reservation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
