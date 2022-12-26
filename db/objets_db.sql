-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26-Dez-2022 às 20:47
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
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categorie`
--

INSERT INTO `categorie` (`id`, `description`) VALUES
(1, 'DOCUMENT');

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
  `objets_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `user_id` int(11) NOT NULL,
  `objets_id` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `like_objets`
--

CREATE TABLE `like_objets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `objets_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `objets`
--

CREATE TABLE `objets` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `description` varchar(155) NOT NULL,
  `observation` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `pays` varchar(150) NOT NULL,
  `recupere` tinyint(1) NOT NULL DEFAULT '0',
  `date_` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'JEMPSON LOUIS JEAN', '41998061686', 1, 1, 'BRASIL', 'R. Januário Alves de Souza', '487', 'jempson@clamom.com.br', '827ccb0eea8a706c4c34a16891f84e7b', 'admin', '2022-12-26 13:07:47'),
(2, 'ADMIN', '41999999999', 0, 0, 'BRASIL', 'admin', '99', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '2022-12-26 16:44:17'),
(3, 'jemmy camelita louis jean', '41984660821', 0, 0, 'Brazil', 'Rua Marilândia do Sul, 411', '223', 'jemmy@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, '2022-12-26 20:32:30');

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
  ADD KEY `fk_arquivos_user1_idx` (`user_id`),
  ADD KEY `fk_arquivos_objets1_idx` (`objets_id`);

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
  ADD KEY `fk_objets_user_idx` (`user_id`),
  ADD KEY `fk_objets_categorie1_idx` (`categorie_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `like_objets`
--
ALTER TABLE `like_objets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `online`
--
ALTER TABLE `online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  ADD CONSTRAINT `fk_commentaire_objets1` FOREIGN KEY (`objets_id`) REFERENCES `objets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `fk_arquivos_objets1` FOREIGN KEY (`objets_id`) REFERENCES `objets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_arquivos_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `like_objets`
--
ALTER TABLE `like_objets`
  ADD CONSTRAINT `fk_like_objets_objets1` FOREIGN KEY (`objets_id`) REFERENCES `objets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_like_objets_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `objets`
--
ALTER TABLE `objets`
  ADD CONSTRAINT `fk_objets_categorie1` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_objets_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
