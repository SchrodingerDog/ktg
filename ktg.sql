-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 26 Paź 2013, 21:50
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
CREATE DATABASE IF NOT EXISTS `ktg` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `ktg`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zdjecie` text COLLATE latin1_general_cs NOT NULL,
  `imie` text COLLATE latin1_general_cs NOT NULL,
  `nazwisko` text COLLATE latin1_general_cs NOT NULL,
  `opis` text COLLATE latin1_general_cs NOT NULL,
  `super_user` tinyint(1) NOT NULL,
  `login` text COLLATE latin1_general_cs NOT NULL,
  `thumb` text COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=18 ;

--
-- Zrzut danych tabeli `members`
--

INSERT INTO `members` (`id`, `zdjecie`, `imie`, `nazwisko`, `opis`, `super_user`, `login`, `thumb`) VALUES
(1, 'member_photos\\lbpvXmZ.jpg', 'Kamil', 'Pro?ciewicz', 'Kreator Strony, murzyn korporacyjny', 1, 'kampro512', 'member_photos\\thumbs\\lbpvXmZ.jpg'),
(2, 'member_photos\\blank_user.gif', 'Kamil', 'Prosciewicz', 'aaaaaaa', 0, '', 'member_photos\\blank_user.gif'),
(3, 'member_photos\\blank_user.gif', 'Adam', 'Kowalski', 'bbbbbbbbb', 0, '', 'member_photos\\blank_user.gif'),
(4, 'member_photos\\911850_378291288968779_1616483127_n.jpg', 'Adam', 'Mickiewicz', 'testing testing', 0, '', 'member_photos\\blank_user.gif'),
(5, 'member_photos\\blank_user.gif', 'Dorota', 'Tyralik', 'aaaaaa Plaseholder', 1, 'dortyr67', 'member_photos\\blank_user.gif'),
(17, 'member_photos\\Squirrel-nice-wallpaper.jpg', 'Wiewiórka', 'Ruda', 'Lol', 0, 'wierud104', 'member_photos\\thumbs\\Squirrel-nice-wallpaper.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tytul` text COLLATE latin1_general_cs NOT NULL,
  `tresc` text COLLATE latin1_general_cs NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `tytul`, `tresc`, `created`) VALUES
(1, 'Tytul1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-10-20'),
(2, 'Tytul2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-10-20'),
(3, 'Tytul3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-10-20'),
(4, 'Tytul4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2013-10-20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
