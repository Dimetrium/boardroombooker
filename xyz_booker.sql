-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 05 2015 г., 01:05
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
  `submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recursion` int(11) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=194 ;

--
-- Дамп данных таблицы `xyz_appointments`
--

INSERT INTO `xyz_appointments` (`appointment_id`, `description`, `employee_id`, `app_start`, `app_end`, `id_room`, `submitted`, `recursion`) VALUES
(135, 'xxxxxx!!!!!!!!!!!!', 1, '1432305000', '1432306800', 1, '2015-05-03 17:59:16', 135),
(139, 'wer', 5, '1430802000', '1430803800', 2, '2015-05-03 17:59:23', 139),
(140, 'wer', 1, '1431406800', '1431408600', 3, '2015-05-03 17:59:24', 140),
(155, 'br 2, bi-w', 1, '1430888400', '1430890200', 2, '2015-05-04 10:56:00', 155),
(156, 'br 2, bi-w', 1, '1432098000', '1432099800', 2, '2015-05-04 10:56:00', 155),
(157, 'br 2, bi-w', 1, '1433307600', '1433309400', 2, '2015-05-04 10:56:00', 155),
(158, 'br 2, mnthly', 7, '1431579600', '1431581400', 2, '2015-05-04 10:56:29', 158),
(159, 'br 2, mnthly', 7, '1433998800', '1434000600', 2, '2015-05-04 10:56:29', 158),
(161, 'br 3, Weekly Duration max 4 ', 11, '1430982000', '1430987400', 3, '2015-05-04 10:58:41', 161),
(162, 'br 3, Weekly Duration max 4 ', 11, '1431586800', '1431592200', 3, '2015-05-04 10:58:41', 161),
(163, 'br 3, Weekly Duration max 4 ', 11, '1432191600', '1432197000', 3, '2015-05-04 10:58:41', 161),
(164, 'br 3, Weekly Duration max 4 ', 11, '1432796400', '1432801800', 3, '2015-05-04 10:58:41', 161),
(165, 'br 3, Weekly Duration max 4 ', 11, '1433401200', '1433406600', 3, '2015-05-04 10:58:41', 161),
(169, 'br 4, weekly uuupdaaateeed', 5, '1430719200', '1430731800', 4, '2015-05-04 15:38:41', 169),
(170, 'br 4, weekly uuupdaaateeed', 5, '1431324000', '1431336600', 4, '2015-05-04 15:38:41', 169),
(171, 'br 4, weekly uuupdaaateeed', 5, '1431928800', '1431941400', 4, '2015-05-04 15:38:41', 169),
(172, 'br 4, weekly uuupdaaateeed', 5, '1432533600', '1432546200', 4, '2015-05-04 15:38:41', 169),
(173, 'br 4, weekly uuupdaaateeed', 5, '1433138400', '1433151000', 4, '2015-05-04 15:38:41', 169),
(178, 'uuuuuuuuuuuu', 1, '1431932410', '1431941412', 2, '2015-05-04 13:44:57', 177),
(179, 'uuuuuuuuuuuu', 1, '1433142010', '1433151012', 2, '2015-05-04 13:44:57', 177),
(187, 'test 2', 8, '1431534600', '1431511200', 4, '2015-05-04 20:23:55', 186),
(188, 'test 2', 8, '1432139400', '1432116000', 4, '2015-05-04 20:23:55', 186),
(189, 'test 2', 8, '1432744200', '1432720800', 4, '2015-05-04 20:23:55', 186),
(190, 'test 2', 8, '1433349000', '1433325600', 4, '2015-05-04 20:23:55', 186),
(191, 'bjbj', 1, '1431496800', '1431531000', 1, '2015-05-04 22:03:32', 191),
(192, 'bjbj', 1, '1432706400', '1432740600', 1, '2015-05-04 22:03:32', 191),
(193, 'bjbj', 1, '1433916000', '1433950200', 1, '2015-05-04 22:03:32', 191);

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
(1, 'd9b1d7db4cd6e70935368a1efb10e377', 'root', 1, '1da528b664c4630fc9409b1ba85a7d95', 'admin@mail.com', 'Rooth Nill'),
(5, 'd9b1d7db4cd6e70935368a1efb10e377', 'pvasya', 0, '2401fee31aa273cc9d137894098b8ee8', 'pvasya@mail.com', 'Vasya Putkin'),
(7, '9bf49267cc9c8a5428a3576ebce59b6b', 'tgen', 0, NULL, 'tgena@gmail.com', 'Tan Gena'),
(8, 'ed2e19985ad3a06c810efa1e53e70832', 'tkith', 0, NULL, 'tkith@gmail.com', 'Kith Taylor'),
(11, '88145eb6f2dc1e457452835da2f8f17f', 'tkris', 0, NULL, 'ttest@test', 'Kris Takker');

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
