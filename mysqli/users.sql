-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 27 2022 г., 17:24
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
(44, 'root', '$2y$10$A.gtqVjRVnTyQqi1.zzof.uREuA0ABYa3JucCo4Xb/fM9EANydj1C', 'Карина', 'Константиновна', 'Челомей', '+7 (937) 324-94-54', 'dimanmitin@mail.ru', '1990-10-26', 'Россия, г. Химки', '4965 976946', 'Отделением УФМС России по г. Химки', '2018-03-24', '940-125', 'Интернациональная ул., д. 21 кв.81', 'assets/img/12312.jpg'),
(45, 'admin', '$2y$10$A.gtqVjRVnTyQqi1.zzof.uREuA0ABYa3JucCo4Xb/fM9EANydj1C', 'Тарас', 'Филиппович', 'Копцев', '+7 (876) 234-56-73', 'dimanmitin@mail.ru', '1982-03-16', 'Россия, г. Ростов-на-Дону', '4618 992435', 'Отделением УФМС России по г. Ростов-на-Дону', '2021-06-10', '860-122', 'Победы ул., д. 16 кв.101', 'assets/img/icons8-checked-user-male-90 (2).png'),
(47, 'test', '$2y$10$A.gtqVjRVnTyQqi1.zzof.uREuA0ABYa3JucCo4Xb/fM9EANydj1C', 'test', 'test', 'test', '1232131231312', 'whethally@mail.ru', '2022-05-13', 'test', 'test', 'test', 'test', 'test', 'test', NULL),
(48, 'egor9', '$2y$10$ohX/5ohvIfxeoY3LEn6sjeM4ZbL3ajQpS/ps3y86QJc5tuRlaZqUq', 'Егор', 'Игоревич', 'Гайдай', '+7880051488', 'egoronanet@mail.ru', '2022-05-01', 'Ул. Кирова 65', '2148 351351', 'Ул. Орджоникидзе 123', '2022-05-21', '213-2512', 'Интернациональная ул., д. 21 кв.81', 'assets/img/bitcoin (1).ico');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_User` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
