-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 10. 17:49
-- Kiszolgáló verziója: 10.4.25-MariaDB
-- PHP verzió: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `educ_gamific`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `jobs`
--

INSERT INTO `jobs` (`id`, `description`, `level`) VALUES
(2, 'Takarító', 0),
(3, 'Gondnok', 0),
(4, 'Jogász', 3),
(5, 'Orvos', 3),
(6, 'Villamosmérnök', 3),
(7, 'Informatikus', 2),
(8, 'Közgazdász', 2),
(9, 'Pénztáros', 0),
(10, 'Dietetikus', 2),
(11, 'Személyi edző', 1),
(12, 'Tanár', 1),
(13, 'Nővér', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `gender` text NOT NULL,
  `money` int(11) DEFAULT 0,
  `skill` int(11) DEFAULT 0,
  `level` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `job_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `salary_id` int(11) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `player`
--

INSERT INTO `player` (`id`, `name`, `gender`, `money`, `skill`, `level`, `job_id`, `job_name`, `salary_id`, `salary`) VALUES
(109, 'sdew', 'n', 500000, 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `salary`
--

INSERT INTO `salary` (`id`, `description`, `level`) VALUES
(1, 300000, 0),
(2, 350000, 0),
(3, 330000, 0),
(4, 320000, 0),
(5, 350000, 1),
(6, 370000, 1),
(7, 380000, 1),
(8, 400000, 1),
(9, 340000, 0),
(10, 310000, 0),
(11, 360000, 1),
(12, 390000, 1),
(13, 400000, 2),
(14, 410000, 2),
(15, 420000, 2),
(16, 430000, 2),
(17, 440000, 2),
(18, 450000, 2),
(19, 450000, 3),
(20, 460000, 3),
(21, 470000, 3),
(22, 480000, 3),
(23, 490000, 3),
(24, 500000, 3);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `task` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_hungarian_ci NOT NULL,
  `answer` int(11) DEFAULT NULL,
  `solution` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `tasks`
--

INSERT INTO `tasks` (`id`, `task`, `answer`, `solution`) VALUES
(5, '1 + 2 = ', 12, 3),
(6, '3 - 2 = ', 32, 1),
(7, '2 + 5 = ', 25, 7),
(8, '10 + 3 = ', 103, 13),
(9, '3 + 6 = ', 36, 9),
(12, '1 + 1 = ', 11, 2),
(13, '2 + 2 = ', 22, 4),
(14, '5 + 2 = ', 52, 7),
(15, '3 + 3 = ', 33, 6),
(16, '5 - 4 = ', 2, 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT a táblához `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT a táblához `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
