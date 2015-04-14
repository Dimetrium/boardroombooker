-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 15 2015 г., 00:47
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `xyz_booker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_group`
--

CREATE TABLE IF NOT EXISTS `xyz_group` (
  `role_name` varchar(10) NOT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_orders`
--

CREATE TABLE IF NOT EXISTS `xyz_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pay_method_id` varchar(255) DEFAULT NULL,
  `pay_status_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_pay_status`
--

CREATE TABLE IF NOT EXISTS `xyz_pay_status` (
  `pay_status_id` int(2) NOT NULL AUTO_INCREMENT,
  `pay_status_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pay_status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_users`
--

CREATE TABLE IF NOT EXISTS `xyz_users` (
  `user_id` int(11) NOT NULL DEFAULT '0',
  `password` varchar(10) DEFAULT NULL,
  `login` varchar(10) DEFAULT NULL,
  `role_id` int(11) DEFAULT '0',
  `user_hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_users`
--

INSERT INTO `xyz_users` (`user_id`, `password`, `login`, `role_id`, `user_hash`) VALUES
(0, 'PASSWORD', 'USER1', 0, 'q'),
(1, '123', 'root', 1, '96fa28c8f097e9193545fb7f14acc0bf');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
