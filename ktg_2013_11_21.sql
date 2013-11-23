-- 
-- Structure for table `galeries`
-- 

DROP TABLE IF EXISTS `galeries`;
CREATE TABLE IF NOT EXISTS `galeries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ilosc_zdj` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Data for table `galeries`
-- 

INSERT INTO `galeries` (`id`, `ilosc_zdj`) VALUES
  ('1', '45'),
  ('6', '20');

-- 
-- Structure for table `members`
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Data for table `members`
-- 

INSERT INTO `members` (`id`, `zdjecie`, `imie`, `nazwisko`, `opis`, `super_user`, `login`, `thumb`, `ord`) VALUES
  ('1', 'member_photos/dor_tyr.jpg', 'Dorota', 'Tyralik', 'Opiekunka koła', '0', 'dortyr67', 'member_photos/thumbs/dor_tyr.jpg', '1'),
  ('2', 'member_photos/luk_zal.jpg', 'Łukasz', 'Załucki', 'Drugi opiekun koła', '0', 'Łuza', 'member_photos/thumbs/luk_zal.jpg', '2'),
  ('3', 'member_photos/seb_fij.jpg', 'Sebastian', 'Fijak', 'Przewodnik', '0', 'sebfij95', 'member_photos/thumbs/seb_fij.jpg', '3'),
  ('4', 'member_photos/mac_flo.jpg', 'Maciej', 'Florys', 'Przewodnik', '0', 'macflo66', 'member_photos/thumbs/mac_flo.jpg', '4'),
  ('5', 'member_photos/joa_sta.jpg', 'Joanna', 'Stasielak', 'Przewodniczka', '0', 'joasta69', 'member_photos/thumbs/joa_sta.jpg', '5'),
  ('6', 'member_photos/dam_per.jpg', 'Damian', 'Peruń', 'Brak opisu', '0', 'damper66', 'member_photos/thumbs/dam_per.jpg', '6'),
  ('7', 'member_photos/paw_dud.jpg', 'Paweł', 'Dudek', 'Brak opisu', '0', 'pawdud65', 'member_photos/thumbs/paw_dud.jpg', '7'),
  ('8', 'member_photos/mat_cie.jpg', 'Mateusz', 'Cieśla', 'Brak opisu', '0', 'matcie77', 'member_photos/thumbs/mat_cie.jpg', '8'),
  ('9', 'member_photos/pat_ges.jpg', 'Patryk', 'Gęsikowski', 'Brak opisu', '0', 'patgę611', 'member_photos/thumbs/pat_ges.jpg', '9'),
  ('10', 'member_photos/agn_rej.jpg', 'Agnieszka', 'Rejdak', 'Brak opisu', '0', 'agnrej96', 'member_photos/thumbs/agn_rej.jpg', '10'),
  ('11', 'member_photos/grz_mis.jpg', 'Grzegorz', 'Miszczyk', 'Brak opisu', '0', 'grzmis88', 'member_photos/thumbs/grz_mis.jpg', '11'),
  ('12', 'member_photos/joa_pie.jpg', 'Joanna', 'Piekarska', 'Brak opisu', '0', 'joapie69', 'member_photos/thumbs/joa_pie.jpg', '12'),
  ('13', 'member_photos/mar_pie.jpg', 'Martyna', 'Pietraszek', 'Brak opisu', '0', 'marpie710', 'member_photos/thumbs/mar_pie.jpg', '13'),
  ('14', 'member_photos/seb_kol.jpg', 'Sebastian', 'Kołosowski', 'Brak opisu', '0', 'sebko', 'member_photos/thumbs/seb_kol.jpg', '14'),
  ('15', 'member_photos/bar_pla.jpg', 'Bartosz', 'Płaneta', 'Brak opisu', '0', 'barpł78', 'member_photos/thumbs/bar_pla.jpg', '15'),
  ('16', 'member_photos/tom_zal.jpg', 'Tomasz', 'Załupski', 'Brak opisu', '0', 'tomza', 'member_photos/thumbs/tom_zal.jpg', '16'),
  ('17', 'member_photos/kam_pro.jpg', 'Kamil', 'Prościewicz', 'Kreator strony', '1', 'kampro512', 'member_photos/thumbs/kam_pro.jpg', '17');

-- 
-- Structure for table `posts`
-- 

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tytul` text COLLATE utf8_unicode_ci NOT NULL,
  `tresc` text COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Data for table `posts`
-- 

INSERT INTO `posts` (`id`, `tytul`, `tresc`, `created`) VALUES
  ('1', 'Koło Turystyki Górskiej', 'Od października 2011 w naszej szkole wznowiło działalność Koło Turystyki Górskiej, skupiające osoby „pozytywnie zakręcone” górami: nauczycieli, uczniów, absolwentów. W dniach 20 – 21 listopada wyruszyliśmy 11-osobową grupą na pierwszą wycieczkę w Gorce. Zdjęcia z wyprawy można obejrzeć w Multimedialnej Kronice Szkolnej pod adresem <a href=\"http://kronika.zse.edu.pl\">kronika.zse.edu.pl</a>  Niebawem kolejny, tym razem zimowy wyjazd, na Halę Krupową (Beskid Żywiecki, pasmo Policy). Odbędzie się w dniach 12-13 marca 2012. W programie między innymi wejście na Halę, następnie na rakietach śnieżnych na szczyt Okrąglicy 1239 m n.p.m , jak zwykle ognisko z pieczeniem kiełbasek, przejście bardzo widokowej trasy z Sidziny na Halę Krupową. Zapraszamy do wspólnych górskich wypadów z dużą dawką adrenaliny i przygody. Informacje i kontakt: mgr D. Tyralik (sala 131) albo mail: <a href=\"mailto:dor_ty@interia.pl\">dor_ty@interia.pl</a>', '2013-11-15'),
  ('2', 'Spotkanie KTG', 'W piątek 14.09 na przerwie o godz. 11.00 w sali 131 (pracownia geograficzna) odbędzie się spotkanie członków Koła Turystyki Górskiej. Na zebranie organizacyjne zapraszamy również wszystkie osoby chcące wstąpić do Koła. Niebawem kolejna wyprawa \"Tatry Zachodnie - dogrywka\".', '2013-11-15'),
  ('3', 'Wróciliśmy z Czerwonych!', 'W dniach 3 - 5 października Koło Turystyki Górskiej zrealizowało kolejną wycieczkę. Zgodnie z planem zdobyliśmy cztery ponad 2-tysięczniki, czyli Czerwone Wierchy: Ciemniak (2096 m n.p.m.), Krzesanica (2122 m n.p.m.), Małołączniak (2096 m n.p.m.), Kopa Kondracka (2005 m n.p.m.). Tego samego dnia, weszliśmy również na Giewont (1894 m n.p.m.). Wieczorem nocleg w najmniejszym tatrzańskim schronisku - na Hali Kondratowej. Trzeci dzień to wędrówka pięknym graniowym szlakiem na Kasprowy Wierch (1987 m n.p.m.), a potem do schroniska Murowaniec na hali Gąsienicowej. ', '2013-11-15'),
  ('4', 'Spotkanie z okazji Światowego Dnia Turystyki', 'W dniu 12 listopada o godzinie 13.30 w sali audiowiualnej, odbędzie się w ramach obchodów minionego, Światowego Dnia Turystyki, spotkanie członków naszego Koła oraz wszystkich chętnych, z naszym Gościem - miłośnikiem gór, który opowie o swoich podróżach do Indii i Nepalu, prezentując jednocześnie materiał fotograficzny. Udział w slajdowisku jest bezpłatny. Serdecznie zapraszamy :)', '2013-11-15');

-- 
-- Structure for table `wyprawy`
-- 

DROP TABLE IF EXISTS `wyprawy`;
CREATE TABLE IF NOT EXISTS `wyprawy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Data for table `wyprawy`
-- 

INSERT INTO `wyprawy` (`id`, `cel`, `data`) VALUES
  ('1', 'Wałbrzych', '2013-10-31'),
  ('2', 'Kraków', '2013-10-31'),
  ('3', 'Będzin', '2013-10-31'),
  ('4', 'Nibylandia', '2013-10-31'),
  ('6', 'Konin', '2011-01-01');

-- 
-- Structure for table `wyprawy_czlonkowie`
-- 

DROP TABLE IF EXISTS `wyprawy_czlonkowie`;
CREATE TABLE IF NOT EXISTS `wyprawy_czlonkowie` (
  `wyprawa_id` int(11) NOT NULL,
  `czlonek_id` int(11) NOT NULL,
  KEY `wyprawa_id` (`wyprawa_id`,`czlonek_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Data for table `wyprawy_czlonkowie`
-- 

INSERT INTO `wyprawy_czlonkowie` (`wyprawa_id`, `czlonek_id`) VALUES
  ('1', '1'),
  ('1', '2'),
  ('1', '3'),
  ('1', '4'),
  ('2', '1'),
  ('2', '4'),
  ('3', '2'),
  ('3', '3'),
  ('4', '1'),
  ('4', '5'),
  ('4', '6'),
  ('6', '2'),
  ('6', '3'),
  ('6', '5'),
  ('6', '6');

