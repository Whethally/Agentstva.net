-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 20 2022 г., 15:17
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `agenstvo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `balcony`
--

CREATE TABLE `balcony` (
  `id_balcony` int NOT NULL,
  `balocny_boolean` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `balcony`
--

INSERT INTO `balcony` (`id_balcony`, `balocny_boolean`) VALUES
(1, 'Да, есть балкон'),
(2, 'Нет, балкона нет.');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `area` varchar(255) NOT NULL,
  `floor` int NOT NULL,
  `year` int NOT NULL,
  `bedrooms` int NOT NULL,
  `height` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material_id` int NOT NULL,
  `balcony_id` int NOT NULL,
  `street_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `materials`
--

CREATE TABLE `materials` (
  `id_material` int NOT NULL,
  `material_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `materials`
--

INSERT INTO `materials` (`id_material`, `material_name`) VALUES
(1, 'Кирпич');

-- --------------------------------------------------------

--
-- Структура таблицы `streets`
--

CREATE TABLE `streets` (
  `id_Street` int NOT NULL,
  `street_name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `streets`
--

INSERT INTO `streets` (`id_Street`, `street_name`) VALUES
(1, 'ул. Пушкина 12/2');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_User` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_Name` varchar(255) NOT NULL,
  `middle_Name` varchar(255) NOT NULL,
  `last_Name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birthday` varchar(255) NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_User`, `login`, `password`, `first_Name`, `middle_Name`, `last_Name`, `phone`, `email`, `date_of_birthday`, `avatar`) VALUES
(44, 'root', '123', 'root', 'root', 'root', '+79373249454', 'dimanmitin@mail.ru', '2022-04-09', 'assets/img/12312.jpg'),
(45, 'admin', 'admin', '', 'admin', 'admin', '2536254546546', 'dimanmitin@mail.ru', '2022-03-31', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `balcony`
--
ALTER TABLE `balcony`
  ADD PRIMARY KEY (`id_balcony`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `balcony_id` (`balcony_id`),
  ADD KEY `balcony_id_2` (`balcony_id`),
  ADD KEY `street_id` (`street_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Индексы таблицы `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id_material`);

--
-- Индексы таблицы `streets`
--
ALTER TABLE `streets`
  ADD PRIMARY KEY (`id_Street`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `balcony`
--
ALTER TABLE `balcony`
  MODIFY `id_balcony` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `streets`
--
ALTER TABLE `streets`
  MODIFY `id_Street` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`balcony_id`) REFERENCES `balcony` (`id_balcony`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`street_id`) REFERENCES `streets` (`id_Street`),
  ADD CONSTRAINT `items_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id_material`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
