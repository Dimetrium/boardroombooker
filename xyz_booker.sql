-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 21 2015 г., 11:42
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
-- Структура таблицы `xyz_appointments`
--

CREATE TABLE IF NOT EXISTS `xyz_appointments` (
  `appointment_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start` varchar(255) NOT NULL,
  `end` varchar(255) NOT NULL,
  `id_room` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `xyz_appointments`
--

INSERT INTO `xyz_appointments` (`appointment_id`, `desc`, `employee_id`, `start`, `end`, `id_room`) VALUES
(1, 'Test desc appointments', 1, '1429086731', '1429087841', 1),
(2, 'Test desc appointments', 2, '1420186731', '1420186741', 2),
(3, 'Test desc appointments', 3, '1420286731', '1420286741', 3),
(4, 'Test desc appointments', 4, '1429466665', '1429470265', 1),
(5, 'Test desc appointments', 5, '1429189998', '1429193598', 1),
(6, 'Test desc appointments', 6, '1429608620', '1429612220', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_employee`
--

CREATE TABLE IF NOT EXISTS `xyz_employee` (
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `employee_password` varchar(10) DEFAULT NULL,
  `employee_name` varchar(10) DEFAULT NULL,
  `role_id` int(11) DEFAULT '0',
  `employee_hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_employee`
--

INSERT INTO `xyz_employee` (`employee_id`, `employee_password`, `employee_name`, `role_id`, `employee_hash`) VALUES
(0, 'PASSWORD', 'USER1', 0, 'q'),
(1, '123', 'root', 1, '96fa28c8f097e9193545fb7f14acc0bf');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_group`
--

CREATE TABLE IF NOT EXISTS `xyz_group` (
  `role_name` varchar(10) NOT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
