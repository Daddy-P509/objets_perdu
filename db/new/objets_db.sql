-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jan-2023 às 20:46
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `objets_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `lang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorie`
--

INSERT INTO `categorie` (`id`, `description`, `lang`) VALUES
(1, 'Passaporte', 'fr'),
(2, 'paspò', 'cr'),
(3, 'Passaporte', 'pt'),
(4, 'Permi de conduire', 'fr'),
(5, 'Lisans', 'cr'),
(6, 'Carteira de motorista', 'pt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `conversation` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `objets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comment_like`
--

CREATE TABLE `comment_like` (
  `id` int(11) NOT NULL,
  `commentaire_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `content` longblob,
  `size` int(11) DEFAULT NULL,
  `objets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `images`
--

INSERT INTO `images` (`id`, `name`, `type`, `content`, `size`, `objets_id`) VALUES
(1, 'bg.jpg', 'image/jpeg', 0xffd8ffe000104a46494600010101006000600000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800d300f703012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd2ba28a2b9cd428a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd900a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803ffd9, 222169, 6),
(2, 'bg.jpg', 'image/jpeg', 0xffd8ffe000104a46494600010101006000600000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800d300f703012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd2ba28a2b9cd428a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd900a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803ffd9, 222169, 7),
(3, 'clap.jpg', 'image/jpeg', 0xffd8ffe000104a46494600010101006000600000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800d300f703012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd2ba28a2b9cd428a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd900a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803ffd9, 269334, 8),
(4, 'article.jpg', 'image/jpeg', 0xffd8ffe000104a46494600010101006000600000ffdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc000110800d300f703012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd2ba28a2b9cd428a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a0028a28a00ffd900a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2800a28a2803ffd9, 1635, 9),
(5, 'urban-decay-logo-vector-ConvertImage.jpg', 'image/jpeg', 0xffd8ffe000104a46494600010101004800480000ffe202284943435f50524f46494c450001010000021800000000043000006d6e74725247422058595a2000000000000000000000000061637370000000000000000000000000000000000000000000000000000000010000f6d6000100000000d32d0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000964657363000000f0000000747258595a00000164000000146758595a00000178000000146258595a0000018c0000001472545243000001a00000002867545243000001a00000002862545243000001a00000002877747074000001c80000001463707274000001dc0000003c6d6c756300000000000000010000000c656e5553000000580000001c0073005200470042000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000058595a200000000000006fa2000038f50000039058595a2000000000000062990000b785000018da58595a2000000000000024a000000f840000b6cf706172610000000000040000000266660000f2a700000d59000013d000000a5b000000000000000058595a20000000000000f6d6000100000000d32d6d6c756300000000000000010000000c656e5553000000200000001c0047006f006f0067006c006500200049006e0063002e00200032003000310036ffdb00430001010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101ffdb00430101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101010101ffc0001108008200c503011100021101031101ffc4001d000100020301010101000000000000000000070906080a03050b01ffc4002b1000010403010001030500010500000000050304060700010208090a13141112151621231718223141ffc40014010100000000000000000000000000000000ffc40014110100000000000000000000000000000000ffda000c03010002110311003f00efe30180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030181007a93d235df91682b2bd156a745bb85d6815b91783a3ccb9272490962a547c762d138d0eed66e9be91cb65260346c1b659c366ea1328d7f29d366ba59c241ce0f90fea9aaaae9f4a8ba07d21e663de5b1b3194b68645278f2c25268847e505092230207b480bf80c1dec519be74ba4d9ec91a2c4da037aba3a3035a06e1f9f6216fdec5f97ff000f7866eca9284be2cce86ce6cf269a263904cbf9c1f51475db45fa1333b61668b6d78d0030534c86b14d16cfcb7e33a5e42b8d463c39e12e02ab7ea35f7ada9e72adbc347a9ddee6fe6eb46e25e5f74be85cbc885057144abc521d240549b9b3218bace8344ad5124250e0a380ce547069947f5cf1c3f12c4c8c7e131fc7c7d41bf189758b8d551b7e5fc7b337ce5bb5195edb9daea403b30495e53546c46d164bbf89b41ba73b4ff1d394f15ee9cb873d28cc3edcaceb581d1524aa4e124974154d64164f8551592ef9512552539d769aa929c6fae144d4e3ad77c77c6f7cf5cef5d73bdeb7ade07a6030180c06030180c06030180c06030180c0603018117dbf5606b8619c44cc2db66a0d96d7f60c70a69aa6fb41a6f564ea3b64c18baac55ed1e08331f2d8b075c90cdb86bfca0ce5e0dd3c69f97f92907e727f53103120fe5de46e850e6039e1fac68b3c75c0e6bc33d953bb14a0a50b3bd27bdf4a3d518091cd7a5d4ed45ba459b7e7b57bda7fbb61edf543c62371cf92e14ea3e00303732bf32d452a93ae206321cb48a4cecccf86bb909c519a28f454dba1e246327255eed77cbb51ec90557ed36c8f3c074edf303ea0f3ff00c7ff00c7c79b2052ef13d4de8ea2eda54557cea972841ad6d198daec6bd524cca511f5c2c40fec59c41ea6eba48a076820eb476f5528c4db67ba53a5c391af5cfc7ed2827e2afcb5f29750b63b5992f435e56ad7d32a1543eea610288894acdbd4657dfd0640791ee6c9ee3d1aaa9a86906e54724aac8de3e4ccb45406dbae3df076cbf4ec5df2dbcbe292817f3730424121ae094faa1e8c1474abd7ce8141a54f91873555c2fdf6b7698486bf011f6ba53beb7c3312df9d6ff4d6b02f030180c06030180c06030180c06030180c06030180c0607e691f509473d0f6d7cb7bc6cb79a6d08c9e9507aea034b479261fdbdf5dcc633b518b39357ee22a891666913a49ef6df80c3d678641a9c70c642d4717e5d0f6c1937d4ad01f43ca3d67e7bbd2c5a1a49560ab83ce90185c3638b146d342e8ca225209428561b207f1966b47da4fdbff006912baf15065a47ca6c880f5112aedc2ce9ab10de4fa8eae69a58bf1eff1f632dea80dd036c11992b2e56a33e57b9248c0440755c8c739292f7ec020f0d19344242e9d376d105df3d34d47b745725a684f6543060addb93d7f40595f4ea796bc97199d33dfa0bcf7eac74fac2adc925d8e37b8fcca43ea3998696469371bd73268ca6c66a08618242f6aec11d7290d2e8b3dbe10b120ebc3e9b9a9a5b53fc50d2c9ccc2128e94b065f67d96c851864e8710e63d21973b611c20ab479c26bf0d8e0608cce0c57edf093c14498bd43ee22e785540bdfc06030180c06030180c06030180c06030180c06030181f1dec763e48b063e441077e7639fc87f5e34f463274580ff2cdf96857f8622ba0a3c17fc9b4e386a43f05643f35bf1ca2e7ee27ceb9d0799d8bc6a51c0b4e4d1d0522e021a1d230bc1d12c0bf022421d5dae24f0be483771a1e685afbdac38a34d24f992bbda8d974bbdfeb81f12c7acebbb86167ab9b5a0f14b1a052867d8f90c3a6a046c923861a77fefda7c24b3774cd7da7deb955057a4beeb65f84dc375125d34d4e42b37c79f09df1fde29b0ac9b32b2a704ca2513696712089bfb4da0eb05d53615264db84a1f573c90b278e400d4caeca11d9bda8b4b5db67ed43943e4188763ad05b46b5ae75ae79d6b9e79d6b5cf3ad6b5ad6b5afd35ad6b5fe6b5ad7f9ad6bfcd6b03fb80c06030180c06030180c06068a7c9c9f93c3be3e7d8b3d83cbe55029c573e79b4ec485cbe192431153e0a5708881591807ad898578c9c2a97248737e5d0d75d2e349b7ebb66fda396eaf49ec23360cceefe249bc85f5a16c733b5fc40dedb7d6e7fd539e6acae2c8dd2c9586bccd29be8ff275bfed9771b2ba0083c4a29a1ffba37fc17f58ed40dd06fcd54256055957c1dcbe384dd0f86c6dbbc23263c664f207cf7912d36f1d9990485e91365c82ee7a55472f493e72e5553adfef53f4d73cf21cb6cdaf2b6e3d1df931150ff47fa790f4f433e425a505f1f41d6b3ed890c49796bc67033313a61f3399987b47c9401cecac9903ad2ddd9174d635a59f24f7976c04aba0eabe23d49bb8a463a9a2635298f51e0bd4b120dd29d884e4db1adb679315dabff2f637829b75cb1e94ff0093a6ba4b7dff00e5bde0728fe85f417a0abcbf3e50c1571e81f48829d509e9df16a1e7537269959c63cb94f426c88b432717734f41c9a5aa94a422f55120f2092f69ab683c4cd8f78847c4576b37ef4931543acc1af9a941cc09317ac88b222c9abe66406b84dd0e7ed5da09b86ef583a45455172c9d22a70bb57092aa26b21da6a70a77cf5aeb61503eddf6159742fadfc987421c12d3cad13baa39e7bf57f5d18fb2aa138f5246946d531136db7ae1b8c0753bb6f08931c24f54da3d35b741f7cf4d9368e54502e2f0281adbbabd7be48f6bfa9af38738b03d19e208171507fdc1f9e3f963d37b2e981f35863b961cbe2806c75f3c72ea3b165d076e671530c7cdc7f11f7aa3b8e0e68c81b6dc78374ab5b022375fb42a8b829dbae593ca3accf1bccac80a163f68cc095447642d2c9ae62c125a8c1b66fa8db038363a76400ca09504b3fc233da8ecc084a5c2f4f5a8593e051a79363b2db9bdddf2c954d99777a38c4128cb3bcfc1a970227d1172c450ae465a34f7764499111b884d42689f2b1d7ed7a60949f479016c1822299a288d55e34721347833d296e92f54fbabc1776cb5c5ac77c8072a691571731118184ca2674fddf0fea57160161b58eb01609ece605f6361084a980d19d4c1b2a8947c391288bf74f4237f9149c1988fbefe30628eac9f42462a3b7f7eb71370c128d93df7c3a9ff0035c5651595d71f762744395a64aac0a4a508387c52303dbbd7031d769495e3800353e1906f8f945d400cf5731dad261e813b1ae2c66715731af403bbafb2d0d91c7e171a2061b45c6fa0dc2b678904613923020aa05da8d1ce4872e1d8167d86559107c1ab333bd2737cfc9d12f080896c9eb9a6e93f300cf41dbcea1055e44e756bcba6f3463198441d94f02b8672d8641a3c2b6ee4679fc18b4764e70e6d80354d2403926cc806f556746a756cda5d220f66dbf228a49818164c2bdb1acc99da01e2c747bf36e4ec9009db14d4a26082b2468f01b1583ad205818ae0174a8760cba2afb5d06577158cd2a6aca613f729a0e9c0319a4c08a70bfe36a473032edb0183c49badad75be5fcc2624c1c5c66b5aded4225daa7aff007bd6f03423e2aafeb56d4a7ad7a87d1d216722f4ff00942feb3295b94ab57da749c95bae71c4eab19d0b454dfe5231693d752906d23aab8d6b6e398fbee79fd9db755044303f911eee0f2b4ceb8f90780ceae2955134b965d7f6179b18d853175142d509363b12f6ec8344b67911e8c9a9fda88c8cdc2d2e5387ca63a8112ae84b636316244036ebceb1e7160ca651eadfef96aba86dc8d0511a76b3353897ee0002b4d88628089da500225141ac2436aa48713845a3b60cf7168d94002b98fc7a59b9aac5837130180c0883d054c467d1b455c540ccdc916314ba2b39b561217e2144d22c3c54de3a423af088b516e1543922c1221d3c65b7092cdf6e504b4ba2aa3bed3e8347611e4cf58a7e600de29b3ae1a50d53c26ab17429ab5e29029a8cb6e794d8c00da10f04af11252c770e84cde4b02415065266d645311cc48bb726d8443a576835402d035ad73ad6b9d6b5ad6bf4e75aff0035ad6b5fa6b5afd35fe6b5ff00aff35fe6bff9814e55e7c66ca4fc1fe432acf499f811c847b8af391fa00092acdeca1b4be979a11463fcc4950cf8d081dc913b5d1688c625d199a33720dc6e402bedab1d499aff00aa412f78f7d69251a49b78ebdac5c441bd9b5d33d8a6854b29c82897ac6122fed340b7ad2248869b8f91f47d9ed0ea7f051ce5c4aa012be49b53025a8b5c5bb7010638f8ff00f4d91987c96916d615083a35f24bd46841528e864de5c56a08683a857a595e8646946b1c11619e27135782ad547b23880c12737adf69196496b8582d2697aa98d0b44d4f48c45ebb3e3698a9a0b564608491e7493e34cabb878b89057879fb76cf3b49d11403b65ca3a6ecdd6d35565d545aadfb7947a0aebb7fe3b0efa1fc55e84a4edf0741bbf4b5dcfec12bc5ee2849379b172292cbd493c0a5ba32462884e5a2f5231d838a45a3a812789a918824743252214c5ea88870b19a3835a71ca8aba8e5d87a392cb563d120806732f8a7241007303e1d82239ecb5ab128d5abc12ac9946db34f0375b769097af5c0f6c448376e93c58219aaaa7ba61de9af4959f267558bcab2ec71015a382439094f73a8cf55d4411883550c74fc1211f2c94a11e5426f18b35987f5b5b7a6683e9271d76ef0220f3efc75d79e5cf605b5e88a5087712acae5af1e8c3744b451da50a84da046641a47229b56a093ebf848b0d9fb51a8f72f0635b316fc9c0e39f314946ef146c342c6b02a7299f277afa8cf53fb7bd131a3fe713e3fd9532aca4da8c9e7b6735755b7154c0faaec0f7cbd1e07a4260a1515ca04cc31fb316d72fb9db3685b96fcf2e761b15e46f1a0ef35c8efab725b39716ffa33d45391d39bbed85e3c8445810e23633a030281c26228943dd456bcaf23fd762a3425ec8644655db878f8c1e22e174796a11f7a7fcb57cdb5ec5f19fa66b295d500c179186defbd45a7084b5e91b04adf70f15042e82ae413649b461945830549e8a7e9f675c93204dd24e87b16ec5151e86ce55202fe6f38b0e4f7099abdb470c338c3283c22af647554d93c1da2ba91cb6632592321e40e484db556381193568c5a0d101a32dd3e7f25c3b5544c20cb9fc7e74afa7e11ed7a02660ebfbfe335b92a5e741a5e09d9aadef3a79f9a424cd61933fe19f0e3f173f1b933540cc42c20dfcd3a0dd697184a33220ee76c5209e2b20be815a6524975cd24af99025e3e1c1c32adac9390141409f26f883d93caa4d3a93b406425a58cf1b0234130670f8bb08b30185b7df67dd48ba5860627e84a92c1b7e61440e68d2b2374943ec4feef72c2a76a9759dcfd06204d08898a663118e9b8ebe63109099676622c0ff3a48bcba1b126bc39049375cbf21afd5978ba6d4afc845b7e9ea9dcd4d0bf3f5ed4ed735f59f4f03164831c316055fd9c5a276fb3d0a0ada32c8ab2167dec19cc7f5c29c1207be4fae75223c261f809efdbf494dbd2de4ebebcef0125170476f1ace5d55a92597b82bc098c0a9b837e049c83862185927869f8d6cf3a55906e9510ddeadbfd5730cf94bf6ac19f79b2052eaa681a72ac9d2f1c7b27acab787d76409c4dc937208cf10804c632c8db3e4b8e18419766588b6c4dd0a59173c8976e971c8932a8b64c8b909b70180c06030180c0c326f5c579668b481d910386582110749be403cde2e0e582d17a96b7a49e243cf317ed13749eb7bd26e38479578d6f7fb7bd7eb8196b76edda3741a344116ad5aa29376cd9ba5c22ddbb7478e534504114f9e53491453e794d2493e79e13e39e78e39d73ad6b41ed80c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c06030180c0607ffd9, 5291, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `like_objets`
--

CREATE TABLE `like_objets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `objets_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objets`
--

CREATE TABLE `objets` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `pays` varchar(150) NOT NULL,
  `categorie` varchar(150) NOT NULL,
  `description` varchar(155) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `recupere` tinyint(1) NOT NULL DEFAULT '0',
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objets`
--

INSERT INTO `objets` (`id`, `nome`, `telefone`, `pays`, `categorie`, `description`, `observation`, `user_id`, `recupere`, `date_`, `delete_`) VALUES
(6, 'Zen Imigran', '41998061686', 'Brazil', 'Passaport', 'Met paspò sa kitel nan yon machin Uber si yon moun ta rekonet li fèl konnen gen yon moun ki jwenn paspò a pou li', 'Mw disponib selman le samedi ak le dimanche aprè mini  antre an kontak avem poum ka diw kijan map ka fèw jwenn paspò a', 1, 0, '2023-01-06 17:38:33', 0),
(7, 'Jempson Louis Jean', '41998061686', 'Brazil', 'Bil kouran', 'Mw jwenn bil kouran sa nan rout pour ale Boqueirão', 'Mw disponible jis kontaktem poum ka fèw jwenn li', 3, 0, '2023-01-10 20:25:24', 0),
(8, 'Rose Carmelle Pierre', '41998061686', 'Haiti', 'RNME', 'Mw trouve rut sa sou plaz quilicura nan pati ki anfas Upa posib ke met li tap soti nan lopital la li jetel sanl pa rann li kont', 'Si yon moun ou byen met kat la ta rekonet pyès la antre an kontak avem mw disponib chak jou nan aprè midi', 4, 0, '2023-01-11 13:05:00', 0),
(9, 'Matheus da Silva', '41998061686', 'Brazil', 'Habilitação', 'Trouve a l\'entre da Clamom dans l\'entreprise que je travail probablement il l\'a faire jete en retirent son telefone dans poche ', 'Je suis disponible tout les jour just m\'appelle et on poura prendre un randez-vous pour le remetre', 1, 0, '2023-01-11 13:47:41', 0),
(10, 'Fabio Roberto Kriska', '419980616868', 'Brazil', 'RG', 'Trouve a l\'entre da Clamom dans l\'entreprise que je travail probablement il l\'a faire jete en retirent son telefone dans poche', 'Je suis disponible tout les jour just m\'appelle et on poura prendre un randez-vous pour le remetre', 3, 0, '2023-01-12 18:52:10', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `online`
--

CREATE TABLE `online` (
  `id` int(11) NOT NULL,
  `description` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `statu_` tinyint(1) DEFAULT '0',
  `active` tinyint(1) DEFAULT '0',
  `pays` varchar(50) DEFAULT NULL,
  `adresse` varchar(150) NOT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_activation` varchar(55) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `nome`, `telefone`, `statu_`, `active`, `pays`, `adresse`, `numero`, `email`, `password`, `login_activation`, `date_`) VALUES
(1, 'JEMPSON LOUIS JEAN', '41998061686', 1, 1, 'Brazil', 'R. Januário Alves de Souza', '487', 'jempson@clamom.com.br', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '2022-12-26 13:07:47'),
(2, 'ADMIN', '41999999999', 0, 0, 'Brazil', 'admin', '99', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2022-12-26 16:44:17'),
(3, 'Jemmy Camelita Louis Jean', '41984660821', 1, 0, 'Brazil', 'Rua Marilândia do Sul', '411', 'jemmy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2022-12-26 20:32:30'),
(4, 'Rose Carmelle Pierre', '41998061686', 1, 0, 'Brazil', 'Rua João Socha', '809', 'rose@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2023-01-04 12:30:14'),
(5, 'Zen Imigran', '41984660821', 0, 0, 'Brazil', 'Rua Marilândia do Sul', '411', 'zenimigran336@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2023-01-06 18:59:21'),
(6, 'Matheus da Silva', '41999998569', 0, 0, 'Brazil', 'Rua Diogo Mugiatti', '90', 'matheussilva@clamom.com.br', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2023-01-10 15:18:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_has_online`
--

CREATE TABLE `user_has_online` (
  `user_id` int(11) NOT NULL,
  `online_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chats_user1_idx` (`user_id`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_commentaire_user1_idx` (`user_id`),
  ADD KEY `fk_commentaire_objets1_idx` (`objets_id`);

--
-- Indexes for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_like_commentaire1_idx` (`commentaire_id`),
  ADD KEY `fk_comment_like_user1_idx` (`user_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_objets1_idx` (`objets_id`);

--
-- Indexes for table `like_objets`
--
ALTER TABLE `like_objets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_like_objets_user1_idx` (`user_id`),
  ADD KEY `fk_like_objets_objets1_idx` (`objets_id`);

--
-- Indexes for table `objets`
--
ALTER TABLE `objets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_objets_user1_idx` (`user_id`);

--
-- Indexes for table `online`
--
ALTER TABLE `online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_has_online`
--
ALTER TABLE `user_has_online`
  ADD PRIMARY KEY (`user_id`,`online_id`),
  ADD KEY `fk_user_has_online_online1_idx` (`online_id`),
  ADD KEY `fk_user_has_online_user1_idx` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_like`
--
ALTER TABLE `comment_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `like_objets`
--
ALTER TABLE `like_objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `objets`
--
ALTER TABLE `objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `fk_chats_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_objets1` FOREIGN KEY (`objets_id`) REFERENCES `objets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `comment_like`
--
ALTER TABLE `comment_like`
  ADD CONSTRAINT `fk_comment_like_commentaire1` FOREIGN KEY (`commentaire_id`) REFERENCES `commentaire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_like_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_objets1` FOREIGN KEY (`objets_id`) REFERENCES `objets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `like_objets`
--
ALTER TABLE `like_objets`
  ADD CONSTRAINT `fk_like_objets_objets1` FOREIGN KEY (`objets_id`) REFERENCES `objets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_like_objets_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `objets`
--
ALTER TABLE `objets`
  ADD CONSTRAINT `fk_objets_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `user_has_online`
--
ALTER TABLE `user_has_online`
  ADD CONSTRAINT `fk_user_has_online_online1` FOREIGN KEY (`online_id`) REFERENCES `online` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_has_online_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;