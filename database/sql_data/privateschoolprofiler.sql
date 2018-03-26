-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2018. Már 26. 21:25
-- Kiszolgáló verziója: 10.1.29-MariaDB
-- PHP verzió: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `privateschoolprofiler`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `picture_path` varchar(255) DEFAULT 'crop.jpg',
  `crd_ch` timestamp NULL DEFAULT NULL,
  `grade` year(4) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `deleted` tinyint(4) DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `child`
--

INSERT INTO `child` (`id`, `firstname`, `lastname`, `dob`, `group_id`, `picture_path`, `crd_ch`, `grade`, `parent_id`, `deleted`) VALUES
(1, 'El', 'Arundale', '2014-08-22 05:11:37', 1, 'crop.jpg', NULL, 2017, 1, 2),
(2, 'Paul', 'Lamminam', '2012-05-26 17:02:05', 2, 'crop.jpg', NULL, 2017, 2, 2),
(3, 'Cassie', 'Filov', '2012-09-17 11:10:38', 2, 'crop.jpg', NULL, 2017, 3, 2),
(4, 'Catriona', 'Crab', '2012-02-21 00:32:14', 1, 'crop.jpg', NULL, 2017, 4, 2),
(5, 'Mickie', 'Kernes', '2012-09-24 10:21:09', 1, 'crop.jpg', NULL, 2017, 5, 2),
(6, 'Jaquenetta', 'Potteridge', '2012-03-13 00:06:40', 1, 'e7385-20642385_1494752407230767_520913454_o.jpg', NULL, 2017, 6, 2),
(7, 'Ronnica', 'Lambal', '2014-03-19 12:15:03', 1, 'crop.jpg', NULL, 2017, 7, 2),
(8, 'Elyse', 'Credland', '2012-12-06 18:10:29', 1, 'crop.jpg', NULL, 2017, 8, 2),
(9, 'Wadsworth', 'Nolin', '2012-09-16 04:57:43', 1, 'crop.jpg', NULL, 2017, 1, 2),
(10, 'Maryjo', 'Earngy', '2013-10-04 12:20:57', 1, 'crop.jpg', NULL, 2018, 2, 2),
(11, 'Lelah', 'Jervis', '2012-06-27 17:11:30', 1, 'crop.jpg', NULL, 2018, 3, 2),
(12, 'Cloe', 'Jermey', '2012-02-11 05:39:00', 1, 'crop.jpg', NULL, 2017, 4, 2),
(13, 'Fons', 'Girkins', '2013-09-05 21:41:55', 1, 'crop.jpg', NULL, 2017, 5, 2),
(14, 'Jami', 'Larkby', '2013-10-11 08:41:16', 1, '135fb-13607850_1115396475166364_78423259_n.jpg', NULL, 2017, 6, 2),
(15, 'Maury', 'Sharer', '2012-09-22 00:43:46', 1, 'crop.jpg', NULL, 2018, 7, 2),
(16, 'Kis', 'Majjom', '2018-10-01 00:00:00', 4, 'crop.jpg', NULL, 2017, 8, 2),
(17, 'Monkey', 'Mensch Jr', '1987-03-20 00:00:00', 4, 'jarjar.jpg', '2018-03-17 14:01:02', 2017, 1, 2),
(18, 'Henki', 'Penki', '2018-03-06 00:00:00', 3, 'kismajmok-12.jpg', '2018-03-24 09:44:02', 2017, 0, 2),
(19, 'Monkey', 'Karcolo', '2018-02-25 00:00:00', 4, 'seesharp.jpg', '2018-03-24 09:46:56', 2017, 0, 2),
(20, 'Fluffy', 'McEnroe', '2015-12-29 00:00:00', 6, 'Fluffy.jpg', '2018-03-24 11:52:28', 2018, 23, 2),
(21, 'Little', 'Roseey', '2016-02-02 00:00:00', 7, 'rommepjr.jpg', '2018-03-24 19:20:55', 2018, 1, 2);

--
-- Eseményindítók `child`
--
DELIMITER $$
CREATE TRIGGER `child_BEFORE_INSERT` BEFORE INSERT ON `child` FOR EACH ROW BEGIN
SET NEW.crd_ch = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `teacher_comment` varchar(255) DEFAULT NULL,
  `child_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `crd_cm` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `comment`
--

INSERT INTO `comment` (`id`, `teacher_comment`, `child_id`, `teacher_id`, `crd_cm`, `updated`) VALUES
(1, 'This is dumm', 1, 2, '2017-09-17 22:00:00', NULL),
(2, 'Yoko', 1, 3, '2017-09-17 22:00:00', NULL),
(3, 'Toko holookoko ', 1, 10, '2017-09-17 22:00:00', NULL),
(4, 'Hama kuma', 2, 2, '2017-09-17 22:00:00', NULL),
(5, 'Huhu', 2, 1, '2017-09-17 22:00:00', NULL),
(6, 'Oz nem validi hahasadfasdf mukodik ahaha', 2, 5, '2017-09-17 22:00:00', '2018-03-25 18:07:03'),
(7, 'ez buta', 3, 9, '2017-09-17 22:00:00', NULL),
(8, 'ez gyagya', 3, 8, '2017-09-17 22:00:00', NULL),
(9, 'ez figyula', 3, 5, '2017-09-17 22:00:00', '2018-03-25 15:50:07'),
(10, 'Markoló vagyok, vagy mégsem?!', 21, 5, '2018-03-25 18:59:58', '2018-03-25 19:00:11');

--
-- Eseményindítók `comment`
--
DELIMITER $$
CREATE TRIGGER `comment_BEFORE_INSERT` BEFORE INSERT ON `comment` FOR EACH ROW BEGIN
	SET NEW.crd_cm = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `comment_BEFORE_UPDATE` BEFORE UPDATE ON `comment` FOR EACH ROW BEGIN
SET NEW.updated = CURRENT_TIMESTAMP; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- A nézet helyettes szerkezete `members`
-- (Lásd alább az aktuális nézetet)
--
CREATE TABLE `members` (
`firstname` varchar(45)
,`lastname` varchar(45)
,`email` varchar(100)
,`password` mediumtext
,`salt` varchar(45)
,`crd` timestamp
,`deleted` tinyint(4)
,`picture_path` varchar(255)
,`role` varchar(7)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `parent`
--

CREATE TABLE `parent` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `salt` varchar(45) DEFAULT NULL,
  `crd` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '2',
  `picture_path` varchar(255) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `grade` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `parent`
--

INSERT INTO `parent` (`id`, `firstname`, `lastname`, `email`, `password`, `salt`, `crd`, `deleted`, `picture_path`, `updated`, `grade`) VALUES
(1, 'Scott', 'Kelly Jr.', 'astolz0@moonfruit.com', NULL, NULL, NULL, 2, 'james.jpg', '2018-03-24 11:58:29', 2017),
(2, 'Addia', 'Cartin', 'pdorking1@cmu.edu', NULL, NULL, NULL, 2, 'lily.jpg', '2018-03-24 11:58:30', 2017),
(3, 'Jerome', 'Lavielle', 'fmerdew2@addthis.com', NULL, NULL, NULL, 2, 'marian.jpg', '2018-03-24 11:58:30', 2017),
(4, 'Cacilie', 'Fearnyough', 'bgilbart3@d.com', NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(5, 'Maison', 'Castello', 'cyule4@over-blog.com', NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(6, 'Charla', 'Footitt', 'ypetrus5@imgur.com', NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(7, 'Dorian', 'Turgoose', 'bgilbeart3@soundcloud.com', NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(8, 'Hatti', 'Longhorne', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(9, 'Erinna', 'Windress', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(10, 'Rubie', 'Cardenas', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(11, 'Bjorn', 'Brind', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(12, 'Lisha', 'Yukhin', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(13, 'Mack', 'Hedworth', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(14, 'Dillie', 'Esche', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(15, 'Neddie', 'Bakey', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(16, 'Hubey', 'Spatig', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(17, 'Kellie', 'Wadie', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(18, 'Rubin', 'Doerrling', NULL, NULL, NULL, NULL, 2, 'mariano.jpg', '2018-03-24 11:58:30', 2017),
(19, 'Colman', 'Pidgeon', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(20, 'Kimberli', 'Chiommienti', NULL, NULL, NULL, NULL, 2, NULL, '2018-03-24 11:58:30', 2017),
(21, 'Monkey', 'Mensch', 'j.majom@monkeyland.hu', '0ee66be42a47f12ed43daf579198eebf5950876219974ecee13532a838dc76116084ad63883ea82bd316ed4347520b4c41585c6a8dc58fc4110a6387054e655b', '278', '2018-03-17 12:29:05', 2, 'beci.jpg', '2018-03-24 11:58:30', 2017),
(22, 'Felho', 'Karcolo', 'felh@karc.hu', '03c1b00ed6c2b46e676486cbac761eb7615c08d692eaefe978b081a5b22219c7e85062477c79e1c239d5d22fd6a32c043d9d9b144fd70fce8e29e7ae37408153', '208', '2018-03-17 14:53:10', 2, 'jarjar.jpg', '2018-03-24 11:58:30', 2017),
(23, 'Bukkinakki', 'Malmi', 'mm@bakker.hu', '1682ecf9f69c6ccb344441d4bb59f32d11c04d0a4bf29745b0665320c65f8a7a9fed0a41705f7554640fbd938f055d31c331c3cfe6348d466224def89ec89a21', '540', '2018-03-24 11:53:50', 2, 'miklos.jpg', '2018-03-24 13:47:34', 2018);

--
-- Eseményindítók `parent`
--
DELIMITER $$
CREATE TRIGGER `parent_BEFORE_INSERT` BEFORE INSERT ON `parent` FOR EACH ROW BEGIN
SET NEW.crd = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `parent_BEFORE_UPDATE` BEFORE UPDATE ON `parent` FOR EACH ROW BEGIN
SET NEW.updated = CURRENT_TIMESTAMP; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `progress_post`
--

CREATE TABLE `progress_post` (
  `id` int(11) NOT NULL,
  `progress_post` text,
  `child_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `crd_pp` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  `quarter` int(11) DEFAULT NULL,
  `grade` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `progress_post`
--

INSERT INTO `progress_post` (`id`, `progress_post`, `child_id`, `teacher_id`, `crd_pp`, `updated`, `quarter`, `grade`) VALUES
(1, 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r \r Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r \r Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justasdo. Morbi ut odio.', 11, 1, NULL, '2018-03-16 13:43:53', 1, 2017),
(2, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r \r In congue. Etiam justo. Etiam pretium iaculis justo.\r \r In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r \r Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r \r Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r \r Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.d Nunc purus.', 13, 8, NULL, '2018-03-16 13:43:53', 1, 2017),
(3, 'Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r \r Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\r \r Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r \r Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulpaasdfsdfutate luctus.d', 1, 1, '2018-03-10 10:26:22', '2018-03-16 13:43:53', 1, 2017),
(4, 'In congue. Etiam justo. Etiam pretium iaculis justo.\r \r In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r \r Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.\r \r Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r \r Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r \r Phasellus in felis. Donec semper sapien a libero. Nam duis.', 3, 2, NULL, '2018-03-16 13:43:53', 1, 2017),
(5, 'Pöcs', 4, 5, NULL, '2018-03-26 13:57:40', 1, 2017),
(6, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r \r Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r \r Phasellus in felis. Donec semper sapien a libero. Nam dui.\r \r Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r \r Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r \r Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lascus.', 9, 4, NULL, '2018-03-16 13:43:53', 1, 2017),
(7, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r \r Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r \r Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r \r In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectsus.', 7, 5, NULL, '2018-03-16 13:43:53', 1, 2017),
(8, 'Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\r \r Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r \r Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r \r Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r \r Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odsio.', 6, 1, NULL, '2018-03-16 13:43:53', 1, 2017),
(9, 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.\r \r Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r \r Phasellus in felis. Donec semper sapien a libero. Nam dui.\r \r Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r \r Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nissi.', 2, 1, NULL, '2018-03-16 13:43:53', 1, 2017),
(10, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r \r Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r \r Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r \r In congue. Etiam justo. Etiam pretium iaculis justo.\r \r In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut telluss.', 5, 2, NULL, '2018-03-16 13:43:53', 2, 2017),
(11, 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.\r \r Phasellus in felis. Donec semper sapien a libero. Nam dui.\r \r Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r \r Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r \r Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacuss.', 8, 3, NULL, '2018-03-16 13:43:53', 2, 2017),
(12, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r \r Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r \r Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r \r Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sesm.', 4, 8, NULL, '2018-03-16 13:43:53', 2, 2017),
(13, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r \r Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r \r Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r \r Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odiso.', 6, 7, NULL, '2018-03-16 13:43:53', 2, 2017),
(14, 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.\r \r In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.\r \r Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\r \r Sed ante. Vivamus tortor. Duis mattis egestas metus.\r \r Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r \r Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eross.', 2, 2, NULL, '2018-03-16 13:43:53', 2, 2017),
(15, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r \r Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r \r Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r \r Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r \r In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectuss.', 3, 1, NULL, '2018-03-16 13:43:53', 2, 2017),
(16, 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r \r Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r \r Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r \r In congue. Etiam justo. Etiam pretium iaculis justo.\r \r In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r \r Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisiss.', 4, 2, NULL, '2018-03-16 13:43:53', 1, 2017),
(17, 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\r \r Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\r \r Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\r \r In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r \r Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r \r Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potentsi.', 7, 9, NULL, '2018-03-16 13:43:53', 1, 2017),
(18, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r \r Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\r \r Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r \r Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r \r Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerast.', 5, 8, NULL, '2018-03-16 13:43:53', 2, 2017),
(19, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r \r Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r \r Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r \r Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odiso.', 11, 1, NULL, '2018-03-16 13:43:53', 2, 2017),
(20, 'Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r \r Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r \r Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r \r Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velist.', 3, 1, NULL, '2018-03-16 13:43:53', 1, 2017),
(21, 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r \r Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r \r Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellsus.', 11, 2, NULL, '2018-03-16 13:43:53', 2, 2017),
(22, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r \r Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r \r Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r \r Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla telluss.', 12, 3, NULL, '2018-03-16 13:43:53', 3, 2017),
(23, 'Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r \r Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r \r Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r \r Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, feliss.', 15, 4, NULL, '2018-03-16 13:43:53', 3, 2017),
(24, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r \r Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\r \r Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r \r Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r \r Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r \r Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.s', 11, 7, NULL, '2018-03-16 13:43:53', 2, 2017),
(25, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.\r \r Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.\r \r Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.\r \r Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r \r Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctusss.', 6, 2, NULL, '2018-03-16 13:43:53', 2, 2017),
(26, 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.\r \r Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.\r \r Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.\r \r Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\r \r In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r \r Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.s', 5, 1, NULL, '2018-03-16 13:43:53', 3, 2017),
(27, 'Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.\r \r In quis justo. Maecenas rhoncus aliquam lacus. Morbi quis tortor id nulla ultrices aliquet.\r \r Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui.\r \r Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti.\r \r Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non maursis.', 1, 9, NULL, '2018-03-16 13:43:53', 2, 2018),
(28, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r \r Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r \r Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\r \r Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentusm.', 10, 9, NULL, '2018-03-16 13:43:53', 3, 2018),
(29, 'Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r \r Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r \r Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r \r In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectuss.', 7, 9, NULL, '2018-03-16 13:43:53', 2, 2018),
(30, 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r \r Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r \r Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\r \r Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r \r Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r \r Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulums.', 5, 0, NULL, '2018-03-16 13:43:53', 1, 2018),
(31, 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r \r In congue. Etiam justo. Etiam pretium iaculis justo.\r \r In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.\r \r Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisis.', 6, 0, NULL, '2018-03-16 13:43:53', 2, 2018),
(32, 'Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.\r \r Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus.\r \r Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.\r \r Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r \r Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elits.', 11, 9, NULL, '2018-03-16 13:43:53', 3, 2018),
(33, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.\r \r Sed ante. Vivamus tortor. Duis mattis egestas metus.\r \r Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.\r \r Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.\r \r Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.\r \r In congue. Etiam justo. Etiam pretium iaculis justos.', 2, 0, NULL, '2018-03-16 13:43:53', 1, 2018),
(34, 'Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r \r Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r \r Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velits.', 12, 0, NULL, '2018-03-16 13:43:53', 2, 2018),
(35, 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.\r \r Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst.\r \r Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat.\r \r Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r \r Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerats.', 13, 0, NULL, '2018-03-16 13:43:53', 3, 2018),
(36, 'Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.\r \r Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.\r \r Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit.\r \r Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque.\r \r Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.\r \r In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectuss.', 7, 0, NULL, '2018-03-16 13:43:53', 2, 2018),
(37, 'Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.\r \r Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.\r \r Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r \r Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.\r \r Fusce consequat. Nulla nisl. Nunc nisl.\r \r Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementums.', 13, 0, NULL, '2018-03-16 13:43:53', 3, 2018),
(38, 'Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.\r \r Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.\r \r Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.\r \r Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisls.', 3, 0, NULL, '2018-03-16 13:43:53', 1, 2017),
(39, 'Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis. Ut at dolor quis odio consequat varius.\r \r Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi.\r \r Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.\r \r Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diams.', 4, 0, NULL, '2018-03-16 13:43:53', 2, 2017),
(40, 'Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl.\r \r Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.\r \r Curabitur in libero ut massa volutpat convallis. Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.\r \r Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulums.', 15, 0, NULL, '2018-03-16 13:43:53', 3, 2017),
(41, 'Yolo molo hokolo kok pokkolso', 2, 1, NULL, '2018-03-16 13:43:53', 1, 2017),
(42, 'hello mia more', 5, 1, '2018-03-10 10:33:34', '2018-03-16 13:43:53', 1, 2017),
(44, 'fdhdgh\r\ng\r\nh\r\ndh\r\ngdf\r\nh\r\nfd', 3, 1, '2018-03-12 18:55:06', '2018-03-16 13:43:53', 1, 2017),
(46, 'Hoki moki', 3, 9, '2018-03-12 20:55:03', '2018-03-16 13:43:53', 1, 2017),
(47, 'Hoki moki', 3, 9, '2018-03-12 20:55:14', '2018-03-16 13:43:53', 1, 2017),
(48, 'yaya', 3, 9, '2018-03-12 21:16:58', '2018-03-16 13:43:53', 2, 2017),
(51, 'fogyó gyogyó', 7, 9, '2018-03-12 21:46:49', '2018-03-16 13:43:53', 3, 2017),
(52, 'maki pukika', 5, 1, '2018-03-16 13:00:56', '2018-03-16 13:43:53', 1, 2017),
(53, 'Nincs szükség ideiglenes táblára (max a db kezelő csinál egyet a háttérben, de ezzel neked nem kell foglalkoznod), SQL alapismeretekre van szükség. select ... from tabla inner join tabla2 on ... inner join tabla 3 on ... Az első példánál maradva inner join majd egy left join where ... is null-lal megspékelve.', 16, 5, '2018-03-25 20:16:26', NULL, 1, 2017),
(54, 'Ez a majom annyit karcol h az nonszensz', 19, 5, '2018-03-26 13:30:16', NULL, 1, 2017),
(55, 'Békhaerceg legendaja', 16, 5, '2018-03-26 14:09:05', NULL, 1, 2017),
(56, 'Beka herceg masodik pukizód', 16, 5, '2018-03-26 14:09:21', NULL, 1, 2017),
(71, 'asdfasdfasfas', 16, 5, '2018-03-26 14:55:53', NULL, 1, 2017),
(72, 'hollenayo', 16, 5, '2018-03-26 14:56:44', NULL, 1, 2017),
(73, 'Mostmár jó', 16, 5, '2018-03-26 15:02:18', NULL, 3, 2017);

--
-- Eseményindítók `progress_post`
--
DELIMITER $$
CREATE TRIGGER `progress_post_BEFORE_INSERT` BEFORE INSERT ON `progress_post` FOR EACH ROW BEGIN
	SET NEW.crd_pp = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `progress_post_BEFORE_UPDATE` BEFORE UPDATE ON `progress_post` FOR EACH ROW BEGIN
SET NEW.updated = CURRENT_TIMESTAMP; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `school_group`
--

CREATE TABLE `school_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(45) DEFAULT NULL,
  `group_picture` varchar(255) DEFAULT NULL,
  `grade` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `school_group`
--

INSERT INTO `school_group` (`id`, `group_name`, `group_picture`, `grade`) VALUES
(1, 'red ranchors', 'redrancor.jpg', 2017),
(2, 'busy bees', '87cb2-ouroboros.jpg', 2017),
(3, 'vengeful vultures', NULL, 2017),
(4, 'Merciless Matadors', '4eff8-ragnarok2.jpg', 2017),
(5, 'prideful parrots', NULL, 2016),
(6, 'Pinky Ponies', 'raptor.jpg', 2018),
(7, 'Rommels Robbers', 'erwin-rommel-AB.jpeg', 2018);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `suser`
--

CREATE TABLE `suser` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `salt` varchar(45) DEFAULT NULL,
  `crd` timestamp NULL DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '2',
  `picture_path` varchar(255) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `suser`
--

INSERT INTO `suser` (`id`, `firstname`, `lastname`, `email`, `password`, `salt`, `crd`, `deleted`, `picture_path`, `updated`) VALUES
(0, 'David', 'Toth', 'j.tothdavid@gmail.com', '63ee3ece677362fae73c218b7226758d783a06d4e97f82a527556d9174c1a9c6c30c19b4a70e9fb19492a3e71c8f53b79526123187b94c9f86cc95e29d43aea4', '123', NULL, 2, 'c66f8-odin.jpg', NULL),
(1, 'admin', 'yo', 'admin@admin.hu', '63ee3ece677362fae73c218b7226758d783a06d4e97f82a527556d9174c1a9c6c30c19b4a70e9fb19492a3e71c8f53b79526123187b94c9f86cc95e29d43aea4', '123', '2014-10-07 22:00:00', 2, 'de2fb-10495131_851882028156793_3187780581440248401_o.jpg', NULL),
(2, 'Jemmy', 'Lineen', 'jlineen1@nih.gov', '<p>\r\n	5N7PfqA</p>\r\n', 'RlRXPf', '2014-02-07 23:00:00', 1, '/assets/uploads/images/dodo.jpg', NULL),
(3, 'Raoul', 'Jennings', 'rjennings2@china.com.cn', 'UFJhoYgUFnV', 'tkg3tOmmR', '2013-07-03 22:00:00', 2, NULL, NULL),
(4, 'Adelheid', 'Gouge', 'agouge3@yale.edu', 'jfJ5lp', 'SEaRGuWwrq6', '2012-02-24 23:00:00', 2, NULL, NULL),
(5, 'Simona', 'Galletly', 'sgalletly4@arstechnica.com', 'U5zInX', 'nANhRIlwD8', '2011-05-27 22:00:00', 2, NULL, NULL),
(6, 'Haily', 'Franc', 'hfranc5@shop-pro.jp', 'MvcOCy1', 'f7HMTcxN0', '2010-12-22 23:00:00', 2, NULL, NULL),
(7, 'Lisbeth', 'Kingsnode', 'lkingsnode6@meetup.com', 'MWgToiCbny', 'vGHC3O', '2013-10-14 22:00:00', 2, NULL, NULL),
(8, 'Carolynn', 'Beardshaw', 'cbeardshaw7@arstechnica.com', 'Zk51qwAm2', 'RASlpnxr', '2013-07-14 22:00:00', 2, NULL, NULL),
(9, 'Bernetta', 'Blowfield', 'balla@mallab.hu', '63ee3ece677362fae73c218b7226758d783a06d4e97f82a527556d9174c1a9c6c30c19b4a70e9fb19492a3e71c8f53b79526123187b94c9f86cc95e29d43aea4', '123', '2011-09-01 22:00:00', 2, 'e338c-bro1.jpg', NULL),
(10, 'Irvine', 'Buckthought', 'ibuckthought9@myspace.com', 'K9cHuaDB', '4Szfdckvlc', '2014-05-07 22:00:00', 0, NULL, NULL),
(11, 'Rem', 'Beddoe', 'rbeddoea@howstuffworks.com', 'iiph7E', 'fVLTpnKOI', '2013-09-11 22:00:00', 0, NULL, NULL),
(12, 'Jocelyne', 'Beeke', 'jbeekeb@globo.com', 'MxWt0VX', 'N7ihsN8', '2011-05-10 22:00:00', 1, NULL, NULL),
(13, 'Franky', 'Da Costa', 'fdacostac@vistaprint.com', 'Sg5juyFT', 'Wz4TQPy', '2012-08-04 22:00:00', 0, NULL, NULL),
(14, 'Clea', 'Ivashkin', 'civashkind@google.it', 'i1GmmSV', '1qmGacRTwRUe', '2012-02-24 23:00:00', 0, NULL, NULL),
(15, 'Vikky', 'Jepps', 'vjeppse@rediff.com', 'KJ249K', 'QPnTrB86hhkG', '2014-11-23 23:00:00', 1, NULL, NULL);

--
-- Eseményindítók `suser`
--
DELIMITER $$
CREATE TRIGGER `suser_BEFORE_INSERT` BEFORE INSERT ON `suser` FOR EACH ROW BEGIN
SET NEW.crd = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `suser_BEFORE_UPDATE` BEFORE UPDATE ON `suser` FOR EACH ROW BEGIN
SET NEW.updated = CURRENT_TIMESTAMP; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `salt` varchar(45) DEFAULT NULL,
  `crd` timestamp NULL DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '2',
  `grade` year(4) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `teacher`
--

INSERT INTO `teacher` (`id`, `firstname`, `lastname`, `email`, `password`, `salt`, `crd`, `dob`, `picture_path`, `group_id`, `deleted`, `grade`, `updated`) VALUES
(1, 'Simonette', 'Preist', 'spreist0@nih.gov', NULL, NULL, NULL, '1959-07-09 00:00:00', 'admin.jpg', 4, 2, 2017, '2018-03-24 19:10:15'),
(2, 'Kessiah', 'Stallwood', 'kstallwood1@state.gov', NULL, NULL, NULL, '1982-02-28 00:00:00', 'crop.jpg', 2, 2, 2017, '2018-03-23 16:17:20'),
(3, 'Antonie', 'Ballsdon', 'aballsdon2@answers.com', NULL, NULL, NULL, '1956-11-14 00:00:00', '4d6bc-2014-02-15-20.46.09.jpg', 3, 2, 2017, NULL),
(4, 'Lindsey', 'Gaythorpe', 'lgaythorpe3@princeton.edu', NULL, NULL, NULL, '1981-09-13 00:00:00', NULL, 4, 2, 2017, NULL),
(5, 'Roberts', 'Paulson Jr.', 'fightclub@berlin.de', '17fbbcd9b37edaa668447ab75415f9eb7a3c1976ca600922aab520ab5e71ddfca4ac5935ef7cbf1c6e48cab8989146b2746728f4af0e07bee4ad7f8e8fc37ca6', '899', NULL, '1989-05-31 00:00:00', 'erwin-rommel-AB.jpeg', 4, 2, 2017, '2018-03-24 21:37:35'),
(6, 'Alaine', 'Daveran', 'adaveran5@ameblo.jp', NULL, NULL, NULL, '1955-10-02 00:00:00', '94d34-12606732_1132756426741970_1938598289_n.jpg', 1, 2, 2017, NULL),
(7, 'Etti', 'Stobbie', 'estobbie6@lulu.com', NULL, NULL, NULL, '1969-09-16 00:00:00', NULL, 2, 2, 2017, NULL),
(8, 'Audrye', 'Rishbrook', 'arishbrook7@amazonaws.com', NULL, NULL, NULL, '1952-07-17 00:00:00', NULL, 1, 1, 2017, NULL),
(9, 'Halette', 'Govey', 'hgovey8@hc360.com', NULL, NULL, NULL, '1993-03-05 00:00:00', '60eab-bro1.jpg', 2, 2, 2017, NULL),
(10, 'Brion', 'Swadon', 'bswadon9@homestead.com', NULL, NULL, NULL, '2010-01-08 00:00:00', NULL, 3, 1, 2017, NULL),
(13, 'Bela', 'Bacsi', 'bela.bacsi@bela.hu', NULL, NULL, NULL, NULL, NULL, 4, 1, 2017, NULL),
(14, 'Nem', 'Neve', 'hej.do@monkeyisland.hu', '0a4f5ff3cd61c13ea6d5952fdeaf9ec64ef214bba046e0ffc1db0c174d54699f9aed556928aaaecf095b4f729c64bf900cb58e129daabe82d09219578162f27f', '424', '2018-03-24 09:19:22', '2018-03-07 00:00:00', NULL, 3, 2, NULL, NULL),
(15, 'Prachetor', 'Montgomeri', 'jhoo.moho@gaka.de', 'd91d191b41f5ffb634d79658c7b05d8fdad0c1cb2d9c5d4ab8b526c12fc5b2cad0d51721a4cc4b8a4210529e396fa7c70952636e6270ef8d653bed05b984068d', '386', '2018-03-24 10:17:22', '1998-03-08 00:00:00', 'krosis.jpg', 2, 2, NULL, NULL),
(16, 'Pedo', 'Pedro', 'pedobear@wunderland.de', '03e849dc836907665901f2272b56aaf1e480131acbb4d98dbb93570da1bd6c486fbe39565e2d4e444cb6416feb24e6113a306f0dddee6dcc3e4e3d891a19aaf0', '657', '2018-03-24 11:51:12', '1950-03-13 00:00:00', 'pbear.png', 6, 2, NULL, NULL);

--
-- Eseményindítók `teacher`
--
DELIMITER $$
CREATE TRIGGER `teacher_BEFORE_INSERT` BEFORE INSERT ON `teacher` FOR EACH ROW BEGIN
SET NEW.crd = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `teacher_BEFORE_UPDATE` BEFORE UPDATE ON `teacher` FOR EACH ROW BEGIN
SET NEW.updated = CURRENT_TIMESTAMP; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `teacher_eval`
--

CREATE TABLE `teacher_eval` (
  `id` int(11) NOT NULL,
  `teacher_eval` text,
  `crd_eval` timestamp NULL DEFAULT NULL,
  `teacher_id` int(11) NOT NULL,
  `eval_grade` year(4) DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `teacher_eval`
--

INSERT INTO `teacher_eval` (`id`, `teacher_eval`, `crd_eval`, `teacher_id`, `eval_grade`, `updated`) VALUES
(2, 'into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsu', '2017-08-15 22:00:00', 5, 2018, '2018-03-25 12:20:32'),
(3, 'Where does it come from?', '2017-08-15 22:00:00', 9, 2017, NULL),
(4, 'Halobalo 999sdfasfd', '2018-03-25 13:56:12', 0, NULL, NULL),
(5, 'Menjen mndenki a francba mostmar', '2018-03-16 23:07:07', 13, 2017, NULL),
(6, 'Majom győzelem\r\nitt', '2018-03-24 09:18:31', 1, 2017, '2018-03-25 15:46:30'),
(7, 'Megrendítő a kiváncsiatlanságod idén is. és megy az update és még most is', '2018-03-25 12:29:09', 5, 2017, '2018-03-25 15:47:26');

--
-- Eseményindítók `teacher_eval`
--
DELIMITER $$
CREATE TRIGGER `teacher_eval_BEFORE_INSERT` BEFORE INSERT ON `teacher_eval` FOR EACH ROW BEGIN
	SET NEW.crd_eval = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `teacher_eval_BEFORE_UPDATE` BEFORE UPDATE ON `teacher_eval` FOR EACH ROW BEGIN
	SET NEW.updated = CURRENT_TIMESTAMP; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `todo_fields`
--

CREATE TABLE `todo_fields` (
  `id` int(11) NOT NULL,
  `todo_text` varchar(255) DEFAULT NULL,
  `child_id` int(11) NOT NULL,
  `crd_todo` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `todo_fields`
--

INSERT INTO `todo_fields` (`id`, `todo_text`, `child_id`, `crd_todo`) VALUES
(1, 'make him social', 1, '2017-09-15 22:00:00'),
(2, 'make him jump high', 2, '2017-09-15 22:00:00'),
(3, 'make him listen ', 1, '2017-09-15 22:00:00'),
(4, 'make him clever', 4, '2017-09-15 22:00:00'),
(5, 'make him clever', 3, '2017-09-15 22:00:00'),
(6, 'make him listen ', 3, '2017-09-15 22:00:00'),
(7, 'make him excellente', 3, NULL),
(8, 'Make her better', 6, NULL),
(9, 'Make her better', 6, NULL),
(10, 'Make her better', 6, NULL),
(11, 'Make her better', 6, NULL),
(12, 'Make her better', 7, NULL),
(13, 'Make her excellent', 7, '2018-03-12 21:31:54'),
(14, 'Make her bogyó\r\n', 7, '2018-03-12 21:33:33');

--
-- Eseményindítók `todo_fields`
--
DELIMITER $$
CREATE TRIGGER `todo_fields_BEFORE_INSERT` BEFORE INSERT ON `todo_fields` FOR EACH ROW BEGIN
SET NEW.crd_todo = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Nézet szerkezete `members`
--
DROP TABLE IF EXISTS `members`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `members`  AS  select `teacher`.`firstname` AS `firstname`,`teacher`.`lastname` AS `lastname`,`teacher`.`email` AS `email`,`teacher`.`password` AS `password`,`teacher`.`salt` AS `salt`,`teacher`.`crd` AS `crd`,`teacher`.`deleted` AS `deleted`,`teacher`.`picture_path` AS `picture_path`,'teacher' AS `role` from `teacher` union all select `suser`.`firstname` AS `firstname`,`suser`.`lastname` AS `lastname`,`suser`.`email` AS `email`,`suser`.`password` AS `password`,`suser`.`salt` AS `salt`,`suser`.`crd` AS `crd`,`suser`.`deleted` AS `deleted`,`suser`.`picture_path` AS `picture_path`,'suser' AS `role` from `suser` union all select `parent`.`firstname` AS `firstname`,`parent`.`lastname` AS `lastname`,`parent`.`email` AS `email`,`parent`.`password` AS `password`,`parent`.`salt` AS `salt`,`parent`.`crd` AS `crd`,`parent`.`deleted` AS `deleted`,`parent`.`picture_path` AS `picture_path`,'parent' AS `role` from `parent` ;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_child_group1_idx` (`group_id`),
  ADD KEY `fk_child_parent1_idx` (`parent_id`);

--
-- A tábla indexei `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ten_note_child1_idx` (`child_id`),
  ADD KEY `fk_ten_note_teacher1_idx` (`teacher_id`);

--
-- A tábla indexei `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- A tábla indexei `progress_post`
--
ALTER TABLE `progress_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_progress_post_child1_idx` (`child_id`),
  ADD KEY `fk_progress_post_teacher1_idx` (`teacher_id`);

--
-- A tábla indexei `school_group`
--
ALTER TABLE `school_group`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `suser`
--
ALTER TABLE `suser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- A tábla indexei `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_teacher_group1_idx` (`group_id`);

--
-- A tábla indexei `teacher_eval`
--
ALTER TABLE `teacher_eval`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_teacher_eval_teacher1_idx` (`teacher_id`);

--
-- A tábla indexei `todo_fields`
--
ALTER TABLE `todo_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ten_note_child1_idx` (`child_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT a táblához `progress_post`
--
ALTER TABLE `progress_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT a táblához `school_group`
--
ALTER TABLE `school_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `suser`
--
ALTER TABLE `suser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT a táblához `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT a táblához `teacher_eval`
--
ALTER TABLE `teacher_eval`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT a táblához `todo_fields`
--
ALTER TABLE `todo_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
