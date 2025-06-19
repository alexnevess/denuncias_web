-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 19-Jun-2025 às 16:29
-- Versão do servidor: 9.1.0
-- versão do PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `denuncia_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncia`
--

DROP TABLE IF EXISTS `denuncia`;
CREATE TABLE IF NOT EXISTS `denuncia` (
  `id_dnc` int NOT NULL AUTO_INCREMENT,
  `descricao_dnc` varchar(500) NOT NULL,
  `imagem_dnc` varchar(255) DEFAULT NULL,
  `endereco_dnc` varchar(255) DEFAULT NULL,
  `data_dnc` datetime DEFAULT NULL,
  PRIMARY KEY (`id_dnc`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `denuncia`
--

INSERT INTO `denuncia` (`id_dnc`, `descricao_dnc`, `imagem_dnc`, `endereco_dnc`, `data_dnc`) VALUES
(5, 'Buraco que está causando problemas na minha rua', 'uploads/teste.jpg', 'Rua Josina Joaquina De Souza, 155', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
