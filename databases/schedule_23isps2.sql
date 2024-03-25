-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 22 2024 г., 14:22
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `schedules`
--

-- --------------------------------------------------------

--
-- Структура таблицы `schedule_23isps2`
--

CREATE TABLE `schedule_23isps2` (
  `id` int(11) NOT NULL,
  `number_of_lesson` int(1) NOT NULL,
  `day_of_week` varchar(3) NOT NULL,
  `lesson_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `schedule_23isps2`
--

INSERT INTO `schedule_23isps2` (`id`, `number_of_lesson`, `day_of_week`, `lesson_name`) VALUES
(1, 1, 'mon', 'Разговоры о важном'),
(2, 1, 'tue', 'Основы проектирования баз данных'),
(3, 1, 'wed', 'Безопасность жизнедеятельности'),
(4, 1, 'thu', '-'),
(5, 1, 'fri', 'Проектирование и разработка веб-приложений'),
(6, 2, 'mon', 'Проектирование и дизайн информационных систем'),
(7, 2, 'tue', 'Основы проектирования баз данных'),
(8, 2, 'wed', 'Безопасность жизнедеятельности'),
(9, 2, 'thu', '-'),
(10, 2, 'fri', 'Проектирование и разработка веб-приложений'),
(11, 3, 'mon', 'Проектирование и дизайн информационных систем'),
(12, 3, 'tue', 'Проектирование и дизайн информационных систем'),
(13, 3, 'wed', 'Основы информационной безопасности'),
(14, 3, 'thu', 'Правовое обеспечение профессиональной деятельности'),
(15, 3, 'fri', 'Численные методы'),
(16, 4, 'mon', 'Основы информационной безопасности'),
(17, 4, 'tue', 'Проектирование и дизайн информационных систем'),
(18, 4, 'wed', 'Основы информационной безопасности'),
(19, 4, 'thu', 'Правовое обеспечение профессиональной деятельности'),
(20, 4, 'fri', 'Численные методы'),
(21, 5, 'mon', 'Проектирование и дизайн информационных систем'),
(22, 5, 'tue', 'Численные методы'),
(23, 5, 'wed', 'Безопасность жизнедеятельности'),
(24, 5, 'thu', 'Иностранный язык в профессиональной деятельности'),
(25, 5, 'fri', 'Экология отрасли'),
(26, 6, 'mon', 'Разработка кода информационных систем'),
(27, 6, 'tue', 'Численные методы'),
(28, 6, 'wed', 'Безопасность жизнедеятельности'),
(29, 6, 'thu', 'Иностранный язык в профессиональной деятельности'),
(30, 6, 'fri', 'Экология отрасли'),
(31, 7, 'mon', 'Разработка кода информационных систем'),
(32, 7, 'tue', 'Проектирование и дизайн информационных систем'),
(33, 7, 'wed', 'Правовое обеспечение профессиональной деятельности'),
(34, 7, 'thu', 'Проектирование и дизайн информационных систем'),
(35, 7, 'fri', 'Разработка кода информационных систем'),
(36, 8, 'mon', '-'),
(37, 8, 'tue', 'Проектирование и дизайн информационных систем'),
(38, 8, 'wed', '-'),
(39, 8, 'thu', 'Проектирование и разработка веб-приложений'),
(40, 8, 'fri', 'Разработка кода информационных систем');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `schedule_23isps2`
--
ALTER TABLE `schedule_23isps2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `schedule_23isps2`
--
ALTER TABLE `schedule_23isps2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
