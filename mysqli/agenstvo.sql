-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Май 28 2022 г., 00:40
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

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
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `password`) VALUES
(1, 'root', 'root'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Структура таблицы `index`
--

CREATE TABLE `index` (
  `id_index` int NOT NULL,
  `index_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `index`
--

INSERT INTO `index` (`id_index`, `index_name`) VALUES
(1, 'Подбор недвижимости');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id_item` int NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `city` varchar(256) NOT NULL,
  `price` int NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `street` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `balcony` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `area` varchar(255) NOT NULL,
  `floor` int NOT NULL,
  `max_floor` int NOT NULL,
  `year` int NOT NULL,
  `bedrooms` int NOT NULL,
  `height` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_User` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id_item`, `image`, `name`, `city`, `price`, `description`, `street`, `material`, `balcony`, `area`, `floor`, `max_floor`, `year`, `bedrooms`, `height`, `id_User`) VALUES
(5, 'assets/img/6.jpg', 'Admin', 'Уфа', 3, '4', '5', '6', '7', '8', 9, 9, 123, 12, '123', 45),
(8, 'assets/img/4.jpg', 'Дом из глины', 'Москва', 1000000, 'Дом из высококачественной глины сделанной в германии', 'Пушкина', 'Глина', 'Да', '123', 1, 1, 2022, 12, '12', 45),
(9, 'assets/img/5.jpg', '3-комн. квартира, 66.1м², 1/16 этаж', 'Уфа', 5450001, 'Продается трехкомнатная квартира, по улице Степана Злобина д.38.  Квартира, с отдельной входной группой, по всему периметру квартиры утепленный фасад. Проведена охранная и пожарная сигнализация. Охраняется межведомственной охраной. Интернет. Видеокамеры. Установлены: водонагреватель, два кондиционера, кулер. Удобный выезд, на главные дороги и прекрасная транспортная доступность.  Всегда есть парковочные места!  Рассмотрим варианты покупки за наличный расчет и по ипотеке. Просмотр возможен только по предварительной записи. Звоните с 10-21!', 'Советский, ул. Степана Злобина, д. 38', 'Монолитно-кирпичный', 'Да', '66', 1, 1, 2008, 3, '2', 44);

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
  `place_of_birth` varchar(255) NOT NULL,
  `passport` varchar(255) NOT NULL,
  `passport_issued` varchar(255) NOT NULL,
  `passport_date` varchar(255) NOT NULL,
  `passport_code` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_User`, `login`, `password`, `first_Name`, `middle_Name`, `last_Name`, `phone`, `email`, `date_of_birthday`, `place_of_birth`, `passport`, `passport_issued`, `passport_date`, `passport_code`, `address`, `avatar`) VALUES
(44, 'root', '$2y$10$Nqt1D0q9.R.PiK2FgpC6HOnHOQza9FaWcbfySuU7oe6pZXvWH90ru', 'Карина', 'Константиновна', 'Челомей', '+7 (937) 324-94-54', 'dimanmitin@mail.ru', '1990-10-26', 'Россия, г. Химки', '4965 976946', 'Отделением УФМС России по г. Химки', '2018-03-24', '940-125', 'Интернациональная ул., д. 21 кв.81', 'assets/img/12312.jpg'),
(45, 'admin', '$2y$10$A.gtqVjRVnTyQqi1.zzof.uREuA0ABYa3JucCo4Xb/fM9EANydj1C', 'Тарас', 'Филиппович', 'Копцев', '+7 (876) 234-56-73', 'dimanmitin@mail.ru', '1982-03-16', 'Россия, г. Ростов-на-Дону', '4618 992435', 'Отделением УФМС России по г. Ростов-на-Дону', '2021-06-10', '860-122', 'Победы ул., д. 16 кв.101', 'assets/img/icons8-checked-user-male-90 (2).png'),
(47, 'test', '$2y$10$A.gtqVjRVnTyQqi1.zzof.uREuA0ABYa3JucCo4Xb/fM9EANydj1C', 'test', 'test', 'test', '1232131231312', 'whethally@mail.ru', '2022-05-13', 'test', 'test', 'test', 'test', 'test', 'test', NULL),
(48, 'egor9', '$2y$10$ohX/5ohvIfxeoY3LEn6sjeM4ZbL3ajQpS/ps3y86QJc5tuRlaZqUq', 'Егор', 'Игоревич', 'Гайдай', '+7880051488', 'egoronanet@mail.ru', '2022-05-01', 'Ул. Кирова 65', '2148 351351', 'Ул. Орджоникидзе 123', '2022-05-21', '213-2512', 'Интернациональная ул., д. 21 кв.81', 'assets/img/bitcoin (1).ico');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Индексы таблицы `index`
--
ALTER TABLE `index`
  ADD PRIMARY KEY (`id_index`);

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
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `index`
--
ALTER TABLE `index`
  MODIFY `id_index` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id_item` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `users` (`id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
