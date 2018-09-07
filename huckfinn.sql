-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Сен 07 2018 г., 11:20
-- Версия сервера: 8.0.12
-- Версия PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `huckfinn`
--

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1514446879),
('root', '1', 1513928997);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('accessAdmin', 2, 'Доступ в панель управления', NULL, NULL, 1513928997, 1513928997),
('admin', 1, 'Admin', NULL, NULL, 1513949301, 1513949301),
('changeUserRole', 2, 'Изменение роли пользователя', NULL, NULL, 1513928997, 1513928997),
('changeUserStatus', 2, 'Смена статуса пользователя', NULL, NULL, 1513928997, 1513928997),
('createUpdateInfo', 2, 'Добавление и редактирование информации', NULL, NULL, 1513932250, 1513932250),
('createUpdatePages', 2, 'Добавление и редактирование страниц', NULL, NULL, 1533715485, 1533715485),
('createUpdateRoles', 2, 'Добавление и редактирование ролей пользователя', NULL, NULL, 1513928997, 1513928997),
('createUser', 2, 'Добавление пользователя', NULL, NULL, 1513928997, 1513928997),
('deleteInfo', 2, 'Удаление информации', NULL, NULL, 1513932250, 1513932250),
('deletePages', 2, 'Удаление страниц', NULL, NULL, 1533715496, 1533715496),
('root', 1, 'Developer', NULL, NULL, 1513928997, 1513928997),
('viewInfo', 2, 'Просмотр информации', NULL, NULL, 1513932228, 1513932228),
('viewPages', 2, 'Просмотр страниц', NULL, NULL, 1533715465, 1533715465),
('viewRoles', 2, 'Просмотр ролей', NULL, NULL, 1513928997, 1513928997),
('viewUsers', 2, 'Просмотр пользователей', NULL, NULL, 1513928997, 1513928997);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'accessAdmin'),
('admin', 'changeUserRole'),
('admin', 'changeUserStatus'),
('admin', 'createUpdateInfo'),
('admin', 'createUpdatePages'),
('admin', 'createUpdateRoles'),
('admin', 'createUser'),
('admin', 'deleteInfo'),
('admin', 'viewInfo'),
('admin', 'viewPages'),
('admin', 'viewRoles'),
('admin', 'viewUsers'),
('root', 'accessAdmin'),
('root', 'changeUserRole'),
('root', 'changeUserStatus'),
('root', 'createUpdateInfo'),
('root', 'createUpdatePages'),
('root', 'createUpdateRoles'),
('root', 'createUser'),
('root', 'deleteInfo'),
('root', 'deletePages'),
('root', 'viewInfo'),
('root', 'viewPages'),
('root', 'viewRoles'),
('root', 'viewUsers');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `field_type`
--

CREATE TABLE `field_type` (
  `field_type_id` int(11) NOT NULL,
  `item_class` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `field_type` enum('string','textarea','text','boolean','image','file','integer') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `default_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) UNSIGNED NOT NULL,
  `updated_at` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `field_type`
--

INSERT INTO `field_type` (`field_type_id`, `item_class`, `field_type`, `key`, `title`, `default_value`, `created_at`, `updated_at`) VALUES
(1, 'app\\modules\\user\\models\\User', 'integer', 'theme', 'Color theme', '1', 1513929472, 1513929472);

-- --------------------------------------------------------

--
-- Структура таблицы `field_value`
--

CREATE TABLE `field_value` (
  `field_value_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `field_type_id` int(11) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `field_value`
--

INSERT INTO `field_value` (`field_value_id`, `item_id`, `field_type_id`, `value`) VALUES
(1, 1, 1, '3'),
(2, 2, 1, '3');

-- --------------------------------------------------------

--
-- Структура таблицы `info`
--

CREATE TABLE `info` (
  `info_id` int(11) NOT NULL,
  `slide` int(11) NOT NULL,
  `key` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `info`
--

INSERT INTO `info` (`info_id`, `slide`, `key`, `title`, `value`) VALUES
(1, 0, 'seo_title', 'Заголовок страницы (Title)', 'Huckfinn'),
(2, 0, 'seo_description', 'Краткое описание страницы (Meta Description)', ''),
(3, 0, 'seo_keywords', 'Ключевые слова (Meta Keywords)', ''),
(4, 0, 'seo_robots', 'Индексация (Meta Robots)', 'index, follow'),
(5, 8, 'contact_email', 'Email, на который отправляются данные с форм', 'manager@almaross.ru'),
(6, 8, 'phone1_title', 'Название первого номера телефона', 'г.Ростов-на-Дону'),
(7, 8, 'phone2_title', 'Название второго номера телефона', 'г.Ростов-на-Дону'),
(8, 8, 'phone1_value', 'Номер телефона 1', ' 8 (988) 577-00-08'),
(9, 8, 'phone2_value', 'Номер телефона 2', '8 (988) 577-00-03'),
(10, 8, 'address1', 'Основной адрес', 'г.Ростов-на-Дону,  ул. Большая Садовая, дом 4'),
(11, 8, 'address2', 'Адрес филиала', 'г.Ростов-на-Дону, ул. Ларина, 15'),
(12, 8, 'worktime', 'Время работы', 'с 08:00 до 21:00'),
(13, 6, 'gift1_title', 'Заголовок 1го блока', 'Лучшее соотношение цены<br>и качества'),
(14, 6, 'gift2_title', 'Заголовок 2го блока', 'Гарантию на проделанную работу<br>до 5 лет'),
(15, 6, 'gift3_title', 'Заголовок 3го блока', 'Мы выполняем работы по бурению<br>и резке'),
(16, 6, 'gift1_text', 'Текст 1го блока', 'Мы осуществляем полный цикл работ, не прибегая к услугам посредников, что позволяет нам делать цены ниже конкурентов'),
(17, 6, 'gift2_text', 'Текст 2го блока', 'В нашей компании предоставляется гарантия на оказанные услуги'),
(18, 6, 'gift3_text', 'Текст 3го блока', 'Работы по бурению диаметром отверстий от 42 до 500 мм. и глубиной до 3 метров. Резка бетона до 600 мм.'),
(19, 5, 'service_title', 'Заголовок блока услуг', 'Наша компания предоставляет комплекс услуг по алмазному сверлению и бурению в Ростове-на-Дону и области'),
(20, 5, 'service_sale_title', 'Заголовок блока с формой', 'Узнайте стоимость работ на вашем объекте по акционной цене'),
(21, 5, 'service_sale_text', 'Текст блока с формой', 'Cюда входят работы по алмазному сверление (бурение), алмазной резки перекрытий,  железобетона, кирпича, камня, алмазной резки проемов, а так же их усилению! Звоните!'),
(22, 4, 'remont_title_big', 'Выделенное слово заголовка', 'Алмазная'),
(23, 4, 'remont_title', 'Остальная часть заголовка', 'резка по доступной цене'),
(24, 4, 'remont_text', 'Текст блока', 'Просто позвоните нам и доверьтесь профессионализму наших мастеров!'),
(25, 2, 'sale1', 'Абзац 1', 'Минимальный выезд на объект от 2000 рублей<br> При заказе от 10 отверстий скидка 15%'),
(26, 2, 'sale2', 'Абзац 2 (выделенный)', 'ДЛЯ ФИЗ. ЛИЦ СПЕЦПРЕДЛОЖЕНИЕ'),
(27, 2, 'sale3', 'Абзац 3', ''),
(28, 2, 'sale4', 'Абзац 4 (мелкий)', ''),
(31, 1, 'header_title', 'Заголовок в шапке', 'АЛМАЗНОЕ СВЕРЛЕНИЕ<br>И РЕЗКА'),
(32, 1, 'header_text', 'Текст в шапке', 'Наша компания является лидером в данной области и обладает всем<br>необходимым оборудованием для качественного сверления и резки на ваших<br>объектах!'),
(33, 1, 'header1', 'Блок 1', 'Бесплатная<br>оценка'),
(34, 1, 'header2', 'Блок 2', 'Строгое соблюдение<br>всех сроков'),
(35, 1, 'header3', 'Блок 3', 'Опыт ремонтных<br>работ 5 лет');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1513928438),
('m140506_102106_rbac_init', 1513928997),
('m170612_074926_create_user_table', 1513928444),
('m170612_081405_create_field_tables', 1513928444),
('m170704_094401_create_user_role_updation_table', 1513928445),
('m170831_091224_create_info_table', 1513928445),
('m170831_111225_create_slider_table', 1513934467);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `root_page_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci,
  `data` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`page_id`, `root_page_id`, `title`, `slug`, `text`, `data`) VALUES
(1, NULL, 'Index', 'index', '', 'null'),
(3, NULL, 'Tickets', 'tickets', '', 'null'),
(4, NULL, 'Attractions', 'attractions', '<section class=\"sec-instahacks sec-instahacks--attraction\">\r\n<div class=\"container\">\r\n<div class=\"attraction-item\">\r\n<div class=\"attraction-item__media\">\r\n<div class=\"img-b\">\r\n<div class=\"img-g\" style=\"background-image: url(\'../../img/attraction.jpg\');\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"attraction-item__description\">\r\n<p class=\"attraction-item__title\">The Marketplace</p>\r\n<p class=\"attraction-item__subtitle\">The Huck Finn Jubilee marketplace will feature different types of food and craft vending. We are currently searching for the hippest, funkiest and most eclectic vendors in Southern California. Do you have a suggestion or know of a vendor that may be interested in being a part of the Huck Finn Jubilee family for 2018? We\'ll be accepting vending applications starting in mid-late June on <a href=\"http://www.huckfinn.com/index.html\" target=\"_blank\" rel=\"noopener\">huckfinn.com</a>. If you have any questions, contact us at <a href=\"mailto:info@huckfinn.com\">info@huckfinn.com!\"</a></p>\r\n</div>\r\n</div>\r\n<div class=\"attraction-item\">\r\n<div class=\"attraction-item__media\">\r\n<div class=\"img-b\">\r\n<div class=\"img-g\" style=\"background-image: url(\'../../img/attraction-item-new-2.jpg\');\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"attraction-item__description\">\r\n<p class=\"attraction-item__title\">FISHING</p>\r\n<p class=\"attraction-item__subtitle\">Cucamonga-Guasti Regional park offers two lakes for year-round catfish and trout fishing. A State of California Fishing License is required to fish at Cucamonga-Guasti Regional park and can be purchased online at the California Department of Fish and Game: <a href=\"https://www.wildlife.ca.g2v/licensing\" target=\"_blank\" rel=\"noopener\">https://www.wildlife.ca.g2v/licensing</a> or at local sporting goods retailers such as BassPro Shops or Big 5 Sporting Goods.</p>\r\n</div>\r\n</div>\r\n<h3 class=\"attraction-preview__title\">Opening and Welcome to Lil&rsquo; Huckers Kids Zone</h3>\r\n<p class=\"attraction-item__subtitle\">We&rsquo;ll play an opening song and have a little celebratory ho-down to mark the official opening of the Lil&rsquo; Huckers Kids Zone at Huck Finn Jubilee 2018!</p>\r\n<h3 class=\"attraction-preview__title\">Family Love Yoga</h3>\r\n<p class=\"attraction-item__subtitle\">Always a favorite, families can join their little ones in the early part of the day as we get loose in this exciting, interactive exercise. Led by an experienced yogi mom with a special focus on families. All ages are welcome.</p>\r\n<h3 class=\"attraction-preview__title\">Painting, Play Dough and Free form Art</h3>\r\n<p class=\"attraction-item__subtitle\">In this series of on-going activities, little artists can let their imaginations run wild as they delve into play dough sculptures, paintings, and drawings. FLV will supply crayons, colored pencils, and everything needed for kids to complete their oeuvre!</p>\r\n<h3 class=\"attraction-preview__title\">Giant Games</h3>\r\n<p class=\"attraction-item__subtitle\">When it&rsquo;s time for some straight up fun, challenge your friends and family to a round of giant Connect 4, Giant Jenga, or join in on a rousing round of Ultimate Twister. Open all day.</p>\r\n<h3 class=\"attraction-preview__title\">Bottle Cap Necklaces</h3>\r\n<p class=\"attraction-item__subtitle\">Come and make your own Huck Finn Jubilee souvenir, as we turn simple bottlecaps into bedazzled necklaces that you can customize with your own artistic touch!</p>\r\n<h3 class=\"attraction-preview__title\">Slack Line</h3>\r\n<p class=\"attraction-item__subtitle\">Work on your balance and concentration, in this fun yet very challenging test of skills! An Instructor will guide first-timers and more experienced kids. For ages 4 and up.</p>\r\n<h3 class=\"attraction-preview__title\">Airbrush Face Painting</h3>\r\n<p class=\"attraction-item__subtitle\">In this interactive experience, children will choose how they would like to decorate their faces and bodies, whether abstract or representative. Led by a trained facilitator, kids can start to see their bodies as a canvas for self expression.</p>\r\n<h3 class=\"attraction-preview__title\">Milk Jug Totem Pole - all weekend activation station</h3>\r\n<p class=\"attraction-item__subtitle\">Putting emphasis on using discarded objects to create beauty in our lives, this eco-arts activity will last throughout the festival weekend, as we make social art! Families will paint and stack big, old plastic jugs, in a community raising of a Huck Finn Jubilee totem pole! We&rsquo;ll also discuss the importance of recycling and avoiding single use items like straws altogether.</p>\r\n<h3 class=\"attraction-preview__title\">Introductory Music and Rhythm Workshops</h3>\r\n<p class=\"attraction-item__subtitle\">Stop by and learn about a new instrument and get some hands-on experience! Or bring your drum or percussion instrument for our groove circle.</p>\r\n<h3 class=\"attraction-preview__title\">Talent Show</h3>\r\n<p class=\"attraction-item__subtitle\">Sign up for a spot on the Little Huckers performance area, and show other kids and families what you got. Music, jokes, a cappella songs, dance, or whatever you can come up with!</p>\r\n<h3 class=\"attraction-preview__title\">Tin Lantern Making</h3>\r\n<p class=\"attraction-item__subtitle\">Using upcycled tin cans, we&rsquo;ll make patterns with metal hole punches and other tools. Then paint, and add adornments to your lanterns. This workshop will occur several times over the weekend to allow children and teens to make more elaborate lanterns if they would like. Recommended for children 8+ who can handle a hammer.</p>\r\n<h3 class=\"attraction-preview__title\">Power Wardrobe Creation Station</h3>\r\n<p class=\"attraction-item__subtitle\">Welcome to our Enchanted Closet where you can transform yards of fabric and materials into your own original outfits and accessories! Find your power and express your inner hero, animal or character. Come to adorn yourself, just in time to show off your creations in the Family Parade! No sewing skills required.</p>\r\n<h3 class=\"attraction-preview__title\">Family Parade</h3>\r\n<p class=\"attraction-item__subtitle\">A favorite at every festival, and the culmination of our family experience, we gather to parade around the grounds, showing off our individual styles, and pumping up crowds as we go. With chants and percussion, we help children - and indeed the entire festival - to understand that these are the future creators and artists who will soon occupy the main stage of Huck Finn Jubilee.</p>\r\n<h3 class=\"attraction-preview__title\">Movie Lounge</h3>\r\n<p class=\"attraction-item__subtitle\">When the sun dips low and you want a little break from the pickin&rsquo; and jammin&rsquo;, grab a blanket or lawn chair and come down and chill for an open air movie in the family area!</p>\r\n<h3 class=\"attraction-preview__title\">Featured Attractions</h3>\r\n<div class=\"row attraction-preview__row\">\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/attraction-item-1.jpg\');\">\r\n<p class=\"attraction-preview__item__name\">Open space</p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/yoga.jpg\');\">\r\n<p class=\"attraction-preview__item__name\">Yoga</p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/attraction-item-3.jpg\');\">\r\n<p class=\"attraction-preview__item__name\">Adventure</p>\r\n</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/ai1.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/ai2.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/ai3.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/ai4.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/ai5.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"col-xs-12 col-sm-4 col-md-4\">\r\n<div class=\"attraction-preview__item\" style=\"background-image: url(\'../../img/ai6.jpg\');\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"sec-lvl-4 sec-lvl-4--attraction\">\r\n<div class=\"container\">\r\n<div class=\"attraction-item-slider\">\r\n<div class=\"attraction-item-slider__media\">\r\n<div class=\"slick attraction__slider-for\">\r\n<div class=\"one-slide\">\r\n<div class=\"img shadow-for\" style=\"background-image: url(\'../../img/kidzone1.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"one-slide\">\r\n<div class=\"img shadow-for\" style=\"background-image: url(\'../../img/kidzone3.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"one-slide\">\r\n<div class=\"img shadow-for\" style=\"background-image: url(\'../../img/kidzone4.jpg\');\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<div class=\"slick attraction__slider-nav\">\r\n<div class=\"one-slide\">\r\n<div class=\"img\" style=\"background-image: url(\'../../img/kidzone1.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"one-slide\">\r\n<div class=\"img\" style=\"background-image: url(\'../../img/kidzone3.jpg\');\">&nbsp;</div>\r\n</div>\r\n<div class=\"one-slide\">\r\n<div class=\"img\" style=\"background-image: url(\'../../img/kidzone4.jpg\');\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"attraction-item-slider__description\">\r\n<p class=\"attraction-item__title\">LIL&rsquo; HUCKERS KID ZONE</p>\r\n<p class=\"attraction-item__subtitle\">Forget having to coordinate a child sitter! The entire family is welcome to the 2018 Huck Finn Jubilee! We&rsquo;re proud to be a festival that offers activities and fun for people of any age, especially the lil&rsquo; Huckers (our funny name for kids that attend Huck Finn Jubilee). Such activities will include a kid zone, face painting, musical and educational activities, an art station, a kids parade, and more soon to be announced! Please note that parental supervision is requested at all times.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"form-subscribe-padd\">\r\n<div class=\"form-subscribe\">\r\n<div class=\"m-w\">\r\n<div class=\"left-side\"><a class=\"wagon-baner\" href=\"#!\"><img src=\"../../img/wagon-baner-new.png\" alt=\"\" /></a>\r\n<div class=\"form-wrapp\">\r\n<div class=\"cloud-1\"><img class=\"img-responsive\" src=\"../../img/cloud-1.png\" alt=\"\" /></div>\r\n<form id=\"form-subscribe\" action=\"https://huckfinnsub.herokuapp.com/subscribers\">\r\n<p class=\"head-form\">GET UPDATES</p>\r\n<div><input id=\"email\" type=\"text\" placeholder=\"Email@email.com\" /></div>\r\n<div><input id=\"phone\" type=\"text\" placeholder=\"Phone for text update\" /></div>\r\n<div class=\"flex-buttons\"><button type=\"submit\">Submit</button> <!-- <a href=\"https://www.facebook.com/plugins/group/join/popup/?group_id=649296185444868&source=email_campaign_plugin\" target=\"_blank\">Sign In With Facebook</a> --></div>\r\n<div class=\"soc-links\">&nbsp;</div>\r\n</form></div>\r\n</div>\r\n<a class=\"wagon-item wagon-left\" href=\"#!\"><img src=\"../../img/wagon-left-new.png\" alt=\"\" /></a>\r\n<div class=\"right-side\"><a class=\"wagon-item wagon-center\" href=\"#!\"><img src=\"../../img/wagon-center-new.png\" alt=\"\" /></a> <a class=\"wagon-item wagon-right\" href=\"#!\"><img src=\"../../img/wagon-right-new.png\" alt=\"\" /></a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 'null'),
(5, NULL, 'Huck Finn Jubilee - Rules and Regulations', 'rules-and-regulations', '<p>Huck Finn Jubilee reserves the right to implement all rules and regulations that we feel are in the best interest and safety of our guests, our employee\'s and our agents that represent us.</p>\r\n<p>EVENT TIMES:</p>\r\n<p>Friday, October 5th 2PM - 11PM</p>\r\n<p>Saturday, October 6th <br />Gates Open to the Public 10:00 AM - Close 11:00 PM</p>\r\n<p>Sunday, June 15th <br />Gates Open to the Public 10:00 AM - Close 9:30 PM</p>\r\n<p>NOT ALLOWED</p>\r\n<ul>\r\n<li>Weapons, Fireworks, Laser Pointers - These items will be confiscated and violators will be promptly removed from the venue.</li>\r\n<li>Ice Chests or Coolers through the entrance gate.</li>\r\n<li>Outside Alcohol &ndash; Beer and wine will be served inside the event, to guests 21 and older, and may be purchased with proper ID. ID IS MANDATORY TO PURCHASE ALCOHOLIC BEVERAGES.</li>\r\n<li>Abusive, foul or disruptive language and obscene gestures</li>\r\n<li>Drugs &amp; drug paraphernalia</li>\r\n<li>Fighting, taunting or threatening remarks or gestures</li>\r\n<li>Motorized vehicles, golf carts, etc. Scooters are okay to be used with proper handicapped credentials.</li>\r\n<li>Intoxication or other signs of impairment related to alcohol consumption</li>\r\n<li>Unauthorized vendors, solicitations, handbills, sampling, giveaways, etc. unless contracted with the festival.</li>\r\n</ul>\r\n<p>PETS</p>\r\n<ul>\r\n<li>Absolutely NO PETS allowed on the festival grounds or parking lots (licensed ADA assistants excepted). This will be strictly enforced</li>\r\n<li>Tent Campers - NO pets allowed. If an animal is found in your tent or vehicle, Animal Control will be called.</li>\r\n<li>Day Users/Hotel Stayers - NO pets allowed. If an animal is found in vehicle, Animal Control will be called.</li>\r\n</ul>\r\n<p>PARKING</p>\r\n<p>Please follow the directions given to you by parking personnel. All parking is in the box office parking lot with overflow parking available.</p>\r\n<ul>\r\n<li>NO parking outside the event and walking in or parking on other property in the surrounding neighborhood.</li>\r\n<li>NO tailgating in the parking lot.</li>\r\n<li>NO RV parking in parking lots. You must have purchased an RV pass; RV&rsquo;s will be turned away.</li>\r\n<li>General Public: Main Entrance &amp; Exit &ndash; Off Turner Avenue (Gate #1) Price is $15 per vehicle. No in and out privileges. If you leave the lot you must pay to park again.</li>\r\n<li>RV: Main Entrance &amp; Exit (Gate #1) You will be directed to the appropriate zone within the Campground. All extra vehicles (meaning unhooked vehicles that do not fit in your 20x40 space) will be directed to park in the designated area with stickers.</li>\r\n<li>Tent Camping: Main Entrance &amp; Exit (Gate #1). Vehicles will be able to offload their equipment; thereafter will be directed to park in the designated area with stickers.</li>\r\n<li>VIP &amp; ADA: Archibald Avenue Main Park Gate (Gate #2).</li>\r\n<li>Other than an RV, tent &amp; RV vehicles will be allowed to come and go from Archibald Avenue main park gate (Gate #2).</li>\r\n<li>All vehicles will be removed from parking lots at the close of the event each night. Jammers will be allowed to stay until 2AM with parking sticker provided by organizers. Thereafter vehicles will be towed if you do not observe these rules.</li>\r\n</ul>\r\n<p>DAY ARRIVAL &amp; ENTRY PROCEDURE</p>\r\n<p>Gates open on Friday, 10/5 at 2 PM (please do not line up for access into the venue before 1 PM or block traffic on Turner Avenue.) Music begins on Friday at 3 PM.</p>\r\n<ul>\r\n<li>No coolers, alcohol or food is permitted through the admission gate unless you are RV or Tent Camping and must have a valid camping ticket. There will be a beer/wine and concessions to enjoy and we have plenty of food available. Food trucks and festival concessions will include a variety of food and drink. Steak, Chicken &amp; Rib Dinners, Asian, Hot Dogs, Ice Cream, Mexican, breakfast/coffee and a lot more.</li>\r\n<li>The Box Office and Will Call will be located in the parking lot at the entrance to the park. All entering vehicles will be processed through this area.</li>\r\n<li>If you have not purchased a ticket, please proceed to one of the ticket windows.</li>\r\n<li>If you have purchased your ticket online and printed your ticket, you can proceed to one of the windows that says &ldquo;Pre-Paid&rdquo;, show your printout, receive your wristband and go through bag check.</li>\r\n</ul>\r\n<p>IN &amp; OUT PRIVILEGES - CAMPERS</p>\r\n<ul>\r\n<li>Patrons Campers will be permitted to exit and re-enter the event, if they have a camping sticker, through Gate #2 off Archibald Avenue. We do encourage patrons to bring enough supplies for the entire event.</li>\r\n<li>Intoxicated persons will not be re-admitted.</li>\r\n<li>All persons must have the proper event ticket or wristband and ID to re-enter or they will be required to purchase another ticket.</li>\r\n</ul>\r\n<p>CANOPIES &amp; CHAIRS IN THE AUDIENCE AREA</p>\r\n<p>Canopies, high back chairs with covers, and umbrellas are not permitted in the audience area. These block the view of those sitting behind you.</p>\r\n<p>MEDICAL &amp; SAFETY</p>\r\n<ul>\r\n<li>Medical personnel will be onsite.</li>\r\n<li>Private Security and PD will be onsite at all times during the event.</li>\r\n<li>There will be overnight security inside the event throughout the night.</li>\r\n<li>Drink plenty of water!</li>\r\n<li>If you\'re going to consume alcohol, please do so wisely.</li>\r\n<li>Wear plenty of sunscreen.</li>\r\n<li>Carry and use a flashlight at night. Bring extra batteries.</li>\r\n</ul>\r\n<p>CAMPFIRES &amp; BBQ&rsquo;s</p>\r\n<p>BBQ&rsquo;s are permitted, however campfires are prohibited.</p>\r\n<p>LAKE and SWIMMING</p>\r\n<p>Please observe all posted regulations in regard to fishing, swimming, waterslides and paddleboat use.</p>\r\n<ul>\r\n<li>NO swimming in the lakes, these are for paddleboats and fishing only. Violators may be ejected from the event.</li>\r\n<li>Swimming area (Public Pool) will be closed for the season during the festival</li>\r\n</ul>\r\n<p>RV CAMPING</p>\r\n<ul>\r\n<li>ANYONE PLANNING TO BRING A RECREATIONAL VEHICLES, RV TRAILERS AND TRUCK CAMPERS MUST HAVE PURCHASED AN RV/ADMISSION PASS IN ADVANCE.</li>\r\n<li>Recreational Vehicles, RV Trailers and Buses will be parked in a separate area &ldquo;RV Campground&rdquo;.</li>\r\n<li>Recreational Vehicles, RV Trailers and Buses will be parked in a separate area &ldquo;RV Campground&rdquo;.</li>\r\n<li>You have the option (online) to choose a zone for your stay. Available zones are General, Family, and Pickers. Each zone has grass and gravel spots available. Each will be filled on a first come first served basis (grass to be filled first, followed by gravel).</li>\r\n<li>PLEASE DO NOT BLOCK TRAFFIC OR INCREASE ENTRANCE TIME BY MAKING SPECIAL REQUESTS.</li>\r\n<li>There are no electric hook ups or dump stations available on site at all - not even for Artists and Crew.</li>\r\n<li>The Jubilee ends Sunday at 9PM. You, however, may camp Sunday night, if you choose. This is included in your RV pass price. Check out time is not later than 11 AM on Monday, 10/8</li>\r\n</ul>\r\n<p>TENT CAMPING</p>\r\n<p>Always be respectful to your neighbors, and their campsite. Be kind to each other, share space, and help someone else who is in need&hellip;.</p>\r\n<ul>\r\n<li>The camping area is separated from the parking area.</li>\r\n<li>CAMPING SPACE IS VERY LIMITED, THEREFORE THERE IS NO CAMPING NEXT TO YOUR CAR and you will need to set your tents up as close as possible to one another. Please do not slow down in-bound traffic with requests to \"car camp\" or go to the spot you were in last year; we simply cannot accommodate these requests and still fit everyone in.</li>\r\n<li>Camping vehicles will be allowed to offload their vehicle near their location, thereafter they will park in a designated area reserved for campers.</li>\r\n<li>Vehicles will be allowed to come and go from the event with a designated sticker only.</li>\r\n<li>Cover your tent stakes so people don\'t cut themselves on the sharp edges.</li>\r\n<li>Bring a small lock to increase security of your belongings. Lock all valuables in your car! Although there will be security onsite, we cannot be held responsible for stolen items.</li>\r\n</ul>\r\n<p>VEHICLE CAMPING</p>\r\n<ul>\r\n<li>Vehicles will park in a parking stall in the designated parking lot.</li>\r\n<li>Vehicles will be allowed to come and go from the event with a designated sticker only.</li>\r\n<li>No blocking fire lanes with chairs and/or camping equipment</li>\r\n</ul>\r\n<p>SHOWERS &amp; TOILETS</p>\r\n<ul>\r\n<li>All park restrooms will be open and available during the festival. There are also portable toilets and hand washing stations located throughout the festival.</li>\r\n<li>There will not be showers on-site. Please do not use the Splash Pad area for bathing. Anyone seen doing so will be removed.</li>\r\n</ul>\r\n<p>OTHER INFO</p>\r\n<ul>\r\n<li>A variety of independent vendors will be selling food and crafts for the duration of the event. Ice and bottled water will be available for purchase.</li>\r\n<li>There will be an ATM onsite</li>\r\n<li>There are trash receptacles throughout the festival, please dispose of your own trash</li>\r\n</ul>\r\n<p>DEPARTURE</p>\r\n<ul>\r\n<li>The general public will be required to leave the festival by 11:30PM on Friday &amp; Saturday nights and 9:30PM on Sunday night, at the close of the event each day.</li>\r\n<li>You will be allowed to remain on the property until 2AM with the proper sticker on their your vehicle, to pick with friends. Thereafter, vehicles will be towed from the parking lot.</li>\r\n</ul>', 'null'),
(6, NULL, 'FAQs', 'faqs', '', 'null'),
(7, NULL, 'Past Lineups', 'past-lineups', '', 'null'),
(8, NULL, 'Event Info', 'event-info', '', 'null'),
(9, 8, 'Map', 'map', '', 'null'),
(10, 8, 'Meet the Huckers', 'meet-the-huckers', '<p>For over 40 years, we delivered acts from a long list of luminaries such as Ralph Stanley, Alison Krauss, Del McCoury, Punch Brothers, Rhonda Vincent, Steve Martin and the Steep Canyon Rangers, Emmylou Harris, Peter Rowan, and more. After a one-year hiatus, WE ARE BACK! Join us in Ontario, CA on October 5th, 6th, and 7th.</p>\r\n<p>&ldquo;It&rsquo;s important that we honor the tradition of this festival because the community deserves it and we want to take you on the musical journey that we experienced&rdquo; says our new owners, Nikki and Roger. The couple, both executives at an experiential marketing firm in Los Angeles, attended the festival in 2016 and were impressed with the music, array of activities for people of all ages and overall positive vibe. When they heard the festival wasn&rsquo;t going to return in 2017, they purchased Huck Finn Jubilee and built their dream team of industry experts in hopes of keeping the festival alive and maintaining the high-level of quality its fans and the community deserves.</p>\r\n<p>Entering its 41st year, the 2018 Huck Finn Jubilee will offer the entire festival experience featuring traditional and progressive bluegrass music, local food, craft beer, a unique array of handcrafted arts and crafts, access to beautiful park amenities, camping, fishing and general family fun.</p>\r\n<p>Connect with us on <a class=\"white-link\" href=\"https://www.instagram.com/huckfinnjubilee\" target=\"_blank\" rel=\"noopener\">Instagram</a>, <a class=\"white-link\" href=\"https://www.facebook.com/HuckFinnJubilee/\" target=\"_blank\" rel=\"noopener\">Facebook</a>, <a class=\"white-link\" href=\"https://twitter.com/hfjubilee\" target=\"_blank\" rel=\"noopener\">Twitter</a> and <a class=\"white-link\" href=\"https://www.youtube.com/user/HuckFinnJubilee/featured\" target=\"_blank\" rel=\"noopener\">YouTube!</a></p>\r\n<p>Learn more about the 2018 Huck Finn Jubilee in this four-part video series:</p>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=-zx0bqX9qkY\" target=\"_blank\" rel=\"noopener\">Experience 2018 Huck Finn Jubilee</a></p>', 'null'),
(11, 8, 'Travel and accommodations', 'travel-and-accommodations', '<p>Planes, trains and automobiles! Whichever you choose, there&rsquo;s an efficient way to get to, from, and around Ontario. For your complete guide to airports, rentals, and public transportation options, visit Ontario&rsquo;s WikiTravel site <a class=\"white-link\" href=\"https://wikitravel.org/en/Ontario\">here</a>.</p>\r\n<p>For directions to the festival, in Cucamonga-Guasti Regional Park, visit the park&rsquo;s website <a class=\"white-link\" href=\"https://www.facebook.com/GuastiRegionalPark/\">here.</a></p>\r\n<p>Not camping with us? Stay tuned for recommended accommodations!</p>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=z4WrAH6zhtw\" target=\"_blank\" rel=\"noopener\">Meet the New Owners of Huck Finn Jubilee: Nikki and Roger</a></p>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=fyQxgvVKfZw\" target=\"_blank\" rel=\"noopener\">Meet the New Owners of Huck Finn Jubilee: Nikki and Roger (Full-Length)</a></p>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=r0keIJhCO6I\" target=\"_blank\" rel=\"noopener\">2018 Huck Finn Jubilee: Mini-Documentary</a></p>', 'null'),
(12, 8, 'Camping and parking', 'camping-and-parking', '<p>Late night jams, hanging with family and friends around a campsite, and enjoying the beauty of the park are some of the great highlights of the Huck Finn Jubilee experience! Here are some things to know about parking and camping at 2018 Huck Finn Jubilee:</p>\r\n<ul>\r\n<li>Onsite RV &amp; tent camping is available! Check out our ticketing section for more details</li>\r\n<li>Camping Passes and Festival Passes/Tickets are sold separately</li>\r\n<li>RV passes are sold per vehicle NOT per person</li>\r\n<li>No Hook Ups</li>\r\n<li>No Re-entry</li>\r\n<li>We have limited camping and RV spaces. Secure your passes sooner than later</li>\r\n<li>RV camping is located behind the stage on grassy area</li>\r\n<li>GA parking is available onsite</li>\r\n<li>Ride sharing such as Lyft is available onsite</li>\r\n</ul>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=z4WrAH6zhtw\" target=\"_blank\" rel=\"noopener\">Meet the New Owners of Huck Finn Jubilee: Nikki and Roger</a></p>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=fyQxgvVKfZw\" target=\"_blank\" rel=\"noopener\">Meet the New Owners of Huck Finn Jubilee: Nikki and Roger (Full-Length)</a></p>\r\n<p><a class=\"white-link\" href=\"https://www.youtube.com/watch?v=r0keIJhCO6I\" target=\"_blank\" rel=\"noopener\">2018 Huck Finn Jubilee: Mini-Documentary</a></p>', 'null'),
(13, 8, 'Volunteer', 'volunteer', '', 'null');

-- --------------------------------------------------------

--
-- Структура таблицы `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL,
  `item_class` text COLLATE utf8_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `robots` enum('noindex, nofollow','index, nofollow','noindex, follow','index, follow') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `seo`
--

INSERT INTO `seo` (`seo_id`, `item_class`, `item_id`, `title`, `keywords`, `description`, `robots`) VALUES
(1, 'app\\modules\\pages\\models\\Page', 1, 'Huckfinn', NULL, NULL, 'index, follow'),
(2, 'app\\modules\\pages\\models\\Page', 3, 'Tickets', NULL, NULL, 'index, follow'),
(3, 'app\\modules\\pages\\models\\Page', 4, 'Attractions', NULL, NULL, 'index, follow'),
(4, 'app\\modules\\pages\\models\\Page', 5, 'Huckfinn Jubilee - Rules and Regulations', NULL, NULL, 'index, follow'),
(5, 'app\\modules\\pages\\models\\Page', 6, 'Frequently Asked Questions', NULL, NULL, 'index, follow'),
(6, 'app\\modules\\pages\\models\\Page', 7, 'Past Lineups', NULL, NULL, 'index, follow'),
(7, 'app\\modules\\pages\\models\\Page', 8, NULL, NULL, NULL, 'noindex, nofollow'),
(8, 'app\\modules\\pages\\models\\Page', 9, 'Map', NULL, NULL, 'index, follow'),
(9, 'app\\modules\\pages\\models\\Page', 10, 'Meet the Huckers', NULL, NULL, 'index, follow'),
(10, 'app\\modules\\pages\\models\\Page', 11, 'Travel and accommodations', NULL, NULL, 'index, follow'),
(11, 'app\\modules\\pages\\models\\Page', 12, 'Camping and parking', NULL, NULL, 'index, follow'),
(12, 'app\\modules\\pages\\models\\Page', 13, 'Volunteer', NULL, NULL, 'index, follow');

-- --------------------------------------------------------

--
-- Структура таблицы `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slide` int(11) NOT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `slider`
--

INSERT INTO `slider` (`slider_id`, `slide`, `title`, `text`, `image`) VALUES
(15, 1, 'Daily lineup schedule?', 'Announced! Find it here: <a href=\"https://bit.ly/2HcDqxJ\" class=\"white-link\" target=\"_blank\">https://bit.ly/2HcDqxJ</a>', NULL),
(16, 1, 'Does each camper need a camping ticket or just each campsite?', 'No, you only need a camping ticket per tent. To experience the music though, each person will need a festival ticket.', NULL),
(17, 1, 'When can campers beging checking into/claiming camp sites? When can they lineup to enter the camp grounds/festival?', 'We are working with the park and our production team to determine. Stay tuned!', NULL),
(18, 1, 'Can RV campers select their spots or will it be first come first serve?', 'No, you will be directed to your area based on the type of ticket you purchased (zone) and then it will be first come, first serve. Please note that there are grass and dirt spots available for each zone and we will be filling grass first (on first come first served basis)', NULL),
(19, 1, 'Parking passes needed?', 'Yes. You can purchase on-site. We will have plenty of parking!', NULL),
(20, 1, 'When does Pre-Sale end?', 'Pre-sale priced tickets run through August. Secure yours today!', NULL),
(21, 1, 'Where is my RV zone located within the park?', 'Map coming soon. Stay tuned!', NULL),
(22, 1, 'On-site parking in lot free for single day? Campers?', 'Parking passes will be able to be purchased on-site for a small fee TBD. Camping parking will be added fee on-site but will be very reasonable. RV is included. NO overnight parking for single-day parking.', NULL),
(23, 1, 'Activities for kids free? Same ones? (boats, pool, rock climbing) People have been asking specifics on this to determine if they\'re going to bring their kids or not.', 'The Swim Park will be closed for the season. However, we plan on having a TON of free activities for kids and the whole family including Kids Zone with face painting, parade, splash pad, playground, and more to be announced.', NULL),
(24, 1, 'Kid academies offered like in years past?', 'Potentially! We are working through these details. Stay tuned for more info!', NULL),
(25, 1, 'Will RV campers be able to select their spaces prior to entry?', 'RV campers will be guided into their respective RV zone (based on your ticket) and we will help coordinate your plot from there.', NULL),
(26, 1, 'Arrive on Thursday for camping?', 'We are currently working through these details. Stay tuned!', NULL),
(27, 1, 'Pets on festival grounds during festival?', 'No, only service animals.', NULL),
(28, 1, 'Re-entry for campers?', 'Yes, you can come and go (with or without your car except for an RV) as you need throughout the weekend. All we ask is that you leave your tent and your RV in its place once you setup camp.', NULL),
(30, 2, 'INFAMoUS STRING DUSTERS', '<p><em>\"With a nod to the past and a firm foot down on the gas toward the future, the \'Dusters... don\'t leave bluegrass behind; they\'re stretching it from within.\" - New York Times</em></p>\r\n<p><em>\"The Stringdusters are the Star Wars of Bluegrass and this is their Return of the Jedi. Stop fiddling with your lightsaber and get this album.\" - Ryan Adams</em></p>\r\n<p><em>\"...these stellar bluegrass players are pushing the music forward.\" - David Dye/World Caf&eacute;</em></p>\r\n<p>A band should never stop progressing.</p>\r\n<p>Forward motion belies creativity and evolution. A staunch and unwavering commitment to progression is how an unassuming group of five friends can collectively become a GRAMMY&reg; Award-winning force of nature. That&rsquo;s exactly how it happened for The Infamous Stringdusters. Within thirteen years since their 2005 formation, the band&mdash;Travis Book [bass, vocals], Andy Falco [guitar, vocals], Jeremy Garrett [fiddle, vocals], Andy Hall [dobro, vocals], and Chris Pandolfi [banjo, vocals]&mdash; have consistently forged ahead, relentlessly exploring the musical possibilities of a &ldquo;bluegrass ensemble&rdquo; and breaking down boundaries in the process.</p>\r\n<p>In a genre known for traditionalism, the &lsquo;Dusters have consistently covered new ground, inspired fans, and redefined what a bluegrass band can be. 2018 represented a high watermark for the quintet as they took home a GRAMMY&reg; Award in the category of &ldquo;Best Bluegrass Album&rdquo; for their 2017 release Laws of Gravity.</p>\r\n<p>Even with such milestones, the members feel like they&rsquo;re only getting started.</p>\r\n<p>&ldquo;I&rsquo;m most inspired by the evolution of the music,&rdquo; agrees Book. &ldquo;The band is reaching new heights with our exploration and jamming. The repertoire is deep, and our crew is so entwined in the music and presentation of the show. It&rsquo;s all come together in the last year or so.&rdquo;</p>\r\n<p>Hall adds, &ldquo;Releasing three recorded projects this year has been artistically exciting. Mostly, the band has taken a huge leap forward in our live show with our improvisation blending from one song into the next. It&rsquo;s made everything that much more fun.&rdquo;</p>\r\n<p>The motion includes a prolific output that rivals any act in music. In 2017 alone, they released three projects: Laws of Gravity, Laws of Gravity: Live, and Undercover Vol. 2 through Lumenhouse Recordings. Impressively, the band&rsquo;s eighth full length record, Laws of Gravity, received a 2018 GRAMMY&reg; Award nomination in the category of &ldquo;Best Bluegrass Album&rdquo;, bowed in the Top 10 of the Billboard Heatseekers Chart, and marked their third debut at #1 on the Bluegrass Albums Chart with Undercover Vol. 2 becoming their seventh Top 10 entry. Recognized by some of the top names in the game, they teamed up with Ryan Adams for performances of &ldquo;Sweet Carolina&rdquo; on The Late Show with Stephen Colbert and at Telluride Bluegrass Festival, and Newport Folk Festival. Phil Lesh also tapped them as his band for Phil and Friends at Lockn alongside members of Phish.</p>\r\n<p>Another tenet of that progression, the second installment of the Undercover series exemplifies the exploration ethos, transforming various recognizable anthems into raw and rootsy gems. &ldquo;Jessica&rdquo; by The Allman Brothers Band, rollicks and rolls, &ldquo;Get Lucky&rdquo; by Daft Punk maintains its dancefloor energy, and Marvin Gaye&rsquo;s &ldquo;What&rsquo;s Going On,&rdquo; adopts newfound urgency. The Cure&rsquo;s &ldquo;Just Like Heaven&rdquo; undergoes a bluegrass makeover with galloping banjo and blistering solos.</p>\r\n<p>Along the way, The Stringdusters have won three International Bluegrass Music Association Awards in 2007 for their debut record, Fork in the Road, in addition to snagging a nomination for &ldquo;Instrumental Group of the Year&rdquo; by the International Bluegrass Music Association in 2010. Meanwhile, Things That Fly&rsquo;s &ldquo;Magic No. 9&rdquo; garnered a 2011 GRAMMY&reg; nod in the category of &ldquo;Best Country Instrumental.&rdquo;</p>\r\n<p>The Infamous Stringdusters are grateful for the recognition, but they continue to move forward full speed ahead.</p>\r\n<p>&ldquo;I just hope that our music gives people a chance to feel free; free from the burdens of everyday life that we all have, free to just be themselves and be happy,&rdquo; Falco leaves off.</p>\r\n<p>&ldquo;It\'s an amazing gift to play this music, to share this journey with these guys,&rdquo; concludes Book. &ldquo;I wouldn\'t trade it for anything, there\'s no other gig I\'d rather have, no other place I&rsquo;d rather be than in the moment making this music. This band, our organization and crew, we&rsquo;re a family and I think I speak for everyone when I say I hope we can do this for years to come.&rdquo;</p>', '/img/sliders/634486516.jpg'),
(31, 2, 'YoNDER MoUNTAIN STRING BAND', '<p>Yonder Mountain String Band\'s first new album in two years, LOVE. AIN\'T LOVE is undeniably the Colorado-based progressive bluegrass outfit\'s most surprising, creative, and yes, energetic studio excursion to date. Songs like \"Chasing My Tail\" and \"Alison\" are rooted in tradition but as current as tomorrow, animated by electrifying performance, vivid production, and the modernist power that has made Yonder one of the most popular live bands of their generation. Melding sophisticated songcraft, irrepressible spirit, and remarkable instrumental ability, LOVE. AIN\'T LOVE is a testament to Yonder Mountain String Band\'s organic, dynamic, and intensely personal brand of contemporary bluegrass-fueled Americana.</p>\r\n<p>Yonder founding members Aijala, banjo player Dave Johnston, and bassist Ben Kaufmann reconfigured Yonder Mountain String Band as a traditional bluegrass instrumental five-piece in 2014 with the recruitment of new players Allie Kral (violin) and Jacob Jolliff (mandolin). The reconstituted group debuted with 2015\'s acclaimed BLACK SHEEP, but truly gelled as they toured, the new players\' personalities seamlessly blending and elevating the intrinsically tight Yonder sound. Yonder made certain to show off the current roster\'s growing strength with the 2017 release of MOUNTAIN TRACKS: VOLUME 6, the first installment in their hugely popular live recording series since 2008.</p>\r\n<p>LOVE. AIN\'T LOVE is produced by Yonder Mountain String Band and longtime collaborator John McVey, with the majority of the album recorded at Coupe Studios in Yonder\'s home base of Boulder, CO. Aijala and McVey handled all of the album\'s mix and engineering at their respective home studios and while Yonder was on the road -- the second time a Yonder member has taken on the technical task.</p>\r\n<p>Like virtually all aspects of Yonder Mountain String Band\'s unlikely artistic methodology, LOVE. AIN\'T LOVE is a fully collaborative effort, its original songs credited to the core founding trio of Aijala, Johnston, and Kaufmann, regardless of combination or specific input.</p>\r\n<p>Laced with interstitial dialogue, music, sound effects, and other overlapping ephemera, LOVE. AIN\'T LOVE is by design Yonder\'s most ingenious studio collection thus far. Songs like \"Take A Chance On Me\" and the heavy metal-inspired breakdown, \"Fall Outta Line,\" see the quintet touching upon FM pop, country rock, funk, world music, and so much more; adopting traditional sonic and lyrical idioms to mask deeper and darker personal truths.</p>\r\n<p>In addition to the founding trio\'s songwriting efforts, Jolliff -- who arrived to play on BLACK SHEEP sessions and never left -- contributed a pair of fiery instrumentals and also lends vocals to a delightful cover of King Harvest\'s eternal \"Dancing In The Moonlight.\"</p>\r\n<p>2017 will see Yonder continue its seemingly endless touring, leading towards next year\'s 20th anniversary of their initial coming together, an irrefutably momentous occasion.</p>\r\n<p>With its melodic flair, expert technique, and forward-thinking fervor, LOVE. AIN\'T LOVE is a strikingly assured and well-crafted manifestation of Yonder\'s matchless musical vision. Nearly two decades in, Yonder Mountain String Band is still utterly unto themselves, a one-of-a-kind, once-in-a-lifetime combo whose inventiveness, versatility, and sheer imagination shows no sign of winding down.</p>', '/img/sliders/858054761.jpg'),
(32, 2, 'KELLER WILLIAMS\' GRATEFUL GRASS', '<p>Keller Williams released his first album in 1994, FREEK, and has since given each of his albums a single syllable title: BUZZ, SPUN, BREATHE, LOOP, LAUGH, HOME, DANCE, STAGE, GRASS, DREAM, TWELVE, LIVE, ODD, THIEF, KIDS, BASS, PICK, FUNK, VAPE, SYNC and RAW, , those who have followed his career will know this. Each title serves as a concise summation of the concept guiding each project. GRASS, for example, is a bluegrass recording cut with the husband-wife duo The Keels. STAGE is a live album and DREAM is the realization of Keller&rsquo;s wish to collaborate with some of his musical heroes. THIEF is a set of unexpected cover songs, KIDS offers Keller&rsquo;s first children&rsquo;s record, PICK presents Keller&rsquo;s collaboration with royal bluegrass family The Travelin&rsquo; McCoury&rsquo;s, and RAW is a solo acoustic album. Each album showcases Keller&rsquo;s comprehensive and diverse musical endeavors and functions to provide another piece of the jigsaw puzzle that is Keller Williams. Keller&rsquo;s collaborative and solo albums reflect his pursuit to create music that sounds like nothing else. Unbeholden to conventionalism, he seamlessly crosses genre boundaries. The end-product is astounding and novel music that encompasses rock, jazz, funk, and bluegrass, and always keeps the audience on their feet.</p>\r\n<p>Since he first appeared on the scene in the early &rsquo;90s, Williams has defined the term independent artist. And his recordings tell only half the story. Keller built his reputation initially on his engaging live performances, no two of which are ever alike. For most of his career he has performed solo. His stage shows are rooted around Keller singing his compositions and choice cover songs, while accompanying himself on acoustic guitar. With the use of today&rsquo;s technology, Keller creates samples on the fly in front of the audience, a technique called live phrase sampling or looping, with nothing pre-recorded, the end result often leans toward a hybrid of alternative folk and groovy electronica. A genre Keller jokingly calls &ldquo;acoustic dance music&rdquo; or ADM.&rdquo;</p>\r\n<p>That approach, Williams explains, was derived from &ldquo;hours of playing solo with just a guitar and a microphone, and then wanting to go down different avenues musically. I couldn&rsquo;t afford humans and didn&rsquo;t want to step into the cheesy world of automated sequencers where you hit a button and the whole band starts to play, then you&rsquo;ve got to solo along or sing on top of it. I wanted something more organic yet with a dance groove that I could create myself.&rdquo;</p>\r\n<p>Williams&rsquo; solo live shows&mdash;and his ability to improvise to his determinedly quirky tunes despite the absence of an actual band&mdash;quickly became the stuff of legend, and his audience grew exponentially when word spread about this exciting, unpredictable performer. Once he began releasing recordings, starting with 1994&rsquo;s FREEK, Williams was embraced by an even wider community of music fans, particularly the jam band crowd. While his live gigs have largely been solo affairs, Williams has nearly always used his albums as a forum for collaborations with fellow musicians. An alliance with The String Cheese Incident on 1999&rsquo;s BREATHE marked Williams&rsquo; first release on the band&rsquo;s label SCI Fidelity Records, DREAM, Keller&rsquo;s 2007 release, found him in the company of such iconic musicians as the Grateful Dead&rsquo;s Bob Weir, banjo master B&eacute;la Fleck, bass great Victor Wooten, American musician/poet Michael Franti and many others.</p>\r\n<p>Williams&rsquo; story begins in Fredericksburg, Virginia, just south of Washington, D.C. There he was exposed to a wide variety of music at an early age, starting with country and bluegrass and working his way up through hip-hop and go-go, a brand of funk particular to that part of the country. Once he began playing guitar, Williams&rsquo; sphere expanded to what he calls &ldquo;the post-pseudo-skateboarder punk-rock rebellious type of thing, Black Flag and Sex Pistols and Ramones, Dead Kennedys, things like that. That slid into the more melodic college rock, like the Cure and the Cult, the Smiths, R.E.M.&rsquo;s first five or six records.&rdquo;</p>\r\n<p>Then came the Grateful Dead, a seminal influence on Williams&rsquo; own music. &ldquo;I studied and learned their music and went to the shows,&rdquo; he says, adding that the impact of Jerry Garcia on his attitude toward music remains incalculable. Another major influence was Michael Hedges, the late virtuoso acoustic guitarist. &ldquo;He was really excelling in a whole different world from what I knew,&rdquo; says Williams.</p>\r\n<p>After relocating to Colorado, further exposure to bluegrass music and progressive acoustic artists such as B&eacute;la Fleck and the Flecktones also had a major impression on Williams. As he began to develop his own distinctive compositional and performing style, Williams incorporated all of the lessons he&rsquo;d learned from the long list of artists who&rsquo;d found their way into his world, then filtered their music through his own experiences until something wholly unique emerged. The list of artists whose music he has covered either in concert or on his recordings constitutes a mind-blowing spread: songs originally performed by everyone from Pink Floyd and Ozzy Osbourne to Ani DiFranco and old-school rappers the Sugar Hill Gang!</p>\r\n<p>When he first started out, Williams played in regional bands but also performed as a solo artist, &ldquo;me sitting on a stool playing covers, like a happy hour situation,&rdquo; he says. &ldquo;I&rsquo;d get dinner and maybe tips. There were bands in high school and in college. But it turned out I could get the same money playing solo that I was getting with the band. Around that time I was also doing temporary jobs and I was making the same amount playing music as I was scraping mortar out of the cracks of cinder block walls for eight hours in the summertime at minimum wage. So it seemed like the obvious choice was to play music. I started to work and over the years I incorporated more technology. The looping thing started to happen and tickets were sold and people came to shows, so there wasn&rsquo;t any reason to fix something that wasn&rsquo;t broken.&rdquo;What Williams calls &ldquo;the looping thing&rdquo; is actually a big part of what has made him such a compelling live performer. &ldquo;Basically, I have these machines that are essentially delay units,&rdquo; he explains. &ldquo;What I do is step on a button and sing or play something. Then I step on the same button in time and it repeats what I just played or sang. Once that initial loop is created, I can layer on a bass line or a drum line and then have this layer that I just created in front of an audience that I could sing over and solo over. Nothing is pre-recorded. Everything is created onstage in front of the audience.&rdquo; If it sounds complicated, it is: but the basic thrust is that the technology has allowed Williams to go out on tour week after week, year after year, and play music by himself&mdash;without limiting his sound to what we most often associate with the solo singer-songwriter: a guy strumming a guitar and singing. With his arsenal of tech toys, Williams can expand his reach onstage by, in essence, jamming with himself.</p>\r\n<p>As years have gone by and Keller has continued to evolve he has created more and more unique projects and collaborations with fellow musicians. In 2007 Keller formed a band of his own, Keller Williams with Moseley, Droll and Sipe which featured Keller on rhythm guitar and vocals, Jeff Sipe on drums, Keith Moseley on bass and Gibb Droll on lead guitar. After touring throughout 2007 &ndash; 2008, they subsequently released a double live record with a companion DVD, in true Keller Williams fashion, it&rsquo;s called Live.</p>\r\n<p>The summer of 2010 found Keller sharing a bus with two of his biggest heroes, former Grateful Dead drummers Bill Kreutzmann and Mickey Hart, as a member of their powerhouse assemblage the Rhythm Devils. &ldquo;That was a very surreal experience,&rdquo; Williams says. &ldquo;We rehearsed for a few days and then we were on a bus with 12 people, two of them being the original drummers from the Grateful Dead.&rdquo; On that tour, Williams was put in the enviable position of singing many songs from the Grateful Dead catalog for audiences that loved every minute of it. Inspired by this experience and his admiration for The Grateful Dead, Keller added two Grateful Dead projects to his repertoire: Grateful Grass and Grateful Gospel. With an ever revolving cast of Jam, Bluegrass, and Gospel musicians, Grateful Grass and Grateful Gospel have become fan favorites and festival staples. Keller&rsquo;s Grateful Grass tunes can be heard on two live digital releases, REX and DOS. Keller&rsquo;s guests on these recordings include: Jeff Austin (Jeff Austin Band), Keith Moseley (String Cheese Incident), Michael Kang (String Cheese Incident), Reed Mathis (Tea Leaf Green), The Keels and many more. Following the Grateful Dead theme, keller also released KEYS, a digital only release on which Keller is at the piano singing a collection of Dead tunes. All three of these releases donate proceeds to the Grateful Dead&rsquo;s Rex Foundation. Williams has also toured as part of a string trio with fellow Virginians, singer/guitarist Larry Keel and his wife, singer/bassist Jenny Keel, dubbed Keller and the Keels. You can find them hitting key stops on the bluegrass festival circuit playing songs from their two releases GRASS AND THIEF.</p>\r\n<p>If it seems as if this is a man who never stops, that would be about right. Keller released the amusingly titled THIEF&mdash;his all-covers project with the Keels&mdash;early in 2010, and KIDS, his sixteenth album, in the fall of that same year. A father of two himself, Williams was, of course, inspired by his own offspring but, he says, some of the songs were written before his children were born. &ldquo;When Not For Kids Only by Jerry Garcia and David Grisman came out, I knew that there was hope for me with kids music,&rdquo; he says. &ldquo;I was really attached to that record.&rdquo; The songwriting for Kids, Keller says, &ldquo;was not necessarily singing to the kids. A lot of it was me singing from the perspective of the kids. That was my plan, to get on their wavelength, on their level, and be one of them, so it&rsquo;s kind of like one of their friends singing to them.&rdquo;</p>\r\n<p>Early 2015 found Keller back in the studio working on his 20th release, VAPE. While mainly a solo endeavor, it does feature a few special guests such as Sampson Grisman, John Kadlecik and a track with the Travelin&rsquo; McCourys. In Keller&rsquo;s own words &ldquo;Imagine taking these songs and blowing high pressured life through them in a low pressured atmosphere. Out comes highly concentrated music that can be heated up and inhaled through your ears&hellip;Vape&rdquo;.</p>\r\n<p>In 2016, Keller assembled yet another band, Keller Williams&rsquo; KWahtro. KWahtro, featuring Gibb Droll, Danton Boller and Rodney Holmes, toured the country throughout the winter and fall of 2016. The first KWahtro album, SYNC will be released in January of 2017. According to Keller, SYNC began as acoustic dance music but with the help of Droll, Boller and Holmes and special guests Mike Dillon and The Accidentals, the album &ldquo;morphed into a type of acoustic acid jazz that draws on imagery in both the lyrics and the music.&rdquo;</p>\r\n<p>As if one album release wasn&rsquo;t enough for 2017, Keller&rsquo;s first all solo acoustic album, RAW, will also be released in January of 2017. Keller started working on RAW in 2011 but got sidetracked by a number of other projects that began to take form. It was when Keller&rsquo;s 2017 winter tour, Shut the Folk Up and Listen with Leo Kottke, started to take form, that he jumped back into it and completed the album. For Keller this album and tour represent his roots; all solo acoustic guitar and vocals, no looping, pedals or bands.</p>', '/img/sliders/493912366.jpg'),
(33, 2, 'THE LoNE BELLoW', '<p>The Lone Bellow&rsquo;s third studio album, Walk Into A Storm, was released last fall on Descendant Records/Sony Music Masterworks. The album was produced by Dave Cobb (Chris Stapleton, Sturgill Simpson, Jason Isbell) and recorded in Nashville, TN.</p>\r\n<p>It&rsquo;s been three years since the band&rsquo;s victorious, Then Came The Morning was released. The album was produced by The National&rsquo;s Aaron Dessner and nominated for an Americana Music Award. The Lone Bellow appeared on Kimmel, Letterman, Conan, CBS This Morning, Later... with Jools Holland and James Corden in support of the album. In the years since the release the band left their beloved adopted home of Brooklyn and moved to Nashville, TN.</p>', '/img/sliders/616273980.jpg'),
(34, 2, 'BALSAM RANGE', '<p>Balsam Range is; Buddy Melton (fiddle, lead and tenor vocals), Darren Nicholson (mandolin, octave mandolin, lead vocals, baritone and low tenor vocals), Dr. Marc Pruett (banjo), Tim Surrett (bass, dobro, baritone and lead vocals), and Caleb Smith (guitar, lead &amp; baritone vocals). The five original members are all acoustic musicians and singers from western North Carolina. They thoughtfully and respectfully adopted the name of a majestic range of mountains that surround part of their home county of Haywood, NC where the Great Smoky Mountains meet the Blue Ridge, the Great Balsam Range.</p>\r\n<p>The members of Balsam Range are extremely proud of their home of Haywood County, NC and invite you all to come visit their beautiful part of the country!</p>\r\n<p>The group&rsquo;s ascent to the top of the Bluegrass world has left a well-marked trail of success since the band&rsquo;s inception in 2007. One of the genre&rsquo;s most award-winning artists in recent years, they have garnered ten International Bluegrass Music Association Awards on the heels of six critically acclaimed albums. Balsam Range has left audiences spellbound while headlining major festivals from coast to coast, selling out venues across the nation, and appearing multiple times at the Grand Ole Opry.</p>\r\n<p>On their newest release, &ldquo;Mountain Voodoo&rdquo;, the quintet cleverly captures traditional yet contemporary sounds. There are fiery instrumental parts alternating with deep heavy ballads, overlaid by the vocal harmonies the group has become known for. Debuting at number four, &ldquo;Mountain Voodoo&rdquo; remained on the Billboard chart for nineteen weeks. Three singles from the album have reached the number one spot on the Bluegrass Today Charts including &ldquo;Blue Collar Dreams&rdquo; which spent 3 consecutive months at the number one spot</p>', '/img/sliders/363090530.jpg'),
(35, 2, 'FRUITIoN', '<p>On their fifth full-length, Watching It All Fall Apart, Fruition transform pain and heartache into something truly glorious. With their songwriting sharper and more nuanced than ever before&mdash;and their sonic palette more daringly expansive&mdash;the Portland, Oregon-based band&rsquo;s full-hearted intensity ultimately gives the album a transcendent power.</p>\r\n<p>&ldquo;The songs are mostly breakup songs,&rdquo; says Asebroek. &ldquo;There was love and now it&rsquo;s gone&mdash;we fucked it up, or some outside circumstance brought it to an end. It&rsquo;s about dealing with all that but still having hope in your heart, even if you&rsquo;re feeling a little lost and jaded.&rdquo;</p>\r\n<p>In a departure from their usual DIY approach, Fruition teamed up with producer/mixer Tucker Martine (My Morning Jacket, The Decemberists, First Aid Kit, case/lang/veirs) to adorn their folk-rooted sound with delicately crafted elements of psychedelia and soul. Showcasing the sublime harmonies the band first discovered during an impromptu busking session in 2008, Watching It All Fall Apart also finds Fruition more fully embracing their rock-and-roll sensibilities and bringing a gritty vitality to each track. &ldquo;We&rsquo;ve been a band almost ten years now, and we&rsquo;re at the point of being comfortable in our skin and unafraid to be whatever we want as time goes on,&rdquo; Anderson notes.</p>\r\n<p>Recorded in ten days at Flora Recording &amp; Playback in Portland, Watching It All Fall Apart came to life with the same kinetic urgency found in Fruition&rsquo;s live sound. &ldquo;It&rsquo;s kind of an impossible task, this idea of transmuting the live energy into something you can play on your stereo, but I feel like this record comes close to that,&rdquo; says Asebroek. At the same time, the band pursued a purposeful inventiveness that resulted in their most intricately textured work to date. &ldquo;Tucker helped us push ourselves to create something that glistens in subtle little ways that you might not even pick up on at first,&rdquo; says Asebroek. &ldquo;We got to play around with all this analog gear and these weird old keyboards we wouldn&rsquo;t ordinarily use, like a bunch of kids in a toy store where everything is free.&rdquo;</p>\r\n<p>On lead single &ldquo;I&rsquo;ll Never Sing Your Name,&rdquo; that unrestrained creativity manifests in a fuzzed-out, gracefully chaotic track complete with sing-along-ready chorus. Built on brilliantly piercing lyrics (&ldquo;And all those kisses that you were blowing/Somehow they all got blown right out&rdquo;), the song echoes the album&rsquo;s emotional arc by painfully charting the journey from heartache to acceptance. &ldquo;It&rsquo;s about going through a breakup, moping around, and then finally getting to the point where it&rsquo;s like, &lsquo;Okay&mdash;I&rsquo;m done with feeling this way now,&rsquo;&rdquo; says Anderson.</p>\r\n<p>Throughout Watching It All Fall Apart, the band&rsquo;s let-the-bad-times-roll mentality reveals itself in ever-shifting tones and moods. On the stark and sleepy &ldquo;Northern Town,&rdquo; Naja&rsquo;s smoldering vocals channel the ache of longing, the track&rsquo;s twangy guitar lines blending beautifully with its swirling string arrangement. One of the few album cuts to have already appeared in Fruition&rsquo;s setlist, &ldquo;There She Was&rdquo; sheds the heavy funk influence of its live version and gets reimagined as a shimmering, soulful number documenting Asebroek&rsquo;s real-life run-in with an ex at a local bar. Meanwhile, &ldquo;Turn to Dust&rdquo; emerges as a weary but giddy piece of psych-pop chronicling the end of a failed romance. The song&rsquo;s opening lyric also lends the album its title, which partly serves as &ldquo;a commentary on the general state of the world today,&rdquo; according to Asebroek. &ldquo;Even if you&rsquo;re mostly an optimistic person, it&rsquo;s hard not to feel down when you look at all the insanity happening right now,&rdquo; he says.</p>\r\n<p>While those unflinchingly intimate breakup songs form the core of Watching It All Fall Apart, Fruition infuse an element of social commentary into songs like &ldquo;FOMO&rdquo; as well. Written on the Fourth of July, with its references to wasted white girls and cocaine cowboys, the mournful yet strangely reassuring track unfolds as what Anderson calls &ldquo;an anti-party party song.&rdquo;&ldquo;It&rsquo;s about one of those situations where you said you&rsquo;d go to party but you really don&rsquo;t want to go, because you know it&rsquo;s going to be the same old bullshit,&rdquo; he says. &ldquo;The song is a call to defuse that guilt in your brain.&rdquo; And on the sweetly uplifting &ldquo;Let&rsquo;s Take It Too Far,&rdquo; the band offers one of the album&rsquo;s most purely romantic moments by paying loving tribute to music as solace and salvation (&ldquo;But don&rsquo;t you worry &rsquo;bout dyin&rsquo;/&rsquo;Cause there&rsquo;s no better way to go/We&rsquo;ll sing until we&rsquo;re out of honey/Then pour the gravel down our throats&rdquo;).</p>\r\n<p>From song to song, Fruition display the dynamic musicality they&rsquo;ve shown since making their debut with 2008&rsquo;s Hawthorne Hoedown LP. Through the years, the band has evolved from a rootsy, string-centric outfit to a full-fledged rock act, eventually taking the stage at such major festivals asBonnaroo and Telluride Bluegrass (a set that inspired Rolling Stone to praise their &ldquo;raucous originals filled with heartfelt lyrics and stadium-worthy energy&rdquo;). Following the release of 2016&rsquo;s Labor of Love, Fruition again made the rounds at festivals across the U.S., prompting Rolling Stone to feature the band on its &ldquo;8 Best Things We Saw&rdquo; at DelFest 2016.</p>\r\n<p>In choosing a closing track for Watching It All Fall Apart, Fruition landed on &ldquo;Eraser&rdquo;&mdash;a slow-building, gently determined epic delivering a quiet message of hope in its final line: &ldquo;Let it help you heal.&rdquo;&ldquo;Because there&rsquo;s so much heartbreak on this album, we wanted to end on Kellen singing that last line very sweetly,&rdquo; explains Anderson. &ldquo;The whole point of having all these sad songs is helping people to let those emotions out&mdash;and then hopefully when they get to the end, they feel a little better about everything they&rsquo;ve gone through along the way.&rdquo;</p>', '/img/sliders/917292990.jpg'),
(36, 2, 'LoVE CANoN', '<p>LOVE CANON brings their acoustic-roots sensibilities to the electronic-tinged pop hits of the 80&rsquo;s and 90&rsquo;s to create Cover Story, their 4th album, due out on Organic Records July 13, 2018. With Cover Story, LOVE CANON delivers a fresh set of classics, crossing genres to recount music of decades past from the likes of Peter Gabriel, Billy Joel, Depeche Mode, and Paul Simon. The self-produced album hosts a plethora of special guests including Jerry Douglas, Aoife O&rsquo;Donovan, Keller Williams, Michael Cleveland, and Eric Krasno, among others.</p>', '/img/sliders/828781557.jpg'),
(37, 2, 'FRoNT CoUNTRY', '<p>An acoustic band born in the land of tech innovation, Front Country was unlikely to be accepted as an authentic American roots band out of the gate. Cutting their teeth in progressive bluegrass jams in San Francisco&rsquo;s Mission District and rehearsing across the bay in Oakland, they fashioned their own take on roots music and Indie Folk, with the tools they had on hand. A mandolinist with a degree in composition and classical guitar. A guitarist trained in rock and world music. A bassist equally versed in jazz and newgrass. A violinist with technique that could seamlessly hop between honky tonk and electropop. And a female lead singer with grit and soul that was also a multi-instrumentalist and songwriter. In a wood-paneled country dive bar in the shadow of the San Francisco skyline, Front Country forged a sound hell bent on merging the musical past with the future. The result lies somewhere between Indie Folk and Americana, in a nether-region they\'ve come to embrace as their own. This West Coast outfit was just a group of friends playing a monthly gig until 2012 and 2013 when Front Country gathered around a single microphone at the RockyGrass and Telluride festivals, and won first prize in those prestigious band contests that once launched the careers of the Dixie Chicks, Greensky Bluegrass and the Steep Canyon Rangers. The contest wins bolstered their confidence in their unique mix of original songwriting, vocal harmonies and instrumental virtuosity, steeling their resolve to take a leap of faith and become a full time touring band. With the release of their debut full-length album Sake of the Sound in 2014, Front Country began the nose-grinding work of making their name as a national touring act. Still based in the San Francisco Bay Area, they would trek the 6,000+ mile circle around the U.S. for months at a time, introducing themselves for the first time to every room that would have them. Thanks to the glow of their contest wins, festivals around the U.S. caught wind and invited them to play for their large audiences, giving Front Country a crucial first break. Old Settlers in Austin, MerleFest in North Carolina, Wintergrass in Seattle, Strawberry in California and Grey Fox in New York, all took a chance on the promising new band and solidified Front Country&rsquo;s hold on the imagination of progressive-leaning acoustic music fans. If there was any one song from their debut album that they all agreed they had never heard the likes of before, it would have to be the title track &ldquo;Sake of the Sound&rdquo;. A pop song with a rock arrangement, played entirely on acoustic instruments. It was almost as if bluegrass instruments had been unearthed 200 years from now in a time capsule, and were repurposed to make post-apocalyptic modern pop music. Front Country has been drawn more and more into this peculiar aesthetic, writing and arranging songs that are simultaneously intricate, intense and infectious. They\'ve been called &ldquo;Roots Pop&rdquo;: the past is discernible with a wink and a nod, and the future is here. Front Country&rsquo;s sophomore release Other Love Songs is their Roots Pop opus. A graduation from mere concept to a high-speed rail line traveling at breakneck speed with the listener able to walk to the back of the train and look out at a distant but constant glimmer of the past. While their ultimate goal is musical space exploration, the technology of Front Country&rsquo;s sound has evolved significantly in their five short years as a band, all while maintaining a tool kit of wooden string band instruments. Like a carpenter building a rocket ship, there is a whimsy to Front Country&rsquo;s perspective that takes an active, imaginative listener to appreciate. It&rsquo;s not a sound based on current trends of what any mainstream audience has asked for, it is a new perspective looking to find a new audience. Creating one&rsquo;s own audience from the ground up is never an easy path, but if successful, several decades later, the reward is worth the risk and the journey is its own reward. Other Love Songs is Front Country&rsquo;s first record relying on lead singer Melody Walker&rsquo;s songwriting, first and foremost. With 8 of the 12 tracks penned by Walker, and the two instrumentals composed by mandolinist Adam Roszkiewicz, it is their most original body of work yet. Round out the intensely creative band arrangement style of guitarist Jacob Groopman, bassist Jeremy Darrow and five-string violinist Leif Karlstrom, and the synergy is electric. The two cover songs on the album are the poignant &ldquo;Millionaire&rdquo; by David Olney, and a swampy blues-rock reimagining of the Carter Family&rsquo;s &ldquo;Storms are on the Ocean&rdquo;. All together, the majority of the songs are quite emotional in nature and tend toward relationship themes, sometimes with atwist, hence the title Other Love Songs. The collection of original Other Love Songs on the album are &ldquo;If Something Breaks&rdquo;, &ldquo;I Don&rsquo;t Wanna Die Angry&rdquo;, &ldquo;Good Side&rdquo;, &ldquo;Undone&rdquo;, &ldquo;O Heartbreaker&rdquo; and &ldquo;Keep Travelin&rsquo;&rdquo;. These songs follow the lessons that everyone learns in their own personal evolution toward emotional maturity and vulnerability - in which all of us learn to break down toxic romantic fairy tales and write our own &ldquo;Other Love Songs&rdquo; that work for real people in the real world. Love works the best when we can accept ourselves and one another with all of our virtues and our flaws, and start creating our own unique path that works for us. Since music and love are borne of the same ether, it&rsquo;s no surprise that Front Country&rsquo;s musical path has taken the form of an &ldquo;Other Love Song&rdquo; all along, finding their own harmony that plays to the strengths of each member, and doesn&rsquo;t worry about fitting into a mold.</p>', '/img/sliders/761590054.jpg'),
(38, 2, 'THE CLEVERLYS', '<p>We are a family Bluegrass band from a remote thicket of Stone County Arkansas.</p>', '/img/sliders/128307480.jpg'),
(39, 2, 'Po RAMBLIN BoYS', '<p>The Po\' Ramblin\' Boys started as one of the house bands at Ole Smoky Moonshine Distillery in Gatlinburg, Tennessee. The group\'s high energy and dedication to preserving the traditional sounds of bluegrass music, quickly made them a favorite among tourists from all over the country that visit the Great Smoky Mountains.</p>\r\n<p>The band backed bluegrass legend James King for the first part of 2015, playing with him at the Society for the Preservation of Bluegrass Music in America awards in February, and for the following 4 months.</p>\r\n<p>\"These are some of the best boys I\'ve ever worked with\" - James King</p>\r\n<p>The group recently signed to Randm Records out of San Diego, California. Their debut album, Back to the Mountains, was released in February 2016.</p>', '/img/sliders/598588022.jpg'),
(40, 2, 'oUT oF THE DESERT', '<p>\"Out of the Desert\" is a five piece group from Las Vegas, NV and has been performing across the southwest for over 7 years. Featuring two-time Nevada state fiddle champion Rick Seligman, Mark Sanders on banjo, John Lundmark on guitar, Brian Burns on mandolin and Cole Porter on upright bass, their shows are known for their tight and powerful traditional bluegrass with a fun surprise here and there. With four lead vocalists, their sets offer a unique variety of styles and strong harmonies not found in most acts. Regularly performing from a list of over 160 bluegrass favorites, this band keeps things interesting no matter how often you see them.</p>\r\n<p>They have opened for acts such as Special Consensus, Sideline, Remington Ryde, Nu Blu and more. They have received rave reviews for performances at the Route 66 Bluegrass Festival, Logandale Fall Festival, AcoustiGrass, Viva Las VeGrass and most recently the inaugural Bender Jamboree where they were crowd favorites with a tribute set to legendary bluegrass group &ldquo;Old and in the Way.&rdquo; With Huck Finn having a similar style of lineup, don&rsquo;t be surprised to see them perform this set again to get the crowd started off right on Saturday morning!</p>', '/img/sliders/418751656.jpg'),
(41, 2, 'Joe Mullins & The Radio Ramblers', '<p>One of the busiest bands in bluegrass, Joe Mullins &amp; The Radio Ramblers (JMRR) deliver first class entertainment, whether on stage or in the studio. For over a decade, JMRR have consistently delivered chart-topping and crowd-pleasing music, as evidenced by multiple International Bluegrass Music Association (IBMA) awards and Grand Ole Opry appearances on their resume.</p>\r\n<p>The award-winning band is pleased to announce the release of their sixth album in seven years for bluegrass music&rsquo;s most historic record label, Rebel Records. The new album, entitled The Story We Tell, brings together a vibrant collection of songs new and old, celebrating the band&rsquo;s respect for the past while always maintaining a fresh approach.</p>\r\n<p>The album&rsquo;s opening track and first single, &ldquo;Long Gone Out West Blues&rdquo; takes listeners on a trip on horseback through the wild west. This high-energy song came to JMRR via Canadian folk duo, Pharis &amp; Jason Romero. &ldquo;The uniquely styled lyrics and the melody made it a natural for us and the challenge of a song with no chorus is something I love,&rdquo; says Mullins. &ldquo;It\'s a powerful piece!&rdquo; An instrumental and vocal powerhouse, the adrenaline is contagious, and proves an ample introduction to the new album from JMRR.</p>\r\n<p>Featuring Joe Mullins and his banjo, alongside bluegrass veterans Mike Terry (mandolin), Jason Barie (fiddle), Randy Barnes (bass), and Duane Sparks (guitar), The Story We Tell builds on the band&rsquo;s previous success, but JMRR are not content to rest on their laurels. The Story We Tell features the band&rsquo;s most inventive and innovative arrangements to date, both vocally and instrumentally. The creativity makes this a Radio Ramblers project like no other.</p>\r\n<p>Filled with new songs from some of today&rsquo;s top songwriters, including Larry Cordle, Jerry Salley, Ronnie Bowman, Steve Bonafel, and Raleigh Satterwhite, alongside forgotten gems the band dusted off from such varied sources as The Delmore Brothers, Merle Haggard, and The Browns, the balance achieved on The Story We Tell flows through the speakers like tuning in to your favorite radio broadcast &mdash; a claim only befitting of the reigning IBMA Broadcaster of the Year, Joe Mullins.</p>', '/img/sliders/916819249.jpg'),
(42, 2, 'DEVILS BoX STRING BAND', '<p>The Devil&rsquo;s Box is a punk rock, revisionist-western take on playing fiddle tunes from around the world. Two-beat Cajun stomps, break-neck bluegrass, haunting Gypsy laments, and cranked out Celtic jigs all get twisted, bent, and melted down to become burning masses of fiddle heat.</p>\r\n<p>For all lovers of folk, rock, jazz and exciting lively music, the Devil&rsquo;s Box can appear as Solo Fiddle, Fiddle &amp; Percussion, and Fiddle &amp; Percussion &amp; Bass</p>\r\n<p>\"A fire-breathing virtuoso of the violin, Chris Murphy crams more musical mileage into a short set than most players do in an entire tour. Murphy does the devil\'s handiwork on four strings with a winning presence and a gypsy\'s knack.\"<br /><em>James Rotondi, Editor-in-chief</em></p>', '/img/sliders/131306058.jpg'),
(43, 2, 'The Seldom Scene', '<p>The Seldom Scene is an American bluegrass band formed in 1971 in Bethesda, Maryland. The Scene has been instrumental in starting the progressive bluegrass movement as their shows include bluegrass versions of country music, rock, and even pop. What does it take for a bluegrass band to remain popular for more than four decades? For The Seldom Scene, it\'s taken not only talented musicians, a signature sound, and a solid repertoire, but also a sheer sense of fun.</p>', '/img/sliders/927457094.jpg'),
(44, 2, 'Blue Highway', '<p>Blue Highway has earned 27 collective IBMA Awards, 6 SPBGMA Awards, one Dove Award, and three Grammy nominations as a band, plus two Grammy Awards among its current members.</p>\r\n<p>Blue Highway\'s #1 album \'Original Traditional\' was nominated for a 2017 GRAMMY Award for Best Bluegrass Album.</p>', '/img/sliders/665697435.jpg'),
(45, 2, 'Old Salt Union', '<p>Old Salt Union is a string band founded by a horticulturist, cultivated by classically trained musicians, and fueled by a vocalist/bass player who is also a hip-hop producer with a fondness for the Four Freshmen. It is this collision of styles and musical vocabularies that informs their fresh approach to bluegrass and gives them an electric live performance vibe that seems to pull more from Vaudeville than the front porch.</p>', '/img/sliders/838397997.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `avatar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) UNSIGNED NOT NULL,
  `updated_at` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password_hash`, `name`, `last_name`, `avatar`, `phone`, `password_reset_token`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'm@gdevdonetske.com', '$2y$13$azzEv1527Cfm/chNUPxuz.2lHe73dVXgYuon0NSjUTYsmfR8omXGK', 'GVD Project', '', '/img/users/342550659.jpg', '+380999601520', '', 'i62y6I-h_AGuXh08a6Fr9nduwyIs0t8q', 10, 1478519980, 1478519980),
(2, 'admin@admin.com', '$2y$13$6iwMfcsxuALKBGWuCWyIPO9TB9MNU/3oqnE/OJl5iUTCmkRChSGGm', 'Admin', '', '/img/admin/avatar.jpg', '', '', '71HmWAKEvTIpR8DDBwzMp04DrlQ2ljif', 10, 1513949286, 1533735968);

-- --------------------------------------------------------

--
-- Структура таблицы `user_role_updation`
--

CREATE TABLE `user_role_updation` (
  `user_role_upd_id` int(11) NOT NULL,
  `role_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_role_updation`
--

INSERT INTO `user_role_updation` (`user_role_upd_id`, `role_name`, `user_id`, `action`, `time`) VALUES
(1, 'root', 1, 'update', 1513933488),
(2, 'admin', 1, 'create', 1513949301),
(3, 'admin', 1, 'update', 1513949315),
(4, 'root', 1, 'update', 1533715657),
(5, 'admin', 1, 'update', 1533715668);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-item_name` (`item_name`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `idx-auth_item-rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `idx-auth_item_child-parent` (`parent`),
  ADD KEY `idx-auth_item_child-child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `field_type`
--
ALTER TABLE `field_type`
  ADD PRIMARY KEY (`field_type_id`);

--
-- Индексы таблицы `field_value`
--
ALTER TABLE `field_value`
  ADD PRIMARY KEY (`field_value_id`),
  ADD KEY `idx-field_value-field_type_id` (`field_type_id`);

--
-- Индексы таблицы `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`info_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Индексы таблицы `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Индексы таблицы `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_role_updation`
--
ALTER TABLE `user_role_updation`
  ADD PRIMARY KEY (`user_role_upd_id`),
  ADD KEY `idx-user_role_updation-user_id` (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `field_type`
--
ALTER TABLE `field_type`
  MODIFY `field_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `field_value`
--
ALTER TABLE `field_value`
  MODIFY `field_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `info`
--
ALTER TABLE `info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `seo`
--
ALTER TABLE `seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_role_updation`
--
ALTER TABLE `user_role_updation`
  MODIFY `user_role_upd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
