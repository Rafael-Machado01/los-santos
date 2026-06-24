-- phpMyAdmin SQL Dump
-- version 5.2.3-2.fc44
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 23/06/2026 às 14:40
-- Versão do servidor: 11.8.6-MariaDB
-- Versão do PHP: 8.5.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `los_santos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `corretor`
--

CREATE TABLE `corretor` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` int(9) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Despejando dados para a tabela `corretor`
--

INSERT INTO `corretor` (`cpf`, `nome`, `telefone`, `imagem`) VALUES
('02087141380', 'Carl Johnson', 162463566, 'cj.png'),
('18596067760', 'Sweat Johnson', 111111111, 'sweat.png'),
('28836424279', 'Franklin Clinton', 143636124, 'frank.png'),
('93379593052', 'Trevor Philips', 133676184, 'trevor.png'),
('94812780500', 'Michael de Santa', 113180473, 'michael.png'),
('96096599346', 'Big Smoke', 936797853, 'big.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imovel`
--

CREATE TABLE `imovel` (
  `id` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `preco` float NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `tipoImovel` int(11) NOT NULL,
  `propietario` varchar(11) NOT NULL,
  `corretor` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Despejando dados para a tabela `imovel`
--

INSERT INTO `imovel` (`id`, `endereco`, `preco`, `imagem`, `tipoImovel`, `propietario`, `corretor`, `status`) VALUES
(18, 'Grove Street', 250000, 'cj.png', 3, '48879928155', '02087141380', 1),
(19, 'Rockford Hills', 5000000, 'michael.png', 4, '40589766163', '94812780500', 1),
(20, 'Grove Street', 180000, 'rider.png', 1, '18582604181', '96096599346', 1),
(21, 'Grove Street', 200000, 'sweat.png', 1, '62214810072', '18596067760', 1),
(22, 'Desert Grand Senora ', 34000, 'trevor.png', 3, '40589766163', '02087141380', 0),
(23, 'Idlewood', 100000, 'frank.png', 1, '27068936210', '28836424279', 1),
(24, 'Richman', 1000000, 'dog.png', 4, '62214810072', '02087141380', 1),
(25, 'Downtown', 500000, 'ap.png', 2, '48879928155', '93379593052', 0),
(26, 'Idlewood', 100000, 'big.png', 1, '48879928155', '96096599346', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Despejando dados para a tabela `login`
--

INSERT INTO `login` (`id`, `user`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'corretor', '88750241d2450083b2e75999b2f7c59d');

-- --------------------------------------------------------

--
-- Estrutura para tabela `propietario`
--

CREATE TABLE `propietario` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `telefone` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Despejando dados para a tabela `propietario`
--

INSERT INTO `propietario` (`cpf`, `nome`, `telefone`) VALUES
('18582604181', 'Almir Camolesi', 123241418),
('27068936210', 'Lionel Messi', 173325167),
('40589766163', 'Cristiano Ronaldo', 193228413),
('48879928155', 'Rafael Ampudia', 997402328),
('62214810072', 'Ana Julia Miranda', 112834378);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoImovel`
--

CREATE TABLE `tipoImovel` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Despejando dados para a tabela `tipoImovel`
--

INSERT INTO `tipoImovel` (`id`, `descricao`) VALUES
(1, 'Casa'),
(2, 'Apartamento'),
(3, 'Sobrado'),
(4, 'Mansão');

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
  ADD KEY `corretor` (`corretor`),
  ADD KEY `tipoImovel` (`tipoImovel`),
  ADD KEY `propietario` (`propietario`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `tipoImovel`
--
ALTER TABLE `tipoImovel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tipoImovel`
--
ALTER TABLE `tipoImovel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `corretor` FOREIGN KEY (`corretor`) REFERENCES `corretor` (`cpf`),
  ADD CONSTRAINT `propietario` FOREIGN KEY (`propietario`) REFERENCES `propietario` (`cpf`),
  ADD CONSTRAINT `tipoImovel` FOREIGN KEY (`tipoImovel`) REFERENCES `tipoImovel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
