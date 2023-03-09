-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 09 2023 г., 15:35
-- Версия сервера: 8.0.30
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `po`
--

-- --------------------------------------------------------

--
-- Структура таблицы `apple`
--

CREATE TABLE `apple` (
  `id` int NOT NULL,
  `tree_id` int DEFAULT '1',
  `createTime` int NOT NULL,
  `dropTime` int NOT NULL,
  `ruinTime` int NOT NULL,
  `coordX` int NOT NULL DEFAULT '0',
  `coordY` int NOT NULL DEFAULT '0',
  `radius` int NOT NULL DEFAULT '5',
  `color` varchar(7) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '#000000',
  `reminder` int NOT NULL DEFAULT '100',
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `apple`
--

INSERT INTO `apple` (`id`, `tree_id`, `createTime`, `dropTime`, `ruinTime`, `coordX`, `coordY`, `radius`, `color`, `reminder`, `status`) VALUES
(1, 1, 1678029536, 1678461536, 1678479536, 35, 91, 17, '#FF3300', 100, 0),
(2, 1, 1678029578, 1678279612, 1678297612, 113, 61, 18, '#FFFF00', 80, 2),
(3, 1, 1678187413, 1678619413, 1678637413, 60, 44, 10, '#FF9900', 100, 0),
(4, 1, 1678187431, 1678198421, 1678216481, 493, 79, 13, '#FF0000', 100, 2),
(5, 1, 1678270340, 1678702340, 1678720340, 224, 13, 9, '#FF9900', 100, 0),
(6, 1, 1678270572, 1678702572, 1678720572, 156, 70, 17, '#FF9900', 100, 0),
(7, 1, 1678363243, 1678795243, 1678813245, 105, 54, 13, '#FF9900', 100, 0),
(8, 1, 1678363258, 1678795258, 1678813260, 45, 51, 7, '#FF0000', 100, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1677757506),
('m130524_201442_init', 1677758379),
('m190124_110200_add_verification_token_column_to_user_table', 1677758379),
('m230305_121054_create_apple_table', 1678022838),
('m230305_121134_create_tree_table', 1678022838),
('m230305_135645_add_tree_to_table', 1678025708);

-- --------------------------------------------------------

--
-- Структура таблицы `tree`
--

CREATE TABLE `tree` (
  `id` int NOT NULL,
  `nameTree` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'Tree',
  `border` int NOT NULL DEFAULT '5',
  `xTreeFrom` int NOT NULL DEFAULT '0',
  `xTreeTo` int NOT NULL DEFAULT '100',
  `yTreeFrom` int NOT NULL DEFAULT '0',
  `yTreeTo` int NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `tree`
--

INSERT INTO `tree` (`id`, `nameTree`, `border`, `xTreeFrom`, `xTreeTo`, `yTreeFrom`, `yTreeTo`) VALUES
(1, 'Apple Tree', 5, 100, 600, 0, 100);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `status` smallint NOT NULL DEFAULT '10',
  `created_at` int NOT NULL,
  `updated_at` int NOT NULL,
  `verification_token` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `is_admin`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Jim7', 'oGv0C4FlbNUjgxHmXEXZr9b5tsOffi9k', '$2y$13$YUAGrypKjLeSqN1.Wq3kDOtGVGaVTB9eBw2fenw.kFIl2re57Yz3q', NULL, 'jim7@mymail.ru', 1, 10, 1530517416, 1640783648, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `apple`
--
ALTER TABLE `apple`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tree`
--
ALTER TABLE `tree`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `apple`
--
ALTER TABLE `apple`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `tree`
--
ALTER TABLE `tree`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
