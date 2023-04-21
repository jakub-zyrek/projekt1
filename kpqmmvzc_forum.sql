-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 17 Kwi 2023, 22:23
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kpqmmvzc_forum`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `administratorzy`
--

CREATE TABLE `administratorzy` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `typ_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `instrukcje`
--

CREATE TABLE `instrukcje` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `plik` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `instrukcje`
--

INSERT INTO `instrukcje` (`id`, `tytul`, `plik`) VALUES
(1, 'terte', 'rerter'),
(2, 'Deklaracja dostepności', 'essa.png');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `kategorie`
--

INSERT INTO `kategorie` (`id`, `nazwa`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(17, '!ew'),
(18, '!ew'),
(19, '!ew'),
(20, ' ew'),
(21, ' 3'),
(22, '+3'),
(23, '+3'),
(24, '+4'),
(25, ' 2'),
(26, ' 2'),
(27, '2 '),
(28, '3!'),
(29, '!#$&&#8216;()*+,/:;=?@[]'),
(30, '&#34;&#34;&#34;'),
(31, 'rww'),
(32, 'tryry'),
(33, 'guyfyufyu'),
(34, '222'),
(35, '&#34;&#34;'),
(36, 'we'),
(37, 'er'),
(38, 're'),
(39, 'gyg'),
(40, 'sdds'),
(41, 'rqqr'),
(42, 'rqqr'),
(43, 'rere'),
(44, 'trr'),
(45, 'trtr'),
(46, 'dada'),
(47, 'ft'),
(48, 'fsf'),
(49, 'te'),
(50, 'te'),
(51, 'qwerty'),
(52, 'qwerty'),
(53, 'cvxxfdx'),
(54, 'iyyiiyyi'),
(55, 'wertyui'),
(56, 'ert'),
(57, 'd'),
(58, 'gyg'),
(59, 'bycz'),
(60, 'bycz'),
(61, 'fs'),
(62, 'rewr'),
(63, 'rewr'),
(64, 'rewr'),
(65, 'bycz'),
(66, 'rar'),
(67, 'rar'),
(68, 'yer'),
(69, 'yer'),
(70, 'tw'),
(71, 'bd'),
(72, 'gee'),
(73, 'bycz'),
(74, 'ertyu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kod_rabatowy`
--

CREATE TABLE `kod_rabatowy` (
  `id` int(11) NOT NULL,
  `kod` varchar(10) NOT NULL,
  `znizka_pro` int(3) DEFAULT NULL,
  `znizka_zl` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `kod_rabatowy`
--

INSERT INTO `kod_rabatowy` (`id`, `kod`, `znizka_pro`, `znizka_zl`) VALUES
(1, 'ABC', 20, NULL),
(2, '123', NULL, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarze`
--

CREATE TABLE `komentarze` (
  `id` int(11) NOT NULL,
  `odpowiedz_id` int(11) NOT NULL,
  `komentarz` varchar(300) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `komentarze`
--

INSERT INTO `komentarze` (`id`, `odpowiedz_id`, `komentarz`, `uzytkownik_id`) VALUES
(1, 1, 'Komentarz 1', 1),
(2, 1, 'Komentarz 2', 1),
(3, 1, 'Komentarz 3', 1),
(26, 2, 'cena', 1),
(27, 2, 'Jeżu !@#$%%^&*(', 1),
(28, 2, '!@#$', 1),
(29, 2, '!@#$%^&*', 1),
(30, 2, 'd', 1),
(31, 2, 'd', 1),
(32, 2, 'Ja nie mogę!!!', 1),
(33, 2, '', 1),
(34, 2, '!', 1),
(35, 2, 'Ja nie mogę', 1),
(36, 2, 'dlacego', 1),
(37, 2, 'ęęę!!!!', 1),
(38, 2, 'Ja nie mogę', 1),
(39, 2, 'g', 1),
(40, 2, 'Ja nie', 1),
(41, 2, 'sa', 1),
(42, 2, 'saS', 1),
(43, 2, 'Ja nie mogę', 1),
(44, 2, 'Ja nie mogę', 1),
(45, 2, 'da', 1),
(46, 2, 'ja nie moge', 1),
(47, 2, 's', 1),
(48, 2, 'ja', 1),
(49, 2, 'ja nie mogę', 1),
(50, 2, 'Ja nie mogę', 1),
(51, 2, 'Bycz!!!', 1),
(52, 5, 'spoko', 1),
(53, 6, 'nie lubię cie', 1),
(54, 7, 'kocham', 1),
(55, 8, 'bycz', 4),
(56, 12, 'ale fajnie', 2),
(57, 10, 'jesu', 2);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `komentarze2`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `komentarze2` (
`id` int(11)
,`komentarz` varchar(300)
,`odpowiedz_id` int(11)
,`nick` varchar(50)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `liczba_kategorii`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `liczba_kategorii` (
`id` int(11)
,`liczba` bigint(21)
,`nazwa` varchar(30)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `liczba_odpowiedzi`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `liczba_odpowiedzi` (
`obraz` varchar(200)
,`id` int(11)
,`odp` bigint(21)
,`tytul` varchar(100)
,`nazwa` varchar(30)
,`nick` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `obiekt`
--

CREATE TABLE `obiekt` (
  `id` int(11) NOT NULL,
  `pytanie` int(11) DEFAULT NULL,
  `komentarz` int(11) DEFAULT NULL,
  `odpowiedz` int(11) DEFAULT NULL,
  `zgloszenie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `obiekt`
--

INSERT INTO `obiekt` (`id`, `pytanie`, `komentarz`, `odpowiedz`, `zgloszenie_id`) VALUES
(1, 3, NULL, NULL, 1),
(2, 10, NULL, NULL, 2),
(3, 8, 1, NULL, 3),
(4, NULL, NULL, 8, 4),
(5, NULL, NULL, 11, 5),
(6, NULL, NULL, 10, 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedz`
--

CREATE TABLE `odpowiedz` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL,
  `odpowiedz` varchar(2000) NOT NULL,
  `pytanie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `odpowiedz`
--

INSERT INTO `odpowiedz` (`id`, `uzytkownik_id`, `odpowiedz`, `pytanie_id`) VALUES
(1, 1, 'wefwefewfwefwefwe', 2),
(2, 1, 'eqwqwew', 23),
(5, 1, '<ol>\r\n<li>Moim zdaniem można</li>\r\n<li>Uwierz w SIEBIE ANNO</li>\r\n</ol>\r\n<p><strong><s><span style=\"text-decoration: underline;\"><em>POZDRAWIAM</em></span></s></strong></p>', 22),
(6, 1, '<p>Jolo to Maria Dazuur</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>NIE MOŻESZ TY GŁUPIA ANNO</p>', 22),
(7, 1, '<p>😗BYCZ</p>', 23),
(8, 1, '<p>ja uważam że nie</p>\r\n<p>&nbsp;</p>', 24),
(9, 1, '<ol>\r\n<li style=\"list-style-type: none;\">\r\n<ol>\r\n<li style=\"text-align: center;\"><s><span style=\"text-decoration: underline;\"><em><strong>tyvtv</strong></em></span></s></li>\r\n</ol>\r\n</li>\r\n</ol>', 15),
(10, 1, '', 24),
(11, 1, '', 24),
(12, 1, '', 24),
(13, 1, '', 24),
(14, 2, '<p><s><span style=\"text-decoration: underline;\"><em><strong>o co ci chodzi</strong></em></span></s></p>', 24),
(15, 2, '<p><s><span style=\"text-decoration: underline;\"><em><strong>o co ci chodzi</strong></em></span></s></p>', 24);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `odpowiedzi`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `odpowiedzi` (
`idd` int(11)
,`ranga` int(1)
,`id` int(11)
,`uzytkownik_id` int(11)
,`obraz` varchar(200)
,`nick` varchar(50)
,`odpowiedz` varchar(2000)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedz_zgloszenie`
--

CREATE TABLE `odpowiedz_zgloszenie` (
  `id` int(11) NOT NULL,
  `administrator_id` int(11) NOT NULL,
  `odpowiedz` varchar(200) NOT NULL,
  `zgloszenie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ostrzezenie`
--

CREATE TABLE `ostrzezenie` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `opis` varchar(200) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `ostrzezenie`
--

INSERT INTO `ostrzezenie` (`id`, `admin`, `uzytkownik_id`, `opis`, `data`) VALUES
(1, 1, 2, 'bla', '2023-04-17'),
(2, 3, 3, 'eqqeqe', '2023-04-12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `limit_pytan` int(11) DEFAULT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `plan`
--

INSERT INTO `plan` (`id`, `nazwa`, `limit_pytan`, `cena`) VALUES
(0, 'PLAN FREE', 1, 0),
(1, 'PLAN PREMIUM PRO', 30, 15),
(2, 'PLAN PREMIUM EXCLUSIVE', NULL, 30),
(4, 'USUNIĘTY', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pomoc`
--

CREATE TABLE `pomoc` (
  `id` int(11) NOT NULL,
  `pytanie` varchar(100) NOT NULL,
  `odpowiedz` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `pomoc`
--

INSERT INTO `pomoc` (`id`, `pytanie`, `odpowiedz`) VALUES
(1, 'Jak można się zalogować???', 'Można to zrobić tutaj <a href=\'logowanie.php\'>TAUA</a>'),
(2, 'Jak można się zalogować???', 'Można to zrobić tutaj <a href=\'logowanie.php\'>TAUA</a>'),
(3, 'adsfweasds', 'adasdasdas');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `powiat`
--

CREATE TABLE `powiat` (
  `id` int(11) NOT NULL,
  `woj_id` int(11) NOT NULL,
  `nazwa` varchar(60) NOT NULL,
  `mnpp` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `powiat`
--

INSERT INTO `powiat` (`id`, `woj_id`, `nazwa`, `mnpp`) VALUES
(1, 1, 'BĘDZIŃSKI', 0),
(2, 1, 'BIELSKI', 0),
(4, 1, 'BIERUŃSKO-LĘDZIŃSKI', 0),
(5, 1, 'CIESZYŃSKI', 0),
(6, 1, 'CZĘSTOCHOWSKI', 0),
(7, 1, 'GLIWICKI', 0),
(8, 1, 'KŁOBUCKI', 0),
(9, 1, 'LUBLINIECKI', 0),
(10, 1, 'MIKOŁOWSKI', 0),
(11, 1, 'MYSZKOWSKI', 0),
(12, 1, 'PSZCZYŃSKI', 0),
(13, 1, 'RACIBORSKI', 0),
(14, 1, 'RYBNICKI', 0),
(15, 1, 'TARNOGÓRSKI', 0),
(16, 1, 'WODZISŁAWSKI', 0),
(17, 1, 'ZAWIERCIAŃSKI', 0),
(18, 1, 'ŻYWIECKI', 0),
(19, 1, 'BIELSKO-BIAŁA', 1),
(20, 1, 'BYTOM', 1),
(21, 1, 'CHORZÓW', 1),
(22, 1, 'CZĘSTOCHOWA', 1),
(23, 1, 'DĄBROWA GÓRNICZA', 1),
(24, 1, 'GLIWICE', 1),
(25, 1, 'JASTRZĘBIE-ZDRÓJ', 1),
(26, 1, 'JAWORZNO', 1),
(27, 1, 'KATOWICE', 1),
(28, 1, 'MYSŁOWICE', 1),
(29, 1, 'PIEKARY ŚLĄSKIE', 1),
(30, 1, 'RUDA ŚLĄSKA', 1),
(31, 1, 'RYBNIK', 1),
(32, 1, 'SIEMIANOWICE ŚLĄSKIE', 1),
(33, 1, 'SOSNOWIEC', 1),
(34, 1, 'ŚWĘTOCHŁOWICE', 1),
(35, 1, 'TYCHY', 1),
(36, 1, 'ZABRZE', 1),
(37, 1, 'ŻORY', 1),
(38, 3, 'BOLESŁAWIECKI', 0),
(40, 3, 'DZIEŻONIOWSKI', 0),
(41, 3, 'GŁOGOWSKI', 0),
(42, 3, 'GÓROWSKI', 0),
(43, 3, 'JAWORSKI', 0),
(44, 3, 'KAMIENNOGÓRSKI', 0),
(45, 3, 'KARKONOSKI', 0),
(46, 3, 'KŁODZKI', 0),
(47, 3, 'LEGNICKI', 0),
(48, 3, 'LUBAŃSKI', 0),
(49, 3, 'LUBIŃSKI', 0),
(50, 3, 'LWÓWECKI', 0),
(51, 3, 'MILICKI', 0),
(52, 3, 'OLEŚNICKI', 0),
(53, 3, 'OŁAWSKI', 0),
(54, 3, 'POLKOWICKI', 0),
(55, 3, 'ŚREDZKI', 0),
(56, 3, 'STRZELIŃSKI', 0),
(57, 3, 'ŚWIDNICKI', 0),
(58, 3, 'TRZEBNICKI', 0),
(59, 3, 'WAŁBRZYCHSKI', 0),
(60, 3, 'WOŁOWSKI', 0),
(61, 3, 'WROCŁAWSKI', 0),
(62, 3, 'ZĄBKOWICKI', 0),
(63, 3, 'ZGORZELECKI', 0),
(64, 3, 'ZŁOTORYJSKI', 0),
(65, 3, 'JELENIA GÓRA', 1),
(66, 3, 'LEGNICA', 1),
(67, 3, 'WAŁBRZYCH', 1),
(68, 3, 'WROCŁAW', 1),
(69, 15, 'BYDGOSZCZ', 1),
(70, 15, 'GRUDZIĄDZ', 1),
(71, 15, 'TORUŃ', 1),
(72, 15, 'WŁOCŁAWEK', 1),
(74, 15, 'ALEKSANDROWICKI', 0),
(75, 15, 'BRODNICKI', 0),
(76, 15, 'BYDGOSKI', 0),
(77, 15, 'CHEŁMIŃSKI', 0),
(78, 15, 'GOLUBSKO-DOBRZYŃSKI', 0),
(79, 15, 'GRUDZIĄDZKI', 0),
(80, 15, 'INOWROCŁAWSKI', 0),
(81, 15, 'LIPNOWSKI', 0),
(82, 15, 'MOGILEŃSKI', 0),
(83, 15, 'NAKIELSKI', 0),
(84, 15, 'RADZIEJOWSKI', 0),
(85, 15, 'RYPIŃSKI', 0),
(86, 15, 'SĘPOLEŃSKI', 0),
(87, 15, 'ŚWIECKI', 0),
(88, 15, 'TORUŃSKI', 0),
(89, 15, 'TUCHOLSKI', 0),
(90, 15, 'WĄBRZESKI', 0),
(91, 15, 'WŁOCŁAWSKI', 0),
(92, 15, 'ŻNIŃSKI', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przerwa`
--

CREATE TABLE `przerwa` (
  `id` int(11) NOT NULL,
  `od` datetime NOT NULL,
  `do` datetime NOT NULL,
  `administrator_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytanie`
--

CREATE TABLE `pytanie` (
  `id` int(11) NOT NULL,
  `tytul` varchar(100) NOT NULL,
  `kategoria_id` int(11) DEFAULT NULL,
  `opis` varchar(500) DEFAULT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `pytanie`
--

INSERT INTO `pytanie` (`id`, `tytul`, `kategoria_id`, `opis`, `uzytkownik_id`) VALUES
(1, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(2, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(3, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(4, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(5, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(6, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(7, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(8, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(9, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(10, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(11, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(12, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(13, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(14, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(15, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(16, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(17, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(18, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(19, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(20, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(21, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(22, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2),
(23, 'Bycz', 1, 'ddwewe', 1),
(24, 'jejku', 38, '<p><span style=\"font-size: 18pt;\">jezyuuuuu polkiiiiii</span></p>', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `serca`
--

CREATE TABLE `serca` (
  `id` int(11) NOT NULL,
  `odpowiedz_id` int(11) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `serca`
--

INSERT INTO `serca` (`id`, `odpowiedz_id`, `uzytkownik_id`) VALUES
(4, 1, 1),
(10, 2, 1),
(16, 5, 1),
(17, 6, 1),
(18, 8, 1),
(19, 8, 2),
(21, 11, 2),
(22, 10, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typ`
--

CREATE TABLE `typ` (
  `id` int(11) NOT NULL,
  `dodawanie` int(11) DEFAULT NULL,
  `usuwanie` int(11) DEFAULT NULL,
  `moderacja` int(11) DEFAULT NULL,
  `banowanie` int(11) DEFAULT NULL,
  `przerwy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy_dane`
--

CREATE TABLE `uzytkownicy_dane` (
  `id` int(11) NOT NULL,
  `nazwisko` varchar(60) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ulica` varchar(100) DEFAULT NULL,
  `numer_1` varchar(10) DEFAULT NULL,
  `numer_2` varchar(10) DEFAULT NULL,
  `powiat_id` int(11) DEFAULT NULL,
  `miasto` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uzytkownicy_dane`
--

INSERT INTO `uzytkownicy_dane` (`id`, `nazwisko`, `email`, `ulica`, `numer_1`, `numer_2`, `powiat_id`, `miasto`) VALUES
(1, 'rwrwr', 'ewe@s', 'fssfsf', '23', '43', 69, 'fdsfsdsff'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'dsadasd', 'asdsD@DSDS', 'DSADAS', 'D12', '123', 74, 'SADASDASD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `data_urodzenia` date NOT NULL,
  `ranga` int(1) DEFAULT NULL,
  `obraz` varchar(200) DEFAULT NULL,
  `zbanowany_do` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `login`, `haslo`, `imie`, `nick`, `data_urodzenia`, `ranga`, `obraz`, `zbanowany_do`) VALUES
(1, 'no', 'no', 'Jakub', 'Użytkownik usunięty', '2016-04-01', 4, 'images/usuniety.jpeg', NULL),
(2, 'zyrekjakub1', '51813c23509be8f74b1e3ede22fa96cb', 'Jakub', 'zyrekjakub1', '2016-04-01', 1, 'https://bi.im-g.pl/im/5e/7e/1b/z28830814Q,Amou-Hadzi-na-co-dzien-zyje-w-Dejgah-w-Iranie.jpg', '1900-01-01'),
(3, 'zyrekjakub2', '51813c23509be8f74b1e3ede22fa96cb', 'Jakub', 'zyrekjakub2', '2016-04-14', NULL, 'images/user.png', NULL),
(4, 'zyrekjakub3', '51813c23509be8f74b1e3ede22fa96cb', 'Jakub', 'zyrekjakub3', '2016-04-15', 1, 'images/user.png', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wojewodztwo`
--

CREATE TABLE `wojewodztwo` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `wojewodztwo`
--

INSERT INTO `wojewodztwo` (`id`, `nazwa`) VALUES
(1, 'ŚLĄSKIE'),
(2, 'MAŁOPOLSKIE'),
(3, 'DOLNOŚLĄSKIE'),
(4, 'LUBUSKIE'),
(5, 'LUBELSKIE'),
(6, 'ŚWIĘTOKRZYSKIE'),
(7, 'PODKARPACKIE'),
(8, 'POMORSKIE'),
(9, 'ZACHODNIO-POMORSKIE'),
(10, 'WARMIŃSKO-MAZURSKIE'),
(11, 'PODLASKIE'),
(12, 'WIELKOPOLSKIE'),
(13, 'MAZOWIECKIE'),
(14, 'ŁÓDZKIE'),
(15, 'KUJAWSKO-POMORSKIE'),
(16, 'OPOLSKIE');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakup`
--

CREATE TABLE `zakup` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `kod` int(10) DEFAULT NULL,
  `data` date NOT NULL,
  `data_k` date NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zakup`
--

INSERT INTO `zakup` (`id`, `uzytkownik_id`, `plan_id`, `kod`, `data`, `data_k`, `cena`) VALUES
(8, 4, 1, NULL, '2023-04-16', '2023-05-16', 15),
(9, 4, 1, NULL, '2023-04-16', '2023-05-16', 15),
(10, 4, 2, NULL, '2023-04-16', '2023-05-16', 30),
(11, 4, 2, NULL, '2023-04-16', '2023-05-16', 30),
(12, 1, 2, NULL, '2023-04-17', '2023-05-17', 25),
(13, 1, 2, NULL, '2023-04-17', '2023-05-17', 25),
(14, 1, 2, 2, '2023-04-17', '2023-05-17', 25),
(15, 1, 1, 2, '2023-04-03', '2023-04-09', 1),
(17, 1, 1, 1, '2023-04-17', '2023-04-17', 12);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenie`
--

CREATE TABLE `zgloszenie` (
  `id` int(11) NOT NULL,
  `zglaszajacy` int(11) NOT NULL,
  `opis` varchar(400) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `zgloszenie`
--

INSERT INTO `zgloszenie` (`id`, `zglaszajacy`, `opis`, `data`) VALUES
(1, 2, 'bla bla', '2023-04-16'),
(2, 2, 'dada', '2023-04-07'),
(3, 2, 'daad', '1900-01-25'),
(4, 2, 'daad', '1900-01-09'),
(5, 2, 'sdadad', '1900-01-02'),
(6, 2, 'bo tak', '2023-04-17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenie_pomoc`
--

CREATE TABLE `zgloszenie_pomoc` (
  `id` int(11) NOT NULL,
  `zglaszajacy` int(11) DEFAULT NULL,
  `opis` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `zgloszone_komentarze`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `zgloszone_komentarze` (
`uzytkownik_id` int(11)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `zgloszone_odpowiedzi`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `zgloszone_odpowiedzi` (
`uzytkownik_id` int(11)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `zgloszone_pytanie`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `zgloszone_pytanie` (
`opis` varchar(400)
,`tytul` varchar(100)
,`uzytkownik_id` int(11)
);

-- --------------------------------------------------------

--
-- Struktura widoku `komentarze2`
--
DROP TABLE IF EXISTS `komentarze2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `komentarze2`  AS SELECT `komentarze`.`id` AS `id`, `komentarze`.`komentarz` AS `komentarz`, `komentarze`.`odpowiedz_id` AS `odpowiedz_id`, `uzytkownik`.`nick` AS `nick` FROM (`komentarze` join `uzytkownik` on(`uzytkownik`.`id` = `komentarze`.`uzytkownik_id`))  ;

-- --------------------------------------------------------

--
-- Struktura widoku `liczba_kategorii`
--
DROP TABLE IF EXISTS `liczba_kategorii`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `liczba_kategorii`  AS SELECT `kategorie`.`id` AS `id`, count(`pytanie`.`id`) AS `liczba`, `kategorie`.`nazwa` AS `nazwa` FROM (`kategorie` join `pytanie` on(`pytanie`.`kategoria_id` = `kategorie`.`id`)) GROUP BY `kategorie`.`id` ORDER BY count(`pytanie`.`id`) DESC;

-- --------------------------------------------------------

--
-- Struktura widoku `liczba_odpowiedzi`
--
DROP TABLE IF EXISTS `liczba_odpowiedzi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `liczba_odpowiedzi`  AS SELECT `uzytkownik`.`obraz` AS `obraz`, `pytanie`.`id` AS `id`, count(`odpowiedz`.`id`) AS `odp`, `pytanie`.`tytul` AS `tytul`, `kategorie`.`nazwa` AS `nazwa`, `uzytkownik`.`nick` AS `nick` FROM (((`pytanie` left join `odpowiedz` on(`pytanie`.`id` = `odpowiedz`.`pytanie_id`)) join `uzytkownik` on(`uzytkownik`.`id` = `pytanie`.`uzytkownik_id`)) join `kategorie` on(`kategorie`.`id` = `pytanie`.`kategoria_id`)) GROUP BY `pytanie`.`id` ORDER BY `pytanie`.`id` DESC;

-- --------------------------------------------------------

--
-- Struktura widoku `odpowiedzi`
--
DROP TABLE IF EXISTS `odpowiedzi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `odpowiedzi`  AS SELECT `pytanie`.`id` AS `idd`, `uzytkownik`.`ranga` AS `ranga`, `odpowiedz`.`id` AS `id`, `odpowiedz`.`uzytkownik_id` AS `uzytkownik_id`, `uzytkownik`.`obraz` AS `obraz`, `uzytkownik`.`nick` AS `nick`, `odpowiedz`.`odpowiedz` AS `odpowiedz` FROM ((`odpowiedz` join `uzytkownik` on(`odpowiedz`.`uzytkownik_id` = `uzytkownik`.`id`)) join `pytanie` on(`pytanie`.`id` = `odpowiedz`.`pytanie_id`))  ;

-- --------------------------------------------------------

--
-- Struktura widoku `zgloszone_komentarze`
--
DROP TABLE IF EXISTS `zgloszone_komentarze`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zgloszone_komentarze`  AS SELECT `komentarze`.`uzytkownik_id` AS `uzytkownik_id` FROM ((`zgloszenie` join `obiekt` on(`obiekt`.`zgloszenie_id` = `zgloszenie`.`id`)) join `komentarze` on(`komentarze`.`id` = `obiekt`.`komentarz`)) WHERE `obiekt`.`komentarz` is not null  ;

-- --------------------------------------------------------

--
-- Struktura widoku `zgloszone_odpowiedzi`
--
DROP TABLE IF EXISTS `zgloszone_odpowiedzi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zgloszone_odpowiedzi`  AS SELECT `odpowiedz`.`uzytkownik_id` AS `uzytkownik_id` FROM ((`zgloszenie` join `obiekt` on(`obiekt`.`zgloszenie_id` = `zgloszenie`.`id`)) join `odpowiedz` on(`odpowiedz`.`id` = `obiekt`.`odpowiedz`)) WHERE `obiekt`.`odpowiedz` is not null  ;

-- --------------------------------------------------------

--
-- Struktura widoku `zgloszone_pytanie`
--
DROP TABLE IF EXISTS `zgloszone_pytanie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zgloszone_pytanie`  AS SELECT `zgloszenie`.`opis` AS `opis`, `pytanie`.`tytul` AS `tytul`, `pytanie`.`uzytkownik_id` AS `uzytkownik_id` FROM ((`zgloszenie` join `obiekt` on(`obiekt`.`zgloszenie_id` = `zgloszenie`.`id`)) join `pytanie` on(`pytanie`.`id` = `obiekt`.`pytanie`)) WHERE `obiekt`.`pytanie` is not null  ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administratorzy_ibfk_2` (`typ_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `instrukcje`
--
ALTER TABLE `instrukcje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kod_rabatowy`
--
ALTER TABLE `kod_rabatowy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD PRIMARY KEY (`id`),
  ADD KEY `odpowiedz_id` (`odpowiedz_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `komentarz` (`komentarz`),
  ADD KEY `odpowiedz` (`odpowiedz`),
  ADD KEY `pytanie` (`pytanie`),
  ADD KEY `zgloszenie_id` (`zgloszenie_id`);

--
-- Indeksy dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`),
  ADD KEY `pytanie_id` (`pytanie_id`);

--
-- Indeksy dla tabeli `odpowiedz_zgloszenie`
--
ALTER TABLE `odpowiedz_zgloszenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrator_id` (`administrator_id`),
  ADD KEY `zgloszenie_id` (`zgloszenie_id`);

--
-- Indeksy dla tabeli `ostrzezenie`
--
ALTER TABLE `ostrzezenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`),
  ADD KEY `admin` (`admin`);

--
-- Indeksy dla tabeli `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pomoc`
--
ALTER TABLE `pomoc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `powiat`
--
ALTER TABLE `powiat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `woj_id` (`woj_id`);

--
-- Indeksy dla tabeli `przerwa`
--
ALTER TABLE `przerwa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrator_id` (`administrator_id`);

--
-- Indeksy dla tabeli `pytanie`
--
ALTER TABLE `pytanie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria_id` (`kategoria_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `serca`
--
ALTER TABLE `serca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `odpowiedz_id` (`odpowiedz_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `typ`
--
ALTER TABLE `typ`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy_dane`
--
ALTER TABLE `uzytkownicy_dane`
  ADD PRIMARY KEY (`id`),
  ADD KEY `powiat_id` (`powiat_id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ranga` (`ranga`);

--
-- Indeksy dla tabeli `wojewodztwo`
--
ALTER TABLE `wojewodztwo`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zakup`
--
ALTER TABLE `zakup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`),
  ADD KEY `kod` (`kod`);

--
-- Indeksy dla tabeli `zgloszenie`
--
ALTER TABLE `zgloszenie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zgloszenie_pomoc`
--
ALTER TABLE `zgloszenie_pomoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zglaszajacy` (`zglaszajacy`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `instrukcje`
--
ALTER TABLE `instrukcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT dla tabeli `kod_rabatowy`
--
ALTER TABLE `kod_rabatowy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `odpowiedz_zgloszenie`
--
ALTER TABLE `odpowiedz_zgloszenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ostrzezenie`
--
ALTER TABLE `ostrzezenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `pomoc`
--
ALTER TABLE `pomoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `powiat`
--
ALTER TABLE `powiat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT dla tabeli `przerwa`
--
ALTER TABLE `przerwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pytanie`
--
ALTER TABLE `pytanie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT dla tabeli `serca`
--
ALTER TABLE `serca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `typ`
--
ALTER TABLE `typ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy_dane`
--
ALTER TABLE `uzytkownicy_dane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `wojewodztwo`
--
ALTER TABLE `wojewodztwo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `zakup`
--
ALTER TABLE `zakup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `zgloszenie`
--
ALTER TABLE `zgloszenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `zgloszenie_pomoc`
--
ALTER TABLE `zgloszenie_pomoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `administratorzy`
--
ALTER TABLE `administratorzy`
  ADD CONSTRAINT `administratorzy_ibfk_2` FOREIGN KEY (`typ_id`) REFERENCES `typ` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `administratorzy_ibfk_3` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  ADD CONSTRAINT `komentarze_ibfk_1` FOREIGN KEY (`odpowiedz_id`) REFERENCES `odpowiedz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarze_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  ADD CONSTRAINT `obiekt_ibfk_1` FOREIGN KEY (`komentarz`) REFERENCES `komentarze` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `obiekt_ibfk_2` FOREIGN KEY (`odpowiedz`) REFERENCES `odpowiedz` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `obiekt_ibfk_3` FOREIGN KEY (`pytanie`) REFERENCES `pytanie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `obiekt_ibfk_4` FOREIGN KEY (`zgloszenie_id`) REFERENCES `zgloszenie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  ADD CONSTRAINT `odpowiedz_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `odpowiedz_ibfk_2` FOREIGN KEY (`pytanie_id`) REFERENCES `pytanie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `odpowiedz_zgloszenie`
--
ALTER TABLE `odpowiedz_zgloszenie`
  ADD CONSTRAINT `odpowiedz_zgloszenie_ibfk_1` FOREIGN KEY (`administrator_id`) REFERENCES `administratorzy` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `odpowiedz_zgloszenie_ibfk_2` FOREIGN KEY (`zgloszenie_id`) REFERENCES `zgloszenie_pomoc` (`id`) ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `ostrzezenie`
--
ALTER TABLE `ostrzezenie`
  ADD CONSTRAINT `ostrzezenie_ibfk_1` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `powiat`
--
ALTER TABLE `powiat`
  ADD CONSTRAINT `powiat_ibfk_1` FOREIGN KEY (`woj_id`) REFERENCES `wojewodztwo` (`id`);

--
-- Ograniczenia dla tabeli `przerwa`
--
ALTER TABLE `przerwa`
  ADD CONSTRAINT `przerwa_ibfk_1` FOREIGN KEY (`administrator_id`) REFERENCES `administratorzy` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `pytanie`
--
ALTER TABLE `pytanie`
  ADD CONSTRAINT `pytanie_ibfk_1` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `pytanie_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `serca`
--
ALTER TABLE `serca`
  ADD CONSTRAINT `serca_ibfk_1` FOREIGN KEY (`odpowiedz_id`) REFERENCES `odpowiedz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `serca_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `uzytkownicy_dane`
--
ALTER TABLE `uzytkownicy_dane`
  ADD CONSTRAINT `uzytkownicy_dane_ibfk_1` FOREIGN KEY (`id`) REFERENCES `uzytkownik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uzytkownicy_dane_ibfk_2` FOREIGN KEY (`powiat_id`) REFERENCES `powiat` (`id`);

--
-- Ograniczenia dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD CONSTRAINT `uzytkownik_ibfk_1` FOREIGN KEY (`ranga`) REFERENCES `plan` (`id`);

--
-- Ograniczenia dla tabeli `zakup`
--
ALTER TABLE `zakup`
  ADD CONSTRAINT `zakup_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zakup_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zakup_ibfk_3` FOREIGN KEY (`kod`) REFERENCES `kod_rabatowy` (`id`);

--
-- Ograniczenia dla tabeli `zgloszenie_pomoc`
--
ALTER TABLE `zgloszenie_pomoc`
  ADD CONSTRAINT `zgloszenie_pomoc_ibfk_1` FOREIGN KEY (`zglaszajacy`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
