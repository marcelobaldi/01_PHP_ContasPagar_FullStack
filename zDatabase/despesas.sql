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
-- Estrutura da tabela `despesas`
--

CREATE TABLE `despesas` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `subcateg` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` float NOT NULL,
  `funcionario` varchar(255) DEFAULT NULL,
  `quant` float DEFAULT NULL,
  `u_med` varchar(100) DEFAULT NULL,
  `dat_venc` timestamp NOT NULL,
  `dat_cad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dat_atua` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `pago` varchar(10) NOT NULL DEFAULT 'NAO',
  `dat_pag` timestamp NULL DEFAULT NULL,
  `meio_pag` varchar(255) DEFAULT NULL,
  `forneced` varchar(255) DEFAULT NULL,
  `observ` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`id`, `categoria`, `subcateg`, `descricao`, `valor`, `funcionario`, `quant`, `u_med`, `dat_venc`, `dat_cad`, `dat_atua`, `pago`, `dat_pag`, `meio_pag`, `forneced`, `observ`) VALUES
(184, 'Infra-Estrutura', 'Aluguel-Proprietario', '', 1500.35, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-14 03:00:00', '2020-04-13 00:11:49', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(185, 'Negocio', 'Imposto-Simples', 'Imposto Simples ...', 500, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-13 03:00:00', '2020-04-13 00:12:27', '2020-04-13 00:13:26', 'SIM', '2020-04-13 03:00:00', '', '', ''),
(186, 'Diversos', 'Diversos', '', 785, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-12 03:00:00', '2020-04-13 01:40:56', '2020-04-19 02:15:10', 'NAO', '2001-01-01 03:00:00', '', '', ''),
(187, 'Moveis', 'Compra', '', 580, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-12 03:00:00', '2020-04-13 01:41:32', '2020-04-21 22:32:20', 'NAO', '2001-01-01 03:00:00', '', '', ''),
(188, 'RH-Motoqueiros', '1-Diaria', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-17 22:53:14', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(189, 'RH-Motoqueiros', '1-Diaria', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-24 03:00:00', '2020-04-17 22:53:43', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(190, 'RH-Funcionarios', '1-Salario', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-17 22:55:18', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(191, 'RH-Funcionarios', '7-FolhaPagamento', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:25:08', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(192, 'RH-Funcionarios', '9-Diversos', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:25:58', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(193, 'RH-Funcionarios', '1-Salario', '', 333, 'Bruno - Silva Ta Magro', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:28:50', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(194, 'RH-Freelances', '1-Diaria', '', 333, 'Dileusa - Mãe do Danilo', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:37:17', '2020-04-21 01:52:18', 'SIM', '2020-04-15 03:00:00', '', '', ''),
(195, 'Marketing', 'Digital-Face-Insta', '', 555, 'Flavio - T T', 0, 'Unid. Medida', '2020-04-21 03:00:00', '2020-04-18 00:37:38', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(196, 'RH-Funcionarios', '7-FolhaPagamento', '', 333, 'Emily - Irmã da Daiane', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:39:54', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(197, 'RH-Funcionarios', '7-FolhaPagamento', '', 333, 'Geraldo - Potiguar', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:40:16', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(198, 'Infra-Estrutura', 'Aluguel-Proprietario', '', 555, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-24 03:00:00', '2020-04-18 00:46:06', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(199, 'Embalagens', 'Embalagens', '', 555, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:48:06', NULL, 'SIM', '2001-01-01 03:00:00', '', '', ''),
(201, 'Infra-Estrutura', 'Aluguel-Proprietario', '', 1250, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-16 03:00:00', '2020-04-18 00:50:07', '2020-04-21 22:33:13', 'NAO', '2001-01-01 03:00:00', '', '', ''),
(202, 'Infra-Estrutura', 'Aluguel-Proprietario', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 00:50:22', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(203, 'Moveis', 'Compra', '', 555, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-16 03:00:00', '2020-04-18 00:50:38', NULL, 'SIM', '2020-04-16 03:00:00', '', '', ''),
(204, 'Impostos', 'GPS', '', 555, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-29 03:00:00', '2020-04-18 00:51:51', NULL, 'SIM', '2020-04-23 03:00:00', '', '', ''),
(205, 'Infra-Estrutura', 'Aluguel-Proprietario', '', 555, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-30 03:00:00', '2020-04-18 00:52:17', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(206, 'RH-Freelances', '1-Diaria', '', 555, 'Leticia - Ta Pra Frente', 0, 'Unid. Medida', '2020-04-15 03:00:00', '2020-04-18 00:53:42', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(207, 'RH-Funcionarios', '7-FolhaPagamento', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-23 03:00:00', '2020-04-18 00:55:18', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(208, 'RH-Funcionarios', '7-FolhaPagamento', '', 555, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-14 03:00:00', '2020-04-18 00:56:10', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(209, 'RH-Funcionarios', '7-FolhaPagamento', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-14 03:00:00', '2020-04-18 00:56:38', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(210, 'Maquinas-Equipam', 'Compra', '', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-17 03:00:00', '2020-04-18 02:16:09', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(211, 'Infra-Estrutura', 'Aluguel-Proprietario', 'asfdhgjklkçlç;.k,jmhgfbvdsa', 333, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-18 03:00:00', '2020-04-19 00:35:20', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(212, 'Utensilios-Gerais', 'Compra', '', 900, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-20 03:00:00', '2020-04-19 02:35:14', '2020-04-19 02:40:42', 'SIM', '2020-04-23 03:00:00', '', '', ''),
(213, 'RH-Motoqueiros', '1-Diaria', '', 30, 'Bruno - Coca Linguinha', 0, 'Unid. Medida', '2020-04-19 03:00:00', '2020-04-20 02:12:12', NULL, 'SIM', '2020-04-19 03:00:00', '', '', ''),
(214, 'Marketing', 'Digital-Face-Insta', '', 900, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-16 03:00:00', '2020-04-20 21:24:12', NULL, 'NAO', '2001-01-01 03:00:00', '', '', ''),
(215, 'RH-Freelances', '1-Diaria', '', 900, 'Dileusa - Mãe do Danilo', 0, 'Unid. Medida', '2020-04-20 03:00:00', '2020-04-21 00:56:15', '2020-04-21 01:52:52', 'SIM', '2020-04-20 03:00:00', '', '', ''),
(216, 'Infra-Estrutura', 'Aluguel-Proprietario', '', 9000, '-- Escolher Funcionario --', 0, 'Unid. Medida', '2020-04-21 03:00:00', '2020-04-21 23:02:58', NULL, 'NAO', '2001-01-01 03:00:00', '', '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `despesas`
--
ALTER TABLE `despesas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `despesas`
--
ALTER TABLE `despesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
