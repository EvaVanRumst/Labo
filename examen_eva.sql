-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 13 sep 2015 om 15:33
-- Serverversie: 5.6.24
-- PHP-versie: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `examen_eva`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `todo`
--

CREATE TABLE IF NOT EXISTS `todo` (
  `id_todo` int(10) NOT NULL,
  `user` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `inhoud` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `date_create` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `todo`
--

INSERT INTO `todo` (`id_todo`, `user`, `inhoud`, `date_create`) VALUES
(49, 'wendy@gmail.com', '', '2015-09-13'),
(50, 'wendy@gmail.com', '', '2015-09-13'),
(51, 'wendy@gmail.com', '', '2015-09-13'),
(52, 'wendy@gmail.com', 'wandelen', '2015-09-13'),
(53, 'wendy@gmail.com', '', '2015-09-13'),
(54, 'wendy@gmail.com', '', '2015-09-13'),
(55, 'wendy@gmail.com', 'sdqf', '2015-09-13'),
(56, 'wendy@gmail.com', '', '2015-09-13'),
(57, 'wendy@gmail.com', '', '2015-09-13'),
(58, 'wendy@gmail.com', 'dsdff', '2015-09-13'),
(59, 'wendy@gmail.com', '', '2015-09-13'),
(60, 'wendy@gmail.com', '', '2015-09-13'),
(61, 'wendy@gmail.com', 'erwin pesten', '2015-09-13'),
(62, 'wendy@gmail.com', '', '2015-09-13'),
(63, 'wendy@gmail.com', 'de afwas', '2015-09-13'),
(64, 'wendy@gmail.com', 'frigo uitkuisen met azijn', '2015-09-13'),
(65, 'wendy@gmail.com', '', '2015-09-13'),
(66, 'eva@yahoo.com', 'afwas', '2015-09-13'),
(88, 'mario@yahoo.com', '', '2015-09-13'),
(89, 'mario@yahoo.com', '', '2015-09-13');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(10) NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `salt` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `create_date` date NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT '1',
  `isArchived` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`users_id`, `email`, `salt`, `password`, `create_date`, `isActive`, `isArchived`) VALUES
(2, 'eva@gmail.com', '205898580155f53cc6dd58f4.94449533', '040bf6b294c188389d31cf5bacc8ca31b3054fe969e4b643a532d1abaf69a7eae0c1868f2bd246ac84ca0b2aa00697016dacc794fb804b7434b327c510a25c1c', '2015-09-13', 1, 0),
(3, 't.b@gmail.com', '102112484755f5401cebeac5.24426903', '2a7abaab04c96f09fed6573c2ed7edbb758242006673ed98a872bcf66944e9a24c630955335638b81ffdfc5d0b194b6fe8b0e711237ea59548a4105836292ab8', '2015-09-13', 1, 0),
(4, 'wendy@gmail.com', '39126818155f55a1f821574.52683856', '6e9064cbf4f8a5d2b97c71a38e6e4c3939513d041b89f41b26f8d49a707d3f5ca06a28b27c229f63140728609964cc588585904e73f914599f04506b68dfe354', '2015-09-13', 1, 0),
(5, 'eva@yahoo.com', '126442117455f56550446173.51714676', '86c899808525edf59194b2b2e4df2bf3404fe3e7afd60c3ee2f3f16b68e2b8b4ee1e16f4d5d31715f023c3786081a84c0eee2017876e6853e7d34840bee49e84', '2015-09-13', 1, 0),
(6, 'timon.bijl@hotmail.com', '139727221055f56a331ccf84.07999549', 'a079be7186d8a6bdfac0a3ed98c26215f351bf9c75ca40e9e0e3835d8edbab58703f7522ec38efe9bda3ebc8d61eb5ce64fca28992f45e777bd46ed2535c6a69', '2015-09-13', 1, 0),
(7, 'mario@yahoo.com', '9432378255f56f43d59045.41846922', '7b482cf8b1cf83c73185d38b7a61ef20e90938fa33ebc66ce6385e6939a945c11310ae826e3965c9cdad244c7d401f800c7d0b312f8f1aca4a044d3e80fa1224', '2015-09-13', 1, 0);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id_todo`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `todo`
--
ALTER TABLE `todo`
  MODIFY `id_todo` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
