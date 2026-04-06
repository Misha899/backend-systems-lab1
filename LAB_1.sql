-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.1.16
-- Час створення: Квт 06 2026 р., 10:39
-- Версія сервера: 8.4.6
-- Версія PHP: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `LAB_1`
--

-- --------------------------------------------------------

--
-- Структура таблиці `groups`
--

CREATE TABLE `groups` (
  `ID_Groups` int NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `groups`
--

INSERT INTO `groups` (`ID_Groups`, `title`) VALUES
(1, 'KI-12-1'),
(2, 'KI-12-2'),
(3, 'KI-12-3'),
(4, 'KI-12-4'),
(5, 'KI-12-5'),
(6, 'KI-13-1'),
(7, 'KI-13-2');

-- --------------------------------------------------------

--
-- Структура таблиці `lesson`
--

CREATE TABLE `lesson` (
  `ID_Lesson` int NOT NULL,
  `week_day` text NOT NULL,
  `lesson_number` int NOT NULL,
  `auditorium` text NOT NULL,
  `disciple` text NOT NULL,
  `type` enum('Lecture','Practical','Laboratory') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `lesson`
--

INSERT INTO `lesson` (`ID_Lesson`, `week_day`, `lesson_number`, `auditorium`, `disciple`, `type`) VALUES
(1, 'Monday', 3, '104i', 'Computer Networks', 'Lecture'),
(2, 'Monday', 4, '106i', 'Creation of Images and Sound', 'Lecture'),
(3, 'Monday', 5, '229', 'Internet Technologies', 'Laboratory'),
(4, 'Monday', 6, '229', 'Internet Technologies', 'Laboratory'),
(5, 'Saturday', 1, '10012', 'MathIGS', 'Practical'),
(6, 'Tuesday', 2, '305', 'Databases', 'Lecture'),
(7, 'Wednesday', 3, '210', 'Algorithms', 'Practical');

-- --------------------------------------------------------

--
-- Структура таблиці `lesson_groups`
--

CREATE TABLE `lesson_groups` (
  `FID_Lesson2` int NOT NULL,
  `FID_Groups` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `lesson_groups`
--

INSERT INTO `lesson_groups` (`FID_Lesson2`, `FID_Groups`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 5),
(2, 3),
(2, 2),
(3, 3),
(4, 3),
(1, 4),
(4, 1),
(4, 1),
(4, 1),
(4, 1),
(4, 1),
(5, 1),
(6, 6),
(7, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `lesson_teacher`
--

CREATE TABLE `lesson_teacher` (
  `FID_Teacher` int NOT NULL,
  `FID_Lesson1` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `lesson_teacher`
--

INSERT INTO `lesson_teacher` (`FID_Teacher`, `FID_Lesson1`) VALUES
(1, 1),
(2, 2),
(3, 3),
(3, 4),
(1, 4),
(1, 4),
(1, 4),
(1, 4),
(3, 4),
(3, 5),
(4, 6),
(5, 7);

-- --------------------------------------------------------

--
-- Структура таблиці `teacher`
--

CREATE TABLE `teacher` (
  `ID_Teacher` int NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп даних таблиці `teacher`
--

INSERT INTO `teacher` (`ID_Teacher`, `name`) VALUES
(1, 'Kovalenko A.A.'),
(2, 'Yankovskiy O.A.'),
(3, 'Ivaschenko G.S.'),
(4, 'Petrenko V.M.'),
(5, 'Shevchenko L.P.');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID_Groups`);

--
-- Індекси таблиці `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`ID_Lesson`);

--
-- Індекси таблиці `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`ID_Teacher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
