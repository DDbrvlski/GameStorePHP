-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Maj 2023, 23:19
-- Wersja serwera: 10.4.25-MariaDB
-- Wersja PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `gamestore`
--
CREATE DATABASE IF NOT EXISTS `gamestore` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `gamestore`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `Id` int(11) NOT NULL,
  `Name` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `Surname` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `BirthDateTime` datetime NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`Id`, `Name`, `Surname`, `BirthDateTime`, `CreationDateTime`, `EditDateTime`, `IsActive`) VALUES
(1, 'Karol', 'Kowalski', '2000-01-11 00:00:00', '2023-05-23 00:39:57', '2023-05-23 01:06:14', b'1'),
(2, 'Michał', 'Kowal', '2002-11-12 00:00:00', '2023-05-23 00:41:31', '2023-05-23 00:41:31', b'1'),
(3, 'Maciej', 'Dąbrowski', '1982-01-11 00:00:00', '2023-05-24 13:26:42', '2023-05-24 19:25:31', b'1'),
(4, 'Piotr', 'Górski', '1995-05-19 00:00:00', '2023-05-30 22:27:18', '2023-05-30 22:28:05', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `developer`
--

CREATE TABLE `developer` (
  `Id` int(11) NOT NULL,
  `Title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `developer`
--

INSERT INTO `developer` (`Id`, `Title`, `CreationDateTime`, `EditDateTime`, `IsActive`) VALUES
(1, 'Team Cherry', '2023-05-23 17:16:36', '2023-05-23 17:16:36', b'1'),
(2, '4A Games', '2023-05-23 18:56:54', '2023-05-23 18:56:54', b'1'),
(3, 'id Software', '2023-05-24 11:46:58', '2023-05-24 11:46:58', b'1'),
(4, 'FromSoftware Inc.', '2023-05-30 22:19:10', '2023-05-30 22:19:10', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `genre`
--

CREATE TABLE `genre` (
  `Id` int(11) NOT NULL,
  `Title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `genre`
--

INSERT INTO `genre` (`Id`, `Title`, `CreationDateTime`, `EditDateTime`, `IsActive`) VALUES
(1, 'FPS', '2023-05-22 18:51:37', '2023-05-22 00:00:00', b'1'),
(3, 'RTS', '2023-05-22 19:59:20', '2023-05-22 19:59:20', b'1'),
(4, 'Symulator', '2023-05-22 20:00:28', '2023-05-22 20:12:03', b'1'),
(5, 'Przygodowa', '2023-05-30 22:14:38', '2023-05-30 22:14:38', b'1'),
(7, 'RPG', '2023-05-30 22:41:39', '2023-05-30 22:41:39', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Id` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `ProductQuantity` int(11) NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orderdetails`
--

INSERT INTO `orderdetails` (`Id`, `OrderId`, `ProductId`, `ProductQuantity`, `CreationDateTime`, `EditDateTime`, `IsActive`) VALUES
(47, 31, 1, 50, '2023-05-24 16:16:27', '2023-05-24 16:17:32', b'0'),
(48, 32, 1, 5, '2023-05-24 16:20:26', '2023-05-30 23:03:42', b'1'),
(49, 32, 2, 5, '2023-05-24 17:20:13', '2023-05-30 23:03:42', b'1'),
(50, 33, 1, 5, '2023-05-24 22:29:39', '2023-05-24 22:29:39', b'1'),
(51, 33, 2, 6, '2023-05-24 22:29:39', '2023-05-24 22:29:39', b'1'),
(52, 34, 1, 1, '2023-05-24 22:29:47', '2023-05-24 22:29:47', b'1'),
(53, 34, 3, 5, '2023-05-24 22:29:47', '2023-05-24 22:29:47', b'1'),
(54, 35, 1, 4, '2023-05-30 17:47:20', '2023-05-30 17:47:20', b'1'),
(55, 35, 2, 3, '2023-05-30 17:47:20', '2023-05-30 17:47:20', b'1'),
(56, 36, 1, 2, '2023-05-30 22:52:08', '2023-05-30 22:54:18', b'1'),
(57, 36, 2, 1, '2023-05-30 22:52:08', '2023-05-30 22:53:14', b'1'),
(58, 36, 3, 2, '2023-05-30 22:52:08', '2023-05-30 22:54:18', b'1'),
(59, 36, 4, 3, '2023-05-30 22:52:09', '2023-05-30 22:54:18', b'1'),
(60, 37, 1, 2, '2023-05-30 22:55:38', '2023-05-30 22:56:54', b'0'),
(61, 37, 2, 2, '2023-05-30 22:55:38', '2023-05-30 22:56:54', b'0'),
(62, 37, 3, 2, '2023-05-30 22:55:38', '2023-05-30 22:56:54', b'0'),
(63, 37, 4, 2, '2023-05-30 22:55:38', '2023-05-30 22:56:54', b'0'),
(64, 38, 1, 5, '2023-05-30 23:00:16', '2023-05-30 23:00:16', b'1'),
(65, 38, 3, 6, '2023-05-30 23:00:16', '2023-05-30 23:00:40', b'1'),
(66, 38, 2, 1, '2023-05-30 23:01:45', '2023-05-30 23:01:45', b'1'),
(67, 39, 1, 3, '2023-05-30 23:04:07', '2023-05-30 23:05:02', b'0'),
(68, 39, 2, 4, '2023-05-30 23:04:07', '2023-05-30 23:05:03', b'0'),
(69, 39, 3, 2, '2023-05-30 23:04:07', '2023-05-30 23:05:03', b'0'),
(70, 39, 4, 2, '2023-05-30 23:04:07', '2023-05-30 23:05:03', b'0'),
(71, 40, 1, 1, '2023-05-30 23:06:40', '2023-05-30 23:06:40', b'1'),
(72, 40, 4, 1, '2023-05-30 23:06:59', '2023-05-30 23:07:36', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `ClientsId` int(11) NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`Id`, `ClientsId`, `CreationDateTime`, `EditDateTime`, `IsActive`) VALUES
(31, 1, '2023-05-24 16:16:27', '2023-05-24 16:17:32', b'0'),
(32, 1, '2023-05-24 16:20:26', '2023-05-30 23:03:42', b'1'),
(33, 2, '2023-05-24 22:29:39', '2023-05-24 22:29:39', b'1'),
(34, 3, '2023-05-24 22:29:47', '2023-05-24 22:29:47', b'1'),
(35, 2, '2023-05-30 17:47:20', '2023-05-30 17:47:20', b'1'),
(36, 4, '2023-05-30 22:52:08', '2023-05-30 22:54:18', b'1'),
(37, 4, '2023-05-30 22:55:38', '2023-05-30 22:56:54', b'0'),
(38, 1, '2023-05-30 23:00:16', '2023-05-30 23:01:45', b'1'),
(39, 1, '2023-05-30 23:04:07', '2023-05-30 23:05:03', b'0'),
(40, 2, '2023-05-30 23:06:26', '2023-05-30 23:07:36', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `platform`
--

CREATE TABLE `platform` (
  `Id` int(11) NOT NULL,
  `Title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `platform`
--

INSERT INTO `platform` (`Id`, `Title`, `CreationDateTime`, `EditDateTime`, `IsActive`) VALUES
(1, 'PC', '2023-05-22 23:46:51', '2023-05-22 23:46:51', b'1'),
(3, 'Xbox', '2023-05-24 11:47:12', '2023-05-24 11:47:12', b'1'),
(4, 'Playstation', '2023-05-24 11:47:17', '2023-05-24 11:47:17', b'1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `Id` int(11) NOT NULL,
  `Title` varchar(64) COLLATE utf8_polish_ci NOT NULL,
  `Description` text COLLATE utf8_polish_ci NOT NULL,
  `ImageLink` text COLLATE utf8_polish_ci DEFAULT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `GenreId` int(11) NOT NULL,
  `PlatformId` int(11) NOT NULL,
  `DeveloperId` int(11) NOT NULL,
  `CreationDateTime` datetime NOT NULL,
  `EditDateTime` datetime NOT NULL,
  `Notes` text COLLATE utf8_polish_ci DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`Id`, `Title`, `Description`, `ImageLink`, `Quantity`, `Price`, `GenreId`, `PlatformId`, `DeveloperId`, `CreationDateTime`, `EditDateTime`, `Notes`, `IsActive`) VALUES
(1, 'Hollow Knight', 'opis 1', 'https://static.wikia.nocookie.net/hollowknight/images/a/a1/HK_first_cover_art.png', 27, 90, 5, 1, 1, '2023-05-23 17:20:35', '2023-05-30 23:06:40', NULL, b'1'),
(2, 'Metro Exodus', 'opis 2', 'https://store-images.s-microsoft.com/image/apps.17469.65642028844779555.c518e652-fc85-4d6e-99a2-3e9ae1656a91.6cace333-df13-4178-a46d-5938de4654a2', 9, 80, 1, 1, 2, '2023-05-23 18:59:26', '2023-05-30 23:05:03', NULL, b'1'),
(3, 'DOOM Eternal', 'opis 3', 'https://image.api.playstation.com/vulcan/ap/rnd/202010/0114/b4Q1XWYaTdJLUvRuALuqr0wP.png', 22, 70, 1, 1, 3, '2023-05-24 11:48:05', '2023-05-30 23:05:03', NULL, b'1'),
(4, 'Elden Ring', 'opis 4', 'https://image.api.playstation.com/vulcan/ap/rnd/202107/1612/0b0owDFqekJszSOQfD4vvTjy.png', 31, 190, 7, 1, 4, '2023-05-30 22:32:19', '2023-05-30 23:07:36', 'brak', b'1');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `OrderId` (`OrderId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ClientsId` (`ClientsId`);

--
-- Indeksy dla tabeli `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `GenreId` (`GenreId`),
  ADD KEY `PlatformId` (`PlatformId`),
  ADD KEY `DeveloperId` (`DeveloperId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `developer`
--
ALTER TABLE `developer`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `genre`
--
ALTER TABLE `genre`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT dla tabeli `platform`
--
ALTER TABLE `platform`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`Id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `products` (`Id`);

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`ClientsId`) REFERENCES `clients` (`Id`);

--
-- Ograniczenia dla tabeli `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`GenreId`) REFERENCES `genre` (`Id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`PlatformId`) REFERENCES `platform` (`Id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`DeveloperId`) REFERENCES `developer` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
