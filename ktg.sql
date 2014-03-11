-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 11 Mar 2014, 20:11
-- Wersja serwera: 5.5.32
-- Wersja PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `ktg`
--
CREATE DATABASE IF NOT EXISTS `ktg` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `ktg`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeries`
--

DROP TABLE IF EXISTS `galeries`;
CREATE TABLE IF NOT EXISTS `galeries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ilosc_zdj` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `galeries`
--

INSERT INTO `galeries` (`id`, `ilosc_zdj`) VALUES
(1, 20),
(2, 10),
(3, 9),
(4, 20),
(5, 11),
(6, 7),
(7, 8),
(8, 4),
(9, 17),
(10, 30),
(11, 81);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zdjecie` text COLLATE utf8_unicode_ci NOT NULL,
  `imie` text COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` text COLLATE utf8_unicode_ci NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `super_user` tinyint(1) NOT NULL,
  `login` text COLLATE utf8_unicode_ci NOT NULL,
  `thumb` text COLLATE utf8_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `members`
--

INSERT INTO `members` (`id`, `zdjecie`, `imie`, `nazwisko`, `opis`, `super_user`, `login`, `thumb`, `ord`) VALUES
(1, 'member_photos/dor_tyr.jpg', 'Dorota', 'Tyralik', 'Opiekunka koła', 0, 'dortyr67', 'member_photos/thumbs/dor_tyr.jpg', 1),
(2, 'member_photos/luk_zal.jpg', 'Łukasz', 'Załucki', 'Drugi opiekun koła', 0, 'Łuza', 'member_photos/thumbs/luk_zal.jpg', 3),
(3, 'member_photos/seb_fij.jpg', 'Sebastian', 'Fijak', 'Przewodnik', 0, 'sebfij95', 'member_photos/thumbs/seb_fij.jpg', 4),
(4, 'member_photos/mac_flo.jpg', 'Maciej', 'Florys', 'Przewodnik', 0, 'macflo66', 'member_photos/thumbs/mac_flo.jpg', 5),
(5, 'member_photos/joa_sta.jpg', 'Joanna', 'Stasielak', 'Przewodniczka', 0, 'joasta69', 'member_photos/thumbs/joa_sta.jpg', 6),
(6, 'member_photos/dam_per.jpg', 'Damian', 'Peruń', 'Brak opisu', 0, 'damper66', 'member_photos/thumbs/dam_per.jpg', 7),
(7, 'member_photos/paw_dud.jpg', 'Paweł', 'Dudek', 'Brak opisu', 0, 'pawdud65', 'member_photos/thumbs/paw_dud.jpg', 8),
(8, 'member_photos/mat_cie.jpg', 'Mateusz', 'Cieśla', 'Brak opisu', 0, 'matcie77', 'member_photos/thumbs/mat_cie.jpg', 9),
(9, 'member_photos/pat_ges.jpg', 'Patryk', 'Gęsikowski', 'Brak opisu', 0, 'patgę611', 'member_photos/thumbs/pat_ges.jpg', 10),
(10, 'member_photos/agn_rej.jpg', 'Agnieszka', 'Rejdak', 'Brak opisu', 0, 'agnrej96', 'member_photos/thumbs/agn_rej.jpg', 11),
(11, 'member_photos/grz_mis.jpg', 'Grzegorz', 'Miszczyk', 'Brak opisu', 0, 'grzmis88', 'member_photos/thumbs/grz_mis.jpg', 12),
(12, 'member_photos/joa_pie.jpg', 'Joanna', 'Piekarska', 'Brak opisu', 0, 'joapie69', 'member_photos/thumbs/joa_pie.jpg', 13),
(13, 'member_photos/mar_pie.jpg', 'Martyna', 'Pietraszek', 'Brak opisu', 0, 'marpie710', 'member_photos/thumbs/mar_pie.jpg', 14),
(14, 'member_photos/seb_kol.jpg', 'Sebastian', 'Kołosowski', 'Brak opisu', 0, 'sebko', 'member_photos/thumbs/seb_kol.jpg', 15),
(15, 'member_photos/bar_pla.jpg', 'Bartosz', 'Płaneta', 'Brak opisu', 0, 'barpł78', 'member_photos/thumbs/bar_pla.jpg', 16),
(16, 'member_photos/tom_zal.jpg', 'Tomasz', 'Załupski', 'Brak opisu', 0, 'tomza', 'member_photos/thumbs/tom_zal.jpg', 17),
(17, 'member_photos/kam_pro.jpg', 'Kamil', 'Prościewicz', 'Kreator strony', 1, 'kampro512', 'member_photos/thumbs/kam_pro.jpg', 18);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tytul` text COLLATE utf8_unicode_ci NOT NULL,
  `tresc` text COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `tytul`, `tresc`, `created`) VALUES
(1, 'Koło Turystyki Górskiej', 'Od października 2011 w naszej szkole wznowiło działalność Koło Turystyki Górskiej, skupiające osoby „pozytywnie zakręcone” górami: nauczycieli, uczniów, absolwentów. W dniach 20 – 21 listopada wyruszyliśmy 11-osobową grupą na pierwszą wycieczkę w Gorce. Zdjęcia z wyprawy można obejrzeć w Multimedialnej Kronice Szkolnej pod adresem <a href="http://kronika.zse.edu.pl">kronika.zse.edu.pl</a>  Niebawem kolejny, tym razem zimowy wyjazd, na Halę Krupową (Beskid Żywiecki, pasmo Policy). Odbędzie się w dniach 12-13 marca 2012. W programie między innymi wejście na Halę, następnie na rakietach śnieżnych na szczyt Okrąglicy 1239 m n.p.m , jak zwykle ognisko z pieczeniem kiełbasek, przejście bardzo widokowej trasy z Sidziny na Halę Krupową. Zapraszamy do wspólnych górskich wypadów z dużą dawką adrenaliny i przygody. Informacje i kontakt: mgr D. Tyralik (sala 131) albo mail: <a href="mailto:dor_ty@interia.pl">dor_ty@interia.pl</a>', '2013-11-15'),
(2, 'Spotkanie KTG', 'W piątek 14.09 na przerwie o godz. 11.00 w sali 131 (pracownia geograficzna) odbędzie się spotkanie członków Koła Turystyki Górskiej. Na zebranie organizacyjne zapraszamy również wszystkie osoby chcące wstąpić do Koła. Niebawem kolejna wyprawa "Tatry Zachodnie - dogrywka".', '2013-11-15'),
(3, 'Wróciliśmy z Czerwonych!', 'W dniach 3 - 5 października Koło Turystyki Górskiej zrealizowało kolejną wycieczkę. Zgodnie z planem zdobyliśmy cztery ponad 2-tysięczniki, czyli Czerwone Wierchy: Ciemniak (2096 m n.p.m.), Krzesanica (2122 m n.p.m.), Małołączniak (2096 m n.p.m.), Kopa Kondracka (2005 m n.p.m.). Tego samego dnia, weszliśmy również na Giewont (1894 m n.p.m.). Wieczorem nocleg w najmniejszym tatrzańskim schronisku - na Hali Kondratowej. Trzeci dzień to wędrówka pięknym graniowym szlakiem na Kasprowy Wierch (1987 m n.p.m.), a potem do schroniska Murowaniec na hali Gąsienicowej. ', '2013-11-15'),
(4, 'Spotkanie z okazji Światowego Dnia Turystyki', 'W dniu 12 listopada o godzinie 13.30 w sali audiowiualnej, odbędzie się w ramach obchodów minionego, Światowego Dnia Turystyki, spotkanie członków naszego Koła oraz wszystkich chętnych, z naszym Gościem - miłośnikiem gór, który opowie o swoich podróżach do Indii i Nepalu, prezentując jednocześnie materiał fotograficzny. Udział w slajdowisku jest bezpłatny. Serdecznie zapraszamy :)', '2013-11-15');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyprawy`
--

DROP TABLE IF EXISTS `wyprawy`;
CREATE TABLE IF NOT EXISTS `wyprawy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `wyprawy`
--

INSERT INTO `wyprawy` (`id`, `cel`, `data`) VALUES
(1, 'Lackowa', '2005-06-26'),
(2, 'Radziejowa', '2005-11-05'),
(3, 'Skrzyczne', '2006-04-02'),
(4, 'Turbacz', '2012-02-14'),
(5, 'Rajd PTTK Rysianka', '2007-10-05'),
(6, 'Pilsko', '2006-11-21'),
(7, 'Góry Stołowe i Kotlina Kłodzka', '2007-04-29'),
(8, 'Beskid Żywiecki', '2013-04-16'),
(9, 'Bieszczady', '2006-06-17'),
(10, 'Tatry', '2012-09-12'),
(11, 'Tatry powtórka', '2012-10-21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wyprawy_czlonkowie`
--

DROP TABLE IF EXISTS `wyprawy_czlonkowie`;
CREATE TABLE IF NOT EXISTS `wyprawy_czlonkowie` (
  `wyprawa_id` int(11) NOT NULL,
  `czlonek_id` int(11) NOT NULL,
  KEY `wyprawa_id` (`wyprawa_id`,`czlonek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
