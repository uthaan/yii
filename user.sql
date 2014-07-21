-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 21, 2014 at 11:54 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'Vladimir Koval', 'vlady@bk.ru', '$2y$10$8WeV7vNKVwbdUm0S.aLfk.iJdY4LcSpSXR8p8/dT4Ro7YR.ICO3D.'),
(9, 'Some name', 'test@test.net', '$2y$10$SQ/.CKQgF1C3BDGCbp/UbOEqKvMtqa7SB9a2r246jLNmfGEIgD4uS'),
(13, 'Adminus', 'admin@gmail.com', '$2y$10$zmG66K.gMZZvLu7MY5xKcOcp15bxe9cLO8ZKHMcWjKQgsWEAJFwma'),
(14, 'zhanna', 'zhbelak@mail.com', '$2y$10$1lCesE3FemUzbYD8z6l3N.nnM9uY0mG2WHGdGEQBBJgxAFO1EFS7y'),
(15, 'Thomas The Fib', 'thomas@red-snapper.com', '$2y$10$/dZAK351iGKsEnTxcjJ.tuEE2/EeiMofT786LZQGCLKEzzw0T83LK'),
(16, 'Leeroy Jenkins', 'leeroy@jenkins.com', '$2y$10$y3igMqBaojufQSwuiP/Dy.xhQ1uLHnfaddrtksUJnlR5CQiz7UjO6'),
(17, 'Happy Santa', 'santa@snowboard.com', '$2y$10$y1rB4K6aeCJIl/nlhDTJEOTo4OBg6pFnjOqF7cecSQZ4QP5iH8zkC'),
(18, 'Ronald McDonald', 'bigmac@mcdonalds.net', '$2y$10$Al7inLgdknzTQbZgLcGocOWoZAv2PKvg3L7y7Tva.YI.QfD1gKqbK'),
(19, 'Auto test', 'di@autotest.com', '$2y$10$zFyf2xzob.NloBSE8fRrEuxusf81At9wmsWfqu.9kH28U8/e8JBwO'),
(20, 'My Name', 'name@site.com', '$2y$10$UY4VvIkBv03Jppsw1sy3C.YojzaXXQS7DpQCco6T15AVE4RhiZ6RC');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
