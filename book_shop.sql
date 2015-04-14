-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2015 г., 02:25
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `book_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_authors`
--

CREATE TABLE IF NOT EXISTS `xyz_authors` (
  `author_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_title` varchar(100) NOT NULL,
  PRIMARY KEY (`author_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Дамп данных таблицы `xyz_authors`
--

INSERT INTO `xyz_authors` (`author_id`, `author_title`) VALUES
(1, 'Tyler Robert'),
(2, 'Lang Knott'),
(3, 'Scot Achebe'),
(4, 'Peter Adams'),
(21, 'Testovich1');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_books`
--

CREATE TABLE IF NOT EXISTS `xyz_books` (
  `book_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `book_title` varchar(255) NOT NULL,
  `price` float unsigned NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'no_image.jpg',
  `full_text` text NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Дамп данных таблицы `xyz_books`
--

INSERT INTO `xyz_books` (`book_id`, `book_title`, `price`, `img`, `full_text`) VALUES
(1, 'All the Rage', 21.49, 'product1.gif', 'The sheriff''s son, Kellan Turner, is not the golden boy everyone thinks he is, and Romy Grey knows that for a fact. Because no one wants to believe a girl from the wrong side of town, the truth about him has cost her everything--friends, family, and her community. Branded a liar and bullied relentlessly by a group of kids she used to hang out with, Romy''s only refuge is the diner where she works outside of town. No one knows her name or her past there; she can finally be anonymous. But when a girl with ties to both Romy and Kellan goes missing after a party, and news of him assaulting another girl in a town close by gets out, Romy must decide whether she wants to fight or carry the burden of knowing more girls could get hurt if she doesn''t speak up. Nobody believed her the first time--and they certainly won''t now--but the cost of her silence might be more than she can bear.'),
(2, 'Chasers of the Light', 11.84, 'product2.gif', 'Despite his early deathdate, Denton has always wanted to live a normal life, but his final days are filled with dramatic firsts. First hangover. First sex. First love triangle—as the first sex seems to have happened not with his adoring girlfriend, but with his best friend’s hostile sister. (Though he’s not totally sure—see, first hangover.) His anxiety builds when he discovers a strange purple rash making its way up his body. Is this what will kill him? And then a strange man shows up at his funeral, claiming to have known Denton’s long-deceased mother, and warning him to beware of suspicious government characters. . . . Suddenly Denton’s life is filled with mysterious questions and precious little time to find the answers.'),
(3, 'One Thing Stolen', 14.04, 'product3.gif', 'Something is not right with Nadia Cara. While spending a year in Florence, Italy, she''s become a thief. She has secrets. And when she tries to speak, the words seem far away. Nadia finds herself trapped by her own obsessions and following the trail of an elusive Italian boy whom only she has seen. Can Nadia be rescued or will she simply lose herself altogether? Set against the backdrop of a glimmering city, One Thing Stolen is an exploration of obsession, art, and a rare neurological disorder. It is a celebration of language, beauty, imagination, and the salvation of love.'),
(4, 'Shadow Scale (Seraphina)', 19, 'product4.gif', 'The kingdom of Goredd: a world where humans and dragons share life with an uneasy balance, and those few who are both human and dragon must hide the truth. Seraphina is one of these, part girl, part dragon, who is reluctantly drawn into the politics of her world. When war breaks out between the dragons and humans, she must travel the lands to find those like herself—for she has an inexplicable connection to all of them, and together they will be able to fight the dragons in powerful, magical ways. '),
(5, 'The Walls Around Us', 12.52, 'product5.gif', 'What really happened on the night Orianna stepped between Violet and her tormentors? What really happened on two strange nights at Aurora Hills? Will Amber and Violet and Orianna ever get the justice they deserve—in this life or in another one?\n\nIn prose that sings from line to line,Nova Ren Suma tells a supernatural tale of guilt and of innocence, and of what happens when one is mistaken for the other.\n\n“A suspenseful tour de force, a ghost story of the best sort, the kind that creeps into your soul and haunts you.” —Libba Bray, author of The Diviners and A Great and Terrible Beauty'),
(6, 'Red Queen', 15.49, 'product6.gif', 'Graceling meets The Selection in debut novelist Victoria Aveyard''s sweeping tale of seventeen-year-old Mare, a common girl whose once-latent magical power draws her into the dangerous intrigue of the king''s palace. Will her power save her or condemn her?\n\nMare Barrow''s world is divided by blood—those with common, Red blood serve the Silver- blooded elite, who are gifted with superhuman abilities. Mare is a Red, scraping by as a thief in a poor, rural village, until a twist of fate throws her in front of the Silver court. Before the king, princes, and all the nobles, she discovers she has an ability of her own.'),
(56, 'I''ll Give You the Sun', 35.57, 'product7.gif', 'ude and her twin brother, Noah, are incredibly close. At thirteen, isolated Noah draws constantly and is falling in love with the charismatic boy next door, while daredevil Jude cliff-dives and wears red-red lipstick and does the talking for both of them. But three years later, Jude and Noah are barely speaking. Something has happened to wreck the twins in different and dramatic ways . . . until Jude meets a cocky, broken, beautiful boy, as well as someone else—an even more unpredictable new force in her life. The early years are Noah''s story to tell. The later years are Jude''s. What the twins don''t realize is that they each have only half the story, and if they could just find their way back to one '),
(57, 'The Darkest Part of the Forest', 11.84, 'product8.gif', 'Children can have a cruel, absolute sense of justice. Children can kill a monster and feel quite proud of themselves. A girl can look at her brother and believe they''re destined to be a knight and a bard who battle evil. She can believe she''s found the thing she''s been made for.\n\nHazel lives with her brother, Ben, in the strange town of Fairfold where humans and fae exist side by side. The faeries'' seemingly harmless magic attracts tourists, but Hazel knows how dangerous they can be, and she knows how to stop them. Or she did, once.');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_byauth`
--

CREATE TABLE IF NOT EXISTS `xyz_byauth` (
  `auth_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_byauth`
--

INSERT INTO `xyz_byauth` (`auth_id`, `book_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 6),
(4, 8),
(2, 2),
(2, 2),
(3, 2),
(3, 2),
(4, 2),
(4, 2),
(1, 7),
(2, 7),
(1, 7),
(2, 7),
(4, 6),
(4, 6),
(4, 57),
(3, 56),
(3, 56);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_bycat`
--

CREATE TABLE IF NOT EXISTS `xyz_bycat` (
  `cat_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_bycat`
--

INSERT INTO `xyz_bycat` (`cat_id`, `book_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 4),
(2, 5),
(3, 6),
(4, 7),
(5, 8),
(6, 1),
(6, 2),
(3, 2),
(3, 2),
(2, 7),
(2, 7),
(4, 6),
(4, 6),
(3, 57),
(4, 56);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_cart_order`
--

CREATE TABLE IF NOT EXISTS `xyz_cart_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `order_id` int(100) NOT NULL,
  `book_id` int(100) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `xyz_cart_order`
--

INSERT INTO `xyz_cart_order` (`id`, `user_id`, `order_id`, `book_id`, `quantity`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 2),
(3, 2, 2, 3, 3),
(4, 2, 2, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_genres`
--

CREATE TABLE IF NOT EXISTS `xyz_genres` (
  `genre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_title` varchar(100) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `xyz_genres`
--

INSERT INTO `xyz_genres` (`genre_id`, `genre_title`) VALUES
(1, 'Drama'),
(2, 'Detective'),
(3, 'Comedy'),
(4, 'Horror'),
(5, 'Melodrama'),
(6, 'Romantic'),
(17, 'Testy1');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_group`
--

CREATE TABLE IF NOT EXISTS `xyz_group` (
  `role_name` varchar(10) NOT NULL,
  `id_role` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `xyz_group`
--

INSERT INTO `xyz_group` (`role_name`, `id_role`) VALUES
('user', 0),
('admin', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `xyz_orders`
--

INSERT INTO `xyz_orders` (`id`, `order_id`, `date`, `pay_method_id`, `pay_status_id`) VALUES
(1, 1, '2015-04-08 19:39:44', '1', 1),
(2, 2, '2015-04-08 20:23:35', '3', 3),
(3, 2, '2015-04-08 20:12:48', '2', 2),
(4, 2, '2015-04-08 20:12:48', '1', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_payment_method`
--

CREATE TABLE IF NOT EXISTS `xyz_payment_method` (
  `pay_method_id` int(2) NOT NULL AUTO_INCREMENT,
  `pay_method_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pay_method_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `xyz_payment_method`
--

INSERT INTO `xyz_payment_method` (`pay_method_id`, `pay_method_name`) VALUES
(1, 'MasterCard'),
(2, 'Visa'),
(3, 'PayPal'),
(4, 'WebMoney');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_pay_status`
--

CREATE TABLE IF NOT EXISTS `xyz_pay_status` (
  `pay_status_id` int(2) NOT NULL AUTO_INCREMENT,
  `pay_status_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pay_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `xyz_pay_status`
--

INSERT INTO `xyz_pay_status` (`pay_status_id`, `pay_status_name`) VALUES
(1, 'Pending'),
(2, 'Delivery'),
(5, 'Complite');

-- --------------------------------------------------------

--
-- Структура таблицы `xyz_users`
--

CREATE TABLE IF NOT EXISTS `xyz_users` (
  `discount` int(10) DEFAULT NULL,
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(10) DEFAULT NULL,
  `name` varchar(10) DEFAULT NULL,
  `role_id` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Дамп данных таблицы `xyz_users`
--

INSERT INTO `xyz_users` (`discount`, `user_id`, `password`, `name`, `role_id`) VALUES
(NULL, 1, '123', 'root', 1),
(5, 2, 'one', 'user one', 0),
(10, 3, 'two', 'user two', 0),
(NULL, 4, '123qwe', 'John', 0),
(NULL, 12, 'TEST', 'TEST', 0),
(NULL, 13, 'TEST', 'TEST', 0),
(NULL, 14, 'TESTs', 'TESTs', 0),
(NULL, 15, 'TESTs', 'TESTs', 0),
(NULL, 16, 'TESTs', 'TESTs', 0),
(NULL, 17, 'TESTs', 'TESTs', 0),
(NULL, 18, 'TESTs', 'TESTs', 0),
(NULL, 19, 'TESTs', 'TESTs', 0),
(NULL, 20, '', '', 0),
(NULL, 21, '', '', 0),
(NULL, 22, 'TEST', 'TEST', 0),
(NULL, 23, 'TEST', 'TEST', 0),
(NULL, 24, 'TEST', 'TEST', 0),
(NULL, 25, 'TEST', 'TEST', 0),
(NULL, 26, 'TEST', 'TEST', 0),
(NULL, 27, 'TEST', 'TEST', 0),
(NULL, 28, 'sdfsdf', 'fdsfsdf', 0),
(NULL, 29, 'sdfsdf', 'fdsfsdf', 0),
(NULL, 30, NULL, NULL, 0),
(NULL, 31, 'ggg', 'nnn', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
