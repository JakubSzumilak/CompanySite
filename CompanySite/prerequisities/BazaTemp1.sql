-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Maj 12, 2024 at 10:37 AM
-- Wersja serwera: 10.3.39-MariaDB
-- Wersja PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BazaTemp1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `opis` varchar(255) NOT NULL,
  `zdjecie` varchar(200) NOT NULL,
  `link1` varchar(200) NOT NULL,
  `link2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `nazwa`, `opis`, `zdjecie`, `link1`, `link2`) VALUES
(1, 'Laptop-1', 'Laptop 1 opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis', 'img/products/laptop1.png', 'https://facebook.com/', 'https://instagram.com/'),
(2, 'Laptop-2', 'Laptop 2 opis, opis opis, opis opis, opis, opis opis, opis opis, opis opis, opis opis, opis', 'img/products/laptop2.png', 'https://facebook.com/', 'https://instagram.com/'),
(3, 'Laptop-3', 'Laptop 3 opis, opis opis, opis opis, opis opis, opis, opis, opis opis, opis opis, opis opis, opis', 'img/products/laptop3.png', 'https://facebook.com/', 'https://instagram.com/'),
(4, 'Laptop-4', 'Laptop 4 opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis', 'img/products/laptop4.png', 'https://facebook.com/', 'https://instagram.com/'),
(5, 'Desktop-1', 'Desktop 1 opis, opis opis, opis opis, opis opis, opis opis, opis opis, opis opis', 'img/products/desktop1.png', 'https://facebook.com/', 'https://instagram.com/'),
(6, 'Console-1', 'Console 1 opis, opis, opis, opis, opis, opis, opis', 'img/products/console1.png', 'https://facebook.com/', 'https://instagram.com/'),
(7, 'Console-2', 'Console 2 opis, opis, opis, opis, opis', 'img/products/console2.png', 'https://facebook.com/', 'https://instagram.com/'),
(8, 'Phone-1', 'Phone 1 opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis', 'img/products/phone1.png', 'https://facebook.com/', 'https://instagram.com/'),
(9, 'Phone-2', 'Phone 1 opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis, opis', 'img/products/phone2.png', 'https://facebook.com/', 'https://instagram.com/'),
(10, 'Czajnik BREN M1918', 'Zjawiskowy czajnik nie tylko parzy wode, ale takze fajnie wyglada, sprzedawany w zestawie z woda!', 'img/products/kettle20240426091116.png', 'https://facebook.com/', 'https://instagram.com/'),
(11, 'Karabin Maszynowy M249 Saw', 'Reczny karabin maszynowy kalibru 5,56 mm bedacy w stanie wystrzelić 750-1100 kul na minute. Dodatkowo dolaczamy 100-nabojowa tasme, jesli zamowisz do srody!', 'img/products/m249saw20240426091816.jpg', 'http://usarmy.pl/', 'https://youtube.com/');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Login` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` char(1) NOT NULL,
  `imie` varchar(40) NOT NULL,
  `nazwisko` varchar(40) NOT NULL,
  `awatar` varchar(200) NOT NULL,
  `link1` varchar(200) NOT NULL,
  `link2` varchar(200) NOT NULL,
  `opis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `Login`, `Password`, `Role`, `imie`, `nazwisko`, `awatar`, `link1`, `link2`, `opis`) VALUES
(1, 'Login1', 'Password1', 'A', 'Imie1', 'Nazwisko1', 'img/people/p01.jpg', 'www.facebook.com/', 'www.instagram.com/', 'Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 Opis1 '),
(2, 'Login2', 'Password2', 'A', 'Imie2', 'Nazwisko2', 'img/people/p02.jpg', 'www.twitter.com/', 'www.google.com/', 'Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 Opis2 '),
(3, 'Login3', 'Password3', 'U', 'Imie3', 'Nazwisko3', 'img/people/p03.jpg', 'www.facebook.com/', 'www.instagram.com/', 'Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 Opis3 '),
(4, 'Login4', 'Password4', 'U', 'Imie4', 'Nazwisko4', 'img/people/p04.jpg', 'www.twitter.com/', 'www.google.com/', 'Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 Opis4 '),
(5, 'Login5', 'Password5', 'G', 'Imie5', 'Nazwisko5', 'img/people/p05.jpg', 'www.facebook.com/', 'www.instagram.com/', 'Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 Opis5 '),
(6, 'Login6', 'Password6', 'G', 'Imie6', 'Nazwisko6', 'img/people/p06.jpg', 'www.twitter.com/', 'www.google.com/', 'Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 Opis6 '),
(358, 'A', 'A', 'A', 'A', 'A', 'img/people/Chicken20240423124701.png', 'A', 'A', 'A'),
(359, 'A', 'A', 'A', 'A', 'A', 'img/people/Badger-icon20240423125420.png', 'A', 'A', 'A'),
(360, 'testlogin', 'testhaslo', 'U', '', '', 'img/people/Fox-icon20240423130428.png', 'testlink1', 'testlink2', 'test opis test opis test opis');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=361;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
