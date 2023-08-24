-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 30 2023 р., 02:35
-- Версія сервера: 10.4.26-MariaDB
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `tailor`
--

-- --------------------------------------------------------

--
-- Структура таблиці `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `chat`
--

INSERT INTO `chat` (`id`, `message`, `datetime`, `user_id`) VALUES
(1, 'Привіт, Сашко', '2022-11-10 04:18:19', 2),
(2, 'Привіт, як ти?', '2022-11-28 18:47:12', 3),
(3, 'Чудово', '2022-12-09 09:40:35', 2),
(4, 'Привітт', '2022-12-11 02:01:45', 5);

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `message`, `datetime`, `post_id`, `user_id`) VALUES
(1, 'Доволі не погані джинси за свою ціну, якісний матеріал...', '2022-11-30 21:10:59', 16, 3),
(2, 'Класний костюм', '2022-12-11 02:09:03', 18, 5),
(3, 'Досить тепла кофта', '2022-12-11 02:09:58', 14, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `tovars`
--

CREATE TABLE `tovars` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `datetime_lastedit` datetime DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `tovars`
--

INSERT INTO `tovars` (`id`, `title`, `description`, `text`, `price`, `datetime`, `datetime_lastedit`, `photo`, `user_id`) VALUES
(10, 'Лонгслів для тренувань adidas', 'Farm Rio', '<p>Лонгслів для тренувань з колекції adidas. Модель виконана з матеріалу, що відштовхує вологу.</p>\r\n', 1299, '2022-02-07 23:51:39', '2022-12-11 01:28:40', '10_63950816cffd8', 3),
(11, 'Футболка', 'Колір сірий', '<p>Футболка для тренувань з колекції Calvin Klein Performance. Модель виконана з матеріалу, що відштовхує вологу.</p>\r\n\r\n<p>Склад:<br />\r\n60% Бавовна, 40% Поліестер</p>\r\n', 999, '2022-02-08 09:51:35', '2023-06-30 02:29:57', '11_639507943aa37', 3),
(12, 'Футболка Under Armour', 'колір сірий однотонний', '<p>Футболка для тренувань з колекції Under Armour. Модель виконана з вологопоглинаючого матеріалу.</p>\r\n<p>Склад:<br />\r\n90% Поліестер, 10% Еластан</p>\r\n', 650, '2022-02-09 21:08:43', '2023-06-30 02:34:42', '12_6395074703abc', 1),
(13, 'Штани Puma', 'Чоловічі', '<p>Спортивні штани з колекції Puma. Модель виконана з матеріалу, що відштовхує вологу.</p>\r\n\r\n<p>Склад:<br />\r\nОсновний матеріал: 56% Поліестер, 44% Бавовна</p>\r\n', 1150, '2022-02-09 21:10:36', '2023-06-30 02:34:23', '13_639506f5d262e', 1),
(14, 'Кофта Under Armour', 'чоловіча колір сірий однотонна', '<p>Кофта з капюшоном із колекції Under Armour. Модель із застібкою на блискавку виготовлена із грубого, легко еластичного трикотажу.</p>\r\n', 1599, '2022-02-09 21:12:36', '2022-12-11 01:22:31', '14_639506a5f05ee', 1),
(15, 'Рюкзак The North Face Slackpack 2.0', 'Колір зелений великий з принтом', '<p>Рюкзак з колекції The North Face. Модель виконана з міцного водонепроникного матеріалу.</p>\r\n\r\n<p>Склад:<br />\r\n100% Поліестер</p>\r\n', 2899, '2022-02-09 21:53:03', '2022-12-11 01:21:02', '15_6395064da3e39', 2),
(16, 'Балаклава Under Armour', 'Балаклава Under Armour', '<p>Балаклава із колекції Under Armour. Модель виготовлена із гладкого трикотажу.</p>\r\n\r\n<p>Склад:<br />\r\n88% Поліестер, 12% Еластан</p>\r\n\r\n', 599, '2022-02-09 21:54:35', '2022-12-11 01:19:27', '16_639505edbee9a', 2),
(18, 'Костюм Adidas', 'Колір чорний', 'Спортивний костюм Adidas\r\nКолір: Чорний\r\nМатеріал: 90% Хлопок, 10% Еластан\r\nРозміри: S, M, L, XL, XXL', 1450, '2022-12-09 19:31:42', '2023-06-30 02:34:07', '18_639501315958a', 3),
(19, 'Кофта Calvin Klein', 'жіноча колір бежевий з капюшоном з принтом', '<p>Кофта для тренувань з капюшоном з колекції Calvin Klein Performance. модель виконана з матеріалу, що відштовхує вологу.</p>\r\n\r\n<p>Склад:<br />\r\nОсновний матеріал: 87% Бавовна, 13% Поліестер</p>\r\n', 2519, '2022-12-11 02:12:30', '2023-06-30 02:33:52', '19_6395125e83567', 5);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` int(11) DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `access`, `lastname`, `firstname`, `adress`) VALUES
(1, 'thenorthamigo@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', NULL, 'Симоненко', 'Дмитро', 'вул.Робітнича 39, м.Бердичів'),
(2, 'olena@gmail.com', '46929ec3d692ebf1607c23f53bfa566e', NULL, 'Січ', 'Олена', 'вул.Леніна 34, м.Київ'),
(3, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Кравчук', 'Володимир', 'вул.Житомирська 23, м.Київ'),
(4, 'krop@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', NULL, 'Коваленко', 'Сергій', 'вул.Степана Бандери 49, м.Львів'),
(5, 'max@gmail.com', '2ffe4e77325d9a7152f7086ea7aa5114', NULL, 'Троць', 'Максим', 'м.Львів вул.Сагайдачного 432');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tovars`
--
ALTER TABLE `tovars`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `tovars`
--
ALTER TABLE `tovars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
