-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 21 Gru 2011, 15:48
-- Wersja serwera: 5.5.10
-- Wersja PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `kursmysqli`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `klienci`
--

CREATE TABLE IF NOT EXISTS `klienci` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(80) DEFAULT NULL,
  `login` varchar(200) NOT NULL,
  `haslo` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `wiek` tinyint(3) unsigned DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL COMMENT 'Skąd klient przyszedł',
  `newsletter` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Czy zapisany do newslettera',
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `haslo` (`haslo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `klienci`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `klienci2`
--

CREATE TABLE IF NOT EXISTS `klienci2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(80) DEFAULT NULL,
  `login` varchar(200) NOT NULL,
  `haslo` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `wiek` tinyint(3) unsigned DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL COMMENT 'Skąd klient przyszedł',
  `newsletter` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Czy zapisany do newslettera',
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `haslo` (`haslo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `klienci2`
--

INSERT INTO `klienci2` (`id`, `email`, `login`, `haslo`, `imie`, `nazwisko`, `wiek`, `ref`, `newsletter`, `register_time`) VALUES
(1, 'abc@domena.pl', 'a', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', NULL, NULL, 0, '0000-00-00 00:00:00'),
(2, 'kiras445@domena.pl', '2', '3d7565e407281e04cce7bd1b8f7d79724b91ab884501cdf448462948798310e81ae25df29ec3dd9e96c0c98831068a0a754c7f7001f9ff610e15b0150e7349ef', 'Aleksander', 'Nowak', 20, NULL, 1, '0000-00-00 00:00:00'),
(3, 'grizzzlyyy41@domena.pl', 'grizzzlyyy41', 'c239ef122a8e0a863f32bb5ed8f1b880ec5c9248284b2860bd2324fb100b9839e4a0af1d57472b14586543e2c49547be78af00375b509ebdf1913fa7e65f4a7d', 'Anita', 'Nuwenkartenbun', 20, NULL, 1, '0000-00-00 00:00:00'),
(4, 'karminek@domena.pl', 'Karminek ', '0f89ecaa05ac483da5eb8855825cd43ee460704cee1a82322a0a8929876dc8d5cb256451c1644f6a0c3b05b29a383c7608da07715ba5ead8143638b4bde366ac', 'Michał', 'Nosalmin', 38, 'http://videokurs.pl', 0, '0000-00-00 00:00:00'),
(6, 'gosc@innadomena.pl', '', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', 255, NULL, 1, '0000-00-00 00:00:00'),
(10, 'gosc@innadomena.pl', 'abcd', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', NULL, NULL, 1, '0000-00-00 00:00:00'),
(12, 'gosc@innadomena.pl', 'hasdhasdh', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', NULL, NULL, 0, '0000-00-00 00:00:00'),
(14, 'agsdgasdg@innadomena.pl', 'agsdgasdg', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', '', '', NULL, NULL, 1, '2011-09-28 14:44:05'),
(16, 'agsdgasdg@innadomena.pl', '<script>alert(''test'')</script>', '', '', '', NULL, NULL, 1, '2011-10-04 13:27:57'),
(17, 'ala@dom.pl', '<b style=''font-size: 22px;'' onmouseover="javascript:alert(''lala'');">aa</b>', '', '', '', NULL, NULL, 0, '2011-10-04 13:28:24'),
(18, 'ala@dom.pl', '&#60;script&#62;alert(&#39;test&#39;)&#60;/script&#62;', '', '', '', NULL, NULL, 1, '2011-10-04 13:28:39'),
(20, NULL, '<script>alert(''tssest'')</script>', '', '', '', NULL, NULL, 1, '2011-10-04 13:31:45');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `klienci4`
--

CREATE TABLE IF NOT EXISTS `klienci4` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(80) DEFAULT NULL,
  `login` varchar(200) NOT NULL,
  `haslo` char(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `imie` varchar(20) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `wiek` tinyint(3) unsigned DEFAULT NULL,
  `ref` varchar(100) DEFAULT NULL COMMENT 'Skąd klient przyszedł',
  `newsletter` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Czy zapisany do newslettera',
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  KEY `haslo` (`haslo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `klienci4`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `newsletter_emails`
--

CREATE TABLE IF NOT EXISTS `newsletter_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `newsletter_emails`
--

INSERT INTO `newsletter_emails` (`id`, `email`) VALUES
(1, 'kiras445@domena.pl'),
(2, 'gosc@innadomena.pl'),
(3, 'ala@dom.pl'),
(4, 'asd@domennnana.pl'),
(5, 'ktostam@domena.pl'),
(6, 'pustkaaslalala@com.pl'),
(7, 'tralalala@domen4.pl'),
(8, 'tralalala@domen4.pl'),
(9, 'tralalala@domen4.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'post_id',
  `topic_id` int(10) unsigned NOT NULL,
  `poster_id` int(10) unsigned NOT NULL COMMENT 'id_klienta',
  `category_id` int(10) unsigned NOT NULL,
  `post_subject` varchar(255) NOT NULL,
  `post_text` mediumtext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `poster_id` (`poster_id`),
  KEY `category_id` (`category_id`),
  FULLTEXT KEY `post_subject` (`post_subject`),
  FULLTEXT KEY `post_text` (`post_text`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `topic_id`, `poster_id`, `category_id`, `post_subject`, `post_text`) VALUES
(1, 3, 1, 3, 'Video Kurs MySQL Wydanie 2', 'Witam,\r\n\r\nAktualnie pracuję nad aktualizacją video kursu poświęconego MySql.\r\n\r\nJeśli macie jakieś propozycje odnośnie tego kursu to dajcie tutaj znać \r\n\r\nPierwsza lekcja kursu MySQL jest już dostępna na Youtube:\r\nhttp://www.youtube.com/watch?v=MC_hjq512XE\r\n\r\nPozdrawiam serdecznie,\r\n\r\nArkadiusz Włodarczyk'),
(2, 3, 2, 3, 'Re: Video Kurs MySQL Wydanie 2', 'Co nowego zobaczymy w kursie MySQL?'),
(4, 3, 1, 3, '', '"Co nowego zobaczymy w kursie"\r\nOmówimy dokładniej...\r\n...\r\n...\r\n...\r\n...\r\n\r\n"Czy będzie coś na temat FullText Search?"\r\n\r\nTak, FullText Search zost anie dokładnie omówiony.'),
(5, 3, 14, 3, 'Oracle', 'A co z kursem o Oracle?');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `produkty`
--

CREATE TABLE IF NOT EXISTS `produkty` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(200) NOT NULL,
  `cena` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`) VALUES
(1, 'Video Kurs C++', '39.00'),
(2, 'Video Kurs Java', '39.00'),
(3, 'Video Kurs PHP 5.3', '37.00'),
(4, 'Video Kurs XHTML i CSS', '39.00'),
(5, 'Video Kurs XML i DTD', '17.00'),
(6, 'Matematyka: Logika i Zbiory', '7.77'),
(7, 'Video Kurs jQuery', '34.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `tralala`
--

CREATE TABLE IF NOT EXISTS `tralala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `tralala`
--


-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `widok_zamowien`
--
CREATE TABLE IF NOT EXISTS `widok_zamowien` (
`id_klienta` int(10) unsigned
,`email` varchar(80)
,`id_zamowienia` int(10) unsigned
,`szt` decimal(27,0)
,`kwota` decimal(33,2)
,`data_zlozenia_zamowienia` timestamp
);
-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `widok_zamowien_poszczegolnych_kursow`
--
CREATE TABLE IF NOT EXISTS `widok_zamowien_poszczegolnych_kursow` (
`id_klienta` int(10) unsigned
,`email` varchar(80)
,`id_zamowienia` int(10) unsigned
,`szt` decimal(27,0)
,`kwota` decimal(33,2)
,`nazwa` varchar(200)
,`data_zlozenia_zamowienia` timestamp
);
-- --------------------------------------------------------

--
-- Struktura tabeli dla  `zamowienia`
--

CREATE TABLE IF NOT EXISTS `zamowienia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_klienta` int(10) unsigned DEFAULT NULL,
  `data_zlozenia_zamowienia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_klienta` (`id_klienta`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `zamowienia`
--

INSERT INTO `zamowienia` (`id`, `id_klienta`, `data_zlozenia_zamowienia`) VALUES
(1, NULL, '2011-10-14 10:25:33'),
(2, NULL, '2011-10-17 14:38:52'),
(3, NULL, '2011-10-10 10:00:00'),
(4, NULL, '2011-03-16 11:17:26');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `zamowione_produkty`
--

CREATE TABLE IF NOT EXISTS `zamowione_produkty` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_zamowienia` int(10) unsigned NOT NULL,
  `id_produktu` mediumint(10) unsigned DEFAULT NULL,
  `ilosc` smallint(5) unsigned NOT NULL DEFAULT '1',
  `cena_za_szt` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_zamowienia` (`id_zamowienia`),
  KEY `id_produktu` (`id_produktu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `zamowione_produkty`
--

INSERT INTO `zamowione_produkty` (`id`, `id_zamowienia`, `id_produktu`, `ilosc`, `cena_za_szt`) VALUES
(1, 1, 1, 1, '39.00'),
(2, 1, 6, 10, '4.50'),
(3, 2, 5, 1, '17.00'),
(4, 3, 7, 1, '34.00'),
(5, 4, 1, 1, '35.00'),
(6, 4, 2, 1, '35.00'),
(7, 4, 4, 1, '35.00'),
(9, 4, 6, 1, '5.15'),
(10, 4, 7, 1, '29.50'),
(11, 2, 5, 5, '20.00');

-- --------------------------------------------------------

--
-- Struktura widoku `widok_zamowien`
--
DROP TABLE IF EXISTS `widok_zamowien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `widok_zamowien` AS select `k`.`id` AS `id_klienta`,`k`.`email` AS `email`,`zp`.`id_zamowienia` AS `id_zamowienia`,sum(`zp`.`ilosc`) AS `szt`,sum((`zp`.`ilosc` * `zp`.`cena_za_szt`)) AS `kwota`,`z`.`data_zlozenia_zamowienia` AS `data_zlozenia_zamowienia` from ((`zamowione_produkty` `zp` join `zamowienia` `z` on((`zp`.`id_zamowienia` = `z`.`id`))) join `klienci` `k` on((`k`.`id` = `z`.`id_klienta`))) group by `zp`.`id_zamowienia`;

-- --------------------------------------------------------

--
-- Struktura widoku `widok_zamowien_poszczegolnych_kursow`
--
DROP TABLE IF EXISTS `widok_zamowien_poszczegolnych_kursow`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `widok_zamowien_poszczegolnych_kursow` AS select `k`.`id` AS `id_klienta`,`k`.`email` AS `email`,`zp`.`id_zamowienia` AS `id_zamowienia`,sum(`zp`.`ilosc`) AS `szt`,sum((`zp`.`ilosc` * `zp`.`cena_za_szt`)) AS `kwota`,`p`.`nazwa` AS `nazwa`,`z`.`data_zlozenia_zamowienia` AS `data_zlozenia_zamowienia` from (((`zamowione_produkty` `zp` join `zamowienia` `z` on((`zp`.`id_zamowienia` = `z`.`id`))) join `klienci` `k` on((`k`.`id` = `z`.`id_klienta`))) join `produkty` `p` on((`p`.`id` = `zp`.`id_produktu`))) group by `zp`.`id_zamowienia`,`zp`.`id_produktu`;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zamowione_produkty`
--
ALTER TABLE `zamowione_produkty`
  ADD CONSTRAINT `zamowione_produkty_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zamowione_produkty_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `produkty` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
