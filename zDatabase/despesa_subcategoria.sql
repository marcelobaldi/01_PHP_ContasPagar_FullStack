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
-- Estrutura da tabela `despesa_subcategoria`
--

CREATE TABLE `despesa_subcategoria` (
  `id_subcategoria` int(11) NOT NULL,
  `nome_subcategoria` varchar(255) NOT NULL,
  `nome_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `despesa_subcategoria`
--

INSERT INTO `despesa_subcategoria` (`id_subcategoria`, `nome_subcategoria`, `nome_categoria`) VALUES
(1, 'Aluguel-Proprietario', 'Infra-Estrutura'),
(2, 'Aluguel-Imposto', 'Infra-Estrutura'),
(3, 'Agua', 'Infra-Estrutura'),
(4, 'Luz', 'Infra-Estrutura'),
(5, 'Gas', 'Infra-Estrutura'),
(6, 'Manutencao-Corretiva', 'Infra-Estrutura'),
(7, 'Manutencao-Preventiva', 'Infra-Estrutura'),
(8, 'Pintura-Externa', 'Infra-Estrutura'),
(9, 'Pintura-Interna', 'Infra-Estrutura'),
(10, 'Melhorias', 'Infra-Estrutura'),
(11, 'Decoracao', 'Infra-Estrutura'),
(12, 'Diversos', 'Infra-Estrutura'),
(14, 'Contabilidade', 'Negocio'),
(15, 'Advocacia', 'Negocio'),
(16, 'Papelaria', 'Negocio'),
(17, 'Limpeza', 'Negocio'),
(18, 'Dedetizacao', 'Negocio'),
(19, 'EPIs', 'Negocio'),
(20, 'EPCs', 'Negocio'),
(24, 'NomeFuncionario', 'RH-PauTrabalhista'),
(25, 'Carnes', 'Materia-Prima'),
(26, 'Laticinios-Queijos', 'Materia-Prima'),
(27, 'Laticinios-Diversos', 'Materia-Prima'),
(28, 'HortiFruti', 'Materia-Prima'),
(29, 'Bebidas-Cervejas', 'Materia-Prima'),
(30, 'Bebidas-Refrigerantes', 'Materia-Prima'),
(31, 'Bebidas-Quentes', 'Materia-Prima'),
(32, 'Bebidas-Diversos', 'Materia-Prima'),
(33, 'Sorvetes-Acai', 'Materia-Prima'),
(34, 'Balas-Doces-Chocolates', 'Materia-Prima'),
(35, 'Diversos', 'Materia-Prima'),
(36, 'Embalagens', 'Embalagens'),
(37, 'Compra', 'Moveis'),
(38, 'Manutencao-Corretiva', 'Moveis'),
(39, 'Manutencao-Preventiva', 'Moveis'),
(40, 'Compra', 'Maquinas-Equipam'),
(41, 'Manutencao-Corretiva', 'Maquinas-Equipam'),
(42, 'Manutencao-Preventiva', 'Maquinas-Equipam'),
(43, 'Compra', 'Utensilios-Gerais'),
(44, 'Digital-Face-Insta', 'Marketing'),
(45, 'Agencias', 'Marketing'),
(46, 'Panfletos', 'Marketing'),
(47, 'Brindes', 'Marketing'),
(48, 'Sorteios', 'Marketing'),
(49, 'Diversos', 'Marketing'),
(50, 'Diversos', 'Diversos'),
(51, '1-Salario', 'RH-Funcionarios'),
(52, '2-PorFora', 'RH-Funcionarios'),
(53, '3-HoraExtra', 'RH-Funcionarios'),
(54, '4-Comissao', 'RH-Funcionarios'),
(55, '5-ValeTransporte', 'RH-Funcionarios'),
(56, '6-Ferias', 'RH-Funcionarios'),
(57, '7-FolhaPagamento', 'RH-Funcionarios'),
(58, '8-Adiantamento', 'RH-Funcionarios'),
(59, '9-Diversos', 'RH-Funcionarios'),
(60, '1-Diaria', 'RH-FreeLances'),
(61, '2-Extra', 'RH-FreeLances'),
(62, '4-Comissao', 'RH-FreeLances'),
(63, '5-ValeTransporte', 'RH-FreeLances'),
(64, '9-Diversos', 'RH-FreeLances'),
(65, '1-Diaria', 'RH-Motoqueiros'),
(66, '2-Entrega', 'RH-Motoqueiros'),
(67, '9-Diversos', 'RH-Motoqueiros'),
(68, 'GPS', 'Impostos'),
(69, 'DARF', 'Impostos'),
(70, 'DARE', 'Impostos');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `despesa_subcategoria`
--
ALTER TABLE `despesa_subcategoria`
  ADD PRIMARY KEY (`id_subcategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
