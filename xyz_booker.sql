-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2015 г., 13:28
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
  `description` varchar(255) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `app_start` varchar(255) DEFAULT NULL,
  `app_end` varchar(255) DEFAULT NULL,
  `id_room` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `xyz_appointments`
--

INSERT INTO `xyz_appointments` (`appointment_id`, `description`, `employee_id`, `app_start`, `app_end`, `id_room`) VALUES
(28, '', 1, '1430110800', '1430112600', 1),
(29, '', 5, '1430116200', '1430121600', 2),
(30, '', 6, '1430197200', '1430199000', 3),
(31, '', 7, '1430213400', '1430226000', 3),
(32, '', 3, '1430283600', '1430285400', 1),
(33, 'Testttt', 4, '1430206200', '1430215200', 2),
(34, 'dfgdfgdfg', 5, '1430283600', '1430285400', 2),
(35, 'gfgfhgfhgfh', 8, '1430197200', '1430206200', 1),
(36, 'hjghj', 1, '1430456400', '1430458200', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_employee`
--

CREATE TABLE IF NOT EXISTS `xyz_employee` (
  `employee_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `employee_password` varchar(32) DEFAULT NULL,
  `employee_login` varchar(10) DEFAULT NULL,
  `role_id` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `employee_hash` varchar(32) DEFAULT NULL,
  `employee_email` varchar(30) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `xyz_employee`
--

INSERT INTO `xyz_employee` (`employee_id`, `employee_password`, `employee_login`, `role_id`, `employee_hash`, `employee_email`, `employee_name`) VALUES
(1, 'd9b1d7db4cd6e70935368a1efb10e377', 'root', 1, 'f8d0f2b36e5c97e561efa81beb07d218', 'admin@mail.com', 'Rooth Nill'),
(5, 'd9b1d7db4cd6e70935368a1efb10e377', 'pvasya', 0, '2401fee31aa273cc9d137894098b8ee8', 'pvasya@mail.com', 'Vasya Putkin'),
(7, '9bf49267cc9c8a5428a3576ebce59b6b', 'tgen', 0, NULL, 'tgena@gmail.com', 'Tan Gena'),
(8, 'ed2e19985ad3a06c810efa1e53e70832', 'tkith', 0, NULL, 'tkith@gmail.com', 'Kith Taylor'),
(11, '88145eb6f2dc1e457452835da2f8f17f', 'tkris', 0, NULL, 'ttest@test', 'Kris Takker'),
(14, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(15, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(17, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(19, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(23, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(24, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(26, 'fb469d7ef430b0baf0cab6c436e70375', 'test', 0, NULL, 'test@mail.com', 'TEST'),
(29, 'ce4913ff07a2e2f66c9219662ea9eee1', 'test5', 0, NULL, 'test6@mail.com', 'TEST5');

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
