-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Kwi 2023, 10:23
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.0.25

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
(2, 'CSS');

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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena`
--

CREATE TABLE `ocena` (
  `id` int(11) NOT NULL,
  `odpowiedz_id` int(11) NOT NULL,
  `ocena` float(2,1) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
-- Struktura tabeli dla tabeli `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `limit_pytan` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
(17, 'Czy można przechodzić przez rondo', 2, '<p>Mam pytanie.</p>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li><strong>Czy można przechodzić przez rondo?????</strong><br><br></li>\r\n<li><strong>Dlaczego nie??</strong></li>\r\n</ol>\r\n<p><s><span style=\"text-decoration: underline;\"><em>Pozdrawiam Anna</em></span></s></p>', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `serca`
--

CREATE TABLE `serca` (
  `id` int(11) NOT NULL,
  `odpowiedz_id` int(11) NOT NULL,
  `uzytkownik_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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
  `obraz` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `login`, `haslo`, `imie`, `nick`, `data_urodzenia`, `ranga`, `obraz`) VALUES
(1, 'zyrekjakub', '51813c23509be8f74b1e3ede22fa96cb', 'Jakub', 'zyrekjakub', '2016-04-01', NULL, ''),
(2, 'zyrekjakub1', '51813c23509be8f74b1e3ede22fa96cb', 'Jakub', 'zyrekjakub1', '2016-04-01', NULL, 'https://bi.im-g.pl/im/5e/7e/1b/z28830814Q,Amou-Hadzi-na-co-dzien-zyje-w-Dejgah-w-Iranie.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zakup`
--

CREATE TABLE `zakup` (
  `id` int(11) NOT NULL,
  `uzytkownik_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `zakup` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenie`
--

CREATE TABLE `zgloszenie` (
  `id` int(11) NOT NULL,
  `zglaszajacy` int(11) DEFAULT NULL,
  `zgloszony` int(11) DEFAULT NULL,
  `opis` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zgloszenie`
--

INSERT INTO `zgloszenie` (`id`, `zglaszajacy`, `zgloszony`, `opis`) VALUES
(1, 2, NULL, 'fwwefwef');

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
-- Indeksy dla tabeli `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `odpowiedz_id` (`odpowiedz_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

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
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zakup`
--
ALTER TABLE `zakup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `uzytkownik_id` (`uzytkownik_id`);

--
-- Indeksy dla tabeli `zgloszenie`
--
ALTER TABLE `zgloszenie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `zglaszajacy` (`zglaszajacy`),
  ADD KEY `zgloszony` (`zgloszony`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `komentarze`
--
ALTER TABLE `komentarze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `obiekt`
--
ALTER TABLE `obiekt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `odpowiedz`
--
ALTER TABLE `odpowiedz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `odpowiedz_zgloszenie`
--
ALTER TABLE `odpowiedz_zgloszenie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pomoc`
--
ALTER TABLE `pomoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `przerwa`
--
ALTER TABLE `przerwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pytanie`
--
ALTER TABLE `pytanie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `serca`
--
ALTER TABLE `serca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `typ`
--
ALTER TABLE `typ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `zakup`
--
ALTER TABLE `zakup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zgloszenie`
--
ALTER TABLE `zgloszenie`
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
-- Ograniczenia dla tabeli `ocena`
--
ALTER TABLE `ocena`
  ADD CONSTRAINT `ocena_ibfk_1` FOREIGN KEY (`odpowiedz_id`) REFERENCES `odpowiedz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ocena_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `odpowiedz_zgloszenie_ibfk_2` FOREIGN KEY (`zgloszenie_id`) REFERENCES `zgloszenie` (`id`) ON UPDATE CASCADE;

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
-- Ograniczenia dla tabeli `zakup`
--
ALTER TABLE `zakup`
  ADD CONSTRAINT `zakup_ibfk_1` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `zakup_ibfk_2` FOREIGN KEY (`uzytkownik_id`) REFERENCES `uzytkownik` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `zgloszenie`
--
ALTER TABLE `zgloszenie`
  ADD CONSTRAINT `zgloszenie_ibfk_1` FOREIGN KEY (`zglaszajacy`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `zgloszenie_ibfk_2` FOREIGN KEY (`zgloszony`) REFERENCES `uzytkownik` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
