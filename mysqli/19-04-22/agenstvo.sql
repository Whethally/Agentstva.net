-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Апр 20 2022 г., 21:08
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
-- Структура таблицы `citys`
--

CREATE TABLE `citys` (
  `id_city` int NOT NULL,
  `city` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `citys`
--

INSERT INTO `citys` (`id_city`, `city`) VALUES
(1, 'Москва');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `price` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `street` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `balcony` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `area` varchar(255) NOT NULL,
  `floor` int NOT NULL,
  `year` int NOT NULL,
  `bedrooms` int NOT NULL,
  `height` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_User` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_item`, `image`, `name`, `city`, `price`, `description`, `street`, `material`, `balcony`, `area`, `floor`, `year`, `bedrooms`, `height`, `id_User`) VALUES
(5, 'assets/img/4.jpg', 'Admin', '2', 3, '4', '5', '6', '7', '8', 9, 123, 12, '123', 45),
(8, 'assets/img/4.jpg', 'Дом из глины', 'Москва', 1000000, 'Дом из высококачественной глины сделанной в германии', 'Пушкина', 'Глина', 'Да', '123', 1, 2022, 12, '12', 45),
(9, 'assets/img/5.jpg', '3-комн. квартира, 66.1м², 1/16 этаж', 'Уфа', 5450000, 'Продается трехкомнатная квартира, по улице Степана Злобина д.38.  Квартира, с отдельной входной группой, по всему периметру квартиры утепленный фасад. Проведена охранная и пожарная сигнализация. Охраняется межведомственной охраной. Интернет. Видеокамеры. Установлены: водонагреватель, два кондиционера, кулер. Удобный выезд, на главные дороги и прекрасная транспортная доступность.  Всегда есть парковочные места!  Рассмотрим варианты покупки за наличный расчет и по ипотеке. Просмотр возможен только по предварительной записи. Звоните с 10-21!', 'Советский, ул. Степана Злобина, д. 38', 'Монолитно-кирпичный', 'Да', '66', 1, 2008, 3, '2', 44);

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
(1, 'Кирпич'),
(2, 'Дерево');

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
(45, 'admin', 'admin', 'admin', 'admin', 'admin', '2536254546546', 'dimanmitin@mail.ru', '2022-03-31', 'assets/img/icons8-checked-user-male-90 (2).png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `balcony`
--
ALTER TABLE `balcony`
  ADD PRIMARY KEY (`id_balcony`);

--
-- Индексы таблицы `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id_city`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `balcony_id` (`balcony`),
  ADD KEY `balcony_id_2` (`balcony`),
  ADD KEY `street_id` (`street`),
  ADD KEY `material_id` (`material`),
  ADD KEY `city_id` (`city`),
  ADD KEY `city_id_2` (`city`),
  ADD KEY `id_User` (`id_User`);

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
-- AUTO_INCREMENT для таблицы `citys`
--
ALTER TABLE `citys`
  MODIFY `id_city` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `materials`
--
ALTER TABLE `materials`
  MODIFY `id_material` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `items_ibfk_5` FOREIGN KEY (`id_User`) REFERENCES `users` (`id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
