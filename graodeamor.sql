-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Set-2025 às 04:38
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `graodeamor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `doacoes`
--

CREATE TABLE `doacoes` (
  `id` int(11) NOT NULL,
  `doador_id` int(11) DEFAULT NULL,
  `instituicao_id` int(11) DEFAULT NULL,
  `descricao` text NOT NULL,
  `data_doacao` date NOT NULL,
  `status` enum('disponivel','retirado') DEFAULT 'disponivel',
  `alimento` varchar(50) DEFAULT '',
  `quantidade` decimal(10,2) DEFAULT 0.00,
  `doador_nome` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `doacoes`
--

INSERT INTO `doacoes` (`id`, `doador_id`, `instituicao_id`, `descricao`, `data_doacao`, `status`, `alimento`, `quantidade`, `doador_nome`) VALUES
(1, NULL, NULL, '', '0000-00-00', 'retirado', '', 0.00, ''),
(2, 1, NULL, '', '2025-09-24', 'retirado', 'feijao', 2.00, ''),
(3, 6, NULL, '', '2025-09-24', 'retirado', 'arroz', 1.00, ''),
(4, 6, 1, '', '2025-09-24', '', 'arroz', 2.00, ''),
(6, NULL, 1, '1 - Azeite', '2025-09-24', '', 'outros', 0.00, 'Caio'),
(7, NULL, NULL, '', '2025-09-24', '', 'arroz', 1.00, 'wwww');

-- --------------------------------------------------------

--
-- Estrutura da tabela `doadores`
--

CREATE TABLE `doadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `doadores`
--

INSERT INTO `doadores` (`id`, `nome`, `email`, `password`) VALUES
(1, 'caio', 'ce.costa2015@gmail.com', '$2y$10$EVoeaTD88XbSIS2X.aTHDO7nDlzH4zon4y8U0xttw6E7vn.XEdBPi'),
(3, 'japones', 'teste@nakamura.comi', '$2y$10$M/ke48M4DwDYF6XJM5wOSuUdZtxif9lAyosKSy3EPbSWBSST9rhca'),
(4, 'EmpresaNeymar', 'neymar@gmail.com', '$2y$10$Qst7sZ7jT0vXVoUe/o2bgeh47wlPUfdeE5owi8Qsph.cTy2bJNlrK'),
(5, 'd', 'd@gmail.com', '$2y$10$yZONRK4EfYIdQwUc8jJYZebtZwk0TTYcXN25e/H6/s42yhfUPwvvG'),
(6, 'teste', 'teste@gmail.com', '$2y$10$skp8E4r2hOAF82GZTEvOd.rO/B4z9aRSH3/RfiGXYcXvGP9qdS9ce');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicoes`
--

CREATE TABLE `instituicoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `instituicoes`
--

INSERT INTO `instituicoes` (`id`, `nome`, `endereco`, `password`, `email`) VALUES
(1, 'RestauranteGrao', 'Rua Grao', '$2y$10$S5Q5PxdeX6qF93R3soaQS.6wkn9IrFHgblnMPIowzhRmodAKgHM/q', 'restaurantegrao@gmail.com'),
(2, 'RestCaio', 'Rua Grao', '$2y$10$WIYRjMtOWXxmglUFTm3GtOzbdCJiK8H97XoRUSf6jzH0AntvaGtr.', 'restcaio@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doador_id` (`doador_id`),
  ADD KEY `instituicao_id` (`instituicao_id`);

--
-- Índices para tabela `doadores`
--
ALTER TABLE `doadores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `instituicoes`
--
ALTER TABLE `instituicoes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `doacoes`
--
ALTER TABLE `doacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `doadores`
--
ALTER TABLE `doadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `instituicoes`
--
ALTER TABLE `instituicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `doacoes`
--
ALTER TABLE `doacoes`
  ADD CONSTRAINT `doacoes_ibfk_1` FOREIGN KEY (`doador_id`) REFERENCES `doadores` (`id`),
  ADD CONSTRAINT `doacoes_ibfk_2` FOREIGN KEY (`instituicao_id`) REFERENCES `instituicoes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
