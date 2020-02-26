SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
DROP DATABASE  IF EXISTS `immo_lievin`;
CREATE DATABASE IF NOT EXISTS `immo_lievin`;
USE `immo_lievin`;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `streetNumber` int(11) NOT NULL,
  `streetName` varchar(255)  NOT NULL,
  `postalCode` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role`varchar(255) NOT NULL DEFAULT 'user',
  `idAddress` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idAddress`) REFERENCES addresses (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `seen` tinyint(1) DEFAULT 0,
  `idUser` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idUser`) REFERENCES users (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `reference` varchar(25) NOT NULL,
  `type` varchar(8) NOT NULL,
  `price` float NOT NULL,
  `surfaceArea` int(11) NOT NULL,
  `rooms` int(11) DEFAULT 0,
  `bedrooms` int(11) DEFAULT 0,
  `energyClass` varchar(3) DEFAULT '//',
  `indexTop` tinyint(1) DEFAULT 0,
  `description` text DEFAULT '//',
  `visible` tinyint(1) DEFAULT 0,
  `idAddress` int(11) NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idAddress`) REFERENCES addresses (`id`),
  FOREIGN KEY (`idCategory`) REFERENCES categories (`id`),
  FOREIGN KEY (`idUser`) REFERENCES users (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL,
  `idProperty` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  `updateDate` datetime DEFAULT NOW(),
  `deleteDate` datetime DEFAULT NULL,
  `active` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idProperty`) REFERENCES properties (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProperty` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `creationDate` datetime DEFAULT NOW(),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`idProperty`) REFERENCES properties (`id`),
  FOREIGN KEY (`idUser`) REFERENCES users (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

COMMIT;
