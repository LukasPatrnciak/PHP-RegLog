-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Po 09.Sep 2019, 13:10
-- Verzia serveru: 10.1.19-MariaDB
-- Verzia PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `lukaspatrnciak`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `articles`
--

CREATE TABLE `articles` (
  `id` int(4) NOT NULL,
  `author_id` int(4) NOT NULL,
  `title` varchar(64) COLLATE utf8_slovak_ci NOT NULL,
  `description` varchar(256) COLLATE utf8_slovak_ci NOT NULL,
  `body` varchar(8192) COLLATE utf8_slovak_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `config`
--

CREATE TABLE `config` (
  `registration` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `config`
--

INSERT INTO `config` (`registration`) VALUES
(1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `username` varchar(16) COLLATE utf8_slovak_ci NOT NULL,
  `name` varchar(32) COLLATE utf8_slovak_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8_slovak_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_slovak_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_slovak_ci NOT NULL,
  `administrator` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `email`, `password`, `administrator`) VALUES
(5, 'root', 'root', 'root', 'root@root.root', '41a516bfcfe54608489a6f9276dffd2f', 1),
(6, 'user', 'user', 'user', 'user@user.user', '7e46547576bfdde93590463951d13582', 0),
(7, 'test', 'test', 'test', 'test@test.test', '098f6bcd4621d373cade4e832627b4f6', 0);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
