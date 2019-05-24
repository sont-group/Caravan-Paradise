-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Maio-2019 às 12:40
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caravanbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefone` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `cpf`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, '323.434.345-54', 'Zake Coster', 'zac@gmail.com', '12)98182-3233', '12345678'),
(2, '458.509.308-76', 'Jhonatan Luiz Chagas', 'jhonatan@gmail.com', '(12)98182-7621', '88888888'),
(3, '482.531.303-74', 'brayan', 'brayan@gmail.com', '(12)98233-3421', '999999999'),
(4, '543.534.656-32', 'Mateus Leonardo', 'Mateus@gmail.com', '(12)99192-9394', '88888888'),
(5, '00000000000', 'admin', 'admin', '123', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacotes`
--

CREATE TABLE `pacotes` (
  `req` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cod_viagem` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `login` varchar(100) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`login`, `nome`, `sobrenome`, `cpf`, `senha`, `tipo`) VALUES
('admin', 'admin', 'admin', 'xxx.xxx.xxx-xx', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `viagens`
--

CREATE TABLE `viagens` (
  `cod` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `origem` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagens` varchar(535) NOT NULL,
  `hotel` varchar(100) NOT NULL,
  `detalhes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `viagens`
--

INSERT INTO `viagens` (`cod`, `nome`, `origem`, `destino`, `preco`, `imagens`, `hotel`, `detalhes`) VALUES
(1, 'Jogo Do Flamengo', 'Cruzeiro, São Paulo, Brasil', 'Rio De Janeiro, Rio De Janeiro, Brasil', '100.00', 'imagens/viagens/Jogo Do Flamengo/icone.jpeg * imagens/viagens/Jogo Do Flamengo/viagem0.jpeg, imagens/viagens/Jogo Do Flamengo/viagem1.jpeg, imagens/viagens/Jogo Do Flamengo/viagem2.jpeg, imagens/viagens/Jogo Do Flamengo/viagem3.jpeg * imagens/viagens/Jogo Do Flamengo/hotel0.jpeg, imagens/viagens/Jogo Do Flamengo/hotel1.jpeg, imagens/viagens/Jogo Do Flamengo/hotel2.jpeg, imagens/viagens/Jogo Do Flamengo/hotel3.jpeg', 'Urubu', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi tenetur hic aliquam mollitia quae. Nisi, minus voluptatem beatae tenetur labore aliquid sapiente tempora qui voluptatum neque unde quaerat, quibusdam ex.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacotes`
--
ALTER TABLE `pacotes`
  ADD PRIMARY KEY (`req`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `viagens`
--
ALTER TABLE `viagens`
  ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pacotes`
--
ALTER TABLE `pacotes`
  MODIFY `req` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `viagens`
--
ALTER TABLE `viagens`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
