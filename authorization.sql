-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 21 2018 г., 22:38
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `authorization`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `role` int(1) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `login`, `pass`, `role`, `mail`, `phone`, `created_date`) VALUES
(1, 'admin', '123', 1, 'admin@mail.ru', '+7-987-654-3210', '2018-01-01 00:00:00'),
(2, 'julia', '456', 2, 'julia@mail.ru', '+7-999-888-7766', '2018-07-28 00:00:00'),
(3, 'alisa', '789', 2, 'alisa@mail.ru', '+7-888-777-6655', '2018-04-01 00:00:00'),
(4, 'nastya', '101', 2, 'nastya@mail.ru', '+7-777-666-5544', '2018-07-30 00:00:00'),
(5, 'egor', '112', 2, 'egor@mail.ru', '+7-666-555-4433', '2018-10-25 00:00:00'),
(6, 'nikita', '131', 2, 'nikita@mail.ru', '+7-555-444-3322', '2018-08-25 00:00:00'),
(7, 'irina', '141', 2, 'irina@mail.ru', '+7-444-333-2211', '2018-10-13 00:00:00'),
(8, 'alex', '111', 2, 'alex@mail.ru', '+7-444-333-2211', '2018-11-21 22:05:29'),
(9, 'anna', '123', 2, 'anna@mail.ru', '+7-999-888-77-66', '2018-11-21 23:16:31'),
(10, 'olya', '666', 2, 'olya@mail.ru', '+7-444-333-2211', '2018-11-22 00:22:27'),
(11, 'jack', '555', 2, 'jack@mail.ru', '+7-555-444-3322', '2018-11-22 00:28:10'),
(12, 'tom', '000', 2, 'tom@mail.ru', '+7-444-333-2211', '2018-11-22 00:32:40');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
