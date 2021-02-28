-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23-Abr-2020 às 00:49
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
-- Estrutura da tabela `cadastro_funcionario`
--

CREATE TABLE `cadastro_funcionario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cadastro_funcionario`
--

INSERT INTO `cadastro_funcionario` (`id`, `nome`, `referencia`, `area`, `cpf`, `whatsapp`) VALUES
(1, 'Ademar - Dema', '', 'Producao', '', ''),
(3, 'Geraldo - Potiguar', '', 'Producao', '', ''),
(5, 'Marcos - Nego', '', 'Producao', '', ''),
(10, 'Marcela - Pervertida', '', 'Producao', '', ''),
(12, 'Dileusa - Mãe do Danilo', '', 'Producao', '', ''),
(13, 'Elaine - Nega', '', 'Producao', '', ''),
(15, 'Rose - Cover da Tati', '', 'Producao', '', ''),
(17, 'Rodrigo - Mezenga', '', 'Motoqueiro', '', ''),
(22, 'Roberto - Souza', '', 'Garcom', '', ''),
(24, 'Flavio - T T', '', 'Garcom', '', ''),
(25, '-- Escolher Funcionario --', '', '', '', ''),
(29, 'Thiago - Félix', '', '', '', ''),
(28, 'Tatiane - Ta Magra', '', '', '', ''),
(32, 'Daniel - Zero Cal', '', '', '', ''),
(34, 'Emily - Irmã da Daiane', '', '', '', ''),
(41, 'Felipe - Zoiao', '', 'Motoqueiro', '', ''),
(36, 'Leticia - Ta Pra Frente', '', 'Garçom', '', ''),
(38, 'Bruno - Coca Linguinha', '', 'Motoqueiro', '', ''),
(40, 'Bruno - Silva Ta Magro', '', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro_funcionario`
--
ALTER TABLE `cadastro_funcionario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_funcionario`
--
ALTER TABLE `cadastro_funcionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
