-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Фев 10 2019 г., 15:04
-- Версия сервера: 5.6.38
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orderTable`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orderTable`
--

CREATE TABLE `orderTable` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `sum` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orderTable`
--

INSERT INTO `orderTable` (`id`, `name`, `surname`, `phone`, `email`, `city`, `sum`, `date`) VALUES
(1, 'Андрей', 'Павликов', '0970346566', 'AP@gmail.com', 'Кривой Рог', 10000, '2019-02-09 22:09:16'),
(2, 'Александр', 'Павликов', '0664254145', 'AP2@gmail.com', 'Кривой Рог', 4000, '2019-02-09 22:11:13'),
(3, 'Валентина', 'Иванова', '0952145632', 'VI@gmail.com', 'Кривой Рог', 2000, '2019-02-09 22:11:52'),
(4, 'Юлия', 'Устинова', '0682147856', 'JU@gmail.com', 'Кривой Рог', 6000, '2019-02-09 22:12:22'),
(5, 'Игорь', 'Устинов', '0680359899', 'IU@gmail.com', 'Кривой Рог', 8000, '2019-02-09 22:13:30'),
(6, 'Дмитрий', 'Иванов', '0664583204', 'DI@gmail.com', 'Киев', 3000, '2019-02-09 22:14:00'),
(7, 'Сергей', 'Покров', '0997125465', 'SP@gmail.com', 'Киев', 550, '2019-02-09 22:15:00'),
(8, 'Евгения', 'Ростовская', '0963142500', 'ER@gmail.com', 'Киев', 100, '2019-02-09 22:17:00'),
(9, 'Ольга', 'Тимофеева', '0668452032', 'OT@gmail.com', 'Киев', 230, '2019-02-09 22:18:00'),
(10, 'Даша', 'Федорова', '0346977', 'DF@gmail.com', 'Киев', 600, '2019-02-09 22:19:00'),
(11, 'Денис', 'Секанов', '0980345688', 'DS@gmail.com', 'Киев', 8000, '2019-02-09 22:20:00'),
(12, 'Андрей', 'Ермоленко', '0950458766', 'AE@gmail.com', 'Киев', 5000, '2019-02-09 22:21:00'),
(13, 'Максим', 'Варловский', '0668745204', 'MV@gmail.com', 'Кривой Рог', 6000, '2019-02-09 22:22:00'),
(14, 'Станислав', 'Мартовский', '0664854212', 'SM@gmail.com', 'Кривой Рог', 300, '2019-02-09 22:23:00'),
(15, 'Александр', 'Милевский', '0667521265', 'AM@gmail.com', 'Кривой Рог', 500, '2019-02-09 22:24:00'),
(16, 'Анна', 'Левицкая', '0970657855', 'AL@gmail.com', 'Кривой Рог', 300, '2019-02-09 22:25:00'),
(17, 'Инна', 'Картышова', '0974568744', 'IK@gmail.com', 'Кривой Рог', 400, '2019-02-09 22:26:00'),
(18, 'Марина', 'Петровская', '0970566566', 'MP@gmail.com', 'Чернигов', 990, '2019-02-09 22:27:00'),
(19, 'Иван', 'Петровский', '0970568788', 'IP@gmail.com', 'Чернигов', 990, '2019-02-09 22:28:00'),
(20, 'Уэсли', 'Снайпс', '0960465466', 'US@gmail.com', 'Желтые Воды', 700, '2019-02-09 22:29:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orderTable`
--
ALTER TABLE `orderTable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orderTable`
--
ALTER TABLE `orderTable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
