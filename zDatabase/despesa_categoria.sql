-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23-Abr-2020 às 00:50
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `base`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa_categoria`
--

CREATE TABLE `despesa_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesa_categoria`
--

INSERT INTO `despesa_categoria` (`id_categoria`, `nome_categoria`) VALUES
(1, 'Infra-Estrutura'),
(2, 'Negocio'),
(3, 'RH-Funcionarios'),
(4, 'RH-Freelances'),
(5, 'RH-Motoqueiros'),
(6, 'RH-PauTrabalhista'),
(7, 'Materia-Prima'),
(8, 'Embalagens'),
(9, 'Moveis'),
(10, 'Maquinas-Equipam'),
(11, 'Utensilios-Gerais'),
(12, 'Marketing'),
(13, 'Diversos'),
(14, 'Impostos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `despesa_categoria`
--
ALTER TABLE `despesa_categoria`
  ADD PRIMARY KEY (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
