-- phpMyAdmin SQL Dump
-- version 5.2.3-2.fc44
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 10/06/2026 às 23:39
-- Versão do servidor: 11.8.6-MariaDB
-- Versão do PHP: 8.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ls`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `corretor`
--

CREATE TABLE `corretor` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `telefone` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `imovel`
--

CREATE TABLE `imovel` (
  `id` int(11) NOT NULL,
  `endereço` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `tags` varchar(255) NOT NULL,
  `tipoImovel` int(11) NOT NULL,
  `cpfProprietario` int(11) NOT NULL,
  `cpfCorretor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `propietario`
--

CREATE TABLE `propietario` (
  `cpf` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL,
  `idImovel` int(11) NOT NULL,
  `cpfCorretor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `corretor`
--
ALTER TABLE `corretor`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipoImovel`),
  ADD KEY `propietario` (`cpfProprietario`),
  ADD KEY `corretor` (`cpfCorretor`);

--
-- Índices de tabela `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `imovel` (`idImovel`),
  ADD KEY `cpfCorretor` (`cpfCorretor`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `corretor` FOREIGN KEY (`cpfCorretor`) REFERENCES `corretor` (`cpf`),
  ADD CONSTRAINT `propietario` FOREIGN KEY (`cpfProprietario`) REFERENCES `propietario` (`cpf`),
  ADD CONSTRAINT `tipo` FOREIGN KEY (`tipoImovel`) REFERENCES `tipo` (`id`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `imovel` FOREIGN KEY (`idImovel`) REFERENCES `imovel` (`id`),
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`cpfCorretor`) REFERENCES `corretor` (`cpf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
