-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 12 2022 г., 08:00
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `jch_checking`
--

CREATE TABLE `jch_checking` (
  `id` int(11) NOT NULL,
  `url` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delay` int(11) NOT NULL,
  `attemp` int(11) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jch_user`
--

CREATE TABLE `jch_user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_hash` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_reset_token` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_token` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jch_user`
--

INSERT INTO `jch_user` (`id`, `username`, `password_hash`, `password_reset_token`, `verification_token`, `email`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(3, 'MegaAdmin', '$2y$13$jJkG1L/E6O0PbiK2oTwN/.vgqWsME3udwFsSlQ9t5s.0JCRp6zjfW', NULL, 'R-OIrDS06iXZAoavHrZvLXn44_6gKlOd_1657385096', 'vladimirkuban80@gmail.com', 'RnOR03eiaW-0w5rMom95cA1n_RfB--lA', 10, 1657385096, 1657385096);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `jch_checking`
--
ALTER TABLE `jch_checking`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jch_user`
--
ALTER TABLE `jch_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `jch_checking`
--
ALTER TABLE `jch_checking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jch_user`
--
ALTER TABLE `jch_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
