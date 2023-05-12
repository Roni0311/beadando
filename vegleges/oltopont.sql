-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 12. 17:21
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `oltopont`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `data`
--

CREATE TABLE `data` (
  `Name` varchar(50) NOT NULL,
  `Birthdate` date NOT NULL,
  `TAJ` int(10) NOT NULL,
  `PersonalID` varchar(10) NOT NULL,
  `Postalcode` int(4) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Street` varchar(30) NOT NULL,
  `House` varchar(100) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `data`
--

INSERT INTO `data` (`Name`, `Birthdate`, `TAJ`, `PersonalID`, `Postalcode`, `City`, `Street`, `House`, `Phone`, `Email`) VALUES
('Gareth Bale', '1889-04-20', 1234567890, '123456rt', 2234, 'Cardiff', 'Bareth Gale', '11', 2147483647, 'gbale@gmail.com'),
('Cristiano Ronaldo', '1997-07-20', 334445678, '678321cr', 1234, 'Lissabon', 'Ristiano Cronaldo', '7', 2147483647, 'cr7@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
