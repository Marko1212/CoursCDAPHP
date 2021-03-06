-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 11 2020 г., 10:05
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `webflix`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actor`
--

CREATE TABLE `actor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `actor`
--

INSERT INTO `actor` (`id`, `name`, `firstname`, `birthday`) VALUES
(1, 'Pacino', 'Al', '1940-04-25'),
(2, 'Brando', 'Marlon', '1924-04-03'),
(3, 'de Niro', 'Robert', '1943-08-17'),
(4, 'Willis', 'Bruce', '1955-03-19'),
(5, 'Liotta', 'Ray', '1954-12-18'),
(6, 'Snipes', 'Wesley', '1962-07-31'),
(7, 'Stalone', 'Sylvester', '1946-07-06'),
(8, 'Norton', 'Edward', '1969-08-18'),
(9, 'Spacey', 'Kevin', '1959-07-26'),
(10, 'Kilmer', 'Val', '1959-12-31'),
(11, 'Ford', 'Harrison', '1942-07-13');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Films de gangsters'),
(2, 'Action'),
(3, 'Horreur'),
(4, 'Science-fiction'),
(5, 'Thriller');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `note` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `nickname`, `message`, `note`, `created_at`, `movie_id`) VALUES
(1, 'Marko', 'azezeaeazeazeazeazezaezaeazeazezaea', 5, '2020-12-07 17:01:14', 1),
(2, 'sdg', '                qsdsqdsqdsqdqsdqsdsfsfdfsdfsdfsdfsq', 5, '2020-12-07 17:11:18', 1),
(3, 'sdfsdfdsfdfdsdxs', '                sdgdgsdgdsfsdfs', 3, '2020-12-07 17:14:02', 1),
(4, 'd', '                qfdqsdqsdqsdqsdqsdqsdqsdqsd', 2, '2020-12-08 08:53:45', 3),
(5, 'dsqsd', '                qsdqsdq', 3, '2020-12-08 08:57:34', 1),
(6, 'dsfdsf', '                dsfdsfsds', 2, '2020-12-08 09:04:38', 1),
(7, 'Marko', 'commentaire                ', 4, '2020-12-08 09:05:49', 11),
(11, 'hgbfvdc', '                ', 0, '2020-12-08 09:43:57', 20),
(12, 'tgfdsezqsdfzdsqf', 'sdfzedfqsfqdsdqs', 4, '2020-12-08 09:57:15', 3),
(13, 'Marko', 'superqsdqsdqsdqsdsqdqdqsqsdsqd', 1, '2020-12-08 17:07:37', 8),
(14, 'Marko', 'gfqdqsdqdqsdqsdqsdsqdsqdqsdsqd', 4, '2020-12-08 17:07:49', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `released_at` date NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) NOT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `movie`
--

INSERT INTO `movie` (`id`, `title`, `released_at`, `description`, `duration`, `cover`, `category_id`) VALUES
(1, 'Le Parrain', '1972-01-01', 'Lorem ipsum', 186, 'le-parrain.jpg', 1),
(2, 'Scarface', '1983-01-07', 'Lorem ipsum blablablab lablablab lablablabla sjjgk', 120, 'scarface.jpg', 1),
(3, 'Les Affranchis', '1990-01-01', 'Lorem ipsumssdfsdfsdfs dfsdfsd fsdfsdfsdfsdfsdfsdfsdfsfs', 145, 'les-affranchis.jpg', 1),
(4, 'Heat', '1995-01-01', 'Lorem ipsum', 146, 'heat.jpg', 1),
(5, 'Die Hard', '1988-01-01', 'Lorem ipsum', 124, 'die-hard.jpg', 2),
(6, 'Demolition Man', '1993-01-01', 'Lorem ipsum', 89, 'demolition-man.jpg', 2),
(7, 'Taken', '2008-01-01', 'Lorem ipsum', 96, 'taken.jpg', 2),
(8, 'Deadpool', '2016-01-01', 'Lorem ipsum', 97, 'deadpool.jpg', 2),
(9, 'The Expandables', '2010-01-01', 'Lorem ipsum', 132, 'the-expandables.jpg', 2),
(10, 'Scream', '1996-01-01', 'Lorem ipsum', 78, 'scream.jpg', 3),
(11, 'Vendredi 13', '1980-01-01', 'Lorem ipsum', 97, 'vendredi-13.jpg', 3),
(12, 'Saw', '2005-01-01', 'Lorem ipsum', 102, 'saw.jpg', 3),
(13, 'Scary Movie', '2000-01-01', 'Lorem ipsum', 79, 'scary-movie.jpg', 3),
(14, 'Star Wars IV Un nouvel espoir', '1977-01-01', 'Lorem ipsum', 160, 'star-wars-iv-un-nouvel-espoir.jpg', 4),
(15, 'Alien', '1979-01-01', 'Lorem ipsum', 145, 'alien.jpg', 4),
(16, 'ET', '1982-01-01', 'Lorem ipsum', 95, 'et.jpg', 4),
(17, 'Robocop', '1987-01-01', 'Lorem ipsum', 98, 'robocop.jpg', 4),
(18, 'The Game', '1997-01-01', 'Lorem ipsum', 96, 'the-game.jpg', 5),
(19, 'Sixième Sens', '1999-01-01', 'Lorem ipsum', 120, 'sixieme-sens.jpg', 5),
(20, 'Usual Suspects', '1995-01-01', 'Lorem ipsum', 114, 'usual-suspects.jpg', 5),
(21, 'Fight Club', '1999-01-01', 'Lorem ipsum', 108, 'fight-club.jpg', 5),
(22, 'Inception', '2010-01-01', 'Lorem ipsum', 107, 'inception.jpg', 5),
(23, 'Deadpool 2', '2019-01-01', 'Lorem ipsum', 93, 'deadpool-2.jpg', 2),
(34, 'Star Wars 7', '2020-12-09', 'trrgergtrhrtjrthergsfgsfgsdfsfsfsfsqfqfqfqsdf', 258, 'star-wars-7.png', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `movie_has_actor`
--

CREATE TABLE `movie_has_actor` (
  `movie_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `movie_has_actor`
--

INSERT INTO `movie_has_actor` (`movie_id`, `actor_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 3),
(3, 5),
(4, 1),
(4, 3),
(4, 10),
(5, 4),
(6, 6),
(6, 7),
(9, 7),
(19, 4),
(20, 9),
(21, 8);

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `stripe_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `requested_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `token`, `requested_at`) VALUES
(12, 'marko@mailinator.com', 'Marko', '$2y$10$6/YY7Mt3iOHkZDW8y/Icl.SZ8or5NUuY/sGSycF3Jzerp4hsk2ykK', NULL, NULL),
(13, 'olga@mailinator.com', 'Olga', '$2y$10$4IBRJ/8bwRo8Se3MPQC0/OlMPCH.cV1zGky6Z4YmmusWLFUPhEq0O', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_movie1_idx` (`movie_id`);

--
-- Индексы таблицы `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_movie_category_idx` (`category_id`);

--
-- Индексы таблицы `movie_has_actor`
--
ALTER TABLE `movie_has_actor`
  ADD KEY `fk_movie_has_actor_actor1_idx` (`actor_id`),
  ADD KEY `fk_movie_has_actor_movie1_idx` (`movie_id`);

--
-- Индексы таблицы `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payment_user1_idx` (`user_id`),
  ADD KEY `fk_payment_movie1_idx` (`movie_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `actor`
--
ALTER TABLE `actor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_movie1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `fk_movie_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `movie_has_actor`
--
ALTER TABLE `movie_has_actor`
  ADD CONSTRAINT `fk_movie_has_actor_actor1` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_movie_has_actor_movie1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_movie1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
